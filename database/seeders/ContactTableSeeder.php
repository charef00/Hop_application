<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
class ContactTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker =Faker::create('App\Models\Contact'); // ajouter 10 contacts chaque fois
        for($i = 1 ; $i <= 10 ; $i++)
        {
		        DB::table('contacts')->insert([
		        	'civilite'=>$faker->boolean,// 0 pour famme et 1 pour homme
			        'prenom'=>$faker->firstName(),
			        'nom'=>$faker->lastName(),
			        'fonction'=>$faker->jobTitle(),
			        'service'=>$faker->name,
			        'email'=>$faker->email,
			        'telephone'=>$faker->phoneNumber,
			        'date_naissance'=> $faker->dateTimeBetween('1980-01-01', '2012-12-31')
		    ->format('m/d/Y'),
			        'nom_societe'=>$faker->company,
			        'adresse_societe'=>$faker->address,
			        'code_postal_societe'=>$faker->postcode,
			        'ville_societe'=>$faker->country,
			        'telephone_societe'=>$faker->phoneNumber,
			        'site_web_societe'=>"wwww.".$faker->company.".com",
			        'created_at' => \Carbon\Carbon::now(),
		        	'Updated_at' => \Carbon\Carbon::now(),
        	]);
    	}
    }
}
