<?php

    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    require_once "src/Place.php";
    require_once "src/User.php";

    $server = 'mysql:host=localhost;dbname=face_to_face_test';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    class PlaceTest extends PHPUnit_Framework_TestCase
    {
        protected function tearDown()
        {
            Place::deleteAll();
        }

        function test_setPlaceName()
        {
            //Arrange
            $place_name = "Director Park";
            $address = "SW Park Ave";
            $latitude = 45.518672;
            $longitude = -122.681211;
            $id = 1;
            $test_place = new Place($place_name, $address, $latitude, $longitude, $id);

            //Act
            $test_place->setPlaceName($place_name);
            $result = $test_place->getPlaceName();

            //Assert
            $this->assertEquals("Director Park", $result);

        }

        function test_getPlaceName()
        {
            //Arrange
            $place_name = "Director Park";
            $address = "SW Park Ave";
            $latitude = 45.518672;
            $longitude = -122.681211;
            $id = 1;
            $test_place = new Place($place_name, $address, $latitude, $longitude, $id);

            //Act
            $result = $test_place->getPlaceName();

            //Assert
            $this->assertEquals($place_name, $result);
        }

        function test_setAddress()
        {
          //Arrange
          $place_name = "Director Park";
          $address = "SW Park Ave";
          $latitude = 45.518672;
          $longitude = -122.681211;
          $id = 1;
          $test_place = new Place($place_name, $address, $latitude, $longitude, $id);

          //Act
          $result = $test_place->getAddress($address);

          //Assert
          $this->assertEquals("SW Park Ave", $result);

        }

        function test_getAddress()
        {
          //Arrange
          $place_name = "Director Park";
          $address = "SW Park Ave";
          $latitude = 45.518672;
          $longitude = -122.681211;
          $id = 1;
          $test_place = new Place($place_name, $address, $latitude, $longitude, $id);

          //Act
          $result = $test_place->getAddress();

          //Assert
          $this->assertEquals($address, $result);

        }

        function test_setLongitude()
        {
          //Arrange
          $place_name = "Director Park";
          $address = "SW Park Ave";
          $latitude = 45.518672;
          $longitude = -122.681211;
          $id = 1;
          $test_place = new Place($place_name, $address, $latitude, $longitude, $id);

          //Act
          $test_place->setLongitude($longitude);
          $result = $test_place->getLongitude();

          //Assert
          $this->assertEquals("-122.681211", $result);

        }

        function test_getLongitude()
        {
          //Arrange
          $place_name = "Director Park";
          $address = "SW Park Ave";
          $latitude = 45.518672;
          $longitude = -122.681211;
          $id = 1;
          $test_place = new Place($place_name, $address, $latitude, $longitude, $id);

          //Act
          $result = $test_place->getLongitude();

          //Assert
          $this->assertEquals($longitude, $result);

        }

        function test_setLatitude()
        {
          //Arrange
          $place_name = "Director Park";
          $address = "SW Park Ave";
          $latitude = 45.518672;
          $longitude = -122.681211;
          $id = 1;
          $test_place = new Place($place_name, $address, $latitude, $longitude, $id);

          //Act
          $test_place->setLatitude($latitude);
          $result = $test_place->getLatitude();

          //Assert
          $this->assertEquals("45.518672", $result);

        }

        function test_getLatitude()
        {
          //Arrange
          $place_name = "Director Park";
          $address = "SW Park Ave";
          $latitude = 45.518672;
          $longitude = -122.681211;
          $id = 1;
          $test_place = new Place($place_name, $address, $latitude, $longitude, $id);

          //Act
          $result = $test_place->getLatitude();

          //Assert
          $this->assertEquals($latitude, $result);

        }

        function test_getId()
        {
          //Arrange
          $place_name = "Director Park";
          $address = "SW Park Ave";
          $latitude = 45.518672;
          $longitude = -122.681211;
          $id = 1;
          $test_place = new Place($place_name, $address, $latitude, $longitude, $id);

          //Act
          $result = $test_place->getId();

          //Assert
          $this->assertEquals($id, $result);

        }
        function testSave()
        {
          //Arrange
          $place_name = "Director Park";
          $address = "SW Park Ave";
          $latitude = 45.518672;
          $longitude = -122.681211;
          $id = 1;
          $test_place = new Place($place_name, $address, $latitude, $longitude, $id);
          $test_place->save();

          //Act
          $result = Place::getAll();

          //Assert
          $this->assertEquals($test_place, $result[0]);
        }
        function testgetAll()
        {
          //Arrange
          $place_name = "Director Park";
          $address = "SW Park Ave";
          $latitude = 45.518672;
          $longitude = -122.681211;
          $id = 1;
          $test_place = new Place($place_name, $address, $latitude, $longitude, $id);
          $test_place->save();

          //Act
          $result = Place::getAll();

          //Assert
          $this->assertEquals($test_place, $result[0]);
        }
        function testDeleteAll()
        {
          //Arrange
          $place_name = "Director Park";
          $address = "SW Park Ave";
          $latitude = 45.518672;
          $longitude = -122.681211;
          $id = 1;
          $test_place = new Place($place_name, $address, $latitude, $longitude, $id);
          $test_place->save();

          //Act
          Place::deleteAll();
          $result = Place::getAll();

          //Assert
          $this->assertEquals([], $result);
        }

        function testUpdateName()
        {
          //Arrange
          $place_name = "Director Park";
          $address = "SW Park Ave";
          $latitude = 45.518672;
          $longitude = -122.681211;
          $id = 1;
          $test_place = new Place($place_name, $address, $latitude, $longitude, $id);
          $test_place->save();

          $new_place_name = "Park Lane Park";

          //Act
          $test_place->updatePlaceName($new_place_name);

          //Assert
          $this->assertEquals($test_place->getPlaceName(), $new_place_name);

        }

        function testUpdateAddress()
        {
          //Arrange
          $place_name = "Director Park";
          $address = "SW Park Ave";
          $latitude = 45.518672;
          $longitude = -122.681211;
          $id = 1;
          $test_place = new Place($place_name, $address, $latitude, $longitude, $id);
          $test_place->save();

          $new_address = "NW West Ave";

          //Act
          $test_place->updateAddress($new_address);

          //Assert
          $this->assertEquals($test_place->getAddress(), $new_address);
        }

        function test_generateLocation()
        {
          $place_name = "Bombay Chaat House";
          $address = "804 SW Yamhill St";
          $latitude = 43.519830;
          $longitude = -122.684370;
          $id = 1;
          $test_place = new Place($place_name, $address, $latitude, $longitude, $id);
          $test_place->save();

          $place_name2 = "Nordstrom Downtown Portland";
          $address2 = "701 SW Broadway";
          $latitude2 = 45.519229;
          $longitude2 = -122.680314;
          $id2 = 2;
          $test_place2 = new Place($place_name2, $address2, $latitude2, $longitude2, $id2);
          $test_place2->save();

          $place_name3 = "Banana Republic";
          $address3 = "710 SW Yamhill St";
          $latitude3 = 45.518594;
          $longitude3 = -122.680357;
          $id3 = 3;
          $test_place3 = new Place($place_name3, $address3, $latitude3, $longitude3, $id3);
          $test_place3->save();

          $result = Place::generateLocation();

          $this->assertEquals(true, is_object($result) );
        }
        
        // function test_distanceFrom()
        // {
        //     $user_name = "Nathan";
        //     $password = "xxx60606";
        //     $latitude = 45.518672;
        //     $longitude = -122.681215;
        //     $signed_in = 1;
        //     $id = 1;
        //     $test_user = new User($user_name, $password, $longitude, $latitude, $signed_in, $id);
        //     $test_user->save();
        //
        //     $user_name2 = "John";
        //     $password2 = "xxx";
        //     $latitude2 = 45.518672;
        //     $longitude2 = -122.681218;
        //     $signed_in2 = 1;
        //     $id2 = 1;
        //     $test_user2 = new User($user_name2, $password2, $longitude2, $latitude2, $signed_in2, $id2);
        //     $test_user2->save();
        //
        // }
        function test_verifyLocation()
        {
          $place_name2 = "Director Park";
          $address2 = "SW Park Ave";
          $longitude2 = 45.518672;
          $latitude2 = -122.681211;
          $id2 = 2;
          $test_place = new Place($place_name2, $address2, $longitude2, $latitude2, $id2);
          $test_place->save();
        
          $user_name = "Nathan";
          $password = "xxx60606";
          $latitude = 45.518672;
          $longitude = -122.681215;
          $signed_in = 1;
          $id = 1;
          $test_user = new User($user_name, $password, $longitude, $latitude, $signed_in, $id);
          $test_user->save();
        
          $user_name2 = "John";
          $password2 = "xxx";
          $latitude2 = 45.518672;
          $longitude2 = -122.681218;
          $signed_in2 = 1;
          $id2 = 1;
          $test_user2 = new User($user_name2, $password2, $longitude2, $latitude2, $signed_in2, $id2);
          $test_user2->save();
        
        
          $var = $test_place->distanceFrom($test_user2);
          var_dump($var);
          $result = $test_place->verifyLocation($test_user, $test_user2);
        
          $this->assertEquals(true, $result);
        }
    }
?>
