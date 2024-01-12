<?php

namespace Ibexa\Gpc202401TestingDeepDiveBundle\Tests\DataSource;

use Ibexa\Contracts\Core\Repository\PermissionResolver;
use Ibexa\Contracts\Test\Core\IbexaKernelTestCase;
use Ibexa\Core\Repository\Values\User\UserReference;
use Ibexa\Gpc202401TestingDeepDiveBundle\DataSource\QuotaRequestDataSource;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

/**
 * @covers \Ibexa\Gpc202401TestingDeepDiveBundle\DataSource\QuotaRequestDataSource
 */
final class QuotaRequestDataSourceTest extends IbexaKernelTestCase
{
    private QuotaRequestDataSource $dataSource;

    private PermissionResolver $permissionResolver;

    protected function setUp(): void
    {
        self::bootKernel();
        $this->dataSource = $this->getIbexaTestCore()->getServiceByClassName(QuotaRequestDataSource::class);
        $this->permissionResolver = $this->getIbexaTestCore()->getPermissionResolver();
    }

    public function testFindAll(): void
    {
        $this->permissionResolver->setCurrentUserReference(new UserReference(14));

        $results = $this->dataSource->findAll();
        self::assertCount(2, $results);
    }

    public function testFindAsAnonymousGivesNoResults(): void
    {
        $this->permissionResolver->setCurrentUserReference(new UserReference(10));

        $results = $this->dataSource->findAll();
        self::assertCount(0, $results);
    }
}
