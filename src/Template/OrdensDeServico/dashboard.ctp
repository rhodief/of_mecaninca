<div class="d-flex">
  <div class="mr-auto p-2"><h1>Ordens de Serviços</h1></div>
  <div class="p-2"><a href="<?= $this->Url->Build(['controller'=>'clientes', 'action'=>"index"]) ?>" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Clientes</a></div>
</div>

<div class="d-flex">
  <div class="mr-auto p-2"><h3>Finalizadas</h3></div>
  <div class="p-2"><a href="<?= $this->Url->Build(['controller'=>'ordens_de_servico', 'action'=>"index"]) ?>" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Ordens de Serviço</a></div>
</div>
<?php if(!empty($os_finalizadas)){?>
<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">Situação</th>
      <th scope="col">Cliente</th>
      <th scope="col">Carro</th>
      <th scope="col">Data</th>
      <th scope="col">Ações</th>
    </tr>
  </thead>
  <tbody>
      <?php foreach ($os_finalizadas as $os):?>
    <tr>
      <th scope="row"><span class="badge badge-pill badge-warning"><?= $os->estado ?></span></th>
      <td> <?= $os->cliente->nome ?> </td>
      <td><?= $os->carro->marca . ' ' . $os->carro->modelo . ' ' .  $os->carro->placa ?> </td>
      <td><?= $os->data_finalizacao ?></td>
      <td><a href="<?= $this->Url->Build(['controller'=>'ordens_de_servico', 'action'=>"view", $os->id]) ?>" class="btn btn-primary" role="button" aria-pressed="true">Detalhes</a></td>
    </tr>
<?php endforeach; ?>
  </tbody>
</table>
<?php } ?>