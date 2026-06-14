<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Associado $associado
 */
?>
<div class="associados view content">
    <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:20px;">
        <h3>Detalhes do Associado</h3>
        <div>
            <?= $this->Html->link('Editar', ['action' => 'edit', $associado->id], ['class' => 'button']) ?>
            <?= $this->Html->link('Voltar', ['action' => 'index']) ?>
        </div>
    </div>
    <table>
        <tr>
            <th>Matrícula</th>
            <td><?= h($associado->matricula) ?></td>
        </tr>
        <tr>
            <th>Nome</th>
            <td><?= h($associado->nome) ?></td>
        </tr>
        <tr>
            <th>CPF</th>
            <td><?= h($associado->cpf) ?></td>
        </tr>
        <tr>
            <th>Patente</th>
            <td><?= h($associado->patente) ?></td>
        </tr>
        <tr>
            <th>Situação</th>
            <td>
                <?php
                $cores = [
                    'ativo'     => 'background:#28a745; color:#fff; padding:3px 8px; border-radius:4px;',
                    'inativo'   => 'background:#6c757d; color:#fff; padding:3px 8px; border-radius:4px;',
                    'reserva'   => 'background:#ffc107; color:#000; padding:3px 8px; border-radius:4px;',
                    'reformado' => 'background:#17a2b8; color:#fff; padding:3px 8px; border-radius:4px;',
                ];
                $estilo = $cores[$associado->situacao] ?? '';
                ?>
                <span style="<?= $estilo ?>"><?= h($associado->situacao) ?></span>
            </td>
        </tr>
        <tr>
            <th>Data de Ingresso</th>
            <td><?= $associado->data_ingresso->format('d/m/Y') ?></td>
        </tr>
        <tr>
            <th>Data de Nascimento</th>
            <td><?= $associado->data_nascimento->format('d/m/Y') ?></td>
        </tr>
        <tr>
            <th>Cadastrado em</th>
            <td><?= $associado->created->format('d/m/Y H:i') ?></td>
        </tr>
    </table>

    <h4 style="margin-top:30px;">Contratos</h4>
    <?php if (!empty($associado->contratos_peculio)): ?>
    <table>
        <thead>
            <tr>
                <th>Número</th>
                <th>Status</th>
                <th>Data Início</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($associado->contratos_peculio as $contrato): ?>
            <tr>
                <td><?= h($contrato->numero_contrato) ?></td>
                <td><?= h($contrato->status) ?></td>
                <td><?= $contrato->data_inicio->format('d/m/Y') ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?php else: ?>
        <p>Nenhum contrato cadastrado.</p>
    <?php endif; ?>
</div>