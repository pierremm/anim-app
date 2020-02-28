<?php

/**
 * User: Pierremm
 * Date: 11/07/19
 * Version: 1.0
 */
class EtablissementManager extends Manager
{


    public function lireTousEtablissements()
    {
        $sql = "SELECT * 
                FROM etablissements";
        $req = $this->db->query($sql);
        $arrayEtablissements = array();
        while ($ligne = $req->fetch()) {
            $arrayEtablissements[] = new Etablissement($ligne);
        }
        return $arrayEtablissements;
    }

    public function lireEtablissement($id)
    {
        $sql = "SELECT * 
                FROM etablissements
                WHERE id = :id
                ";
        $req = $this->db->prepare($sql);
        $req->bindValue('id', $id, PDO::PARAM_INT);
        $req->execute();
        return new Etablissement($req->fetch());
    }



    public function ajouterEtablissement($nom, $tel, $email, $contact)
    {
        //requete sql
        $sql = "  INSERT INTO etablissements (nom,tel,email,contact) 
                VALUES(:nom,:tel,:email,:contact)";

        //prepare la requete
        $req = $this->db->prepare($sql);

        //affecte aux variables pdo les valeurs contenues dans les variables
        $req->bindValue("nom", $nom, PDO::PARAM_STR);
        $req->bindValue("tel", $tel, PDO::PARAM_STR);
        $req->bindValue("email", $email, PDO::PARAM_STR);
        $req->bindValue("contact", $contact, PDO::PARAM_INT);

        //execute la requete
        $req->execute();
    }

    public function modifierEtablissement($id, $nom, $tel, $email, $contact)
    {

            //requete sql
            $sql="UPDATE etablissements
                  SET nom=:nom,tel=:tel, email=:email, contact=:contact
                  WHERE id=:id";
        
        
            //prepare la requete
            $req = $this->db->prepare($sql);
        
        //affecte aux variables pdo les  valeurs contenues dans les variables
        $req->bindValue('id', $id, PDO::PARAM_INT);
        $req->bindValue("nom", $nom, PDO::PARAM_STR);
        $req->bindValue("tel", $tel, PDO::PARAM_STR);
        $req->bindValue("email", $email, PDO::PARAM_STR);
        $req->bindValue("contact", $contact, PDO::PARAM_INT);
        
            //execute la requete
            $req->execute();
    
    }


    public function effacerEtablissement($id)
    {
      $this->db->exec('DELETE FROM etablissements WHERE id = '.$id);
    }
}
