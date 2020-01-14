<?php

use Illuminate\Database\Seeder;
use function Ramsey\Uuid\v1;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        // DB::table('users')->insert([
        //     'name' => Str::random(10),
        //     'email' => Str::random(10).'@gmail.com',
        //     'password' => bcrypt('password'),
        // ]);

        DB::table('roles')->insert([
            'name' => 'super',
            'description' => 'this is super admin',
        ]);
        DB::table('roles')->insert([
            'name' => 'admin',
            'description' => 'this is noraml admin',
        ]);
        DB::table('roles')->insert([
            'name' => 'normal_user',
            'description' => 'this is normal_user',
        ]);


        DB::table('users')->insert([
            'name' => 'Super User',
            'email' => 'super@mail.com',
            'registration_number' => '0000',
            'profile_image' => 'ashoka3.jpg',
            'password' =>bcrypt('lorenzo@99') ,
            'roles_id' => 1,
            'created_at' => date("Y-m-d h:m:s",time()),
            'updated_at' => date("Y-m-d h:m:s",time()),
        ]);

        DB::table('standards')->insert(['standard_name'=>'class 1','standard_id'=>'01']);
        DB::table('standards')->insert(['standard_name'=>'class 2','standard_id'=>'02']);
        DB::table('standards')->insert(['standard_name'=>'class 3','standard_id'=>'03']);
        DB::table('standards')->insert(['standard_name'=>'class 4','standard_id'=>'04']);
        DB::table('standards')->insert(['standard_name'=>'class 5','standard_id'=>'05']);
        DB::table('standards')->insert(['standard_name'=>'class 6','standard_id'=>'06']);
        DB::table('standards')->insert(['standard_name'=>'class 7','standard_id'=>'07']);


        DB::table('users')->insert([
            'name' => 'test_0101',
            'registration_number' => '01/01',
            'email' => 'test0101@mail.com',
            'password' =>bcrypt('lorenzo@99') ,
            'roles_id' => 3,
            'created_at' => date("Y-m-d h:m:s",time()),
            'updated_at' => date("Y-m-d h:m:s",time()),
        ]);
        DB::table('users')->insert([
            'name' => 'test_0102',
            'registration_number' => '01/02',
            'email' => 'test0102@mail.com',
            'password' =>bcrypt('lorenzo@99') ,
            'roles_id' => 3,
            'created_at' => date("Y-m-d h:m:s",time()),
            'updated_at' => date("Y-m-d h:m:s",time()),
        ]);
        DB::table('users')->insert([
            'name' => 'test_0201',
            'registration_number' => '02/01',
            'email' => 'test0201@mail.com',
            'password' =>bcrypt('lorenzo@99') ,
            'roles_id' => 3,
            'created_at' => date("Y-m-d h:m:s",time()),
            'updated_at' => date("Y-m-d h:m:s",time()),
        ]);
        DB::table('users')->insert([
            'name' => 'test_0202',
            'registration_number' => '02/02',
            'email' => 'test0202@mail.com',
            'password' =>bcrypt('lorenzo@99') ,
            'roles_id' => 3,
            'created_at' => date("Y-m-d h:m:s",time()),
            'updated_at' => date("Y-m-d h:m:s",time()),
        ]);
        DB::table('users')->insert([
            'name' => 'test_0301',
            'registration_number' => '03/01',
            'email' => 'test0301@mail.com',
            'password' =>bcrypt('lorenzo@99') ,
            'roles_id' => 3,
            'created_at' => date("Y-m-d h:m:s",time()),
            'updated_at' => date("Y-m-d h:m:s",time()),
        ]);
        DB::table('users')->insert([
            'name' => 'test_0302',
            'registration_number' => '03/02',
            'email' => 'test0302@mail.com',
            'password' =>bcrypt('lorenzo@99') ,
            'roles_id' => 3,
            'created_at' => date("Y-m-d h:m:s",time()),
            'updated_at' => date("Y-m-d h:m:s",time()),
        ]);

    }
}
