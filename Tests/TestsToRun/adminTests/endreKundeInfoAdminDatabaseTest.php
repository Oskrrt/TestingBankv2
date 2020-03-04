<?php
include_once '../BLL/adminLogikk.php';
include_once '../Model/domeneModell.php';


class testEndreKundeInfoTest extends PHPUnit\Framework\TestCase
{
    public function testEndreKundeOK()
    {
        //arrange
        $kunde = new kunde();
        $kunde->personnummer = "01010122344";

        $admin = new Admin(new adminDBStub());
        //act
        $result = $admin->endreKundeInfo($kunde);
        //assert
        $this->assertEquals("OK", $result);
    }

    public function testEndreKundeFeil()
    {
        //arrange
        $kunde = new kunde();
        $kunde->personnummer = "blabla";

        $admin = new Admin(new adminDBStub());
        //act
        $result = $admin->endreKundeInfo($kunde);
        //assert
        $this->assertEquals("Feil", $result);
    }
}
