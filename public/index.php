<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once '../app/vendor/autoload.php';
require_once "../app/core/Controller.php";
require_once "../app/models/User.php";
require_once "../app/models/Post.php";
require_once "../app/controllers/MainController.php";
require_once "../app/controllers/UserController.php";
require_once "../app/controllers/PostController.php";

use app\controllers\MainController;
use app\controllers\UserController;
use app\controllers\PostController;

$url = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);

$mainController = new MainController();
$postController = new PostController();

switch ($url) {
    case "/":
        $mainController->homepage();
        break;
    case "/posts":
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $postController->index();
        }
        break;
    case "/posts/create":
        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            $postController->create();
        } else {
            http_response_code(400);
            echo "not allowed";
    }
    break;
default:
    $mainController->notFound();
    break;
}
