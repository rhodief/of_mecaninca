<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Cache\Cache;

/**
 * Funcionarios Controller
 *
 * @property \App\Model\Table\FuncionariosTable $Funcionarios
 *
 * @method \App\Model\Entity\Funcionario[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class FuncionariosController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $funcionarios = $this->paginate($this->Funcionarios);

        $this->set(compact('funcionarios'));
    }

    /**
     * View method
     *
     * @param string|null $id Funcionario id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $funcionario = $this->Funcionarios->get($id, [
            'contain' => ['Atendentes', 'Tecnicos']
        ]);

        $this->set('funcionario', $funcionario);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $funcionario = $this->Funcionarios->newEntity();
        
        if ($this->request->is('post')) {
            //debug($this->request->getData());exit;
            $funcionario = $this->Funcionarios->patchEntity($funcionario, $this->request->getData());
            $result = $this->Funcionarios->save($funcionario);
            if ($result) {
                $this->Flash->success(__('The funcionario has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            //debug($funcionario->errors());
            
            $this->Flash->error(__('The funcionario could not be saved. Please, try again.'));
        }
        $this->set(compact('funcionario'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Funcionario id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $funcionario = $this->Funcionarios->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $funcionario = $this->Funcionarios->patchEntity($funcionario, $this->request->getData());
            if ($this->Funcionarios->save($funcionario)) {
                $this->Flash->success(__('The funcionario has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The funcionario could not be saved. Please, try again.'));
        }
        $this->set(compact('funcionario'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Funcionario id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $funcionario = $this->Funcionarios->get($id);
        if ($this->Funcionarios->delete($funcionario)) {
            $this->Flash->success(__('The funcionario has been deleted.'));
        } else {
            $this->Flash->error(__('The funcionario could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function login(){
        $senha = '1234';
        $data = $this->request->getData();
        $tecnico = preg_split('/tec/i', $data['matricula']);
        $atendente = preg_split('/ate/i', $data['matricula']);

        if(!empty($tecnico[1])){
            $tecnico_id = $tecnico[1];
            $funcionario = $this->Funcionarios->get($tecnico_id, ['contain'=>['Tecnicos']]);
            
            if($funcionario && $funcionario->has('tecnico')){
                if($data['senha'] == $senha){
                    $this->setUser($funcionario, 'TEC');
                    return $this->redirectToTecnico($funcionario->nome);
                }
                return $this->responseError('Senha Incorreta');
            }
            return $this->responseError('Funcionário não é Técnico');
            

        }elseif(!empty($atendente[1])){
            $atendente_id = $atendente[1];
            $atendente = $this->Funcionarios->get($atendente_id, ['contain'=>['Atendente']]);
            if($atendente && $funcionario->has('atendente')){
                if($data['senha'] == $senha){
                    $this->setUser($funcionario, 'ATE');
                    return $this->redirectToAtendente($funcionario->nome);
                }
                return $this->responseError('Senha Incorreta');
            }
            return $this->responseError('Funcionário não é Atendente');
        }else{
            $this->Flash->error(__('Formato de Matrícula Incorreto'));
            return $this->redirect(['controller'=>'pages', 'action' => 'home']);
        }

        debug($tecnico);exit;
    }

    public function logout(){
        Cache::write('User.user', null);
        $this->redirectToLogin();
    }

    private function responseError($msg){
        $this->Flash->error(__($msg));
        return $this->redirect(['controller'=>'pages', 'action' => 'home']);
    }

    private function redirectToTecnico($name){
        $msg = 'Bem Vindo, Técnico ' . $name;
        $this->Flash->success(__($msg));
        return $this->redirect(['controller'=>'clientes', 'action' => 'index']);
    }

    private function redirectToAtendente($name){
        $msg = 'Bem Vindo, Atendente ' . $name;
        $this->Flash->success(__($msg));
        return $this->redirect(['controller'=>'clientes', 'action' => 'index']);
    }

    private function redirectToLogin(){
        $msg = 'Você saiu do Sistema!';
        $this->Flash->success(__($msg));
        return $this->redirect(['controller'=>'pages', 'action' => 'display']);
    }

    private function setUser($user, $alias){
        $usr = ['alias'=>$alias, 'user'=>$user];
        Cache::write('User.user', $usr);
    }
    
}
