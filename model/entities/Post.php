<?php
    namespace Model\Entities;

    use App\Entity;

    final class Post extends Entity{

        private $id;
        private $text;
        private $date_post;
        private $user;
        private $topic;

        public function __construct($data){         
            $this->hydrate($data);        
        }
 
        /**
         * Get the value of id
         */ 
        public function getId()
        {
                return $this->id;
        }

        /**
         * Set the value of id
         *
         * @return  self
         */ 
        public function setId($id)
        {
                $this->id = $id;

                return $this;
        }

        /**
         * Get the value of text
         */ 
        public function gettext()
        {
                return $this->text;
        }

        /**
         * Set the value of text
         *
         * @return  self
         */ 
        public function settext($text)
        {
                $this->text = $text;

                return $this;
        }

        /**
         * Get the value of user
         */ 
        public function getUser()
        {
                return $this->user;
        }

        /**
         * Set the value of user
         *
         * @return  self
         */ 
        public function setUser($user)
        {
                $this->user = $user;

                return $this;
        }

        public function getdate_post(){
            $formattedDate = $this->date_post->format("d/m/Y, H:i:s");
            return $formattedDate;
        }

        public function setdate_post($date){
            $this->date_post = new \DateTime($date);
            return $this;
        }

        /**
         * Get the value of topic
         */ 
        public function gettopic()
        {
                return $this->topic;
        }

        /**
         * Set the value of topic
         *
         * @return  self
         */ 
        public function settopic($topic)
        {
                $this->topic = $topic;

                return $this;
        }

        
    }
