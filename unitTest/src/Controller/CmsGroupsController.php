<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * CmsGroups Controller
 *
 *
 * @method \App\Model\Entity\CmsGroup[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CmsGroupsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $cmsGroups = $this->paginate($this->CmsGroups);

        $this->set(compact('cmsGroups'));
    }

    /**
     * View method
     *
     * @param string|null $id Cms Group id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $cmsGroup = $this->CmsGroups->get($id, [
            'contain' => []
        ]);

        $this->set('cmsGroup', $cmsGroup);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $cmsGroup = $this->CmsGroups->newEntity();
        if ($this->request->is('post')) {
            $cmsGroup = $this->CmsGroups->patchEntity($cmsGroup, $this->request->getData());
            if ($this->CmsGroups->save($cmsGroup)) {
                $this->Flash->success(__('The cms group has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The cms group could not be saved. Please, try again.'));
        }
        $this->set(compact('cmsGroup'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Cms Group id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $cmsGroup = $this->CmsGroups->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $cmsGroup = $this->CmsGroups->patchEntity($cmsGroup, $this->request->getData());
            if ($this->CmsGroups->save($cmsGroup)) {
                $this->Flash->success(__('The cms group has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The cms group could not be saved. Please, try again.'));
        }
        $this->set(compact('cmsGroup'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Cms Group id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $cmsGroup = $this->CmsGroups->get($id);
        if ($this->CmsGroups->delete($cmsGroup)) {
            $this->Flash->success(__('The cms group has been deleted.'));
        } else {
            $this->Flash->error(__('The cms group could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
