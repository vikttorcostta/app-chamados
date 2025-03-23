<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

            User::factory()->create([
                 'name' => 'Paulo Victor Costa',
                 'email' => 'paulovictoradmin@bugados.com.br',
                 'password' => bcrypt(''),
                 'role' => 'admin',
            ]);

            //User::factory(25)->create();

//        \App\Models\User::factory()->create([
//            'name' => 'Davi Caridade',
//            'email' => 'davicaridade@bugados.com.br',
//            'password' => bcrypt(''),
//            'role' => 'user',
//        ]);
//
//        \App\Models\User::factory()->create([
//            'name' => 'Gabriel Gomes',
//            'email' => 'gabrielgomes@bugados.com.br',
//            'password' => bcrypt(''),
//            'role' => 'support',
//        ]);
//
//        \App\Models\User::factory()->create([
//            'name' => 'Vandson Nascimento',
//            'email' => 'vandson@bugados.com.br',
//            'password' => bcrypt(''),
//            'role' => 'admin',
//        ]);

//        \App\Models\Cate::factory()->create([
//            'name' => 'Problemas com Computador'
//        ]);
//
//        \App\Models\Category::factory()->create([
//            'name' => 'Internet e Rede '
//        ]);
//
//        \App\Models\Category::factory()->create([
//            'name' => 'Softwares e Sistemas'
//        ]);
//
//        \App\Models\Category::factory()->create([
//            'name' => 'Impressoras e Periféricos'
//        ]);
//
//        \App\Models\Category::factory()->create([
//            'name' => 'Telefonia e Comunicação'
//        ]);
//
//        \App\Models\Category::factory()->create([
//            'name' => 'Segurança e Ameaças'
//        ]);
//
//        \App\Models\Category::factory()->create([
//            'name' => 'Backup e Arquivos'
//        ]);
//
//        \App\Models\Category::factory()->create([
//            'name' => 'Equipamentos Novos'
//        ]);
//
//        \App\Models\Category::factory()->create([
//            'name' => 'Outros'
//        ]);
    }
}
