<?php
    $this->layout = 'ajax';
$filename="resultats_articles_revues.json";
header('Content-type: text/json');
header('Content-type: application/json; charset=utf-8');
// Méthode de mise à disposition : ici directement via un fichier (nommé)
header("Content-disposition: attachment;filename=".$filename);
// Création du tableau
require_once(__DIR__.'/../../config/config.php');
global $pdo;
//$pdo = new PDO('mysql:host=localhost;dbname=critiques;charset=utf8', 'root', 'root');
$sql = "SELECT * FROM `toutes_les_critiques` WHERE TRUE";
	if(isset($_GET['nom']) && $_GET['nom']!='')$sql .= " AND nom LIKE '".$_GET['nom']."'";
	$sql.= " ORDER BY nom, annee_ouvrage, annee_periodique";

	//echo $sql;
	$notices=array();
	$resultats=$pdo->query($sql) or die('erreur SQL');
	foreach ($resultats as $enr){
		$critique["id_auteur"]=$enr['id_auteur'];
		$critique["nom"]=$enr['nom'];
		$critique["prenom"]=$enr['prenom'];
		$critique["type"]=$enr["type"];
		$critique["titre"]=$enr['titre'];
		$critique["sous titre"]=$enr['sous titre'];
		$critique["titre_ouvrage"]=$enr['titre_ouvrage'];
		$critique["coordonateur"]=$enr['coordonnateur'];
		$critique["titre_periodique"]=$enr['titre_periodique'];
		if($enr['annee_periodique'] !== NULL){
			$critique["annee"]=$enr['annee_periodique'];
		}
		else{
			$critique["annee"]=$enr['annee_ouvrage'];
		}
		$critique["ville"]=$enr['ville'];
		//array_push($notices, $critique);
		$notices[$enr['id_critique']]=$critique;
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