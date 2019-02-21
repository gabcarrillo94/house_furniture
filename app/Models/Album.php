<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
  protected $table = 'albums';

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = ['id', 'ubication', 'name', 'description', 'mainImage', 'state'];

  public static function getAll(){
      return \DB::table('albums')->get();
  }
}
