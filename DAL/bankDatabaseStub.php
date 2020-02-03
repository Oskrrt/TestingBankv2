<?php
    include_once '../Model/domeneModell.php';
    class BankDBStub
    {
        function hentEnKunde($personnummer)
        {
            $enKunde = new kunde();
            $enKunde->personnummer = $personnummer;
            $enKunde->navn = "Per Olsen";
            $enKunde->adresse = "Osloveien 82, 0270 Oslo";
            $enKunde->telefonnr = "12345678";
            return $enKunde;
        }

        function hentAlleKunder()
        {
            $alleKunder = array();
            $kunde1 = new kunde();
            $kunde1->personnummer = "01010122344";
            $kunde1->navn = "Per Olsen";
            $kunde1->adresse = "Osloveien 82 0270 Oslo";
            $kunde1->telefonnr = "12345678";
            $alleKunder[] = $kunde1;
            $kunde2 = new kunde();
            $kunde2->personnummer = "01010122344";
            $kunde2->navn = "Line Jensen";
            $kunde2->adresse = "Askerveien 100, 1379 Asker";
            $kunde2->telefonnr = "92876789";
            $alleKunder[] = $kunde2;
            $kunde3 = new kunde();
            $kunde3->personnummer = "02020233455";
            $kunde3->navn = "Ole Olsen";
            $kunde3->adresse = "Bærumsveien 23, 1234 Bærum";
            $kunde3->telefonnr = "99889988";
            $alleKunder[] = $kunde3;
            return $alleKunder;
        }

        function hentTransaksjoner($kontoNr, $fraDato, $tilDato)
        {
            date_default_timezone_set("Europe/Oslo");
            $fraDato = strtotime($fraDato);
            $tilDato = strtotime($tilDato);
            if ($fraDato > $tilDato) {
                return "Fra dato må være større enn tildato";
            }
            $konto = new konto();
            $konto->personnummer = "010101234567";
            $konto->kontonummer = $kontoNr;
            $konto->type = "Sparekonto";
            $konto->saldo = 2300.34;
            $konto->valuta = "NOK";
            if ($tilDato < strtotime('2015-03-26')) {
                return $konto;
            }
            $dato = $fraDato;
            while ($dato <= $tilDato) {
                switch ($dato) {
                    case strtotime('2015-03-26') :
                        $transaksjon1 = new transaksjon();
                        $transaksjon1->dato = '2015-03-26';
                        $transaksjon1->transaksjonBelop = 134.4;
                        $transaksjon1->fraTilKontonummer = "22342344556";
                        $transaksjon1->melding = "Meny Holtet";
                        $konto->transaksjoner[] = $transaksjon1;
                        break;
                    case strtotime('2015-03-27') :
                        $transaksjon2 = new transaksjon();
                        $transaksjon2->dato = '2015-03-27';
                        $transaksjon2->transaksjonBelop = -2056.45;
                        $transaksjon2->fraTilKontonummer = "114342344556";
                        $transaksjon2->melding = "Husleie";
                        $konto->transaksjoner[] = $transaksjon2;
                        break;
                    case strtotime('2015-03-29') :
                        $transaksjon3 = new transaksjon();
                        $transaksjon3->dato = '2015-03-29';
                        $transaksjon3->transaksjonBelop = 1454.45;
                        $transaksjon3->fraTilKontonummer = "114342344511";
                        $transaksjon3->melding = "Lekeland";
                        $konto->transaksjoner[] = $transaksjon3;
                        break;
                }
                $dato += (60 * 60 * 24); // en dag i tillegg i sekunder
            }
            return $konto;
        }

        function sjekkLoggInn($innPersonnummer, $innPassord)
        {
            if ($innPersonnummer === "12345678910" && $innPassord === "HeiHei") {
                $vellykket = "OK";
            } else {
                $vellykket = "Feil";
            }
            return $vellykket;
        }
        
        function hentKundeInfo($personnummer) {
            
            $kunde = new kunde();
            
            if (strlen($personnummer) != 11) {
                return "Feil personnummer";
            }
            
            $kunde->personnummer = "12345678910";
            $kunde->fornavn = "Ola";
            $kunde->etternavn = "Nordmann";
            $kunde->adresse = "Storgata 1";
            $kunde->telefonnr = "12345678";
            $kunde->passord = "123abc";
            $kunde->postnr = "0010";
            $kunde->poststed = "Oslo";
            
            if ($personnummer == $kunde->personnummer) {
            return $kunde;
            }
        }
        
        function endreKundeInfo($kunde) {
            
           $kunde1 = new kunde();
           
           $kunde1->personnummer = "12345678910";
           $kunde1->fornavn = "Ola";
           $kunde1->etternavn = "Nordmann";
           $kunde1->adresse = "Storgata 1";
           $kunde1->telefonnr = "12345678";
           $kunde1->passord = "123abc";
           $kunde1->postnr = "0010";
           $kunde1->poststed = "Oslo";
           
           if ($kunde->personnummer = null || $kunde->fornavn = null || $kunde->etternavn = null || $kunde->adresse = null || $kunde->telefonnr = null || $kunde->passord = null || $kunde->postnr = null || $kunde->poststed = null) {
               return "Ugyldig kundeinfo";
           } else {
               $kunde1->personnummer = $kunde->personnummer;
               $kunde1->fornavn = $kunde->fornavn;
               $kunde1->etternavn = $kunde->etternavn;
               $kunde1->adresse = $kunde->adresse;
               $kunde1->telefonnr = $kunde->telefonnr;
               $kunde1->passord = $kunde->passord;
               $kunde1->postnr = $kunde->postnr;
               $kunde1->poststed = $kunde->poststed;
               return $kunde1;
           }             
        }
        

        function registrerBetaling($kontoNr, $transaksjon) {
            $betalinger = array();
            if ($transaksjon->belop > 0) {
                array_push($betalinger, "$transaksjon->fraTilKontonummer"."$transaksjon->belop"."$transaksjon->dato"."$transaksjon->melding"."$kontoNr"."1");
            }
            if (count($betalinger) != 0) {
                $vellykket = "OK";
            }
            else {
                $vellykket = "Feil";
            }
            return $vellykket;

            return true;
        }

        function hentBetalinger($personnummer) {
            $betalinger = array("12345", 400, "01-01-2020", "Nett januar 2020", 12345, 1);
            if ($personnummer != "12345678910") {
                return "Feil";
            }
            if ($betalinger[5] == 1) {
                return $betalinger;
            } else {
                return "Feil";
            }
        }
    }
