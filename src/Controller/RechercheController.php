<?php
declare(strict_types=1);

namespace App\Controller;
use App\Controller\AppController;
use Cake\Http\Exception\NotFoundException;

class RechercheController extends AppController
{
    public function initialize() : void
    {
		parent::initialize();

        // Load models for being able to access their data.
        
        $this->loadModel('Critique');
        $this->loadModel('Articles');
        $this->loadModel('Chapitres');
        $this->loadModel('Collections');
        $this->loadModel('CoordinationsOuvrages');
        $this->loadModel('CritiquesDeCollectif');
        $this->loadModel('Introductions');
        $this->loadModel('Monographies');
        $this->loadModel('Postfaces');
        $this->loadModel('Prefaces');
        
	}

    public function index(){

        return $this->redirect(['controller' => 'Recherche',
        'action' => 'avance']);
    }

    public function avance(){

    }

    public function resultats(){
        
        $critiquedart = $this->Critique->find();
        $articles = $this->Articles->find();
        $chapitre = $this->Chapitres->find()
        ->contain(['Editeur'])
        ->order(['annee']);
        $collection = $this->Collections->find();
        $coordinationsOuvrage = $this->CoordinationsOuvrages->find()
        ->contain(['Editeur'])
        ->order(['annee']);
        $critiquesCollectif = $this->CritiquesDeCollectif->find();
        $introduction = $this->Introductions->find()
        ->contain(['Editeur'])
        ->order(['annee']);
        $monographie = $this->Monographies->find()
        ->contain(['Editeur'])
        ->order(['annee']);
        $postface = $this->Postfaces->find()
        ->contain(['Editeur'])
        ->order(['annee']);
        $preface = $this->Prefaces->find()
        ->contain(['Editeur'])
        ->order(['annee']);
      
        

                // Perform a search according to the given search type (simple or detailed)
                switch ($this->request->getQuery('type')) {
                    case 'simp':
                        $this->simpleSearch($articles, $chapitre, $collection, $coordinationsOuvrage, $critiquesCollectif, $introduction, $monographie, $postface, $preface);
                    break;

                    case 'det':
                        $this->detailedSearch($articles,$chapitre,$collection,$coordinationsOuvrage,$critiquesCollectif,$introduction,$monographie,$postface,$preface);
                    break;
                }
        
        $this->set(compact('articles','chapitre','collection','coordinationsOuvrage','critiquesCollectif','introduction','monographie','postface','preface'));

    }

    private function simpleSearch(&$articles, &$chapitre,&$collection, &$coordinationsOuvrage,&$critiquesCollectif,&$introduction, &$monographie, &$postface, &$preface){
        $text = $this->request->getQuery('text');

	    if(!isset($text) || preg_match('/\w/', $text) === 0) return;

		// Split the text around any number of commas, points and whitespaces
		$tokens = preg_split('/[,.\s]+/', $text);

        foreach($tokens as $token){

            $articles
                ->where([
                    'OR' => [
                        ['Articles.prenom LIKE' => '%'.$token.'%'],
                        ['Articles.nom LIKE'=> '%'.$token.'%'],
                        ['Articles.revue LIKE'=>'%'.$token.'%'],
                        ['Articles.ISSN LIKE'=>'%'.$token.'%'],
                        ['Articles.complementTitreNumero LIKE'=>'%'.$token.'%'],
                        ['Articles.volume LIKE'=>'%'.$token.'%'],
                        ['Articles.titreCritique LIKE'=> '%'.$token.'%'],
                        ['Articles.critiqueComplementTitre LIKE'=>'%'.$token.'%'],
                        ['Articles.typeCritique LIKE'=>'%'.$token.'%'],
                        ['Articles.pagination LIKE'=>'%'.$token.'%'],
                        ['Articles.attribution LIKE'=>'%'.$token.'%'],
                        ['Articles.typeSignature LIKE'=>'%'.$token.'%'],
                      
                    ]
                    ]);
            $chapitre
                ->where([
                    'OR' => [
                        ['Chapitres.prenom LIKE'=>'%'.$token.'%'],
                        ['Chapitres.nom LIKE'=>'%'.$token.'%'],
                        ['Chapitres.collection LIKE'=>'%'.$token.'%'],
                        ['Chapitres.titre LIKE'=>'%'.$token.'%'],
                        ['Chapitres.ouvrageTitre LIKE'=>'%'.$token.'%'],
                        ['Chapitres.ouvrageComplementTitre LIKE'=>'%'.$token.'%'],
                        ['Chapitres.coordonnateur LIKE'=>'%'.$token.'%'],
                        ['Chapitres.typeCritique LIKE'=>'%'.$token.'%'],
                        ['Chapitres.critiqueComplementTitre LIKE'=>'%'.$token.'%'],
                        ['Chapitres.attribution LIKE'=>'%'.$token.'%'],
                        ['Chapitres.typeSignature LIKE'=>'%'.$token.'%'],
                    ]
                    ]);
            $collection
                ->where(['Collections.collection LIKE'=> '%'.$token.'%']);
            
            $coordinationsOuvrage
                ->where(['OR'=>
                    [
                        ['CoordinationsOuvrages.ISBN_10 LIKE'=>'%'.$token.'%'],
                        ['CoordinationsOuvrages.titre LIKE'=>'%'.$token.'%'],
                        ['CoordinationsOuvrages.complement_titre LIKE'=>'%'.$token.'%'],
                        ['CoordinationsOuvrages.coordonnateur LIKE'=>'%'.$token.'%'],
                        ['CoordinationsOuvrages.collection LIKE'=>'%'.$token.'%']
                    ]
            ]);
            
            $critiquesCollectif
                ->where([
                    'OR'=>
                    [
                        ['CritiquesDeCollectif.collectif LIKE'=>'%'.$token.'%'],
                        ['CritiquesDeCollectif.membresCollectif LIKE'=>'%'.$token.'%'],
                        ['CritiquesDeCollectif.auteursSecondaires LIKE'=>'%'.$token.'%'],
                        ['CritiquesDeCollectif.titre LIKE'=>'%'.$token.'%'],
                        ['CritiquesDeCollectif.type LIKE'=>'%'.$token.'%']
                    ]
                ]);

            $introduction
                ->where([
                    'OR'=>[
                        ['Introductions.prenom LIKE'=>'%'.$token.'%'],
                        ['Introductions.nom LIKE'=>'%'.$token.'%'],
                        ['Introductions.ISBN LIKE'=>'%'.$token.'%'],
                        ['Introductions.collection LIKE'=>'%'.$token.'%'],
                        ['Introductions.titre LIKE'=>'%'.$token.'%'],
                        ['Introductions.ouvrageTitre LIKE'=>'%'.$token.'%'],
                        ['Introductions.ouvrageComplementTitre LIKE'=>'%'.$token.'%'],
                        ['Introductions.coordonnateur LIKE'=>'%'.$token.'%'],
                        ['Introductions.typeCritique LIKE'=>'%'.$token.'%'],
                        ['Introductions.critiqueComplementTitre LIKE'=>'%'.$token.'%'],
                        ['Introductions.pagination LIKE'=>'%'.$token.'%'],
                        ['Introductions.attribution LIKE'=> '%'.$token.'%'],
                        ['Introductions.typeSignature LIKE'=> '%'.$token.'%'],
                    ]
                    ]);

            $monographie
                ->where([
                    'OR'=>[
                        ['Monographies.prenom LIKE'=>'%'.$token.'%'],
                        ['Monographies.nom LIKE'=>'%'.$token.'%'],
                        ['Monographies.ISBN LIKE'=>'%'.$token.'%'],
                        ['Monographies.collection LIKE'=>'%'.$token.'%'],
                        ['Monographies.titre LIKE'=>'%'.$token.'%'],
                        ['Monographies.ouvrageComplementTitre LIKE'=>'%'.$token.'%'],
                        ['Monographies.typeCritique LIKE'=>'%'.$token.'%'],
                        ['Monographies.critiqueComplementTitre LIKE'=>'%'.$token.'%'],
                        ['Monographies.pagination LIKE'=>'%'.$token.'%'],
                        ['Monographies.attribution LIKE'=> '%'.$token.'%'],
                        ['Monographies.typeSignature LIKE'=> '%'.$token.'%'],
                    ]
                    ]);
            $postface
                ->where([
                    'OR'=>[
                        ['Postfaces.prenom LIKE'=>'%'.$token.'%'],
                        ['Postfaces.nom LIKE'=>'%'.$token.'%'],
                        ['Postfaces.ISBN LIKE'=>'%'.$token.'%'],
                        ['Postfaces.collection LIKE'=>'%'.$token.'%'],
                        ['Postfaces.ouvrageTitre LIKE'=>'%'.$token.'%'],
                        ['Postfaces.titre LIKE'=>'%'.$token.'%'],
                        ['Postfaces.ouvrageComplementTitre LIKE'=>'%'.$token.'%'],
                        ['Postfaces.typeCritique LIKE'=>'%'.$token.'%'],
                        ['Postfaces.critiqueComplementTitre LIKE'=>'%'.$token.'%'],
                        ['Postfaces.pagination LIKE'=>'%'.$token.'%'],
                        ['Postfaces.attribution LIKE'=> '%'.$token.'%'],
                        ['Postfaces.typeSignature LIKE'=> '%'.$token.'%'],
                    ]
                    ]);
            $preface
                ->where([
                    'OR'=>[
                        ['Prefaces.prenom LIKE'=>'%'.$token.'%'],
                        ['Prefaces.nom LIKE'=>'%'.$token.'%'],
                        ['Prefaces.ISBN LIKE'=>'%'.$token.'%'],
                        ['Prefaces.collection LIKE'=>'%'.$token.'%'],
                        ['Prefaces.ouvrageTitre LIKE'=>'%'.$token.'%'],
                        ['Prefaces.titre LIKE'=>'%'.$token.'%'],
                        ['Prefaces.ouvrageComplementTitre LIKE'=>'%'.$token.'%'],
                        ['Prefaces.typeCritique LIKE'=>'%'.$token.'%'],
                        ['Prefaces.critiqueComplementTitre LIKE'=>'%'.$token.'%'],
                        ['Prefaces.pagination LIKE'=>'%'.$token.'%'],
                        ['Prefaces.attribution LIKE'=> '%'.$token.'%'],
                        ['Prefaces.typeSignature LIKE'=> '%'.$token.'%'],
                    ]
                    ]);
            
  
                    }
				

    }
    private function detailedSearch(&$articles, &$chapitre,&$collection, &$coordinationsOuvrage,&$critiquesCollectif,&$introduction, &$monographie, &$postface, &$preface){

        	$titre_critique = $this->request->getQuery('critique_titre');
		$cpl_titre = $this->request->getQuery('cpl_titre');
		$auteur = $this->request->getQuery('auteur');
		$type_critique = $this->request->getQuery('type_critique');
		$type_signature = $this->request->getQuery('type_signature');
		$dateMin = $this->request->getQuery('dateMin');
        	$dateMax = $this->request->getQuery('dateMax');
		$type_texte = $this->request->getQuery('type_texte');
        	$revue = $this->request->getQuery('revue');
        	$ouvrage = $this->request->getQuery('ouvrage');

        //clé primaire du critique d'art
        /*if(empty($titre_critique.$cpl_titre.$auteur.$type_critique.$type_signature.$dateMin.$dateMax.$type_texte)){
            $critiquedart->matching('Signature.Critiquedart', function ($q) use ($auteur){
                return $q->where(['Critiquedart.pk_id_critiqueDart'=> 0]);
            });
            return;
        }*/

        if(empty($titre_critique.$cpl_titre.$auteur.$type_critique.$type_signature.$dateMin.$dateMax.$type_texte.$revue.$ouvrage)){
            $articles->where(['Articles.idCritiqueDart'=> 0 ]);
            $chapitre->where(['Chapitres.idCritiqueDart'=>0]);
            $monographie->where(['Monographies.idCritiqueDart'=>0]);
            $coordinationsOuvrage->where(['CoordinationsOuvrages.pk_id_ouvrage'=>0]);
            $preface->where(['Prefaces.idCritiqueDart'=>0]);
            $postface->where(['Postfaces.idCritiqueDart'=>0]);
            $introduction->where(['Introductions.idCritiqueDart'=>0]);
            return;
        }
        if(empty($titre_critique.$cpl_titre.$auteur.$type_critique.$type_signature.$dateMin.$dateMax.$revue.$ouvrage) && $type_texte === 'article'){
            $articles->where(['Articles.idCritiqueDart'=> 0 ]);
            $chapitre->where(['Chapitres.idCritiqueDart'=>0]);
            $monographie->where(['Monographies.idCritiqueDart'=>0]);
            $coordinationsOuvrage->where(['CoordinationsOuvrages.pk_id_ouvrage'=>0]);
            $preface->where(['Prefaces.idCritiqueDart'=>0]);
            $postface->where(['Postfaces.idCritiqueDart'=>0]);
            $introduction->where(['Introductions.idCritiqueDart'=>0]);
            return;
        }
        if(empty($titre_critique.$cpl_titre.$auteur.$type_signature.$dateMin.$dateMax.$revue.$ouvrage.$type_texte) && $type_critique === 'certifié'){
            $articles->where(['Articles.idCritiqueDart'=> 0 ]);
            $chapitre->where(['Chapitres.idCritiqueDart'=>0]);
            $monographie->where(['Monographies.idCritiqueDart'=>0]);
            $coordinationsOuvrage->where(['CoordinationsOuvrages.pk_id_ouvrage'=>0]);
            $preface->where(['Prefaces.idCritiqueDart'=>0]);
            $postface->where(['Postfaces.idCritiqueDart'=>0]);
            $introduction->where(['Introductions.idCritiqueDart'=>0]);
            return;
        }
        if(empty($titre_critique.$cpl_titre.$auteur.$type_critique.$dateMin.$dateMax.$revue.$ouvrage.$type_texte) && $type_signature === 'patronyme'){
            $articles->where(['Articles.idCritiqueDart'=> 0 ]);
            $chapitre->where(['Chapitres.idCritiqueDart'=>0]);
            $monographie->where(['Monographies.idCritiqueDart'=>0]);
            $coordinationsOuvrage->where(['CoordinationsOuvrages.pk_id_ouvrage'=>0]);
            $preface->where(['Prefaces.idCritiqueDart'=>0]);
            $postface->where(['Postfaces.idCritiqueDart'=>0]);
            $introduction->where(['Introductions.idCritiqueDart'=>0]);
            return;
        }

        if(!empty($titre_critique)){
            $articles->where(['Articles.titreCritique LIKE'=>'%'.$titre_critique.'%']);
            $chapitre->where(['OR'=>[
                ['Chapitres.ouvrageTitre LIKE'=>'%'.$titre_critique.'%'],
                ['Chapitres.titre LIKE'=>'%'.$titre_critique.'%'],
            ]]);
            $monographie->where(['Monographies.titre LIKE'=>'%'.$titre_critique.'%']);
            $coordinationsOuvrage->where(['CoordinationsOuvrages.titre LIKE'=>'%'.$titre_critique.'%']);
            $preface->where(['OR'=>[
                ['Prefaces.ouvrageTitre LIKE'=>'%'.$titre_critique.'%'],
                ['Prefaces.titre LIKE'=>'%'.$titre_critique.'%'],
            ]]);
            $postface->where(['OR'=>[
                ['Postfaces.ouvrageTitre LIKE'=>'%'.$titre_critique.'%'],
                ['Postfaces.titre LIKE'=>'%'.$titre_critique.'%']
            ]]);
            $introduction->where(['OR'=>[
                ['Introductions.ouvrageTitre LIKE'=>'%'.$titre_critique.'%'],
                ['Introductions.titre LIKE'=>'%'.$titre_critique.'%']
            ]]);
        }
        if(!empty($cpl_titre)){
            $articles->where(['Articles.critiqueComplementTitre LIKE'=>'%'.$cpl_titre.'%']);
            $chapitre->where(['OR'=>[
                ['Chapitres.ouvrageComplementTitre LIKE'=>'%'.$cpl_titre.'%'],
                ['Chapitres.critiqueComplementTitre LIKE'=>'%'.$cpl_titre.'%']
            ]]);
            $monographie->where(['OR'=>[
                ['Monographies.ouvrageComplementTitre LIKE'=>'%'.$cpl_titre.'%'],
                ['Monographies.critiqueComplementTitre LIKE'=>'%'.$cpl_titre.'%']
            ]]);
            $coordinationsOuvrage->where(['CoordinationsOuvrages.complement_titre LIKE'=>'%'.$cpl_titre.'%']);
            $preface->where(['OR'=>[
                ['Prefaces.ouvrageComplementTitre LIKE'=>'%'.$cpl_titre.'%'],
                ['Prefaces.critiqueComplementTitre LIKE'=>'%'.$cpl_titre.'%']
            ]]);
            $postface->where(['OR'=>[
                ['Postfaces.ouvrageComplementTitre LIKE'=>'%'.$cpl_titre.'%'],
                ['Postfaces.critiqueComplementTitre LIKE'=>'%'.$cpl_titre.'%']
            ]]);
            $introduction->where(['OR'=>
        [
            ['Introductions.ouvrageComplementTitre LIKE'=>'%'.$cpl_titre.'%'],
            ['Introductions.critiqueComplementTitre LIKE'=>'%'.$cpl_titre.'%'],
        ]
    ]);
        }
        if(!empty($auteur)){
            $articles->where(
                ['Articles.nom LIKE'=>'%'.$auteur.'%']);
            $chapitre->where(
                ['Chapitres.nom LIKE'=>'%'.$auteur.'%']);
            $postface->where(
                ['Postfaces.nom LIKE'=>'%'.$auteur.'%']);
            $introduction->where(
                ['Introductions.nom LIKE'=>'%'.$auteur.'%']);
            $preface->where(
                ['Prefaces.nom LIKE'=>'%'.$auteur.'%']);
            $monographie->where(
                ['Monographies.nom LIKE'=>'%'.$auteur.'%']);
            $coordinationsOuvrage->where(['CoordinationsOuvrages.coordonnateur LIKE'=>'%'.$auteur.'%']);
        }
        if(!empty($type_critique)){
            $articles->where(['Articles.attribution LIKE'=>$type_critique]);
            $chapitre->where(['Chapitres.attribution LIKE'=>$type_critique]);
            $postface->where(['Postfaces.attribution LIKE'=>$type_critique]);
            $preface->where(['Prefaces.attribution LIKE'=>$type_critique]);
            $introduction->where(['Introductions.attribution LIKE'=>$type_critique]);
            $monographie->where(['Monographies.attribution LIKE'=>$type_critique]);
        }
        if(!empty($type_signature)){
            $articles->where(['Articles.typeSignature LIKE'=>$type_signature]);
            $chapitre->where(['Chapitres.typeSignature LIKE'=>$type_signature]);
            $postface->where(['Postfaces.typeSignature LIKE'=>$type_signature]);
            $introduction->where(['Introductions.typeSignature LIKE'=>$type_signature]);
            $preface->where(['Prefaces.typeSignature LIKE'=>$type_signature]);
            $monographie->where(['Monographies.typeSignature LIKE'=>$type_signature]);
        }
        if(!empty($dateMin)){
            $articles->where(['Articles.annee >='=>$dateMin]);
            $chapitre->where(['Chapitres.annee >='=>$dateMin]);
            $postface->where(['Postfaces.annee >='=>$dateMin]);
            $introduction->where(['Introductions.annee >='=>$dateMin]);
            $coordinationsOuvrage->where(['CoordinationsOuvrages.annee >='=>$dateMin]);
            $preface->where(['Prefaces.annee >='=>$dateMin]);
            $monographie->where(['Monographies.annee >='=>$dateMin]);
        }
        if(!empty($dateMax)){
            $articles->where(['Articles.annee <='=>$dateMax]);
            $chapitre->where(['Chapitres.annee <='=>$dateMax]);
            $postface->where(['Postfaces.annee <='=>$dateMax]);
            $introduction->where(['Introductions.annee <='=>$dateMax]);
            $coordinationsOuvrage->where(['CoordinationsOuvrages.annee <='=>$dateMax]);
            $preface->where(['Prefaces.annee <='=>$dateMax]);
            $monographie->where(['Monographies.annee <='=>$dateMax]);
        }
        if(!empty($type_texte)){
            $articles->where(['Articles.typeCritique LIKE'=>'%'.$type_texte.'%']);
            $chapitre->where(['Chapitres.typeCritique LIKE'=>'%'.$type_texte.'%']);
            $postface->where(['Postfaces.typeCritique LIKE'=>'%'.$type_texte.'%']);
            $introduction->where(['Introductions.typeCritique LIKE'=>'%'.$type_texte.'%']);
            $preface->where(['Prefaces.typeCritique LIKE'=>'%'.$type_texte.'%']);
            $monographie->where(['Monographies.typeCritique LIKE'=>'%'.$type_texte.'%']);
        }
        if(!empty($revue)){
            $articles->where(['Articles.revue LIKE'=>'%'.$revue.'%']);
        }
        if(!empty($ouvrage)){
            $chapitre->where(['Chapitres.ouvrageTitre LIKE'=>'%'.$ouvrage.'%']);
            $postface->where(['Postfaces.ouvrageTitre LIKE'=>'%'.$ouvrage.'%']);
            $preface->where(['Prefaces.ouvrageTitre LIKE'=>'%'.$ouvrage.'%']);
            $introduction->where(['Introductions.ouvrageTitre LIKE'=>'%'.$ouvrage.'%']);
	    $coordinationsOuvrage->where(['CoordinationsOuvrages.titre LIKE'=>'%'.$ouvrage.'%']);

        }

    }

}
