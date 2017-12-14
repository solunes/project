<?php

namespace Solunes\Project;

use Illuminate\Support\ServiceProvider;

class ProjectServiceProvider extends ServiceProvider {

    protected $defer = false;

    public function boot() {
        /* Publicar Elementos */
        $this->publishes([
            __DIR__ . '/config' => config_path()
        ], 'config');
        $this->publishes([
            __DIR__.'/assets' => public_path('assets/project'),
        ], 'assets');

        /* Cargar Traducciones */
        $this->loadTranslationsFrom(__DIR__.'/lang', 'project');

        /* Cargar Vistas */
        $this->loadViewsFrom(__DIR__ . '/views', 'project');
    }


    public function register() {
        /* Registrar ServiceProvider Internos */
        //$this->app->register('Collective\Html\HtmlServiceProvider');

        /* Registrar Alias */
        $loader = \Illuminate\Foundation\AliasLoader::getInstance();
        //$loader->alias('HTML', 'Collective\Html\HtmlFacade');

        $loader->alias('Project', '\Solunes\Project\App\Helpers\Project');
        $loader->alias('CustomProject', '\Solunes\Project\App\Helpers\CustomProject');

        /* Comandos de Consola */
        $this->commands([
            //\Solunes\Project\App\Console\AccountCheck::class,
        ]);

        $this->mergeConfigFrom(
            __DIR__ . '/config/project.php', 'project'
        );
    }
    
}
