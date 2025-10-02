<?php

declare(strict_types=1);

namespace FleetTower\Essentials\Contracts;

/**
 * @internal
 */
interface Configurable
{
    /**
     * Whether the configurable is enabled or not.
     */
    public function enabled(): bool;

    /**
     * Run the configurable.
     */
    public function configure(): void;
}
