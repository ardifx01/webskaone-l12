<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

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
        $this->info("=== Install Webskaone Laravel 12 ===");

        // 1. Cek composer
        exec("composer --version", $output, $composerStatus);
        if ($composerStatus !== 0) {
            $this->error("Composer tidak ditemukan. Pastikan composer terinstall dan PATH sudah diset.");
            return;
        }

        // 2. Cek mysql
        exec("mysql --version", $output, $mysqlStatus);
        if ($mysqlStatus !== 0) {
            $this->error("MySQL client tidak ditemukan. Pastikan mysql terinstall dan PATH sudah diset.");
            return;
        }

        $steps = [
            'Membuat .env',
            'Mengatur konfigurasi database',
            'Composer install',
            'Generate application key',
            'Validasi koneksi database',
            'Import database structure',
            'Import database data',
            'Optimize clear'
        ];

        $bar = $this->output->createProgressBar(count($steps));
        $bar->start();

        // 1. Copy .env
        if (!file_exists(base_path('.env'))) {
            copy(base_path('.env.example'), base_path('.env'));
        }
        $bar->advance();

        // 2. Ask DB config
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

        // 3. Composer install
        $this->info("\nRunning composer install...");
        exec("composer install");
        $bar->advance();

        // 4. Generate key
        $this->call('key:generate');
        $bar->advance();

        // 5. Validasi koneksi database
        $this->info("\nValidating database connection...");
        try {
            DB::purge('mysql'); // reset koneksi
            config([
                'database.connections.mysql.host' => $dbHost,
                'database.connections.mysql.port' => $dbPort,
                'database.connections.mysql.database' => $dbName,
                'database.connections.mysql.username' => $dbUser,
                'database.connections.mysql.password' => $dbPass,
            ]);
            DB::connection()->getPdo();
            $this->info("Database connection successful.");
        } catch (\Exception $e) {
            $this->error("Database connection failed: " . $e->getMessage());
            return;
        }
        $bar->advance();

        // 6. Import database structure
        $structureFile = public_path('backup/struktur.sql');
        if (file_exists($structureFile)) {
            $this->info("Importing database structure...");
            exec("mysql -u{$dbUser} -p{$dbPass} -h{$dbHost} {$dbName} < {$structureFile}");
        } else {
            $this->warn("File structure.sql tidak ditemukan di public/backup_db");
        }
        $bar->advance();

        // 7. Import database data
        $dataFile = public_path('backup/data.sql');
        if (file_exists($dataFile)) {
            $this->info("Importing database data...");
            exec("mysql -u{$dbUser} -p{$dbPass} -h{$dbHost} {$dbName} < {$dataFile}");
        } else {
            $this->warn("File data.sql tidak ditemukan di public/backup_db");
        }
        $bar->advance();

        // 8. Optimize clear
        $this->call('optimize:clear');
        $bar->advance();

        $bar->finish();
        $this->info("\n=== Installation Completed! ===");
    }
}
