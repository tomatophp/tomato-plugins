<x-tomato-admin-layout>
    <x-slot:header>
        {{ trans('tomato-plugins::messages.index') }}
    </x-slot:header>
    <x-slot:buttons>
{{--        <x-tomato-admin-button :modal="true" :href="route('admin.plugins.upload')" type="link">--}}
{{--            {{trans('tomato-plugins::messages.upload')}}--}}
{{--        </x-tomato-admin-button>--}}
        <x-tomato-admin-button :href="route('admin.plugins.clear')" type="link">
            {{trans('tomato-plugins::messages.clear')}}
        </x-tomato-admin-button>
    </x-slot:buttons>

    <div class="pb-12">
        <div class="mx-auto">
            <x-splade-defer url="{{url('admin/plugins/api')}}">
                <p v-show="processing">{{__('Loading plugins from composer...')}}</p>
                <div v-if="response.data" class="grid grid-cols-2 gap-4">
                    <div class="bg-white rounded-lg p-4 flex flex-col" v-for="(item, key) in response.data" :key="key" :class="{
                        'border border-success-500': item.installed,
                        'border border-warning-500': item.outdate,
                        'border': !item.installed && !item.outdate
                    }">
                        <div class="flex justifiy-between gap-4 my-2">
                            <div class="w-full">
                                <h1 class="font-bold">@{{ item.name }}</h1>
                            </div>
                            <div>
                                <h1>@{{ item.version }}</h1>
                            </div>
                        </div>
                        <div class="h-30">
                            <p class="text-gray-600 text-sm h-30 truncate ...">
                                @{{ item.description }}
                            </p>
                        </div>
                        <div class="flex justifiy-center gap-1 my-4">
                            <x-tomato-admin-button warning type="icon" v-bind:href="'{{url('admin/plugins/show?package=')}}'+item.full_name" modal :title="__('Show')">
                                <x-heroicon-s-eye class="w-5 h-5" />
                            </x-tomato-admin-button>
{{--                            <x-tomato-admin-button v-if="item.installed && item.outdate" method="POST" data="`{package: ${item.full_name}}`" success type="icon" href="{{url('admin/plugins/update')}}" :title="__('Update')">--}}
{{--                                <x-heroicon-s-arrow-path class="w-5 h-5" />--}}
{{--                            </x-tomato-admin-button>--}}
{{--                            <x-tomato-admin-button v-if="!item.installed" success type="icon" method="POST" v-bind:data="{package: item.full_name}" href="{{url('admin/plugins/install')}}" :title="__('Install')">--}}
{{--                                <x-heroicon-s-arrow-down-circle class="w-5 h-5" />--}}
{{--                            </x-tomato-admin-button>--}}
{{--                            <x-tomato-admin-button v-if="item.installed" danger type="icon" v-bind:href="'{{url('admin/plugins')}}/' + item.full_name + '/remove'" :title="__('Remove')">--}}
{{--                                <x-heroicon-s-x-circle class="w-5 h-5" />--}}
{{--                            </x-tomato-admin-button>--}}
                        </div>
                    </div>
                </div>
            </x-splade-defer>
        </div>
    </div>
</x-tomato-admin-layout>
