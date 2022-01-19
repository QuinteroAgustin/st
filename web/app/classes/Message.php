<?php
class Message {
    private $id;
    private $nom;
    private $email;
    private $subject;
    private $message;
    private $imgs;
    private $date;
    
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