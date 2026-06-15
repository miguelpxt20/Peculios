<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Contribuico> $contribuicoes
 */
?>
<div class="contribuicoes index content">
    <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:20px;">
        <h3>Contribuições</h3>
        <?= $this->Html->link('Lançar em Lote', ['action' => 'lancarLote'], ['class' => 'button']) ?>
    </div>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Contrato</th>
                <th>Competência</th>
                <th>Valor</th>
                <th>Status</th>
                <th>Data Pagamento</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($contribuicoes as $contribuicao): ?>
            <tr>
                <td><?= $contribuicao->id ?></td>
                <td><?= h($contribuicao->contratos_peculio->numero_contrato) ?></td>
                <td><?= $contribuicao->competencia->format('m/Y') ?></td>
                <td>R$ <?= number_format((float)$contribuicao->valor, 2, ',', '.') ?></td>
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
                <td><?= $contribuicao->data_pagamento ? $contribuicao->data_pagamento->format('d/m/Y') : '-' ?></td>
                <td>
                    <?= $this->Html->link('Ver', ['action' => 'view', $contribuicao->id]) ?>
                    <?= $this->Html->link('Editar', ['action' => 'edit', $contribuicao->id]) ?>
                    <?= $this->Form->postLink('Excluir', ['action' => 'delete', $contribuicao->id], ['confirm' => 'Tem certeza?']) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>