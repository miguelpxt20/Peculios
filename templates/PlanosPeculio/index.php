<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\PlanosPeculio> $planosPeculio
 */
?>
<div class="planos-peculio index content">
    <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:20px;">
        <h3>Planos de Pecúlio</h3>
        <?= $this->Html->link('+ Novo Plano', ['action' => 'add'], ['class' => 'button']) ?>
    </div>
    <table>
        <thead>
            <tr>
                <th>Código</th>
                <th>Nome</th>
                <th>Tipo</th>
                <th>Valor de Cobertura</th>
                <th>% Contribuição</th>
                <th>Carência</th>
                <th>Ativo</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($planosPeculio as $plano): ?>
            <tr>
                <td><?= h($plano->codigo) ?></td>
                <td><?= h($plano->nome) ?></td>
                <td>
                    <span style="background:#17a2b8; color:#fff; padding:3px 8px; border-radius:4px;">
                        <?= $plano->tipo === 'individual' ? 'Individual' : 'Familiar' ?>
                    </span>
                </td>
                <td><strong>R$ <?= number_format((float)$plano->valor_cobertura, 2, ',', '.') ?></strong></td>
                <td><?= number_format((float)$plano->percentual_contribuicao * 100, 2, ',', '.') ?>%</td>
                <td><?= $plano->carencia_meses ?> meses</td>
                <td>
                    <?php if ($plano->ativo): ?>
                        <span style="background:#28a745; color:#fff; padding:3px 8px; border-radius:4px;">Sim</span>
                    <?php else: ?>
                        <span style="background:#dc3545; color:#fff; padding:3px 8px; border-radius:4px;">Não</span>
                    <?php endif; ?>
                </td>
                <td>
                    <?= $this->Html->link('Ver', ['action' => 'view', $plano->id]) ?>
                    <?= $this->Html->link('Editar', ['action' => 'edit', $plano->id]) ?>
                    <?= $this->Form->postLink('Excluir', ['action' => 'delete', $plano->id], ['confirm' => 'Tem certeza?']) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>