<?php $this->title = "Jean Forteroche - " . $post['title']; ?>

<article>
    <header>
        <h1 class="titlePost"><?= $post['title'] ?></h1>
        <time><?= $post['date'] ?></time>
    </header>
    <p><?= $post['content'] ?></p>
</article>

<hr />

<header>
  <h1 id="titleReponses">Réponses à <?= $post['title'] ?></h1>
</header>
<form method="post" action="index.php?action=comment">
    <input id="author" name="author" type="text" placeholder="Votre pseudo" required /><br />
    <textarea id="txtComment" name="content" rows="4" placeholder="Votre commentaire" required></textarea><br />
    <input type="hidden" name="id" value="<?= $post['id'] ?>" />
    <input type="submit" value="Poster" />
</form>
<?php foreach ($comments as $comment): ?>
  <p><?= $comment['author'] ?> dit :</p>
  <p><?= $comment['content'] ?></p>
<?php endforeach; ?>