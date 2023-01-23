<?php
    namespace Model\Entities;

    use App\Entity;

    final class Category extends Entity{

        private $id;
        private $name_category;

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
         * Get the value of name_category
         */ 
        public function getname_category()
        {
                return $this->name_category;
        }

        /**
         * Set the value of name_category
         *
         * @return  self
         */ 
        public function setname_category($name_category)
        {
                $this->name_category = $name_category;

                return $this;
        }
        
    }
