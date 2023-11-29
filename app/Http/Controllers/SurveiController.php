<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Survei;
use App\Models\Pertanyaan;
use Illuminate\Support\Facades\Auth;
use DB;

class SurveiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kliensurvei = Auth::user()->survei;
        // $survei = Survei::all();
        return view('klien.detail_survei', compact('kliensurvei'));
    }

    public function index_pembayaran()
    {
        $kliensurvei = Auth::user()->survei;
        return view('klien.daftar_pembayaran', compact('kliensurvei'));
    }

    public function index_verifikasi()
    {
        $kliensurvei = Auth::user()->survei;
        return view('klien.verifikasi', compact('kliensurvei'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('klien.buatsurvei');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return dump($request);
        try {
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'tgl_mulai' => 'required|date',
            'tgl_selesai' => 'required|date|after:tgl_mulai',
            'jumlah_responden' => 'required|numeric',
            'pertanyaan.*.pertanyaan' => 'required|string|max:255',
            'pertanyaan.*.opsi.*' => 'required|string|max:255',
        ]);

        $id_klien = auth()->user()->id_klien; // Assuming the user is logged in and 'id' is the user's ID.

        $survei = Survei::create([
            'id_klien' => $id_klien,
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'tgl_mulai' => $request->tgl_mulai,
            'tgl_selesai' => $request->tgl_selesai,
            'jumlah_responden' => $request->jumlah_responden,
            'status' => 'Sortir'
        ]);

        $survei->save();
        // Add questions and options
        foreach ($request->input('pertanyaan') as $pertanyaan) {
            $question = $survei->pertanyaan()->create([
                'pertanyaan' => $pertanyaan['pertanyaan'],
            ]);

            $question->opsi()->createMany(
                array_map(function ($opsi) {
                    return ['opsi' => $opsi];
                }, $pertanyaan['opsi'])
            );
        }

        return response()->json(['message' => 'Pertanyaan berhasil disimpan']);
        // return redirect()->route('detail_survei')->with('success', 'Survei Anda Berhasil Ditambahkan!');
        } catch (\Illuminate\Validation\ValidationException $e) {
            // Tangkap pesan kesalahan validasi dan print ke log atau respons JSON
            $errors = $e->errors();
            return dump($errors); // 422 adalah status HTTP untuk Unprocessable Entity
            return dump($request);
        }
    }

    public function validasi_admin(Request $request, $id_survei)
    {
        try {
            $request->validate([
                'deskripsi_bayar' => 'required',
                'nominal' => 'required',
                'poin' => 'required|numeric',

            ]);
            $survei = Survei::where('id_survei', $id_survei)->first();

            $survei->update([
                'deskripsi_bayar' => $request->deskripsi_bayar,
                'nominal' => $request->nominal,
                'poin' => $request->poin,
                'status' => 'Belum Bayar',
            ]);

            return redirect()->back();

        } catch(\Exception $e) {
            return dump();
        }
    }

    public function store_pembayaran(Request $request)
    {
        $request->validate([
        'bukti' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imagePath = $request->file('bukti')->store('uploads', 'public');

        $id_klien = Auth::id();

        // Create a new survey record with the file path
        $survei = new Survei([
            'bukti' => $imagePath,
            'id_klien' => $id_klien,
            // Add other form fields as needed
        ]);
        $survei->save();
        return redirect()->route('verifikasi')->with('success', 'Pembayaran Anda Berhasil Diunggah!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_survei)
    {
        // $survey = Survey::find($id_klien); // Mengambil data survei berdasarkan ID
        // return view('', compact('survey'));

        $klien = Auth::user();
        $survei = $klien->survei()->findOrFail($id_survei);
        $pertanyaan = $survei->pertanyaan;

        return view('klien.detail_survei2', compact('survei', 'pertanyaan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
