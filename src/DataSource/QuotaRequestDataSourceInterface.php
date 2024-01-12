<?php

namespace Ibexa\Gpc202401TestingDeepDiveBundle\DataSource;

use Ibexa\Gpc202401TestingDeepDiveBundle\Data\QuotaRequest;

interface QuotaRequestDataSourceInterface
{
    /**
     * @return iterable<QuotaRequest>
     */
    public function findAll(): iterable;
}
