<?php

    namespace Controller;

    use App\Session;
    use App\AbstractController;
    use App\ControllerInterface;
    use Model\Managers\TopicManager;
    use Model\Managers\PostManager;
    use Model\Managers\CategoryManager;
    use Model\Managers\UserManager;

    class ForumController extends AbstractController implements ControllerInterface{

        public function index(){
          

           $topicManager = new TopicManager();

            return [
                "view" => VIEW_DIR."forum/listTopics.php",
                "data" => [
                    "topics" => $topicManager->findAll(["dateTopic", "DESC"])
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

            return [
                "view" => VIEW_DIR."forum/listPosts.php",
                "data" => [
                    "posts" => $postManager->findPostsByTopic($id)
                ]
            ];

        }

        public function listTopicsByCategory($id){
            $topicManager = new TopicManager();

            return [
                "view" => VIEW_DIR."forum/listTopics.php",
                "data" => [
                    "topics" => $topicManager->findTopicByCategory($id)
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

        

    }
