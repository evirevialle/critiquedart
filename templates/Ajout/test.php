<?php
	session_start();
	require_once(__DIR__.'/../../config/config.php');
	require_once(__DIR__.'/../fonctions/lib_fonctions.php');
	if(!isset($_SESSION['user'])){
        	echo '<script language="javascript">document.location.replace("index.php");</script>'; 
	}
	//$string = str_replace("'","'",$string); 
	
?>
        <header class="page-title page-title-bg4">
            <h1>Bases de données Critiques d'Art - <em>Saisie des critiques</em></h1>
        </header>
         <h1>Espace de saisie</h1>
           <div class="container">
            <img src="images/loading_spinner.gif" />
            <p style="text-align:center">
            	<mark><blink>Attention</blink> : ne <strong>RECHARGEZ SURTOUT PAS</strong> la page et ne <strong>REVENEZ PAS</strong> en arrière pour éviter une erreur d'insertion dans la base (vous allez être redirigé(e) pour vérification dans quelques secondes)</mark>.
             </p>
            <?php
			if(!isset($_SESSION['auteurs'])){
				//echo "<mark>On teste</mark>";
			}
                //if(isset($_POST)){
				//	print_r($_POST);
				//}
                if(isset($_GET)){
					print('<pre>');
					print_r($_GET);
					print('</pre>');
				}
				
				switch ($_GET['typeCritique']) {
    				case 'preface':
						$titre=$_GET['TitreChapitre'];
						$sousTitre=$_GET['ComplémentTitreChapitre'];
						$nomOuvrage=$_GET['TitreOuvrage'];
						$id_ouvrage=ouvrage_id($nomOuvrage);
						echo 'ouvrage n° <mark>'.$id_ouvrage.'</mark>';
						//sleep(10);
						$pagination=$_GET['pagination_chapitre'];
						echo 'Ce document est une préface intitulée <cite>'.$titre.'</cite> ';
						if(isset($sousTitre) && $sousTitre !=''){
							echo ' ['.$sousTitre.'], ';
						}
						echo ' pour l\'ouvrage <em>'.$nomOuvrage.'</em>';
						if($pagination !='')echo ', pp. '.$pagination.', ';
						////
						$id_critique=inserer_critique($titre,$sousTitre,'preface',$pagination,$_GET['type'],'',$id_ouvrage,'');
						////
						if($_GET['pseudonyme']!=''){
							foreach($_SESSION['auteurs'] as $auteur){
								$id_pseudo=testerOuCreerPseudo($auteur,$_GET['pseudonyme']);
							}
						}
						else $id_pseudo='';
						$id_signature=inserer_signature($_GET['typeSignature'],$id_pseudo,$_GET['collectif'],$id_critique);
						echo " et signé (signature n° $id_signature) par ";
						if(isset($_SESSION['auteurs'])){
							foreach($_SESSION['auteurs'] as $auteur){
								inserer_composition_signature($id_signature,$auteur);
								afficherAuteurByIdModeBiblio($auteur);
							}
						}
						if(isset($_GET['collectif'])){
							afficherCollectifById($_GET['collectif']);
						}
						if($_GET['pseudonyme']!=''){
							echo " sous le pseudonyme <mark><em>".$_GET['pseudonyme']."</em></mark>";
						}
       				break;
					case 'introduction':
						$titre=$_GET['TitreChapitre'];
						$sousTitre=$_GET['ComplémentTitreChapitre'];
						$nomOuvrage=$_GET['TitreOuvrage'];
						$id_ouvrage=ouvrage_id($nomOuvrage);
						echo 'ouvrage n° '.$id_ouvrage;
						$pagination=$_GET['pagination_chapitre'];
						echo 'Ce document est une introduction intitulée <cite>'.$titre.'</cite> ';
						if(isset($sousTitre) && $sousTitre !=''){
							echo ' ['.$sousTitre.'], ';
						}
						echo ' pour l\'ouvrage <em>'.$nomOuvrage.'</em>';
						if($pagination !='')echo ', pp. '.$pagination.', ';
						////
						$id_critique=inserer_critique($titre,$sousTitre,'introduction',$pagination,$_GET['type'],'',$id_ouvrage,'');
						////
						if($_GET['pseudonyme']!=''){
							foreach($_SESSION['auteurs'] as $auteur){
								$id_pseudo=testerOuCreerPseudo($auteur,$_GET['pseudonyme']);
							}
						}
						else $id_pseudo='';
						$id_signature=inserer_signature($_GET['typeSignature'],$id_pseudo,$_GET['collectif'],$id_critique);
						echo " et signé (signature n° $id_signature) par ";
						if(isset($_SESSION['auteurs'])){
							foreach($_SESSION['auteurs'] as $auteur){
								inserer_composition_signature($id_signature,$auteur);
								afficherAuteurByIdModeBiblio($auteur);
							}
						}
						if(isset($_GET['collectif'])){
							afficherCollectifById($_GET['collectif']);
						}
						if($_GET['pseudonyme']!=''){
							echo " sous le pseudonyme <mark><em>".$_GET['pseudonyme']."</em></mark>";
						}
       				break;
					case 'postface':
       					$titre=$_GET['TitreChapitre'];
						$sousTitre=$_GET['ComplémentTitreChapitre'];
						$nomOuvrage=$_GET['TitreOuvrage'];
						$id_ouvrage=ouvrage_id($nomOuvrage);
						echo 'ouvrage n° '.$id_ouvrage;
						$pagination=$_GET['pagination_chapitre'];
						echo 'Ce document est une postface intitulée <cite>'.$titre.'</cite> ';
						if(isset($sousTitre) && $sousTitre !=''){
							echo ' ['.$sousTitre.'], ';
						}
						echo ' pour l\'ouvrage <em>'.$nomOuvrage.'</em>';
						if($pagination !='')echo ', pp. '.$pagination.', ';
						////
						$id_critique=inserer_critique($titre,$sousTitre,'postface',$pagination,$_GET['type'],'',$id_ouvrage,'');
						////
						if($_GET['pseudonyme']!=''){
							foreach($_SESSION['auteurs'] as $auteur){
								$id_pseudo=testerOuCreerPseudo($auteur,$_GET['pseudonyme']);
							}
						}
						else $id_pseudo='';
						$id_signature=inserer_signature($_GET['typeSignature'],$id_pseudo,$_GET['collectif'],$id_critique);
						echo " et signé (signature n° $id_signature) par ";
						if(isset($_SESSION['auteurs'])){
							foreach($_SESSION['auteurs'] as $auteur){
								inserer_composition_signature($id_signature,$auteur);
								afficherAuteurByIdModeBiblio($auteur);
							}
						}
						if(isset($_GET['collectif'])){
							afficherCollectifById($_GET['collectif']);
						}
						if($_GET['pseudonyme']!=''){
							echo " sous le pseudonyme <mark><em>".$_GET['pseudonyme']."</em></mark>";
						}
       				break;
					///////////////////////////////////////////////////////////////////////////////
					case 'monographie':
						if($_GET['ISBN']=='')$ISBN='';
						else $ISBN=$_GET['ISBN'];
						if($_GET['AnneeEdition']=='')$AnneeEdition='';
						else $AnneeEdition=$_GET['AnneeEdition'];
       					echo 'Ceci est une monographie intitulée';
						echo ' <cite>'.$_GET['TitreMonographie'].'</cite>';
						$TitreMonographie=$_GET['TitreMonographie'];
						if(isset($_GET['SousTitreMonographie']) && $_GET['SousTitreMonographie']!=''){
							$SousTitreMonographie=$_GET['SousTitreMonographie'];
							echo ' ['.$_GET['SousTitreMonographie'].']';
						}
						else $SousTitreMonographie='';
						if(isset($_GET['pagination']) && $_GET['pagination']!='' && $_GET['pagination']!='n.r.'){
							$pagination=$_GET['pagination'];
							echo ', '.$_GET['pagination'].' p., ';
						}
						else{
							echo 'n.r.';
							$pagination='n.r.';
						}
						echo " parue en ";
						echo $_GET['AnneeEdition'];
						if($_SESSION['reedition']=='')$Edition='';
						else{
							$Edition=$_SESSION['reedition'];
							echo " première édition en ".$Edition;
						}
						echo " et signée par ";
						if(isset($_SESSION['auteurs'])){
							foreach($_SESSION['auteurs'] as $auteur){
							//inserer_composition_signature($id_signature,$auteur);
							afficherAuteurByIdModeBiblio($auteur);
							}
						}
						if($_GET['VilleEdition']==''){
							$VilleEdition='';
						}
						else{
							$VilleEdition = $_GET['VilleEdition'];
							echo " à ".$VilleEdition;
						}
						if($_GET['Editeur']!=''){
							$id_editeur=editeur_id($_GET['Editeur']);
							if($id_editeur==''){
								$id_editeur=inserer_nouvel_editeur($_GET['Editeur'],$VilleEdition);
							}
							echo ", aux éditions ".$_GET['Editeur']." (éditeur n°".$id_editeur.")";
						}
						else $id_editeur='';
						if($_GET['CollectionMonographie']!=''){
							$CollectionMonographie=$_GET['CollectionMonographie'];
							echo ", coll. <em>« ".$_GET['CollectionMonographie']." »</em>";
						}
						else $CollectionMonographie='';
						//$id_ouvrage=inserer_nouvel_ouvrage($ISBN,$AnneeEdition,$TitreMonographie,$SousTitreMonographie,'',$CollectionMonographie,$id_editeur,$Edition);
						$id_ouvrage=inserer_nouvel_ouvrage($ISBN,$AnneeEdition,$TitreMonographie,$SousTitreMonographie,'',$CollectionMonographie,$id_editeur,$Edition);
						echo " Id ouvrage = ".$id_ouvrage;
						//inserer_critique($titre,$complementTitre,$type,$pagination,$attribution,$reedition,$fk_id_ouvrage,$fk_id_numero_periodique)
			 			$id_critique=inserer_critique($TitreMonographie,$SousTitreMonographie,$_GET['typeCritique'],$pagination,$_GET['type'],$Edition,$id_ouvrage,'');
						echo " Id critique = ".$id_critique;
						if($_GET['pseudonyme']!=''){
							foreach($_SESSION['auteurs'] as $auteur){
								$id_pseudo=testerOuCreerPseudo($auteur,$_GET['pseudonyme']);
							}
						}
						else $id_pseudo='';
						$id_signature=inserer_signature($_GET['typeSignature'],$id_pseudo,$_GET['collectif'],$id_critique);
						echo " Id signature = ".$id_signature;
						echo " en ";
						echo $_GET['AnneePublication'];
						echo " et signé (signature n° $id_signature) par ";
						if(isset($_SESSION['auteurs'])){
							foreach($_SESSION['auteurs'] as $auteur){
								inserer_composition_signature($id_signature,$auteur);
								afficherAuteurByIdModeBiblio($auteur);
							}
						}
						if(isset($_GET['collectif'])){
							afficherCollectifById($_GET['collectif']);
						}
						if($_GET['pseudonyme']!=''){
							echo " sous le pseudonyme <mark><em>".$_GET['pseudonyme']."</em></mark>";
						}
       				break;
					//////////////////////////////////////////////////////////////////////////////////
    				case 'article':
       					echo 'Cette critique est un article';
						echo ' intitulé <cite>'.$_GET['TitreArticlePeriodique'].'</cite> ';
						echo 'paru dans <em>'.$_GET['titres_revues'].'</em>';
						if(isset($_GET['ComplementTitreArticlePeriodique']) && $_GET['ComplementTitreArticlePeriodique']!=''){
							echo ' ['.$_GET['ComplementTitreArticlePeriodique'].'], ';
						}
						if(isset($_GET['pagination']) && $_GET['pagination']!='')echo ', pp. '.$_GET['pagination'].', ';
						if(isset($_GET['Numero']) && $_GET['Numero']!='')echo ' N°. '.$_GET['Numero'].', ';
						if(isset($_GET['Volume']) && $_GET['Volume']!='')echo ' Vol. '.$_GET['Volume'].', ';
						$id_revue=revue_id($_GET['titres_revues']);
						$id_numero_periodique=numero_periodique_id($id_revue,$_GET['Numero'],$_GET['AnneePublication'],$_GET['nb_page_numero'],$_GET['TitreNumeroPeriodique'],$_GET['ComplementTitrePeriodique'],$_GET['Volume'],$_GET['DatePrecise']);
						//inserer_critique($titre,$complementTitre,$type,$pagination,$attribution,$reedition,$fk_id_ouvrage,$fk_id_numero_periodique)
						$id_critique=inserer_critique($_GET['TitreArticlePeriodique'],$_GET['ComplementTitreArticlePeriodique'],$_GET['typeCritique'],$_GET['pagination'],$_GET['type'],'','',$id_numero_periodique);
						if($_GET['pseudonyme']!=''){
							foreach($_SESSION['auteurs'] as $auteur){
								$id_pseudo=testerOuCreerPseudo($auteur,$_GET['pseudonyme']);
							}
						}
						else $id_pseudo='';
						$id_signature=inserer_signature($_GET['typeSignature'],$id_pseudo,$_GET['collectif'],$id_critique);
						echo " en ";
						echo $_GET['AnneePublication'];
						echo " et signé (signature n° $id_signature) par ";
						if(isset($_SESSION['auteurs'])){
							foreach($_SESSION['auteurs'] as $auteur){
								inserer_composition_signature($id_signature,$auteur);
								afficherAuteurByIdModeBiblio($auteur);
							}
						}
						if(isset($_GET['collectif'])){
							afficherCollectifById($_GET['collectif']);
						}
						if($_GET['pseudonyme']!=''){
							echo " sous le pseudonyme <mark><em>".$_GET['pseudonyme']."</em></mark>";
						}
       		 		break;
					//////////////////////////////////////////////////////////////////////////////////////////////////
					case 'chapitre':
						$titre=$_GET['TitreChapitre'];
						$sousTitre=$_GET['ComplémentTitreChapitre'];
						$nomOuvrage=$_GET['TitreOuvrage'];
						$id_ouvrage=ouvrage_id($nomOuvrage);
						$pagination=$_GET['pagination_chapitre'];
						echo 'Cette critique est un chapitre';
						echo ' intitulé <cite>'.$titre.'</cite> ';
						if(isset($sousTitre) && $sousTitre !=''){
							echo ' ['.$sousTitre.'], ';
						}
						echo 'paru dans <em>'.$nomOuvrage.'</em>';
						if($pagination !='')echo ', pp. '.$pagination.', ';
						////
						$id_critique=inserer_critique($titre,$sousTitre,'chapitre',$pagination,$_GET['type'],'',$id_ouvrage,'');
						////
						if($_GET['pseudonyme']!=''){
							foreach($_SESSION['auteurs'] as $auteur){
								$id_pseudo=testerOuCreerPseudo($auteur,$_GET['pseudonyme']);
							}
						}
						else $id_pseudo='';
						$id_signature=inserer_signature($_GET['typeSignature'],$id_pseudo,$_GET['collectif'],$id_critique);
						echo " et signé (signature n° $id_signature) par ";
						if(isset($_SESSION['auteurs'])){
							foreach($_SESSION['auteurs'] as $auteur){
								inserer_composition_signature($id_signature,$auteur);
								afficherAuteurByIdModeBiblio($auteur);
							}
						}
						if(isset($_GET['collectif'])){
							afficherCollectifById($_GET['collectif']);
						}
						if($_GET['pseudonyme']!=''){
							echo " sous le pseudonyme <mark><em>".$_GET['pseudonyme']."</em></mark>";
						}
					break;
					//////////////////////////////////////////////////////////////////////////////////////////////////
   					default:
        				echo "<mark>Vous n'avez pas saisi de type pour votre critique, veuillez recommancer</mark>";
				}
				/*
				if($_GET['typeSignature']!='autre'){
					echo "signé par ".($_GET['typeSignature'])." et ".($_GET['type']);
				}
				else echo "signé par ".$_GET['valeur_autre_signature'];
				*/
				//echo '.';
				$url_de_verif="/recherche/resultats?type=simp&text=".$titre;//$id_critique;
				unset($_SESSION['auteurs']);
				unset($_GET['collectif']);
            ?>
            <a href="/pages/insertion">Nouvelle saisie</a> I  <a href="/pages/home">Index</a>
            <p align="center">
                <?php 
				flush();
				sleep(3);
				echo '<script language="javascript">document.location.replace("'.$url_de_verif.'");</script>'; ?>
            </p>
            </div>
    </section>
</body>
</html>