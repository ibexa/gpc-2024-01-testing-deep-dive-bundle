<?php

namespace Ibexa\Gpc202401TestingDeepDiveBundle\Data;

class QuotaRequest
{
    public function __construct(
        public readonly ?string $username,
        public readonly string $email,
        public readonly string $query
    ) {
    }
}
