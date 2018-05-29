<?php $this->title = "Jean Forteroche - " . $post->getTitle(); ?>

<article>
    <header>
        <h1 class="titlePost"><?= $post->getTitle(); ?></h1>
        <time><?= $post->getDate(); ?></time>
    </header>
    <p><?= $post->getContent(); ?></p>
</article>

<hr />

<header>
  <h1 id="titleReponses">Réponses à <?= $post->getTitle(); ?></h1>
</header>
<form method="post" action="index.php?action=addcomment">
    <input id="author" name="author" type="text" placeholder="Votre pseudo" required /><br />
    <textarea id="txtComment" name="content" rows="4" placeholder="Votre commentaire" required></textarea><br />
    <input type="hidden" name="id" value="<?= $post->getIdPost(); ?>" />
    <button type="reset">Effacer</button>
    <input type="submit" value="Commenter" />
</form>
<?php foreach ($comments as $comment): ?>
    <article>
        <p>(<time><?= $comment->getDate(); ?></time>) <?= $comment->getAuthor(); ?> :</p>
        <p><?php if($comment->getFlag() == FALSE){echo($comment->getContent());} else {echo 'Commentaire en attente de modération';} ?></p>
        <form method="post" action="index.php?action=reportcomment">
            <input type="hidden" name="comment" value="<?= urlencode(serialize($comment)); ?>" />
            <input type="submit" value="Signaler"<?php if($comment->getFlag() !== FALSE){?> disabled<?php } ?>/>
        </form>
    </article>
<?php endforeach; ?>