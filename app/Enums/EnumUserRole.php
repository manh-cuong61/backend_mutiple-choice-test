<?php

namespace App\Enums;

use App\Traits\BackedEnumTrait;

enum EnumUserRole: int
{
	use BackedEnumTrait;

	case User = 0;
	case ADMIN = 1;

	public function text(): string
	{
		return match ($this) {
			EnumUserRole::User => __('attributes.role.user'),
			EnumUserRole::ADMIN => __('attributes.role.admin'),
		};
	}
}
