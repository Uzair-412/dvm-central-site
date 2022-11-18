<div class="btn-group" role="group" aria-label="Button group with nested dropdown">
    <a class="btn btn-primary btn-sm" href="{{ route('admin.product.edit', $row->id) }}"><i class="fa fa-pencil-alt"></i></a>
    <div class="btn-group" role="group">
        <button id="btnGroupDrop1" type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
        <div class="dropdown-menu valid-feedback w-auto h6" aria-labelledby="btnGroupDrop1" style="transform: translate(-156px, 25px) !important;">
            <x-utils.edit-basic :href="route('admin.product.edit', $model)" />
            <x-utils.edit-details :href="route('admin.product.edit.details', $model)" />
            <x-utils.edit-files :href="route('admin.product.edit.files', $model)" />
            @if($row->type == 'variation')
                <x-utils.edit-variations :href="route('admin.product.edit.variations', $model)" />
            @endif
        </div>
    </div>
</div>
<x-utils.delete-button :href="route('admin.product.destroy', $model)" />