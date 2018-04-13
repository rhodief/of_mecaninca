<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PessoasJuridica[]|\Cake\Collection\CollectionInterface $pessoasJuridicas
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Pessoas Juridica'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Clientes'), ['controller' => 'Clientes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Cliente'), ['controller' => 'Clientes', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="pessoasJuridicas index large-9 medium-8 columns content">
    <h3><?= __('Pessoas Juridicas') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('cnpj') ?></th>
                <th scope="col"><?= $this->Paginator->sort('cliente_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('responsavel') ?></th>
                <th scope="col"><?= $this->Paginator->sort('cpf_responsavel') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pessoasJuridicas as $pessoasJuridica): ?>
            <tr>
                <td><?= $this->Number->format($pessoasJuridica->id) ?></td>
                <td><?= $this->Number->format($pessoasJuridica->cnpj) ?></td>
                <td><?= $pessoasJuridica->has('cliente') ? $this->Html->link($pessoasJuridica->cliente->nome, ['controller' => 'Clientes', 'action' => 'view', $pessoasJuridica->cliente->id]) : '' ?></td>
                <td><?= h($pessoasJuridica->responsavel) ?></td>
                <td><?= h($pessoasJuridica->cpf_responsavel) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $pessoasJuridica->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $pessoasJuridica->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $pessoasJuridica->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pessoasJuridica->id)]) ?>
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
