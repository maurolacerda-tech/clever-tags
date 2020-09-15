{{ Form::hidden('menu_id', $menu_id) }}

<div class="row">
    <div class="col-sm-12">
        <div class="form-group">
            {{ Form::label('name', 'Nome') }}
            {{ Form::text('name', null, ['class' => $errors->has('name') ?  'form-control is-invalid' : 'form-control', 'onkeyup' => "slugGenerate(this,'Modules\\\Tags\\\Models\\\Tag')"]) }}
            @include('admin.partials._help_block',['field' => 'name'])
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-12">
        <div class="form-group">
            {{ Form::label('slug', 'URL Amigável', ['class' => 'form-label']) }} 
            {{ Form::text('slug', null, ['class' => $errors->has('slug') ?  'form-control is-invalid' : 'form-control']) }}                            
            @include('admin.partials._help_block',['field' => 'slug'])
        </div>
    </div>
</div>