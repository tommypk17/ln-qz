<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Link;

class LinksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.linqz')->with([
            'name' => 'Links',
            'linqz' => Link::paginate(10)
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $long_url = $request->long_url;
        if(Link::Where('long_url', $long_url)->exists()){
            return redirect('/', '302')->with('error', 'This URL is already registered with Ln-Qz! Here is the Linq: ' .'http://ln-qz.co/'. Link::Where('long_url', $long_url)->first()->slug);
        }
        $link = new Link();
        $link->long_url = $long_url;
        if(auth()->check()){
            $link->user_id = auth()->user()->id;
        }else{
            $link->user_id = NULL;
        }
        $link->title = parse_url($link->long_url, PHP_URL_HOST);
        $slug = substr(md5($link->long_url . date("Y-m-d H:i:s")),0,7);
        $link->slug = $slug;
        $reserved_slugs = ['/','/linqz', '/dashboard'];
        while(Link::Where('slug', $slug)->exists() and !in_array($slug, $reserved_slugs)){
            $slug = substr(md5($link->long_url . date("Y-m-d H:i:s")),0,7);
            $link->slug = $slug;
        }
        $link->save();
        return redirect('/')->with([
            'success' => 'Linq Created! '.'http://ln-qz.co/'.$slug,
            'url' => 'http://ln-qz.co/'.$slug
            ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        if(Link::Where('slug', $slug)->exists()){
            return redirect(Link::Where('slug', $slug)->first()->long_url.'', 302);
        }else{
            return redirect('/', 301)->with('error', 'Linq: http://ln-qz.co/'.$slug.' has not been registered yet!');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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

    public function find($slug){
//        return '{"res":"'.$slug.'"}';
        if(Link::Where('slug', $slug)->exists()){
            $links = Link::Where('slug', $slug)->get();
            return $links;
        }
        return '{"res":"no links"}';
    }
}
