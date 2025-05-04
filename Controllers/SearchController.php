<?php
class SearchController 
{
    private $AnimationLib;
    
    public function __construct($animationLib) 
    {
        $this->AnimationLib = $animationLib;
    }
    
    public function Index() 
    {
        $query = isset($_GET['query']) ? $_GET['query'] : '';
        $results = [];
        
        if ($query) {
            $results = $this->AnimationLib->SearchAnimations($query);
        }
        
        ?>
        <section class="content">
            <h1>Search Animations</h1>
            
            <form class="search-form" action="index.php" method="GET">
                <input type="hidden" name="page" value="search">
                <div class="search-container">
                    <input type="text" name="query" value="<?= htmlspecialchars($query) ?>" placeholder="Search animations by name, library, or ID..." required>
                    <button type="submit">Search</button>
                </div>
            </form>
            
            <?php if ($query): ?>
                <h2>Search Results for "<?= htmlspecialchars($query) ?>"</h2>
                
                <?php if (empty($results)): ?>
                    <p class="no-results">No animations found matching your search.</p>
                <?php else: ?>
                    <div class="animations-grid">
                        <?php foreach ($results as $anim): ?>
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
                <?php endif; ?>
            <?php endif; ?>
        </section>
        <?php
    }
}
?>