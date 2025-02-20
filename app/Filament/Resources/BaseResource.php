<?php

namespace App\Filament\Resources;

use App\Traits\HasActiveIcon;
use Filament\Resources\Resource;

abstract class BaseResource extends Resource
{
    use HasActiveIcon;
}
