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
<body>
    <div class="page-container font-adelle">
        <header class="site-header">
            <div class="additional-links" style="width: 65px;">
        <?php         
        session_start();
        if(isset($_SESSION['user'])){
            echo "<a href='/pages/unconnect' class=\"icon-deconnect\" title=\"Se déconnecter\"></a></div>";
        } else {
            echo "<a href='/pages/connect' class=\"icon-person\" title=\"S’identifier\"></a></div>";
        }
        milieu_header();?>
                <div class="site-header__top" ><br>
                <a href="http://critiques_dart.local/" class="logo-critiques">
                    <img src="/webroot/logos/Logo_critiques.png" width="650" height="80" alt="critiques d’art" title="Logo Critiques">
                </a>
        
                <div class="header_text" style="top: 57px; right: 45px;">
                    Nombre de références :
                </div>
                <div class="header_text" style="top: 83px; right: 100px; font-weight: bold;">
                    26.121
                </div>
        
                <div class="header_colored_section">
                <a href="https://www.facebook.com/critiquesdart/" title="Suivez l'actualité du projet sur sa page Facebook"><img src="/webroot/images/facebook.png"></a>
                </div>

                <?= $this->Form->create(null, ['type'=>'get', 'url'=>'/recherche/resultats', 'id'=>'searchform', 'class'=>'searchform','style'=>'top:133px']); ?>
                <!--<form role="search" method="get" id="searchform" class="searchform" action="rechercher.php" style="top: 133px;">-->
                    <div>
                        <input type="hidden" name="type" value="simp">
                        <input name="text" id="autocomplete" type="text" style="border-radius: 10px;">
                        <label class="screen-reader-text" for="autocomplete">Recherche pour&nbsp;:</label>
                        <input id="searchsubmit" value="Rechercher" type="submit">
                    </div>
                <?= $this->Form->end(); ?>
                <!-- <form action="index.php">
                    <input id="autocomplete" name="searchFor" type="text" rows="5"/>
                    <button type="submit">search</button>
                </form> -->

                <script>
                    $( "#autocomplete" ).autocomplete({
                        source: "suggest.php",
                        minLength: 3
                    });
                </script>
             </div>
            <div class="main-navigation-wrapper" id="navbar">
                <nav class="main-navigation">
                    <div class="main-navigation-container">
                        <ul id="menu-navigation-principale" class="nav-menu">
                            <li id="menu-item-125" class="menu-item menu-item-type-custom menu-item-object-custom current-menu-item current-menu-ancestor current-menu-parent menu-item-has-children menu-item-125">
                                <a href="/pages/home">Accueil</a>
                            </li>
                            <li id="menu-item-135" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-135">
                                <a href="/critiquedart/index">Critiques</a>
                            </li>
                            <li id="menu-item-134" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-134">
                                <a href="/recherche/avance">Rechercher</a>
                            </li>
                            <li id="menu-item-143" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-143">
                                <a href="/pages/chercheurs">Chercheurs</a>
                            </li>
                            <li id="menu-item-139" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-139">
                                <a href="/pages/actualites">Actualités</a>
                            </li>
                            <li id="menu-item-139" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-139">
                                <a href="/pages/opendata">Données Ouvertes</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
            <br>
                </header>
            <?= $this->Flash->render() ?>
            <?= $this->fetch('content') ?>
    
    <footer class="site-footer font-adelle">
        
        <div class="site-footer-logos">
            <a href="http://www.univ-paris1.fr/" class="footer_logo">
                <img src="/webroot/logos/Logo_ufr03.jpg" width="120" height="60" alt="Université Paris_1" title="Logo Paris 1">
            </a>
            <a href="http://labexcap.fr/" class="footer_logo">
                <img src="/webroot/logos/Logo_Labex_CAP.png" width="120" height="60" alt="Labex CAP" title="Logo Labex CAP">
            </a>
            <a href="http://www.hesam.eu/" class="footer_logo">
                <img src="/webroot/logos/Logo_heSam.jpg" width="90" height="60" alt="Hésam Université" title="Logo Hésam Université">
            </a>
            <a href="http://hicsa.univ-paris1.fr/" class="footer_logo">
                <img src="/webroot/logos/Logo_HiCSA.jpg" width="120" height="60" alt="HiCSA" title="Logo HiCSA">
            </a>
            <a href="http://www.citechaillot.fr/" class="footer_logo">
                <img src="/webroot/logos/Logo_cite_architecture_patrimoine.png" width="150" height="60" alt="Cite de l’architecture et du patrimoine" title="Logo de la Cite de l’architecture et du patrimoine">
            </a>
            <a href="http://www.ecoledulouvre.fr/" class="footer_logo">
                <img src="/webroot/logos/Logo_ecoledulouvre.jpeg" width="200" height="60" alt="Logo Ecole du Louvre" title="Logo Ecole du Louvre">
            </a>
            <a href="http://www.enc-sorbonne.fr/" class="footer_logo">
                <img src="/webroot/logos/Logo_enc.jpg" width="120" height="60" alt="Ecole nationale des chartes" title="Logo Ecole nationale des chartes">
            </a>
        </div>
        <div class="site-footer-licence">
            <a href="http://creativecommons.org/licenses/by/4.0/" class="footer_logo">
                <img alt="Creative Commons License" style="border-width:0" src="https://i.creativecommons.org/l/by/4.0/88x31.png" />
            </a>
            <br />
            Mentions légales
        </div>
</footer>
</div>
</body>
</html>
