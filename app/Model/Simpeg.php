<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use GuzzleHttp\Client;
use App\User;
use App\Model\Master\SatuanKerja;
use App\Model\Master\Jabatan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Carbon;

class Simpeg extends Model
{
    private $client;

    public function __construct() {
        $this->client = new Client([
            'base_uri' => env('API_URL')
        ]);
    }
    
    public function findFromUser($nip) {
        return User::where('username', $nip)->first();
    }

    public function getSatKer($kode) {
        return SatuanKerja::where('kode', $kode)->first();
    }

    public function getJabatan($kode) {
        return Jabatan::where('kode', $kode)->first();
    }

    public function insertFromApi($jsonData) {
        if(isset($jsonData->error)) {
            return $jsonData;
        }

        $user = $this->findFromUser($jsonData->nip);

        if(!$user) {
            $user = $this->insertNewUser($jsonData->nip);
        }

        $satker = $this->getSatKer($jsonData->satker->kode);

        if(!$satker) {
            $satker = $this->findAndInsertSatker($jsonData->satker);
        }

        $jabatan = $this->getJabatan($jsonData->jabatan->kode);

        if(!$jabatan) {
            $jabatan = $this->findAndInsertJabatan($jsonData->jabatan);
        }

        $id_satker = $satker->id;

        $instance = new Pegawai;
        $instance->nip  = $jsonData->nip;
        $instance->nama = $jsonData->nama;
        $instance->tanggal_lahir = Carbon::parse($jsonData->lahir_tanggal)->toDateString();
        $instance->tempat_lahir = $jsonData->lahir_tempat;
        $instance->satuan_kerja_id = $id_satker;
        $instance->jabatan_id = $jabatan->id;
        $instance->jenis_kelamin = $jsonData->jenis_kelamin == 'L' ? 1 : 2;
        $instance->save();
        // $instance->satuan_kerja_id =
    }

    public function findAndInsertJabatan($dJabatan) {
        $insertParent = false;

        if(strlen($dJabatan->parent_kode) > 0 && $dJabatan->parent_kode != 'null') {
            $client = new Client([
                'base_uri' => env('API_URL')
            ]);

            $json = $client->get('jabatan?kode='.$dJabatan->parent_kode)->getBody()->read(1024);
            $decode = $json ? json_decode($json) : false;

            if($decode->success) {
                $insertParent = true;
                $this->findAndInsertJabatan($decode->data);
            }
        }

        $mJabatan = Jabatan::where('kode', $dJabatan->kode)->first();

        if(!$mJabatan) {
            $jabatan = new Jabatan();
            $jabatan->nama = $dJabatan->nama;
            $jabatan->kode = $dJabatan->kode;
            if($insertParent) {
                $jabatan->kode_parent = $dJabatan->parent_kode;
            }
            // $insertSatker->eselon_kode = $satker->eselon;
            $jabatan->save();
        }

        return $jabatan ?? $mJabatan;
    }

    public function checkUserFromApi($nip) {
        $client = new Client([
            'base_uri' => env('API_URL')
        ]);

        $json = $client->post('pegawai/'.$nip)->getBody()->read(1024);
        $decode = $json ? json_decode($json) : false;

        return $this->insertFromApi($decode);
    }

    private function findAndInsertSatker($satker) {
        $user = User::where('username', $satker->kode)->first();

        $insertParent = false;

        if(strlen($satker->parent_kode) > 0) {
            $client = new Client([
                'base_uri' => env('API_URL')
            ]);

            $json = $client->get('satuan-kerja?kode='.$satker->parent_kode)->getBody()->read(1024);
            $decode = $json ? json_decode($json) : false;

            if($decode->success) {
                $insertParent = true;
                $this->findAndInsertSatker($decode->data);
            }
        }

        if(!$user) {
            $user = new User();
            $user->username = $satker->kode;
            $user->password = Hash::make('123456');
            $user->level = 2;
            $user->enabled = true;
            $user->save();
        }

        $fsatker = SatuanKerja::where('kode', $satker->kode)->first();

        if(!$fsatker) {

        $insertSatker = new SatuanKerja();
        $insertSatker->nama = $satker->nama;
        $insertSatker->kode = $satker->kode;
        if($insertParent) {
            $insertSatker->parent_kode = $satker->parent_kode;
        }
        // $insertSatker->eselon_kode = $satker->eselon;
        $insertSatker->save();

        }

        return $insertSatker ?? $fsatker;
    }

    private function insertNewUser($nip) {
        $user = new User;
        $user->username = $nip;
        $user->password = Hash::make('123456');
        $user->level = 5;
        $user->enabled = true;
        $user->save();

        return $user;
    }

}
