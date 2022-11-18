@extends('backend.layouts.app')
@section('title', $p_heading)
@section('content')
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header">
                <strong>Pet Details</strong>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover table-striped table-bordered">
                        <tbody>
                            <tr>
                                <th width="30%">User Name</th>
                                <td width="70%">{{ $pet->first_name }} {{ $pet->last_name }}</td>
                            </tr>
                            <tr>
                                <th>User Email</th>
                                <td>
                                    {{ $pet->email }}
                                </td>
                            </tr>
                            <tr>
                                <th>Pet Name</th>
                                <td>{{ $pet->pet_name }}</td>
                            </tr>
                            <tr>
                                <th>Pet Age</th>
                                <td>
                                    {{ $pet->pet_age }}
                                </td>
                            </tr>
                            <tr>
                                <th>Status</th>
                                <td>
                                    @if($pet->status == 0) <span class="badge badge-secondary">Pending</span> @elseif($pet->status == 1) <span class="badge badge-success">Approve</span> @elseif($pet->status == 2) <span class="badge badge-danger">Disapprove</span> @endif
                                </td>
                            </tr>
                            @if($pet->status == 1)
                            <tr>
                                <th>Pet of the month</th>
                                <td>{{ date('M, d',$pet->pet_created_time) }}</td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div> <!-- end card -->
        @if(@$pet->images)
            <div class="card">
                <div class="card-header">
                    <strong>Images of Pet</strong>
                </div>
                <div class="card-body">
                    <div class="row">
                        @foreach($pet->images as $key => $img)
                            <div class="col-md-4">
                                <img src="{{ asset('up_data/pets-of-the-month/images/'.$img->pet_image) }}" alt="" style="width: 100%;" />
                            </div>
                        @endforeach
                    </div>
                </div>
            </div> <!-- end card -->
        @endif

        @if(@$pet->video)
        <div class="card">
            <div class="card-header">
                <strong>Video of Pet</strong>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <video controls>
                            <source src="{{ asset('up_data/pets-of-the-month/videos/'.$pet->video) }}" type="video/mp4" />
                            <source src="{{ asset('up_data/pets-of-the-month/videos/'.$pet->video) }}" type="video/ogg" />
                        </video>
                    </div>
                </div>
            </div>
        </div> <!-- end card -->
        @endif
        <div class="card">
            <div class="card-header">
                <strong>Update Pet Status</strong>
            </div>
            <div class="card-body">
                @if(!@$pet->pet_created_time)
                <div class="form-group">
                    {!! Form::label('date', 'POTM Date') !!}
                    {!! Form::date('date', null,['class'=>'form-control']) !!}
                </div>
                @endif
                <div class="d-flex">
                    <div class="approve">
                        {!! Form::open(array('route' => 'admin.pets.approve', 'method' => 'POST')) !!}
                        <button type="submit" class="btn btn-primary mb-2">Approve</button>
                        {!! Form::hidden('pet_id', $pet->id) !!}
                        {!! Form::close() !!}
                    </div>
                    <div class="disapprove ml-2">
                        {!! Form::open(array('route' => 'admin.pets.disapprove', 'method' => 'POST')) !!}
                        <button type="submit" class="btn btn-danger mb-2">Disapprove</button>
                        {!! Form::hidden('pet_id', $pet->id) !!}
                        {!! Form::close() !!}   
                    </div>
                </div>
            </div>
        </div> <!-- end card -->
    </div>
</div>
@endsection