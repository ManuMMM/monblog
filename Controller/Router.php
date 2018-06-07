<?php

/**
 * Description of Router
 *
 * @author Manu
 */

class Router {
    
    private $ctrlHome;
    private $ctrlPost;

    public function __construct() {
        $this->ctrlHome = new ControllerHome();
        $this->ctrlPost = new ControllerPost();
        $this->ctrlRegister = new ControllerRegister();
        $this->action = $this->getParameter($_GET, 'action');
        $this->permission = $this->getParameter($_SESSION, 'permission');
    }

    // Process an incoming request
    public function routeRequest() {
        try {
            $_SESSION['permission'] = 1;
            switch ($this->permission) {
                // Admin
                case 1:
                    switch ($this->action) {
                        // CREATE (post)
                        case "addpost":
                            $title = $this->getParameter($_POST, 'title');
                            $content = $this->getParameter($_POST, 'content');
                            $this->ctrlPost->createPost(array('title' => $title, 'content' => $content));
                            break 2; // Eand the switch ($this->action) and the switch ($this->permission)
                                                
                        // UPDATE (post)
                        case "updatepost":
                            $idPost = $this->getParameter($_POST, 'id');
                            $title = $this->getParameter($_POST, 'title');
                            $content = $this->getParameter($_POST, 'content');
                            $this->ctrlPost->updatePost(array('id' => $idPost, 'title' => $title, 'content' => $content));
                            break 2; // Eand the switch ($this->action) and the switch ($this->permission)
                        
                        // DELETE (post)
                        case "deletepost":
                            $idPost = $this->getParameter($_POST, 'id');
                            $this->ctrlPost->deletePost($idPost);
                            break 2; // Eand the switch ($this->action) and the switch ($this->permission)
                        
                        // MODERATE (comment)                        
                        case "moderatecomment":
                            $idComment = $this->getParameter($_POST, 'comment');
                            $this->ctrlPost->moderate($idComment);
                            break 2; // Eand the switch ($this->action) and the switch ($this->permission)
                        
                        // SHOW THE EDITOR (post)
                        case "editor":
                            $idPost = $this->getParameter($_POST, 'id');
                            $this->ctrlHome->editor($idPost);
                            break 2; // Eand the switch ($this->action) and the switch ($this->permission)
                        
                        // SHOW THE ADMIN PANEL
                        case "admin":
                            $this->ctrlHome->adminPanel();
                            break 2; // Eand the switch ($this->action) and the switch ($this->permission)
                    }
                
                // Lambda User (or not logged)
                default:
                    switch ($this->action) {                        
                        // READ (post)
                        case "getPost":
                            $idPost = (int)($this->getParameter($_GET, 'id'));
                            if ($idPost != 0) {
                                $this->ctrlPost->getPost($idPost);
                            }
                            else {
                                throw new Exception("Invalid post ID");
                            }
                            break;
                        
                        // CREATE (comment)
                        case "addcomment":
                            $author = $this->getParameter($_POST, 'author');
                            $content = $this->getParameter($_POST, 'content');
                            $idPost = $this->getParameter($_POST, 'id');
                            $this->ctrlPost->addComment(array('author' => $author, 'content' => $content, 'idPost' => $idPost));
                            break;
                        
                        // REPORT (comment)
                        case "reportcomment":
                            $idComment = $this->getParameter($_POST, 'comment');
                            $this->ctrlPost->report($idComment);
                            break;
                        
                        // SHOW THE LOGIN PAGE
                        case "login":
                            $this->ctrlRegister->logIn();
                            break;
                        
                        // SHOW THE SIGNIN PAGE
                        case "signin":
                            $this->ctrlRegister->signIn();
                            break;
                        
                        // SHOW THE SIGNIN PAGE
                        case NULL:
                            $this->ctrlHome->home();
                            break;
                        
                        default:
                            throw new Exception("Action invalide ou vous n'avez pas les permissions  nécessaires accéder à cette page");
                            break;                        
                    }
                    break;
            }
        }
        catch (Exception $e) {
            $this->error($e->getMessage());
        }
    }
  
    // Search a parameter in an array
    private function getParameter($array, $name) {
        if (isset($array[$name])) {
            return $array[$name];
        }
        else
            return NULL;
    }

    // Show an error
    private function error($msgError) {
        $view = new View("Error");
        $view->generate(array('msgError' => $msgError));
    }
    
}