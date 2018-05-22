<?php

require_once 'Model/Model.php';

class Comment extends Model {

    // Returns the list of comments associated with a post
    public function getComments($idPost) {
        $sql = 'SELECT COM_ID as id, COM_DATE as date, COM_AUTHOR as author, COM_CONTENT as content '
             . 'FROM T_COMMENT '
             . 'WHERE BIL_ID = ?';
        $comments = $this->executeRequest($sql, array($idPost));
        return $comments;
    }
  
    // Add a comment in the database
    public function addComment($author, $content, $idPost) {
        $sql = 'INSERT INTO T_COMMENT(COM_DATE, COM_AUTHOR, COM_CONTENT, BIL_ID) VALUES(?, ?, ?, ?)';
        $date = date(DATE_W3C);  // Get the current date
        $this->executeRequest($sql, array($date, $author, $content, $idPost));
    }
  
}