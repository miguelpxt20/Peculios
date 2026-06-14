<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Beneficiario $beneficiario
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Beneficiario'), ['action' => 'edit', $beneficiario->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Beneficiario'), ['action' => 'delete', $beneficiario->id], ['confirm' => __('Are you sure you want to delete # {0}?', $beneficiario->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Beneficiarios'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Beneficiario'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="beneficiarios view content">
            <h3><?= h($beneficiario->nome) ?></h3>
            <table>
                <tr>
                    <th><?= __('Nome') ?></th>
                    <td><?= h($beneficiario->nome) ?></td>
                </tr>
                <tr>
                    <th><?= __('Cpf') ?></th>
                    <td><?= h($beneficiario->cpf) ?></td>
                </tr>
                <tr>
                    <th><?= __('Parentesco') ?></th>
                    <td><?= h($beneficiario->parentesco) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($beneficiario->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Contrato Id') ?></th>
                    <td><?= $this->Number->format($beneficiario->contrato_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Percentual') ?></th>
                    <td><?= $this->Number->format($beneficiario->percentual) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($beneficiario->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($beneficiario->modified) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>