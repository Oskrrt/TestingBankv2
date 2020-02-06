<?php

include_once '../Model/domeneModell.php';
include_once '../BLL/bankLogikk.php';

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
    
    public function testUgyldigPersonnummer()
    {
       //Arrange
      $bank = new Bank(new BankDBStub());
      $personnummer = "1234";
        
       //Act
      $kunde = $bank->hentKundeInfo($personnummer);
      
       //Assert
      $this->assertEquals("Feil personnummer", $kunde);   
        
    }

    public function testFeilPersonnummer(){
        $bank = new Bank(new BankDBStub());
        $personnummer = "11111111111";

        //Act
        $kunde = $bank->hentKundeInfo($personnummer);

        //Assert
        $this->assertEquals("Kunne ikke finne kunden", $kunde);
    }
    
}


?>
