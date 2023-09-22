<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\post;
use App\Models\category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);


        User::create([
            'name'=>'raditya',
            'username'=>'raditya',
            'email'=>'raditya@gmail.com',
            'password'=>bcrypt('1112')
        ]);

        User::factory(3)->create();

        category::create([
            'name'=>'Farmer',
            'slug'=>'farmer'
        ]);
        category::create([
            'name'=>'Breeder',
            'slug'=>'breeder'
        ]);
        category::create([
            'name'=>'Builder',
            'slug'=>'builder'
        ]);

        post::factory(10)->create();

        // post::create([
        //     'User_id'=>1,
        //     'category_id'=>3,
        //     'title'=>'Jakarta Banjir',
        //     'slug'=>'jakarta-banjir',
        //     'exe'=>'Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto, dignissimos? Quisquam magni id voluptatum quae delectus vel voluptates, neque consectetur at quasi quis reiciendis magnam cupiditate nostrum aliquam maiores alias! Perferendis consequatur',
        //     'body'=>'Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto, dignissimos? Quisquam magni id voluptatum quae delectus vel voluptates, neque consectetur at quasi quis reiciendis magnam cupiditate nostrum aliquam maiores alias! Perferendis consequatur, animi quod repudiandae officia voluptate recusandae praesentium sequi veniam nostrum a delectus accusamus est esse harum deserunt cum vero quidem obcaecati atque commodi, expedita ullam sed molestiae. Rerum enim maxime modi odit itaque vitae facere et blanditiis deleniti perferendis dolore tenetur adipisci laudantium porro, quasi id eaque excepturi harum suscipit soluta obcaecati dicta! Provident, qui minus incidunt obcaecati sunt autem officia doloremque, ducimus neque optio nam sit deleniti?'
        // ]);

        // post::create([
        //     'User_id'=>1,
        //     'category_id'=>3,
        //     'title'=>'Jakarta Panas',
        //     'slug'=>'jakarta-panas',
        //     'exe'=>'Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto, dignissimos? Quisquam magni id voluptatum quae delectus vel voluptates, neque consectetur at quasi quis reiciendis magnam cupiditate nostrum aliquam maiores alias! Perferendis consequatur',
        //     'body'=>'Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto, dignissimos? Quisquam magni id voluptatum quae delectus vel voluptates, neque consectetur at quasi quis reiciendis magnam cupiditate nostrum aliquam maiores alias! Perferendis consequatur, animi quod repudiandae officia voluptate recusandae praesentium sequi veniam nostrum a delectus accusamus est esse harum deserunt cum vero quidem obcaecati atque commodi, expedita ullam sed molestiae. Rerum enim maxime modi odit itaque vitae facere et blanditiis deleniti perferendis dolore tenetur adipisci laudantium porro, quasi id eaque excepturi harum suscipit soluta obcaecati dicta! Provident, qui minus incidunt obcaecati sunt autem officia doloremque, ducimus neque optio nam sit deleniti?'
        // ]);
    }
}
