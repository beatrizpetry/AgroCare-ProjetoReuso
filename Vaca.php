<?php

use Illuminate\Database\Eloquent\Model;

class Vaca extends Model
{
    protected $table = 'Vaca';
    protected $primaryKey = 'num_ID_Vaca';
    public $timestamps = false;
    protected $fillable = ['num_ID_Vaca', 'data_Nasc_Vaca', 'raça_Vaca', 'estado_Inseminação'];

    public static function cadastrarVaca($data)
    {
        return self::create($data);
    }

    public function deletarVaca()
    {
        return $this->delete();
    }

    public static function buscarVaca($num_ID_Vaca)
    {
        return self::where('num_ID_Vaca', 'LIKE', "%$num_ID_Vaca%")->get();
    }
}
