<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Article;
use App\Mail\BecomeRevisor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Artisan;

class RevisorController extends Controller
{
    public function index()
    
    {
        $article_undo = Article::orderBy('created_at' , 'desc')->whereNotNull('is_accepted')->first();
        // $article_undo = Article::whereNotNull('is_accepted')->get()->last();
        $article_to_check = Article::where('is_accepted', null)->first();
        return view('revisor.index', compact('article_to_check', 'article_undo'));
    }

    public function accept(Article $article)
    {
        $article->setAccepted(true);
        return redirect()->back()->with('message', "Hai accettato l'articolo $article->titolo");
    }
    public function reject(Article $article)
    {
        $article->setAccepted(false);
        return redirect()->back()->with('message', "Hai rifiutato l'articolo $article->titolo");
    }

    public function becomeRevisor()
    {


        $user  = Auth::user();
        if ($user->request_revisor) {
            return redirect()->route('home')->with('message', __('ui.requestProcessed'));
        } else {
            $user->request_revisor = true;
            $user->save();
            Mail::to('admin@presto.it')->send(new BecomeRevisor(Auth::user()));
            return redirect()->route('home')->with('message',  __('ui.congratulationsAppliedBecomeRevisor'));
        }
    }





    public function makeRevisor(User $user)
    {
        Artisan::call('app:make-user-revisor', ['email' => $user['email']]);
        return redirect()->route('home')->with('revisorAccepted', __('ui.congratulationsBecomeRevisor'));
    }

    public function undo(Article $article) {
   

        $article->setAccepted(null);
            return redirect()->back()->with('message', "Hai annullato l'ultima operazione per $article->titolo");
            
    }

    
}
