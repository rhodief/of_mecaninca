<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ItensDeServico Controller
 *
 * @property \App\Model\Table\ItensDeServicoTable $ItensDeServico
 *
 * @method \App\Model\Entity\ItensDeServico[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ItensDeServicoController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['OrdensDeServico', 'Servicos']
        ];
        $itensDeServico = $this->paginate($this->ItensDeServico);

        $this->set(compact('itensDeServico'));
    }

    /**
     * View method
     *
     * @param string|null $id Itens De Servico id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $itensDeServico = $this->ItensDeServico->get($id, [
            'contain' => ['OrdensDeServico', 'Servicos']
        ]);

        $this->set('itensDeServico', $itensDeServico);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $itensDeServico = $this->ItensDeServico->newEntity();
        if ($this->request->is('post')) {
            $itensDeServico = $this->ItensDeServico->patchEntity($itensDeServico, $this->request->getData());
            if ($this->ItensDeServico->save($itensDeServico)) {
                $this->Flash->success(__('The itens de servico has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The itens de servico could not be saved. Please, try again.'));
        }
        $ordensDeServico = $this->ItensDeServico->OrdensDeServico->find('list', ['limit' => 200]);
        $servicos = $this->ItensDeServico->Servicos->find('list', ['limit' => 200]);
        $this->set(compact('itensDeServico', 'ordensDeServico', 'servicos'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Itens De Servico id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $itensDeServico = $this->ItensDeServico->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $itensDeServico = $this->ItensDeServico->patchEntity($itensDeServico, $this->request->getData());
            if ($this->ItensDeServico->save($itensDeServico)) {
                $this->Flash->success(__('The itens de servico has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The itens de servico could not be saved. Please, try again.'));
        }
        $ordensDeServico = $this->ItensDeServico->OrdensDeServico->find('list', ['limit' => 200]);
        $servicos = $this->ItensDeServico->Servicos->find('list', ['limit' => 200]);
        $this->set(compact('itensDeServico', 'ordensDeServico', 'servicos'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Itens De Servico id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $itensDeServico = $this->ItensDeServico->get($id);
        if ($this->ItensDeServico->delete($itensDeServico)) {
            $this->Flash->success(__('The itens de servico has been deleted.'));
        } else {
            $this->Flash->error(__('The itens de servico could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
