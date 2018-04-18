<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Pecas Controller
 *
 * @property \App\Model\Table\PecasTable $Pecas
 *
 * @method \App\Model\Entity\Peca[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PecasController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $pecas = $this->paginate($this->Pecas);

        $this->set(compact('pecas'));
    }

    /**
     * View method
     *
     * @param string|null $id Peca id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $peca = $this->Pecas->get($id, [
            'contain' => ['ItensDePaca']
        ]);

        $this->set('peca', $peca);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $peca = $this->Pecas->newEntity();
        if ($this->request->is('post')) {
            $peca = $this->Pecas->patchEntity($peca, $this->request->getData());
            if ($this->Pecas->save($peca)) {
                $this->Flash->success(__('The peca has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The peca could not be saved. Please, try again.'));
        }
        $this->set(compact('peca'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Peca id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $peca = $this->Pecas->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $peca = $this->Pecas->patchEntity($peca, $this->request->getData());
            if ($this->Pecas->save($peca)) {
                $this->Flash->success(__('The peca has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The peca could not be saved. Please, try again.'));
        }
        $this->set(compact('peca'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Peca id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $peca = $this->Pecas->get($id);
        if ($this->Pecas->delete($peca)) {
            $this->Flash->success(__('The peca has been deleted.'));
        } else {
            $this->Flash->error(__('The peca could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function specas(){

        $s = $this->request->getQuery('s');
        $ajax = [];
        if(!empty($s)){
            $ajax = $this->Pecas->find()->where(['descricao ILIKE' => '%' . $s . '%']);
        }
        $this->set('ajax',$ajax);
        $this->viewBuilder()->setLayout('ajax');
    }
}
