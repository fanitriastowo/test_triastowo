@extends('layouts.app')

@section('content')
<style type="text/css">
  .uper {
    margin-top: 40px;
  }

</style>

<div class="card uper">
  <div class="card-header">
    Add Share
  </div>

  <div class="card-body">

    @if ($errors->any())
    <div class="alert alert-danger">
      <ul>
        <?php foreach ($errors as $error): ?>
        <li>{{ $error }}</li>
        <?php endforeach ?>
      </ul>
    </div>
    @endif

    <form method="post" action="{{route('store')}}">
      <div class="form-group">
        @csrf
        <label for="name">Kode:</label>
        <input type="text" class="form-control" name="kode"/>
      </div>
      <div class="form-group">
        <label for="price">Jenis Armada</label>
        <select class="custom-select" name="jenis_armada_id">
          <?php foreach ($jenisArmadas as $jenisArmada): ?>
          <option value="{{ $jenisArmada->id }}">{{ $jenisArmada->nama }}</option>
          <?php endforeach ?>
        </select>
      </div>
      <button type="submit" class="btn btn-primary">Input</button>

    </form>
  </div>

</div>
@endsection