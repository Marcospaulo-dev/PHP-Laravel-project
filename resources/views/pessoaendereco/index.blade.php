@extends('layouts.app')

@section('template_title')
    Pessoaendereco
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Enderecos cadastrados') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('pessoaenderecos.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
										<th>Cod Pessoa</th>
										<th>Endereco</th>
										<th>Numero Endereco</th>
										<th>Complemento</th>
										<th>Bairro</th>
										<th>Cidade</th>
										<th>Uf</th>
                                        <th>Data Cadastro</th>
                                        <th>Data Alteracao</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pessoaenderecos as $pessoaendereco)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $pessoaendereco->cod_pessoa }}</td>
											<td>{{ $pessoaendereco->endereco }}</td>
											<td>{{ $pessoaendereco->numero_endereco }}</td>
											<td>{{ $pessoaendereco->complemento }}</td>
											<td>{{ $pessoaendereco->bairro }}</td>
											<td>{{ $pessoaendereco->cidade }}</td>
											<td>{{ $pessoaendereco->uf }}</td>
                                            <td>{{ $pessoaendereco->created_at }}</td>
                                            <td>{{ $pessoaendereco->updated_at }}</td>

                                            <td>
                                                <form action="{{ route('pessoaenderecos.destroy',$pessoaendereco->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('pessoaenderecos.show',$pessoaendereco->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('pessoaenderecos.edit',$pessoaendereco->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $pessoaenderecos->links() !!}
            </div>
        </div>
        <?php
        $con = mysqli_connect("localhost", "root", "admin", "tapagodb");
        $limit = 2;
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        $start = ($page -1) * $limit;
        $result = $con->query("SELECT * FROM tapagodb.pessoaenderecos LIMIT $start, $limit");
        $pessoas = $result->fetch_all(MYSQLI_ASSOC);

        $result1 = $con->query("SELECT count(id) AS id FROM tapagodb.pessoaenderecos LIMIT $start, $limit");
        $pessoasCount = $result1->fetch_all(MYSQLI_ASSOC);
        $total = $pessoasCount[0]['id'];
        $pages = ceil($total / $limit);

        $Previous = $page - 1;
        $Next = $page + 1;

    ?>      
    <nav aria-label="Page navigation example">
        <ul class="pagination">
            <li class="page-item"><a class="page-link" href="pessoaenderecos.php?page=<?= $Previous; ?>">Previous</a></li>
            <?php for($i = 1; $i<= $pages; $i++) : ?>
            <li class="page-item"><a class="page-link" href="pessoaenderecos.php?page=<?= $i; ?>"><?= $i; ?></a></li>
            <?php endfor; ?>
            <li class="page-item"><a class="page-link" href="pessoaenderecos.php?page=<?= $Next; ?>">Next</a></li>
            
        </ul>
    </nav>
    </div>
@endsection
