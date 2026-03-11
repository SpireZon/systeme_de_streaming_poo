<?php
class Serie extends Video {
    private string $statut; 
    private array $episodes = [];

    public function __construct($id, $titre, $duree, $notation, $statut = "En cours") {
        parent::__construct($id, $titre, $duree, $notation);
        $this->statut = $statut;
    }

    public function ajouterEpisode(Episode $ep): void {
        $this->episodes[] = $ep;
    }

    public function getDureeTotale(): int {
        $t = 0;
        foreach ($this->episodes as $ep) $t += $ep->getDuree();
        return $t;
    }

    public function getType(): string { return "Série"; }

    public function afficherDetails(): string {
        $res = "SÉRIE : {$this->titre} - Statut: {$this->statut} - " . count($this->episodes) . " épisodes (" . $this->getDureeTotale() . "min)<br>";
        foreach($this->episodes as $ep) {
            $res .= "  > " . $ep->afficherDetails() . "<br>";
        }
        return $res;
    }
}