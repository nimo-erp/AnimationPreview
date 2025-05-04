<?php
class Database 
{
    private $Connection;
    
    public function __construct() 
    {
        $this->Connection = new mysqli(
            Config::$DbHost, 
            Config::$DbUser, 
            Config::$DbPass, 
            Config::$DbName
        );
        
        if ($this->Connection->connect_error) {
            die("Connection failed: " . $this->Connection->connect_error);
        }
    }
    
    public function Query($sql) 
    {
        return $this->Connection->query($sql);
    }
    
    public function Close() 
    {
        $this->Connection->close();
    }
    
    public function Escape($string) 
    {
        return $this->Connection->real_escape_string($string);
    }
}
?>