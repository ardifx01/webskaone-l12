<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class AppInstall extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:app-install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Installer Laravel 12 Webskaone';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info("\n=== Final Installer Webskaone Laravel 12 ===\n");

        // 1. Cek composer
        exec("composer --version", $output, $composerStatus);
        if ($composerStatus !== 0) {
            $this->error("\n[ERROR] Composer tidak ditemukan. Pastikan composer terinstall.\n");
            return;
        }

        // 2. Cek mysql
        exec("mysql --version", $output, $mysqlStatus);
        if ($mysqlStatus !== 0) {
            $this->error("\n[ERROR] MySQL client tidak ditemukan. Pastikan mysql terinstall.\n");
            return;
        }

        $steps = [
            'Membuat .env',
            'Mengatur konfigurasi database',
            'Composer install',
            'Generate application key',
            'Validasi koneksi database',
            'Backup database (jika ada)',
            'Import database structure',
            'Import database data',
            'Optimize clear'
        ];

        $bar = $this->output->createProgressBar(count($steps));
        $bar->start();

        // 3. Copy .env
        if (!file_exists(base_path('.env'))) {
            copy(base_path('.env.example'), base_path('.env'));
            $this->line("\n[INFO] .env created from .env.example");
        } else {
            $this->line("\n[INFO] .env already exists");
        }
        $bar->advance();

        // 4. Ask DB config
        $dbHost = $this->ask("DB_HOST", "127.0.0.1");
        $dbPort = $this->ask("DB_PORT", "3306");
        $dbName = $this->ask("DB_DATABASE", "webskaone-l12");
        $dbUser = $this->ask("DB_USERNAME", "root");
        $dbPass = $this->secret("DB_PASSWORD");

        // Update .env
        $envPath = base_path('.env');
        $envContent = file_get_contents($envPath);
        $envContent = preg_replace('/DB_CONNECTION=.*/', 'DB_CONNECTION=mysql', $envContent);
        $envContent = preg_replace('/DB_HOST=.*/', "DB_HOST={$dbHost}", $envContent);
        $envContent = preg_replace('/DB_PORT=.*/', "DB_PORT={$dbPort}", $envContent);
        $envContent = preg_replace('/DB_DATABASE=.*/', "DB_DATABASE={$dbName}", $envContent);
        $envContent = preg_replace('/DB_USERNAME=.*/', "DB_USERNAME={$dbUser}", $envContent);
        $envContent = preg_replace('/DB_PASSWORD=.*/', "DB_PASSWORD={$dbPass}", $envContent);
        file_put_contents($envPath, $envContent);
        $bar->advance();

        // 5. Composer install
        $this->line("\n[INFO] Running composer install...");
        exec("composer install", $composerOutput, $composerStatus);
        if ($composerStatus === 0) {
            $this->info("[SUCCESS] Composer install completed");
        } else {
            $this->error("[ERROR] Composer install failed");
            return;
        }
        $bar->advance();

        // 6. Generate key
        $this->call('key:generate');
        $bar->advance();

        // 7. Validasi koneksi database
        $this->line("\n[INFO] Validating database connection...");
        try {
            DB::purge('mysql');
            config([
                'database.connections.mysql.host' => $dbHost,
                'database.connections.mysql.port' => $dbPort,
                'database.connections.mysql.database' => $dbName,
                'database.connections.mysql.username' => $dbUser,
                'database.connections.mysql.password' => $dbPass,
            ]);
            DB::connection()->getPdo();
            $this->info("[SUCCESS] Database connection successful.");
        } catch (\Exception $e) {
            $this->error("[ERROR] Database connection failed: " . $e->getMessage());
            return;
        }
        $bar->advance();

        // 8. Backup database
        $backupDir = storage_path('backups');
        if (!File::exists($backupDir)) {
            File::makeDirectory($backupDir, 0755, true);
        }
        $backupFile = $backupDir . "/backup_" . date('Y-m-d_H-i-s') . ".sql";
        $this->line("\n[INFO] Backing up existing database...");
        exec("mysqldump -u{$dbUser} -p{$dbPass} -h{$dbHost} {$dbName} > {$backupFile}");
        $this->info("[SUCCESS] Backup saved to {$backupFile}");
        $bar->advance();

        // 9. Pilihan import
        $importOption = $this->choice(
            "\nPilih jenis import",
            ['struktur saja', 'data saja', 'struktur + data'],
            2
        );

        // Import structure
        $structureFile = public_path('backup_db/structure.sql');
        if (($importOption == 'struktur saja' || $importOption == 'struktur + data') && file_exists($structureFile)) {
            $this->line("[INFO] Importing database structure...");
            exec("mysql -u{$dbUser} -p{$dbPass} -h{$dbHost} {$dbName} < {$structureFile}");
            $this->info("[SUCCESS] Database structure imported.");
        } elseif (($importOption == 'struktur saja' || $importOption == 'struktur + data')) {
            $this->warn("[WARNING] File structure.sql tidak ditemukan");
        }
        $bar->advance();

        // Import data
        $dataFile = public_path('backup_db/data.sql');
        if (($importOption == 'data saja' || $importOption == 'struktur + data') && file_exists($dataFile)) {
            $this->line("[INFO] Importing database data...");
            exec("mysql -u{$dbUser} -p{$dbPass} -h{$dbHost} {$dbName} < {$dataFile}");
            $this->info("[SUCCESS] Database data imported.");
        } elseif (($importOption == 'data saja' || $importOption == 'struktur + data')) {
            $this->warn("[WARNING] File data.sql tidak ditemukan");
        }
        $bar->advance();

        // 10. Optimize clear
        $this->call('optimize:clear');
        $bar->advance();

        $bar->finish();

        // 11. Notifikasi suara beep
        echo "\007"; // beep di terminal

        // 12. Ringkasan akhir
        $this->info("\n\n=== Installation Completed! ===");
        $this->info("[SUMMARY]");
        $this->info("Database: {$dbName}");
        $this->info("Backup file: {$backupFile}");
        $this->info("Import option: {$importOption}");
        $this->info("Composer & Key generated, optimize cleared.");
        $this->info("[SUCCESS] Laravel 12 Webskaone siap digunakan!\n");
    }
}
