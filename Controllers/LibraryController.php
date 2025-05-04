<?php
class LibraryController 
{
    private $AnimationLib;
    
    public function __construct($animationLib) 
    {
        $this->AnimationLib = $animationLib;
    }
    
    public function Index() 
    {
        $libraries = $this->AnimationLib->GetLibraries();
        
        ?>
        <section class="content">
            <h1>Animation Libraries</h1>
            <div class="libraries-list">
                <?php foreach ($libraries as $library): ?>
                <a href="index.php?page=library&name=<?= urlencode($library) ?>" class="library-card large">
                    <h2><?= htmlspecialchars($library) ?></h2>
                    <p>Click to view all animations in this library</p>
                </a>
                <?php endforeach; ?>
            </div>
        </section>
        <?php
    }
    
    public function View() 
    {
        if (!isset($_GET['name'])) {
            $controller = new ErrorController();
            $controller->NotFound();
            return;
        }
        
        $libraryName = $_GET['name'];
        $animations = $this->AnimationLib->GetAnimationsByLibrary($libraryName);
        
        ?>
        <section class="content">
            <h1>Library: <?= htmlspecialchars($libraryName) ?></h1>
            
            <div class="animations-grid">
                <?php foreach ($animations as $anim): ?>
                <a href="index.php?page=animation&id=<?= $anim['id'] ?>" class="animation-card">
                    <div class="animation-preview">
                        <img src="assets/images/previews/<?= htmlspecialchars($anim['library']) ?>_<?= htmlspecialchars($anim['name']) ?>.jpg" 
                             alt="<?= htmlspecialchars($anim['name']) ?>" 
                             onerror="this.src='assets/images/no-preview.jpg'">
                    </div>
                    <h3><?= htmlspecialchars($anim['name']) ?></h3>
                    <span class="animation-id"><?= htmlspecialchars($anim['anim_id']) ?></span>
                </a>
                <?php endforeach; ?>
            </div>
        </section>
        <?php
    }
}
?>