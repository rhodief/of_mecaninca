<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\OrdensDeServico $ordensDeServico
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Ordens De Servico'), ['action' => 'edit', $ordensDeServico->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Ordens De Servico'), ['action' => 'delete', $ordensDeServico->id], ['confirm' => __('Are you sure you want to delete # {0}?', $ordensDeServico->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Ordens De Servico'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Ordens De Servico'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Clientes'), ['controller' => 'Clientes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Cliente'), ['controller' => 'Clientes', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Carros'), ['controller' => 'Carros', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Carro'), ['controller' => 'Carros', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Faturamento'), ['controller' => 'Faturamento', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Faturamento'), ['controller' => 'Faturamento', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="ordensDeServico view large-9 medium-8 columns content">
    <h3><?= h($ordensDeServico->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Situacao') ?></th>
            <td><?= h($ordensDeServico->situacao) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cliente') ?></th>
            <td><?= $ordensDeServico->has('cliente') ? $this->Html->link($ordensDeServico->cliente->nome, ['controller' => 'Clientes', 'action' => 'view', $ordensDeServico->cliente->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Carro') ?></th>
            <td><?= $ordensDeServico->has('carro') ? $this->Html->link($ordensDeServico->carro->placa, ['controller' => 'Carros', 'action' => 'view', $ordensDeServico->carro->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($ordensDeServico->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Data Abertura') ?></th>
            <td><?= h($ordensDeServico->data_abertura) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Data Alteracao') ?></th>
            <td><?= h($ordensDeServico->data_alteracao) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Data Cancelamento') ?></th>
            <td><?= h($ordensDeServico->data_cancelamento) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Data Finalizacao') ?></th>
            <td><?= h($ordensDeServico->data_finalizacao) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($ordensDeServico->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($ordensDeServico->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Obs') ?></h4>
        <?= $this->Text->autoParagraph(h($ordensDeServico->obs)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Faturamento') ?></h4>
        <?php if (!empty($ordensDeServico->faturamento)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Ordem De Servico Id') ?></th>
                <th scope="col"><?= __('Data Pagamento') ?></th>
                <th scope="col"><?= __('Forma Pagamento') ?></th>
                <th scope="col"><?= __('Desconto') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($ordensDeServico->faturamento as $faturamento): ?>
            <tr>
                <td><?= h($faturamento->id) ?></td>
                <td><?= h($faturamento->ordem_de_servico_id) ?></td>
                <td><?= h($faturamento->data_pagamento) ?></td>
                <td><?= h($faturamento->forma_pagamento) ?></td>
                <td><?= h($faturamento->desconto) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Faturamento', 'action' => 'view', $faturamento->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Faturamento', 'action' => 'edit', $faturamento->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Faturamento', 'action' => 'delete', $faturamento->id], ['confirm' => __('Are you sure you want to delete # {0}?', $faturamento->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
