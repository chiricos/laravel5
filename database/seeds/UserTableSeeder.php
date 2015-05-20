<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class UserTableSeeder extends Seeder{
    public function run()
    {
        $faker=Faker::create();

        for($i=0;$i<30;$i++)
        {
            $id = \DB::table('users')->insertGetId(array(
                'first_name'    =>  $faker->firstName,
                'last_name'     =>  $faker->lastName,
                'email'         =>  $faker->unique()->email,
                'password'      =>  \Hash::make('123456'),
                'type'          =>  'user'
            ));

            \DB::table('user_profiles')->insert(array(
                'user_id'       =>  $id,
                'bio'           =>  $faker->paragraph(rand(2,4)),
                'twitter'       =>  'http://www.twitter.com/'.$faker->userName,
                'website'       =>  'http://www.'.$faker->domainName,
                'birthdate'     => $faker->dateTimeBetween($startDate ="-45 years" ,$end="now")->format('Y-m-d')
            ));

        }

    }
}