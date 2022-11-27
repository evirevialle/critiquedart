<?php

$nom = $po->nom;
$prenom = $po->prenom;
$auteur = $prenom."%20".$nom;
$titre = $po->titre;
$ouvrageTitre = $po->ouvrageTitre;
$editeurVille = $po->editeur->ville;
$editeurNom = $po->editeur->nom;
$annee = $po->annee;
$pagination = $po->pagination;
$id = $po->idCritiqueDart;
$isbn = $po->ISBN;
