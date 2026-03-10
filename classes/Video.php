<?php

abstract class Video {
    protected string $id;
    protected string $titre;
    protected int $duree;
    protected float $notation;
    protected DateTime $dateAjout;

    public function __construct(string $id, string $titre, int $duree, float $notation) {
        $this->id = $id;
        $this->titre = $titre;
        $this->setDuree($duree);
        $this->setNotation($notation);
        $this->dateAjout = new DateTime();
    }

    public function getId(): string { return $this->id; }
    public function getTitre(): string { return $this->titre; }
    public function getDuree(): int { return $this->duree; }

    public function setNotation(float $notation): void {
        if ($notation < 0 || $notation > 5) throw new Exception("Note entre 0 et 5.");
        $this->notation = $notation;
    }

    public function setDuree(int $min): void {
        if ($min <= 0) throw new Exception("Durée invalide.");
        $this->duree = $min;
    }

    public function formaterDuree(): string {
        $h = floor($this->duree / 60);
        $m = $this->duree % 60;
        return ($h > 0) ? "{$h}h" . str_pad($m, 2, "0", STR_PAD_LEFT) : "{$m}min";
    }

    abstract public function afficherDetails(): string;
    abstract public function getType(): string;
}