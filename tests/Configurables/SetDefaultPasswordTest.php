<?php

/** @noinspection StaticClosureCanBeUsedInspection */

declare(strict_types=1);

use FleetTower\Essentials\Configurables\SetDefaultPassword;
use Illuminate\Validation\Rules\Password;

beforeEach(function (): void {
    Password::defaults(null);
});

it('sets default password rules', function (): void {
    $setDefaultPassword = new SetDefaultPassword;
    $setDefaultPassword->configure();

    $passwordRules = Password::default()->appliedRules();

    expect($passwordRules['min'])->toBe(12)
        ->and($passwordRules['max'])->toBe(255)
        ->and($passwordRules['uncompromised'])->toBeTrue();
})->skip(
    fn (): bool => method_exists(Password::class, 'appliedRules') === false,
    'The appliedRules method is not available in this version of Laravel.'
);

it('is enabled by default', function (): void {
    $setDefaultPassword = new SetDefaultPassword;

    expect($setDefaultPassword->enabled())->toBeTrue();
});

it('can be disabled via configuration', function (): void {
    config()->set('essentials.' . SetDefaultPassword::class, false);

    $setDefaultPassword = new SetDefaultPassword;

    expect($setDefaultPassword->enabled())->toBeFalse();
});
