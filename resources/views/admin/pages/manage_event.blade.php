@extends('admin.layouts.admin_master')

@section('main_content')
<?php
use App\Event;
$events = Event::all();
?>
<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header"><i class="fa fa-ticket"></i> Manage Events</h3>
                <ol class="breadcrumb">
                    <li><i class="fa fa-home"></i><a href="{{route('index')}}">Home</a></li>
                    <li>Events</li>
                </ol>
            </div>
        </div>
        <!-- page start-->

        <div class="row">
            <div class="col-lg-12">
                <a class="btn btn-primary" href="{{ route('add_event') }}" title="Create New Event"><i class="fa fa-plus"></i> Add Event</a>
                <section class="panel">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th><i class="fa fa-ticket"></i> Event Name</th>
                                    <th><i class="fa fa-tachometer"></i> Event Number</th>
                                    <th><i class="icon_clock"></i> Registration Deadline</th>
                                    <th><i class="icon_clock"></i> Event Date</th>
                                    <th><i class="icon_cog"></i> Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($events as $event)
                                <tr>
                                    <td>{{ $event->id }}</td>
                                    <td>{{ $event->event_name }}</td>
                                    <td>{{ $event->event_number }}</td>
                                    <td>{{ $event->deadline }}</td>
                                    <td>{{ $event->event_date }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <a class="btn btn-success" href="{{ route('view_event',['id' => $event->id]) }}" title="View"><i class="fa fa-eye"></i></a>
                                            <a class="btn btn-primary" href="#" title="Edit"><i class="fa fa-edit"></i></a>
                                            <a class="btn btn-info" href="{{ route('registration', ['event_number' => $event->event_number]) }}" title="Registration Form" target="_blank"><i class="fa fa-share"></i></a>
                                            <a class="btn btn-danger" href="#" title="Delete"><i class="icon_close_alt2"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </section>
            </div>
        </div>
        <!-- page end-->
    </section>
</section>
@endsection