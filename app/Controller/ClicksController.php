<?php
App::uses('AppController', 'Controller');
class ClicksController extends AppController {
    public $uses = array('User', 'Profile', 'UserLog');
    
    public function index() {
        $this->set('user', $this->User->findById($this->Auth->user('id')));
    }

    public function incr() {
        
        $user = $this->User->findById($this->Auth->user('id'));
        $this->Profile->id = $user['Profile']['id'];
        $this->Profile->saveField('score', $user['Profile']['score'] + $user['Profile']['power']);
        
        $this->UserLog->create();
        $this->UserLog->save(array('UserLog' => array('user_id' => $user['User']['id'], 'body' => 'clicked')));
        
        $this->redirect(array('action' => 'index'));
    }
}
