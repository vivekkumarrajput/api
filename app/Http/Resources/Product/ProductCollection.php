<?php

namespace App\Http\Resources\Product;

use Illuminate\Http\Resources\Json\Resource;


class ProductCollection extends Resource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [

           'Name' => $this->name,
           'TotalPrice' => round((1-($this->discount/100))*$this->price,2),
           'Discount' => $this->discount,
           'Rating' =>$this->reviews->count() > 0 ? round($this->reviews->sum('star')/$this->reviews->count(),2) : 'No Review Yet',

           'href' => [

                    'link'=>route('products.show',$this->id)
                 ]
        ];
    }
}
