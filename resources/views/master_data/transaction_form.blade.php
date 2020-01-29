{!! Form::model($model, [
    'route' => $model->exists ? ['transaction.update', $model->id] : 'transaction.store',
    'id' => 'test-form'  
]) !!}
    <div class="row">
        <div class="col-12">
            <div class="form-group">
                {!! Form::label('type', 'Jenis Transaksi', ['class' => 'form-control-label']) !!}
                @if($model->exists)
                {!! Form::select('type', $transaksi,$model->category->type,['class' => 'form-control selectpicker', 'id' => 'type_transaction', 'placeholder' => '--- Pilih Transaksi ---', 'required']) !!}
                @else
                {!! Form::select('type', $transaksi,null,['class' => 'form-control selectpicker', 'id' => 'type_transaction', 'placeholder' => '--- Pilih Transaksi ---', 'required']) !!}
                @endif
                <input type="hidden" value="{{ route('list.category', 'type') }}" id="route-category"/>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="form-group">
                <!-- <span id="status-category" class="text-info">Waiting...</span><br/> -->
                {!! Form::label('category_id', 'Kategori', ['class' => 'form-control-label']) !!}
                @if($model->exists)
                {!! Form::select('category_id', $kategori, $model->category_id, ['class' => 'form-control selectpicker', 'id' => 'category_id', 'placeholder' => '--- Pilih Kategori ---', 'required']) !!}
                @else
                {!! Form::select('category_id', [], null, ['class' => 'form-control selectpicker', 'id' => 'category_id', 'placeholder' => '--- Pilih Kategori ---', 'required']) !!}
                @endif
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="form-group">
                {!! Form::label('date', 'Tanggal', ['class' => 'form-control-label']) !!}
                {!! Form::date('date', \Carbon\Carbon::now(), ['class' => 'form-control', 'id' => 'date']) !!}
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="form-group">
                {!! Form::label('nominal', 'Nominal', ['class' => 'form-control-label']) !!}
                {!! Form::number('nominal',null,['class' => 'form-control', 'id' => 'nominal']) !!}
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