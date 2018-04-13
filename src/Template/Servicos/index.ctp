<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Servico[]|\Cake\Collection\CollectionInterface $servicos
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Servico'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Setores'), ['controller' => 'Setores', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Setor'), ['controller' => 'Setores', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Itens De Servico'), ['controller' => 'ItensDeServico', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Itens De Servico'), ['controller' => 'ItensDeServico', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="servicos index large-9 medium-8 columns content">
    <h3><?= __('Servicos') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('descricao') ?></th>
                <th scope="col"><?= $this->Paginator->sort('setor_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('horas') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($servicos as $servico): ?>
            <tr>
                <td><?= $this->Number->format($servico->id) ?></td>
                <td><?= h($servico->descricao) ?></td>
                <td><?= $servico->has('setor') ? $this->Html->link($servico->setor->nome, ['controller' => 'Setores', 'action' => 'view', $servico->setor->id]) : '' ?></td>
                <td><?= $this->Number->format($servico->horas) ?></td>
                <td><?= h($servico->created) ?></td>
                <td><?= h($servico->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $servico->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $servico->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $servico->id], ['confirm' => __('Are you sure you want to delete # {0}?', $servico->id)]) ?>
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
