<?php

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class PostsTable extends Table{
    public function initialize(array $c):void{
        parent::initialize($c);
        $this->addBehavior('Timestamp');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id'
        ]);
        
        $this->hasMany('Comments',[
            'foreignKey' => 'post_id'
        ]);
    }

    public function validationDefault(Validator $validator) : Validator{
     
        $validator->notEmptyString('title')
        ->maxLength('name', 255)
            
        ->notEmptyString('content')
        ->maxLength('content', 10000)
        
        ->notEmptyString('user_id');

        return $validator;
    }
}

?>