<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Funcionario $funcionario
 */
?>
<div class="d-flex">
  <div class="mr-auto p-2"><h1> Cadastrar Setor </h1></div>
  <div class="p-2"><a href="<?= $this->Url->Build(['controller'=>'setores', 'action'=>"index"]) ?>" class="btn btn-success active" role="button" aria-pressed="true">Voltar</a></div>
</div>

<?= $this->Form->create($setor) ?>
<div class="form-group">
    <label for="nome-id">Nome</label>
    <?= $this->Form->text('nome', ['id'=>'nome-id', 'class'=>'form-control']) ?>
    <small id="emailHelp" class="form-text text-muted"></small>
</div>
<div class="form-group">
    <label for="valor-id">Valor Hora Trabalhada</label>
    <?= $this->Form->text('valor_hora', ['id'=>'valor-id', 'class'=>'form-control']) ?>
    <small id="emailHelp" class="form-text text-muted"></small>
</div>

<div class="form-group">
  <?= $this->Form->button(__('Salvar'), ['class'=>'btn btn-primary']) ?>
  </div>
<?= $this->Form->end() ?>
