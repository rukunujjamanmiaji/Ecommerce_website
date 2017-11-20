<?php
namespace App\Controller;

use Cake\Network\Email\Email;
use App\Controller\AppController;
use Cake\Mailer\MailerAwareTrait;
use Cake\Core\Configure;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[] paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */

    public function initialize()
    {
        $this->loadComponent('Recaptcha.Recaptcha', [
            'enable' => true,     // true/false
            'sitekey' => '6LehKjgUAAAAAEq-kjqnv-HkJhjKLkgY-iJdRlcA',
            'secret' => '6LehKjgUAAAAAMSuUQ1ESdyaGjR7TbNdgQQRl-ml',
            'type' => 'image',  // image/audio
            'theme' => 'light', // light/dark
            'lang' => 'vi',      // default en
            'size' => 'normal'  // normal/compact
        ]);
        $this->loadComponent('Flash');
        $this->loadComponent('Auth', [
            'authenticate' => [
                'Form' => [
                    'fields' => [
                        'username' => 'email',
                        'password' => 'password'
                    ]
                ]
            ],

// If unauthorized, return them to page they were just on
            'unauthorizedRedirect' => $this->referer()
        ]);
        $this->Auth->allow(['display', 'view', 'index', 'forgotpassword','activate','add','login','profile','password']);
    }
    public function login()
    {
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
                return $this->redirect($this->Auth->redirectUrl());
            }
            $this->Flash->error('Your username or password is incorrect.');
        }
    }

    public function index()
    {
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
        $this->set('_serialize', ['users']);
    }
    public function activate($activation_key) {
        $this->autoRender = false;
        if (!empty($activation_key)) {
            $check_user = $this->Users->find()->where(['activation_key' => $activation_key])->first();
            if (!empty($check_user)) {
                $check_user->status = 1;
                $check_user->activation_key = '';
                $this->Users->save($check_user);
                $this->Flash->success('Your account activated successfully');
                //$options = array('content_id' => $check_user['id'],'type' => 'register', 'action' => 'activate');
                //$this->addNotification($options);
            } else {
                $this->Flash->error('Invalid activation code');
            }
        } else {
            $this->Flash->error('Invalid activation code');
        }
        $this->redirect('/users/login');
    }

    public function forgotPassword()
    {
        if (!empty($this->request->data)) {
            $emailu = $this->request->data['email'];
            if (!empty($emailu)) {
                $user1 = $this->Users->find()->where(['email' => $emailu])->first();
                if (!empty($user1)) {
                    $activation = md5($this->randomnum(8));
                    $params = array('activation_key' => $activation);
                    $user1->activation_key = $activation;
                    if($this->Users->save($user1))
                    {
                        $email = new Email('default');
                        $email->from(['rukucse11@gmail.com' => 'HRTech'])// sender email
                        ->to($emailu)// receiver email
                        ->template('forgot_password')
                            ->emailFormat('html')
                            ->set(['activation' => $activation])
                            ->subject('Forgot Password')
                            ->replyTo('rukucse11@gmail.com')// emial to reply toll ll
                            ->send('This is a simple message content '); // send function take the message content parameter
                        $this->Flash->success(__('Please check your email and change password.'));
                    }

                } else {
                    $this->Flash->error(_('Sorry! Email address is not available here.'));
                }
            } else {
                $this->Flash->error(_('Sorry! Email address is not available here.'));
            }
        }
    }

    function randomnum($length)
    {
        $randstr = "";
        srand((double)microtime() * 1000000);
        //our array add all letters and numbers if you wish
        $chars = array('a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z', '0', '1', '2', '3', '4', '5', '6', '7', '8', '9');
        for ($rand = 0; $rand <= $length; $rand++) {
            $random = rand(0, count($chars) - 1);
            $randstr .= $chars[$random];
        }
        return $randstr;
    }
    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */

    public function cpassword($activation_code = null) {
        if (!empty($activation_code)) {
            $check_user = $this->Users->find()->where(['activation_key' => $activation_code])->first();
            if (empty($check_user)) {
                $this->Flash->error('Invalid Activation Code');
                $this->redirect('/users/login');
            } else {
                if (!empty($this->request->data)) {
                    $check_user->password = (new \Cake\Auth\DefaultPasswordHasher)->hash($this->request->data['password']);
                    $check_user->activation_key = '';
                    if ($this->Users->save($check_user)) {
                        $this->Flash->success('Password Changed Successfully');
                        $this->redirect('/users/login');
                    }
                }
            }
        } else {
            $this->Flash->error('Invalid Activation Code');
        }


        $this->set('activation_key', $activation_code);
    }
    public function password() {
        $id = $this->Auth->user('id');
        $this->loadModel('Users');
        if (!empty($this->request->data)) {
            if (!empty($this->request->data['password'])) {
                $user = $this->Users->get($id);
                $data['password'] = (new DefaultPasswordHasher)->hash($this->request->data['password']);
                // if ($user['password'] != $data['password']) {
                //     $this->Flash->aerror('Invalid Current Password');
                //  } else {
                $data['password'] = (new \Cake\Auth\DefaultPasswordHasher)->hash($this->request->data['npassword']);
                $user = $this->User->patchEntity($user, $data);
                if ($this->User->save($user)) {
                    $options = array('content_id' => $this->Auth->user('id'), 'user_id' => $this->Auth->user('id'), 'type' => 'user', 'action' => 'change_password');
                    $this->addNotification($options);
                    $this->Flash->success(__('Password Changed successfully.'));
                }
            //}
            }
        }
        $user = $this->Users->get($id);
        $this->set('user', $user);
    }
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['Carts', 'Orders', 'Reviews']
        ]);

        $this->set('user', $user);
        $this->set('_serialize', ['user']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'login']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function profile() {
            }

}
