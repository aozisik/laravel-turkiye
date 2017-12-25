<?php

use PHPUnit\Framework\TestCase;

class HelperTests extends TestCase
{
    /**
     * @test
     */
    public function tr_strtolower()
    {
        $this->assertEquals('çılgın koşu', tr_strtolower('ÇIlgın KoŞu'));
        $this->assertEquals('iyelik ekleri', tr_strtolower('İyelİk eklerİ'));
        $this->assertEquals('ılık rüzgarlar', tr_strtolower('ıLIK RÜZGARLAR'));
        $this->assertEquals('izmir\'de ılık ilkbahar akşamı', tr_strtolower('İzmir\'de Ilık İlkbahar akşamı'));
    }

    /**
     * @test
     */
    public function tr_strtoupper()
    {
        $this->assertEquals('IĞDIR\'DA ILIK İLKBAHAR AKŞAMI', tr_strtoupper('Iğdır\'da Ilık İlkbahar akşamı'));
    }

    /**
     * @test
     */
    public function tr_ucwords()
    {
        $this->assertEquals('Çılgın Koşu', tr_ucwords('ÇILgın koŞu'));
        $this->assertEquals('İyelik Ekleri', tr_ucwords('iYelik eklerİ'));
        $this->assertEquals('Ilık Rüzgarlar', tr_ucwords('ıLIK RÜZGARLAR'));
        $this->assertEquals('Iğdır\'da Ilık İlkbahar Akşamı', tr_ucwords('ığdIr\'da ılIk ilkbAhar Akşamı'));
    }
}
