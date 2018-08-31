<?php

class Societe
{

    // Attributs
    protected $id_societe;
    protected $nom_societe;
    protected $adresse_societe;
    protected $tel_societe;
    protected $tva_societe;
    protected $fk_type;
    // Attributs venant de la jointure avec type, facture et personne (méthode sans annotations)
    protected $id_type;
    protected $type;

    // constantes

    // Méthodes

    // Constructeur
    public function __construct(array $datas)
    {
        $this->hydratation($datas);
    }

    // hydratation
    public function hydratation(array $donnees)
    {

        foreach ($donnees as $key => $value) {

            $method = 'set' . ucfirst($key);

            if (method_exists($this, $method)) {

                $this->$method($value);
            }
        }
    }


    // GETTERS et SETTERS
    public function getId_societe()
    {
        return $this->id_societe;
    }

    public function setId_societe($id_societe)
    {
        $id_societe = (int) $id_societe;
        if($id_societe) {
            $this->id_societe = $id_societe;
        }
    }

    public function getNom_societe()
    {
        return $this->nom_societe;
    }

    public function setNom_societe($nom_societe)
    {

        $this->nom_societe = filter_var ( $nom_societe, FILTER_SANITIZE_STRING);
    }

    public function getAdresse_societe()
    {

        return $this->$adresse_societe;
    }

    public function setAdresse_societe($adresse_societe)
    {
        $this->adresse_societe = filter_var ( $adresse_societe, FILTER_SANITIZE_STRING);
    }

    public function getTel_societe()
    {
        return $this->tel_societe;
    }

    public function setTel_societe($tel_societe)
    {
        if(is_string($tel_societe)) {
            $this->tel_societe = filter_var ( $tel_societe, FILTER_SANITIZE_STRING);
        }
    }

    public function getTva_societe()
    {
        return $this->tva_societe;
    }

    public function setTva_societe($tva_societe)
    {
        $tva_societe = (int) $tva_societe;
        if($tva_societe) {
            $this->tva_societe = $tva_societe;
        }
    }

    // GETTER ET SETTERS venant de la table Facture et Personne (! car non utilisation des annotations)

}
