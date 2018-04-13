<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\OrdensDeServico $ordensDeServico
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $ordensDeServico->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $ordensDeServico->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Ordens De Servico'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Clientes'), ['controller' => 'Clientes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Cliente'), ['controller' => 'Clientes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Carros'), ['controller' => 'Carros', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Carro'), ['controller' => 'Carros', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Faturamento'), ['controller' => 'Faturamento', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Faturamento'), ['controller' => 'Faturamento', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="ordensDeServico form large-9 medium-8 columns content">
    <?= $this->Form->create($ordensDeServico) ?>
    <fieldset>
        <legend><?= __('Edit Ordens De Servico') ?></legend>
        <?php
            echo $this->Form->control('data_abertura');
            echo $this->Form->control('data_alteracao');
            echo $this->Form->control('data_cancelamento');
            echo $this->Form->control('data_finalizacao');
            echo $this->Form->control('situacao');
            echo $this->Form->control('obs');
            echo $this->Form->control('cliente_id', ['options' => $clientes]);
            echo $this->Form->control('carro_id', ['options' => $carros]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
