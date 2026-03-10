<?php

class Utilisateur {
    private string $id;
    private string $nom;
    private string $email;
    private DateTime $dateInscription;
    private bool $abonnementActif;
    private array $historique = [];

    public function __construct($id, $nom, $email, $statut = true) {
        $this->id = $id;
        $this->nom = $nom;
        $this->email = $email;
        $this->dateInscription = new DateTime();
        $this->abonnementActif = $statut;
    }

    public function ajouterHistorique(Video $v): void {
        $this->historique[] = $v;
    }

    public function afficherProfil(): string {
        $etat = $this->abonnementActif ? "Actif" : "Inactif";
        return "Profil de : {$this->nom} ({$this->email})<br><br>Inscrit le : " . $this->dateInscription->format('d/m/Y') . " | Statut : " . $etat;
    }

    public function afficherHistorique(): string {
        $res = "Dernières vidéos vues :\n";
        foreach (array_reverse($this->historique) as $v) {
            $res .= "- " . $v->getTitre() . " (" . $v->getType() . ")<br>";
        }
        return $res;
    }
}