<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Letter_to_file extends CI_Controller {
 	function __construct()
    {
	parent::__construct();
	$this->load->model(array('Letter_model','File_model','User_model','General_model'));
	$this->load->library("pagination");
  check_user_page_access();
    }


public function index()
	{
	      check_user_page_access();
        $data['active']='';
        $content=$this->load->view('letter_to_file/letter_to_file',$data,true);
        render($content);
          
	}

public function letter($id)
  {
        check_user_page_access();
        $data['active']='';
        $content=$this->load->view('letter_to_file/letter_to_file',$data,true);
        render($content);
          
  }

public function insert_to_file($letter_id)
  {
        check_user_page_access();
        $data['active']='';
         $result=$this->General_model->view_data('fts_file_registration',array('file_id'=>$this->input->post('fileid',TRUE)));
         $result2=$this->General_model->view_data('fts_letter_record',array('letter_id'=>$letter_id));
           $destination_folder=$result[0]['folder_name'];
          $source_folder=$result2[0]['location_path'];
          $file_name=$result2[0]['letter_name'];
         
      rename(APPPATH.'../repository/'.$source_folder.'/'.$file_name, APPPATH.'../repository/'.$destination_folder.'/'.$file_name);

        if($this->General_model->update_data('fts_letter_record',array('file_id'=>$this->input->post('fileid',TRUE),'location_path'=>$destination_folder,'attached_by'=>$this->session->userdata('user_id')),array('letter_id'=>$letter_id)))
          $this->session->set_flashdata('success_message', 'Letter inserted to a File successfully.');
        $content=$this->load->view('letter_to_file/letter_to_file',$data,true);
        render($content);
          
  }

	public function search_file()
  {
    
       check_user_page_access();
        $results= $this->Letter_model->search_file($this->input->post('keyword',TRUE));
        foreach($results as $value)
        {
            if(substr_count($this->input->post('keyword',TRUE),"/")>0)
            {
           echo '<li class="list-group-item" onclick="set_file('.$value["file_id"].',\''.$value["file_ref_sl_no"].'\')">'.$value["file_ref_sl_no"].'</li>';
           }
           else
           {
            echo '<li class="list-group-item" onclick="set_file('.$value["file_id"].',\''.$value["file_name"].'\')">'.$value["file_name"].'</li>';
           }
        }
        
  }

}
