<?php
class File_model extends CI_Model
{
    public function __construct()
    {
	parent::__construct();
    }

	
	//inbox_file_count
    public function inbox_file_count() {
        $user_id=$this->session->userdata('user_id');
        $query = $this->db->query("select * from fts_file_movement where reciver_user_id='$user_id'");
        return $query->num_rows();
    }

    public function users_regis_file_count() {
         $user_id=$this->session->userdata('user_id');
        $this->db->where('user_id',$user_id);
        $this->db->from('fts_file_registration');
        return $this->db->count_all_results();
        }

        public function letter_count($file_id) {
       
        $query = $this->db->query("select * from fts_letter_record where file_id='$file_id'");
        return $query->num_rows();
    }

    // fetch_file_data
    public function fetch_file_data($limit, $start) {
        $user_id=$this->session->userdata('user_id');
        $this->db->select('r.file_id,r.file_ref_sl_no,r.sec_id,r.subject_id,r.file_reg_date,r.file_name,m.file_id m_file_id,m.received_date_time,m.dispatch_key,m.file_receive_key,m.file_status,m.reciver_user_id,s.subject_name,se.sec_name');
        $this->db->from('fts_file_registration r');
        $this->db->join('fts_file_movement m', 'r.file_id =m.file_id','left');
        $this->db->join('fts_subject s', 'r.subject_id =s.subject_id','left');
        $this->db->join('fts_section se', 'r.sec_id =se.sec_id');
        $this->db->where("(r.user_id= $user_id and m.file_id is null)");
        $this->db->or_where('m.reciver_user_id', $this->session->userdata('user_id'));
        $this->db->limit($limit, $start);
        $query = $this->db->get();
        //echo $this->db->last_query();exit;
        $result=$query->result_array();
        return $result;
        }
		
		
		//track file byname
		public function track_file_byname($file_name,$limit,$start)
		{
            $file_name=$file_name!=""?$file_name:'NULL';
		$this->db->select('r.user_id,r.file_id,r.file_ref_sl_no,r.file_move_status,r.file_reg_date,r.subject_id,r.file_name,r.description,m.received_date_time,m.from_desig_id,m.reciver_user_id,m.file_status');
        $this->db->from('fts_file_registration r');
        $this->db->join('fts_file_movement m', 'r.file_id=m.file_id','left');
        $this->db->like('r.file_name',$file_name);
        $this->db->limit($limit, $start);
        $query = $this->db->get();
       
        $result=$query->result_array();
        $data=array();
        $section=array();
        $name=array();
        foreach ($result as $row) 
             {
                $data[] = $row;
                if($row['reciver_user_id'])
                {
                 $name[$row['file_id']]=$this->user_name($row['reciver_user_id']);
                 $sec=$this->section_and_desig($row['reciver_user_id']);
                 $section[$row['file_id']]=$this->section_name($sec['sec_id']);
                }
                else
                {
                   $name[$row['file_id']]=$this->user_name($row['user_id']);
                  $sec=$this->section_and_desig($row['user_id']);  
                  $section[$row['file_id']]=$this->section_name($sec['sec_id']);
              }
             }
  
             $data_value[0]=$data;
             $data_value[1]=$section;
             $data_value[2]= $name;
             return $data_value;
		}
		
		//count total row using name
        public function count_file_name($file_name)
        {
        	$query = $this->db->query("SELECT * FROM fts_file_registration where file_name='$file_name'");
        	return $query->num_rows(); 
        }
		
		//track file bydate
		public function track_file_bydate($file_reg_date,$limit,$start)
		{
            $file_reg_date=date_format($file_reg_date);
            $start=$file_reg_date." 00:00:01";
            $end=$file_reg_date." 23:59:59";
            
		echo chck_file_movement("r.file_reg_date >= '$start' and r.file_reg_date <= '$end'");exit;
		$this->db->select('r.file_id,r.file_ref_sl_no,r.subject_id,r.file_name,r.description,m.received_date_time,m.file_id,m.from_desig_id,m.reciver_user_id,m.file_status,s.subject_name');
        $this->db->from('fts_file_registration r');
        $this->db->join('fts_file_movement m', 'r.file_id=m.file_id','left');

        if(chck_file_movement("r.file_reg_date >= '$start' and r.file_reg_date <= '$end'"))
        {
           $this->db->join('fts_personel_info p','m.reciver_user_id=p.user_id','left');
        }

        $this->db->join('fts_subject s', 'r.subject_id=s.subject_id');
        //$this->db->join('fts_user u', 'u.user_id=p.user_id');
		$this->db->where('r.file_reg_date >=', $file_reg_date." 00:00:01");
        $this->db->where('r.file_reg_date <=', $file_reg_date." 23:59:59");
		
		$this->db->limit($limit, $start);
        $query = $this->db->get();
		//echo $this->db->last_query();exit;
        $result=$query->result_array();
        $data=array();
        $section=array();
        foreach ($result as $row) 
             {
                $data[] = $row;
                $section[$row['file_id']]=$this->section_name($row['sec_id']);
             }

             $data_value[0]=$data;
             $data_value[1]=$section;
             
       return $data_value;
		}
		
		//count total row using date
 public function count_file_date($file_reg_date)
    {
        $query = $this->db->query("SELECT * FROM fts_file_registration where file_reg_date='$file_reg_date'");
        return $query->num_rows(); 
    }
		
		
		
		//count total row using description
        public function count_file_description($description)
        {
        	$query = $this->db->query("SELECT * FROM fts_file_registration where description='$description'");
        	return $query->num_rows(); 
        }
		
		//track file bydescription
        public function track_file_bydescription($description,$limit,$start)
        {
        $description=$description!=""?$description:'NULL';
        $this->db->select('r.user_id,r.file_id,r.file_ref_sl_no,r.subject_id,r.file_name,r.description,r.file_move_status,r.file_reg_date,m.received_date_time,m.from_desig_id,m.reciver_user_id,m.file_status');
        $this->db->from('fts_file_registration r');
        $this->db->join('fts_file_movement m', 'r.file_id=m.file_id','left');
        $this->db->like('r.description',$description);
        $this->db->limit($limit, $start);
        $query = $this->db->get();
       
        $result=$query->result_array();
        $data=array();
        $section=array();
        $name=array();
        foreach ($result as $row) 
             {
                $data[] = $row;
                if($row['reciver_user_id'])
                {
                 $name[$row['file_id']]=$this->user_name($row['reciver_user_id']);
                 $sec=$this->section_and_desig($row['reciver_user_id']);
                 $section[$row['file_id']]=$this->section_name($sec['sec_id']);
                }
                else
                {
                   $name[$row['file_id']]=$this->user_name($row['user_id']);
                  $sec=$this->section_and_desig($row['user_id']);  
                  $section[$row['file_id']]=$this->section_name($sec['sec_id']);
              }
             }
  
             $data_value[0]=$data;
             $data_value[1]=$section;
             $data_value[2]= $name;
             return $data_value;
        
        }

        //track file bytext
        public function track_file_bytext($text,$limit,$start)
        {
         // echo $text;exit;
        $text=$text!=""?$text:'NULL';
        
        $this->db->select('r.*,l.*');
        $this->db->from('fts_file_registration r');
        $this->db->join('fts_letter_record l use index (idx_content)', 'r.file_id=l.file_id');
        $this->db->like('l.content',$text);
        $this->db->limit($limit, $start);
        $query = $this->db->get();

       //echo $this->db->last_query();exit;
        $result=$query->result_array();
        //$count=$result['count(*)'];
        //if($result==NULL) echo "----";exit;
       // echo (sizeof($result));
          return $result;
        }
    
        //track file bysubject
        public function track_file_bysubject($subject_id,$limit,$start)
        {
           
        $this->db->select('r.user_id,r.file_id,r.file_ref_sl_no,r.file_move_status,r.file_reg_date,r.subject_id,r.file_name,r.description,m.received_date_time,m.from_desig_id,m.reciver_user_id,m.file_status');
        $this->db->from('fts_file_registration r');
        $this->db->join('fts_file_movement m', 'r.file_id=m.file_id','left');
        $this->db->where("(r.subject_id='$subject_id')");
        $this->db->limit($limit, $start);
        $query = $this->db->get();
       
        $result=$query->result_array();
        $data=array();
        $section=array();
        $name=array();
        foreach ($result as $row) 
             {
                $data[] = $row;
                if($row['reciver_user_id'])
                {
                 $name[$row['file_id']]=$this->user_name($row['reciver_user_id']);
                 $sec=$this->section_and_desig($row['reciver_user_id']);
                 $section[$row['file_id']]=$this->section_name($sec['sec_id']);
                }
                else
                {
                   $name[$row['file_id']]=$this->user_name($row['user_id']);
                  $sec=$this->section_and_desig($row['user_id']);  
                  $section[$row['file_id']]=$this->section_name($sec['sec_id']);
              }
             }
  
             $data_value[0]=$data;
             $data_value[1]=$section;
             $data_value[2]= $name;
             return $data_value;
             
        }   
        
        //count total row using subject_id
 public function count_file_sub_id($file_subject_id)
    {
        $query = $this->db->query("SELECT * FROM fts_file_registration where subject_id='$file_subject_id'");
        return $query->num_rows(); 
    }   



    //track file bybarcode
        public function track_file_bybarcode($barcode)
        {
            $barcode=$barcode!=""?$barcode:'NULL';
        $this->db->select('r.user_id,r.file_id,r.file_ref_sl_no,r.file_move_status,r.file_reg_date,r.subject_id,r.file_name,r.description,m.received_date_time,m.from_desig_id,m.reciver_user_id,m.file_status');
        $this->db->from('fts_file_registration r');
        $this->db->join('fts_file_movement m', 'r.file_id=m.file_id','left');
        $this->db->where("(r.br_value='$barcode')");
        
        $query = $this->db->get();
       
        $result=$query->result_array();
        $data=array();
        $section=array();
        $name=array();
        foreach ($result as $row) 
             {
                $data[] = $row;
                if($row['reciver_user_id'])
                {
                 $name[$row['file_id']]=$this->user_name($row['reciver_user_id']);
                 $sec=$this->section_and_desig($row['reciver_user_id']);
                 $section[$row['file_id']]=$this->section_name($sec['sec_id']);
                }
                else
                {
                   $name[$row['file_id']]=$this->user_name($row['user_id']);
                  $sec=$this->section_and_desig($row['user_id']);  
                  $section[$row['file_id']]=$this->section_name($sec['sec_id']);
              }
             }
  
             $data_value[0]=$data;
             $data_value[1]=$section;
             $data_value[2]= $name;
             return $data_value;
             
        }
        
        //track file bysection
        public function track_file_bysection($sec_id,$limit,$start)
        {
        $sec_id=$sec_id!=""?$sec_id:'NULL';
        $this->db->select('p.user_id');
        $this->db->from('fts_personel_info p');
        $this->db->like('p.sec_id',$sec_id);
        $this->db->limit($limit, $start);
        $query = $this->db->get();
       
        $result=$query->result_array();
        $data=array();
        $section=array();
        $file_id=array();
        $name=array();
        foreach ($result as $row) 
             {
                $uid=$row['user_id'];
                $query = $this->db->query("select r.user_id,r.file_id,r.file_ref_sl_no,r.file_move_status,r.file_reg_date,r.subject_id,r.file_name,r.description,m.received_date_time,m.from_desig_id,m.reciver_user_id,m.file_status from  fts_file_registration r left join fts_file_movement m on r.file_id=m.file_id  where reciver_user_id='$uid' or (user_id='$uid' and reciver_user_id is null)");
                $result1=$query->result_array();
                 foreach ($result1 as $row) 
                 {
                    $data[] = $row;
                    if($row['reciver_user_id'])
                    {
                     $name[$row['file_id']]=$this->user_name($row['reciver_user_id']);
                     $sec=$this->section_and_desig($row['reciver_user_id']);
                     $section[$row['file_id']]=$this->section_name($sec['sec_id']);
                    }
                    else
                    {
                       $name[$row['file_id']]=$this->user_name($row['user_id']);
                      $sec=$this->section_and_desig($row['user_id']);  
                      $section[$row['file_id']]=$this->section_name($sec['sec_id']);
                  }
                 }
               
             }
  
             $data_value[0]=$data;
             $data_value[1]=$section;
             $data_value[2]= $name;
             return $data_value;
        }   
        
        //count total row using sec_id
 public function count_file_secid($file_sec_id)
    {
        echo "----".$file_sec_id;
        $query = $this->db->query("SELECT * FROM fts_personel_info where sec_id like '%$file_sec_id%'");
        return $query->num_rows(); 
    }
        

    //file history
        public function file_history($fid)
        {
        $this->db->select('h.*,n.note_text');
        $this->db->from('fts_file_history_info h');
        $this->db->join('fts_file_note n', 'h.note_id=n.note_id','left');
        $this->db->where('h.file_id',$fid);
        $query = $this->db->get();
        $result=$query->result_array();
        $sender_name=array();
		$data=array();
        $reciver_name=array();
        $sender_section=array();
        $reciver_section=array();

             foreach ($result as $row) 
             {
                $data[] = $row;
                $sender_id=$row['user_id'];
                $receiver_id=$row['addressing_id'];
                $sender=$this->user_details($sender_id);
                $sender_name[$row['trail_id']]=$sender[0]['name'];
                $sender_section[$row['trail_id']]=$this->section_name($row['sender_section_id']);
                $reciver_name[$row['trail_id']]="";
                $reciver_section[$row['trail_id']]="";
                if(isset($receiver_id)&& $receiver_id !="" )
                {
                 $receiver=$this->user_details($receiver_id);
                 $reciver_name[$row['trail_id']]=$receiver[0]['name'];
                 $reciver_section[$row['trail_id']]=$this->section_name($row['addressing_section_id']);
                }
            
            }
            //echo count($reciver_name);exit;
             $data_value[0]=$data;
             $data_value[1]=$sender_name;
             $data_value[2]=$reciver_name;
             $data_value[3]=$sender_section;
             $data_value[4]=$reciver_section;
             return $data_value;
             
        }


// fetch_file_inbox
    public function fetch_file_inbox($limit, $start) {
        $user_id=$this->session->userdata('user_id');
        $this->db->select('r.file_id,r.file_ref_sl_no,r.sec_id,r.subject_id,r.file_reg_date,r.file_name,r.br_image_name,r.folder_name,m.file_id m_file_id,m.received_date_time,m.dispatch_key,m.file_receive_key,m.file_status,m.reciver_user_id,s.subject_name,se.sec_name');
        $this->db->from('fts_file_registration r');
        $this->db->join('fts_file_movement m', 'r.file_id =m.file_id');
        $this->db->join('fts_subject s', 'r.subject_id =s.subject_id');
        $this->db->join('fts_section se', 'r.sec_id =se.sec_id');
        $this->db->where("(r.user_id= $user_id and m.file_id is null)");
        $this->db->or_where('m.reciver_user_id', $this->session->userdata('user_id'));
        $this->db->limit($limit, $start);
        $query = $this->db->get();
        //echo $this->db->last_query();exit;
        $result=$query->result_array();
        return $result;
        }


    public function fetch_cp($fid) {

        if($this->letter_count($fid))
        {
            $query =$this->db->query("select cp_no,page_count from  fts_letter_record where cp_no =(select max(cp_no) from fts_letter_record where file_id='$fid')");
        
        $result=$query->result_array();
       // echo $this->db->last_query();exit;
        return $result;
        }
        return 1;
        }

    
    public function fetch_doc($limit, $start,$file_id) {
        
        $this->db->select('l.cp_no,l.letter_name');
        $this->db->from('fts_letter_record l');
        $this->db->where("(l.file_id='$file_id')");
        $this->db->order_by('letter_id','desc'); 
        $this->db->limit($limit, $start);
        $query = $this->db->get();
        //echo $this->db->last_query();exit;
        $result=$query->result_array();
        return $result;
        }

        public function file_note($file_id) {
        $this->db->select('f.*,h.date_of_action,u.name');
        $this->db->from('fts_file_note f');
        $this->db->where("(f.file_id='$file_id')");
        $this->db->join('fts_file_history_info h', 'f.note_id =h.note_id');
         $this->db->join('fts_user u', 'f.user_id =u.user_id');
        $this->db->order_by("f.note_id","desc");
        $query = $this->db->get();
        $result=$query->result_array();
        return $result;
        }


      

    public function fetch_reg_file($limit, $start) {
        $user_id=$this->session->userdata('user_id');
        $this->db->select('r.file_id,r.file_ref_sl_no,r.sec_id,r.folder_name,r.br_image_name,r.subject_id,r.file_reg_date,r.file_name,r.file_move_status,s.subject_name,se.sec_name');
        $this->db->from('fts_file_registration r');
        $this->db->join('fts_subject s', 'r.subject_id =s.subject_id','left');
        $this->db->join('fts_section se', 'r.sec_id =se.sec_id','left');
        $this->db->where("(r.user_id= $user_id)");
        //$this->db->or_where('m.reciver_user_id', $this->session->userdata('user_id'));
        $this->db->limit($limit, $start);
        $query = $this->db->get();
        $result=$query->result_array();
        return $result;
        }
    

    public function get_files($pre,$post_match)
        {
            $this->db->select('fts_file_registration');
            $this->db->from('fts_file_registration');
            $this->db->like('file_ref_sl_no',$pre,'after');
            $this->db->like('file_ref_sl_no',$post_match,'before');
            $row = $this->db->count_all_results();
            return $row; 
            
        }
   public function designation($condition) 
    {   
        $this->db->where_in('desig_id',$condition); 
        $query = $this->db->get('fts_designation');
       return $query->result_array();
       //echo $this->db->last_query();
    }


    // file_dispatch
    public function file_dispatch($file_id) {
        $this->db->select('r.file_id,r.file_name,r.file_ref_sl_no,r.sec_id,r.br_value,r.subject_id,r.file_reg_date,m.file_id m_file_id,m.from_desig_id,m.received_date_time,m.file_status,m.dispatch_key,s.subject_name,se.sec_name');
        $this->db->from('fts_file_registration r');
        $this->db->join('fts_file_movement m', 'r.file_id =m.file_id','left');
        $this->db->join('fts_subject s', 'r.subject_id =s.subject_id','left');
        $this->db->join('fts_section se', 'r.sec_id =se.sec_id','left');
        $this->db->where('r.file_id',$file_id);
        
        $query = $this->db->get();
        $result=$query->result_array();
        return $result;
        }



      // get_user
    public function get_user($designation_id) {
        $this->db->select('p.user_id');
        $this->db->from('fts_personel_info p');
        $this->db->like('p.desig_id',$designation_id);
        $query = $this->db->get();
        $result=$query->result_array();
        $str="";
         foreach( $result as $value)
         {
            $str.=$value['user_id'].',';
         }
          
         return $this->get_user_name($str);

        }  
        

    public function section_name($section_id)
    {
        $section_id=explode(',', $section_id);
        $this->db->select('s.sec_name');
        $this->db->from('fts_section s');
        $this->db->where_in('s.sec_id',$section_id);
        $query = $this->db->get();
        $result=$query->result_array();
        $section_name="";
         foreach ($result as $row) 
         {
            $section_name.=$row['sec_name'].',';
         }
         return $section_name;
    }
    
    public function user_details($user_id) 
    {
        
        $this->db->select('*');
        $this->db->from('fts_user u');
        $this->db->join('fts_personel_info p', 'u.user_id=p.user_id');
        $this->db->where('u.user_id',$user_id);
        $query = $this->db->get();
        $result=$query->result_array();
        return  $result;
    } 

         // get_user_name
    public function get_user_name($user_id) {
        $user_id=explode(",",$user_id);
        $this->db->select('e.emp_name,p.user_id');
        $this->db->from('fts_employee e');
        $this->db->join('fts_personel_info p', 'e.gpf_id=p.gpf_id');
        $this->db->where_in('p.user_id',$user_id);
        $query = $this->db->get();
        $result=$query->result_array();
        return  $result;
        }  

    public function section_and_desig($user_id)
    {
        $this->db->select('*');
        $this->db->from('fts_personel_info p');
        $this->db->where('p.user_id',$user_id);
        $query = $this->db->get();
        $result=$query->result_array();
        return  $result[0]; 
    }


     public function file_id_check($file_id)
    {
        $query = $this->db->query("SELECT * FROM fts_file_movement where file_id=$file_id");
        return $query->num_rows(); 
    }

    public function desig_name($desig_id)
    {
        $desig_id=explode(',', $desig_id);
        $this->db->select('d.desig_name');
        $this->db->from('fts_designation d');
        $this->db->where_in('d.desig_id',$desig_id);
        $query = $this->db->get();
        $result=$query->result_array();
        $desig_name="";
         foreach ($result as $row) 
         {
            $desig_name.=$row['desig_name'].',';
         }
         return $desig_name;
    }

    public function attach_correspondance_page($file_id)
    {
        $query = $this->db->query("SELECT * FROM fts_letter_record where file_id=$file_id");
        return $query->num_rows(); 
    }

   public function check_file_recive($file_id)
    { 
        $user_id=$this->session->userdata('user_id');
        $query = $this->db->query("SELECT r.file_id FROM fts_file_registration r left join fts_file_movement m  on r.file_id=m.file_id where m.reciver_user_id=$user_id and m.file_status='R'");
        return $query->num_rows(); 
    }

     public function check_file_register($file_id)
    { 
        $user_id=$this->session->userdata('user_id');
        $query = $this->db->query("SELECT r.file_id FROM fts_file_registration r left join fts_file_movement m  on r.file_id=m.file_id where r.user_id=$user_id and m.file_id is null");
        return $query->num_rows(); 
    }

   public function almari_check($file_id,$reciver_user_id)
    {
        $query = $this->db->query("SELECT * FROM fts_file_movement where file_id=$file_id and reciver_user_id=$reciver_user_id and file_status='A'");
        if($query->num_rows()==1)
        return 'almari';
        else
        return 'notalmari';    
         
    }

    public function almari_check_history($file_id,$user_id)
    {
        $query = $this->db->query("SELECT * FROM fts_file_history_info where file_id=$file_id and user_id=$user_id and action_type='A'");
        if($query->num_rows()==1)
        return 'almari';
        else
        return 'notalmari';    
         
    }

    public function user_name($user_id)
    {
        $this->db->select('name');
        $this->db->from('fts_user');
        $this->db->where('user_id',$user_id);
        $query = $this->db->get();
        $result=$query->result_array();  
        return $result[0]['name'];
    }

    public function check_brc($brc)
    {
        $query = $this->db->query("SELECT * FROM fts_file_registration where br_value='$brc'");
        if($query->num_rows()==1)
        return false;
        else
        return true;  
    }

     public function memono()
    {
       $this->db->select_max('memo_no');
       $this->db->like('reg_dt',date('Y'), 'after');
       $query = $this->db->get('fts_letter_record'); 
       $result=$query->row();
       return $result->memo_no;  
    }
	
}
?>