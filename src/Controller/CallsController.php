<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Calls Controller
 *
 * @property \App\Model\Table\CallsTable $Calls
 */
class CallsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        //$this->paginate = ;
        $calls = $this->Calls->find('all' , [
            'contain' => ['SupportGroups' => ['fields' => ['name']], 'ActiveCalls' => ['Users' => ['fields' => ['names', 'surname']]]]
        ])->where(['status !=' => 0]);

        $this->set(compact('calls'));
        $this->set('_serialize', ['calls']);
    }
	
	public function resolved()
    {
        //$this->paginate = ;
        $calls = $this->Calls->find('all', [
            'contain' => ['SupportGroups', 'ActiveCalls' => 'Users']
        ])->where(['status !=' => 1]);

        $this->set(compact('calls'));
        $this->set('_serialize', ['calls']);
    }

    /**
     * View method
     *
     * @param string|null $id Call id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $call = $this->Calls->get($id, [
            'contain' => ['SupportGroups', 'ActiveCalls' => 'Users']
        ]);

        $this->set('call', $call);
        $this->set('_serialize', ['call']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $call = $this->Calls->newEntity();
		//debug($this->params);
        if ($this->request->is('post')) {
			
			
            $call = $this->Calls->patchEntity($call, $this->request->getData());
            if ($this->Calls->save($call)) {
                $this->Flash->success(__('The call has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The call could not be saved. Please, try again.'));
        }
        $supportGroups = $this->Calls->SupportGroups->find('list', ['limit' => 200]);
        $this->set(compact('call', 'supportGroups'));
        $this->set('_serialize', ['call']);
    }
	
	//create
	public function create($data)
    {
        $data = $this->Calls->newEntity();
		//debug($this->params);
        if ($this->request->is('post')) {
			
			
            $data = $this->Calls->patchEntity($data, $this->request->getData());
            if ($this->Calls->save($data)) {
                $this->Flash->success(__('The call has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The call could not be saved. Please, try again.'));
        }
        $supportGroups = $this->Calls->SupportGroups->find('list', ['limit' => 200]);
        $this->set(compact('call', 'supportGroups'));
        $this->set('_serialize', ['call']);
    }
	
    /**
     * Edit method
     *
     * @param string|null $id Call id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $call = $this->Calls->get($id, [
            'contain' => []
        ]);
		//debug($this->request->data);
		//$this->request->data['name'] = '';
        if ($this->request->is(['patch', 'post', 'put'])) {
            $call = $this->Calls->patchEntity($call, $this->request->getData());
            if ($this->Calls->save($call)) {
                $this->Flash->success(__('The call has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The call could not be saved. Please, try again.'));
        }
        $supportGroups = $this->Calls->SupportGroups->find('list');
        $this->set(compact('call', ['supportGroups']));
        $this->set('_serialize', ['call']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Call id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $call = $this->Calls->get($id);
        if ($this->Calls->delete($call)) {
            $this->Flash->success(__('The call has been deleted.'));
        } else {
            $this->Flash->error(__('The call could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
