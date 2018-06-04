<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <link rel="stylesheet" href="Content/style.css" />
        <script src='https://cloud.tinymce.com/stable/tinymce.min.js'></script>
        <script>
            tinymce.init({
                selector: '#txtPost',
                setup: function (editor) { editor.on('change', function () { editor.save(); }); }
            }); 
        </script>
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
                <a href="index.php?action=admin">Admin</a>
            </footer>
        </div> <!-- #global -->
    </body>
</html>