<?php

/**
 * Description of ControllerHome
 *
 * @author Manu
 */

class ControllerHome {
    
    private $post;

    public function __construct() {
        $this->post = new PostManager();
    }

    // Show the list of all the posts of the blog
    public function home() {
        $posts = $this->post->getPosts();
        $view = new View("Home");
        $view->generate(array('posts' => $posts));
    }
    
}