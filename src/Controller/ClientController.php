<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Network\Http\Client;
use Cake\Network\Exception\HttpException;
use Cake\Network\Exception\BadRequestException;
/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 */
class ClientController extends AppController
{
	public $components = array('Security', 'RequestHandler');
    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function requestIndex()
    {
		$link  = "http://" . $_SERVER['HTTP_HOST'] .'/api/calls.json';
		$data = null;
		$httpSocket = new Client();
		
		$response = $httpSocket->get($link, $data, ['type' => 'json']);
	
		if(empty($response)){
			throw new BadRequestException("No data");
		}
		
		//debug($response->status);
		$this->set('calls', $response->json);
		$this->set('status', $response->code);
		//debug($response->json);
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function requestView($id = null)
    {
		$link  = "http://" . $_SERVER['HTTP_HOST'] .'/api/calls/view/'.$id.'.json';
		$data = null;
		$httpSocket = new Client();
		$response = $httpSocket->get($link, $data, ['type' => 'json']);
		if(empty($response)){
			throw new BadRequestException("No data");
		}
		
		//return 
		$this->set('status', $response->code);
		$this->set('response_body', $response->body);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function requestAdd()
    {
         $link  = "http://" . $_SERVER['HTTP_HOST'] .'/api/users/add.json';
		$data = null;
		$httpSocket = new Client();
		$data['Users']['names'] = 'New names';
		$data['Users']['surname'] = 'New surname';
		$data['Users']['status'] = 'New status';
		$data['Users']['position'] = 'New occupation';
		$response = $httpSocket->post($link, $data);
		$this->set('response_code', $response->code);
		$this->set('response_body', $response->body);
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function requestEdit($id = null)
    {
        $link  = "http://" . $_SERVER['HTTP_HOST'] .'/api/users/view/'.$id.'.json';
		$data = null;
		$httpSocket = new Client();
		$data['Users']['names'] = 'Update names';
		$data['Users']['surname'] = 'Update surname';
		$data['Users']['status'] = 'Update status';
		$data['Users']['position'] = 'Update occupation';
		$response = $httpSocket->put($link, $data);
		$this->set('response_code', $response->code);
		$this->set('response_body', $response->body);
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function requestDelete($id = null)
    {
       $link  = "http://" . $_SERVER['HTTP_HOST'] .'/api/users/view/'.$id.'.json';
		$data = null;
		$httpSocket = new Client();
		$response = $httpSocket->delete($link, $data);
		$this->set('response_code', $response->code);
		$this->set('response_body', $response->body);
    }
}
