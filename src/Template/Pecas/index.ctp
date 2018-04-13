<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Peca[]|\Cake\Collection\CollectionInterface $pecas
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Peca'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Itens De Paca'), ['controller' => 'ItensDePaca', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Itens De Paca'), ['controller' => 'ItensDePaca', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="pecas index large-9 medium-8 columns content">
    <h3><?= __('Pecas') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('marca') ?></th>
                <th scope="col"><?= $this->Paginator->sort('valor') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pecas as $peca): ?>
            <tr>
                <td><?= $this->Number->format($peca->id) ?></td>
                <td><?= h($peca->marca) ?></td>
                <td><?= h($peca->valor) ?></td>
                <td><?= h($peca->created) ?></td>
                <td><?= h($peca->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $peca->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $peca->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $peca->id], ['confirm' => __('Are you sure you want to delete # {0}?', $peca->id)]) ?>
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
