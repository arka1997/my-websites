<?php 

if (!defined('BASEPATH')){ exit('No direct script access allowed'); }

class Custommail
{ 
    function __construct()
    {
        $this->CI =& get_instance();
    }    

    private function _send_mail($to, $from, $subject, $body, $attachment = null)
    {
        $config['smtp_host'] = '';
        $config['smtp_port'] = '';
        $config['smtp_user'] = '';
        $config['smtp_pass'] = '';
        $config['mailtype']  = 'html'; 
        $config['charset']   = 'utf-8';

        $this->CI->load->library('email', $config);
        $this->CI->email->initialize($config);
        
        $this->CI->email->from($from);
        $this->CI->email->to($to);
        $this->CI->email->subject($subject);
        $this->CI->email->message($body);
        $this->CI->email->attach($attachment);
        $this->CI->email->send();
    }    

    public function demo($mail_data)
    {
        $body     = $this->CI->load->view('Your email template path', $mail_data, TRUE);
        $receiver = $mail_data['email'];
        $from     = 'shovannandi97@gmail.com'; 
        $subject  = $mail_data['subject'];

        $this->_send_mail($receiver, $from, $subject, $body);
    }
}

