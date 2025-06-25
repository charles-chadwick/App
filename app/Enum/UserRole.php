<?php

namespace App\Enum;

enum UserRole: string
{
    case Administrator = "Administrator";
    case Doctor =  "Doctor";
    case Nurse =  "Nurse";
    case Assistant =  "Assistant";
    case Staff =  "Staff";
}
