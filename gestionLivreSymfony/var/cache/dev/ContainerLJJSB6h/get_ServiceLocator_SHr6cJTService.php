<?php

namespace ContainerLJJSB6h;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_ServiceLocator_SHr6cJTService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.service_locator.sHr6cJT' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.service_locator.sHr6cJT'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService ??= $container->getService(...), [
            'br' => ['privates', 'App\\Repository\\BookRepository', 'getBookRepositoryService', true],
        ], [
            'br' => 'App\\Repository\\BookRepository',
        ]);
    }
}
