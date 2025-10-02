<?php

/** @noinspection StaticClosureCanBeUsedInspection */

declare(strict_types=1);

use FleetTower\Essentials\Configurables\AggressivePrefetching;
use Illuminate\Support\Facades\Vite;

beforeEach(function (): void {
    Vite::usePrefetchStrategy(null);
});

it('configures Vite to use aggressive prefetching', function (): void {
    Vite::spy();

    $aggressivePrefetching = new AggressivePrefetching;
    $aggressivePrefetching->configure();

    Vite::shouldHaveReceived('useAggressivePrefetching')->once();
});

it('is enabled by default', function (): void {
    $aggressivePrefetching = new AggressivePrefetching;
    expect($aggressivePrefetching->enabled())->toBeTrue();
});

it('can be disabled via configuration', function (): void {
    config()->set('essentials.' . AggressivePrefetching::class, false);

    $aggressivePrefetching = new AggressivePrefetching;

    expect($aggressivePrefetching->enabled())->toBeFalse();
});
