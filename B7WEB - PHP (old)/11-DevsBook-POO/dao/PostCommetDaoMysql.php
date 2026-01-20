<?php
require_once 'models/PostComment.php';
require_once 'dao/UserDaoMysql.php';

class PostCommetDaoMysql implements PostCommentDao
{
    private $pdo;

    public function __construct(PDO $driver)
    {
        $this->pdo = $driver;
    }

    public function addComment(PostComment $pc)
    {
        $sql = $this->pdo->prepare("INSERT INTO post_comments (id_post, id_user, created_at, body) VALUES (:id_post, :id_user, NOW(), :body)");

        $sql->bindValue(':id_post', $pc->id_post);
        $sql->bindValue(':id_user', $pc->id_user);
        $sql->bindValue(':body', $pc->body);
        $sql->execute();

        $pc->id = $this->pdo->lastInsertId();
        return $pc;
    }

    public function getComments($id_post)
    {
        $comments = [];

        $sql = $this->pdo->prepare("SELECT * FROM post_comments WHERE id_post = :id_post ORDER BY created_at DESC");
        $sql->bindValue(':id_post', $id_post);
        $sql->execute();

        if ($sql->rowCount() > 0) {

            $data = $sql->fetchAll(PDO::FETCH_ASSOC);
            $userDao = new UserDaoMysql($this->pdo);

            foreach ($data as $item) {
                $pc = new PostComment();
                $pc->id = $item['id'];
                $pc->id_post = $item['id_post'];
                $pc->id_user = $item['id_user'];
                $pc->created_at = $item['created_at'];
                $pc->body = $item['body'];
                $pc->user = $userDao->findById($item['id_user']);

                $comments[] = $pc;
            }
        }

        return $comments;
    }

}
