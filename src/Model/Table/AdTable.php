<?php 
namespace App\Model\Table;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class AdTable extends Table
{
	 
  public function initialize(array $config) {
        parent::initialize($config);
        $this->primaryKey('id');
        $this->hasMany('adsClick',
                          ['class'=>'adsClick',
                          'foreignKey' => 'ads_id',
                          'dependent' => true
                         ]
                    );

         $this->belongsTo('Users',
                          ['class'=>'Users',
                          'foreignKey' => 'user_id'
                         ]);
         $this->belongsTo('Landmark',
                          ['class'=>'Landmark',
                          'foreignKey' => 'geofence_value'
                         ]);
         $this->belongsTo('Route',
                          ['class'=>'Route',
                          'foreignKey' => 'geofence_value'
                         ]);

    }
  
}
