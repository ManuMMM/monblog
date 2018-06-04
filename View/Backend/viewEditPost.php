<?php $this->title = "Jean Forteroche - Panneau d'aministration" ?>

<header>
    <h1 id="editor">Editeur</h1>
</header>
<form method="post" action="index.php?action=updatepost">
    <input id="title" name="title" type="text" placeholder="Titre" value="<?= $post->getTitle(); ?>" required /><br />
    <textarea id="txtPost" name="content" rows="4" placeholder="Article" required><?= $post->getContent(); ?></textarea><br />
    <input type="hidden" name="id" value="<?= $post->getIdPost(); ?>" />
    <button type="reset">Effacer</button>
    <input type="submit" value="Modifier" />
</form>