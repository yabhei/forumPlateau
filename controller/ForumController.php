<?php

    namespace Controller;


    use App\AbstractController;
use App\ControllerInterface;
use Model\Managers\CategoryManager;
use Model\Managers\PostManager;
use Model\Managers\TopicManager;
use Model\Managers\UserManager;
use App\Session;
use App\DAO;
    class ForumController extends AbstractController implements ControllerInterface{

        public function index(){}

    public function listTopics()
    {
        $topicManager = new TopicManager();

        return [
            "view" => VIEW_DIR."forum/listTopics.php",
            "data" => [
                "topics" => $topicManager->findAll(["dateTopic", "DESC"]),
             
            ]
        ];
    

    }



    public function addTopic($id)
    {
        $topicTitle = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
       
                
                $topicmanager = new TopicManager();
                $userSession = new Session();

                $data = [
                    'title' =>  $topicTitle,
                    'category_id' => $id,
                    'user_id' => $userSession->getUser()->getId()
                ];
                $id_topic=$topicmanager->add($data);
                self::addPost($id_topic);
                return $this->redirectTo("forum", "listTopicsByCategory", $id);
            }

    public function deleteTopic($id){
        $topicManager = new TopicManager();
        $id_category = $topicManager->findOneById($id)->getcategory()->getId();
        $this->deletPostByTopic($id);
        $topicManager->delete($id);
        
        $this->redirectTo("forum", "listTopics");
        
        }

    

    public function deletTopicByCategory($id){
        $topicManager = new TopicManager();
        $topics = $topicManager->findTopicByCategory($id);
        foreach($topics as $topic){
            $this->deletPostByTopic($topic->getId());

        }

        $sql = "DELETE FROM topic   
        WHERE category_id = :id "; 

        return DAO::delete($sql, ['id' => $id]);

    }


    public function addPost($id){
        $post = filter_input(INPUT_POST, 'post', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $postmanager = new PostManager();
        $userSession = new Session();
        $data = [
            'text' => $post,
            'topic_id' => $id,
            'user_id' => $userSession->getUser()->getId()
        ];
        $postmanager->add($data);
        return $this->redirectTo("forum", "listPostsByTopic", $id);
    }




    public function deletPostByTopic($id){
        $sql = "DELETE FROM  post    
        WHERE  topic_id = :id "; 

        return DAO::delete($sql, ['id' => $id]);

    }

    public function deletePost($id){
        $postManager = new PostManager();
        $id_topic = $postManager->findOneById($id)->getTopic()->getId();
        $postManager->delete($id);

        $this->redirectTo("forum", "listPostsByTopic", $id_topic);
        
        }




    
    public function users(){
        $this->restrictTo("ROLE_ADMIN");

        $manager = new UserManager();
        $users = $manager->findAll(['registrationDate', 'DESC']);

        return [
            "view" => VIEW_DIR."security/users.php",
            "data" => [
                "users" => $users
            ]
        ];
    }

        public function listCategories(){
            $categoryManager = new CategoryManager();

            return [
                "view" => VIEW_DIR."forum/listCategories.php",
                "data" => [
                    "categories" => $categoryManager->findAll(["nameCategory", "ASC"])
                ]
            ];
        

        }


        public function  deleteCategory($id){
           
            $categoryManager = new CategoryManager();
    
            $this->deletTopicByCategory($id);
            $categoryManager->delete($id);

            return [
                "view" => VIEW_DIR."forum/listCategories.php",
                "data" => [
                    "categories" => $categoryManager->findAll(["nameCategory", "ASC"])
                ]
            ];

    
            }


        public function addCategory(){
            $category = filter_input(INPUT_POST, 'nom', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $categoryManager = new CategoryManager();

        $data = [
            'nameCategory' =>  $category
        ];

        $categoryManager->add($data);

        $this->redirectTo("forum", "listCategories");



            }





        public function listPostsByTopic($id){
            $postManager = new PostManager();
            $topicmanager = new TopicManager();

            return [
                "view" => VIEW_DIR."forum/listPosts.php",
                "data" => [
                    "posts" => $postManager->findPostsByTopic($id),
                    "topic" => $topicmanager-> findOneById($id)
                ]
            ];

        }

        public function listTopicsByCategory($id){
            $topicManager = new TopicManager();
            $categoryManager = new CategoryManager();

            return [
                "view" => VIEW_DIR."forum/listTopics.php",
                "data" => [
                    "topics" => $topicManager->findTopicByCategory($id),
                    "category" => $categoryManager->findOneById($id)
                ]
            ];
        }

        public function userByEmail($email){
            $userManager = new UserManager();

            return [
                "view" => VIEW_DIR."forum/listUsers.php",
                "data" => [
                    "users" => $userManager->findOneByEmail($email)
                ]
            ];
        }


        public function userInfos($id){
        $userManager = new UserManager();

        return [
            "view" => VIEW_DIR."security/viewProfile.php",
                "data" => [
                    "userInfo" => $userManager->infoUserById($id)
                ]
        ];
        }

       
    

        public function deleteUser($id){
        $userManager = new UserManager();

        $userManager->delete($id);
        $this->redirectTo("forum", "users");

        }

        public function changeStatus($id){
            $userManager = new UserManager();
            if($userManager->findOneById($id)->getStatus()){
            
            $userManager->update($id,"status" , 0);
            $this->redirectTo("forum", "users");
            }else{
                
                $userManager->update($id, "status", 1);
                $this->redirectTo("forum", "users");
            }
            
        }

      

        public function lockTopic($id){

        $topicManager = new TopicManager();
        $id_category = $topicManager->findOneById($id)->getcategory()->getId();
        if($topicManager->findOneById($id)->getlocked()){
            
            $topicManager->update($id,"locked" , 0);
            $this->redirectTo("forum", "listTopicsByCategory",$id_category);
            }else{
                
                $topicManager->update($id, "locked", 1);
                $this->redirectTo("forum", "listTopicsByCategory",$id_category);
            }
        }


        

    }
