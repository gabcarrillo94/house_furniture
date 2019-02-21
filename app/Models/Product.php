<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
  protected $table = 'products';

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = ['id', 'name', 'code', 'description', 'category',
                         'mainImage', 'oneImage', 'towImage', 'threeImage',
                         'state', 'price', 'percent', 'inStock', 'soldOut'];

  public static function getAll(){
      return \DB::table('products')->get();
  }
}
