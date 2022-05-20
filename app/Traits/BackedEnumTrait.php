<?php

namespace App\Traits;

trait BackedEnumTrait
{
	// Return array value for backed enums
	public static function values(): array
	{
		return array_map(fn ($enum) => $enum->value, self::cases());
	}
}
