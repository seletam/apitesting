<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Grievances Controller
 *
 * @property \App\Model\Table\GrievancesTable $Grievances
 */
class GrievancesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users']
        ];
        $grievances = $this->paginate($this->Grievances);

        $this->set(compact('grievances'));
        $this->set('_serialize', ['grievances']);
    }

    /**
     * View method
     *
     * @param string|null $id Grievance id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $grievance = $this->Grievances->get($id, [
            'contain' => ['Users']
        ]);

        $this->set('grievance', $grievance);
        $this->set('_serialize', ['grievance']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $grievance = $this->Grievances->newEntity();
        if ($this->request->is('post')) {
            $grievance = $this->Grievances->patchEntity($grievance, $this->request->getData());
            if ($this->Grievances->save($grievance)) {
                $this->Flash->success(__('The grievance has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The grievance could not be saved. Please, try again.'));
        }
        $users = $this->Grievances->Users->find('list', ['limit' => 200]);
        $this->set(compact('grievance', 'users'));
        $this->set('_serialize', ['grievance']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Grievance id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $grievance = $this->Grievances->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $grievance = $this->Grievances->patchEntity($grievance, $this->request->getData());
            if ($this->Grievances->save($grievance)) {
                $this->Flash->success(__('The grievance has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The grievance could not be saved. Please, try again.'));
        }
        $users = $this->Grievances->Users->find('list', ['limit' => 200]);
        $this->set(compact('grievance', 'users'));
        $this->set('_serialize', ['grievance']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Grievance id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $grievance = $this->Grievances->get($id);
        if ($this->Grievances->delete($grievance)) {
            $this->Flash->success(__('The grievance has been deleted.'));
        } else {
            $this->Flash->error(__('The grievance could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
