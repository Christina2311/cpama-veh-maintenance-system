<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        ini_set('memory_limit', '512M');
        set_time_limit(0);

        DB::connection()->getPdo()->setAttribute(\PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, true);

        // 1. COMPLETELY RESET TABLES & COUNTERS
        // This ensures ID 1 in the SQL file matches ID 1 in the Database
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('appointment_services')->truncate();
        DB::table('tasks')->truncate();
        DB::table('appointments')->truncate();
        DB::table('vehicles')->truncate();
        DB::table('services')->truncate();
        DB::table('users')->truncate();

        $path = database_path('vehicle_maintenance_system.sql');
        $sql = file_get_contents($path);
        
        // Clean SQL
        $sql = preg_replace('/--.*?\n/', '', $sql);
        $sql = preg_replace('/\/\*.*?\*\//s', '', $sql);
        $sql = preg_replace('/DROP DATABASE.*?;/i', '', $sql);
        $sql = preg_replace('/CREATE DATABASE.*?;/i', '', $sql);
        $sql = preg_replace('/USE .*?;/i', '', $sql);
        
        $statements = array_filter(array_map('trim', explode(';', $sql)));
        $this->command->info("Found " . count($statements) . " SQL statements to run."); 

        DB::beginTransaction();
        try {
            foreach ($statements as $statement) {
                if (strlen($statement) > 5 && stripos($statement, 'SELECT') !== 0) {
                    try {
                        DB::unprepared($statement . ';');
                    } catch (\Illuminate\Database\QueryException $e) {
                        if ($e->getCode() == 23000) continue;
                        throw $e;
                    }
                }
            }
            DB::commit();
            $this->command->info('CPAMA Database fully synced with 120+ vehicles and 150 appointments!');
        } catch (\Exception $e) {
            DB::rollBack();
            $this->command->error("Seeding failed! Error: " . $e->getMessage());
        } finally {
            DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        }

        // Apply role overrides after seeding
        DB::table('users')
            ->where('email', 'david.mechanic@vehiclecare.com')
            ->update(['role' => 'senior_mechanic']);
        $this->command->info('Role overrides applied.');
            }
}