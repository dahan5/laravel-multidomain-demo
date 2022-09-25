<?php

namespace Deployer;

require 'recipe/laravel.php';
require 'contrib/npm.php';

// Config
set('repository', 'git@github.com:foxws/laravel-multidomain-demo.git');

// Hosts
host('production')
    ->setHostname('example.com')
    ->setRemoteUser('forge')
    ->setDeployPath('/home/forge/example.com');

// Tasks
task('build', function () {
    cd('{{release_path}}');
    run('npm install');
    run('npm run build');
    run('php artisan app:update');
    run('php artisan app:sync');
});

// Hooks
before('deploy:symlink', 'build');
after('deploy:failed', 'deploy:unlock');
