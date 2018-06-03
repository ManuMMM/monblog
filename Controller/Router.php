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
        $this->action = $this->getParameter($_GET, 'action');
    }

    // Process an incoming request
    public function routeRequest() {
        try {
            if ($this->action == 'getPost') {
                $idPost = intval($this->getParameter($_GET, 'id'));
                if ($idPost != 0) {
                    $this->ctrlPost->getPost($idPost);
                }
                else
                  throw new Exception("Invalid post ID");
            }
            elseif ($this->action == 'addpost') {
                $title = $this->getParameter($_POST, 'title');
                $content = $this->getParameter($_POST, 'content');
                $this->ctrlPost->createPost(array('title' => $title, 'content' => $content));
            }
            elseif ($this->action == 'updatepost') {
                $idPost = $this->getParameter($_POST, 'id');
                $title = $this->getParameter($_POST, 'title');
                $content = $this->getParameter($_POST, 'content');
                $this->ctrlPost->updatePost(array('id' => $idPost, 'title' => $title, 'content' => $content));
            }
            elseif ($this->action == 'deletepost') {
                $postUrlEncoded = $this->getParameter($_POST, 'post');
                $post = unserialize(urldecode($postUrlEncoded));
                $this->ctrlPost->deletePost($post);
            }
            else if ($this->action == 'addcomment') {
                $author = $this->getParameter($_POST, 'author');
                $content = $this->getParameter($_POST, 'content');
                $idPost = $this->getParameter($_POST, 'id');
                $this->ctrlPost->addComment(array('author' => $author, 'content' => $content, 'idPost' => $idPost));
            }
            else if ($this->action == 'reportcomment') {
                $idComment = $this->getParameter($_POST, 'comment');
                $this->ctrlPost->report($idComment);
            }
            else if ($this->action == 'moderatecomment') {
                $idComment = $this->getParameter($_POST, 'comment');
                $this->ctrlPost->moderate($idComment);
            }
            elseif ($this->action == 'editor') {
                $idPost = $this->getParameter($_POST, 'id');
                $this->ctrlHome->editor($idPost);
            }
            elseif ($this->action == 'admin') {
                $this->ctrlHome->adminPanel();
            }
            elseif ($this->action == NULL) {
                $this->ctrlHome->home();
            }
            else
                throw new Exception("Invalid action");
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