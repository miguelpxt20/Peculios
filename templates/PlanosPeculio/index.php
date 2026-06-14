<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\PlanosPeculio> $planosPeculio
 */
?>
<div class="planosPeculio index content">
    <?= $this->Html->link(__('New Planos Peculio'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Planos Peculio') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('codigo') ?></th>
                    <th><?= $this->Paginator->sort('nome') ?></th>
                    <th><?= $this->Paginator->sort('tipo') ?></th>
                    <th><?= $this->Paginator->sort('valor_cobertura') ?></th>
                    <th><?= $this->Paginator->sort('percentual_contribuicao') ?></th>
                    <th><?= $this->Paginator->sort('carencia_meses') ?></th>
                    <th><?= $this->Paginator->sort('ativo') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($planosPeculio as $planosPeculioEntity): ?>
                <tr>
                    <td><?= $this->Number->format($planosPeculioEntity->id) ?></td>
                    <td><?= h($planosPeculioEntity->codigo) ?></td>
                    <td><?= h($planosPeculioEntity->nome) ?></td>
                    <td><?= h($planosPeculioEntity->tipo) ?></td>
                    <td><?= $this->Number->format($planosPeculioEntity->valor_cobertura) ?></td>
                    <td><?= $this->Number->format($planosPeculioEntity->percentual_contribuicao) ?></td>
                    <td><?= $this->Number->format($planosPeculioEntity->carencia_meses) ?></td>
                    <td><?= h($planosPeculioEntity->ativo) ?></td>
                    <td><?= h($planosPeculioEntity->created) ?></td>
                    <td><?= h($planosPeculioEntity->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $planosPeculioEntity->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $planosPeculioEntity->id]) ?>
                        <?= $this->Form->postLink(
                            __('Delete'),
                            ['action' => 'delete', $planosPeculioEntity->id],
                            [
                                'method' => 'delete',
                                'confirm' => __('Are you sure you want to delete # {0}?', $planosPeculioEntity->id),
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