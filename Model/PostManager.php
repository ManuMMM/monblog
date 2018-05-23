<?php

class PostManager extends Model {

    // Returns the list of blog posts
    public function getPosts() {
        $sql = 'SELECT BIL_ID as id, BIL_DATE as date, BIL_TITLE as title, BIL_CONTENT as content '
             . 'FROM T_POST '
             . 'ORDER BY BIL_ID DESC';
        $posts = $this->executeRequest($sql);
        return $posts;
    }

    // Returns the information of a post
    public function getPost($idPost) {
        $sql = 'SELECT BIL_ID as id, BIL_DATE as date, BIL_TITLE as title, BIL_CONTENT as content '
             . 'FROM T_POST '
             . 'WHERE BIL_ID = ?';
        $post = $this->executeRequest($sql, array($idPost));
        if ($post->rowCount() == 1)
            return $post->fetch();  // Access to the first result line
        else
            throw new Exception("No post corresponds to the ID '$idPost'");
    }
    
}