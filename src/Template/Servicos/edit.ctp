<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Servico $servico
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $servico->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $servico->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Servicos'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Setores'), ['controller' => 'Setores', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Setor'), ['controller' => 'Setores', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Itens De Servico'), ['controller' => 'ItensDeServico', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Itens De Servico'), ['controller' => 'ItensDeServico', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="servicos form large-9 medium-8 columns content">
    <?= $this->Form->create($servico) ?>
    <fieldset>
        <legend><?= __('Edit Servico') ?></legend>
        <?php
            echo $this->Form->control('descricao');
            echo $this->Form->control('setor_id', ['options' => $setores]);
            echo $this->Form->control('horas');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
