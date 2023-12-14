<?php

namespace src\models;

use \core\Model;

class Post extends Model
{
    public $id;
    public $type;
    public $created_at;
    public $body;
    public $mine;
    public $likeCount;
    public $comments;
}
