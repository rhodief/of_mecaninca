<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Funcionario $funcionario
 */
?>

<div class="d-flex">
  <div class="mr-auto p-2"><h1>Funcionário</h1></div>
  <div class="p-2"><a href="<?= $this->Url->Build(['controller'=>'funcionarios', 'action'=>"index"]) ?>" class="btn btn-secondary btn-lg active" role="button" aria-pressed="true">Voltar</a></div>
</div>


<div class="table-responsive">
<table class="table table-striped">
  <tbody>
  <tr>
      <th scope="row">Nome</th>
      <td><?= $funcionario->nome ?></td>
    </tr>
    
    <tr>
      <th scope="row">CPF</th>
      <td><?= $funcionario->cpf ?></td>
    </tr>
    <tr>
      <th scope="row">Atendente Matrícula</th>
      <td><?= $funcionario->has('atendente') ? $this->Html->link('ATE'.$funcionario->id, ['controller' => 'Atendentes', 'action' => 'view', $funcionario->atendente->id]) : $this->Html->link('Não. Torná-lo atendente?', ['controller' => 'Atendentes', 'action' => 'add', $funcionario->id]) ?></td>
    </tr>
    <tr>
      <th scope="row">Técnico Matrícula</th>
      <td><?= $funcionario->has('tecnico') ? $this->Html->link('TEC'.$funcionario->id, ['controller' => 'Tecnicos', 'action' => 'view', $funcionario->tecnico->id]) : $this->Html->link('Não. Torná-lo Técnico?', ['controller' => 'Tecnicos', 'action' => 'add', $funcionario->id]) ?></td>
    </tr>
    <tr>
      <th scope="row">Data de Admissão</th>
      <td><?= $funcionario->data_admissao?></td>
    </tr>
    <tr>
      <th scope="row">Data de Desligamento</th>
      <td><?= $funcionario->data_desligamento?></td>
    </tr>
  </tbody>
</table>
</div>

