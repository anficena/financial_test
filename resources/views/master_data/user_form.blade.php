{!! Form::model($model, [
    'route' => $model->exists ? ['user.update', $model->id] : 'user.store',
    'id' => 'test-form'  
]) !!}
    <div class="row">
        <div class="col-12">
            <div class="form-group">
                <label class="form-control-label">Nama *</label>
                {!! Form::text('name',null,['class' => 'form-control', 'id' => 'name']) !!}
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="form-group">
                <label class="form-control-label">Email</label>
                {!! Form::email('email',null,['class' => 'form-control', 'id' => 'email']) !!}
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="form-group">
                <label class="form-control-label">Password</label>
                {!! Form::password('password', ['class' => 'form-control', 'id' => 'password']) !!}
            </div>
        </div>
    </div>
{!! Form::close() !!}