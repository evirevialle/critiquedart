# Reporting de la mise à jour du projet Critiques d'art
Cette documentation a pour but d'expliquer le fonctionnement de la nouvelle interface et de décrire sa structure.  
Ce reporting décrit l'interface en reprenant son architecture comme plan.  
La nouvelle interface est dans le dossier html du serveur de paris 1. html/ est la racine de notre projet. Pour chaque partie j'indiquerais où se trouve le dossier depuis la racine html/.  

## config : html/config/
Dans ce dossier, on trouve les fichiers de configuration de l'application. Deux fichiers sont essentiels, le fichier app_local.php et le fichier config.php. Ces deux fichiers permettent la connexion avec la base de données. 

## src : html/src/
Dans ce dossier, on trouve les Models, les Controllers et le fichier application.php.
* Dans le fichier application.php, nous pouvons charger les différents plugins comme les outils de debug.
* Dans le dossier Model, on trouve deux autres dossiers Entity et Table, ces deux dossiers contiennent les fichiers de configuration qui permettent récupérer les données de chaque table afin de les transmettre au Controller.
* Dans le dossier Controller, on trouve plusieurs fichiers également, ils permettent d'effectuer des requêtes à partir des modèles de données et de les envoyer vers les templates qui contiennent les fichiers de vues:
    * **APIController** : permet de créer les chemins vers les fichiers d'export pour ensuite exporter les données au format CSV, les fichiers se trouvent dans **html/templates/API/**
    * **PagesController** : contient les pages statiques du projet comme actualites, opendata, accueil, chercheurs. Les fichiers se trouvent dans **html/templates/pages/**.
    * **RechercheController** : permet de paramétrer les résultats de la recherche et de paramétrer les différentes requêtes pour la recherche avancée et la recherche simple. Les fichiers se trouvent dans **html/templates/Recherche/**
    * **AjoutController** : permet de créer les chemins pour les différents fichier d'insertion de données dans la base de donnéees. Les fichiers se trouvent dans **/html/templates/Ajout/**
    * **CritiquedartController** : permet de créer les fichiers de l'onglet Critiques et d'afficher les données par critiques d'arts et par périodique. Les fichiers se trouvent dans **html/templates/Critiquedart/**

## templates : html/templates/

Les fichiers de templates permettent d'afficher les requêtes du Controller et de générer des sorties Html pour chaque résultat. 

* **API** : dans ce templates on trouve l'API de l'ancienne application pour exporter les données en JSON et CSV.
* **Ajout** : contient les anciens fichiers de l'application qui permettent l'insertion dans la base de données de nouvelles critiques
* **Pages** : contient les pages statiques qui ne bougent pas comme la page d'accueil, chercheurs, opendata, actualités
* **Critiquedart** : contient la page critique, critiquedart et avance. Ce template affiche les critiques selon leur identifiant et selon le périodique choisi par l'utilisateur.
* **Recherche** : avance.php contient les formulaires pour la recherche avancée et la recherche simple, la page resultats.php permet d'afficher les résultats, de les classer par articles, ouvrages, monographies, postfaces et préfaces. 
* **Layout** : contient l'architecture par défaut des pages avec l'importation des fichiers css et javascript, la page default.php est la page par défaut du projet. 
* **Fonctions** : contient les variables du projet et le fichier lib_fonctions.php qui contient les fonctions liés à la base de données mais aussi à l'interopérabilté des données pour les rendre détectables par Zotero et Schema.org

## webroot : html/webroot/

Les fichiers contenus dans le dossier webroot sont les images du projet, les feuilles de style CSS et les fichiers javascript de l'application.  

* **Critiques** : Ce dossier contient un dossier pour chaque critique contenant le fichier biblio.csv qui permet d'afficher les principaux périodiques dans lesquelles les critiques d'arts ont publiés.
* **CSS** : Ce dossier contient les feuilles de styles CSS pour la mise en page du site.
* **JS** : Ce dossier contient les fichiers javascript permettant le fonctionnement de l'application.
* **Download** : Ce dossier contient les élements qui sont affichés dans la page actualités et les fichiers qu'on peut télécharger dans la page données ouvertes.
* **Logos** : Ce dossier contient les logos du footer.
* **img** : Ce dossier contient les différentes images liés à l'application comme les icones.
