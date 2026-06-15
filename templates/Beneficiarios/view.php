<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Beneficiario $beneficiario
 */
?>
<div class="beneficiarios view content">
    <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:20px;">
        <h3>Detalhes do Beneficiário</h3>
        <div>
            <?= $this->Html->link('Editar', ['action' => 'edit', $beneficiario->id], ['class' => 'button']) ?>
            <?= $this->Html->link('Voltar', ['action' => 'index']) ?>
        </div>
    </div>
    <table>
        <tr>
            <th>Nome</th>
            <td><?= h($beneficiario->nome) ?></td>
        </tr>
        <tr>
            <th>CPF</th>
            <td><?= h($beneficiario->cpf) ?></td>
        </tr>
        <tr>
            <th>Parentesco</th>
            <td><?= h($beneficiario->parentesco) ?></td>
        </tr>
        <tr>
            <th>Contrato</th>
            <td><?= $beneficiario->contrato_id ?></td>
        </tr>
        <tr>
            <th>Percentual</th>
            <td><?= number_format((float)$beneficiario->percentual, 2, ',', '.') ?>%</td>
        </tr>
        <tr>
            <th>Cadastrado em</th>
            <td><?= $beneficiario->created->format('d/m/Y H:i') ?></td>
        </tr>
    </table>
</div>