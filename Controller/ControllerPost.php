<?php

/**
 * Description of ControllerPost
 *
 * @author Manu
 */

class ControllerPost {

    private $postManager;
    private $commentManager;

    public function __construct() {
        $this->postManager = new PostManager();
        $this->commentManager = new CommentManager();
    }

    // Add a new post
    public function createPost($dataPost) {
        // Create a new object Post with the data sent
        $post = new Post($dataPost);
        // Add it into the database & return a message to confirm        
        $data = [];
        $savePost = $this->postManager->addPost($post);
        if($savePost === TRUE){
            $data['state'] = 'add';
            $data['return'] = '<strong>Votre article vient d\'être publié !</strong>';
            $idPost = $post->getIdPost();
            $date = $post->getDate();
            $title = $post->getTitle();
            $excerpt = $post->getExcerpt();
            $datatitlepost = urlencode($post->getTitle());
            $datacontentpost = urlencode($post->getContent());
            $line = 'line' . $post->getIdPost();
            $data['datanewline'] = '<tr id="' . $line .'"><td><a href="index.php?action=getPost&id=' . $idPost . '"><h2 class="titlePost">' . $title . '</h2></a></td><td><p>' . $excerpt . '</p></td><td><time>' . $date . '</time></td><td><button style="padding-right: 10px;" type="button" class="btn-simple" data-toggle="modal" data-target="#modalPost" data-idpost="' . $idPost . '" data-titlepost="' . $datatitlepost . '" data-contentpost="' . $datacontentpost . '"><i class="fas fa-edit tooltip-edit"></i></button><form id="deleteArticleForm' . $idPost . '" class="deleteArticleForm" action="index.php?action=deletepost" method="post"><input type="hidden" name="id" value="' . $idPost . '" /><button type="submit" class="btn-simple"><i class="fas fa-trash-alt tooltip-delete" data-original-title="" title=""></i></button></form></td></tr>';
        }else{
            $data['state'] = 'fail';
            $data['return'] = 'Une erreur est survenue, la publication de l\'article a échoué, veuillez réessayer ultérieurement !';
        }
        echo json_encode($data);
    }
    
    // Update a post
    public function updatePost($dataPost) {
        // Create a new object Post with the data sent
        $partialpost = new Post($dataPost);
        // Add it into the database & return a message to confirm        
        $data = [];
        // Update the one in the database with the one just created
        $editedPost = $this->postManager->updatePost($partialpost);
        $idPost = $partialpost->getIdPost();
        $post = $this->postManager->getPost($idPost);
        if($editedPost === TRUE){
            $data['state'] = 'edit';
            $data['linetoedit'] = 'line' . $post->getIdPost();
            $data['return'] = '<strong>Votre article vient d\'être modifié !</strong>';
            $idPost = $post->getIdPost();
            $date = $post->getDate();
            $title = $post->getTitle();
            $excerpt = $post->getExcerpt();
            $datatitlepost = urlencode($post->getTitle());
            $datacontentpost = urlencode($post->getContent());
            $line ='line' . $post->getIdPost();
            $data['datanewline'] = '<tr id="' . $line .'"><td><a href="index.php?action=getPost&id=' . $idPost . '"><h2 class="titlePost">' . $title . '</h2></a></td><td><p>' . $excerpt . '</p></td><td><time>' . $date . '</time></td><td><button style="padding-right: 10px;" type="button" class="btn-simple" data-toggle="modal" data-target="#modalPost" data-idpost="' . $idPost . '" data-titlepost="' . $datatitlepost . '" data-contentpost="' . $datacontentpost . '"><i class="fas fa-edit tooltip-edit"></i></button><form id="deleteArticleForm' . $idPost . '" class="deleteArticleForm" action="index.php?action=deletepost" method="post"><input type="hidden" name="id" value="' . $idPost . '" /><button type="submit" class="btn-simple"><i class="fas fa-trash-alt tooltip-delete" data-original-title="" title=""></i></button></form></td></tr>';
        }else{
            $data['state'] = 'fail';
            $data['return'] = 'Une erreur est survenue, la publication de l\'article à échouée, veuillez réessayer ultérieurement !';
        }
        echo json_encode($data);
    }
    
    // Delete a post
    public function deletePost($idPost) {
        $data = [];
        // Delete the object Post in the database
        $deletePost = $this->postManager->deletePost($idPost);
        if($deletePost === TRUE){
            $data['state'] = 'delete';
            $data['linetoedit'] = 'line' . $idPost;
            $data['return'] = '<strong>L\'article vient d\'être supprimé !</strong>';
        }else{
            $data['state'] = 'fail';
            $data['return'] = 'Une erreur est survenue, la suppression de l\'article à échouée, veuillez réessayer ultérieurement !';
        }
        echo json_encode($data);
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
    public function report($idComment) {
        $comment = $this->commentManager->getComment($idComment);
        $comment->reportComment();
        $this->commentManager->flag($comment);
        // Refreshing the post display
        $this->getPost($comment->getIdPost());
    }
    
    // Allow a comment
    public function moderate($idComment) {
        $comment = $this->commentManager->getComment($idComment);
        $comment->allowComment();
        $commentModerated = $this->commentManager->flag($comment);
        $data = [];
        if($commentModerated === TRUE){
            $data['state'] = 'moderated';
            $data['return'] = '<strong>Le commentaire vient d\'être modéré !</strong>';
            $titlePost = '<a href="index.php?action=getPost&id=' . $comment->getIdPost() . '"><h2 class="titlePost">' . $comment->getTitle($comment->getIdPost()) . '</h2></a>';
            $commentContent = '<p>' . $comment->getContent() . '</p>';
            $date = '<time>' . $comment->getDate() . '</time>';
            $action = '<i class="far fa-check-circle tooltip-moderated"></i>';
            $line = 'line' . $comment->getIdComment();
            $data['linetoedit'] = $line;
            $data['datanewline'] = '<tr id="' . $line .'"><td>' . $titlePost . '</td><td>' . $commentContent . '</td><td>' . $date . '</td><td>' . $action . '</td></tr>';
        }else{
            $data['state'] = 'fail';
            $data['return'] = 'Une erreur est survenue, la modération du commentaire a échoué, veuillez réessayer ultérieurement !';
        }
        echo json_encode($data);
    }
  
}