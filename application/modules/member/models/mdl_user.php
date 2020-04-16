<?php 
 
class mdl_user extends CI_Model{	


    function daftar($tables,$data){
        return $this->db->insert($tables,$data);
    }

    function cekPendaftar($user,$email){
        $where = "username='".$user."' OR email='".$email."'";
        return $this->db->select('email,username')->from('member')->where($where)->get();
    }

    function sendEmail($token,$email,$password){
        $config = [
            'mailtype'  => 'html',
            'charset'   => 'utf-8',
            'protocol'  => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_user' => 'projekomahoutfit@gmail.com',  
            'smtp_pass' => 'l33thax0r',  
            'smtp_port' => 465,
            'newline'   => "\r\n"
        ];

        $message = 	"
						<html>
						<head>
							<title>Verification Code</title>
						</head>
						<body>
							<h2>Thank you for Registering.</h2>
							<p>Your Account:</p>
							<p>Email: ".$email."</p>
							<p>Password: ".$password."</p>
							<p>Please click the link below to activate your account.</p>
							<h4><a href='".base_url()."member/verify?email=".$email."&token=".$token."'>Activate My Account</a></h4>
						</body>
						</html>
                        ";
                        
                        $this->load->library('email', $config);
                        $this->email->set_newline("\r\n");
                        $this->email->from($config['smtp_user'], 'OmahOutfit Developer');
                        $this->email->to($email);
                        $this->email->subject('Signup Verification Email');
                        $this->email->message($message);                        
                        
          
                        if($this->email->send()){
                            return true;
                        }else{
                            echo $this->email->print_debugger();
                            die;
                        }
    }


    function sendForgot($token, $email){
        $config = [
            'mailtype'  => 'html',
            'charset'   => 'utf-8',
            'protocol'  => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_user' => 'projekomahoutfit@gmail.com',  
            'smtp_pass' => 'l33thax0r',  
            'smtp_port' => 465,
            'newline'   => "\r\n"
        ];

        $message = 	"
                            Kita dengan kamu kehilangan password OmahOutfitmu. Maaf tentang itu!
                            <br><br>
                            Tetapi jangan kawatir! kamu dapat menggunakan link dibawah ini untuk mereset passwordmu :
                            <br><br>
                            <p><a href='".base_url()."member/resetpassword?email=".$email."&token=".$token."'>".base_url()."member/resetpassword?email=".$email."&token=".$token."</a></p>
                            <br><br>
							Terimakasih,<p>
							Tim OmahOutfit.
                        ";
                        
                        $this->load->library('email', $config);
                        $this->email->set_newline("\r\n");
                        $this->email->from($config['smtp_user'], 'OmahOutfit Developer');
                        $this->email->to($email);
                        $this->email->subject('[OmahOutfit] Please reset your password');
                        $this->email->message($message);                        
                        
          
                        if($this->email->send()){
                            return true;
                        }else{
                            echo $this->email->print_debugger();
                            die;
                        }
    }

}