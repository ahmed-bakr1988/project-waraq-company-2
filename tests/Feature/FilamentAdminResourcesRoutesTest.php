<?php

namespace Tests\Feature;

use Tests\TestCase;

class FilamentAdminResourcesRoutesTest extends TestCase
{
    public function test_admin_resource_routes_exist_and_require_authentication(): void
    {
        $resourceRouteNames = [
            'filament.admin.resources.products.index',
            'filament.admin.resources.product-categories.index',
            'filament.admin.resources.team-members.index',
            'filament.admin.resources.careers.index',
            'filament.admin.resources.job-applications.index',
            'filament.admin.resources.quote-request-submissions.index',
            'filament.admin.resources.newsletter-subscriptions.index',
            'filament.admin.resources.users.index',
        ];

        foreach ($resourceRouteNames as $routeName) {
            $response = $this->get(route($routeName));
            $response->assertRedirect(route('filament.admin.auth.login'));
        }
    }
}
