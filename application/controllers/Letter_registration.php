<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include APPPATH.'/libraries/pdfparser/vendor/autoload.php';
include APPPATH.'/libraries/merge/vendor/autoload.php';
require_once (APPPATH.'/libraries/merge/FPDI/fpdi.php');
require_once(APPPATH.'/libraries/merge/FPDI/fpdf.php');
use iio\libmergepdf\Merger;
use iio\libmergepdf\Pages;
class Letter_registration extends CI_Controller {
 	function __construct()
    {
	parent::__construct();
	$this->load->model(array('Letter_model','File_model','User_model','General_model'));
	$this->load->library("pagination");

	date_default_timezone_set("Asia/Kolkata");
  check_user_page_access();
    }


public function index()
	{
	    check_user_page_access();
       check_permission();
	    $data['active']='registration_page';
        $data['authority']=$this->General_model->view_all_data('fts_authority');
        $data['register']=$this->General_model->view_all_data('fts_letter_register');
      
          $data['designation']=$this->General_model->view_all_data('fts_designation');
        $content=$this->load->view('letter_registration/upload',$data,true);
        render($content);
          
	}


public function letter_register()
  {
    check_user_page_access();
    //echo $this->File_model->users_regis_file_count();exit;
    $config = array();
        $config["base_url"] = base_url() . "letter_registration/letter_register";
        $config["total_rows"] = $this->Letter_model->users_regis_letter_count();
        $config["per_page"] = 10;
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
        $data["results"] = $this->Letter_model->fetch_reg_letter($config["per_page"], $page);
        $data["links"] = $this->pagination->create_links();
        $data['active']='registered_letterlist';
        $this->session->set_userdata('page_name','reg_list');
        $content=$this->load->view('letter_registration/registered_letterlist',$data,true);
      render($content);
  }

public function letter_insert()
	               {
		
                       $this->load->library('form_validation');
         
                        $this->form_validation->set_rules('issue_dt', 'issue_dt', 'required');
                        $this->form_validation->set_rules('authority', 'sending_authority', 'required');
                        $this->form_validation->set_rules('designation', 'designation', 'required');
                        $this->form_validation->set_rules('ltr_sub', 'Subject', 'required');      
                       
                       
//new field for others....        
       
         $data['authority']=$this->General_model->view_all_data('fts_authority');
        $data['register']=$this->General_model->view_all_data('fts_letter_register');
      
       
           $data['designation']=$this->General_model->view_all_data('fts_designation');
         if($this->input->post('authority', TRUE)=="add_authority_name")
                    {
                  
$this->form_validation->set_rules('add_authority_name', 'add_authority_name','required|is_unique[fts_authority.authority_name]',array('is_unique'=> 'This is already exists.'));
             }
        
        
                if ($this->form_validation->run() == FALSE)
                {
                        $content=$this->load->view('letter_registration/upload', $data,true); 
                         render($content);
                }
                else
                {
                $authority_id='';
                  if($this->input->post('authority_id', TRUE)=="add_authority_name")
                  {
                    $auth_add=array("authority_name"=>$this->input->post('add_authority_name', TRUE));
                    $authority_id=$this->General_model->insert_data('fts_authority',$auth_add);  
                  }
                  else
                  {
                    $authority_id=$this->input->post('authority_id', TRUE);
                  }

       
          $cpt=0;
          $file_count=0;
          $this->load->library('upload');
          $files = $_FILES;
          $success_file=array();
          if(isset($_FILES['letterfile']['name']))
          {
             $this->form_validation->set_rules('letterfile', 'Upload letter', 'required');
         $cpt = count($_FILES['letterfile']['name']);
          }
          
    $m = new Merger();   
    for($i=0; $i<$cpt; $i++)
    {   
        $cp=1;
        $cp_no=$cp[0]['cp_no']+$cp[0]['page_count'];
       
        $ex=pathinfo($files['letterfile']['name'][$i],PATHINFO_EXTENSION);
        $file_name=str_replace(".".$ex,"_".time(),$files['letterfile']['name'][$i]).'.'.$ex;  
         
        $_FILES['letterfile']['name']= $file_name;
        $_FILES['letterfile']['type']= $files['letterfile']['type'][$i];
        $_FILES['letterfile']['tmp_name']=$files['letterfile']['tmp_name'][$i];
        $_FILES['letterfile']['error']= $files['letterfile']['error'][$i];
        $_FILES['letterfile']['size']= $files['letterfile']['size'][$i];    

        //$this->upload->initialize($this->set_upload_options());
        
       
        $m->addFromFile($files['letterfile']['tmp_name'][$i]);
         
     
            }
      $pdf_name=time().'.pdf';
      $pdf_path_name='repository/letter/'.$pdf_name;
      file_put_contents($pdf_path_name, $m->merge());
      // if ( $this->upload->do_upload($pdf_name)) {
                   // $path='repository/'.$this->dir.'/'. $pdf_name;
                    $page=$this->getNumPagesPdf($pdf_path_name); 

                     $parser = new \Smalot\PdfParser\Parser();
                     $pdf    = $parser->parseFile($pdf_path_name);
                     $text = $pdf->getText();
                     $text=preg_replace('/\s+/', '',$text);

                    $attach=array( 
                      "sl_no"=>$this->input->post('slno'),
                      "register_id"=>$this->input->post('letter_cat'),
                      "memo_no"=>$this->input->post('memono'),
                      "issue_dt"=>date("Y-m-d",strtotime($this->input->post('issue_dt'))),
                      "sending_authority"=>$authority_id,
                      "subject"=>$this->input->post('ltr_sub'),
                      "addressing_desig_id"=>$this->input->post('designation'),
                      "addressing_user_id"=>$this->input->post('user_id'),
                      "reg_dt"=>date('Y-m-d'),
                      "user_id"=>$this->session->userdata('user_id'),
                      "location_path"=>"letter",
                      "letter_name"=>$pdf_name,
                      "cp_no"=>$cp_no, 
                      "page_count"=>$page,
                      "content"=>strtolower($text),
                      "regis_status"=>'L',
                      "letter_move_status"=>'P'
                      );
          
         if( $this->General_model->insert_data('fts_letter_record',$attach))
         {
          $this->session->set_flashdata('success_message', 'The Letter is registered successfully.');
          redirect('letter_registration');
        }
         
            }
	    }



public function almari($file_id)
  {
      check_user_page_access();
        $data['active']='user_list';
        
        $receiver=$this->File_model->section_and_desig($this->session->userdata('user_id'));
       //echo $this->File_model->almari_check($file_id,$this->session->userdata('user_id'));exit;
       
      
                    if($this->File_model->almari_check_history($file_id,$this->session->userdata('user_id'))=='notalmari')
                    {

                     
                        //--------update
                     //echo $this->General_model->update_data('fts_file_movement',$data_value,array('reciver_user_id'=>$this->session->userdata('user_id'),'file_id'=>$file_id));exit;
                    
                        $data_value=array(
                                           
                                           "user_id"=>$this->session->userdata('user_id'),
                                           
                                           "file_id"=>$file_id,
                                           "action_type"=>'A',
                                           "date_of_action"=>date('Y-m-d H:i:s'),
                                           );
                        $this->General_model->insert_data('fts_file_history_info',$data_value);
                        $this->General_model->update_data('fts_file_registration',array('file_move_status'=>'A'),array('file_id'=>$file_id,'user_id'=>$this->session->userdata('user_id')));
                        $this->session->set_flashdata('success_message', 'Dispatched successfully.');
                        
                   }

          
    redirect('letter_registration/letter_register');
   
  }

public function getNumPagesPdf($path){
    $fp = @fopen(preg_replace("/\[(.*?)\]/i", "",$path),"r");
    $max=0;
    while(!feof($fp)) {
            $line = fgets($fp,255);
            if (preg_match('/\/Count [0-9]+/', $line, $matches)){
                    preg_match('/[0-9]+/',$matches[0], $matches2);
                    if ($max<$matches2[0]) $max=$matches2[0];
            }
    }
    fclose($fp);
    if($max==0){
        $im = new imagick($path);
        $max=$im->getNumberImages();
    }

    return $max;
}

	public function search_authority()
  {
    
      check_user_page_access();
        $results= $this->Letter_model->search_authority(trim($this->input->post('keyword',TRUE)));
        
        foreach($results as $value)
        {
  
           echo '<li class="list-group-item" onclick="set_item('.$value["authority_id"].',\''.$value["authority_name"].'\')">'.$value["authority_name"].'</li>';
        }
        echo '<li class="list-group-item" onclick="set_item('.'\''.'add_authority_name'.'\''.',\''.'Other'.'\')">Other</li>';

  }


  public function lettercat()
  {
    
      check_user_page_access();
      $sl_no=$this->Letter_model->slno($this->input->post('letter_cat',TRUE))+1;
      echo $sl_no;
        
      

  }


}
