<?php

include_once '../BLL/adminLogikk.php';
include_once '../Model/domeneModell.php';


class hentEnKundeTest extends PHPUnit\Framework\TestCase
{
    public function testHentEnKundeVellykket(){
        $enKunde = new kunde();
        $enKunde->personnummer = "01010122344";
        $admin = new Admin(new AdminDBStub());

        $funnetKunde = $admin->hentEnKunde($enKunde->personnummer);

        $this->assertStringContainsString("Per Olsen", $funnetKunde->navn);
    }

    public function testHentEnKundeFeilet(){
        $enKunde = new kunde();
        $enKunde->personnummer = "0";
        $admin = new Admin(new AdminDBStub());

        $funnetKunde = $admin->hentEnKunde($enKunde->personnummer);

        $this->assertEquals("Feil", $funnetKunde);
    }


}
