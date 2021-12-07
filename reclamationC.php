<?php
 require_once 'config.php';
 require_once '../entites/Reclamation.php';

class reclamationC {


    public function selectReclamations() {
        $sql = "SELECT * from reclamation";
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

    public function deleteReclamation($id_rec) {
        $sql = "DELETE FROM `reclamation` WHERE id_rec= :id_rec";
        $db = config::getConnexion();
    
        try {
            $query = $db->prepare($sql);
            $params = ['id_rec' => $id_rec];
            $query->execute($params);
        }
    
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
    
    }

    public function searchReclamations($keyword) {
        $sql = "SELECT * FROM `reclamation` WHERE (`id_rec` LIKE '%$keyword%' or `mail_rec` LIKE '%$keyword%' or `desc_rec` LIKE '%$keyword%')";
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

	function ajouteradherent($reclamation){
        $sql="INSERT INTO reclamation (mail_rec,desc_rec) 
        VALUES (:mail_rec,:desc_rec)";
        $db = config::getConnexion();
        try{
            $query = $db->prepare($sql);
            $query->execute([
                'mail_rec' => $reclamation->getMail_rec(),
                'desc_rec' => $reclamation->getDesc_rec(),
            
            ]);			
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }			
    }
}


?>