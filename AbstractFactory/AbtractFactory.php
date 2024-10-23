<?php

interface hangbayFactory
{
    public function getVePhoThong();

    public function getVeThuongGia();
}

class hangbayAbstract implements hangbayFactory
{
    protected $name = 'default hang bay';
    protected $_ve_pho_thong;
    protected $_ve_thuong_gia;

    public function __construct()
    {
        $this->_ve_pho_thong = new ve_pho_thong();
        $this->_ve_thuong_gia = new ve_thuong_gia();
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getVePhoThong()
    {
        return $this->_ve_pho_thong;
    }

    /**
     * @param mixed $ve_pho_thong
     */
    public function setVePhoThong($ve_pho_thong)
    {
        $this->_ve_pho_thong = $ve_pho_thong;
    }

    /**
     * @return mixed
     */
    public function getVeThuongGia()
    {
        return $this->_ve_thuong_gia;
    }

    /**
     * @param mixed $ve_thuong_gia
     */
    public function setVeThuongGia($ve_thuong_gia)
    {
        $this->_ve_thuong_gia = $ve_thuong_gia;
    }

}

class vietnam_airline extends hangbayAbstract
{
    protected $name = 'Vietnam Airlines';
    public function __construct()
    {
        parent::__construct();
        $this->_ve_pho_thong->setChinhSachHanhLy('20kg ký gửi, 7kg xách tay');
        $this->_ve_pho_thong->setSuatAn('Bữa ăn nhẹ, Nước uống');
        $this->_ve_pho_thong->setChoNgoi('Ghế hạng Phổ Thông - Khoảng cách giữa các ghế: 81 cm');

        $this->_ve_thuong_gia->setChinhSachHanhLy('40kg ký gửi, 10kg xách tay');
        $this->_ve_thuong_gia->setSuatAn('Suất ăn đặc biệt, Đồ uống có cồn');
        $this->_ve_thuong_gia->setChoNgoi('Ghế hạng Thương Gia - Ghế ngả 180 độ, Khoảng cách giữa các ghế: 110 cm');
    }
}


class vietjet_air extends hangbayAbstract
{
    protected $name = 'VietJet Air';
    public function __construct()
    {
        parent::__construct();
        $this->_ve_pho_thong->setChinhSachHanhLy('15kg ký gửi, 7kg xách tay');
        $this->_ve_pho_thong->setSuatAn('Mua thêm');
        $this->_ve_pho_thong->setChoNgoi('Ghế hạng Phổ Thông - Khoảng cách giữa các ghế: 75 cm');

        $this->_ve_thuong_gia->setChinhSachHanhLy('30kg ký gửi, 10kg xách tay');
        $this->_ve_thuong_gia->setSuatAn('Bữa ăn, Nước uống');
        $this->_ve_thuong_gia->setChoNgoi('Ghế hạng Thương Gia - Ghế ngả 165 độ, Khoảng cách giữa các ghế: 100 cm');
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
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @param string $chinh_sach_hanh_ly
     */
    public function setChinhSachHanhLy($chinh_sach_hanh_ly)
    {
        $this->_chinh_sach_hanh_ly = $chinh_sach_hanh_ly;
    }

    /**
     * @param string $cho_ngoi
     */
    public function setChoNgoi($cho_ngoi)
    {
        $this->_cho_ngoi = $cho_ngoi;
    }

    /**
     * @param string $suat_an
     */
    public function setSuatAn($suat_an)
    {
        $this->_suat_an = $suat_an;
    }
}

class ve_pho_thong extends ve
{
    protected $name = 'Phổ Thông';

    public function getChinhSachHanhLy()
    {
        return '20kg ký gửi, 7kg xách tay';
    }


    public function getChoNgoi()
    {
        return 'Ghế hạng Phổ Thông - Khoảng cách giữa các ghế: 81 cm';
    }


    public function getSuatAn()
    {
        return 'Bữa ăn nhẹ, Nước uống';
    }
}


class ve_thuong_gia extends ve
{
    protected $name = 'Thương Gia';

    public function getChinhSachHanhLy()
    {
        return '15kg ký gửi, 7kg xách tay';
    }

    public function getChoNgoi()
    {
        return 'Ghế hạng Phổ Thông - Khoảng cách giữa các ghế: 75 cm';
    }

    public function getSuatAn()
    {
        return 'Mua thêm';
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
clientCode(new vietnam_airline());
clientCode(new vietjet_air());

