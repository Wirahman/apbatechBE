<?php
namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Klinik;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KlinikController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Klinik::latest()->get();
        return response([
            'success' => true,
            'message' => 'List Semua Data Klinik',
            'data' => $posts
        ], 200);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        //validate data
        $validator = Validator::make($request->all(), [
            'kduser'     => 'required',
            'username'   => 'required',
            'password'     => 'required',
            'nama'   => 'required',
            'hakakses'     => 'required',
            'kdklinik'   => 'required',
            'kdcabang'   => 'required',
        ],
            [
                'kduser.required' => 'Masukkan Kode User !',
                'username.required' => 'Masukkan Username !',
                'password.required' => 'Masukkan Password !',
                'nama.required' => 'Masukkan Nama !',
                'hakakses.required' => 'Masukkan Hak Akses !',
                'kdklinik.required' => 'Masukkan Kode Klinik !',
                'kdcabang.required' => 'Masukkan Kode Cabang !',
            ]
        );

        if($validator->fails()) {

            return response()->json([
                'success' => false,
                'message' => 'Silahkan Isi Bidang Yang Kosong',
                'data'    => $validator->errors()
            ],401);

        } else {

            $post = Klinik::create([
                'kduser'     => $request->input('kduser'),
                'username'   => $request->input('username'),
                'password'     => $request->input('password'),
                'nama'   => $request->input('nama'),
                'hakakses'     => $request->input('hakakses'),
                'kdklinik'   => $request->input('kdklinik'),
                'kdcabang'     => $request->input('kdcabang')
            ]);

            if ($post) {
                return response()->json([
                    'success' => true,
                    'message' => 'Data Klinik Berhasil Disimpan!',
                ], 200);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Data Klinik Gagal Disimpan!',
                ], 401);
            }
        }
    }


    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($kduser)
    {
        $post = Klinik::whereKduser($kduser)->first();

        if ($post) {
            return response()->json([
                'success' => true,
                'message' => 'Detail Data Klinik!',
                'data'    => $post
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Data Klinik Tidak Ditemukan!',
                'data'    => ''
            ], 401);
        }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request)
    {
        //validate data
        $validator = Validator::make($request->all(), [
            'kduser'     => 'required',
            'username'   => 'required',
            'password'     => 'required',
            'nama'   => 'required',
            'hakakses'     => 'required',
            'kdklinik'   => 'required',
            'kdcabang'   => 'required',
        ],
            [
                'kduser.required' => 'Masukkan Kode User !',
                'username.required' => 'Masukkan Username !',
                'password.required' => 'Masukkan Password !',
                'nama.required' => 'Masukkan Nama !',
                'hakakses.required' => 'Masukkan Hak Akses !',
                'kdklinik.required' => 'Masukkan Kode Klinik !',
                'kdcabang.required' => 'Masukkan Kode Cabang !',
            ]
        );

        if($validator->fails()) {

            return response()->json([
                'success' => false,
                'message' => 'Silahkan Isi Bidang Yang Kosong',
                'data'    => $validator->errors()
            ],401);

        } else {

            $post = Klinik::whereKduser($request->input('kduser'))->update([
                'username'   => $request->input('username'),
                'password'     => $request->input('password'),
                'nama'   => $request->input('nama'),
                'hakakses'     => $request->input('hakakses'),
                'kdklinik'   => $request->input('kdklinik'),
                'kdcabang'     => $request->input('kdcabang')
            ]);

            if ($post) {
                return response()->json([
                    'success' => true,
                    'message' => 'Data Klinik Berhasil Diupdate!',
                ], 200);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Data Klinik Gagal Diupdate!',
                ], 401);
            }

        }
    }


    /**
     * @param $kduser
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($kduser)
    {
        $post = Klinik::findOrFail($kduser);
        $post->delete();

        if ($post) {
            return response()->json([
                'success' => true,
                'message' => 'Data Klinik Berhasil Dihapus!',
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Data Klinik Gagal Dihapus!',
            ], 400);
        }

    }



    public function ubaharray(Request $request)
    {
    	$array1 = [2,5,8,9];
    	$array2 = [1,2,3,4,5,6,7];

    	$result = array_diff($array2, $array1);
    	print_r($result);

	}

	public function ubahString(Request $request)
	{
		$string1 = 'PT.AbadI*perKASa@BeRsAmA-DIGItAL#SolUTiONs';
		$string2 = 'PT. Abadi Perkasa Bersama Digital Solutions';

		print_r($string2);
	}

	public function manipulasiAngka(Request $request)
	{
		$bilangan = '10113199';
	  $angka = array('0','0','0','0','0','0','0','0','0','0',
	                 '0','0','0','0','0','0');
	  $kata = array('','satu','dua','tiga','empat','lima',
	                'enam','tujuh','delapan','sembilan');
	  $tingkat = array('','ribu','juta','milyar','triliun');

	  $panjang_bilangan = strlen($bilangan);

	  /* pengujian panjang bilangan */
	  if ($panjang_bilangan > 15) {
	    $kalimat = "Diluar Batas";
	    return $kalimat;
	  }

	  /* mengambil angka-angka yang ada dalam bilangan,
	     dimasukkan ke dalam array */
	  for ($i = 1; $i <= $panjang_bilangan; $i++) {
	    $angka[$i] = substr($bilangan,-($i),1);
	  }

	  $i = 1;
	  $j = 0;
	  $kalimat = "";


	  /* mulai proses iterasi terhadap array angka */
	  while ($i <= $panjang_bilangan) {

	    $subkalimat = "";
	    $kata1 = "";
	    $kata2 = "";
	    $kata3 = "";

	    /* untuk ratusan */
	    if ($angka[$i+2] != "0") {
	      if ($angka[$i+2] == "1") {
	        $kata1 = "seratus";
	      } else {
	        $kata1 = $kata[$angka[$i+2]] . " ratus";
	      }
	    }

	    /* untuk puluhan atau belasan */
	    if ($angka[$i+1] != "0") {
	      if ($angka[$i+1] == "1") {
	        if ($angka[$i] == "0") {
	          $kata2 = "sepuluh";
	        } elseif ($angka[$i] == "1") {
	          $kata2 = "sebelas";
	        } else {
	          $kata2 = $kata[$angka[$i]] . " belas";
	        }
	      } else {
	        $kata2 = $kata[$angka[$i+1]] . " puluh";
	      }
	    }

	    /* untuk satuan */
	    if ($angka[$i] != "0") {
	      if ($angka[$i+1] != "1") {
	        $kata3 = $kata[$angka[$i]];
	      }
	    }

	    /* pengujian angka apakah tidak nol semua,
	       lalu ditambahkan tingkat */
	    if (($angka[$i] != "0") OR ($angka[$i+1] != "0") OR
	        ($angka[$i+2] != "0")) {
	      $subkalimat = "$kata1 $kata2 $kata3 " . $tingkat[$j] . " ";
	    }

	    /* gabungkan variabe sub kalimat (untuk satu blok 3 angka)
	       ke variabel kalimat */
	    $kalimat = $subkalimat . $kalimat;
	    $i = $i + 3;
	    $j = $j + 1;

	  }

	  /* mengganti satu ribu jadi seribu jika diperlukan */
	  if (($angka[5] == "0") AND ($angka[6] == "0")) {
	    $kalimat = str_replace("satu ribu","seribu",$kalimat);
	  }

	  return trim($kalimat);

	}

















}
