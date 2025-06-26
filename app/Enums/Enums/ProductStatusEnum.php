<?php

namespace App\Enums\Enums;

enum ProductStatusEnum
{
    case Draft = 'draft';
    case Published = 'published';

    public static function labels(): array {
        return [
            Self::Draft->value => __('Draft'),
            Self::Published->value => __('Published'),
        ];
    }

    public static function colors(): array {
        return [
            'gray' => self::Draft->value,
            'success' => self::Published->value,
        ];
    }
}
