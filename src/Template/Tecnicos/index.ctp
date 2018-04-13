<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Tecnico[]|\Cake\Collection\CollectionInterface $tecnicos
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Tecnico'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Funcionarios'), ['controller' => 'Funcionarios', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Funcionario'), ['controller' => 'Funcionarios', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Setores'), ['controller' => 'Setores', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Setor'), ['controller' => 'Setores', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="tecnicos index large-9 medium-8 columns content">
    <h3><?= __('Tecnicos') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('funcionario_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('setor_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('funcao') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tecnicos as $tecnico): ?>
            <tr>
                <td><?= $this->Number->format($tecnico->id) ?></td>
                <td><?= $tecnico->has('funcionario') ? $this->Html->link($tecnico->funcionario->nome, ['controller' => 'Funcionarios', 'action' => 'view', $tecnico->funcionario->id]) : '' ?></td>
                <td><?= $tecnico->has('setor') ? $this->Html->link($tecnico->setor->id, ['controller' => 'Setores', 'action' => 'view', $tecnico->setor->id]) : '' ?></td>
                <td><?= h($tecnico->funcao) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $tecnico->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $tecnico->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $tecnico->id], ['confirm' => __('Are you sure you want to delete # {0}?', $tecnico->id)]) ?>
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
