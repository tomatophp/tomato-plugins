<?php

namespace TomatoPHP\TomatoPlugins\Console\Packages;

use TomatoPHP\ConsoleHelpers\Traits\RunCommand;
use function \Laravel\Prompts\info;
use function Laravel\Prompts\warning;

class TomatoChat extends TomatoPackage
{
    public function __construct()
    {
        $this->label('Tomato Chat');
        $this->description('Chat Plugin to build full Audio/Video realtime chat app');
        $this->package('tomatophp/tomato-chat');
        $this->command('tomato-chat:install');
    }

    public function custom(): void
    {
        warning('please run this commands');
        warning('yarn add laravel-echo agora-rtc-sdk-ng pusher-js autosize nprogress jquery');
        warning('After installation you need to allow jquery on bootstrap.js file');
        warning('import $ from "jquery";');
        warning('window.$ = $;');
        warning('now make sure that you allow pusher connection with Echo');
        warning("
            import Echo from 'laravel-echo';

            import Pusher from 'pusher-js';
            window.Pusher = Pusher;

            window.Echo = new Echo({
                broadcaster: 'pusher',
                key: import.meta.env.VITE_PUSHER_APP_KEY,
                cluster: import.meta.env.VITE_PUSHER_APP_CLUSTER,
                wsHost: import.meta.env.VITE_PUSHER_HOST ? import.meta.env.VITE_PUSHER_HOST : 'ws-'+import.meta.env.VITE_PUSHER_APP_CLUSTER+'.pusher.com',
                wsPort: import.meta.env.VITE_PUSHER_PORT ?? 80,
                wssPort: import.meta.env.VITE_PUSHER_PORT ?? 443,
                forceTLS: (import.meta.env.VITE_PUSHER_SCHEME ?? 'https') === 'https',
                enabledTransports: ['ws', 'wss'],
            });
        ");
        warning('on your .env file please update the pusher details');
        warning('now on your app.js allow the components');
        warning("import Chat from '../../vendor/tomatophp/tomato-chat/resources/js/components/Chat.vue';");
        warning("import Video from '../../vendor/tomatophp/tomato-chat/resources/js/components/Video.vue';");
        warning("import Call from '../../vendor/tomatophp/tomato-chat/resources/js/components/Call.vue';");
        warning('.component("Chat", Chat)');
        warning('.component("Video", Video)');
        warning('.component("Call", Call)');
    }
}
