<?php

include_once '../BLL/bankLogikk.php';
include_once '../Model/domeneModell.php';

class endreKundeInfoBankDatabaseTest extends PHPUnit\Framework\TestCase {
    
    public function testRiktigKundeInfo() {
        //Arrange
        $bank = new Bank(new BankDBStub());
        $kunde = new kunde();
        $kunde->personnummer = "234567891011";
        $kunde->fornavn = "Lars";
        $kunde->etternavn = "Olsen";
        $kunde->adresse = "Brugata 4";
        $kunde->telefonnr = "81549300";
        $kunde->passord = "Liverpool";
        $kunde->postnr = "9998";
        $kunde->poststed = "Alta";  
        
        //Act
        $resultat = $bank->endreKundeInfo($kunde);
        
        //Assert
        $this->assertEquals("OK", $resultat);
    }
    
    public function testFeilKundeInfo() {
        //Arrange
        $bank = new Bank(new BankDBStub());
        $kunde = new kunde();
        $kunde->personnummer = "34567890111";
        $kunde->fornavn = "";
        $kunde->etternavn = null;
        $kunde->adresse = "";
        $kunde->telefonnr = "12345678";
        $kunde->passord = "";
        $kunde->postnr = "5555";
        $kunde->poststed = "";
        
        //Act
        $resultat = $bank->endreKundeInfo($kunde);
        
        //Assert
        $this->assertEquals("Ugyldig kundeinfo", $resultat);
    }


}
