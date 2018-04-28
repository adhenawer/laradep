<?php
namespace Deployer;

require 'recipe/laravel.php';

// Project name
set('application', 'laradep');

// Project repository
set('repository', 'git@gitlab.com:adhenawer/laradep.git');

// Hosts

host('159.89.184.227')
    ->user('deployer')
    ->identityFile('~/.ssh/deployerkey')
    ->set('deploy_path', '/var/www/html/laradep');    
    
// Tasks

task('build', function () {
    run('cd {{release_path}} && build');
});

// Migrate database before symlink new release.
#before('deploy:symlink', 'artisan:migrate');

