<?php

namespace App\Enums;

enum EncounterStatus: string
{
    use EnumToArray;

    case Signed = "Signed";
    case Unsigned = "Unsigned";
}
