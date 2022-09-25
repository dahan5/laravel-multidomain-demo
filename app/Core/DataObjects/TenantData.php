<?php

namespace App\Core\DataObjects;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class TenantData extends Data
{
    public function __construct(
        public int $id,
        public Optional|string $name,
        public Optional|string $domain,
        public Optional|string|null $database,
    ) {
    }
}
