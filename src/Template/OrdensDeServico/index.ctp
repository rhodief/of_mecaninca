<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\OrdensDeServico[]|\Cake\Collection\CollectionInterface $ordensDeServico
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Ordens De Servico'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Clientes'), ['controller' => 'Clientes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Cliente'), ['controller' => 'Clientes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Carros'), ['controller' => 'Carros', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Carro'), ['controller' => 'Carros', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Faturamento'), ['controller' => 'Faturamento', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Faturamento'), ['controller' => 'Faturamento', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="ordensDeServico index large-9 medium-8 columns content">
    <h3><?= __('Ordens De Servico') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('data_abertura') ?></th>
                <th scope="col"><?= $this->Paginator->sort('data_alteracao') ?></th>
                <th scope="col"><?= $this->Paginator->sort('data_cancelamento') ?></th>
                <th scope="col"><?= $this->Paginator->sort('data_finalizacao') ?></th>
                <th scope="col"><?= $this->Paginator->sort('situacao') ?></th>
                <th scope="col"><?= $this->Paginator->sort('cliente_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('carro_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($ordensDeServico as $ordensDeServico): ?>
            <tr>
                <td><?= $this->Number->format($ordensDeServico->id) ?></td>
                <td><?= h($ordensDeServico->data_abertura) ?></td>
                <td><?= h($ordensDeServico->data_alteracao) ?></td>
                <td><?= h($ordensDeServico->data_cancelamento) ?></td>
                <td><?= h($ordensDeServico->data_finalizacao) ?></td>
                <td><?= h($ordensDeServico->situacao) ?></td>
                <td><?= $ordensDeServico->has('cliente') ? $this->Html->link($ordensDeServico->cliente->nome, ['controller' => 'Clientes', 'action' => 'view', $ordensDeServico->cliente->id]) : '' ?></td>
                <td><?= $ordensDeServico->has('carro') ? $this->Html->link($ordensDeServico->carro->placa, ['controller' => 'Carros', 'action' => 'view', $ordensDeServico->carro->id]) : '' ?></td>
                <td><?= h($ordensDeServico->created) ?></td>
                <td><?= h($ordensDeServico->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $ordensDeServico->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $ordensDeServico->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $ordensDeServico->id], ['confirm' => __('Are you sure you want to delete # {0}?', $ordensDeServico->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
