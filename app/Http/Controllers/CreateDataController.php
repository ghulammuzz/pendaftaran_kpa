<?php

namespace App\Http\Controllers;

use App\Models\Kemah;
use App\Models\Kongres;
use App\Models\Pameran;
use App\Models\Pertunjukan;
use App\Models\Seminar;
use App\Models\SeminarRegistration;
use App\Models\Workshop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CreateDataController extends Controller
{
    public function showInformasi()
    {
        // Mengambil data dari masing-masing tabel kegiatan
        $kongres = Kongres::count();
        $seminar = SeminarRegistration::count();
        $pameran = Pameran::count();
        $pertunjukan = Pertunjukan::count();
        $workshop = Workshop::count();
        $kemah = Kemah::count();

        return view('/informasi_pendaftaran', compact('kongres', 'seminar', 'pameran', 'pertunjukan', 'workshop', 'kemah'));
    }

    public function showDashboard()
    {
        // Mengambil data dari masing-masing tabel kegiatan
        $kongres = Kongres::count();
        $seminar = SeminarRegistration::count();
        $pameran = Pameran::count();
        $pertunjukan = Pertunjukan::count();
        $workshop = Workshop::count();

        return view('/dashboard', compact('kongres', 'seminar', 'pameran', 'pertunjukan', 'workshop'));
    }

    public function detailKongres()
    {
        // Mengambil data dari tabel Kongres dengan 10 data per halaman
        $pesertas = Kongres::paginate(10);

        // Menghitung jumlah data yang ditampilkan dari total data
        $countData = ($pesertas->currentPage() - 1) * $pesertas->perPage() + $pesertas->count();

        // Mengambil total jumlah data
        $totalData = Kongres::count();

        return view('detail_kongres', compact('pesertas', 'countData', 'totalData'));
    }

    public function detailSeminar()
    {
        // Mengambil data dari tabel Kongres dengan 10 data per halaman
        $pesertas = SeminarRegistration::paginate(10);

        // Menghitung jumlah data yang ditampilkan dari total data
        $countData = ($pesertas->currentPage() - 1) * $pesertas->perPage() + $pesertas->count();

        // Mengambil total jumlah data
        $totalData = SeminarRegistration::count();

        return view('detail_seminar', compact('pesertas', 'countData', 'totalData'));
    }

    public function detailPameran()
    {
        // Mengambil data dari tabel Kongres dengan 10 data per halaman
        $pesertas = Pameran::paginate(10);

        // Menghitung jumlah data yang ditampilkan dari total data
        $countData = ($pesertas->currentPage() - 1) * $pesertas->perPage() + $pesertas->count();

        // Mengambil total jumlah data
        $totalData = Pameran::count();

        return view('detail_pameran', compact('pesertas', 'countData', 'totalData'));
    }

    public function detailPertunjukan()
    {
        // Mengambil data dari tabel Kongres dengan 10 data per halaman
        $pesertas = Pertunjukan::paginate(10);

        // Menghitung jumlah data yang ditampilkan dari total data
        $countData = ($pesertas->currentPage() - 1) * $pesertas->perPage() + $pesertas->count();

        // Mengambil total jumlah data
        $totalData = Pertunjukan::count();

        return view('detail_pertunjukan', compact('pesertas', 'countData', 'totalData'));
    }

    public function detailKemah()
    {
        $pesertas = Kemah::paginate(10);

        $countData = ($pesertas->currentPage() - 1) * $pesertas->perPage() + $pesertas->count();

        $totalData = Kemah::count();

        return view('detail_kemah', compact('pesertas', 'countData', 'totalData'));
    }

    public function detailWorkshop()
    {
        // Mengambil semua data workshop dari database
        $workshops = Workshop::all();

        // Menghitung jumlah kemunculan setiap nama acara
        $jumlahKemunculanAcara = $workshops->groupBy('jenis_acara')
            ->map(function ($items) {
                return $items->count();
            });

        // Mengirim data ke view
        return view('detail_workshop', ['jumlahKemunculanAcara' => $jumlahKemunculanAcara]);
    }



    public function storeKongres(Request $request)
    {
        $validatedData = $request->validate([
            'nama_lengkap' => 'required',
            'no_identitas' => 'required',
            'nama_instansi' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required',
            'penginapan' => 'required',
            'pernyataan' => 'required',
        ]);

        $kongres = Kongres::create($validatedData);

        if ($kongres) {
            session()->flash('success', 'Pendaftaran berhasil disimpan.');
            session()->put('kongres_id', $kongres->id); // Simpan ID pendaftaran dalam sesi
        } else {
            session()->flash('error', 'Pendaftaran gagal disimpan.');
        }

        return redirect()->back();
    }

    public function storeSeminar(Request $request)
    {
        $validatedData = $request->validate([
            'nama_lengkap' => 'required',
            'no_identitas' => 'required',
            'status' => 'required',
            'nama_instansi' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required',
            'pernyataan' => 'required',
        ]);

        $seminar = Seminar::create($validatedData);

        if ($seminar) {
            session()->flash('success', 'Pendaftaran berhasil disimpan.');
            session()->put('seminar_id', $seminar->id); // Simpan ID pendaftaran dalam sesi
        } else {
            session()->flash('error', 'Pendaftaran gagal disimpan.');
        }

        return redirect()->back();
    }

    public function storePameran(Request $request)
    {
        $validatedData = $request->validate([
            'nama_lengkap' => 'required|string',
            'nama_instansi' => 'required|string',
            'alamat' => 'required|string',
            'no_hp' => 'required|string',
            'jenis_usaha' => 'required|string',
            'ukuran_tenda' => 'required|string',
            'bukti_pembayaran' => 'nullable|string',
            'pernyataan_1' => 'required|boolean',
            'pernyataan_2' => 'required|boolean',
            'pernyataan_3' => 'required|boolean',
        ]);
        $pameran = Pameran::create($validatedData);

        if ($pameran) {
            session()->flash('success', 'Pendaftaran berhasil disimpan.');
            session()->put('pameran_id', $pameran->id); // Simpan ID pendaftaran dalam sesi
        } else {
            session()->flash('error', 'Pendaftaran gagal disimpan.');
        }

        return redirect()->back();
    }

    public function storeKemah(Request $request)
    {
        $validatedData = $request->validate([
            'nama_lengkap' => 'required|string',
            'no_identitas' => 'required|string',
            'alamat' => 'required|string',
            'pekerjaan' => 'required|string',
            'email' => 'required|email|unique:pendaftaran_kemah,email',
            'no_hp' => 'required|string',
            'bidang' => 'nullable|string',
            'pernyataan' => 'required|boolean',
        ]);

        $kemah = Kemah::create($validatedData);

        if ($kemah) {
            session()->flash('success', 'Pendaftaran berhasil disimpan.');
            session()->put('kemah_id', $kemah->id); // Simpan ID pendaftaran dalam sesi
        } else {
            session()->flash('error', 'Pendaftaran gagal disimpan.');
        }

        return redirect()->back();
    }

    public function storePertunjukan(Request $request)
    {
        $validatedData = $request->validate([
            'nama_lengkap' => 'required|string',
            'nama_instansi' => 'required|string',
            'alamat' => 'required|string',
            'no_hp' => 'required|string',
            'jenis_pertunjukan' => 'required|string',
            'sinopsis' => 'required|string',
            'jumlah_peserta' => 'required|string',
            'kebutuhan' => 'required|string',
            'pernyataan_1' => 'required|boolean',
            'pernyataan_2' => 'required|boolean',
            'pernyataan_3' => 'required|boolean',
        ]);

        $pertunjukan = Pertunjukan::create($validatedData);

        if ($pertunjukan) {
            session()->flash('success', 'Pendaftaran berhasil disimpan.');
            session()->put('pertunjukan_id', $pertunjukan->id); // Simpan ID pendaftaran dalam sesi
        } else {
            session()->flash('error', 'Pendaftaran gagal disimpan.');
        }

        return redirect()->back();
    }

    public function storeWorkshop(Request $request)
    {
        $validatedData = $request->validate([
            'nama_lengkap' => 'required',
            'no_identitas' => 'required',
            'npsn' => 'required',
            'nama_instansi' => 'required',
            'no_hp' => 'required',
            'jenis_acara' => 'required',
            'status' => 'required',
            'pernyataan' => 'required',
        ]);

        // Cek apakah sudah ada dua entri dengan NPSN yang sama dan jenis acara yang sama
        $countSameNpsnAndEvent = Workshop::where('npsn', $validatedData['npsn'])
            ->where('jenis_acara', $validatedData['jenis_acara'])
            ->count();

        if ($countSameNpsnAndEvent >= 2) {
            session()->flash('error', 'NPSN yang sama hanya dapat mendaftar dua kali untuk jenis acara yang sama.');
            return redirect()->back()->withInput();
        }

        $workshop = Workshop::create($validatedData);

        if ($workshop) {
            session()->flash('success', 'Pendaftaran berhasil disimpan.');
            session()->put('pameran_id', $workshop->id); // Simpan ID pendaftaran dalam sesi
        } else {
            session()->flash('error', 'Pendaftaran gagal disimpan.');
        }

        return redirect()->back();
    }

    public function seminarStore(Request $request)
    {
        try {
            // Validasi input
            $request->validate([
                'nama_lengkap' => 'required|string',
                'email' => 'required|email|unique:seminar_registrations,email',
                'alamat' => 'required|string',
                'nama_instansi' => 'required|string',
                'no_hp' => 'required|string',
                'status' => 'required|string',
                'pernyataan' => 'required|boolean',
            ]);

            // Tentukan aturan validasi kondisional
            $rules = [
                'judul' => 'nullable|string',
                'abstrak' => 'nullable|string',
                'keywords' => 'nullable|string',
                'bukti_pembayaran' => 'nullable|string',
            ];

            // Jika status adalah 'Online Presenter' atau 'Offline Presenter', tambahkan aturan validasi untuk judul, abstrak, dan bukti pembayaran
            if ($request->status === 'Online Presenter' || $request->status === 'Offline Presenter') {
                $rules['judul'] = 'required|string';
                $rules['abstrak'] = 'required|string';
                $rules['keywords'] = 'required|string';
                $rules['bukti_pembayaran'] = 'required|string';
            }

            // Validasi dengan aturan yang telah ditentukan
            $request->validate($rules);

            // Simpan data registrasi seminar
            $registration = new SeminarRegistration();
            $registration->nama_lengkap = $request->nama_lengkap;
            $registration->email = $request->email;
            $registration->alamat = $request->alamat;
            $registration->nama_instansi = $request->nama_instansi;
            $registration->no_hp = $request->no_hp;
            $registration->status = $request->status;
            $registration->pernyataan = $request->pernyataan;

            // Jika status adalah 'Online Presenter' atau 'Offline Presenter', tambahkan abstrak dan bukti pembayaran ke data registrasi
            if ($request->status === 'Online Presenter' || $request->status === 'Offline Presenter') {
                $registration->judul = $request->judul;
                $registration->abstrak = $request->abstrak;
                $registration->keywords = $request->keywords;
                $registration->bukti_pembayaran = $request->bukti_pembayaran;
            }

            // Simpan data registrasi
            $registration->save();

            // Redirect kembali dengan pesan sukses
            return redirect()->back()->with('success', 'Pendaftaran berhasil.');
        } catch (\Exception $e) {
            // Redirect kembali dengan pesan error jika terjadi kesalahan
            return redirect()->back()->with('error', 'Pendaftaran gagal dengan pesan kesalahan: ' . $e->getMessage());
        }
    }


    public function downloadFile($folder, $filename)
    {
        $validFolders = ['abstrak', 'bukti_pembayaran'];

        // Memastikan folder yang diminta adalah valid
        if (!in_array($folder, $validFolders)) {
            return redirect()->back()->with('error', 'Invalid folder.');
        }

        $path = storage_path("app/{$folder}/{$filename}");

        // Memeriksa apakah file ada
        if (file_exists($path)) {
            // Mengembalikan file untuk diunduh
            return response()->download($path);
        } else {
            // File tidak ditemukan
            return redirect()->back()->with('error', 'File not found.');
        }
    }

    public function getDataForChartSeminar()
    {
        // $presenterTotal = SeminarRegistration::where('status', 'Pemakalah Daring')->count();
        // $participantTotal = SeminarRegistration::where('status', 'Participant')->count();

        // return response()->json([
        //     'presenterTotal' => $presenterTotal,
        //     'participantTotal' => $participantTotal
        // ]);

        $seminarCounts = SeminarRegistration::select('status', DB::raw('COUNT(*) as total'))
            ->groupBy('status')
            ->get();

        return response()->json($seminarCounts);
    }

    public function getDataForChartPameran()
    {
        $jumlahTotal = Pameran::count();

        return response()->json([
            'jumlahTotal' => $jumlahTotal
        ]);
    }

    public function getDataForChartKemah()
    {
        $jumlahTotal = Kemah::count();

        return response()->json([
            'jumlahTotal' => $jumlahTotal
        ]);
    }

    public function getDataForChartPertunjukan()
    {
        $jumlahTotal = Pertunjukan::count();

        return response()->json([
            'jumlahTotal' => $jumlahTotal
        ]);
    }

    public function getDataForChartWorkshop()
    {
        // Mendapatkan jumlah data untuk setiap jenis acara (workshop)
        $workshopCounts = Workshop::select('jenis_acara', DB::raw('COUNT(*) as total'))
            ->groupBy('jenis_acara')
            ->get();

        return response()->json($workshopCounts);
    }

    // public function cetakBukti(Kongres $pendaftaran)
    // {
    //     if ($pendaftaran->exists) {
    //         dd($pendaftaran); // Objek memiliki ID yang valid, lanjutkan dengan proses cetak
    //     } else {
    //         return redirect()->back()->with('error', 'Data pendaftaran tidak ditemukan.');
    //     }

    //     // Inisialisasi Dompdf
    //     $dompdf = new Dompdf();

    //     // Ambil konten dari tampilan Blade dan meneruskan data pendaftaran
    //     $html = view('cetak_bukti_kongres', compact('pendaftaran'))->render();

    //     // Muat konten HTML ke Dompdf
    //     $dompdf->loadHtml($html);

    //     // Atur ukuran dan orientasi dokumen
    //     $dompdf->setPaper('A4', 'portrait');

    //     // Render PDF
    //     $dompdf->render();

    //     // Unduh PDF dengan nama file yang diinginkan
    //     return $dompdf->stream('bukti_pendaftaran.pdf');
    // }
}
