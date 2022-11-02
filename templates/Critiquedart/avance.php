<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Critiquedart $critiquedart
 * 
 */

require_once(__DIR__.'/../fonctions/lib_fonctions.php');
$params = $this->request->getQueryParams();
$uri = $this->request->getRequestTarget();
?>
<article class='landing-intro'>
    <p style='text-align:justify'>
    </p>
  
    <h2 id='ancre' class="std__title">Résultats de la recherche</h2>
    <div id="navigation"></div>
    <h3>Rappel de la requête</h3>
    <ol>
        
        <li>La critique est un article de revue</li>
        <li>L'auteur (ou un des auteurs) est <mark><?= $_GET['nom'].' '.$_GET['prenom'] ?></mark></li>
        <li>Le nom de la revue est (ou contient la chaîne) "<mark><?= $_GET['period'] ?></mark>"</li>
</ol>

<h3 id="article">Articles (<?= $critiquedart->find('all')->count();?>) <a href="#navigation" title="remonter">&uarr;</a></h3>

<ol>
<?php foreach($critiquedart as $critique): ?>
    <?php require(__DIR__.'/../fonctions/variables_critiques.php'); ?>
    <li><?php
        echo $critique->nom.', '.$critique->prenom.' , "'.$critique->_matchingData['Critique']['titre'].'" , <em>'.$critique->_matchingData['Periodique']['titre'].'</em>';
        if(!empty($critique->_matchingData['Numeroperiodique']['numero'])){
            echo ', n°'.$critique->_matchingData['Numeroperiodique']['numero'];
        }
        if(!empty($critique->_matchingData['Numeroperiodique']['dateprecise'])){
          echo   ', '.$critique->_matchingData['Numeroperiodique']['dateprecise']->i18nFormat('dd-MMMM-yyyy','Europe/Paris','fr_FR');
        };
        echo ', p.'.$critique->_matchingData['Critique']['pagination']?>
</li>
<?php print(zotero_article($titre,$periodiqueTitre,$numeroPeriodique,$prenom,$nom,$auteur,$dateprecise,$pagination,$issn));
//print(script_schemaOrg($numeroPeriodique,$dateprecise,$periodiqueTitre,$issn,$pagination,$titre,$prenom,$nom)); ?>
<?php endforeach; ?>




</ol>

<div style="text-align:right">
<img src="https://upload.wikimedia.org/wikipedia/commons/c/c9/JSON_vector_logo.svg" alt="au format JSON" heigth="20" title="Logo JSON" width="20">
<?= $this->Html->link('Exporter les articles présentés au format JSON', ['controller' => '', 'action' => $uri, '?' => array_merge($params, ['export' => 'json'])])?><br>
<?php $lien_CSV="<a title='Click droit, enregistrer sous' href='/API/csv_encode_article?Titre_SousTitre=".$_GET['Titre_SousTitre']."&choix=".$_GET['choix'];
	$lien_CSV.="&auteur=".$critique->pk_id_critiqueDart."&type=".$_GET['type']."&typeSignature=".$_GET['typeSignature']."&pseudonyme=".$_GET['pseudonyme'];
	$lien_CSV.="&anneeEditionMin=".$_GET['anneeEditionMin']."&anneeEditionMax=".$_GET['anneeEditionMax']."&typeCritique=".$_GET['typeCritique'];
	$lien_CSV.="&revue=".urlencode($_GET['period'])."&ouvrage=' onclick='window.open(this.href); return false;'>";
	$lien_CSV.="<img src='/images/csv.jpg'";
	$lien_CSV.="alt='au format CSV' heigth='20' width='20' title='Logo CSV'/> Exporter les articles présentés au format CSV</a>" ;
    echo $lien_CSV; ?>
<p><strong>Nombres de références : <?= $critiquedart->find('all')->count() ?></strong></p>
<p><b><a href='/recherche/avance' style='color: #1f398f !important'>Recommencer la recherche.</a><a href='#navigation' title='remonter'>&uarr;</a></b></p>

</div>

    </article>