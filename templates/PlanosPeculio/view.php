<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PlanosPeculio $planosPeculio
 */
?>
<div class="planos-peculio view content">
    <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:20px;">
        <h3>Detalhes do Plano</h3>
        <div>
            <?= $this->Html->link('Editar', ['action' => 'edit', $planosPeculio->id], ['class' => 'button']) ?>
            <?= $this->Html->link('Voltar', ['action' => 'index']) ?>
        </div>
    </div>
    <table>
        <tr>
            <th>Código</th>
            <td><?= h($planosPeculio->codigo) ?></td>
        </tr>
        <tr>
            <th>Nome</th>
            <td><?= h($planosPeculio->nome) ?></td>
        </tr>
        <tr>
            <th>Descrição</th>
            <td><?= h($planosPeculio->descricao) ?></td>
        </tr>
        <tr>
            <th>Tipo</th>
            <td><?= $planosPeculio->tipo === 'individual' ? 'Individual' : 'Familiar' ?></td>
        </tr>
        <tr>
            <th>Valor de Cobertura</th>
            <td><strong>R$ <?= number_format((float)$planosPeculio->valor_cobertura, 2, ',', '.') ?></strong></td>
        </tr>
        <tr>
            <th>% Contribuição</th>
            <td><?= number_format((float)$planosPeculio->percentual_contribuicao * 100, 2, ',', '.') ?>%</td>
        </tr>
        <tr>
            <th>Carência</th>
            <td><?= $planosPeculio->carencia_meses ?> meses</td>
        </tr>
        <tr>
            <th>Ativo</th>
            <td>
                <?php if ($planosPeculio->ativo): ?>
                    <span style="background:#28a745; color:#fff; padding:3px 8px; border-radius:4px;">Sim</span>
                <?php else: ?>
                    <span style="background:#dc3545; color:#fff; padding:3px 8px; border-radius:4px;">Não</span>
                <?php endif; ?>
            </td>
        </tr>
    </table>
</div>