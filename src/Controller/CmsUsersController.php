<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * CmsUsers Controller
 *
 * @property \App\Model\Table\CmsUsersTable $CmsUsers
 *
 * @method \App\Model\Entity\CmsUser[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CmsUsersController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['CmsGroups']
        ];
        $cmsUsers = $this->paginate($this->CmsUsers);

        $this->set(compact('cmsUsers'));
    }

    /**
     * View method
     *
     * @param string|null $id Cms User id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $cmsUser = $this->CmsUsers->get($id, [
            'contain' => ['CmsGroups', 'MassExportQueue']
        ]);

        $this->set('cmsUser', $cmsUser);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $cmsUser = $this->CmsUsers->newEntity();
        if ($this->request->is('post')) {
            $cmsUser = $this->CmsUsers->patchEntity($cmsUser, $this->request->getData());
            if ($this->CmsUsers->save($cmsUser)) {
                $this->Flash->success(__('The cms user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The cms user could not be saved. Please, try again.'));
        }
        $cmsGroups = $this->CmsUsers->CmsGroups->find('list', ['limit' => 200]);
        $this->set(compact('cmsUser', 'cmsGroups'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Cms User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $cmsUser = $this->CmsUsers->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $cmsUser = $this->CmsUsers->patchEntity($cmsUser, $this->request->getData());
            if ($this->CmsUsers->save($cmsUser)) {
                $this->Flash->success(__('The cms user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The cms user could not be saved. Please, try again.'));
        }
        $cmsGroups = $this->CmsUsers->CmsGroups->find('list', ['limit' => 200]);
        $this->set(compact('cmsUser', 'cmsGroups'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Cms User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $cmsUser = $this->CmsUsers->get($id);
        if ($this->CmsUsers->delete($cmsUser)) {
            $this->Flash->success(__('The cms user has been deleted.'));
        } else {
            $this->Flash->error(__('The cms user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
