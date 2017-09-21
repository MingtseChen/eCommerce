<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 13 Sep 2017 04:30:17 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * App\Models\Product
 *
 * @property int $id
 * @property string $name
 * @property int $price
 * @property string $release_date
 * @property string $auther
 * @property string $retailer
 * @property string $desc
 * @property string $ISBN
 * @property string|null $pic_path
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product whereAuther($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product whereDesc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product whereISBN($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product wherePicPath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product whereReleaseDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product whereRetailer($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Product extends Eloquent
{
	//protected $table = 'products';
	protected $fillable = ['name', 'price', 'release_date','auther','retailer','desc','ISBN','pic_path'];
}
