<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <link rel="stylesheet" href="Content/style.css" />
        <title><?= $title ?></title>   <!-- Specific element -->
    </head>
    <body>
        <div id="global">
            <header>
                <a href="index.php"><h1 id="titleBlog">Jean Forteroche</h1></a>
                <p>Bienvenue sur mon modeste blog.</p>
            </header>
            <div id="content">
                <?= $content ?>   <!-- Specific element -->
            </div>
            <footer id="footerBlog">
                Blog realisé avec PHP, HTML5 et CSS.
            </footer>
        </div> <!-- #global -->
    </body>
</html>