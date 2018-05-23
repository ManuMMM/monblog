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
<form method="post" action="index.php?action=comment">
    <input id="author" name="author" type="text" placeholder="Votre pseudo" required /><br />
    <textarea id="txtComment" name="content" rows="4" placeholder="Votre commentaire" required></textarea><br />
    <input type="hidden" name="id" value="<?= $post->getIdPost(); ?>" />
    <input type="submit" value="Poster" />
</form>
<?php foreach ($comments as $comment): ?>
<p>(<time><?= $comment->getDate(); ?></time>) <?= $comment->getAuthor(); ?> :</p>
  <p><?= $comment->getContent(); ?></p>
<?php endforeach; ?>