<?php
	session_start();
	require_once(__DIR__.'/../../config/config.php');
	require_once(__DIR__.'/../fonctions/lib_fonctions.php');
	
	if(!isset($_SESSION['user'])){
        	echo '<script language="javascript">document.location.replace("home.php");</script>'; 
	}
//print_r($_POST);
$ISSN='NULL';
$couverture='NULL';
$titre="'".addslashes ($_POST['TitrePeriodique'])."'";
if($_POST['PériodeCouverte']!=''){
	$couverture="'".$_POST['PériodeCouverte']."'";; 
}
$periodicite="'".$_POST['type']."'";
if($_POST['issn']!=''){
	$ISSN="'".$_POST['issn']."'";
}
$id_revue=inserer_nouvelle_revue($titre,$ISSN,$periodicite,$couverture,$ville);
echo '<script language="javascript">document.location.replace("choisir_type_critique");</script>';
?>