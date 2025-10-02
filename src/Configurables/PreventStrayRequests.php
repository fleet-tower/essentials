<?php

declare(strict_types=1);

namespace FleetTower\Essentials\Configurables;

use FleetTower\Essentials\Contracts\Configurable;
use Illuminate\Support\Facades\Http;

final readonly class PreventStrayRequests implements Configurable
{
    /**
     * Whether the configurable is enabled or not.
     */
    public function enabled(): bool
    {
        $enabled = config()->boolean(sprintf('essentials.%s', self::class), true);
        $testing = app()->runningUnitTests();

        return $enabled && $testing;
    }

    /**
     * Run the configurable.
     */
    public function configure(): void
    {
        Http::preventStrayRequests();
    }
}
