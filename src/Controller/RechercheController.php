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
        $this->loadModel('Critiquedart');
        
	}

    public function index(){

        return $this->redirect(['controller' => 'Recherche',
        'action' => 'avance']);
    }

    public function avance(){

        $critiquedart = $this->Critiquedart->find();
        $signature = $this->Critiquedart->Signature->find();
        $critique = $this->Critiquedart->Signature->Critique->find();
        $numeroperiodique = $this->Critiquedart->Signature->Critique->Numeroperiodique->find();
        $periodique = $this->Critiquedart->Signature->Critique->Numeroperiodique->Periodique->find();
        $ouvrage = $this->Critiquedart->Signature->Critique->Ouvrage->find();
        $editeur = $this->Critiquedart->Signature->Critique->Ouvrage->Editeur->find();
        $pseudonyme = $this->Critiquedart->Pseudonyme->find();
        $collectif = $this->Critiquedart->Collectif->find();

        $this->set(compact(
            'critiquedart',
            'signature',
            'critique',
            'numeroperiodique',
            'periodique',
            'ouvrage',
            'editeur',
            'pseudonyme',
            'collectif',
        ));
    }

    public function resultats(){

        $critiquedart = $this->Critiquedart->find();

                // Perform a search according to the given search type (simple or detailed)
                switch ($this->request->getQuery('type')) {
                    case 'simp':
                        $this->simpleSearch($critiquedart);
                    break;
        
                    case 'det':
                        $this->detailedSearch($critiquedart);
                    break;
                }
        
        $this->set(compact('critiquedart'));

    }

    private function simpleSearch(&$critiquedart){
        $text = $this->request->getQuery('text');

	     if(!isset($text) || preg_match('/\w/', $text) === 0) return;

		// Split the text around any number of commas, points and whitespaces
		$tokens = preg_split('/[,.\s]+/', $text);

        foreach($tokens as $token){

			$critiquedart
				->matching('Signature.Critique.Numeroperiodique.Periodique')
                ->matching('Signature.Critique')
				->where([
					'OR' => [
						['Critiquedart.nom LIKE' => '%'.$token.'%'],
						['Critiquedart.prenom LIKE' => '%'.$token.'%'],
						['Periodique.titre LIKE' => '%'.$token.'%'],
						['Critique.titre LIKE' => '%'.$token.'%'],
    
					]
                    ]);

                    }
				

    }
    private function detailedSearch(&$critiquedart){

    }

}