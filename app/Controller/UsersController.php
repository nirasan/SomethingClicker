<?php
App::uses('AppController', 'Controller');
/**
 * Users Controller
 *
 * @property User $User
 * @property PaginatorComponent $Paginator
 */
class UsersController extends AppController {

    public $uses = array('User', 'Profile');

    public function beforeFilter() {
        parent::beforeFilter();
        // ユーザー自身による登録とログアウトを許可する
        $this->Auth->allow('add', 'logout');
    }

    public function login() {
        if ($this->request->is('post')) {
            if ($this->Auth->login()) {
                #$this->redirect($this->Auth->redirect());
                $this->redirect(array('controller' => 'clicks', 'action' => 'index'));
            } else {
                $this->Session->setFlash(__('Invalid username or password, try again'));
            }
        }
    }

    public function logout() {
        $this->redirect($this->Auth->logout());
    }

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');
	
/**
 * Ranking method
 *
 * @return void
 */
    public function ranking() {
        $this->Profile->bindModel(array('belongsTo' => array('User')), false);
        $this->set('profiles', $this->Profile->find('all', array(
            'limit' => 100,
            'order' => 'Profile.score DESC',
        )));
    }

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->User->create();
			if ($this->User->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved.'));
				return $this->redirect(array('action' => 'login'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		}
	}

}
