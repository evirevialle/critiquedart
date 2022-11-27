<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 * @var \App\View\AppView $this
 */
require_once(__DIR__.'/../fonctions/lib_fonctions.php');
require_once(__DIR__.'/../../config/config.php');
?>
<?= afficher_entete_avec_meta($titre,$auteur,$critique,$description,$mots_cles,$date,$lieu,$rattachement,$type,$url,$contributeur); ?>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-90419935-1', 'auto');
  ga('send', 'pageview');

</script>

<section class="main">
    <div class="container" style="margin: 30px;">
        <?= $this->Flash->render() ?>
        <?= $this->fetch('content') ?>
        
    </div>
</section>

