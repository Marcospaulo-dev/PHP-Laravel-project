<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('cod_pessoa') }}
            {{ Form::text('cod_pessoa', $pessoaendereco->cod_pessoa, ['class' => 'form-control' . ($errors->has('cod_pessoa') ? ' is-invalid' : ''), 'placeholder' => 'Cod Pessoa']) }}
            {!! $errors->first('cod_pessoa', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('endereco') }}
            {{ Form::text('endereco', $pessoaendereco->endereco, ['class' => 'form-control' . ($errors->has('endereco') ? ' is-invalid' : ''), 'placeholder' => 'Endereco']) }}
            {!! $errors->first('endereco', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('numero_endereco') }}
            {{ Form::text('numero_endereco', $pessoaendereco->numero_endereco, ['class' => 'form-control' . ($errors->has('numero_endereco') ? ' is-invalid' : ''), 'placeholder' => 'Numero Endereco']) }}
            {!! $errors->first('numero_endereco', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('complemento') }}
            {{ Form::text('complemento', $pessoaendereco->complemento, ['class' => 'form-control' . ($errors->has('complemento') ? ' is-invalid' : ''), 'placeholder' => 'Complemento']) }}
            {!! $errors->first('complemento', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('bairro') }}
            {{ Form::text('bairro', $pessoaendereco->bairro, ['class' => 'form-control' . ($errors->has('bairro') ? ' is-invalid' : ''), 'placeholder' => 'Bairro']) }}
            {!! $errors->first('bairro', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('cidade') }}
            {{ Form::text('cidade', $pessoaendereco->cidade, ['class' => 'form-control' . ($errors->has('cidade') ? ' is-invalid' : ''), 'placeholder' => 'Cidade']) }}
            {!! $errors->first('cidade', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('uf') }}
            {{ Form::text('uf', $pessoaendereco->uf, ['class' => 'form-control' . ($errors->has('uf') ? ' is-invalid' : ''), 'placeholder' => 'Uf']) }}
            {!! $errors->first('uf', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>