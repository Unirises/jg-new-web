<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static Cash()
 * @method static static Card()
 */
final class PaymentMethod extends Enum
{
    const Cash = 0;
    const Card = 1;
}
