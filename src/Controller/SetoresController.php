<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Cache\Cache;
use App\Utils\EstadosItensServico;

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


    public function dashboard(){

        $user = Cache::read('User.user');
        if(!$user['user']){
            $this->Flash->error(__('Não foi possível recuperar Usuário - Cache...'));
            return $this->redirect(['controller'=>'pages', 'action' => 'display']);
        }
        $setor_id = $user['user']['tecnico']['setor_id'];
        $setor = $this->Setores->get($setor_id, ['contain'=>'Servicos']);
        
        $map = function($n){
            return $n->id;
        };

        $servicos = $this->Setores->Servicos->ItensDeServico->find()->where(['servico_id IN'=> array_map($map, $setor->servicos), 'ItensDeServico.situacao <' => 3])->contain(['Servicos', 'OrdensDeServico.Carros']);

        $this->set(compact('setor', 'servicos'));
    }

    public function executar($id = null){
        $this->request->allowMethod(['post']);
        $servico = $this->Setores->Servicos->ItensDeServico->get($id);
        $servico->situacao = EstadosItensServico::setEmExecucao();
        $servico->dirty(true);
        if ($this->Setores->Servicos->ItensDeServico->save($servico)) {
            $this->Flash->success(__('Serviço em Execução'));
        } else {
            $this->Flash->error(__('Não foi possível colocar o Serviço em Execução'));
        }

        return $this->redirect(['action' => 'dashboard']);
    }

    public function finalizar($id = null){
        $this->request->allowMethod(['post']);
        $servico = $this->Setores->Servicos->ItensDeServico->get($id);
        $servico->situacao = EstadosItensServico::setFinalizado();
        $servico->dirty(true);
        if ($this->Setores->Servicos->ItensDeServico->save($servico)) {
            $this->Flash->success(__('Serviço em Finalizado'));
        } else {
            $this->Flash->error(__('Não foi possível Finalizado'));
        }

        $this->redirect(['controller'=>'OrdensDeServico', 'action'=>'verificarFinalizacao', $servico->ordem_servico_id]);
    }

    
}
