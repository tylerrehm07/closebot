<?php

use Illuminate\Database\Seeder;

class EventsTableSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('event_types')->insert(
          [
            [
              'level' => 10,
              'name' => 'Required',
              'created_at' => \Carbon\Carbon::now(),
              'updated_at' => \Carbon\Carbon::now()
            ],
            [
              'level' => 1,
              'name' => 'Optional',
              'created_at' => \Carbon\Carbon::now(),
              'updated_at' => \Carbon\Carbon::now()
            ],
            [
              'level' => 5,
              'name' => 'Recommended',
              'created_at' => \Carbon\Carbon::now(),
              'updated_at' => \Carbon\Carbon::now()
            ],
          ]
        );

        DB::table('events')->insert(
          [
            [
              'event_type_id' => 1,
              'name' => 'Effective Date',
              'description' => 'Offer has been accepted & all required paperwork has been signed by both parties.',
              'created_at' => \Carbon\Carbon::now(),
              'updated_at' => \Carbon\Carbon::now()
            ],
            [
              'event_type_id' => 1,
              'name' => 'Escrow Deposited',
              'description' => 'Buyer has deposited the requisite funds & returned an escrow receipt.',
              'created_at' => \Carbon\Carbon::now(),
              'updated_at' => \Carbon\Carbon::now()
            ],
            [
              'event_type_id' => 1,
              'name' => 'Inspection Deadline',
              'description' => 'Buyer has completed preliminary property inspection & returned report.',
              'created_at' => \Carbon\Carbon::now(),
              'updated_at' => \Carbon\Carbon::now()
            ],
            [
              'event_type_id' => 1,
              'name' => 'Appraisal Deadline',
              'description' => 'Financing company has successfully completed appraisal.',
              'created_at' => \Carbon\Carbon::now(),
              'updated_at' => \Carbon\Carbon::now()
            ],
            [
              'event_type_id' => 1,
              'name' => 'Survey Completed',
              'description' => 'Title company has completed & returned survey.',
              'created_at' => \Carbon\Carbon::now(),
              'updated_at' => \Carbon\Carbon::now()
            ],
            [
              'event_type_id' => 1,
              'name' => 'Final Walkthrough',
              'description' => 'Buyer has completed final walkthrough.',
              'created_at' => \Carbon\Carbon::now(),
              'updated_at' => \Carbon\Carbon::now()
            ],
            [
              'event_type_id' => 1,
              'name' => 'Closing',
              'description' => 'Final transfer of title & completiong of transaction.',
              'created_at' => \Carbon\Carbon::now(),
              'updated_at' => \Carbon\Carbon::now()
            ]
          ]
        );

      DB::table('event_property')->insert(
        [
          [
          'event_id' => '1',
          'property_id' => '1',
          'date' => \Carbon\Carbon::now()->format('Y-m-d'),
          'time' => \Carbon\Carbon::now()->format('H:m:s'),
          'completed' => null,
          'created_at' => \Carbon\Carbon::now(),
          'updated_at' => \Carbon\Carbon::now()
          ],
          [
            'event_id' => '2',
            'property_id' => '1',
            'date' => \Carbon\Carbon::now()->format('Y-m-d'),
            'time' => \Carbon\Carbon::now()->format('H:m:s'),
            'completed' => null,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
          ],
          [
            'event_id' => '3',
            'property_id' => '1',
            'date' => \Carbon\Carbon::now()->format('Y-m-d'),
            'time' => \Carbon\Carbon::now()->format('H:m:s'),
            'completed' => null,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
          ],
          [
            'event_id' => '4',
            'property_id' => '1',
            'date' => \Carbon\Carbon::now()->format('Y-m-d'),
            'time' => \Carbon\Carbon::now()->format('H:m:s'),
            'completed' => null,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
          ],
          [
            'event_id' => '5',
            'property_id' => '1',
            'date' => \Carbon\Carbon::now()->format('Y-m-d'),
            'time' => \Carbon\Carbon::now()->format('H:m:s'),
            'completed' => null,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
          ],
          [
            'event_id' => '6',
            'property_id' => '1',
            'date' => \Carbon\Carbon::now()->format('Y-m-d'),
            'time' => \Carbon\Carbon::now()->format('H:m:s'),
            'completed' => null,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
          ],
          [
            'event_id' => '7',
            'property_id' => '1',
            'date' => \Carbon\Carbon::now()->format('Y-m-d'),
            'time' => \Carbon\Carbon::now()->format('H:m:s'),
            'completed' => null,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
          ]
        ]
      );
    }
}
