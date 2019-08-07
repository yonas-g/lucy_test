<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Internship\Services\Config;
use App\Internship\Services\HelloCash\HelloCashApi;

use App\Material;

class MaterialController extends Controller
{

    public function create()
    {
        return view('form');
    }
    public function view()
    {
        $material = Material::all();

        return view('index')->with([
            'materials' => $material
        ]);

        //retutn view which to view the list of material
    }
    public function show()
    {
        //show specified material
    }
    public function authenticate($req)
    {
        // return view('invoices', array("data" => Config::login($req->query('who'))));
        return Config::login($req);
    }

    public function buy($amount)

    {
        $response = json_decode($this->authenticate('yemane'));

        $invoices =  HelloCashApi::makeInvoice($amount, $response->token);
    }

    public function store(Request $request)
    {

        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'type' => 'required',
            'fee' => 'required',
            'cover_image' => 'image|nullable|max:1999'
        ]);
        //handle file upload


        // if ($request->hasFile('cover_image')) {

        // Get filename with the extension
        $filenameWithExt = $request->file('cover_image')->getClientOriginalName();

        // Get just file-name
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

        // GET just ext
        $extension = $request->file('cover_image')->getClientOriginalExtension();

        // Filename to store
        $fileNameToStore = $filename . '_' . time() . '.' . $extension;

        // upload Image
        $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);

        // } else {
        //     $fileNameToStore = 'noimage.jpg';
        // }

        //create post
        $material = new Material;

        $material->title = $request->input('title');
        $material->type = $request->input('type');
        $material->description = $request->input('description');
        $material->fee = $request->input('fee');
        $material->picture = $fileNameToStore;
        $material->save();

        return redirect('/createMaterial')->with('success', 'Marrial is created successfully');
    }
}
