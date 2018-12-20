@extends('admin.layouts.admin_master')

@section('main_content')
<?php

Use App\Member;
Use App\Team;
Use App\Event;

$event = Event::find($id);
$members = Member::all()->where('event_number',$event->event_number);
$teams = Team::all()->where('event_number',$event->event_number);
?>
<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header"><i class="fa fa-ticket"></i>{{$event->event_name}}</h3>
                <ol class="breadcrumb">
                    <li><i class="fa fa-home"></i><a href="{{route('index')}}"> Home</a></li>
                    <li><a href="{{route('manage_event')}}"><i class="fa "></i>Events</a></li>
                    <li>{{ $event->event_name}}</li>
                </ol>
            </div>
        </div>
        <!-- page start-->

        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        Individuals
                    </header>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th><i class="fa fa-user"></i> Name</th>
                                    <th><i class="icon_mail_alt"></i> Email</th>
                                    <th><i class="icon_mobile"></i> Phone Number</th>
                                    <th><i class="fa fa-list-alt"></i> Categories</th>
                                    <th><i class="fa fa-tasks"></i> Occupation</th>
                                    <th><i class="fa fa-university"></i> University/Company</th>
                                    <th><i class="icon_cogs"></i> Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($members as $member)
                                <tr>
                                    <td>{{$member->id}}</td>
                                    <td>{{$member->name}}</td>
                                    <td>{{$member->email}}</td>
                                    <td>{{$member->phone}}</td>
                                    <td>
                                        <?php
                                        foreach (unserialize($member->category) as $category) {
                                            switch ($category) {
                                                case 1 : echo "Character Design & Rigging <br>";
                                                    break;
                                                case 2 : echo "Environment Design <br>";
                                                    break;
                                                case 3 : echo "3D Animation <br>";
                                                    break;
                                                case 4 : echo "2D Animation <br>";
                                                    break;
                                                case 5 : echo "Visual Effect <br>";
                                                    break;
                                            }
                                        }
                                        ?>
                                    </td>
                                    <td>{{$member->occupation != 1 ? "job": "student"}}</td>
                                    <td>{{$member->university}}</td>
                                    <td>
                                        <div class="btn-group">
                                            <a class="btn btn-primary" href="#" title="Send Confirmatin Mail"><i class="fa fa-send"></i></a>
                                            <a class="btn btn-danger" href="#" title="Reject"><i class="icon_close_alt2"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </section>
            </div>
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        Team
                    </header>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th><i class="fa fa-users"></i> Team Name</th>
                                    <th><i class="fa fa-user"></i> Team Leader's Name</th>
                                    <th><i class="icon_mail_alt"></i> Team Leader's Email</th>
                                    <th><i class="icon_mobile"></i> Team Leader's Phone</th>
                                    <th><i class="fa fa-user"></i> Team Members Name</th>
                                    <th><i class="icon_mobile"></i> Team Members Phone</th>
                                    <th><i class="fa fa-list-alt"></i> Categories</th>
                                    <th><i class="fa fa-tasks"></i> Occupation</th>
                                    <th><i class="fa fa-university"></i> University/Company</th>
                                    <th><i class="icon_cogs"></i> Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($teams as $team)
                                <tr>
                                    <td>{{$team->id}}</td>
                                    <td>{{$team->team_name}}</td>
                                    <td>{{$team->leader_name}}</td>
                                    <td>{{$team->leader_email}}</td>
                                    <td>{{$team->leader_phone}}</td>
                                    <td>
                                        <?php
                                        foreach (unserialize($team->name_member) as $name_member) {
                                            echo $name_member . "<br>";
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                        foreach (unserialize($team->phone_member) as $phone_member) {
                                            echo $phone_member . "<br>";
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                        foreach (unserialize($team->category) as $category) {
                                            switch ($category) {
                                                case 1 : echo "Character Design & Rigging <br>";
                                                    break;
                                                case 2 : echo "Environment Design <br>";
                                                    break;
                                                case 3 : echo "3D Animation <br>";
                                                    break;
                                                case 4 : echo "2D Animation <br>";
                                                    break;
                                                case 5 : echo "Visual Effect <br>";
                                                    break;
                                            }
                                        }
                                        ?>
                                    </td>
                                    <td>{{$team->occupation != 1 ? "job": "student"}}</td>
                                    <td>{{$team->university}}</td>
                                    <td>
                                        <div class="btn-group">
                                            <a class="btn btn-primary" href="#" title="Send Confirmatin Mail"><i class="fa fa-send"></i></a>
                                            <a class="btn btn-danger" href="#" title="Reject"><i class="icon_close_alt2"></i></a>
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