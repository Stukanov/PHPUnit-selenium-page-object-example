<?php
include __DIR__."/../TestObjectExample/ExampleClass.class.php";

class ExampleClassTest extends PHPUnit_Framework_TestCase
{
    private $isSelenium = false;
  /**
   * @test
   * @dataProvider data
   */
  function showTest($name)
  {
      $name = $name[0][0];
      $example = ExampleClass::getInstance();
      $str = $example->show($name);
      $this->assertEquals("<h1>This $name was called from singleton</h1>",$str,"Method show check");
  }

    function data() {
        return [["John"]];
    }
}