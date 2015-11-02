<?php

    class Place
    {
        private $place_name;
        private $address;
        private $latitude;
        private $longitude;
        private $id;

        function __construct($place_name, $address, $latitude, $longitude, $id = null)
        {
            $this->place_name = $place_name;
            $this->address = $address;
            $this->longitude = $longitude;
            $this->latitude = $latitude;
            $this->id = $id;
        }

        function setPlaceName ($new_place_name)
        {
            $this->place_name = (string) $new_place_name;
        }
        function getPlaceName()
        {
            return $this->place_name;
        }

        function setAddress ($new_address)
        {
            $this->address = (string) $new_address;
        }
        function getAddress()
        {
            return $this->address;
        }

        function setLongitude ($new_longitude)
        {
            $this->longitude = $new_longitude;
        }
        function getLongitude()
        {
            return $this->longitude;
        }
        function setLatitude ($new_latitude)
        {
            $this->latitude = $new_latitude;
        }
        function getLatitude()
        {
            return $this->latitude;
        }

        function getId()
        {
            return $this->id;
        }

        function save()
        {
            $GLOBALS['DB']->exec("INSERT INTO places (place_name, address, latitude, longitude)
                VALUES ('{$this->getPlaceName()}',
                        '{$this->getAddress()}',
                        {$this->getLatitude()},
                        {$this->getLongitude()});");
                        $this->id = $GLOBALS['DB']->lastInsertId();
        }

        static function getAll()
        {
            $returned_places = $GLOBALS['DB']->query("SELECT * FROM places;");
            $places = array();
            foreach($returned_places as $place) {
                $place_name = $place['place_name'];
                $address = $place['address'];
                $latitude = $place['latitude'];
                $longitude = $place['longitude'];
                $id = $place['id'];
                $new_place = new Place($place_name, $address, $latitude, $longitude, $id);
                array_push($places, $new_place);
            }
            return $places;
        }

        static function deleteAll()
        {
          $GLOBALS['DB']->exec("DELETE FROM places;");
        }

        static function find($search_id)
        {
            $found_place = null;
            $places = Place::getAll();
            foreach($places as $place) {
                $place_id = $place->getId();
                if ($place_id == $search_id) {
                  $found_place = $place;
                }
            }
            return $found_place;
        }

        function updatePlaceName($new_place_name)
        {
            $GLOBALS['DB']->exec("UPDATE places SET place_name =
                '{$new_place_name}' WHERE id = {$this->getId()};");
            $this->setPlaceName($new_place_name);
        }

        function updateAddress($new_address)
        {
            $GLOBALS['DB']->exec("UPDATE places SET address =
                '{$new_address}' WHERE id = {$this->getId()};");
            $this->setAddress($new_address);
        }

        function updateLocation($new_latitude, $new_longitude)
        {
            $GLOBALS['DB']->exec("UPDATE places SET latitude, longitude VALUES =
                {$new_latitude}, {new_longitude} WHERE id = {$this->getId()};");
            $this->setLatitude($new_latitude);
            $this->setLongitude($new_longitude);
        }

        function updateAll($new_place_name, $new_address, $new_latitude, $new_longitude)
        {
            $GLOBALS['DB']->exec("UPDATE places SET place_name =
                '{$new_place_name}' WHERE id = {$this->getId()};");
            $this->setPlaceName($new_place_name);
            $GLOBALS['DB']->exec("UPDATE places SET address =
                '{$new_address}' WHERE id = {$this->getId()};");
            $this->setAddress($new_address);
            $GLOBALS['DB']->exec("UPDATE places SET latitude =
                '{$new_latitude}' WHERE id = {$this->getId()};");
            $this->setLatitude($new_latitude);
            $GLOBALS['DB']->exec("UPDATE places SET latitude =
                '{$new_latitude}' WHERE id = {$this->getId()};");
            $this->setLatitude($new_latitude);
        }

        function delete()
        {
            $GLOBALS['DB']->exec("DELETE FROM places WHERE id = {$this->getId()};");
            //$GLOBALS['DB']->exec("DELETE FROM places_users WHERE place_id = {$this->getId()};");
        }

        static function generateLocation()
        {
            $places = Place::getAll();
            $number_of_places = count($places);
            $random_number = rand(0, $number_of_places - 1);
            $random_location = $places[$random_number];
            return $random_location;
        }

        function distanceFrom($user)
        {
            $radius_of_earth = 6371000; //in meters
            $location_lat = deg2rad($this->getLatitude());
            $location_lng = deg2rad($this->getLongitude());
            $user_lat = deg2rad($user->getLatitude());
            $user_lng = deg2rad($user->getLongitude());

            $difference_lat = $user_lat - $location_lat;
			$difference_lng = $user_lng - $location_lng;

			$a = (sin($difference_lat/2) * sin($difference_lat/2)) + (cos($location_lat) * cos($user_lat) * (sin($difference_lng/2) * sin($difference_lng/2)));
			$c = 2 * atan2(sqrt($a), sqrt(1 - $a));
			$distance_between_two_points = $radius_of_earth * $c;

			return $distance_between_two_points;
        }

        function verifyLocation($user1, $user2)
        {
            $distance_from_user1 = $this->distanceFrom($user1);
            $distance_from_user2 = $this->distanceFrom($user2);
            if(($distance_from_user1 <= 5000) && ($distance_from_user2 <= 5000)) {
                return true;
            } else {
                return false;
            }
        }

        static function setMeetupLocation($user1, $user2)
        {
            $temp_location = Place::generateLocation();
            if ($temp_location->verifyLocation($user1, $user2)) {
                return $temp_location;
            }   else {
                Place::setMeetupLocation($user1, $user2);
            }
        }
        
        static function getMeetUpLocation($user1_id, $user2_id)
		{
			$query = $GLOBALS['DB']->query("SELECT location_id FROM meetups WHERE user1_id = {$user1_id} AND user2_id = {$user2_id} AND confirm_meet_usr1 IS NULL;");
            $result = $query->fetchAll(PDO::FETCH_ASSOC);
			$location_id = $result[0]['location_id'];
			$meetup_spot = Place::find($location_id);
            return $meetup_spot;
        }
    }
 ?>
