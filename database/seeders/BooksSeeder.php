<?php

namespace Database\Seeders;

use App\Models\Book;
use GuzzleHttp\Promise\Create;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class BooksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        for($i = 0; $i <10; $i++) {
            Book::Create([
                'title' => fake()->sentence(3),
                'creator' => fake()->name(),
                'price' => fake()->numberBetween(1000, 50000),
                'publication_date' => fake()->date(),
            ]);
        }
    }
}
