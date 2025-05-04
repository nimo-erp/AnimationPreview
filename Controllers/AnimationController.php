<?php
class AnimationController 
{
    private $AnimationLib;
    
    public function __construct($animationLib) 
    {
        $this->AnimationLib = $animationLib;
    }
    
    public function View() 
    {
        if (!isset($_GET['id'])) {
            $controller = new ErrorController();
            $controller->NotFound();
            return;
        }
        
        $id = (int)$_GET['id'];
        $animation = $this->AnimationLib->GetAnimationById($id);
        
        if (!$animation) {
            $controller = new ErrorController();
            $controller->NotFound();
            return;
        }
        
        ?>
        <section class="content animation-details">
            <h1><?= htmlspecialchars($animation['name']) ?></h1>
            <div class="animation-container">
                <div class="animation-video">
                    <video controls autoplay loop>
                        <source src="assets/videos/<?= htmlspecialchars($animation['library']) ?>_<?= htmlspecialchars($animation['name']) ?>.mp4" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                </div>
                
                <div class="animation-info">
                    <div class="info-group">
                        <h3>Library</h3>
                        <p><?= htmlspecialchars($animation['library']) ?></p>
                    </div>
                    
                    <div class="info-group">
                        <h3>Animation ID</h3>
                        <p><?= htmlspecialchars($animation['anim_id']) ?></p>
                    </div>
                    
                    <div class="info-group">
                        <h3>PAWN Code</h3>
                        <pre><code>ApplyAnimation(playerid, "<?= htmlspecialchars($animation['library']) ?>", "<?= htmlspecialchars($animation['name']) ?>", 4.1, 0, 0, 0, 0, 0);</code></pre>
                    </div>
                    
                    <a href="index.php?page=library&name=<?= urlencode($animation['library']) ?>" class="button">
                        View All <?= htmlspecialchars($animation['library']) ?> Animations
                    </a>
                </div>
            </div>
        </section>
        <?php
    }
}
?>