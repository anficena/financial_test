{!! Form::model($model, [
    'route' => $model->exists ? ['category.update', $model->id] : 'category.store',
    'id' => 'test-form'  
]) !!}
    <div class="row">
        <div class="col-12">
            <div class="form-group">
                {!! Form::label('type', 'Kategori', ['class' => 'form-control-label']) !!}
                {!! Form::select('type', $kategori,null,['class' => 'form-control selectpicker', 'id' => 'type', 'placeholder' => '--- Pilih Kategori ---', 'required']) !!}
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="form-group">
                {!! Form::label('name', 'Nama', ['class' => 'form-control-label']) !!}
                {!! Form::text('name',null,['class' => 'form-control', 'id' => 'name']) !!}
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="form-group">
                {!! Form::label('description', 'Deskripsi', ['class' => 'form-control-label']) !!}
                {!! Form::textarea('description', null, ['class' => 'form-control', 'id' => 'description' , 'rows' => '5']) !!}
            </div>
        </div>
    </div>
{!! Form::close() !!}