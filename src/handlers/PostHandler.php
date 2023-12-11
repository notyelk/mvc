<?php

namespace src\handlers;

use ClanCats\Hydrahon\Query\Sql\Select;
use src\models\Post;
use src\models\User;
use src\models\UserRelation;


class PostHandler
{
    public static function addPost($idUser, $type, $body)
    {
        $body = trim($body);

        if (!empty($idUser) && !empty($body)) {

            Post::insert([
                'id_user'    => $idUser,
                'type'       => $type,
                'created_at' => date('Y-m-d H:i:s'),
                'body'       => $body
            ])
                ->execute();
        }
    }

    public static function getHomeFeed($idUser)
    {
        // 1. Pegar lista de usuários que eu sigo
        $userList = UserRelation::select()->where('user_from', $idUser)->get();
        $users = [];

        foreach ($userList as $userItem) {
            $users[] = $userItem['user_to'];
        }

        $users[] = $idUser;

        // 2. Pegar os posts dessa galera ordenando pela data
        $postList = Post::select()
            ->where('id_user', 'in', $users)
            ->orderBy('created_at', 'desc')
            ->get();

        // 3. Transformar em objetos dos models
        $posts = [];

        foreach($postList as $postItem){
            $newPost = new Post();
            $newPost->id = $postItem['id'];
            $newPost->type = $postItem['type'];
            $newPost->created_at = $postItem['created_at'];
            $newPost->body = $postItem['body'];

            $newUser = User::select()->where('id', $postItem['id_user'])->one();
            $newPost->user = new User();
            $newPost->user->id = $newUser['id'];
            $newPost->user->name = $newUser['name'];
            $newPost->user->avatar = $newUser['avatar'];

            $posts[] = $newPost;
        }

        return $posts;


    }
}
