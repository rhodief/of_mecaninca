<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Setor[]|\Cake\Collection\CollectionInterface $setores
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Setor'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Servicos'), ['controller' => 'Servicos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Servico'), ['controller' => 'Servicos', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Tecnicos'), ['controller' => 'Tecnicos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Tecnico'), ['controller' => 'Tecnicos', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="setores index large-9 medium-8 columns content">
    <h3><?= __('Setores') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('nome') ?></th>
                <th scope="col"><?= $this->Paginator->sort('valor_hora') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($setores as $setor): ?>
            <tr>
                <td><?= $this->Number->format($setor->id) ?></td>
                <td><?= h($setor->nome) ?></td>
                <td><?= $this->Number->format($setor->valor_hora) ?></td>
                <td><?= h($setor->created) ?></td>
                <td><?= h($setor->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $setor->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $setor->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $setor->id], ['confirm' => __('Are you sure you want to delete # {0}?', $setor->id)]) ?>
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
