<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Member extends MX_Controller
{

function __construct() {
parent::__construct();
    $this->load->model('mdl_user');
    $this->load->library(array('form_validation','session'));
}

function index(){
    if($this->session->userdata('username')){
        redirect(base_url());
    }else{
    $this->load->view('m_login');
    }
}

function auth_login(){
    $username = array();
    $user = $this->input->post('user');
    $pass = md5($this->input->post('pass'));
       $select =  $this->db->select('
                id,
                username,
                email,
                password')
              ->from('member')
              ->where("(email = '$user' OR username = '$user')")
              ->where('password', $pass)
              ->where('aktivasi', '1');
        $query = $this->db->get()->num_rows();
        if($query){
                $selectuser = $this->db->query("SELECT username FROM member");
                $result = $selectuser->result_array();
                foreach ($result as $row)
                    {
                         $username = $row['username'];
                    }
                $this->session->set_userdata('username', $row['username']);
                echo "<script type='text/javascript'>alert('Login Gagal');</script>";
                redirect(base_url());
        }else{
                echo "<script type='text/javascript'>alert('Login Gagal');</script>";
                redirect(base_url('member'));
        }

    if($this->input->post('Daftar')){
        redirect(base_url('member/register'));
    }
}

function register(){
    $rules['member'] = 'member';
    $this->form_validation->set_rules('name', 'Nama Lengkap','required');
    $this->form_validation->set_rules('user', 'Username','required|min_length[6]|max_length[25]');
    $this->form_validation->set_rules('email','Email','required|valid_email');
    $this->form_validation->set_rules('pass','Password','required');
    $this->form_validation->set_rules('telp', 'No. Handphone', 'required|regex_match[/^[0-9]/]|max_length[12]');

    $nama = $this->input->post('name');
    $user = $this->input->post('user');
    $email = $this->input->post('email');
    $password = $this->input->post('pass');
    $telp = $this->input->post('telp');


    if($this->input->post('Login')){
        redirect(base_url('member'));
    }

    if($this->form_validation->run() === FALSE){
        $this->load->view('m_register', $rules);
    }else{
        $data = array(
            'name' => $nama,
            'username' => $user,
            'email' => $email,
            'password' => md5($password),
            'telp' => $telp
            );

            //Mailing Verification
            $set = '123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'; //code
            $token = substr(str_shuffle($set), 0, 25); //shuffle code untuk tokennya

            $user_token = array(
            'email' => $email,
            'token' => $token
            );
            // end

            $this->mdl_user->sendEmail($token, 'verifikasi',$email,$password);
            $this->mdl_user->daftar('member', $data);
            $this->db->insert('user_token', $user_token);
            $this->session->set_flashdata('message', '<div class="alert alert-success message" role="alert">
            Silahkan cek email untuk memverifikasi akun anda.
            </div>');
            redirect(base_url('member'));

        
    }
}

function verify(){
    $email = $this->input->get('email');
    $token = $this->input->get('token');

    $user = $this->db->get_where('member', ['email' => $email])->row_array();
    if($user){
        $usertoken = $this->db->get_where('user_token', ['token' => $token])->row_array();
        if($usertoken){
            $this->db->query("UPDATE member SET aktivasi = '1' WHERE email = '$email'");

            $this->db->delete('user_token', ['email' => $email]);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            '.$email.' sudah terverifikasi!
            </div>');
        }else{
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Verifikasi akun gagal! token salah.
          </div>');
        }

    }else{
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
        Verifikasi akun gagal! email salah.
      </div>');
    }
    redirect('member');
}

 function forgot_pass(){
     
 }

}