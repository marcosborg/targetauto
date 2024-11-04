<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Seeder;

class CountriesTableSeeder extends Seeder
{
    public function run()
    {
        $countries = [
            ['id' => 1, 'name' => 'Afghanistan', 'short_code' => '+93'],
            ['id' => 2, 'name' => 'Albania', 'short_code' => '+355'],
            ['id' => 3, 'name' => 'Algeria', 'short_code' => '+213'],
            ['id' => 4, 'name' => 'American Samoa', 'short_code' => '+1-684'],
            ['id' => 5, 'name' => 'Andorra', 'short_code' => '+376'],
            ['id' => 6, 'name' => 'Angola', 'short_code' => '+244'],
            ['id' => 7, 'name' => 'Anguilla', 'short_code' => '+1-264'],
            ['id' => 8, 'name' => 'Antarctica', 'short_code' => '+672'],
            ['id' => 9, 'name' => 'Antigua and Barbuda', 'short_code' => '+1-268'],
            ['id' => 10, 'name' => 'Argentina', 'short_code' => '+54'],
            ['id' => 11, 'name' => 'Armenia', 'short_code' => '+374'],
            ['id' => 12, 'name' => 'Aruba', 'short_code' => '+297'],
            ['id' => 13, 'name' => 'Australia', 'short_code' => '+61'],
            ['id' => 14, 'name' => 'Austria', 'short_code' => '+43'],
            ['id' => 15, 'name' => 'Azerbaijan', 'short_code' => '+994'],
            ['id' => 16, 'name' => 'Bahamas', 'short_code' => '+1-242'],
            ['id' => 17, 'name' => 'Bahrain', 'short_code' => '+973'],
            ['id' => 18, 'name' => 'Bangladesh', 'short_code' => '+880'],
            ['id' => 19, 'name' => 'Barbados', 'short_code' => '+1-246'],
            ['id' => 20, 'name' => 'Belarus', 'short_code' => '+375'],
            ['id' => 21, 'name' => 'Belgium', 'short_code' => '+32'],
            ['id' => 22, 'name' => 'Belize', 'short_code' => '+501'],
            ['id' => 23, 'name' => 'Benin', 'short_code' => '+229'],
            ['id' => 24, 'name' => 'Bermuda', 'short_code' => '+1-441'],
            ['id' => 25, 'name' => 'Bhutan', 'short_code' => '+975'],
            ['id' => 26, 'name' => 'Bolivia', 'short_code' => '+591'],
            ['id' => 27, 'name' => 'Bosnia and Herzegovina', 'short_code' => '+387'],
            ['id' => 28, 'name' => 'Botswana', 'short_code' => '+267'],
            ['id' => 29, 'name' => 'Brazil', 'short_code' => '+55'],
            ['id' => 30, 'name' => 'British Indian Ocean Territory', 'short_code' => '+246'],
            ['id' => 31, 'name' => 'British Virgin Islands', 'short_code' => '+1-284'],
            ['id' => 32, 'name' => 'Brunei', 'short_code' => '+673'],
            ['id' => 33, 'name' => 'Bulgaria', 'short_code' => '+359'],
            ['id' => 34, 'name' => 'Burkina Faso', 'short_code' => '+226'],
            ['id' => 35, 'name' => 'Burundi', 'short_code' => '+257'],
            ['id' => 36, 'name' => 'Cambodia', 'short_code' => '+855'],
            ['id' => 37, 'name' => 'Cameroon', 'short_code' => '+237'],
            ['id' => 38, 'name' => 'Canada', 'short_code' => '+1'],
            ['id' => 39, 'name' => 'Cape Verde', 'short_code' => '+238'],
            ['id' => 40, 'name' => 'Cayman Islands', 'short_code' => '+1-345'],
            ['id' => 41, 'name' => 'Central African Republic', 'short_code' => '+236'],
            ['id' => 42, 'name' => 'Chad', 'short_code' => '+235'],
            ['id' => 43, 'name' => 'Chile', 'short_code' => '+56'],
            ['id' => 44, 'name' => 'China', 'short_code' => '+86'],
            ['id' => 45, 'name' => 'Christmas Island', 'short_code' => '+61'],
            ['id' => 46, 'name' => 'Cocos Islands', 'short_code' => '+61'],
            ['id' => 47, 'name' => 'Colombia', 'short_code' => '+57'],
            ['id' => 48, 'name' => 'Comoros', 'short_code' => '+269'],
            ['id' => 49, 'name' => 'Cook Islands', 'short_code' => '+682'],
            ['id' => 50, 'name' => 'Costa Rica', 'short_code' => '+506'],
            // Add more countries as needed
        ];

        Country::insert($countries);
    }
}