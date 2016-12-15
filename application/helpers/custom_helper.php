<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('render'))
{
   function render($content)
  {
    $ci =& get_instance();
    $view_data=array('content' =>$content);
    $ci->load->view('layout',$view_data);
  }
  
}



if ( ! function_exists('check_user_page_access'))
{
  function check_user_page_access()
  {
    $ci =& get_instance();
    if( $ci->session->userdata('user_id')=='')
        {
            header('location:'.base_url());
            exit;
        }
    
  }
  
}

if ( ! function_exists('check_user_aspect'))
{
  function check_user_aspect()
  {
    $ci =& get_instance();
    if( $ci->session->userdata('user_id')=='' || $ci->session->userdata('user_type')!='admin')
        {
            header('location:'.base_url().'home_controller');
            exit;
        }
    
  }
  
}

if ( ! function_exists('emp_validation'))
{
  function emp_validation($val)
  {
    $ci =& get_instance();
    $ci->db->where('gpf_id',$val);
    $query = $ci->db->get('fts_employee');
    if ($query->num_rows() > 0){
        return true;
    }
    else{
        return false;
    }
  }
  
}

if ( ! function_exists('check_permission'))
{
  function check_permission()
  {
    $ci =& get_instance();
    $ci->db->where('user_id',$ci->session->userdata('user_id'));
    $query = $ci->db->get('fts_user');
    $result = $query->result_array();
    if($result[0]['is_active']=="N")
    {
       $session_data   = array('user_id',
                                'gpf_id',
                                'user_type'
               );
        $ci->session->unset_userdata($session_data);
        check_user_page_access();
    }
  }
  
}

if ( ! function_exists('my_encrypt'))
{
  function id_encrypt($text)
 {
  //echo "trace";
  $salt = md5("dicrebyc");
    return urlencode(trim(base64_encode(base64_encode($text))));
}
  
}


if ( ! function_exists('my_decrypt'))
{
 function id_decrypt($text)
 {
  $salt = md5("dicrebyc");
  $text=urldecode($text);
    return trim(base64_decode(base64_decode($text)));
}
  
}

if ( ! function_exists('fchar'))
{
  function fchar($s)
  {
         $words=preg_replace('/[^A-Za-z0-9\-(]/', ' ', $s);
    $words = preg_split("(\s+)",$words);
    $str="";
    foreach($words as $v)
    {
    if(substr($v,0,1)=='(')
    break;
    $str.=substr($v,0,1);
    }
    return $str;
  }
}

if ( ! function_exists('days_ago'))
{
function days_ago($ptime)
{
    $etime = strtotime(date('Y-m-d H:i:s')) - $ptime;

    if ($etime < 1)
    {
        return '0 seconds';
    }

    $a = array( 
                
                      24 * 60 * 60  =>  'day',
                           60 * 60  =>  'hour',
                                60  =>  'minute',
                                 1  =>  'second'
                );
    $a_plural = array( 
                       'day'    => 'days',
                       'hour'   => 'hours',
                       'minute' => 'minutes',
                       'second' => 'seconds'
                );

    foreach ($a as $secs => $str)
    {
        $d = $etime / $secs;
        if ($d >= 1)
        {
            $r = round($d);
           $hms= $r . ' ' . ($r > 1 ? $a_plural[$str] : $str);
           break;
        }
    }

//echo $r;
      if($r>365)
            {
                $yr=intval($r/365);

                if($r%365>30)
                {
                  $month=intval(($r%365)/30);

                  if($month%30>0)
                  {
                    $dy=$month%30;
                  }
                 return $yr." year(s)".$month." month(s)".$dy." day(s)";
                }
            }
      else if($r>30)
              {
                
                $month=intval($r/30);
                if($r%30>0){
                  $dy=$r%30;
                }
               return $month." month(s)".$dy." day(s)";
              }
    else
        {
          return $hms;
        }

}
}

if ( ! function_exists('letter_inbox_count'))
{
  function letter_inbox_count()
  {
    $ci =& get_instance();
    $ci->db->where('receiver_id', $ci->session->userdata('user_id'));
    $query = $ci->db->get('fts_letter_movement');
    if ($query->num_rows() > 0){
        return '(' . $query->num_rows() .')';
    }
    else{
        return '';
    }
  }
  
}


if ( ! function_exists('file_inbox_count'))
{
  function file_inbox_count()
  {
    $ci =& get_instance();
    $ci->db->where('reciver_user_id', $ci->session->userdata('user_id'));
    $query = $ci->db->get('fts_file_movement');
    if ($query->num_rows() > 0){
        return '(' . $query->num_rows() .')';
    }
    else{
        return '';
    }
  }
  
}

if ( ! function_exists('file_registar_count'))
{
  function file_registar_count()
  {
    $ci =& get_instance();
    $ci->db->where('user_id', $ci->session->userdata('user_id'));
    $ci->db->where('file_move_status !=','M');
    $query = $ci->db->get('fts_file_registration');
    if ($query->num_rows() > 0){
        return '(' . $query->num_rows() . ')';
    }
    else{
        return '';
    }
  }
  
}

if ( ! function_exists('letter_registar_count'))
{
  function letter_registar_count()
  {
    $ci =& get_instance();
    $ci->db->where('user_id', $ci->session->userdata('user_id'));
    $ci->db->where('letter_move_status','P');
     $ci->db->where('regis_status','L');
    $query = $ci->db->get('fts_letter_record');
    if ($query->num_rows() > 0){
        return '(' . $query->num_rows() . ')';
    }
    else{
        return '';
    }
  }
  
}

if ( ! function_exists('get_client_ip'))
{
function get_client_ip() {
    $ipaddress = '';
    if (isset($_SERVER['HTTP_CLIENT_IP']))
        $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
    else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
    else if(isset($_SERVER['HTTP_X_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
    else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
    else if(isset($_SERVER['HTTP_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_FORWARDED'];
    else if(isset($_SERVER['REMOTE_ADDR']))
        $ipaddress = $_SERVER['REMOTE_ADDR'];
    
    return $ipaddress;
  }
}
if ( ! function_exists('count_day'))
{
  function count_day($date)
  {
   $now = time(); 
   $your_date = strtotime($date);
   $datediff = $now - $your_date;
   return floor($datediff / (60 * 60 * 24));
  }
  
}


if ( ! function_exists('date_color'))
{
  function date_color($date)
  {
   $now = strtotime(date('Y-m-d')); 
   $your_date = strtotime($date);
     if($your_date>$now)
    return 'green';
    elseif($your_date==$now)
    return '#f8b230';
    elseif($your_date<$now)
    return 'red';
  }
  
}
if ( ! function_exists('date_format'))
{
  function date_format($date)
  {
  $dt=explode('/',$date);
  $dtt= $dt[2].'-'.$dt[1].'-'.$dt[0];
  return $dtt;
  }
  
}

if ( ! function_exists('year'))
{
  function year($y)
  {
  $yy=explode('/',$y);
  return  $yy[2];
  }
  
}
   