<?php

    /**
     * skrypt pobiera zadania w bazy danych ktore maja status do wykonania
     */
     
/**
 * Funkcja pobiera zadania z zadanym statusem
 * @param int $status status zadan do pobrania
 * @return array zwraca liste zadan w formie tablicy php
 */
    function pobierz_zadania($status)
    {
         $zadania = null;
         $query = 'select * from crontab where status='.$status.' order by data_dodania';
         $zadania = pobierz_dane($query);
         return $zadania;
    }
    
/**
 * Funkcja zmienia status na zadany, zadania o podanym id
 * @param int $id_zadania idcrontab zadania
 * @param int $status
 * @return bool zwraca powodzenie operacji 
 */
    function zmien_status_zadania($id_zadania, $status)
    {
        $query = 'update crontab set status='.$status.' where idcrontab='.$id_zadania;
        
        if (mysql_query($query))
        {
            return true;
        }
        else
        {
            return false;
        }
    }

?>
