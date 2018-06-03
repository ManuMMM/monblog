<?php $this->title = "Jean Forteroche"; ?>

<?php foreach ($posts as $post): ?>
    <article>
        <header>
            <a href="<?= "index.php?action=getPost&id=" . $post->getIdPost(); ?>">
                <h2 class="titlePost"><?= $post->getTitle(); ?></h2>
            </a>
            <time><?= $post->getDate(); ?></time>
        </header>
        <p><?= $post->getContent(); ?></p>
    </article>
    <hr />
<?php endforeach; ?>