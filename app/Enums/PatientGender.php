<?php

namespace App\Enums;

enum PatientGender : string
{
    use EnumToArray;

    case Male = 'Male';
    case Female = 'Female';
    case Unknown = 'Unknown';
}
