<?php
class Uzytkownicy_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }
    
	/**
	 * Metoda sprawdza istnienie uzytkownika w bazie
	 * @param array $uzytkownik - w tablicy musi byc login i haslo
	 * @return int zwraca id uzytkownika potwierdzajac jego istnienie, zwraca false jezeli nie ma takiego uzytkownika lub jest nieaktywny
	 */
	public function pobierz_dane_uzytkownika($uzytkownik)
	{
		if(!$uzytkownik['haslo'] || !$uzytkownik['login']) 
		{
			return false; 
			exit;
		} 
		else 
		{
			$uzytkownik['haslo'] = md5($uzytkownik['haslo']);
			$query = $this->db->get_where('uzytkownicy', $uzytkownik, 1);
			$r = $query->result();
			if ($r)
			{
				$r[0]->haslo = null;
				return $r[0];
			} 
			else 
			{
				return false;
                                exit;
			}
		}
	}
	
	/**
	 * Funkcja sluzy do pobrania wszystkich uprawnien przypisanych grupom do ktorych nalezy uzytkownik o zadanym id
	 * @param $id int iduzytkownicy - parametr okresla o ktorego uzytkownika chodzi
	 * Funkcja korzysta z widoku view_uprawnienia_uzytkownika 
	 */
	public function pobierz_uprawnienia_uzytkownika($id)
	{
		$uprawnienia = null;
		$query = $this->db->get('view_uprawnienia_uzytkownika',array('iduzytkownicy'=>$id));
		$r = $query->result();
		if($r)
		{ 
			foreach($r as $uprawnienie)
			{
				$uprawnienia[] = $uprawnienie->numer;
			}
			return $uprawnienia;
		}
		else 
		{
			return false;
		}
	}
	
	/*
    function get_last_ten_entries()
    {
        $query = $this->db->get('entries', 10);
        return $query->result();
    }

    function insert_entry()
    {
        $this->title   = $_POST['title']; // please read the below note
        $this-
        $this->db->insert('entries', $this);
    }

    function update_entry()
    {
        $this->title   = $_POST['title'];
        $this->content = $_POST['content'];
        $this->date    = time();

        $this->db->update('entries', $this, array('id' => $_POST['id']));
    }>content = $_POST['content'];
        $this->date    = time();

        $this->db->insert('entries', $this);
    }

    function update_entry()
    {
        $this->title   = $_POST['title'];
        $this->content = $_POST['content'];
        $this->date    = time();

        $this->db->update('entries', $this, array('id' => $_POST['id']));
    }
	
	 */
	 
}