<?php
class Model_app extends CI_model{
    public function view($table){
        return $this->db->get($table);
    }

    public function insert($table,$data){
        return $this->db->insert($table, $data);
    }

    public function edit($table, $data){
        return $this->db->get_where($table, $data);
    }

    public function update($table, $data, $where){
        return $this->db->update($table, $data, $where);
    }

    public function delete($table, $where){
        return $this->db->delete($table, $where);
    }

    public function view_where($table,$data){
        $this->db->where($data);
        return $this->db->get($table);
    }

    public function view_data_where($table,$data,$where){
        $this->db->where($data, $where);
        return $this->db->get($table);
    }

    public function view_data_wheres($table,$where){
        $this->db->where($where);
        return $this->db->get($table);
    }

    public function select_data_where($table, $select_field, $data, $where){
        $this->db->select($select_field);
        $this->db->where($data, $where);
        return $this->db->get($table);
    }

    public function view_ordering_limit($table,$order,$ordering,$baris,$dari){
        $this->db->select('*');
        $this->db->order_by($order,$ordering);
        $this->db->limit($dari, $baris);
        return $this->db->get($table);
    }

    public function view_ordering_where_limit($table,$order,$ordering,$where,$baris,$dari){
        $this->db->select('*');
        $this->db->order_by($order,$ordering);
        $this->db->where($where);
        $this->db->limit($dari, $baris);
        return $this->db->get($table);
    }

    public function view_ordering($table,$order,$ordering){
        $this->db->select('*');
        $this->db->from($table);
        $this->db->order_by($order,$ordering);
        return $this->db->get()->result_array();
    }

    public function view_where_ordering($table,$data,$order,$ordering){
        $this->db->where($data);
        $this->db->order_by($order,$ordering);
        $query = $this->db->get($table);
        return $query->result_array();
    }

    public function view_join_one($table1,$table2,$field,$order,$ordering){
        $this->db->select('*');
        $this->db->from($table1);
        $this->db->join($table2, $table1.'.'.$field.'='.$table2.'.'.$field);
        $this->db->order_by($order,$ordering);
        return $this->db->get()->result_array();
    }

    public function view_join_where($table1,$table2,$field,$where,$order,$ordering){
        $this->db->select('*');
        $this->db->from($table1);
        $this->db->join($table2, $table1.'.'.$field.'='.$table2.'.'.$field);
        $this->db->where($where);
        $this->db->order_by($order,$ordering);
        return $this->db->get()->result_array();
    }

    function umenu_akses($link,$id){
        return $this->db->query("SELECT * FROM modul,users_modul WHERE modul.id_modul=users_modul.id_modul AND users_modul.id_session='$id' AND modul.link='$link'")->num_rows();
    }

    public function cek_login($username,$password,$table){
        return $this->db->query("SELECT * FROM $table where username='".$this->db->escape_str($username)."' AND password='".$this->db->escape_str($password)."' AND blokir='N'");
    }

	public function cek_user($username){
        return $this->db->query("SELECT * FROM users where username='".$this->db->escape_str($username)."' AND blokir='N'");
    }

    function grafik_kunjungan(){
        return $this->db->query("SELECT count(*) as jumlah, tanggal FROM statistik GROUP BY tanggal ORDER BY tanggal DESC LIMIT 20");
    }

    function grafik_pendapat(){
        return $this->db->query("SELECT count(*) as jumlah,  pilihan_data FROM pendapat_counter GROUP BY pilihan_data ORDER BY pilihan_data");
    }

    // Voting
    function add_vote($id, $ip)
	{
		$opt_leave = explode(",", $this->input->post('v_column'));
		$column = $opt_leave[0];
		$data = $opt_leave[1];
		$this->db->set('v_column',$column);
		$this->db->set('v_data',$data);
		$this->db->set('v_vistor_ip',$ip);
		$this->db->set('v_voting_id', $id);
		$this->db->insert('ci_voting_counter');

	}

	function get_one_active()
	{
		$this->db->where('dv_state', 1);
		$result = $this->db->get('ci_voting');
		return $result->row();
	}

	function get_all_columns_active()
	{
		$this->db->where('dv_state', 1);
		$this->db->select('A,B,C,D,E,F,G,H,I,J');
		$result = $this->db->get('ci_voting');
		$return = array();
		if ($result->num_rows() > 0) {
			foreach ($result->row_array() as $key => $value) {
				$return[$key] = $value;
			}
		}

		return $return;
	}

	////////////////////////////////////////////////////////////////////////////////////////////////
	//////////////frontend//////////////////////////////////////////////////////////
	function check_ip($id, $ip)
	{
		$this->db->where('v_voting_id', $id);
		$this->db->where('v_vistor_ip', $ip);
		$result = $this->db->get('ci_voting_counter');
		if ($result->num_rows() > 0) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

	/*  This function get  result of specified voting by join the ci_voting table and ci_voting_counter table .*/

	function result($id)
	{

		$result = $this->db->query(" SELECT * FROM ci_voting_counter INNER JOIN ci_voting
                            ON ci_voting_counter.v_voting_id = ci_voting.dv_id
                            WHERE dv_id=$id ")->row();
		return $result;
	}

	// get total number of voting one
	function getNumVoting($id)
	{
		$result = $this->db->query("SELECT v_column,v_data,
									SUM(v_value) as vote_value,
			(SELECT SUM(v_value)FROM ci_voting_counter WHERE v_voting_id=$id) as total
									FROM ci_voting_counter
									WHERE v_voting_id=$id
									GROUP BY v_column")->result_array();

		foreach($result as $key => $value)
		{
			$value['prec'] = round(100*($value['vote_value'] / $value['total']),2);
			$result[$key] = $value;

		}
		return array_filter($result);

	}

    function create($orderd_data)
    {
           foreach($orderd_data as $key => $value){
               $this->db->set('dv_title',$this->input->post('dv_title'));
               $this->db->set($key,$value);
               $this->db->set('dv_created', time());
           }
        $this->db->insert('ci_voting');


    }


    function update_vote($orderd_data,$id)
    {


           $this->db->where('dv_id',$id);
		   $this->db->delete('ci_voting');

        foreach($orderd_data as $key => $value){
            $this->db->set($key,$value);
            $this->db->set('dv_created', time());
        }
        $this->db->set('dv_title',$this->input->post('dv_title'));
        $this->db->set('dv_state',$this->input->post('dv_state'));
        $this->db->insert('ci_voting');
    }


    /* This function delete votes of new from database. */

        function active($id) {
        $this->db->set('dv_state', 1);
        $this->db->where('dv_id', $id);
        $this->db->update('ci_voting');

        $this->db->set('dv_state',0);
        $this->db->where('dv_id !=', $id);
        $this->db->update('ci_voting');
        return $this->db->elapsed_time();
    }

    function deactivate($id) {
        $this->db->set('dv_state', 0);
        $this->db->where('dv_id', $id);
        $this->db->update('ci_voting');

        $this->db->set('dv_state',1);
        $this->db->where('dv_id !=', $id);
        $this->db->update('ci_voting');
    }

    function get_one($id)
    {
       $this->db->where('dv_id',$id);
       $result=$this->db->get('ci_voting');
       return $result->row();
    }
    /*  This function get all votes of news from database sort by order asc.*/

    function get_votes()
    {
        $this->db->order_by('dv_id', 'asc');
        $result=$this->db->get('ci_voting');
        return $result->result_array();
    }




    function get_categories_active()
    {
        $this->db->where('dv_state', '1');
        $result=$this->db->get('ci_voting');
        return $result->result_array();
    }

    function get_all_columns($id) {
        $this->db->where('dv_id',$id);
        $this->db->select('A,B,C,D,E,F,G,H,I,J');
        $result=$this->db->get('ci_voting');
        $return = array();
        if ($result->num_rows() > 0) {
            foreach ($result->row_array() as $key=>$value) {
                $return[$key] = $value;
            }
        }

        return $return;
    }

    function is_voted($id)
    {
        $this->db->where('v_voting_id', $id);
        $result = $this->db->get('ci_voting_counter');
        if ($result->num_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
}
