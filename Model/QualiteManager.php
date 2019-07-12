<?php

/**
 * User: Pierremm
 * Date: 09/07/19
 * Version: 1.0
 */
class QualiteManager extends Manager
{


    public function lireToutesQualites()
    {
        $sql = "SELECT * 
                FROM qualites";
        $req = $this->db->query($sql);
        $arrayQualites = array();
        while ($ligne = $req->fetch()) {
            $arrayQualites[] = new Qualite($ligne);
        }
        return $arrayQualites;
    }
    

    public function lireQualite($id)
    {
        $sql = "SELECT * 
                FROM qualites
                WHERE id = :id
                ";
        $req = $this->db->prepare($sql);
        $req->bindValue('id', $id, PDO::PARAM_INT);
        $req->execute();
        return new Qualite($req->fetch());
    }



    public function ajouterQualite($nom)
    {
        //requete sql
        $sql = "  INSERT INTO qualites (nom) 
                VALUES(:nom)";

        //prepare la requete
        $req = $this->db->prepare($sql);

        //affecte aux variables pdo les valeurs contenues dans les variables
        $req->bindValue("nom", $nom, PDO::PARAM_STR);

        //execute la requete
        $req->execute();
    }

    public function modifierQualite($id, $nom)
    {

            //requete sql
            $sql="UPDATE qualites
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


    public function effacerQualite($id)
    {
      $this->db->exec('DELETE FROM qualites WHERE id = '.$id);
    }
}
