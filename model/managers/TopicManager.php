<?php
    namespace Model\Managers;
    
    use App\Manager;
    use App\DAO;
    

    class TopicManager extends Manager{

        protected $className = "Model\Entities\Topic";
        protected $tableName = "topic";


        public function __construct(){
            parent::connect();
        }

        public function findTopicByCategory($id){

            $sql =  " SELECT * 
               FROM " . $this->tableName . " p 
                WHERE p.category_id = :id";

            return $this->getMultipleResults(
                DAO::select($sql,['id'=>$id]),
                $this->className
       );

       }


    }