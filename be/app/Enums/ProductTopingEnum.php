<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

final class ProductTopingEnum extends Enum
{
    public const TOPING1 = 0;
    public const TOPING2 = 1;
    public static function getProductToping(): array{
        return [
            'Trứng muối'    =>  self::TOPING1,
            'Phô mai'       =>  self::TOPING2,
        ];
    }
    public static function getProductTopingKeyByValue($value): string{
        return array_search($value,self::getProductToping(),true);
    }
}
