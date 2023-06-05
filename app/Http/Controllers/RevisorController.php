<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Mail\BecomeRevisor;
use App\Models\Announcement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Artisan;

class RevisorController extends Controller
{
    public function index(){
        $announcement_to_check = Announcement::where('is_accepted', null)->first();
        $announcement = $announcement_to_check;
        return view ('revisor.index', compact('announcement_to_check','announcement'));
    }

    public function acceptAnnouncement(Announcement $announcement){
        $announcement->setAccepted(true);
        return redirect()->back()->with('message', 'Complimenti! Hai accettato l\'annuncio');
    }

    public function rejectAnnouncement(Announcement $announcement){
        $announcement->setAccepted(false);
        return redirect()->back()->with('message', 'Hai rifiutato l\'annuncio');
    }

    public function becomeRevisor(){
        Mail::to('admin@vendilo.it')->send(new BecomeRevisor(Auth::user()));
        return redirect()->back()->with('message', 'Complimenti! hai richiesto di diventare revisore!');
    }

    public function makeRevisor(User $user){
        Artisan::call('vendilo:make-user-revisor', ["email" => $user->email]);
        return redirect('/')->with('message', 'Complimenti! L\'utente e diventato revisore!');
    }

    

   public function rollbackTransaction()
        {
            $announcement = Announcement::where('is_accepted', '!=', null)->get()->reverse()->first();
            $announcement->setAccepted(null);
            return redirect()->back()->with('message', 'Ultima operazione annulata');
        }

}    

