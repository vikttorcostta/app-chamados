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
                 'name' => 'Victor Costa',
                 'email' => 'victorcosta@bugados.com.br',
                 'password' => bcrypt('12345678'),
                 'role' => 'user',
            ]);

            User::factory(25)->create();

//        \App\Models\User::factory()->create([
//            'name' => 'Davi Caridade',
//            'email' => 'davicaridade@bugados.com.br',
//            'password' => bcrypt('12345678'),
//            'role' => 'user',
//        ]);
//
//        \App\Models\User::factory()->create([
//            'name' => 'Gabriel Gomes',
//            'email' => 'gabrielgomes@bugados.com.br',
//            'password' => bcrypt('12345678'),
//            'role' => 'support',
//        ]);
//
//        \App\Models\User::factory()->create([
//            'name' => 'Vandson Nascimento',
//            'email' => 'vandson@bugados.com.br',
//            'password' => bcrypt('12345678'),
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
