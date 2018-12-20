<?php 
use App\Event;
$event = Event::all()->where('event_number', $event_number)->first();
?>
<!DOCTYPE html>
<html lang="en">
    <head> 
        <meta name="viewport" content="width=device-width, initial-scale=1">


        <!-- Website Font style -->
        <link rel="stylesheet" href="{{asset('public/registration/css/font-awesome.min.css')}}">
        <link href="{{asset('public/registration/css/bootstrap.min.css')}}" rel="stylesheet">
        <link href='{{asset('public/registration/css/style.css')}}' rel='stylesheet' type='text/css'>

        <title>Event Registration</title>
    </head>
    <body>
        <div class="container">
            <div class="row main">
                <div class="main-login main-center">
                    <h3 class="text-center">{{ $event->event_name }}</h3>
                    @isset($success)
                    <div class="alert alert-success alert-dismissable">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>{{ $success }}</strong> 
                    </div>
                    @endisset
                    @if(count($errors) > 0)
                    <div class="alert alert-danger alert-dismissable">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <ul>
                            @foreach($errors->all() as $error)
                            <li><strong>{{ $error }}</strong></li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <form class="" method="post" action="{{route('save_registration')}}">
                        {{csrf_field()}}
                        <input type="hidden" name="event_number" value="{{$event->event_number}}">
                        <div class="form-group">
                            <label for="username" class="cols-sm-2 control-label">Join as</label>
                            <div class="cols-sm-10">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-trophy fa" aria-hidden="true"></i></span>
                                    <div class="form-control">
                                        <label class="radio-inline"><input type="radio" name="join" value="individual" checked=""> Individual</label>
                                        <label class="radio-inline"><input type="radio" name="join" value="team"> Team</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="individual" class="toHide">
                            <div class="form-group">
                                <label for="name" class="cols-sm-2 control-label">Your Name</label>
                                <div class="cols-sm-10">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                                        <input type="text" class="form-control" name="name"  placeholder="Enter Your Name"/>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="cols-sm-2 control-label">Your Email</label>
                                <div class="cols-sm-10">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
                                        <input type="email" class="form-control" name="email"  placeholder="Enter Your Email"/>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="username" class="cols-sm-2 control-label">Phone Number</label>
                                <div class="cols-sm-10">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-phone fa" aria-hidden="true"></i></span>
                                        <input type="tel" class="form-control" name="phone"  placeholder="Enter Your Mobile Number"/>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="team" class="toHide" style="display: none">

                            <div class="form-group">
                                <label class="cols-sm-2 control-label">Team Name</label>
                                <div class="cols-sm-10">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                                        <input type="text" class="form-control" name="team_name"  placeholder="Enter Team Name"/>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="cols-sm-2 control-label">Team Leader's Name</label>
                                <div class="cols-sm-10">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                                        <input type="text" class="form-control" name="leader_name"  placeholder="Enter Leader's Name"/>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="cols-sm-2 control-label">Team Leader's Email</label>
                                <div class="cols-sm-10">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
                                        <input type="email" class="form-control" name="leader_email"  placeholder="Enter Leader's Email"/>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="cols-sm-2 control-label"> Team Leader's Phone Number</label>
                                <div class="cols-sm-10">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-phone fa" aria-hidden="true"></i></span>
                                        <input type="tel" class="form-control" name="leader_phone"  placeholder="Enter Leader's Mobile Number"/>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="cols-sm-2 control-label"> Number of Member's</label>
                                <div class="cols-sm-10">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-tachometer fa" aria-hidden="true"></i></span>
                                        <select id="member" class="selectpicker form-control" name="member_count">
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <label class="cols-sm-2 control-label"> Team Members Info</label>

                            <div class="form-group to_hide" id="member2">
                                <div class="cols-sm-10">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                                        <input type="text" class="form-control" name="name_member[2]"  placeholder="Member 2 Name"/>
                                    </div>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-phone fa" aria-hidden="true"></i></span>
                                        <input type="tel" class="form-control" name="phone_member[2]"  placeholder="Member 2 Mobile Number"/>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group to_hide" id="member3" style="display: none;">
                                <div class="cols-sm-10">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                                        <input type="text" class="form-control" name="name_member[3]"  placeholder="Member 3 Name"/>
                                    </div>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-phone fa" aria-hidden="true"></i></span>
                                        <input type="tel" class="form-control" name="phone_member[3]"  placeholder="Member 3 Mobile Number"/>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group to_hide" id="member4" style="display: none;">
                                <div class="cols-sm-10">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                                        <input type="text" class="form-control" name="name_member[4]"  placeholder="Member 4 Name"/>
                                    </div>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-phone fa" aria-hidden="true"></i></span>
                                        <input type="tel" class="form-control" name="phone_member[4]"  placeholder="Member 4 Mobile Number"/>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group to_hide" id="member5" style="display: none;">
                                <div class="cols-sm-10">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                                        <input type="text" class="form-control" name="name_member[5]"  placeholder="Member 5 Name"/>
                                    </div>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-phone fa" aria-hidden="true"></i></span>
                                        <input type="tel" class="form-control" name="phone_member[5]"  placeholder="Member 5 Mobile Number"/>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="cols-sm-2 control-label">Which category you want to participate?</label>
                            <div class="cols-sm-10">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-list-alt fa" aria-hidden="true"></i></span>
                                    <div class="form-control">
                                        <div class="checkbox">
                                            <label><input type="checkbox" name="category[0]" value="1"> Character Design & Rigging</label> 
                                        </div>
                                        <div class="checkbox">
                                            <label><input type="checkbox" name="category[1]" value="2"> Environment Design</label>
                                        </div>
                                        <div class="checkbox">
                                            <label><input type="checkbox" name="category[2]" value="3"> 3D Animation</label>
                                        </div>
                                        <div class="checkbox">
                                            <label><input type="checkbox" name="category[3]" value="4"> 2D Animation</label>
                                        </div>
                                        <div class="checkbox">
                                            <label><input type="checkbox" name="category[4]" value="5"> Visual Effect</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="username" class="cols-sm-2 control-label">Occupation</label>
                            <div class="cols-sm-10">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-tasks fa" aria-hidden="true"></i></span>
                                    <div class="form-control">
                                        <label class="radio-inline"><input type="radio" name="occupation" value="1"> Student</label>
                                        <label class="radio-inline"><input type="radio" name="occupation" value="2"> Job Holder</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="username" class="cols-sm-2 control-label">University / Company Name</label>
                            <div class="cols-sm-10">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-building-o fa" aria-hidden="true"></i></span>
                                    <input type="tel" class="form-control" name="university" placeholder="Enter University / Company Name"/>
                                </div>
                            </div>
                        </div>

                        <div class="form-group ">
                            <button type="submit" name="submit" class="btn btn-primary btn-lg btn-block">Register</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="{{asset('public/registration/js/jquery.min.js')}}"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="{{asset('public/registration/js/bootstrap.min.js')}}"></script>

        <script>
$(function () {
    $("[name=join]").click(function () {
        $('.toHide').hide();
        $("#" + $(this).val()).show('slow');
    });
});
$(function () {
    $("#member").change(function () {
        var x = $(this).val();
        $('.to_hide').hide();

        for (var i = 2; i <= x; i++) {
            $("#member" + i).show('slow');
        }
    });
});

        </script>
    </body>
</html>