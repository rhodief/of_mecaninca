<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Servico $servico
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Servico'), ['action' => 'edit', $servico->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Servico'), ['action' => 'delete', $servico->id], ['confirm' => __('Are you sure you want to delete # {0}?', $servico->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Servicos'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Servico'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Setores'), ['controller' => 'Setores', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Setor'), ['controller' => 'Setores', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Itens De Servico'), ['controller' => 'ItensDeServico', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Item De Servico'), ['controller' => 'ItensDeServico', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="servicos view large-9 medium-8 columns content">
    <h3><?= h($servico->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Descricao') ?></th>
            <td><?= h($servico->descricao) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Setor') ?></th>
            <td><?= $servico->has('setor') ? $this->Html->link($servico->setor->nome, ['controller' => 'Setores', 'action' => 'view', $servico->setor->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($servico->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Horas') ?></th>
            <td><?= $this->Number->format($servico->horas) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($servico->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($servico->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Itens De Servico') ?></h4>
        <?php if (!empty($servico->itens_de_servico)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Ordem Servico Id') ?></th>
                <th scope="col"><?= __('Servico Id') ?></th>
                <th scope="col"><?= __('Quantidade') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($servico->itens_de_servico as $itensDeServico): ?>
            <tr>
                <td><?= h($itensDeServico->id) ?></td>
                <td><?= h($itensDeServico->ordem_servico_id) ?></td>
                <td><?= h($itensDeServico->servico_id) ?></td>
                <td><?= h($itensDeServico->quantidade) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'ItensDeServico', 'action' => 'view', $itensDeServico->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'ItensDeServico', 'action' => 'edit', $itensDeServico->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'ItensDeServico', 'action' => 'delete', $itensDeServico->id], ['confirm' => __('Are you sure you want to delete # {0}?', $itensDeServico->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
