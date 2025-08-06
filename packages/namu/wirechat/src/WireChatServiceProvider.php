<?php

namespace Namu\WireChat;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;
use Namu\WireChat\Console\Commands\InstallWireChat;
use Namu\WireChat\Livewire\Chat\Chat;
use Namu\WireChat\Livewire\Chat\Chats;
use Namu\WireChat\Livewire\Chat\Index;
use Namu\WireChat\Livewire\Chat\View;
use Namu\WireChat\Livewire\Components\NewChat;
use Namu\WireChat\Livewire\Components\NewGroup;
use Namu\WireChat\Livewire\Group\Permissions;
use Namu\WireChat\Livewire\Info\AddMembers;
use Namu\WireChat\Livewire\Info\Info;
use Namu\WireChat\Livewire\Info\Members;
use Namu\WireChat\Livewire\Modals\ChatDialog;
use Namu\WireChat\Livewire\Modals\ChatDrawer;
use Namu\WireChat\Services\WireChatService;
use Namu\WireChat\View\Components\ChatBox\Image;

class WireChatServiceProvider extends ServiceProvider
{
    public function boot()
    {

        // Register the command if we are using the application via the CLI
        if ($this->app->runningInConsole()) {
            $this->commands([
                InstallWireChat::class,
            ]);
        }

        $this->loadLivewireComponents();

        Blade::component('wirechat::chatbox.image', Image::class);

        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'wirechat');

        $this->publishes([
            __DIR__.'/../config/wirechat.php' => config_path('wirechat.php'),
        ], 'wirechat-config');

        //!for seamless devlopement loadmigrateions directly instead of publishing in development
        //only publish in production

        $this->publishes([
            __DIR__.'/../database/migrations' => database_path('migrations'),
        ], 'wirechat-migrations');

        /* Load channel routes */
        $this->loadRoutesFrom(__DIR__.'/../routes/channels.php');
        // Load the package's channels.php file
        // require __DIR__ . '/../routes/channels.php';

    }

    //custom methods for livewire components
    protected function loadLivewireComponents()
    {
        Livewire::component('index', Index::class);
        Livewire::component('view', View::class);

        Livewire::component('chat', Chat::class);
        Livewire::component('chats', Chats::class);

        //wirechat  modal
        Livewire::component('chat-dialog', ChatDialog::class);
        Livewire::component('chat-drawer', ChatDrawer::class);

        Livewire::component('new-chat', NewChat::class);

        //Group related components
        Livewire::component('new-group', NewGroup::class);
        Livewire::component('info', Info::class);
        Livewire::component('add-members', AddMembers::class);
        Livewire::component('members', Members::class);
        Livewire::component('permissions', Permissions::class);

    }

    public function register()
    {

        $this->mergeConfigFrom(
            __DIR__.'/../config/wirechat.php', 'wirechat'
        );

        //register facades
        $this->app->singleton('wirechat', function ($app) {
            return new WireChatService;
        });

        //      $this->app->register(LivewireModalServiceProvider::class);

    }
}
