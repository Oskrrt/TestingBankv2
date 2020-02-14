<?php
include_once '../Model/domeneModell.php';

class adminDBStub{
    function hentEnKunde($personnummer)
    {
        $enKunde = new kunde();
        $enKunde->personnummer = "01010122344";
        $enKunde->navn = "Per Olsen";
        $enKunde->adresse = "Osloveien 82, 0270 Oslo";
        $enKunde->telefonnr="12345678";

        if ($personnummer == "01010122344"){
            return $enKunde;
        } else {
            return "Feil";
        }

    }

    function hentAlleKunder()
    {
        $alleKunder = array();
        $kunde1 = new kunde();
        $kunde1->personnummer ="01010122344";
        $kunde1->navn = "Per Olsen";
        $kunde1->adresse = "Osloveien 82 0270 Oslo";
        $kunde1->telefonnr="12345678";
        $alleKunder[]=$kunde1;
        $kunde2 = new kunde();
        $kunde2->personnummer ="01010122344";
        $kunde2->navn = "Line Jensen";
        $kunde2->adresse = "Askerveien 100, 1379 Asker";
        $kunde2->telefonnr="92876789";
        $alleKunder[]=$kunde2;
        $kunde3 = new kunde();
        $kunde3->personnummer ="02020233455";
        $kunde3->navn = "Ole Olsen";
        $kunde3->adresse = "Bærumsveien 23, 1234 Bærum";
        $kunde3->telefonnr="99889988";
        $alleKunder[]=$kunde3;
        return $alleKunder;
    }

    function endreKundeInfo($kundeInn){
        $alleKunder = array();
        $kunde = new Kunde();
        $kunde->personnummer = "01010122344";
        $kunde->navn = "Per Olsen";
        $kunde->adresse = "Osloveien 82 0270 Oslo";
        $kunde->telefonnr = "12345678";
        $alleKunder[0] = $kunde;

        if($kundeInn->personnummer == "01010122344") {
            //endre info på $kunde fordi de har samme personnummer
            $alleKunder[0] = $kundeInn;
            return "OK";
        } else {
            return "Feil";
        }
    }

    function registrerKunde($kunde){
        if ($kunde->personnummer != null){
            $alleKunder = array();
            $alleKunder[] = $kunde;
            return "OK";
        } else {
            return "Feil";
        }

    }

    function slettKunde($personnummer){
        if ($personnummer == "01010122344"){
            $alleKunder = array();
            $kunde1 = new Kunde();
            $kunde1->personnummer ="01010122344";
            $kunde1->navn = "Per Olsen";
            $kunde1->adresse = "Osloveien 82 0270 Oslo";
            $kunde1->telefonnr="12345678";
            $alleKunder[]=$kunde1;
            unset($alleKunder[0]);
            return "OK";
        } else{
            return "Feil";
        }
    }

    function registrerKonto($konto){
        if ($konto->personnummer == 11223344556){
            $alleKonto = array();
            $alleKonto[] = $konto;
            return "OK";
        } else {
            return "Feil";
        }

    }

    function endreKonto($nyKontoInfo){
        if ($nyKontoInfo->personnummer == "01010122344"){
            $alleKonto = array();
            $gammeKontoInfo = new konto();
            $gammeKontoInfo->personnummer = "01010122344";
            $gammeKontoInfo->kontonummer = "1";
            $gammeKontoInfo->saldo = 200;
            $gammeKontoInfo->transaksjoner = array();
            $gammeKontoInfo->valuta = "NOK";

            $alleKonto[0] = $gammeKontoInfo;

            $alleKonto[0] = $nyKontoInfo;
            return "OK";
        } else {
            return "Feil";
        }

    }

    function hentAlleKonti(){
        $alleKonto = array();
        $konto1 = new konto();
        $konto1->personnummer = "01010122344";
        $konto1->kontonummer = "1";
        $konto1->saldo = 200;
        $konto1->transaksjoner = array();
        $konto1->valuta = "NOK";

        $konto2 = new konto();
        $konto2->personnummer = "11223344556";
        $konto2->kontonummer = "2";
        $konto2->saldo = 13;
        $konto2->transaksjoner = array();
        $konto2->valuta = "NOK";

        $konto3 = new konto();
        $konto3->personnummer = "22334455667";
        $konto3->kontonummer = "3";
        $konto3->saldo = 100000000;
        $konto3->transaksjoner = array();
        $konto3->valuta = "NOK";

        $alleKonto [] = $konto1;
        $alleKonto [] = $konto2;
        $alleKonto [] = $konto3;

        return $alleKonto;
    }

    function slettKonto($kontonummer){
        if ($kontonummer == "01010122344"){
            $alleKonto = array();
            $konto = new konto();
            $konto->personnummer = "01010122344";
            $konto->kontonummer = "1";
            $konto->saldo = 200;
            $konto->transaksjoner = array();
            $konto->valuta = "NOK";

            $alleKonto[0] = $konto;
            unset($alleKonto[0]);
            return "OK";
        } else {
            return "Feil";
        }

    }
}

