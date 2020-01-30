<?php
/*
function __construct()
{
    $this->db=new mysqli("localhost","root","","bank");
    $this->db->set_charset("utf8");
}
*/

/*function hentEnKunde($personnummer)
    {
        $enKunde = new kunde();
        $enKunde->personnummer =$personnummer;
        $enKunde->navn = "Per Olsen";
        $enKunde->adresse = "Osloveien 82, 0270 Oslo";
        $enKunde->telefonnr="12345678";
        return $enKunde;
    }*/

function hentEnKunde($personnummer)
{
    $enKunde = new kunde();
    $enKunde->personnummer =$personnummer;
    $enKunde->navn = "Per Olsen";
    $enKunde->adresse = "Osloveien 82, 0270 Oslo";
    $enKunde->telefonnr="12345678";
    return $enKunde;
}
/*
function hentAlleKunder()
{
    $sql = "Select * from Kunde Left Join Poststed On Kunde.postnr = Poststed.postnr ";
    $resultat = $this->db->query($sql);
    $kunder = array();
    while($rad = $resultat->fetch_object())
    {
        $kunder[]=$rad;
    }
    return $kunder;
}
*/
function hentAlleKunder()
{
    $alleKunder = array();
    $kunde1 = new kunde();
    $kunde1->personnummer ="01010122344";
    $kunde1->navn = "Per Olsen";
    $kunde1->adresse = "Osloveien 82 0270 Oslo";
    $kunde1->telefonnr="12345678";
    $alleKunder[]=$kunde1;
    $kunde2 = new kunde();
    $kunde2->personnummer ="01010122344";
    $kunde2->navn = "Line Jensen";
    $kunde2->adresse = "Askerveien 100, 1379 Asker";
    $kunde2->telefonnr="92876789";
    $alleKunder[]=$kunde2;
    $kunde3 = new kunde();
    $kunde3->personnummer ="02020233455";
    $kunde3->navn = "Ole Olsen";
    $kunde3->adresse = "Bærumsveien 23, 1234 Bærum";
    $kunde3->telefonnr="99889988";
    $alleKunder[]=$kunde3;
    return $alleKunder;
}

/*function endreKundeInfo($kunde)
{
    $this->db->autocommit(false);
    // Sjekk om nytt postnr ligger i Poststeds-tabellen, dersom ikke legg det inn
    $sql = "Select * from Poststed Where Postnr = '$kunde->postnr'";
    $resultat = $this->db->query($sql);
    if($this->db->affected_rows!=1)
    {
        // ligger ikke i poststedstabellen
        $sql = "Insert Into Poststed (Postnr, Poststed) Values ('$kunde->postnr','$kunde->poststed')";
        $resultat = $this->db->query($sql);
        if($this->db->affected_rows < 1)
        {
            $this->db->rollback();
            return "Feil";
        }
    }
    // oppdater Kunde-tabellen
    $sql =  "Update Kunde Set Fornavn = '$kunde->fornavn', Etternavn = '$kunde->etternavn',";
    $sql .= " Adresse = '$kunde->adresse', Postnr = '$kunde->postnr',";
    $sql .= " Telefonnr = '$kunde->telefonnr', Passord ='$kunde->passord'";
    $sql .= " Where Personnummer = '$kunde->personnummer'";
    $resultat = $this->db->query($sql);
    $this->db->commit();
    return "OK";
}*/

function endreKundeInfo($kundeInn){
    $alleKunder = array();
    $kunde1 = new Kunde();
    $kunde1->personnummer ="01010122344";
    $kunde1->navn = "Per Olsen";
    $kunde1->adresse = "Osloveien 82 0270 Oslo";
    $kunde1->telefonnr="12345678";
    $alleKunder[]=$kunde1;
    $kunde2 = new kunde();
    $kunde2->personnummer ="01010122344";
    $kunde2->navn = "Line Jensen";
    $kunde2->adresse = "Askerveien 100, 1379 Asker";
    $kunde2->telefonnr="92876789";
    $alleKunder[]=$kunde2;
    $kunde3 = new kunde();
    $kunde3->personnummer ="02020233455";
    $kunde3->navn = "Ole Olsen";
    $kunde3->adresse = "Bærumsveien 23, 1234 Bærum";
    $kunde3->telefonnr="99889988";
    $alleKunder[]=$kunde3;

    foreach ($alleKunder as $kunde){
        if ($kunde->personnummer == $kundeInn->personnummer){
            $kunde->personnummer = $kundeInn->personnummer;
            $kunde->navn = $kundeInn->navn;
            $kunde->adresse = $kundeInn->adresse;
            $kunde->telefonnr = $kundeInn->telefonnr;
            return true;
        } else {
            return "Kunnde ikke finne kunde";
        }
    }
    return false;
}

/*function registrerKunde($kunde)
{
    $this->db->autocommit(false);
    // Sjekk om nytt postnr ligger i Poststeds-tabellen, dersom ikke legg det inn
    $sql = "Select * from Poststed Where Postnr = '$kunde->postnr'";
    $resultat = $this->db->query($sql);
    if($this->db->affected_rows!=1)
    {
        // ligger ikke i poststedstabellen
        $sql = "Insert Into Poststed (Postnr, Poststed) Values ('$kunde->postnr','$kunde->poststed')";
        $resultat = $this->db->query($sql);
        if($this->db->affected_rows < 1)
        {
            $this->db->rollback();
            return "Feil";
        }
    }

    $sql = "Insert into Kunde (Personnummer,Fornavn,Etternavn,Adresse,Postnr,Telefonnr,Passord)";
    $sql .= "Values ('$kunde->personnummer','$kunde->fornavn','$kunde->etternavn',"
        . "'$kunde->adresse','$kunde->postnr','$kunde->telefonnr','$kunde->passord')";
    $resultat = $this->db->query($sql);
    if($this->db->affected_rows==1)
    {
        $this->db->commit();
        return "OK";
    }
    else
    {
        $this->db->rollback();
        return "Feil";
    }
}*/
function registrerKunde($kunde){
    $alleKunder = array();
    $alleKunder[] = $kunde;
    return "ok";
}
/*function slettKunde($personnummer)
{
    $sql = "Delete From Kunde Where Personnummer = '$personnummer'";
    $resultat = $this->db->query($sql);
    if($this->db->affected_rows==1)
    {
        return "OK";
    }
    else
    {
        return "Feil";
    }
}*/

function slettKunde($personnummer){
    $alleKunder = array();
    $kunde1 = new Kunde();
    $kunde1->personnummer ="01010122344";
    $kunde1->navn = "Per Olsen";
    $kunde1->adresse = "Osloveien 82 0270 Oslo";
    $kunde1->telefonnr="12345678";
    $alleKunder[]=$kunde1;
    $kunde2 = new kunde();
    $kunde2->personnummer ="01010122344";
    $kunde2->navn = "Line Jensen";
    $kunde2->adresse = "Askerveien 100, 1379 Asker";
    $kunde2->telefonnr="92876789";
    $alleKunder[]=$kunde2;
    $kunde3 = new kunde();
    $kunde3->personnummer ="02020233455";
    $kunde3->navn = "Ole Olsen";
    $kunde3->adresse = "Bærumsveien 23, 1234 Bærum";
    $kunde3->telefonnr="99889988";
    $alleKunder[]=$kunde3;


    for ($i = 0; $i < count($alleKunder); $i++){
        if ($alleKunder[$i]->personnummer == $personnummer){
            unset($alleKunder[$i]);
            return true;
        } else {
            return false;
        }
    }
    return false;
}

/*function registerKonto($konto)
{
    $sql = "Select * from Kunde Where Personnummer = '$konto->personnummer'";
    $resultat = $this->db->query($sql);
    if($this->db->affected_rows!=1)
    {
        echo json_encode("Feil i personnummer");
        die();
    }
    $sql = "Insert into Konto (Personnummer, Kontonummer, Saldo, Type, Valuta)";
    $sql .= "Values ('$konto->personnummer','$konto->kontonummer','$konto->saldo',"
        . "'$konto->type','$konto->valuta')";
    $resultat = $this->db->query($sql);
    if($this->db->affected_rows==1)
    {
        return "OK";
    }
    else
    {
        return "Feil";
    }
}*/

function registrerKonto($konto){

}

/*function endreKonto($konto)
{
    $sql = "Select * from Kunde Where Personnummer = '$konto->personnummer'";
    $resultat = $this->db->query($sql);
    if($this->db->affected_rows!=1)
    {
        echo json_encode("Feil i personnummer");
        die();
    }
    $sql = "Select * from Konto Where Kontonummer = '$konto->kontonummer'";
    $resultat = $this->db->query($sql);
    if($this->db->affected_rows!=1)
    {
        echo json_encode("Feil i kontonummer");
        die();
    }

    $sql =  "Update Konto Set Personnummer = '$konto->personnummer', "
        . "Kontonummer = '$konto->kontonummer', Type = '$konto->type', "
        . "Saldo = '$konto->saldo', Valuta = '$konto->valuta' "
        . "Where Kontonummer = '$konto->kontonummer'";
    $resultat = $this->db->query($sql);
    return "OK";
}*/

/*function hentAlleKonti()
{
    $sql = "Select * from Konto";
    $resultat = $this->db->query($sql);
    $konti=array();
    while($rad = $resultat->fetch_object())
    {
        $konti[]=$rad;
    }
    return $konti;
}*/
/*function slettKonto($kontonummer)
{
    $sql = "Delete from Konto Where Kontonummer = '$kontonummer'";
    $resultat = $this->db->query($sql);
    if($this->db->affected_rows!=1)
    {
        echo json_encode("Feil kontonummer");
        die();
    }
    return "OK";
}
*/