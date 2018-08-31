<?php
class Facture{
  // Attributs
  protected $id_facture;
  protected $date_facture;
  protected $numero_facture;
  protected $fk_societe;
  protected $fk_personne;
// Attributs venant de jointures avec d'autres tables (méthode sans annotations)
  protected $id_societe;
  protected $nom_societe;
  protected $nom_personne;
  protected $prenom_personne;
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
            // On récupère le nom du setter correspondant à l'attribut.
            $method = 'set'.ucfirst($key);
            // Si le setter correspondant existe.
            if (method_exists($this, $method)) {
                // On appelle le setter.
                $this->$method($value);
            }
        }
    }
    public function getId_facture()
    {
        return $this->id_facture;
    }

    public function setId_facture($id_facture)
    {
      $id_facture = (int) $id_facture;
      if($id_facture) {
          $this->id_facture = $id_facture;
      }
    }

    public function getDate_facture()
    {
        return $this->date_facture;
    }

    public function setDate_facture($date_facture)
    {
        $this->date_facture = filter_var ($date_facture, FILTER_SANITIZE_STRING);
    }

    public function getNumero_facture()
    {
        return $this->numero_facture;
    }

    public function setNumero_facture($numero_facture)
    {
        $this->numero_facture = filter_var ($numero_facture, FILTER_SANITIZE_STRING);
    }

    public function getFk_societe()
    {
        return $this->fk_societe;
    }

    public function setFk_societe($fk_societe)
    {
      $fk_societe = (int) $fk_societe;
      if($fk_societe) {
          $this->fk_societe = $fk_societe;
      }
    }

    public function getFk_personne()
    {
        return $this->fk_personne;
    }

    public function setFk_personne($fk_personne)
    {
      $fk_personne = (int) $fk_personne;
      if($fk_personne) {
          $this->fk_personne = $fk_personne;
      }
    }
    // GETTER ET SETTERS venant de la table Type et Société (! car non utilisation des annotations)
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
    public function getNom_personne()
    {
        return $this->nom_personne;
    }

    public function setNom_personne($nom_personne)
    {
        $this->nom_personne = $nom_personne;

        return $this;
    }

    public function getPrenom_personne()
    {
        return $this->prenom_personne;
    }

    public function setPrenom_personne($prenom_personne)
    {
        $this->prenom_personne = $prenom_personne;

        return $this;
    }
}
 ?>
