<?php 
$nom = $ch->nom;
$prenom = $ch->prenom;
$auteur = $prenom."%20".$nom;
$titre = $ch->titre;
$ouvrageTitre = $ch->ouvrageTitre;
$editeurVille = $ch->editeur->ville;
$editeurNom = $ch->editeur->nom;
$annee = $ch->annee;
$pagination = $ch->pagination;