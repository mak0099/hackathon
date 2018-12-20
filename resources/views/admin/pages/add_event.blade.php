@extends('admin.layouts.admin_master')

@section('main_content')
<?php
?>
<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header"><i class="fa fa-ticket"></i> Add Event</h3>
                <ol class="breadcrumb">
                    <li><i class="fa fa-home"></i><a href="{{route('index')}}">Home</a></li>
                    <li><a href="{{route('manage_event')}}"><i class="fa "></i>Events</a></li>
                    <li><i class="fa "></i>Add Event</li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                @isset($success)
                <div class="alert alert-success fade in col-sm-offset-2 col-sm-10">
                    <button data-dismiss="alert" class="close close-sm" type="button">
                        <i class="icon-remove"></i>
                    </button>
                    <strong>{{ $success }}</strong> 
                </div>
                @endisset

                @if(count($errors) > 0)
                <div class="alert alert-block alert-danger fade in col-sm-offset-2 col-sm-10">
                    <button class="close" data-dismiss="alert">×</button>
                    @foreach($errors->all() as $error)
                    <p>
                         {{ $error }}
                    </p>
                    @endforeach
                </div>
                @endif
                <form class="form-horizontal " method="post" action="{{ route('save_event') }}">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Event Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="event_name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Event Number</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" name="event_number" min="1">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Registration Deadline</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control" name="deadline">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Event Date</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control" name="event_date">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-primary">Create</button>    
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </section>
</section>
@endsection