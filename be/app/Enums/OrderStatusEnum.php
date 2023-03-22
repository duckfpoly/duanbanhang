<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;


final class OrderStatusEnum extends Enum
{
    public const STATUS_1 = 0;
    public const STATUS_2 = 1;
    public const STATUS_3 = 2;
    public const STATUS_4 = 3;
    public const STATUS_5 = 3;
    public static function getOrderStatus(): array{
        return [
            'Chờ tiếp nhận đơn hàng'        =>  self::STATUS_1,
            'Đã xác nhận'                   =>  self::STATUS_2,
            'Đang chuẩn bị đơn hàng'        =>  self::STATUS_3,
            'Đã gửi cho đơn vị vận chuyển'  =>  self::STATUS_4,
            'Đã nhận đuợc hàng'             =>  self::STATUS_5,
        ];
    }
    public static function getOrderStatusKeyByValue($value): string{
        return array_search($value,self::getOrderStatus(),true);
    }
}
