<?php

declare(strict_types=1);

namespace FleetTower\Essentials\Configurables;

use FleetTower\Essentials\Contracts\Configurable;
use Illuminate\Support\Facades\Vite;

final readonly class AggressivePrefetching implements Configurable
{
    /**
     * Whether the configurable is enabled or not.
     */
    public function enabled(): bool
    {
        return config()->boolean(sprintf('essentials.%s', self::class), true);
    }

    /**
     * Run the configurable.
     */
    public function configure(): void
    {
        Vite::useAggressivePrefetching();
    }
}
