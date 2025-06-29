<?php

namespace Database\Seeders;

use App\Models\Seo;
use App\Models\ShipCities;
use App\Models\ShipDistricts;
use App\Models\ShipState;
use App\Models\SiteSetting;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        Schema::disableForeignKeyConstraints();
        User::where(['phone'=>'9739128127'])->delete();
        User::factory()->create([
            'name' => 'Pink Cheeks',
            'email' => 'admin@pinkcheeks.in',
            'phone' => '9739128127',
            'password' => Hash::make('123Pinkcheeks456'),
            'role' => 'admin'
        ]);
        Schema::enableForeignKeyConstraints();
        SiteSetting::truncate();
        SiteSetting::create([
            'id' => 1,
            'logo' => 'upload/logo/1772124907858100.png',
            'support_phone' => '8825694267',
            'phone_one' => '8825694267',
            'email' => 'care@pinkcheeks.in',
            'company_address' => NULL,
            'facebook' => 'https://www.facebook.com/pinkcheeks/',
            'instagram' => 'https://instagram.com/pinkcheeks',
            'youtube' => 'https://www.youtube.com/channel/',
            'copyright' => date('Y'),
        ]);
        Seo::truncate();
        Seo::create([
            'id' => 1,
            'meta_title' => 'Pink Cheeks',
            'meta_author' => 'Pink Cheeks',
            'meta_keyword' => 'toys ,footwear',
            'meta_description' => 'Awesome Collections for Baby\'s'
        ]);
        ShipState::truncate();
        ShipDistricts::truncate();
        ShipCities::truncate();
        ShipState::create([
            'state_name' => 'Tamil Nadu',
        ]);
        ShipDistricts::insert(
            [
                ['district_name' => 'Chennai', 'state_id' => 1],
                ['district_name' => 'Coimbatore', 'state_id' => 1],
                ['district_name' => 'Madurai', 'state_id' => 1],
                ['district_name' => 'Tiruchirappalli', 'state_id' => 1],
                ['district_name' => 'Salem', 'state_id' => 1],
                ['district_name' => 'Tirunelveli', 'state_id' => 1],
                ['district_name' => 'Vellore', 'state_id' => 1],
                ['district_name' => 'Erode', 'state_id' => 1],
                ['district_name' => 'Tiruppur', 'state_id' => 1],
                ['district_name' => 'Thoothukudi', 'state_id' => 1],
                ['district_name' => 'Dindigul', 'state_id' => 1],
                ['district_name' => 'Thanjavur', 'state_id' => 1],
                ['district_name' => 'Ranipet', 'state_id' => 1],
                ['district_name' => 'Sivaganga', 'state_id' => 1],
                ['district_name' => 'Virudhunagar', 'state_id' => 1],
                ['district_name' => 'Karur', 'state_id' => 1],
                ['district_name' => 'Nagapattinam', 'state_id' => 1],
                ['district_name' => 'Kanyakumari', 'state_id' => 1],
                ['district_name' => 'Cuddalore', 'state_id' => 1],
                ['district_name' => 'Kanchipuram', 'state_id' => 1],
                ['district_name' => 'Thiruvallur', 'state_id' => 1],
                ['district_name' => 'Ariyalur', 'state_id' => 1],
                ['district_name' => 'Krishnagiri', 'state_id' => 1],
                ['district_name' => 'Namakkal', 'state_id' => 1],
                ['district_name' => 'Perambalur', 'state_id' => 1],
                ['district_name' => 'Pudukkottai', 'state_id' => 1],
                ['district_name' => 'Ramanathapuram', 'state_id' => 1],
                ['district_name' => 'Tenkasi', 'state_id' => 1],
                ['district_name' => 'Theni', 'state_id' => 1],
                ['district_name' => 'Thiruvarur', 'state_id' => 1],
                ['district_name' => 'Viluppuram', 'state_id' => 1],
                ['district_name' => 'Mayiladuthurai', 'state_id' => 1]
            ]
        );
        ShipCities::insert([
            ['city_name' => 'Chennai', 'district_id' => 1],
            ['city_name' => 'Coimbatore', 'district_id' => 2],
            ['city_name' => 'Madurai', 'district_id' => 3],
            ['city_name' => 'Tiruchirappalli', 'district_id' => 4],
            ['city_name' => 'Salem', 'district_id' => 5],
            ['city_name' => 'Tirunelveli', 'district_id' => 6],
            ['city_name' => 'Vellore', 'district_id' => 7],
            ['city_name' => 'Erode', 'district_id' => 8],
            ['city_name' => 'Tiruppur', 'district_id' => 9],
            ['city_name' => 'Thoothukudi', 'district_id' => 10],
            ['city_name' => 'Dindigul', 'district_id' => 11],
            ['city_name' => 'Thanjavur', 'district_id' => 12],
            ['city_name' => 'Ranipet', 'district_id' => 13],
            ['city_name' => 'Sivaganga', 'district_id' => 14],
            ['city_name' => 'Virudhunagar', 'district_id' => 15],
            ['city_name' => 'Karur', 'district_id' => 16],
            ['city_name' => 'Nagapattinam', 'district_id' => 17],
            ['city_name' => 'Kanyakumari', 'district_id' => 18],
            ['city_name' => 'Cuddalore', 'district_id' => 19],
            ['city_name' => 'Kanchipuram', 'district_id' => 20],
            ['city_name' => 'Thiruvallur', 'district_id' => 21],
            ['city_name' => 'Ariyalur', 'district_id' => 22],
            ['city_name' => 'Krishnagiri', 'district_id' => 23],
            ['city_name' => 'Namakkal', 'district_id' => 24],
            ['city_name' => 'Perambalur', 'district_id' => 25],
            ['city_name' => 'Pudukkottai', 'district_id' => 26],
            ['city_name' => 'Ramanathapuram', 'district_id' => 27],
            ['city_name' => 'Tenkasi', 'district_id' => 28],
            ['city_name' => 'Theni', 'district_id' => 29],
            ['city_name' => 'Thiruvarur', 'district_id' => 30],
            ['city_name' => 'Viluppuram', 'district_id' => 31],
            ['city_name' => 'Mayiladuthurai', 'district_id' => 32],
        ]);
        // Banners
        DB::table('banners')->insert([
            [
                'id' => 1,
                'banner_title' => 'Girls Fashion',
                'banner_url' => '/product/category/2/girls-fashion',
                'banner_image' => 'upload/banner/1829941163094203.jpg',
                'created_at' => null,
                'updated_at' => '2025-04-20 11:23:09',
            ],
            [
                'id' => 2,
                'banner_title' => "Boy's Fashion",
                'banner_url' => 'product/category/1/boy-fashion',
                'banner_image' => 'upload/banner/1829941328378009.jpg',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'id' => 3,
                'banner_title' => 'Footwear',
                'banner_url' => 'product/category/3/footwear',
                'banner_image' => 'upload/banner/1829941457994734.jpg',
                'created_at' => null,
                'updated_at' => null,
            ],
        ]);

        // Brands
        DB::table('brands')->insert([
            'id' => 1,
            'brand_name' => 'First Cry',
            'brand_slug' => 'first cry',
            'brand_image' => 'upload/brand/1829670403915735.png',
            'created_at' => null,
            'updated_at' => null,
        ]);

        // Categories
        DB::table('categories')->insert([
            ['id' => 1, 'category_name' => 'Boy Fashion', 'category_slug' => 'boy-fashion', 'category_image' => 'upload/category/1829669032628958.png', 'status' => 1, 'created_at' => null, 'updated_at' => null],
            ['id' => 2, 'category_name' => 'Girls Fashion', 'category_slug' => 'girls-fashion', 'category_image' => 'upload/category/1829670893788198.png', 'status' => 1, 'created_at' => null, 'updated_at' => null],
            ['id' => 3, 'category_name' => 'Footwear', 'category_slug' => 'footwear', 'category_image' => 'upload/category/1829670932797161.png', 'status' => 1, 'created_at' => null, 'updated_at' => null],
            ['id' => 4, 'category_name' => 'Toys', 'category_slug' => 'toys', 'category_image' => 'upload/category/1829671011468633.png', 'status' => 1, 'created_at' => null, 'updated_at' => null],
            ['id' => 5, 'category_name' => 'Nursery', 'category_slug' => 'nursery', 'category_image' => 'upload/category/1829671069112136.png', 'status' => 1, 'created_at' => null, 'updated_at' => null],
        ]);

        // Sliders
        DB::table('sliders')->insert([
            'id' => 1,
            'slider_title' => 'Childrens Shopping',
            'short_title' => null,
            'slider_image' => 'upload/slider/1830028569827041.jpg',
            'created_at' => null,
            'updated_at' => '2025-04-21 10:30:49',
        ]);

        // SubCategories
        DB::table('sub_categories')->insert([
            'id' => 1,
            'category_id' => 1,
            'subcategory_name' => 'Sets and suits',
            'subcategory_slug' => 'sets and suits',
            'created_at' => null,
            'updated_at' => null,
            'status' => 1,
        ]);
    }
}
