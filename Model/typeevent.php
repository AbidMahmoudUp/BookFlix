<?php
class typeevent {
    private $idtypeevent;
    private $nametypeevent;


    public function __construct($idtypeevent, $nametypeevent) {
        $this->idtypeevent = $idtypeevent;
        $this->nametypeevent = $nametypeevent;
    }

    public function getIdidtypeevent() {
        return $this->idtypeevent;
    }

    public function setIdidtypeevent($idtypeevent) {
        $this->idtypeevent = $idtypeevent;
    }

    public function getnametypeevent() {
        return $this->nametypeevent;
    }

    public function setnametypeevent($nametypeevent) {
        $this->nametypeevent = $nametypeevent;
    }

}


?>