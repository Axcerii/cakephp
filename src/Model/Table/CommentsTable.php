<?php

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class CommentsTable extends Table{
    public function initialize(array $c):void{
        parent::initialize($c);
        $this->addBehavior('Timestamp');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
        ]);

        $this->belongsTo('Posts', [
            'foreignKey' => 'post_id',
            'joinType' => 'INNER'
        ]);
    }

    public function validationDefault(Validator $validator) : Validator{
     
        $validator->notEmptyString('content')
        ->maxLength('content', 10000)
        
        ->notEmptyString('post_id')
        ->notEmptyString('user_id');

        return $validator;
    }
}

?>