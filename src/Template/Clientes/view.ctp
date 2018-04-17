<?php //debug($cliente) ?>
<div class="d-flex">
  <div class="mr-auto p-2"><h1>Cliente</h1></div>
  <div class="p-2"><a href="<?= $this->Url->Build(['controller'=>'clientes', 'action'=>"index"]) ?>" class="btn btn-secondary btn-lg active" role="button" aria-pressed="true">Voltar</a></div>
</div>

<h2 class="display-3"><?= $cliente->nome ?></h2>

<div class="table-responsive">
<table class="table table-striped">
  <tbody>
    <?php 
        if(!empty($cliente->pessoas_juridica)){
    ?>
    <tr>
      <th scope="row">CNPJ</th>
      <td><?= $cliente->pessoas_juridica->cnpj ?></td>
    </tr>
    <?php 
        }else{
    ?>
        <tr>
        <th scope="row">CPF</th>
        <td><?= $cliente->pessoas_fisica->cpf ?></td>
        </tr>
    <?php 
        }
    ?>
    <tr>
      <th scope="row">E-mail</th>
      <td><?= $cliente->email ?></td>
    </tr>
    <tr>
      <th scope="row">Telefone Celular</th>
      <td><?= $cliente->telefone_celular ?></td>
    </tr>
    <tr>
      <th scope="row">Telefone Fixo</th>
      <td><?= $cliente->telefone_fixo ?></td>
    </tr>
    <tr>
      <th scope="row">Endereço</th>
      <td><?= $cliente->endereco . ', ' . $cliente->numero ?></td>
    </tr>
    <tr>
      <th scope="row">Cidade</th>
      <td><?= $cliente->cidade . ', ' . $cliente->uf?></td>
    </tr>
    <tr>
      <th scope="row">CEP</th>
      <td><?= $cliente->cep?></td>
    </tr>
  </tbody>
</table>
</div>

<div class="d-flex">
  <div class="mr-auto p-2"><h1>Ordens de Serviço</h1></div>
  <div class="p-2"><a href="<?= $this->Url->Build(['controller'=>'ordens_de_servico', 'action'=>"add", '?'=> ['cliente'=> $cliente->id]]) ?>" class="btn btn-success btn-lg active" role="button" aria-pressed="true">Criar OS</a></div>
</div>
<?php if(!empty($cliente->ordens_de_servico)){?>
<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">Situação</th>
      <th scope="col">Carro</th>
      <th scope="col">Detalhes</th>
      <th scope="col">Data</th>
      <th scope="col">Ações</th>
    </tr>
  </thead>
  <tbody>
      <?php foreach ($cliente->ordens_de_servico as $os):?>
    <tr>
      <th scope="row"><span class="badge badge-pill badge-warning"><?= $os->situacao ?></span></th>
      <td> <?= $os->carro->marca . ' ' . $os->carro->modelo . ' ' .  $os->carro->placa ?> </td>
      <td><?= $os->obs ?></td>
      <td><?= $os->data_abertura ?></td>
      <td><a href="<?= $this->Url->Build(['controller'=>'ordens_de_servico', 'action'=>"view", $os->id]) ?>" class="btn btn-primary" role="button" aria-pressed="true">Detalhes</a></td>
    </tr>
<?php endforeach; ?>
  </tbody>
</table>
<?php } ?>
