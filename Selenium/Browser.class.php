<?php
spl_autoload_register(function ($class) {
    if (
    file_exists(
        $page = __DIR__. "/Pages/" . $class . '.class.php'
    )) {
        include $page;
        return true;
    }

});


use Facebook\WebDriver\Remote\RemoteWebDriver;
use Facebook\WebDriver\Remote\WebDriverCapabilityType;
use Yandex\Allure\Adapter\Annotation\Title;



abstract class Browser extends PHPUnit_Framework_TestCase
{
    /**
     * @var RemoteWebDriver
     */
    protected static $browser;


    static function setUpBeforeClass()
    {
            self::$browser = RemoteWebDriver::create(
                getenv('HUB_URL'),
                array(
                    WebDriverCapabilityType::BROWSER_NAME => getenv('BROWSER'),
                )
            );
        self::$browser->get(getenv('URL'));

    }

    static function tearDownAfterClass()
    {
        self::$browser->quit();
    }

}


