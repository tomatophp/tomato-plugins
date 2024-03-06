<x-tomato-admin-container label="{{__('Create Plugin')}}">
    <x-splade-form  class="flex flex-col gap-4" action="{{route('admin.plugins.store')}}" method="post">
        <x-splade-input name="name" label="{{__('Name')}}" placeholder="{{__('Name')}}" />
        <x-splade-textarea name="description" label="{{__('Description')}}" placeholder="{{__('Description')}}" />
        <div class="flex justifiy-between gap-4 col-span-2">
            <x-tomato-admin-icon class="w-full" label="{{__('Icon')}}" name="icon"  placeholder="{{__('Icon')}}" />
            <x-tomato-admin-color label="{{__('Color')}}" name="color"  placeholder="{{__('Color')}}" />
        </div>

        <div class="flex justify-start gap-2 pt-3">
            <x-tomato-admin-submit  label="{{__('Save')}}" :spinner="true" />
            <x-tomato-admin-button secondary :href="route('admin.plugins.index')" label="{{__('Cancel')}}"/>
        </div>
    </x-splade-form>
</x-tomato-admin-container>
