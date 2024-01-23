<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('name') }}
            {{ Form::text('name', $role->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Name']) }}
            {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">

            Permisos:
            @forelse($permissions as $permission)
                {{ Form::label($permission->name) }}

                <input type="checkbox"  id="{{$permission->name}}" name="permissions[]" value="{{$permission->id}}" @if($role->permissions->contains($permission->id))
                    checked
                        @endif>

            @empty
                No hay permisos creados
            @endforelse

            {!! $errors->first('permissions', '<div class="invalid-feedback">:message</div>') !!}
        </div>


    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>