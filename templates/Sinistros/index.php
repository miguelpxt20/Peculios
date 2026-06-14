<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Sinistro> $sinistros
 */
?>
<div class="sinistros index content">
    <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:20px;">
        <h3>Sinistros</h3>
        <?= $this->Html->link('Voltar ao Dashboard', ['controller' => 'Pages', 'action' => 'display', 'home']) ?>
    </div>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Contrato</th>
                <th>Tipo de Evento</th>
                <th>Data do Evento</th>
                <th>Data Abertura</th>
                <th>Status</th>
                <th>Valor Calculado</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($sinistros as $sinistro): ?>
            <tr>
                <td><?= $sinistro->id ?></td>
                <td><?= h($sinistro->contratos_peculio->numero_contrato) ?></td>
                <td>
                    <?php
                    $eventos = [
                        'obito'                   => 'Óbito',
                        'invalidez'               => 'Invalidez',
                        'desligamento_voluntario'  => 'Desligamento Voluntário',
                    ];
                    echo $eventos[$sinistro->tipo_evento] ?? h($sinistro->tipo_evento);
                    ?>
                </td>
                <td><?= $sinistro->data_evento->format('d/m/Y') ?></td>
                <td><?= $sinistro->data_abertura->format('d/m/Y') ?></td>
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
                <td><strong>R$ <?= number_format((float)$sinistro->valor_calculado, 2, ',', '.') ?></strong></td>
                <td>
                    <?= $this->Html->link('Ver', ['action' => 'view', $sinistro->id]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>