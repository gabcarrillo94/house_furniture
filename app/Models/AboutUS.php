<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AboutUS extends Model
{
  protected $table = 'aboutus';

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = ['id', 'shortDescription', 'fullDescription', 'usImage'];

  public static function getAll(){
      return \DB::table('aboutus')->get();
  }
}
