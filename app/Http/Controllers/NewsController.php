<?php

namespace App\Http\Controllers;
use App\News;
use App\Profile;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NewsController extends Controller {
	public function getNews($id) {
		if (Auth::check()) {
			return view('news.postNews');
		} else {
			return redirect('/');
		}
	}
	public function postNews(Request $req, $id) {
		$news             = new News;
		$news->title      = $req->title;
		$news->content    = $req->content;
		$news->profile_id = $id;
		$news->file       = $req->file;
		$news->save();
		return redirect('/');
	}
	public function getlistNews() {
		if (Auth::check()) {
			$post    = News::all();
			$profile = Profile::all();
			return view('news.ListNews', compact('post', 'profile'));
		} else {
			return redirect('/');
		}
	}
	public function getdetail($id) {
		if (Auth::check()) {
			$news = News::where('id', $id)->first();
			return view('news.detail', compact('news'));
		} else {
			return redirect('/');
		}
	}
	public function getDown($url) {
		return response()->download($url);
	}
}
