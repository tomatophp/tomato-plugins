<x-tomato-admin-layout>
    <x-slot:header>
        {{ trans('tomato-plugins::messages.index') }}
    </x-slot:header>
    <x-slot:buttons>
        @if((bool)config('tomato-plugins.allow_create'))
        <x-tomato-admin-button :modal="true" :href="route('admin.plugins.create')" type="link">
            {{__('Create Plugin')}}
        </x-tomato-admin-button>
        @endif
        @if((bool)config('tomato-plugins.allow_upload') )
        <x-tomato-admin-button :modal="true" :href="route('admin.plugins.upload')" type="link">
            {{__('Upload Plugin')}}
        </x-tomato-admin-button>
        @endif
    </x-slot:buttons>

    <div class="pb-12">
        <div class="mx-auto">
            <x-splade-table :for="$table" custom-body custom-body-view="tomato-plugins::plugins.list">

            </x-splade-table>
        </div>
    </div>
</x-tomato-admin-layout>
