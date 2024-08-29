<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\User;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index()
    {
        $questions = Question::get();
        return view('gayaBelajar', [
            'questions' => $questions 
        ]);
    }

    public function store(Request $request)
    {
        $countedValues = array_count_values($request->option);

        $countA = 0;
        $countB = 0;
        $countC = 0;

        if(isset($countedValues['a'])) {
            $countA = $countedValues['a'];
        }
        if(isset($countedValues['b'])) {
            $countB = $countedValues['b'];
        }
        if(isset($countedValues['c'])) {
            $countC = $countedValues['c'];
        }

        $gayaBelajar = null;

        if($countA > $countB && $countA > $countC) {
            $gayaBelajar = 'visual';
        } else if ($countB > $countA && $countB > $countC) {
            $gayaBelajar = 'auditori';
        } else {
            $gayaBelajar = 'kinestetik';
        }

        User::where('id', auth()->user()->id)->update([
            'gaya_belajar' => $gayaBelajar
        ]);

        return redirect("/user/hasil/$gayaBelajar");
    }

    public function hasil($hasil)
    {
        $gayaBelajar = null;
        $deskripsiGayaBelajar = null;

        if($hasil === 'visual') {
            $gayaBelajar = 'Visual';
            $deskripsiGayaBelajar = 'Gaya Belajar Visual adalah proses pembelajaran yang mengandalkan pengelihatan sebagai penerima informasi dan pengetahuan. Seseorang yang memiliki gaya belajar visual akan mudah menerima gagasan, konsep, data dan informasi yang dikemas dalam bentuk gambar.';
        } else if($hasil === 'auditori') {
            $gayaBelajar = 'auditori';
            $deskripsiGayaBelajar = 'Gaya Belajar Auditori adalah proses pembelajaran yang mengandalkan pendengaran sebagai penerima informasi dan pengetahuan. Seseorang dengan tipe belajar seperti ini lebih memfokuskan mendengar pembicaraan guru atau dosen dengan baik dan jelas tanpa perlu tampilan visual saat belajar.';
        } else {
            $gayaBelajar = 'kinestetik';
            $deskripsiGayaBelajar = 'Gaya Belajar Kinestetik adalah proses pembelajaran yang mengandalkan sentuhan atau rasa untuk menerima informasi dan pengetahuan. Seseorang yang memiliki gaya belajar kinestetik cenderung suka melakukan, menyentuh, merasa, bergerak dan mengalami secara langsung.';
        }

        return view('hasil', [
            'gayaBelajar' => $gayaBelajar,
            'deskripsiGayaBelajar' => $deskripsiGayaBelajar
        ]);
    }
}
