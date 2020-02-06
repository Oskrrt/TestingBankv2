<?php
    include_once '../Model/domeneModell.php';
    class BankDBStub
    {

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

        function hentKonti($personnummer)
        {
            if ($personnummer == -1) {
                return "Feil";
            }
            $kontoer = array();
            $Konto1 = new konto();
            $Konto1->personnummer = $personnummer;
            $Konto1->kontonummer = 101010;
            $Konto1->saldo = 3000;
            $Konto1->type = "Sparekonto";
            $Konto1->valuta = "NOK";
            $kontoer[] = $Konto1;

            $Konto2 = new konto();
            $Konto2->personnummer = $personnummer;
            $Konto2->kontonummer = 202020;
            $Konto2->saldo = 500;
            $Konto2->type = "Brukskonto";
            $Konto2->valuta = "NOK";
            $kontoer[] = $Konto2;

            return $kontoer;
        }

        function hentSaldi($personnummer)
        {
            if ($personnummer == -1) {
                return "Feil";
            }
            $kontoer = array();

            $Konto1 = new konto();
            $Konto1->personnummer = $personnummer;
            $Konto1->kontonummer = 101010;
            $Konto1->saldo = 3000;
            $Konto1->type = "Sparekonto";
            $Konto1->valuta = "NOK";
            $kontoer[] = $Konto1;

            $Konto2 = new konto();
            $Konto2->personnummer = $personnummer;
            $Konto2->kontonummer = 202020;
            $Konto2->saldo = 500;
            $Konto2->type = "Brukskonto";
            $Konto2->valuta = "NOK";
            $kontoer[] = $Konto2;

            return $kontoer;
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
            } else {
                return "Kunne ikke finne kunden";
            }
        }
        
        function endreKundeInfo($kunde) {
            if ($kunde->personnummer == null || $kunde->fornavn == null || $kunde->etternavn == null || $kunde->adresse == null || $kunde->telefonnr == null || $kunde->passord == null || $kunde->postnr == null || $kunde->poststed == null) {
                return "Ugyldig kundeinfo";
            }
           $kunde1 = new kunde();
           
           $kunde1->personnummer = "12345678910";
           $kunde1->fornavn = "Ola";
           $kunde1->etternavn = "Nordmann";
           $kunde1->adresse = "Storgata 1";
           $kunde1->telefonnr = "12345678";
           $kunde1->passord = "123abc";
           $kunde1->postnr = "0010";
           $kunde1->poststed = "Oslo";
           

           $kunde1->personnummer = $kunde->personnummer;
           $kunde1->fornavn = $kunde->fornavn;
           $kunde1->etternavn = $kunde->etternavn;
           $kunde1->adresse = $kunde->adresse;
           $kunde1->telefonnr = $kunde->telefonnr;
           $kunde1->passord = $kunde->passord;
           $kunde1->postnr = $kunde->postnr;
           $kunde1->poststed = $kunde->poststed;
           return "OK";
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
        }

        function hentBetalinger($personnummer) {
            $betalinger = array("12345", 400, "01-01-2020", "Nett januar 2020", 12345, 1);
            if ($personnummer != "12345678910") {
                return "Feil";
            }
            else {
                return $betalinger;
            }
        }

        function utforBetaling($TxId) {
            if ($TxId === 1) {
                return "OK";
            } else {
                return "Feil";
            }
        }
    }
