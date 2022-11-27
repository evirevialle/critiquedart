<?php

//Mise en place de la recherche

require_once(__DIR__.'/../../config/config.php');
require_once(__DIR__.'/../fonctions/lib_fonctions.php');


// affichierToutesLesCritiquesFormOptionSansDoublon();
// $revues = afficherToutesLesRevuesFormOptionSansDateNiDoublon();
// afficherTousLesOuvragesFormOptionSansAnneeNiDoublon();
// $auteurs = afficherTousLesAuteursFormOptionSansId();

?>
<?= $this->Html->script('tab.js') ?>

<article class="landing-intro">

		<p style='align:justify' class="paragraphe" style="margin-bottom: 30px;">
			Les formulaires de recherche permettent d’exploiter une base de données constituée des références issues des bibliographies primaires des critiques répertoriés dans le site. 
			La base est interopérable avec les technologies du Web de données et donc interrogeable via Isidore, Hal et les outils comme Zotero ou Mendeley.
		</p>
	<div id="tabs" style="display:flex">
        <h3 class="tabRecherche" style='margin-left:90px;' onClick="selView(1, this)">Recherche simple</h3>
		<h3>&nbsp;/&nbsp;</h3>
        <h3 class="tabRecherche" onClick="selView(2, this)">Recherche avancée</h3>
	</div>
<div class="tabcontent">
<div id="indextab" class="tabpanel" style="display:inline">
            <?= $this->Form->create(null, ['type' => 'get', 'url' => '/recherche/resultats']) ?>
			<fieldset class="rechercher_fieldset">
				<p>
					<label class="control-label col-sm-8">Chercher un mot ou un groupe de mots</label>
					<input type="hidden" name="type" value="simp">
					<input style="width: 350px;" list="text" name="text" size="55" maxlength="255" autocomplete='off' required >
					<datalist id="text">
						<?php 
						  	//affichierToutesLesCritiquesFormOptionSansDoublon();
							afficherToutesLesRevuesFormOptionSansDateNiDoublon();
							//afficherTousLesOuvragesFormOptionSansAnneeNiDoublon();
							afficherTousLesAuteursFormOptionSansId();
						?>
					
					</datalist>
				</p>
			</fieldset>
			<div class="rechercher_div_bouton">
			<?= $this->Form->button(__('Lancer la recherche')) ?>
			<?= $this->Form->button('Réinitialiser la recherche', ['type'=>'reset']); ?>
			</div>
            <?= $this->Form->end() ?>
</div>
<div id="avancetab" class="tabpanel" style="display:none">

		<?= $this->Form->create(null, ['id'=>'avancee','type' => 'get', 'url' => '/recherche/resultats']) ?>
		<input type="hidden" name="type" value="det">
 			
			<!-- Si vous n'avez qu'un auteur à selectionner; cliquez <a href="javascript:mono()">ici</a>) -->
			<fieldset class="rechercher_fieldset">
				<legend class="rechercher_legend">Rechercher dans le titre ou le complément de titre</legend>
				<p><label class="control-label col-sm-8">Dans le titre: </label>
				<input name="critique_titre" type="text" size="35" maxlength="100" style="width: 350px;" /></p>
				<p><label class="control-label col-sm-8">Dans le complément titre: </label>
				<input name="cpl_titre" type="text" size="35" maxlength="100" style="width: 350px;" /></p>
			</fieldset>

			<fieldset class="rechercher_fieldset">
				<legend class="rechercher_legend">Sur le critique</legend>
				<label class="control-label col-sm-8">Choisir un critique</label>
				<select name="auteur" id="auteurs" class="rechercher_comboBox">
		            <option label=""></option>
		            <?php
		            	afficherTousLesAuteursFormOption();
				 	?>
				</select>
				<p>
		        <label class="control-label col-sm-8">Attribution<br /></label>
		        <select name="type_critique" class="rechercher_comboBox">
		            <option label=""></option>
		            <option value="certifié">Auteur certifié</option>
		            <option value="attribué">Attribué àl'auteur</option>
		        </select>
		        </p>
		        <p>
				<label class="control-label col-sm-8">Type de signature <br /></label>
	        	<select name="type_signature" class="rechercher_comboBox">
	               <option label=""></option>
				   <option value="patronyme">Patronyme(s)</option>
	               <option value="initiales">Initiales</option>
	               <option value="pseudonyme">Pseudonyme</option>
	               <option value="anonyme">Anonyme</option>
	        	</select>
	            <span id="autre_signature" style="visibility: hidden; display:none;">
					<label>Vous pouvez préciser le pseudonyme</label>
						<input name="pseudonyme" id="pseudonyme">
		        	</span>
				</p>  
		        <p>
	        	<label class="control-label col-sm-8">Rechercher par année(s) de publication entre</label>
	        	<input name="dateMin" type="text" size="4" maxlength="4" />&nbsp;&nbsp;&nbsp;et&nbsp;&nbsp;&nbsp;<input name="dateMax" type="text" size="4" maxlength="4" />
	     		</p>
	     </fieldset>
	  	 <fieldset class="rechercher_fieldset">
	       <legend class="rechercher_legend">Recherche d'ouvrage ou de revue</legend>
	        <p>
	        <label class="control-label col-sm-8">Type de texte<br /></label>
	        <select name="type_texte" onChange="avance();" class="rechercher_comboBox"> 
	        <option label=""></option>
	            <optgroup label="Périodique">
	            	<option value="article">Article de périodique</option>
	            </optgroup>
	            <optgroup label="Partie d'ouvrage">
	                <option value="preface">Préface</option>
	                <option value="chapitre">Chapitre d'ouvrage</option>
	                <option value="introduction">Introduction</option>
	                <option value="postface">Postface</option>
	                <option value="direction">Direction</option>
	          </optgroup>
	             <optgroup label="Ouvrage complet">
	            	<option value="monographie">Monographie</option>
	             </optgroup>
	        </select>
	        </p>
	        <div id="LesRevues" style="visibility: hidden; display:none;">
	        <label class="control-label col-sm-8">Titre de la revue</label>
	            <input list="revue" name="revue" size="55" maxlength="255" autocomplete="off">
	            <datalist id="revue">
						<?php 
						  	//affichierToutesLesCritiquesFormOptionSansDoublon();
							afficherToutesLesRevuesFormOptionSansDateNiDoublon();
						?>
				</datalist>
	         </div>
	         <div id="LesOuvrages" style="visibility: hidden; display:none;">
	         <label class="control-label col-sm-8">Titre de l'ouvrage</label>
	            <input list="ouvrage" name="ouvrage" size="55" maxlength="255" autocomplete="off">
	            <datalist id="ouvrage">
						<?php 
						  	afficherTousLesOuvragesFormOptionSansAnneeNiDoublon();
						?>
				</datalist>
	        </div>
	  </fieldset>
	  <div class="rechercher_div_bouton">
			<?= $this->Form->button(__('Lancer la recherche')) ?>
			<?= $this->Form->button('Réinitialiser la recherche', ['type'=>'reset']); ?>
			</div>
			<?= $this->Form->end() ?>
</div>
</div>
	  
<script>
function raz() {
	//alert('tester');
	document.getElementById('raz').value="true";
}

function avance(){
	// Selecteur de formulaire
	switch (document.forms.avancee.type_texte.selectedIndex) {
		case 1:
			// Revue
			document.getElementById('LesRevues').style.visibility="visible";
			document.getElementById('LesRevues').style.display="block";
			document.getElementById('LesOuvrages').style.visibility="hidden";
			document.getElementById('LesOuvrages').style.display="none";
		break;
		case 2:
			// Chapitre
			document.getElementById('LesOuvrages').style.visibility="visible";
			document.getElementById('LesOuvrages').style.display="block";
			document.getElementById('LesRevues').style.visibility="hidden";
			document.getElementById('LesRevues').style.display="none";
		break;
		case 3: 
			document.getElementById('LesOuvrages').style.visibility="visible";
			document.getElementById('LesOuvrages').style.display="block";
			document.getElementById('LesRevues').style.visibility="hidden";
			document.getElementById('LesRevues').style.display="none";
		break;
		case 4: 
			document.getElementById('LesOuvrages').style.visibility="visible";
			document.getElementById('LesOuvrages').style.display="block";
			document.getElementById('LesRevues').style.visibility="hidden";
			document.getElementById('LesRevues').style.display="none";
		break;
		case 5: 
			document.getElementById('LesOuvrages').style.visibility="visible";
			document.getElementById('LesOuvrages').style.display="block";
			document.getElementById('LesRevues').style.visibility="hidden";
			document.getElementById('LesRevues').style.display="none";
		break;
		case 6:
			document.getElementById('LesOuvrages').style.visibility="visible";
			document.getElementById('LesOuvrages').style.display="block";
			document.getElementById('LesRevues').style.visibility="hidden";
			document.getElementById('LesRevues').style.display="none";
		break;
		default:
			document.getElementById('LesOuvrages').style.visibility="hidden";
			document.getElementById('LesOuvrages').style.display="none";
			document.getElementById('LesRevues').style.visibility="hidden";
			document.getElementById('LesRevues').style.display="none";
		break;
	}
}

</script>
</article>
