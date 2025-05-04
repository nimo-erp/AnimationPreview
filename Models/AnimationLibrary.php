<?php
require_once 'Core/Database.php';

class AnimationLibrary 
{
    private $Db;
    
    public function __construct(Database $db) 
    {
        $this->Db = $db;
    }
    
    public function GetAllAnimations() 
    {
        $result = $this->Db->Query("SELECT * FROM animations ORDER BY library, name");
        $animations = [];
        
        while ($row = $result->fetch_assoc()) {
            $animations[] = $row;
        }
        
        return $animations;
    }
    
    public function GetAnimationsByLibrary($library) 
    {
        $library = $this->Db->Escape($library);
        $result = $this->Db->Query("SELECT * FROM animations WHERE library = '$library' ORDER BY name");
        $animations = [];
        
        while ($row = $result->fetch_assoc()) {
            $animations[] = $row;
        }
        
        return $animations;
    }
    
    public function GetLibraries() 
    {
        $result = $this->Db->Query("SELECT DISTINCT library FROM animations ORDER BY library");
        $libraries = [];
        
        while ($row = $result->fetch_assoc()) {
            $libraries[] = $row['library'];
        }
        
        return $libraries;
    }
    
    public function GetAnimationById($id) 
    {
        $id = (int)$id;
        $result = $this->Db->Query("SELECT * FROM animations WHERE id = $id");
        
        if ($result->num_rows === 0) {
            return null;
        }
        
        return $result->fetch_assoc();
    }
    
    public function SearchAnimations($query) 
    {
        $search = $this->Db->Escape($query);
        $result = $this->Db->Query("SELECT * FROM animations WHERE 
            name LIKE '%$search%' OR 
            library LIKE '%$search%' OR 
            anim_id LIKE '%$search%'
            ORDER BY library, name");
        
        $animations = [];
        
        while ($row = $result->fetch_assoc()) {
            $animations[] = $row;
        }
        
        return $animations;
    }
}
?>