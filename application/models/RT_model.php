<?php

class RT_model extends CI_Model {

    function Wilayah()
    {
        $this->db->order_by('id', 'ASC');
        return $this->db->from('wilayah_provinsi')->get()->result();
    }

    function Wilayah_provinsi($wil_id)
    {
        $this->db->where('wil_id', $wil_id);
        $this->db->order_by('id', 'ASC');
        return $this->db->from('wilayah_kabupaten')->get()->result();
    }

    function Wilayah_kabupaten($prov_id)
    {
        $this->db->where('prov_id', $prov_id);
        $this->db->order_by('id', 'ASC');
        return $this->db->from('wilayah_kabupaten')->get()->result();
    }

    function Wilayah_kecamatan($kab_id)
    {
        $this->db->where('kab_id', $kab_id);
        $this->db->order_by('id', 'ASC');
        return $this->db->from('wilayah_kecamatan')->get()->result();
    }

    function Wilayah_desa($kec_id)
    {
        $this->db->where('kec_id', $kec_id);
        $this->db->order_by('id', 'ASC');
        return $this->db->from('wilayah_desa')->get()->result();
    }

    function getAllWilayah()
    {
        $query = $this->db->query("SELECT * from wilayah");
        $data = $query->result();

        return $data;
    }
}