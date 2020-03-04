<?php


include_once '../BLL/adminLogikk.php';
include_once '../Model/domeneModell.php';


class slettKundeTest extends PHPUnit\Framework\TestCase
{
    public function testSlettKundeOK(){
        $kunde = new kunde();
        $kunde->personnummer = "01010122344";
        $admin = new Admin(new AdminDBStub);

        $resultat = $admin->slettKunde($kunde->personnummer);

        $this->assertEquals("OK", $resultat);
    }

    public function testSlettKundeFeil(){
        $kunde = new kunde();
        $kunde->personnummer = "blabla";
        $admin = new Admin(new AdminDBStub);

        $resultat = $admin->slettKunde($kunde->personnummer);

        $this->assertEquals("Feil", $resultat);
    }
}