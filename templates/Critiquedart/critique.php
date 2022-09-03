<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Critiquedart $critiquedart
 */
?>
<article class="std">
    <h2 class="std__title"><?= h($critiquedart->nom).', '.h($critiquedart->prenom) ?></h2>
    <h3><?= $critiquedart->anneeNaissance.'-'.$critiquedart->anneeMort ?></h3>

    <p>Autre(s) signature(s) recencée(s) pour ce critique :</p>
   <ol>
    <?php foreach ($critiquedart->pseudonyme as $pseudonyme) : ?>
        <li><?= h($pseudonyme->titre) ?></li>
    <?php endforeach; ?>
    </ol>
    <h4>Bibliographies</h4>
    <p> En préparation </p>
    <h4>Principales collaborations</h4>
        <ol>
         <?php foreach($periodique as $p) : ?>
            <li><a href='/critiquedart/avance?type=det&period=<?= $p->titre ?>&nom=<?= $critiquedart->nom ?>&prenom=<?= $critiquedart->prenom ?>'><?= $p->titre ?></a></li>
        <?php endforeach; ?>
        </ol>
         </article>
        
        