<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ShortUrl;

class PreviewController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  int  $codeOrAlias
     * @return \Illuminate\Http\Response
     */
    public function show($codeOrAlias)
    {
        $shortUrl = ShortUrl::where('code', $codeOrAlias)->orWhere('alias', $codeOrAlias)->first();

        $longUrl = $shortUrl->long_url;
        $shortenedUrl = url('/'.$codeOrAlias);

        // Get length of both url.
        $longUrlLength = strlen($shortUrl->long_url);
        $shortenedUrlLength = strlen($shortenedUrl);

        return view('short_url.preview', compact('longUrl', 'shortenedUrl', 'longUrlLength', 'shortenedUrlLength'));
    }
}
