<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('name') }}
            {{ Form::text('name', $user->name, ['class' => 'form-control' . ($errors->has('username') ? ' is-invalid' : ''), 'placeholder' => 'Username']) }}
            {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('email') }}
            {{ Form::text('email', $user->email, ['class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : ''), 'placeholder' => 'Email']) }}
            {!! $errors->first('email', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('password') }}
            {{ Form::text('password', "", ['class' => 'form-control' . ($errors->has('password') ? ' is-invalid' : ''), 'placeholder' => 'Password']) }}
            {!! $errors->first('password', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('password confirmation') }}
            {{ Form::text('password_confirmation', "", ['class' => 'form-control' . ($errors->has('password') ? ' is-invalid' : ''), 'placeholder' => 'Password']) }}
            {!! $errors->first('password', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            <div class="form-group">
                {{ Form::label('userold_id') }}
                <select required="required" class="form-control" name="userold_id">
                    @foreach ($oldUserList as $key => $oldUser)

                        @if ($key == $user->userold_id)
                            <option value="{{ $key }}" selected>{{ $oldUser }}</option>
                        @else
                            <option value="{{ $key }}">{{ $oldUser}}</option>
                        @endif

                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group">

            Asignar rol:
            @forelse($roles as $role)
                {{ Form::label($role->name) }}
                <input type="checkbox"  id="{{$role->name}}" name="roles[]" value="{{$role->id}}" @if($user->roles->contains($role->id))
                    checked
                        @endif>
            @empty
                No hay Roles creados
            @endforelse

            {!! $errors->first('roles', '<div class="invalid-feedback">:message</div>') !!}
        </div>


    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>