<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use Illuminate\Http\Request;

class AnnouncementController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $announcements= Announcement::orderBy('created_at','desc')->where('is_accepted', true)->paginate(8);
        return view('Announcement.index',compact('announcements'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Announcement.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Announcement $announcement)
    {
        return view('announcement.show',compact('announcement'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Announcement $announcement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Announcement $announcement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Announcement $announcement)
    {
        
        
            // $announcement->games()->detach($announcement->games);
            
            $announcement->userlike()->detach();
            $announcement->delete();
            
            return redirect()->back()->with('message', 'Annuncio eliminato');
    
        
    }

    public function showProfile(Announcement $announcement)
    {
        return view('announcement.profile', compact('announcement'));
    }
}
