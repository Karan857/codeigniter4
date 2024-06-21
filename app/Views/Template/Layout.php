<!DOCTYPE html>
<html lang="en">
    <head>
        <?= $template['head']; ?>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <?= $template['menu']; ?>
        </nav>
        <main>
            <?= $template['content']; ?>
        </main>
        <footer class="bg-dark fixed-bottom">
            <?= $template['footer']; ?>
        </footer>
    </body>
</html>