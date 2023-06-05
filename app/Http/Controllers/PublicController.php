<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Announcement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PublicController extends Controller
{
    public function homepage(){
        $announcements= Announcement::orderBy('created_at','desc')->where('is_accepted', true)->take(6)->get();
        $categories= Category::all();
        return view('welcome',compact('announcements','categories'));
    }

    public function show(Category $category)
    {
        return view('Announcement.categoryShow',compact('category'));
    }

    public function searchAnnouncements(Request $request){

        $announcements = Announcement::search($request->searched)->where('is_accepted',true)->paginate(8);
        return view('Announcement.index', compact('announcements'));
    }

    public function setLanguage($lang){

        session()->put('locale', $lang);
        return redirect()->back();
    }

    public function about(){

        return view('about');
        
    }

    public function like(Announcement $announcement){
        if(!$announcement->userlike->contains('id', Auth::user()->id)){
            $announcement->like = $announcement->like+=1;
            $announcement->save(['timestamps' => false]);   
            $announcement->userlike()->attach(Auth::user('id'));
        }else{
            $announcement->like = $announcement->like-=1;
            $announcement->userlike()->detach(Auth::user('id'));
            $announcement->save(['timestamps' => false]);
        }
         return redirect(route('announcement.show',compact('announcement')));
     }
}
