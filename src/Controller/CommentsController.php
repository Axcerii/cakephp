<?php
    namespace App\Controller;

    class CommentsController extends AppController{

        public function index(){
            //  
            $allComments = $this->Comments->find('all')->contain(['Users']);
            //

            $this->set(compact('allComments'));
        }

        public function details($id = null){
            $comment = $this->Comments->get($id, ['contain' => ['Users']]);

            $this->set(compact('comment'));
        }

        public function new(){
            $new = $this->Comments->newEmptyEntity();

            if ($this->request->is('post')) {
                $new = $this->Comments->patchEntity($new, $this->request->getData());
                
                if ($this->Comments->save($new)) {
                    $this->Flash->success('Le commentaire a bien été ajouté');
                    return $this->redirect(['controller' => 'Posts', 'action' => 'details', $new->post_id]);
                }

                $this->Flash->error('Le commentaire n\'a pas pu être ajouté');
            }

            $this->set(compact('new'));
        }

    }
?>