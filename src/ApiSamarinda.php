<?php

namespace Novay\ApiSamarinda;

use GuzzleHttp\Client as HttpClient;

class ApiSamarinda extends Enterwind
{
    /**
     * API First Method via URL
     *
     * @param String    $method  | POST, GET
     * @param String    $url     | API Endpoint
     */
    public function url($method, $url)
    {
        return $this->httpClient($method, $url, true);
    }

    /**
     * Data Penduduk
     *
     * @param
     */
    public function penduduk()
    {
        return $this->httpClient('GET', '/penduduk');
    }

    /**
     * Data Penduduk by NIK
     *
     * @param String    $nik  | NIK Penduduk
     */
    public function pendudukByNik($nik)
    {
        return $this->httpClient('GET', '/penduduk?nik='.$nik);
    }

    /**
     * Get All Provinces
     *
     * @param String    $paginate | NULL
     *
     */
    public function provinsi($paginate = null) 
    {
        $url = '/provinsi';
        
        if(!is_null($paginate)) {
            $url .= '?paginate=' . $paginate;
        }

        return $this->httpClient('GET', $url);
    }

    /**
     * Get Province by ID
     *
     * @param int    $id | ID Provinsi
     *
     */
    public function provinsiById($id = null, $with = null) 
    {
        if($id == null) {
            return $this->forgetParams();
        }

        return $this->httpClient('GET', '/provinsi?id='.$id);
    }

    /**
     * Get Province by Name
     *
     * @param int    $nama | Nama Provinsi
     *
     */
    public function provinsiByNama($nama = null, $with = null) 
    {
        if($nama == null) {
            return $this->forgetParams();
        }

        return $this->httpClient('GET', '/provinsi?nama='.$nama);
    }

    /**
     * Get All Kota
     *
     * @param String    $paginate | NULL
     *
     */
    public function kota($paginate = 15) 
    {
        $url = '/kota';
        
        if(!is_null($paginate)) {
            $url .= '?paginate=' . $paginate;
        }

        return $this->httpClient('GET', $url);
    }

    /**
     * Get Kota by ID
     *
     * @param int    $id | ID Kota
     *
     */
    public function kotaById($id = null, $with = null) 
    {
        if($id == null) {
            return $this->forgetParams();
        }

        return $this->httpClient('GET', '/kota?id='.$id);
    }
    
    /**
     * Get Kota by Name
     *
     * @param int    $nama | Nama Kota
     *
     */
    public function kotaByNama($nama = null, $with = null) 
    {
        if($nama == null) {
            return $this->forgetParams();
        }

        return $this->httpClient('GET', '/kota?nama='.$nama);
    }
    
    /**
     * Get Kota by ID Provinsi
     *
     * @param int    $idProvinsi | ID Provinsi
     *
     */
    public function kotaByIdProvinsi($idProvinsi = null, $with = null) 
    {
        if($idProvinsi == null) {
            return $this->forgetParams();
        }

        return $this->httpClient('GET', '/kota?idProvinsi='.$idProvinsi);
    }

    /**
     * Get All Kecamatan
     *
     * @param String    $paginate | NULL
     *
     */
    public function kecamatan($paginate = 15) 
    {
        $url = '/kecamatan';
        
        if(!is_null($paginate)) {
            $url .= '?paginate=' . $paginate;
        }

        return $this->httpClient('GET', $url);
    }
    
    /**
     * Get Kecamatan by ID
     *
     * @param int    $id | ID Kecamatan
     *
     */
    public function kecamatanById($id = null, $with = null)
    {
        if($id == null) {
            return $this->forgetParams();
        }

        return $this->httpClient('GET', '/kecamatan?id='.$id);
    }
    
     /**
     * Get Kecamatan by Nama
     *
     * @param int    $nama | Nama Kecamatan
     *
     */
    public function kecamatanByNama($nama = null, $with = null) 
    {
        if($nama == null) {
            return $this->forgetParams();
        }

        return $this->httpClient('GET', '/kecamatan?nama='.$nama);
    }
    
    /**
     * Get Kecamatan by ID Kota
     *
     * @param int    $idKota | ID Kota
     *
     */
    public function kecamatanByIdKota($idKota = null, $with = null) 
    {
        if($idKota == null) {
            return $this->forgetParams();
        }

        return $this->httpClient('GET', '/kecamatan?idKota='.$idKota);
    }

    /**
     * Get All Kelurahan
     *
     * @param String    $paginate | NULL
     *
     */
    public function kelurahan($paginate = 15) 
    {
        $url = '/kelurahan';
        
        if(!is_null($paginate)) {
            $url .= '?paginate=' . $paginate;
        }

        return $this->httpClient('GET', $url);
    }
    
    /**
     * Get Kelurahan by ID
     *
     * @param int    $id | ID Kelurahan
     *
     */
    public function kelurahanById($id = null, $with = null) 
    {
        if($id == null) {
            return $this->forgetParams();
        }

        return $this->httpClient('GET', '/kelurahan?id='.$id);
    }
    
     /**
     * Get Kelurahan by Nama
     *
     * @param int    $nama | Nama Kelurahan
     *
     */
    public function kelurahanByNama($nama = null, $with = null) 
    {
        if($nama == null) {
            return $this->forgetParams();
        }

        return $this->httpClient('GET', '/kelurahan?nama='.$nama);
    }
    
    /**
     * Get Kelurahan by ID Kecamatan
     *
     * @param int    $idKecamatan | ID Kecamatan
     *
     */
    public function kelurahanByIdKecamatan($idKecamatan = null, $with = null) 
    {
        if($idKecamatan == null) {
            return $this->forgetParams();
        }

        return $this->httpClient('GET', '/kelurahan?idKecamatan='.$idKecamatan);
    }

    /**
     * Get All Sekolah
     *
     */
    public function sekolah($with = null) 
    {
        $url = '/sekolah';
        
        !is_null($with) ? $url .= '?with='.$with : '';
        
        return $this->httpClient('GET', $url);
    }

    /**
     * Get Sekolah by Jenjang
     *
     * @param int    $jenjang | Jenjang Pendidikan "SD", "SMP", "SMA", "SMK""
     *
     */
    public function sekolahByJenjang($jenjang = null, $with = null) 
    {
        if(!in_array($jenjang, ['sd', 'smp', 'smk', 'sma']))
    
            return response()->json(['message' => 'Jenjang yang diterima hanya SD, SMP, SMK, dan SMA']);
    
        $url = '/sekolah?jenjang='.$jenjang;
    
        !is_null($with) ? $url .= '&with='.$with : '';
    
        return $this->httpClient('GET', $url);
    }

    /**
     * Get Sekolah by Status
     *
     * @param int    $status | Status Pendidikan "Swasta" or "Negeri"
     *
     */
    public function sekolahByStatus($status = null, $with = null) 
    {
        if(!in_array($status, ['swasta', 'negeri']))
     
            return response()->json(['message' => 'Status yang diterima hanya Swasta dan Negeri']);
     
        $url = '/sekolah?status='.$status;
     
        !is_null($with) ? $url .= '&with='.$with : '';
     
        return $this->httpClient('GET', $url);
    }

    /**
     * Get Sekolah by ID Kelurahan
     *
     * @param int    $idKelurahan | ID Kelurahan
     *
     */
    public function sekolahByKelurahan($idKelurahan = null) 
    {
        if($idKelurahan == null) {
            return $this->forgetParams();
        }

        $url = '/sekolah?kelurahan=' . $idKelurahan;

        return $this->httpClient('GET', $url);
    }
    
    /**
     * Get Sekolah by ID Kecamatan
     *
     * @param int    $idKecamatan | ID Kecamatan
     *
     */
    public function sekolahByKecamatan($idKecamatan = null) 
    {
        if($idKecamatan == null) {
            return $this->forgetParams();
        }

        $url = '/sekolah?kecamatan=' . $idKecamatan;

        return $this->httpClient('GET', $url);
    }

}