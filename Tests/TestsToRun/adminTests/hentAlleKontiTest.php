<?php


include_once '../BLL/adminLogikk.php';
include_once '../Model/domeneModell.php';


class hentAlleKontiTest extends PHPUnit\Framework\TestCase
{
    public function testHentAlleKonti(){
        $admin = new Admin(new AdminDBStub);

        $resultat = $admin->hentAlleKonti();

        $this->assertCount(3, $resultat);
    }
}