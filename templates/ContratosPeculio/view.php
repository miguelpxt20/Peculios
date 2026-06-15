<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ContratosPeculio $contrato
 */
?>
<div class="contratos-peculio view content">
    <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:20px;">
        <h3>Detalhes do Contrato</h3>
        <div>
            <?= $this->Html->link('Editar', ['action' => 'edit', $contrato->id], ['class' => 'button']) ?>
            <?= $this->Html->link('Voltar', ['action' => 'index']) ?>
        </div>
    </div>
    <table>
        <tr>
            <th>Número</th>
            <td><?= h($contrato->numero_contrato) ?></td>
        </tr>
        <tr>
            <th>Associado</th>
            <td><?= h($contrato->associado->nome) ?></td>
        </tr>
        <tr>
            <th>Plano</th>
            <td><?= h($contrato->planos_peculio->nome) ?></td>
        </tr>
        <tr>
            <th>Status</th>
            <td>
                <?php
                $cores = [
                    'vigente'    => 'background:#28a745; color:#fff; padding:3px 8px; border-radius:4px;',
                    'suspenso'   => 'background:#fd7e14; color:#fff; padding:3px 8px; border-radius:4px;',
                    'encerrado'  => 'background:#6c757d; color:#fff; padding:3px 8px; border-radius:4px;',
                    'sinistrado' => 'background:#dc3545; color:#fff; padding:3px 8px; border-radius:4px;',
                ];
                $estilo = $cores[$contrato->status] ?? '';
                ?>
                <span style="<?= $estilo ?>"><?= h($contrato->status) ?></span>
            </td>
        </tr>
        <tr>
            <th>Data de Início</th>
            <td><?= $contrato->data_inicio->format('d/m/Y') ?></td>
        </tr>
        <tr>
            <th>Data de Fim</th>
            <td><?= $contrato->data_fim ? $contrato->data_fim->format('d/m/Y') : '-' ?></td>
        </tr>
        <tr>
            <th>Valor de Cobertura</th>
            <td><strong>R$ <?= number_format((float)$contrato->planos_peculio->valor_cobertura, 2, ',', '.') ?></strong></td>
        </tr>
    </table>

    <?php if (!empty($contrato->beneficiarios)): ?>
    <h4 style="margin-top:30px;">Beneficiários</h4>
    <table>
        <thead>
            <tr>
                <th>Nome</th>
                <th>CPF</th>
                <th>Parentesco</th>
                <th>Percentual</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($contrato->beneficiarios as $beneficiario): ?>
            <tr>
                <td><?= h($beneficiario->nome) ?></td>
                <td><?= h($beneficiario->cpf) ?></td>
                <td><?= h($beneficiario->parentesco) ?></td>
                <td><?= number_format((float)$beneficiario->percentual, 2, ',', '.') ?>%</td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?php endif; ?>

    <?php if (!empty($contrato->contribuicoes)): ?>
    <h4 style="margin-top:30px;">Histórico de Contribuições</h4>
    <table>
        <thead>
            <tr>
                <th>Competência</th>
                <th>Valor</th>
                <th>Status</th>
                <th>Data Pagamento</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($contrato->contribuicoes as $contribuicao): ?>
            <tr>
                <td><?= $contribuicao->competencia->format('m/Y') ?></td>
                <td>R$ <?= number_format((float)$contribuicao->valor, 2, ',', '.') ?></td>
                <td>
                    <?php
                    $coresC = [
                        'pendente'  => 'background:#ffc107; color:#000; padding:2px 6px; border-radius:4px;',
                        'paga'      => 'background:#28a745; color:#fff; padding:2px 6px; border-radius:4px;',
                        'atrasada'  => 'background:#dc3545; color:#fff; padding:2px 6px; border-radius:4px;',
                        'cancelada' => 'background:#6c757d; color:#fff; padding:2px 6px; border-radius:4px;',
                    ];
                    $estiloC = $coresC[$contribuicao->status] ?? '';
                    ?>
                    <span style="<?= $estiloC ?>"><?= h($contribuicao->status) ?></span>
                </td>
                <td><?= $contribuicao->data_pagamento ? $contribuicao->data_pagamento->format('d/m/Y') : '-' ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?php endif; ?>

    <?php if (!empty($contrato->sinistros)): ?>
    <h4 style="margin-top:30px;">Sinistros</h4>
    <table>
        <thead>
            <tr>
                <th>Tipo</th>
                <th>Data Evento</th>
                <th>Status</th>
                <th>Valor</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($contrato->sinistros as $sinistro): ?>
            <tr>
                <td><?= h($sinistro->tipo_evento) ?></td>
                <td><?= $sinistro->data_evento->format('d/m/Y') ?></td>
                <td><?= h($sinistro->status) ?></td>
                <td>R$ <?= number_format((float)$sinistro->valor_calculado, 2, ',', '.') ?></td>
                <td><?= $this->Html->link('Ver', ['controller' => 'Sinistros', 'action' => 'view', $sinistro->id]) ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?php endif; ?>
</div>