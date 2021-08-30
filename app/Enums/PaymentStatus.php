<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static Failed()
 * @method static static Success()
 * @method static static Hold()
 */
final class PaymentStatus extends Enum
{
    const Failed = 0;
    const Success = 1;
    const Hold = 2;
}
