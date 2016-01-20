<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Message extends CI_Controller {

    public function contact()
    {
        $this->load->view('contact');
    }

    public function mgr_message(){

        $this -> load -> model('message_model');
        $result = $this -> message_model -> get_all();

        $data = array(
            'messages' => $result
        );
        $this -> load -> view('admin/admin-mgr-message', $data);
    }



    public function put_message()
    {
        $username = $this->input->post('username');
        $email = $this->input->post('email');
        $content = $this->input->post('content');

        if($username == ''||$email == ''||$content == ''){
            echo '<html><script>alert("未填写！！");</script></html>';
            $this->contact();
            //调用方法
        }else{
            $this->load->model('message_model');
            $this->message_model->save($username, $email,$content);
            echo '<html><script>alert("已提交!");</script></html>';
            $this->contact();
        }
    }

    public  function  delete_message(){
        $message_id = $this -> input -> get('message_id');
        $this -> load -> model('message_model');
        $this -> message_model -> delete($message_id);
        $this -> mgr_message();
    }


}