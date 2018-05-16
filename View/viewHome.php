<?php $this->title = "Jean Forteroche"; ?>

<?php foreach ($posts as $post): ?>
    <article>
        <header>
            <a href="<?= "index.php?action=post&id=" . $post['id'] ?>">
                <h1 class="titlePost"><?= $post['title'] ?></h1>
            </a>
            <time><?= $post['date'] ?></time>
        </header>
        <p><?= $post['content'] ?></p>
    </article>
    <hr />
<?php endforeach; ?>