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
?>
<!DOCTYPE html>
<html class="js svg wf-adelle-n4-active wf-adelle-n7-active wf-active" lang="fr-FR">
<head>
    <meta name="msapplication-tilecolor" content="#ffffff">
    <style type="text/css">.font-adelle,.tk-adelle{font-family:"adelle",serif;}</style>
    <link rel="search" type="application/opensearchdescription+xml" title="Critiques" href="http://critiquesdart.univ-paris1.fr/opensearch.xml" />
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        Critiques d’art - Bibliographies en ligne de critiques d’art francophones
    </title>
    <?= $this->Html->meta('icon') ?>

    <link href="https://fonts.googleapis.com/css?family=Raleway:400,700" rel="stylesheet">
    <link rel="stylesheet" id="labex-cap-style-css" href="/webroot/css/style.css" type="text/css" media="all">

    <?= $this->Html->css(['style','cairn','colorpicker','critiques','d','home','html5forms.layout','sbi','styleFormulaire','webforms2']) ?>
    <?= $this->Html->css(['http://code.jquery.com/ui/1.9.1/themes/base/jquery-ui.css']) ?>
    <?= $this->Html->script(['fly5lvw','critiques','modernizr','jquery_002','jquery-migrate','jquery','application']) ?>
    <?= $this->Html->script(['http://code.jquery.com/jquery-1.8.2.js']) ?>
    <?= $this->Html->script(['http://code.jquery.com/ui/1.9.1/jquery-ui.js']) ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
    <div class="page-container font-adelle">
        <header class="site-header">
            <div class="additional-links" style="width: 65px;">
        <?php         
        session_start();
        require_once(__DIR__.'/../../config/config.php');
        require_once(__DIR__.'/../fonctions/lib_fonctions.php');
        if(isset($_SESSION['user'])){
            echo "<a href='/pages/unconnect' class=\"icon-deconnect\" title=\"Se déconnecter\"></a></div>";
        } else {
            echo "<a href='/pages/connect' class=\"icon-person\" title=\"S’identifier\"></a></div>";
        }
        milieu_header();?>
                <div class="site-header__top" ><br>
                <a href="http://critiquesdart.univ-paris1.fr/" class="logo-critiques">
                    <img src="/webroot/logos/Logo_critiques.png" width="650" height="80" alt="critiques d’art" title="Logo Critiques">
                </a>
        
                <div class="header_text" style="top: 57px; right: 45px;">
                    Nombre de références :
                </div>
                <div class="header_text" style="top: 83px; right: 100px; font-weight: bold;">
                    26.121
                </div>
        
                <div class="header_colored_section"></div>
        
                <!--<form role="search" method="get" id="searchform" class="searchform" action="rechercher.php" style="top: 133px;">
                    <div>
                        <input name="quicksearch" id="autocomplete" type="text" style="border-radius: 10px;">
                        <label class="screen-reader-text" for="autocomplete">Recherche pour&nbsp;:</label>
                        <input id="searchsubmit" value="Rechercher" type="submit">
                    </div>
                </form>-->

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
