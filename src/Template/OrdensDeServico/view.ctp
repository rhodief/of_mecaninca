<?php //debug($ordensDeServico) ?>

<script>

    $(document).ready(function(){
        
        $('#s-servico').keyup(function(ev){
            sendDelay(ev.target.value, '../../servicos/sservicos', 500, function(data){
                $('#s-servico-result').html(data);
            });
        }); 
        
        $('#s-peca').keyup(function(ev){
            sendDelay(ev.target.value, '../../pecas/specas', 500, function(data){
                $('#s-peca-result').html(data);
            });
        }); 
    });
    

</script>


<div class="d-flex">
  <div class="mr-auto p-2"><h1>Detalhe da Ordem de Serviço</h1></div>
  <div class="p-2"><a href="<?= $this->Url->Build(['controller'=>'OrdensDeServico', 'action'=>"index"]) ?>" class="btn btn-secondary btn-lg active" role="button" aria-pressed="true">Voltar</a></div>
</div>

<h2 class="display-3">OS<?= $ordensDeServico->id ?> <span><?= $ordensDeServico->has('faturamento') ? $this->Html->link($ordensDeServico->faturamento->status, ['controller' => 'faturamento', 'action' => 'view', $ordensDeServico->faturamento->id]) : '' ?></span></h2>

<div class="table-responsive">
<table class="table table-striped">
  <tbody>
    <tr>
      <th scope="row">Cliente</th>
      <td><?= $ordensDeServico->has('cliente') ? $this->Html->link($ordensDeServico->cliente->nome, ['controller' => 'Clientes', 'action' => 'view', $ordensDeServico->cliente->id]) : '' ?></td>
    </tr>
    <tr>
      <th scope="row">Carro</th>
      <td><?= $ordensDeServico->has('carro') ? $this->Html->link($ordensDeServico->carro->placa . ' - ' . $ordensDeServico->carro->marca . ' ' . $ordensDeServico->carro->modelo, ['controller' => 'Carros', 'action' => 'view', $ordensDeServico->carro->id]) : '' ?></td>
    </tr>
    <tr>
      <th scope="row">Data de Abertura</th>
      <td><?= h($ordensDeServico->data_abertura) ?></td>
    </tr>
    <?php if(!empty($ordensDeServico->data_cancelamento)){?>
    <tr>
      <th scope="row">Data de Cancelamento</th>
      <td><?= h($ordensDeServico->data_cancelamento) ?></td>
    </tr>
    <?php }?>
    <?php if(!empty($ordensDeServico->data_finalizacao)){?>
    <tr>
      <th scope="row">Data de Finalização</th>
      <td><?= h($ordensDeServico->data_finalizacao) ?></td>
    </tr>
    <?php }?>
    <tr>
      <th scope="row">Situação</th>
      <td><?= h($ordensDeServico->estado) ?></td>
    </tr>
    <tr>
      <th scope="row">Observações</th>
      <td><?= $this->Text->autoParagraph(h($ordensDeServico->obs)); ?></td>
    </tr>
  </tbody>
</table>
</div>

<?php 
$total = 0;
$totalPecas = 0;
?>

<hr>

<div class="d-flex">
  <div class="mr-auto p-2"><h1>Serviços</h1></div>
  <div class="p-2"><a href="<?= $this->Url->Build(['controller'=>'servicos', 'action'=>"index"]) ?>" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Todos os Serviços</a></div>
</div>
<?php if($ordensDeServico->situacao == 2){  ?>
<?= $this->Form->create(null, ['class'=>'form-row']) ?>
<div class="form-group col-md-8">
        <?= $this->Form->text('s_servicos', ['id'=>'s-servico', 'class'=>'form-control form-control-lg', 'placeholder'=>'Pesquisa de Serviços']); ?>
        <?= $this->Form->hidden('f-servico', ['id'=>"f-servico"]); ?>
        <?= $this->Form->hidden('tipo', ['value'=>"servico"]); ?>
        <div id="s-servico-result"></div>
</div>
<div class="form-group col-md-2">
        <?= $this->Form->text('quantidade', ['id'=>'id-quantidade', 'class'=>'form-control form-control-lg', 'placeholder'=>'Quantidade']); ?>
</div>
<div class="form-group col-md-1">
  <?= $this->Form->button(__('Salvar'), ['class'=>'btn btn-primary']) ?>
  </div>
<?= $this->Form->end() ?>
<?php }?>

<?php if(!empty($ordensDeServico->servicos)){?>
<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">Descrição</th>
      <th scope="col">Setor</th>
      <th scope="col">Qnt. Horas</th>
      <th scope="col">Valor Hora</th>
      <th scope="col">Total Unit</th>
      <th scope="col">Status</th>
      <th scope="col">Ações</th>
      
    </tr>
  </thead>
  <tbody>
      <?php 
      $total = 0;
      foreach ($ordensDeServico->servicos as $item):
        $sub = (int) $item->_joinData->quantidade *  (int) $item->setor->valor_hora;
        $total += $sub
      ?>
    <tr>
      <th scope="row"><?= $item->descricao ?></th>
      <td> <?= $item->setor->nome ?> </td>
      <td> <?= $item->_joinData->quantidade ?> </td>
      <td> <?= $item->setor->valor_hora ?> </td>
      <td> <?= $sub ?> </td>
      <td><span class="badge badge-pill badge-warning"><?= $item->_joinData->estado ?></span></td>
      <td><a href="<?= $this->Url->Build(['controller'=>'servicos', 'action'=>"view", $item->_joinData->id]) ?>" class="btn btn-primary" role="button" aria-pressed="true">Detalhes</a></td>
    </tr>
<?php endforeach; ?>
    <tr>
        <th scope="row">Subtotal</th>
        <td>  </td>
        <td>  </td>
        <td> </td>
        <td> <?= $total ?> </td>
        <td></td>
        <td></td>
    </tr>
  </tbody>
</table>
<?php } ?>


<hr>

<div class="d-flex">
  <div class="mr-auto p-2"><h1>Peças</h1></div>
  <div class="p-2"><a href="<?= $this->Url->Build(['controller'=>'pecas', 'action'=>"index"]) ?>" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Todos as Peças</a></div>
</div>

<?php if($ordensDeServico->situacao == 2){  ?>
<?= $this->Form->create(null, ['class'=>'form-row']) ?>
<div class="form-group col-md-8">
        <?= $this->Form->text('s_peca', ['id'=>'s-peca', 'class'=>'form-control form-control-lg', 'placeholder'=>'Pesquisa de Serviços']); ?>
        <?= $this->Form->hidden('f-peca', ['id'=>"f-peca"]); ?>
        <?= $this->Form->hidden('tipo', ['value'=>"peca"]); ?>
        <div id="s-peca-result"></div>
</div>
<div class="form-group col-md-2">
        <?= $this->Form->text('quantidade', ['id'=>'id-quantidade', 'class'=>'form-control form-control-lg', 'placeholder'=>'Quantidade']); ?>
</div>
<div class="form-group col-md-1">
  <?= $this->Form->button(__('Salvar'), ['class'=>'btn btn-primary']) ?>
  </div>
<?= $this->Form->end() ?>
<?php }?>


<?php if(!empty($ordensDeServico->pecas)){?>
<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">Descrição</th>
      <th scope="col">Quantidade</th>
      <th scope="col">Valor</th>
      <th scope="col">Total Unit</th>
      <th scope="col">Status</th>
      <th scope="col">Ações</th>
      
    </tr>
  </thead>
  <tbody>
      <?php 
      $totalPecas = 0;
      foreach ($ordensDeServico->pecas as $peca):
      $subPecas = (int) $peca->valor * (int) $peca->_joinData->quantidade;
      $totalPecas += $subPecas;
      ?>
    <tr>
      <th scope="row"><?= $peca->descricao . ' (' . $peca->marca . ')' ?></th>
      <td> <?= $peca->_joinData->quantidade ?> </td>
      <td> <?= $peca->valor ?> </td>
      <td> <?= $subPecas ?> </td>
      <td><span class="badge badge-pill badge-warning">Finalizado<?= $peca->status ?></span></td>
      <td><a href="<?= $this->Url->Build(['controller'=>'pecas', 'action'=>"view", $peca->_joinData->id]) ?>" class="btn btn-primary" role="button" aria-pressed="true">Detalhes</a></td>
    </tr>
<?php endforeach; ?>
    <tr>
      <th scope="row">SubTotal</th>
      <td>  </td>
      <td> </td>
      <td> <?= $totalPecas ?> </td>
      <td></td>
      <td></td>
    </tr>
  </tbody>
</table>
<?php } ?>


<div class="d-flex">
  <div class="mr-auto p-2">
  <?php if($ordensDeServico->situacao == 1){  ?>
    <?= $this->Form->postLink(__('Fechar OS'), ['action' => 'aceite', $ordensDeServico->id], ['confirm' => __('Deseja Fechar a OS{0}?', $ordensDeServico->id), 'class'=>'btn btn-danger']) ?>
    </div>
    <div class="p-2"><h1><span class="badge badge-pill badge-success">Total: <?= $total + $totalPecas  ?></span></h1></div>
  <?php }  ?>

  <?php if($ordensDeServico->situacao == 3){  ?>
    <a href="<?= $this->Url->Build(['controller'=>'faturamento', 'action'=>"add", $ordensDeServico->id]) ?>" class="btn btn-success" role="button" aria-pressed="true">Pagamento</a>
    </div>
    <div class="p-2"><h1><span class="badge badge-pill badge-success">Total: <?= $total + $totalPecas  ?></span></h1></div>
  <?php }  ?>
</div>



