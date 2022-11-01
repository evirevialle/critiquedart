<?php
$filename="resultats_articles_revues.json";
header('Content-type: text/json');
header('Content-type: application/json; charset=utf-8');
// Méthode de mise à disposition : ici directement via un fichier (nommé)
header("Content-disposition: attachment;filename=".$filename);
// Création du tableau
require_once(__DIR__.'/../../config/config.php');
global $pdo;
//$pdo = new PDO('mysql:host=localhost;dbname=critiques;charset=utf8', 'root', 'root');
$sql = "SELECT idCritique, nom, prenom, typeSignature, titreCritique, critiqueComplementTitre, revue, annee, datePrecise, volume, numero, pagination FROM `articles` WHERE `idCritique` IS NOT NULL";
	if($_GET['idCritiqueDart']!='')$sql .= " AND idCritiqueDart=".$_GET['idCritiqueDart'];
	if($_GET['revue']!='')$sql .= " AND revue LIKE '%".addslashes($_GET['revue'])."%'";
	if($_GET['anneeEditionMin']!='')$sql .= " AND annee >=".$_GET['anneeEditionMin'];
	if($_GET['anneeEditionMax']!='')$sql .= " AND annee <=".$_GET['anneeEditionMax'];

	if($_GET['Titre_SousTitre']!='' && $_GET['choix']=='choix_sous_titre_et_titre'){
		 $sql .= " AND (critiqueComplementTitre LIKE '%".addslashes($_GET['Titre_SousTitre'])."%' OR titreCritique LIKE '%".addslashes($_GET['Titre_SousTitre'])."%')";
	}
	if($_GET['Titre_SousTitre']!='' && $_GET['choix']=='choix_titre'){
		 $sql .= " AND titreCritique LIKE '%".addslashes($_GET['Titre_SousTitre'])."%'";
	}
	if($_GET['Titre_SousTitre']!='' && $_GET['choix']=='choix_sous_titre'){
		 $sql .= " AND critiqueComplementTitre LIKE '%".addslashes($_GET['Titre_SousTitre'])."%'";
	}
	if($_GET['typeSignature']!=''){
		$sql .= " AND typeSignature='".$_GET['typeSignature']."'";
	}
	if($_GET['auteur']!=''){
		$sql .= " AND idCritiqueDart=".$_GET['auteur'];
	}
	//echo $sql;
	$notices=array();

	$resultats=$pdo->query($sql) or die('erreur SQL');
	foreach ($resultats as $enr){
		$critique["nom"]=$enr['nom'];
		$critique["prenom"]=$enr['prenom'];
		$critique["typeSignature"]=$enr["typeSignature"];
		if($enr["typeSignature"]=='patronyme')$critique["signature"]=$enr['nom'].' '.$enr['prenom'];
		$critique["titre"]=$enr['titreCritique'];
		// à régler : le problème des crochets 
		//$critique["complement_titre"]=$enr['critiqueComplementTitre'];
		$critique["revue"]=$enr['revue'];
		$critique["annee"]=$enr['annee'];
		$critique["date"]=$enr['datePrecise'];
		$critique["volume"]=$enr['volume'];
		$critique["numero"]=$enr['numero'];
		$critique["pagination"]=$enr['pagination'];
		//array_push($notices, $critique);
		$notices[$enr['idCritique']]=$critique;
		//$notices[$enr['idCritique']=$critique];
	}
	$fichier = fopen('PHP://output', 'w');
	//$fichier = fopen('./test.json', 'w');
	// Charge le tableau ligne à ligne dans le fichier
	/*
	foreach($critique as $row){
    	//fprint($fichier, json_encode($row));
		file_put_contents($fichier, json_encode($row));

	}
	*/
    //print_r($notices);
	$json_propre = json_encode($notices, JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE);
	//$json_propre = json_encode($notices);
	print($json_propre);
	//file_put_contents($fichier, $json_propre);
	
	
?>