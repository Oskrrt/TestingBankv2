<?php

include_once '../Model/domeneModell.php';
include_once '../BLL/bankLogikk.php';

use PHPUnit\Framework\TestCase;

class utforBetalingTest extends TestCase
{
    public function testUtforBetaling() {
        $TxId = 1;
        $bank = new Bank(new BankDBStub());

        $ok = $bank->utforBetaling($TxId);

        $this->assertEquals("OK", $ok);
    }

    public function testMislykketBetaling() {
        $TxId = 0;
        $bank = new Bank(new BankDBStub());

        $ok = $bank->utforBetaling($TxId);


        $this->assertEquals("Feil", $ok);
    }
}
