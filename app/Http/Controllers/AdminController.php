<?php

namespace App\Http\Controllers;

use App\Models\Beranda_Model;
use App\Models\Berita;
use App\Models\Contact_model;
use App\Models\Potensi_model;
use App\Models\Visit_model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    // ===== BERANDA AREA =====
    public function index()
    {
        $data = Beranda_Model::all();
        return view('skripsi.admin.dashboard-admin', ['title' => 'Dashboard Admin', 'title_admin' => 'Kelola Home', 'data' => $data]);
    }
    public function update_beranda(Request $request)
    {

        // Mengambil semua data dari tag input
        $header1 = $request->input('header1');
        $header2 = $request->input('header2');
        $header3 = $request->input('header3');
        $subtitle1 = $request->input('subtitle1');
        $subtitle2 = $request->input('subtitle2');
        $subtitle3 = $request->input('subtitle3');
        $request->validate([
            'slide1-image' => 'image|mimes:jpeg,png,svg,jpg',
            'slide2-image' => 'image|mimes:jpeg,png,svg,jpg',
            'slide3-image' => 'image|mimes:jpeg,png,svg,jpg',
        ]);

        // return 'haha';
        // return $request->file('slide1-image');

        if ($request->hasFile('slide1-image')) {


            $image1 = $request->file('slide1-image');
            $imageName = md5(uniqid()) . '.' . $image1->getClientOriginalName();
            $image1->move(public_path('assets/img/skripsi/beranda'), $imageName);

            $image1 = $imageName;
        } else {
            $image1 = $request->input('def-file-name1');
        }

        if ($request->hasFile('slide2-image')) {


            $image2 = $request->file('slide2-image');
            $imageName = md5(uniqid()) . '.' . $image2->getClientOriginalName();
            $image2->move(public_path('assets/img/skripsi/beranda'), $imageName);

            $image2 = $imageName;
        } else {
            $image2 = $request->input('def-file-name2');
        }

        if ($request->hasFile('slide3-image')) {

            $image3 = $request->file('slide3-image');
            $imageName3 = md5(uniqid()) . '.' . $image3->getClientOriginalName();
            $image3->move(public_path('assets/img/skripsi/beranda'), $imageName3);

            $image3 = $imageName3;
        } else {
            $image3 = $request->input('def-file-name3');
        }

        DB::table('beranda__models')->where("id", 1)->update([
            'header' => $header1,
            'span' => $subtitle1,
            'image' => $image1
        ]);

        DB::table('beranda__models')->where("id", 2)->update([
            'header' => $header2,
            'span' => $subtitle2,
            'image' => $image2
        ]);

        DB::table('beranda__models')->where("id", 3)->update([
            'header' => $header3,
            'span' => $subtitle3,
            'image' => $image3
        ]);

        return redirect('dashboard');


        // return time() . "." . $image->getClientOriginalName();
        // return $header1 . $header2 . $header3 . "<br>subs : " . $subtitle1 . $subtitle2 . $subtitle3 . "<br>img :" . $image1 . "<br>" . $image2 . "<br>" . $image3 . "<br>";
    }
    // ===== BERANDA AREA =====


    // ===== PEMERINTAH AREA =====
    public function kelola_pemerintah()
    {
        $dusun = DB::table('pemerintah__models')->where('type', 'kepala dusun')->get();
        $staf = DB::table('pemerintah__models')->where('type', 'staf')->get();
        $kepdes = DB::table('pemerintah__models')->where('jabatan', 'Kepala Desa')->first();
        $kepsed = DB::table('pemerintah__models')->where('jabatan', 'Kepala Desa')->first();
        $sekdes = DB::table('pemerintah__models')->where('jabatan', 'sekretaris desa')->first();
        $visi = DB::table('data_umum__models')->where('key', 'visi')->first();
        $misi = DB::table('data_umum__models')->where('key', 'misi')->first();
        $sejarah = DB::table('data_umum__models')->where('key', 'sejarah')->first();


        return view('skripsi.admin.pemerintah-admin', [
            'title' => 'Dashboard Admin',
            'title_admin' => 'Kelola Pemerintah',
            'visi' => $visi,
            'misi' => $misi,
            'sejarah' => $sejarah,
            'dusun' => $dusun,
            'staf' => $staf,
            'kepdes' => $kepdes,
            'sekdes' => $sekdes
        ]);
        // return $kepdes;
    }
    public function update_pemerintah(Request $request)
    {
        $sejarah = $request->input('sejarah');
        // $visi = $request->input('visi');
        // $misi = $request->input('misi');

        $kepdes = $request->input('kepdes');
        $sekdes = $request->input('sekdes');
        $KasiPemerintahan = $request->input('kaurkasi_0');
        $KasiKesejahteraan = $request->input('kaurkasi_1');
        $KaurUmum = $request->input('kaurkasi_2');
        $KaurKeuangan = $request->input('kaurkasi_3');
        $stafPemerintahan = $request->input('staf_4');
        $stafKesejahteraan = $request->input('staf_5');
        $stafUmum = $request->input('staf_6');
        $stafKeuangan = $request->input('staf_7');

        // $dataToUpdate = [
        //     $kepdes, $sekdes, $KasiPemerintahan, $KasiKesejahteraan, $KaurKeuangan,  $KaurUmum, $stafPemerintahan, $stafKesejahteraan, $stafKeuangan, $stafUmum
        // ];

        $dataToUpdate = [
            ['Kepala Desa', $kepdes],
            ['Sekretaris Desa', $sekdes],
            ['Kasi Pemerintahan', $KasiPemerintahan],
            ['Kasi Kesejahteraan Pelayanan', $KasiKesejahteraan],
            ['Kaur Keuangan', $KaurKeuangan],
            ['Kaur Umum dan Perencanaan', $KaurUmum],
            ['Staf Pemerintahan', $stafPemerintahan],
            ['Staf Kesejahteraan Pelayanan', $stafKesejahteraan],
            ['Staf Keuangan', $stafKeuangan],
            ['Staf Umum dan Perencanaan', $stafUmum],
        ];

        // return $dataToUpdate[0];
        $datasementara = '';
        foreach ($dataToUpdate as $data) {
            $datasementara = $datasementara . $data[1];
        }
        return $datasementara;
        // DB::table('data_umum__models')->where('key', 'sejarah')->update([
        //     'value' => $sejarah
        // ]);
        // return redirect('kelola-pemerintah');

        // return $dataToUpdate;

        // foreach ($dataToUpdate as $jabatan => $nama) {
        //     DB::table('pemerintah__models')->where('jabatan', $jabatan)->update(['nama' => $nama]);
        // }

        // return redirect('kelola-pemerintah');
    }
    // ===== PEMERINTAH AREA =====


    // ===== VISIT AREA =====
    public function kelola_visit()
    {
        $data = Visit_model::all();
        return view('skripsi.admin.visit-admin', ['title' => 'Dashboard Admin', 'title_admin' => 'Kelola Visit', 'visitData' => $data]);
    }

    public function tambahkanDataVisit(Request $request)
    {
        $location = $request->input('lokasi');
        $dusun = $request->input('dusun');
        $latlang = $request->input('latlang');
        $tipe = $request->input('type');
        $ikon = $request->input('icon');

        $data = array('location' => $location, 'dusun' => $dusun, 'latlang' => $latlang, 'type' => $tipe, 'icon_name' => $ikon);
        DB::table('visit_models')->insert($data);

        return back();
    }

    public function getDataUpdate($id)
    {
        $data = DB::table('visit_models')->where('id', $id)->first();
        return $data;
    }

    public function update(Request $request)
    {
        DB::table('visit_models')->where('id', $request['id'])->update([
            'location' => $request['lokasi'],
            'dusun' => $request['dusun'],
            'latlang' => $request['latlang'],
            'type' => $request['type'],
            'icon_name' => $request['icon'],
        ]);


        return redirect('kelola-visit');
        // return $request;
    }

    public function destroy($id)
    {
        $record = Visit_model::find($id);

        if (!$record) {
            return 'data tidak ditemukan!';
        }

        $record->delete();
        return redirect('kelola-visit');
    }
    // ===== VISIT AREA =====


    // ===== POTENSI AREA =====
    public function kelola_potensi()
    {
        $data = Potensi_model::all();
        return view('skripsi.admin.potensi-admin', ['title' => 'Dashboard Admin',  'title_admin' => 'Kelola Potensi', 'data' => $data]);
    }
    public function tambahkanDataPotensi(Request $request)
    {
        $request->validate([
            // 'JSON-file' => 'requiered|mimes:JSON'
        ]);

        $potensi = $request->input('potensi');
        $pemilik = $request->input('pemilik');
        $dusun = $request->input('dusun');
        $luas = $request->input('luas-lahan');
        // $jsonFile = $request->file('JSON-file');

        // $jsonFileName = $jsonFile->getClientOriginalName();
        // $path = $jsonFile->storeAs('public/assets/data_spasial/' . $jsonFileName);

        $data = array('potensi' => $potensi, 'pemilik' => $pemilik, 'dusun' => $dusun, 'luas_lahan' => $luas);
        DB::table('potensi_models')->insert($data);
        return back();
    }

    public function getDataPotensi($params)
    {
        $data = DB::table('potensi_models')->where('id', $params)->first();
        return $data;
    }

    public function updatePotensi(Request $request)
    {
        DB::table('potensi_models')->where('id', $request['id'])->update([
            'potensi' => $request['potensi'],
            'dusun' => $request['dusun'],
            'luas_lahan' => $request['luas'],
            'pemilik' => $request['pemilik']
        ]);


        return redirect('kelola-potensi');
        // return $request;
    }
    // ===== POTENSI AREA =====


    // ===== BERITA AREA =====
    public function kelola_berita(){
        return view('skripsi.admin.berita-admin', ['title' => 'Dashboard Admin']);
    }

    public function simpan_berita(Request $request){
        $request->validate([
            'content'=> 'required|string',
            'title' => 'required|string',
            'category' => 'required|string'
        ]);

        $berita = new Berita;
        $berita->content = $request->input('content');
        $berita->title = $request->input('title');
        $berita->kategori_id = $request->input('category');
        $berita->author_id = $request->input('author_id');
        $berita->img = 'def-profile.jpg';
        $berita->save();

        // return response()->json(['message' => 'Konten berita berhasil disimpan'], 200);
        return $berita;
        
    }
    // public function hasil_berita($data){
    //     return $data;
    // }
    // ===== END OF BERITA AREA =====


    // ===== CONTACT AREA =====
    public function kelola_contact()
    {
        $data = Contact_model::all();
        return view('skripsi.admin.contact-admin', ['title' => 'Dashboard Admin', 'title_admin' => 'Kelola Contact', 'data' => $data]);
    }
    public function tambahkanDataContact(Request $request)
    {
        $request->validate([
            'file' => 'requierd|mimes:png, jpg, pdf, svg'
        ]);

        $nama = $request->input('nama');
        $pelayanan = $request->input('pelayanan');
        $whatsapp = $request->input('whatsapp');
        $file = $request->file('foto');

        $url_name = $file->getClientOriginalName();
        $path = $file->storeAs('public/img/contact', $file->getClientOriginalName());

        $data = array('nama' => $nama, 'pelayanan' => $pelayanan, 'whatsapp' => $whatsapp, 'image_url' => $url_name);
        DB::table('contact_models')->insert($data);

        return back();
        // return $url_name;
    }
    public function getDataContact($id)
    {
        $data = DB::table('contact_models')->where('id', $id)->first();
        return $data;
    }


    // ===== CONTACT AREA =====

}
