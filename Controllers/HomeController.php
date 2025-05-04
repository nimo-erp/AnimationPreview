<?php
class HomeController 
{
    private $AnimationLib;
    
    public function __construct($animationLib) 
    {
        $this->AnimationLib = $animationLib;
    }
    
    public function Index() 
    {
        $animations = $this->AnimationLib->GetAllAnimations();
        $libraries = $this->AnimationLib->GetLibraries();
        
        ?>
        <section class="hero">
            <h1>Welcome to SAMP Animation Previewer</h1>
            <p>Browse and preview all San Andreas Multiplayer animations</p>
        </section>
        
        <section class="content">
            <h2>Animation Libraries</h2>
            <div class="libraries-grid">
                <?php foreach ($libraries as $library): ?>
                <a href="index.php?page=library&name=<?= urlencode($library) ?>" class="library-card">
                    <h3><?= htmlspecialchars($library) ?></h3>
                </a>
                <?php endforeach; ?>
            </div>
            
            <h2>Recent Animations</h2>
            <div class="animations-grid">
                <?php 
                $recentAnims = array_slice($animations, 0, 8);
                foreach ($recentAnims as $anim): 
                ?>
                <a href="index.php?page=animation&id=<?= $anim['id'] ?>" class="animation-card">
                    <div class="animation-preview">
                        <img src="assets/images/previews/<?= htmlspecialchars($anim['library']) ?>_<?= htmlspecialchars($anim['name']) ?>.jpg" 
                             alt="<?= htmlspecialchars($anim['name']) ?>" 
                             onerror="this.src='assets/images/no-preview.jpg'">
                    </div>
                    <h3><?= htmlspecialchars($anim['name']) ?></h3>
                    <span class="library-tag"><?= htmlspecialchars($anim['library']) ?></span>
                </a>
                <?php endforeach; ?>
            </div>
        </section>
        <?php
    }
}
?>