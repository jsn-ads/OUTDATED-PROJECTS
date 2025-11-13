<?php

class PostComment
{
    public $id;
    public $id_post;
    public $id_user;
    public $created_at;
    public $body;
}

interface PostCommentDao
{
    public function addComment(PostComment $pc);
    public function getComments($id_post);
}
