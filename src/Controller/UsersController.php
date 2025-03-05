<?php
    namespace App\Controller;

    class UsersController extends AppController{

        public function index(){
            //  
            $allUsers = $this->Users->find('all');
            //

            $this->set(compact('allUsers'));
        }

        public function details($id = null){
            $user = $this->Users->get($id, ['contain' => ['Comments']]);

            $this->set(compact('user'));
        }

        public function new(){

            $new = $this->Users->newEmptyEntity();

            //On vérifie si on est un "POST"
            if($this->request->is('post')){
                $new = $this->Users->patchEntity($new, $this->request->getData());

                //On vérifie si le message c'est bien usersé
                if($this->Users->save($new)){
                    $this->Flash->success('Le user a bien été ajouté');

                    return $this->redirect(['action' => 'index']);
                }

                $this->Flash->error('Le user n\'a pas pu être ajouté');

            }
            $this->set(compact('new'));
        }
    }
?>