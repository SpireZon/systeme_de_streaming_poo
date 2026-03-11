<?php
class Film extends Video {
    private float $budget;
    private float $boxOffice;

    public function __construct($id, $titre, $duree, $notation, $budget, $boxOffice) {
        parent::__construct($id, $titre, $duree, $notation);
        $this->budget = $budget;
        $this->boxOffice = $boxOffice;
    }

    public function calculerRentabilite(): float {
        return ($this->budget > 0) ? ($this->boxOffice / $this->budget) * 100 : 0;
    }

    public function getType(): string { return "Film"; }

    public function afficherDetails(): string {
        return "FILM : {$this->titre} ({$this->formaterDuree()}) - Note: {$this->notation}/5 - Rentabilité: " . number_format($this->calculerRentabilite(), 2) . "%";
    }
}