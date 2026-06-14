<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Associados Controller
 *
 * @property \App\Model\Table\AssociadosTable $Associados
 */
class AssociadosController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Associados->find();
        $associados = $this->paginate($query);

        $this->set(compact('associados'));
    }

    /**
     * View method
     *
     * @param string|null $id Associado id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $associado = $this->Associados->get($id, contain: ['ContratosPeculio']);
        $this->set(compact('associado'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $associado = $this->Associados->newEmptyEntity();
        if ($this->request->is('post')) {
            $associado = $this->Associados->patchEntity($associado, $this->request->getData());
            if ($this->Associados->save($associado)) {
                $this->Flash->success(__('The associado has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The associado could not be saved. Please, try again.'));
        }
        $this->set(compact('associado'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Associado id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $associado = $this->Associados->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $associado = $this->Associados->patchEntity($associado, $this->request->getData());
            if ($this->Associados->save($associado)) {
                $this->Flash->success(__('The associado has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The associado could not be saved. Please, try again.'));
        }
        $this->set(compact('associado'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Associado id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $associado = $this->Associados->get($id);
        if ($this->Associados->delete($associado)) {
            $this->Flash->success(__('The associado has been deleted.'));
        } else {
            $this->Flash->error(__('The associado could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
