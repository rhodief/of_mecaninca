<div class="d-flex">
  <div class="mr-auto p-2"><h1>Cadastrar Veículo</h1></div>
  <div class="p-2"><a href="<?= $this->Url->Build(['controller'=>'clientes', 'action'=>"index"]) ?>" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Voltar</a></div>
</div>
<?= $this->Form->create($carro) ?>
  <div class="form-group">
    <label for="placa-id">Placa</label>
    <?= $this->Form->text('placa', ['id'=>'placa-id', 'class'=>'form-control']) ?>
    <small id="emailHelp" class="form-text text-muted">Obrigatório</small>
  </div>
 <div class="form-group">
    <label for="nome-id">Marca</label>
    <?= $this->Form->text('marca', ['id'=>'marca-id', 'class'=>'form-control']) ?>
    <small id="emailHelp" class="form-text text-muted"></small>
  </div>
  <div class="form-group">
    <label for="nome-id">Modelo</label>
    <?= $this->Form->text('modelo', ['id'=>'modelo-id', 'class'=>'form-control']) ?>
    <small id="emailHelp" class="form-text text-muted"></small>
  </div>
  <div class="form-group">
    <label for="nome-id">Cor</label>
    <?= $this->Form->text('cor', ['id'=>'cor-id', 'class'=>'form-control']) ?>
    <small id="emailHelp" class="form-text text-muted"></small>
  </div>
  <div class="form-group">
  <?= $this->Form->button(__('Salvar'), ['class'=>'btn btn-primary']) ?>
  </div>
<?= $this->Form->end() ?>