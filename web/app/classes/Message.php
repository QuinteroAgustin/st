<?php
class Message {
    private $id;
    private $nom;
    private $prenom;
    private $email;
    private $tel;
    private $adresse;
    private $ville;
    private $cp;
    private $subject;
    private $message;
    private $imgs;
    private $date;
    private $active;
    private $id_user;
    
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
     * Get the value of nom
     */ 
    public function get_nom()
    {
        return $this->nom;
    }

    /**
     * Set the value of nom
     *
     * @return  self
     */ 
    public function set_nom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get the value of email
     */ 
    public function get_email()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function set_email($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of subject
     */ 
    public function get_subject()
    {
        return $this->subject;
    }

    /**
     * Set the value of subject
     *
     * @return  self
     */ 
    public function set_subject($subject)
    {
        $this->subject = $subject;

        return $this;
    }

    /**
     * Get the value of message
     */ 
    public function get_message()
    {
        return $this->message;
    }

    /**
     * Set the value of message
     *
     * @return  self
     */ 
    public function set_message($message)
    {
        $this->message = $message;

        return $this;
    }

    /**
     * Get the value of imgs
     */ 
    public function get_imgs()
    {
        return $this->imgs;
    }

    /**
     * Set the value of imgs
     *
     * @return  self
     */ 
    public function set_imgs($imgs)
    {
        $this->imgs = $imgs;

        return $this;
    }

    /**
     * Get the value of date
     */ 
    public function get_date()
    {
        return $this->date;
    }

    /**
     * Set the value of date
     *
     * @return  self
     */ 
    public function set_date($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get the value of date
     */ 
    public function get_active()
    {
        return $this->active;
    }

    /**
     * Set the value of date
     *
     * @return  self
     */ 
    public function set_active($active)
    {
        $this->active = $active;

        return $this;
    }

    /**
     * Get the value of prenom
     */ 
    public function get_prenom()
    {
        return $this->prenom;
    }

    /**
     * Set the value of prenom
     *
     * @return  self
     */ 
    public function set_prenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get the value of tel
     */ 
    public function get_tel()
    {
        return $this->tel;
    }

    /**
     * Set the value of tel
     *
     * @return  self
     */ 
    public function set_tel($tel)
    {
        $this->tel = $tel;

        return $this;
    }

    /**
     * Get the value of adresse
     */ 
    public function get_adresse()
    {
        return $this->adresse;
    }

    /**
     * Set the value of adresse
     *
     * @return  self
     */ 
    public function set_adresse($adresse)
    {
        $this->adresse = $adresse;

        return $this;
    }

    /**
     * Get the value of ville
     */ 
    public function get_ville()
    {
        return $this->ville;
    }

    /**
     * Set the value of ville
     *
     * @return  self
     */ 
    public function set_ville($ville)
    {
        $this->ville = $ville;

        return $this;
    }

    /**
     * Get the value of cp
     */ 
    public function get_cp()
    {
        return $this->cp;
    }

    /**
     * Set the value of cp
     *
     * @return  self
     */ 
    public function set_cp($cp)
    {
        $this->cp = $cp;

        return $this;
    }

    /**
     * obtenir un bon numero
     *
     * @return  $tel
     */ 
    public function get_tel_format()
    {
        if(strlen($this->get_tel()) == 9){
            if(substr($this->get_tel(), 0, 1) != 0){
                return '+33'.$this->get_tel();
            }
        }else{
            if (strlen($this->get_tel()) == 11) {
                if(substr($this->get_tel(), 0, 2) == 33){
                    return '+'.$this->get_tel();
                }
            }else{
                return '(NA)'.$this->get_tel();
            }
        }
        
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