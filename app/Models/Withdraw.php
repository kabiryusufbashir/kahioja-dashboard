<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Withdraw extends Model
{
    //protected $fillable = ['user_id', 'method', 'acc_email', 'iban', 'country', 'acc_name', 'address', 'swift', 'reference', 'amount', 'fee', 'created_at', 'updated_at', 'status'];
    protected $fillable = ['user_id', 'method', 'acc_email', 'iban', 'country', 'acc_name', 'address', 'reference', 'amount', 'fee', 'created_at', 'updated_at', 'status'];
    
    public function user()
    {
        return $this->belongsTo('App\Models\User')->withDefault(function ($data) {
			foreach($data->getFillable() as $data){
				$data[$data] = __('Deleted');
			}
		});
    }

    public function logistics()
    {
        return $this->belongsTo('App\Models\Logistic')->withDefault(function ($data) {
            
            foreach($data->getFillable() as $data){
				$data[$data] = __('Deleted');
			}

		});
    }
}
