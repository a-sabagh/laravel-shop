<?php

namespace App\Http\Controllers;

use App\Course;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class CourseController extends Controller
{
    public function course()
    {
        return view('upload-excel');
    }

    public function upload(Request $request)
    {
        $tmp = $request->file('course')->getRealPath();
        //dump($tmp);

        Excel::load($tmp, function($reader) {
            $results = $reader->get()->toArray();
            //dump($results);
            $result = Course::insert($results);
            
            //dump($result);
            if($result)
            {
                echo 'import successfully';
            }
            else
            {
                echo 'import faile';
            }
        });
    }
}
