<?php
class Abonnement {
    private $id;
    private $date_debut;
    private $date_fin;
    private $id_user;
    private $id_type_entretien;
    private $id_entretien;

    // Constructeur
    public function __construct(array $tableau = null)
    {
        if ($tableau != null) {
            $this->fill($tableau);
        }
    }

    /**
     * Get the value of id
     */ 
    public function get_id()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function set_id($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of date_debut
     */ 
    public function get_date_debut()
    {
        return $this->date_debut;
    }

    /**
     * Set the value of date_debut
     *
     * @return  self
     */ 
    public function set_date_debut($date_debut)
    {
        $this->date_debut = $date_debut;

        return $this;
    }

    /**
     * Get the value of date_fin
     */ 
    public function get_date_fin()
    {
        return $this->date_fin;
    }

    /**
     * Set the value of date_fin
     *
     * @return  self
     */ 
    public function set_date_fin($date_fin)
    {
        $this->date_fin = $date_fin;

        return $this;
    }

    /**
     * Get the value of id_user
     */ 
    public function get_id_user()
    {
        return $this->id_user;
    }

    /**
     * Set the value of id_user
     *
     * @return  self
     */ 
    public function set_id_user($id_user)
    {
        $this->id_user = $id_user;

        return $this;
    }

    /**
     * Get the value of id_type_entretien
     */ 
    public function get_id_type_entretien()
    {
        return $this->id_type_entretien;
    }

    /**
     * Set the value of id_type_entretien
     *
     * @return  self
     */ 
    public function set_id_type_entretien($id_type_entretien)
    {
        $this->id_type_entretien = $id_type_entretien;

        return $this;
    }

    /**
     * Get the value of id_entretien
     */ 
    public function get_id_entretien()
    {
        return $this->id_entretien;
    }

    /**
     * Set the value of id_entretien
     *
     * @return  self
     */ 
    public function set_id_entretien($id_entretien)
    {
        $this->id_entretien = $id_entretien;

        return $this;
    }

    /**
     * Hydrateur
     * Alimente les propriétés à partir d'un tableau
     * @param array $tableau
     */
    public function fill(array $tableau)
    {
        foreach ($tableau as $cle => $valeur) {
            $methode = 'set_' . $cle;
            if (method_exists($this, $methode)) {
                $this->$methode($valeur);
            }
        }
    }
}