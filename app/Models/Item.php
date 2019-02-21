<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
  protected $table = 'items';
  protected $primaryKey = 'idAlbum';
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */

  protected $fillable = ['id', 'type', 'name', 'itemImage', 'ubication', 'idAlbum', 'state'];

  /*ubicacion del album que contiene a este item, si
  ningun album lo contiene entonces se guarda en el directorio de albums/general*/

  public static function getAll(){
      return \DB::table('items')->get();
  }
}
