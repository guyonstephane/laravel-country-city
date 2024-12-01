@extends('countries.layout')
  
@section('content')

<div class="card mt-5">
  <h2 class="card-header">{{$country->nom}}</h2>
  
  <div class="card-body">
  
    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <a class="btn btn-primary btn-sm" href="{{ route('countries.index') }}"><i class="fa fa-arrow-left"></i> Back</a>
    </div>

  
    <div class="row ">
    <div class="col-xs-12 col-sm-12 col-md-12 ">
            <div class="form-group ">
             <?php $flag = strtolower($country->code).".png" ?>   
            <img src="{{ URL::to("/images/drapeau/$flag") }}"  width="100" height="50"> 
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong> <br/>
                {{ $country->nom }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
            <div class="form-group">
               <strong>Population</strong> <br/>
                {{ Number::format($country->population, locale: 'sv') }}
            </div>
            <div class="form-group">
                <strong>Espérance de vie</strong> <br/>
                {{ $country->esperanceVie}}
            </div>
            <div class="form-group">
                <strong>Chef de l'État</strong> <br/>
                {{ $country->chefEtat}}
            </div>
            <div class="form-group">
                <strong>PNB</strong> <br/>
                {{ $country->PNB}}
            </div>

            <table class="table table-bordered table-striped mt-4">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Population</th>
                </tr>
            </thead>

            <tbody>
            @forelse ($cities as $city)
                <tr>
                    <td>{{ $city->nom }}</td>
                    <td>{{ $city->population }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">There are no data.</td>
                </tr>
            @endforelse
            </tbody>

        </table>
        {!! $cities->links() !!}

        </div>
    </div>
  
  </div>
</div>
@endsection