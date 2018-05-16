<?php

require_once 'Model/Model.php';

class Post extends Model {

    // Returns the list of blog posts
    public function getPosts() {
        $sql = 'select BIL_ID as id, BIL_DATE as date,'
          . ' BIL_TITLE as title, BIL_CONTENT as content from T_POST'
          . ' order by BIL_ID desc';
        $posts = $this->executeRequest($sql);
        return $posts;
    }

    // Returns the information of a post
    public function getPost($idPost) {
        $sql = 'select BIL_ID as id, BIL_DATE as date,'
          . ' BIL_TITLE as title, BIL_CONTENT as content from T_POST'
          . ' where BIL_ID=?';
        $post = $this->executeRequest($sql, array($idPost));
        if ($post->rowCount() == 1)
            return $post->fetch();  // Access to the first result line
        else
            throw new Exception("No post corresponds to the ID '$idPost'");
    }
    
}