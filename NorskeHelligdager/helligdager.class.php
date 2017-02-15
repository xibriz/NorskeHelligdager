<?php

class helligdager {

    /**
     * Funksjon for å bestemme om en gitt dag er helligdag eller ikke
     *
     * @param integer $tstamp
     * @return boolean
     */
    function isHelligdag($tstamp) {
        $date = date("Y-m-d", $tstamp); //Konverterer timestamp til datoformat
        $year = date("Y", $tstamp); //Finner år
        $tsEaster = easter_date($year); //Finner 1. Påskedag
        //Finner antall sekunder i en dag
        $oneDaySec = (60 * 60 * 24);

        //Sjekker om datoen er 1. Januar
        if ($date == $year . "-01-01") {
            return true;
        }
        //Sjekker om datoen er pamlesøndag (1. påskedag - 7 dager)
        if ($date == date("Y-m-d", ($tsEaster - ($oneDaySec * 7)))) {
            return true;
        }
        //Sjekker om datoen er skjærtorsdag (1. påskedag - 3 dager)
        if ($date == date("Y-m-d", ($tsEaster - ($oneDaySec * 3)))) {
            return true;
        }
        //Sjekker om datoen er langfredag (1. påskedag - 2 dager)
        if ($date == date("Y-m-d", ($tsEaster - ($oneDaySec * 2)))) {
            return true;
        }
        //Sjekker om datoen er 1. påskedag
        if ($date == date("Y-m-d", $tsEaster)) {
            return true;
        }
        //Sjekker om datoen er 2. påskedag (1. påskedag + 1 dag)
        if ($date == date("Y-m-d", ($tsEaster + $oneDaySec))) {
            return true;
        }
        //Sjekker om datoen er 1. mai (offentlig høytidsdag)
        if ($date == $year . "-05-01") {
            return true;
        }
        //Sjekker om datoen er 17. mai (grunnlovsdag)
        if ($date == $year . "-05-17") {
            return true;
        }
        //Sjekker om datoen er kristi himmelfartsdag (40. påskedag)
        if ($date == date("Y-m-d", ($tsEaster + ($oneDaySec * 39)))) {
            return true;
        }
        //Sjekker om datoen er 1. pinsedag (50. påskedag)
        if ($date == date("Y-m-d", ($tsEaster + ($oneDaySec * 49)))) {
            return true;
        }
        //Sjekker om datoen er 2 pinsedag (51. påskedag)
        if ($date == date("Y-m-d", ($tsEaster + ($oneDaySec * 50)))) {
            return true;
        }
        //Sjekker om datoen er 1. juledag (25. desember)
        if ($date == $year . "-12-25") {
            return true;
        }
        //Sjekker om datoen er 2 juledag (26. desember)
        if ($date == $year . "-12-26") {
            return true;
        }            

        //Returnerer false hvis dette ikke er en rød ukedag
        return false;
    }

}
