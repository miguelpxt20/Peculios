<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Associado> $associados
 */
?>
<div class="associados index content">
    <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:20px;">
        <h3>Associados</h3>
        <?= $this->Html->link('+ Novo Associado', ['action' => 'add'], ['class' => 'button']) ?>
    </div>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Matrícula</th>
                <th>Nome</th>
                <th>CPF</th>
                <th>Patente</th>
                <th>Situação</th>
                <th>Data Ingresso</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($associados as $associado): ?>
            <tr>
                <td><?= $associado->id ?></td>
                <td><?= h($associado->matricula) ?></td>
                <td><?= h($associado->nome) ?></td>
                <td><?= h($associado->cpf) ?></td>
                <td><?= h($associado->patente) ?></td>
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
                <td><?= $associado->data_ingresso->format('d/m/Y') ?></td>
                <td>
                    <?= $this->Html->link('Ver', ['action' => 'view', $associado->id]) ?>
                    <?= $this->Html->link('Editar', ['action' => 'edit', $associado->id]) ?>
                    <?= $this->Form->postLink('Excluir', ['action' => 'delete', $associado->id], ['confirm' => 'Tem certeza que deseja excluir este associado?']) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>