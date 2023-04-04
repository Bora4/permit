<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Http\Client;
use Cake\Http\Response;
use Cake\Http\ServerRequest;

/**
 * Permits Controller
 *
 * @property \App\Model\Table\PermitsTable $Permits
 *
 * @method \App\Model\Entity\Permit[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PermitsController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('AddPermit');
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users']
        ];
        $permits = $this->paginate($this->Permits);

        $this->set(compact('permits'));
    }

    /**
     * View method
     *
     * @param string|null $id Permit id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $permit = $this->Permits->get($id, [
            'contain' => ['Users']
        ]);

        $this->set('permit', $permit);
    }

    public function alertSlack()
    {

        $data = ['text' => 'hello from cake'];
        $http = new Client();
        $response = $http->post(
            'https://hooks.slack.com/services/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',
            json_encode($data),
            ['type' => 'json']
          );

          return $response;
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        if ($this->request->is('post')) {
            if ($this->AddPermit->addPermit) {
                $this->Flash->success(__('The permit has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The permit could not be saved. Please, try again.'));
        }
        $users = $this->Permits->Users->find('list', ['limit' => 200]);
        $this->set(compact('permit', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Permit id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $permit = $this->Permits->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $permit = $this->Permits->patchEntity($permit, $this->request->getData());
            if ($this->Permits->save($permit)) {
                $this->Flash->success(__('The permit has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The permit could not be saved. Please, try again.'));
        }
        $users = $this->Permits->Users->find('list', ['limit' => 200]);
        $this->set(compact('permit', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Permit id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $permit = $this->Permits->get($id);
        if ($this->Permits->delete($permit)) {
            $this->Flash->success(__('The permit has been deleted.'));
        } else {
            $this->Flash->error(__('The permit could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    
}
?>