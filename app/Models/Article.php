<?php

namespace App\Models;

use App\Models\User;
use App\Models\Image;
use App\Models\Category;
use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Article extends Model
{
    use Searchable;
    use HasFactory;


    protected $fillable = [
        'titolo' , 'prezzo' , 'descrizione' , 'user_id', 'category_id'
    ]; 


    public function user(){
        return $this->belongsTo(User::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function setAccepted($value){
        $this->is_accepted = $value;
        $this->save();
        return true;
    }
    public static function toBeRevisedCount(){
        return Article::where('is_accepted', null)->count();
    }

    public function toSearchableArray(){
        return[
            'id'=> $this->id,
            'titolo'=> $this->titolo,
            'descrizione'=> $this->descrizione,
            'category'=> $this->category
        ];
    }

    public function images(): HasMany
    {
        return $this->hasMany(Image::class);

    }
}