<?php

namespace Database\Seeders;

use App\Models\Organization;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Organizations that will have users
        $organizations = Organization::factory(2)->create();
        // Empty organization
        Organization::factory()->create();

        User::factory(10)->create(new Sequence(
            ['organization_id' => $organizations[0]],
            ['organization_id' => $organizations[1]],
        ));
    }
}
