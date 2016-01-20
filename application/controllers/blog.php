<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Blog extends CI_Controller {

    public function blog_login(){
        $blog_id = $this->input->get('blog_id');
        $this-> load -> model('blog_model');
        $row = $this-> blog_model ->get_blog_by_id($blog_id);
        $data = array(
            'blog' => $row
        );
        $this->load->view('blog',$data);
    }
    public function admin_form(){
    	$this -> load -> model('admin_model');
        $row = $this -> admin_model -> revise(2);

        $data = array(
            'admins' => $row
        );
        $this -> load -> view('admin/admin-mgr-form', $data);
    }

    public function blog_save(){

    $title = $this->input->post('title');
    $content = $this->input->post('content');
    $author = $this->input->post('author');
    // echo $title.$content.$author;
    // die;

    if($title == ''||$content == ''||$author == ''){
    	echo '<html><script>alert("有信息未填写");</script></html>';
        $this->admin_form();
        //调用方法
    }else{
        $this->load->model('blog_model');
        $this->blog_model->save($title, $content, $author);
        echo '<html><script>alert("已提交!");</script></html>';
        $this->admin_form();
    }

	}

    public function save_comment(){

        $blog_id = $this -> input ->get("blog_id");
        $com_name = $this -> input -> get("com_name");
        $website = $this -> input -> get("website");
        $subject = $this -> input -> get("subject");
        $email = $this -> input -> get("email");

        if($blog_id == ''||$com_name == ''||$website == ''||$subject == ''||$email == ''){
            echo '<html><script>alert("您有信息未填写");</script></html>';
            redirect('blog_login');
        }else{
            $this -> load ->model('blog_model');
            $this -> blog_model -> save_comment($blog_id,$com_name,$website,$subject,$email);
            $this -> blog_login();
        }
    }


}