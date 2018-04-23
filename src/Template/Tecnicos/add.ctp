<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Peca $peca
 */
?>

<div class="d-flex">
  <div class="mr-auto p-2"><h1> <?= $funcionario->nome ?> </h1></div>
  <div class="p-2"><a href="<?= $this->Url->Build(['controller'=>'pecas', 'action'=>"index"]) ?>" class="btn btn-secondary active" role="button" aria-pressed="true">Voltar</a></div>
</div>

<?= $this->Form->create($tecnico) ?>
<div class="form-group">
    <label for="marca-id">Setor</label>
    <?= $this->Form->select('setor_id', $setores,['id'=>'marca-id', 'class'=>'form-control']) ?>
    <small id="emailHelp" class="form-text text-muted"></small>
</div>
<div class="form-group">
    <label for="valor-id">Função</label>
    <?= $this->Form->text('funcao', ['id'=>'valor-id', 'class'=>'form-control']) ?>
    <small id="emailHelp" class="form-text text-muted"></small>
</div>

<div class="form-group">
  <?= $this->Form->button(__('Salvar'), ['class'=>'btn btn-primary']) ?>
  </div>
<?= $this->Form->end() ?>

