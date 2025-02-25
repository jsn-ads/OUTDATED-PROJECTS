<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function imageupload(Request $request)
    {

        //validando o tipo e o tamanho da imagem

        $request->validate([
            'file'=>'required|image|mimes:jpeg,jpg,png'
        ]);

        //nome da imagem

        $imageName = time().'.'.$request->file->extension();

        //caminho para salvar a imagem

        $request->file->move(public_path('media/image'),$imageName);

        //retorndo a imagem salvo

        return [
            'location' => asset('media/image/'.$imageName)
        ];

    }
}
