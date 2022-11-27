<?php
	session_start();
	require(__DIR__.'/../../config/config.php');
	require(__DIR__.'/../fonctions/lib_fonctions.php');
	
	
	
	unset($_SESSION['auteurs']);
	unset($_SESSION['collectif_nomme']);
	if(!isset($_SESSION['user'])){
		echo '<script language="javascript">document.location.replace("/pages/home");</script>';
	}

	if(isset($_SESSION['user'])){
		echo "<a href='/pages/unconnect' class=\"icon-deconnect\" title=\"Se déconnecter\"></a></div>";
	} else {
		echo "<a href='/pages/connect' class=\"icon-person\" title=\"S’identifier\"></a></div>";
	}
	milieu_header();
	
?>

    <h3>Choisir  <a href="javascript:multi()" style="color: #1f398f;">l'auteur, les auteurs</a> ou <a href="javascript:collectif()" style="color: #1f398f;">le collectif</a></h3>
    <div class="form-group" style="margin: 20px 0;">
	   <form class="form-horizontal" role="form" method="get" action="/ajout/action_page">
	   <fieldset>
	       <legend>Saisie du/des auteur(s) ou du collectif</legend>
	       
	       <div class="col-sm-10" id="collectif" style="visibility: hidden; display:none;" >
	         <label class="control-label" style="width: 700px;" for="collectif_nomme">Sélectionnez le collectif</label>
	         <select name="collectif_nomme" id="collectif_nomme" style="width: 350px;">
				<option value="" />
				<?php
					afficherTousLesCollectifFormOption();
				?>
	         </select>
	       </div>
	        <div class="col-sm-10" id="multi" style="visibility: hidden; display:none;" >         
	       <!-- Si vous n'avez qu'un auteur à selectionner; cliquez <a href="javascript:mono()">ici</a>) -->
	        <br />
	        <label class="control-label" style="width: 700px;" for="auteurs[]">Cliquez sur Ctrl (windows) / CMD (Mac) pour selectionner un ou plusieur(s) auteur(s). </label>
	        <select name="auteurs[]" id="auteurs" multiple style="height: 160px; width: 350px;">
		        <?php
					afficherTousLesAuteursFormOption();
				 ?>
	        </select>
	        </div>
		</fieldset>
		<div class="form-group" style="margin-top: 20px;">        
	      <div class="col-sm-offset-2 col-sm-10">
	        <button type="submit">Envoyer</button>
	        <input type="button" name="index" value="Retour à la page d'accueil" onclick="self.location.href='/pages/home'" />
	      </div>
	    </div>
	  </form>
	</div>
<script type="text/javascript">
    multi();
</script>
