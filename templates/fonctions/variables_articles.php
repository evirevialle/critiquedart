<?php

$nom = $a->nom;
$prenom = $a->prenom;
$auteur = $prenom."%20".$nom;
$titre = $a->titreCritique;
$periodiqueTitre = $a->revue;
$numeroPeriodique = $a->numero;
if(!empty($a->datePrecise))$dateprecise = $a->datePrecise->i18nFormat('dd-MMMM-yyyy','Europe/Paris','fr_FR');
$pagination = $a->pagination;
$issn = $a->ISSN;