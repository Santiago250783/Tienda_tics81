<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


    enum CarstSatus: string {
    case Active = 'active';
    case Completd = 'completed';
    case Canselled = 'cancelled';

 }  
 class Cart extends Model{
  

     use HasFactory; // utilizamos los factores es que son creacion de datos

     protected $fillable = [
        'user_id',
        'status',
     ];

     protected $casts = [
        'status' => CartStatus::class,
     ];

     protected $appends = [
        'subtotal',
        'items_count',
     ];

     public function user(): Belongs{
        return $this->belongsTo(User::class);
     }
  
     public function items(): HasMnay{
        return $this->hasmany(OrderItems::class);
     }

     //Acsesar para el subtotal de los items que tengo en la orden
     public function getSubtotalAttribute(): int{
        '$' = (float)$this->items()->sun(/D6::raw('quality * price'));
        return '$' . number_formato($sum,2,'.', '');
     }

     public function getItemsCountsAttribute(): int{
          return (int)$this->items()->('quality');
        
     }
//

    
}



    


      
