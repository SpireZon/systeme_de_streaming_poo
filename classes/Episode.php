<?php
class Episode {
    private int $numero;
    private string $titre;
    private int $duree;
    private DateTime $dateDiffusion;

    public function __construct(int $num, string $titre, int $duree, string $date) {
        $this->numero = $num;
        $this->titre = $titre;
        $this->duree = $duree;
        $this->dateDiffusion = new DateTime($date);
    }

    public function getDuree(): int { 
        return $this->duree; 
    }

    public function afficherDetails(): string {
        return "Ep. {$this->numero}: {$this->titre} ({$this->duree}min) - Diffusé le : " . $this->dateDiffusion->format('d/m/Y');
    }
}