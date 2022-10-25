<?php
try
{
    // On se connecte à MySQL
	global $pdo;
    $pdo = new PDO('mysql:host=localhost;dbname=critiquesdart;charset=utf8', 'labexcap', 'omega3');
	$pdo->exec("SET CHARACTER SET utf8");
}
catch(Exception $e)
{
    // En cas d'erreur, on affiche un message 
	die('Erreur : '.$e->getMessage());
}
//$url_site='http://critiquesdart.univ-paris1.fr/';
$url_site='http://critiques_dart.local/pages/connect';
$chemin_relatif_images='/webroot/images/';
$chemin_relatif_icones='http://labexcap.fr/wp-content/themes/labex-cap/img/favicons/';
// Les mots de passe sont cryptés : crypt(motdepasse,login)
$users['admin']['login']='admin';
$users['admin']['password']='adiV3PxYxJckY';
$users['admin']['level']='admin';
$users['admin']['label']='Admin';
//
$users['gerald']['login']='gerald';
$users['gerald']['password']='gelBsMrE7Hr5w';
$users['gerald']['level']='gestionnaire';
$users['gerald']['label']='Gérald K.';
//
$users['orelie']['login']='orelie';
$users['orelie']['password']='orVd1Rw1iAIvU';
$users['orelie']['level']='gestionnaire';
$users['orelie']['label']='Orélie D.';
//
$users['MGgispert']['login']='MGgispert';
$users['MGgispert']['password']='MGw5Qpr7D/BmI';
$users['MGgispert']['level']='admin';
$users['MGgispert']['label']='Marie G.';
//
$users['CMeneux']['login']='CMeneux';
$users['CMeneux']['password']='CMd390.6j3uc.';
$users['CMeneux']['level']='admin';
$users['CMeneux']['label']='Catherine M.';
//
$users['LLachenal']['login']='LLachenal';
$users['LLachenal']['password']='LLjaa8Mnd1JKA';
$users['LLachenal']['level']='gestionnaire';
$users['LLachenal']['label']='Lucie L.';
//
$users['ASAguilar']['login']='ASAguilar';
$users['ASAguilar']['password']='ASMvvT0CqbrWc';
$users['ASAguilar']['level']='gestionnaire';
$users['ASAguilar']['label']='Anne-Sophie A.';
//
$users['EChalline']['login']='EChalline';
$users['EChalline']['password']='ECx0JZ3wsrbVQ';
$users['EChalline']['level']='gestionnaire';
$users['EChalline']['label']='Eléonore C.';
//
$users['SPrenant']['login']='SPrenant';
$users['SPrenant']['password']='SPWbMWDMfVSU.';
$users['SPrenant']['level']='admin';
$users['SPrenant']['label']='Stéphanie P.';
//EChalline	TlKrG_OR_54
//SPrenant	EbPsC_DZ_89
//Stéphanie Prenant



?>
