<?php
include_once '../Model/domeneModell.php';
include_once '../BLL/bankLogikk.php';



class sjekkLoggInnTest extends PHPUnit\Framework\TestCase {

    public function testRiktigPersonnummer() {
        // arrange
        $personnummer = "12345678910";
        $personnummer2 = "11119743783";
        // act

        // assertion
        $this->assertTrue((boolean)preg_match("/^[0-9]{11}$/", $personnummer));
        $this->assertTrue((boolean)preg_match("/^[0-9]{11}$/", $personnummer2));
    }

    public function testFeilPersonnummer() {
        // arrange
        $personnummer = "fjwfh,welfe";
        $personnummer2 = "3456788";
        $personnummer3 = "#¤%&/((/";
        // act

        // assertion
        $this->assertFalse((boolean)preg_match("/^[0-9]{11}$/", $personnummer));
        $this->assertFalse((boolean)preg_match("/^[0-9]{11}$/", $personnummer2));
        $this->assertFalse((boolean)preg_match("/^[0-9]{11}$/", $personnummer3));
    }

    public function testRiktigPassord() {
        //arrange
        $passord = "HeiHei";
        $passord2 = "oiiJMNeje_dd.ff35";
        $passord3 = "cbbwfwe567765--HDHJD";

        // assertion
        $this->assertTrue((boolean)preg_match("/^.{6,30}$/", $passord));
        $this->assertTrue((boolean)preg_match("/^.{6,30}$/", $passord2));
        $this->assertTrue((boolean)preg_match("/^.{6,30}$/", $passord3));
    }

    public function testFeilPassord() {
        //arrange
        $passord = "hei";
        $passord2 = "1234";
        $passord3 = "heiggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggg";

        // assertion
        $this->assertFalse((boolean)preg_match("/^.{6,30}$/", $passord));
        $this->assertFalse((boolean)preg_match("/^.{6,30}$/", $passord2));
        $this->assertFalse((boolean)preg_match("/^.{6,30}$/", $passord3));
    }

    public function testVellykketLoggInn() {
        // arrange
        $personnummer = "12345678910";
        $passord = "HeiHei";
        $bank = new Bank(new BankDBStub());
        // act hei
        $ok = $bank->sjekkLoggInn($personnummer, $passord);
        // assertion
        $this->assertEquals("OK",$ok);
    }

    public function testMislykketLoggInn() {
        // arrange
        $personnummer = "11119949123";
        $passord = "FeilPassord";

        $bank = new Bank(new BankDBStub());
        // act
        $ok = $bank->sjekkLoggInn($personnummer, $passord);
        // assertion
        $this->assertEquals("Feil",$ok);
    }


}

?>