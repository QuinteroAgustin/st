<?php
class Flash {
    public $title;
    public $messages = array();
    public $type;

    public function __construct(){
        if(isset($_SESSION['flash'])){
            $this->fill($_SESSION['flash']);
        }else{
            $_SESSION['flash'] = $this;
        }
        return $this;
    }

    public function get_title(){
        return $this->title;
    }

    public function set_title($title){
        $this->title = $title;
        return $this;
    }

    public function get_messages(){
        return $this->messages;
    }

    public function set_messages($messages){
        $this->messages = $messages;
        return $this;
    }

    public function get_type(){
        return $this->type;
    }

    public function set_type($type){
        $this->type = $type;
        return $this;
    }

    public function add_messages($message){
        $this->messages[] = $message;
        return $this;
    }

    public function remove_messages(){
        $this->messages = array();
        return $this;
    }

    public function is_empty(){
        if(empty($this->messages)){
            return TRUE;
        }
        return FALSE;
    }

    public function put(){
        $_SESSION['flash'] = $this;
    }

    public function kill(){
        $_SESSION['flash'] = NULL;
    }

    public function afficher(){
        $msg = '';
        if (count($this->messages) > 0) {
            $msg .= '<div class="w3-panel w3-'.$this->type.' w3-display-container w3-round-xlarge">';
            $msg .= "<span onclick=\"this.parentElement.style.display='none'\" class=\"w3-button w3-display-topright w3-round-xlarge\">&times;</span>";
            $msg .= '<h3>'.$this->title.'</h3>';
            $msg .= '<ul>';
            foreach ($this->messages as $message) {
                $msg .= '<li>'.$message.'</li>';
            }
            $msg .= '</ul>';
            $msg .= '</div>';
        }
        return $msg;
    }
    
    //Function de fill sur les setter
    public function fill(Flash $tableau){
        foreach($tableau as $key => $valeur){
            $methode = 'set_'.$key;
            if(method_exists($this, $methode)){
                $this->$methode($valeur);
            }
        }
    }
}