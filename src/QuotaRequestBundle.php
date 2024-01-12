<?php

namespace Ibexa\Gpc202401TestingDeepDiveBundle;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\HttpKernel\Bundle\Bundle;

final class QuotaRequestBundle extends Bundle
{
    public function build(ContainerBuilder $container): void
    {
        $loader = new YamlFileLoader(
            $container,
            new FileLocator(__DIR__ . '/Resources')
        );

        $loader->load('services.yaml');
    }
}
