<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Critiquedart Controller
 *
 * @property \App\Model\Table\CritiquedartTable $Critiquedart
 * @method \App\Model\Entity\Critiquedart[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CritiquedartController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
       
        $critiquedart = $this->paginate($this->Critiquedart->find('all', array('order'=>array('Critiquedart.nom ASC'))));
        $critique = $this->Critiquedart->find();

        switch ($this->request->getQuery('type')) {
            case 'simp':
                $this->simpleSearch($critique, $critiquedart);
            break;

            case 'det':
                $this->detailedSearch($critique, $critiquedart);
            break;
        }

        $this->set(compact('critiquedart','critique'));
    }

    


    /**
     * View method
     *
     * @param string|null $id Critiquedart id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function critique($id = null)
    {

        $this->loadModel('Periodique');

        $critiquedart = $this->Critiquedart->get($id, [
            'contain' => ['Pseudonyme','Secondaire', 'Site']]);
       
        $periodique = $this->Periodique->find();

        $periodique
        ->matching('Numeroperiodique.Critique.Signature.Critiquedart', function($q) use ($critiquedart){
            return $q->where(['Critiquedart.nom LIKE' => $critiquedart->nom]);
        })
        ->distinct(['Periodique.pk_id_periodique']);
        

        $this->set(compact('critiquedart','periodique'));
    }

    public function avance()
    {
        $format = $this->request->getQuery('export');
        if(!empty($format)){
            $format = strtolower($format);
        }
        $formats = [
            'xml' => 'Xml',
            'json' => 'Json',
        ];

        // Paginate if download is not requested
        // Note: This checking for download is important, since the download will
        // only return the results of the first page if the results have been paginated!
        if(empty($format) || !isset($formats[$format])){
            
            $critiquedart = $this->paginate($this->Critiquedart);

        } else{
            $critiquedart = $this->Critiquedart->find();
        }
        $critiquedart = $this->Critiquedart->find();
        
        switch ($this->request->getQuery('type')) {
            case 'simp':
                $this->simpleSearch($critiquedart, $critique);
            break;

            case 'det':
                $this->detailedSearch($critiquedart, $critique);
            break;
        }
     

        $this->set(compact('critiquedart'));
    }

    private function detailedSearch(&$critiquedart, &$critique){

        $period = $this->request->getQuery('period');
        $critiquedart_nom = $this->request->getQuery('nom');
        $critiquedart_prenom = $this->request->getQuery('prenom');
        $lettre = $this->request->getQuery('lettre');

        if(!empty($period)){
			$critiquedart->matching('Signature.Critique.Numeroperiodique.Periodique', function($q) use ($period){
					return $q->where(['Periodique.titre LIKE' => $period]);
				}
			);
        }
        
        if(!empty($critiquedart_nom)){
                $critiquedart->where(['Critiquedart.nom' => $critiquedart_nom]);
        }

        if(!empty($critiquedart_prenom)){
                $critiquedart->where(['Critiquedart.prenom' =>$critiquedart_prenom]);
        }

      
    }
    }


