<?php

use App\Models\Encounter;
use App\Models\Patient;
use App\Models\User;

use function Pest\Laravel\get;

it('shows a list of encounters belonging to a patient', function () {

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
            'patient_id' => $patient->id,
            'owner_id' => $user,
        ]);

    // Act & Assert
    get(route('patient.encounters', ['patient' => $patient->id]))
        ->assertOk()
        ->assertSeeTextInOrder([
            $encounters->first()->title,
            $encounters->first()->type,
            $encounters->first()->status,
            $encounters->first()->created_at,
            $encounters->first()->owner->full_name,

        ]);
});
