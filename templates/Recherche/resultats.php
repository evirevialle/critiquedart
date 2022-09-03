<?php
//Page affichant les résultats provenant de la requête
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Critiquedart[]|\Cake\Collection\CollectionInterface $critiquedart
 */

use Cake\Routing\Router;
?>
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
