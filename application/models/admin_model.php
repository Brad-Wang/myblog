<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_model extends CI_Model {

    //根据用户名，密码获取信息
    public function get_by_name_pwd($name, $pwd){
        //'select * from t_admin where admin_name=$name and admin_pwd=$pwd'
        $data = array(
            'admin_name' => $name,
            'admin_pwd' => $pwd
        );
        return $this -> db -> get_where('t_admin', $data) -> row();
    }

    public function get_all(){
        return $this -> db -> get('t_admin') -> result();
    }

    public  function save($admin_name, $admin_pwd){
        $data = array(
            'admin_name'=>$admin_name,
            'admin_pwd'=>$admin_pwd
        );
        $this->db->insert('t_admin',$data);
    }

    public  function update($admin_new_name, $admin_new_pwd,$admin_id){
        $data = array(
            'admin_name' => $admin_new_name,
            'admin_pwd' => $admin_new_pwd
        );

        $this->db->where('admin_id', $admin_id);
        $this->db->update('t_admin', $data);
    }

    public  function delete($admin_id){
        $this -> db -> delete('t_admin', array('admin_id' => $admin_id));
    }
    public  function revise($admin_id){

        $data = array(
            'admin_id' => $admin_id
        );
        return $this -> db -> get_where('t_admin', $data) -> row();
    }

}



















