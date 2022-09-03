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

        $this->set(compact('critiquedart'));
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
            'contain' => ['Pseudonyme']]);
       
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
        
        $critiquedart = $this->Critiquedart->find()
        ->contain(['Signature']);
        
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

    private function detailedSearch(&$critiquedart){

        $period = $this->request->getQuery('period');
        $critiquedart_nom = $this->request->getQuery('nom');
        $critiquedart_prenom = $this->request->getQuery('prenom');

        if(!empty($period)){
			$critiquedart->matching('Signature.Critique.Numeroperiodique.Periodique', function($q) use ($period){
					return $q->where(['Periodique.titre LIKE' => $period]);
				}
			);
        
        if(!empty($critiquedart_nom)){
                $critiquedart->where(['Critiquedart.nom' => $critiquedart_nom]);
        };
        if(!empty($critiquedart_prenom)){
                $critiquedart->where(['Critiquedart.prenom' =>$critiquedart_prenom]);
        }

    }
}


}