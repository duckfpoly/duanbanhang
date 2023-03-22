<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class OrderPayMethodEnum extends Enum
{
    public const METHOD_1 = 0;
    public const METHOD_2 = 1;
    public static function getPayMethod(): array{
        return [
            'Thanh toán khi nhận hàng'           =>  self::METHOD_1,
            'Thanh toán chuyển khoản ngân hàng'  =>  self::METHOD_2,
        ];
    }
    public static function getPayMethodKeyByValue($value): string{
        return array_search($value,self::getPayMethod(),true);
    }
}
