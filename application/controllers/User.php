<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class User extends CI_Controller 
{
  function __construct()
    {
	parent::__construct();
	$this->load->model('User_model');
	$this->load->model('General_model');
	$this->load->library("pagination");

    }


//login
	public function login()
	{
	$username=$this->input->post('username', TRUE);
	$fullname=$this->input->post('name', TRUE);
	$password=md5($this->input->post('pwd', TRUE));
	$user_type=$this->input->post('user_type', TRUE);
	$user_ip=get_client_ip();
	$data_arr= $this->User_model->authenticate($username,$password);
	if($this->input->post('username', TRUE)!="")
	{
		if(isset($data_arr) && is_array($data_arr))
            {
            	if($data_arr['is_active']=='Y')
            	{
					$this->User_model->log_this_login($data_arr);
		            redirect('Home_controller');
		            exit;
	         	}
         		else
         		{
         			$this->session->set_flashdata('error_message', 'You are not permitted by Administrator');
         		}
			 }
            else
            {
				
				$this->session->set_flashdata('error_message', 'Invalid username or password');
				
            }
			}
			$this->load->view('user/login');
	}
	
	//logout
	 function logout()
    {
		$this->User_model->logout();
		redirect('Main_controller');
    }
	
	
	//profile
	function profile()
	{
		check_user_page_access();
		

		$data['data_value']=$this->User_model->profile();
		//echo $data['data_value'][0]['sec_id'];
		//print_r (explode(',',$data['data_value'][0]['sec_id']));exit;
		$data['designation']=$this->User_model->designation(explode(',',$data['data_value'][0]['desig_id']));
		$data['sec_name']=$this->User_model->section(explode(',',$data['data_value'][0]['sec_id']));
		
		       $content=$this->load->view('user/user_profile',$data,true);
		    render($content);
			
	}
	//profile update
	
	function profile_update()
	{
		$data_value=array(
		              
					  "email"=>$this->input->post('email', TRUE),
					  "user_name"=>$this->input->post('uname', TRUE),
					  "phone"=>$this->input->post('phone', TRUE),
					  );
		
	if($this->General_model->update_data('fts_user',$data_value,array('user_id'=>$this->session->userdata('user_id'))))
	{
	$this->session->set_flashdata('success_message', 'The User Profile is updated successfully.');
	}
redirect('user/profile');
	}
	
	//setting
	function setting()
	{
		check_user_page_access();
		$data['data_value']=$this->User_model->setting();
		$str=$this->User_model->pass_check();
		$data_value=array(
		              
					  "password"=>md5($this->input->post('npwd', TRUE)),
					  
					  );
		
		if($this->input->post('opwd')!='')
		{
			
		if(md5($this->input->post('opwd'))==$str[0]['password'])
		{
			
		if($this->General_model->update_data('fts_user',$data_value,array('user_id'=>$this->session->userdata('user_id'))))
		{
			$this->session->set_flashdata('error_message', '');
	$this->session->set_flashdata('success_message', 'New Password is updated successfully.');
	}
		}
		else
		{
			$this->session->set_flashdata('success_message', '');
	
			$this->session->set_flashdata('error_message', 'Old and New Password Mismatched');
		}
		}
		$content=$this->load->view('user/user_setting',$data,true);
		    render($content);
		
		
	}
	

				       
			          
	                

    //registration 
	 function signup()
    {
		    
		        $data['section_name']=$this->General_model->view_all_data('fts_section');
                $data['designation']=$this->General_model->view_all_data('fts_designation');
				        $this->load->library('form_validation');
				       
                $this->form_validation->set_rules('section[]', 'Section Name', 'required');
				        $this->form_validation->set_rules('phone', 'Contact No', 'required');
                $this->form_validation->set_rules('designation[]', 'Desination', 'required');
                $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[fts_user.email]');
			          $this->form_validation->set_rules('pwd', 'Password', 'required');
                $this->form_validation->set_rules('uname', 'User Name', 'is_unique[fts_user.user_name]');
                if ($this->form_validation->run() == FALSE)
                {
                        $this->load->view('user/user_registration',$data);

                }
                else
                {
		            $str_uname="";
				    if($this->input->post('uname', TRUE)=="")
				    {
		            $str_uname=$this->input->post('email', TRUE);
				    }
				    else
				    {
		              $str_uname=$this->input->post('uname', TRUE);
				    }	

		              $data_value=array(
		              	               "gpf_id"=>$this->input->post('gpf', TRUE),
		              	               "name"=>strtoupper($this->input->post('name', TRUE)),
		              	               "user_name"=>$str_uname,
		              	               "email"=>$this->input->post('email', TRUE),
		              	               "phone"=>$this->input->post('phone', TRUE),
									   "password"=>md5($this->input->post('pwd', TRUE)),
                                       "user_type"=>'normal_user',
		              	               "is_active"=>'N',
		              	               "reg_date"=>date('Y-m-d H:i:s')
		              	               );

                    $desig_id='';
                	if(implode("",$this->input->post('designation', TRUE))=="others")
                	{
                	 	
                	 	$desig_add=array("desig_name"=>$this->input->post('add_desig', TRUE));
                		$desig_id=$this->General_model->insert_data('fts_designation',$desig_add);	
                	}
                	else
                	{
                		
                		$desig_id=implode(",",$this->input->post('designation', TRUE));
                	}

		              //--------inserting data user table
		             if($last_id=$this->User_model->General_model->insert_data('fts_user',$data_value))
		             {
                        //--------inserting data personel table
                           $personel_info=array(
                                       "user_id"=>$last_id,
                                       "gpf_id"=>$this->input->post('gpf', TRUE),
                                       "desig_id"=>$desig_id,
                                       "sec_id"=>implode(",",$this->input->post('section', TRUE))
                                       );
                          $this->User_model->General_model->insert_data('fts_personel_info',$personel_info);
		             	        $this->session->set_flashdata('success_message', 'You have registered successfully.<br> Please wait for varification by the Administrator.');
						              $this->load->view('user/login');
		             }

                }
                
	}
	
	public function gpf_validation($str)
        {
                if (!emp_validation($str))
                {
                        $this->form_validation->set_message('gpf_validation', 'Your GPF No. is wrong. Please check the number.');
                        return FALSE;
                }
                else
                {
                        return TRUE;
                }
        }
     public function user_list()
     {
     	check_user_aspect();
     	$config = array();
        $config["base_url"] = base_url() . "user/user_list";
        $config["total_rows"] = $this->User_model->user_count();
        $config["per_page"] = 7;
        $config["uri_segment"] = 3;
        //config for bootstrap pagination class integration
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = false;
        $config['last_link'] = false;
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = '&laquo';
        $config['prev_tag_open'] = '<li class="prev">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '&raquo';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';


        $this->pagination->initialize($config);

        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data["results"] = $this->User_model->fetch_user_data($config["per_page"], $page);
        $data["links"] = $this->pagination->create_links();
        $data['designation']=$this->General_model->view_all_data('fts_designation');
        $data['active']='user_list_page';
		    $content=$this->load->view('user/user_list',$data,true);
		    render($content);


     }

     //forget password
	
	public function forget_password()
	{
		//$this->session->set_flashdata('error_message', '');
		$this->load->view('user/forget_password');
	//redirect('user/profile');
	}
	 
	  
	 //check mail_id for forget password
	
	public function ckh_mailid()
	{
	
	  if($this->User_model->chk_mid($this->input->post('email')))
	  {
	  		
			$password = (mt_rand(1000000,9999999));
			$this->User_model->new_pass(md5($password),$this->input->post('email'));
			
	  		$this->session->set_flashdata('success_message', 'Your password is updated check your email.');
			redirect('user/forget_password');
			
			//$value=$this->General_model->view_data('fts_user'$this->input->post('email');
			//print_r $value exit;
	  }
	  else
	  {
	  $this->session->set_flashdata('err_message', '<br>Your email id is incorrect.');
	  redirect('user/forget_password');
	  
	  }
	}
	
	public function user_status()
     {
      $user_id=$this->input->post('id', TRUE);
      echo  $this->User_model->user_status_chang($user_id);
     }
	
	public function user_type()
     {
      $user_id=substr($this->input->post('id', TRUE),1);
      $typevalue=$this->input->post('typevalue', TRUE);
     $this->User_model->user_type_chang($user_id,$typevalue);
      
     }
	
}
