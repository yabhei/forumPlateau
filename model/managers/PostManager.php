<?php
    namespace Model\Managers;
    
    use App\Manager;
    use App\DAO;


    class PostManager extends Manager{

        protected $className = "Model\Entities\Post";
        protected $tableName = "post";


        public function __construct(){
            parent::connect();
        }

        public function findPostsByTopic($id){

             $sql =  " SELECT * 
                FROM " . $this->tableName . " p 
                 WHERE p.topic_id = :id
                 ORDER BY datePost DESC";

             return $this->getMultipleResults(
                 DAO::select($sql,['id'=>$id]),
                 $this->className
        );

        }

        public function deletePostByUser($id){
        $sql = "DELETE FROM " . $this->tableName . " 
            WHERE user_id = :id ";

        DAO::delete($sql,['user' => $id]);

           

        }


        


    }