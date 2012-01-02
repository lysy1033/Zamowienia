<?php
    /**
     * skrypt laczy sie do bazy danych ustawionej w CodeIgniterze w konfiguracji
     */

    // pozwala pobrac konfiguracje
    const BASEPATH = null;

    // pobiera konfiguracje
    include '../../application/config/database.php';

    // wyswietla konfiguracje
    // echo '<pre>'; print_r($db); echo '</pre>';


    // połączenie z domyslna bazą danych
    $db_conn = mysql_connect( $db[$active_group]['hostname'] , $db[$active_group]['username'] , $db[$active_group]['password'] );
    mysql_select_db( $db[$active_group]['database'] ); 
    
?>
