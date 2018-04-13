<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Setores Controller
 *
 * @property \App\Model\Table\SetoresTable $Setores
 *
 * @method \App\Model\Entity\Setor[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SetoresController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $setores = $this->paginate($this->Setores);

        $this->set(compact('setores'));
    }

    /**
     * View method
     *
     * @param string|null $id Setor id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $setor = $this->Setores->get($id, [
            'contain' => ['Servicos', 'Tecnicos']
        ]);

        $this->set('setor', $setor);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $setor = $this->Setores->newEntity();
        if ($this->request->is('post')) {
            $setor = $this->Setores->patchEntity($setor, $this->request->getData());
            if ($this->Setores->save($setor)) {
                $this->Flash->success(__('The setor has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            debug($setor->errors());
            $this->Flash->error(__('The setor could not be saved. Please, try again.'));
        }
        $this->set(compact('setor'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Setor id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $setor = $this->Setores->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $setor = $this->Setores->patchEntity($setor, $this->request->getData());
            if ($this->Setores->save($setor)) {
                $this->Flash->success(__('The setor has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The setor could not be saved. Please, try again.'));
        }
        $this->set(compact('setor'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Setor id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $setor = $this->Setores->get($id);
        if ($this->Setores->delete($setor)) {
            $this->Flash->success(__('The setor has been deleted.'));
        } else {
            $this->Flash->error(__('The setor could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
