<?php

namespace Database\Seeders;

use App\Enums\UserRole;
use App\Models\Patient;
use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Activitylog\Facades\CauserResolver;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileDoesNotExist;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileIsTooBig;

class UserAndPatientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $characters = json_decode(file_get_contents(database_path('src/rickandmorty_characters.json')), true);
        $counter = 1;

        $admin = User::factory()
            ->create([
                'role' => UserRole::Administrator,
                'first_name' => 'Admin',
                'last_name' => 'Admin',
                'email' => 'admin@example.com',
                'created_at' => '2020-01-01 00:00:00',
            ]);
        CauserResolver::setCauser($admin);
        foreach ($characters as $character) {

            if ($counter == 100) {
                exit;
            }
            $name = explode(' ', $character['name']);

            if ($counter <= 10) {

                $role = match (true) {
                    $counter <= 2 => UserRole::Doctor,
                    $counter <= 5 => UserRole::Nurse,
                    default => UserRole::Staff
                };

                $first_name = array_shift($name);
                $last_name = array_pop($name);

                $email = strtolower("$first_name.$last_name@example.com");
                $created_at = fake()->dateTimeBetween($admin->created_at, '-1 year');
                $model = User::create([
                    'first_name' => $first_name,
                    'last_name' => $last_name,
                    'role' => $role,
                    'email' => $email,
                    'old_id' => $character['id'],
                    'password' => bcrypt('password'),
                    'created_at' => $created_at,
                    'updated_at' => $created_at,
                ]);

            } else {

                $first_name = array_shift($name);
                $last_name = array_pop($name);
                $middle_name = implode(' ', $name);
                $email = strtolower("$first_name.$last_name@example.com");
                $prefix = match ($character['gender']) {
                    'Male' => 'Mr',
                    'Female' => fake()->randomElement([
                        'Mrs',
                        'Ms',
                    ]),
                    default => '',
                };

                $created_by = User::where('role', '!=', UserRole::Administrator)
                    ->inRandomOrder()
                    ->first();
                CauserResolver::setCauser($created_by);
                try {

                    $created_at = fake()->dateTimeBetween($admin->created_at, '-1 year');
                    $model = Patient::create([
                        'status' => $character['status'],
                        'prefix' => $prefix,
                        'first_name' => $first_name,
                        'last_name' => $last_name ?? '',
                        'suffix' => '',
                        'middle_name' => $middle_name,
                        'species' => $character['species'],
                        'gender' => $character['gender'],
                        'email' => $email,
                        'old_id' => $character['id'],
                        'dob' => rand(1940, 2023).'-'.rand(1, 12).'-'.rand(1, 28),
                        'password' => bcrypt('password'),
                        'created_at' => $created_at,
                        'updated_at' => $created_at,
                    ]);

                } catch (\Exception $e) {
                    dd($e->getMessage());
                }
            }

            $avatar_path = database_path('src/avatars/'.str_replace(' ', '-', $character['name']).'.jpeg');
            if (! file_exists($avatar_path)) {
                echo "$avatar_path does not exist\n";
            }

            $counter++;
            try {
                $model->addMedia($avatar_path)
                    ->preservingOriginal()
                    ->toMediaCollection('avatars');
            } catch (FileDoesNotExist|FileIsTooBig $e) {
                echo $e->getMessage();
            }
        }
    }
}
