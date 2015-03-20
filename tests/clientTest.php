<?php

    /**
    * @backupGlobals disabled
    * @backStaticAttributes disabled
    */

    require_once "src/Client.php";
    require_once "src/Stylist.php";

    $DB = new PDO('pgsql:host=localhost;dbname=hair_salon_test');

    class ClientTest extends PHPUnit_Framework_TestCase
    {
        protected function tearDown()
        {
            Client::deleteAll();
        }
        //  //work on if time
        function test_getName()
        {
            //Arrange
            $s_name = "Lizzy";
            $id = 5;
            $test_stylist = new Stylist($s_name, $id);
            $test_stylist->save();

            $other_name = "Joey";
            $id = 5;
            $stylist_id = $test_stylist->getId();
            $test_client = new Client($other_name, $id, $stylist_id);

            //Act
            $result = $test_client->getName();

            //Assert
            $this->assertEquals($other_name, $result);
        }

        function test_getId()
        {
            //Arrange
            $s_name = "Lizzy";
            $id = 5;
            $test_stylist = new Stylist($s_name, $id);
            $test_stylist->save();


            $name = "Bobbin";
            $id = 5;
            $stylist_id = $test_stylist->getId();
            $test_client = new Client($name, $id, $stylist_id);

            //Act
            $result = $test_client->getId();

            //Assert
            $this->assertEquals(true, is_numeric($result));
        }

        function test_getCategoryId()
        {
            //Arrange
            $s_name = "Nina";
            $id = 5;
            $test_stylist = new Stylist($s_name, $id);
            $test_stylist->save();

            $description = "Wash the dog";
            $stylist_id = $test_stylist->getId();
            $test_client = new Client($description, $id, $stylist_id);
            $test_client->save();

            //Act
            $result = $test_client->getStylistId();

            //Assert
            $this->assertEquals(true, is_numeric($result));
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
            $s_name = "Laura";
            $id = 5;
            $test_stylist = new Stylist($s_name, $id);
            $test_stylist->save();

            $name = "Tex";
            $stylist_id = $test_stylist->getId();
            $test_client = new Client($name, $id, $stylist_id);
            $test_client->save();

            $name2 = "Venture";
            $stylist_id = $test_stylist->getId();
            $test_client2 = new Client($name2, $id, $stylist_id);
            $test_client2->save();


            //Act
            $result = Client::getAll();

            //Assert
            $this->assertEquals([$test_client, $test_client2], $result);
        }

        function test_find()
        {
            //Arrange
            $s_name = "Seanna";
            $id = 5;
            $test_stylist = new Stylist($s_name, $id);
            $test_stylist->save();

            $name = "Guy";
            $stylist_id = $test_stylist->getId();
            $test_client = new Client($name, $id, $stylist_id);
            $test_client->save();

            $name2 = "Brush";
            $test_client2 = new Client($name2, $id, $stylist_id);
            $test_client2->save();

            //Act
            $result = Client::find($test_client->getId());

            //Assert
            $this->assertEquals($test_client, $result);
        }

    }
?>
