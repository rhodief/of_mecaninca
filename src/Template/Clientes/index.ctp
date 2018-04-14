<h1>Clientes</h1>
<?php //debug($clientes)  ?>
<?= $this->Form->create(null, ['type'=>'get']) ?>
    <div class="form-group">
        <?= $this->Form->text('s', ['class'=>'form-control form-control-lg', 'placeholder'=>'Pesquisa de Clientes', 'default'=>$s]); ?>
    </div>
    <div class="form-group">
    <?= $this->Form->button(__('Procurar'), ['class'=>'btn btn-primary']) ?>
    </div>
<?= $this->Form->end() ?>

<div class="list-group">
<?php foreach ($clientes as $cliente): ?>
  <a href="<?= $this->Url->Build(['controller'=>'clientes', 'action'=>'view', $cliente->id]) ?>" class="list-group-item list-group-item-action flex-column align-items-start">
    <div class="d-flex w-100 justify-content-between">
      <h5 class="mb-1"><?= $cliente->nome ?></h5>
      <small>Serviço Finalizado, pendente de pagamento</small>
      
    </div>
    <p class="mb-1">
        <?php 
            if($cliente->pessoas_juridica){
                echo 'CNPJ: '.$cliente->pessoas_juridica->cnpj;
            }else{
                echo 'CPF: '.$cliente->pessoas_fisica->cpf;
            }
          ?>
    </p>
    <p class="mb-1"><?= 'Email: ' . $cliente->email ?></p>
    <p class="mb-1"><?= 'Telefone Celular: ' . $cliente->telefone_celular ?></p>
    <small>Donec id elit non mi porta.</small>
  </a>
  <?php endforeach; ?>
</div>

<div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Página {{page}} de {{pages}}, mostrando {{current}} cliente(s) de um total de {{count}}')]) ?></p>
</div>
   