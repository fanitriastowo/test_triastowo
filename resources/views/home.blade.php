@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <p>Data Master</p>
                    <a href="#" class="btn btn-success">Input</a>

                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Kode.</th>
                                <th>Jenis.</th>
                                <th colspan="2">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            <?php foreach ($armadas as $armada): ?>
                            <tr>
                                <td><?php echo $no; ?></td>
                                <td>{{ $armada->kode }}</td>
                                <td>{{ $armada->jenis_armada_id }}</td>
                                <td><a href="#" class="btn btn-primary btn-xs">Edit</a></td>
                                <td>
                                    <form action="#" method="post">
                                        @csrf   
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-xs">Delete</button>
                                  </form>
                                </td>
                            </tr>
                            <?php $no++; ?>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
