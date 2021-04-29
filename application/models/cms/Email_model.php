<?php

class Email_model extends Admin_core_model
{

  function __construct()
  {
    parent::__construct();

    $this->load->library('email');
    $config_mail['protocol']= getenv('MAIL_PROTOCOL');
    $config_mail['smtp_host']= getenv('SMTP_HOST');
    $config_mail['smtp_port']= getenv('SMTP_PORT');
    $config_mail['smtp_timeout']='30';
    $config_mail['smtp_user']= getenv('SMTP_EMAIL');
    $config_mail['smtp_pass']= getenv('SMTP_PASS');
    $config_mail['charset']='utf-8';
    $config_mail['newline']="\r\n";
    $config_mail['wordwrap'] = TRUE;
    $config_mail['mailtype'] = 'html';
    $this->email->initialize($config_mail);

    $this->load->model('cms/Home_model');
    $this->load->model('cms/Order_model');
  }

  public function sendOrderDetails($order_last_id)
  {
    $order = $this->Order_model->get($order_last_id);
    return $this->sendMail($order->customer_email, 'Test Subject', $this->buildEmailCredentialsBody($order));
  }

  public function sendMail($to, $subject, $message)
  {
    $this->email->from('rmagsakay@myoptimind.com', 'Cuadro');
    $this->email->to($to);
    $this->email->subject($subject);
    $this->email->message($message);
    return $this->email->send();
  }

  public function buildEmailCredentialsBody($last_entry)
  {

    $message = "<p>Test body Content</p><br>";

    return $message;
  }

} 