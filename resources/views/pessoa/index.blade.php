@extends('layouts.app')

@section('template_title')
    Pessoa
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Pessoas Cadastradas') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('pessoas.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                        <div class="row">
                            <div class="col-md-7">
                                <form action="" method="GET">
                                    <div class="input-group mb-3">
                                        <input type="text" name="search" required value="<?php if (isset($_GET['search'])) {echo $_GET['search']; } ?>" class="form-control" placeholder="Pesquisar pessoa/telefone">
                                        <button type="submit" class="btn btn-primary">Search</button>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="card mt-4">
                                <div class="card-body">
                                    <table class="table table-bordered">
                                        
                                        <tbody>
                                            <?php
                                                $con = mysqli_connect("localhost", "root", "admin", "tapagodb");
                                                
                                                if(isset($_GET['search']))
                                                {
                                                    $filtervalues = $_GET['search'];
                                                    $query = "SELECT * FROM tapagodb.pessoas WHERE CONCAT(pessoas.nome, pessoas.telefone) LIKE '%$filtervalues%'; ";
                                                    $query_run = mysqli_query($con, $query);
                                                    
                                                    if(mysqli_num_rows($query_run) > 0)
                                                    {
                                                        foreach($query_run as $items)
                                                        {   
                                                            ?>
                                                                <tr>
                                                                    <td><?= $items['id'] ?></td>
                                                                    <td><?= $items['nome'] ?></td>
                                                                    <td><?= $items['cpf'] ?></td>
                                                                    <td><?= $items['data_nascimento'] ?></td>
                                                                    <td><?= $items['telefone'] ?></td>
                                                                    <td><?= $items['email'] ?></td>
                                                                    <td><?= $items['created_at'] ?></td>
                                                                    <td><?= $items['updated_at'] ?></td>
                                                                </tr>
                                                            <?php
                                                        }
                                                    }

                                                    else
                                                    {
                                                        ?>
                                                            <tr>
                                                                <td colspan="8">Nenhum resultado encontrado</td>
                                                            </tr>
                                                        <?php
                                                    }

                                                }
                                            ?>
                                            

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
										<th>Nome</th>
										<th>Cpf</th>
										<th>Data Nascimento</th>
										<th>Telefone</th>
										<th>Email</th>
                                        <th>Data Cadastro</th>
                                        <th>Data Alteracao</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pessoas as $pessoa)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $pessoa->nome }}</td>
											<td>{{ $pessoa->cpf }}</td>
											<td>{{ $pessoa->data_nascimento }}</td>
											<td>{{ $pessoa->telefone }}</td>
											<td>{{ $pessoa->email }}</td>
                                            <td>{{ $pessoa->created_at }}</td>
                                            <td>{{ $pessoa->updated_at }}</td>

                                            <td>
                                                <form action="{{ route('pessoas.destroy',$pessoa->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('pessoas.show',$pessoa->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('pessoas.edit',$pessoa->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
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
                {!! $pessoas->links() !!}
            </div>
        </div>  
        <?php
        $con = mysqli_connect("localhost", "root", "admin", "tapagodb");
        $limit = 2;
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        $start = ($page -1) * $limit;
        $result = $con->query("SELECT * FROM tapagodb.pessoas LIMIT $start, $limit");
        $pessoas = $result->fetch_all(MYSQLI_ASSOC);

        $result1 = $con->query("SELECT count(id) AS id FROM tapagodb.pessoas LIMIT $start, $limit");
        $pessoasCount = $result1->fetch_all(MYSQLI_ASSOC);
        $total = $pessoasCount[0]['id'];
        $pages = ceil($total / $limit);

        $Previous = $page - 1;
        $Next = $page + 1;

    ?>      
    <nav aria-label="Page navigation example">
        <ul class="pagination">
            <li class="page-item"><a class="page-link" href="pessoas.php?page=<?= $Previous; ?>">Previous</a></li>
            <?php for($i = 1; $i<= $pages; $i++) : ?>
            <li class="page-item"><a class="page-link" href="pessoas.php?page=<?= $i; ?>"><?= $i; ?></a></li>
            <?php endfor; ?>
            <li class="page-item"><a class="page-link" href="pessoas.php?page=<?= $Next; ?>">Next</a></li>
            
        </ul>
    </nav>
    </div>
    
@endsection
