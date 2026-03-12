<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('rooms')->insert([
            ['name' => 'Aula', 'capacity' => 150, 'type' => 'aula', 'shielded' => true],
            ['name' => 'RT 1', 'capacity' => 40, 'type' => 'teori', 'shielded' => false],
            ['name' => 'RT 2', 'capacity' => 40, 'type' => 'teori', 'shielded' => false],
            ['name' => 'RT 3', 'capacity' => 40, 'type' => 'teori', 'shielded' => false],
            ['name' => 'RT 4', 'capacity' => 40, 'type' => 'teori', 'shielded' => false],
            ['name' => 'RT 5', 'capacity' => 40, 'type' => 'teori', 'shielded' => false],
            ['name' => 'RT 6', 'capacity' => 40, 'type' => 'teori', 'shielded' => false],
            ['name' => 'RT 7', 'capacity' => 40, 'type' => 'teori', 'shielded' => false],
            ['name' => 'RT 8', 'capacity' => 40, 'type' => 'teori', 'shielded' => false],
            ['name' => 'RT 9', 'capacity' => 40, 'type' => 'teori', 'shielded' => false],
            ['name' => 'RT 10', 'capacity' => 40, 'type' => 'teori', 'shielded' => false],
            ['name' => 'RT 11', 'capacity' => 40, 'type' => 'teori', 'shielded' => false],
            ['name' => 'RT 12', 'capacity' => 40, 'type' => 'teori', 'shielded' => false],
            ['name' => 'RT 13', 'capacity' => 40, 'type' => 'teori', 'shielded' => false],
            ['name' => 'RT 14', 'capacity' => 40, 'type' => 'teori', 'shielded' => false],
            ['name' => 'RT 15', 'capacity' => 40, 'type' => 'teori', 'shielded' => false],
            ['name' => 'RT 16', 'capacity' => 40, 'type' => 'teori', 'shielded' => false],
            ['name' => 'RT 17', 'capacity' => 40, 'type' => 'teori', 'shielded' => false],
            ['name' => 'RT 18', 'capacity' => 40, 'type' => 'teori', 'shielded' => false],
            ['name' => 'LAB RPL', 'capacity' => 40, 'type' => 'lab', 'shielded' => true],
            ['name' => 'LAB AKL', 'capacity' => 40, 'type' => 'lab', 'shielded' => true],
            ['name' => 'LAB BD/BR', 'capacity' => 40, 'type' => 'lab', 'shielded' => true],
            ['name' => 'LAB MP/MLOG', 'capacity' => 40, 'type' => 'lab', 'shielded' => true],
            ['name' => 'LAB Multimedia', 'capacity' => 40, 'type' => 'lab', 'shielded' => true],
        ]);
    }
}
