<?php
$titrePrincipal="Bibliographies de critiques d'art francophones";
$analytics="<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-90419935-1', 'auto');
  ga('send', 'pageview');

</script>";
$entete='
<!DOCTYPE html>
<html class="js svg wf-adelle-n4-active wf-adelle-n7-active wf-active" lang="fr-FR">
<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<meta charset="UTF-8">
	<title>Critiques d’art - Bibliographies en ligne de critiques d’art francophones</title>
	<link rel="stylesheet" id="labex-cap-style-css" href="/webroot/css/style.css" type="text/css" media="all">
	<link rel="alternate" hreflang="fr" href="https://critiquesdart.univ-paris1.fr/" />
    <link rel="alternate" hreflang="en" href="https://critiquesdart.univ-paris1.fr/en" />
	<script async src="/webroot/js/fly5lvw.js"></script>
	<script type="text/javascript" src="js/critiques.js"></script>
	<script type="text/javascript" src="/webroot/js/modernizr.js"></script>
	<script type="text/javascript" src="/webroot/js/jquery_002.js"></script>
	<script type="text/javascript" src="/webroot/js/jquery-migrate.js"></script>
	<script type="text/javascript" src="/webroot/js/jquery.js"></script>
	<script type="text/javascript" src="/webroot/js/application.js"></script>
	<script src="http://code.jquery.com/jquery-1.8.2.js"></script>
	<script src="http://code.jquery.com/ui/1.9.1/jquery-ui.js"></script>
	<link rel="stylesheet" href="http://code.jquery.com/ui/1.9.1/themes/base/jquery-ui.css">
	<link rel="canonical" href="'.$url_site.'">
	<link rel="alternate" href="http://critiquesdart.univ-paris1.fr/rss/une.xml" title="Bibliographies Critiques : A la une" type="application/rss+xml">
	<meta name="msapplication-tilecolor" content="#ffffff">
	<meta name="msapplication-tileimage" content="'.$chemin_relatif_images.'mstile-144x144.png">
	<meta name="twitter:card" content="summary" />
<meta name="twitter:creator" content="@kembellec" />
<meta property="og:url" content="http://critiquesdart.univ-paris1.fr/" />
<meta property="og:title" content="Bibliographies de critiques d art francophones" />
<meta property="og:description" content="Ce site est consacré aux auteurs francophones ayant exercé la critique d’art et actifs entre le milieu du XIXe siècle et la première moitié du XXe siècle. Pour chaque auteur répertorié, une page met à disposition du public ses bibliographies primaires et secondaires, ainsi que les sources d’archives identifiées. Ces documents ont été édités à partir de travaux de recherche approfondis permettant de constituer des bibliographies primaires considérées comme complètes. Dans le cas particulier d’écrivains dont les œuvres complètes ont été publiées, seuls les écrits sur l’art sont recensés. Ce répertoire en ligne se double d’une base de données qui comprend les bibliographies primaires des critiques répertoriés dans le site." />
<meta property="og:image" content="http://critiquesdart.univ-paris1.fr/images/critique-large.jpg" />
	<!-- <link rel="icon" href="'.$chemin_relatif_icones.'favicon.ico" type="image/x-icon"> -->
	<link rel="icon" type="image/png" href="/images/favicon.png" />
	<style type="text/css">.font-adelle,.tk-adelle{font-family:"adelle",serif;}</style>
	<link href="/webroot/css/d.css" rel="stylesheet">
	<link href="/webroot/css/sbi.css" rel="stylesheet" type="text/css" id="sbi-style">
	<link type="text/css" rel="stylesheet" href="/webroot/css/cairn.css">
	<link type="text/css" rel="stylesheet" href="/webroot/css/critiques.css">
	<link rel="search" type="application/opensearchdescription+xml" title="Critiques" href="http://critiquesdart.univ-paris1.fr/opensearch.xml" />'.$analytics.'</head>';
$debut_container='<body><div class="page-container font-adelle" style="overflow-y:auto">';
$debut_header='<header class="site-header">
			<div class="additional-links" style="width: 65px;">
';
// TODO: Faire un SELECT COUNT(*) FROM `critique` pour calculer automatiquement le "Nombre de manifestes"
//$nb_fiches=get_nombre_critiques();
//$nb_fiches='8';
$fin_header='
			<div class="site-header__top" ><br>
				<a href="http://critiquesdart.univ-paris1.fr/" class="logo-critiques">
					<img src="/webroot/logos/Logo_critiques.png" width="650" height="80" alt="critiques d’art" title="Logo Critiques">
				</a>
		
				<div class="header_text" style="top: 57px; right: 45px;">
					Nombre de références :
				</div>
				<div class="header_text" style="top: 83px; right: 100px; font-weight: bold;">';
$fin_header.=number_format($nb_fiches,0,' ',' ');
$fin_header.='					
				</div>
		
				<div class="header_colored_section"> <a href="https://www.facebook.com/critiquesdart/" title="Suivez l\'actualité du projet sur sa page Facebook"><img src="/webroot/images/facebook.png"></a></div>
		        
				<form role="search" method="get" id="searchform" class="searchform" action="rechercher.php" style="top: 133px;">
					<div>
	                    <input name="quicksearch" id="autocomplete" type="text" style="border-radius: 10px;">
						<label class="screen-reader-text" for="autocomplete">Recherche pour&nbsp;:</label>
						<input id="searchsubmit" value="Rechercher" type="submit">
					</div>
			    </form>

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
	                        	<a href="/pages/opendata">Données ouvertes</a>
							</li>
						</ul>
     				</div>
				</nav>
			</div>
		</header>
';
$debut_article='
 	<article class="landing-intro">
		<p style="text-align: justify;">
';
$debut_liste='
	<ul class="custom-pagination pagination letters">
';
$fin_liste='
	</ul><br>
';
$fin_article='
	</article>
 	<br/>
';
$footer='
<footer class="site-footer font-adelle">
		
		<div class="site-footer-logos">
			<a href="http://www.univ-paris1.fr/" class="footer_logo">
				<img src="/webroot/logos/Logo_ufr03.jpg" width="110" height="60" alt="Université Paris_1" title="Logo Paris 1">
			</a>
			<a href="http://labexcap.fr/" class="footer_logo">
				<img src="/webroot/logos/Logo_Labex_CAP.png" width="110" height="60" alt="Labex CAP" title="Logo Labex CAP">
			</a>
			<a href="http://www.hesam.eu/" class="footer_logo">
				<img src="/webroot/logos/Logo_heSam.jpg" width="100" height="60" alt="Hésam Université" title="Logo Hésam Université">
			</a>
			<a href="http://hicsa.univ-paris1.fr/" class="footer_logo">
				<img src="/webroot/logos/Logo_HiCSA.jpg" width="110" height="60" alt="HiCSA" title="Logo HiCSA">
			</a>
			<a href="http://www.dicen-idf.org//" class="footer_logo">
				<img src="/webroot/logos/logo_dicen-idf-330x76.jpg" width="110" height="60" alt="Dicen-IdF" title="Logo Dicen-IdF">
			</a>
			<a href="http://www.citechaillot.fr/" class="footer_logo">
				<img src="/webroot/logos/Logo_cite_architecture_patrimoine.png" width="110" height="60" alt="Cite de l’architecture et du patrimoine" title="Logo de la Cite de l’architecture et du patrimoine">
			</a>
			<a href="http://www.ecoledulouvre.fr/" class="footer_logo">
				<img src="/webroot/logos/Logo_ecoledulouvre.jpeg" width="110" height="60" alt="Logo Ecole du Louvre" title="Logo Ecole du Louvre">
			</a>
			<a href="http://www.enc-sorbonne.fr/" class="footer_logo">
				<img src="/webroot/logos/Logo_enc.jpg" width="110" height="60" alt="Ecole nationale des chartes" title="Logo Ecole nationale des chartes">
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
';
$fin_container='
</div>
<!-- /.page-container -->
</body>
</html>';
?>