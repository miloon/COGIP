<?php
class FactureManager
{

    private $db; // Instance de PDO.
    public function __construct(PDO $connexion)
    {
        $this->db = $connexion;
    }

    // Constructeur
    /*public function __construct(array $datas)
    {
        $this->hydratation($datas);
    }*/

    // Méthode pour afficher tous les factures avec le nom de la société et le type de la société
    public function listerFacture(){
        //$recup = $this->db->query("SELECT numero_facture, date_facture, fk_personne, fk_societe FROM factures");
        $recup = $this->db->query("SELECT id_facture, numero_facture, date_facture, id_societe, nom_societe, nom_personne, prenom_personne FROM factures, societes, personnes WHERE factures.fk_societe = societes.id_societe AND personnes.id_personne = fk_personne");
        // si on a pas de résultat (rowCount() retourne 0 => false)
        if(!$recup->rowCount()){
            return "Pas encore de facture à afficher";
        }
        // le else n'est pas nécessaire car le return envoie une valeur et arrête la méthode
        // Il y a au moins une ligne de résultat, transformation des résultats de la requête en tableau associatif
        $resultat = $recup->fetchAll(PDO::FETCH_ASSOC);
        // envoi du tableau
        return $resultat;
    }
}
