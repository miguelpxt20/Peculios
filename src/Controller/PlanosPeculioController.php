<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * PlanosPeculio Controller
 *
 * @property \App\Model\Table\PlanosPeculioTable $PlanosPeculio
 */
class PlanosPeculioController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->PlanosPeculio->find();
        $planosPeculio = $this->paginate($query);

        $this->set(compact('planosPeculio'));
    }

    /**
     * View method
     *
     * @param string|null $id Planos Peculio id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $planosPeculioEntity = $this->PlanosPeculio->get($id, contain: []);
        $this->set(compact('planosPeculioEntity'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $planosPeculioEntity = $this->PlanosPeculio->newEmptyEntity();
        if ($this->request->is('post')) {
            $planosPeculioEntity = $this->PlanosPeculio->patchEntity($planosPeculioEntity, $this->request->getData());
            if ($this->PlanosPeculio->save($planosPeculioEntity)) {
                $this->Flash->success(__('The planos peculio has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The planos peculio could not be saved. Please, try again.'));
        }
        $this->set(compact('planosPeculioEntity'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Planos Peculio id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $planosPeculioEntity = $this->PlanosPeculio->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $planosPeculioEntity = $this->PlanosPeculio->patchEntity($planosPeculioEntity, $this->request->getData());
            if ($this->PlanosPeculio->save($planosPeculioEntity)) {
                $this->Flash->success(__('The planos peculio has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The planos peculio could not be saved. Please, try again.'));
        }
        $this->set(compact('planosPeculioEntity'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Planos Peculio id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $planosPeculioEntity = $this->PlanosPeculio->get($id);
        if ($this->PlanosPeculio->delete($planosPeculioEntity)) {
            $this->Flash->success(__('The planos peculio has been deleted.'));
        } else {
            $this->Flash->error(__('The planos peculio could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
