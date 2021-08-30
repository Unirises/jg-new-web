<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static Parcel()
 * @method static static Mart()
 */
final class ServiceType extends Enum
{
    const Parcel = 0;
    const Mart = 1;
}
