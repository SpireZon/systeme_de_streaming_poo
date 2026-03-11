<?php
class Playlist {
    private string $nom;
    private array $videos = [];

    public function __construct(string $nom) {
        $this->nom = $nom;
    }

    public function ajouterVideo(Video $v): void {
        foreach ($this->videos as $item) {
            if ($item->getId() === $v->getId()) return;
        }
        $this->videos[] = $v;
    }

    public function supprimerVideo(string $id): void {
        foreach ($this->videos as $key => $v) {
            if ($v->getId() === $id) unset($this->videos[$key]);
        }
    }

    public function getDureeTotale(): int {
        $t = 0;
        foreach ($this->videos as $v) {
            $t += ($v instanceof Serie) ? $v->getDureeTotale() : $v->getDuree();
        }
        return $t;
    }

    public function afficherDetails(): string {
        $res = "Playlist: {$this->nom} | Contenus: " . count($this->videos) . " | Durée totale : " . $this->getDureeTotale() . " min\n";
        foreach ($this->videos as $v) {
            $res .= "- " . $v->getTitre() . " [" . $v->getType() . "]<br><br>";
        }
        return $res;
    }
}