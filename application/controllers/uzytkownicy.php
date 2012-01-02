<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Uzytkownicy extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model("Uzytkownicy_model");
	}

	/**
	 * Akcja pozwala na zalogowanie się uzytkownika
	 * dane sa pobierane z formularza metodą post (wymagane login i haslo)
	 * Akcja przetrzymuje dane w sesji i przekierowuje uzytkownika do /start/glowny lub w przypadku niepowodzenia zalogowania do /start
	 */
	public function akcja_zaloguj()
	{
		$uzytkownik['login'] = $this->input->post('login');
		$uzytkownik['haslo'] = $this->input->post('haslo');
		$uzytkownik['status'] = 1;
		$uzytkownik = $this->Uzytkownicy_model->pobierz_dane_uzytkownika($uzytkownik);
		if ($uzytkownik) 
		{
			$this->session->set_userdata($uzytkownik);	
			header('Location: /start/glowny');
			exit;	
		}
		else 
		{
			$this->session->sess_destroy();
			header('Location: /start');
			exit;	
		}
	}
	
	/**
	 * Akcja powoduje usunięcie calej sesji oraz przekierowanie uzytkownika na /start
	 */
	public function akcja_wyloguj()
	{
		$this->session->sess_destroy();
		header('Location: /start');
		exit;
	}
		
}