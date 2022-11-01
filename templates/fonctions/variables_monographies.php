<?php

$nom = $mo->nom;
$prenom = $mo->prenom;
$auteur = $prenom.'%20'.$nom;
$collection = $mo->collection;
$titre = $mo->titre;
$ouvrageCplTitre = $mo->ouvrageComplementTitre;
$critiqueCpltitre = $mo->critiqueComplementTitre;
$editeurNom = $mo->editeur->nom;
$editeurVille = $mo->editeur->ville;
$annee = $mo->annee;
$pagination = $mo->pagination;
