<?php 

class livraison{
    
    private $Idlivraison;    
    
    private $Idcommande;

    private $IdLivreur;
    
    private $nomcomplet;
    
    private $adresse;
    
    private $ville;

    private $codepostal;
    
    private $pays;


    public function __construct($Idcommande,$Idlivraison,$IdLivreur,$nomcomplet,$adresse,$ville,$codepostal,$pays)
    {
        $this->Idlivraison=$Idlivraison;
        $this->Idcommande=$Idcommande;
        $this->IdLivreur=$IdLivreur;
        $this->nomcomplet=$nomcomplet;
        $this->adresse=$adresse;
        $this->ville=$ville;
        $this->codepostal=$codepostal;
        $this->pays=$pays;
    }
    //get
    public function get_Idlivraison()
    {
        return $this->Idlivraison;
    }
    
    public function get_Idcommande()
    {
        return $this->Idcommande;
    }
    public function get_IdLivreur()
    {
        return $this->IdLivreur;
    }
    public function get_nomcomplet()
    {
        return $this->nomcomplet;
    }
    public function get_adresse()
    {
        return $this->adresse;
    }
    public function get_ville()
    {
        return $this->ville;
    }
    public function get_codePostal()
    {
        return $this->codepostal;
    }
    public function get_pays()
    {
        return $this->pays;
    }
    
     //set
     public function set_ville($ville)
     {
          $this->ville=$ville;
     }
    public function set_Idlivraison($Idlivraison)
    {
         $this->Idlivraison=$Idlivraison;
    }
    public function set_codepostal($codepostal)
    {
         $this->codepostal=$codepostal;
    }
    public function set_pays($pays)
    {
         $this->pays=$pays;
    }
    


}

?>