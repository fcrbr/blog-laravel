<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Post;

class PostPolicy
{
    /**
     * Determine se o usuário pode atualizar o post.
     */
    public function update(User $user, Post $post): bool
    {
        // Apenas o dono do post pode atualizar
        return $user->id === $post->user_id;
    }

    /**
     * Determine se o usuário pode deletar o post.
     */
    public function delete(User $user, Post $post): bool
    {
        // Apenas o dono do post pode deletar
        return $user->id === $post->user_id;
    }
}
