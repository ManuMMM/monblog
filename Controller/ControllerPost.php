<?php

/**
 * Description of ControllerPost
 *
 * @author Manu
 */

require_once 'Model/Post.php';
require_once 'Model/Comment.php';
require_once 'View/View.php';

class ControllerPost {

    private $post;
    private $comment;

    public function __construct() {
        $this->post = new Post();
        $this->comment = new Comment();
    }

    // Show the details of a post
    public function post($idPost) {
        $post = $this->post->getPost($idPost);
        $comments = $this->comment->getComments($idPost);
        $view = new View("Post");
        $view->generate(array('post' => $post, 'comments' => $comments));
    }
  
    // Add a comment to a post
    public function comment($author, $content, $idPost) {
        // Saving the comment
        $this->comment->addComment($author, $content, $idPost); 
        // Refreshing the post display
        $this->post($idPost);
    }
  
}