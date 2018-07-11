<script src="Content/js/modalAdaptationForm.js"></script>
<script src="Content/js/postForm.js"></script>
<script src="Content/js/deleteArticleForm.js"></script>

<?php $this->title = "Jean Forteroche - Panneau d'aministration" ?>
<section class="adminSections" id="moderateComments">
    <h2>Modérer les commentaires</h2>
    <?php foreach ($comments as $comment): ?>
        <p>(<time><?= $comment->getDate(); ?></time>) <?= $comment->getAuthor(); ?> :</p>
        <p><?= $comment->getContent(); ?></p>
        <form method="post" action="index.php?action=moderatecomment">
            <input type="hidden" name="comment" value="<?= $comment->getIdComment(); ?>" />
            <input type="submit" value="Autoriser" />
        </form>
    <?php endforeach; ?>
</section>
<!-- Administration in Ajax -->
<section class="adminSections" id="adminPanel">
    <div id="newArticle">
        <h2>Gestionnaire d'articles</h2>
        <a href="#modalPost" class="btn tooltip-add" data-toggle="modal" data-idpost="" data-titlepost="" data-contentpost=""><i class="fas fa-plus-circle"></i> Ecrire un nouvel article</a>
    </div>    
    <table class="articles table-stripped">
        <thead>
            <th>Titre</th>
            <th>Article</th>
            <th>Date</th>
            <th>Action</th>
        </thead>
        <tbody id="listPosts">
            <?php foreach ($posts as $post): ?>
            <tr id="<?php echo 'line' . $post->getIdPost(); ?>">
                <td>
                    <a href="<?= "index.php?action=getPost&id=" . $post->getIdPost(); ?>">
                        <h2 class="titlePost"><?= $post->getTitle(); ?></h2>
                    </a>
                </td>
                <td>
                    <p><?= $post->getExcerpt(); ?></p>
                </td>
                <td>
                    <time><?= $post->getDate(); ?></time>
                </td>
                <td>
                    <button type="button" class="btn-simple" data-toggle="modal" data-target="#modalPost" data-idpost="<?= $post->getIdPost(); ?>" data-titlepost="<?= urlencode($post->getTitle()); ?>" data-contentpost="<?= urlencode($post->getContent()); ?>"><i class="fas fa-edit tooltip-edit"></i></button>
                    <form id="<?php echo 'deleteArticleForm' . $post->getIdPost(); ?>" class="deleteArticleForm" action="index.php?action=deletepost" method="post">
                        <input type="hidden" name="id" value="<?php echo $post->getIdPost(); ?>" />
                        <button type="submit" class="btn-simple"><i class="fas fa-trash-alt tooltip-delete"></i></button>
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <!-- Modal new post -->
    <div id="modalPost" class="modal fade">        
        <div class="modal-dialog modal-post">
            <div class="modal-content">
                <div class="modal-header">				
                    <h4 class="modal-title">Nouvel Article</h4>
                    <button id="closePost" type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <form id="postForm" action="index.php?action=addpost" method="post">
                        <div class="form-group form-title">
                            <i class="fas fa-pencil-alt"></i>
                            <input type="text" class="form-control modal-title" id="title" name="title" placeholder="Titre" required="required">
                        </div>
                        <div class="form-group">
                            <textarea id="txtPost" name="content" rows="4" placeholder="Article"></textarea>
                        </div>
                        <div class="form-group">
                            <input id="postFormId" type="hidden" name="id" value="" />
                            <input type="submit" id="btn-submitPost" class="btn btn-primary btn-block btn-lg" value="Publier">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div><!-- End modal new post -->
</section>

<section class="adminSections" id="adminPanel2">
    <div id="newComment">
        <h2>Modération des commentaires</h2>
    </div>
    <table class="articles table-stripped">
        <thead>
            <th>Article</th>
            <th>Date</th>
            <th>Commentaire</th>
            <th>Action</th>
        </thead>
        <tbody id="listComments">
            <?php foreach ($comments as $comment): ?>
            <tr>
                <td></td>
                <td><p><?= $comment->getContent(); ?></p></td>
                <td><time><?= $comment->getDate(); ?></time></td>
                <td>
                    <form method="post" action="index.php?action=moderatecomment">
                        <input type="hidden" name="comment" value="<?= $comment->getIdComment(); ?>" />
                        <button type="submit" class="btn-simple"><i class="far fa-thumbs-up tooltip-allow"></i></button>
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</section>
