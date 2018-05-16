<?php

require_once 'Model/Model.php';

class Comment extends Model {

    // Returns the list of comments associated with a post
    public function getComments($idPost) {
        $sql = 'select COM_ID as id, COM_DATE as date,'
          . ' COM_AUTHOR as author, COM_CONTENT as content from T_COMMENT'
          . ' where BIL_ID=?';
        $comments = $this->executeRequest($sql, array($idPost));
        return $comments;
    }
  
    // Add a comment in the database
    public function addComment($author, $content, $idPost) {
        $sql = 'insert into T_COMMENT(COM_DATE, COM_AUTHOR, COM_CONTENT, BIL_ID)'
          . ' values(?, ?, ?, ?)';
        $date = date(DATE_W3C);  // Get the current date
        $this->executeRequest($sql, array($date, $author, $content, $idPost));
    }
  
}