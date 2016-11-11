<?php


/**
 * Inherited Methods
 * @method void wantToTest($text)
 * @method void wantTo($text)
 * @method void execute($callable)
 * @method void expectTo($prediction)
 * @method void expect($prediction)
 * @method void amGoingTo($argumentation)
 * @method void am($role)
 * @method void lookForwardTo($achieveValue)
 * @method void comment($description)
 * @method \Codeception\Lib\Friend haveFriend($name, $actorClass = NULL)
 *
 * @SuppressWarnings(PHPMD)
*/
class AcceptanceTester extends \Codeception\Actor
{
    use _generated\AcceptanceTesterActions;

   /**
    * Define custom actions here
    */
   
   public function setUpSession()  
   {
       exec('mysqldump -u '.env('DB_USERNAME').' test | mysql -u '.env('DB_USERNAME').' test_testing');

       $this->amOnPage('/');
       $this->setCookie('selenium_request', 'true');
   }

   public function tearDownSession()  
   {
       $this->resetCookie('selenium_auth');
       $this->resetCookie('selenium_request');
   }

   public function loginUserById($id)  
   {
       $this->setCookie('selenium_auth', (string) $id);
   }
}
