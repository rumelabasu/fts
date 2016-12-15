<?php
  defined('BASEPATH') OR exit('No direct script access allowed');
include APPPATH.'/libraries/pdfparser/vendor/autoload.php';
include APPPATH.'/libraries/merge/vendor/autoload.php';
require_once (APPPATH.'/libraries/merge/FPDI/fpdi.php');
require_once(APPPATH.'/libraries/merge/FPDI/fpdf.php');

use iio\libmergepdf\Merger;
use iio\libmergepdf\Pages;
   class Attach_to_file extends CI_Controller {

   	private $dir;

      public function __construct() { 
         parent::__construct();
         $this->load->helper(array('form', 'url')); 
         $this->load->model('File_model');
         $this->load->model('General_model');
         $this->load->library("pagination");
       
		
      }
		
      public function index($fid) { 
         
         $data['active']='';
         if($this->File_model->check_file_recive($fid)>0)
        {
         $data['data_value']=$this->General_model->view_data('fts_file_registration',array('file_id'=>$fid));
         $content=$this->load->view('file_registration/upload',$data,true);
         render($content);
        }
        
       else
       {

         echo "<script>alert('Please receive this file at first. Then you can attach.'); </script>";
         // redirect('File_inbox');
         redirect('file_inbox/receive/'.$fid, 'refresh');
    
       }

      } 
	
  public function attach_toReg_File($fid) { 
         
         $data['active']='';
         if($this->File_model->check_file_register($fid)>0)
          {
           $data['data_value']=$this->General_model->view_data('fts_file_registration',array('file_id'=>$fid));
           $content=$this->load->view('file_registration/upload',$data,true);
           render($content);
          }
        

      } 
	
     public function do_upload($fid) { 
      
      	$this->dir=str_replace("/","_",$this->input->post('ref_srl'));
    	if (!is_dir($this->dir))
        {
            @mkdir('./repository/'.$this->dir, 0777, true);
        }      
          $cpt=0;
          $file_count=0;
          $this->load->library('upload');
          $files = $_FILES;
          $success_file=array();
          if(isset($_FILES['letterfile']['name']))
          {
         $cpt = count($_FILES['letterfile']['name']);
          }

          //merger.......
            $m = new Merger();  
            $file_name="";  
    for($i=0; $i<$cpt; $i++)
    {   
        $cp=$this->File_model->fetch_cp($fid);
        $cp_no=$cp[0]['cp_no']+$cp[0]['page_count'];
       
        $ex=pathinfo($files['letterfile']['name'][$i],PATHINFO_EXTENSION);

        $m->addFromFile($ex);
        //$m->addFromFile('b.pdf');

        $file_name=str_replace(".".$ex,"_".time(),$files['letterfile']['name'][$i]).'.'.$ex;  
         
        $_FILES['letterfile']['name']= $file_name;
        $_FILES['letterfile']['type']= $files['letterfile']['type'][$i];
        $_FILES['letterfile']['tmp_name']=$files['letterfile']['tmp_name'][$i];
        $_FILES['letterfile']['error']= $files['letterfile']['error'][$i];
        $_FILES['letterfile']['size']= $files['letterfile']['size'][$i];    

        
         	  $file_count++;
          
     
			}
      file_put_contents($file_name, $m->merge());
      $this->upload->initialize($this->set_upload_options());
              if ( $this->upload->do_upload('letterfile')) {
                    $path='repository/'.$this->dir.'/'.$file_name;
                    $page=$this->getNumPagesPdf($path); 

                     $parser = new \Smalot\PdfParser\Parser();
                     $pdf    = $parser->parseFile($path);
                     $text = $pdf->getText();
                     $text=preg_replace('/\s+/', '',$text);

                    $attach=array( 
                      "file_id"=>$fid,
                      "letter_name"=>$file_name,
                      "cp_no"=>$cp_no, 
                      "page_count"=>$page,
                      "content"=>strtolower($text),
                      );
             echo $files['letterfile']['name'][$i];
            $success_file[$i]=$files['letterfile']['name'][$i];
          }
			if($file_count>0)
			{
			$data['success'] = "Uploaded files ".$file_count;
            $data['success_file']=$success_file; 
            $data['data_value']=$this->General_model->view_data('fts_file_registration',array('file_id'=>$fid));
            $content=$this->load->view('file_registration/upload', $data,true); 
             render($content);

			}
			else
			{
			$data['error'] =$this->upload->display_errors(); 
             $data['data_value']=$this->General_model->view_data('fts_file_registration',array('file_id'=>$fid));
             $content=$this->load->view('file_registration/upload', $data,true);
             render($content);

         	
			}
			
         
      } 


      private function set_upload_options()
{   
    //upload an image options
    $config = array();
    $config['upload_path'] ='repository/'.$this->dir;
    $config['allowed_types'] = 'pdf';
    $config['max_size']      = '800000';
    $config['overwrite']     = FALSE;

    return $config;
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
   public function file_list() { 
         check_user_page_access();
      $config = array();
        $config["base_url"] = base_url() . "attach_to_file/file_list";
        $config["total_rows"] = $this->File_model->registered_file_count();
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
        $data["results"] = $this->File_model->fetch_file_data($config["per_page"], $page);
        $data["links"] = $this->pagination->create_links();
        
        $data['active']='file_list_page';
    $content=$this->load->view('file_inbox/file_list',$data,true);
    render($content);


      } 






   } 

?>