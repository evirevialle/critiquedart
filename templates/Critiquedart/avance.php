<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Critiquedart $critiquedart
 * 
 */

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

<h3 id="article">Articles (<?= $critiquedart->find('all')->count();?>) <a href="#navigation" title="remonter">^</a></h3>

<ol>
<?php foreach($critiquedart as $critique): ?>

    <li><?php
        echo $critique->nom.', '.$critique->prenom.' , "'.$critique->_matchingData['Critique']['titre'].'" , <em>'.$critique->_matchingData['Periodique']['titre'].'</em>';
        if(!empty($critique->_matchingData['Numeroperiodique']['numero'])){
            echo ', n°'.$critique->_matchingData['Numeroperiodique']['numero'];
        }
        if(!empty($critique->_matchingData['Numeroperiodique']['dateprecise'])){
          echo   ', '.$critique->_matchingData['Numeroperiodique']['dateprecise']->i18nFormat('dd-MMMM-yyyy','Europe/Paris','fr_FR');
        };
        echo ', p.'.$critique->_matchingData['Critique']['pagination']?></li>

<?php endforeach; ?>



</ol>

<div style="text-align:right">
<img src="https://upload.wikimedia.org/wikipedia/commons/c/c9/JSON_vector_logo.svg" alt="au format JSON" heigth="20" title="Logo JSON" width="20">
<?= $this->Html->link('Exporter les articles présentés au format JSON', ['controller' => '', 'action' => $uri, '?' => array_merge($params, ['export' => 'json'])])?><br>

</div>

    </article>