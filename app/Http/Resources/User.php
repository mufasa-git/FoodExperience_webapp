<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class User extends JsonResource
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


        //   $photo = $this->photo  ?  $actual_link  . '/'. $photo->first()->url : null;


         
        return [
            'id' => $this->id,
            'role' => $this->role,
            'host' =>  $this->$host,
            'photo' =>   $this->$photo ,
            'reviews' => $this->reviews,
            // 'bookings' => $this->bookings,
            // 'notifications' => $this->notifications,
            'firstName' => $this->firstName,
            'lastName' => $this->lastName,
            'mobile' => $this->mobile,
            'email' => $this->email,
            'email_verified_at' => $this->email_verified_at,
            'mobile_verified' => $this->mobile_verified,
            'status' => $this->status->type,
            // 'password' => $this->password,
            // 'interests' => $this->interests,
            'gender' => $this->gender,
            'created_at' => (string)$this->created_at,
            'updated_at' => (string)$this->updated_at,
        ];
    }
    
}



