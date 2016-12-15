<?php
class User_model extends CI_Model
{
    public function __construct()
    {
	parent::__construct();
    }
// user authenticate check
    function authenticate($username, $password)
    {
		$sql = "SELECT * FROM fts_user WHERE
                user_name = '".$this->db->escape_str($username)."' AND password = '".$this->db->escape_str($password)."' ";
		$query= $this->db->query($sql);
		$result_arr= $query->result_array();
		if( isset($result_arr[0]) )
            return $result_arr[0];
		else
            return false;
    }
    // login session value initialization
    function log_this_login($user_data)
    {

		$this->db->update('fts_user', array('last_login'=>date('Y-m-d H:i:s')),array('user_id'=>$user_data['user_id'])); 
	    $session_data   = array('user_id'=>$user_data['user_id'],
                                'fullname'=>$user_data['name'],
                                'user_type'=>$user_data['user_type'],
                                'gpf_id'=>$user_data['gpf_id'],
							 );

		
        $this->session->set_userdata($session_data);
    }
    //logout
    function logout()
    {
        
       $session_data   = array('user_id',
                                'gpf_id',
                                'user_type',
                                'fullname',
							 );
        $this->session->unset_userdata($session_data);
        $this->session->sess_destroy();
    }
	
	//user_profile
		public function profile()
		{
		$this->db->select('u.user_id,u.gpf_id,u.user_name,u.phone,u.email,u.password,
		p.desig_id,p.sec_id');
        $this->db->from('fts_user u');
        $this->db->join('fts_personel_info p', 'u.user_id=p.user_id');
        $this->db->where('p.user_id',$this->session->userdata('user_id'));
        $query = $this->db->get();
        $result=$query->result_array();
        return  $result;
        
		}
		
		//setting
		public function setting()
		{
		$this->db->select('u.user_id,u.gpf_id,u.user_name,u.phone,u.email,u.password');
		$this->db->from('fts_user u');
		$result=$this->db->get();
			return($result);
			
		}
		
		//password check
		public function pass_check()
		{
			
			$this->db->select('password');
			$this->db->from('fts_user');
			$this->db->where('user_id',$this->session->userdata('user_id'));
			$query=$this->db->get();
			$result=$query->result_array();
			return $result;
			
		}
		
		
	
	//user count
    public function user_count() {
        return $this->db->count_all("fts_user");
    }
    // user data
    public function fetch_user_data($limit, $start) {
        $this->db->select('*');
        $this->db->from('fts_user u');
        
        $this->db->join('fts_personel_info p', 'u.user_id =p.user_id','left');

        $this->db->limit($limit, $start);
        $query = $this->db->get();
        $desig_name= array();
        $sec_name=array();

        if ($query->num_rows() > 0) {
            $data_value=array();
            $desig_name=array();
            foreach ($query->result_array() as $row) {
                $data[] = $row;

                $desig=explode(',', $row['desig_id']);
                $section=explode(',', $row['sec_id']);
                //print_r($desig);exit;
                $query2=$this->designation($desig);
                $query3=$this->section($section);
                //print_r($query2);
                $uid=$row['user_id'];
               
                $d_name="";
                foreach ($query2 as $value) {

                    //echo $uid;
                    $d_name.=$value['desig_name'].',';
                   
                }//exit;
                $desig_name[$uid]=$d_name;
                $s_name="";
                foreach ($query3 as $value) {

                    //echo $uid;
                    $s_name.=$value['sec_name'].',';
                   
                }//exit;
                $sec_name[$uid]=$s_name;
            }
           
            $data_value[0]=$data;
            $data_value[1]=$desig_name;
            $data_value[2]=$sec_name;
            return $data_value;
        }
        return false;
   }

   public function designation($condition) 
    {   
        $this->db->where_in('desig_id',$condition); 
        $query = $this->db->get('fts_designation');
       return $query->result_array();
       //echo $this->db->last_query();
    }
	
	public function section($condition)
	{
	    $this->db->where_in('sec_id',$condition); 
        $query = $this->db->get('fts_section');
        return $query->result_array();
	}

    // check valid mail id for forget password
        public function chk_mid($data)
        {
                $query=$this->db->query("Select email from fts_user where email='$data'");  
                if($query->num_rows()==1)
                {
                return TRUE;
                }
                else 
                {
                return FALSE;
                }
                
        }
	// generate password if forgot
        public function new_pass($password,$email)
        {
            $this->db->update('fts_user', array('password'=>$password),array('email'=>$email)); 
            return $this->db->affected_rows();          
            
        }

    public function user_status_chang($user_id)
     {
        $this->db->select('u.is_active');
        $this->db->from('fts_user u');
        $this->db->where('u.user_id',$user_id);
        $query = $this->db->get();
        $result=$query->result_array();
        if($result[0]['is_active']=='Y')
        {
           $this->db->update('fts_user', array('is_active'=>'N'),array('user_id'=>$user_id)); 
           if($this->db->affected_rows())
            return '<label style="color:red">Inactive</label>';
        }
        else
        {
           $this->db->update('fts_user', array('is_active'=>'Y'),array('user_id'=>$user_id)); 
           if($this->db->affected_rows())
            return '<label style="color:green">Active</label>';
        }
     }

         public function user_type_chang($user_id,$typevalue)
     {
    $this->db->update('fts_user', array('user_type'=>$typevalue),array('user_id'=>$user_id));
     }

}

?>