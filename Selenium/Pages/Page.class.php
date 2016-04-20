<?php
use Facebook\WebDriver\Remote\RemoteWebDriver;
use Facebook\WebDriver\WebDriverBy;
use Facebook\WebDriver\WebDriverElement;
use Facebook\WebDriver\WebDriverExpectedCondition;

abstract class Page
{
    const WAIT_TIME = 100;
    const ITERATE_TIME = 500;
    /** @var RemoteWebDriver */
    protected $driver;

    /**
     * @param RemoteWebDriver $driver
     */
    public function __construct(RemoteWebDriver $driver)
    {
        $this->driver = $driver;
    }
    /**
     * @param $selector array
     * @return WebDriverElement
     */
    protected function find($selector)
    {
        switch (true) {
            case isset($selector["css"]):
                return $this->driver->findElement(WebDriverBy::cssSelector($selector["css"]));
                break;
            case isset($selector["xpath"]):
                return $this->driver->findElement(WebDriverBy::xpath($selector["xpath"]));
                break;
            default:
                return $this->driver->findElement(WebDriverBy::id($selector));
        }
    }

    protected function click($selector) {
        $this->find($selector)->click();

    }
    protected function type($selector,$keys) {
        $this->find($selector)->click()->sendKeys($keys);
    }

    private function getPresenceCondition($selector) {

        switch (true) {
            case isset($selector["css"]):
                return WebDriverExpectedCondition::presenceOfElementLocated(WebDriverBy::cssSelector($selector["css"]));
                break;
            case isset($selector["xpath"]):
                return WebDriverExpectedCondition::presenceOfElementLocated(WebDriverBy::xpath($selector["xpath"]));
                break;
            default:
                return WebDriverExpectedCondition::presenceOfElementLocated(WebDriverBy::id($selector));
        }
    }

    private function getClickabilityCondition($selector) {

        switch (true) {
            case isset($selector["css"]):
                return WebDriverExpectedCondition::elementToBeClickable(WebDriverBy::cssSelector($selector["css"]));
                break;
            case isset($selector["xpath"]):
                return WebDriverExpectedCondition::elementToBeClickable(WebDriverBy::xpath($selector["xpath"]));
                break;
            default:
                return WebDriverExpectedCondition::elementToBeClickable(WebDriverBy::id($selector));
        }
    }

    protected function waitPageLoadedBySelectors($selectors)
    {
        foreach ($selectors as $selector) {
            $this->driver->wait(self::WAIT_TIME,self::ITERATE_TIME)->until($this->getPresenceCondition($selector));
        }

    }

    protected function waitPageClickableBySelectors($selectors)
    {
        foreach ($selectors as $selector) {
            $this->driver->wait(self::WAIT_TIME,self::ITERATE_TIME)->until($this->getClickabilityCondition($selector));
        }
    }
}