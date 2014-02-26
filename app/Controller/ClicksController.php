<?php
App::uses('AppController', 'Controller');
class ClicksController extends AppController {
    public $uses = array('User', 'Profile');
    
    public function index() {
        $this->set('user', $this->User->findById($this->Auth->user('id')));
    }

    public function incr() {
        $user = $this->User->findById($this->Auth->user('id'));
        $this->Profile->id = $user['Profile']['id'];
        $this->Profile->saveField('score', $user['Profile']['score'] + $user['Profile']['power']);
        
        $this->redirect(array('action' => 'index'));
    }
}
