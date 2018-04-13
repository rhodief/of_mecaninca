<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ItensDePeca[]|\Cake\Collection\CollectionInterface $itensDePeca
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Itens De Peca'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Pecas'), ['controller' => 'Pecas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Peca'), ['controller' => 'Pecas', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="itensDePeca index large-9 medium-8 columns content">
    <h3><?= __('Itens De Peca') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ordem_servico_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('peca_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('quatidade') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($itensDePeca as $itensDePeca): ?>
            <tr>
                <td><?= $this->Number->format($itensDePeca->id) ?></td>
                <td><?= $this->Number->format($itensDePeca->ordem_servico_id) ?></td>
                <td><?= $itensDePeca->has('peca') ? $this->Html->link($itensDePeca->peca->id, ['controller' => 'Pecas', 'action' => 'view', $itensDePeca->peca->id]) : '' ?></td>
                <td><?= $this->Number->format($itensDePeca->quatidade) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $itensDePeca->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $itensDePeca->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $itensDePeca->id], ['confirm' => __('Are you sure you want to delete # {0}?', $itensDePeca->id)]) ?>
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
