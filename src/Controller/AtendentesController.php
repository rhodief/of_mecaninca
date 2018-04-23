<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Atendentes Controller
 *
 * @property \App\Model\Table\AtendentesTable $Atendentes
 *
 * @method \App\Model\Entity\Atendente[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AtendentesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Funcionarios']
        ];
        $atendentes = $this->paginate($this->Atendentes);

        $this->set(compact('atendentes'));
    }

    /**
     * View method
     *
     * @param string|null $id Atendente id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $atendente = $this->Atendentes->get($id, [
            'contain' => ['Funcionarios']
        ]);

        $this->set('atendente', $atendente);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add($id = null)
    {
        $atendente = $this->Atendentes->newEntity();
        if ($this->request->is('post')) {
            $data = $this->request->getData();
            $data['funcionario_id'] = $id;
            $atendente = $this->Atendentes->patchEntity($atendente, $data);
            if ($this->Atendentes->save($atendente)) {
                $this->Flash->success(__('Atendente Salvo!.'));
                return $this->redirect(['controller'=>'funcionarios', 'action' => 'view', $id]);
            }
            $this->Flash->error(__('Atendente Não Foi Salvo'));
        }
        $funcionario = $this->Atendentes->Funcionarios->get($id);
        $this->set(compact('atendente', 'funcionario'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Atendente id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $atendente = $this->Atendentes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $atendente = $this->Atendentes->patchEntity($atendente, $this->request->getData());
            if ($this->Atendentes->save($atendente)) {
                $this->Flash->success(__('The atendente has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The atendente could not be saved. Please, try again.'));
        }
        $funcionarios = $this->Atendentes->Funcionarios->find('list', ['limit' => 200]);
        $this->set(compact('atendente', 'funcionarios'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Atendente id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $atendente = $this->Atendentes->get($id);
        if ($this->Atendentes->delete($atendente)) {
            $this->Flash->success(__('The atendente has been deleted.'));
        } else {
            $this->Flash->error(__('The atendente could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
