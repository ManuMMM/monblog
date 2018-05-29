<?php

/**
 * Description of ControllerPost
 *
 * @author Manu
 */

class ControllerPost {

    private $postManager;
    private $commentManager;
    private $ctrlHome;

    public function __construct() {
        $this->postManager = new PostManager();
        $this->commentManager = new CommentManager();
        $this->ctrlHome = new ControllerHome();
    }

    // Add a new post
    public function createPost($data) {
        // Create a new object Post with the data sent
        $post = new Post($data);
        // Add it into the database
        $this->postManager->addPost($post);
        // Refresh the Admin panel view
        $this->ctrlHome->adminPanel();
    }
    
    // Update a post
    public function updatePost($data) {
        // Create a new object Post with the data sent
        $post = new Post($data);
        // Update the one in the database with the one just created
        $this->postManager->updatePost($post);
        // Refreshing the post display
        $this->getPost($post->getIdPost());
    }
    
    // Delete a post
    public function deletePost(Post $post) {
        // Delete the object Post in the database
        $this->postManager->deletePost($post);
        // Refresh the Admin panel view
        $this->ctrlHome->adminPanel();
    }
    
    // Show the details of a post
    public function getPost($idPost) {
        $post = $this->postManager->getPost($idPost);
        $comments = $this->commentManager->getComments($idPost);
        $view = new View("Post");
        $view->generate(array('post' => $post, 'comments' => $comments));
    }
  
    // Add a comment to a post
    public function addComment($data) {
        // Create a new object Comment with the data sent
        $comment = new Comment($data);
        // Saving the comment
        $this->commentManager->addComment($comment); 
        // Refreshing the post display
        $this->getPost($comment->getIdPost());
    }
    
    // Report a comment
    public function report(Comment $comment) {
        $comment->reportComment();
        $this->commentManager->flag($comment);
        // Refreshing the post display
        $this->getPost($comment->getIdPost());
    }
    
    // Allow a comment
    public function moderate(Comment $comment) {
        $comment->allowComment();
        $this->commentManager->flag($comment);
        // Refresh the Admin panel view
        $this->ctrlHome->adminPanel();
    }
  
}