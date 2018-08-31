<?php
class Personne{

protected $id_personne;
protected $nom_personne;
protected $prenom_personne;
protected $tel_personne;
protected $email_personne;
protected $fk_societe;

// Attributs venant de jointures avec d'autres tables (méthode sans annotations)


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

    /**
     * Get the value of Id Personne
     *
     * @return mixed
     */
    public function getId_personne()
    {
        return $this->id_personne;
    }

    /**
     * Set the value of Id Personne
     *
     * @param mixed id_personne
     *
     * @return self
     */
    public function setId_personne($id_personne)
    {
        $this->id_personne = $id_personne;

        return $this;
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

    /**
     * Get the value of Tel Personne
     *
     * @return mixed
     */
    public function getTel_personne()
    {
        return $this->tel_personne;
    }

    /**
     * Set the value of Tel Personne
     *
     * @param mixed tel_personne
     *
     * @return self
     */
    public function setTel_personne($tel_personne)
    {
        $this->tel_personne = $tel_personne;

        return $this;
    }

    /**
     * Get the value of Email Personne
     *
     * @return mixed
     */
    public function getEmail_personne()
    {
        return $this->email_personne;
    }

    /**
     * Set the value of Email Personne
     *
     * @param mixed email_personne
     *
     * @return self
     */
    public function setEmail_personne($email_personne)
    {
        $this->email_personne = $email_personne;

        return $this;
    }

    /**
     * Get the value of Fk Societe
     *
     * @return mixed
     */
    public function getFk_societe()
    {
        return $this->fk_societe;
    }

    /**
     * Set the value of Fk Societe
     *
     * @param mixed fk_societe
     *
     * @return self
     */
    public function setFk_societe($fk_societe)
    {
        $this->fk_societe = $fk_societe;

        return $this;
    }
}
?>
