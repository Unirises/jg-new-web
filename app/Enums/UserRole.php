<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static Admin()
 * @method static static Merchant()
 * @method static static Client()
 * @method static static Rider()
 */
final class UserRole extends Enum
{
    const Admin = 0;
    const Merchant = 1;
    const Rider = 2;
    const Client = 3;
}
