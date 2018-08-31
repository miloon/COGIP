<?php

class Societe
{

    // Attributs
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
    public function getId_type()
    {
        return $this->id_type;
    }

    public function setId_societe($id_type)
    {
        $id_type = (int) $id_type;
        if($id_type) {
            $this->id_type = $id_type;
        }
    }

    public function getType()
    {
        return $this->type;
    }

    public function setType($type)
    {

        $this->type = filter_var ( $type, FILTER_SANITIZE_STRING);
    }
