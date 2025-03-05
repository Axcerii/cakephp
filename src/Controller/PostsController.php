<?php
    namespace App\Controller;

    class PostsController extends AppController{

        public function index(){
            //  
            $allPosts = $this->Posts->find('all')->contain('Users', 'Comments');
            //

            $this->set(compact('allPosts'));
        }

        public function details($id = null) {
            $post = $this->Posts->get($id, ['contain' => ['Comments' => ['Users']]]);
            $newComment = $this->Posts->Comments->newEmptyEntity();
        
            if ($this->request->is('post')) {
                $newComment = $this->Posts->Comments->patchEntity($newComment, $this->request->getData());
        
                if ($this->Posts->Comments->save($newComment)) {
                    $this->Flash->success('Le commentaire a bien été ajouté.');
                    return $this->redirect(['action' => 'details', $id]);
                } else {
                    $this->Flash->error('Impossible d\'ajouter le commentaire.');
                    debug($newComment->getErrors()); // Voir les erreurs si ça échoue
                }
            }
        
            $usersList = $this->Posts->Users->find('list', [
                'keyField' => 'id',
                'valueField' => 'username'
            ])->all();
        
            $this->set(compact('post', 'newComment', 'usersList'));
        }
        

        public function new(){

            $new = $this->Posts->newEmptyEntity();

            //On vérifie si on est un "POST"
            if($this->request->is('post')){
                $new = $this->Posts->patchEntity($new, $this->request->getData());

                debug($this->request->getData());

                //On vérifie si le message c'est bien posté
                if($this->Posts->save($new)){
                    $this->Flash->success('Le post a bien été ajouté');

                    return $this->redirect(['action' => 'index']);
                }

                $this->Flash->error('Le post n\'a pas pu être ajouté');
            }
            
            $usersList = $this->Posts->Users->find('list', [
                'keyField' => 'id',
                'valueField' => 'username'
            ])->all();
            $this->set(compact('new', 'usersList'));
        }
    }
?>