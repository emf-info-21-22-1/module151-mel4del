<?php
require('wrk.php');

class Ctrl
{
    private $wrk = null;

    public function __construct()
    {
        $this->wrk = new Wrk();


    }

    public function getListeEquipeWrk(): array
    {
        return $this->wrk->getListeEquipe();
    }
}

?>