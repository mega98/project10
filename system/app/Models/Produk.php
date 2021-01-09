<?php 

namespace App\Models;

use App\User;

class Produk Extends Model{
	protected $table = 'produk';

	protected $casts = [
		'created_at' => 'datetime'
	];

	function seller(){
		return $this->belongsTo(User::class, 'id_user');
	}

	function getHargaAttribute(){
		return "Rp." .number_format($this->attributes['harga']);
	}
}