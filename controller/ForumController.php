<?php

    namespace Controller;


    use App\AbstractController;
use App\ControllerInterface;
use Model\Managers\CategoryManager;
use Model\Managers\PostManager;
use Model\Managers\TopicManager;
use Model\Managers\UserManager;
use App\Session;
    class ForumController extends AbstractController implements ControllerInterface{

        public function index(){}

    public function listTopics()
    {
        $topicManager = new TopicManager();
        // $usermanager = new UserManager();
        // $category = new CategoryManager();

        return [
            "view" => VIEW_DIR."forum/listTopics.php",
            "data" => [
                "topics" => $topicManager->findAll(["dateTopic", "DESC"]),
                // "users" => $usermanager->findAll(),
                // "categories" => $category->findAll()
            ]
        ];
    

    }



    public function addTopic($id)
    {
                
                $topicmanager = new TopicManager();
                $data = [
                    'title' => $_POST['title'],
                    'category_id' => $id
                ];
                $id_topic=$topicmanager->add($data);
                self::addPost($id_topic);
                return $this->redirectTo("forum", "listTopicsByCategory", $id);
            }


    public function addPost($id){
        $postmanager = new PostManager();
        $userSession = new Session();
        $data = [
            'text' => $_POST['post'],
            'topic_id' => $id,
            'user_id' => $userSession->getUser()->getId()
        ];
        $postmanager->add($data);
        return $this->redirectTo("forum", "listPostsByTopic", $id);
    }


    
    public function listUsers(){
        $userManager = new UserManager();

        return [
            "view" => VIEW_DIR."forum/listTopics.php",
            "data" => [
                "users" => $userManager->findAll([])
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

        public function deletePost($id){
        $postManager = new PostManager();
        $id_topic = $postManager->findOneById($id)->getTopic()->getId();
        $postManager->delete($id);

        $this->redirectTo("forum", "listPostsByTopic", $id_topic);
        
        }

        public function blockUser(){

        }

        

    }
