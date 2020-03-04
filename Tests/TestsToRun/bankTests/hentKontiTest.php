<?php

include_once '../BLL/bankLogikk.php';

class hentKontiTest extends PHPUnit\Framework\TestCase {
    
    public function test_hentKonti_OK(){
        $bank = new Bank(new BankDBStub());
        $personnummer = 1;
        $konto = $bank->hentKonti($personnummer);
        
        $this->assertEquals(101010, $konto[0]->kontonummer);
        $this->assertEquals(202020, $konto[1]->kontonummer);
    }
    
    public function test_hentKonti_Feil(){
        $bank = new Bank(new BankDBStub());
        $personnummer = -1;
        
        $konto = $bank->hentKonti($personnummer);
        $this->assertEquals("Feil", $konto);
    }
}

