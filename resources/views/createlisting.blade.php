@extends('layouts.app')

    @section('content')
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Create Listing</div>

                    <div class="panel-body">
                    {{-- Now We Are Using The Components To Create The Form - Just A Different Approach From The CMS Project--}}
                        {!!Form::open(['action' => 'ListingsController@store','method' => 'POST'])!!} {{-- We aare sending it with Post to Store --}}
                            {{Form::bsText('name','',['placeholder' => 'Company Name'])}}
                            {{Form::bsText('website','',['placeholder' => 'Company Website'])}}
                            {{Form::bsText('email','',['placeholder' => 'Contact Email'])}}
                            {{Form::bsText('phone','',['placeholder' => 'Contact Phone'])}}
                            {{Form::bsText('address','',['placeholder' => 'Business Address'])}}
                            {{Form::bsTextArea('bio','',['placeholder' => 'About This Business'])}}
                            {{Form::bsSubmit('submit')}}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    @endsection