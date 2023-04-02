<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Http\ServerRequest;
use Cake\Http\Response;
use Cake\ORM\TableRegistry;
use Cake\Http\Client;

/**
 * Permits Controller
 *
 * @property \App\Model\Table\PermitsTable $Permits
 *
 * @method \App\Model\Entity\Permit[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */


class SlacksController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('RequestHandler');
    }

    public function invokeslack(){

        $http = new Client();

        $response = $http->get('https://hooks.slack.com/services/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');

        return $response;
    }

    public function remainingpermits()
    {
        $this->request->allowMethod(['post', 'get']);

        $users = TableRegistry::getTableLocator()->get('Users');

        $user_name = $this->request->getQuery('user_name');

        $user = $users->find()->where(['name' => $user_name]);

        $permitleft = $user->select(['permitleft']);

        $response = $this->response->withType('application/json')->withStringBody(json_encode(['text' => $permitleft]));

        return $response;


    }

    public function mypermits(){

        $this->request->allowMethod(['post', 'get']);

        $users = TableRegistry::getTableLocator()->get('Users');
        $permits = TableRegistry::getTableLocator()->get('Permits');

        $user_name = $this->request->getQuery('user_name');

        $user = $users->find()->where(['name' => $user_name]);

        $remainingpermits = $permits->find()->where(['user_id' => $user->select(['id'])])->toList();

        $response = $this->response->withType('application/json')->withStringBody(json_encode(['text' => $remainingpermits]));

        return $response;



    }

    public function addpermit(){

        $this->request->allowMethod(['post', 'get']);

        $users = TableRegistry::getTableLocator()->get('Users');
        $permits = TableRegistry::getTableLocator()->get('Permits');

        $text = $this->request->getQuery('text');

        $user_name = $this->request->getQuery('user_name');

        $user = $users->find()->where(['name' => $user_name]);

        $vars = explode(" ", $text);

        $startdate = date("Y-m-d H:i:s");

        $daycount = intval($vars[2]);

        $d=strtotime("+" . $vars[2] . "Days");

        $enddate = date("Y-m-d H:i:s", $d);

        $http = new Client();

        $request = $http->post('http://localhost/permit/permits/add',[
            'startdate' => $startdate,
            'enddate' => $enddate,
            'reason' => $vars[3],
            'user_id' => $user->select(['id'])
        ]);

        $request = null;
        $http = null;

        $response = $this->response->withType('application/json')->withStringBody(json_encode([]));

        return $response;

    }



    // public function view($id)
    // {
    //     $recipe = $this->Recipes->get($id);
    //     $this->set([
    //         'recipe' => $recipe,
    //         '_serialize' => ['recipe']
    //     ]);
    // }

    // public function add()
    // {
    //     $this->request->allowMethod(['post', 'put']);
    //     $recipe = $this->Recipes->newEntity($this->request->getData());
    //     if ($this->Recipes->save($recipe)) {
    //         $message = 'Saved';
    //     } else {
    //         $message = 'Error';
    //     }
    //     $this->set([
    //         'message' => $message,
    //         'recipe' => $recipe,
    //         '_serialize' => ['message', 'recipe']
    //     ]);
    // }

    // public function edit($id)
    // {
    //     $this->request->allowMethod(['patch', 'post', 'put']);
    //     $recipe = $this->Recipes->get($id);
    //     $recipe = $this->Recipes->patchEntity($recipe, $this->request->getData());
    //     if ($this->Recipes->save($recipe)) {
    //         $message = 'Saved';
    //     } else {
    //         $message = 'Error';
    //     }
    //     $this->set([
    //         'message' => $message,
    //         '_serialize' => ['message']
    //     ]);
    // }

    // public function delete($id)
    // {
    //     $this->request->allowMethod(['delete']);
    //     $recipe = $this->Recipes->get($id);
    //     $message = 'Deleted';
    //     if (!$this->Recipes->delete($recipe)) {
    //         $message = 'Error';
    //     }
    //     $this->set([
    //         'message' => $message,
    //         '_serialize' => ['message']
    //     ]);
    // }
}