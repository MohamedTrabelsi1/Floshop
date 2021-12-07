<?php

class user {
    private $id;
    private $name;
    private $rate;
    


    public function __construct($name,$rate)
    {
        $this->name=$name;
        $this->rate=$rate;
        
 
    }
    public function getid(){
        return $this->id;}
    public function getname(){
            return $this->name;}
    public function getrate(){
            return $this->rate;}
    
    


    public function setid($id){
        $this->id=$id;
    }
    public function setname($name){
        $this->name=$name;
    }
    public function setrate($rate){
        $this->rate=$rate;
    }
   
}


?>