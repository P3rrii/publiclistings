@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard <span class="pull-right"> <a href="/listings/create/" class="btn btn-success btn-xs"> Add Listing</a> </span> </div>

                <div class="panel-body">
                    <h3> {{$user->name}}'s Listings </h3>
                    @if(count($listings)>0)
                        <table class="table table-striped">
                            <tr>
                                <th> </th>
                                <th> </th>
                                <th> </th>
                            </tr>
                        @foreach($listings as $listing)
                            <tr>
                                <td> {{$listing->name}}</td>
                                <td> <a class="pull-right btn btn-default" href="/listings/{{$listing->id}}/edit"> Edit </a> </td> {{--We creating a button that will hold the id of the post and if we click it, it will go to the edit page --}}
                                <td> 
                                    {!!Form::open(['action' => ['ListingsController@destroy', $listing->id], 'method' => 'POST', 'class' => 'pull-left', 'onsubmit' => 'return confirm("Are you sure?")'])!!} {{-- Here we are also adding the on submit to make a confirmation so we wont have deleting by mistake --}}
                                        {{Form::hidden('_method', 'DELETE')}} {{-- Like we did before we must pass the method in a hidden input different way than the one we did in the CMS Project --}}
                                        {{Form::bsSubmit('Delete', ['class' => 'btn btn-danger'])}}
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @endforeach 
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
