<?php
class Pasien_model extends CI_Model 
{
    public function getPasiens($limit, $start, $keyword = null)
    {
        if( $keyword ) {
			// isi ke query pencarian
			$this->db->like('nama', $keyword);
			// berdasarkan field lain
			$this->db->or_like('no_rm', $keyword);
			
		}
        return $this->db->get('pasien', $limit, $start) -> result_array();
    }
    public function hitungAllPasiens()
	{
		// hitung
		return $this->db->get('pasien')->num_rows();
	}
	public function dataTabel($table)
	{
		$data = $this->db->get($table);
		return $data->result_array();
	}
	
}