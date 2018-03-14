<?php

namespace App\Http\Controllers;
use App\Profile;
use App\Work;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class WorksController extends Controller {
	public function DanhSachViecNhan($id) {
		$work = Work::where('user_id_receive', $id)->with('user', 'profile')->get();
		return view('works.ListReceiveWorks', compact('work'));
	}
	public function TaoViecMoi() {
		$user = Profile::all();
		return view('works.NewWork', compact('user'));
	}
	public function postWork(Request $req, $id) {

		$work                  = new Work;
		$work->title           = $req->title;
		$work->user_id_send    = $id;
		$work->user_id_receive = $req->user_id_receive;
		$work->receive_date    = $req->receive;
		$work->content         = $req->content;
		$work->deadline        = $req->deadline;
		$work->status          = 1;
		$work->file            = $req->file;
		$work->save();
		return redirect()->route('send',['id'=>Auth::id()])->with('success');
	}
	public function DanhSachViecGiao($id) {
		$work = Work::orderBy('id', 'desc')->where('user_id_send', $id)->get();
		return view('works.ListSendWorks', compact('work'));
	}
	public function getCongViec($id) {
		$work = Work::where('id', $id)->first();
		return view('works.DetailWork', compact('work'));
	}

}
