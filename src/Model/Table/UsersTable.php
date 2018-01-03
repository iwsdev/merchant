<?php 
namespace App\Model\Table;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class UsersTable extends Table
{
     
  public function initialize(array $config) {
        parent::initialize($config);
        $this->belongsTo('Plan', [
          'foreignKey' => 'plan_id'
        ]);
        
        
    }

    
  public function  checkemailAvailability($value,$context){
      $result = false; 
      if($context['data']['email'])
          {
       $result = $this->find('all', [
                  'conditions' => ['Users.email' => $context['data']['email'],
                                    'Users.status'=>'1'
                                  ]
                                    ]);
       $number = $result->count();

           }
     if($number)
        {
        return false;
        }else
        {
            return true;
        }
    }

    
}