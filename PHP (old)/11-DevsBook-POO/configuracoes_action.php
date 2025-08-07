<?php
require_once 'config.php';
require_once 'models/Auth.php';
require_once 'dao/UserDaoMysql.php';

$auth = new Auth($pdo, $base);
$userInfo = $auth->checkToken();

$userDao = new UserDaoMysql($pdo);

$name = filter_input(INPUT_POST, 'name');
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$birthdate = filter_input(INPUT_POST, 'birthdate');
$city = filter_input(INPUT_POST, 'city');
$work = filter_input(INPUT_POST, 'work');
$password = filter_input(INPUT_POST, 'password');
$password_confirm = filter_input(INPUT_POST, 'password_confirm');


if ($name && $email) {

    // E-MAIL
    if ($email != $userInfo->email) {
        if ($userDao->findByEmail($email) === $false) {
            $userInfo = $email;
        }
        $_SESSION['flash'] = 'E-mail ja esta sendo utilizado';
        header("Location:" . $base . "/configuracoes.php");
        exit;
    }

    // BIRTHDATE
    $birthdate = explode('/', $birthdate);
    if (count($birthdate) != 3) {
        $_SESSION['flash'] = 'Data de Aniversario invalida';
        header("Location:" . $base . "/configuracoes.php");
        exit;
    }
    $birthdate = $birthdate[2] . '-' . $birthdate[1] . '-' . $birthdate[0];
    if (strtotime($birthdate) === false) {
        $_SESSION['flash'] = 'Data de Aniversario invalida';
        header("Location:" . $base . "/configuracoes.php");
        exit;
    }

    //PASSWORD
    if (!empty($password)) {
        if ($password === $password_confirm) {
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $userInfo->password = $hash;
        } else {
            $_SESSION['flash'] = 'Senhas estão diferentes';
            header("Location:" . $base . "/configuracoes.php");
            exit;
        }
    }

    $userInfo->name = $name;
    $userInfo->$city = $city;
    $userInfo->work = $work;
    $userInfo->birthdate = $birthdate;

    // AVATAR

    if (isset($_FILES['avatar']) && !empty($_FILES['avatar']['tmp_name'])) {

        $newAvatar = $_FILES['avatar'];

        if (in_array($newAvatar['type'], ['image/jpeg', 'image/jpg', 'image/png'])) {
            $avatarWidth = 200;
            $avatarHeight = 200;

            list($widthOrig, $heightOrig) = getimagesize($newAvatar['tmp_name']);

            $radio = $widthOrig / $heightOrig;
            $newWidth = $avatarWidth;
            $newHeight = $newWidth / $radio;

            if ($newHeight < $avatarHeight) {
                $newHeight = $avatarHeight;
                $newWidth = $newHeight * $radio;
            }

            $x = $avatarWidth - $newWidth;
            $y = $avatarHeight - $newHeight;
            $x = $x < 0 ? $x / 2 : $x;
            $y = $y < 0 ? $y / 2 : $x;

            $finalImage = imagecreatetruecolor($avatarWidth, $avatarHeight);

            switch ($newAvatar['type']) {
                case 'image/jpeg':
                case 'image/jpg':
                    $image = imagecreatefromjpeg($newAvatar['tmp_name']);
                    break;

                case 'image/png':
                    $image = imagecreatefrompng($newAvatar['tmp_name']);
                    break;
            }

            imagecopyresampled(
                $finalImage,
                $image,
                $x,
                $y,
                0,
                0,
                $newWidth,
                $newHeight,
                $widthOrig,
                $heightOrig
            );

            $avatarName = md5(time() . rand(0, 9999)) . '.jpg';

            imagejpeg($finalImage, './media/avatars/' . $avatarName, 100);

            $userInfo->avatar = $avatarName;
        }
    }

    // COVER

    if (isset($_FILES['cover']) && !empty($_FILES['cover']['tmp_name'])) {

        $newCover = $_FILES['cover'];

        if (in_array($newCover['type'], ['image/jpeg', 'image/jpg', 'image/png'])) {
            $coverWidth = 850;
            $coverHeight = 310;

            list($widthOrig, $heightOrig) = getimagesize($newCover['tmp_name']);

            $radio = $widthOrig / $heightOrig;
            $newWidth = $coverWidth;
            $newHeight = $newWidth / $radio;

            if ($newHeight < $coverHeight) {
                $newHeight = $coverHeight;
                $newWidth = $newHeight * $radio;
            }

            $x = $coverWidth - $newWidth;
            $y = $coverHeight - $newHeight;
            $x = $x < 0 ? $x / 2 : $x;
            $y = $y < 0 ? $y / 2 : $x;

            $finalImage = imagecreatetruecolor($coverWidth, $coverHeight);

            switch ($newCover['type']) {
                case 'image/jpeg':
                case 'image/jpg':
                    $image = imagecreatefromjpeg($newCover['tmp_name']);
                    break;

                case 'image/png':
                    $image = imagecreatefrompng($newCover['tmp_name']);
                    break;
            }

            imagecopyresampled(
                $finalImage,
                $image,
                $x,
                $y,
                0,
                0,
                $newWidth,
                $newHeight,
                $widthOrig,
                $heightOrig
            );

            $coverName = md5(time() . rand(0, 9999)) . '.jpg';

            imagejpeg($finalImage, './media/covers/' . $coverName, 100);

            $userInfo->cover = $coverName;
        }
    }


    $userDao->update($userInfo);

    header("Location:" . $base . "/configuracoes.php");

    exit;
}


$_SESSION['flash'] = 'Campo E-mail e/ou Nome esta vazio';
header("Location:" . $base . "/configuracoes.php");
