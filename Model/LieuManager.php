<?php

/**
 * User: Pierremm
 * Date: 01/06/2020
 * Version: 1.0
 */
class LieuManager extends Manager
{

    public function lireTousLieux()
    {
        $sql = "SELECT * 
                FROM lieux
                ORDER BY nom ASC
                ";
        $req = $this->db->query($sql);
        $arrayLieux = array();
        while ($ligne = $req->fetch()) {
            $arrayLieux[] = new Lieu($ligne);
        }
        return $arrayLieux;
    }

    public function lireLieu($id)
    {
        $sql = "SELECT * 
                FROM lieux
                WHERE id = :id
                ";
        $req = $this->db->prepare($sql);
        $req->bindValue('id', $id, PDO::PARAM_INT);
        $req->execute();
        return new Lieu($req->fetch());
    }



    public function ajouterLieu($nom, $adresse, $cp, $ville, $contact)
    {
        //requete sql
        $sql = "  INSERT INTO lieux (nom,adresse,cp,ville,contact) 
                VALUES(:nom,:adresse,:cp,:ville,:contact)";

        //prepare la requete
        $req = $this->db->prepare($sql);

        //affecte aux variables pdo les valeurs contenues dans les variables
        $req->bindValue("nom", $nom, PDO::PARAM_STR);
        $req->bindValue("adresse", $adresse, PDO::PARAM_STR);
        $req->bindValue("cp", $cp, PDO::PARAM_STR);
        $req->bindValue("ville", $ville, PDO::PARAM_STR);
        $req->bindValue("contact", $contact, PDO::PARAM_INT);

        //execute la requete
        $req->execute();
    }

    public function modifierLieu($id, $nom, $adresse, $cp, $ville, $contact)
    {

        //requete sql
        $sql = "UPDATE lieux
                  SET nom=:nom,adresse=:adresse,cp=:cp, ville=:ville, contact=:contact
                  WHERE id=:id";


        //prepare la requete
        $req = $this->db->prepare($sql);

        //affecte aux variables pdo les v aleur s contenues dans les variables
        $req->bindValue('id', $id, PDO::PARAM_INT);
        $req->bindValue("nom", $nom, PDO::PARAM_STR);
        $req->bindValue("adresse", $adresse, PDO::PARAM_STR);
        $req->bindValue("cp", $cp, PDO::PARAM_STR);
        $req->bindValue("ville", $ville, PDO::PARAM_STR);
        $req->bindValue("contact", $contact, PDO::PARAM_INT);

        //execute la requete
        $req->execute();
    }


    public function effacerLieu($id)
    {
        $this->db->exec('DELETE FROM lieux WHERE id = ' . $id);
    }
}
