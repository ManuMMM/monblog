<?php

class CommentManager extends Model {

    // Returns the list of comments associated with a post
    public function getComments($idPost) {
        // Define the array $comments which will be return
        $comments = [];
        $sql = 'SELECT COM_ID as idComment, COM_DATE as date, COM_AUTHOR as author, COM_CONTENT as content, BIL_ID as idPost '
             . 'FROM T_COMMENT '
             . 'WHERE BIL_ID = ?';
        $req = $this->executeRequest($sql, array($idPost));
        while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
            $comments[] = new Comment($data);
        }
        return $comments;
    }
  
    // Add a comment in the database
    public function addComment($author, $content, $idPost) {
        $sql = 'INSERT INTO T_COMMENT(COM_DATE, COM_AUTHOR, COM_CONTENT, BIL_ID) VALUES(?, ?, ?, ?)';
        $date = date(DATE_W3C);  // Get the current date
        $this->executeRequest($sql, array($date, $author, $content, $idPost));
    }
  
}