<div class="d-flex">
  <div class="mr-auto p-2"><h1>Faturamento</h1></div>
  <div class="p-2"><a href="<?= $this->Url->Build(['controller'=>'ordensDeServico', 'action'=>"dashboard"]) ?>" class="btn btn-secondary btn-lg active" role="button" aria-pressed="true">Ordens de Serviço</a></div>
</div>

<h2 class="display-3">OS<?= $ordemDeServico->id ?></h2>

<div class="table-responsive">
<table class="table table-striped">
  <tbody>
    <tr>
      <th scope="row">Cliente</th>
      <td><?= $ordemDeServico->has('cliente') ? $this->Html->link(h($ordemDeServico->cliente->nome), ['controller' => 'Clientes', 'action' => 'view', $ordemDeServico->cliente->id]) : '' ?></td>
    </tr>
    <tr>
      <th scope="row">Carro</th>
      <td><?= $ordemDeServico->has('cliente') ? $this->Html->link(h(h('(' .$ordemDeServico->carro->placa . ')' . $ordemDeServico->carro->marca . ' ' . $ordemDeServico->carro->modelo)), ['controller' => 'carros', 'action' => 'view', $ordemDeServico->carro->id]) : '' ?></td>
    </tr>
    <tr>
      <th scope="row">Ordem de Servico</th>
      <td><?= $this->Html->link(h('OS'.$ordemDeServico->id), ['controller' => 'ordensDeServico', 'action' => 'view', $ordemDeServico->id]) ?></td>
    </tr>
    <tr>
      <th scope="row">Situação</th>
      <td><?= h($ordemDeServico->estado) ?></td>
    </tr>
    <tr>
      <th scope="row">Observações</th>
      <td><?= $this->Text->autoParagraph(h($ordemDeServico->obs)); ?></td>
    </tr>
    <tr>
      <th scope="row">Detalhes</th>
      <td>
        <table>
            <tr>
                <th>Item</th>
                <th>Valor</th>
            </tr>
            <tr>
                <td>Peças</td>
                <td><?= h($valores['subtotal_pecas']) ?></td>
            </tr>
            <tr>
                <td>Serviços</td>
                <td><?= h($valores['subtotal_servicos']) ?></td>
            </tr>
            <tr>
                <td>Subtotal</td>
                <td><?= h($valores['subtotal']) ?></td>
            </tr>
            <tr>
                <td>Desconto</td>
                <td><?= h($valores['valor_desconto'].' (' . $valores['percentual_desconto'] . '%)') ?></td>
            </tr>
            <tr>
                <th>Total a Pagar</th>
                <th><?= h($valores['total']) ?></th>
            </tr>
        </table>
      </td>
    </tr>
  </tbody>
</table>
</div>
<h3>Informações de Pagamento</h3>
<?= $this->Form->create($faturamento) ?>
  <div class="form-group">
    <label for="placa-id">Forma de Pagamento</label>
    <?= $this->Form->select('forma_pagamento', ['debito'=>'DÉBITO', 'credito'=>'CRÉDITO', 'dinheiro'=>'DINHEIRO'],['id'=>'placa-id', 'class'=>'form-control']) ?>
    <small id="emailHelp" class="form-text text-muted">Obrigatório</small>
  </div>
  <?= $this->Form->hidden('desconto', ['id'=>'desconto-id', 'class'=>'form-control', 'value'=>$valores['valor_desconto']]) ?>
  <div class="form-group">
  <?= $this->Form->button(__('Pagar'), ['class'=>'btn btn-primary']) ?>
  </div>
<?= $this->Form->end() ?>