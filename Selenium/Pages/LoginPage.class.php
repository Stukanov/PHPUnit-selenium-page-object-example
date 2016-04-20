<?php
class LoginPage extends Page
{
private static $_selectors = [
    "login_input" =>
        [
        "css" => "input#login",
        "xpath" => "//*[@id='login']"
        ],
    "pass_input" =>
        [
        "css" => "input#pass",
        "xpath" => "//*[@id='pass']"
        ],
    "submit_input" =>
        [
        "css" => "input#submit",
        "xpath" => "//*[@id='submit']"
        ],
    "result_div" =>
        [
        "css" => "div#result",
        "xpath" => "//*[@id='result']"
        ],
    "loading_image" =>
        [
            "css" => "img#loadingimg"
        ]
    ];

    function waitPageLoaded() {
    $this->waitPageLoadedBySelectors(self::$_selectors);
    }

    function waitInputsClickable()
    {
        $this->waitPageClickableBySelectors([self::$_selectors["login_input"],self::$_selectors["pass_input"]]);
    }

    function typeLogin($login) {
        $this->type(self::$_selectors["login_input"],$login);
    }

    function typePass($pass) {
        $this->type(self::$_selectors["pass_input"],$pass);
    }

    function submit() {
        $this->click(self::$_selectors["submit_input"]);
    }

    function getResultText() {
       return $this->find(self::$_selectors["result_div"])->getText();
    }

    function clearPass() {
        $this->find(self::$_selectors["pass_input"])->clear();
    }

    function isLoadDisplayed() {
        return $this->find(self::$_selectors["loading_image"])->isDisplayed();
    }
}