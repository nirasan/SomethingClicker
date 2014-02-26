<?php
App::uses('AppController', 'Controller');
class GachasController extends AppController {
    public $uses = array('User', 'Profile', 'UserLog', 'Gacha');
    
    public function index() {
        $this->set('user', $this->User->findById($this->Auth->user('id')));
    }

    public function lottery() {
        
        $user = $this->User->findById($this->Auth->user('id'));

        if ($user['Profile']['score'] < Configure::read("gacha_price")) {
            return $this->redirect(array('action' => 'index'));
        }

        $gacha = $this->Gacha->lottery();
        
        $this->Profile->id = $user['Profile']['id'];
        $this->Profile->save(array(
            'score' => $user['Profile']['score'] - Configure::read("gacha_price"),
            'power' => $user['Profile']['power'] + $gacha['Gacha']['effect']
        ));
        
        $this->UserLog->create();
        $this->UserLog->save(array('UserLog' => array(
            'user_id' => $user['User']['id'], 
            'body' => sprintf('gacha lotted. power + %d', $gacha['Gacha']['effect'])
        )));
        
        $this->redirect(array('action' => 'index'));
    }
}
