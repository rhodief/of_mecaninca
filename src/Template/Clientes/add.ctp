<script>
  $(document).ready(function(){
    var PFFields = `
    <div class="form-group">
    <label for="nome-id">Data Nascimento</label>
    <?= $this->Form->text('telefone_fixo', ['id'=>'data-nasc-id', 'class'=>'form-control']) ?>
    <small id="emailHelp" class="form-text text-muted"></small>
  </div>
    `;
    var PJFields = `
    <div class="form-group">
    <label for="nome-id">Responsável</label>
    <?= $this->Form->text('responsavel', ['id'=>'responsavel-id', 'class'=>'form-control']) ?>
    <small id="emailHelp" class="form-text text-muted">Obrigatório</small>
  </div>
  <div class="form-group">
    <label for="nome-id">CPF Responsável</label>
    <?= $this->Form->text('cpf_responsavel', ['id'=>'cpf-responsavel-id', 'class'=>'form-control']) ?>
    <small id="emailHelp" class="form-text text-muted">Obrigatório</small>
  </div>
    `;
    selectFields();
    $('#tipo-pessoa-id').change(function(val){
      selectFields();
    });

    function selectFields(){
      var tipo = $('#tipo-pessoa-id').val();
      if(tipo == 'pj'){
        _showPJFields();
      }else{
        _showPFFields();
      }
    }

    function _showPFFields(){
      $('#pessoa-result').html(PFFields);
    }

    function _showPJFields(){
      $('#pessoa-result').html(PJFields);
    }
  })
</script>

<div class="d-flex">
  <div class="mr-auto p-2"><h1>Cadastrar Cliente</h1></div>
  <div class="p-2"><a href="<?= $this->Url->Build(['controller'=>'clientes', 'action'=>"index"]) ?>" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Voltar</a></div>
</div>
<?= $this->Form->create($cliente) ?>
  <div class="form-group">
    <label for="nome-id">Nome</label>
    <?= $this->Form->text('nome', ['id'=>'nome-id', 'class'=>'form-control']) ?>
    <small id="emailHelp" class="form-text text-muted">Obrigatório</small>
  </div>
  <div class="form-group">
    <label for="nome-id">Tipo</label>
    <?= $this->Form->select('tipo_pessoa', ['pf'=>'Pessoa Física', 'pj'=>'Pessoa Jurídica'],['id'=>'tipo-pessoa-id', 'class'=>'form-control', ]) ?>
    <small id="emailHelp" class="form-text text-muted"></small>
  </div>
  
  <div class="form-group">
    <label for="nome-id">Número Pessoa</label>
    <?= $this->Form->text('numero_pessoa', ['id'=>'nome-id', 'class'=>'form-control']) ?>
    <small id="emailHelp" class="form-text text-muted"></small>
  </div>
  <div id="pessoa-result"></div>
  <div class="form-group">
    <label for="nome-id">E-mail</label>
    <?= $this->Form->text('email', ['id'=>'nome-id', 'class'=>'form-control']) ?>
    <small id="emailHelp" class="form-text text-muted"></small>
  </div>
  <div class="form-group">
    <label for="nome-id">Telefone Fixo</label>
    <?= $this->Form->text('telefone_fixo', ['id'=>'nome-id', 'class'=>'form-control']) ?>
    <small id="emailHelp" class="form-text text-muted"></small>
  </div>
  <div class="form-group">
    <label for="nome-id">Telefone Celular</label>
    <?= $this->Form->text('telefone_celular', ['id'=>'nome-id', 'class'=>'form-control']) ?>
    <small id="emailHelp" class="form-text text-muted"></small>
  </div>
  <div class="form-group">
    <label for="nome-id">Endereço</label>
    <?= $this->Form->text('endereco', ['id'=>'nome-id', 'class'=>'form-control']) ?>
    <small id="emailHelp" class="form-text text-muted"></small>
  </div>
  <div class="form-group">
    <label for="nome-id">Número</label>
    <?= $this->Form->text('numero', ['id'=>'nome-id', 'class'=>'form-control']) ?>
    <small id="emailHelp" class="form-text text-muted"></small>
  </div>
  <div class="form-group">
    <label for="nome-id">Cep</label>
    <?= $this->Form->text('cep', ['id'=>'nome-id', 'class'=>'form-control']) ?>
    <small id="emailHelp" class="form-text text-muted"></small>
  </div>
  <div class="form-group">
    <label for="nome-id">Cidade</label>
    <?= $this->Form->text('cidade', ['id'=>'nome-id', 'class'=>'form-control']) ?>
    <small id="emailHelp" class="form-text text-muted"></small>
  </div>
  <div class="form-group">
    <label for="nome-id">Unidade da Federação (UF)</label>
    <?= $this->Form->text('uf', ['id'=>'nome-id', 'class'=>'form-control']) ?>
    <small id="emailHelp" class="form-text text-muted"></small>
  </div>
  <div class="form-group">
  <?= $this->Form->button(__('Salvar'), ['class'=>'btn btn-primary']) ?>
  </div>
<?= $this->Form->end() ?>
