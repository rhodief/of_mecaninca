<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Carro $carro
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Carro'), ['action' => 'edit', $carro->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Carro'), ['action' => 'delete', $carro->id], ['confirm' => __('Are you sure you want to delete # {0}?', $carro->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Carros'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Carro'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Ordens De Servico'), ['controller' => 'OrdensDeServico', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Ordem De Servico'), ['controller' => 'OrdensDeServico', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="carros view large-9 medium-8 columns content">
    <h3><?= h($carro->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Placa') ?></th>
            <td><?= h($carro->placa) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Marca') ?></th>
            <td><?= h($carro->marca) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modelo') ?></th>
            <td><?= h($carro->modelo) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cor') ?></th>
            <td><?= h($carro->cor) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($carro->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($carro->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($carro->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Ordens De Servico') ?></h4>
        <?php if (!empty($carro->ordens_de_servico)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Data Abertura') ?></th>
                <th scope="col"><?= __('Data Alteracao') ?></th>
                <th scope="col"><?= __('Data Cancelamento') ?></th>
                <th scope="col"><?= __('Data Finalizacao') ?></th>
                <th scope="col"><?= __('Situacao') ?></th>
                <th scope="col"><?= __('Obs') ?></th>
                <th scope="col"><?= __('Cliente Id') ?></th>
                <th scope="col"><?= __('Carro Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($carro->ordens_de_servico as $ordensDeServico): ?>
            <tr>
                <td><?= h($ordensDeServico->id) ?></td>
                <td><?= h($ordensDeServico->data_abertura) ?></td>
                <td><?= h($ordensDeServico->data_alteracao) ?></td>
                <td><?= h($ordensDeServico->data_cancelamento) ?></td>
                <td><?= h($ordensDeServico->data_finalizacao) ?></td>
                <td><?= h($ordensDeServico->situacao) ?></td>
                <td><?= h($ordensDeServico->obs) ?></td>
                <td><?= h($ordensDeServico->cliente_id) ?></td>
                <td><?= h($ordensDeServico->carro_id) ?></td>
                <td><?= h($ordensDeServico->created) ?></td>
                <td><?= h($ordensDeServico->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'OrdensDeServico', 'action' => 'view', $ordensDeServico->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'OrdensDeServico', 'action' => 'edit', $ordensDeServico->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'OrdensDeServico', 'action' => 'delete', $ordensDeServico->id], ['confirm' => __('Are you sure you want to delete # {0}?', $ordensDeServico->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
