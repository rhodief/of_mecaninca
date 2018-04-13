<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Setor $setor
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Setor'), ['action' => 'edit', $setor->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Setor'), ['action' => 'delete', $setor->id], ['confirm' => __('Are you sure you want to delete # {0}?', $setor->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Setores'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Setor'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Servicos'), ['controller' => 'Servicos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Servico'), ['controller' => 'Servicos', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Tecnicos'), ['controller' => 'Tecnicos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Tecnico'), ['controller' => 'Tecnicos', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="setores view large-9 medium-8 columns content">
    <h3><?= h($setor->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Nome') ?></th>
            <td><?= h($setor->nome) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($setor->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Valor Hora') ?></th>
            <td><?= $this->Number->format($setor->valor_hora) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($setor->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($setor->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Servicos') ?></h4>
        <?php if (!empty($setor->servicos)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Descricao') ?></th>
                <th scope="col"><?= __('Setor Id') ?></th>
                <th scope="col"><?= __('Horas') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($setor->servicos as $servicos): ?>
            <tr>
                <td><?= h($servicos->id) ?></td>
                <td><?= h($servicos->descricao) ?></td>
                <td><?= h($servicos->setor_id) ?></td>
                <td><?= h($servicos->horas) ?></td>
                <td><?= h($servicos->created) ?></td>
                <td><?= h($servicos->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Servicos', 'action' => 'view', $servicos->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Servicos', 'action' => 'edit', $servicos->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Servicos', 'action' => 'delete', $servicos->id], ['confirm' => __('Are you sure you want to delete # {0}?', $servicos->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Tecnicos') ?></h4>
        <?php if (!empty($setor->tecnicos)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Funcionario Id') ?></th>
                <th scope="col"><?= __('Setor Id') ?></th>
                <th scope="col"><?= __('Funcao') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($setor->tecnicos as $tecnicos): ?>
            <tr>
                <td><?= h($tecnicos->id) ?></td>
                <td><?= h($tecnicos->funcionario_id) ?></td>
                <td><?= h($tecnicos->setor_id) ?></td>
                <td><?= h($tecnicos->funcao) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Tecnicos', 'action' => 'view', $tecnicos->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Tecnicos', 'action' => 'edit', $tecnicos->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Tecnicos', 'action' => 'delete', $tecnicos->id], ['confirm' => __('Are you sure you want to delete # {0}?', $tecnicos->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
