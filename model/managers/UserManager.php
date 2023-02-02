<?php
    namespace Model\Managers;
    
    use App\Manager;
    use App\DAO;
 

    class UserManager extends Manager{

        protected $className = "Model\Entities\User";
        protected $tableName = "user";


        public function __construct(){
            parent::connect();
        }

        public function findOneByEmail($email){
        $sql =   "SELECT * 
                  FROM " . $this->tableName . " u  
                  WHERE u.email = :email ";

        return $this->getOneOrNullResult(
            DAO::select($sql, ['email' => $email], false),
            $this->className
        );

        }

        public function infoUserById($id){
            $sql =   "SELECT * 
                      FROM " . $this->tableName . " u  
                      WHERE u.id_user = :id ";
    
            return $this->getOneOrNullResult(
                DAO::select($sql, ['id' => $id], false),
                $this->className
            );
    
            }

        public function retrievePassword($email){
            $sql =   "SELECT u.password
                      FROM " . $this->tableName . " u  
                      WHERE u.email = :email ";
    
            return $this->getOneOrNullResult(
                DAO::select($sql, ['email' => $email], false),
                $this->className
            );
    
            }


    }