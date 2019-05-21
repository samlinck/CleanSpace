<?php
    require_once("Db.class.php");

    class Space {
        private $street;
        private $number;
        private $zip;
        private $city;
        

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
        public function register() {
    
            try {
                $conn = Db::getInstance();
                $statement = $conn->prepare('INSERT INTO space (street, number, zip, city) values (:street, :number, :zip, :city))');
                $statement->bindParam(':street', $this->street);
                $statement->bindParam(':number', $this->number);
                $statement->bindParam(':zip', $this->zip);
                $statement->bindParam(':city', $this->city);  
                $statement->execute();

    
            } catch ( Throwable $t ) {
                return false;
    
            }
        
    }
    }