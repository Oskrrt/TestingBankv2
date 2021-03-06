<?php
include_once '../Model/domeneModell.php';
include_once '../BLL/bankLogikk.php';



class registrerBetalingTest extends PHPUnit\Framework\TestCase
{
    public function testVellykketBetaling() {
        $kontoNr = 12345;
        $transaksjon = new transaksjon();
        $transaksjon->fraTilKontonummer = 12346;
        $transaksjon->dato = "01-01-2020";
        $transaksjon->belop = 420;
        $transaksjon->melding = "Internett januar 2020";
        $bank = new Bank(new BankDBStub());

        $ok = $bank->registrerBetaling($kontoNr, $transaksjon);

        $this->assertEquals("OK", $ok);
    }

    public function testMislykketBetaling() {
        $kontoNr = 12345;
        $transaksjon = new transaksjon();
        $transaksjon->fraTilKontonummer = 12346;
        $transaksjon->dato = "01-01-2020";
        $transaksjon->belop = 0;
        $transaksjon->melding = "Internett januar 2020";
        $bank = new Bank(new BankDBStub());

        $ok = $bank->registrerBetaling($kontoNr, $transaksjon);

        $this->assertEquals("Feil",$ok);
    }
}
