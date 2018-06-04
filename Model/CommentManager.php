<?php

class CommentManager extends Model {
    
    // Add a comment in the database
    public function addComment(Comment $comment) {
        $comment->setDate(); // Get the current date
        $sql = 'INSERT INTO T_COMMENT(COM_DATE, COM_AUTHOR, COM_CONTENT, BIL_ID) VALUES(?, ?, ?, ?)';
        $this->executeRequest($sql, array($comment->getDate(), $comment->getAuthor(), $comment->getContent(), $comment->getIdPost()));
    }
    
    // Update a comment in the database
    public function updateComment(Comment $comment) {
        $sql = 'UPDATE t_comment SET COM_AUTHOR = ?, COM_CONTENT = ? WHERE COM_ID = ?';
        $this->executeRequest($sql, array($comment->getAuthor(), $comment->getContent(), $comment->getIdPost()));
    }
    
    // Delete a comment in the database
    
    // Get informations of a comment from the database
    public function getComment($idComment) {
        $sql = 'SELECT COM_ID as idComment, COM_DATE as date, COM_AUTHOR as author, COM_CONTENT as content, BIL_ID as idPost '
             . 'FROM T_COMMENT '
             . 'WHERE COM_ID = ?';
        $comment = $this->executeRequest($sql, array($idComment));
        if ($comment->rowCount() == 1){
            $data = $comment->fetch();  // Access to the first result line
            return new Comment($data);
        }else{
            throw new Exception("No post corresponds to the ID '$idComment'");
        }
    }
    
    // Flag a comment
    public function flag(Comment $comment) {
        $sql = 'UPDATE t_comment SET COM_FLAG = ? WHERE COM_ID = ?';
        $req = $this->executeRequest($sql, array($comment->getFlag(), $comment->getIdComment()));
    }
    
    // Returns the list of comments associated with a post
    public function getComments($idPost) {
        // Define the array $comments which will be return
        $comments = [];
        $sql = 'SELECT COM_ID as idComment, COM_DATE as date, COM_AUTHOR as author, COM_CONTENT as content, BIL_ID as idPost, COM_FLAG as flag '
             . 'FROM T_COMMENT '
             . 'WHERE BIL_ID = ?';
        $req = $this->executeRequest($sql, array($idPost));
        while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
            $comments[] = new Comment($data);
        }
        return $comments;
    }
    
    // Returns the list of flagged comments
    public function getFlaggedComments() {
        // Define the array $comments which will be return
        $comments = [];
        $sql = 'SELECT COM_ID as idComment, COM_DATE as date, COM_AUTHOR as author, COM_CONTENT as content, BIL_ID as idPost '
             . 'FROM T_COMMENT '
             . 'WHERE COM_FLAG <> 0';
        $req = $this->executeRequest($sql);
        while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
            $comments[] = new Comment($data);
        }
        return $comments;
    }
  
}