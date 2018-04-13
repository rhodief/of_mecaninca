<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ItensDePeca Controller
 *
 * @property \App\Model\Table\ItensDePecaTable $ItensDePeca
 *
 * @method \App\Model\Entity\ItensDePeca[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ItensDePecaController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['OrdemServicos', 'Pecas']
        ];
        $itensDePeca = $this->paginate($this->ItensDePeca);

        $this->set(compact('itensDePeca'));
    }

    /**
     * View method
     *
     * @param string|null $id Itens De Peca id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $itensDePeca = $this->ItensDePeca->get($id, [
            'contain' => ['OrdemServicos', 'Pecas']
        ]);

        $this->set('itensDePeca', $itensDePeca);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $itensDePeca = $this->ItensDePeca->newEntity();
        if ($this->request->is('post')) {
            $itensDePeca = $this->ItensDePeca->patchEntity($itensDePeca, $this->request->getData());
            if ($this->ItensDePeca->save($itensDePeca)) {
                $this->Flash->success(__('The itens de peca has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The itens de peca could not be saved. Please, try again.'));
        }
        $ordemServicos = $this->ItensDePeca->OrdemServicos->find('list', ['limit' => 200]);
        $pecas = $this->ItensDePeca->Pecas->find('list', ['limit' => 200]);
        $this->set(compact('itensDePeca', 'ordemServicos', 'pecas'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Itens De Peca id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $itensDePeca = $this->ItensDePeca->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $itensDePeca = $this->ItensDePeca->patchEntity($itensDePeca, $this->request->getData());
            if ($this->ItensDePeca->save($itensDePeca)) {
                $this->Flash->success(__('The itens de peca has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The itens de peca could not be saved. Please, try again.'));
        }
        $ordemServicos = $this->ItensDePeca->OrdemServicos->find('list', ['limit' => 200]);
        $pecas = $this->ItensDePeca->Pecas->find('list', ['limit' => 200]);
        $this->set(compact('itensDePeca', 'ordemServicos', 'pecas'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Itens De Peca id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $itensDePeca = $this->ItensDePeca->get($id);
        if ($this->ItensDePeca->delete($itensDePeca)) {
            $this->Flash->success(__('The itens de peca has been deleted.'));
        } else {
            $this->Flash->error(__('The itens de peca could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
