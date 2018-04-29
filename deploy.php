<?php
namespace Deployer;

require 'recipe/laravel.php';

// Project name
set('application', 'laradep');

// Project repository
set('repository', 'git@gitlab.com:adhenawer/laradep.git');

// Hosts
// Digital Ocean
host('159.89.184.227')
    ->stage('digital-ocean')
    ->user('deployer')
    ->identityFile('~/.ssh/deployerkey')
    ->set('deploy_path', '/var/www/html/laradep');

// Google Cloud Platform
host('35.231.28.88')
    ->stage('google-cloud-platform')
    ->user('deployer')
    ->identityFile('~/.ssh/deployerkey')
    ->set('deploy_path', '/var/www/html/laradep');

// Digital Ocean + Google Cloud Platform
// host('159.89.184.227', '35.231.28.88')
//     ->stage('all')
//     ->user('deployer')
//     ->identityFile('~/.ssh/deployerkey')
//     ->set('deploy_path', '/var/www/html/laradep');

// Tasks
task('build', function () {
    run('cd {{release_path}} && build');
});

// Migrate database before symlink new release.
#before('deploy:symlink', 'artisan:migrate');

