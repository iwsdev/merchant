<?php
namespace App\Controller\Admin;
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

        $this->viewBuilder()->layout("admin");
        parent::beforeFilter($event);
        $this->Auth->allow(['login','forgetpassword']);
        $userInfo = $this->request->session()->read('Auth.User');
         $this->userID = $userInfo['id'];
         $this->emailID = $userInfo['email'];
         $this->userName = $userInfo['name'];

    }

    /**
    Created By: jai singh
    date:25-8-2017
    purpose:For Login
    **/
    public function login()
    {
        $this->viewBuilder()->layout("admin_login_layout");

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
              $this->Auth->setUser($user);
               $UserRoleId =$this->Auth->user('user_role'); 
              if($UserRoleId==2)
               {
                $this->redirect(array('controller'=>'users','action' => 'index','prefix'=>false)); 
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


      

    }


   

    public function profile()
    {
      $user_id = $this->userID;
      // $user = $this->request->session()->read('Auth.User');
      $user = $this->Users->find()->where(['id'=>$user_id,'status'=>1])->first(); 
      $this->set('userInfo',$user);

      $planDetail = $this->MerchantPlan->find()->where(['user_id'=>$user_id,'status'=>1])->first(); 
      $this->set('planDetail',$planDetail);

        if($this->request->is(['post','put'])){
         $data = $this->request->data;
          $user = $this->Users->get($user_id);
          $user->name = $data['name'];
          $user->phone_number = $data['phone_number'];
          $user->address = $data['address'];
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
            $id = $this->$userID;
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
    date:7-9-2017
    purpose:For admin plan 
 **/
    public function plan()
    {
       
      $planList = $this->Plan->find()->toArray();
      $this->set('planList',$planList);
    }

    /**
    Created By: jai singh
    date:11-9-2017
    purpose:For Create plan 
    **/
    public function createplan()
    {
        if($this->request->is(['post','put'])){
          $plan = $this->Plan->newEntity();
          $plan = $this->Plan->patchEntity($plan, $this->request->data);
          if ($this->Plan->save($plan)) {
            $this->Flash->plansuccess(__("A new plan has been created."));

          }else{
             $this->Flash->planerror(__("some problem during creation."));
          }
        }
    }

   /**
    Created By: jai singh
    date:11-9-2017
    purpose:For admin plan 
    **/
    public function editplan($id)
    { 
        $planInfo = $this->Plan->get($id);
        $this->set('planInfo',$planInfo);
        $this->set('id',$id);
        if($this->request->is(['post','put'])){
          $data = $this->request->data;
           $plan = $this->Plan->patchEntity($planInfo, $data);
          if ($this->Plan->save($planInfo)) {
            $this->Flash->plansuccess(__("Your Plan has been updated Successfully."));
             $this->redirect(['action' => 'editplan',$id]);
          }else{
             $this->Flash->planerror(__("some problem during updatation."));
          }  
        }
    }

    /**
    Created By: jai singh
    date:11-9-2017
    purpose:For admin plan 
    **/
    public function deleteplan($id)
    { 
       $id=1;
        $planInfo = $this->Plan->get($id);
        $this->set('planInfo',$planInfo);
        if($this->request->is(['post','put'])){
          $data = $this->request->data;
          pr($data);
           $plan = $this->Plan->patchEntity($planInfo, $data);
          if ($this->Plan->save($planInfo)) {
            $this->Flash->plansuccess(__("Your Plan has been updated Successfully."));
             $this->redirect(['action' => 'editplan',$id]);
          }else{
             $this->Flash->planerror(__("some problem during updatation."));
          }  
        }
    }

   /**
    Created By: jai singh
    date:28-8-2017
    purpose:For To change the status of Ad
    **/
     public function planstatus($id) {
        $this->autoRender = false;       
        $plan = $this->Plan->get($id);
        $status = $plan->status;
        if($status==1){
            $plan->status = 0;
        }else{
            $plan->status = 1;  
        }
        if( $save = $this->Plan->save($plan)){
           $this->Flash->success(__("Your status has been changed."));
           $this->redirect(['action' => 'plan']);

         } 
    }

    

}
//http://cmsbox.in/wordpress/ict…/vendor/modernizr/modernizr.js:4
?>