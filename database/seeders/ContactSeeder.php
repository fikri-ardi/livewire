<?php

namespace Database\Seeders;

use App\Models\Contact;
use Illuminate\Database\Seeder;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $contacts = collect(['Fikri', 'Dewi', 'Rahmat']);
        $contacts->each(function($contact){
            Contact::create([
                'name'=>$contact
            ]);
        });
    }
}
