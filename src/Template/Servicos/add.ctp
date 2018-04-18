<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Funcionario $funcionario
 */
?>
<div class="d-flex">
  <div class="mr-auto p-2"><h1> Cadastrar Serviço </h1></div>
  <div class="p-2"><a href="<?= $this->Url->Build(['controller'=>'servicos', 'action'=>"index"]) ?>" class="btn btn-success active" role="button" aria-pressed="true">Voltar</a></div>
</div>

<?= $this->Form->create($servico) ?>
<div class="form-group">
    <label for="descricao-id">Descrição</label>
    <?= $this->Form->textarea('descricao', ['id'=>'descricao-id', 'class'=>'form-control']) ?>
    <small id="emailHelp" class="form-text text-muted"></small>
</div>
<div class="form-group">
    <label for="setor-id">Setor</label>
    <?= $this->Form->select('setor_id', $setores, ['id'=>'setor-id', 'class'=>'form-control']) ?>
    <small id="emailHelp" class="form-text text-muted"></small>
</div>
<div class="form-group">
    <label for="horas-id">Horas Duração Serviço</label>
    <?= $this->Form->text('horas', ['id'=>'horas-id', 'class'=>'form-control']) ?>
    <small id="emailHelp" class="form-text text-muted"></small>
</div>

<div class="form-group">
  <?= $this->Form->button(__('Salvar'), ['class'=>'btn btn-primary']) ?>
  </div>
<?= $this->Form->end() ?>
