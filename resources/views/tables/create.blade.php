<x-tomato-admin-container label="{{trans('tomato-admin::global.crud.create')}} {{__('Table')}}">
    <x-splade-form  :default="[
    'module' => request('module'),
    'cols' => [
        [
            'name' => 'id',
            'type' => 'bigint',
            'length' => '11',
            'nullable' => false,
            'primary' => true,
            'auto_increment' => true,
            'unsigned' => true,
        ]
    ]
]" class="flex flex-col space-y-4" action="{{route('admin.tables.store')}}" method="post">
        <x-splade-input type="text" name="name" label="{{__('Table Name')}}" placeholder="{{__('Table Name')}}"/>
        <x-tomato-admin-repeater :label="__('Columns')" name="cols" :options="['name', 'type', 'length', 'nullable']">
            <div class="flex justify-between gap-4">
                <x-splade-input class="w-full" v-model="repeater.main[key].name" type="text" label="{{__('Column Name')}}" placeholder="{{__('Column Name')}}" required/>
                <x-splade-select class="w-full" v-model="repeater.main[key].type" label="{{__('Column Type')}}" placeholder="{{__('Column Type')}}" required>
                    <option value="int">int</option>
                    <option value="string">varchar</option>
                    <option value="bigint">bigint</option>
                    <option value="boolean">boolean</option>
                    <option value="text">text</option>
                    <option value="longText">longText</option>
                    <option value="char">char</option>
                    <option value="flot">flot</option>
                    <option value="double">double</option>
                    <option value="json">json</option>
                    <option value="enum">enum</option>
                    <option value="jsonb">jsonb</option>
                    <option value="date">date</option>
                    <option value="time">time</option>
                    <option value="datetime">datetime</option>
                    <option value="timestamps">timestamps</option>
                </x-splade-select>
                <x-splade-input class="w-full" type="text" v-model="repeater.main[key].default" label="{{__('Default')}}" placeholder="{{__('Default')}}"/>
                <x-splade-input class="w-full"  type="number" v-model="repeater.main[key].length" label="{{__('Length')}}" placeholder="{{__('Length')}}"/>
            </div>
            <div class="flex justify-start gap-4 mt-4">
                <x-splade-checkbox v-model="repeater.main[key].nullable" label="{{__('Nullable')}}" />
                <x-splade-checkbox v-model="repeater.main[key].index" label="{{__('Index')}}" />
                <x-splade-checkbox v-model="repeater.main[key].auto_increment" label="{{__('Auto Increment')}}" />
                <x-splade-checkbox v-model="repeater.main[key].primary"  label="{{__('Primary')}}" />
                <x-splade-checkbox v-model="repeater.main[key].unique"  label="{{__('Unique')}}" />
                <x-splade-checkbox v-model="repeater.main[key].unsigned"  label="{{__('Unsigned')}}" />
                <x-splade-checkbox v-model="repeater.main[key].foreign"  label="{{__('Foreign Key')}}" />
            </div>
            <div v-if="repeater.main[key].foreign" class="mt-4 flex flex-col gap-4">
                <x-splade-input type="text" v-model="repeater.main[key].foreign_table" label="{{__('Foreign Table')}}" placeholder="{{__('Foreign Table')}}"/>
                <x-splade-input type="text" v-model="repeater.main[key].foreign_col" label="{{__('Foreign Column')}}" placeholder="{{__('Foreign Column')}}"/>
                <x-splade-checkbox v-model="repeater.main[key].foreign_on_delete_cascade" label="{{__('On Delete Cascade')}}"/>
            </div>
        </x-tomato-admin-repeater>

        <x-splade-checkbox name="timestamps" label="{{__('Timestamps')}}" />
        <x-splade-checkbox name="soft_deletes" label="{{__('Soft Deletes')}}" />

        <div class="flex justify-start gap-2 pt-3">
            <x-tomato-admin-submit  label="{{__('Save')}}" :spinner="true" />
            <x-tomato-admin-button secondary :href="route('admin.tables.index').'?module='.$module" label="{{__('Cancel')}}"/>
        </div>
    </x-splade-form>
</x-tomato-admin-container>
