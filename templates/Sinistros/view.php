<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Sinistro $sinistro
 */
?>
<div class="sinistros view content">
    <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:20px;">
        <h3>Detalhes do Sinistro</h3>
        <div>
            <?php if ($sinistro->status === 'aberto' || $sinistro->status === 'em_analise'): ?>
                <?= $this->Form->postLink('Aprovar', ['action' => 'aprovar', $sinistro->id], ['class' => 'button', 'confirm' => 'Confirma aprovação do sinistro?']) ?>
                <?= $this->Form->postLink('Recusar', ['action' => 'recusar', $sinistro->id], ['confirm' => 'Confirma recusa do sinistro?']) ?>
            <?php endif; ?>
            <?= $this->Html->link('Voltar', ['action' => 'index']) ?>
        </div>
    </div>

    <table>
        <tr>
            <th>Contrato</th>
            <td><?= h($sinistro->contratos_peculio->numero_contrato) ?></td>
        </tr>
        <tr>
            <th>Associado</th>
            <td><?= h($sinistro->contratos_peculio->associado->nome) ?></td>
        </tr>
        <tr>
            <th>Plano</th>
            <td><?= h($sinistro->contratos_peculio->planos_peculio->nome) ?></td>
        </tr>
        <tr>
            <th>Tipo de Evento</th>
            <td>
        <?php
        $eventos = [
        'obito'                  => 'Óbito',
        'invalidez'              => 'Invalidez',
        'desligamento_voluntario' => 'Desligamento Voluntário',
        ];echo $eventos[$sinistro->tipo_evento] ?? h($sinistro->tipo_evento);?> </td>
        </tr>
        <tr>
            <th>Data do Evento</th>
            <td><?= $sinistro->data_evento->format('d/m/Y') ?></td>
        </tr>
        <tr>
            <th>Data de Abertura</th>
            <td><?= $sinistro->data_abertura->format('d/m/Y') ?></td>
        </tr>
        <tr>
            <th>Status</th>
            <td>
                <?php
                $cores = [
                    'aberto'     => 'background:#17a2b8; color:#fff; padding:3px 8px; border-radius:4px;',
                    'em_analise' => 'background:#ffc107; color:#000; padding:3px 8px; border-radius:4px;',
                    'aprovado'   => 'background:#28a745; color:#fff; padding:3px 8px; border-radius:4px;',
                    'recusado'   => 'background:#dc3545; color:#fff; padding:3px 8px; border-radius:4px;',
                    'pago'       => 'background:#6c757d; color:#fff; padding:3px 8px; border-radius:4px;',
                ];
                $estilo = $cores[$sinistro->status] ?? '';
                ?>
                <span style="<?= $estilo ?>"><?= h($sinistro->status) ?></span>
            </td>
        </tr>
        <tr>
            <th>Valor Calculado</th>
            <td><strong>R$ <?= number_format($sinistro->valor_calculado, 2, ',', '.') ?></strong></td>
        </tr>
        <?php if (!empty($sinistro->observacao)): ?>
        <tr>
            <th>Observação</th>
            <td style="color:#856404; background:#fff3cd; padding:8px;"><?= h($sinistro->observacao) ?></td>
        </tr>
        <?php endif; ?>
    </table>

    <?php if (!empty($sinistro->contratos_peculio->beneficiarios)): ?>
    <h4 style="margin-top:30px;">Beneficiários e Valores</h4>
    <table>
        <thead>
            <tr>
                <th>Nome</th>
                <th>CPF</th>
                <th>Parentesco</th>
                <th>Percentual</th>
                <th>Valor a Receber</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($sinistro->contratos_peculio->beneficiarios as $beneficiario): ?>
            <tr>
                <td><?= h($beneficiario->nome) ?></td>
                <td><?= h($beneficiario->cpf) ?></td>
                <td><?= h($beneficiario->parentesco) ?></td>
                <td><?= number_format($beneficiario->percentual, 2, ',', '.') ?>%</td>
                <td><strong>R$ <?= number_format($sinistro->valor_calculado * $beneficiario->percentual / 100, 2, ',', '.') ?></strong></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?php endif; ?>
</div>