<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Blog extends CI_Controller {

    //1.用户点击博客，查看文章详情，同时显示文章以及评论
    public function blog_login(){
        $blog_id = $this->input->get('blog_id');
        $this-> load -> model('blog_model');
        $blog = $this-> blog_model ->get_blog_by_id($blog_id);
        $comments = $this-> blog_model ->get_comment_by_id($blog_id);
        $data = array(
            'blog' => $blog,
            'comments' => $comments
        );

        $this->load->view('blog',$data);
    }


    //2.提交按钮，数据库中保存文章数据
    public function blog_save(){

        $title = $this->input->post('title');
        $content = $this->input->post('content');
        $author = $this->input->post('author');
//        echo $title;
//         die;
        if($title == ''||$content == ''||$author == ''){
            echo 'Not';
        }else{
            $this->load->model('blog_model');
            $rows = $this->blog_model->save($title, $content, $author);
            if($rows > 0){
                echo 'Success';
            }else{
                echo 'Fail';
            }
        }
    }


    //3.打开到发布博客界面

    public function blog_save_form(){
        $this -> load -> view('admin/blog_save_form');
    }

    //4.删除博客
    public function blog_delete(){
        $blog_id = $this -> input -> get('blog_id');
        $this -> load -> model('blog_model');
        $row = $this -> blog_model -> delete_by_id($blog_id);
        if($row>0){
            echo 'Success';
        }else{
            echo 'Fail';
        }
    }







    public function admin_form(){
    	$this -> load -> model('admin_model');
        $row = $this -> admin_model -> revise(2);

        $data = array(
            'admins' => $row
        );
        $this -> load -> view('admin/admin-mgr-form', $data);
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
            redirect('blog/blog_login?blog_id='.$blog_id);
        }
    }


}