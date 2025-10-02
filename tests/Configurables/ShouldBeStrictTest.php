<?php

/** @noinspection StaticClosureCanBeUsedInspection */

declare(strict_types=1);

use FleetTower\Essentials\Configurables\ShouldBeStrict;
use Illuminate\Database\Eloquent\Model;

beforeEach(function (): void {
    Model::shouldBeStrict(false);
});

it('enables strict mode for Eloquent models', function (): void {
    $shouldBeStrict = new ShouldBeStrict;
    $shouldBeStrict->configure();

    expect(Model::preventsAccessingMissingAttributes())->toBeTrue()
        ->and(Model::preventsLazyLoading())->toBeTrue()
        ->and(Model::preventsSilentlyDiscardingAttributes())->toBeTrue();
});

it('is enabled by default', function (): void {
    $shouldBeStrict = new ShouldBeStrict;

    expect($shouldBeStrict->enabled())->toBeTrue();
});

it('can be disabled via configuration', function (): void {
    config()->set('essentials.' . ShouldBeStrict::class, false);

    $shouldBeStrict = new ShouldBeStrict;

    expect($shouldBeStrict->enabled())->toBeFalse();
});
