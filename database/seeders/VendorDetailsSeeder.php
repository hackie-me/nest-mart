<?php

namespace Database\Seeders;

use Database\Factories\VendorDetailsFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VendorDetailsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        VendorDetailsFactory::new()->count(25)->create();
    }
}
