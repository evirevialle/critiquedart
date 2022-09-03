<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Critiquedart[]|\Cake\Collection\CollectionInterface $critiquedart
 */
?>
<article class='landing-intro'>

  <h3> Tous les Auteurs </h3>
    <hr  class='listing-redline'>
        <div class="divAuteurs">
                <?php foreach ($critiquedart as $critiquedart): ?>
                
                    <p><?= $this->Html->link((h($critiquedart->prenom).' '.h($critiquedart->nom).' ('.$critiquedart->anneeNaissance.'-'.$critiquedart->anneeMort.')'), ['controller'=>'Critiquedart', 'action'=>'critique', $critiquedart->pk_id_critiqueDart]) ?>
             
                <?php endforeach; ?>
    </div>
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

