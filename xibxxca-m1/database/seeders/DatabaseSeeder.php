<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use App\Models\Product;
use App\Models\Status;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(): void
    {
        User::insert([
            'name' => 'admin',
            'login' => 'admin',
            'surname' => 'admin',
            'email' => 'admin@mail.ru',
            'password' => Hash::make('admin11'),
            'isAdmin' => 1
        ]);
        User::insert([
            'surname' => 'Голубь',
            'name' => 'Эмили',
            'login' => 'emily74',
            'email' => 'emily74@mail.ru',
            'password' => Hash::make('emily74'),
        ]);
        User::insert([
            'surname' => 'Иванов',
            'name' => 'Иван',
            'login' => 'ivan',
            'email' => 'ivan@mail.ru',
            'password' => Hash::make('123456'),
        ]);
        Category::insert([
            'category_name' => 'Принтеры'
        ]);
        Category::insert([
            'category_name' => 'Плоттеры'
        ]);
        Product::insert([
            'product_name' => 'Принтер Epson',
            'product_country' => 'Россия',
            'product_year' => '2015',
            'product_count' => '7',
            'category_id' => '1',
            'product_photo' => '00NYbhA2NbW6HkzWblfIBGlYJTWtHrncHnTgt26Z.jpg',
            'product_price' =>'11000',
            'product_description'=> 'Современное решение для дома и офиса',
        ]);
        Product::insert([
            'product_name' => 'Принтер Canon',
            'product_country' => 'Швеция',
            'product_year' => '2020',
            'product_count' => '6',
            'category_id' => '1',
            'product_photo' => 'deS3SXE1T8975mPPjEMhPnklyPh9AOeR34Szu6uD.jpg',
            'product_price' =>'15000',
            'product_description'=> 'Современное решение для дома и офиса',
        ]);
        Product::insert([
            'product_name' => 'Плоттер Epson',
            'product_country' => 'США',
            'product_year' => '2005',
            'product_count' => '7',
            'category_id' => '2',
            'product_photo' => '00NYbhA2NbW6HkzWblfIBGlYJTWtHrncHnTgt26Z.jpg',
            'product_price' =>'17000',
            'product_description'=> 'Современное решение для дома и офиса',
        ]);
        Product::insert([
            'product_name' => 'Плоттер Epson',
            'product_country' => 'Россия',
            'product_year' => '2011',
            'product_count' => '5',
            'category_id' => '2',
            'product_photo' => '00NYbhA2NbW6HkzWblfIBGlYJTWtHrncHnTgt26Z.jpg',
            'product_price' =>'13000',
            'product_description'=> 'Комфортное копирование и печать',
        ]);
        Status::insert([
            'status_name' => 'Новый'
        ]);
        Status::insert([
            'status_name' => 'Подтвержден'
        ]);
        Status::insert([
            'status_name' => 'Отменен'
        ]);
    }
}
