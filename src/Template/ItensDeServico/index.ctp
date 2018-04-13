<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ItensDeServico[]|\Cake\Collection\CollectionInterface $itensDeServico
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Itens De Servico'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Servicos'), ['controller' => 'Servicos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Servico'), ['controller' => 'Servicos', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="itensDeServico index large-9 medium-8 columns content">
    <h3><?= __('Itens De Servico') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ordem_servico_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('servico_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('quantidade') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($itensDeServico as $itensDeServico): ?>
            <tr>
                <td><?= $this->Number->format($itensDeServico->id) ?></td>
                <td><?= $this->Number->format($itensDeServico->ordem_servico_id) ?></td>
                <td><?= $itensDeServico->has('servico') ? $this->Html->link($itensDeServico->servico->id, ['controller' => 'Servicos', 'action' => 'view', $itensDeServico->servico->id]) : '' ?></td>
                <td><?= $this->Number->format($itensDeServico->quantidade) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $itensDeServico->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $itensDeServico->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $itensDeServico->id], ['confirm' => __('Are you sure you want to delete # {0}?', $itensDeServico->id)]) ?>
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
