<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PessoasFisica[]|\Cake\Collection\CollectionInterface $pessoasFisicas
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Pessoas Fisica'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Clientes'), ['controller' => 'Clientes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Cliente'), ['controller' => 'Clientes', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="pessoasFisicas index large-9 medium-8 columns content">
    <h3><?= __('Pessoas Fisicas') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('cpf') ?></th>
                <th scope="col"><?= $this->Paginator->sort('cliente_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('dataNascimento') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pessoasFisicas as $pessoasFisica): ?>
            <tr>
                <td><?= $this->Number->format($pessoasFisica->id) ?></td>
                <td><?= h($pessoasFisica->cpf) ?></td>
                <td><?= $pessoasFisica->has('cliente') ? $this->Html->link($pessoasFisica->cliente->id, ['controller' => 'Clientes', 'action' => 'view', $pessoasFisica->cliente->id]) : '' ?></td>
                <td><?= h($pessoasFisica->dataNascimento) ?></td>
                <td><?= h($pessoasFisica->created) ?></td>
                <td><?= h($pessoasFisica->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $pessoasFisica->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $pessoasFisica->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $pessoasFisica->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pessoasFisica->id)]) ?>
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
