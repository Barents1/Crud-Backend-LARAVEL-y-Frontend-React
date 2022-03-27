<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Categoria
 * 
 * @property int $id
 * @property string $estado
 * @property string $nombre
 * @property Carbon|null $creado_a
 * @property Carbon|null $actualizado_a
 * 
 * @property Collection|Materiale[] $materiales
 *
 * @package App\Models
 */
class Categoria extends Model
{
	protected $table = 'categorias';
	public $timestamps = false;

	protected $dates = [
		'creado_a',
		'actualizado_a'
	];

	protected $fillable = [
		'estado',
		'nombre',
		'creado_a',
		'actualizado_a'
	];

	public function materiales()
	{
		return $this->hasMany(Materiale::class);
	}
}
