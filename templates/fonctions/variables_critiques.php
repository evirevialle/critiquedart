<?php

$nom = $critique->nom;
$prenom = $critique->prenom;
$auteur = $prenom."%20".$nom;
$titre = $critique->_matchingData['Critique']['titre'];
$periodiqueTitre = $critique->_matchingData['Periodique']['titre'];
$numeroPeriodique = $critique->_matchingData['Numeroperiodique']['numero'];
if($critique->_matchingData['Numeroperiodique']['dateprecise']!= null){
     $dateprecise = $critique->_matchingData['Numeroperiodique']['dateprecise']->i18nFormat('dd-MMMM-yyyy','Europe/Paris','fr_FR');
}
$pagination = $critique->_matchingData['Critique']['pagination'];
$issn = $critique->_matchingData['Periodique']['ISSN'];

