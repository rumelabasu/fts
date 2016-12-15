<?php
class Letter_model extends CI_Model
{
    public function __construct()
    {
	parent::__construct();
    }

	
	//inbox_letter_count
    public function inbox_letter_count() {
        $user_id=$this->session->userdata('user_id');
        $query = $this->db->query("select * from fts_letter_movement where receiver_id ='$user_id'");
        return $query->num_rows();
    }
  //sent letter
    public function sent_letter_count() {
        $user_id=$this->session->userdata('user_id');
        $query = $this->db->query("select * from fts_letter_movement where sender_id ='$user_id'");
        return $query->num_rows();
    }
    public function users_regis_letter_count() {
        $this->db->where('user_id',$this->session->userdata('user_id'));
        $this->db->where('regis_status','L');
        $this->db->from('fts_letter_record');
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
		public function track_letter_byname($file_name,$limit,$start)
		{
			
        $this->db->select('r.file_id,r.file_name,r.file_ref_sl_no,r.sec_id,r.description,r.file_reg_date,r.file_name,m.from_desig_id,m.dispatch_date_time,m.received_date_time,m.reciver_user_id');
        $this->db->from('fts_file_registration r');
        $this->db->join('fts_file_movement m', 'r.file_id=m.file_id','left');
        $this->db->where("(r.file_name='$file_name')");
        $this->db->limit($limit, $start);
        $query = $this->db->get();
       //echo $this->db->last_query();
        $result=$query->result_array();
        return $result;
		}
		
		//count total row using name
        public function count_letter_name($file_name)
        {
        	$query = $this->db->query("SELECT * FROM fts_file_registration where file_name='$file_name'");
        	return $query->num_rows(); 
        }
		
		
//track letter bydate
        public function track_letter_bydate($reg_dt,$limit,$start)
        {

        $reg_dt=explode('/',$reg_dt);
         $reg_dt= $reg_dt[2].'-'.$reg_dt[1].'-'.$reg_dt[0];
        //$this->db->select('*');
        $this->db->select('r.*,m.letter_id,m.move_id,re.paper_type,au.authority_name');
        $this->db->from('fts_letter_record r');
        $this->db->join('fts_letter_movement m', 'r.letter_id=m.letter_id','left');
        $this->db->join('fts_letter_register re', 'r.register_id=re.register_id');
        $this->db->join('fts_authority au', 'r.sending_authority=au.authority_id');
        $this->db->where('r.reg_dt =', $reg_dt);
        //$this->db->where('r.reg_dt <=', $reg_dt);
        
        $this->db->limit($limit, $start);
        $query = $this->db->get();
       // echo $this->db->last_query();exit;
         
        $result=$query->result_array();
       
        //print_r($result);exit;
        $data=array();
        $section=array();
        $name=array();
        foreach ($result as $row) 
             {
                $data[] = $row;
                if(isset($row['receiver_id']))
                {
                 $name[$row['letter_id']]=$this->user_name($row['receiver_id']);
                 $sec=$this->section_and_desig($row['receiver_id']);
                 $section[$row['letter_id']]=$this->section_name($sec['sec_id']);
                }
                else
                {
                   $name[$row['letter_id']]=$this->user_name($row['user_id']);
                  $sec=$this->section_and_desig($row['user_id']);  
                  $section[$row['letter_id']]=$this->section_name($sec['sec_id']);
              }
             }
  
             $data_value[0]=$data;
             $data_value[1]=$section;
             $data_value[2]= $name;
             return $data_value;
             
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
 
        
    public function slno($register_id)
    {
       $this->db->select_max('sl_no');
       $this->db->like('reg_dt',date('Y'), 'after');
       $this->db->where('register_id',$register_id);
       $query = $this->db->get('fts_letter_record'); 
       $result=$query->row();
       return $result->sl_no;  
    }
    
		
       //count total row using date
 public function count_letter_date($reg_dt)
    {
        $reg_dt=explode('/',$reg_dt);
         $reg_dt= $reg_dt[2].'-'.$reg_dt[1].'-'.$reg_dt[0];
        $query = $this->db->query("SELECT * FROM fts_letter_record where reg_dt='$reg_dt'");
        return $query->num_rows(); 
    }


//count total row using paper_type
        public function count_letter_bycategory($paper_type)
        {
            $query = $this->db->query("SELECT * FROM fts_letter_record where register_id='$paper_type'");
            return $query->num_rows(); 
        }
		
//track letter bysubject
        public function track_letter_bycategory($paper_type,$limit,$start)
        {
            $paper_type=$paper_type!=""?$paper_type:'NULL';
            $this->db->select('r.*,m.letter_id,m.move_id,m.receiver_id,re.paper_type,au.authority_name');
            $this->db->from('fts_letter_record r');
            $this->db->join('fts_letter_movement m', 'r.letter_id=m.letter_id','left');
             $this->db->join('fts_letter_register re', 'r.register_id=re.register_id','left');
            $this->db->join('fts_authority au', 'r.sending_authority=au.authority_id','left');
            $this->db->like('r.register_id',$paper_type);
            $this->db->limit($limit, $start);
            $query = $this->db->get();
            $result=$query->result_array();
       
            //print_r($result);exit;
             $data=array();
            $section=array();
            $name=array();
            foreach ($result as $row) 
             {
                $data[] = $row;
                if(isset($row['receiver_id']))
                {
                 $name[$row['letter_id']]=$this->user_name($row['receiver_id']);
                 $sec=$this->section_and_desig($row['receiver_id']);
                 $section[$row['letter_id']]=$this->section_name($sec['sec_id']);
                }
                else
                {
                   $name[$row['letter_id']]=$this->user_name($row['user_id']);
                  $sec=$this->section_and_desig($row['user_id']);  
                  $section[$row['letter_id']]=$this->section_name($sec['sec_id']);
              }
             }
  
             $data_value[0]=$data;
             $data_value[1]=$section;
             $data_value[2]= $name;
             return $data_value;
        
        }
        //count total row using category_id
 //public function count_letter_cat_id($file_subject_id)
    //{
       // $query = $this->db->query("SELECT * FROM fts_file_registration where subject_id='$file_subject_id'");
       // return $query->num_rows(); 
    //}   
        


		//track file bydescription
		public function track_letter_bydescription($description,$limit,$start)
		{
		$this->db->select('r.file_id,r.file_ref_sl_no,r.subject_id,r.file_name,r.description,m.received_date_time,m.file_id,m.from_desig_id,m.reciver_user_id,m.file_status,s.subject_name,u.name,p.sec_id');
        $this->db->from('fts_file_registration r');
        $this->db->join('fts_file_movement m', 'r.file_id=m.file_id','left');
        $this->db->join('fts_personel_info p','m.reciver_user_id=p.user_id','left');
		$this->db->join('fts_subject s', 'r.subject_id=s.subject_id');
		$this->db->join('fts_user u', 'u.user_id=p.user_id');
		$this->db->like('r.description',$description);
        $this->db->limit($limit, $start);
        $query = $this->db->get();
       //echo $this->db->last_query();
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
		
		
		
		//count total row using subject
        public function count_letter_subject($description)
        {
            $query = $this->db->query("SELECT * FROM fts_letter_record where subject='$description'");
            return $query->num_rows(); 
        }



 

        //track letter bysubject
        public function track_letter_bysubject($description,$limit,$start)
        {
            $description=$description!=""?$description:'NULL';
            $this->db->select('r.*,m.letter_id,m.move_id,m.receiver_id,m.sender_id,re.paper_type,au.authority_name');
            $this->db->from('fts_letter_record r');
            $this->db->join('fts_letter_movement m', 'r.letter_id=m.letter_id','left');
            $this->db->join('fts_letter_register re', 'r.register_id=re.register_id','left');
            $this->db->join('fts_authority au', 'r.sending_authority=au.authority_id','left');
            $this->db->like('r.subject',$description);
            $this->db->limit($limit, $start);
            $query = $this->db->get();
            $result=$query->result_array();
       
            //print_r($result);exit;
             $data=array();
            $section=array();
            $name=array();
            foreach ($result as $row) 
             {
                $data[] = $row;
                if(isset($row['receiver_id']))
                {
                 $name[$row['letter_id']]=$this->user_name($row['receiver_id']);
                 $sec=$this->section_and_desig($row['receiver_id']);
                 $section[$row['letter_id']]=$this->section_name($sec['sec_id']);
                }
                else
                {
                   $name[$row['letter_id']]=$this->user_name($row['user_id']);
                  $sec=$this->section_and_desig($row['user_id']);  
                  $section[$row['letter_id']]=$this->section_name($sec['sec_id']);
              }
             }
  
             $data_value[0]=$data;
             $data_value[1]=$section;
             $data_value[2]= $name;
             return $data_value;
        
        }

        //count total row using subject_id
 public function count_letter_sub_id($file_subject_id)
    {
        $query = $this->db->query("SELECT * FROM fts_file_registration where subject_id='$file_subject_id'");
        return $query->num_rows(); 
    }   
        
        //track file bysection
        public function track_letter_bysection($sec_id,$limit,$start)
        {
        $this->db->select('r.file_id,r.file_ref_sl_no,r.sec_id,r.subject_id,r.description,r.file_reg_date,r.file_name,m.from_desig_id,m.dispatch_date_time,m.received_date_time,m.reciver_user_id,p.user_id,p.desig_id,p.sec_id,s.sec_name,u.name,m.file_status');
        $this->db->from('fts_file_registration r');
        $this->db->join('fts_file_movement m', 'r.file_id=m.file_id','left');
        $this->db->join('fts_personel_info p','m.reciver_user_id=p.user_id','left');
        $this->db->join('fts_section s', 'p.sec_id=s.sec_id');
        $this->db->join('fts_user u', 'u.user_id=p.user_id');
        $this->db->where("(p.sec_id='$sec_id')");
        $this->db->limit($limit, $start);
        $query = $this->db->get();
        //echo $this->db->last_query();exit;
        $result=$query->result_array();
        return $result; 
        }   
        
        //count total row using sec_id
 public function count_letter_secid($file_sec_id)
    {
        $query = $this->db->query("SELECT * FROM fts_file_registration where sec_id='$file_sec_id'");
        return $query->num_rows(); 
    }
        

    //file history
        public function letter_history($letter_id)
        {
        $this->db->select('*');
        $this->db->from('fts_letter_history_info h');
        $this->db->where('h.letter_id',$letter_id);
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
                $sender_id=$row['sender_user_id'];
                $receiver_id=$row['recv_id'];
                $sender=$this->user_details($sender_id);
                $sender_name[$row['trail_letter_id']]=$sender[0]['name'];
                $sender_section[$row['trail_letter_id']]=$this->section_name($row['sender_section_id']);
                $reciver_name[$row['trail_letter_id']]="";
                //$reciver_section[$row['']]="";
                if(isset($receiver_id)&& $receiver_id !="" )
                {
                 $receiver=$this->user_details($receiver_id);
                 $reciver_name[$row['trail_letter_id']]=$receiver[0]['name'];
                 $reciver_section[$row['trail_letter_id']]=$this->section_name($row['receiver_section_id']);
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


// fetch_letter_inbox
    public function fetch_letter_inbox($limit, $start) {
        $user_id=$this->session->userdata('user_id');
        $this->db->select('r.letter_id,r.memo_no,r.reg_dt,ac.action_status,r.issue_dt,r.subject,r.letter_name,m.receiver_id,m.dispatch_dt_time,m.sender_id,m.sender_desig_id,a.authority_name,ac.action_details,ac.deadline_dt,m.action_id');
        $this->db->from('fts_letter_record r');
        $this->db->join('fts_letter_movement m', 'r.letter_id =m.letter_id');
        $this->db->join('fts_authority a', 'r.sending_authority =a.authority_id');
         $this->db->join('fts_actionable_letter ac', 'm.action_id =ac.action_id');
        $this->db->where("(r.user_id= $user_id and m.letter_id is null)");
        $this->db->or_where('m.receiver_id', $this->session->userdata('user_id'));
        $this->db->limit($limit, $start);
        $query = $this->db->get();
        //echo $this->db->last_query();exit;
        $result=$query->result_array();
        return $result;
        }





    public function fetch_cp($fid) {

        if($this->letter_count($fid))
        {
            $query =$this->db->query("select cp_no,page_count from  fts_letter_record where cp_no in (select max(cp_no) from fts_letter_record where file_id='$fid')");
        
        $result=$query->result_array();
       // echo $this->db->last_query();exit;
        return $result;
        }
        return 0;
        }

    
    public function fetch_doc($limit, $start,$file_id) {
        
        $this->db->select('l.cp_no,l.letter_name');
        $this->db->from('fts_letter_record l');
        $this->db->where("(l.file_id='$file_id')");
        $this->db->limit($limit, $start);
        $query = $this->db->get();
        //echo $this->db->last_query();exit;
        $result=$query->result_array();
        return $result;
        }

        public function letter_note($file_id) {
        $this->db->select('*');
        $this->db->from('fts_file_note f');
        $this->db->where("(f.file_id='$file_id')");
        $this->db->order_by("f.note_id","desc");
        $query = $this->db->get();
        $result=$query->result_array();
        return $result;
        }

    public function fetch_reg_letter($limit, $start) {
        $user_id=$this->session->userdata('user_id');
        $this->db->select('letter_id,sending_authority,memo_no,reg_dt,subject,authority_name,letter_move_status');
        $this->db->from('fts_letter_record l');
        $this->db->join('fts_authority a', 'a.authority_id =l.sending_authority');
        $this->db->where("(regis_status= 'L')");
        $this->db->where('user_id',$user_id);
         $this->db->order_by("l.letter_id","desc");
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
    public function letter_dispatch($letter_id) {
        $this->db->select('r.letter_id,r.letter_name,r.memo_no,r.reg_dt,r.subject,r.sending_authority,m.sender_desig_id');
        $this->db->from('fts_letter_record r');
        $this->db->join('fts_letter_movement m', 'r.letter_id =m.letter_id','left');
        
        $this->db->where('r.letter_id',$letter_id);
        
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
        $this->db->select('p.desig_id,p.sec_id');
        $this->db->from('fts_personel_info p');
        $this->db->where('p.user_id',$user_id);
        $query = $this->db->get();
        $result=$query->result_array();
        return  $result[0]; 
    }


     public function letter_id_check($letter_id)
    {
        $query = $this->db->query("SELECT * FROM fts_letter_movement where letter_id=$letter_id");
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

   public function check_letter_recive($file_id)
    { 
        $user_id=$this->session->userdata('user_id');
        $query = $this->db->query("SELECT r.file_id FROM fts_file_registration r left join fts_file_movement m  on r.file_id=m.file_id where (r.user_id=$user_id and m.file_id is null) or (m.reciver_user_id=$user_id and m.file_status='R')");
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

     //track_letter_bymemono
        public function track_letter_bymemono($memono,$year)
        {
            $memono=$memono!=""?$memono:'NULL';
            $year=$year!=""?$year:'NULL';
        $this->db->select('r.*,m.receiver_id,m.sender_id,re.paper_type,au.authority_name');
        $this->db->from('fts_letter_record r');
        $this->db->join('fts_letter_movement m', 'r.letter_id=m.letter_id','left');
        $this->db->join('fts_letter_register re', 'r.register_id=re.register_id','left');
        $this->db->join('fts_authority au', 'r.sending_authority=au.authority_id','left');
        $this->db->where("(r.memo_no='$memono')");
        $this->db->like('r.reg_dt',$year,'after');
        $query = $this->db->get();
       
        $result=$query->result_array();
       
        //print_r($result);exit;
        $data=array();
        $section=array();
        $name=array();
        foreach ($result as $row) 
             {
                $data[] = $row;
                if(isset($row['receiver_id']))
                {
                 $name[$row['letter_id']]=$this->user_name($row['receiver_id']);
                 $sec=$this->section_and_desig($row['receiver_id']);
                 $section[$row['letter_id']]=$this->section_name($sec['sec_id']);
                }
                else
                {
                   $name[$row['letter_id']]=$this->user_name($row['user_id']);
                  $sec=$this->section_and_desig($row['user_id']);  
                  $section[$row['letter_id']]=$this->section_name($sec['sec_id']);
              }
             }
  
             $data_value[0]=$data;
             $data_value[1]=$section;
             $data_value[2]= $name;
             return $data_value;
             
        }



 


//track file bytext
        public function track_letter_bytext($text,$limit,$start)
        {
         // echo $text;exit;
        $text=$text!=""?$text:'NULL';
        
        $this->db->select('r.*,m.receiver_id,m.sender_id,re.paper_type,au.authority_name');
        //$this->db->from('fts_letter_record r use index (idx_content)');
        $this->db->from('fts_letter_record r');
        $this->db->join('fts_letter_movement m', 'r.letter_id=m.letter_id','left');
          $this->db->join('fts_letter_register re', 'r.register_id=re.register_id');
                $this->db->join('fts_authority au', 'r.sending_authority=au.authority_id');
        //$this->db->join('fts_letter_record l', 'r.file_id=l.file_id');
        $this->db->where('r.regis_status','L');
        $this->db->like('r.content',$text);
         $this->db->order_by("letter_id","desc");
        $this->db->limit($limit, $start);
        $query = $this->db->get();

       //echo $this->db->last_query();exit;
        $result=$query->result_array();
        $data=array();
            $section=array();
            $name=array();
            foreach ($result as $row) 
             {
                $data[] = $row;
                if(isset($row['receiver_id']))
                {
                 $name[$row['letter_id']]=$this->user_name($row['receiver_id']);
                 $sec=$this->section_and_desig($row['receiver_id']);
                 $section[$row['letter_id']]=$this->section_name($sec['sec_id']);
                }
                else
                {
                   $name[$row['letter_id']]=$this->user_name($row['user_id']);
                  $sec=$this->section_and_desig($row['user_id']);  
                  $section[$row['letter_id']]=$this->section_name($sec['sec_id']);
              }
             }
  
             $data_value[0]=$data;
             $data_value[1]=$section;
             $data_value[2]= $name;
             return $data_value;
        }
    

//count total row using description
        public function count_letter_description($text)
        {
             $text=$text!=""?$text:'NULL';
            $query = $this->db->query("SELECT * FROM fts_letter_record where content like '%$text%' and regis_status='L'");
            return $query->num_rows(); 
        }

    public function search_authority($keyword)
        {
            $keyword=$keyword!=""?$keyword:'NULL';
            $this->db->select('*');
            $this->db->from('fts_authority');
            $this->db->like('authority_name',$keyword,'after');
            $query = $this->db->get();
            $result=$query->result_array();  
            return $result;
           
        }

     //count total row using sending_authority
 public function count_letter_bysending_authority($authority)
    {
        $query = $this->db->query("SELECT * FROM fts_letter_record where sending_authority='$authority'");
        return $query->num_rows(); 
    }





         
 //track file bysending authority
       public function track_letter_bysending_authority($authority,$limit,$start)
        { 
            $authority=$authority!=""?trim($authority):'NULL';
            $this->db->select('r.*,m.letter_id,m.move_id,m.receiver_id,m.sender_id,re.paper_type,au.authority_name');
            $this->db->from('fts_letter_record r');
            $this->db->join('fts_letter_movement m', 'r.letter_id=m.letter_id','left');
                 $this->db->join('fts_letter_register re', 'r.register_id=re.register_id');
                $this->db->join('fts_authority au', 'r.sending_authority=au.authority_id');
            $this->db->where('r.sending_authority',$authority);
       
        $this->db->limit($limit, $start);
        $query = $this->db->get();
        $result=$query->result_array();
       //catecho $this->db->last_query();exit;
        //print_r($result);exit;
        $data=array();
        $section=array();
        $name=array();
        foreach ($result as $row) 
             {
                $data[] = $row;
                if(isset($row['receiver_id']))
                {
                 $name[$row['letter_id']]=$this->user_name($row['receiver_id']);
                 $sec=$this->section_and_desig($row['receiver_id']);
                 $section[$row['letter_id']]=$this->section_name($sec['sec_id']);
                }
                else
                {
                   $name[$row['letter_id']]=$this->user_name($row['user_id']);
                  $sec=$this->section_and_desig($row['user_id']);  
                  $section[$row['letter_id']]=$this->section_name($sec['sec_id']);
              }
             }
  
             $data_value[0]=$data;
             $data_value[1]=$section;
             $data_value[2]= $name;
             return $data_value;
             
        }

         public function search_file($keyword)
        {
            $keyword=$keyword!=""?$keyword:'NULL';
            $this->db->select('*');
            $this->db->from('fts_file_registration');
           
            if(substr_count($keyword,"/")>0)
            {
            $this->db->like('file_ref_sl_no', $keyword,'after'); 
            }
            else
            {
              $this->db->like('file_name',$keyword,'after');  
            }
            $query = $this->db->get();
            $result=$query->result_array();  
            return $result;
           
        }

        public function letter_status_chang($action_id)
     {
        $this->db->select('ac.action_status');
        $this->db->from('fts_actionable_letter ac');
        $this->db->where('ac.action_id',$action_id);
        $query = $this->db->get();
        $result=$query->result_array();
     
        if($result[0]['action_status']=='P')
        {
           $this->db->update('fts_actionable_letter', array('action_status'=>'AT'),array('action_id'=>$action_id)); 
           if($this->db->affected_rows())
            return '<span style="color:green">Action Taken</span>';
            
        }
        else
        {
           $this->db->update('fts_actionable_letter', array('action_status'=>'P'),array('action_id'=>$action_id)); 
           if($this->db->affected_rows())
            return '<span style="color:red">Pending</span>';
            
        }
     }

     public function action_notifcation()
     {
      $this->db->select('a.action_id,a.action_details,r.letter_name,r.memo_no');
      $this->db->from('fts_actionable_letter a');
      $this->db->join('fts_letter_history_info h', 'a.trail_letter_id=h.trail_letter_id');
      $this->db->join('fts_letter_record r', 'a.letter_id=r.letter_id');
      $this->db->where('h.sender_user_id',$this->session->userdata('user_id'));
      $this->db->where('a.action_status','AT');
      $query = $this->db->get();
      $result=$query->result_array();
      //echo $this->db->last_query();exit;
      return $result;
    }


    public function action_notifcation_count()
     {
      $this->db->select('a.action_id');
      $this->db->from('fts_actionable_letter a');
      $this->db->join('fts_letter_history_info h', 'a.trail_letter_id=h.trail_letter_id');
      $this->db->join('fts_letter_record r', 'a.letter_id=r.letter_id');
      $this->db->where('h.sender_user_id',$this->session->userdata('user_id'));
      $this->db->where('a.action_status','AT');
      $query = $this->db->get();
      return $query->num_rows();
    }


    public function section_letter_percent($sec_id)
     {
      $this->db->select('a.action_id');
      $this->db->from('fts_actionable_letter a');
      $this->db->join('fts_letter_history_info h', 'a.trail_letter_id=h.trail_letter_id');
      $this->db->where('h.receiver_section_id',$sec_id);
      $this->db->where('a.action_status','P');
      $query1 = $this->db->get();
     $pending=$query1->num_rows();

      $this->db->select('a.action_id');
      $this->db->from('fts_actionable_letter a');
      $this->db->join('fts_letter_history_info h', 'a.trail_letter_id=h.trail_letter_id');
      $this->db->where('h.receiver_section_id',$sec_id);
      $query2 = $this->db->get();
     $total=$query2->num_rows();
      if($total!=0)
      {
  return ($pending*100)/$total;
     }
     else
     {
      return 0;
     }

    }


    // fetch_letter_inbox
    public function fetch_letter_sent($limit, $start) {
        $user_id=$this->session->userdata('user_id');
        $this->db->select('r.letter_id,r.memo_no,r.reg_dt,h.date_of_action,ac.action_id,u.name,ac.action_status,r.issue_dt,r.subject,r.letter_name,h.recv_id,h.sender_user_id,h.sender_desig_id,a.authority_name,ac.action_details,ac.deadline_dt,ac.trail_letter_id');
        $this->db->from('fts_letter_record r');
        $this->db->join('fts_letter_history_info h', 'r.letter_id =h.letter_id');
        $this->db->join('fts_authority a', 'r.sending_authority =a.authority_id');
        $this->db->join('fts_user u', 'u.user_id =h.recv_id');
        $this->db->join('fts_actionable_letter ac', 'h.trail_letter_id =ac.trail_letter_id');
        $this->db->where('h.sender_user_id', $this->session->userdata('user_id'));
        $this->db->where('ac.deadline_dt !=', '0000-00-00');
        $this->db->order_by("ac.trail_letter_id","desc");
        $this->db->limit($limit, $start);
        $query = $this->db->get();
        //echo $this->db->last_query();exit;
        $result=$query->result_array();


        return $result;
        }


         public function letter_status_accept($action_id)
     {
        $this->db->select('ac.action_status');
        $this->db->from('fts_actionable_letter ac');
        $this->db->where('ac.action_id',$action_id);
        $query = $this->db->get();
        $result=$query->result_array();
        //print_r($result);exit;
        if($result[0]['action_status']=='AT')
        {
           $this->db->update('fts_actionable_letter', array('action_status'=>'C'),array('action_id'=>$action_id)); 
           if($this->db->affected_rows())
            return '<label style="color:green">Accepted</label>';
        }
        else
        {
           $this->db->update('fts_actionable_letter', array('action_status'=>'AT'),array('action_id'=>$action_id)); 
           if($this->db->affected_rows())
            return '<label style="color:red">Accept</label>';
        }
     }
    
	
}
?>