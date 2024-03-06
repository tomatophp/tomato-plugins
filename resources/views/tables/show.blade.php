<x-tomato-admin-container label="{{trans('tomato-admin::global.crud.view')}} {{__('Table')}} #{{$model->id}}">
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">

          <x-tomato-admin-row :label="__('Module')" :value="$model->module" type="string" />

          <x-tomato-admin-row :label="__('Name')" :value="$model->name" type="string" />

          <x-tomato-admin-row :label="__('Comment')" :value="$model->comment" type="string" />

          <x-tomato-admin-row :label="__('Timestamps')" :value="$model->timestamps" type="bool" />

          <x-tomato-admin-row :label="__('Soft deletes')" :value="$model->soft_deletes" type="bool" />

          <x-tomato-admin-row :label="__('Migrated')" :value="$model->migrated" type="bool" />

          <x-tomato-admin-row :label="__('Generated')" :value="$model->generated" type="bool" />

    </div>
    <div class="flex justify-start gap-2 pt-3">
        <x-tomato-admin-button warning label="{{__('Edit')}}" :href="route('admin.tables.edit', $model->id)"/>
        <x-tomato-admin-button danger :href="route('admin.tables.destroy', $model->id)"
                               confirm="{{trans('tomato-admin::global.crud.delete-confirm')}}"
                               confirm-text="{{trans('tomato-admin::global.crud.delete-confirm-text')}}"
                               confirm-button="{{trans('tomato-admin::global.crud.delete-confirm-button')}}"
                               cancel-button="{{trans('tomato-admin::global.crud.delete-confirm-cancel-button')}}"
                               method="delete"  label="{{__('Delete')}}" />
        <x-tomato-admin-button secondary :href="route('admin.tables.index').'?module='.$model->module" label="{{__('Cancel')}}"/>
    </div>
</x-tomato-admin-container>
