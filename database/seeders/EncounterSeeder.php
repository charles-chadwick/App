<?php

namespace Database\Seeders;

use App\Enums\EncounterStatus;
use App\Models\Encounter;
use App\Models\Patient;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Spatie\Activitylog\Facades\CauserResolver;

class EncounterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run() : void
    {
        DB::table('encounters')
          ->truncate();
        $patients = Patient::all();
        $lines = array_map('trim', file(database_path("src/RickAndMortyContent.csv")));
        foreach ($patients as $patient) {

            foreach (range(0, rand(0, 20)) as $i) {
                $user = User::inRandomOrder()->first();
                CauserResolver::setCauser($user);

                $date = fake()->dateTimeBetween($patient->created_at, now());
                Encounter::create([
                    'type'            => fake()->randomElement(['Office Visit', 'Medication Update', 'Phone Call', 'Checkup']),
                    'status'          => fake()->randomElement(EncounterStatus::class),
                    'patient_id'      => $patient->id,
                    'content'         => "<p>".collect(Arr::random($lines, rand(5, 50)))->join("</p><p>")."</p>",
                    'date_of_service' => $date,
                    'owner_id'        => $user->id,
                    'title'           => str($lines[ rand(0, count($lines) - 1) ])->limit(25),
                    'created_at'      => $date,
                    'updated_at'      => $date,
                ]);

            }
        }
    }

}
