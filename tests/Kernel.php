<?php

/**
 * @copyright Copyright (C) Ibexa AS. All rights reserved.
 * @license For full copyright and license information view LICENSE file distributed with this source code.
 */
declare(strict_types=1);

namespace Ibexa\Gpc202401TestingDeepDiveBundle\Tests;

use Ibexa\Contracts\Test\Core\IbexaTestKernel;
use Ibexa\Gpc202401TestingDeepDiveBundle\DataSource\QuotaRequestDataSource;
use Ibexa\Gpc202401TestingDeepDiveBundle\QuotaRequestBundle;
use Symfony\Component\Config\Loader\LoaderInterface;
use Symfony\Component\Config\Resource\FileResource;
use Symfony\Component\DependencyInjection\ContainerBuilder;

final class Kernel extends IbexaTestKernel
{
    public function registerBundles(): iterable
    {
        yield from parent::registerBundles();

        yield new QuotaRequestBundle();
    }

    public function getSchemaFiles(): iterable
    {
        yield from parent::getSchemaFiles();
    }

    public function registerContainerConfiguration(LoaderInterface $loader): void
    {
        parent::registerContainerConfiguration($loader);

        $loader->load(__DIR__ . '/Resources/services.yaml');

        $loader->load(static function (ContainerBuilder $container): void {
            $resource = new FileResource(__DIR__ . '/../src/Resources/routing.yaml');
            $container->addResource($resource);
            $container->loadFromExtension('framework', [
                'router' => [
                    'resource' => $resource->getResource(),
                ],
            ]);

            $container->setParameter('form.type_extension.csrf.enabled', false);
        });
    }

    public function getFixtures(): iterable
    {
        yield from parent::getFixtures();
    }

    protected static function getExposedServicesByClass(): iterable
    {
        yield from parent::getExposedServicesByClass();

        yield QuotaRequestDataSource::class;
    }
}
