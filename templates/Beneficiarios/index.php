<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Beneficiario> $beneficiarios
 */
?>
<div class="beneficiarios index content">
    <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:20px;">
        <h3>Beneficiários</h3>
        <?= $this->Html->link('+ Novo Beneficiário', ['action' => 'add'], ['class' => 'button']) ?>
    </div>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Contrato</th>
                <th>Nome</th>
                <th>CPF</th>
                <th>Parentesco</th>
                <th>Percentual</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($beneficiarios as $beneficiario): ?>
            <tr>
                <td><?= $beneficiario->id ?></td>
                <td><?= $beneficiario->contrato_id ?></td>
                <td><?= h($beneficiario->nome) ?></td>
                <td><?= h($beneficiario->cpf) ?></td>
                <td><?= h($beneficiario->parentesco) ?></td>
                <td><?= number_format((float)$beneficiario->percentual, 2, ',', '.') ?>%</td>
                <td>
                    <?= $this->Html->link('Ver', ['action' => 'view', $beneficiario->id]) ?>
                    <?= $this->Html->link('Editar', ['action' => 'edit', $beneficiario->id]) ?>
                    <?= $this->Form->postLink('Excluir', ['action' => 'delete', $beneficiario->id], ['confirm' => 'Tem certeza?']) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>