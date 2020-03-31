<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    function uniquid()
    {
        return uniqid();
    }

    function send_sms($mobile_no, $message)
    {
        $CI = get_instance();
        $CI->config->load('custom_config');

        $url = $CI->config->item('SMS_URL');
        $username = $CI->config->item('SMS_USER');
        $password = $CI->config->item('SMS_PASS');
        $message_type = $CI->config->item('SMS_MESSAGE_TYPE');
        $sender_id = $CI->config->item('SMS_SENDER_ID');

        $ch  = curl_init();
      
        curl_setopt($ch, CURLOPT_URL, $url."?username=".urlencode($username)."&password=".urlencode($password)."&messageType=".$message_type."&mobile=".urlencode($mobile_no)."&senderId=".urldecode($sender_id)."&message=".urlencode($message));

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);


        $result = curl_exec($ch);
        // Check if any error occurred
        if(curl_errno($ch))
        {
            echo 'Curl error: ' . curl_error($ch);
        }

        curl_close($ch);
        //print_r(json_encode($result));die();
        return json_encode($result);
    }

    function rand_number($size = 4) {

        $random_number='';
        $count=0;
        while ($count < $size ) 
            {
                $random_digit = mt_rand(0, 9);
                $random_number .= $random_digit;
                $count++;
            }
        return $random_number;  
    }

    function gen_uuid() {

        return sprintf( '%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
            // 32 bits for "time_low"
            mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ),

            // 16 bits for "time_mid"
            mt_rand( 0, 0xffff ),
     
            // 16 bits for "time_hi_and_version",
            // four most significant bits holds version number 4
            mt_rand( 0, 0x0fff ) | 0x4000,
     
            // 16 bits, 8 bits for "clk_seq_hi_res",
            // 8 bits for "clk_seq_low",
            // two most significant bits holds zero and one for variant DCE1.1
            mt_rand( 0, 0x3fff ) | 0x8000,
     
            // 48 bits for "node"
            mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff )
        );
    }

    function get_application_id() {

         $time_start = microtime(TRUE);

         $time1 = str_replace('.', '', $time_start);
         $time1 = substr($time1, -6);
         
         $time_end = microtime(true);
         $time2 = str_replace('.', '', $time_end);
         $time2 = strrev(substr($time2, -6));

         $application_id = "#".$time1.$time2;
         return $application_id;
    }
?>
