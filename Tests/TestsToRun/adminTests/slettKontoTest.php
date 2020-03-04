<?php


include_once '../BLL/adminLogikk.php';
include_once '../Model/domeneModell.php';


class slettKontoTest extends PHPUnit\Framework\TestCase
{
    public function testSlettKontoOK(){
        $konto = new konto();
        $konto->kontonummer = "01010122344";
        $admin = new Admin(new AdminDBStub);

        $resultat = $admin->slettKonto($konto->kontonummer);

        $this->assertEquals("OK", $resultat);
    }

    public function testSlettKontoFeil(){
        $konto = new konto();
        $konto->kontonummer = "denne kontoen finnes ikke hehe";
        $admin = new Admin(new AdminDBStub);

        $resultat = $admin->slettKonto($konto->kontonummer);

        $this->assertEquals("Feil", $resultat);
    }
}