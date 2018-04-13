<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * PessoasFisicas Controller
 *
 * @property \App\Model\Table\PessoasFisicasTable $PessoasFisicas
 *
 * @method \App\Model\Entity\PessoasFisica[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PessoasFisicasController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Clientes']
        ];
        $pessoasFisicas = $this->paginate($this->PessoasFisicas);

        $this->set(compact('pessoasFisicas'));
    }

    /**
     * View method
     *
     * @param string|null $id Pessoas Fisica id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $pessoasFisica = $this->PessoasFisicas->get($id, [
            'contain' => ['Clientes']
        ]);

        $this->set('pessoasFisica', $pessoasFisica);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $pessoasFisica = $this->PessoasFisicas->newEntity();
        if ($this->request->is('post')) {
            $pessoasFisica = $this->PessoasFisicas->patchEntity($pessoasFisica, $this->request->getData());
            if ($this->PessoasFisicas->save($pessoasFisica)) {
                $this->Flash->success(__('The pessoas fisica has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The pessoas fisica could not be saved. Please, try again.'));
        }
        $clientes = $this->PessoasFisicas->Clientes->find('list', ['limit' => 200]);
        $this->set(compact('pessoasFisica', 'clientes'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Pessoas Fisica id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $pessoasFisica = $this->PessoasFisicas->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $pessoasFisica = $this->PessoasFisicas->patchEntity($pessoasFisica, $this->request->getData());
            if ($this->PessoasFisicas->save($pessoasFisica)) {
                $this->Flash->success(__('The pessoas fisica has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The pessoas fisica could not be saved. Please, try again.'));
        }
        $clientes = $this->PessoasFisicas->Clientes->find('list', ['limit' => 200]);
        $this->set(compact('pessoasFisica', 'clientes'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Pessoas Fisica id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $pessoasFisica = $this->PessoasFisicas->get($id);
        if ($this->PessoasFisicas->delete($pessoasFisica)) {
            $this->Flash->success(__('The pessoas fisica has been deleted.'));
        } else {
            $this->Flash->error(__('The pessoas fisica could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
