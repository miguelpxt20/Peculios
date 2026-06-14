<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * ContratosPeculio Controller
 *
 * @property \App\Model\Table\ContratosPeculioTable $ContratosPeculio
 */
class ContratosPeculioController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
   public function index()
{
    $query = $this->ContratosPeculio->find()
        ->contain(['Associados', 'PlanosPeculio']);
    $contratosPeculio = $this->paginate($query);

    $this->set(compact('contratosPeculio'));
}

    /**
     * View method
     *
     * @param string|null $id Contratos Peculio id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $contratosPeculioEntity = $this->ContratosPeculio->get($id, contain: ['Associados']);
        $this->set(compact('contratosPeculioEntity'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $contratosPeculioEntity = $this->ContratosPeculio->newEmptyEntity();
        if ($this->request->is('post')) {
            $contratosPeculioEntity = $this->ContratosPeculio->patchEntity($contratosPeculioEntity, $this->request->getData());
            if ($this->ContratosPeculio->save($contratosPeculioEntity)) {
                $this->Flash->success(__('The contratos peculio has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The contratos peculio could not be saved. Please, try again.'));
        }
        $associados = $this->ContratosPeculio->Associados->find('list', limit: 200)->all();
        $this->set(compact('contratosPeculioEntity', 'associados'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Contratos Peculio id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $contratosPeculioEntity = $this->ContratosPeculio->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $contratosPeculioEntity = $this->ContratosPeculio->patchEntity($contratosPeculioEntity, $this->request->getData());
            if ($this->ContratosPeculio->save($contratosPeculioEntity)) {
                $this->Flash->success(__('The contratos peculio has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The contratos peculio could not be saved. Please, try again.'));
        }
        $associados = $this->ContratosPeculio->Associados->find('list', limit: 200)->all();
        $this->set(compact('contratosPeculioEntity', 'associados'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Contratos Peculio id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $contratosPeculioEntity = $this->ContratosPeculio->get($id);
        if ($this->ContratosPeculio->delete($contratosPeculioEntity)) {
            $this->Flash->success(__('The contratos peculio has been deleted.'));
        } else {
            $this->Flash->error(__('The contratos peculio could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
