<?php

namespace Database\Seeders;

use App\Models\Instructeur;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InstructeurSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       Instructeur::create(['name'=>'ahmed',
       'prenom'=>'ahmed'
       ]);
       Instructeur::create(['name'=>'mario',
       'prenom'=>'mario'
       ]);
       Instructeur::create(['name'=>'shaun',
       'prenom'=>'shaun'
       ]);
       Instructeur::create(['name'=>'bob',
       'prenom'=>'bob'
       ]);
    }
}
