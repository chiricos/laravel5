<?php

use Illuminate\Database\Seeder;


class AdminTableSeeder extends Seeder {

    public function run()
    {
        $id=\DB::table('users')->insertGetId(array(
            'first_name'    =>  'edward',
            'last_name'     =>  'diaz',
            'email'         =>  'edwarddiaz92@gmail.com',
            'password'      =>  \Hash::make('123456'),
            'type'          =>  'admin'
        ));
        \DB::table('user_profiles')->insert(array(
            'user_id'       =>  $id,
            'birthdate'     =>  '1992/11/11'
        ));
    }

}