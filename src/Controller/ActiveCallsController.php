<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ActiveCalls Controller
 *
 * @property \App\Model\Table\ActiveCallsTable $ActiveCalls
 */
class ActiveCallsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Calls', 'Users']
        ];
        $activeCalls = $this->ActiveCalls->find('all');

        $this->set(compact('activeCalls'));
        $this->set('_serialize', ['activeCalls']);
    }

    /**
     * View method
     *
     * @param string|null $id Active Call id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $activeCall = $this->ActiveCalls->get($id, [
            'contain' => ['Calls', 'Users', 'ActiveCallsCalls', 'ActiveCallsUsers']
        ]);

        $this->set('activeCall', $activeCall);
        $this->set('_serialize', ['activeCall']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $activeCall = $this->ActiveCalls->newEntity();
        if ($this->request->is('post')) {
            $activeCall = $this->ActiveCalls->patchEntity($activeCall, $this->request->getData());
            if ($this->ActiveCalls->save($activeCall)) {
                $this->Flash->success(__('The active call has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The active call could not be saved. Please, try again.'));
        }
        $calls = $this->ActiveCalls->Calls->find('list', ['limit' => 200]);
        $users = $this->ActiveCalls->Users->find('list', ['limit' => 200]);
        $this->set(compact('activeCall', 'calls', 'users'));
        $this->set('_serialize', ['activeCall']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Active Call id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $activeCall = $this->ActiveCalls->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $activeCall = $this->ActiveCalls->patchEntity($activeCall, $this->request->getData());
            if ($this->ActiveCalls->save($activeCall)) {
                $this->Flash->success(__('The active call has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The active call could not be saved. Please, try again.'));
        }
        $calls = $this->ActiveCalls->Calls->find('list', ['limit' => 200]);
        $users = $this->ActiveCalls->Users->find('list', ['limit' => 200]);
        $this->set(compact('activeCall', 'calls', 'users'));
        $this->set('_serialize', ['activeCall']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Active Call id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $activeCall = $this->ActiveCalls->get($id);
        if ($this->ActiveCalls->delete($activeCall)) {
            $this->Flash->success(__('The active call has been deleted.'));
        } else {
            $this->Flash->error(__('The active call could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
