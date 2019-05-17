<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * MassExportQueue Controller
 *
 * @property \App\Model\Table\MassExportQueueTable $MassExportQueue
 *
 * @method \App\Model\Entity\MassExportQueue[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MassExportQueueController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['CmsUsers']
        ];
        $massExportQueue = $this->paginate($this->MassExportQueue);

        $this->set(compact('massExportQueue'));
    }

    /**
     * View method
     *
     * @param string|null $id Mass Export Queue id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $massExportQueue = $this->MassExportQueue->get($id, [
            'contain' => ['CmsUsers']
        ]);

        $this->set('massExportQueue', $massExportQueue);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $massExportQueue = $this->MassExportQueue->newEntity();
        if ($this->request->is('post')) {
            $massExportQueue = $this->MassExportQueue->patchEntity($massExportQueue, $this->request->getData());
            if ($this->MassExportQueue->save($massExportQueue)) {
                $this->Flash->success(__('The mass export queue has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The mass export queue could not be saved. Please, try again.'));
        }
        $cmsUsers = $this->MassExportQueue->CmsUsers->find('list', ['limit' => 200]);
        $this->set(compact('massExportQueue', 'cmsUsers'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Mass Export Queue id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $massExportQueue = $this->MassExportQueue->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $massExportQueue = $this->MassExportQueue->patchEntity($massExportQueue, $this->request->getData());
            if ($this->MassExportQueue->save($massExportQueue)) {
                $this->Flash->success(__('The mass export queue has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The mass export queue could not be saved. Please, try again.'));
        }
        $cmsUsers = $this->MassExportQueue->CmsUsers->find('list', ['limit' => 200]);
        $this->set(compact('massExportQueue', 'cmsUsers'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Mass Export Queue id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $massExportQueue = $this->MassExportQueue->get($id);
        if ($this->MassExportQueue->delete($massExportQueue)) {
            $this->Flash->success(__('The mass export queue has been deleted.'));
        } else {
            $this->Flash->error(__('The mass export queue could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
