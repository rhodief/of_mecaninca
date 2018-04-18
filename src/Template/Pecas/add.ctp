<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Peca $peca
 */
?>

<div class="d-flex">
  <div class="mr-auto p-2"><h1> Cadastar Peças </h1></div>
  <div class="p-2"><a href="<?= $this->Url->Build(['controller'=>'pecas', 'action'=>"index"]) ?>" class="btn btn-secondary active" role="button" aria-pressed="true">Voltar</a></div>
</div>

<?= $this->Form->create($peca) ?>
<div class="form-group">
    <label for="desc-id">Descrição</label>
    <?= $this->Form->textarea('descricao', ['id'=>'desc-id', 'class'=>'form-control']) ?>
    <small id="emailHelp" class="form-text text-muted"></small>
</div>
<div class="form-group">
    <label for="marca-id">Marca</label>
    <?= $this->Form->text('marca', ['id'=>'marca-id', 'class'=>'form-control']) ?>
    <small id="emailHelp" class="form-text text-muted"></small>
</div>
<div class="form-group">
    <label for="valor-id">Valor</label>
    <?= $this->Form->text('valor', ['id'=>'valor-id', 'class'=>'form-control']) ?>
    <small id="emailHelp" class="form-text text-muted"></small>
</div>

<div class="form-group">
  <?= $this->Form->button(__('Salvar'), ['class'=>'btn btn-primary']) ?>
  </div>
<?= $this->Form->end() ?>

