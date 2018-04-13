<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Cliente $cliente
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Cliente'), ['action' => 'edit', $cliente->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Cliente'), ['action' => 'delete', $cliente->id], ['confirm' => __('Are you sure you want to delete # {0}?', $cliente->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Clientes'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Cliente'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Pessoas Fisicas'), ['controller' => 'PessoasFisicas', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pessoa Fisica'), ['controller' => 'PessoasFisicas', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Pessoas Juridicas'), ['controller' => 'PessoasJuridicas', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pessoa Juridica'), ['controller' => 'PessoasJuridicas', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Ordens De Servico'), ['controller' => 'OrdensDeServico', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Ordem De Servico'), ['controller' => 'OrdensDeServico', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="clientes view large-9 medium-8 columns content">
    <h3><?= h($cliente->nome) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Nome') ?></th>
            <td><?= h($cliente->nome) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($cliente->email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Telefone Fixo') ?></th>
            <td><?= h($cliente->telefone_fixo) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Telefone Celular') ?></th>
            <td><?= h($cliente->telefone_celular) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Endereco') ?></th>
            <td><?= h($cliente->endereco) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Numero') ?></th>
            <td><?= h($cliente->numero) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cep') ?></th>
            <td><?= h($cliente->cep) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cidade') ?></th>
            <td><?= h($cliente->cidade) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Uf') ?></th>
            <td><?= h($cliente->uf) ?></td>
        </tr>
        
        <?php if($cliente->has('pessoas_fisica')){?>
        <tr>
            <th  scope="row">Tipo de Cliente</th>
            <td>Pessoa Física</td>
        </tr>
        <tr>
            <th scope="row"><?= __('Pessoa Fisica') ?></th>
            <td><?= $this->Html->link($cliente->pessoas_fisica->cpf, ['controller' => 'PessoasFisicas', 'action' => 'view', $cliente->pessoas_fisica->id])?></td>
        </tr>
        <?php }?>

        <?php if($cliente->has('pessoas_juridicas')){?>
        <tr>
            <th  scope="row">Tipo de Cliente</th>
            <td>Pessoa Jurídica</td>
        </tr>
        <tr>
            <th scope="row"><?= __('Pessoa Juridica') ?></th>
            <td><?=  $this->Html->link($cliente->pessoas_juridica->cnpj, ['controller' => 'PessoasJuridicas', 'action' => 'view', $cliente->pessoas_juridica->id]) ?></td>
        </tr>
        <?php }?>

        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($cliente->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($cliente->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($cliente->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Ordens De Servico') ?></h4>
        <?php if (!empty($cliente->ordens_de_servico)): ?>
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
            <?php foreach ($cliente->ordens_de_servico as $ordensDeServico): ?>
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
