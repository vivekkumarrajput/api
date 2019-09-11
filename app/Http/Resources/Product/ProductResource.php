<?php

namespace App\Http\Resources\Product;

use Illuminate\Http\Resources\Json\Resource;


class ProductResource extends Resource
{ 
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
          
          'Name' => $this->name,
          'Description' => $this->details,
          'Price' => $this->price,
          'Stock' => $this->stock == 0 ? 'Out of Stock' : $this->stock,
          'Discount' => $this->discount,

          'TotalPrice' => round((1-($this->discount/100))*$this->price,2),

          /* 
             totalprice with discount =>
                     17/100 = .17
                     1-.17 = .83
                     .83*price

           */
          // 'Rating' =>$this->reviews->sum('star')/$this->reviews->count(),
          // round for if divide by zero then it give undefined error so use round

          //if product don't any review then it will divided by zero then undefined it will gives error

          'Rating' =>$this->reviews->count() > 0 ? round($this->reviews->sum('star')/$this->reviews->count(),2) : 'No Review Yet',

          'href' => [

                    'review'=>route('reviews.index',$this->id)
                 ],

        ];
    }
}
