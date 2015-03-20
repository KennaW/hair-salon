<?php

    /**
    * @backupGlobals disabled
    * @backStaticAttributes disabled
    */

    require_once "src/Stylist.php";

    $DB = new PDO('pgsql:host=localhost;dbname=hair_salon_test');

    class StylistTest extends PHPUnit_Framework_TestCase
    {
        function test_getName()
        {
            //Arrange
            $name = "Lizzy";
            $id = 5;
            $test_Stylist = new Stylist($name, $id);

            //Act
            $result = $test_Stylist->getName();

            //Assert
            $this->assertEquals($name, $result);
        }
    }
?>
