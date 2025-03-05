<?php

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class UsersTable extends Table{
    public function initialize(array $c):void{
        parent::initialize($c);
        $this->addBehavior('Timestamp');

        $this->hasMany('Comments',[
            'foreignKey' => 'user_id'
        ]);

        
        $this->hasMany('Posts',[
            'foreignKey' => 'user_id'
        ]);
    }

    public function validationDefault(Validator $validator) : Validator{
     
        $validator->notEmptyString('username')
        ->maxLength('username', 100)
    
        ->notEmptyString('password')
        ->maxLength('password', 128);
        

        return $validator;
    }
}

?>