<?php
namespace App\Http\Controllers;
use App\Profile;
use App\Task;

use Illuminate\Support\Facades\Auth;

class TaskController extends Controller {
	public function getLich() {
		$user = Profile::all();
		return view('tasks.newTask', compact('user'));
	}
	public function postLich() {
		$content          = $_GET["content"];
		$gio              = $_GET["gio"];
		$ngay             = $_GET["ngay"];
		$profile_id       = $_GET["profile_id"];
		$task             = new Task;
		$task->content    = $content;
		$task->gio        = $gio;
		$task->ngay       = $ngay;
		$task->profile_id = $profile_id;
		$task->user_id    = Auth::id();
		$task->save();
		echo "Thêm lịch thành công";
	}

}
