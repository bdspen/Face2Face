<?php

    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    require_once "src/Meetup.php";

    $server = 'mysql:host=localhost;dbname=face_to_face_test';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    class MeetupTest extends PHPUnit_Framework_TestCase
    {
        protected function tearDown()
        {
          Meetup::deleteAll();
        }
    //GET/SET TESTS
        function test_getId()
        {
            //Arrange
            $user1_id = 1;
            $user2_id = 2;
            $user1_confirm = 1;
            $user2_confirm = 1;
            $location_id = 1;
            $confirm_meet_usr1 = 1;
            $confirm_meet_usr2 = 1;
            $id = 1;
            $test_meetup = new Meetup($user1_id, $user2_id, $user1_confirm,
            $user2_confirm, $location_id, $confirm_meet_usr1, $confirm_meet_usr2, $id);

            //Act
            $result = $test_meetup->getId();

            //Assert
            $this->assertEquals($id, $result);
        }
        function test_setUser1_Id()
        {
            //Arrange
            $user1_id = 1;
            $user2_id = 2;
            $user1_confirm = 1;
            $user2_confirm = 1;
            $location_id = 1;
            $confirm_meet_usr1 = 1;
            $confirm_meet_usr2 = 1;
            $id = 1;
            $test_meetup = new Meetup($user1_id, $user2_id, $user1_confirm,
            $user2_confirm, $location_id, $confirm_meet_usr1, $confirm_meet_usr2, $id);

            //Act
            $test_meetup->setUser1_Id($user1_id);
            $result = $test_meetup->getUser1_Id();

            //Assert
            $this->assertEquals($user1_id, $result);
        }
        function test_getUser1_Id()
        {
            //Arrange
            $user1_id = 1;
            $user2_id = 2;
            $user1_confirm = 1;
            $user2_confirm = 1;
            $location_id = 1;
            $confirm_meet_usr1 = 1;
            $confirm_meet_usr2 = 1;
            $id = 1;
            $test_meetup = new Meetup($user1_id, $user2_id, $user1_confirm,
            $user2_confirm, $location_id, $confirm_meet_usr1, $confirm_meet_usr2, $id);

            //Act
            $result = $test_meetup->getUser1_Id();

            //Assert
            $this->assertEquals($user1_id, $result);
        }
        function test_setUser2_Id()
        {
            //Arrange
            $user1_id = 1;
            $user2_id = 2;
            $user1_confirm = 1;
            $user2_confirm = 1;
            $location_id = 1;
            $confirm_meet_usr1 = 1;
            $confirm_meet_usr2 = 1;
            $id = 1;
            $test_meetup = new Meetup($user1_id, $user2_id, $user1_confirm,
            $user2_confirm, $location_id, $confirm_meet_usr1, $confirm_meet_usr2, $id);

            //Act
            $test_meetup->setUser2_Id($user2_id);
            $result = $test_meetup->getUser2_Id();

            //Assert
            $this->assertEquals($user2_id, $result);
        }
        function test_getUser2_Id()
        {
            //Arrange
            $user1_id = 1;
            $user2_id = 2;
            $user1_confirm = 1;
            $user2_confirm = 1;
            $location_id = 1;
            $confirm_meet_usr1 = 1;
            $confirm_meet_usr2 = 1;
            $id = 1;
            $test_meetup = new Meetup($user1_id, $user2_id, $user1_confirm,
            $user2_confirm, $location_id, $confirm_meet_usr1, $confirm_meet_usr2, $id);

            //Act
            $result = $test_meetup->getUser2_Id();

            //Assert
            $this->assertEquals($user2_id, $result);
        }
        function test_setUser1_Confirm()
        {
            //Arrange
            $user1_id = 1;
            $user2_id = 2;
            $user1_confirm = 1;
            $user2_confirm = 1;
            $location_id = 1;
            $confirm_meet_usr1 = 1;
            $confirm_meet_usr2 = 1;
            $id = 1;
            $test_meetup = new Meetup($user1_id, $user2_id, $user1_confirm,
            $user2_confirm, $location_id, $confirm_meet_usr1, $confirm_meet_usr2, $id);

            //Act
            $test_meetup->setUser1_Confirm($user1_confirm);
            $result = $test_meetup->getUser1_Confirm();

            //Assert
            $this->assertEquals($user1_confirm, $result);
        }
        function test_setUser2_Confirm()
        {
            //Arrange
            $user1_id = 1;
            $user2_id = 2;
            $user1_confirm = 1;
            $user2_confirm = 0;
            $location_id = 1;
            $confirm_meet_usr1 = 1;
            $confirm_meet_usr2 = 1;
            $id = 1;
            $test_meetup = new Meetup($user1_id, $user2_id, $user1_confirm,
            $user2_confirm, $location_id, $confirm_meet_usr1, $confirm_meet_usr2, $id);

            //Act
            $test_meetup->setUser2_Confirm($user2_confirm);
            $result = $test_meetup->getUser2_Confirm();

            //Assert
            $this->assertEquals($user2_confirm, $result);
        }
        function test_getUser1_Confirm()
        {
            //Arrange
            $user1_id = 1;
            $user2_id = 2;
            $user1_confirm = 1;
            $user2_confirm = 1;
            $location_id = 1;
            $confirm_meet_usr1 = 1;
            $confirm_meet_usr2 = 1;
            $id = 1;
            $test_meetup = new Meetup($user1_id, $user2_id, $user1_confirm,
            $user2_confirm, $location_id, $confirm_meet_usr1, $confirm_meet_usr2, $id);

            //Act
            $result = $test_meetup->getUser1_Confirm();

            //Assert
            $this->assertEquals($user1_confirm, $result);
        }
        function test_getUser2_Confirm()
        {
            //Arrange
            $user1_id = 1;
            $user2_id = 2;
            $user1_confirm = 1;
            $user2_confirm = 0;
            $location_id = 1;
            $confirm_meet_usr1 = 1;
            $confirm_meet_usr2 = 1;
            $id = 1;
            $test_meetup = new Meetup($user1_id, $user2_id, $user1_confirm,
            $user2_confirm, $location_id, $confirm_meet_usr1, $confirm_meet_usr2, $id);

            //Act
            $result = $test_meetup->getUser2_Confirm();

            //Assert
            $this->assertEquals($user2_confirm, $result);
        }
        function test_setConfirm_meet_usr1()
        {
            //Arrange
            $user1_id = 1;
            $user2_id = 2;
            $user1_confirm = 1;
            $user2_confirm = 1;
            $location_id = 1;
            $confirm_meet_usr1 = 1;
            $confirm_meet_usr2 = 1;
            $id = 1;
            $test_meetup = new Meetup($user1_id, $user2_id, $user1_confirm,
            $user2_confirm, $location_id, $confirm_meet_usr1, $confirm_meet_usr2, $id);

            //Act
            $test_meetup->setConfirm_meet_usr1($confirm_meet_usr1);
            $result = $test_meetup->getConfirm_meet_usr1();

            //Assert
            $this->assertEquals($confirm_meet_usr1, $result);
        }
        function test_setLocation_Id()
        {
            //Arrange
            $user1_id = 1;
            $user2_id = 2;
            $user1_confirm = 1;
            $user2_confirm = 0;
            $location_id = 12;
            $confirm_meet_usr1 = 1;
            $confirm_meet_usr2 = 1;
            $id = 1;
            $test_meetup = new Meetup($user1_id, $user2_id, $user1_confirm,
            $user2_confirm, $location_id, $confirm_meet_usr1, $confirm_meet_usr2, $id);

            //Act
            $test_meetup->setLocation_Id($location_id);
            $result = $test_meetup->getLocation_Id();

            //Assert
            $this->assertEquals($location_id, $result);
        }
        function test_getConfirm_meet_usr1()
        {
            //Arrange
            $user1_id = 1;
            $user2_id = 2;
            $user1_confirm = 1;
            $user2_confirm = 1;
            $location_id = 1;
            $confirm_meet_usr1 = 1;
            $confirm_meet_usr2 = 1;
            $id = 1;
            $test_meetup = new Meetup($user1_id, $user2_id, $user1_confirm,
            $user2_confirm, $location_id, $confirm_meet_usr1, $confirm_meet_usr2, $id);

            //Act
            $result = $test_meetup->getConfirm_meet_usr1();

            //Assert
            $this->assertEquals($confirm_meet_usr1, $result);
        }
        function test_getLocation_Id()
        {
            //Arrange
            $user1_id = 1;
            $user2_id = 2;
            $user1_confirm = 1;
            $user2_confirm = 0;
            $location_id = 12;
            $confirm_meet_usr1 = 1;
            $confirm_meet_usr2 = 1;
            $id = 1;
            $test_meetup = new Meetup($user1_id, $user2_id, $user1_confirm,
            $user2_confirm, $location_id, $confirm_meet_usr1, $confirm_meet_usr2, $id);

            //Act
            $result = $test_meetup->getLocation_Id();

            //Assert
            $this->assertEquals($location_id, $result);
        }
        function test_setConfirm_meet_usr2()
        {
            //Arrange
            $user1_id = 1;
            $user2_id = 2;
            $user1_confirm = 1;
            $user2_confirm = 1;
            $location_id = 1;
            $confirm_meet_usr1 = 1;
            $confirm_meet_usr2 = 0;
            $id = 1;
            $test_meetup = new Meetup($user1_id, $user2_id, $user1_confirm,
            $user2_confirm, $location_id, $confirm_meet_usr1, $confirm_meet_usr2, $id);

            //Act
            $test_meetup->setConfirm_meet_usr2($confirm_meet_usr2);
            $result = $test_meetup->getConfirm_meet_usr2();

            //Assert
            $this->assertEquals($confirm_meet_usr2, $result);
        }
        function test_getConfirm_meet_usr2()
        {
            //Arrange
            $user1_id = 1;
            $user2_id = 2;
            $user1_confirm = 1;
            $user2_confirm = 1;
            $location_id = 1;
            $confirm_meet_usr1 = 1;
            $confirm_meet_usr2 = 0;
            $id = 1;
            $test_meetup = new Meetup($user1_id, $user2_id, $user1_confirm,
            $user2_confirm, $location_id, $confirm_meet_usr1, $confirm_meet_usr2, $id);

            //Act
            $result = $test_meetup->getConfirm_meet_usr2();

            //Assert
            $this->assertEquals($confirm_meet_usr2, $result);
        }
      //END GET/SET TESTS
        function test_save()
        {
          //Arrange
          $user1_id = 1;
          $user2_id = 2;
          $user1_confirm = 1;
          $user2_confirm = 1;
          $location_id = 1;
          $confirm_meet_usr1 = 1;
          $confirm_meet_usr2 = 1;
          $id = 1;
          $test_meetup = new Meetup($user1_id, $user2_id, $user1_confirm,
          $user2_confirm, $location_id, $confirm_meet_usr1, $confirm_meet_usr2, $id);
          $test_meetup->save();


          //Act
          $result = Meetup::getAll();
          // var_dump($result);

          //Assert
          $this->assertEquals($test_meetup, $result[0]);

        }
        function test_getAll()
        {
          //Arrange
          $user1_id = 1;
          $user2_id = 2;
          $user1_confirm = 1;
          $user2_confirm = 1;
          $location_id = 1;
          $confirm_meet_usr1 = 1;
          $confirm_meet_usr2 = 0;
          $id = 1;
          $test_meetup = new Meetup($user1_id, $user2_id, $user1_confirm,
          $user2_confirm, $location_id, $confirm_meet_usr1, $confirm_meet_usr2, $id);
          $test_meetup->save();

          //Act
          $result = Meetup::getAll();

          //Assert
          $this->assertEquals($test_meetup, $result[0]);

        }
        function test_deleteAll()
        {
          //Arrange
          $user1_id = 1;
          $user2_id = 2;
          $user1_confirm = 1;
          $user2_confirm = 1;
          $location_id = 1;
          $confirm_meet_usr1 = 1;
          $confirm_meet_usr2 = 0;
          $id = 1;
          $test_meetup = new Meetup($user1_id, $user2_id, $user1_confirm,
          $user2_confirm, $location_id, $confirm_meet_usr1, $confirm_meet_usr2, $id);
          $test_meetup->save();

          //Act
          Meetup::deleteAll();
          $result = Meetup::getAll();

          //Assert
          $this->assertEquals([], $result);
        }
        function test_delete()
        {
          //Arrange
          $user1_id = 1;
          $user2_id = 2;
          $user1_confirm = 1;
          $user2_confirm = 1;
          $location_id = 1;
          $confirm_meet_usr1 = 1;
          $confirm_meet_usr2 = 0;
          $id = 1;
          $test_meetup = new Meetup($user1_id, $user2_id, $user1_confirm,
          $user2_confirm, $location_id, $confirm_meet_usr1, $confirm_meet_usr2, $id);
          $test_meetup->save();

          //Act
          $test_meetup->delete();
          $result = Meetup::getAll();

          //Assert
          $this->assertEquals([], $result);
        }
        function test_find()
        {
          //Arrange
          $user1_id = 1;
          $user2_id = 2;
          $user1_confirm = 1;
          $user2_confirm = 1;
          $location_id = 1;
          $confirm_meet_usr1 = 1;
          $confirm_meet_usr2 = 0;
          $id = 1;
          $test_meetup = new Meetup($user1_id, $user2_id, $user1_confirm,
          $user2_confirm, $location_id, $confirm_meet_usr1, $confirm_meet_usr2, $id);
          $test_meetup->save();

          //Arrange
          $user1_id2 = 1;
          $user2_id2 = 2;
          $user1_confirm2 = 0;
          $user2_confirm2 = 1;
          $location_id2 = 1;
          $confirm_meet_usr12 = 1;
          $confirm_meet_usr22 = 0;
          $id2 = 2;
          $test_meetup2 = new Meetup($user1_id2, $user2_id2, $user1_confirm2,
          $user2_confirm2, $location_id2, $confirm_meet_usr12, $confirm_meet_usr22, $id2);
          $test_meetup2->save();

          //Act
          $result = Meetup::find($test_meetup->getId());

          //Assert
          $this->assertEquals($test_meetup, $result);
        }
      //UPDATE TESTS
        function test_updateUser1_Id()
        {
          //Arrange
          $user1_id = 1;
          $user2_id = 2;
          $user1_confirm = 1;
          $user2_confirm = 1;
          $location_id = 1;
          $confirm_meet_usr1 = 1;
          $confirm_meet_usr2 = 0;
          $id = 1;
          $test_meetup = new Meetup($user1_id, $user2_id, $user1_confirm,
          $user2_confirm, $location_id, $confirm_meet_usr1, $confirm_meet_usr2, $id);
          $test_meetup->save();

          $new_user1_id = 2;

          //Act
          $test_meetup->updateUser1_Id($new_user1_id);

          //Assert
          $this->assertEquals($test_meetup->getuser1_id(), $new_user1_id);
        }
        function test_updateUser2_Id()
        {
          //Arrange
          $user1_id = 1;
          $user2_id = 2;
          $user1_confirm = 1;
          $user2_confirm = 1;
          $location_id = 1;
          $confirm_meet_usr1 = 1;
          $confirm_meet_usr2 = 0;
          $id = 1;
          $test_meetup = new Meetup($user1_id, $user2_id, $user1_confirm,
          $user2_confirm, $location_id, $confirm_meet_usr1, $confirm_meet_usr2, $id);
          $test_meetup->save();

          $new_user2_id = 2;

          //Act
          $test_meetup->updateUser2_Id($new_user2_id);

          //Assert
          $this->assertEquals($test_meetup->getuser2_id(), $new_user2_id);
        }
        function test_updateUser1_Confirm()
        {
          //Arrange
          $user1_id = 1;
          $user2_id = 2;
          $user1_confirm = 1;
          $user2_confirm = 1;
          $location_id = 1;
          $confirm_meet_usr1 = 1;
          $confirm_meet_usr2 = 0;
          $id = 1;
          $test_meetup = new Meetup($user1_id, $user2_id, $user1_confirm,
          $user2_confirm, $location_id, $confirm_meet_usr1, $confirm_meet_usr2, $id);
          $test_meetup->save();

          $new_user1_confirm = 2;

          //Act
          $test_meetup->updateUser1_Confirm($new_user1_confirm);

          //Assert
          $this->assertEquals($test_meetup->getuser1_Confirm(), $new_user1_confirm);
        }
        function test_updateUser2_Confirm()
        {
          //Arrange
          $user1_id = 1;
          $user2_id = 2;
          $user1_confirm = 1;
          $user2_confirm = 1;
          $location_id = 1;
          $confirm_meet_usr1 = 1;
          $confirm_meet_usr2 = 0;
          $id = 1;
          $test_meetup = new Meetup($user1_id, $user2_id, $user1_confirm,
          $user2_confirm, $location_id, $confirm_meet_usr1, $confirm_meet_usr2, $id);
          $test_meetup->save();

          $new_user2_confirm = 2;

          //Act
          $test_meetup->updateUser2_Confirm($new_user2_confirm);

          //Assert
          $this->assertEquals($test_meetup->getuser2_Confirm(), $new_user2_confirm);
        }
        function test_updateLocationId()
        {
          //Arrange
          $user1_id = 1;
          $user2_id = 2;
          $user1_confirm = 1;
          $user2_confirm = 1;
          $location_id = 1;
          $confirm_meet_usr1 = 1;
          $confirm_meet_usr2 = 0;
          $id = 1;
          $test_meetup = new Meetup($user1_id, $user2_id, $user1_confirm,
          $user2_confirm, $location_id, $confirm_meet_usr1, $confirm_meet_usr2, $id);
          $test_meetup->save();

          $new_location_id = 2;

          //Act
          $test_meetup->updateLocationId($new_location_id);

          //Assert
          $this->assertEquals($test_meetup->getLocation_Id(), $new_location_id);
        }
        function test_updateConfirm_meet_usr1()
        {
          //Arrange
          $user1_id = 1;
          $user2_id = 2;
          $user1_confirm = 1;
          $user2_confirm = 1;
          $location_id = 1;
          $confirm_meet_usr1 = 1;
          $confirm_meet_usr2 = 0;
          $id = 1;
          $test_meetup = new Meetup($user1_id, $user2_id, $user1_confirm,
          $user2_confirm, $location_id, $confirm_meet_usr1, $confirm_meet_usr2, $id);
          $test_meetup->save();

          $new_confirm_meet_usr1 = 2;

          //Act
          $test_meetup->updateConfirm_meet_usr1($new_confirm_meet_usr1);

          //Assert
          $this->assertEquals($test_meetup->getConfirm_meet_usr1(), $new_confirm_meet_usr1);
        }
        function test_updateConfirm_meet_usr2()
        {
          //Arrange
          $user1_id = 1;
          $user2_id = 2;
          $user1_confirm = 1;
          $user2_confirm = 1;
          $location_id = 1;
          $confirm_meet_usr1 = 1;
          $confirm_meet_usr2 = 0;
          $id = 1;
          $test_meetup = new Meetup($user1_id, $user2_id, $user1_confirm,
          $user2_confirm, $location_id, $confirm_meet_usr1, $confirm_meet_usr2, $id);
          $test_meetup->save();

          $new_confirm_meet_usr2 = 2;

          //Act
          $test_meetup->updateConfirm_meet_usr2($new_confirm_meet_usr2);

          //Assert
          $this->assertEquals($test_meetup->getConfirm_meet_usr2(), $new_confirm_meet_usr2);
        }
        // function test_updateAll()
        // {
        //   //Arrange
        //   $user1_id = 1;
        //   $user2_id = 2;
        //   $user1_confirm = 1;
        //   $user2_confirm = 1;
        //   $location_id = 1;
        //   $confirm_meet_usr1 = 1;
        //   $confirm_meet_usr2 = 0;
        //   $id = 1;
        //   $test_meetup = new Meetup($user1_id, $user2_id, $user1_confirm,
        //   $user2_confirm, $location_id, $confirm_meet_usr1, $confirm_meet_usr2, $id);
        //   $test_meetup->save();
        //
        //   $user1_id2 = 2;
        //   $user2_id2 = 3;
        //   $user1_confirm2 = 0;
        //   $user2_confirm2 = 0;
        //   $location_id2 = 4;
        //   $confirm_meet_usr12 = 1;
        //   $confirm_meet_usr22 = 1;
        //   $id2 = 1;
        //   $test_meetup2 = new Meetup($user1_id2, $user2_id2, $user1_confirm2,
        //   $user2_confirm2, $location_id2, $confirm_meet_usr12, $confirm_meet_usr22, $id2);
        //   $test_meetup2->save();
        //
        //
        //
        //   //Act
        //   $test_meetup->updateAll($user1_id2, $user2_id2, $user1_confirm2,
        //   $user2_confirm2, $location_id2, $confirm_meet_usr12, $confirm_meet_usr22, $id2);
        //
        //   //Assert
        //   $this->assertEquals($test_meetup, $test_meetup2);
        // }

    }
?>
