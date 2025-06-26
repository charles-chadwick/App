<?php

namespace App\Enums;

enum PatientStatus: string
{
    use EnumToArray;

    case Active = 'Active';
    case Inactive = 'Inactive';
    case Prospective = 'Prospective';
    case Archived = 'Archived';
    case Unknown = 'Unknown';
}
