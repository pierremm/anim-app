<?php

/**
 * User: Pierremm
 * Date: 01/06/2020
 * Version: 1.0
 */
class ProjetManager extends Manager
{


    public function lireTousProjets()
    {
        $sql = "SELECT * 
                FROM projets
                ORDER BY nom ASC
                ";
        $req = $this->db->query($sql);
        $arrayProjets = array();
        while ($ligne = $req->fetch()) {
            $arrayProjets[] = new Projet($ligne);
        }
        return $arrayProjets;
    }
    

    public function lireProjet($id)
    {
        $sql = "SELECT * 
                FROM projets
                WHERE id = :id
                ";
        $req = $this->db->prepare($sql);
        $req->bindValue('id', $id, PDO::PARAM_INT);
        $req->execute();
        return new Projet($req->fetch());
    }



    public function ajouterProjet($nom)
    {
        //requete sql
        $sql = "  INSERT INTO projets (nom) 
                VALUES(:nom)";

        //prepare la requete
        $req = $this->db->prepare($sql);

        //affecte aux variables pdo les valeurs contenues dans les variables
        $req->bindValue("nom", $nom, PDO::PARAM_STR);

        //execute la requete
        $req->execute();
    }

    public function modifierProjet($id, $nom)
    {

            //requete sql
            $sql="UPDATE projets
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


    public function effacerProjet($id)
    {
      $this->db->exec('DELETE FROM projets WHERE id = '.$id);
    }
}
