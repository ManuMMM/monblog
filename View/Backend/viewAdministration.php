<?php $this->title = "Jean Forteroche - Panneau d'aministration" ?>
<form method="post" action="#writePost">
    <button>Ecrire un article</button>
</form>
<form method="post" action="#modifyPost">
    <button>Editer un article</button>
</form>
<form method="post" action="#moderateComments">
    <button>Modérer les commentaires</button>
</form>
<section class="adminSections" id="writePost">
    <header>
        <h1 id="admin_write_article">Rédaction d'article</h1>
    </header>
    <form method="post" action="index.php?action=addpost">
    <input id="title" name="title" type="text" placeholder="Titre" required /><br />
    <textarea id="txtPost" name="content" rows="4" placeholder="Article" required></textarea><br />
    <input type="hidden" name="id" value="" />
    <button type="reset">Effacer</button>
    <input type="submit" value="Publier" />
    </form>
</section>
<section class="adminSections" id="modifyPost">
    <h2>Modifier un article</h2>
    <?php foreach ($posts as $post): ?>
    <section>
        <a href="<?= "index.php?action=getPost&id=" . $post->getIdPost(); ?>">
            <h2 class="titlePost"><?= $post->getTitle(); ?></h2>
        </a>
        <time><?= $post->getDate(); ?></time>
        <form method="post" action="index.php?action=editor">
            <input type="hidden" name="id" value="<?= $post->getIdPost(); ?>" />
            <input type="submit" value="Editer" />
        </form>
        <form method="post" action="index.php?action=deletepost">
            <input type="hidden" name="id" value="<?= $post->getIdPost(); ?>" />
            <input type="hidden" name="post" value="<?= urlencode(serialize($post)); ?>" />
            <input type="submit" value="Supprimer" />
        </form>
    </section>
    <hr />
    <?php endforeach; ?>
</section>
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