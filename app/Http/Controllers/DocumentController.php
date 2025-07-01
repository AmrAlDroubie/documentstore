<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\StreamedResponse;
use thiagoalessio\TesseractOCR\TesseractOCR;

class DocumentController extends Controller
{
    public function show()
    {
        return view('addDoc', ['types' => $this->getTypes()]);
    }


    private function getTypes()
    {
        $document_types = DB::table('types')->orderBy('value')->get();
        return $document_types;
    }


    public function store(Request $request)
    {
        // $request->validate([
        //     'doc-file' => 'file|mimes:jpg,jpeg,png,pdf|max:6144',
        // ]);


        $doc_type = $request->input('doc-type');
        $desc = $request->input('doc-desc');
        $file_path = $request->file('doc-file')->store('documents');
        try {
            $keywords = (new TesseractOCR(storage_path('/app/private/' . $file_path)))->lang('ara', 'eng')->run();
            trim($keywords);
        } catch (Exception $e) {
            $keywords = null;
        }
        $query = DB::table('documents')->insert([
            'url' => $file_path,
            'description' => $desc,
            'user_id' => Auth::id(),
            'type' => $doc_type ?? -1,
            'keywords' => $keywords
        ]);
        if ($query) {
            return view('addDoc', ['msg' => 'تم تسجيل الوثيقة بنجاح', 'types' => $this->getTypes()]);
        } else {
            return view('addDoc', ['msg' => 'فشل تسجيل الوثيقة', 'types' => $this->getTypes()]);
        }
    }



    public function createFileUrl($id)
    {
        $filename = DB::table('documents')->where('id', '=', $id)->where('user_id', '=', Auth::id())->first();
        if (empty($filename)) {
            abort(404, 'File not found');
        }
        $filename = $filename->url;

        $path = storage_path('app/private/' . $filename);

        return response()->file($path);
    }
}
