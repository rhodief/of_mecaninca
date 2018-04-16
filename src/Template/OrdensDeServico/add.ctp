<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\OrdensDeServico $ordensDeServico
 */
//debug($carros->toArray());
?>
<div class="d-flex">
  <div class="mr-auto p-2"><h1>Nova Ordem de Serviço</h1></div>
  <div class="p-2"><a href="<?= $this->Url->Build(['controller'=>'clientes', 'action'=>"view", $cliente->id]) ?>" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Detalhes Cliente</a></div>
</div>

<h2 class="display-3"><?= $cliente->nome ?></h2>
<?php if(!empty($cliente->pessoas_juridica)){ ?>
<h2 class="display-5">CNPJ: <?= $cliente->pessoas_juridica->cnpj ?></h2>
<?php }else{ ?>
    <h2 class="display-5">CPF: <?= $cliente->pessoas_fisica->cpf ?></h2>
<?php } ?>



<div class="d-flex">
  <div class="mr-auto p-2"><h1>Veículos</h1></div>
  <div class="p-2"><a href="<?= $this->Url->Build(['controller'=>'carros', 'action'=>"add"]) ?>" class="btn btn-success btn-lg active" role="button" aria-pressed="true">Cadastrar Veículo</a></div>
</div>
<?php if(!empty($carros)){?>
<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Placa</th>
      <th scope="col">Marca</th>
      <th scope="col">Modelo</th>
      <th scope="col">Ações</th>
    </tr>
  </thead>
  <tbody>
      <?php foreach ($carros as $os):?>
    <tr>
      <th scope="row"><input type="radio"></th>
      <td> <?= $os->carro->placa ?> </td>
      <td><?= $os->carro->marca ?></td>
      <td><?= $os->carro->modelo ?></td>
      <td><a href="<?= $this->Url->Build(['controller'=>'carros', 'action'=>"view", $os->carro->id]) ?>" class="btn btn-primary" role="button" aria-pressed="true">Detalhes</a></td>
    </tr>
<?php endforeach; ?>
  </tbody>
</table>
<?php } ?>
