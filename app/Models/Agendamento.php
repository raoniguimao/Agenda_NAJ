<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agendamento extends Model
{

	protected $table = 'agendamentos';

    protected $fillable = [
        'assistido_id', 'agendamento_id', 'descricao', 'user_id'
    ];
    use HasFactory;
    public function user(){
		return $this->belongsTo('App\Models\User');
	}
    public function agenda(){
		return $this->belongsTo('App\Models\Agenda');
	}
  public function assistido(){
		return $this->belongsTo('App\Models\Assistido');
	}
}
