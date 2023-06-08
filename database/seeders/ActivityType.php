<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ActivityType extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $activityTypes = [
            [
                'name' => 'cycle',
                'label' => 'Fahrrad statt Auto',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam euismod, nisl eget aliquam ultricies, nunc nisl aliquet nunc, vitae aliquam nisl',
                'points' => '25'
            ],
            [
                'name' => 'walk',
                'label' => 'Zu Fuß statt Auto',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam euismod, nisl eget aliquam ultricies, nunc nisl aliquet nunc, vitae aliquam nisl',
                'points' => '25'
            ],
            [
                'name' => 'public_transport',
                'label' => 'Öffentliche Verkehrsmittel statt Auto',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam euismod, nisl eget aliquam ultricies, nunc nisl aliquet nunc, vitae aliquam nisl',
                'points' => '20'
            ],
            [
                'name' => 'carsharing',
                'label' => 'Carsharing statt eigenes Auto',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam euismod, nisl eget aliquam ultricies, nunc nisl aliquet nunc, vitae aliquam nisl',
                'points' => '15'
            ],
        ];

        foreach ($activityTypes as $activityType) {
            DB::table('activity_types')->insert($activityType);
        }
    }
}
