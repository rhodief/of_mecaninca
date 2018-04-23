<?php
namespace App\Controller;

use App\Controller\AppController;
use App\Utils\CalcularServicos;

/**
 * Faturamento Controller
 *
 * @property \App\Model\Table\FaturamentoTable $Faturamento
 *
 * @method \App\Model\Entity\Faturamento[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class FaturamentoController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['OrdensDeServico']
        ];
        $faturamento = $this->paginate($this->Faturamento);

        $this->set(compact('faturamento'));
    }

    /**
     * View method
     *
     * @param string|null $id Faturamento id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $faturamento = $this->Faturamento->get($id, [
            'contain' => ['OrdensDeServico']
        ]);
        $this->set('faturamento', $faturamento);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add($id = null)
    {
        $faturamento = $this->Faturamento->newEntity();
        if ($this->request->is('post')) {
            $data = $this->request->getData();
            $currentDate = date("Y-m-d H:i:s");
            $data['data_pagamento'] = $currentDate;
            $data['ordem_de_servico_id'] = $id;
            $data['status'] = 'PAGO';
            $faturamento = $this->Faturamento->patchEntity($faturamento, $data);
            if ($this->Faturamento->save($faturamento)) {
                $this->Flash->success(__('Faturamento Salvo com Sucesso'));
                return $this->redirect(['controller'=>'ordensDeServico', 'action' => 'view', $id]);
            }
            $this->Flash->error(__('Faturamento não Pôde Ser Salvo'));
        }
        $ordemDeServico = $this->Faturamento->OrdensDeServico->get($id, ['contain'=>['Carros', 'Clientes', 'Servicos.Setores', 'Pecas']]);

        if(!$ordemDeServico){
            debug('Os não encontrada');exit;
        }
        
        $calculo = new CalcularServicos($ordemDeServico->servicos, $ordemDeServico->pecas);
        $valores = $calculo->calcular();
        
        $this->set(compact('faturamento', 'ordemDeServico', 'valores'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Faturamento id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $faturamento = $this->Faturamento->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $faturamento = $this->Faturamento->patchEntity($faturamento, $this->request->getData());
            if ($this->Faturamento->save($faturamento)) {
                $this->Flash->success(__('The faturamento has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The faturamento could not be saved. Please, try again.'));
        }
        $ordensDeServico = $this->Faturamento->OrdensDeServico->find('list', ['limit' => 200]);
        $this->set(compact('faturamento', 'ordensDeServico'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Faturamento id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $faturamento = $this->Faturamento->get($id);
        if ($this->Faturamento->delete($faturamento)) {
            $this->Flash->success(__('The faturamento has been deleted.'));
        } else {
            $this->Flash->error(__('The faturamento could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
