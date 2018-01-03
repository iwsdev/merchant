<?php
namespace App\Controller;
use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Mailer\Email;
use Cake\Auth\DefaultPasswordHasher;
use Cake\ORM\TableRegistry;

// use Cake\Auth\DefaultPasswordHasher;
// use Cake\Auth;

class UsersController extends AppController
{
 public function beforeFilter(Event $event)
    {
        $this->loadComponent('Flash');
        $this->loadComponent('Math');
        $this->loadModel('Ad');
        $this->loadModel('AdsClick');
        $this->loadModel('Plan');
        $this->loadModel('MerchantPlan');
        $this->loadModel('Country');
        $this->loadModel('Cities');
        $this->loadModel('States');
        $this->loadModel('Landmark');
        $this->loadModel('Route');
        $this->viewBuilder()->layout("front_merchant");
        parent::beforeFilter($event);
        $this->Auth->allow(['login','forgetpassword']);
        $userInfo = $this->request->session()->read('Auth.User');
        $this->userID = $userInfo['id'];
        $this->emailID = $userInfo['email'];
        $this->userName = $userInfo['name'];
		$this->userRole = $userInfo['user_role'];

    }

    /**
    Created By: jai singh
    date:25-8-2017
    purpose:For Login
    **/
    public function login()
    {
        $this->viewBuilder()->layout("front_login_layout");
     if ($this->Auth->user())
            {
                $UserRoleId =$this->Auth->user('user_role'); 
              if($UserRoleId==2)
               {
                  
                  $this->redirect(array('controller'=>'users','action' => 'index')); 
               }
               else if($UserRoleId==1)
               {
                  $this->redirect(array('controller'=>'users','action' => 'index','prefix'=>'admin')); 
               }
           }
            
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
			
            if ($user) {
				if($user['status']==0){
					  $this->redirect(array('controller'=>'users','action' => 'index')); 
					  $this->Flash->loginerror(__('Your Account has been diasbled by admin.'));
				      
				}else{
				$this->Auth->setUser($user);
				}
				$UserRoleId =$this->Auth->user('user_role'); 
              if($UserRoleId==2)
               {
                  
                  $this->redirect(array('controller'=>'users','action' => 'index')); 
               }
               else if($UserRoleId==1)
               {
                 $this->redirect(array('controller'=>'users','action' => 'index','prefix'=>'admin'));  
               }
                return $this->redirect($this->Auth->redirectUrl());
            }
            else
            {
            $this->Flash->loginerror(__('Invalid username or password, try again'));
            }
        }
    }

    /**
    Created By: jai singh
    date:24-8-2017
    purpose:For Logout
    **/
    public function logout()
    {
        return $this->redirect($this->Auth->logout());
    }




/**
Created By: jai singh
date:24-8-2017
purpose:For forget password
 **/
public function forgetpassword()
    {
       $this->viewBuilder()->layout("front_login_layout");
       if($this->request->is('post') || $this->request->is('put'))
            {
               $emailId = $this->request->data['email'];
               $user = $this->Users->find()->where(['email'=>$emailId])->first();
               if($user)
               {
                $userName = $user->username;
                $name = $user->name;
                $emailId = $user->email;
                $pass =$this->Math->generatePassword();
                $user->password =$pass;
              if( $this->Users->save($user))   
                {
                $email = new Email();
                $email->transport('default');
                $email->viewVars([
                    'userName' => $userName,
                    'name' => $name,
                    'pass' => $pass,
                    'subject' => 'Forget Password',
                ]);
                $email->emailFormat('html')
                        ->from(['ict@gmail.com' => 'ICT'])
                        ->to($emailId)
                        ->subject('Forget Password')
                        ->template('forgetpasswordmail')
                        ->send(); 

                $this->Flash->forgetsuccess(__('Password has been sent to your e-mail.'));

                }
               else
                { 
                $this->Flash->forgeterror(__('Some problem Password updated'));
                }

             }
               else
               {

                $this->Flash->forgeterror(__('E-mail id is not registered')); 
               }
          } 

}
 /**End Section **/



    /**
    Created By: jai singh
    date:25-8-2017
    purpose:For Dashboard
    **/
    public function index()
    {
		
	   ## Start section, If user hit without action from normal user to admin section it will redirect
		## it 's not Needed but i did it..
		## This code main part is avialbale in appController,Here only without action
	    /* $userrole = $this->Auth->user('user_role'); 
		 if(isset($this->request->params['prefix'])){
          $curPrefix = $this->request->params['prefix']; 
		  }
		  else
		  {
			 $curPrefix = '';
		  }
		  if($userrole==1 && $curPrefix==''){
			 $this->redirect('/admin/users/');
		  }
		  else if($userrole==2 && $curPrefix=='admin'){
			 $this->redirect('/users/'); 
		  }*/
	## End Section of 
	     

       $user_id = $this->userID;
       $adList = $this->Ad->find()->where(['Ad.user_id'=>$user_id])->Contain(['AdsClick','Users','Landmark','Route'])->toArray();
       $adListCount = $this->Ad->find()->where(['user_id'=>$user_id])->count();
       $AdsViewCount = $this->AdsClick->find()->where(['ad_user'=>$user_id,'no_of_click'=>1])->count();
       $AdsClickCount = $this->AdsClick->find()->where(['ad_user'=>$user_id,'no_of_click'=>2])->count();
       $this->set('adList',$adList);
       $this->set('adListCount',$adListCount);
       $this->set('AdsViewCount',$AdsViewCount);
       $this->set('AdsClickCount',$AdsClickCount);

    }


   

    public function profile()
    {
      $user_id = $this->userID;
      // $user = $this->request->session()->read('Auth.User');
      $user = $this->Users->find()->where(['id'=>$user_id,'status'=>1])->first(); 
      $this->set('userInfo',$user);

      $planDetail = $this->MerchantPlan->find()->where(['user_id'=>$user_id,'status'=>1])->first(); 
      $this->set('planDetail',$planDetail);

         $countrys= $this->Country->find('all');
        $this->set('countrys',$countrys);

        if($this->request->is(['post','put'])){
         $data = $this->request->data;
          $user = $this->Users->get($user_id);
          $user->name = $data['name'];
          $user->phone_number = $data['phone_number'];
           $user->countries_isd_code = $data['countries_isd_code'];
          $user->address = $data['address'];
         // pr($user); exit;
        if($this->Users->save($user)){
            $this->Flash->profilesuccess(__("Your profile has been saved."));
            $this->redirect(['action' => 'profile']);
         } else 
            {
            $this->Users->profileerror(__("Unable to save your profile information."));
            $this->redirect(['action' => 'profile']);
             }
        }

    }

   
/**
Created By: jai singh
date:29-8-207
purpose:For change password
 **/

public function changepassword()
     {
        if($this->request->is('post'))
         {
            $id = $this->userID;
            $getPass = $this->request->data;
            $data = $this->Users->get($id);
            $passwordcurrent = $getPass['current_password'];
            $hasher = new DefaultPasswordHasher();
            if(!$hasher->check($passwordcurrent,$data->password))
            {
                 $this->Flash->changepassworderror(__('Your current password does not matched...'));
            }
            else
            {
               $password_again =  $getPass['password_again'];
              if($password_again==$passwordcurrent)
              {
                $this->Flash->changepassworderror(__('Your current password and new password should not be the same.'));
              }
               else
               {
                   $data->password = $password_again;
                   $username = $data->username;
                   $name = $data->name;
                   $emailId = $data->email;
                   $pass = $getPass['password_again'];
                   $data['current_password']=$password_again;
                   
                   if($this->Users->save($data))
                     { 
                      $email = new Email();
                      $email->transport('default');
                      $email->viewVars([
                          'userName' => $username,
                          'name' => $name,
                          'pass' => $pass,
                          'subject' => 'Change Password',
                      ]);
                      $email->emailFormat('html')
                        ->from(['ict@gmail.com' => 'ICT'])
                        ->to($emailId)
                        ->subject('Change Password')
                        ->template('changepasswordmail')
                        ->send(); 
                         $this->Flash->changepasswordsuccess('Thank you! You have successfully changed your Login Password, please keep a record of the new password. We have also sent a copy of the Password Change to your email for your records.');
                         $this->redirect(['action' => 'changepassword']);
               
                     }
                    
                   else
                   {
                       $this->Flash->changepassworderror(__('Error in updation.')); 
                   }
              }

          }  
             
        }
    }





    /**
    Created By: jai singh
    date:28-8-2017
    purpose:For AdsList
    **/
    public function myads()
    {
       $user_id = $this->userID;
       $adList = $this->Ad->find()->where(['user_id'=>$user_id])->Contain(['AdsClick','Users','Landmark','Route'])->toArray();
       //pr($adList);die();
       $this->set('adList',$adList);
    }

    /**
    Created By: jai singh
    date:25-8-2017
    purpose:For AdDetail
    **/
    public function adDetail($id=NULL)
    {
       $userId = $this->userID;
       $adDetail = $this->Ad->find()->where(['Ad.id'=>$id,'user_id'=>$userId])->Contain(['AdsClick','Users'])->first(); 
       $this->set('adDetail',$adDetail);
    }



     /**
    Created By: jai singh
    date:28-8-2017
    purpose:For To change the status of Ad
    **/
     public function adstatus($id) {
        $this->autoRender = false;       
        $ad = $this->Ad->get($id);
        $status = $ad->status;
        if($status==1){
            $ad->status = 0;
        }else{
            $ad->status = 1;  
        }
        if( $save = $this->Ad->save($ad)){
           $this->Flash->success(__("Your status has been changed."));
           $this->redirect(['action' => 'myads']);

         } 
    }

   /**
    Created By: jai singh
    date:28-8-2017
    purpose:For plan Detail
    **/
    public function myplan()
    {
       
      $user_id = $this->userID;
      $planDetail = $this->MerchantPlan->find()->where(['user_id'=>$user_id,'status'=>1])->first(); 
      $this->set('planDetail',$planDetail);
    }

    /**
    Created By: jai singh
    date:28-8-2017
    purpose:For Plan History
    **/
    public function planHistory()
    {
	  $user_id = $this->userID;		
      $myPlan = $this->MerchantPlan->find()->where(['user_id'=>$user_id,])->order(['status'=>'DESC'])->toArray();
      $this->set('myPlan',$myPlan);
    }

      /**
    Created By: jai singh
    date:30-8-2017
    purpose:For Renew Plan
    **/
    public function renew()
    {
      $user_id = $this->userID;
      $email_id = $this->emailID;
      $name = $this->userName;
      $planDetail = $this->MerchantPlan->find()->where(['user_id'=>$user_id,'status'=>1])->first(); 
      $this->set('planDetail',$planDetail);
        if($this->request->is(['put','post'])){
          $data = $this->request->data;
          $plan = $this->Plan->find()->where(['id'=>3,'status'=>1])->first();

      $currentDate = date("Y-m-d h:i:s");    
      $content['user_id'] = $user_id;  
      $content['plan_id'] = $data['planId'];  
      $content['name'] = $plan->name;  
      $content['no_of_ads'] = $plan->no_of_ads;;  
      $content['validity'] = $plan->validity;  
      $content['cost'] = $plan->cost;  
      $content['start_date'] = $currentDate;  
      $content['end_date'] = date('Y-m-d h:i:s', strtotime("+".$plan->validity."days"));  
      $content['status'] = 0;  
      $userPlan = $this->MerchantPlan->newEntity();
      $userPlan = $this->MerchantPlan->patchEntity($userPlan, $content);
      if ( $saved= $this->MerchantPlan->save($userPlan))
             {
              $this->Flash->plansuccess(__("Your request has been submit for renewal."));
              $email = new Email();
              $email->transport('default');
              $email->viewVars([
                  'name' => $name,
              ]);
              $email->emailFormat('html')
                ->from(['ict@gmail.com' => 'ICT'])
                ->to('jaisingh.iws@gmail.com')
                ->subject('Plan Renewal')
                ->template('planrenewladminmail')
                ->send();
              $email->emailFormat('html')
                ->from(['ict@gmail.com' => 'ICT'])
                ->to($email_id)
                ->subject('Plan Renewal')
                ->template('planrenewlausermail')
                ->send();


             }
             else
             {
              $this->Flash->planerror(__("Unable to submit your renew request."));
             }
        }
    }



    public function form()
    {
     
    }

    public function createad()
    {
      $countryList = $this->Country->find('list',
       ['keyField' => 'country_id',
        'valueField' => 'country_name'
        ])->toArray();
      $this->set('countryList',$countryList);
      
      

      if($this->request->is(['put','post'])){
         $data = $this->request->data;
		 // echo "<pre>";
		 // print_r($data);die;
        if (!empty($data['adImage']['name'])) 
          {

             $errors     = array();
             $maxsize    = 113503;
             $acceptable = array(
              'image/jpg',
              'jpg',
              'png',
              'jpeg',
              'gif',
              'image/png',
              'image/jpeg',
               );
    // pr($acceptable); exit;
			
            if(($data['adImage']['size'] >= $maxsize) || ($data['adImage']["size"] == 0)) {

           $this->Flash->error(__("File too large. File must be less than 1 mb"));
            return $this->redirect($this->referer());
             }

          if((!in_array($data['adImage']['type'], $acceptable)) && (!empty($data['adImage']["type"]))) {
            $this->Flash->error(__("Invalid file type. Only JPG and PNG types are accepted!"));
           //echo $errors[] = 'Invalid file type. Only JPG and PNG types are accepted.';
         return $this->redirect($this->referer());
          }
        //  pr(count($errors)); exit;
              if(count($errors) === 0) {
               $image = time() . $data['adImage']['name']; 
               move_uploaded_file($data['adImage']['tmp_name'], WWW_ROOT . 'img/adimg/'.$image);
               }
          $address='';

          if(!empty($data['country_name']))
          {
           $countryName = $data['country_name'];
           $address .= $countryName." "; 
          }
          if(!empty($data['state_name']))
          {   
           $stateName = $data['state_name'];
           $address .= $stateName;
          }  
          $latLong = $this->getLatLong($address);
          $latitude = $latLong['latitude']?$latLong['latitude']:'Not found';
          $longitude = $latLong['longitude']?$latLong['longitude']:'Not found';
          $data['latitude']=$latitude; 
          $data['longitude']=$longitude; 
          $data['image']=$image; 
          $data['user_id']=$this->userID; 
			  //echo "<pre>";
			 // print_r($adInfo);die;
          $adInfo = $this->Ad->newEntity();
          $adInfo = $this->Ad->patchEntity($adInfo, $data);


              if ( $saved= $this->Ad->save($adInfo))
                     { 
                      $this->Flash->success(__("A new Ad has been created successfully"));
                      $this->redirect(['action' => 'myads']);
                     }
                     else{
                       $this->Flash->error(__("Unable to create your Ad!"));
                     }
                  }
         }
    }
    

    public function findstate()
        {
          $this->viewBuilder()->layout("ajax");
          $country_id=$this->request->data['country'];
          $stateList = $this->States->find('list',
           ['keyField' => 'state_id',
            'valueField' => 'state_name'
            ])->where(['States.country_id'=>$country_id])->toArray();
            
             $geofencelist = $this->Route->find('list',
           ['keyField' => 'id',
            'valueField' => 'name'
            ])->where(['Route.status'=>1])->toArray();
            
            $this->set('states',$stateList);
     }
     
     public function findgeofence()
        {
          $this->viewBuilder()->layout("ajax");
          $type=$this->request->data['type'];
          if($type=='landmark')
          {
              $geofencelist = $this->Landmark->find('list',
           ['keyField' => 'id',
            'valueField' => 'name'
            ])->where(['Landmark.status'=>1])->toArray();
          }
          else
          {
              $geofencelist = $this->Route->find('list',
           ['keyField' => 'id',
            'valueField' => 'name'
            ])->where(['Route.status'=>1])->toArray();
            
          }
          
          $this->set('geofence_value',$geofencelist);
          $this->set('geofence_type',$type);
     }
    

}
//http://cmsbox.in/wordpress/ict…/vendor/modernizr/modernizr.js:4
?>
