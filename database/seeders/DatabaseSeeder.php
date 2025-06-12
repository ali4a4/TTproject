<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\ProductCategory;
use App\Models\LatvianRegion;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        /*ProductCategory::create(['category' => 'Beauty']);
        ProductCategory::create(['category' => 'Books']);
        ProductCategory::create(['category' => 'Clothing']);
        ProductCategory::create(['category' => 'Electronics']);
        ProductCategory::create(['category' => 'House']);
        ProductCategory::create(['category' => 'Kids']);
        ProductCategory::create(['category' => 'Music']);
        ProductCategory::create(['category' => 'Office']);
        ProductCategory::create(['category' => 'Recreation']);
        ProductCategory::create(['category' => 'Sports']);
        ProductCategory::create(['category' => 'Tourism']);
        ProductCategory::create(['category' => 'Transportation']);
        ProductCategory::create(['category' => 'Zoo']);
        ProductCategory::create(['category' => 'Other']);
        LatvianRegion::create(['region' => 'Daugavpils']);
        LatvianRegion::create(['region' => 'Jēkabpils']);
        LatvianRegion::create(['region' => 'Jelgava']);
        LatvianRegion::create(['region' => 'Jūrmala']);
        LatvianRegion::create(['region' => 'Liepāja']);
        LatvianRegion::create(['region' => 'Ogre']);
        LatvianRegion::create(['region' => 'Rēzekne']);
        LatvianRegion::create(['region' => 'Rīga']);
        LatvianRegion::create(['region' => 'Valmiera']);
        LatvianRegion::create(['region' => 'Ventspils']);
        LatvianRegion::create(['region' => 'Ādažu novads']);
        LatvianRegion::create(['region' => 'Aizkraukles novads']);
        LatvianRegion::create(['region' => 'Alūksnes novads']);
        LatvianRegion::create(['region' => 'Augšdaugavas novads']);
        LatvianRegion::create(['region' => 'Balvu novads']);
        LatvianRegion::create(['region' => 'Bauskas novads']);
        LatvianRegion::create(['region' => 'Cēsu novads']);
        LatvianRegion::create(['region' => 'Dienvidkurzemes novads']);
        LatvianRegion::create(['region' => 'Dobeles novads']);
        LatvianRegion::create(['region' => 'Gulbenes novads']);
        LatvianRegion::create(['region' => 'Jēkabpils novads']);
        LatvianRegion::create(['region' => 'Jelgavas novads']);
        LatvianRegion::create(['region' => 'Krāslavas novads']);
        LatvianRegion::create(['region' => 'Kuldīgas novads']);
        LatvianRegion::create(['region' => 'Ķekavas novads']);
        LatvianRegion::create(['region' => 'Limbažu novads']);
        LatvianRegion::create(['region' => 'Līvānu novads']);
        LatvianRegion::create(['region' => 'Ludzas novads']);
        LatvianRegion::create(['region' => 'Madonas novads']);
        LatvianRegion::create(['region' => 'Mārupes novads']);
        LatvianRegion::create(['region' => 'Ogres novads']);
        LatvianRegion::create(['region' => 'Olaines novads']);
        LatvianRegion::create(['region' => 'Preiļu novads']);
        LatvianRegion::create(['region' => 'Rēzeknes novads']);
        LatvianRegion::create(['region' => 'Ropažu novads']);
        LatvianRegion::create(['region' => 'Salaspils novads']);
        LatvianRegion::create(['region' => 'Saldus novads']);
        LatvianRegion::create(['region' => 'Saulkrastu novads']);
        LatvianRegion::create(['region' => 'Siguldas novads']);
        LatvianRegion::create(['region' => 'Smiltenes novads']);
        LatvianRegion::create(['region' => 'Talsu novads']);
        LatvianRegion::create(['region' => 'Tukuma novads']);
        LatvianRegion::create(['region' => 'Valkas novads']);
        LatvianRegion::create(['region' => 'Valmieras novads']);
        LatvianRegion::create(['region' => 'Ventspils novads']);*/
        User::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => bcrypt('admpas123')
        ]);
    }
}
