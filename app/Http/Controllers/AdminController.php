<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Member;
use App\Team;
use App\Event;
use Auth;
class AdminController extends Controller {

    public function getIndex() {
        if (Auth::check()) {
            return redirect()->route('manage_event');
        }
        return redirect()->route('login');
    }
    
    public function getLogin() {
        return view('admin.pages.login');
    }

    public function postLogin(Request $request) {
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required'
        ]);
        if (Auth::attempt(['username' => $request->input('username'), 'password' => $request->input('password')])) {
            return redirect()->route('manage_event');
        } else {
            return view('admin.pages.login')->with(['message' => 'username/password is incorrect']);
        }
    }

    public function getLogout() {
        Auth::logout();
        return redirect()->route('login');
    }

    public function getRegistration($event_number) {
        return view('admin.pages.registration')->with(['event_number' => $event_number]);
    }

    public function saveRegistration(Request $request) {
        if ($request->input('join') != 'team') {
            $this->validate($request, [
                'name' => 'required',
                'email' => 'email|required|unique:members',
                'phone' => 'required|unique:members',
                'category' => 'required'
            ]);
            $member = new Member([
                'event_number' => $request->input('event_number'),
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'phone' => $request->input('phone'),
                'category' => serialize($request->input('category')),
                'occupation' => $request->input('occupation'),
                'university' => $request->input('university'),
            ]);
            $member->save();
        } else {
            $this->validate($request, [
                'team_name' => 'required',
                'leader_name' => 'required',
                'leader_email' => 'email|required',
                'leader_phone' => 'required',
                'name_member' => 'required',
                'phone_member' => 'required',
                'category' => 'required'
            ]);
            $team = new Team([
                'event_number' => $request->input('event_number'),
                'team_name' => $request->input('team_name'),
                'leader_name' => $request->input('leader_name'),
                'leader_email' => $request->input('leader_email'),
                'leader_phone' => $request->input('leader_phone'),
                'member_count' => $request->input('member_count'),
                'name_member' => serialize($request->input('name_member')),
                'phone_member' => serialize($request->input('phone_member')),
                'category' => serialize($request->input('category')),
                'occupation' => $request->input('occupation'),
                'university' => $request->input('university'),
            ]);
            $team->save();
        }
        return view('admin.pages.registration_complete')->with(['event_number' => $request->input('event_number')]);
    }

    public function getDashboard() {
        return view('admin.pages.dashboard');
    }

    public function viewEvent($id) {
        return view('admin.pages.view_event')->with('id', $id);
    }
    
    public function getEvent(){
        return view('admin.pages.manage_event');
    }
    public function addEvent(){
        return view('admin.pages.add_event');
    }

    public function saveEvent(Request $request){
        $this->validate($request, [
                'event_name' => 'required',
                'event_number' => 'required|unique:events',
                'deadline' => 'required',
                'event_date' => 'required'
            ]);
        $event = new Event([
           'event_name' => $request->input('event_name'), 
           'event_number' => $request->input('event_number'), 
           'deadline' => $request->input('deadline'), 
           'event_date' => $request->input('event_date'), 
        ]);
        $event->save();
        return view('admin.pages.add_event')->with(['success' => 'Event Created Successfully']);
    }
}
