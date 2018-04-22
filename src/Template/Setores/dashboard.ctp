<?php //debug($servicos->toArray()) ?>
<div class="d-flex">
  <div class="mr-auto p-2"><h1><?= $setor->nome ?></h1></div>
  <div class="p-2"><a href="<?= $this->Url->Build(['controller'=>'clientes', 'action'=>"index"]) ?>" class="btn btn-secondary btn-lg active" role="button" aria-pressed="true">Voltar</a></div>
</div>

<div class="d-flex">
  <div class="mr-auto p-2"><h2>Serviços</h2></div>
  <div class="p-2"><a href="<?= $this->Url->Build(['controller'=>'ordens_de_servico', 'action'=>"add"]) ?>" class="btn btn-success btn-lg active" role="button" aria-pressed="true">Todos</a></div>
</div>

<?php if(!empty($servicos)){?>
<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">Situação</th>
      <th scope="col">Servico</th>
      <th scope="col">Carro</th>
      <th scope="col">Ordem de Serviço</th>
      <th scope="col">Ações</th>
    </tr>
  </thead>
  <tbody>
      <?php foreach ($servicos as $servico):?>
    <tr>
      <th scope="row"><span class="badge badge-pill badge-warning"><?= $servico->estado ?></span></th>
      <td> <?= $servico->servico->descricao ?> </td>
      <td><?= $servico->ordens_de_servico->carro->marca . ' ' . $servico->ordens_de_servico->carro->modelo . ' ' .  $servico->ordens_de_servico->carro->placa ?></td>
      <td>OS<?= $servico->ordens_de_servico->id ?></td>
      <td>
      <?php 
        if($servico->situacao == 2){
          echo $this->Form->postLink(__('Finalizar'), ['action' => 'finalizar', $servico->id], ['confirm' => __('Deseja Finalizar o Serviço {0} para o Veículo placa {1}?', [$servico->servico->descricao, $servico->ordens_de_servico->carro->placa]), 'class'=>'btn btn-danger']);
        }elseif($servico->situacao == 1){
          echo $this->Form->postLink(__('Executar'), ['action' => 'executar', $servico->id], ['confirm' => __('Deseja Executar o Serviço {0} para o Veículo placa {1}?', [$servico->servico->descricao, $servico->ordens_de_servico->carro->placa]), 'class'=>'btn btn-success']);
        }
      
      ?>
      </td>
    </tr>
<?php endforeach; ?>
  </tbody>
</table>
<?php } ?>