<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Faturamento[]|\Cake\Collection\CollectionInterface $faturamento
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Faturamento'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Ordens De Servico'), ['controller' => 'OrdensDeServico', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Ordens De Servico'), ['controller' => 'OrdensDeServico', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="faturamento index large-9 medium-8 columns content">
    <h3><?= __('Faturamento') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ordem_de_servico_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('status') ?></th>
                <th scope="col"><?= $this->Paginator->sort('data_pagamento') ?></th>
                <th scope="col"><?= $this->Paginator->sort('forma_pagamento') ?></th>
                <th scope="col"><?= $this->Paginator->sort('desconto') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($faturamento as $faturamento): ?>
            <tr>
                <td><?= $this->Number->format($faturamento->id) ?></td>
                <td><?= $faturamento->has('ordens_de_servico') ? $this->Html->link($faturamento->ordens_de_servico->placa, ['controller' => 'OrdensDeServico', 'action' => 'view', $faturamento->ordens_de_servico->id]) : '' ?></td>
                <td><?= h($faturamento->status) ?></td>
                <td><?= h($faturamento->data_pagamento) ?></td>
                <td><?= h($faturamento->forma_pagamento) ?></td>
                <td><?= $this->Number->format($faturamento->desconto) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $faturamento->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $faturamento->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $faturamento->id], ['confirm' => __('Are you sure you want to delete # {0}?', $faturamento->id)]) ?>
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
