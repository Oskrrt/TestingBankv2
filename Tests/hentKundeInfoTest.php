<?php

include_once '../BLL/bankLogikk.php';
include_once '../Model/domeneModell.php';

class hentKundeInfoTest extends PHPUnit\Framework\TestCase {
    
    public function testRiktigPersonnummer() 
    {
      //Arrange
     $bank = new Bank(new BankDBStub());
     $personnummer = "12345678910";
     
      //Act
     $kunde = $bank->hentKundeInfo($personnummer);
        
      //Assert
     $this->assertEquals($kunde->personnummer, $personnummer);
        
    }
    
    public function testFeilPersonnummer() 
    {
       //Arrange
      $bank = new Bank(new BankDBStub());
      $personnummer = "12345678911";
        
       //Act
      $kunde = $bank->hentKundeInfo($personnummer);
      
       //Assert
      $this->assertEquals("Feil personnummer", $kunde);   
        
    }
    
    
}



?>