<?php

/**
 * skrypt obsluguje dodawanie wpisow w logach w bazie danych
 */

/**
 * Funkcja dopisuje wpis w bazie danych w tabeli logi
 * @param type $akcja
 * @param type $poziom
 * @param type $iduzytkownicy
 * @return type 
 */
function dodaj_log($akcja,$poziom,$iduzytkownicy=null)
{
    //budowanie zapytania
        $query = 'insert into logi (';
        If ($iduzytkownicy)
            $query .= 'iduzytkownicy,';
        $query .= 'akcja, poziom) values (';
        If ($iduzytkownicy)
            $query .= $iduzytkownicy.',';
        $query .= '\''.$akcja.'\','. $poziom.')';
    if(mysql_query($query))
    {
        return true;
    } 
    else 
    {
        return false;  
    }
}

?>
