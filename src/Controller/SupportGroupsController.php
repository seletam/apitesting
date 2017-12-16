<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * SupportGroups Controller
 *
 * @property \App\Model\Table\SupportGroupsTable $SupportGroups
 */
class SupportGroupsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $supportGroups = $this->paginate($this->SupportGroups);

        $this->set(compact('supportGroups'));
        $this->set('_serialize', ['supportGroups']);
    }

    /**
     * View method
     *
     * @param string|null $id Support Group id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $supportGroup = $this->SupportGroups->get($id, [
            'contain' => []
        ]);

        $this->set('supportGroup', $supportGroup);
        $this->set('_serialize', ['supportGroup']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $supportGroup = $this->SupportGroups->newEntity();
        if ($this->request->is('post')) {
            $supportGroup = $this->SupportGroups->patchEntity($supportGroup, $this->request->getData());
            if ($this->SupportGroups->save($supportGroup)) {
                $this->Flash->success(__('The support group has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The support group could not be saved. Please, try again.'));
        }
        $this->set(compact('supportGroup'));
        $this->set('_serialize', ['supportGroup']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Support Group id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $supportGroup = $this->SupportGroups->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $supportGroup = $this->SupportGroups->patchEntity($supportGroup, $this->request->getData());
            if ($this->SupportGroups->save($supportGroup)) {
                $this->Flash->success(__('The support group has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The support group could not be saved. Please, try again.'));
        }
        $this->set(compact('supportGroup'));
        $this->set('_serialize', ['supportGroup']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Support Group id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $supportGroup = $this->SupportGroups->get($id);
        if ($this->SupportGroups->delete($supportGroup)) {
            $this->Flash->success(__('The support group has been deleted.'));
        } else {
            $this->Flash->error(__('The support group could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
