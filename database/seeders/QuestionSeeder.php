<?php

namespace Database\Seeders;

use App\Models\Question;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Question::create([
            'question' => 'kalau ada orang yang meminta petunjuk jalan, biasanya saya akan',
            'option1' => 'menggambar peta jalan pada sebuah kertas',
            'option2' => 'memberitahu secara lisan',
            'option3' => 'mencoba memberitahu dengan isyarat tangan atau langsung mengantarnya',
        ]);

        Question::create([
            'question' => 'saya paling suka permainan',
            'option1' => 'kata bergambar',
            'option2' => 'acak kata',
            'option3' => 'pantomin',
        ]);

        Question::create([
            'question' => 'saya ingin sekali nonton di bioskop karena',
            'option1' => 'melihat cover iklan yang menarik',
            'option2' => 'membaca synopsis cerita',
            'option3' => 'menonton potongan film',
        ]);

        Question::create([
            'question' => 'saya punya guru favorit. saat mengajar, ia selalu menggunakan',
            'option1' => 'cemarah, diskusi, dan deba',
            'option2' => 'diagram, bagan, alur, dan slide',
            'option3' => 'trial, uji coba, dan praktik',
        ]);

        Question::create([
            'question' => 'ketika bicara, biasanya saya paling suka',
            'option1' => 'suka berbicara, perlahan, dan jelas, tapi tidak suka mendengarkan lama',
            'option2' => 'suka mendengarkan orang lain berbicara, baru kemudian berbicara',
            'option3' => 'berbicara dengan menggunakan bahasa tubuh dan gerakan yang banyak',
        ]);

        Question::create([
            'question' => 'ketika mengerjakan sesuatu, saya biasanya',
            'option1' => 'membaca instruksi nya terlebih dahulu',
            'option2' => 'mendengarkan instruksi dari orang lain, baru mengerjakan',
            'option3' => 'langsung melakukan uji coba',
        ]);

        Question::create([
            'question' => 'ketika lupa sesuatu, biasanya saya',
            'option1' => 'berusaha mengingat dari gambaran bentuk, warna, atau cirinya',
            'option2' => 'berusaha mengingat dari ciri suaranya',
            'option3' => 'berusaha mengingat apa yang dilakukan penggunanya',
        ]);

        Question::create([
            'question' => 'hal yang paling bisa saya ingat dari seseorang adalah',
            'option1' => 'ekspresi wajah yang menawan',
            'option2' => 'suaranya yang khas',
            'option3' => 'gerakan tubuh yang memukau',
        ]);

        Question::create([
            'question' => 'saat berkomunikasi, saya suka kalau',
            'option1' => 'bertemu secara langsung',
            'option2' => 'bicara melalui telpon',
            'option3' => 'bertemu dalam sebuah kegiatan aktif',
        ]);

        Question::create([
            'question' => 'kemampuan yang saya bisa dan paling saya sukai adalah',
            'option1' => 'menggambar, melukis, atau mewarnai',
            'option2' => 'bernyanti, atau bermain alat music',
            'option3' => 'menari atau beladiri',
        ]);

        Question::create([
            'question' => 'ketika santai, saya biasanya',
            'option1' => 'membaca novel atau buku',
            'option2' => 'mendengarkan music atau radio',
            'option3' => 'berolahraga atau bermain',
        ]);

        Question::create([
            'question' => 'saat marah, saya biasanya',
            'option1' => 'lebih memilih untuk diam saja',
            'option2' => 'memaki dan berkata-kata secara emosional',
            'option3' => 'membanting barang atau memukul',
        ]);

        Question::create([
            'question' => 'konsentrasi saya terganggu jika',
            'option1' => 'kondisi ruangan yang berantakan dan tidak rapi',
            'option2' => 'bising dan suara gaduh',
            'option3' => 'gerakan yang ada di sekitar',
        ]);

        Question::create([
            'question' => 'saat belajar, saya biasanya',
            'option1' => 'membuat catatan atau rangkuman dari materi',
            'option2' => 'menghafal sambil menggunakan suara',
            'option3' => 'melakukan praktik atau simulasi dari pelajaran',
        ]);

        Question::create([
            'question' => 'saat membaca sesuatu, saya biasanya',
            'option1' => 'menyukai bacaan yang bercerita tentang detil peristiwa',
            'option2' => 'menyukai bacaan yang memiliki percakapan banyak antar tokoh',
            'option3' => 'menyukai bacaan yang melibatkan aksi dari tokohnya',
        ]);
    }
}
