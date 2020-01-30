<?php
include_once '../Model/domeneModell.php';
include_once '../BLL/bankLogikk.php';


class hentBetalingerTest extends PHPUnit\Framework\TestCase
{
    public function testVellykketHenting() {
        // arrange
        $personnummer = "12345678910";
        $bank = new Bank(new BankDBStub());
        // act
        $returVerdi = $bank->hentBetalinger($personnummer);
        // assert
        $this->assertEquals("12345", $returVerdi[0]);
        $this->assertEquals(400, $returVerdi[1]);
        $this->assertEquals("01-01-2020", $returVerdi[2]);
        $this->assertEquals("Nett januar 2020", $returVerdi[3]);
        $this->assertEquals(12345, $returVerdi[4]);
        $this->assertEquals(1, $returVerdi[5]);
    }

    public function testMislykketHenting() {
        // arrange
        $personnummer = "12345678911";
        $bank = new Bank(new BankDBStub());
        // act
        $returVerdi = $bank->hentBetalinger($personnummer);
        // assert
        $this->assertEquals("Feil", $returVerdi);
    }
}
