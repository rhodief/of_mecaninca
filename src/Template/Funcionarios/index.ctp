<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Funcionario[]|\Cake\Collection\CollectionInterface $funcionarios
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Funcionario'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Atendentes'), ['controller' => 'Atendentes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Atendente'), ['controller' => 'Atendentes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Tecnicos'), ['controller' => 'Tecnicos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Tecnico'), ['controller' => 'Tecnicos', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="funcionarios index large-9 medium-8 columns content">
    <h3><?= __('Funcionarios') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('nome') ?></th>
                <th scope="col"><?= $this->Paginator->sort('cpf') ?></th>
                <th scope="col"><?= $this->Paginator->sort('data_admissao') ?></th>
                <th scope="col"><?= $this->Paginator->sort('data_desligamento') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($funcionarios as $funcionario): ?>
            <tr>
                <td><?= $this->Number->format($funcionario->id) ?></td>
                <td><?= h($funcionario->nome) ?></td>
                <td><?= h($funcionario->cpf) ?></td>
                <td><?= h($funcionario->data_admissao) ?></td>
                <td><?= h($funcionario->data_desligamento) ?></td>
                <td><?= h($funcionario->created) ?></td>
                <td><?= h($funcionario->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $funcionario->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $funcionario->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $funcionario->id], ['confirm' => __('Are you sure you want to delete # {0}?', $funcionario->id)]) ?>
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
