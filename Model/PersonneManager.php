<?php

/**
 * User: Pierremm
 * Date: 08/07/19
 * Version: 1.0
 */
class PersonneManager extends Manager
{


    public function lireToutesPersonnes()
    {
        $sql = "SELECT * 
                FROM personnes";
        $req = $this->db->query($sql);
        $arrayPersonnes = array();
        while ($ligne = $req->fetch()) {
            $arrayPersonnes[] = new Personne($ligne);
        }
        return $arrayPersonnes;
    }

    public function lirePersonne($id)
    {
        $sql = "SELECT * 
                FROM personnes
                WHERE id = :id
                ";
        $req = $this->db->prepare($sql);
        $req->bindValue('id', $id, PDO::PARAM_INT);
        $req->execute();
        return new Personne($req->fetch());
    }



    public function ajouterPersonne($nom, $prenom, $tel, $email, $qualite)
    {
        //requete sql
        $sql = "  INSERT INTO personnes (nom,prenom,tel,email,qualite) 
                VALUES(:nom,:prenom,:tel,:email,:qualite)";

        //prepare la requete
        $req = $this->db->prepare($sql);

        //affecte aux variables pdo les valeurs contenues dans les variables
        $req->bindValue("nom", $nom, PDO::PARAM_STR);
        $req->bindValue("prenom", $prenom, PDO::PARAM_STR);
        $req->bindValue("tel", $tel, PDO::PARAM_STR);
        $req->bindValue("email", $email, PDO::PARAM_STR);
        $req->bindValue("qualite", $qualite, PDO::PARAM_INT);

        //execute la requete
        $req->execute();
    }

    public function modifierPersonne($id, $nom, $prenom, $tel, $email, $qualite)
    {

            //requete sql
            $sql="UPDATE personnes
                  SET nom=:nom,prenom=:prenom,tel=:tel, email=:email, qualite=:qualite
                  WHERE id=:id";
        
        
            //prepare la requete
            $req = $this->db->prepare($sql);
        
        //affecte aux variables pdo les v aleur s contenues dans les variables
        $req->bindValue('id', $id, PDO::PARAM_INT);
        $req->bindValue("nom", $nom, PDO::PARAM_STR);
        $req->bindValue("prenom", $prenom, PDO::PARAM_STR);
        $req->bindValue("tel", $tel, PDO::PARAM_STR);
        $req->bindValue("email", $email, PDO::PARAM_STR);
        $req->bindValue("qualite", $qualite, PDO::PARAM_INT);
        
            //execute la requete
            $req->execute();
    
    }


    public function effacerPersonne($id)
    {
      $this->db->exec('DELETE FROM personnes WHERE id = '.$id);
    }
}
