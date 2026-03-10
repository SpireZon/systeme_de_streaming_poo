<?php
class Catalogue {
    private array $contenus = [];

    public function ajouterContenu(Video $v): void {
        $this->contenus[] = $v;
    }

    public function afficherTout(): string {
        $res = "";
        foreach ($this->contenus as $v) {
            $res .= $v->afficherDetails() . "<br>";
        }
        return $res;
    }
}