<?php
declare(strict_types=1);

namespace App\Controller;

class BeneficiariosController extends AppController
{
    public function index()
    {
        $query = $this->Beneficiarios->find()
            ->contain(['ContratosPeculio']);
        $beneficiarios = $this->paginate($query);
        $this->set(compact('beneficiarios'));
    }

    public function view($id = null)
    {
        $beneficiario = $this->Beneficiarios->get($id, contain: ['ContratosPeculio']);
        $this->set(compact('beneficiario'));
    }

    public function add()
    {
        $beneficiario = $this->Beneficiarios->newEmptyEntity();
        if ($this->request->is('post')) {
            $beneficiario = $this->Beneficiarios->patchEntity($beneficiario, $this->request->getData());
            if ($this->Beneficiarios->save($beneficiario)) {
                $this->Flash->success('Beneficiário cadastrado com sucesso!');
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error('Erro ao cadastrar beneficiário. Verifique os campos.');
        }
        $contratos = $this->Beneficiarios->ContratosPeculio->find('list', keyField: 'id', valueField: 'numero_contrato')->all();
        $this->set(compact('beneficiario', 'contratos'));
    }

    public function edit($id = null)
    {
        $beneficiario = $this->Beneficiarios->get($id);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $beneficiario = $this->Beneficiarios->patchEntity($beneficiario, $this->request->getData());
            if ($this->Beneficiarios->save($beneficiario)) {
                $this->Flash->success('Beneficiário atualizado com sucesso!');
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error('Erro ao atualizar beneficiário.');
        }
        $contratos = $this->Beneficiarios->ContratosPeculio->find('list', keyField: 'id', valueField: 'numero_contrato')->all();
        $this->set(compact('beneficiario', 'contratos'));
    }

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $beneficiario = $this->Beneficiarios->get($id);
        if ($this->Beneficiarios->delete($beneficiario)) {
            $this->Flash->success('Beneficiário excluído com sucesso!');
        } else {
            $this->Flash->error('Erro ao excluir beneficiário.');
        }
        return $this->redirect(['action' => 'index']);
    }
}