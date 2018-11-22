<?php

use yii\helpers\Url;

class HomeCest
{
    public function ensureThatHomePageWorks(AcceptanceTester $I)
    {
        $I->amOnPage(Url::toRoute('/site/index'));
        $I->wait(10);
        $I->see('My Company');
        
        $I->seeLink('About');
        $I->wait(1);
        $I->click('About');
        $I->wait(20); // wait for page to be opened
        
        $I->see('This is the About page.');
    }
}
