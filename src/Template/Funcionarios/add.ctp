<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Funcionario $funcionario
 */
?>
<div class="d-flex">
  <div class="mr-auto p-2"><h1> Cadastrar Funcionário </h1></div>
  <div class="p-2"><a href="<?= $this->Url->Build(['controller'=>'funcionarios', 'action'=>"index"]) ?>" class="btn btn-success active" role="button" aria-pressed="true">Voltar</a></div>
</div>

<?= $this->Form->create($funcionario) ?>
<div class="form-group">
    <label for="nome-id">Nome</label>
    <?= $this->Form->text('nome', ['id'=>'nome-id', 'class'=>'form-control']) ?>
    <small id="emailHelp" class="form-text text-muted"></small>
</div>
<div class="form-group">
    <label for="cpf-id">CPF</label>
    <?= $this->Form->text('cpf', ['id'=>'cpf-id', 'class'=>'form-control']) ?>
    <small id="emailHelp" class="form-text text-muted"></small>
</div>
<div class="form-group">
    <label for="data_admissao-id">Data de Admissão</label>
    <?= $this->Form->text('data_admissao', ['id'=>'data_admissao-id', 'class'=>'form-control']) ?>
    <small id="emailHelp" class="form-text text-muted"></small>
</div>
<div class="form-group">
    <label for="data-demissao-id">Data de Demissão</label>
    <?= $this->Form->text('data_demissao', ['id'=>'data-demissao-id', 'class'=>'form-control']) ?>
    <small id="emailHelp" class="form-text text-muted"></small>
</div>
<div class="form-group">
  <?= $this->Form->button(__('Salvar'), ['class'=>'btn btn-primary']) ?>
  </div>
<?= $this->Form->end() ?>