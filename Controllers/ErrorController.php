<?php
class ErrorController 
{
    public function NotFound() 
    {
        ?>
        <section class="content not-found">
            <h1>404 - Page Not Found</h1>
            <p>The page you are looking for does not exist.</p>
            <a href="index.php" class="button">Back to Home</a>
        </section>
        <?php
    }
}
?>