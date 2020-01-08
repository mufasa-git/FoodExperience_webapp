<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Wajba extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]";
     
        $home =  $this->photos()->where('type', 0)->get() ;
      
        $banner = $this->photos()->where('type', 1)->get();
     
        $gallery = $this->photos()->where('type', 2)->get();

        $host =  $this->host->user->photo ?  $actual_link . '/'. $this->host->user->photo->first()->url : [];

        //  dd($host);
        // dd($actual_link . '/'.$home->first()->url);
        
        $commission = 20/100 * $this->price;
        return [
            'id' => $this->id,
            'user'=> $this->host->user,
            'host' => $host,
            'host_photo' =>   $host ?  $actual_link . '/' . optional($home->first()) : [],
            'status' => $this->status->type,
            'place' => $this->place_category,
            'food' => $this->food_category,
            'title' => $this->title,
            'price' => $this->price ,
            'description' => $this->description,
            'door_type' => $this->door_type,
            'healthConditionsAndWarnings' => $this->healthConditionsAndWarnings,
            'city' => $this->city,
            'city_name' => $this->city_name,
            'baseNumberOfSeats' => $this->baseNumberOfSeats,
            'totalRate' => $this->totalRate,
            'dates' => $this->dates,
            'time' => $this->time,
            'homepage_photo' =>  $home ?   $actual_link . '/' . optional($home->first())->url  : [] ,
            'banner_photo' =>     $banner ? $actual_link . '/'. optional($banner->first())->url: [] ,
            'gallery_photos' =>   $gallery ? $actual_link . '/'. optional($gallery->first())->url : [],
             
             //_mobile
            'homepage_photo_mobile ' => [$home ?   $actual_link . '/' . optional($home->first())->url  : [] ] ,
             'banner_photo_mobile ' =>   [ $banner ? $actual_link . '/'. optional($banner->first())->url: [] ],
             'gallery_photos_mobile ' => [ $gallery ? $actual_link . '/'. optional($gallery->first())->url : []],
             //end mobile
            'latitude' => $this->latitude,
            'longitude' => $this->longitude,
            'created_at' => (string)$this->created_at,
            'updated_at' => (string)$this->updated_at,
        ];
    }
}
