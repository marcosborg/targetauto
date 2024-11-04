<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'content_management_access',
            ],
            [
                'id'    => 18,
                'title' => 'content_category_create',
            ],
            [
                'id'    => 19,
                'title' => 'content_category_edit',
            ],
            [
                'id'    => 20,
                'title' => 'content_category_show',
            ],
            [
                'id'    => 21,
                'title' => 'content_category_delete',
            ],
            [
                'id'    => 22,
                'title' => 'content_category_access',
            ],
            [
                'id'    => 23,
                'title' => 'content_tag_create',
            ],
            [
                'id'    => 24,
                'title' => 'content_tag_edit',
            ],
            [
                'id'    => 25,
                'title' => 'content_tag_show',
            ],
            [
                'id'    => 26,
                'title' => 'content_tag_delete',
            ],
            [
                'id'    => 27,
                'title' => 'content_tag_access',
            ],
            [
                'id'    => 28,
                'title' => 'content_page_create',
            ],
            [
                'id'    => 29,
                'title' => 'content_page_edit',
            ],
            [
                'id'    => 30,
                'title' => 'content_page_show',
            ],
            [
                'id'    => 31,
                'title' => 'content_page_delete',
            ],
            [
                'id'    => 32,
                'title' => 'content_page_access',
            ],
            [
                'id'    => 33,
                'title' => 'brand_create',
            ],
            [
                'id'    => 34,
                'title' => 'brand_edit',
            ],
            [
                'id'    => 35,
                'title' => 'brand_show',
            ],
            [
                'id'    => 36,
                'title' => 'brand_delete',
            ],
            [
                'id'    => 37,
                'title' => 'brand_access',
            ],
            [
                'id'    => 38,
                'title' => 'car_model_create',
            ],
            [
                'id'    => 39,
                'title' => 'car_model_edit',
            ],
            [
                'id'    => 40,
                'title' => 'car_model_show',
            ],
            [
                'id'    => 41,
                'title' => 'car_model_delete',
            ],
            [
                'id'    => 42,
                'title' => 'car_model_access',
            ],
            [
                'id'    => 43,
                'title' => 'year_create',
            ],
            [
                'id'    => 44,
                'title' => 'year_edit',
            ],
            [
                'id'    => 45,
                'title' => 'year_show',
            ],
            [
                'id'    => 46,
                'title' => 'year_delete',
            ],
            [
                'id'    => 47,
                'title' => 'year_access',
            ],
            [
                'id'    => 48,
                'title' => 'fuel_create',
            ],
            [
                'id'    => 49,
                'title' => 'fuel_edit',
            ],
            [
                'id'    => 50,
                'title' => 'fuel_show',
            ],
            [
                'id'    => 51,
                'title' => 'fuel_delete',
            ],
            [
                'id'    => 52,
                'title' => 'fuel_access',
            ],
            [
                'id'    => 53,
                'title' => 'transmission_create',
            ],
            [
                'id'    => 54,
                'title' => 'transmission_edit',
            ],
            [
                'id'    => 55,
                'title' => 'transmission_show',
            ],
            [
                'id'    => 56,
                'title' => 'transmission_delete',
            ],
            [
                'id'    => 57,
                'title' => 'transmission_access',
            ],
            [
                'id'    => 58,
                'title' => 'vehicle_create',
            ],
            [
                'id'    => 59,
                'title' => 'vehicle_edit',
            ],
            [
                'id'    => 60,
                'title' => 'vehicle_show',
            ],
            [
                'id'    => 61,
                'title' => 'vehicle_delete',
            ],
            [
                'id'    => 62,
                'title' => 'vehicle_access',
            ],
            [
                'id'    => 63,
                'title' => 'contact_create',
            ],
            [
                'id'    => 64,
                'title' => 'contact_edit',
            ],
            [
                'id'    => 65,
                'title' => 'contact_show',
            ],
            [
                'id'    => 66,
                'title' => 'contact_delete',
            ],
            [
                'id'    => 67,
                'title' => 'contact_access',
            ],
            [
                'id'    => 68,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
