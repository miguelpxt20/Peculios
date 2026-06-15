<?php
declare(strict_types=1);

namespace App\Controller;

class PlanosPeculioController extends AppController
{
    public function index()
    {
        $query = $this->PlanosPeculio->find();
        $planosPeculio = $this->paginate($query);
        $this->set(compact('planosPeculio'));
    }

    public function view($id = null)
    {
        $planosPeculio = $this->PlanosPeculio->get($id);
        $this->set(compact('planosPeculio'));
    }

    public function add()
    {
        $planosPeculio = $this->PlanosPeculio->newEmptyEntity();
        if ($this->request->is('post')) {
            $planosPeculio = $this->PlanosPeculio->patchEntity($planosPeculio, $this->request->getData());
            if ($this->PlanosPeculio->save($planosPeculio)) {
                $this->Flash->success('Plano cadastrado com sucesso!');
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error('Erro ao cadastrar plano.');
        }
        $this->set(compact('planosPeculio'));
    }

    public function edit($id = null)
    {
        $planosPeculio = $this->PlanosPeculio->get($id);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $planosPeculio = $this->PlanosPeculio->patchEntity($planosPeculio, $this->request->getData());
            if ($this->PlanosPeculio->save($planosPeculio)) {
                $this->Flash->success('Plano atualizado com sucesso!');
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error('Erro ao atualizar plano.');
        }
        $this->set(compact('planosPeculio'));
    }

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $planosPeculio = $this->PlanosPeculio->get($id);
        if ($this->PlanosPeculio->delete($planosPeculio)) {
            $this->Flash->success('Plano excluído com sucesso!');
        } else {
            $this->Flash->error('Erro ao excluir plano.');
        }
        return $this->redirect(['action' => 'index']);
    }
}