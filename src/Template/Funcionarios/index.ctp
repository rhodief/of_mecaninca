<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Funcionario[]|\Cake\Collection\CollectionInterface $funcionarios
 */
?>
<div class="d-flex">
  <div class="mr-auto p-2"><h1>Funcionários</h1></div>
  <div class="p-2"><a href="<?= $this->Url->Build(['controller'=>'funcionarios', 'action'=>"add"]) ?>" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Cadastrar Funcionário</a></div>
</div>

    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('nome') ?></th>
                <th scope="col"><?= $this->Paginator->sort('cpf') ?></th>
                <th scope="col"><?= $this->Paginator->sort('data_admissao') ?></th>
                <th scope="col"><?= $this->Paginator->sort('data_desligamento') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($funcionarios as $funcionario): ?>
            <tr>
                <td scope="row"><?= $this->Number->format($funcionario->id) ?></td>
                <td><?= h($funcionario->nome) ?></td>
                <td><?= h($funcionario->cpf) ?></td>
                <td><?= h($funcionario->data_admissao) ?></td>
                <td><?= h($funcionario->data_desligamento) ?></td>
                <td><?= h($funcionario->created) ?></td>
                <td><?= h($funcionario->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $funcionario->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $funcionario->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $funcionario->id], ['confirm' => __('Are you sure you want to delete # {0}?', $funcionario->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('Primeira')) ?>
            <?= $this->Paginator->prev('< ' . __('Anterior')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('Próxima') . ' >') ?>
            <?= $this->Paginator->last(__('Última') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Página {{page}} of {{pages}}, mostrando {{current}} registro(s) de um total de {{count}}')]) ?></p>
    </div>

