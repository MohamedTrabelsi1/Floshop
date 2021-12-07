<?php
 require_once 'config.php';
 require_once '../entites/Rate.php';

class rateC {


    public function selectrateC() {
        $sql = "SELECT * from ratee";
        $db = config::getConnexion();
    
        try {
            $query = $db->prepare($sql);
            $query->execute();
            
        }
    
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
    
        
        return $query;
    
    }

    public function deleterateC($id) {
        $sql = "DELETE FROM `ratee` WHERE id= :id";
        $db = config::getConnexion();
    
        try {
            $query = $db->prepare($sql);
            $params = ['id' => $id];
            $query->execute($params);
        }
    
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
    
    }

    public function searchrateC($keyword) {
        $sql = "SELECT * FROM `ratee` WHERE (`id` LIKE '%$keyword%' or `name` LIKE '%$keyword%' or `rate` LIKE '%$keyword%')";
        $db = config::getConnexion();
    
        try {
            $query = $db->prepare($sql);
            $query->execute();
        }
    
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
    
        return $query;
    
    }


}


?>