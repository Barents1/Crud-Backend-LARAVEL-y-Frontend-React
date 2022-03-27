<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Materiale
 * 
 * @property int $id
 * @property string $estado
 * @property string $nombre
 * @property string $descripcion
 * @property float $stock_minimo
 * @property int $categoria_id
 * @property Carbon|null $creado_a
 * @property Carbon|null $actualizado_a
 * 
 * @property Categoria $categoria
 *
 * @package App\Models
 */
class Materiale extends Model
{
	protected $table = 'materiales';
	public $timestamps = false;

	protected $casts = [
		'stock_minimo' => 'float',
		'categoria_id' => 'int'
	];

	protected $dates = [
		'creado_a',
		'actualizado_a'
	];

	protected $fillable = [
		'estado',
		'nombre',
		'descripcion',
		'stock_minimo',
		'categoria_id',
		'creado_a',
		'actualizado_a'
	];

	public function categoria()
	{
		return $this->belongsTo(Categoria::class);
	}
}
