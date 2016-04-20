<?php
use Yandex\Allure\Adapter\Annotation\Title;
class LoginTest extends Browser
{
    /**
     * @test
     * @Title("Check if the correct login happened")
     */
    function showTest()
    {
        $loginPage = new LoginPage(parent::$browser);
        $loginPage->waitPageLoaded();
        $loginPage->typeLogin("John");
        $loginPage->typePass("123");
        $loginPage->submit();
        $loginPage->waitInputsClickable();
        $this->assertEquals("This John was called from singleton",$loginPage->getResultText());
    }
}