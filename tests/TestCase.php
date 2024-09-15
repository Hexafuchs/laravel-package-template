<?php

namespace Hexafuchs\Skeleton\Tests;

use Hexafuchs\Skeleton\PackageServiceProvider;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Filesystem\Filesystem;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    protected function setUp(): void
    {
        parent::setUp();

        Factory::guessFactoryNamesUsing(
            fn (string $modelName) => 'Hexafuchs\\Skeleton\\Database\\Factories\\'.class_basename($modelName).'Factory'
        );
    }

    protected function getPackageProviders($app)
    {
        return [
            PackageServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app)
    {
        config()->set('database.default', 'testing');

        // $this->backwardCompatibleDatabase();

        /*
        $migration = include __DIR__.'/../database/migrations/create_migration_table_name_table.php.stub';
        $migration->up();
        */
    }

    /**
     * RefreshDatabase, loadMigrationsFrom and In-Memory Database dont work together before this pull request
     * https://github.com/laravel/framework/pull/47912 was merged. This function replaces the in-memory database with
     * a local one in the workbench directory.
     *
     * @return void
     */
    public function backwardCompatibleDatabase()
    {
        $db = 'workbench/.testing.db';
        $filesystem = new Filesystem;
        config()->set('database.connections.testing.database', $db);

        if ($filesystem->missing($db)) {
            $filesystem->put($db, '');
        }
    }
}
