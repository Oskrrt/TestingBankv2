<?php
include_once '../BLL/bankLogikk.php';
include_once '../Model/domeneModell.php';


class hentAlleKunderTest extends PHPUnit\Framework\TestCase{

    public function testVellykketHentAlleKunder(){
        //arrange
        $alleKunder = array();
        $admin = new Admin(new adminDBStub());
        //act
        $alleKunder = $admin->hentAlleKunder();
        //assert
        $this->assertCount(3, $alleKunder);
    }
}
