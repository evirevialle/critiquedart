<article class="landing-intro">
		<p style="text-align: justify;">
</p><div class="std__maincol">
	<h2 class="std__title">Données ouvertes issues des enregistrements de la base</h2>
     <p class="paragraphe" style="margin-top:0;align=justify">Les jeux de données sont encodés en UTF-8, aux formats JSON et CSV ce dernier étant compatible avec les tableurs comme ceux des suites LibreOffice, OpenOffice et Microsoft (après une importation des données).<br>
<strong>Exemples d'outils en ligne permettant de visualiser, <em>sans aucune installation</em>, les données sous formes de cartes ou de réaliser des graphiques </strong>:
     </p><ul>
     <li>
     <a href="http://rawgraphs.io/">http://rawgraphs.io/</a>, outil basique mais efficace de création de graphiques ;
     </li>
     <li>
      <a href="http://mapinseconds.com/">http://mapinseconds.com/</a>, outil très simple de création de cartes ;
     </li>
     <li>
     <a href="http://hdlab.stanford.edu/palladio/">http://hdlab.stanford.edu/palladio/</a>, outil un peu plus avancé de l'Université de Standford ;
     </li>
     <p></p>
	<h3 class="std__title" style="margin-top: 10px;">Jeux de données</h3>
    <p class="paragraphe" style="margin-top:0;align=justify">
    	</p><details>
            <summary>Liste de tous les auteurs de critiques (jeu dynamique)</summary> 
                Accessibles au format <a href="API/csv_encode_auteurs.php">
                <abbr title="Comma-separated values : format informatique ouvert représentant des données tabulaires sous forme de valeurs séparées par des virgules ou point-virgules, peut être édité par un tableur ou un éditeur de texte.">CSV</abbr>
        	<img src="/webroot/images/csv.jpg" alt="au format CSV" title="Logo CSV" width="20" height="20"> 
                </a>
            <table>
                <tbody><tr><th>
                descriptif des champs : 
                </th>
                </tr><tr><td>"id ": </td><td>identifiant dans la base</td></tr>
                <tr><td>"prenom ": </td><td>Prénom de l'auteur, si connu, sinon vide</td></tr>
                <tr><td>"nom": </td><td>Nom de famille de l'auteur</td></tr>
                <tr><td>"naissance": </td><td>Année de naissance</td></tr>
                <tr><td>"mort": </td><td>date de mort</td></tr>
                <tr><td>"ISNI": </td><td><a href="http://www.isni.org/">International Standard Name Identifier des personnes</a></td></tr>
        	</tbody></table>
        </details>
        <details>
            <summary>Liste de toutes les revues analysées (jeu dynamique)</summary> 
                Accessibles au format <a href="API/csv_revues_base_critiques.php">
                <abbr title="Comma-separated values : format informatique ouvert représentant des données tabulaires sous forme de valeurs séparées par des virgules ou point-virgules, peut être édité par un tableur ou un éditeur de texte.">CSV</abbr>
        	<img src="/webroot/images/csv.jpg" alt="au format CSV" title="Logo CSV" width="20" height="20"> 
                </a>
            <table>
                <tbody><tr><th>
                descriptif des champs : 
                </th>
                </tr><tr><td>"titre": </td><td>titre de la revue</td></tr>
                <tr><td>"ISSN": </td><td>Identifiant International des publications en série</td></tr>
                <tr><td>"couverture_temporelle": </td><td>Dates de début et de fin de publication</td></tr>
                <tr><td>"ville": </td><td>lieu de publication, si connu, sinon NULL</td></tr>
        	</tbody></table>
        </details>
        <details>
            <summary>Liste de toutes les critiques (jeu dynamique)</summary> 
                Accessibles aux formats <a href="API/csv_encode_tout.php">
                <abbr title="Comma-separated values : format informatique ouvert représentant des données tabulaires sous forme de valeurs séparées par des virgules ou point-virgules, peut être édité par un tableur ou un éditeur de texte.">CSV</abbr>
        	<img src="/webroot/images/csv.jpg" alt="au format CSV" title="Logo CSV" width="20" height="20"> 
                </a>
                ou <a href="API/json_encode_tout_api.php">
                <abbr title="JavaScript Object Notation – Notation Objet issue de JavaScript">JSON</abbr>
        	<img src="https://upload.wikimedia.org/wikipedia/commons/c/c9/JSON_vector_logo.svg" alt="au format JSON" title="Logo JSON" width="20" height="20"></a>
            <table>
            <tbody><tr><th>
            descriptif des champs : 
            </th>
            </tr><tr><td>"id_critique": </td><td>id de la critique dans la base</td></tr>
            <tr><td>"titre": </td><td>titre de la critique</td></tr>
            <tr><td>"sous titre": </td><td>sous titre de la critique, sinon NULL</td></tr>
            <tr><td>"type": </td><td>type de critique</td></tr>
            <tr><td>"id_auteur": </td><td>id de l'auteur dans la base</td></tr>
            <tr><td>"nom": </td><td>nom du critique auteur</td></tr>
            <tr><td>"prenom": </td><td>prénom du critique auteur</td></tr>
            <tr><td>"annee_ouvrage <sup title="au format JSON les deux champs annee_ouvrage et annee_periodique sont fusionnés en 'année'"><mark>*</mark></sup>": </td><td>année de parution si la critique est un ouvrage ou partie d'un ouvrage, sinon NULL</td></tr>
            <tr><td>"coordonateur": </td><td>coordonateur potentiel de l'ouvrage, sinon NULL</td></tr>
            <tr><td>"titre_ouvrage": </td><td>titre de l'ouvrage si la critique est un article, sinon NULL</td></tr>
            <tr><td>"annee_periodique <sup title="au format JSON les deux champs annee_ouvrage et annee_periodique sont fusionnés en 'année'"><mark>*</mark></sup>": </td><td>année de parution si la critique est un article, sinon NULL</td></tr>
            <tr><td>"titre_periodique": </td><td>nom de la revue si la critique est un article, sinon NULL</td></tr>
            <tr><td>"ville": </td><td>lieu de publication, si connu, sinon NULL</td></tr>
        	</tbody></table>
        </details>
        <details>
  			<summary>Liste des critiques publiées sous forme d'articles dans des revues (jeu dynamique)</summary> 
        		Accessibles aux formats <a href="API/csv_encode_article.php">
        		<abbr title="Comma-separated values : format informatique ouvert représentant des données tabulaires sous forme de valeurs séparées par des virgules ou point-virgules, peut être édité par un tableur ou un éditeur de texte.">CSV</abbr>
        	<img src="/webroot/images/csv.jpg" alt="au format CSV" title="Logo CSV" width="20" height="20"> 
        		</a>
        		ou <a href="API/json_encode_article_api.php">
        		<abbr title="JavaScript Object Notation – Notation Objet issue de JavaScript">JSON</abbr>
        	<img src="https://upload.wikimedia.org/wikipedia/commons/c/c9/JSON_vector_logo.svg" alt="au format JSON" title="Logo JSON" width="20" height="20"></a>
            <table>
            <tbody><tr><th>
            descriptif des champs : 
            </th>
            </tr><tr><td>"nom": </td><td>nom du critique auteur</td></tr>
            <tr><td>"prenom": </td><td>prénom du critique auteur</td></tr>
            <tr><td>"typeSignature": </td><td>indique si la critique à été signée sous forme de 'pseudonyme', 'd'initiales', 'patronyme', 'collectif', 'anonyme'</td></tr>
            <tr><td>"signature": </td><td>concaténation du nom et du prénom critique auteur si la signature est patronymique</td></tr>
            <tr><td>"titre": </td><td>titre de l'article</td></tr>
            <tr><td>"revue": </td><td>nom de la revue</td></tr>
            <tr><td>"annee": </td><td>année de publication</td></tr>
            <tr><td>"date": </td><td>date précise de publication au format AAAA/MM/JJ</td></tr>
            <tr><td>"volume": </td><td>volume ou tome</td></tr>
            <tr><td>"numero": </td><td>numéro du périodique</td></tr>
            <tr><td>"pagination": </td><td>pagination de l'article</td></tr>
        	</tbody></table>
        </details>
        <details>
  			<summary>Distribution des critiques publiées sous forme d'articles dans des revues par auteur de critiques d'art (jeu dynamique)</summary> 
        		Accessible au format <a href="API/csv_distribution_articles.php">
        		<abbr title="Comma-separated values : format informatique ouvert représentant des données tabulaires sous forme de valeurs séparées par des virgules ou point-virgules, peut être édité par un tableur ou un éditeur de texte.">CSV</abbr>
        	<img src="/webroot/images/csv.jpg" alt="au format CSV" title="Logo CSV" width="20" height="20"> 
        		</a>
            <table>
            <tbody><tr><th>
            descriptif des champs : 
            </th>
            </tr><tr><td>"idCritiqueDart": </td><td>id de l'auteur dans la base</td></tr>
            <tr><td>"nom_usage": </td><td>nom et prénom du critique auteur</td></tr>
            <tr><td>"debut": </td><td>début de la période d'activité de collaboration à des revues</td></tr>
        	<tr><td>"fin": </td><td>fin de la période d'activité de collaboration à des revues</td></tr>
            <tr><td>"nombre_articles": </td><td>total des participations à des articles de revues</td></tr>
        	</tbody></table>
        </details>
        <details>
  			<summary>Listes des signatures alternatives de critiques sous forme de pseudonymes</summary> 
        		Accessible au format <a href="/data/pseudonymes.csv">
        		<abbr title="Comma-separated values : format informatique ouvert représentant des données tabulaires sous forme de valeurs séparées par des virgules ou point-virgules, peut être édité par un tableur ou un éditeur de texte.">CSV</abbr>
        	<img src="/webroot/images/csv.jpg" alt="au format CSV" title="Logo CSV" width="20" height="20"> 
        		</a>
            <table>
            <tbody><tr><th>
            descriptif des champs : 
            </th>
            </tr><tr><td>"nom": </td><td>nom du critique auteur</td></tr>
            <tr><td>"prenom": </td><td>prénom du critique auteur</td></tr>
        	<tr><td>"pseudonyme": </td><td>signature alternative</td></tr>
        	</tbody></table>
        </details>
        <details>
  			<summary>Listes des éditeurs d'ouvrages recensés par la base</summary> 
        		Accessible au format <a href="/data/editeurs_villes.csv">
        		<abbr title="Comma-separated values : format informatique ouvert représentant des données tabulaires sous forme de valeurs séparées par des virgules ou point-virgules, peut être édité par un tableur ou un éditeur de texte.">CSV</abbr>
        	<img src="/webroot/images/csv.jpg" alt="au format CSV" title="Logo CSV" width="20" height="20"> 
        		</a>
            <table>
            <tbody><tr><th>
            descriptif des champs : 
            </th>
            </tr><tr><td>"nom": </td><td>nom de l'éditeur de critiques</td></tr>
            <tr><td>"ville": </td><td>ville d'édition</td></tr>
        	</tbody></table>
        </details>
        <details>
  			<summary>Distribution géographique des éditeurs d'ouvrages recensés par la base (nombre d'éditeurs par ville)</summary> 
        		Accessible au format <a href="/data/editeurs_villes_distribution.csv">
        		<abbr title="Comma-separated values : format informatique ouvert représentant des données tabulaires sous forme de valeurs séparées par des virgules ou point-virgules, zpeut être édité par un tableur ou un éditeur de texte.">CSV</abbr>
                        <img src="/webroot/images/csv.jpg" alt="au format CSV" title="Logo CSV" width="20" height="20"> 
                                </a>
                        <table>
                            <tbody><tr><th>
                            descriptif des champs : 
                            </th>
                            </tr><tr><td>"ville": </td><td>ville d'édition</td></tr>
                            <tr><td>"nombre d'éditeurs": </td><td>nombre d'éditeurs recensés dans la base par ville</td></tr>
                        </tbody></table>
        </details>
        <details>
  		<summary id="editeurs-geo-name">Répartition des éditeurs avec les coordonnées cartographiques</summary> 
        		Accessible au format <a href="/data/editeurs-geo-name.csv">
        		<abbr title="Comma-separated values : format informatique ouvert représentant des données tabulaires sous forme de valeurs séparées par des virgules ou point-virgules, peut être édité par un tableur ou un éditeur de texte.">CSV</abbr>
        	<img src="/webroot/images/csv.jpg" alt="au format CSV" title="Logo CSV" width="20" height="20"> 
        		</a>
            <table>
            <tbody><tr><th>
            descriptif des champs : 
            </th>
            </tr><tr><td>"ville": </td><td>ville d'édition</td></tr>
            <tr><td>"coordonnées décimales": </td><td>coordonnées GPS</td></tr>
             <tr><td>"pays": </td><td>nom français du pays</td></tr>
              <tr><td>"iso-3166-1": </td><td>nom normalisé ISO du pays</td></tr>
             <tr><td>"iso-3166-1-alpha3": </td><td>notation iso du pays sur 3 caractères</td></tr>
            <tr><td>"nombre d'éditeurs": </td><td>nombre d'éditeurs recensés dans la base par ville</td></tr>
        	</tbody></table>
        </details>
<p></p>
</ul></div>
<div>
	<p class="paragraphe" style="margin-top:0;align=justify">
    </p>
</div>


	</article>