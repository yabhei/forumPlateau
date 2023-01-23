<?php
    namespace Model\Entities;

    use App\Entity;

    final class User extends Entity{

        private $id;
        private $pseudo;
        private $email;
        private $password;
        private $registration_date;

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
         * Get the value of pseudo
         */ 
        public function getpseudo()
        {
                return $this->pseudo;
        }

        /**
         * Set the value of pseudo
         *
         * @return  self
         */ 
        public function setpseudo($pseudo)
        {
                $this->pseudo = $pseudo;

                return $this;
        }


        public function getemail()
        {
                return $this->email;
        }

        /**
         * Set the value of email
         *
         * @return  self
         */ 
        public function setemail($email)
        {
                $this->email = $email;

                return $this;
        }

         /**
         * Get the value of password
         */ 
        public function getpassword()
        {
                return $this->password;
        }

        /**
         * Set the value of password
         *
         * @return  self
         */ 
        public function setpassword($password)
        {
                $this->password = $password;

                return $this;
        }


        /**
         * Get the value of registration_date
         */ 
        public function getregistration_date()
        {
                return $this->registration_date;
        }

        /**
         * Set the value of registration_date
         *
         * @return  self
         */ 
        public function setregistration_date($registration_date)
        {
                $this->registration_date = $registration_date;

                return $this;
        }

        
    }
