<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{

    static $users = [
        [
            'nome' => 'Matheus Augusto',
            'email' => 'matheusaugusto@nhc.com.br',
            'cpf' => '01782644407',
            'telefone' => '84988527216',
            'tipo' => 'paciente'
        ],
        [
            'nome' => 'Ailton Filho',
            'email' => 'ailtonxdz@gmail.com',
            'cpf' => '29377285453',
            'telefone' => '84991943745',
            'tipo' => 'admin'
        ],
        [
            'nome' => 'Christian Caua',
            'email' => 'christiancaua@nhc.com.br',
            'cpf' => '70223163414',
            'telefone' => '84992230549',
            'tipo' => 'funcionario'
        ]
    ];

    public static function getPass()
    {
        return Hash::make('Hrg@12345');
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach(self::$users as $user) {
            DB::table('users')->insert([
                'nome' => $user['nome'],
                'email' => $user['email'],
                'senha' => self::getPass(),
                'cpf' => $user['cpf'],
                'telefone' => $user['telefone'],
                'tipo' => $user['tipo'],
            ]);
        }
    }
}
