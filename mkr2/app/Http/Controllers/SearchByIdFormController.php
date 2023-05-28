<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchByIdFormController extends Controller
{
    public function submit(Request $request)
    {
        $id = $request->input('id');
        return redirect( route("grade_id", [
            'user' => $request->user(),
            'id' => $id
        ]));
    }
}
