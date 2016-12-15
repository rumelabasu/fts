<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class File_inbox extends CI_Controller {

	function __construct()
    {
	parent::__construct();
	$this->load->model('File_model');
	$this->load->model('General_model');
	$this->load->library("pagination");
  //$this->load->helper('download');
	$this->load->library('barcode');
    check_user_page_access();
    }


	public function index()
	{
         
	    check_user_page_access();
     	$config = array();
        $config["base_url"] = base_url() . "file_inbox/index";
        $config["total_rows"] = $this->File_model->inbox_file_count();
        $config["per_page"] = 11;
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
        $data["results"] = $this->File_model->fetch_file_inbox($config["per_page"], $page);
        $data["links"] = $this->pagination->create_links();
        $data['active']='file_inbox_page';
        $this->session->set_userdata('page_name','inbox_list');
		$content=$this->load->view('file_inbox/file_inbox',$data,true);
		render($content);


	}

//track file byname
	public function track_file_byname()
	{
	
		$file_name="";

		if($this->input->post('name', TRUE)!="")
		{
		$this->session->set_userdata(array('file_name'=>$this->input->post('name', TRUE)));
	
		}
      $file_name=$this->session->userdata('file_name');
		$config = array();
        $config["base_url"] = base_url()."file_inbox/track_file_byname";
        $config["total_rows"] = $this->File_model->count_file_name($file_name);
        $config["per_page"] = 11;
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
		$data['active']='by_name_page';
        $data["results"] = $this->File_model->track_file_byname($file_name,$config["per_page"],$page);
        $data["links"] = $this->pagination->create_links();
		//$data['section']= $this->File_model->General_model->view_all_data('fts_section');		
		$content=$this->load->view('track_file/by_name',$data,true);
		render($content);	
				
	}
	
	
	
	//track file bydate
	public function track_file_bydate()
	{
		$file_reg_date="";
		if($this->input->post('issue_dt', TRUE)!="")
		{
		$this->session->set_userdata(array('file_reg_date'=>$this->input->post('issue_dt', TRUE)));
		$file_reg_date=$this->session->userdata('file_reg_date');
		}
		
		$config = array();
        $config["base_url"] = base_url()."file_inbox/track_file_bydate";
        $config["total_rows"] = $this->File_model->count_file_date($file_reg_date);
        $config["per_page"] = 11;
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
		$data['active']='by_date_page';
        $data["results"] = $this->File_model->track_file_bydate($file_reg_date,$config["per_page"],$page);
        $data["links"] = $this->pagination->create_links();
		//$data['section']= $this->File_model->General_model->view_all_data('fts_section');		
		$content=$this->load->view('track_file/by_date',$data,true);
		render($content);	
				
	}
	
    
    //track file bydescription
    public function track_file_bydescription()
    {
        $description="";
        //var_dump($this->input->post('des', TRUE));exit();
        if(trim($this->input->post('des', TRUE))!="")
        {
        $this->session->set_userdata(array('description'=>trim($this->input->post('des', TRUE))));
        
        }
        $description=trim($this->session->userdata('description'));
        $config = array();
        $config["base_url"] = base_url()."file_inbox/track_file_bydescription";
        $config["total_rows"] = $this->File_model->count_file_description($description);
        $config["per_page"] = 11;
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
        $data['active']='by_description_page';
        //echo $description;exit;
        $data["results"] = $this->File_model->track_file_bydescription(trim($description),$config["per_page"],$page);
        $data["links"] = $this->pagination->create_links();
        $data['section']= $this->File_model->General_model->view_all_data('fts_section');       
        $content=$this->load->view('track_file/by_description',$data,true);
        render($content);   
            
            
        
    }

//track file track_file_bytext
    public function track_file_bytext()
    {
       
        //var_dump($this->input->post('des', TRUE));exit();
        if(trim($this->input->post('text', TRUE))!="")
        {
        $this->session->set_userdata(array('text'=>trim($this->input->post('text', TRUE))));
        
        }
        $text=trim($this->session->userdata('text'));
        $config = array();
        $config["base_url"] = base_url()."file_inbox/track_file_bytext";
        $config["total_rows"] = $this->File_model->count_file_description($text);
        $config["per_page"] = 11;
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
        $data['active']='by_text_page';
        //echo $description;exit;
        $str=strtolower(preg_replace('/\s+/', '',$text));

        $data["results"] = $this->File_model->track_file_bytext(trim($str),$config["per_page"],$page);
       // print_r( $data["results"]);exit;
        $data["links"] = $this->pagination->create_links();
        $data['section']= $this->File_model->General_model->view_all_data('fts_section');       
        $content=$this->load->view('track_file/by_text',$data,true);
        render($content);   
            
            
        
    }
  //track file bysubject
  public function track_file_bysubject()
  {
    $subject="";
    if($this->input->post('sub', TRUE)!="")
    {
    $this->session->set_userdata(array('subject_id'=>$this->input->post('sub', TRUE)));
    }
    $subject=$this->session->userdata('subject_id');
    $config = array();
        $config["base_url"] = base_url()."file_inbox/track_file_bysubject";
        $config["total_rows"] = $this->File_model->count_file_sub_id($subject);
        $config["per_page"] = 11;
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
        $data['active']='track_file_bysubject_page';
        $data["results"] = $this->File_model->track_file_bysubject($subject,$config["per_page"],$page);
        $data["links"] = $this->pagination->create_links();
        $data['subject']= $this->File_model->General_model->view_all_data('fts_subject');
        $content=$this->load->view('track_file/by_subject',$data,true);
        render($content); 
      
    
  }
  
  //track file bybarcode
  public function track_file_bybarcode()
  {
    $barcode="";
    if($this->input->post('barcode', TRUE)!="")
    {
    $this->session->set_userdata(array('barcode'=>$this->input->post('barcode', TRUE)));
    }
    $ref_sl=$this->session->userdata('barcode');
    
        $data['active']='barcode_page';
        $data["results"] = $this->File_model->track_file_bybarcode(trim($ref_sl));
        $content=$this->load->view('track_file/by_barcode',$data,true);
        render($content); 
      
    
  }
  //track file bysection
  public function track_file_bysection()
  {
    $sec="";

    if(trim($this->input->post('sec', TRUE))!="")
    {
    $this->session->set_userdata(array('sec_id'=>trim($this->input->post('sec', TRUE))));

    }

    $sec=trim($this->session->userdata('sec_id'));
    $config = array();
        $config["base_url"] = base_url()."file_inbox/track_file_bysection";
        $config["total_rows"] = $this->File_model->count_file_secid($sec);
        $config["per_page"] = 11;
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
        $data["active"]="by_section_page";
        $data["results"] = $this->File_model->track_file_bysection(trim($sec),$config["per_page"],$page);
        $data["links"] = $this->pagination->create_links();
        $data['section']= $this->File_model->General_model->view_all_data('fts_section');   
        $content=$this->load->view('track_file/by_section',$data,true);
        render($content); 
      
    
  }
  
  
  public function file_history($fid)
  {
    $data["active"]="";
    $data["history"]= $this->File_model->file_history($fid);
      
      $content=$this->load->view('file_inbox/file_history',$data,true);
    render($content); 
      
  }
  
  

public function dispatch($file_id)
  {
      check_user_page_access();
       
        if($this->File_model->attach_correspondance_page($file_id)>0)
        {

           $data['active']='user_list';
        $data['designation']=$this->General_model->view_all_data('fts_designation');
        $sender=$this->File_model->section_and_desig($this->session->userdata('user_id'));
        $reciver=array("desig_id"=>'',"sec_id"=>'');
        if(trim($this->input->post('user_id', TRUE))!="")
        {
         $reciver=$this->File_model->section_and_desig($this->input->post('user_id', TRUE));
        }

        $barcode="";
                      while(1)
                      {
                        $barcode=mt_rand(1000, 9999); 
                        if($this->File_model->check_brc($barcode))
                        break;
                     }
                      // $folder_name=str_replace("/","_",$ref_sl);
                      //     @mkdir('./repository/'.$folder_name, 0777, true);
                      
                     
                    
       
        $this->load->library('form_validation');
        $this->form_validation->set_rules('designation', 'Addressed to (Designation)', 'required');
        $this->form_validation->set_rules('user_id', 'Addressed to (name)', 'required');
                $movement_data=array(
                                       "addressing_desig_id"=>$this->input->post('designation', TRUE),
                                       "reciver_user_id"=>$this->input->post('user_id', TRUE),
                                       "sender_user_id"=>$this->session->userdata('user_id'),
                                       "from_desig_id"=>$sender['desig_id'],
                                       "file_id"=>$this->input->post('file_id', TRUE),
                                       "delete_status"=>'N',
                                       "dispatch_date_time"=>date('Y-m-d H:i:s'),
                                       "dispatch_key"=> $this->input->post('br_value', TRUE),
                                       "file_status"=>'D',
                                       "dispatch_key"=>$barcode
                                       );
            $this->session->set_userdata('br_value',$barcode);
            $note_data=array(
                             "note_text"=>$this->input->post('note',TRUE),
                             "signature"=>$this->input->post('sig',TRUE),
                             "file_ref_sl_no"=>$this->input->post('file_ref_sl_no',TRUE),
                             "file_id"=>$this->input->post('file_id', TRUE),
                             "user_id"=>$this->session->userdata('user_id'),
                     );
                     
                           
                      $history_data=array( 
                                           
                                           "user_id"=>$this->session->userdata('user_id'),
                                           "addressing_desig_id"=>$reciver['desig_id'],
                                           "addressing_section_id"=>$reciver['sec_id'],
                                           "addressing_id"=>$this->input->post('user_id', TRUE),
                                           "sender_desig_id"=>$sender['desig_id'],
                                           "sender_section_id"=>$sender['sec_id'],
                                           "file_id"=>$this->input->post('file_id', TRUE),
                                           "action_type"=>'D',
                                           "date_of_action"=>date('Y-m-d H:i:s'),
                                           );

         if ($this->form_validation->run() == TRUE)
                {
                    if($this->File_model->file_id_check($file_id)==1)
                    {
                      if($this->General_model->update_data('fts_file_movement',$movement_data,array('file_id'=>$this->input->post('file_id', TRUE))))
                       {
                          $note_id=$this->General_model->insert_data('fts_file_note',$note_data);
                          $history_data['note_id']=$note_id;
                          $this->General_model->insert_data('fts_file_history_info',$history_data);
                          
                          $this->session->set_flashdata('success_message', 'Dispatched successfully.');
                         // $this->session->set_userdata('dis_key',$movement_data['dispatch_key']);
                          redirect('file_inbox/dispatch_success');
                         
                                  
                       }

                    }
                     else
                     {   //--------inserting data 
                       if($this->General_model->insert_data('fts_file_movement',$movement_data))
                       {
                          $this->General_model->update_data('fts_file_registration',array('file_move_status'=>'M'),array('file_id'=>$this->input->post('file_id', TRUE),'user_id'=>$this->session->userdata('user_id')));
                          $note_id=$this->General_model->insert_data('fts_file_note',$note_data);
                          $history_data['note_id']=$note_id;
                          $this->General_model->insert_data('fts_file_history_info',$history_data);
                          
                          $this->session->set_flashdata('success_message', 'Dispatched successfully.');
                          redirect('file_inbox/dispatch_success');
                          //  $this->load->view('barcode_download',$movement_data) ;     
                         //redirect('File_inbox');         
                       }
                   }
                }
               
        $data["results"] = $this->File_model->file_dispatch($file_id);
        $data["desig_name"] =$this->File_model->desig_name($data['results'][0]["from_desig_id"]);
       $content=$this->load->view('file_inbox/file_dispatch',$data,true);
        render($content);

    }
    else
    {
      echo "<script>alert('This file is empty, cannot be dispatched.'); </script>";
     // redirect('File_inbox');
       if($this->session->userdata('page_name')=='inbox_list')
       {
       redirect('attach_to_file/index/'.$file_id, 'refresh');
       }
       else if($this->session->userdata('page_name')=='reg_list')
       {
        redirect('attach_to_file/attach_toReg_File/'.$file_id, 'refresh');
       }
    }
  }


  public function file_view()
  {
    //echo $file_id=id_decrypt($file_id);exit;
      check_user_page_access();
      $get_vars = $this->input->get('fid');
      $file_id=id_decrypt($get_vars);
      $config = array();
      
        $config["base_url"] = base_url() . "file_inbox/file_view/?fid=$get_vars";
        $config["total_rows"] = $this->File_model->letter_count($file_id);
        $config["per_page"] = 10;
        $config["uri_segment"] = 3;
        $config['page_query_string'] = TRUE;
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

        //$page = ($this->uri->segment(3)) ? $this->uri->segment(3): 0;
         $page = ($this->input->get('per_page')) ? $this->input->get('per_page'): 0;
        $data["results"] = $this->File_model->fetch_doc($config["per_page"], $page,$file_id );
        $data["folder"] = $this->General_model->view_data('fts_file_registration',array('file_id'=>$file_id) );
        $data["file_note"] =$this->File_model->file_note($file_id);
        $data["links"] = $this->pagination->create_links();
        $data['active']='';
        $content=$this->load->view('file_inbox/file_view',$data,true);
        render($content);


  }


  
	public function fetch_emp_name()
	{
		
	    check_user_page_access();
        $results= $this->File_model->get_user($this->input->post('designation',TRUE));
        echo '<option value="">---Select one---</option>';
        foreach($results as $value)
        {
            if($this->session->userdata('user_id')!=$value['user_id'])
          echo '<option value="'.$value['user_id'].'">'.$value['emp_name'].'</option>';
        }

	}

	public function receive($file_id)
  {
      check_user_page_access();
        $data['active']='user_list';
        
        //$receiver=$this->File_model->section_and_desig($this->session->userdata('user_id'));
       
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('file_key_number', 'Flie key Number','required');
         if ($this->form_validation->run() == TRUE)
                {
                     $data_value=array(
                                       "file_receive_key"=>$this->input->post('file_key_number', TRUE),
                                       "delete_status"=>'N',
                                       "received_date_time"=>date('Y-m-d H:i:s'),
                                        "file_status"=>'R'
                                       );
                        //--------update
                     //echo $this->General_model->update_data('fts_file_movement',$data_value,array('reciver_user_id'=>$this->session->userdata('user_id'),'file_id'=>$this->input->post('file_id', TRUE),'dispatch_key'=>$this->input->post('file_key_number', TRUE)));exit;
                     if($this->General_model->update_data('fts_file_movement',$data_value,array('reciver_user_id'=>$this->session->userdata('user_id'),'file_id'=>$this->input->post('file_id', TRUE),'dispatch_key'=>$this->input->post('file_key_number', TRUE))))
                     {

                        $data_value=array(
                                           
                                           "user_id"=>$this->session->userdata('user_id'),
                                           
                                           "file_id"=>$this->input->post('file_id', TRUE),
                                           "action_type"=>'R',
                                           "date_of_action"=>date('Y-m-d H:i:s'),
                                           );
                        $this->General_model->insert_data('fts_file_history_info',$data_value);
                        $this->session->set_flashdata('success_message', 'Dispatched successfully.');
                        redirect('File_inbox');
                                
                                
                     }
                     else
                     {
                      $this->session->set_flashdata('error_message', 'File key number did not matched.');
                     }

                }
               
    $data["results"] = $this->File_model->file_dispatch($file_id);
    $data["desig_name"] =$this->File_model->desig_name($data['results'][0]["from_desig_id"]);
    
    $content=$this->load->view('file_inbox/file_receive',$data,true);
    render($content);
  }


  public function almari($file_id)
  {
      check_user_page_access();
        $data['active']='user_list';
        
        $receiver=$this->File_model->section_and_desig($this->session->userdata('user_id'));
       //echo $this->File_model->almari_check($file_id,$this->session->userdata('user_id'));exit;
       
      
                    if($this->File_model->almari_check($file_id,$this->session->userdata('user_id'))=='notalmari')
                    {

                       //echo "okkkkkkkkkkkkkkkkk";exit;    
                     $data_value=array(
                                        "delete_status"=>'N',
                                        "file_status"=>'A'
                                       );
                        //--------update
                     //echo $this->General_model->update_data('fts_file_movement',$data_value,array('reciver_user_id'=>$this->session->userdata('user_id'),'file_id'=>$file_id));exit;
                     if($this->General_model->update_data('fts_file_movement',$data_value,array('reciver_user_id'=>$this->session->userdata('user_id'),'file_id'=>$file_id)))
                     {

                        $data_value=array(
                                          "user_id"=>$this->session->userdata('user_id'),
                                           "file_id"=>$file_id,
                                           "action_type"=>'A',
                                           "date_of_action"=>date('Y-m-d H:i:s'),
                                           );
                        $this->General_model->insert_data('fts_file_history_info',$data_value);

                        $this->session->set_flashdata('success_message', 'Dispatched successfully.');
                        //redirect('File_inbox');
                         
                     }
                   
                   }

          
    redirect('file_inbox');
   
  }

  public function barcode_img_create()
  {
    $bc = new Barcode($this->session->userdata('dis_key')); 
    $nam=time().".jpg";
    //$this->session->set_userdata('barcode_name',$nam);
    $img=$bc->draw("barcode/".$nam);
    $this->session->set_userdata('barcode_name',$nam);
    //echo $this->session->userdata('barcode_name');
    $data['name']=$nam;
    $content=$this->load->view('file_inbox/barcode_download',$data,true);
    render($content);
  }

  public function barcode_download()
  {
    header("Content-type:application/jpg");
    header("Content-Disposition:attachment;filename='".$this->session->userdata('barcode_name')."'");
   
    readfile('barcode/'.$this->session->userdata('barcode_name'));
    if(file_exists(APPPATH.'../barcode/'.$this->session->userdata('barcode_name')))
    unlink(APPPATH.'../barcode/'.$this->session->userdata('barcode_name'));
  }

  public function dispatch_success()
  {
    $content=$this->load->view('file_inbox/dispatch_success',$data=array(),true);
    render($content);
  }
}
