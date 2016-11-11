<?php
$I = new AcceptanceTester($scenario);
$I->setUpSession();

// Setup testing data
$user = factory(\App\User::class)->create();

$I->am('user'); // actor's role
$I->wantTo('view homepage'); // feature to test

$I->loginUserById($user->id);
$I->amOnPage('/');
$I->see('Am Logged In');

$I->tearDownSession();
