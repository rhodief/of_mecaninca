<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Carros Controller
 *
 * @property \App\Model\Table\CarrosTable $Carros
 *
 * @method \App\Model\Entity\Carro[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CarrosController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $carros = $this->paginate($this->Carros);

        $this->set(compact('carros'));
    }

    /**
     * View method
     *
     * @param string|null $id Carro id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $carro = $this->Carros->get($id, [
            'contain' => ['OrdensDeServico']
        ]);

        $this->set('carro', $carro);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $carro = $this->Carros->newEntity();
        $cliente_id = $this->request->getQuery('cliente_id');

        if ($this->request->is('post')) {
            $carro = $this->Carros->patchEntity($carro, $this->request->getData());
            $result = $this->Carros->save($carro);
            if ($result) {
                $this->Flash->success(__('Carro Salvo com Sucesso'));
                if($cliente_id){
                    return $this->redirect(['controller'=>'OrdensDeServico','action' => 'add', '?'=>['cliente'=>$cliente_id, 'carro'=>$result->id]]);    
                }
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Carro não foi salvo. Tente novamente'));
        }
        $this->set(compact('carro'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Carro id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $carro = $this->Carros->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $carro = $this->Carros->patchEntity($carro, $this->request->getData());
            if ($this->Carros->save($carro)) {
                $this->Flash->success(__('The carro has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The carro could not be saved. Please, try again.'));
        }
        $this->set(compact('carro'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Carro id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $carro = $this->Carros->get($id);
        if ($this->Carros->delete($carro)) {
            $this->Flash->success(__('The carro has been deleted.'));
        } else {
            $this->Flash->error(__('The carro could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
