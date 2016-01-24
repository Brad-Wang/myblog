<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Blog_model extends CI_Model {

    //1.请求文章数据
    public function get_all(){
        $this -> db -> select("*");
        $this -> db -> from('t_blog blog');
        $this -> db -> join('t_admin admin', 'blog.author=admin.admin_id');
        $this -> db -> order_by('add_time','desc');
        return $this -> db -> get() -> result();
    }

    //2.根据id在数据库中删除文章
    public function delete_by_id($blog_id){
        $this -> db -> delete('t_blog', array('blog_id' => $blog_id));
        return $this -> db -> affected_rows();
    }



   public function get_by_page($page){
       //return $this->db->get('t_blog', 6, $page) -> result();
       $this -> db -> select("*");
       $this -> db -> from('t_blog blog');
       $this -> db -> join('t_admin admin', 'blog.author=admin.admin_id');
       $this -> db -> limit(6, $page);
       return $this -> db -> get() -> result();
   }

    //3.保存文章在数据库
   public function save($title, $content, $author){
      $data = array(
            'title'=>$title,
            'content'=>$content,
            'author'=>$author
       );
      $this -> db -> insert('t_blog',$data);
      return $this -> db -> affected_rows();
   }

    public function get_blog_by_id($blog_id){
        $this -> db -> select("*");
        $this -> db -> from('t_blog blog');
        $this -> db -> join('t_admin admin', 'admin.admin_id = blog.author');
        $this -> db -> where('blog.blog_id',$blog_id);

        $blog = $this -> db -> get()->row();
        return $blog;
    }

    public function get_comment_by_id($blog_id){
        return $comments = $this -> db -> get_where('t_comment',array('blog_id' => $blog_id)) -> result();

    }


    public function save_comment($blog_id,$com_name,$website,$subject,$email){
        $data = array(
            'blog_id' => $blog_id,
            'com_name' => $com_name,
            'website' => $website,
            'subject' => $subject,
            'email' => $email
        );
        $this -> db -> insert('t_comment',$data);
    }

}



















