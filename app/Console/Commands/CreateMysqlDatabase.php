<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use PDO;
use PDOException;

class CreateMysqlDatabase extends Command
{
    /**
     * The name and signature of the console command.
     */
    protected $signature = 'app:create-mysql-database';

    /**
     * The console command description.
     */
    protected $description = 'Create the configured MySQL database if it does not exist yet.';

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        $database = (string) config('database.connections.mysql.database');
        $host = (string) config('database.connections.mysql.host', '127.0.0.1');
        $port = (string) config('database.connections.mysql.port', '3306');
        $username = (string) config('database.connections.mysql.username', 'root');
        $password = (string) config('database.connections.mysql.password', '');
        $charset = (string) config('database.connections.mysql.charset', 'utf8mb4');

        if ($database === '') {
            $this->error('Database name is empty. Set DB_DATABASE in .env or pass --database=.');

            return self::FAILURE;
        }

        try {
            $pdo = new PDO(
                sprintf('mysql:host=%s;port=%s;charset=%s', $host, $port, $charset),
                $username,
                $password,
                [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
            );

            $pdo->exec(sprintf('CREATE DATABASE IF NOT EXISTS `%s` CHARACTER SET %s COLLATE %s_unicode_ci', $database, $charset, $charset));

            $this->info(sprintf('MySQL database "%s" is ready.', $database));

            return self::SUCCESS;
        } catch (PDOException $exception) {
            $this->error('Failed to create the MySQL database: ' . $exception->getMessage());

            return self::FAILURE;
        }
    }
}