<?php
namespace app\controllers;

use app\core\Controller;
use app\models\Post;

class PostController extends Controller
{
    public function index()
    {
        $postModel = new Post();
        $template = $this->twig->load('posts/posts.twig');
        $homepageData = [
            'posts' => $postModel->getAllPosts(),
        ];
        echo $template->render($homepageData);
    }

    // HW8
    public function create() {
    
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
    $description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_SPECIAL_CHARS);

    if (empty($name) || empty($description)) {
        http_response_code(400);
        echo "Please include both name and description.";
        return;
    }

    $postModel = new Post();
    $result = $postModel->save(['name' => $name, 'description' => $description]);

    if ($result) {
        $_SESSION['success_message'] = "Success!";
    header("Location: /posts");
    exit;

    } else {
        http_response_code(500);
        echo "Failed";
    }
}
}