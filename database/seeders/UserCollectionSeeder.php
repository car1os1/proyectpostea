<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Post;

class UserCollectionSeeder extends Seeder
{
    public function run()
    {
        User::factory(10)
            ->has(Post::factory()->count(3))
            ->create();
        User::factory(1) //creando un usuario
            ->has(Post::factory()->count(3))
            ->state([ //con la funcion state estamos sobreescribiendo su nombre y correo
                "_id"=>"1",
                "name" => "pedrito",
                "email" => "prueba1@mail.com",])
                ->create(); //estamos instanciando el objeto y lo mande a la base de datos 
    }
}
