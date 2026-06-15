<?php
/**
 * @var \App\View\AppView $this
 * @var int $totalAssociadosAtivos
 * @var int $totalContratosVigentes
 * @var int $totalSinistrosAbertos
 * @var int $totalContribuicoesPendentes
 */
?>
<div style="max-width:1100px; margin:0 auto; padding:30px;">
    <h2 style="margin-bottom:30px;">Dashboard — Sistema de Pecúlios</h2>

    <div style="display:grid; grid-template-columns:repeat(4,1fr); gap:20px; margin-bottom:40px;">
        <div style="background:#28a745; color:#fff; padding:25px; border-radius:8px; text-align:center;">
            <div style="font-size:48px; font-weight:bold;"><?= $totalAssociadosAtivos ?></div>
            <div style="font-size:16px; margin-top:8px;">Associados Ativos</div>
        </div>
        <div style="background:#007bff; color:#fff; padding:25px; border-radius:8px; text-align:center;">
            <div style="font-size:48px; font-weight:bold;"><?= $totalContratosVigentes ?></div>
            <div style="font-size:16px; margin-top:8px;">Contratos Vigentes</div>
        </div>
        <div style="background:#dc3545; color:#fff; padding:25px; border-radius:8px; text-align:center;">
            <div style="font-size:48px; font-weight:bold;"><?= $totalSinistrosAbertos ?></div>
            <div style="font-size:16px; margin-top:8px;">Sinistros em Aberto</div>
        </div>
        <div style="background:#ffc107; color:#000; padding:25px; border-radius:8px; text-align:center;">
            <div style="font-size:48px; font-weight:bold;"><?= $totalContribuicoesPendentes ?></div>
            <div style="font-size:16px; margin-top:8px;">Contribuições Pendentes/atrasadas</div>
        </div>
    </div>

    <h4 style="margin-bottom:15px;">Acesso Rápido</h4>
    <div style="display:grid; grid-template-columns:repeat(3,1fr); gap:15px;">
        <a href="/associados" style="display:block; background:#f8f9fa; border:1px solid #dee2e6; padding:20px; border-radius:8px; text-decoration:none; color:#333; text-align:center;">
            👤 Gerenciar Associados
        </a>
        <a href="/contratos-peculio" style="display:block; background:#f8f9fa; border:1px solid #dee2e6; padding:20px; border-radius:8px; text-decoration:none; color:#333; text-align:center;">
            📄 Gerenciar Contratos
        </a>
        <a href="/contribuicoes/lancar-lote" style="display:block; background:#f8f9fa; border:1px solid #dee2e6; padding:20px; border-radius:8px; text-decoration:none; color:#333; text-align:center;">
            💰 Lançar Contribuições
        </a>
        <a href="/sinistros" style="display:block; background:#f8f9fa; border:1px solid #dee2e6; padding:20px; border-radius:8px; text-decoration:none; color:#333; text-align:center;">
            ⚠️ Gerenciar Sinistros
        </a>
        <a href="/planos-peculio" style="display:block; background:#f8f9fa; border:1px solid #dee2e6; padding:20px; border-radius:8px; text-decoration:none; color:#333; text-align:center;">
            📋 Gerenciar Planos
        </a>
        <a href="/beneficiarios" style="display:block; background:#f8f9fa; border:1px solid #dee2e6; padding:20px; border-radius:8px; text-decoration:none; color:#333; text-align:center;">
            👨‍👩‍👧 Gerenciar Beneficiários
        </a>
    </div>
</div>