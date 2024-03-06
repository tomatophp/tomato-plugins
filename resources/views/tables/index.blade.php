<x-tomato-admin-layout>
    <x-slot:header>
        {{ __('Tables') }}
    </x-slot:header>
    <x-slot:buttons>
        <x-tomato-admin-button warning :href="route('admin.plugins.index')" type="link">
            {{__('Back')}}
        </x-tomato-admin-button>
        <x-tomato-admin-button :href="route('admin.tables.create').'?module=' . request()->get('module')" type="link">
            {{trans('tomato-admin::global.crud.create-new')}} {{__('Table')}}
        </x-tomato-admin-button>
    </x-slot:buttons>

    <div class="pb-12">
        <div class="mx-auto">
            <x-splade-table :for="$table" striped>
                <x-splade-cell timestamps>
                    <x-tomato-admin-row table type="bool" :value="$item->timestamps" />
                </x-splade-cell>
                <x-splade-cell soft_deletes>
                    <x-tomato-admin-row table type="bool" :value="$item->soft_deletes" />
                </x-splade-cell>
                <x-splade-cell migrated>
                    <x-tomato-admin-row table type="bool" :value="$item->migrated" />
                </x-splade-cell>
                <x-splade-cell generated>
                    <x-tomato-admin-row table type="bool" :value="$item->generated" />
                </x-splade-cell>

                <x-splade-cell actions>
                    <div class="flex justify-start">
                        <x-tomato-admin-button warning type="icon" title="{{__('Generate')}}" modal :href="route('admin.tables.generator', $item->id)">
                            <x-tomato-admin-tooltip text="{{__('Generate')}}">
                                <x-heroicon-s-viewfinder-circle class="h-6 w-6"/>
                            </x-tomato-admin-tooltip>
                        </x-tomato-admin-button>
                        <x-tomato-admin-button success type="icon" title="{{trans('tomato-admin::global.crud.view')}}" modal :href="route('admin.tables.show', $item->id)">
                            <x-heroicon-s-eye class="h-6 w-6"/>
                        </x-tomato-admin-button>
                        <x-tomato-admin-button warning type="icon" title="{{trans('tomato-admin::global.crud.edit')}}" :href="route('admin.tables.edit', $item->id)">
                            <x-heroicon-s-pencil class="h-6 w-6"/>
                        </x-tomato-admin-button>
                        <x-tomato-admin-button danger type="icon" title="{{trans('tomato-admin::global.crud.delete')}}" :href="route('admin.tables.destroy', $item->id)"
                           confirm="{{trans('tomato-admin::global.crud.delete-confirm')}}"
                           confirm-text="{{trans('tomato-admin::global.crud.delete-confirm-text')}}"
                           confirm-button="{{trans('tomato-admin::global.crud.delete-confirm-button')}}"
                           cancel-button="{{trans('tomato-admin::global.crud.delete-confirm-cancel-button')}}"
                           method="delete"
                        >
                            <x-heroicon-s-trash class="h-6 w-6"/>
                        </x-tomato-admin-button>
                    </div>
                </x-splade-cell>
            </x-splade-table>
        </div>
    </div>
</x-tomato-admin-layout>
