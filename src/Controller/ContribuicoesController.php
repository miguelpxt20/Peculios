<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Contribuicoes Controller
 *
 * @property \App\Model\Table\ContribuicoesTable $Contribuicoes
 */
class ContribuicoesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Contribuicoes->find();
        $contribuicoes = $this->paginate($query);

        $this->set(compact('contribuicoes'));
    }

    /**
     * View method
     *
     * @param string|null $id Contribuico id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $contribuico = $this->Contribuicoes->get($id, contain: []);
        $this->set(compact('contribuico'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $contribuico = $this->Contribuicoes->newEmptyEntity();
        if ($this->request->is('post')) {
            $contribuico = $this->Contribuicoes->patchEntity($contribuico, $this->request->getData());
            if ($this->Contribuicoes->save($contribuico)) {
                $this->Flash->success(__('The contribuico has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The contribuico could not be saved. Please, try again.'));
        }
        $this->set(compact('contribuico'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Contribuico id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $contribuico = $this->Contribuicoes->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $contribuico = $this->Contribuicoes->patchEntity($contribuico, $this->request->getData());
            if ($this->Contribuicoes->save($contribuico)) {
                $this->Flash->success(__('The contribuico has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The contribuico could not be saved. Please, try again.'));
        }
        $this->set(compact('contribuico'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Contribuico id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $contribuico = $this->Contribuicoes->get($id);
        if ($this->Contribuicoes->delete($contribuico)) {
            $this->Flash->success(__('The contribuico has been deleted.'));
        } else {
            $this->Flash->error(__('The contribuico could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
