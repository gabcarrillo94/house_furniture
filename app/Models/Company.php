<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
  protected $table = 'company';

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */

  protected $fillable = ['id', 'numberPhone', 'mainEmail', 'secondEmail', 'direction', 'bannerTitle'];

  public static function getAll(){
      return \DB::table('company')->get();
  }
}
