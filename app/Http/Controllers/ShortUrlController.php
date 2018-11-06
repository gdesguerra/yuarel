<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ShortUrlStoreRequest;
use App\ShortUrl;

class ShortUrlController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('short_url.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ShortUrlStoreRequest $request)
    {
        // Prepend "http://"" if it doesn't exists in the URL.
        if (!preg_match("~^(?:f|ht)tps?://~i", $request->long_url))
            $request->merge(['long_url' => "http://" . $request->long_url]);
        
        // If no user is logged in and no alias, use existing shortened urls that's created by guests.
        if (!Auth::check() && !$request->filled('alias')) {
            $existingShortUrl = ShortUrl::doesnthave('user')
                                    ->where('long_url', $request->long_url)
                                    ->first();

            if (!is_null($existingShortUrl))
                return redirect('/'.$existingShortUrl->code."/preview");
        }
        
        // Generate unique random code for the short url.
        do $code = str_random(5);
        while (ShortUrl::where('code', $code)->orWhere('alias', $code)->exists());

        // Merge new data to the request.
        $request->merge([
            'code' => $code,
            'user_id' => optional(auth()->user())->id
        ]);

        // Insert data in the database.
        $shortUrl = ShortUrl::create($request->all());

        $codeOrAlias = $request->filled('alias') ? $shortUrl->alias : $shortUrl->code;

        return redirect('/'.$codeOrAlias."/preview");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $codeOrAlias
     * @return \Illuminate\Http\Response
     */
    public function show($codeOrAlias)
    {
        $shortUrl = ShortUrl::where('code', $codeOrAlias)
                      ->orWhere('alias', $codeOrAlias)
                      ->firstOrFail();

        $shortUrl->visits_count++;
        $shortUrl->save();

        return redirect($shortUrl->long_url);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
