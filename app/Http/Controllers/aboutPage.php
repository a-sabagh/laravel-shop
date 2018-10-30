<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class aboutPage extends Controller {

    public function index($author = null)
    {
        if(empty($author)){
            $author = "Unknown Author";
        }
        $title = 'About Us';
        $persons = [
            ["firstname"=>"Abolfazl","lastname"=>"Sabagh"],
            ["firstname"=>"Sahar","lastname"=>"Mohammadi"],
            ["firstname"=>"Kylian","lastname"=>"Mbappe"]
        ];
        return view("about", compact('persons','author','title'));
    }

}
