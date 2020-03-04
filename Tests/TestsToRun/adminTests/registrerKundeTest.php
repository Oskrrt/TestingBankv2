<?php


include_once '../BLL/adminLogikk.php';
include_once '../Model/domeneModell.php';


class registrerKundeTest extends PHPUnit\Framework\TestCase
{
    public function testRegistrerKundeOK(){
        $kunde = new kunde();
        $kunde->personnummer = "11223344556";
        $admin = new Admin(new AdminDBStub);

        $resultat = $admin->registrerKunde($kunde);

        $this->assertEquals("OK", $resultat);
    }

    public function testRegistrerKundeFeil(){
        $kunde = new kunde();
        $kunde->personnummer = null;
        $admin = new Admin(new AdminDBStub);

        $resultat = $admin->registrerKunde($kunde);

        $this->assertEquals("Feil", $resultat);
    }


}