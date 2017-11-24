<?php


    class Post
    {
       private $db;

       public function __construct()
       {
           $this->db = new Database();
       }

       public function getPosts()
       {
           $this->db->query('select p.id as post_id, p.user_id, u.name, u.email, p.title, p.body, p.created_at 
                                 from posts p 
                                 left join users u on u.id = p.user_id 
                                 order by p.created_at desc');
           return $this->db->resultSet();

       }

       public function getPostById($id)
       {
           $this->db->query('select * from posts where id = :id');
           $this->db->bind(':id',$id);
           return $this->db->single();
       }
    
        public function getPostByUserId($user_id)
        {
            $this->db->query('select count(*) as total from posts where user_id = :user_id');
            $this->db->bind(':user_id',$user_id);
            return $this->db->single();
        }
       
       public function addPost($data)
       {
           $this->db->query('INSERT INTO posts (user_id, title, body) values (:user_id, :title, :body)');
           // Bind values
           $this->db->bind(':user_id', $data['user_id']);
           $this->db->bind(':title', $data['title']);
           $this->db->bind(':body', $data['body']);

           // Execute
           if( $this->db->execute() ){
               return true;
           } else {
               return false;
           }
       }

       public function updatePost($data)
       {
           $this->db->query('UPDATE posts SET title = :title, body = :body where id = :id');
           // Bind values
           $this->db->bind(':id', $data['id']);
           $this->db->bind(':title', $data['title']);
           $this->db->bind(':body', $data['body']);

           // Execute
           if( $this->db->execute() ){
               return true;
           } else {
               return false;
           }
       }

       public function deletePost($id)
       {
           $this->db->query('DELETE FROM posts where id = :id');
           // Bind values
           $this->db->bind(':id', $id);

           // Execute
           if( $this->db->execute() ){
               return true;
           } else {
               return false;
           }
       }
    }