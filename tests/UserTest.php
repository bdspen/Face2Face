<?php

    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    require_once "src/Place.php";
    require_once "src/User.php";
    require_once "src/Meetup.php";

    $server = 'mysql:host=localhost;dbname=face_to_face_test';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    class UserTest extends PHPUnit_Framework_TestCase
    {
        protected function tearDown()
        {
            User::deleteAll();
            Place::deleteAll();
            Meetup::deleteAll();
        }

        function test_setUserName()
        {
            //Arrange
            $user_name = "Nathan";
            $password = "xxx60606";
            $longitude = 45.516231;
            $latitude = -122.682519;
            $signed_in = true;
            $id = 1;
            $test_user = new User($user_name, $password, $longitude, $latitude, $signed_in, $id);

            //Act
            $test_user->setUserName($user_name);
            $result = $test_user->getUserName();

            //Assert
            $this->assertEquals($user_name, $result);
        }

        function test_getUserName()
        {
            //Arrange
            $user_name = "Nathan";
            $password = "xxx60606";
            $longitude = 45.516231;
            $latitude = -122.682519;
            $signed_in = true;
            $id = 1;
            $test_user = new User($user_name, $password, $longitude, $latitude, $signed_in, $id);

            //Act
            $result = $test_user->getUserName();

            //Assert
            $this->assertEquals("Nathan", $result);
        }

        function test_setLongitude()
        {
            //Arrange
            $user_name = "Nathan";
            $password = "xxx60606";
            $longitude = 45.516231;
            $latitude = -122.682519;
            $signed_in = true;
            $id = 1;
            $test_user = new User($user_name, $password, $longitude, $latitude, $signed_in, $id);

            //Act
            $result = $test_user->getLongitude();

            //Assert
            $this->assertEquals($longitude, $result);
        }

        function test_getLongitude()
        {
            //Arrange
            $user_name = "Nathan";
            $password = "xxx60606";
            $longitude = 45.516231;
            $latitude = -122.682519;
            $signed_in = true;
            $id = 1;
            $test_user = new User($user_name, $password, $longitude, $latitude, $signed_in, $id);

            //Act
            $result = $test_user->getLongitude();

            //Assert
            $this->assertEquals(45.516231, $result);
        }

        function test_setLatitude()
        {
            //Arrange
            $user_name = "Nathan";
            $password = "xxx60606";
            $longitude = 45.516231;
            $latitude = -122.682519;
            $signed_in = true;
            $id = 1;
            $test_user = new User($user_name, $password, $longitude, $latitude, $signed_in, $id);

            //Act
            $result = $test_user->getLatitude();

            //Assert
            $this->assertEquals(-122.682519, $result);
        }

        function test_getLatitude()
        {
            //Arrange
            $user_name = "Nathan";
            $password = "xxx60606";
            $longitude = 45.516231;
            $latitude = -122.682519;
            $signed_in = true;
            $id = 1;
            $test_user = new User($user_name, $password, $longitude, $latitude, $signed_in, $id);

            //Act
            $result = $test_user->getLatitude();

            //Assert
            $this->assertEquals(-122.682519, $result);
        }

        function test_setSignedIn()
        {
            //Arrange
            $user_name = "Nathan";
            $password = "xxx60606";
            $longitude = 45.516231;
            $latitude = -122.682519;
            $signed_in = true;
            $id = 1;
            $test_user = new User($user_name, $password, $longitude, $latitude, $signed_in, $id);

            //Act
            $result = $test_user->getSignedIn();

            //Assert
            $this->assertEquals(true, $result);
        }

        function test_getSignedIn()
        {
            //Arrange
            $user_name = "Nathan";
            $password = "xxx60606";
            $longitude = 45.516231;
            $latitude = -122.682519;
            $signed_in = true;
            $id = 1;
            $test_user = new User($user_name, $password, $longitude, $latitude, $signed_in, $id);

            //Act
            $result = $test_user->getSignedIn();

            //Assert
            $this->assertEquals(true, $result);
        }

        function test_getId()
        {
            //Arrange
            $user_name = "Nathan";
            $password = "xxx60606";
            $longitude = 45.516231;
            $latitude = -122.682519;
            $signed_in = 1;
            $id = 1;
            $test_user = new User($user_name, $password, $longitude, $latitude, $signed_in, $id);

            //Act
            $result = $test_user->getId();

            //Assert
            $this->assertEquals($id, $result);
        }

        function test_save()
        {
            //Arrange
            $user_name = "Nathan";
            $password = "xxx60606";
            $longitude = 45.516231;
            $latitude = -122.682519;
            $signed_in = 1;
            $id = 1;
            $test_user = new User($user_name, $password, $longitude, $latitude, $signed_in, $id);
            $test_user->save();

            //Act
            $result = User::getAll();

            //Assert
            $this->assertEquals($test_user, $result[0]);
        }

        function test_logIn()
        {
            //Arrange
            $user_name = "Nathan";
            $password = "xxx60606";
            $longitude = 45.516231;
            $latitude = -122.682519;
            $signed_in = 1;
            $id = 1;
            $test_user = new User($user_name, $password, $longitude, $latitude, $signed_in, $id);
            $test_user->save();

            //Act
            $result = User::logIn("Nathan", "xxx60606");

            //Assert
            $this->assertEquals($test_user, $result);
        }

        function test_findUsersNear()
        {
            //Arrange
            $user_name = "Nathan";
            $password = "xxx60606";
            $latitude = 45.520969;
            $longitude = -122.679953;
            $signed_in = 1;
            $id = 1;
            $test_user = new User($user_name, $password, $longitude, $latitude, $signed_in, $id);
            $test_user->save();

            $user_name2 = "John";
            $password2 = "xxx";
            $latitude2 = 45.515852;
            $longitude2 = -122.674644;
            $signed_in2 = 1;
            $id2 = 1;
            $test_user2 = new User($user_name2, $password2, $longitude2, $latitude2, $signed_in2, $id2);
            $test_user2->save();

            $user_name3 = "Jim";
            $password3 = "xxxxxx";
            $latitude3 = 47.603734;
            $longitude3 = -122.333813;
            $signed_in3 = 1;
            $id3 = 1;
            $test_user3 = new User($user_name3, $password3, $longitude3, $latitude3, $signed_in3, $id3);
            $test_user3->save();

            $user_name4 = "Jim";
            $password4 = "xxx";
            $latitude4 = 45.515852;
            $longitude4 = -122.674644;
            $signed_in4 = 0;
            $id4 = 1;
            $test_user4 = new User($user_name4, $password4, $longitude4, $latitude4, $signed_in4, $id4);
            $test_user4->save();

            //Act
            $result = $test_user->findUsersNear();

            //Assert
            $this->assertEquals([$test_user2], $result);
        }

        function test_find()
        {
            //Arrange
            $user_name = "Nathan";
            $password = "xxx60606";
            $latitude = 45.520969;
            $longitude = -122.679953;
            $signed_in = 1;
            $id = 1;
            $test_user = new User($user_name, $password, $longitude, $latitude, $signed_in, $id);
            $test_user->save();

            $user_name2 = "John";
            $password2 = "xxx";
            $latitude2 = 45.515852;
            $longitude2 = -122.674644;
            $signed_in2 = 1;
            $id2 = 1;
            $test_user2 = new User($user_name2, $password2, $longitude2, $latitude2, $signed_in2, $id2);
            $test_user2->save();

            $result = User::find($test_user->getId());

            $this->assertEquals($test_user, $result);
        }

        function test_logOut()
        {
            //Arrange
            $user_name = "Nathan";
            $password = "xxx60606";
            $longitude = 45.516231;
            $latitude = -122.682519;
            $signed_in = 0;
            $id = 1;
            $test_user = new User($user_name, $password, $longitude, $latitude, $signed_in, $id);
            $test_user->save();

            //Act
            $test_user_online = User::logIn("Nathan", "xxx60606");
            $test_user_online->logOut();
            $result = User::getAll();

            //Assert
            $this->assertEquals(0, $result[0]->getSignedIn());
        }

        function test_findByUserName()
        {
            //Arrange
            $user_name = "Nathan";
            $password = "xxx60606";
            $latitude = 45.520969;
            $longitude = -122.679953;
            $signed_in = 1;
            $id = 1;
            $test_user = new User($user_name, $password, $longitude, $latitude, $signed_in, $id);
            $test_user->save();

            $user_name2 = "John";
            $password2 = "xxx";
            $latitude2 = 45.515852;
            $longitude2 = -122.674644;
            $signed_in2 = 1;
            $id2 = 1;
            $test_user2 = new User($user_name2, $password2, $longitude2, $latitude2, $signed_in2, $id2);
            $test_user2->save();

            //Act
            $result = User::findByUserName("John");

            //Assert
            $this->assertEquals($test_user2, $result);
        }

        function test_addMeetUpRequest()
        {
          //Arrange
          $user_name = "Nathan";
          $password = "xxx60606";
          $latitude = 45.520969;
          $longitude = -122.679953;
          $signed_in = 1;
          $id = 1;
          $test_user = new User($user_name, $password, $longitude, $latitude, $signed_in, $id);
          $test_user->save();

          $user_name2 = "John";
          $password2 = "xxx";
          $latitude2 = 45.515852;
          $longitude2 = -122.674644;
          $signed_in2 = 1;
          $id2 = 1;
          $test_user2 = new User($user_name2, $password2, $longitude2, $latitude2, $signed_in2, $id2);
          $test_user2->save();

          $place_name = "Director Park";
          $address = "SW Park Ave";
          $longitude = 45.518672;
          $latitude = -122.681211;
          $id3 = 4;
          $test_place = new Place($place_name, $address, $longitude, $latitude, $id3);

          //Act
          $test_user->addMeetUpRequest($test_user2->getId(), $test_place->getId());
          $result = $test_user2->findMeetupRequests();

          //Assert
          $this->assertEquals([$test_user], $result);
        }

        function test_confirmMeetupRequest()
        {
            //Arrange
            $user_name = "Nathan";
            $password = "xxx60606";
            $latitude = 45.520969;
            $longitude = -122.679953;
            $signed_in = 1;
            $id = 1;
            $test_user = new User($user_name, $password, $longitude, $latitude, $signed_in, $id);
            $test_user->save();

            $user_name2 = "John";
            $password2 = "xxx";
            $latitude2 = 45.515852;
            $longitude2 = -122.674644;
            $signed_in2 = 1;
            $id2 = 1;
            $test_user2 = new User($user_name2, $password2, $longitude2, $latitude2, $signed_in2, $id2);
            $test_user2->save();

            $place_name = "Director Park";
            $address = "SW Park Ave";
            $longitude = 45.518672;
            $latitude = -122.681211;
            $id3 = 5;
            $test_place = new Place($place_name, $address, $longitude, $latitude, $id3);

            //Act
            $test_user->addMeetUpRequest($test_user2->getId(), $test_place->getId());
            $test_user2->confirmMeetupRequest($test_user->getId());
            $meetup_array = Meetup::getAll();
            $result = $meetup_array[0]->getUser2_Confirm();

            //Assert
            $this->assertEquals(true, $result);
        }

        function test_confirmMeetUserOne()
        {
            //Arrange
            $user_name = "Nathan";
            $password = "xxx60606";
            $latitude = 45.520969;
            $longitude = -122.679953;
            $signed_in = 1;
            $id = 1;
            $test_user = new User($user_name, $password, $longitude, $latitude, $signed_in, $id);
            $test_user->save();

            $user_name2 = "John";
            $password2 = "xxx";
            $latitude2 = 45.515852;
            $longitude2 = -122.674644;
            $signed_in2 = 1;
            $id2 = 1;
            $test_user2 = new User($user_name2, $password2, $longitude2, $latitude2, $signed_in2, $id2);
            $test_user2->save();

            $place_name = "Director Park";
            $address = "SW Park Ave";
            $longitude = 45.518672;
            $latitude = -122.681211;
            $id3 = 5;
            $test_place = new Place($place_name, $address, $longitude, $latitude, $id3);

            //Act
            $test_user->addMeetUpRequest($test_user2->getId(), $test_place->getId());
            $test_user2->confirmMeetupRequest($test_user->getId());
            $test_user->confirmMeetUserOne($test_user->getId(), $test_user2->getId(), true);
            $meetup_array = Meetup::getAll();
            $result = $meetup_array[0]->getConfirm_meet_usr1();

            //Assert
            $this->assertEquals(true, $result);

        }

        function test_confirmMeetUserTwo()
        {
            //Arrange
            $user_name = "Nathan";
            $password = "xxx60606";
            $latitude = 45.520969;
            $longitude = -122.679953;
            $signed_in = 1;
            $id = 1;
            $test_user = new User($user_name, $password, $longitude, $latitude, $signed_in, $id);
            $test_user->save();

            $user_name2 = "John";
            $password2 = "xxx";
            $latitude2 = 45.515852;
            $longitude2 = -122.674644;
            $signed_in2 = 1;
            $id2 = 1;
            $test_user2 = new User($user_name2, $password2, $longitude2, $latitude2, $signed_in2, $id2);
            $test_user2->save();

            $place_name = "Director Park";
            $address = "SW Park Ave";
            $longitude = 45.518672;
            $latitude = -122.681211;
            $id3 = 5;
            $test_place = new Place($place_name, $address, $longitude, $latitude, $id3);

            //Act
            $test_user->addMeetUpRequest($test_user2->getId(), $test_place->getId());
            $test_user2->confirmMeetupRequest($test_user->getId());
            $test_user2->confirmMeetUserTwo($test_user->getId(), $test_user2->getId(), true);
            $meetup_array = Meetup::getAll();
            $result = $meetup_array[0]->getConfirm_meet_usr2();

            //Assert
            $this->assertEquals(true, $result);
        }
    }

    ?>
