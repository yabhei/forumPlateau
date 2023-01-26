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

        public function index(){}

    public function listTopics()
    {
        $topicManager = new TopicManager();
        $usermanager = new UserManager();
        $category = new CategoryManager();

        return [
            "view" => VIEW_DIR."forum/listTopics.php",
            "data" => [
                "topics" => $topicManager->findAll(["dateTopic", "DESC"]),
                "users" => $usermanager->findAll(),
                "categories" => $category->findAll()
            ]
        ];
    

    }



    public function addtopic($id)
    {
        // echo "hiiiiiiiiiii";
        // die();
        // if (isset($_GET['action']) && $_GET['action'] == "addtopic") {
            // if (isset($_GET['submit'])) {
                
                $topicmanager = new TopicManager();
                $data = [
                    'title' => $_POST['title'],
                    'dateTopic' => new \DateTime(),
                    'locked' => false,
                    'user_id' => 1,
                    'category_id' => $id
                ];
                $topicmanager->add($data);
                return $this->redirectTo("forum", "listTopics", $id);
            }

    // }
    // }
    
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
