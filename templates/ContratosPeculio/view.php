<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ContratosPeculio $contratosPeculioEntity
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Contratos Peculio'), ['action' => 'edit', $contratosPeculioEntity->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Contratos Peculio'), ['action' => 'delete', $contratosPeculioEntity->id], ['confirm' => __('Are you sure you want to delete # {0}?', $contratosPeculioEntity->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Contratos Peculio'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Contratos Peculio'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="contratosPeculio view content">
            <h3><?= h($contratosPeculioEntity->numero_contrato) ?></h3>
            <table>
                <tr>
                    <th><?= __('Associado') ?></th>
                    <td><?= $contratosPeculioEntity->hasValue('associado') ? $this->Html->link($contratosPeculioEntity->associado->matricula, ['controller' => 'Associados', 'action' => 'view', $contratosPeculioEntity->associado->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Numero Contrato') ?></th>
                    <td><?= h($contratosPeculioEntity->numero_contrato) ?></td>
                </tr>
                <tr>
                    <th><?= __('Status') ?></th>
                    <td><?= h($contratosPeculioEntity->status) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($contratosPeculioEntity->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Plano Id') ?></th>
                    <td><?= $this->Number->format($contratosPeculioEntity->plano_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Data Inicio') ?></th>
                    <td><?= h($contratosPeculioEntity->data_inicio) ?></td>
                </tr>
                <tr>
                    <th><?= __('Data Fim') ?></th>
                    <td><?= h($contratosPeculioEntity->data_fim) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($contratosPeculioEntity->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($contratosPeculioEntity->modified) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>