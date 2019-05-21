<?php
    require_once("Db.class.php");

    class Issue {
        private $spaceId;
        private $issueDesc;
        private $issueType;

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
         * Get the value of issueDesc
         */ 
        public function getIssueDesc()
        {
                return $this->issueDesc;
        }

        /**
         * Set the value of issueDesc
         *
         * @return  self
         */ 
        public function setIssueDesc($issueDesc)
        {
                $this->issueDesc = $issueDesc;

                return $this;
        }

        /**
         * Get the value of issueType
         */ 
        public function getIssueType()
        {
                return $this->issueType;
        }

        /**
         * Set the value of issueType
         *
         * @return  self
         */ 
        public function setIssueType($issueType)
        {
                $this->issueType = $issueType;

                return $this;
        }

        public function createIssue() {
            try {
                $conn = Db::getInstance();
                $statement = $conn->prepare('insert into issue (issueType, issueDesc, space_id) values (:issueType, :issueDesc, :space_id)');
                $statement->bindParam(':space_id', $this->spaceId);
                $statement->bindParam(':issueDesc', $this->issueDesc);
                $statement->bindParam(':issueType', $this->issueType);
                $statement->execute();
        } catch ( Throwable $t ) {
                return false;
    
            }
        }
    }