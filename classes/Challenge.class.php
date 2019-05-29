<?php
    require_once("Db.class.php");

    class Challenge
    {
        private $spaceId;
        private $challengeDesc;
        private $challengeType;

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
         * Get the value of challengeDesc
         */ 
        public function getChallengeDesc()
        {
                return $this->challengeDesc;
        }

        /**
         * Set the value of challengeDesc
         *
         * @return  self
         */ 
        public function setChallengeDesc($challengeDesc)
        {
                $this->challengeDesc = $challengeDesc;

                return $this;
        }

        /**
         * Get the value of challengeType
         */ 
        public function getChallengeType()
        {
                return $this->challengeType;
        }

        /**
         * Set the value of challengeType
         *
         * @return  self
         */ 
        public function setChallengeType($challengeType)
        {
                $this->challengeType = $challengeType;

                return $this;
        }
        public function createChallenge() {
            try {
                $conn = Db::getInstance();
                $statement = $conn->prepare('insert into challenge (challengeType, challengeDesc, space_id) values (:challengeType, :challengeDesc, :space_id)');
                $statement->bindParam(':space_id', $this->spaceId);
                $statement->bindParam(':challengeDesc', $this->challengeDesc);
                $statement->bindParam(':challengeType', $this->challengeType);
                $statement->execute();
        } catch ( Throwable $t ) {
                return false;
    
            }
        }

        public static function getChallengeBySpaceId($spaceId) {
            try {
                $conn = Db::getInstance();
                $statement = $conn->prepare('select * from challenge where space_id = :space_id');
                $statement->bindParam('space_id', $spaceId);
                $statement->execute();

                return $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        } catch ( Throwable $t ) {
                return false;
    
            }
        }
        public static function getChallengeById($challengeId) {
            try {
                $conn = Db::getInstance();
                $statement = $conn->prepare('select * from challenge where id = :challenge_id');
                $statement->bindParam('challenge_id', $challengeId);
                $statement->execute();
                
                return $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        } catch ( Throwable $t ) {
                return false;
    
            }
        }

        public static function getRandomTip() {
            try {
                $conn = Db::getInstance();
                $statement = $conn->prepare('select tip from tip order by RAND() limit 1');
                $statement->execute();
                return $result = $statement->fetch();
        } catch ( Throwable $t ) {
                return false;
    
            }
        }

        public static function getActiveType($activeType) {
                try {
                        switch ($activeType) {
                                case "afval":
                                    echo '<style type="text/css">
                                    #afval {
                                        border: 5px solid green;
                                        border-radius: 100%;
                                    }
                                    </style>';
                                    break;
                                case "energie":
                                echo '<style type="text/css">
                                #energie {
                                    border: 5px solid green;
                                    border-radius: 100%;
                                }
                                </style>';
                                    break;
                                case "groen":
                                echo '<style type="text/css">
                                #groen {
                                    border: 5px solid green;
                                    border-radius: 100%;
                                }
                                </style>';
                                    break;
                                case "water":
                                echo '<style type="text/css">
                                #water {
                                    border: 5px solid green;
                                    border-radius: 100%;
                                }
                                </style>';
                                    break;
                    }
                } catch( Throwable $t ) {
                        return false;
                }
        }
    }