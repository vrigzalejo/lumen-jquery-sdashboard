<?php namespace App\Http\Controllers;

use App\Content;
use Illuminate\Http\Request;

class ContentController extends Controller
{
    public function showAllContents()
    {
        return response()->json(Content::all());
    }

    public function showOneContent($id)
    {
        return response()->json(Content::find($id));
    }

    public function create(Request $request)
    {
        $author = Content::create($request->all());

        return response()->json($author, 201);
    }

    public function update($id, Request $request)
    {
        $author = Content::findOrFail($id);
        $author->update($request->all());

        return response()->json($author, 200);
    }

    public function delete($id)
    {
        Content::findOrFail($id)->delete();

        return response('Deleted Successfully', 200);
    }
}
