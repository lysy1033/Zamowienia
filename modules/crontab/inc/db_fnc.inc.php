<?php

    /**
     * plik zawiera funkcje sluzace do prostej obslugi bazy
     */

     /**
      * funkcja pobiera dane z bazy danych i zwraca je w formie tablicy php
      * 
      * @param string $query zapytanie sql
      * @return array zwraca tablice z danymi z bazy danych
      */
     function pobierz_dane($query)
     {
         $tablica = null;
         if( !($r = mysql_query($query)))
         {
             //jezeli nie ma wynikow lub niepoprawne zapytanie
             return false;
         }
         //jezeli sa jakies dane
         while($tablica[]=mysql_fetch_array($r,MYSQL_ASSOC));
         array_pop($tablica);
         return $tablica; 
     }
    
?>
