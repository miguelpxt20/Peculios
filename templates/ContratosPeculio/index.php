<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\ContratoPeculio> $contratosPeculio
 */
?>
<div class="contratos-peculio index content">
    <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:20px;">
        <h3>Contratos de Pecúlio</h3>
        <?= $this->Html->link('+ Novo Contrato', ['action' => 'add'], ['class' => 'button']) ?>
    </div>
    <table>
        <thead>
            <tr>
                <th>Número</th>
                <th>Associado</th>
                <th>Plano</th>
                <th>Status</th>
                <th>Data Início</th>
                <th>Data Fim</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($contratosPeculio as $contrato): ?>
            <tr>
                <td><?= h($contrato->numero_contrato) ?></td>
                <td><?= h($contrato->associado->nome) ?></td>
                <td><?= h($contrato->planos_peculio->nome) ?></td>
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
                <td><?= $contrato->data_inicio->format('d/m/Y') ?></td>
                <td><?= $contrato->data_fim ? $contrato->data_fim->format('d/m/Y') : '-' ?></td>
                <td>
                    <?= $this->Html->link('Ver', ['action' => 'view', $contrato->id]) ?>
                    <?= $this->Html->link('Editar', ['action' => 'edit', $contrato->id]) ?>
                    <?php if ($contrato->status === 'vigente'): ?>
        |           <?= $this->Html->link('Abrir Sinistro', ['controller' => 'Sinistros', 'action' => 'abrir', $contrato->id], ['style' => 'color:#dc3545; font-weight:bold;']) ?>
                    <?php endif; ?>
                    <?= $this->Form->postLink('Excluir', ['action' => 'delete', $contrato->id], ['confirm' => 'Tem certeza que deseja excluir este contrato?']) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>