<?php

/**
 * User: Pierremm
 * Date: 09/07/19
 * Version: 1.0
 */
class ThemeManager extends Manager
{


    public function lireTousThemes()
    {
        $sql = "SELECT * 
                FROM themes";
        $req = $this->db->query($sql);
        $arrayThemes = array();
        while ($ligne = $req->fetch()) {
            $arrayThemes[] = new Theme($ligne);
        }
        return $arrayThemes;
    }
    

    public function lireTheme($id)
    {
        $sql = "SELECT * 
                FROM themes
                WHERE id = :id
                ";
        $req = $this->db->prepare($sql);
        $req->bindValue('id', $id, PDO::PARAM_INT);
        $req->execute();
        return new Theme($req->fetch());
    }



    public function ajouterTheme($nom)
    {
        //requete sql
        $sql = "  INSERT INTO themes (nom) 
                VALUES(:nom)";

        //prepare la requete
        $req = $this->db->prepare($sql);

        //affecte aux variables pdo les valeurs contenues dans les variables
        $req->bindValue("nom", $nom, PDO::PARAM_STR);

        //execute la requete
        $req->execute();
    }

    public function modifierTheme($id, $nom)
    {

            //requete sql
            $sql="UPDATE themes
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


    public function effacerTheme($id)
    {
      $this->db->exec('DELETE FROM themes WHERE id = '.$id);
    }
}
