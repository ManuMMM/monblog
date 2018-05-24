<?php

/**
 * Description of ControllerPost
 *
 * @author Manu
 */

class ControllerPost {

    private $post;
    private $comment;

    public function __construct() {
        $this->post = new PostManager();
        $this->comment = new CommentManager();
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