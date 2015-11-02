<?php

    class Meetup
    {
        private $user1_id;
        private $user2_id;
        private $user1_confirm;
        private $user2_confirm;
        private $location_id;
        private $confirm_meet_usr1;
        private $confirm_meet_usr2;
        private $id;

        function __construct($user1_id, $user2_id, $user1_confirm,
            $user2_confirm, $location_id, $confirm_meet_usr1, $confirm_meet_usr2,
            $id = null)
        {
            $this->user1_id = $user1_id;
            $this->user2_id = $user2_id;
            $this->user1_confirm = $user1_confirm;
            $this->user2_confirm = $user2_confirm;
            $this->location_id = $location_id;
            $this->confirm_meet_usr1 = $confirm_meet_usr1;
            $this->confirm_meet_usr2 = $confirm_meet_usr2;
            $this->id = $id;
        }

        function setUser1_Id ($new_user1_id)
        {
            $this->user1_id = $new_user1_id;
        }

        function getUser1_Id()
        {
            return $this->user1_id;
        }

        function setUser2_Id ($new_user2_id)
        {
            $this->user2_id = $new_user2_id;
        }

        function getUser2_Id()
        {
            return $this->user2_id;
        }

        function setUser1_Confirm ($new_user1_confirm)
        {
            $this->user1_confirm = $new_user1_confirm;
        }

        function getUser1_Confirm()
        {
            return $this->user1_confirm;
        }

        function setUser2_Confirm ($new_user2_confirm)
        {
            $this->user2_confirm = $new_user2_confirm;
        }

        function getUser2_Confirm()
        {
            return $this->user2_confirm;
        }

        function setLocation_Id ($new_location_id)
        {
            $this->location_id = $new_location_id;
        }

        function getLocation_Id()
        {
            return $this->location_id;
        }

        function setConfirm_meet_usr1 ($new_confirm_meet_usr1)
        {
            $this->confirm_meet_usr1 = $new_confirm_meet_usr1;
        }

        function getConfirm_meet_usr1()
        {
            return $this->confirm_meet_usr1;
        }

        function setConfirm_meet_usr2 ($new_confirm_meet_usr2)
        {
            $this->confirm_meet_usr2 = $new_confirm_meet_usr2;
        }

        function getConfirm_meet_usr2()
        {
            return $this->confirm_meet_usr2;
        }

        function getId()
        {
            return $this->id;
        }

        function save()
        {
            $GLOBALS['DB']->exec("INSERT INTO meetups (user1_id, user2_id,
                user1_confirm, user2_confirm, location_id, confirm_meet_usr1,
                confirm_meet_usr2) VALUES (
                    {$this->getUser1_Id()},
                    {$this->getUser2_Id()},
                    {$this->getUser1_Confirm()},
                    {$this->getUser2_Confirm()},
                    {$this->getLocation_Id()},
                    {$this->getConfirm_meet_usr1()},
                    {$this->getConfirm_meet_usr2()});");
                    $this->id = $GLOBALS['DB']->lastInsertId();
        }

        static function getAll()
        {
            $returned_meetups = $GLOBALS['DB']->query("SELECT * FROM meetups;");
            $meetups = array();
            foreach($returned_meetups as $meetup) {
                $user1_id = $meetup['user1_id'];
                $user2_id = $meetup['user2_id'];
                $user1_confirm = $meetup['user1_confirm'];
                $user2_confirm = $meetup['user2_confirm'];
                $location_id = $meetup['location_id'];
                $confirm_meet_usr1 = $meetup['confirm_meet_usr1'];
                $confirm_meet_usr2 = $meetup['confirm_meet_usr2'];
                $id = $meetup['id'];
                $new_meetup = new Meetup($user1_id, $user2_id, $user1_confirm,
                    $user2_confirm, $location_id, $confirm_meet_usr1, $confirm_meet_usr2,
                    $id);
                array_push($meetups, $new_meetup);
            }
            return $meetups;
        }

        static function deleteAll()
        {
            $GLOBALS['DB']->exec("DELETE FROM meetups;");
        }

        function delete()
        {
            $GLOBALS['DB']->exec("DELETE FROM meetups WHERE id = {$this->getId()};");
        }

        static function find($search_id)
        {
            $found_meetup = null;
            $meetups = Meetup::getAll();
            foreach($meetups as $meetup) {
                $meetup_id = $meetup->getId();
                if ($meetup_id == $search_id) {
                    $found_meetup = $meetup;
                }
            }
            return $found_meetup;
        }

        function updateUser1_Id($new_user1_id)
        {
            $GLOBALS['DB']->exec("UPDATE meetups SET user1_id =
            {$new_user1_id} WHERE id = {$this->getId()};");
            $this->setUser1_Id($new_user1_id);
        }

        function updateUser2_Id($new_user2_id)
        {
            $GLOBALS['DB']->exec("UPDATE meetups SET user2_id =
            {$new_user2_id} WHERE id = {$this->getId()};");
            $this->setUser2_Id($new_user2_id);
        }

        function updateUser1_Confirm($new_user1_confirm)
        {
            $GLOBALS['DB']->exec("UPDATE meetups SET user1_confirm =
            {$new_user1_confirm} WHERE id = {$this->getId()};");
            $this->setUser1_Confirm($new_user1_confirm);
        }

        function updateUser2_Confirm($new_user2_confirm)
        {
            $GLOBALS['DB']->exec("UPDATE meetups SET user2_confirm =
            {$new_user2_confirm} WHERE id = {$this->getId()};");
            $this->setUser2_Confirm($new_user2_confirm);
        }

        function updateLocationId($new_location_id)
        {
            $GLOBALS['DB']->exec("UPDATE meetups SET location_id =
                '{$new_location_id}' WHERE id = {$this->getId()};");
            $this->setLocation_Id($new_location_id);
        }

        function updateConfirm_meet_usr1($new_confirm_meet_usr1)
        {
            $GLOBALS['DB']->exec("UPDATE meetups SET confirm_meet_usr1 =
                '{$new_confirm_meet_usr1}' WHERE id = {$this->getId()};");
            $this->setConfirm_meet_usr1($new_confirm_meet_usr1);
        }

        function updateConfirm_meet_usr2($new_confirm_meet_usr2)
        {
            $GLOBALS['DB']->exec("UPDATE meetups SET confirm_meet_usr2 =
                '{$new_confirm_meet_usr2}' WHERE id = {$this->getId()};");
            $this->setConfirm_meet_usr2($new_confirm_meet_usr2);
        }

        function updateAll($new_user1_id, $new_user2_id, $new_user1_confirm,
            $new_user2_confirm, $new_location_id, $new_confirm_meet_usr1,
            $new_confirm_meet_usr1)
            {
                $this->updateUser1_Id($new_user1_id);
                $this->updateUser2_Id($new_user2_id);
                $this->updateUser1_Confirm($new_user1_confirm);
                $this->updateUser2_Confirm($new_user2_confirm);
                $this->updateLocationId($new_location_id);
                $this->updateConfirm_meet_usr1($new_confirm_meet_usr1);
                $this->updateConfirm_meet_usr2($new_confirm_meet_usr2);
            }
    }


 ?>
