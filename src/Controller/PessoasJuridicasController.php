<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * PessoasJuridicas Controller
 *
 * @property \App\Model\Table\PessoasJuridicasTable $PessoasJuridicas
 *
 * @method \App\Model\Entity\PessoasJuridica[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PessoasJuridicasController extends AppController
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
        $pessoasJuridicas = $this->paginate($this->PessoasJuridicas);

        $this->set(compact('pessoasJuridicas'));
    }

    /**
     * View method
     *
     * @param string|null $id Pessoas Juridica id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $pessoasJuridica = $this->PessoasJuridicas->get($id, [
            'contain' => ['Clientes']
        ]);

        $this->set('pessoasJuridica', $pessoasJuridica);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $pessoasJuridica = $this->PessoasJuridicas->newEntity();
        if ($this->request->is('post')) {
            $pessoasJuridica = $this->PessoasJuridicas->patchEntity($pessoasJuridica, $this->request->getData());
            if ($this->PessoasJuridicas->save($pessoasJuridica)) {
                $this->Flash->success(__('The pessoas juridica has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The pessoas juridica could not be saved. Please, try again.'));
        }
        $clientes = $this->PessoasJuridicas->Clientes->find('list', ['limit' => 200]);
        $this->set(compact('pessoasJuridica', 'clientes'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Pessoas Juridica id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $pessoasJuridica = $this->PessoasJuridicas->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $pessoasJuridica = $this->PessoasJuridicas->patchEntity($pessoasJuridica, $this->request->getData());
            if ($this->PessoasJuridicas->save($pessoasJuridica)) {
                $this->Flash->success(__('The pessoas juridica has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The pessoas juridica could not be saved. Please, try again.'));
        }
        $clientes = $this->PessoasJuridicas->Clientes->find('list', ['limit' => 200]);
        $this->set(compact('pessoasJuridica', 'clientes'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Pessoas Juridica id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $pessoasJuridica = $this->PessoasJuridicas->get($id);
        if ($this->PessoasJuridicas->delete($pessoasJuridica)) {
            $this->Flash->success(__('The pessoas juridica has been deleted.'));
        } else {
            $this->Flash->error(__('The pessoas juridica could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
