<?php
require_once 'Core/Database.php';
require_once 'Models/AnimationLibrary.php';
require_once 'Views/Template.php';
require_once 'Controllers/HomeController.php';
require_once 'Controllers/LibraryController.php';
require_once 'Controllers/AnimationController.php';
require_once 'Controllers/SearchController.php';
require_once 'Controllers/ErrorController.php';

class Router 
{
    private $Db;
    private $AnimationLib;
    
    public function __construct() 
    {
        $this->Db = new Database();
        $this->AnimationLib = new AnimationLibrary($this->Db);
    }
    
    public function Route() 
    {
        $page = isset($_GET['page']) ? $_GET['page'] : 'home';
        
        Template::RenderHeader();
        
        switch ($page) {
            case 'home':
                $controller = new HomeController($this->AnimationLib);
                $controller->Index();
                break;
            case 'libraries':
                $controller = new LibraryController($this->AnimationLib);
                $controller->Index();
                break;
            case 'library':
                $controller = new LibraryController($this->AnimationLib);
                $controller->View();
                break;
            case 'animation':
                $controller = new AnimationController($this->AnimationLib);
                $controller->View();
                break;
            case 'search':
                $controller = new SearchController($this->AnimationLib);
                $controller->Index();
                break;
            default:
                $controller = new ErrorController();
                $controller->NotFound();
        }
        
        Template::RenderFooter();
        $this->Db->Close();
    }
}
?>