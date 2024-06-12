<?php

namespace App\View\Support\Content;
use Illuminate\Support\Str;

class Description
{
  public static function shortString(string $value): string
  {
    Str::words($value, 3, '...');

    return $value;
  }
}
