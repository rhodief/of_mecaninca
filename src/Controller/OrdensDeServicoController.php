<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * OrdensDeServico Controller
 *
 * @property \App\Model\Table\OrdensDeServicoTable $OrdensDeServico
 *
 * @method \App\Model\Entity\OrdensDeServico[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class OrdensDeServicoController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Clientes', 'Carros']
        ];
        $ordensDeServico = $this->paginate($this->OrdensDeServico);

        $this->set(compact('ordensDeServico'));
    }

    /**
     * View method
     *
     * @param string|null $id Ordens De Servico id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $ordensDeServico = $this->OrdensDeServico->get($id, [
            'contain' => ['Clientes', 'Carros', 'Faturamento']
        ]);

        $this->set('ordensDeServico', $ordensDeServico);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add($id = null)
    {
        $ordensDeServico = $this->OrdensDeServico->newEntity();
        if ($this->request->is('post')) {
            $ordensDeServico = $this->OrdensDeServico->patchEntity($ordensDeServico, $this->request->getData());
            if ($this->OrdensDeServico->save($ordensDeServico)) {
                $this->Flash->success(__('The ordens de servico has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ordens de servico could not be saved. Please, try again.'));
        }
        $cliente = $this->OrdensDeServico->Clientes->get($id, ['contain'=> ['PessoasJuridicas', 'PessoasFisicas']]);
        $carros = $this->OrdensDeServico->find()->contain('Carros')->distinct(['carro_id']);
        $this->set(compact('ordensDeServico', 'cliente', 'carros'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Ordens De Servico id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $ordensDeServico = $this->OrdensDeServico->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $ordensDeServico = $this->OrdensDeServico->patchEntity($ordensDeServico, $this->request->getData());
            if ($this->OrdensDeServico->save($ordensDeServico)) {
                $this->Flash->success(__('The ordens de servico has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ordens de servico could not be saved. Please, try again.'));
        }
        $clientes = $this->OrdensDeServico->Clientes->find('list', ['limit' => 200]);
        $carros = $this->OrdensDeServico->Carros->find('list', ['limit' => 200]);
        $this->set(compact('ordensDeServico', 'clientes', 'carros'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Ordens De Servico id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $ordensDeServico = $this->OrdensDeServico->get($id);
        if ($this->OrdensDeServico->delete($ordensDeServico)) {
            $this->Flash->success(__('The ordens de servico has been deleted.'));
        } else {
            $this->Flash->error(__('The ordens de servico could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
