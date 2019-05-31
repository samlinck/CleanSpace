<?php
    require_once("Db.class.php");

    class Space {
        private $spaceName;
        private $street;
        private $number;
        private $zip;
        private $city;
        private $userId;
        private $spaceType;
        private $spaceId;
        
       
        /**
         * Get the value of spaceId
         */ 
        public function getSpaceId()
        {
                return $this->spaceId;
        }

        /**
         * Set the value of spaceId
         *
         * @return  self
         */ 
        public function setSpaceId($spaceId)
        {
                $this->spaceId = $spaceId;

                return $this;
        }
        /**
         * Get the value of spaceName
         */ 
        public function getSpaceName()
        {
                return $this->spaceName;
        }

        /**
         * Set the value of spaceName
         *
         * @return  self
         */ 
        public function setSpaceName($spaceName)
        {
                $this->spaceName = $spaceName;

                return $this;
        }

        /**
         * Get the value of userId
         */ 
        public function getUserId()
        {
                return $this->userId;
        }

        /**
         * Set the value of userId
         *
         * @return  self
         */ 
        public function setUserId($userId)
        {
                $this->userId = $userId;

                return $this;
        }

        /**
         * Get the value of spaceType
         */ 
        public function getSpaceType()
        {
                return $this->spaceType;
        }

        /**
         * Set the value of spaceType
         *
         * @return  self
         */ 
        public function setSpaceType($spaceType)
        {
                $this->spaceType = $spaceType;

                return $this;
        }

        /**
         * Get the value of street
         */ 
        public function getStreet()
        {
                return $this->street;
        }

        /**
         * Set the value of street
         *
         * @return  self
         */ 
        public function setStreet($street)
        {
                $this->street = $street;

                return $this;
        }

        /**
         * Get the value of number
         */ 
        public function getNumber()
        {
                return $this->number;
        }

        /**
         * Set the value of number
         *
         * @return  self
         */ 
        public function setNumber($number)
        {
                $this->number = $number;

                return $this;
        }

        /**
         * Get the value of zip
         */ 
        public function getZip()
        {
                return $this->zip;
        }

        /**
         * Set the value of zip
         *
         * @return  self
         */ 
        public function setZip($zip)
        {
                $this->zip = $zip;

                return $this;
        }

        /**
         * Get the value of city
         */ 
        public function getCity()
        {
                return $this->city;
        }

        /**
         * Set the value of city
         *
         * @return  self
         */ 
        public function setCity($city)
        {
                $this->city = $city;

                return $this;
        }
        public function registerSpace() {
    
            try {
                $conn = Db::getInstance();
                $statement = $conn->prepare('insert into space( spaceName, street, number, zip, city, spaceType) VALUES (:spaceName, :street, :number, :zip, :city, :spaceType)');
                $statement->bindParam(':spaceName', $this->spaceName);
                $statement->bindParam(':street', $this->street);
                $statement->bindParam(':number', $this->number);
                $statement->bindParam(':zip', $this->zip);
                $statement->bindParam(':city', $this->city);
                $statement->bindParam(':spaceType', $this->spaceType);  
                $statement->execute();

                // get last id
                $lastId = $conn->lastInsertId();
                return $lastId;
    
            } catch ( Throwable $t ) {
                return false;
    
            }
        
        }
        public function createSpaceAdmin() {
                try {
                        $conn = Db::getInstance();
                        $statement = $conn->prepare('insert into spaceadmins (space_id, user_id) values (:spaceId, :userId)');
                        $statement->bindParam(':spaceId', $this->spaceId);
                        $statement->bindParam(':userId', $this->userId);
                        $statement->execute();
                } catch ( Throwable $t ) {
                        return false;
            
                    }
        }

        public function createSpaceCrew() {
                try {
                        $conn = Db::getInstance();
                        $statement = $conn->prepare('insert into spacecrew (space_id, user_id) values (:spaceId, :userId)');
                        $statement->bindParam(':spaceId', $this->spaceId);
                        $statement->bindParam(':userId', $this->userId);
                        $statement->execute();
                } catch ( Throwable $t ) {
                        return false;
            
                    }
        }

        public static function getSpaces()
        {
            try {
                $conn = Db::getInstance();
                $statement = $conn->prepare('select * from space ORDER BY zip DESC');
                $statement->execute();
                $result = $statement->fetchAll();

                return $result;
            } catch (Throwable $t) {
                echo $t;
            }
        }


        public static function getSpaceInfo($spaceId) {
                try {
                        $conn = Db::getInstance();
                        $statement = $conn->prepare('select * from space where id= :space_id');
                        $statement->bindParam(':space_id', $spaceId);
                        $statement->execute();
                        
                        return $result = $statement->fetchAll(PDO::FETCH_ASSOC);
                } catch ( Throwable $t ) {
                        return false;
            
                    }
        } 

        public static function checkAdmin($spaceId) {
                try {
                        $conn = Db::getInstance();
                        $statement = $conn->prepare('select user_id from spaceadmins where space_id= :space_id');
                        $statement->bindParam(':space_id', $spaceId);
                        $statement->execute();
                        
                        return $result = $statement->fetchAll(PDO::FETCH_ASSOC);
                } catch ( Throwable $t ) {
                        return false;
            
                    }
        }

        public static function checkCrew($spaceId) {
                try {
                        $conn = Db::getInstance();
                        $statement = $conn->prepare('select user_id from spacecrew where space_id= :space_id');
                        $statement->bindParam(':space_id', $spaceId);
                        $statement->execute();
                        
                        return $result = $statement->fetchAll(PDO::FETCH_ASSOC);
                } catch ( Throwable $t ) {
                        return false;
                    }
        }

        public static function checkSpace($userId) {
                try {
                        $conn = Db::getInstance();
                        $statement = $conn->prepare('select user_id from spacecrew where space_id= :space_id');
                        $statement->bindParam(':space_id', $spaceId);
                        $statement->execute();
                        
                        return $result = $statement->fetchAll(PDO::FETCH_ASSOC);
                } catch ( Throwable $t ) {
                        return false;
            
                    }
        }

        public static function getSpacesLeft($userId) {
                try {
                        $conn = Db::getInstance();
                        $statement = $conn->prepare('select * from space left join spaceadmins on space.id = spaceadmins.space_id left join spacecrew on space.id = spacecrew.space_id where spaceadmins.user_id <> :user_Id or spacecrew.user_id <> :user_Id order by city asc');
                        $statement->bindParam(':user_Id', $userId);
                        $statement->execute();
                        
                        return $result = $statement->fetchAll(PDO::FETCH_ASSOC);
                } catch ( Throwable $t ) {
                        return false;
            
                    }
        }

        public static function canJoin($userId, $admins, $crew) {
                if (in_array($userId, $admins) || in_array($userId, $crew) ) {
                        return "invisible";
                    } else {
                        return "";
                    }
        }

        public static function canAdd($userId, $admins, $crew) {
                if (in_array($userId, $admins) || in_array($userId, $crew) ) {
                        return "visible";
                    } else {
                        return "invisible";
                    }
        }
        
    }