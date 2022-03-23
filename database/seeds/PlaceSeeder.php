<?php

use Illuminate\Database\Seeder;
use App\Country;
use App\City;
use App\Region;
use App\Location;

class PlaceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $country1 = Country::create(['name'=>'Egypt']);
            $city11 = City::create(['name'=>'Cairo','country_id'=>$country1->id]);
                $region111 = Region::create(['name'=>'Maadi','country_id'=>$country1->id,'city_id'=>$city11->id]);
                $region112 = Region::create(['name'=>'Nasr City','country_id'=>$country1->id,'city_id'=>$city11->id]);
                $region113 = Region::create(['name'=>'Helwan','country_id'=>$country1->id,'city_id'=>$city11->id]);

            $city12 = City::create(['name'=>'Giza','country_id'=>$country1->id]);
                $region121 = Region::create(['name'=>'October','country_id'=>$country1->id,'city_id'=>$city12->id]);
                $region122 = Region::create(['name'=>'Mohandseen','country_id'=>$country1->id,'city_id'=>$city12->id]);
                $region123 = Region::create(['name'=>'Saf','country_id'=>$country1->id,'city_id'=>$city12->id]);

            $city13 = City::create(['name'=>'Alexanderia','country_id'=>$country1->id]);
                $region131 = Region::create(['name'=>'Agamy','country_id'=>$country1->id,'city_id'=>$city13->id]);
                $region132 = Region::create(['name'=>'Ebrahimya','country_id'=>$country1->id,'city_id'=>$city13->id]);
                $region133 = Region::create(['name'=>'Smoha','country_id'=>$country1->id,'city_id'=>$city13->id]);
    


        $country2 = Country::create(['name'=>'Saudi Arabia']);
            $city21 = City::create(['name'=>'Makkah','country_id'=>$country2->id]);
                $region211 = Region::create(['name'=>'Makkah 1','country_id'=>$country2->id,'city_id'=>$city21->id]);
                $region212 = Region::create(['name'=>'Makkah 2','country_id'=>$country2->id,'city_id'=>$city21->id]);
                $region213 = Region::create(['name'=>'Makkah 3','country_id'=>$country2->id,'city_id'=>$city21->id]);
    
            $city22 = City::create(['name'=>'Madinah','country_id'=>$country2->id]);
                $region221 = Region::create(['name'=>'Madinah 1','country_id'=>$country2->id,'city_id'=>$city22->id]);
                $region222 = Region::create(['name'=>'Madinah 2','country_id'=>$country2->id,'city_id'=>$city22->id]);
                $region223 = Region::create(['name'=>'Madinah 3','country_id'=>$country2->id,'city_id'=>$city22->id]);
    
            $city23 = City::create(['name'=>'Reyyad','country_id'=>$country2->id]);
                $region231 = Region::create(['name'=>'Reyyad 1','country_id'=>$country2->id,'city_id'=>$city23->id]);
                $region232 = Region::create(['name'=>'Reyyad 2','country_id'=>$country2->id,'city_id'=>$city23->id]);
                $region233 = Region::create(['name'=>'Reyyad 3','country_id'=>$country2->id,'city_id'=>$city23->id]);



        $country3 = Country::create(['name'=>'Palastine']);
            $city31 = City::create(['name'=>'Quds','country_id'=>$country3->id]);
                $region311 = Region::create(['name'=>'Quds 1','country_id'=>$country3->id,'city_id'=>$city31->id]);
                $region312 = Region::create(['name'=>'Quds 2','country_id'=>$country3->id,'city_id'=>$city31->id]);
                $region313 = Region::create(['name'=>'Quds 3','country_id'=>$country3->id,'city_id'=>$city31->id]);
    
            $city32 = City::create(['name'=>'Ghaza','country_id'=>$country3->id]);
                $region321 = Region::create(['name'=>'Ghaza 1','country_id'=>$country3->id,'city_id'=>$city32->id]);
                $region322 = Region::create(['name'=>'Ghaza 2','country_id'=>$country3->id,'city_id'=>$city32->id]);
                $region323 = Region::create(['name'=>'Ghaza 3','country_id'=>$country3->id,'city_id'=>$city32->id]);
    
            $city33 = City::create(['name'=>'Beet Lahm','country_id'=>$country3->id]);
                $region331 = Region::create(['name'=>'Beet Lahm 1','country_id'=>$country3->id,'city_id'=>$city33->id]);
                $region332 = Region::create(['name'=>'Beet Lahm 2','country_id'=>$country3->id,'city_id'=>$city33->id]);
                $region333 = Region::create(['name'=>'Beet Lahm 3','country_id'=>$country3->id,'city_id'=>$city33->id]);
    }
}
