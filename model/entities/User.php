<?php
    namespace Model\Entities;

    use App\Entity;

    final class User extends Entity{

        private $id;
        private $pseudo;
        private $email;
        private $password;
        private $registrationDate;
        private $status;
        private $role ;

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
         * Get the value of registrationDate
         */ 
        public function getregistrationDate()
        {
                return $this->registrationDate;
        }

        /**
         * Set the value of registrationDate
         *
         * @return  self
         */ 
        public function setregistrationDate($registrationDate)
        {
                $this->registrationDate = $registrationDate;

                return $this;
        }

        

        /**
         * Get the value of status
         */ 
        public function getStatus()
        {
                return $this->status;
        }

        /**
         * Set the value of status
         *
         * @return  self
         */ 
        public function setStatus($status)
        {
                $this->status = $status;

                return $this;
        }

        public function hasRole($rl){
                if($this->role == $rl){
                        return true;
                }else{
                        return false;
                }
        }



        /**
         * Get the value of role
         */ 
        public function getRole()
        {
                return $this->role;
        }

        /**
         * Set the value of role
         *
         * @return  self
         */ 
        public function setRole($role)
        {
                $this->role = $role;

                return $this;
        }
}
