<x-tomato-admin-container label="{{__('Table Generator')}}">
    <x-splade-form :default="[
        'form_type' => 'module'
    ]"  class="flex flex-col gap-4" action="{{route('admin.tables.generate', $model->id)}}" method="post">
        <div class="grid grid-cols-3 gap-4">
            @if(!$model->migrated)
                <button @click.prevent="form.form_type = 'migrations'; form.submit()" class="hover:bg-green-500 hover:text-white p-4 rounded-lg shadow-sm border border-gray-200 flex flex-col gap-4 items-center justify-center">
                    <i class="bx bx-data bx-md"></i>
                    <div class="text-sm text-center">{{__('Generate Migration')}}</div>
                </button>
                <button @click.prevent="form.form_type = 'migrate'; form.submit()" class="hover:bg-green-500 hover:text-white p-4 rounded-lg shadow-sm border border-gray-200 flex flex-col gap-4 items-center justify-center">
                    <i class="bx bx-code bx-md"></i>
                    <div class="text-sm text-center">{{__('Run Migrate')}}</div>
                </button>
            @endif
            <button @click.prevent="form.form_type = 'crud'; form.submit()" class="hover:bg-green-500 hover:text-white p-4 rounded-lg shadow-sm border border-gray-200 flex flex-col gap-4 items-center justify-center">
                <i class="bx bx-window bx-md"></i>
                <div class="text-sm text-center">{{__('Generate CRUD')}}</div>
            </button>
            <button @click.prevent="form.form_type = 'models'; form.submit()" class="hover:bg-green-500 hover:text-white p-4 rounded-lg shadow-sm border border-gray-200 flex flex-col gap-4 items-center justify-center">
                <i class="bx bx-math bx-md"></i>
                <div class="text-sm text-center">{{__('Generate Models')}}</div>
            </button>
            <button @click.prevent="form.form_type = 'controllers'; form.submit()" class="hover:bg-green-500 hover:text-white p-4 rounded-lg shadow-sm border border-gray-200 flex flex-col gap-4 items-center justify-center">
                <i class="bx bx-cheese bx-md"></i>
                <div class="text-sm text-center">{{__('Generate Controllers')}}</div>
            </button>
            <button @click.prevent="form.form_type = 'form-request'; form.submit()" class="hover:bg-green-500 hover:text-white p-4 rounded-lg shadow-sm border border-gray-200 flex flex-col gap-4 items-center justify-center">
                <i class="bx bx-check-circle bx-md"></i>
                <div class="text-sm text-center">{{__('Generate Form Request')}}</div>
            </button>
            <button @click.prevent="form.form_type = 'json-resource'; form.submit()" class="hover:bg-green-500 hover:text-white p-4 rounded-lg shadow-sm border border-gray-200 flex flex-col gap-4 items-center justify-center">
                <i class="bx bxs-file-json bx-md"></i>
                <div class="text-sm text-center">{{__('Generate JSON Resource')}}</div>
            </button>
            <button @click.prevent="form.form_type = 'views'; form.submit()" class="hover:bg-green-500 hover:text-white p-4 rounded-lg shadow-sm border border-gray-200 flex flex-col gap-4 items-center justify-center">
                <i class="bx bx-show bx-md"></i>
                <div class="text-sm text-center">{{__('Generate Views')}}</div>
            </button>
            <button @click.prevent="form.form_type = 'tables'; form.submit()" class="hover:bg-green-500 hover:text-white p-4 rounded-lg shadow-sm border border-gray-200 flex flex-col gap-4 items-center justify-center">
                <i class="bx bx-table bx-md"></i>
                <div class="text-sm text-center">{{__('Generate Tables')}}</div>
            </button>
            <button @click.prevent="form.form_type = 'routes'; form.submit()" class="hover:bg-green-500 hover:text-white p-4 rounded-lg shadow-sm border border-gray-200 flex flex-col gap-4 items-center justify-center">
                <i class="bx bx-globe bx-md"></i>
                <div class="text-sm text-center">{{__('Generate Routes')}}</div>
            </button>
            <button @click.prevent="form.form_type = 'api-routes'; form.submit()" class="hover:bg-green-500 hover:text-white p-4 rounded-lg shadow-sm border border-gray-200 flex flex-col gap-4 items-center justify-center">
                <i class="bx bxl-graphql bx-md"></i>
                <div class="text-sm text-center">{{__('Generate API Routes')}}</div>
            </button>
                <button @click.prevent="form.form_type = 'menu'; form.submit()" class="hover:bg-green-500 hover:text-white p-4 rounded-lg shadow-sm border border-gray-200 flex flex-col gap-4 items-center justify-center">
                    <i class="bx bx-menu bx-md"></i>
                    <div class="text-sm text-center">{{__('Generate Menu')}}</div>
                </button>
{{--            <button @click.prevent="form.form_type = 'flutter-app'; form.submit()" class="hover:bg-green-500 hover:text-white p-4 rounded-lg shadow-sm border border-gray-200 flex flex-col gap-4 items-center justify-center">--}}
{{--                <i class="bx bx-phone bx-md"></i>--}}
{{--                <div class="text-sm text-center">{{__('Generate Flutter App')}}</div>--}}
{{--            </button>--}}
{{--            <button @click.prevent="form.form_type = 'flutter-module'; form.submit()" class="hover:bg-green-500 hover:text-white p-4 rounded-lg shadow-sm border border-gray-200 flex flex-col gap-4 items-center justify-center">--}}
{{--                <i class="bx bx-category bx-md"></i>--}}
{{--                <div class="text-sm text-center">{{__('Generate Flutter Module')}}</div>--}}
{{--            </button>--}}
{{--            <button @click.prevent="form.form_type = 'flutter-crud'; form.submit()" class="hover:bg-green-500 hover:text-white p-4 rounded-lg shadow-sm border border-gray-200 flex flex-col gap-4 items-center justify-center">--}}
{{--                <i class="bx bxs-phone-call bx-md"></i>--}}
{{--                <div class="text-sm text-center">{{__('Generate Flutter CRUD')}}</div>--}}
{{--            </button>--}}
        </div>

        <div class="flex justify-start gap-2 pt-3">
            <x-tomato-admin-button secondary :href="route('admin.plugins.index')" label="{{__('Cancel')}}"/>
        </div>
    </x-splade-form>
</x-tomato-admin-container>
