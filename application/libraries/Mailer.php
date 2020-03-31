<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mailer
{
    public function __construct()
    {
        $this->ci =& get_instance();
        $this->ci->load->config('custom_config');
    }
    function mailer_template($args)
    {
        $content = $args['CONTENT'];
        $base_url = $this->ci->config->item('BASE_URL');
        $banner = $base_url.'/assets/images/mailer/banner.jpg'; 
        $html =<<<HTML
<html>
<head>
<title>Bigleep Welcome</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body bgcolor="#FFFFFF" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<center>
<table id="Table_01" width="600" border="0" cellpadding="0" cellspacing="0" style="border: 1px solid #ccc;">
    <tr>
        <td><img src="$base_url/assets/images/mailer/banner.jpg" width="" alt="Bigleep" style="display:block;"></td>
    </tr>
    <tr>
        <td style="padding: 30px 50px; font-family: arial; font-size: 15px; line-height: 25px; text-align: justify;">
            $content
        </td>
    </tr>
    <tr>
        <td><img src="$base_url/assets/images/mailer/footer.jpg" alt="footer" style="display:block;"></td>
    </tr>
</table>
</center>
</body>
</html>
HTML;
        return $html;
    }

    function smtp($args)
    {
        $this->ci->load->library('email');
       
        $subject = isset($args['SUBJECT']) && $args['SUBJECT']?$args['SUBJECT'] : 'Welcome to BigLeep'; 
        $to_email = isset($args['EMAIL']) && $args['EMAIL'] ? $args['EMAIL'] : '';
        #$to_email = 'dheerusingh59@gmail.com';
    
        $from_email = isset($args['FROM']) && $args['FROM'] ? $args['FROM'] : $this->ci->config->item('FROM_EMAIL');

        $config = array(
                'protocol'  => 'smtp',
                'smtp_host' => $this->ci->config->item('SMTP_HOST'),
                'smtp_port' => $this->ci->config->item('SMTP_PORT'),
                'smtp_user' => $this->ci->config->item('SMTP_USER'),
                'smtp_pass' => $this->ci->config->item('SMTP_PASS'),
                'mailtype'  => 'html',
                'charset'   => 'utf-8'
                );
        $this->ci->email->initialize($config);
        $this->ci->email->set_mailtype("html");
        $this->ci->email->set_newline("\r\n");

        $htmlContent = $this->mailer_template(array('CONTENT' => $args['CONTENT']));

        $this->ci->email->to($to_email);
        $this->ci->email->from($from_email,'BIGLEEP');
        $this->ci->email->subject($subject);
        $this->ci->email->message($htmlContent);
        $this->ci->email->set_header('x-job', '99999');
        #$this->ci->email->set_header('X-Priority', '1');
 
        if(!$this->ci->email->send())
        {
            return 0;
        }
        return 1;
    }  
}
