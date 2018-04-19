<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Cache\Cache;
use App\Utils\EstadosOs;
use App\Utils\EstadosItensServico;

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

        if($this->request->is('post')){
            $data = $this->request->getData();
            $ordensDeServico = $this->OrdensDeServico->get($id);

            if(!empty($data['tipo']) && $data['tipo'] == 'servico'){
                $servico_id = $data['f-servico'];
                $servico = $this->OrdensDeServico->Servicos->get($servico_id);
                $servico->_joinData = $this->OrdensDeServico->Servicos->ItensDeServico->newEntity($data);
                $servico->_joinData->situacao = EstadosItensServico::setAguardando();
                $result = $this->OrdensDeServico->Servicos->link($ordensDeServico, [$servico]);
                
                if($result){
                    $this->Flash->success(__('Item de Serviço Salvo com Sucesso'));

                }else{
                    debug('não salvou');
                }
            }elseif(!empty($data['tipo']) && $data['tipo'] == 'peca'){
                $peca_id = $data['f-peca'];
                $peca = $this->OrdensDeServico->Pecas->get($peca_id);
                $peca->_joinData = $this->OrdensDeServico->Pecas->ItensDePeca->newEntity($data);
                $result = $this->OrdensDeServico->Pecas->link($ordensDeServico, [$peca]);
                
                if($result){
                    $this->Flash->success(__('Item de Peça Salvo com Sucesso'));

                }else{
                    debug('não salvou peças');
                }
            }
            
        }
        $ordensDeServico = $this->OrdensDeServico->get($id, [
            'contain' => ['Clientes', 'Carros', 'Faturamento', 'Servicos', 'Servicos.Setores', 'Pecas']
        ]);
        
        $this->set(compact('ordensDeServico', 'itens'));        
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $ordensDeServico = $this->OrdensDeServico->newEntity();
        if ($this->request->is('post')) {
            $currentDate = date("Y-m-d H:i:s");
            $data = $this->request->getData();
            
            $data['data_abertura'] = $currentDate;
            $data['data_alteracao'] = $currentDate;
            $data['situacao'] = EstadosOs::setAguardando();
            
            $ordensDeServico = $this->OrdensDeServico->patchEntity($ordensDeServico, $data);
            if ($this->OrdensDeServico->save($ordensDeServico)) {
                $this->Flash->success(__('Ordem de Serviço Salva com Sucesso'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Ordem de Serviço não pode ser salva'));
            debug($ordensDeServico->errors());
        }
        $cliente_id = $this->request->getQuery('cliente');
        $carro_id = $this->request->getQuery('carro');
        
        if($cliente_id){
            $cliente = $this->OrdensDeServico->Clientes->get($cliente_id, ['contain'=> ['PessoasJuridicas', 'PessoasFisicas']]);
        }else{
            $clientes = $this->OrdensDeServico->find()->contain(['PessoasJuridicas', 'PessoasFisicas'])->distinct(['cliente_id']);
        }
        if($carro_id){
            $carro = $this->OrdensDeServico->Carros->get($carro_id);
        }else{
            $carros = $this->OrdensDeServico->find()->contain('Carros')->distinct(['carro_id'])->where(['cliente_id'=>$cliente_id]);
        }
        
        $this->set(compact('ordensDeServico', 'cliente','clientes', 'carro', 'carros', 'carro_id', 'cliente_id'));
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
