<?php
require_once 'Config/Config.php';

class Template 
{
    public static function RenderHeader() 
    {
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title><?= Config::$SiteTitle ?></title>
            <link rel="stylesheet" href="assets/css/style.css">
        </head>
        <body>
            <header>
                <nav>
                    <div class="logo"><?= Config::$SiteTitle ?></div>
                    <ul class="menu">
                        <li><a href="index.php">Home</a></li>
                        <li><a href="index.php?page=libraries">Animation Libraries</a></li>
                        <li><a href="index.php?page=search">Search</a></li>
                    </ul>
                </nav>
            </header>
            <main>
        <?php
    }
    
    public static function RenderFooter() 
    {
        ?>
            </main>
            <footer>
                <p>&copy; <?= date('Y') ?> SAMP Animation Previewer. All rights reserved.</p>
            </footer>
            <script src="assets/js/script.js"></script>
        </body>
        </html>
        <?php
    }
}
?>