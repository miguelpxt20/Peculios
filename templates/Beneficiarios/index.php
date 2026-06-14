<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Beneficiario> $beneficiarios
 */
?>
<div class="beneficiarios index content">
    <?= $this->Html->link(__('New Beneficiario'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Beneficiarios') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('contrato_id') ?></th>
                    <th><?= $this->Paginator->sort('nome') ?></th>
                    <th><?= $this->Paginator->sort('cpf') ?></th>
                    <th><?= $this->Paginator->sort('parentesco') ?></th>
                    <th><?= $this->Paginator->sort('percentual') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($beneficiarios as $beneficiario): ?>
                <tr>
                    <td><?= $this->Number->format($beneficiario->id) ?></td>
                    <td><?= $this->Number->format($beneficiario->contrato_id) ?></td>
                    <td><?= h($beneficiario->nome) ?></td>
                    <td><?= h($beneficiario->cpf) ?></td>
                    <td><?= h($beneficiario->parentesco) ?></td>
                    <td><?= $this->Number->format($beneficiario->percentual) ?></td>
                    <td><?= h($beneficiario->created) ?></td>
                    <td><?= h($beneficiario->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $beneficiario->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $beneficiario->id]) ?>
                        <?= $this->Form->postLink(
                            __('Delete'),
                            ['action' => 'delete', $beneficiario->id],
                            [
                                'method' => 'delete',
                                'confirm' => __('Are you sure you want to delete # {0}?', $beneficiario->id),
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