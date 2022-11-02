<?php
$nom = $pr->nom;
$prenom = $pr->prenom;
$auteur = $prenom."%20".$nom;
$titre = $pr->titre;
$ouvrageTitre = $pr->ouvrageTitre;
$editeurVille = $pr->editeur->ville;
$editeurNom = $pr->editeur->nom;
$annee = $pr->annee;
$pagination = $pr->pagination;