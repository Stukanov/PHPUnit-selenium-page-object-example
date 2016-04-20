<?php
use Yandex\Allure\Adapter\Annotation\Title;

class ValidationTest extends Browser
{
    /**
     * @test
     * @Title("Check if empty password login not happened")
     */
    function validTest()
    {
        $loginPage = new LoginPage(parent::$browser);
        $loginPage->typeLogin("John");
        $loginPage->clearPass();
        $loginPage->submit();
        $this->assertFalse($loginPage->isLoadDisplayed());
    }
}