@extends('countries.layout')

@section('content')

<div class="card mt-5">
  <h2 class="card-header">Laravel 11 CRUD Example </h2>
  <div class="card-body">

        @session('success')
            <div class="alert alert-success" role="alert"> {{ $value }} </div>
        @endsession

        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a class="btn btn-success btn-sm" href="{{ route('countries.create') }}"> <i class="fa fa-plus"></i> Create New Pays</a>
        </div>

        <table class="table table-bordered table-striped mt-4">
            <thead>
                <tr>
                    <th width="80px">No</th>
                    <th>Code</th>
                    <th>Nom</th>
                    <th>Population</th>
                    <th width="250px">Action</th>
                </tr>
            </thead>

            <tbody>
            @forelse ($countries as $country)
                <tr>
                    <td>{{ $country->id}}</td>
                    <td>{{ $country->code }}</td>
                    <td>{{ $country->nom }}</td>
                    <td>{{ $country->population }}</td>
                    <td>
                        <form action="{{ route('countries.destroy',$country->id) }}" method="POST">

                            <a class="btn btn-info btn-sm" href="{{ route('countries.show',$country->id) }}"><i class="fa-solid fa-list"></i> Show</a>

                            <a class="btn btn-primary btn-sm" href="{{ route('countries.edit',$country->id) }}"><i class="fa-solid fa-pen-to-square"></i> Edit</a>

                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-danger btn-sm btn-delete"><i class="fa-solid fa-trash"></i> Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">There are no data.</td>
                </tr>
            @endforelse
            </tbody>

        </table>

        {!! $countries->links() !!}

  </div>
</div>


<script type="text/javascript">
    $(".btn-delete").click(function(e){
        e.preventDefault();
        var form = $(this).parents("form");

        Swal.fire({
          title: "êtes vous sûr de vouloir supprimer le pays : {{$country->nom}} ?",
          text: "cette opération est irréversible",
          icon: "warning",
          showCancelButton: true,
          confirmButtonColor: "#3085d6",
          cancelButtonColor: "#d33",
          confirmButtonText: "Yes, delete it!"
        }).then((result) => {
          if (result.isConfirmed) {
            form.submit();
          }
        });

    });
</script>


@endsection

