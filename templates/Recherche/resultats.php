<?php
//Page affichant les résultats provenant de la requête
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Critiquedart[]|\Cake\Collection\CollectionInterface $critiquedart
 */

use Cake\Routing\Router;
require_once(__DIR__.'/../fonctions/lib_fonctions.php');
$uri = $this->request->getRequestTarget();
?>
<article class='landing-intro'>
<h2 id='ancre' class="std__title">Résultats de la recherche</h2>
<?php
	if($articles->find('all')->count() + $monographie->find('all')->count() + $introduction->find('all')->count + $coordinationsOuvrage->find('all')->count() + $preface->find('all')->count() + $postface->find('all')->count() + $chapitre->find('all')->count() === 0){
		echo '<p>Veuillez recommencer en spécifiant davantage votre recherche</p>';
        }
else{

echo '<h3>Rappel de la requête</h3><ol>';
    if(!empty($_GET['text'])){
    echo '<li>'. $_GET['text'].'</li>';
}else{
    if(!empty($_GET['type_texte'])){
 echo '<li>La critique est un(e) : <mark> '.$_GET['type_texte'].'</mark></li>';}
   if(!empty($_GET['auteur'])){
 echo "<li>L'auteur (ou un des auteurs) est :<mark> ".$_GET["auteur"]."</mark></li>"; }
   if(!empty($_GET['critique_titre'])){
echo '<li>titre de la critique :<mark> '.$_GET['critique_titre'].'</mark></li>';}
    if(!empty($_GET['cpl_titre'])){
 echo '<li>complément de titre :<mark> '.$_GET['cpl_titre'].'</mark></li>';}
    if(!empty($_GET['revue'])){
echo "<li>le nom de la revue est (ou contient la chaîne) :<mark> ".$_GET["revue"]."</mark></li>";}
    if(!empty($_GET['ouvrage'])){
echo "<li>la monographie est (ou contient la chaîne) :<mark> ".$_GET["ouvrage"]."</mark></li>";}
    if(!empty($_GET['type_critique'])){
 echo '<li>attribution :<mark> '.$_GET['type_critique'].'</mark></li>';}
    if(!empty($_GET['type_signature'])){
 echo '<li>type de signature :<mark> '.$_GET['type_signature'].'</mark></li>';}
    if(!empty($_GET['dateMin'])){
 echo '<li>date de debut : <mark> '.$_GET['dateMin'].'</mark></li>';}
    if(!empty($_GET['dateMax'])){
 echo '<li>date de fin : <mark> '.$_GET['dateMax'].'</mark></li>';}
}
echo '</ol>';


if($_GET['type_texte']!= 'article'){

print("<p id='navigation' style='text-align:right'>
			<a href='#monographies' title='Aller directement aux monographies' style='color: #1f398f!important;'>Ouvrages</a>,
			<a href='#coordinations' title='Aller directement aux coordinations d&rsquo;ouvrages' style='color: #1f398f!important;'>coordinations</a>,
			<a href='#chapitres' title='Aller directement aux chapitres' style='color: #1f398f!important;'>collaborations</a>,
	   		<a href='#introductions' title='Aller directement aux introductions' style='color: #1f398f!important;'>introductions</a>,
			<a href='#prefaces' title='Aller directement aux préfaces' style='color: #1f398f!important;'>préfaces</a>,
			<a href='#postfaces' title='Aller directement aux postfaces' style='color: #1f398f!important;'>postfaces</a>,
			<a href='#articles' title='Aller directement aux articles' style='color: #1f398f!important;'>articles</a>
	   </p>");
}
}
?>
<?php
if($monographie->find('all')->count() != 0){
    echo '<h3 id="monographies">Ouvrages et ouvrages traduits ('.$monographie->find('all')->count().') <a href="#navigation" title="remonter">&uarr;</a></h3>';
    echo '<ol>';
    foreach($monographie as $mo){
        require(__DIR__.'/../fonctions/variables_monographies.php');
        echo "<li>";
        if(!empty($mo->nom)){
            echo $mo->nom.', ';
        }
        if(!empty($mo->prenom)){
            echo $mo->prenom.', ';
        }
        if(!empty($mo->collection)){
            echo $mo->collection.', ';
        }
        if(!empty($mo->titre)){
            echo '<em>'.$mo->titre.'</em>, ';
        }
        if(!empty($mo->ouvrageComplementTitre)){
            echo $mo->ouvrageComplementTitre.', ';
        }
        if(!empty($mo->critiqueComplementTitre) && $mo->critiqueComplementTitre != $mo->ouvrageComplementTitre){
            echo $mo->critiqueComplementTitre.', ';
        }
        if(!empty($mo->editeur->nom)){
            echo $mo->editeur->nom.', ';
        }
        if(!empty($mo->editeur->ville)){
            echo $mo->editeur->ville.', ';
        }
        if(!empty($mo->annee)){
            echo $mo->annee;
        }
        echo '</li>';
        print(zotero_ouvrage($titre,$editeurVille,$editeurNom,$prenom,$nom,$auteur,$annee,$pagination));
        print(script_book($titre,$id,$prenom,$nom,$editeurNom));
    }

    echo '</ol>';
}
if($coordinationsOuvrage->find('all')->count() != 0 && $_GET['type_texte']!= 'article'){
    echo '<h3 id="coordinations">Coordinations d\'ouvrages ('.$coordinationsOuvrage->find('all')->count().') <a href="#navigation" title="remonter">&uarr;</a></h3>';
    echo '<ol>';
    foreach($coordinationsOuvrage as $cdo){
        require(__DIR__.'/../fonctions/variables_CoordOuvrages.php');
        echo '<li>';
        if(!empty($cdo->coordonnateur)){
            echo $cdo->coordonnateur.', ';
        }
        if(!empty($cdo->titre)){
            echo '<em>'.$cdo->titre.'</em>, ';
        }
        if(!empty($cdo->complement_titre)){
            echo '['.$cdo->complement_titre.'], ';
        }
        if(!empty($cdo->editeur->ville)){
            echo $cdo->editeur->ville.', ';
        }
        if(!empty($cdo->editeur->nom)){
            echo $cdo->editeur->nom.', ';
        }
        if(!empty($cdo->annee)){
            echo $cdo->annee;
        }
        echo'</li>';
        print(zotero_coordinationOuvrage($titre,$editeurVille,$editeurNom,$coordonnateur,$annee));
    }
    echo '</ol>';
}
if($chapitre->find('all')->count() != 0){
    echo '<h3 id="chapitres">Collaborations à des ouvrages collectifs ('.$chapitre->find('all')->count().') <a href="#navigation" title="remonter">&uarr;</a></h3>';
    echo '<ol>';
    foreach($chapitre as $ch){
        require(__DIR__.'/../fonctions/variables_chapitres.php');
        echo '<li>';
        if(!empty($ch->nom)){
            echo $ch->nom.', ';
        }
        if(!empty($ch->prenom)){
            echo $ch->prenom.', ';
        }
        if(!empty($ch->titre)){
            echo '"'.$ch->titre.'", in ';
        }
        if(!empty($ch->ouvrageTitre)){
            echo '<em>'.$ch->ouvrageTitre.'</em>, ';
        }
        if(!empty($ch->editeur->ville)){
            echo $ch->editeur->ville.', ';
        }
        if(!empty($ch->editeur->nom)){
            echo $ch->editeur->nom.', ';
        }
        if(!empty($ch->annee)){
            echo $ch->annee.', ';
        }
        if(!empty($ch->pagination)){
            echo $ch->pagination;
        }
        echo '</li>';
        print(zotero_chapitre($titre,$ouvrageTitre,$editeurNom,$prenom,$nom,$auteur,$annee,$pagination));
        print(script_schemaOrg2($id,$titre,$pagination,$isbn,$ouvrageTitre,$prenom,$nom));
    }
    echo '</ol>';
}
if($introduction->find('all')->count() != 0){
    echo '<h3 id="introductions">Introductions ('.$introduction->find('all')->count().') <a href="#navigation" title="remonter">&uarr;</a></h3>';
    echo '<ol>';
    foreach($introduction as $in){
        require(__DIR__.'/../fonctions/variables_introductions.php');
        echo '<li>';
        if(!empty($in->nom)){
            echo $in->nom.', ';
        }
        if(!empty($in->prenom)){
            echo $in->prenom.', ';
        }
        if(!empty($in->titre)){
            echo '"'.$in->titre.'", in ';
        }
        if(!empty($in->ouvrageTitre)){
            echo '<em>'.$in->ouvrageTitre.'</em>, ';
        }
        if(!empty($in->ouvrageComplementTitre)){
            echo '['.$in->ouvrageComplementTitre.'], ';
        }
        if(!empty($in->editeur->ville)){
            echo $in->editeur->ville.', ';
        }
        if(!empty($in->editeur->nom)){
            echo $in->editeur->nom.', ';
        }
        if(!empty($in->annee)){
            echo $in->annee;
        }
        echo '</li>';
        print(zotero($titre,$ouvrageTitre,$editeurNom,$prenom,$nom,$auteur,$annee,$pagination));
        print(script_schemaOrg2($id,$titre,$pagination,$isbn,$ouvrageTitre,$prenom,$nom));
       
    }
    echo '</ol>';
}
if($preface->find('all')->count() != 0){
    echo '<h3 id="prefaces">Prefaces ('.$preface->find('all')->count().') <a href="#navigation" title="remonter">&uarr;</a></h3>';
    echo '<ol>';
    foreach($preface as $pr){
        require(__DIR__.'/../fonctions/variables_prefaces.php');
        echo '<li>';
        if(!empty($pr->nom)){
            echo $pr->nom.', ';
        }
        if(!empty($po->prenom)){
            echo $po->prenom.', ';
        }
        if(!empty($pr->titre)){
            echo '"'.$pr->titre.'", in ';
        }
        if(!empty($pr->ouvrageTitre)){
            echo '<em>'.$pr->ouvrageTitre.'</em>, ';
        }
        if(!empty($pr->ouvrageComplementTitre)){
            echo '['.$pr->ouvrageComplementTitre.'], ';
        }
        if(!empty($pr->editeur->ville)){
            echo $pr->editeur->ville.', ';
        }
        if(!empty($pr->editeur->nom)){
            echo $pr->editeur->nom.', ';
        }
        if(!empty($pr->annee)){
            echo $pr->annee;
        }
        echo '</li>';
        print(zotero($titre,$ouvrageTitre,$editeurNom,$prenom,$nom,$auteur,$annee,$pagination));
        print(script_schemaOrg2($id,$titre,$pagination,$isbn,$ouvrageTitre,$prenom,$nom));
    }
    echo '</ol>';
}
if($postface->find('all')->count() != 0){
    echo '<h3>Postfaces ('.$postface->find('all')->count().') <a href=<a href="#navigation" title="remonter">&uarr;</a></h3>';
    echo '<ol>';
    foreach($postface as $po){
        require(__DIR__.'/../fonctions/variables_postfaces.php');
        echo '<li>';
        if(!empty($po->nom)){
            echo $po->nom.', ';
        }
        if(!empty($po->prenom)){
            echo $po->prenom.', ';
        }
        if (!empty($po->titre)){
            echo '"'.$po->titre.'", in ';
        }
        if(!empty($po->ouvrageTitre)){
            echo '<em>'.$po->ouvrageTitre.'</em>';
        }
        if(!empty($po->ouvrageComplementTitre)){
            echo '['.$po->ouvrageComplementTitre.']';
        }
        if(!empty($po->editeur->ville)){
            echo $po->editeur->ville.', ';
        }
        if(!empty($po->editeur->nom)){
            echo $po->editeur->nom.', ';
        }
        if(!empty($po->annee)){
            echo $po->annee;
        }
        echo '</li>';
        print(zotero($titre,$ouvrageTitre,$editeurNom,$prenom,$nom,$auteur,$annee,$pagination));
        print(script_schemaOrg2($id,$titre,$pagination,$isbn,$ouvrageTitre,$prenom,$nom));
    }
    echo '</ol>';
}
if($articles->find('all')->count() != 0){
    print('<div id="navigation" align="right"><u>ordonner par :</u> <br>'.$this->Paginator->sort("nom", "auteur").', ' .$this->Paginator->sort("revue","revue").', '.$this->Paginator->sort("datePrecise","date").' </div>');
    echo '<h3 id="articles">Articles ('.$articles->find('all')->count().') <a href="#navigation" title="remonter">&uarr;</a></h3>';
    echo '<ol>';
    foreach($articles as $a){
        require(__DIR__.'/../fonctions/variables_articles.php');
        echo '<li>';
        if(!empty($a->nom)){
            echo $a->nom.', ';
        }
        if(!empty($a->prenom)){
            echo $a->prenom.', ';
        }
        if(!empty($a->titreCritique)){
            echo $a->titreCritique.', ';
        }
        if(!empty($a->critiqueComplementTitre)){
            echo $a->critiqueComplementTitre.', ';
        }
        if(!empty($a->revue)){
            echo '<em>'.$a->revue.'</em>, ';
        }
        if(!empty($a->numero)){
            echo 'n°'.$a->numero.', ';
        }
        if(!empty($a->datePrecise)){
            echo $a->datePrecise->i18nFormat('dd MMMM yyyy','Europe/Paris','fr_FR').', ';
        }
        if(!empty($a->pagination)){
            echo 'p.'.$a->pagination;
        }
        echo '</li>';
        print(zotero_article($titre,$periodiqueTitre,$numeroPeriodique,$prenom,$nom,$auteur,$dateprecise,$pagination,$issn));
        print(script_schemaOrg($titre,$uri,$pagination,$prenom,$nom,$dateprecise,$periodiqueTitre,$numeroPeriodique,$issn));
    }
    echo '</ol>';
}


/*echo $preface->find('all')->count().'<br>';
echo $introduction->find('all')->count().'<br>';
echo $article->find('all')->count().'<br>';
echo $chapitre->find('all')->count().'<br>';
echo $monographie->find('all')->count().'<br>';
echo $postface->find('all')->count();

if($ouvrage!= null){
    echo '<h3>Ouvrage: '.$ouvrage->find('all')->count().'</h3><ol>';
    foreach($ouvrage as $o){
        //echo debug($o);
        echo '<li>';
        if(!empty($o->critique[0]['signature'][0]['critiquedart'][0]['nom'])){
            echo $o->critique[0]['signature'][0]['critiquedart'][0]['nom'].', ';
        }
        if(!empty($o->critique[0]['signature'][0]['critiquedart'][0]['prenom'])){
            echo $o->critique[0]['signature'][0]['critiquedart'][0]['prenom'].', ';
        }
        if($o->titre != null){
            echo $o->titre.', ';
        }
        if($o->complement_titre != null){
            echo $o->complement_titre;
        }
        echo '</li>';
    }
    echo '</ol>';
}

/*if($critiquedart != null){
    echo '<h3>Articles: '.$critiquedart->find('all')->count().'</h3><ol>';
foreach($critiquedart as $critique){
   // echo debug($critique);
   echo '<li>';
        if(!empty($critique->signature[0]['critiquedart'][0]['nom'])){
        echo $critique->signature[0]['critiquedart'][0]['nom'];
        }
        if(!empty($critique->signature[0]['critiquedart'][0]['prenom'])){
            echo ', '.$critique->signature[0]['critiquedart'][0]['prenom'];
        }
        if(!empty($critique->numeroperiodique)){
            echo ', '.$critique->titre.'" , <em>'.$critique->numeroperiodique->periodique->titre.'</em>';
        if($critique->numeroperiodique->numero != null){
            echo ', n°'.$critique->numeroperiodique->numero;
        }
        if($critique->numeroperiodique->dateprecise != null){
          echo   ', '.$critique->numeroperiodique->dateprecise->i18nFormat('dd-MMMM-yyyy','Europe/Paris','fr_FR');
        }
    }
    
        echo ', p.'.$critique->pagination;
    echo '</li>';
    }
    echo '</ol>';
}*/


echo '<strong><p style="text-align:right"><a href="/recherche/avance/">Recommencer la recherche</a> <a href="#navigation" title=Remonter>&uarr;</a></p></strong>';
//echo '<strong><p style="text-align:right">Nombres de références: '.$articles->find('all')->count() + $monographie->find('all')->count() + $introduction->find('all')->count() + $preface->find('all')->count() + $postface->find('all')->count() + $coordinationsOuvrage->find('all')->count() + $chapitre->find('all')->count().'</p></strong>';
?>
</article>
