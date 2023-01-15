<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Newsletter\Facades\Newsletter as SpatieNewsletter;

class Newsletter extends Model
{
    use HasFactory;

    protected $table = "newsletter";
    protected $fillable = ['email'];

    public static function store($request)
    {
        self::create( $request->all() );

        if ( ! SpatieNewsletter::isSubscribed($request->email) )
        {
            SpatieNewsletter::subscribe($request->email);
            return response()->json(200);
        }
    }
}
