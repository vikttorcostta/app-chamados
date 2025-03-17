<?php
use App\Models\User;


uses()->group('users');

it('tem usuários', function () {
    $assert = $this->get('/admin/users');
    $assert->assertStatus(200);
});

it('listagem de usuários', function (){
})->todo();

it('criação de usuários', function () {
})->todo();

it('atualização de usuários', function () {
})->todo();

it('exclusão de usuários', function () {
})->todo();
