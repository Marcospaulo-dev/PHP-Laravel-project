<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('nome') }}
            {{ Form::text('nome', $pessoa->nome, ['class' => 'form-control' . ($errors->has('nome') ? ' is-invalid' : ''), 'placeholder' => 'Nome']) }}
            {!! $errors->first('nome', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('cpf') }}
            {{ Form::text('cpf', $pessoa->cpf, ['class' => 'form-control' . ($errors->has('cpf') ? ' is-invalid' : ''), 'placeholder' => 'Cpf']) }}
            {!! $errors->first('cpf', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('data_nascimento') }}
            {{ Form::text('data_nascimento', $pessoa->data_nascimento, ['class' => 'form-control' . ($errors->has('data_nascimento') ? ' is-invalid' : ''), 'placeholder' => 'Data Nascimento']) }}
            {!! $errors->first('data_nascimento', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('telefone') }}
            {{ Form::text('telefone', $pessoa->telefone, ['class' => 'form-control' . ($errors->has('telefone') ? ' is-invalid' : ''), 'placeholder' => 'Telefone']) }}
            {!! $errors->first('telefone', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('email') }}
            {{ Form::text('email', $pessoa->email, ['class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : ''), 'placeholder' => 'Email']) }}
            {!! $errors->first('email', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>