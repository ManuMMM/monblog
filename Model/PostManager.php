<?php

class PostManager extends Model {

    // Returns the list of blog posts
    public function getPosts() {
        $posts = [];
        $sql = 'SELECT BIL_ID as id, BIL_DATE as date, BIL_TITLE as title, BIL_CONTENT as content '
             . 'FROM T_POST '
             . 'ORDER BY BIL_ID DESC';
        $req = $this->executeRequest($sql);
        while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
            $posts[] = new Post($data);
        }
        return $posts;
    }

    // Returns the information of a post
    public function getPost($idPost) {
        $sql = 'SELECT BIL_ID as id, BIL_DATE as date, BIL_TITLE as title, BIL_CONTENT as content '
             . 'FROM T_POST '
             . 'WHERE BIL_ID = ?';
        $post = $this->executeRequest($sql, array($idPost));
        if ($post->rowCount() == 1){
            $data = $post->fetch();  // Access to the first result line
            return new Post($data);
        }else{
            throw new Exception("No post corresponds to the ID '$idPost'");
        }
    }
    
}