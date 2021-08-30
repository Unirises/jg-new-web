<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class VehicleType extends Enum
{
    const Motorcycle = 0;
    const Sedan = 1;
    const SUV = 2;
    const Van = 3;
}
