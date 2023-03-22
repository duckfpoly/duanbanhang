<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class OrderPayStatusEnum extends Enum
{
    public const STATUS_1 = 0;
    public const STATUS_2 = 1;
    public static function getPayStatus(): array{
        return [
            'Đã thanh toán'    =>  self::STATUS_1,
            'Chưa thanh toán'  =>  self::STATUS_2,
        ];
    }
    public static function getPayStatusKeyByValue($value): string{
        return array_search($value,self::getPayStatus(),true);
    }
}
