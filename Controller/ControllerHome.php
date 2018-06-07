<?php

/**
 * Description of ControllerHome
 *
 * @author Manu
 */

class ControllerHome {
    
    private $postManager;
    private $commentManager;

    public function __construct() {
        $this->postManager = new PostManager();
        $this->commentManager = new CommentManager();
    }

    // Show the homepage (with the list of all the posts of the blog)
    public function home() {
        $posts = $this->postManager->getPosts();
        $view = new View("Home");
        $view->generate(array('posts' => $posts));
    }
    
    // Show the admin panel
    public function adminPanel() {
        $posts = $this->postManager->getPosts();
        $comments = $this->commentManager->getFlaggedComments();
        $view = new View("Administration");
        $view->generate(array('posts' => $posts, 'comments' => $comments));
    }
    
    // Show the editor
    public function editor($idPost) {
        $post = $this->postManager->getPost($idPost);
        $view = new View("EditPost");
        $view->generate(array('post' => $post));
    }
    
}