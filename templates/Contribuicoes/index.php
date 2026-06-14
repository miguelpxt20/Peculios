<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Contribuico> $contribuicoes
 */
?>
<div class="contribuicoes index content">
    <?= $this->Html->link(__('New Contribuico'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Contribuicoes') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('contrato_id') ?></th>
                    <th><?= $this->Paginator->sort('competencia') ?></th>
                    <th><?= $this->Paginator->sort('valor') ?></th>
                    <th><?= $this->Paginator->sort('status') ?></th>
                    <th><?= $this->Paginator->sort('data_pagamento') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($contribuicoes as $contribuico): ?>
                <tr>
                    <td><?= $this->Number->format($contribuico->id) ?></td>
                    <td><?= $this->Number->format($contribuico->contrato_id) ?></td>
                    <td><?= h($contribuico->competencia) ?></td>
                    <td><?= $this->Number->format($contribuico->valor) ?></td>
                    <td><?= h($contribuico->status) ?></td>
                    <td><?= h($contribuico->data_pagamento) ?></td>
                    <td><?= h($contribuico->created) ?></td>
                    <td><?= h($contribuico->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $contribuico->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $contribuico->id]) ?>
                        <?= $this->Form->postLink(
                            __('Delete'),
                            ['action' => 'delete', $contribuico->id],
                            [
                                'method' => 'delete',
                                'confirm' => __('Are you sure you want to delete # {0}?', $contribuico->id),
                            ]
                        ) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>