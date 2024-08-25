<?php

namespace Tests;

use App\Models\User;
use Laravel\Sanctum\Sanctum;

trait CreatesApplication
{
    protected function setUp(): void
    {
        parent::setUp();
        $this->artisan('migrate:refresh --seed');
        $user = User::first();
        Sanctum::actingAs(
            $user,
            ['*']
        );
        \Event::fake();

    }
}
