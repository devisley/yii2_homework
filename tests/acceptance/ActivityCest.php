<?php

use yii\helpers\Url;

class ActivityCest
{
    public function ensureActivityAdds(AcceptanceTester $I)
    {
        $I->amOnPage(Url::toRoute('/site/registry'));
        $I->see('Имя пользователя', 'label');
        $I->fillField('input[name="RegistryForm[name]"]', 'Test User');
        $I->fillField('input[name="RegistryForm[login]"]', 'test');
        $I->fillField('input[name="RegistryForm[password]"]', '12345');
        $I->fillField('input[name="RegistryForm[passwordRepeat]"]', '12345');
        $I->click('Отправить');

        $I->wait(2);
        $I->see('Login', 'h1');

        $I->amGoingTo('try to login with correct credentials');
        $I->fillField('input[name="LoginForm[username]"]', 'test');
        $I->fillField('input[name="LoginForm[password]"]', '12345');
        $I->click('login-button');
        $I->wait(2); // wait for button to be clicked
        $I->expectTo('see user info');
        $I->see('Logout');

        $I->amOnPage(Url::toRoute('/activity/index'));
        $I->see('Activities', 'h1');
        $I->fillField('input[name="Activity[activity_name]"]', 'Test Activity');
        $I->fillField('input[name="Activity[activity_start_timestamp]"]', date('dmy'));
        $I->click('Create Activity');
        $I->wait(5);
        $I->see('Test Activity', 'td');

        $I->click('Calendar');
        $I->wait(5);
        $I->see('События: 1', 'a[href="/day/view?date=' . mktime(0,0,0, date('m'), date('d'), date('y')) . '"]');
    }
}
