<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static Awaiuting()
 * @method static static Requesting()
 * @method static static Arriving()
 * @method static static Arrived()
 * @method static static Transit()
 * @method static static Completed()
 * @method static static Cancelled()
 */
final class ServiceStatus extends Enum
{
    const Awaiting =   0;
    const Requesting =   1;
    const Arriving =   2;
    const Arrived =   3;
    const Transit =   4;
    const Completed =   5;
    const Cancelled =   6;
}
