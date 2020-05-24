@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">Edit Listing <a href="/dashboard" class="pull-right btn btn-default btn-xs">Go Back</a></div>

            <div class="panel-body">
              {!!Form::open(['action' => ['ListingsController@update', $listing->id],'method' => 'POST'])!!} {{-- We are also pushing the listing Id so that Laravel knows for which post we are requesting an edit page --}}
                {{Form::bsText('name',$listing->name,['placeholder' => 'Company Name'])}}
                {{Form::bsText('website',$listing->website,['placeholder' => 'Company Website'])}}
                {{Form::bsText('email',$listing->email,['placeholder' => 'Contact Email'])}}
                {{Form::bsText('phone',$listing->phone,['placeholder' => 'Contact Phone'])}}
                {{Form::bsText('address',$listing->address,['placeholder' => 'Business Address'])}}
                {{Form::bsTextArea('bio',$listing->bio,['placeholder' => 'About This Business'])}}
                {{Form::hidden('_method', 'PUT')}} {{-- Because we are patching/updating we also need to send the method In CMS we did it differently in the method for the whole form --}}
                {{Form::bsSubmit('submit')}}
              {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection