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

        function test_getId()
        {
            //Arrange
            $name = "Nina";
            $id = 5;
            $test_Stylist = new Stylist($name, $id);

            //Act
            $result = $test_Stylist->getId();

            //Assert
            $this->assertEquals(5, $result);
        }

        function test_save()
        {
            //Arrange
            $name = "Laura";
            $id = 5;
            $test_Stylist = new Stylist($name, $id);
            $test_Stylist->save();

            //Act
            $result = Stylist::getAll();

            //Assert
            //array starts at 0, not 1
            $this->assertEquals($test_Stylist, $result[6]);
        }


    }
?>
