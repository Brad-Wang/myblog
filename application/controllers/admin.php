<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

    //管理员界面登录
    public function login(){
        $this->load->view('admin/login');
    }

    //验证管理员信息
    public function check_login(){
        //1. 接数据
        $admin_name = $this -> input -> post('admin_name');
        $admin_pwd = $this -> input -> post('admin_pwd');
        //2. 查数据
        $this -> load -> model('admin_model');
        $admin_message = $this -> admin_model -> get_by_name_pwd($admin_name, $admin_pwd);
        $data = array(
            'admin_message' => $admin_message
        );
        //3.跳转
        if($admin_message){
            $this->session->set_userdata($data);
            $this->load->view('admin/admin-index');
        }else{
            $this->load->view('admin/login');
        }
    }

    //链接到博客管理界面并请求文章数据
    public  function  admin_blog(){
        $this -> load -> model('blog_model');
        $blogs = $this -> blog_model -> get_all();
        $data = array(
            'blogs' => $blogs
        );
        $this -> load -> view('admin/admin-blog',$data);
    }


    public  function admin_mgr(){
        $this -> load -> model('admin_model');
        $result = $this -> admin_model -> get_all();
//        if($result){
            $data = array(
                'admins' => $result
            );
            $this -> load -> view('admin/admin-mgr', $data);
//        }

    }

    public  function  delete_admin(){
        $admin_id = $this -> input -> get('admin_id');
        $this -> load -> model('admin_model');
        $this -> admin_model -> delete($admin_id);
        $this -> admin_mgr();
    }

    public  function  admin_form(){


        $this -> load -> model('admin_model');
        $row = $this -> admin_model -> revise(2);

        $data = array(
            'admins' => $row
        );
        $this -> load -> view('admin/admin-mgr-form', $data);

    }

    public  function  save_admin(){

        $admin_name = $this->input->post('admin_name');
        $admin_pwd = $this->input->post('admin_pwd');

        if($admin_name == ''||$admin_pwd == ''){
            $this->admin_form();
            //调用方法
        }else{
            $this->load->model('admin_model');
            $this->admin_model->save($admin_name, $admin_pwd);
            echo '<html><script>alert("已提交!");</script></html>';
            //$this->admin_mgr();
            redirect('admin/admin_mgr');
        }
    }

    public  function  revise_admin(){

        $admin_id = $this -> input -> get('admin_id');
        $this -> load -> model('admin_model');
        $row = $this -> admin_model -> revise($admin_id);

        $data = array(
            'admins' => $row
        );
        $this -> load -> view('admin/admin-mgr-form', $data);
    }


    public  function  update_admin(){
        $admin_new_name = $this->input->post('admin_new_name');
        $admin_new_pwd = $this->input->post('admin_new_pwd');
        $admin_old_name = $this->input->post('admin_old_name');
        $admin_old_pwd = $this->input->post('admin_old_pwd');
        $admin_id = $this->input->post('admin_id');

        if($admin_new_name == $admin_old_name && $admin_new_pwd == $admin_old_pwd){
            echo '<html><script>alert("新信息无效");</script></html>';
            $this->admin_form();
        }else{
            $this->load->model('admin_model');
            $this->admin_model->update($admin_new_name, $admin_new_pwd, $admin_id);
            echo '<html><script>alert("已提交!");</script></html>';
            //$this->admin_mgr();
            redirect('admin/admin_mgr');
            //redirect('admin/revise_admin?admin_id='.$admin_id);
            //redirect('admin/admin_form')

        }


    }


}



















