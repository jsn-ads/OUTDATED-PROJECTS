<?php
require_once 'models/PostLike.php';

class PostLikeDaoMysql implements PostLikeDao
{
    private $pdo;

    public function __construct(PDO $driver)
    {
        $this->pdo = $driver;
    }

    public function getLikeCount($id_post)
    {
        $sql = $this->pdo->prepare("SELECT COUNT(*) as c FROM post_likes WHERE id_post = :id_post");

        $sql->bindValue(':id_post', $id_post);
        $sql->execute();

        $data = $sql->fetch();
        return $data['c'];
    }

    public function isLiked($id_post, $id_user) {}
    public function likeToggle($id_post, $id_user) {}
}
