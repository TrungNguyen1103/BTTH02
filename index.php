<?php
// require_once 'vendor/autoload.php';
// require_once 'config/database-connection.php';

// use Twig\Environment;
// use Twig\Loader\FilesystemLoader;

// $loader = new FilesystemLoader('views');
// $twig = new Environment($loader);

// $action = isset($_GET['action']) ? $_GET['action'] : '';

// switch ($action) {
//     case 'add':
//         if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//             $name = $_POST['name'];
//             $email = $_POST['email'];
//             $stmt = $db->prepare("INSERT INTO users (name, email) VALUES (?, ?)");
//             $stmt->execute([$name, $email]);
//             header('Location: index.php');
//             exit;
//         }
//         echo $twig->render('add.twig');
//         break;
//     case 'edit':
//         $id = $_GET['id'];
//         $stmt = $db->prepare("SELECT * FROM users WHERE id = ?");
//         $stmt->execute([$id]);
//         $user = $stmt->fetch(PDO::FETCH_ASSOC);
//         if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//             $name = $_POST['name'];
//             $email = $_POST['email'];
//             $stmt = $db->prepare("UPDATE users SET name = ?, email = ? WHERE id = ?");
//             $stmt->execute([$name, $email, $id]);
//             header('Location: index.php');
//             exit;
//         }
//         echo $twig->render('edit.twig', ['user' => $user]);
//         break;
//     case 'delete':
//         $id = $_GET['id'];
//         $stmt = $db->prepare("DELETE FROM users WHERE id = ?");
//         $stmt->execute([$id]);
//         header('Location: index.php');
//         exit;
//         break;
//     default:
//         $stmt = $db->query("SELECT * FROM users");
//         $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
//         echo $twig->render('index.twig', ['users' => $users]);
//         break;
// }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Music for Life</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="/BTTH02/assets/css/style.css">
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg bg-body-tertiary shadow p-3 bg-white rounded">
            <div class="container-fluid">
                <div class="my-logo">
                    <a class="navbar-brand" href="#">
                        <img src="assets/images/logo2.png" alt="" class="img-fluid">
                    </a>
                </div>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href=".">Trang chủ</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="views/admin/login.php">Đăng nhập</a>
                    </li>
                </ul>
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Nội dung cần tìm" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Tìm</button>
                </form>
                </div>
            </div>
        </nav>

        <div id="carouselExampleIndicators" class="carousel slide">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                <img src="assets/images/slideshow/slide01.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                <img src="assets/images/slideshow/slide02.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                <img src="assets/images/slideshow/slide03.jpg" class="d-block w-100" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
            </div>
    </header>
    <main class="container-fluid mt-3">
        <h3 class="text-center text-uppercase mb-3 text-primary">TOP bài hát yêu thích</h3>
        <div class="row">
            <div class="col-sm-3">
                <div class="card mb-2" style="width: 100%;">
                    <img src="assets/images/songs/cayvagio.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title text-center">
                            <a href="/btth02/views/admin/detail.php" class="text-decoration-none">Cây, lá và gió</a>
                        </h5>
                    </div>
                </div>
            </div>

            <div class="col-sm-3">
                <div class="card mb-2" style="width: 100%;">
                    <img src="assets/images/songs/csmt.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title text-center">
                            <a href="" class="text-decoration-none">Cuộc sống mến thương</a>
                        </h5>
                    </div>
                </div>
            </div>

            <div class="col-sm-3">
                <div class="card mb-2" style="width: 100%;">
                    <img src="assets/images/songs//longme.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title text-center">
                            <a href="" class="text-decoration-none">Lòng mẹ</a>
                        </h5>
                    </div>
                </div>
            </div>

            <div class="col-sm-3">
                <div class="card mb-2" style="width: 100%;">
                    <img src="assets/images/songs/phoipha.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title text-center">
                            <a href="" class="text-decoration-none">Phôi pha</a>
                        </h5>
                    </div>
                </div>
            </div>

            <div class="col-sm-3">
                <div class="card mb-2" style="width: 100%;">
                    <img src="assets/images/songs/noitinhyeubatdau.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title text-center my-title">
                            <a href="" class="text-decoration-none">Nơi tình yêu bắt đầu</a>
                        </h5>
                    </div>
                </div>
            </div>
            <a href="/BTTH02/views/admin/logout.php">Logout</a>
        </div>
    </main>
    <footer class="bg-white d-flex justify-content-center align-items-center border-top border-secondary  border-2" style="height:80px">
        <h4 class="text-center text-uppercase fw-bold">TLU's music garden</h4>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>