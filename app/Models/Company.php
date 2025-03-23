<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = ['company_name','email','logo','website'];

    public function employee(){
        return $this->hasOne(Employee::class,'company_id','id');
    }

}
