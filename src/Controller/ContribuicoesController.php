<?php
declare(strict_types=1);

namespace App\Controller;

class ContribuicoesController extends AppController
{
    public function index()
    {
        $query = $this->Contribuicoes->find()
            ->contain(['ContratosPeculio']);
        $contribuicoes = $this->paginate($query);

        $this->set(compact('contribuicoes'));
    }

    public function view($id = null)
    {
        $contribuicao = $this->Contribuicoes->get($id, contain: ['ContratosPeculio']);
        $this->set(compact('contribuicao'));
    }

    public function lancarLote()
{
    if ($this->request->is('post')) {
        $competencia = $this->request->getData('competencia');

        if (empty($competencia)) {
            $this->Flash->error('Informe a competência (mês/ano).');
            $this->set('competencia', null);
            return;
        }

        // Formatar competência para YYYY-MM-01
        $partes = explode('-', $competencia);
        $competenciaFormatada = $partes[0] . '-' . $partes[1] . '-01';

        // Buscar todos os contratos vigentes com seus planos
        $contratos = $this->Contribuicoes->ContratosPeculio->find()
            ->contain(['PlanosPeculio'])
            ->where(['ContratosPeculio.status' => 'vigente'])
            ->all();

        $inseridos = 0;
        $ignorados = 0;
        $novasContribuicoes = [];

        foreach ($contratos as $contrato) {
            // Verificar se já existe contribuição para essa competência (idempotência)
            $existe = $this->Contribuicoes->find()
                ->where([
                    'contrato_id' => $contrato->id,
                    'competencia' => $competenciaFormatada,
                ])->first();

            if ($existe) {
                $ignorados++;
                continue;
            }

            // Calcular valor: percentual_contribuicao * valor_cobertura
            $valor = $contrato->planos_peculio->percentual_contribuicao
                   * $contrato->planos_peculio->valor_cobertura;

            $novasContribuicoes[] = [
                'contrato_id'    => $contrato->id,
                'competencia'    => $competenciaFormatada,
                'valor'          => round($valor, 2),
                'status'         => 'pendente',
                'data_pagamento' => null,
                'created'        => date('Y-m-d H:i:s'),
                'modified'       => date('Y-m-d H:i:s'),
            ];
            $inseridos++;
        }

        // Inserir em batch usando saveMany
        if (!empty($novasContribuicoes)) {
            $entities = $this->Contribuicoes->newEntities($novasContribuicoes);
            $this->Contribuicoes->saveMany($entities);
        }

        $this->Flash->success("Lançamento concluído! {$inseridos} contribuições geradas, {$ignorados} já existiam.");
        return $this->redirect(['action' => 'lancarLote']);
    }

    $this->set('competencia', null);
}
    public function edit($id = null)
    {
        $contribuicao = $this->Contribuicoes->get($id);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $contribuicao = $this->Contribuicoes->patchEntity($contribuicao, $this->request->getData());
            if ($this->Contribuicoes->save($contribuicao)) {
                $this->Flash->success('Contribuição atualizada com sucesso!');
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error('Erro ao atualizar a contribuição.');
        }
       $this->set('contribuicao', $contribuicao);
       
    }

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $contribuicao = $this->Contribuicoes->get($id);
        if ($this->Contribuicoes->delete($contribuicao)) {
            $this->Flash->success('Contribuição excluída com sucesso!');
        } else {
            $this->Flash->error('Erro ao excluir a contribuição.');
        }

        return $this->redirect(['action' => 'index']);
    }
}