<?php

class PostManager extends Model {

    // Add a new post in the database
    public function addPost(Post $post) {
        $post->setDate();  // Get the current date
        $sql = 'INSERT INTO t_post(BIL_DATE, BIL_TITLE, BIL_CONTENT) VALUES(?, ?, ?)';
        $this->executeRequest($sql, array($post->getDate(), $post->getTitle(), $post->getContent()));
        // Hydrate the Post Object
        $post->hydrate(array('id' => $this->lastId()));
    }
    
    // Update a post in the database
    public function updatePost(Post $post) {
        $sql = 'UPDATE t_post SET BIL_TITLE = ?, BIL_CONTENT = ? WHERE BIL_ID = ?';
        $this->executeRequest($sql, array($post->getTitle(), $post->getContent(), $post->getIdPost()));
    }
    
    // Delete a post in the database
    public function deletePost(Post $post) {
        $sql = 'DELETE FROM t_post WHERE BIL_ID = ?';
        $this->executeRequest($sql, array($post->getIdPost()));
    }

    // Get informations of a post from the database
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
    
    // Returns the list of blog posts from the database
    public function getPosts() {
        $posts = [];
        $sql = 'SELECT BIL_ID as id, BIL_DATE as date, BIL_TITLE as title, BIL_CONTENT as content '
             . 'FROM T_POST '
             . 'ORDER BY BIL_ID DESC LIMIT 0,5';
        $req = $this->executeRequest($sql);
        while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
            $posts[] = new Post($data);
        }
        return $posts;
    }
    
    // Get the total numbers of posts in the database
    public function countTotalPosts() {
        $sql = 'SELECT COUNT(*) AS contenu'
             . ' FROM T_POST';
        $req = $this->executeRequest($sql);
        $numberOfPosts = $req->fetchColumn();
        return $numberOfPosts;
    }
    
}