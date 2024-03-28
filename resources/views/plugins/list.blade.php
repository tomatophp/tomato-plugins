<div class="grid grid-cols-1 lg:grid-cols-3 gap-4">
    @foreach($table->resource as $itemKey => $item)
        @php $itemPrimaryKey = $table->findPrimaryKey($item) @endphp
        <div class="bg-white overflow-hidden dark:bg-gray-800 rounded-lg flex flex-col shadow-sm" >

            @if($item->placeholder !== 'placeholder.webp')
            <div class="h-40 overflow-hidden">
                <x-splade-lazy v-bind:passthrough="item">
                    <x-slot:placeholder>
                        <img src="{{url('placeholder.webp')}}" />
                    </x-slot:placeholder>

                    <img class="bg-cover bg-center" onerror="this.onerror=null; this.src='{{url('placeholder.webp')}}'" src="{{$item->placeholder}}" />
                </x-splade-lazy>
            </div>
            @else
            <div class="h-40 overflow-hidden flex flex-col rounded-t-lg justify-center items-center mb-4" style="background-color: {{$item->color}}">
                <div>
                    <i class="{{$item->icon}} bx-lg text-white"></i>
                </div>
            </div>
            @endif
            <div class="flex justifiy-between gap-4 my-2 px-4 ">
                <div class="w-full">
                    <h1 class="font-bold">{{ json_decode($item->name)->{app()->getLocale()} }}</h1>
                </div>
                <div>
                    <h1>{{ $item->version }}</h1>
                </div>
            </div>
            <div class="h-30 px-4">
                <p class="text-gray-600 dark:text-gray-300 text-sm h-30 truncate ...">
                    {{ json_decode($item->description)->{app()->getLocale()} }}
                </p>
            </div>
            <div class="flex justifiy-between gap-1 my-4 px-4 border-t border-gray-100 pt-4">
                <div class="flex justifiy-start w-full">
                    @if((bool)config('tomato-plugins.allow_generator'))
                        <x-tomato-admin-button  type="icon" href="{{route('admin.tables.index', ['module' => $item->module_name])}}" >
                            <x-tomato-admin-tooltip :text="__('Tables')">
                                <x-heroicon-s-server class="w-5 h-5" />
                            </x-tomato-admin-tooltip>
                        </x-tomato-admin-button>
                    @endif
                    @if((bool)config('tomato-plugins.allow_toggle'))
                        @if(!$item->active)
                            <x-tomato-admin-button confirm success method="POST" :data="['module' => $item->module_name]" type="icon" href="{{route('admin.plugins.update')}}" >
                                <x-tomato-admin-tooltip :text="__('Enable Plugin')">
                                    <x-heroicon-s-check-circle class="w-5 h-5" />
                                </x-tomato-admin-tooltip>
                            </x-tomato-admin-button>
                        @endif
                        @if($item->active)
                            <x-tomato-admin-button confirm-danger danger method="POST" :data="['module' => $item->module_name]" type="icon" href="{{route('admin.plugins.update')}}" >
                                <x-tomato-admin-tooltip :text="__('Disable Plugin')">
                                    <x-heroicon-s-x-circle class="w-5 h-5" />
                                </x-tomato-admin-tooltip>
                            </x-tomato-admin-button>
                        @endif
                    @endif
                    @if((bool)config('tomato-plugins.allow_destroy'))
                        <x-tomato-admin-button confirm-danger method="POST" :data="['module' => $item->module_name]" danger type="icon" href="{{route('admin.plugins.remove')}}">
                            <x-tomato-admin-tooltip :text="__('Delete Plugin')">
                                <x-heroicon-s-trash class="w-5 h-5" />
                            </x-tomato-admin-tooltip>
                        </x-tomato-admin-button>
                    @endif
                </div>
                <div class="w-full flex justify-end gap-4">
                    @if($item->github)
                        <x-tomato-admin-tooltip :text="__('Github')">
                            <a href="{{$item->github}}" target="_blank">
                                <i class="bx text-xl bxl-github text-gray-900 hover:text-gray-600 cursor-pointer"></i>
                            </a>
                        </x-tomato-admin-tooltip>
                    @endif
                    @if($item->docs)
                        <x-tomato-admin-tooltip :text="__('Docs')">
                            <a href="{{$item->docs}}" target="_blank">
                                <i class="bx text-xl bx-file text-primary-500 hover:text-gray-600 cursor-pointer"></i>
                            </a>
                        </x-tomato-admin-tooltip>
                    @endif
                </div>
            </div>
        </div>
    @endforeach
    @if((bool)config('tomato-plugins.allow_create') && $table->resource->count() == 0)
        <x-splade-link modal :href="route('admin.plugins.create')" class="h-full rounded-lg border border-dashed hover:border-solid hover:border-primary-500 border-4 border-gray-200 hover:border-none hover:bg-primary-500 text-gray-300 hover:text-white">
            <div class="flex flex-col justify-center h-full items-center py-8">
                <x-heroicon-s-plus-circle class="w-32 h-32"/>
                <h1>{{__('Add New Plugin')}}</h1>
            </div>
        </x-splade-link>
    @endif
</div>
