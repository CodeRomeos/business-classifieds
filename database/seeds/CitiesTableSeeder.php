<?php

use Illuminate\Database\Seeder;
use App\Country;
use App\State;
use App\City;

class CitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		$India = Country::create(['code' => 'IND', 'name' => 'India']);

		$indian_states = indian_states_and_cites();
		foreach($indian_states as $state_code => $state_arr)
		{
			$state = State::create(['country_id' => $India->id, 'code' => $state_code, 'name' => $state_arr['state']]);
			$cities = $state_arr['cities'];
			$cities = array_map(function($city){
				return ['name' => $city];
			}, $cities);
			$state->cities()->createMany($cities);
		}
    }
}
