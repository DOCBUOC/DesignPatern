<?php

interface hangbayFactory
{
    public function getVePhoThong();

    public function getVeThuongGia();
}


abstract class hangbayAbstract
{
    protected $name = 'default hang bay';

    protected $_builder;

    public function __construct()
    {
        $this->_builder = $this->_createBuilder();
    }

    abstract protected function _createBuilder(): Ve_Builder_Interface;

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    abstract public function getVePhoThong();

    /**
     * @return mixed
     */
    abstract public function getVeThuongGia();
}

interface Ve_Builder_Interface
{
    public function setChinhSachHanhLy($string);

    public function setChoNgoi($string);

    public function setSuatAn($string);

    public function setName($string);

    public function getVe();
}

class vietnam_airline_factory_ve_builder implements Ve_Builder_Interface
{
    /** @var ve */
    protected $_ve;

    public function __construct()
    {
        $this->reset();
    }

    protected function reset()
    {
        $this->_ve = new ve();
    }

    public function setChinhSachHanhLy($chinhSachHanhLy)
    {
        $this->_ve->setChinhSachHanhLy($chinhSachHanhLy);
        return $this;
    }

    public function setChoNgoi($choNgoi)
    {
        $this->_ve->setChoNgoi($choNgoi);
        return $this;
    }

    public function setSuatAn($suatAn)
    {
        $this->_ve->setSuatAn($suatAn);
        return $this;
    }

    public function getVe()
    {
        $ve = $this->_ve;
        $this->reset();
        return $ve;
    }

    public function setName($string)
    {
        $this->_ve->setName($string);
        return $this;
    }
}

class vietjet_air_factory_ve_builder implements Ve_Builder_Interface
{
    protected $_ve;

    public function __construct()
    {
        $this->reset();
    }

    protected function reset()
    {
        $this->_ve = new ve();
    }

    public function setChinhSachHanhLy($chinhSachHanhLy)
    {
        $this->_ve->setChinhSachHanhLy($chinhSachHanhLy);
        return $this;
    }

    public function setChoNgoi($choNgoi)
    {
        $this->_ve->setChoNgoi($choNgoi);
        return $this;
    }

    public function setSuatAn($suatAn)
    {
        $this->_ve->setSuatAn($suatAn);
        return $this;
    }

    public function getVe()
    {
        $ve = $this->_ve;
        $this->reset();
        return $ve;
    }

    public function setName($string)
    {
        $this->_ve->setName($string);
        return $this;
    }
}

class vietnam_airline_factory extends hangbayAbstract implements hangbayFactory
{
    protected $name = 'Vietnam Airlines';

    public function getVePhoThong()
    {
        /** @var vietnam_airline_factory_ve_builder */
        return $this->_builder->setChinhSachHanhLy('20kg ký gửi, 7kg xách tay')
            ->setSuatAn('Bữa ăn nhẹ, Nước uống')
            ->setChoNgoi('Ghế hạng Phổ Thông - Khoảng cách giữa các ghế: 81 cm')
            ->setName('Phổ Thông')
            ->getVe();
    }

    public function getVeThuongGia()
    {
        /** @var vietnam_airline_factory_ve_builder */
        return $this->_builder->setChinhSachHanhLy('40kg ký gửi, 10kg xách tay')
            ->setSuatAn('Suất ăn đặc biệt, Đồ uống có cồn')
            ->setChoNgoi('Ghế hạng Thương Gia - Ghế ngả 180 độ, Khoảng cách giữa các ghế: 110 cm')
            ->setName('Thương Gia')
            ->getVe();
    }

    protected function _createBuilder(): Ve_Builder_Interface
    {
        return new vietnam_airline_factory_ve_builder();
    }
}


class vietjet_air_factory extends hangbayAbstract implements hangbayFactory
{
    protected $name = 'VietJet Air';

    protected function _createBuilder(): Ve_Builder_Interface
    {
        return new vietjet_air_factory_ve_builder();
    }

    public function getVePhoThong()
    {
        return $this->_builder->setChinhSachHanhLy('15kg ký gửi, 7kg xách tay')
            ->setSuatAn('Mua thêm')
            ->setChoNgoi('Ghế hạng Phổ Thông - Khoảng cách giữa các ghế: 75 cm')
            ->setName('Phổ Thông')
            ->getVe();
    }

    public function getVeThuongGia()
    {
        return $this->_builder->setChinhSachHanhLy('30kg ký gửi, 10kg xách tay')
            ->setSuatAn('Bữa ăn, Nước uống')
            ->setChoNgoi('Ghế hạng Thương Gia - Ghế ngả 165 độ, Khoảng cách giữa các ghế: 100 cm')
            ->setName('Thương Gia')
            ->getVe();
    }
}


class ve
{
    protected $name = 've default';
    protected $_chinh_sach_hanh_ly = 'chinh sach hanh ly defalt';
    protected $_cho_ngoi = 'cho ngoi default';
    protected $_suat_an = 'suat an default';

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    public function setName($string)
    {
        $this->name = $string;
    }

    /**
     * @return string
     */
    public function getChinhSachHanhLy()
    {
        return $this->_chinh_sach_hanh_ly;
    }

    /**
     * @return string
     */
    public function getChoNgoi()
    {
        return $this->_cho_ngoi;
    }

    /**
     * @return string
     */
    public function getSuatAn()
    {
        return $this->_suat_an;
    }

    /**
     * @param string $chinh_sach_hanh_ly
     */
    public function setChinhSachHanhLy($chinh_sach_hanh_ly)
    {
        $this->_chinh_sach_hanh_ly = $chinh_sach_hanh_ly;
        return $this;
    }

    /**
     * @param string $cho_ngoi
     */
    public function setChoNgoi($cho_ngoi)
    {
        $this->_cho_ngoi = $cho_ngoi;
        return $this;
    }

    /**
     * @param string $suat_an
     */
    public function setSuatAn($suat_an)
    {
        $this->_suat_an = $suat_an;
        return $this;
    }
}

class ve_pho_thong extends ve
{
    protected $name = 'Phổ Thông';

    public function getChinhSachHanhLy()
    {
        return 'chinh sach hanh ly pho thong default';
    }


    public function getChoNgoi()
    {
        return 'cho ngoi pho thong default';
    }


    public function getSuatAn()
    {
        return 'suat an phong thong default';
    }
}


class ve_thuong_gia extends ve
{
    protected $name = 'Thương Gia';

    public function getChinhSachHanhLy()
    {
        return 'chinh sach hanh ly thuong gia default';
    }

    public function getChoNgoi()
    {
        return 'cho ngoi thuong gia default';
    }

    public function getSuatAn()
    {
        return 'suat an thuong gia default';
    }
}


// ================================ MAIN ==================================== \\
function clientCode(hangbayAbstract $hangBay)
{
    echo "\n";
    $vePhoThong = $hangBay->getVePhoThong();
    echo 'Hang bay: ' . $hangBay->getName() . "\n";
    echo 'Loại vé: ' . $vePhoThong->getName() . "\n";
    echo 'chinh sach hanh ly: ' . $vePhoThong->getChinhSachHanhLy() . "\n";
    echo 'dich vu di kem: ' . $vePhoThong->getSuatAn() . "\n";
    echo 'cho ngoi: ' . $vePhoThong->getChoNgoi() . "\n";

    echo "\n";
    $veThuongGia = $hangBay->getVeThuongGia();
    echo 'Hang bay: ' . $hangBay->getName() . "\n";
    echo 'Loại vé: ' . $veThuongGia->getName() . "\n";
    echo 'chinh sach hanh ly: ' . $veThuongGia->getChinhSachHanhLy() . "\n";
    echo 'dich vu di kem: ' . $veThuongGia->getSuatAn() . "\n";
    echo 'cho ngoi: ' . $veThuongGia->getChoNgoi() . "\n";
}

clientCode(new vietnam_airline_factory());
clientCode(new vietjet_air_factory());
