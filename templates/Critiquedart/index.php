<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Critiquedart[]|\Cake\Collection\CollectionInterface $critiquedart
 */

require_once(__DIR__.'/../fonctions/lib_fonctions.php');
require_once(__DIR__.'/../../config/config.php');

?>
<article class='landing-intro'>
 <?php
    print('<ul style="display:block;" class="custom-pagination pagination letters">'.listerAuteurs().'</ul>');
    if(isset($_GET['lettre'])){
		print('<h3>'.$_GET['lettre'].' / <a href="index">afficher tous les auteurs</a></h3><hr class="listing-redline">');
		afficherAuteursParLettre($_GET['lettre']);
	}
    else 
    {
        echo '<hr class="listing-redline"><div class="divAuteurs">';
        foreach($critiquedart as $critique){
            echo '<p><a href="critique/'.$critique->pk_id_critiqueDart.'">'.$critique->prenom.' '.$critique->nom;
            if(!empty($critique->anneeNaissance)){
                echo ' ('.$critique->anneeNaissance->i18nFormat('yyyy');
                }
            if(!empty($critique->anneeMort)){
                echo ' - '.$critique->anneeMort->i18nFormat('yyyy').')';
                }
            echo '</a></p>';
            }
        echo '</div>';
    }

     ?>

    <!--<div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
    </div>-->
    <!-- pagination limite à 60 critiques, il y'a une deuxième page si on dépasse 60 critiques -->
                </article>

