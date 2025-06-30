<?php

use App\Models\Patient;

use function Pest\Laravel\get;

it('has patient details', function () {

    // Arrange
    $patient = Patient::factory()
        ->create([
            'prefix' => 'Mr',
            'first_name' => 'Ants',
            'middle_name' => 'in my Eyes',
            'last_name' => 'Johnson',
            'dob' => '1970-01-01',
            'gender' => 'Male',
            'species' => 'Human',
            'status' => 'Unknown',
            'email' => 'ants.johnson@example.com',
        ]);

    // Act & Assert
    get(route('patient.details', $patient))
        ->assertOk()
        ->assertSeeText([
            'Mr',
            'Ants',
            'in my Eyes',
            'Johnson',
            '01/01/1970 - Unknown',
            'Human Male',
            'ants.johnson@example.com',
        ]);
});

it('shows a list of patients', function () {

    // Arrange
    $patients = Patient::factory(2)->create();

    // Act & Assert
    get(route('patient.index'))
        ->assertOk()
        ->assertSeeTextInOrder([
            $patients->first()->full_name,
            $patients->last()->full_name,
        ]);

});
