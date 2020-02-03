<?php


include_once '../BLL/adminLogikk.php';
include_once '../Model/domeneModell.php';


class registrerKontoTest extends PHPUnit\Framework\TestCase
{
    public function testRegisterKontoOK(){
        $konto = new konto();
        $konto->personnummer = "11223344556";
        $admin = new Admin(new AdminDBStub);

        $resultat = $admin->registrerKonto($konto);

        $this->assertEquals("OK", $resultat);
    }

    public function testRegisterKontoFeil(){
        $konto = new konto();
        $konto->personnummer = null;
        $admin = new Admin(new AdminDBStub);

        $resultat = $admin->registrerKonto($konto);

        $this->assertEquals("Feil", $resultat);
    }
}