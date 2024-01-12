<?php

namespace Ibexa\Gpc202401TestingDeepDiveBundle\DataSource;

use Ibexa\Gpc202401TestingDeepDiveBundle\Data\QuotaRequest;
use Ibexa\Contracts\Core\Repository\PermissionResolver;

final class QuotaRequestDataSource implements QuotaRequestDataSourceInterface
{
    public function __construct(
        private readonly PermissionResolver $permissionResolver
    ) {
    }

    public function findAll(): iterable
    {
        $userId = $this->permissionResolver->getCurrentUserReference()->getUserId();
        // $this->configResolver->getParameter('anonymous_user_id')
        if ($userId === 10) {
            return [];
        }

        return [
            new QuotaRequest('Mike', 'mike@example.com', 'I need some of your stuff'),
            new QuotaRequest('Zoe', 'zoe@example.com', 'I need some of your stuff too!'),
        ];
    }
}
