<?php

/**
 * User: Pierremm
 * Date: 01/06/2020
 * Version: 1.0
 */
class PublicsManager extends Manager
{


    public function lireTousPublics()
    {
        $sql = "SELECT * 
                FROM publics
                ORDER BY nom ASC
                ";
        $req = $this->db->query($sql);
        $arrayPublics = array();
        while ($ligne = $req->fetch()) {
            $arrayPublics[] = new Publics($ligne);
        }
        return $arrayPublics;
    }
    

    public function lirePublic($id)
    {
        $sql = "SELECT * 
                FROM publics
                WHERE id = :id
                ";
        $req = $this->db->prepare($sql);
        $req->bindValue('id', $id, PDO::PARAM_INT);
        $req->execute();
        return new Publics($req->fetch());
    }



    public function ajouterPublic($nom)
    {
        //requete sql
        $sql = "  INSERT INTO publics (nom) 
                VALUES(:nom)";

        //prepare la requete
        $req = $this->db->prepare($sql);

        //affecte aux variables pdo les valeurs contenues dans les variables
        $req->bindValue("nom", $nom, PDO::PARAM_STR);

        //execute la requete
        $req->execute();
    }

    public function modifierPublic($id, $nom)
    {

            //requete sql
            $sql="UPDATE publics
                  SET nom=:nom
                  WHERE id=:id";
        
        
            //prepare la requete
            $req = $this->db->prepare($sql);
        
        //affecte aux variables pdo les valeurs contenues dans les variables
        $req->bindValue('id', $id, PDO::PARAM_INT);
        $req->bindValue("nom", $nom, PDO::PARAM_STR);

        
            //execute la requete
            $req->execute();
    
    }


    public function effacerPublic($id)
    {
      $this->db->exec('DELETE FROM publics WHERE id = '.$id);
    }
}
