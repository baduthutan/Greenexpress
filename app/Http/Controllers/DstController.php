<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dst;
use App\Http\Controllers\Controller;


class DstController extends Controller
{
    public function index()
    {
        $dst = Dst::first();

        $data = [
            'page_title' => 'DST',
            'base_url'       => env('APP_URL'),
            'app_name'       => env('APP_NAME'),
            'app_name_short' => env('APP_NAME_ABBR'),
            'dst' => $dst
        ];

        return view('admin.dst.main', $data);
    }
    public function edit()
    {
        $dst = Dst::first();

        $data = [
            'page_title' => 'Edit DST',
            'base_url'       => env('APP_URL'),
            'app_name'       => env('APP_NAME'),
            'app_name_short' => env('APP_NAME_ABBR'),
            'dst' => $dst
        ];

        return view('admin.dst.edit', $data);
    }
    public function update( Request $request)
    {
        dd($request->method(), $request->all());

        $input = $request->all();

        Dst::first()->update($input);
        return redirect()->back()->with('success', 'Update successfully.');
    }
   
}
