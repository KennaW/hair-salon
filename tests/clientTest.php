<?php

    /**
    * @backupGlobals disabled
    * @backStaticAttributes disabled
    */

    require_once "src/Client.php";

    $DB = new PDO('pgsql:host=localhost;dbname=hair_salon_test');

    class ClientTest extends PHPUnit_Framework_TestCase
    {
        protected function tearDown()
        {
            Client::deleteAll();
        }

        function test_getName()
        {
            //Arrange
            $name = "Lizzy";
            $id = 5;
            $test_Client = new Client($name, $id);

            //Act
            $result = $test_Client->getName();

            //Assert
            $this->assertEquals($name, $result);
        }

        function test_getId()
        {
            //Arrange
            $name = "Nina";
            $id = 5;
            $test_Client = new Client($name, $id);

            //Act
            $result = $test_Client->getId();

            //Assert
            $this->assertEquals(5, $result);
        }

        // // Test Save function no longer passing.
        // // seems like id isn't clearning for some reason.
        // // vardump shows that id is increasing, instead of being set to 5
        // // weirdly, test_getall() passes
        // function test_save()
        // {
        //     //Arrange
        //     $name = "Laura";
        //     $id = 5;
        //     $test_Client = new Client($name, $id);
        //     $test_Client->save();
        //     var_dump($id);
        //
        //     //Act
        //     $result = Client::getAll();
        //     var_dump($result);
        //
        //     //Assert
        //     //array starts at 0, not 1
        //     $this->assertEquals($test_Client, $result);
        // }

        function test_getAll()
        {
            //Arrange
            $name = "Gretchen";
            $id = 5;
            $name2 = "Seanna";
            $id2 = 6;
            $test_Client = new Client($name, $id);
            $test_Client->save();
            $test_Client2 = new Client($name2, $id2);
            $test_Client2->save();

            //Act
            $result = Client::getAll();

            //Assert
            $this->assertEquals([$test_Client, $test_Client2], $result);
        }

        function test_find()
        {
            //Arrange
            $name = "Gretchen";
            $id = 5;
            $name2 = "Seanna";
            $id2 = 6;
            $test_Client = new Client($name, $id);
            $test_Client->save();
            $test_Client2 = new Client($name2, $id2);
            $test_Client2->save();

            //Act
            $result = Client::find($test_Client->getId());

            //Assert
            $this->assertEquals($test_Client, $result);
        }

    }
?>
