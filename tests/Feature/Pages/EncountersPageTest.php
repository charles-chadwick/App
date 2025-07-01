<?php

use App\Models\Encounter;
use App\Models\Patient;
use App\Models\User;

use function Pest\Laravel\get;

it('shows a list of encounters', function () {

    // Arrange
    $patient = Patient::factory()
        ->create([
            'first_name' => 'Homer',
            'last_name' => 'Simpson',
        ]);
    $user = User::factory()
        ->create([
            'first_name' => 'Julius',
            'last_name' => 'Hibbert',
        ]);
    $encounters = Encounter::factory(2)
        ->create([
            'status' => 'patient',
            'patient_id' => $patient->id,
            'owner_id' => $user,
        ]);

    // Act & Assert
    get(route('encounters.index', ['encounters' => $encounters]))
        ->assertOk()
        ->assertSeeTextInOrder([
            $encounters->first()->title,
            $encounters->first()->type,
            $encounters->first()->status,
            $encounters->first()->date_of_service,
            $encounters->first()->owner->full_name,
            $encounters->first()->patient->full_name,

        ]);
});
