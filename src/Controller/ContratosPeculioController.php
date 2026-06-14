<?php
declare(strict_types=1);

namespace App\Controller;

class ContratosPeculioController extends AppController
{
    public function index()
    {
        $query = $this->ContratosPeculio->find()
            ->contain(['Associados', 'PlanosPeculio']);
        $contratosPeculio = $this->paginate($query);

        $this->set(compact('contratosPeculio'));
    }

    public function view($id = null)
    {
        $contrato = $this->ContratosPeculio->get($id, contain: [
            'Associados',
            'PlanosPeculio',
            'Beneficiarios',
            'Contribuicoes',
            'Sinistros',
        ]);
        $this->set(compact('contrato'));
    }

    public function add()
    {
        $contrato = $this->ContratosPeculio->newEmptyEntity();
        if ($this->request->is('post')) {
            $contrato = $this->ContratosPeculio->patchEntity($contrato, $this->request->getData());
            
            // Validar que associado está ativo
            $associado = $this->ContratosPeculio->Associados->get($contrato->associado_id);
            if ($associado->situacao !== 'ativo') {
                $this->Flash->error('Apenas associados ativos podem ter contratos.');
            } else {
                // Validar que não existe contrato vigente para o mesmo plano
                $contratoExistente = $this->ContratosPeculio->find()
                    ->where([
                        'associado_id' => $contrato->associado_id,
                        'plano_id' => $contrato->plano_id,
                        'status' => 'vigente',
                    ])->first();

                if ($contratoExistente) {
                    $this->Flash->error('Este associado já possui um contrato vigente para este plano.');
                } elseif ($this->ContratosPeculio->save($contrato)) {
                    $this->Flash->success('Contrato criado com sucesso!');
                    return $this->redirect(['action' => 'index']);
                } else {
                    $this->Flash->error('Erro ao salvar o contrato. Verifique os campos.');
                }
            }
        }
        $associados = $this->ContratosPeculio->Associados->find('list', keyField: 'id', valueField: 'nome')->all();
        $planos = $this->ContratosPeculio->PlanosPeculio->find('list', keyField: 'id', valueField: 'nome')->all();
        $this->set(compact('contrato', 'associados', 'planos'));
    }

    public function edit($id = null)
    {
        $contrato = $this->ContratosPeculio->get($id);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $contrato = $this->ContratosPeculio->patchEntity($contrato, $this->request->getData());
            if ($this->ContratosPeculio->save($contrato)) {
                $this->Flash->success('Contrato atualizado com sucesso!');
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error('Erro ao atualizar o contrato.');
        }
        $associados = $this->ContratosPeculio->Associados->find('list', keyField: 'id', valueField: 'nome')->all();
        $planos = $this->ContratosPeculio->PlanosPeculio->find('list', keyField: 'id', valueField: 'nome')->all();
        $this->set(compact('contrato', 'associados', 'planos'));
    }

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $contrato = $this->ContratosPeculio->get($id);
        if ($this->ContratosPeculio->delete($contrato)) {
            $this->Flash->success('Contrato excluído com sucesso!');
        } else {
            $this->Flash->error('Erro ao excluir o contrato.');
        }

        return $this->redirect(['action' => 'index']);
    }
}