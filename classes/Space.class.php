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
                $statement = $conn->prepare('insert into space( spaceName, street, number, zip, city, user_id, spaceType) VALUES (:spaceName, :street, :number, :zip, :city, :userId, :spaceType)');
                $statement->bindParam(':spaceName', $this->spaceName);
                $statement->bindParam(':street', $this->street);
                $statement->bindParam(':number', $this->number);
                $statement->bindParam(':zip', $this->zip);
                $statement->bindParam(':city', $this->city);
                $statement->bindParam(':userId', $this->userId);
                $statement->bindParam(':spaceType', $this->spaceType);  
                $statement->execute();
    
            } catch ( Throwable $t ) {
                return false;
    
            }
        
        }

    }