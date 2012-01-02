<?php

/**
 * w tym pliku znajduje sie glowna obsluga crontab-a
 */

/**
 * dolaczenie potrzebnych dodatkow
 */
//----------------------------------------------INCLUDE----------------------------------
    // podlaczenie polaczenia do bazy
    include 'inc/mysql_connector.inc.php';

    // podlaczenie funkcji do obslugi bazy danych 
    include 'inc/db_fnc.inc.php';

    //podlaczenie modulu logujacego do bazy
    include 'inc/logger.inc.php';

    //podlaczenie funkcji obslugi zadan 
    include 'inc/zadania_fnc.inc.php';
    
    //naglowek do wyswietlenia
    include 'inc/header.inc.php';
    
    //zaladowanie typow zadan
    include '../../application/config/crontab.php';
    
/**
 * Pobranie zadan do wykonania
 */
//----------------------------------------------POBRANIE ZADAN----------------------------
    // pobranie zadan do wykonania
    $zadania = pobierz_zadania(1);  
    
/**
 * odpalanie najstarszego zadania
 */
//----------------------------------------------WYKONANIE ZADAN---------------------------
    //jezeli sa zadania do wykonania
    if ($zadania)
    {   
        //sprawdzenie czy nie ma innych zadan wykonywanych w tym czasie jezeli sa to stop
        if ($z = pobierz_zadania(3))
        {
            echo "Wykonywane jest ".$z[0]['idcrontab']." zadanie - oczekiwanie!\n";
            exit;
        }
        
        //wybranie zadania najstarszego
        $zadanie = $zadania[0];     
        
        //zmiana statusu na rozpoczety
        zmien_status_zadania($zadanie['idcrontab'],2);
       
        //pobranie definicji typu zadania
        $typ_zadania = $typy_zadan[$zadanie['typ']];
        
        echo 'Wykonywanie zadania: '.$zadanie['idcrontab'].' - '.$typ_zadania['opis'];
        echo "\n";
        
        //aktualizacja daty startu zadania
        $query = "update crontab set data_start=NOW() where idcrontab=".$zadanie['idcrontab'];
        mysql_query($query);
        
        //zmiana statusu na wykonywanie
        zmien_status_zadania($zadanie['idcrontab'],3);
        
        //wykonanie zadania
        include 'exec/'.$typ_zadania['plik'];
        
        //aktualizacja daty stopu zadania
        $query = "update crontab set data_stop=NOW() where idcrontab=".$zadanie['idcrontab'];
        mysql_query($query);
    }
    
    else
    {
        echo "Brak zadan do wykonania!\n";
        exit;
    }


?>
