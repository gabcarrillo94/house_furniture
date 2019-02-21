<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
  protected $table = 'banners';

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = ['id', 'url', 'dimension', 'orientation', 'priority', 'state'];

  public static function getAll(){
      return \DB::table('banners')->get();
  }
  public static function getBanner ($idBanner) {
      return \DB::table('banners')->where('id','=',$idBanner)->get();
  }
}
