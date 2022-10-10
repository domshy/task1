<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Student;
use Illuminate\Support\Str;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $gender = $faker->randomElement(['male', 'female']);

        for ($i = 0; $i < 100; $i++) {
            Student::create([
                'fullname' => $faker->name($gender),
                'birth_place' => Str::random(10),
                'gender' => $gender,
                'dob' => $faker->date($format = 'Y-m-d', $max = 'now'),
                'contact' => $faker->randomDigit(),
                'email' => $faker->safeEmail,
                'address' => $faker->address,
                'role' => 'student',
                'user_id' => (bool)random_int(1, 2)
            ]);
        }
    }
}
