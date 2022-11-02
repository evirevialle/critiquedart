<?php

$nom = $in->nom;
$prenom = $in->prenom;
$auteur = $prenom."%20".$nom;
$titre = $in->titre;
$ouvrageTitre = $in->ouvrageTitre;
$editeurVille = $in->editeur->ville;
$editeurNom = $in->editeur->nom;
$annee = $in->annee;
$pagination = $in->pagination;