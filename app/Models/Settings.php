<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    use HasFactory;

    protected $fillable = ['page_title, about_footer, copyright, logo, favicon,
        youtube, facebook, twitter, instagram, twitch'];
}
