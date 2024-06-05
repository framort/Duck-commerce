
annulla ultima operazione

public function undo() {
   

    $article->setAccepted(null);
        return redirect()->back()->with('message', "Hai annullato l'/ultima operazione per $article->titolo");
        
}
---------------------------------------------------------------------------------------------

inserito dentro la f-index revisorcontroller e passato nella compact
 $article_undo = Article::orderBy('created_at' , 'desc')->whereNotNull('is_accepted')->firt();


 In caso di errore sul primo  
 $article_undo = Article::whereNotNull('is_accepted')->get()->last();


-------------------------------------------------------------------------------------------------
Route::patch('/undo/{article}', [RevisorController::class, 'undo'])->name('undo');

-----------------------------------------------------------------------------------------------------
<div class="d-flex pb-4 justify-content-around">
                    <form action="{{ route('undo', ['article' => $article_undo]) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <button class="btn btn-danger py-2 px-5 fw-bold">Annula</button>
                    </form>

riga 200 index.blade revisor
-----------------------------------------------------------------------------------------------------










