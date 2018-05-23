<?php $this->title = "Jean Forteroche"; ?>

<?php foreach ($posts as $post): ?>
    <article>
        <header>
            <a href="<?= "index.php?action=post&id=" . $post->getIdPost(); ?>">
                <h1 class="titlePost"><?= $post->getTitle(); ?></h1>
            </a>
            <time><?= $post->getDate(); ?></time>
        </header>
        <p><?= $post->getContent(); ?></p>
    </article>
    <hr />
<?php endforeach; ?>