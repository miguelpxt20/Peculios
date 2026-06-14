<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\I18n\Date;

class SinistrosController extends AppController
{
    public function index()
    {
        $query = $this->Sinistros->find()
            ->contain(['ContratosPeculio' => ['Associados']]);
        $sinistros = $this->paginate($query);
        $this->set(compact('sinistros'));
    }

    public function view($id = null)
    {
        $sinistro = $this->Sinistros->get($id, contain: [
            'ContratosPeculio' => ['Associados', 'PlanosPeculio', 'Beneficiarios'],
        ]);
        $this->set(compact('sinistro'));
    }

    public function abrir($contrato_id = null)
    {
        $contrato = $this->Sinistros->ContratosPeculio->get($contrato_id, contain: [
            'PlanosPeculio',
            'Beneficiarios',
            'Contribuicoes',
        ]);

        // Verificar se contrato está vigente
        if ($contrato->status !== 'vigente') {
            $this->Flash->error('Este contrato não está vigente e não pode ter sinistro aberto.');
            return $this->redirect(['controller' => 'ContratosPeculio', 'action' => 'index']);
        }

        // Verificar carência
        $dataInicio = $contrato->data_inicio;
        $hoje = new Date('now');
        $mesesDecorridos = $dataInicio->diffInMonths($hoje);

        if ($mesesDecorridos < $contrato->planos_peculio->carencia_meses) {
            $this->Flash->error("Carência não cumprida. São necessários {$contrato->planos_peculio->carencia_meses} meses. Decorridos: {$mesesDecorridos} meses.");
            return $this->redirect(['controller' => 'ContratosPeculio', 'action' => 'index']);
        }

        // Verificar contribuições atrasadas
        $atrasadas = array_filter($contrato->contribuicoes, fn($c) => $c->status === 'atrasada');
        $observacao = '';
        if (!empty($atrasadas)) {
            $observacao = 'ATENÇÃO: Existem ' . count($atrasadas) . ' contribuição(ões) atrasada(s).';
        }

        $sinistro = $this->Sinistros->newEmptyEntity();

        if ($this->request->is('post')) {
            $sinistro = $this->Sinistros->patchEntity($sinistro, $this->request->getData());
            $sinistro->contrato_id = $contrato_id;
            $sinistro->data_abertura = new Date('now');
            $sinistro->status = 'aberto';
            $sinistro->valor_calculado = $contrato->planos_peculio->valor_cobertura;
            $sinistro->observacao = $observacao;

            // Usar transação para garantir atomicidade
            $connection = $this->Sinistros->getConnection();
            $connection->begin();

            try {
                $this->Sinistros->save($sinistro);

                // Atualizar status do contrato para sinistrado
                $contrato->status = 'sinistrado';
                $this->Sinistros->ContratosPeculio->save($contrato);

                $connection->commit();

                $valorFormatado = 'R$ ' . number_format((float)$sinistro->valor_calculado, 2, ',', '.');
                $this->Flash->success("Sinistro aberto com sucesso. Valor calculado: {$valorFormatado}");
                return $this->redirect(['action' => 'view', $sinistro->id]);
            } catch (\Exception $e) {
                $connection->rollback();
                $this->Flash->error('Erro ao abrir sinistro. Tente novamente.');
            }
        }

        $this->set(compact('sinistro', 'contrato', 'observacao'));
    }

    public function aprovar($id = null)
    {
        $sinistro = $this->Sinistros->get($id, contain: ['ContratosPeculio']);
        $sinistro->status = 'aprovado';
        $this->Sinistros->save($sinistro);
        $this->Flash->success('Sinistro aprovado com sucesso!');
        return $this->redirect(['action' => 'view', $id]);
    }

    public function recusar($id = null)
    {
        $sinistro = $this->Sinistros->get($id);
        $sinistro->status = 'recusado';
        $this->Sinistros->save($sinistro);
        $this->Flash->success('Sinistro recusado.');
        return $this->redirect(['action' => 'view', $id]);
    }

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $sinistro = $this->Sinistros->get($id);
        if ($this->Sinistros->delete($sinistro)) {
            $this->Flash->success('Sinistro excluído com sucesso!');
        } else {
            $this->Flash->error('Erro ao excluir o sinistro.');
        }
        return $this->redirect(['action' => 'index']);
    }
}