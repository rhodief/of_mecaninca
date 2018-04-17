<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Clientes Controller
 *
 * @property \App\Model\Table\ClientesTable $Clientes
 *
 * @method \App\Model\Entity\Cliente[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ClientesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $s = $this->request->getQuery('s');
        $clientes;
        if($s){
            $query = $this->Clientes->find()->where(['nome ILIKE' => '%'.$s.'%'])->contain(['PessoasFisicas', 'PessoasJuridicas']);
            $this->set('clientes', $this->paginate($query));
        }
        
        $this->set(compact('s'));
    }

    /**
     * View method
     *
     * @param string|null $id Cliente id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $cliente = $this->Clientes->get($id, [
            'contain' => ['PessoasFisicas', 'PessoasJuridicas', 'OrdensDeServico', 'OrdensDeServico.Carros']
        ]);

        $this->set('cliente', $cliente);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $cliente = $this->Clientes->newEntity();
        $data = $this->request->getData();
        if ($this->request->is('post')) {
            $tipo = $data['tipo_pessoa'];
            $numero = $data['numero_pessoa'];
            if(empty($tipo) || empty($numero)){
                $this->Flash->error(__('Explicite se trata-se de Pessoa Física ou Jurídica e o Número')); 
            }else{
                $cliente = $this->Clientes->patchEntity($cliente, $this->request->getData());
                $result = $this->Clientes->save($cliente);
                if ($result) {
                    $id = $result->id;
                    if($tipo == 'pj'){
                        $pj = $this->Clientes->PessoasJuridicas->newEntity();
                        $pj = $this->Clientes->PessoasJuridicas->patchEntity($pj, ['cnpj'=>$numero, 'cliente_id'=>$id, 'responsavel'=>$data['responsavel'], 'cpf_responsavel'=>$data['cpf_responsavel']]);
                        if($this->Clientes->PessoasJuridicas->save($pj)){
                            //Lógica do Salvamento, 
                            //debug('salvou pj');
                        }else{
                            //debug($pj->errors());
                            //senão rowback..   
                        }
                    }else{
                        $pf = $this->Clientes->PessoasFisicas->newEntity();
                        $pf = $this->Clientes->PessoasFisicas->patchEntity($pf, ['cpf'=>$numero, 'cliente_id'=>$id, 'data_nascimento' => $data['data_nascimento']]);
                        $this->Clientes->PessoasFisicas->save($pf);
                    }
                    $this->Flash->success(__('Cliente salvo com Sucesso!.'));
                    return $this->redirect(['action' => 'index']);
                }
            }
            $this->Flash->error(__('Cliente não foi salvo. Tente novamente.'));
        }
        $this->set(compact('cliente'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Cliente id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $cliente = $this->Clientes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $cliente = $this->Clientes->patchEntity($cliente, $this->request->getData());
            if ($this->Clientes->save($cliente)) {
                $this->Flash->success(__('The cliente has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The cliente could not be saved. Please, try again.'));
        }
        $this->set(compact('cliente'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Cliente id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $cliente = $this->Clientes->get($id);
        if ($this->Clientes->delete($cliente)) {
            $this->Flash->success(__('The cliente has been deleted.'));
        } else {
            $this->Flash->error(__('The cliente could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function list()
    {
        $clientes = $this->paginate($this->Clientes);

        $this->set(compact('clientes'));
    }
}
