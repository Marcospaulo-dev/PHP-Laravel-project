@extends('layouts.app')

@section('template_title')
    {{ $pessoa->name ?? 'Show Pessoa' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Pessoa</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('pessoas.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nome:</strong>
                            {{ $pessoa->nome }}
                        </div>
                        <div class="form-group">
                            <strong>Cpf:</strong>
                            {{ $pessoa->cpf }}
                        </div>
                        <div class="form-group">
                            <strong>Data Nascimento:</strong>
                            {{ $pessoa->data_nascimento }}
                        </div>
                        <div class="form-group">
                            <strong>Telefone:</strong>
                            {{ $pessoa->telefone }}
                        </div>
                        <div class="form-group">
                            <strong>Email:</strong>
                            {{ $pessoa->email }}
                        </div>
                        <div class="form-group">
                            <strong>Data Cadastro:</strong>
                            {{ $pessoa->created_at }}
                        </div>
                        <div class="form-group">
                            <strong>Data Alteracao:</strong>
                            {{ $pessoa->updated_at }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
