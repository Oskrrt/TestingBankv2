<?php


include_once '../BLL/adminLogikk.php';
include_once '../Model/domeneModell.php';


class endreKontoTest extends PHPUnit\Framework\TestCase
{
    public function testEndreKontoOK(){
        $nyKonto = new konto();
        $nyKonto->personnummer = "01010122344";
        $admin = new Admin(new AdminDBStub);

        $resultat = $admin->endreKonto($nyKonto);

        $this->assertEquals("OK", $resultat);
    }

    public function testEndreKontoFeil(){
        $nyKonto = new konto();
        $nyKonto->personnummer = "blabla";
        $admin = new Admin(new AdminDBStub);

        $resultat = $admin->endreKonto($nyKonto);

        $this->assertEquals("Feil", $resultat);
    }
}