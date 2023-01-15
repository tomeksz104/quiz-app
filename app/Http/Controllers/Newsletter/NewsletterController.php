<?php

namespace App\Http\Controllers\Newsletter;


use App\Http\Controllers\Controller;
use App\Http\Requests\NewsletterRequest;
use App\Models\Newsletter;

class NewsletterController extends Controller
{
    public function store(NewsletterRequest $request)
    {
        return Newsletter::store( $request );
    }
}
