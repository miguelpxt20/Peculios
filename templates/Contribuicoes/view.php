<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Contribuico $contribuicao
 */
?>
<div class="contribuicoes view content">
    <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:20px;">
        <h3>Detalhes da Contribuição</h3>
        <div>
            <?= $this->Html->link('Editar', ['action' => 'edit', $contribuicao->id], ['class' => 'button']) ?>
            <?= $this->Html->link('Voltar', ['action' => 'index']) ?>
        </div>
    </div>
    <table>
        <tr>
            <th>Contrato</th>
            <td><?= $contribuicao->contrato_id ?></td>
        </tr>
        <tr>
            <th>Competência</th>
            <td><?= $contribuicao->competencia->format('m/Y') ?></td>
        </tr>
        <tr>
            <th>Valor</th>
            <td><strong>R$ <?= number_format((float)$contribuicao->valor, 2, ',', '.') ?></strong></td>
        </tr>
        <tr>
            <th>Status</th>
            <td>
                <?php
                $cores = [
                    'pendente'  => 'background:#ffc107; color:#000; padding:3px 8px; border-radius:4px;',
                    'paga'      => 'background:#28a745; color:#fff; padding:3px 8px; border-radius:4px;',
                    'atrasada'  => 'background:#dc3545; color:#fff; padding:3px 8px; border-radius:4px;',
                    'cancelada' => 'background:#6c757d; color:#fff; padding:3px 8px; border-radius:4px;',
                ];
                $estilo = $cores[$contribuicao->status] ?? '';
                ?>
                <span style="<?= $estilo ?>"><?= h($contribuicao->status) ?></span>
            </td>
        </tr>
        <tr>
            <th>Data de Pagamento</th>
            <td><?= $contribuicao->data_pagamento ? $contribuicao->data_pagamento->format('d/m/Y') : '-' ?></td>
        </tr>
        <tr>
            <th>Cadastrado em</th>
            <td><?= $contribuicao->created->format('d/m/Y H:i') ?></td>
        </tr>
    </table>
</div>