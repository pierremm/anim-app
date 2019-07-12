<?php

/**
 * User: Pierremm
 * Date: 11/07/19
 * Version: 1.0
 */
class PartenaireManager extends Manager
{


    public function lireTousPartenaires()
    {
        $sql = "SELECT * 
                FROM partenaires";
        $req = $this->db->query($sql);
        $arrayPartenaires = array();
        while ($ligne = $req->fetch()) {
            $arrayPartenaires[] = new Partenaire($ligne);
        }
        return $arrayPartenaires;
    }

    public function lirePartenaire($id)
    {
        $sql = "SELECT * 
                FROM partenaires
                WHERE id = :id
                ";
        $req = $this->db->prepare($sql);
        $req->bindValue('id', $id, PDO::PARAM_INT);
        $req->execute();
        return new Partenaire($req->fetch());
    }



    public function ajouterPartenaire($nom, $tel, $email, $contact)
    {
        //requete sql
        $sql = "  INSERT INTO partenaires (nom,tel,email,contact) 
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

    public function modifierPartenaire($id, $nom, $tel, $email, $contact)
    {

            //requete sql
            $sql="UPDATE partenaires
                  SET nom=:nom,tel=:tel, email=:email, contact=:contact
                  WHERE id=:id";
        
        
            //prepare la requete
            $req = $this->db->prepare($sql);
        
        //affecte aux variables pdo les valeurs contenues dans les variables
        $req->bindValue('id', $id, PDO::PARAM_INT);
        $req->bindValue("nom", $nom, PDO::PARAM_STR);
        $req->bindValue("tel", $tel, PDO::PARAM_STR);
        $req->bindValue("email", $email, PDO::PARAM_STR);
        $req->bindValue("contact", $contact, PDO::PARAM_INT);
        
            //execute la requete
            $req->execute();
    
    }


    public function effacerPartenaire($id)
    {
      $this->db->exec('DELETE FROM partenaires WHERE id = '.$id);
    }
}
