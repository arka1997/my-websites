<?php 

if (!defined('BASEPATH')){ exit('No direct script access allowed'); }

class Customfunctions
{ 
    public function __construct()
    {
        $this->CI =& get_instance();
    } 

    public function convert_date_time($date_time)
    {
        $data = date('d M Y h:i A', strtotime($date_time));

        return $data;
    }

    public function convert_date($date)
    {
        $data = date('d M Y', strtotime($date));

        return $data;
    }    

    public function convert_time($time)
    {
       $data = date('h:i A', strtotime($time));

        return $data;
    } 

    public function upload_file($types, $field_name)
    {
        $config['upload_path']   = './uploads/';
        $config['allowed_types'] = $types;

        $this->CI->load->library('upload', $config);
        $this->CI->upload->initialize($config);

        if($this->CI->upload->do_upload($field_name))
        {
            $file_data = $this->CI->upload->data();
            $filename  = $file_data['file_name'];

            return $filename;
        }
        else
        {
            if($this->CI->upload->display_errors())
            {
                $this->CI->session->set_flashdata("error", $this->CI->upload->display_errors());

                redirect($this->CI->agent->referrer());
            }
        }
    }
}