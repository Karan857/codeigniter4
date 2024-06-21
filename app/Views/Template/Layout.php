<!DOCTYPE html>
<html lang="en">
    <head>
        <?= $template['head']; ?>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg bg-warning navbar navbar-warning ">
            <?= $template['menu']; ?>
        </nav>
        <main>
            <?= $template['content']; ?>
        </main>
        <footer class="bg-warning navbar navbar-warning fixed-bottom justify-content-center d-flex align-items-center mt-">
            <?= $template['footer']; ?>
        </footer>
    </body>
</html>