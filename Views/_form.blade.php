{{ Form::hidden('menu_id', $menu_id) }}

<div class="row">
    <div class="col-sm-12">
        <div class="form-group">
            {{ Form::label('name', 'Nome') }}
            {{ Form::text('name', null, ['class' => $errors->has('name') ?  'form-control is-invalid' : 'form-control']) }}
            @include('admin.partials._help_block',['field' => 'name'])
        </div>
    </div>
</div>