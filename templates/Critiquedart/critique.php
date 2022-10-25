<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Critiquedart $critiquedart
 */

require_once(__DIR__.'/../fonctions/lib_fonctions.php');
require_once(__DIR__.'/../../config/config.php');


/*if(isset($critiquedart->pk_id_critiqueDart)&& $critiquedart->pk_id_critiqueDart!=''){

    $uri_auteur = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']; 
    $sous_titre = file_get_contents('/var/www/critiques_dart/webroot/critiques/'.$critiquedart->pk_id_critiqueDart.'/sous_titre.txt');
    //or die("Le fichier ".'critiques/'.$url_auteur.'/sous_titre.txt'." ne peut être chargé, il est soit absent soit corrompu.");
    $pseudo = file_get_contents('/var/www/critiques_dart/webroot/critiques/'.$critiquedart->pk_id_critiqueDart.'/pseudonyme.txt');
    //$bio = file_get_contents('critiques/'.$url_auteur.'/resume.txt');
    $bio = trim(file_get_contents('/var/www/critiques_dart/webroot/critiques/'.$critiquedart->pk_id_critiqueDart.'/resume.txt'));
    // or die("Le fichier de biographie bio.txt ne peut être chargé, il est soit absent soit corrompu.");
    if(isset($fichier_specialistes)){
	$fichier_specialistes = fopen('/var/www/critiques_dart/webroot/critiques/'.$critiquedart->pk_id_critiqueDart."/specialistes.csv", "r");
    // or die("Le fichier des spécialistes ne peut être chargé, il est soit absent soit corrompu.");
    $auteurs_de_la_page_critique=array();
    while ($ligne = fgetcsv($fichier_specialistes, 1024, ",")){
        array_push($auteurs_de_la_page_critique, $ligne);
        
    }
    foreach($auteurs_de_la_page_critique as $specialiste){
        if(!strcmp($specialiste[8],'editeur')){
            $auteur_principal.=$specialiste[2];
            $auteur_principal.=", ";
            $auteur_principal.=$specialiste[1];
        }
    }
}
    if($auteur_principal=='')$auteur_principal.="Projet BCAF";
} */
?>
<article class="std">
    <!--<h2 class="std__title">// h($critiquedart->nom).', '.h($critiquedart->prenom) ?></h2>
    <h3>// $critiquedart->anneeNaissance.'-'.$critiquedart->anneeMort ?></h3>-->			
	<h2 class='std__title'>
			<?= $critiquedart->nom.' '.$critiquedart->prenom;
			if($critiquedart->veritableIdentite!= null && $critiquedart->veritableIdentite!= ''){

			echo ' pseudonyme de '.$critiquedart->veritableIdentite;
} ?>
	</h2>
	<h3><?php if($critiquedart->anneeNaissance!= null && $critiquedart->anneeNaissance!=''){
		echo $critiquedart->anneeNaissance->i18nFormat('dd MMMM yyyy','Europe/Paris','fr_FR');
	}
	if($critiquedart->lieuNaissance!= null && $critiquedart->lieuNaissance!=''){
		echo ', '.$critiquedart->lieuNaissance;
	}
	if($critiquedart->anneeMort!=null && $critiquedart->anneeMort!=''){
		echo ' - '.$critiquedart->anneeMort->i18nFormat('dd MMMM yyyy','Europe/Paris','fr_FR');
	};
	if($critiquedart->lieuMort!=null && $critiquedart->lieuMort!=''){
		echo ', '.$critiquedart->lieuMort;
	} ?></h3><br>

    <p><?php if(!empty($critiquedart->pseudonyme)){
		echo 'Autre(s) signature(s) recencée(s) pour ce critique :';
	}else{
		echo 'Aucune signature recensée pour ce critique';
	} ?></p>
   <ol>

    <?php foreach ($critiquedart->pseudonyme as $pseudonyme) : ?>
        <li><?php if($pseudonyme->titre !=null && $pseudonyme->titre!=''){
			echo $pseudonyme->titre;
		} ?></li>
    <?php endforeach; ?>
    </ol>
    <h4>Bibliographies</h4>
    <p></p>
    <ul>
        <li>Bibliographie primaire <a href="/webroot/critiques/<?= $critiquedart->pk_id_critiqueDart ?>/primaire.pdf"><img src="/webroot/images/pdf.jpg" title="pour afficher le pdf cliquer sur le lien, pour télécharger le pdf click droit et enregister sous" alt="logo PDF" width="20" height="20"></a></li>
        <li>Bibliographie secondaire <a href="/webroot/critiques/<?= $critiquedart->pk_id_critiqueDart ?>/secondaire.pdf"><img src="/webroot/images/pdf.jpg" title="pour afficher le pdf cliquer sur le lien, pour télécharger le pdf click droit et enregister sous" alt="logo PDF" width="20" height="20"></a></li>
        <li>Sources d'archives identifiées <a href="/webroot/critiques/<?= $critiquedart->pk_id_critiqueDart ?>/archives.pdf"><img src="/webroot/images/pdf.jpg" title="pour afficher le pdf cliquer sur le lien, pour télécharger le pdf click droit et enregister sous" alt="logo PDF" width="20" height="20"></a></li>
    </ul>
    <p></p>
        <!--<ol>
         <?php foreach($periodique as $p) : ?>
            <li><a href='/critiquedart/avance?type=det&period=<?= $p->titre ?>&nom=<?= $critiquedart->nom ?>&prenom=<?= $critiquedart->prenom ?>'><?= $p->titre ?></a></li>
        <?php endforeach; ?>
        </ol>-->
<?php $fichier = fopen("/var/www/critiques_dart/webroot/critiques/".$critiquedart->pk_id_critiqueDart."/biblio.csv", "r");
if($fichier!=NULL){
	echo "<h4>Principales collaborations</h4>";
	$lesCollaborations=array();
	// or die("Le fichier ne peut être chargé, il est soit absent soit corrompu.");
	while ($ligne = fgetcsv($fichier, 1024, ",")){
		array_push($lesCollaborations, $ligne);
	}
	echo "<p><ul>";
	foreach($lesCollaborations as $critique){
		$url_collaboration="/critiquedart/avance?type=det&period=".urlencode($critique[0])."&nom=".$critiquedart->nom."&prenom=".$critiquedart->prenom;
		if ($critique[1]!=''){
			//$url_collaboration.="&Titre_SousTitre=".urlencode($critique[1])."&choix=".urlencode('choix_sous_titre_et_titre');
		}
		echo "<li><a href='".$url_collaboration."' title='afficher les articles issus de la collaboration'><em>".$critique[0]. "</em></a>, ";
		if ($critique[1]!=''){
			echo "<q> ".$critique[1]." </q>, ";
			$url_collaboration.="?Titre_SousTitre=".urlencode($critique[1]);
		}
		echo "(".$critique[2].")";
		echo ".</li>";
	}
	echo "</ul></p>";
	//echo "Date : ".date('Y-m-d');
}

if(!empty($critiquedart->secondaire)){
	echo '<h4>Principales notices bibliographiques et ouvrages de références</h4>';
	echo '<p><ul>';
		foreach($critiquedart->secondaire as $secondaire){
			echo '<li><span>';
			if($secondaire->Auteur != null){
				echo $secondaire->Auteur.', ';
			}
			if($secondaire->Critiquedart != null){
				echo '"'.$secondaire->Critiquedart.'", ';
			}
			if($secondaire->Direction_d_ouvrage != null){
				echo $secondaire->Direction_d_ouvrage.', ';
			}
			if($secondaire->Titre != null){
				echo '<em>'.$secondaire->Titre.'</em>, ';
			}
			if($secondaire->Type_de_texte != null){
				echo $secondaire->Type_de_texte.', ';
			}
			if($secondaire->Institution != null){
				echo $secondaire->Institution.', ';
			}
			if($secondaire->Annee != null){
				echo $secondaire->Annee.', ';
			}
			if($secondaire->Page != null){
				echo $secondaire->Page.', ';
			}
			if($secondaire->URL != null){
				echo '<a target="blank" href="'.$secondaire->URL.'">'.$secondaire->URL.'</a>';
			}
			echo '</span></li>';
		}
	echo '</ul></p>';
	}

/* else {
	echo $entete;
	echo $debut_container;
	echo $debut_header;
	if(isset($_SESSION['user'])){
		echo "<a href=\"unconnect.php\" class=\"icon-deconnect\" title=\"Se déconnecter\"></a></div>";
	} else {
		echo "<a href=\"connectV2.php\" class=\"icon-person\" title=\"S’identifier\"></a></div>";
	}
	milieu_header();
    echo $fin_header;
	echo $debut_article;
	echo "<p>Il faut choisir un critique dans l'onglet <em>Critiques</em></p>";
}
    echo $fin_article;
	echo $footer;
	echo $fin_container;*/

if(!empty($critiquedart->site)){
	echo '<h4>Webographie</h4>';
	echo '<p><ul>';
	foreach($critiquedart->site as $site){
		echo '<li><span>';
		if($site->auteur != null){
			echo $site->auteur.', ';
		}
		if($site->societe != null){
			echo $site->societe.', ';
		}
		if($site->institution != null){
			echo $site->institution.', ';
		}
		if($site->URL != null){
			echo '<a target="blank" href="'.$site->URL.'">'.$site->URL.'</a>';
		}
		echo '</span></li>';
	}
	echo '</ul></p>';
}

?>

 
</article>
        
        