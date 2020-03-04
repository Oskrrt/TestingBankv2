<?php
include_once '../BLL/bankLogikk.php';

class hentSaldiTest extends PHPUnit\Framework\TestCase {
    
    public function test_hentSaldi_OK(){
        $bank = new Bank(new BankDBStub());
        $personnummer = 1;
        $konto = $bank->hentSaldi($personnummer);
        
        $this->assertEquals(101010, $konto[0]->kontonummer);
        $this->assertEquals(3000, $konto[0]->saldo);
        $this->assertEquals("Sparekonto", $konto[0]->type);
        $this->assertEquals("NOK", $konto[0]->valuta);
        
        $this->assertEquals(202020, $konto[1]->kontonummer);
        $this->assertEquals(500, $konto[1]->saldo);
        $this->assertEquals("Brukskonto", $konto[1]->type);
        $this->assertEquals("NOK", $konto[1]->valuta);
    }
    
    public function test_hentSaldi_Feil(){
        $bank = new Bank(new BankDBStub());
        $personnummer = -1;
        
        $konto = $bank->hentSaldi($personnummer);
        $this->assertEquals("Feil", $konto);
    } 
}