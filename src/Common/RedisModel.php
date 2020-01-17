<?php
declare(strict_types=1);

namespace Hyperf\Support\Common;

use Hyperf\Redis\Redis;
use Psr\Container\ContainerInterface;

/**
 * Class RedisModel
 * @package Hyperf\Support\Common
 */
abstract class RedisModel
{
    protected string $key;
    protected ContainerInterface $container;
    /**
     * @var Redis|\Redis
     */
    protected Redis $redis;

    /**
     * Create RedisModel
     * @param ContainerInterface $container
     * @return static
     */
    public static function create(ContainerInterface $container)
    {
        return make(static::class, [
            $container
        ]);
    }

    /**
     * RedisModel constructor.
     * @param ContainerInterface $container
     */
    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
        $this->redis = $container->get(\Redis::class);
    }
}
