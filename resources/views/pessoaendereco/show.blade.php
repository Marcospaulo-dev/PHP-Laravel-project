@extends('layouts.app')

@section('template_title')
    {{ $pessoaendereco->name ?? 'Show Pessoaendereco' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Pessoaendereco</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('pessoaenderecos.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Cod Pessoa:</strong>
                            {{ $pessoaendereco->cod_pessoa }}
                        </div>
                        <div class="form-group">
                            <strong>Endereco:</strong>
                            {{ $pessoaendereco->endereco }}
                        </div>
                        <div class="form-group">
                            <strong>Numero Endereco:</strong>
                            {{ $pessoaendereco->numero_endereco }}
                        </div>
                        <div class="form-group">
                            <strong>Complemento:</strong>
                            {{ $pessoaendereco->complemento }}
                        </div>
                        <div class="form-group">
                            <strong>Bairro:</strong>
                            {{ $pessoaendereco->bairro }}
                        </div>
                        <div class="form-group">
                            <strong>Cidade:</strong>
                            {{ $pessoaendereco->cidade }}
                        </div>
                        <div class="form-group">
                            <strong>Uf:</strong>
                            {{ $pessoaendereco->uf }}
                        </div>
                        <div class="form-group">
                            <strong>Data Cadastro:</strong>
                            {{ $pessoaendereco->created_at }}
                        </div>
                        <div class="form-group">
                            <strong>Data Alteracao:</strong>
                            {{ $pessoaendereco->updated_at }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
