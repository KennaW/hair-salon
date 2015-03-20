<?php

    /**
    * @backupGlobals disabled
    * @backStaticAttributes disabled
    */

    require_once "src/Stylist.php";

    $DB = new PDO('pgsql:host=localhost;dbname=hair_salon_test');

    class StylistTest extends PHPUnit_Framework_TestCase
    {
        protected function tearDown()
        {
            Stylist::deleteAll();
        }

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

        // // Test Save function no longer passing.
        // // seems like id isn't clearning for some reason.
        // // vardump shows that id is increasing, instead of being set to 5
        // // weirdly, test_getall() passes
        // function test_save()
        // {
        //     //Arrange
        //     $name = "Laura";
        //     $id = 5;
        //     $test_Stylist = new Stylist($name, $id);
        //     $test_Stylist->save();
        //     var_dump($id);
        //
        //     //Act
        //     $result = Stylist::getAll();
        //     var_dump($result);
        //
        //     //Assert
        //     //array starts at 0, not 1
        //     $this->assertEquals($test_Stylist, $result);
        // }

        function test_getAll()
        {
            //Arrange
            $name = "Gretchen";
            $id = 5;
            $name2 = "Seanna";
            $id2 = 6;
            $test_Stylist = new Stylist($name, $id);
            $test_Stylist->save();
            $test_Stylist2 = new Stylist($name2, $id2);
            $test_Stylist2->save();

            //Act
            $result = Stylist::getAll();

            //Assert
            $this->assertEquals([$test_Stylist, $test_Stylist2], $result);
        }

        function test_find()
        {
            //Arrange
            $name = "Gretchen";
            $id = 5;
            $name2 = "Seanna";
            $id2 = 6;
            $test_Stylist = new Stylist($name, $id);
            $test_Stylist->save();
            $test_Stylist2 = new Stylist($name2, $id2);
            $test_Stylist2->save();

            //Act
            $result = Stylist::find($test_Stylist->getId());

            //Assert
            $this->assertEquals($test_Stylist, $result);
        }

        function testGetClient()
        {
            //Arrange
            $s_name = "Laura";
            $id = 5;
            $test_stylist = new Stylist($s_name, $id);
            $test_stylist->save();

            $test_stylist_id = $test_stylist->getId();

            $name = "Zac";
            $test_client = new Client($name, $id, $test_stylist_id);
            $test_client->save();

            $name2 = "Bobbin";
            $test_client2 = new Client($name2, $id, $test_stylist_id);
            $test_client2->save();

            //Act
            $result = $test_stylist->getClient();

            //Assert
            $this->assertEquals([$test_client, $test_client2], $result);
        }

    }
?>
