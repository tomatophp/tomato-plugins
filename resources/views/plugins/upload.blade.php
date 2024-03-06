<x-tomato-admin-container label="{{__('Upload New Plugin File')}}">
    <x-splade-form class="flex flex-col space-y-4" method="POST" action="{{route('admin.plugins.upload.new')}}">
        <x-splade-file filepond preview accept="zip,application/octet-stream,application/zip,application/x-zip,application/x-zip-compressed" name="module" label="Plugin ZIP file" placeholder="you can upload your plugin file here" />
        <div class="flex jusifiy-start gap-4">
            <x-tomato-admin-submit label="{{__('Upload Plugin')}}" spinner/>
        </div>
    </x-splade-form>
</x-tomato-admin-container>
