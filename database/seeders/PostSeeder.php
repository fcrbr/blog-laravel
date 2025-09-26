<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;

class PostSeeder extends Seeder
{
    public function run(): void
    {
        Post::create([
            'title' => 'Primeiro Post',
            'slug' => 'primeiro-post',
            'content' => 'Esse é o conteúdo do primeiro post fictício para testar o blog.',
            'author' => 'Admin',
        ]);

        Post::create([
            'title' => 'Segundo Post',
            'slug' => 'segundo-post',
            'content' => 'Esse é o segundo post fictício, criado apenas para teste.',
            'author' => 'Admin',
        ]);

        Post::create([
            'title' => 'Dicas de Laravel',
            'slug' => 'dicas-de-laravel',
            'content' => 'Aqui vão algumas dicas úteis de Laravel para desenvolvedores iniciantes.',
            'author' => 'Filipe Corrêa',
        ]);
    }
}
