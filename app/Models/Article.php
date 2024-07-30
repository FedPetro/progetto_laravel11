<?php

namespace App\Models;

use App\Models\Image;
use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Article extends Model
{
    use Searchable;
    use HasFactory;
    
    protected $fillable = [
        'title',
        'description',
        'price',
        'category_id',
        'user_id',
        'img',
    ];
    
    public function user(): BelongsTo{
        return $this->belongsTo(User::class); //ogni Article appartiene a un singolo User.
    } //La relazione utilizza la colonna user_id nella tabella articles per collegarsi alla colonna id nella tabella users.
    public function category(): BelongsTo{
        return $this->belongsTo(Category::class); //ogni Category appartiene a un singolo User.
    } //La relazione utilizza la colonna category_id nella tabella articles per collegarsi alla colonna id nella tabella categories.
    
    // funzione per LOGICA DI VALUTAZIONE ARTICOLI
    public function setAccepted($value){
        $this->is_accepted = $value;
        $this->save();
        return true;
    }
    
    //    funzione per CONTEGGIO DEGLI ARTICOLI DA REVISIONARE
    public static function toBeRevisedCount(){
        return Article::where('is_accepted', null)->count();
    }
    
    public function toSearchableArray(){
        return [
            'id'=>$this->id,
            'title' => $this->title,
            'description'=>$this->description, 'category'=>$this->category
        ];
    }
    
    //    funzione per singolo oggetto di classe Article può avere più oggetti di classe Image
    public function images(): HasMany
    {
        return $this->hasMany (Image::class);
    }
    
    
}
