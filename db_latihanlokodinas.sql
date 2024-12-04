-- phpMyAdmin SQL Dump
-- version 4.0.0
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Sep 09, 2024 at 09:51 AM
-- Server version: 8.0.30
-- PHP Version: 5.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_latihanlokodinas`
--

-- --------------------------------------------------------

--
-- Table structure for table `agenda`
--

CREATE TABLE IF NOT EXISTS `agenda` (
  `id_agenda` int NOT NULL AUTO_INCREMENT,
  `tema` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `tema_seo` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `isi_agenda` text CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `tempat` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `pengirim` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `gambar` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `tgl_mulai` date NOT NULL,
  `tgl_selesai` date NOT NULL,
  `tgl_posting` date NOT NULL,
  `jam` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `dibaca` int NOT NULL DEFAULT '1',
  `username` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id_agenda`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=73 ;

--
-- Dumping data for table `agenda`
--

INSERT INTO `agenda` (`id_agenda`, `tema`, `tema_seo`, `isi_agenda`, `tempat`, `pengirim`, `gambar`, `tgl_mulai`, `tgl_selesai`, `tgl_posting`, `jam`, `dibaca`, `username`) VALUES
(64, 'Elton John Greatest Hits Tour', 'elton-john-greatest-hits-tour', '<p>November ini,&nbsp; Indonesia akan disuguhkan salah satu konser megah dari legenda musik dunia yaitu Elton John. Penampilan Elton John yang pertama kalinya di Indonesia akan berlangsung pada 17 November 2012, di&nbsp; Sentul International Convention Center, Bogor yang lokasinya tidak begitu jauh dari Jakarta.<br />\r\n<br />\r\nKonser Elton John ini merupakan bagian dari tur dunianya yang bertajuk &ldquo;Greatest Hits Tour&rdquo; dan akan dimulai pada awal November dari Latvia sampai ke Australia. Elton John akan membawa band lamanya yang terdiri dari Davey Johnstone, Nigel Olsson, Robert Birch, Kim Bullard dan John Mahon, dan empat backing vocal yaitu Rose&nbsp; Batu (Sly dan The Family Stone), Lisa Bank, Tata Vega, dan Jean Witherspoon.</p>\r\n', 'Sentul International Convention Center', '', '510070sc-elton.jpg', '2012-11-17', '2012-11-17', '2012-08-20', '--', 147, 'admin'),
(62, 'Maroon Live in Jakarta 2012', 'maroon-live-in-jakarta-2012', 'Maroon 5 akan kembali menghibur penggemar Jakarta mereka dengan sebuah konser pada 5 Oktober 2012 di Istora Senayan, Jakarta. Ini akan menjadi penampilan kedua mereka di tanah air setelah tampil pada konser sold out 27 April 2011 lalu. Grup musik beraliran pop rock yang berasal dari Los Angeles, California Amerika Serikat. Rencananya menggelar konsernya pada 5 Oktober 2012, di Istora Senayan, Jakarta. Java Musikindo selaku promotor telah mengumumkan pembagian kelas serta harga tiket konser. Band yang digawangi oleh Adam Levine (vokal/gitar), Jesse Carmichael (keyboard/gitar),Mickey Madden (bass), James Valentine (gitar), Matt Flynn (drum) ini menggelar konser di Jakarta sebagai bagian dari promo album barunya, Overexposed, yang dirilis Juni lalu.\r\n', 'Istora Senayan Jakarta', '', '209930maroon_live_in_jakarta_2012.jpg', '2012-10-05', '2012-10-05', '2012-08-19', '', 30, 'admin'),
(63, 'Festival Musik Bambu Nusantara 2012', 'festival-musik-bambu-nusantara-2012', 'Bambu Nusantara ke-6 tahun ini akan digelar di Jakarta Convention Center (JCC), di Jalan Jenderal Gatot Subroto, Jakarta, pada 1 - 2 September 2012. Acara tersebut akan menghadirkan beraneka kreasi berbahan bambu dan tampilnya beragam seni dari bambu. Selain suguhan musik etnik berpadu dengan musik modern, dalam Acara ini juga akan turut diisi dengan pameran, seminar, merchandise, kuliner, dan fashion yang dipadu padankan dengan karya berbahan bambu.<br />\r\n', 'Jakarta Convention Center (JCC), Jakarta', '', '85235BambuNusantara2012.jpg', '2012-09-01', '2012-09-02', '2012-08-20', '09.00 - 21.00 Wib', 46, 'admin'),
(70, 'tema saja', 'tema-agenda', '<p><strong>APA AJA LAH WOI</strong></p>', 'Pasindangan De Green House', 'Okelah', 'tema saja_RACPsgPDnxUZB7QxIwJqRZEWx.png', '2024-08-20', '2024-08-27', '2024-08-20', '10:00 - 12:50 WIB', 0, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `album`
--

CREATE TABLE IF NOT EXISTS `album` (
  `id_album` int NOT NULL AUTO_INCREMENT,
  `jdl_album` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `album_seo` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `keterangan` text CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `gbr_album` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `aktif` enum('Y','N') CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT 'Y',
  `hits_album` int NOT NULL DEFAULT '1',
  `tgl_posting` date NOT NULL,
  `jam` time NOT NULL,
  `hari` varchar(20) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `username` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id_album`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=52 ;

--
-- Dumping data for table `album`
--

INSERT INTO `album` (`id_album`, `jdl_album`, `album_seo`, `keterangan`, `gbr_album`, `aktif`, `hits_album`, `tgl_posting`, `jam`, `hari`, `username`) VALUES
(30, 'Konser Kantata Barock 2011', 'konser-kantata-barock-2011', 'Para macan tua yang digawangi Iwan Fals, Setiawan Djody dan Sawung Jabo di Stadion Gelora Bung Karno, Jakarta,\r\nJumat (30/12) malam. Kantata kembali membawakan lagu-lagu legendarisnya\r\nsetelah 21 tahun vakum dari dunia musik.\r\n<div style="overflow: hidden; color: #000000; background-color: #ffffff; text-align: left; text-decoration: none; border: medium none">\r\n<br />\r\n</div>\r\n', '4520kantata_barock.jpg', 'Y', 72, '2012-08-20', '09:12:06', 'Senin', 'admin'),
(31, 'Festival Seni Terbesar di Dunia', 'festival-seni-terbesar-di-dunia', '', '13festival_seni.jpg', 'Y', 13, '2012-08-20', '09:40:01', 'Senin', 'admin'),
(28, 'Murah Meriah di Pasar Asemka', 'murah-meriah-di-pasar-asemka', 'Pasar Asemka, Jakarta, merupakan pasar grosir yang banyak menyediakan berbagai aksesoris seperti kalung, cincin, Souvenir pernakahan, dan lainnya. Di Pasara Asemka anda akan dimanjakan dengan beragam barang yang dibandrol dengan harga murah meriah dan biasanya dijual grosiran. \r\n', '18asemka.jpg', 'Y', 67, '2012-08-18', '23:14:05', 'Sabtu', 'admin'),
(29, 'Karpet Raksasa dari Bunga', 'karpet-raksasa-dari-bunga', 'Belgia sedang memperingati peristiwa tahunan &quot;La Fete De La Fleur&quot; atau pesta bunga di bulan Agustus. Ahli bunga merancang karpet raksasa dari bunga di depan Grand Place di Brussel. Karpet ini dibuat menggunakan 700 ribu bunga.\r\n', '92bungaraksasa2.jpg', 'Y', 108, '2012-08-19', '03:02:27', 'Minggu', 'admin'),
(50, 'CMS Swarakalibata Ci Developer Team', 'cms-swarakalibata-ci-developer-team', '<p>CodeIgniter atau sering disebut dengan sebutan CI adalah salah satu framework MVC PHP yang sangat populer di dunia web programming. CodeIgniter adalah salah satu framework PHP yang ringan dan berusia hampir 10 tahun (dirilis pada tahun 2006) dan menjadi salah satu framework yang popular di Indonesia.<br />\r\n<br />\r\nPada Swarakalibata Versi Codeigniter tidak ada perubahan pada struktur database dan folder, jadi anda tidak perlu repot-repot unutk migrasi ke Swarakalibata versi Codeigniter. anda masih bisa menggunakan database yang lama tanpa perlu takut data-data pada web yang lama akan hilang. dan untuk template kita masih menggunakan template dari versi sebelumnya yaitu alegro Responsive Template dari orange-themes karena memang template ini sangat banyak sekali peminatnya dan untuk pilihan warna terdiri dari Red, Green, Blue, Orange, Purple, Pink, Tosca and Black. untuk template admin kita menggunakan adminLTE Responsive, juga pada swarakalibata versi Codeigniter untuk keamanannya pun jauh lebih baik dari versi Native.</p>\r\n', 'swarakalibata.jpg', 'Y', 9, '2017-05-20', '23:46:54', 'Sabtu', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `background`
--

CREATE TABLE IF NOT EXISTS `background` (
  `id_background` int NOT NULL AUTO_INCREMENT,
  `gambar` varchar(255) NOT NULL,
  PRIMARY KEY (`id_background`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `background`
--

INSERT INTO `background` (`id_background`, `gambar`) VALUES
(1, 'red');

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE IF NOT EXISTS `banner` (
  `id_banner` int NOT NULL AUTO_INCREMENT,
  `judul` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `url` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `gambar` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `tgl_posting` date NOT NULL,
  `deskripsi` text CHARACTER SET latin1 COLLATE latin1_general_ci,
  PRIMARY KEY (`id_banner`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=38 ;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`id_banner`, `judul`, `url`, `gambar`, `tgl_posting`, `deskripsi`) VALUES
(19, 'CLEAN', '', 'karawang1.jpg', '2018-12-27', 'Dikelola secara profesional, menghindari benturan kepentingan, tidak menoleransi suap, menjunjung tinggi kepercayaan dan integritas. Berpedoman pada asas tata kelola korporasi yang baik.'),
(20, 'CONFIDENT', 'http://www.lokomedia.web.id', 'karawang2.jpg', '2018-12-27', 'Berperan dalam pembangunan ekonomi nasional, menjadi pelopor dalam reformasi Badan Usaha Milik Negara (BUMN), dan membangun kebanggaan bangsa'),
(21, 'Commercial', 'http://www.lokomedia.web.id', 'bendungan-walahar.jpg', '2018-12-27', 'Menciptakan nilai tambah dengan orientasi komersial, mengambil keputusan berdasarkan prinsip-prinsip bisnis yang sehat.'),
(22, 'COMPETITIVE', 'http://www.lokomedia.web.id', 'karawang5.jpg', '2018-12-27', 'Mampu berkompetisi dalam skala regional maupun internasional, mendorong pertumbuhan investasi, membangun budaya sadar biaya dan menghargai kinerja');

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE IF NOT EXISTS `berita` (
  `id_berita` int NOT NULL AUTO_INCREMENT,
  `id_kategori` int NOT NULL,
  `username` varchar(30) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `judul` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `sub_judul` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `youtube` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `judul_seo` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `headline` enum('Y','N') CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT 'Y',
  `aktif` enum('Y','N') CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT 'N',
  `utama` enum('Y','N') CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT 'Y',
  `isi_berita` longtext CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `keterangan_gambar` text CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `hari` varchar(20) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `tanggal` date NOT NULL,
  `jam` time NOT NULL,
  `gambar` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `dibaca` int NOT NULL DEFAULT '1',
  `tag` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `status` enum('Y','N') CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT 'Y',
  PRIMARY KEY (`id_berita`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=706 ;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`id_berita`, `id_kategori`, `username`, `judul`, `sub_judul`, `youtube`, `judul_seo`, `headline`, `aktif`, `utama`, `isi_berita`, `keterangan_gambar`, `hari`, `tanggal`, `jam`, `gambar`, `dibaca`, `tag`, `status`) VALUES
(601, 40, 'admin', 'Es Teler, Sejarahmu Dulu dan Kini', '', '', 'es-teler-sejarahmu-dulu-dan-kini', 'N', 'N', 'N', 'Es Teler adalah minuman es berisi potongan buah alpukat, kelapa muda, nangka matang, dan santan kelapa encer dengan pemanis berupa sirup. Es yang dipakai bisa berupa es serut atau es batu.<br />\r\n<br />\r\nVariasi lain es teler berisi cincau, kolang-kaling, dan pacar china, potongan buah apel, pepaya, sawo, melon, roti, dan agar-agar, hingga es teler menjadi sulit dibedakan dengan es campur.<br />\r\n<br />\r\nEs Teler adalah jenis Kuliner yang murni &quot;Fresh from Nature&quot;, Tanpa diolah, hanya dipotong dan dibersihkan, lalu di beri kuah rasa sesuai selera dan di minum/makan dingin. Sehingga kandungan Gizi yang terdapat dalam buah yang dipakai otomatis masih baik. Es Teler --&gt; recomended deh sebagai makanan penutup dibanding makanan penutup olahan.<br />\r\n<strong><br />\r\nSejarah Es Teler</strong><br />\r\n<br />\r\nEs teler diciptakan Tukiman Darmowijono, pedagang es campur dengan gerobak di Jalan Semarang Jakarta Pusat pada tahun 1980-an. Es campur kreasi Tukiman begitu enak sehingga anak-anak muda yang meminumnya mengaku keenakan seperti &quot;teler&quot; akibat mengkonsumsi narkoba. Es kelapa muda bercampur alpukat yang dijual Tukiman di Jalan Semarang kemudian dikenal sebagai &quot;es teler.&quot;<br />\r\n<br />\r\nKepopuleran es yang bikin teler makin mencuat berkat promosi dari mulut ke mulut dan liputan media massa. Pembeli yang datang bermobil menimbulkan antrian parkir mobil yang dirasakan penduduk Jalan Semarang dan sekitarnya sebagai pengganggu ketenangan. Es teler Tukiman harus pindah ke Jalan Pegangsaan Barat dan kemudian ke dalam kompleks bioskop Megaria. Kedai es teler Tukiman di kompleks bioskop Megaria sekarang bernama kedai ayam bakar dan es teler Sari Mulia Asli.<br />\r\n<br />\r\nWaralaba nasional Es Teler 77 Juara Indonesia didirikan Sukyatno Nugroho, setelah sang mertua bernama Ny Murniati Widjaja menjuarai lomba es teler nasional di tahun 1982. Gerai Es Teler 77 yang pertama terdapat di pertokoan Duta Merlin, Harmoni, Jakarta Pusat. Di gerai Es Teler 77 juga tersedia berbagai makanan pendamping seperti mi bakso dan nasi goreng. Di luar negeri, gerai Es Teler 77 terdapat di Australia, Malaysia, dan Singapura.<br />\r\n', '', 'Jumat', '2012-11-02', '02:33:43', '16es-teler-sejarahmu-dulu-dan-kini.jpg', 31, 'kuliner', 'Y'),
(598, 40, 'admin', 'Laksa Betawi yang Menggugah Selera', '', '', 'laksa-betawi-yang-menggugah-selera', 'N', 'N', 'N', 'Makanan khas betawi yang satu ini memang sudah agak jarang bisa ditemui. Namun bukan berarti punah. Di beberapa lokasi tertentu, anda masih bisa menemukan Laksa betawi. Bagi anda yang belum mengetahui apa itu Laksa Betawi, Laksa betawi adalah Penganan berjenis mie yang diberi bumbu. Laksa Betawi memiliki kuah berwarna kekuningan. Campuran udang rebon yang ada dalam kuah laksa, membuat rasanya menjadi segar dan di padu aroma khas udang.<br />\r\n<br />\r\nSelain itu, Makanan ini menggunakan Ketupat. Isi dari ketupat laksa betawi adalah irisan ketupat, telur, kemangi, tauge. kucai, bihun, perkedel, dan bawang goreng, serta kuahnya yang kental dengan taburan udang kering. Namun ada yang bilang bahwa Bihun dan perkedel hanya variasi tambahan dari laksa, bukan bawaan asli nya.<br />\r\n<br />\r\nCara lain untuk menikmati Laksa adalah menggunakan Semur betawi. Paduan rasa manis pada semur, tentu nya akan menambah rasa gurih di lidah. Namun hal ini bukan suatu keharusan. Tergantung selera masing-masing.<br />\r\n<br />\r\nCara mengolah Laksa Betawi<br />\r\n<br />\r\nMengolah laksa betawi susah-susah gampang. Bumbunya sederhana, terdiri dari kunyit, lengkuas, sereh, daun salam, daun jeruk, jahe, jintan, lada, temu kunci, serta dua kilogram udang rebon. Semua bumbu dihaluskan dengan lumpang lalu ditumis dan dicampur dengan santan cair.<br />\r\n<br />\r\nBumbu baru ditambahkan dengan santan kental. Proses ini dilakukan sampai tiga kali. Sejak dahulu hingga sekarang. Dengan proses yang agak rumit, tidak aneh kalau makanan ini jadi agak langka. Orang maunya langsung jadi tanpa memikirkan cara pembuatannya.<br />\r\n<br />\r\n', '', 'Kamis', '2012-10-25', '02:13:20', '87laksa-betawi_yang_menggugah_selera.jpg', 14, 'kuliner', 'Y'),
(599, 40, 'admin', 'Semur, Aslinya dari Belanda', '', '', 'semur-aslinya-dari-belanda', 'N', 'N', 'N', 'Jangan merasa tidak terima jika dikatakan bahwa semur adalah hidangan Belanda. Sebab, di balik semur memang ada riwayat nusantara, bukti bagaimana silang budaya terjadi antara Indonesia dan Eropa, demikian menurut ahli kajian budaya Dr phil Lily Tjahjandari.<br />\r\n<br />\r\nPercaya tidak, Indonesia ternyata sudah meramu berbagai makanan dengan berbagai jenis rempah sejak abad pertama. Hal ini terjadi karena posisi Indonesia terletak di tengah jalur perdagangan dunia.<br />\r\n<br />\r\nKekayaan rempah Indonesia ini lalu mengundang berbagai bangsa untuk datang dan mengeksplorasi citarasa rempah. Diawali dengan kedatangan pedagang India pada abad 1-7, dan diikuti oleh pedagang China dan Arab. Perdagangan rempah kemudian membuka jalan ekspansi masif bangsa Eropa pada abad 16-19. Mereka menjelajah wilayah Indonesia untuk menemukan rempah-rempah, dan memulai terjadinya interaksi budaya kuliner antara Eropa dan Indonesia.<br />\r\n<br />\r\n&quot;Sebelumnya, penguat rasa makanan Eropa hanya terbatas pada tomat, ceri, bawang bombai, madu, atau wine,&quot; ungkap Lily, yang juga Manajer Penelitian dan Pengabdian Masyarakat Fakultas Ilmu Pengetahuan Budaya Universitas Indonesia. Orang Eropa lalu mendapatkan inspirasi untuk menggunakan berbagai rempah Asia untuk mengolah makanan Eropa.<br />\r\n<br />\r\nNah, ketika keahlian meramu bumbu khas Indonesia seperti lada, kayu manis, jahe, kemiri, cengkeh itu berpadu dengan teknik memasak bangsa Eropa, hadirlah hidangan unik seperti semur. Semur sendiri asalnya dari bahasa Belanda, smoor, yang artinya masakan daging yang direbus dengan tomat dan bawang secara perlahan.<br />\r\n<br />\r\n&quot;Ketika itu, orang Eropa yang bisa memasak dengan rempah-rempah dianggap sebagai kalangan aristokrat. Hidangan semur ini diterima dengan baik oleh lidah kaum priyayi Belanda, dan menjadi menu rijsttafel,&quot; kata Lily, saat talkshow bertema &quot;Semur, Turun-Temurun Menghangatkan Hati Keluarga Indonesia&quot; di Restoran Warung Daun, Kebayoran Baru, Jakarta Selatan, beberapa waktu lalu.<br />\r\n<br />\r\nRijstaffel merupakan konsep penyajian makanan lengkap ala restoran di Eropa, yang diawali dengan hidangan pembuka, hidangan utama, dan hidangan penutup. Namun hidangan yang disajikan bukan hidangan Eropa, melainkan menu Indonesia dimana nasi sebagai makanan utama dinikmati dengan lauk-pauk.<br />\r\n<br />\r\nSebenarnya, semur itu sendiri bukan makanan asli Belanda. Semur, menurut pakar kuliner Chef Ragil Imam Wibowo, merupakan persepsi bangsa Indonesia dari hidangan tradisional Belanda yang bernama hachee. Hachee merupakan hidangan daging rebus yang dipotong-potong, kadang-kadang juga menggunakan ikan, burung, dan sayuran. Bumbu dasarnya adalah bawang dan rasa asam (biasanya didapat dari cuka atau wine). Cengkeh dan daun salam lalu ditambahkan ke dalam kuah kaldunya yang kental.<br />\r\n<br />\r\nHachee kelak menjadi trigger untuk hidangan semur. Dalam versi Indonesia, semur ini menggunakan bumbu bawang merah, bawang putih, dengan tambahan berbagai rempah lain untuk menguatkan rasa, seperti ketumbar, pala, lada, cengkeh, dan kayu manis. Semur lalu menjadi istimewa karena menggunakan kecap sebagai penguat rasa manis yang legit, dan memberi warna coklat yang menggugah selera.<br />\r\n<br />\r\n&quot;Kecap itu idenya ketika orang Indonesia berimajinasi bagaimana membuat warna coklatnya. Pada hachee, warna coklat didapat dari brownstock, yaitu kaldu dari tulang sapi yang dibakar. Orang Indonesia lalu mencari, apa yang kira-kira bisa memberi warna dan rasa yang diinginkan,&quot; ujar Chef Ragil dalam acara yang sama.<br />\r\n<br />\r\nSemur kemudian melekat menjadi tradisi bangsa Indonesia., dan menjadi menu favorit setiap keluarga Indonesia. Menu ini hadir dengan inovasi bumbu dan topping yang beraneka ragam. Jika awalnya semur identik dengan daging sapi, Anda bisa menemukan semur daging kambing, ayam, telur, tahu, tempe, terong, dan bahkan ikan. Dan semuanya lezat!<br />\r\n<br />\r\n<br />\r\n', '', 'Minggu', '2012-11-11', '02:17:45', '16semur_asli-dari-belanda.jpg', 19, 'kuliner', 'Y'),
(608, 19, 'admin', 'Bos Amazon Temukan Mesin Apollo 11', '', 'http://www.youtube.com/embed/mxMiN9iYlkQ', 'bos-amazon-temukan-mesin-apollo-11', 'N', 'N', 'N', 'Jeff Bezos, pendiri retailer online terbesar Amazon, mengumumkan bahwa ia dan timnya telah menemukan 5 mesin Apollo 11 yang jatuh pada tahun 1969 di Samudera Atlantik.<br />\r\n<br />\r\nKini, Jeff Bezos merencanakan untuk mengangkat satu atau dua dari mesin tersebut ke permukaan untuk kemudian dipamerkan di Museum Penerbangan di kampung halamannya, Seattle. Sebelumnya, Jeff Bezos akan meminta izin terlebih dahulu kepada Nasa selaku pemilik dari Apollo 11.<br />\r\n<br />\r\nSeluruh biaya yang diperlukan dalam ekspedisi dan pengangkatan mesin Apollo 11 akan ditanggung oleh Jeff Bezos sendiri. Sementara itu, Nasa menyatakan akan menunggu kabar lebih lanjut tentang penemuan oleh tim Jeff Bezos tersebut.<br />\r\n<br />\r\nMesin berkekuatan 32 juta tenaga kuda (hp) yang mampu membakar 6.000 pon kerosin dan oksigen cair per detik tersebut telah membawa Apollo 11 mendarat dengan sukses di bulan pada tahun 1969. Namun dalam perjalanan kembali ke bumi, mesin tersebut terbakar hingga terjatuh di Samudera Atlantik dan belum ditemukan hingga akhirnya Jeff Bezos mengumumkan berita ini.\r\n', '', 'Senin', '2012-11-19', '04:51:31', '16JeffBezos.jpg', 72, 'internasional', 'Y'),
(611, 21, 'admin', 'Duel Swiss di Semifinal Cincinnati Masters', 'Tenis Cincinnati Masters 2012', '', 'duel-swiss-di-semifinal-cincinnati-masters', 'N', 'N', 'N', 'Cincinnati - Dua petenis asal Swiss berhasil mengempaskan lawan-lawannya dan akan bertemu di semifinal Cincinnati Masters. Stanislas Wawrinka sukses membungkam petenis Kanada, Milos Raonic, sementara Roger Federer berhasil menumbangkan Mardy Fish.<br />\r\n&nbsp;<br />\r\nWawrinka mengalahkan Raonic dengan pertarungan sengit. Bahkan sebelumnya, petenis 27 tahun tersebut sempat tertinggal di set pertama. Pada set awal tersebut, Wawrinka takluk 2-6.<br />\r\n&nbsp;<br />\r\nNamun pada set kedua, Wawrinka mampu mengendalikan permainan, dia mampu mengembalikan dengan baik pukulan keras dari Raonic. Hingga akhirnya sukses merebut set kedua ini dengan skor 7-6.<br />\r\n&nbsp;<br />\r\nSetelah berhasil menyamakan keadaan, Wawrinka terus mendominasi dan mengakhiri perlawanan Raonic dengan skor akhir di set ketiga 6-4. &ldquo;Saya bermain hebat setelah menjalani dua bulan yang menyulitkan,&rdquo; ujar Wawrinka, seperti disitat Yahoo Sports, Sabtu (18/8/2012).<br />\r\n&nbsp;<br />\r\nNantinya di babak semifinal, Wawrinka bakal menghadapi rekan senegaranya, Federer yang menghentikan langkah Fish dengan skor 6-3 7-6. Dengan gugurnya Fish atas Federer, maka tak ada satu pun petenis Amerika yang berpeluang menjadi juara di kandang sendiri.<br />\r\n', 'Stanislas Wawrinka.\r\n', 'Minggu', '2012-08-19', '05:22:25', '46Stanislas-Wawrinka.jpg', 16, 'olahraga', 'Y'),
(612, 19, 'admin', 'Google Pakai Motorola untuk Gugat Apple', '', '', 'google-pakai-motorola-untuk-gugat-apple', 'N', 'N', 'N', 'Jakarta - Perang gugatan antara para produsen smartphone belum menunjukkan tanda berakhir. Yang terbaru, Motorola menuding Apple melanggar tujuh patennya.<br />\r\n<br />\r\nVendor ponsel yang diakuisisi Google pun meminta pihak berwewenang untuk memblokir impor iPhone, iPad dan komputer Mac. Perangkat-perangkat tersebut diminta dilarang beredar di Amerika Serikat.<br />\r\n<br />\r\nKomplain Motorola didaftarkan ke lembaga International Trade Comission (ITC). Paten yang dipermasalahkan terkait location reminders, notifikasi email, pemutar video dan sebagainya.<br />\r\n<br />\r\n&quot;Kami ingin menyelesaikan persoalan paten tersebut, namun ketidakmauan Apple untuk melisensinya membuat kami tidak punya pilihan selain mempertahankan inovasi kami,&quot; demikian pernyataan Motorola yang TerasJakarta kutip dari DigitalTrends, Minggu (19/8/2012).<br />\r\n<br />\r\nHal ini dinilai sebagai perang antara Google dan Apple, dengan Google menggunakan paten Motorola untuk menyerang Apple. Terlebih lagi, Apple banyak memperkarakan vendor Android seperti Samsung dan juga Motorola sendiri.\r\n', '', 'Senin', '2012-08-20', '04:49:48', '7google_motorola.jpg', 15, 'teknologi', 'Y'),
(614, 22, 'admin', 'Zuckerberg akan Berhenti Pimpin Facebook?', 'Buntut Anjloknya di Bursa Saham', '', 'zuckerberg-akan-berhenti-pimpin-facebook', 'N', 'N', 'Y', 'Jakarta - Harga saham Facebook terus terjun bebas. Rekor harga terendah terjadi baru-baru ini senilai USD 19,06 dari harga awalnya USD 38. Buruknya performa saham Facebook ini memunculkan spekulasi bahwa Mark Zuckerberg tidak seharusnya terus memimpin Facebook sebagai CEO.<br />\r\n<br />\r\nSeorang analis industri menilai bahwa Zuckerberg yang dikenal dengan dandanan kasualnya bisa fokus pada urusan teknologi di Facebook. Sedangkan bisnis Facebook dipegang oleh orang yang benar-benar kompeten.<br />\r\n<br />\r\n&quot;Saya pikir ada rasa kurang percaya terhadap kemampuannya untuk menjalankan korporasi,&quot; kata Andre Stoltman, pengacara sekuritas di New York yang TerasJakarta kutip dari ComputerWorld, Minggu (19/8/2012).<br />\r\n<br />\r\n&quot;Zuckerberg, dipandang dari sisi manapun memang adalah orang yang jenius. Akan tetapi Anda seharusnya memiliki chief executive yang dewasa dan lebih berpengalaman dalam menjalankan perusahaan tersebut,&quot; imbuhnya.<br />\r\n<br />\r\nNamun demikian, Zuckerberg tetap punya dukungan untuk terus memimpin Facebook. Patrik Moorhead, analis di Moor Insights &amp; Strategy, menyatakan masih terlalu awal untuk membicarakan kemungkinan pergantian CEO Facebook.<br />\r\n<br />\r\n&quot;Dia telah menyediakan visi yang diperlukan Facebook untuk menjadi sebesar sekarang dan mereka tetap akan membutuhkan dia sebagai pemandu. Zuckerberg harus tetap ada di posisi top sekarang,&quot; kata Patrik.<br />\r\n<br />\r\nKarten Weide selaku analis di IDC menyatakan pula bahwa Zuckerberg tidak akan memberi kesempatan pada orang lain untuk memimpin perusahaan yang didirikannya itu.<br />\r\n<br />\r\n&quot;Mark Zuckerberg tidak akan lengser dalam waktu dekat. Dia adalah pria dalam sebuah misi, yaitu ingin memaksa dunia, jika perlu, agar lebih terbuka. Dan sebagai pria dalam sebuah misi, dia tidak mengutamakan soal bisnis,&quot; demikian pendapat Karten.<br />\r\n', '<font face="Verdana, Arial, Helvetica, sans-serif" color="#000000">Mark Zuckerberg</font>\r\n', 'Jumat', '2012-11-02', '04:59:50', '22Mark-Zuckerberg.jpg', 38, 'teknologi', 'Y'),
(610, 21, 'admin', 'Max Biaggi Bantah ke Ducati Musim Depan ', '', '', 'max-biaggi-bantah-ke-ducati-musim-depan-', 'N', 'N', 'Y', 'Roma- Mantan pembalap MotoGP Max Biaggi tengah menikmati kariernya di World Super Bike (WSBK). Terlebih, pencapaiannya di musim ini cukup membuatnya bahagia.<br />\r\n<br />\r\nBiaggi masih memimpin di puncak klasemen WSBK musim ini dengan 272 poin. Hasil ini membuatnya semakin bersemangat untuk menorehkan lagi prestasi juara seperti yang ditorehkannya pada 2010.<br />\r\n<br />\r\nSituasi seperti itu, semakin membuat The Roman Emperor, julukan Biaggi, nyaman membela timnya Aprilia. Makanya, saat disinggung masalah isu kepindahannya ke Ducati musim depan, Biaggi buru-buru membantah. Dia menegaskan ingin mengakhiri kariernya bersama Aprilia.<br />\r\n<br />\r\nSetelah empat tahun melanglang buana di ajang MotoGP dengan prestasi terbaik menjadi runner-up pada musim pertamanya bersama Yamaha, Biaggi memutuskan hengkang pada 2005. Dua tahun berikutnya, pembalap kelahiran Juni 1971 ini terjun ke arena WSBK.<br />\r\n<br />\r\nSebelum berlabuh di Aprilia, Biaggi lebih dulu bergabung dengan Suzuki di tahun pertamanya, dan setahun berikutnya ke Ducati sebelum akhirnya melompat ke Aprilia pada 2009.\r\n', 'Max Biaggi.\r\n', 'Minggu', '2012-08-19', '05:13:20', '6max_biaggi.jpg', 18, 'olahraga', 'Y'),
(615, 21, 'admin', 'Foto Panas Beredar Lagi, Nikita Mirzani Syok', '', '', 'foto-panas-beredar-lagi-nikita-mirzani-syok', 'N', 'N', 'Y', 'Jakarta - Nama Nikita Mirzani memang sedang naik daun belakangan ini. Dengan keberaniannya dalam menampilkan lekuk tubuhnya di beberapa film yang diperaninya, dirinya pun sempat didaulat dengan predikat sebagai salah satu artis hot tanah air.<br />\r\n<br />\r\nNamun, keberaniannya tersebut ternyata harus seiring dengan pil pahit yang ditelannya. Beberapa waktu lalu, foto topless dirinya sempat beredar luas di dunia maya. Dan kini, kembali foto-foto yang memperlihatkan kenekatannya di depan kamera dipertontonkan.<br />\r\n<br />\r\nDalam foto-foto ini, Nikita hanya menutupi payudaranya dengan jari ataupun rambutnya, tanpa mengenakan sehelai baju pun. Saat dikonfirmasi, Nikita mengaku syok.<br />\r\n<br />\r\n&quot;Gue syok. Gak tahu mau ngomong apa lagi. Itu foto emang udah lama banget,&quot; tuturnya, Rabu (15/8).<br />\r\n<br />\r\nArtis yang sempat mengisi program Kakek Kakek Narsis di Trans TV ini belum mau memberikan konfirmasi lebih. Dirinya masih mencari ketenangan atas musibah yang menimpanya untuk ke sekian kali.<br />\r\n<br />\r\n&quot;Gak bisa mikir. Mau ngomong apa. Kasih nafas dulu, kasih gue ketenangan. Ya Tuhan, ada aja musibah menimpa hidup gue. Pokoknya maaf gak bisa ngomong banyak,&quot; tukasnya.\r\n', 'Nikita Mirzani \r\n', 'Senin', '2012-08-20', '05:24:44', '11NikitaMirzani.jpg', 17, 'hiburan,selebritis', 'Y'),
(613, 19, 'admin', 'Lenovo Yakin Kalahkan Microsoft Surface', '', '', 'lenovo-yakin-kalahkan-microsoft-surface', 'N', 'N', 'N', 'Jakarta - Microsoft akan menjual tablet produksi sendiri yang bernama Surface. Beberapa mitra produsen PC kabarnya tak senang dengan kehadiran Surface yang dianggap sebagai pesaing. Namun Lenovo percaya diri tablet buatannya akan mampu mengalahkan Surface.<br />\r\n<br />\r\n&quot;Microsoft memang kuat di software, namun saya tidak percaya mereka bisa menyediakan hardware terbaik di dunia. Sedangkan Lenovo bisa,&quot; klaim CEO Lenovo, Yang Yuanqing.<br />\r\n<br />\r\n&quot;Meskipun kami tidak suka Microsoft membuat hardware, namun meskipun mereka memulai bisnis hardware ini, kami pikir itu hanya berarti satu kompetitor bertambah lagi,&quot; imbuhnya, yang TerasJakarta kutip dari ComputerWorld, Minggu (19/8/2012).<br />\r\n<br />\r\nSebelumnya, kehadiran Microsoft Surface mendapat perlawanan dari Acer. Vendor komputer asal Taiwan itu menyatakan bahwa kedatangan Surface akan berdampak negatif bagi ekosistem industri PC.<br />\r\n<br />\r\nDi masa lalu, Microsoft memang selalu bermitra dengan vendor PC untuk membuat komputer berbasis sistem operasi Windows. Namun untuk Windows 8, mereka memutuskan membuat tablet PC sendiri.<br />\r\n<br />\r\nBahkan, ada kabar yang beredar bahwa Surface akan dijual hanya USD 199. Jika benar, bisa jadi Surface sukses besar mengingat harganya yang sangat terjangkau. Kabarnya, Surface akan dipasarkan sekitar bulan Oktober mendatang, bersamaan dengan perkenalan resmi OS Windows 8.\r\n', '', 'Senin', '2012-08-20', '04:53:44', '43Microsoft-Surface.jpg', 14, 'teknologi', 'Y'),
(617, 23, 'admin', '"Expendables 2" Impian Jean Claude Van Damme', '', 'http://www.youtube.com/embed/7rkdTcQLwZ4', 'expendables-2-impian-jean-claude-van-damme', 'N', 'N', 'N', 'Peran dalam Expendables 2 telah lama diinginkan oleh Jean-Claude Van Damme. Pasalnya aktor laga yang satu ini punya impian untuk bermain bersama Arnold Schwarzenegger, Sylvester Stallone dan Bruce Willis.<br />\r\n<br />\r\nVan Damme yang memerankan si jahat Jean Vilain dalam Expendables 2 mengungkap kepada PostMedia bahwa kesempatan yang didapat untuk bermain bersama kedua aktor idamannya itu sangatlah berharga.<br />\r\n<br />\r\n&quot;Aku selalu berharap untuk bisa membuat film bersama salah satu dari mereka. Kini aku bermain film bersama keduanya,&quot; ungkapnya. Ahli bela diri asal Belgia ini juga mengaku kagum dengan dedikasi Stallone dalam membuat film laga spektakuler ini (Expendables).<br />\r\n<br />\r\n&quot;Aku melihat pria dengan usia lebih dari 60 dan ia masih bisa menikmati apa yang ia lakukan. Aku bahagia kembali, ia (Stallone) membuatku cinta kepada film lagi,&quot; komentarnya.<br />\r\n<br />\r\nSeperti filmnya yang pertama, The Expendables 2 sudah pasti menyajikan baku hantam, adegan tembak-menembak yang intens, serta ledakan di mana-mana. Itulah alasan mengapa The Expendables 2 dibuat, supaya adrenalin penonton terpacu.\r\n', 'Jean-Claude Van Damme.\r\n', 'Senin', '2012-08-20', '05:47:30', '76jean-claude-van-damme-the-expendables-2.jpg', 23, 'film,hiburan', 'Y'),
(616, 21, 'admin', 'Nyanyikan Anti Putin, Personel Pussy Riot Dibui', '', '', 'nyanyikan-anti-putin-personel-pussy-riot-dibui', 'N', 'N', 'N', 'Rusia - Pengadilan Rusia memvonis penjara dua tahun personel band Pussy Riot karena menyanyikan lagu anti Presiden Vladimir Putin.<br />\r\n<br />\r\nPengadilan menetapkan tiga anggota band itu bersalah melakukan &#39;hooliganisme&#39; dengan motivasi agama.<br />\r\n&nbsp;<br />\r\nHakim Marina Syrova mengatakan para anggota band &quot;secara berhati-hati merencanakan&quot; nyanyian mereka tanggal 21 Februari lalu di dalam katedral di Moskow. &quot;Tolokonnikova, Alyokhina dan Samutsevich melakukan &quot;hooliganisme&quot; -- dengan kata lain pelanggaran berat ketertiban umum,&quot; kata Syrova.<br />\r\n<br />\r\n&quot;Pengadilan menyatakan mereka bersalah. Pengadilan meraih putusan berdasarkan kesaksian terdakwa sendiri dan bukti lain,&quot; tambahnya.<br />\r\n<br />\r\nJaksa menuntut hukuman tiga tahun penjara atas tiga anggota band itu.<br />\r\n<br />\r\nPara pendukung band itu melakukan protes di sejumlah tempat di Moskow.&nbsp; Keamanan ketat pun diterapkan dan sejumlah jalan ditutup.<br />\r\n<br />\r\nPussy Riot mengecam kasus tersebut yang mereka katakan diorganisir Putin.<br />\r\n<br />\r\n<strong>Buat Marah Gereja</strong><br />\r\n<br />\r\nSejumah selebriti termasuk bintang pop Amerika, Madonna, menyerukan agar mereka dibebaskan.<br />\r\n<br />\r\nKetiga anggota band itu mengatakan &quot;doa punk&quot; mereka adalah tindak politik untuk memprotes gereja ortodoks Rusia yang mendukung Presiden Putin.<br />\r\n<br />\r\nDalam penampilan seronok mereka di dekat altar mereka meminta Bunda Maria untuk &quot;menggeser Putin&quot;.<br />\r\n<br />\r\nNyanyian mereka membuat marah gereja Ortodoks dan ketua gereka Kirill menyebutkan penampilan itu sama saja dengan penghujatan agama. Namun sejumlah warga Rusia menganggap kasus itu sebagai upaya pemerintah membungkam kritikan.\r\n', '<span class="judul judul_artikel2011">Pussy Riot. </span>\r\n', 'Senin', '2012-08-20', '05:30:13', '46Pussy-Riot.jpg', 17, 'hiburan,musik', 'Y'),
(619, 31, 'admin', '4 Alasan Kenapa Memaafkan Penting Bagi Kesehatan', '', '', '4-alasan-kenapa-memaafkan-penting-bagi-kesehatan', 'N', 'N', 'N', 'Jakarta - Memaafkan bukan berarti melupakan, tapi memberi kesempatan kepada diri sendiri untuk menghapus rasa kesal dan dendam terhadap orang lain. Dengan demikian, rasa marah dan tekanan yang mengganggu emosi pun dapat diredakan. Akibatnya, pikiran jadi lebih tenang dan jauh dari stres. Sejatinya, tak hanya itu saja manfaat kesehatan dari memaafkan orang lain.<br />\r\n<br />\r\nSecara ilmiah, memaafkan kesalahan orang lain dapat bermanfaat baik bagi kesehatan fisik maupun mental. Secara sosial, memaafkan orang lain merupakan wujud kebesaran jiwa dan perilaku yang dianggap baik. Ada banyak manfaat kesehatan dari memaafkan orang lain seperti dilansir Mayo Clinic dan Telegraph, Minggu (19/8/2012) antara lain:<br />\r\n<br />\r\n<strong>1. Terhindar dari Penyakit Tekanan Darah Tinggi</strong><br />\r\nPara peneliti dari University of California, San Diego menemukan bahwa orang-orang yang bisa melepaskan kemarahannya dan memaafkan kesalahan orang lain cenderung lebih rendah risikonya mengalami lonjakan tekanan darah.<br />\r\n<br />\r\nPeneliti meminta lebih dari 200 relawan untuk memikirkan saat temannya menyinggung perasaan. Setengah dari kelompok diperintahkan untuk berpikir mengapa hal tersebut bisa membuatnya marah, sedangkan yang lainnya didorong untuk memaafkan kesalahan tersebut. Peneliti menemukan bahwa orang yang marah mengalami peningkatan tekanan darah lebih besar dibanding orang yang pemaaf.<br />\r\n<strong><br />\r\n2. Terhindar dari Risiko Penyalahgunaan Obat dan Alkohol</strong><br />\r\nSejumlah penelitian telah membuktikan bahwa rasa benci, dendam dan permusuhan dapat memicu tekanan darah tinggi. Stres muncul ketika perasaan kecewa atau tersakiti. Memaafkan adalah sebuah proses perdamaian dengan diri sendiri. Seseorang yang memberi maaf justru akan merasa lebih rileks untuk menerima kondisinya.<br />\r\n<br />\r\nDengan kondisi mental yang lebih rileks, seseorang juga akan terhindar dari risiko penyalahgunaan alkohol dan obat terlarang. Risiko tersebut umumnya dihadapi oleh para pendendam yang membutuhkan jalan pintas untuk lepas dari beban emosi negatifnya.<br />\r\n<br />\r\n<strong>3. Menurunkan Risiko Serangan Jantung</strong><br />\r\nPara ilmuwan membuktikan bahwa permintaan maaf yang ditujukan pada seseorang bisa meningkatkan kesehatan jantungnya. Orang yang mengalami perlakuan kasar akan mengalami peningkatan tekanan darah yang dapat memicu serangan jantung atau stroke. Namun ketika mendengarkan kata &#39;maaf&#39;, tekanan darah akan menurun kembali.<br />\r\n<br />\r\nTekanan darah yang diukur dalam penelitian adalah tekanan darah diastolik, yaitu tekanan dalam darah antara detak jantung atau tekanan dalam arteri-arteri ketika jantung istirahat setelah kontraksi. Jika terlalu tinggi atau terjadi untuk waktu yang lama, dapat meningkatkan kemungkinan stroke atau serangan jantung.<br />\r\n<br />\r\n<strong>4. Jauh dari Stres dan Depresi</strong><br />\r\nSebuah penelitian yang dimuat Personality and Social Psychology Bulletin menemukan bahwa memafkan secara positif dapat mengurangi gejala depresi. Tak hanya itu, memaafkan akan mengembalikan pikiran positif, dan memperbaiki hubungan. Selain itu, memaafkan juga berkaitan dengan perilaku positif lain seperti sifat dermawan, murah hati dan tidak mudah tertekan.<br />\r\n', '', 'Sabtu', '2012-11-17', '08:14:51', '7health.jpg', 24, 'kesehatan', 'Y'),
(625, 41, 'admin', 'Effendi Ghazali: Putaran Kedua Pilkada DKI Ketat', '', '', 'effendi-ghazali-putaran-kedua-pilkada-dki-ketat', 'N', 'Y', 'N', 'Jakata - Pengamat politik dari Universitas Indonesia, Effendi Ghazali, mengungkapkan pada putaran kedua pemilihan kepala daerah (Pilkada) pada September mendatang, akan terjadi persaingan ketat antara pasangan Joko Widodo-Basuki T Purnaka dengan pasangan Fauzi Bowo-Nachrowi Ramli.<br />\r\n<br />\r\n&ldquo;Kami telah mengadakan survey internal, dan hasilnya, akan terjadi persaingan ketat antara Pak Jokowi dan Pak Fauzi Bowo. Tidak seperti hasil sebelumnya yang memang jauh jarak perolehannya,&rdquo; ujarnya ditemui di acara open house yang diadakan Gubernur Fauzi Bowo, di rumah dinasnya Jalan Taman Suropati No. 7, Jakarta Pusat, Minggu (19/08/2012).<br />\r\n<br />\r\nMeski demikian, Effendi urung menyebutkan nilai dari survey yang dilakukan oleh pihaknya, mengingat masih ada margin eror yang besar dari 450 responden yang dilakukan survey. &ldquo;Siapa yang lebih unggul, belum bisa saya kasih tahu sekarang, karena survey kami agak besar margin errornya,&rdquo; jelasnya.<br />\r\n<br />\r\nMenyinggung maraknya penggunaan isu SARA yang terjadi selama bulan ramadhan kemarin, Effendi angkat bicara. Menurutnya, penggunaan isu SARA yang dilakukan oleh pihak-pihak tertentu sudah menimbulkan dampak yang besar, baik di kalangan masyarakat bawah maupun untuk calon pasangan. &ldquo;Itu jelas ada dampaknya. Bahkan pengaruhnya cukup besar untuk pilkada putaran kedua nanti,&rdquo; tandasnya.\r\n', 'Joko Widodo (kiri), Fauzi Bowo (kanan)\r\n', 'Jumat', '2012-09-14', '10:42:25', '53joko_foke.jpg', 24, 'metropolitan', 'Y'),
(624, 41, 'admin', 'Tuntut THR, Ratusan Pekerja Transjakarta Mogok', '', '', 'tuntut-thr-ratusan-pekerja-transjakarta-mogok', 'N', 'N', 'N', 'Jakarta - Ratusan pekerja bus koridor I (Blok M-Kota) dan X (Cililitan-Tanjung Priok) mogok bekerja. pramudi, teknisi, dan petugas keamanan menuntut kenaikan upah dan pembayaran Tunjangan Hari Raya (THR). Mereka di depan Pool Pinang Ranti, Jalan Raya Pondok Gede, Pinang Ranti, Makassar, Jakarta Timur, sambil berorasi membentangkan spanduk bertemakan agar PT Jakarta Expres Trans (JET) membayar THR.<br />\r\n<br />\r\nMenurut&nbsp; pramudi Bus TransJakarta Koridor I, Maya, pihaknya terpaksa melakukan mogok operasi karena pihak perusahaan tidak membayarkan kewajibannya memberikan THR.<br />\r\n<br />\r\n&quot;Sementara, anak-anak sudah menunggu di rumah ingin jalan-jalan ke mal untuk beli baju Lebaran,&quot; ujarnya kepada wartawan, Senin (13/08/2012).<br />\r\n<br />\r\nSedangkan Abdul Chakim berharap, selain memberikan THR perusahaan PT JET juga menaikan upah. Pasalnya, untuk Pramudi yang di bawah manajeman PT JET upahnya bervariasi mulai dari Rp2,4 juta-Rp2,8 juta. Sedangkan pramudi yang berada di bawah manajemen gajinya mencapai Rp5,3 juta.<br />\r\n<br />\r\n&quot;THR kami segera terbayar dan gaji kami dinaikkan sejajar dengan pramudi dari koridor lainnya,&quot; imbuhnya.<br />\r\n<br />\r\nHingga bubar aksi berjalan berdamai, pihak perusahaan berjanji akan membayarka THR dan menaikan upah para pekerja bus Transjakarta.\r\n', '', 'Senin', '2012-08-20', '10:14:24', '95demo_karyawan-transjakarta.jpg', 69, 'metropolitan', 'Y'),
(622, 31, 'admin', 'Orang Beriman Kondisi Fisik n Mentalnya Lebih Sehat', '', '', 'orang-beriman-kondisi-fisik-n-mentalnya-lebih-sehat', 'N', 'N', 'N', '<p>Orang yang beriman disayang Tuhan, mungkin itulah sebabnya kemudian orang yang beriman juga memiliki kondisi kesehatan yang baik. Nyatanya, berbagai penelitian menunjukkan bahwa orang-orang yang memiliki keyakinan dan keimanan yang teguh juga memiliki kondisi fisik yang lebih prima.<br /> <br /> "Keyakinan terhadap agama bisa mengurangi stres, depresi, dan meningkatkan kualitas hidup," kata Dr Harold G. Koenig, profesor psikiatri dan ilmu perilaku di Duke University Medical Center seperti dilansir Medpagetoday.com, Minggu (19/8/2012).<br /> <br /> Data sebuah penelitian yang dimuat American Journal of Health Promotion tahun 2005 menyimpulkan bahwa orang yang banyak berdoa lebih banyak mendapat manfaat kesehatan dengan cara menerapkan perilaku yang sehat, menjalankan antisipasi terhadap penyakit dan lebih puas terhadap pelayanan kesehatan.<br /> <br /> Sebuah penelitian tahun 2006 yang dimuat British Medical Journal juga menemukan bahwa kehadiran dalam sebuah acara keagamaan ternyata berkaitan dengan penurunan risiko penyakit menular.<br /> <br /> Menurut Koenig, adanya keyakinan beragama dan kegiatan spiritual berhubungan dengan risiko penyakit atau gangguan kesehatan yang lebih rendah, misalnya stres, penyakit kardiovaskular, tekanan darah, reaktivitas kardiovaskular, gangguan metabolisme serta dapat menjamin keberhasilan operasi jantung. Namun di sisi lain, Koenig juga memperingatkan bahwa cara kerja Tuhan ini tidak dapat diukur dengan cara dan metode apapun.<br /> <br /> "Saya percaya bahwa doa efektif, tapi tidak berfungsi secara ilmiah dan tidak dapat diprediksi. Tidak ada alasan ilmiah atau teologis atas setiap efek dari keyakinan yang dapat dipelajari atau didokumentasi, seolah-olah Tuhan adalah bagian dari alam semesta yang dapat diprediksi. Ilmu pengetahuan tidak dirancang untuk membuktikan hal-hal yang supranatural," kata Koenig.<br /> <br /> Selain itu, keyakinan terhadap agama juga telah dikaitkan dengan umur panjang, perkembangan penyakit kognitif yang lebih lambat dan penuaan yang sehat. Senada dengan Koenig, dr Robert A. Hummer, profesor sosiologi di University of Texas di Austin yang berfokus pada hubungan antara agama dan rendahnya risiko kematian juga memiliki pendapat yang sama.<br /> <br /> Hummer merujuk sebuah penelitian yang melacak beberapa orang berusia 51 - 61 tahun selama 8 tahun untuk mendokumentasikan tingkat ketahanan hidupnya. Penelitian tersebut menemukan bahwa peserta yang tidak menghadiri acara keagamaan sama sekali memiliki kemungkinan 64 persen lebih tinggi mengalami kematian dibandingkan orang yang sering beribadah.</p>', '', 'Senin', '2012-08-20', '08:51:08', '19shalat.jpg', 26, 'kesehatan', 'Y'),
(644, 41, 'admin', '"Banjir Jakarta" Paling Dicari di Google', 'Jakarta Darurat Banjir', '', 'banjir-jakarta-paling-dicari-di-google', 'N', 'Y', 'N', '<p>\r\nJakarta - Banjir yang mengguyur Jakarta beberapa hari lalu membuat sejumlah lokasi di ibukota banjir. Internet, jadi media yang digunakan warga Jakarta untuk mencari tahu informasi terkini seputar banjir. &nbsp;\r\n</p>\r\n<p>\r\nDalam laporan Pencarian Terhangat Google Indonesia sepanjang 11 - 17 Januari 2013, kata kunci &quot;Banjir di Jakarta&quot; adalah yang paling banyak dimasukkan dalam mesin pencari Google.\r\n</p>\r\n<p>\r\nTak hanya mesin pencari, beberapa platform milik Google juga digunakan untuk memberi informasi seputar banjir. Ada Google Crisis Response, yang menyajikan informasi lokasi-lokasi banjir di Jakarta. Bahkan, layanan ini juga memperlihatkan kondisi lalu lintas yang macet akibat banjir.\r\n</p>\r\n<p>\r\nDi dalam Google Crisis Response juga terdapat beberapa nomor telepon penting dari lembaga pemerintah DKI Jakarta maupun swadaya masyarakat, yang dapat dihubungi oleh warga untuk mendapat bantuan dan evakuasi.\r\n</p>\r\n<p>\r\nSelain layanan Google, jejaring sosial Twitter juga banyak digunakan untuk mencari informasi terkini. Beberapa akun Twitter yang memberi informasi banjir antara lain @TMCPoldaMetro dan @LewatMana.\r\n</p>\r\n<p>\r\nSitus web pemberi informasi lalu lintas LewatMana.com juga laris dikunjungi dalam sepekan ini. LewatMana memperlihatkan kondisi lalu lintas dan gambar dari CCTV. Ia menduduki peringkat 10 Pencarian Terhangat Google Indonesia pada 11 - 17 Januari 2013.\r\n</p>\r\n<p>\r\nDalam sepekan ini, warga juga ingin tahu soal perkiraan cuaca dengan memasukkan kata kunci BMKG di mesin pencari Google. BMKG (Badan Meteorologi Klimatologi dan Geofisika) masuk ke posisi 9 sebagai topik yang paling dicari di Google Indonesia pekan ini. (Sumber: kompas.com)\r\n</p>\r\n', '', 'Senin', '2013-01-21', '09:46:27', '25banjir-jakarta.jpg', 32, 'nasional', 'Y'),
(645, 48, 'admin', 'Korban dan Pelaku Pemerkosaan parah', 'Seleksi Calon Hakim Agung', '', 'korban-dan-pelaku-pemerkosaan-saling-menikmati', 'N', 'N', 'Y', '<p>\r\nCalon hakim agung Muhammad Daming Sanusi menyatakan, hukuman mati tidak layak diberlakukan bagi pelaku pemerkosaan. Penjelasannya soal ini mengundang tawa sejumlah anggota Komisi III saat berlangsung fit and proper test hakim agung di Komisi III DPR pada Senin (14/1/2013) ini.\r\n</p>\r\n<p>\r\n&quot;Bagaimana menurut Anda, apabila kasus perkosaan ini dibuat menjadi hukuman mati?&quot; tanya anggota Komisi III dari Fraksi PAN, Andi Azhar, ketika itu kepada Daming.\r\n</p>\r\n<p>\r\nDaming menjawab, &quot;Yang diperkosa dengan yang memerkosa ini sama-sama menikmati. Jadi, harus pikir-pikir terhadap hukuman mati.&quot;\r\n</p>\r\n<p>\r\nJawaban Daming ini pun langsung mengundang tawa, tetapi tidak sedikit yang mencibir pernyataannya. Dijumpai seusai menjalani fit and proper test, Daming berdalih bahwa pernyataannya itu hanya untuk mencairkan suasana.\r\n</p>\r\n<p>\r\n&quot;Kita tadi terlalu tegang, jadi supaya tidak terlalu tegang,&quot; imbuhnya.\r\n</p>\r\n<p>\r\nMenurut Daming, hukuman mati harus dipertimbangkan baik-baik. Ia beralasan, dirinya belum memberikan jawaban tegas apakah ia mendukung atau tidak penerapan hukuman mati bagi pelaku pemerkosaan. &quot;Tentu kita harus pertimbangkan baik-baik kasus tertentu, seperti narkoba, korupsi, saya setuju. Tapi untuk kasus pemerkosan, harus dipertimbangkan dulu. Tadi saya belum memberikan jawaban yang tegas,&quot; kata Daming.\r\n</p>\r\n<p>\r\nMenanggapi pernyataan itu, anggota Komisi III lain dari Fraksi Partai Demokrat, Himmatul Aliya Setiawati, menilai candaan Daming sangat tidak pantas.\r\n</p>\r\n<p>\r\n&quot;Saya kira candaannya tidak pas. Saya setuju ada hukuman mati ya,&quot; ucap Aliya.\r\n</p>\r\n<p>\r\nMeski menganggap tak pantas, ia menilai jawaban Daming sudah memenuhi kriteria yang diharapkan dari seorang hakim agung. &quot;Dari Fraksi Gerindra menyatakan tidak akan memilih, tapi kalau saya sih soal memilih kita lihat nilai-nilai keseluruhannya,&quot; tutur Aliya. (Sumber: kompas.com\r\n</p>\r\n', '', 'Senin', '2013-01-21', '15:59:46', '31palu-hakim.jpg', 58, 'hukum', 'Y'),
(602, 2, 'admin', 'La Nyalla Kembalikan Riedl Jadi Pelatih Timnas', '', '', 'la-nyalla-kembalikan-riedl-jadi-pelatih-timnas', 'Y', 'N', 'N', 'Jakarta - Jakarta - Setelah membentuk Timnas, PSSI versi KLB pimpinan La Nyalla Mahmud Matalitti menunjuk Alfred Riedl sebagai pelatihnya.<br />\r\n<br />\r\nPria asal Austria itu sebelumnya pernah menukangi Timnas, namun dipecat pada 13 Juli 2011 akibat kisruh ditubuh PSSI. Dengan penunjukan itu, berarti Riedl akan kembali jadi peramu permainan skuad &#39;Pasukan Garuda&#39; jelang Piala AFF di Malaysia, November mendatang. <br />\r\n<br />\r\nMenurut Acting Sekjen PSSI Tigor Shalom Boboy,&nbsp; Riedl ditunjuk oleh Direktur Teknik Timnas Benny Dollo yang sebelumnya diberi mandat oleh PSSI&nbsp; Rabu (8/8/2012) lalu. <br />\r\n<br />\r\n&quot;Benny Dollo telah memberikan rekomendasinya terkait posisi pelatih kepala tim nasional senior kepada Exco PSSI melalui Ketua Umum La Nyalla Mahmud Mattalitti. Posisi pelatih kepala tim nasional senior yg direkomendasikan oleh Benny Dollo selaku Direktur Teknik adalah Alfred Riedl,&quot; ujar Tigor melalui rilis yang diterima INILAH.COM, Kamis (16/8/2012).<br />\r\n<br />\r\nTigor mengungkapkan bahwa Riedl sudah menyatakan kesediaannya terhadap penunjukannya sebagai pelatih kepala tim nasional senior. Pria 62 tahun itu akan&nbsp; tiba di Indonesia pada akhir Agustus 2012.<br />\r\n<br />\r\nSetelah itu, Riedl akan langsung menyusun nama-nama siapa saja yang akan masuk dalam tim besutannya.<br />\r\n<br />\r\n&quot;Susunan Managemen dan Official serta pemain Tim Nasional akan diumumkan pasca lebaran menunggu konfirmasi pelatih kepala Alfred Riedl,&quot; tukas Tigor.<br />\r\n<br />\r\nSebelumnya, pihak PSSI KLB pimpinan La Nyalla menyatakan membentuk Timnas sendiri setelah mandegnya pertemuan Joint Committee PSSI. Menurut pihak La Nyalla, seharusnya pembentukan Timnas dibahas di komite bersama tersebut melibatkan dua belah pihak, antara kubu Djohar Arifin dengan pihaknya.<br />\r\n<br />\r\nPiala AFF akan diselenggarakan 22 November hingga 22 Desember 2012 dengan tuan rumah Malaysia dan Thailand. Indonesia akan bermain di Grup B yang bertempat di Malaysia bersama Malaysia, Singapura dan Runner Up babak penyisihan.\r\n', '', 'Minggu', '2012-08-19', '03:19:23', '84alfred-riedl6.jpg', 21, 'bola,olahraga', 'Y'),
(603, 19, 'admin', '4 Teknologi yang Bakal Bertahan Sampai 2030', '', '', '4-teknologi-yang-bakal-bertahan-sampai-2030', 'Y', 'Y', 'N', 'Perkembangan teknologi telah mengantarkan berbagai perangkat yang lebih kecil, cepat dan tangguh ke dalam genggaman tangan. Ada juga yang telah ditinggalkan atau digantikan teknologi lain, seperti sebuah floppy disk. &nbsp;<br />\r\nSelain teknologi yang ditiggalkan, ada juga beberapa teknologi yang diprediksi akan tetap bertahan sampai puluhan tahun ke depan. Seperti dilansir Live Science, Sabtu (18/8/2012), berikut empat teknologi yang diprediksi akan bertahan sampai 2030.<br />\r\n<br />\r\n<strong>1. Papan Ketik QWERTY</strong><br />\r\nTeknologi untuk melakukan input telah semakin banyak, ada voice recognition, handwriting recognition dan gesture control. Ini diperkiraka akan semakin akurat dan populer dalam dua dekade ke depan. Namun, sampai nanti ditemukan cara input teks menggunakan kendali pikiran, metode mengetik akan tetap sebuah metode menyusun teks yang paling akurat.<br />\r\nKehadiran papan ketik di tablet dan telefon genggam memang semakin terancam, namun layout QWERTY yang sejak dulu digunakan akan terus hidup.<br />\r\n<br />\r\n<strong>2. PC</strong><br />\r\nBeberapa orang berpendapat kita sedang memasuki zaman pasca PC. Pasalnya kini orang semakin sering menghabiskan waktu menggunakan smartphone dan tablet ketimbang menggunakan komputer desktop tradisional berbasis Windows atau Mac.<br />\r\nNamun di sisi lain, ketika sudah waktunya menggarap pekerjaan yang benar-benar serius, terutama yang melibatkan multitasking, PC masih merupakan perangkat yang&nbsp; paling bisa diandalkan.<br />\r\n&nbsp;<br />\r\nPada 2030, ukuran serta bentuk PC mungkin akan berubah. Beberapa orang bahkan berpendapat bahwa dengan adanya prosesor berotak empat, telefon genggam dan tablet menjelma menjadi PC. Tetap saja, apapun faktor yang mempengaruhi, pengguna yang fokus pada produktivitas akan membutuhkan sebuah komputer utama dengan kemampuan proses yang tinggi dan sanggup multitasking.<br />\r\n&nbsp;<br />\r\n<strong>3. USB Ports</strong><br />\r\nSekarang telah lebih dari 15 tahun sejak USB pertama kali diperkenalkan dan kita akan sulit membayangkan hidup tanpa USB. Ini hampir menjadi sebuah standar untuk membuat Anda bisa menransfer data dan menghubungkan dengan berbagai hal seperti papan ketik atau harddisk eksternal. Beberapa orang berpendapat bahwa standar seperti Thunderbolt dari Intel akan menandingi USB, tapi mereka tidak memiliki dasar instalasi untuk menandingi USB. Standar ini diprediksi akan semakin berkembang ke depannya.<br />\r\n<strong><br />\r\n4. Uang Tunai</strong><br />\r\nAda beberapa perdebatan mengenai apakah kartu kredit dan debit akan sepenuhnya digantikan oleh sistem pembayaran mobile dalam beberapa tahun ke depan. Walau bagaimanapun, uang tunai tampaknya akan tetap dibawa meski pada 2030.<br />\r\n&nbsp;<br />\r\nPasalnya di era informasi ini, membayar dengan uang tunai adalah cara terbaik untuk membuat pembelian yang Anda lakukan tetap anonim dan pribadi. Selain itu, uang kertas memiliki perlindungan terbaik dalam melawan pencuri indentitas karena orang yang menerima pembayaran tidak harus mengetahui nama Anda.\r\n', '', 'Sabtu', '2012-11-17', '03:27:34', '5technology-gadgets.jpg', 20, 'teknologi', 'Y'),
(604, 19, 'admin', 'Usai China, Indonesia Tuan Rumah Miss World 2013', '', '', 'usai-china-indonesia-tuan-rumah-miss-world-2013', 'Y', 'N', 'N', 'Masyarakat Indonesia pantas bahagia dua kali lipat saat penyelenggaraan final Miss World 2012. Bukan saja prestasi Ines Putri yang masuk dalam jajaran 15 besar, tetapi Indonesia juga diumumkan menjadi lokasi penyelenggaraan Miss World 2013.<br />\r\n&nbsp;<br />\r\nAjang Miss World 2012 di Ordos, Mongolia, China, berlangsung sukses. Diikuti 116 finalis dari seantero dunia, Miss World yang diselenggarakan ke-62 tahun ini akhirnya mendaulat Wenxia Yu sebagai Miss World 2012.<br />\r\n<br />\r\nSelama setahun, wakil dari Republik Rakyat China ini akan berkeliling dunia dan menjalankan misi sosial dalam program yang dikemas secara baik bernama Beauty with a Purpose.<br />\r\n<br />\r\nAdapun masa tugas terakhir dari pemilik tinggi badan 177 sentimeter ini akan dilakukan saat penyelenggaraan Miss World 2013 di Indonesia. Dan, kepastian soal lokasi penyelenggaraan Miss World dilakukan secara simbolis saat malam final Miss World 2012. Saat itu, Nana Putra, Managing Director MNC Group menerima bendera Miss World.<br />\r\n<br />\r\nRencananya, Miss World 2013 diselenggarakan September dengan mengambil lokasi karantina di Bali. Sementara itu, Jakarta sebagai Ibu Kota Indonesia dipilih menjadi lokasi malam final Miss World 2013.<br />\r\n<br />\r\n&ldquo;Jakarta akan menjadi tuan rumah malam final Miss World 2013. Namun tepatnya di mana lokasi tersebut, kami belum bisa memastikan,&rdquo; tutur Kanti Mirdiati kepada Okezone di Blacksteer Lounge, Belleza Shopping Arcades, Permata Hijau, Jakarta, belum lama ini.<br />\r\n<br />\r\nProject Director Miss Indonesia &amp; Managing Director RCTI ini pun menjelaskan alasan Jakarta dipilih sebagai lokasi malam final Miss World 2013.<br />\r\n<br />\r\n&ldquo;Ini merupakan bagian dari upaya memperkenalkan Jakarta dan Indonesia sendiri ke mata dunia. Kebanyakan orang luar negeri tahu Bali, tapi tidak tahu kalau Bali ada di Indonesia. Mereka mengira bahwa Bali itu sebuah negara,&rdquo; ucap wanita ramah ini.\r\n', '', 'Minggu', '2012-08-19', '03:37:05', '85missworld.jpg', 25, 'internasional', 'Y'),
(605, 39, 'admin', 'Memalukan! Bu Guru di AS Bercinta dengan 4 Muridnya ', 'Didakwa Penyimpangan Seks', '', 'memalukan-bu-guru-di-as-bercinta-dengan-4-muridnya-', 'Y', 'N', 'N', 'Texas - Memalukan! Seorang guru SMA di Amerika Serikat diadili karena berhubungan seks dengan empat muridnya sementara murid kelima merekam aksi mesum tersebut.<br />\r\n<br />\r\nWanita bernama Brittni Colleps tersebut dikenai sejumlah dakwaan, termasuk seks menyimpang dan hubungan tidak pantas antara pendidik dan pelajar.<br />\r\n<br />\r\nWanita berumur 28 tahun itu tadinya merupakan guru Bahasa Inggris di SMA Fort Worth, Texas. Di persidangan yang digelar hari ini seperti dilansir MyFoxDFW.com, Kamis (16/8/2012), terungkap bahwa terdakwa yang telah memiliki tiga anak itu, menggunakan pesan-pesan SMS untuk mendekati kelima pelajar putra tersebut.<br />\r\n<br />\r\nSalah seorang remaja mengaku, dia dan Colleps berkirim 100 SMS dalam satu hari saat musim semi pada tahun 2010. Pesan-pesan itu kemudian kian menjadi-jadi sehingga akhirnya mereka sepakat untuk bertemu guna bercinta.<br />\r\n<br />\r\n&quot;Dia (Colleps) bilang dia mendambakan... bahwa saya punya sesuatu yang dia inginkan,&quot; kata remaja tersebut.<br />\r\n<br />\r\nDiungkapkan remaja laki-laki tersebut, dalam satu kesempatan, empat remaja berhubungan intim dengan bu guru yang telah dipecat tersebut. Para remaja tersebut sebenarnya sudah bisa digolongkan dewasa, namun hukum melindungi para pelajar dari hubungan dengan seseorang yang jabatannya lebih tinggi, dalam hal ini guru.<br />\r\n<br />\r\nSeorang remaja lainnya merekam adegan seks tersebut dengan video telepon genggamnya. Video tersebut diputar di persidangan.<br />\r\n<br />\r\nJika terbukti bersalah, Colleps terancam hukuman penjara maksimum 20 tahun. Suaminya, Christopher Colleps, seorang tentara AS, telah menegaskan bahwa dirinya akan terus mendukung istrinya dan bahwa mereka akan tetap mempertahankan rumah tangga mereka.\r\n', 'Brittni Colleps (foto:abc)\r\n', 'Minggu', '2012-08-19', '04:20:50', '97abc_brittni_colleps.jpg', 39, 'internasional', 'Y'),
(606, 42, 'admin', 'Astagfirullah, Festival Wine Digelar di Halaman Masjid ', '', '', 'astagfirullah-festival-wine-digelar-di-halaman-masjid-', 'N', 'N', 'N', 'Beer El-Sabe - Kelompok Muslim menyatakan kemarahannya atas rencana penyelenggaraan Festival Wine di kota Beer el-Sabe, Israel. Kemarahan karena, penyelenggaraan akan dilaksanakan di halaman luar sebuah bangunan bekas masjid kuno di wilayah tersebut.<br />\r\n<br />\r\nMenurut laporan media Israel, Gerakan Islam di Israel mengatakan festival ini merupakan &quot;dosa tak termaafkan&quot;. Festival juga dianggap sebagai pukulan keras bagi umat Muslim di sana Sebab menurut kelompok Muslim tersebut, publisitas festival anggur merupakan penghinaan terhadap sensitivitas Muslim. Seperti diketahui Islam melarang konsumsi alkohol.<br />\r\n<br />\r\nFestival &quot;Salut Wine dan Beer Festival&quot; ke enam ini rencananya akan diselenggarakan di pelataran sebuah bangunan bekas masjid di Beer el-Sabe, pada 5-6 September. Festival akan menampilkan minuman beralkohol dari sekitar 30 pabrik dan perkebunan anggur di seluruh negeri.<br />\r\n<br />\r\nPusat Hukum untuk Hak Minoritas Arab di Israel, Kamis (16/8) lalu, mengirimkan surat pada Jaksa Agung, Menteri Kebudayaan dan Olahraga Israel serta Kotamadya Beer el-Sabe. Mereka menuntut agar festival Wine di wilayah tersebut dibatalkan. &quot; Penggunaan pelataran Masjid untuk festival minuman beralkohol adalah sesuatu yang sensitif. Sebab Islam melarang konsumsi alkohol dan tak sesuai dengan penggunaan masjid untuk beribadah,&quot; tulis organisasi tersebut dalam surat ke Jaksa Aram Mahameed.<br />\r\n<br />\r\nSurat juga menambahkan, Festival Wine melanggar keputusan Mahkamah Agung Israel yang keluar Juni 2011 lalu. Dalam keputusan tersebut memerintahkan masjid untuk diubah menjadi museum sejarah dan kebudayaan Islam.<br />\r\n<br />\r\nMasjid yang dibangun pada Era Usmani pada 1906 ini sempat menjadi tempat ibadah hingga 1948. Kemudian berubah menjadi penjara dan pengadilan hingga 1952. Lalu dari 1953-1991 dibuka sebagai Museum Tanah Negeb. Pada 2002 sempat ada sebuah petisi yang meminta masjid untuk dibuka kembali sebagai tempat ibadah.\r\n', '', 'Minggu', '2012-08-19', '04:32:25', '42festival_wine.jpg', 32, 'dunia-islam', 'Y');
INSERT INTO `berita` (`id_berita`, `id_kategori`, `username`, `judul`, `sub_judul`, `youtube`, `judul_seo`, `headline`, `aktif`, `utama`, `isi_berita`, `keterangan_gambar`, `hari`, `tanggal`, `jam`, `gambar`, `dibaca`, `tag`, `status`) VALUES
(607, 39, 'admin', 'Moskow Larang Parade Gay Selama 100 Tahun', '', '', 'moskow-larang-parade-gay-selama-100-tahun', 'Y', 'Y', 'N', '<p>\r\nPengadilan di Moskow mengukuhkan keputusan untuk melarang parade homoseksual untuk seratus tahun ke depan.<br />\r\n<br />\r\nLangkah ini dilakukan menyusul upaya pegiat hak homoseksual Rusia, Nikolay Alexeyev untuk membatalkan keputusan pemerintah kota melarang parade.<br />\r\n<br />\r\nIa meminta hak melakukan parade selama 100 tahun ke depan.<br />\r\n<br />\r\nAlexeyev juga menentang larangan kota St Petersburgh untuk menyebarkan &quot;propaganda homoseksual.&quot;\r\n</p>\r\n<p>\r\nMahkamah hak asasi Eropa telah  meminta pemerintah Rusia untuk membayar kerugian kepada Alexeyev.\r\n</p>\r\n<p>\r\nAlexeyev mengatakan Jumat (17/08) ia akan kembali ke Mahkamah Eropa untuk meminta agar menetapkan bahwa larangan itu tidak adil.\r\n</p>\r\n<p>\r\nPemerintah kota Moskow menyatakan parade gay akan menimbulkan risiko gangguan ketertiban umum.\r\n</p>\r\n<p>\r\nPemkot juga mengatakan sebagian besar warga Moskow menentang kegiatan itu.\r\n</p>\r\n<p>\r\nBulan September lalu, Dewan Eropa -pengawasan \r\nHAM di Eropa- akan meneliti tanggapan Rusia atas keputusan Mahkamah \r\nEropa sebelumnya tentang hak gay, menurut media Rusia.\r\n</p>\r\n<p>\r\nBulan Oktober 2010, Mahkamah Eropa mengatakan Rusia melakukan diskriminasi terhadap Alexeyev karena orientasi seksualnya.\r\n</p>\r\n<p>\r\nMahkamah saat itu menangani larangan Moskow atas parade gay antara tahun 2006-2008.\r\n</p>\r\n', 'Nikolay Alexeye. \r\n', 'Sabtu', '2012-11-17', '04:43:57', '7Nikolay-Alexeyev.jpg', 37, 'internasional', 'Y'),
(597, 44, 'admin', 'Pasar Tiban Kalibata Selalu Ramai Pengunjung', '', '', 'pasar-tiban-kalibata-selalu-ramai-pengunjung', 'Y', 'Y', 'N', 'Jakarta - Pasar tiban, atau pasar musiman, istilah untuk menjelaskan pasar yang musiman, tidak punya tempat menetap. Ada juga istilah pasar malam, pasar tumpah atau pasar kaget. Biasanya pasar ini mengambil waktu tertentu misalnya: bulan puasa, atau hari tertentu yang libur. Pasar tiban di Kalibata &lsquo;buka&rsquo; tiap hari minggu.<br />\r\n<br />\r\nBermacam-macam barang dijajakan, mulai dari pakaian, mainan anak-anak, sepatu, tas, tanaman hias, jajan pasar, peralatan rumah tanggga, sprei, parfum, buku dan majalah bekas, pigura, dll. Semua dengan harga murah. Pasar ini mengambil tempat sepanjang jalan dari menuju Stasiun Kalibata sampai depan STEKPI, samping periumahan DPR RI Kalibata.<br />\r\n<br />\r\nPasar ini awalnya tidak begitu ramai. Waktu itu setiap hari minggu di danau Taman Makam pahlawan (TMP) Kalibata banyak orang yang melakukan olah raga pagi. Muda-mudi paling banyak. Hukum ekonomi berjalan, di mana ada keramaian selalu ada yang menggunakan peluang. Maka ada orang jualan bubur ayam, lontong sayur, ketoprak dan lainnya. Mengambil tempat sempit di depan gerbang parkir TMP.<br />\r\n<br />\r\nLama-lama ada yang berjualan pakaian, mainan, poster, dan lainnya. Semakin banyak yang berjualan dan mengambil tempat di sepanjang jalan depan TMP. Di sini mulai ada masalah, kemacetan. Mungkin karena pengunjung semakin banyak, membuat kemacetan, pasar &lsquo;dipindah&rsquo; ke dalam. Hingga sekarang. Sebenarnya tidak tahu dipindah atau pindah sendiri, mungkin pihak berwenang berprinsip, yang penting tidak mebuat jalan macet.<br />\r\n<br />\r\nJadilah seperti sekarang, pasar tiban menjadi hiburan sendiri untuk warga Kalibata, Pancoran, Pasar minggu dan sekitarnya. Tempatnya yang relatif jauh dari jalan raya, masih hijau, memang enak buat jalan-jalan. Setelah lelah jalan-jalan melihat-lihat barang, tersedia berbagai warung yang meyediakan berbagai menu, tinggal pilih: Nasi uduk, lontong sayur, nasi rames, mendowan, bubur ayam, pecel lele, warung Padang, warung Sunda. Juga minuman, ada es tebu, Es Teh, es buah.<br />\r\n<br />\r\nPenasaran, sempatkan hari muingggu ke Kalibata. Tersedia angkutan dari berbagai arah: Dari Blok M, naik Kopaja 57, Dari Cililitan kopaja 57/ Metrimini 64, dari Kampung melayu dan Pasar Minggu naik M16, dari Manggarai naik Metromini 62. Jangan lupa ajak keluarga, sekalian makan bersama di hari Minggu.<br />\r\n', '', 'Minggu', '2012-08-19', '01:54:07', '15pasar_tiban_kalibata.jpg', 28, 'wisata', 'Y'),
(627, 40, 'admin', 'Nikmatnya Bubur Ayam Cikini', '', '', 'nikmatnya-bubur-ayam-cikini', 'N', 'N', 'N', 'Jakarta - Jika Anda pecinta kuliner Bubur, pasti sudah mengenal Bubur Cikini H. Sulaiman. Bubur yang satu ini memang terbilang populer di Jakarta. Kabarnya bubur ini didirikan sejak tahun 1980-an. Bisa bertahan sampai sekarang tentu merupakan jaminan tersendiri. Kualitas rasa adalah modal utama sebuah usaha kuliner selalu diterima konsumen. Bubur Cikini H. Sulaiman memiliki hal tersebut.<br />\r\n<br />\r\nDahulu Bubur Cikini H. Sulaiman bisa dijumpai di tenda kaki lima. Jam operasional juga dimulai sekitar jam 6 sore hari. Namun kini Bubur Cikini H. Sulaiman telah memiliki tempat permanen yang lebih nyaman. Jam operasional juga berubah. Kini Bubur Cikini juga bisa dinikmati di pagi hari. Bagi yang suka menu bubur untuk sarapan, jangan sampai melewatkan Bubur Cikini.<br />\r\n<br />\r\nSoal menu, Bubur Cikini H. Sulaiman tentu menyajikan menu bubur sebagai sajian utama. Menu yang bisa dicicipi antara lain Bubur Ayam Biasa, Bubur Ayam Telur, Nasi Goreng Ayam, Nasi Goreng Otokwok, Mie Goreng/Rebus, Telur Goreng, Empal Gentong Nasi/Lontong, Ati Ampela, aneka minuman dan masih banyak lagi lainnya. Jika Ingin menikmati empal Gentong Nasi/Lontong harus datang di hari Sabtu atau Minggu sebab menu tersebut tidak tersedia setiap harinya.<br />\r\n<br />\r\nSoal harga memang fluktuatif. Bisa berubah kapanpun. Tetapi sebagai deskripsi harga, seporsi Bubur Ayam Biasa bisa dinikmati dengan harga Rp.13.000 per porsi, menu Bubur Telur juga di harga yang sama. Untuk Nasi Goreng Ayam bisa dinikmati dengan membayar Rp.15.000, sedangkan Nasi Goreng Otokwok bisa dinikmati dengan harga Rp,17.000. Bagi yang menyukai menu Empal Gentong Nasi/Lontong bisa dicicipi dengan membayar Rp.20.000 per porsi. Cukup murah!\r\n', '', 'Selasa', '2012-08-21', '13:55:20', '32bubur_ayam_cikini.jpg', 28, 'kuliner', 'Y'),
(628, 40, 'admin', 'Soto Betawi H. Husein sangat enak sekali', '', '', 'soto-betawi-h-husein', 'N', 'N', 'N', 'Indonesia sangat kaya akan khazanah kuliner. Masing-masing wilayah mempunyai makanan yang khas. Meskipun sama jenisnya, namun rasa dan racikannya berbeda.<br />\r\nSama seperti daerah-daerah lain di Indonesia, masyarakat Betawi juga mempunyai makanan khas yaitu soto Betawi. Salah satu yang terkenal adalah soto Betawi Haji Husein yang ada di kawasan Minangkabau, Manggarai, Jakarta Selatan. Di tempat seluas 5 x 10 meter, Bang Husein, 57; panggilan akrabnya, membuka usahanya dari pukul 07.00 WIB hingga dagangannya habis. Usaha ini telah dirintisnya sejak tahun 1989. Sebelum membuka usaha sendiri, ia terlebih dahulu belajar dari pamannya sejak tahun 1970-an.<br />\r\n<br />\r\nSaya sudah mulai ikut usaha sejak Kelas 4 SD. Waktu itu ikut Uwak (panggilan paman-Red) jualan sate, tongseng, sama soto, kata Bang Husein. Bapak empat orang anak ini mengaku memilih soto karena lebih praktis, selain itu ia ingin melestarikan makanan asli Betawi.<br />\r\nYang membedakan soto Betawi Haji Husein dengan soto di daerah lainnya adalah proses pengolahan isi sotonya. Olahan daging sapi yang berupa daging, jeroan, dan kikil terlebih dahulu direbus; baru kemudian digoreng. Yang hampir sama biasanya soto Makassar, cuma biasanya dagingnya direbus saja, nggak digoreng, ujar pria kelahiran Jakarta ini.<br />\r\nDalam sehari Bang Husein biasa menyediakan 50 Kg olahan daging sapi yang terdiri dari daging, jeroan, dan kikil. Mulai pukul 03.00 WIB ia merebus semuanya hingga pukul 06.00 WIB. Menurutnya proses merebus membutuhkan waktu yang cukup lama. Bumbu yang digunakan untuk kuah sotonya hanya terdiri dari rempah-rempah biasa yang banyak dijual di pasar. Bahan-bahan itu kemudian diracik sedemikian rupa sehingga mempunyai rasa yang khas. Kuah soto Betawi umumnya kental karena menggunakan santan. Dalam sehari ia bisa menghabiskan berpuluh butir kelapa tua untuk diolah menjadi santan.<br />\r\n<br />\r\nSetiap hari warungnya selalu ramai dikunjungi orang. Biasanya mereka datang pada saat jam istirahat makan siang. Penikmat soto Haji Husein berasal dari berbagai kalangan. Mulai dari yang berkantong tipis sampai yang berkantong tebal. Demikian lakunya, tidak jarang pelanggannya harus antre menunggu pelanggan lain yang sedang makan.<br />\r\nTempatnya yang terletak persis di pinggir jalan terkadang tidak muat menampung sepeda motor dan mobil yang dikendarai para pelanggannya. Tak jarang pula orang-orang kantoran datang jauh-jauh hanya untuk merasakan kenikmatan sotonya.<br />\r\n<br />\r\nMelihat banyaknya pengunjung yang datang, bisa dipastikan rasanya pastilah menggugah selera. Dalam sehari Bang Husein mengaku bisa menghabiskan lebih kurang 100 porsi. Untuk satu porsinya ia hargai Rp16.000, itu sudah termasuk nasi. Omzet per-bulannya bisa mencapai lebih kurang Rp20 juta. Ke-12 orang karyawan kini membantunya melayani pelanggan setiap hari. Waktu awal buka mah cuma berdua. Sekarang pegawainya nggak pernah berubah, ungkapnya. Di antara karyawannya ada dua anak lelakinya yang ikut membantu.<br />\r\nUsaha ini merupakan usaha keluarga turun-temurun. Bang Husein merupakan generasi keempat. Sebelum di tempatnya saat ini ia sempat merasakan berjualan keliling menggunakan pikulan.<br />\r\n<br />\r\nUang Rp400.000 menjadi modal awal usahanya. Dulu uang segitu besar, bisa buat beli semua, katanya. Usaha ini dijalaninya mulai dari bawah sekali. Bahan-bahan sotonya didapatkan dengan cara mengutang. Ia juga harus membayar sewa tempat.<br />\r\nSaat ini dengan omzet besar ia tidak perlu lagi mengutang. Bahkan sejak tahun 2000 tempatnyapun sudah menjadi milik pribadi. Asal ada kemauan, semua pasti bisa. Yang penting jangan pernah bosan kalau usaha, ujarnya. Untuk mempertahankan cita-rasa agar tidak berubah, Bang Husein selalu memerhatikan takaran komposisinya. Hal inilah yang menjadi salah satu daya tarik pengunjung untuk kembali karena rasa tidak berubah-ubah.<br />\r\n<br />\r\nMeski sudah menjadi pemilik, kakek dua orang cucu ini masih melayani sendiri para pelanggannya. Ia tidak canggung berbaur dengan karyawan lainnya. Ini juga menjadi salah satu trik untuk menarik pelanggannya. Terkadang para pelanggan yang seumurnya apabila dilayani olehnya akan merasa senang. Menurut mereka liat muka kita aja udah enak, makanan nomer dua, katanya sambil tertawa. Pertemuan seperti ini seperti sebuah nostalgia baginya.<br />\r\nSemua jerih payahnya telah membuahkan hasil yang cukup membanggakan baginya. Dari hasilnya berjualan ia sudah bisa pergi haji dan membiayai anak-anaknya sekolah. Ia juga sudah memberangkatkan dua karyawannya untuk menunaikan ibadah haji. Soto Betawi Bang Husein buka dari Senin sampai Minggu. Khusus hari Jumat ia sengaja tidak membuka warungnya untuk ibadah sholat Jumat. Pada bulan Ramadhan ia juga menutup usahanya sebulan penuh.<br />\r\n<br />\r\nInilah Bang Husein, usahanya dijalani secara seimbang dengan ibadah. Ia juga tidak sungkan membagi rahasia dapurnya. Rezeki mah ada aja, udah ada yang ngatur. Selain usaha juga jangan lupa berdoa, ujarnya.\r\n', '', 'Selasa', '2012-08-21', '14:35:48', '16Soto-Betawi.jpg', 23, 'kuliner', 'Y'),
(629, 31, 'admin', 'Cokelat Hitam Turunkan Tekanan Darah', '', '', 'cokelat-hitam-turunkan-tekanan-darah', 'N', 'N', 'N', 'Cokelat hitam sudah lama diketahui manfaatnya bagi kesehatan. Hasil analisa terhadap 20 studi menunjukkan, konsumsi cokelat hitam setiap hari akan menurunkan tekanan darah.<br />\r\n<br />\r\nPenelitian yang dilakukan The Cochrane Group melaporkan, zat aktif dalam cokelat bermanfaat untuk membuat pembuluh darah lebih rileks. Akibatnya, tekanan darah pun turun.<br />\r\n<br />\r\nZat aktif yang punya efek positif tersebut adalah flavonol, yang di dalam tubuh akan menghasilkan zat kimia oksida nitrat dan membuat pembuluh darah lemas sehingga darah lebih lancar bersirkulasi.<br />\r\n<br />\r\nAnalisis yang dibuat tersebut mengombinasikan beberapa penelitian sebelumnya untuk mengetahui ada tidaknya efek cokelat bagi tekanan darah. Cokelat hitam yang dikonsumsi partisipan dalam penelitian itu cukup banyak, antara 3 gram sampai 105 gram setiap hari.<br />\r\n<br />\r\nNamun penurunan tekanan darah yang dihasilkan tidak terlalu besar, hanya 2-3 mmHg. Akan tetapi penelitian hanya dilakukan selama dua minggu sehingga tidak diketahui dampaknya dalam jangka panjang.<br />\r\n<br />\r\n&quot;Meski kami belum mendapat bukti adanya efek jangka panjang penurunan tekanan darah, tetapi penurunan sedikit dalam jangka pendek ini mungkin dalam jangka panjang bisa berkontribusi pada penurunan risiko penyakit jantung,&quot; kata Karin Ried, dari National Institute of Integrative Medicine di Melbourne, Australia.<br />\r\n<br />\r\nTekanan darah tinggi cukup banyak diderita dan diperkirakan menjadi penyebab terbanyak stroke dan penyakit jantung.<br />\r\n<br />\r\nBila Anda ingin mendapatkan manfaat dari cokelat hitam, sebaiknya pastikan produk yang dibeli mengandung cokelat dalam jumlah tinggi karena kebanyakan produk di pasaran lebih banyak kandungan gula dan lemaknya.<br />\r\n<br />\r\nSelain cokelat, kacang, aprikot, blackberries, dan apel juga mengandung flavonol meski kadarnya lebih rendah daripada cokelat.\r\n', '', 'Selasa', '2012-08-21', '14:48:52', '78chocolate-negro-corazon.jpg', 27, 'kesehatan', 'Y'),
(630, 19, 'admin', 'Bos Yahoo Bajak 2 Karyawan Google', '', '', 'bos-yahoo-bajak-2-karyawan-google', 'N', 'N', 'N', 'Marissa Mayer, sang CEO Yahoo kembali memperkuat &#39;pasukannya&#39;. Pernah \r\nbernaung di bawah bendera Google, Mayer pun membajak dua karyawan dari \r\nkantor terdahulunya tersebut.<br />\r\n<br />\r\nWanita yang diangkat menjadi CEO perusahaan internet pada bulan Juli lalu ini telah mempekerjakan mantan<em> Product Marketing Manager</em> Google yang bernama Andrew Schulte. Ia kini menjadi kepala staff di tubuh Yahoo.<br />\r\n<br />\r\nSchulte\r\nbergabung dengan Google pada tahun 2007. Ia sempat menangani kampanye \r\nmarketing Google+. Penegasan kepindahan dirinya ia tuliskan di akun \r\nTwitter maupun profil LinkedInnya.<br />\r\n<br />\r\nSebelum Schulte, Mayer sudah membajak Anne Espiritu di mana duluanya bekerja sebagai<em> consumer technology PR </em>di Google, demikian dikutip dari <em>Cnet</em>, Senin (20/8/2012).<br />\r\n<br />\r\nMayer memang tengah sibuk menata struktur manajemen Yahoo. Perusahaan ini kabarnya juga tengah berburu <em>Chief Operating Officer </em>(COO) dengan pengalaman di bidang manajemen finansial dan restrukturisasi perusahaan.\r\n', '', 'Selasa', '2012-08-21', '14:58:08', '82yahoodlm.jpg', 21, 'teknologi', 'Y'),
(631, 19, 'admin', 'Perusahaan Besar Sharp Tak Lagi Produksi TV?', '', '', 'perusahaan-besar-sharp-tak-lagi-produksi-tv', 'N', 'N', 'N', '<p>Tokyo - Sharp kabarnya mempertimbangkan untuk lebih fokus memproduksi panel LCD (liquid crsytal display) sehingga perlu menjual sejumlah unit bisnisnya. Perusahaan asal Jepang ini berencana untuk tak lagi merakit TV.<br /> <br /> Sharp seperti dilaporkan surat kabar setempat Nikkei, disebut-sebut akan melepas unit bisnis mesin fotokopi dan pendingin ruangan (AC) agar lebih fokus dalam persaingan pasar LCD.<br /> <br /> Namun seperti dilansir Reuters dan dikutip detikINET, Sabtu (18/8/2012), Sharp melalui juru bicaranya menolak laporan tersebut. "Kami mempelajari berbagai pengukuran, namun tidak ada fakta yang mendukung laporan surat kabar Nikke mengenai kemungkinan penjualan operasional utama Sharp," ujar juru bicara tersebut.<br /> <br /> Performa perusahaan elektronik ini memang tidak menggembirakan awal bulan ini, dengan harga saham yang merosot pada titik terendahnya dalam 40 tahun terakhir.<br /> <br /> Nikkei menyebutkan, sebagai bagian dari upaya pemulihan, Sharp juga akan melakukan spinoff pabriknya di pusat Jepang, yang membuat panel LCD untuk smartphone dan tablet, termasuk untuk komponen iPhone dan iPad Apple.<br /> <br /> "Sharp mungkin saja menerima suntikan investasi dari pabrikan lain dan menjalankan operasional pabrik bersama-sama, seperti yang dilakukan Hon Hai roPrecision asal Taiwan di pabrik Sakai yang berlokasi di prefecture Osaka," tulis Nikkei.<br /> <br /> Saham Sharp turun 1,14% menjadi 173 yen pada penutupan perdagangan Jumat.</p>', '', 'Selasa', '2012-08-21', '15:01:36', '68sharptv.jpg', 28, 'teknologi', 'Y'),
(632, 19, 'admin', 'Kemungkinan Kodak Batal Jual Paten', '', '', 'kemungkinan-kodak-batal-jual-paten', 'N', 'N', 'N', 'New York - Kodak berencana menjual sebagian dari paten-patennya guna melindungi perusahaannya dari kebangkrutan. Namun belakangan, sang pionir di dunia fotografi ini menimbang ulang rencana tersebut.<br />\r\n<br />\r\nDilaporkan bahwa Kodak bisa jadi hanya menjual sebagian paten digital imaging yang hendak dilepas, atau malah tidak menjualnya satupun, demikian seperti dikutip detikINET dari AllThingsD, Senin (20/8/2012).<br />\r\n<br />\r\nKabar ini menyusul pemberitaan sebelumnya yang mengatakan bahwa Kodak telah menunda pengumuman hasil penjualan patennya. &quot;Kodak belum mencapai kepastian atau persetujuan untuk menjual portofolio paten digital imagingnya, &quot;ujar Kodak dalam sebuah pernyataan.<br />\r\n<br />\r\nSuara resmi tersebut menyugestikan bahwa lelang paten yang sudah berjalan tidak berjalan sesuai harapan perusahaan yang berbasis di Rochester, New York, Amerika Serikat ini.<br />\r\n<br />\r\nSebuah sumber yang mengetahui hal itu mengatakan bahwa tawaran yang datang untuk portofolio ini hanya berada di bawah angka USD 2 miliar.<br />\r\n<br />\r\nSebelumnya, Wall Street Journal pernah melaporkan bahwa tawaran awal datang dari dua konsorsium, di mana dipimpin oleh perusahaan raksasa, Google dan Apple.<br />\r\n<br />\r\nSeperti diketahui, Kodak berjuang keras menyelematkan &#39;nyawa&#39; perusahaan. Selain menjual sebagian dari 1.100 patennya, Kodak juga telah keluar dari bisnis kamera dan beralih ke digital printing serta penciptaan aplikasi-aplikasi baru di bidang tersebut.\r\n', '', 'Selasa', '2012-08-21', '15:07:45', '74kodakdlm.jpg', 23, 'teknologi', 'Y'),
(633, 31, 'admin', 'Apakah dia mengalami Depresi? Cek Bicaranya', '', '', 'apakah-dia-mengalami-depresi-cek-bicaranya', 'N', 'N', 'N', '<p>Jakarta, Beberapa orang pandai menyembunyikan perasaan, dari luar tampak baik-baik saja meski hatinya menangis tercabik-cabik. Para ilmuwan baru-baru ini berhasil menentukan dengan tepat tingkat keparahan depresi berdasarkan cara berbicara.<br /> <br /> Dalam penelitian yang diklaim sebagai yang terbesar di dunia tersebut, para ilmuwan menemukan bahwa cara berbicara susah dipalsukan ketika seseorang sedang depresi. Perubahan cara bicara itu bisa dipakai untuk mengukur tingkat keparahan depresi yang dialami.<br /> <br /> Adam Vogel, kepala Speech Neuroscience Unit di University of Melbourne mengatakan bahwa cara berbicara adalah penanda kesehatan otak yang sangat kuat. Berbagai perubahan yang terjadi pada cara berbicara bisa menunjukkan seberapa bagus otak bekerja.<br /> <br /> "Cara berbicara orang yang sedang depresi berubah dan dipengaruhi oleh terapi yang diberikan, menjadi lebih cepat dengan jeda yang lebih pendek," kata Vogel dalam laporannya di jurnal Biological Psychiatry seperti dikutip dari Medindia, Selasa (21/8/2012).<br /> <br /> Dalam penelitian tersebut, Vogel melakukan pengamatan terhadap 105 pasien yang sedang menjalani terapi untuk menyembuhkan depresi. Beberapa hal yang diamati antara lain waktu, nada dan intonasi bicara yang kemudian dibandingkan dengan hasil pemeriksaan psikologis.<br /> <br /> Para pasien diminta melakukan panggilan telepon ke sebuah mesin penjawab otomatis. Ada yang diminta berbicara apa saja, mengungkapkan perasaan dan sebagian hanya diminta untuk membaca teks supaya tidak perlu repot-reopot memikirkan mau bicara tentang apa.<br /> <br /> "Temuan ini memungkinkan para psikolog jadi lebih fleksibel dalam memeriksa pasien dari jarak jauh, hanya dengan mendengarkan pola dan cara berbicara meski dari lokasi yang sangat jauh atau di kampung-kampung," kata James Mundt dari Centre for Psychological Consultation di Wisconsin.</p>', '', 'Selasa', '2012-08-21', '15:13:07', '8akitmentalts.jpg', 24, 'kesehatan', 'Y'),
(634, 31, 'admin', 'Makanan Penyumbang KegemukaN', '', '', 'makanan-penyumbang-kegemukan', 'N', 'N', 'N', '<p>Jakarta - Salah satu faktor yang banyak bikin orang jadi gemuk adalah mengonsumsi makanan yang berlebihan dan salah. Untuk itu ketahui makanan apa saja yang ditemui sehari-hari dan bisa bikin gemuk.<br /> <br /> "Yang paling banyak bikin gemuk adalah makanan dengan kandungan gula murni dan tepung," ujar dr Pauline Endang, SpGK dari FKUI, Rabu (15/8/2012).<br /> <br /> dr Pauline menjelaskan banyak orang yang kadang tidak suka nasi tapi ia suka mengemil. Namun sayangnya cemilan ini makanan yang manis dengan kadar gula tinggi, kadang ada telur dan menteganya sehingga kalori tinggi.<br /> <br /> "Makanan-makanan ini tidak bikin kenyang, jadi orang yang mengonsumsi bawaannya ia ingin makan terus apalagi jika ditambah dengan makan gorengan yang kandungan lemaknya tinggi," ungkapnya.<br /> <br /> Hal senada juga diungkapkan oleh ahli gizi dr Inge Permadhi, MS, SpGK bahwa makanan tinggi kalori, tinggi gula dan tinggi lemak bisa menyebabkan seseorang mengalami kegemukan.<br /> <br /> "Misalnya makanan berminyak, daging yang ada gajih, mentega, margarin, makanan-makanan ini rasanya enak dan gurih sehingga bikin orang ketagihan," ujar dr Inge dari Departemen Ilmu Gizi FKUI.<br /> <br /> Berikut ini beberapa makanan yang diketahui bisa menyumbang kegemukan yaitu:<br /> <br /> 1. Gorengan, mengandung banyak lemak dan juga kolesterol<br /> 2. Martabak, mengandung tinggi gula dan lemak<br /> 3. Cake, mengandung tinggi gula dan lemak<br /> 4. Minuman manis, mengandung tinggi gula dan kalori<br /> 5. Minuman soda, menyebabkan timbunan lemak visceral di perut<br /> 6. Kerupuk, mengandung karbohidrat dan kadar lemak yang tinggi<br /> 7. Es krim,mengandung tinggi gula dan lemak<br /> 8. Daging yang masih ada gajihnya<br /> 9. Fast food atau makanan cepat saji, kandungan lemak dan kalorinya tinggi tapi cenderung minim nutrisi<br /> 10. Keripik, kandungan lemak dan gula dari keripik ini membuat jumlah kalorinya tinggi serta ditambah dengan tinggi garam<br /> 11. Sereal manis, mengandung karbohidrat yang tinggi dan ditambah dengan gula yang bisa memicu penimbunan lemak<br /> 12. Krim-krim penambah minuman (Whipped cream), mengandung kadar lemak yang tinggi<br /> <br /> "Kandungan dari bahan makanan ini bila asupannya melebihi kebutuhan tubuh maka akan diubah dan disimpan di dalam sel lemak dan tentu saja membuat seseorang jadi gemuk," ujar Dr Marini Siregar, MGizi, SpGK dari RS Premier Jatinegara.<br /> <br /> Dr Marini menyarankan agar tidak menjadi gemuk yang terpenting adalah keseimbangan antara apa yang dimakan dengan aktivitas fisik yang dilakukan. Jika termasuk orang yang aktivitas fisiknya rendah, asupan makanannya harus disesuaikan tidak boleh terlalu banyak.<br /> <br /> "Jangan lupa mengonsumsi air yang cukup agar metabolisme dalam tubuh berjalan dengan baik, serta sayuran dan buah yang mengandung serat tinggi akan membuat kita merasa lebih kenyang sehingga mengurangi asupan makanan yang lain dan tidak akan terjadi kegemukan," ujar Dr Marini.</p>', '', 'Selasa', '2012-08-21', '15:23:01', '41gorengants2.jpg', 26, 'kesehatan', 'Y'),
(635, 39, 'admin', 'Foto Bugil Pangeran Harry Beredar', '', '', 'foto-bugil-pangeran-harry-beredar', 'N', 'N', 'N', 'Las Vegas - Pangeran Harry dari Inggris kembali membuat sensasi. Kali ini TMZ, sebuah situs hiburan Amerika Serikat, merilis foto-foto bugil adik Pangeran William itu, Selasa (21/8/2012).<br />\r\n<br />\r\nMenurut TMZ, foto itu diambil ketika putra kedua Pangeran Charles itu berpesta dengan teman-temannya di kamar hotelnya di Las Vegas, Jumat (18/8/2012).<br />\r\n<br />\r\nMengutip sumbernya, TMZ melaporkan, Harry dan teman-temannya turun ke bar hotel dan bertemu sejumlah perempuan, yang kemudian diundangnya ke kamar suite-nya di hotel itu.<br />\r\n<br />\r\nSuasana pun menjadi liar karena anak-anak muda itu mengadakan permainan biliar. Dalam aturan permainan itu, yang kalah harus melepas pakaian, sampai akhirnya semua peserta bugil.<br />\r\n<br />\r\nBeberapa orang yang hadir di pesta itu memotret kehebohan pesta tersebut. Dalam salah satu foto, tampak Harry dalam keadaan telanjang bulat dengan kedua tangan menutupi alat vitalnya. Sementara itu, foto lainnya menunjukkan Harry memeluk seorang perempuan yang juga terlihat bugil.<br />\r\n<br />\r\nKepada TMZ, Keluarga Kerajaan Inggris mengatakan, &quot;Kami tidak berkomentar tentang foto-foto itu saat ini.&quot; \r\n', '', 'Kamis', '2012-08-23', '01:39:51', '92pangeran_harry.jpg', 31, 'internasional', 'Y'),
(636, 2, 'admin', 'Hukuman Ganda Korea Diperingan, Greysia/Meiliana Tunggu Nasib', 'Buntut Pertandingan "Sabun" di Olimpiade London', '', 'hukuman-ganda-korea-diperingan-greysiameiliana-tunggu-nasib', 'N', 'N', 'N', 'Seoul - Otoritas bulutangkis Korea Selatan, Rabu (22/8) mengurangi hukuman untuk \r\nempat pemain yang diduga sengaja kalah pada pertandingan di Olimpiade \r\nLondon, dari dua tahun menjadi enam bulan setelah terjadi proses \r\nbanding.<br />\r\n&nbsp;&nbsp;&nbsp; &nbsp;<br />\r\nJung Kyung-Eun, Kim Ha-Na, Ha Jung-Eun, dan Kim \r\nMin-Jung dilarang berpartisipasi di kompetisi-kompetisi domestik dan \r\ninternasional selama enam bulan, demikian disampaikan oleh Asosiasi \r\nBulutangkis Korea, Rabu.<br />\r\n&nbsp;&nbsp; &nbsp;<br />\r\nKeempat atlet itu berkata mereka \r\nhanya mengikuti perintah pelatih Sung Han-Kook, dan asisten Kim \r\nMoon-Soo. Sebelumnya, hukuman seumur hidup mereka telah dikurangi \r\nmenjadi dua tahun.<br />\r\n&nbsp;&nbsp; &nbsp;<br />\r\nDelapan pebulutangkis ganda putri, dari \r\nKorea Selatan, Indonesia, dan China didiskualifikasi dari Olimpiade \r\nkarena sengaja mengalah agar dapat mengamankan posisi yang lebih \r\nmenguntungkan di babak berikutnya.<br />\r\n&nbsp;&nbsp; &nbsp;<br />\r\nSkandal ini membuat bintang bulutangkis China, Yu Yang, pensiun dari bulutangkis.<br />\r\n&nbsp;&nbsp; &nbsp;<br />\r\nPresiden\r\nFederasi Bulutangkis Dunia, Kang Young-Joong, telah menepis rumor bahwa\r\npublikasi yang buruk dari olahraga ini dapat membahayakan masa depan \r\nbulutangkis di Olimpiade.<br />\r\n&nbsp;&nbsp; &nbsp;<br />\r\nKorea Selatan mendapat satu medali \r\nperunggu dari cabang olahraga bulutangkis di London - itu merupakan \r\npenampilan terburuk sepanjang partisipasi mereka di Olimpiade.<br />\r\n<br />\r\nSementara\r\ndi Indonesia, PBSI akhirnya memutuskan akan menjatuhkan sanksi kepada \r\ndua pemain ganda putri andalannya, Greysia Polii dan Meiliana Jauhari. \r\nSeperti diketahui, Greysia/Meiliana harus didiskualifkasi dari Olimpiade\r\nLondon 2012 karena diduga sengaja mengalah pada penyisihan grup untuk \r\nmenghindari lawan berat di babak perempat final.<br />\r\n&nbsp;<br />\r\nBadminton World\r\nFederation (BWF) memutuskan Greysia/Meiliana dan lawannya, Ha Jung \r\nEun/Kim Min Jung dari Korea didiskualifikasi dari turnamen paling \r\nbergengsi tersebut. Pasangan terkuat dunia asal China, Wang Xiaoli/Yu \r\nYang dan Kim Ha Na/Jung Kyung Eun dari Korea juga terkena \r\ndiskualifikasi.<br />\r\n<br />\r\n&ldquo;Kami tak mau dipengaruhi oleh keputusan yang \r\ndiambil oleh Korea atau China, karena setiap organisasi memiliki \r\nkebijakan masing-masing. Walaupun demikian, kami menghargai IOC dan BWF \r\nyang telah memutuskan bahwa Greysia/Meiliana bersalah, hal ini tidak \r\nboleh terulang lagi kedepannya. PBSI akan memberikan sanksi, namun belum\r\nbisa diumumkan bentuk sankisnya seperti apa&rdquo; ujar Sekjen PBSI, Yacob \r\nRusdianto di Pelatnas Cipayung, Selasa (21/8) sepersti dikutip situs \r\nPBSI.<br />\r\n&nbsp;<br />\r\nSaat ini PBSI masih dalam proses diskusi mengenai sanksi \r\nyang akan diberikan kepada Greysia/Meiliana dan belum ada keputusan \r\nserta pemberitahuan resmi kepada keduanya. Namun ia mengaku telah \r\nbeberapa kali mengadakan pertemuan kekeluargaan bersama kedua pemain \r\nuntuk membicarakan masalah ini dan kemungkinan-kemungkinan yang akan \r\nterjadi.\r\n', 'Suasana pertandingan memalukan itu.\r\n', 'Kamis', '2012-08-23', '01:47:26', '45bulutangkis_sabun.jpg', 21, 'olahraga', 'Y'),
(637, 2, 'admin', 'Zeelenberg: Lorenzo Akan Bangkit di Brno', 'MotoGP', '', 'zeelenberg-lorenzo-akan-bangkit-di-brno', 'N', 'N', 'N', 'London - Setelah harus bekerja keras merebut posisi kedua di Indianapolis,  \r\nManajer tim Yamaha, Wilco Zeelenberg, yakin pebalap Jorge Lorenzo akan  \r\nbangkit di MotoGP seri Ceko.\r\n<p>\r\nLorenzo diyakini dapat tampil sebagai\r\npemenang untuk menjaga posisi tertinggi di klasemen sementara.         \r\n&quot;Sirkuit Indianapolis menyulitkan kami saat start. Namun, Sirkuit \r\nBrno memiliki lintasan yang halus dan cepat. Saya yakin kami dapat \r\ntampil lebih baik di sana,&quot; kata Zeelenberg, London, Rabu (22/8/2012) di\r\nLondon.\r\n</p>\r\n<p>\r\nLorenzo menang di Brno pada musim 2010 tetapi finis \r\nkeempat di musim 2011. Lorenzo akan berusaha merebut kemenangan keenam \r\npada musim ini di Brno.\r\n</p>\r\nKemenangan ini penting bagi Lorenzo untuk \r\nmemastikan langkahnya menjadi juara dunia di musim ini. Jika sampai \r\nkalah dari Dani Pedrosa, gelar juara dunia harus ditentukan sampai lomba\r\ndi akhir musim\r\n', 'Pebalap Yamaha, Jorge Lorenzo, dengan motor Jupiter Z1 di paddock Yamaha. \r\n', 'Kamis', '2012-08-23', '01:52:27', '48JorgeLorenzo.jpg', 18, 'olahraga', 'Y'),
(703, 76, 'admin', 'RRQ Juara M6', 'Sanz adalah kunci permainan ONIC', 'http://youtube/rrq', 'rrq-juara-m6', 'Y', 'Y', 'Y', '<p><strong>MIMPI WOI</strong></p>', 'thanks', 'Friday', '2024-08-30', '03:05:24', 'Screenshot (9).png', 1, 'hiburan', 'Y'),
(704, 76, 'admin', 'RRQ Juara dan ONIC runner up', 'Sanz adalah kunci permainan ONIC', 'http://youtube/rrq', 'rrq-juara-dan-onic-runner-up', 'Y', 'Y', 'Y', '<p><strong>CHAMPIONSS</strong></p>', 'thanks', 'Friday', '2024-08-30', '03:02:36', 'Screenshot (10).png', 1, 'hiburan,olahraga,internasional', 'Y'),
(639, 23, 'admin', 'Hilman Hariwijaya dan Eko Patrio akan Re-cycle Film "Lupus"', '', '', 'hilman-hariwijaya-dan-eko-patrio-akan-recycle-film-lupus', 'N', 'N', 'N', 'Jakarta - Kabar gembira bagi Anda pecinta novel maupun serial Lupus. Pasalnya, tokoh fiksi rekaan Hilman Wijaya ini akan segera diangkat ke layar lebar oleh rumah produksi eKomando Production.<br />\r\n<br />\r\n&quot;Nanti mau produksi film Lupus, kita re-cycle. Kita mudain lagi,&quot; ujar Eko, pemilik eKomando Production, saat ditemui di kawasan dr Saharjo, Jakarta, Kamis (16/8/2012).<br />\r\n<br />\r\nFilm Lupus diangkat kembali ke layar lebar bukan tanpa alasan. Menurut Eko, tokoh Lupus merupakan anak muda yang konyol tetapi inspiratif. Setiap seri Lupus selalu mengangkat unsur persahabatan. Tak ada nuansa politis atau hal lainnya.<br />\r\n<br />\r\n&quot;Di Lupus ada persahabatan yang abadi, bahu-membahu. Tidak pernah berkaitan dengan masalah politik dan sebagainya. Di sini pure banget yang diangkat pertemanan,&quot; tambah Eko.<br />\r\n<br />\r\nSaat ini skenario sudah rampung dibuat oleh penulisnya, Hilman Hariwijaya. Meski demikian, tokoh Lupus hingga saat ini belum ditentukan. Rencananya, Lupus mulai tayang di bioskop pada Februari 2013, bertepatan dengan Hari Valentine.\r\n', '', 'Kamis', '2012-08-23', '02:21:00', '40film_lupus.jpg', 14, 'film,hiburan', 'Y'),
(640, 23, 'admin', 'Marvel Umumkan Jadwal Rilis "The Avengers 2"', '', '', 'marvel-umumkan-jadwal-rilis-the-avengers-2', 'N', 'N', 'N', 'Los Angeles - The Avengers is back. Setelah memastikan Joss Whedon bakal kembali berada di balik layar, Marvel juga mengumumkan jadwal penayangan perdana The Avengers 2.<br />\r\n<br />\r\nRencanannya, film kumpulan para superhero ini akan dirilis pada tanggal 1 Mei 2015 mendatang setelah mereka menanyangkan film-film terkaitnya seperti Iron 3, Captain America 2 dan Thor 2.<br />\r\n<br />\r\nMeski belum memiliki judul, Marvel dan Disney sudah siap untuk kembali memproduksi film terlaris ketiga box office sepanjang masa. &quot;Walt Disney telah mengumumkan tanggal perilisan sekuel dari film blockbuster superhero terbesar dan film terlaris ketiga sepanjang masa, The Avengers,&quot; tulisnya dalam rilis yang dilansir Digital Spy.<br />\r\n<br />\r\n&quot;Josh Whedon akan kembali menulis naskah dan menyutradarai sekuel Avengers ini dan akan dirilis pada 1 Mei 2015,&quot; tambah Marvel.<br />\r\n<br />\r\nMenyusul pengumuman tersebut, bisa dipastikan bahwa para bintang The Avengers seperti Robert Downey Jr, Chris Hemsworth dan Chris Evens akan kembali tampil untuk memeriahkan film tersebut.\r\n', 'The Avengers\r\n', 'Kamis', '2012-08-23', '02:33:21', '88the_avenger.jpg', 44, 'film,hiburan', 'Y'),
(641, 23, 'admin', 'Film Dirilis, Dewi Lestari Deg-degan Menunggu Pemutarannya', '', 'http://www.youtube.com/embed/QgDWRe1TNRg', 'film-dirilis-dewi-lestari-degdegan-menunggu-pemutarannya', 'N', 'N', 'N', '<p>Jakarta -&nbsp; Penulis novel laris "Perahu Kertas", Dewi Lestari, mengaku tegang menjelang penayangan perdana film Perahu Kertas di bioskop hari ini. "Sangat deg-degan," kata penulis dengan nama pena Dee itu usai jumpa pembaca novel Perahu Kertas di Gramedia Matraman, Jakarta, Kamis. Film yang diangkat dari novel setebal 456 halaman itu sudah tayang khusus untuk media dan undangan Rabu (8/8/2012) lalu. <br /> <br /> "Kalau yang kemarin kan baru wartawan dan undangan, tetapi kalau sekarang yang dihadapi real judgment (penilaian nyata), sekarang penonton yang menilai. Lama film tayang di bioskop kan ditentukan dari penonton," kata Dee.<br /> <br /> Film&nbsp; Perahu Kertas disutradarai oleh Hanung Bramantyo. Artis muda Maudy Ayunda dan Adipati Dolken yang pernah beradu akting di film&nbsp; Malaikat Tanpa Sayap menjadi pemeran utama film tersebut.<br /> <br /> Meskipun ada beberapa adegan film yang berbeda dengan kisah dalam novel namun Dee mengatakan hampir 80 persen jalan cerita film Perahu Kertas&nbsp; sama dengan novel.<br /> <br /> "Kalau ada yang protes itu risiko ya, pasti ada dan buat saya itu wajar. Komparasi pasti terjadi. Tetapi sebagai film, Perahu Kertas solid," kata ibu dua anak itu.</p>', '', 'Kamis', '2012-08-23', '02:40:30', '65dee.jpg', 36, 'film,hiburan', 'Y'),
(642, 39, 'admin', 'Israel, Tumor yang Harus Dihancurkan dari Muka Bumi', '', '', 'israel-tumor-yang-harus-dihancurkan-dari-muka-bumi', 'Y', 'N', 'N', '<p>Teheran - Israel adalah "tumor kanker" yang akan segera dihancurkan, kata Presiden Iran, Mahmoud Ahmadinejad, Jumat (17/8/2012), kepada para demonstran yang melakukan protes tahunan terhadap eksistensi negara Yahudi itu.<br /> <br /> "Rezim Zionis dan warga Zionis adalah satu tumor kanker. Kendatipun satu sel dari mereka dikeluarkan dalam satu inci tanah (Palestina), pada masa depan sejarah ini (bagi eksistensi Israel) akan terulang kembali," katanya dalam satu pidato di Teheran untuk memperingati Hari Quds Iran yang disiarkan langsung televisi negara itu.<br /> <br /> "Negara-negara dari kawasan ini akan segera mengusir kaum Zionis perampas tanah Palestina.... Sebuah Timur Tengah baru pasti dibentuk. Dengan bantuan Allah dan negara-negara kawasan ini, Timur Tengah baru tidak akan ditemukan lagi orang-orang Amerika dan Zionis," katanya.<br /> <br /> Peringatan itu dilakukan pada saat ketegangan meningkat antara Israel dan Iran menyangkut program nuklir Iran yang disengketakan itu.<br /> <br /> Israel pekan-pekan belakangan ini meningkatkan ancaman-ancamannya untuk menghancurkan fasilitas-fasilitas nuklir Iran guna mencegah Teheran mampu memproduksi senjata-senjata atom. Iran yang terkena sanksi-sanksi Barat membantah tuduhan itu dan menegaskan bahwa program nuklirnya hanya untuk tujuan damai. Militernya memperingatkan akan menghancurkan Israel jika diserang.<br /> <br /> Televisi Pemerintah Iran menunjukkan, massa berpawai di bawah sinar matahari yang menyengat di Teheran dan kota-kota lain negara itu untuk memperingati Hari Quds (Jerusalem) yang bertujuan membebaskan kota Jerusalem, yanga akan dijadikan ibu kota negara Palestina masa depan (Israel juga bersikeras untuk menjadikan Jerusalem sebagai ibu kotanya).<br /> <br /> Para pengunjuk rasa membawa bendera-bendera Palestina dan foro-foto pemimpin tertinggi Iran, Ayatollah Ali Khamenei, dan spanduk bertuliskan "Ganyang Israel" dan "Ganyang Amerika". Satu kelompok orang di Teheran terlihat membakar satu bendera Israel.<br /> <br /> Unjuk rasa itu telah menjadi kegiatan tahunan selama Ramadhan di Iran sejak Revolusi Islam tahun 1979. Para pengunjuk rasa menegaskan antipati Iran terhadap Israel dan sekutunya Amerika Serikat serta mendukung perjuangan rakyat Palestina, yang Khamenei sebut "satu tugas agama."<br /> <br /> Pemimpin tertinggi itu, Rabu, menyebut Israel sebagai "hasil pertumbuhan Zionis gadungan dan palsu" di Timur Tengah yang "akan dilenyapkan".<br /> <br /> Pemimpin Pengawal Revolusi yang berpengaruh, Jenderal Mohammed Ali Jafari, mengemukakan kepada kantor berita Fars, ketika menghadiri unjuk rasa di Teheran itu, bahwa "negara Iran sekarang berada di garis depan perlawanan regional anti-Israel dalam menunjukkan kebenciannya pada Israel." Ia menambahkan, Iran tetap mempertahankan sikap tegas itu.<br /> <br /> Ahmadinejad dalam pidatonya menyatakan, Zionis menimbulkan perang dunia pertama dan kedua, dan "menguasai masalah-masalah dunia, sejak saat itu mereka menguasai Pemerintah AS."</p>', '', 'Kamis', '2012-08-23', '02:49:25', '9ahmadinejad.jpg', 86, 'internasional', 'Y'),
(643, 42, 'admin', 'Fatima Nabil, Presenter TV Berjilbab Pertama di Mesir', '', '', 'fatima-nabil-presenter-tv-berjilbab-pertama-di-mesir', 'N', 'N', 'N', '<p>\r\nKairo - Fatima\r\nNabil mencatat sejarah. Ia menjadi presenter pertama yang berjilbab \r\nyang muncul di televisi milik pemerintah Mesir. Dalam balutan jilbab \r\nberwarna krem, dan jas hitam Fatima membacakan buletin berita siang, \r\nMinggu 2 September 2012.&nbsp;\r\n</p>\r\n<p>\r\n&quot;Akhirnya revolusi juga terjadi di \r\ntelevisi milik pemerintah,&quot; kata Nabil. Ia berharap kemunculannya ini \r\ndiikuti tak hanya presenter berita tapi juga presenter cuaca dan \r\nlainnya.\r\n</p>\r\n<p>\r\n&quot;Saat ini, standar bukan tergantung pada \r\njilbab, yang sebenarnya merupakan pilihan pribadi setiap perempuan. Tapi\r\nlebih pada profesionalitas dan intelektual,&quot; ujarnya.\r\n</p>\r\n<p>\r\nSejak televisi pemerintah ini berdiri tahun 1960, dibawah rejim Presiden\r\nHosni Mubarok, perempuan yang mengenakan jilbab dilarang menjadi \r\npresenter. Aturan ini sempat ditentang sejumlah aktivis hak asasi dan \r\nkelompok liberal, namun kandas.\r\n</p>\r\n<p>\r\nPemerintah baru yang \r\ndipimpin Presiden Mohammed Mursi, mencabut aturan ini. Menteri Informasi\r\nBaru Saleh Abdel-Makshoud mengatakan sudah banyak perempuan berjilbab \r\nyang muncul sebagai presenter di channel-channel televisi Arab dan \r\ninternasional. Jadi perubahan ini tak menjadi masalah apalagi saat ini \r\nhampir 70% perempuan Mesir mengenakan jilbab.\r\n</p>\r\n<p>\r\nPetinggi stasiun televisi tersebut mengatakan munculnya Nabila bisa \r\nmembangkitkan semangat perempuan lain yang ingin tetap mempertahankan \r\njilbab mereka tanpa harus takut kehilangan pekerjaan. (Sumber: Tempo.co)\r\n</p>\r\n', 'Fatima Nabil\r\n', 'Kamis', '2012-11-22', '10:07:13', '89fatima.jpg', 23, 'internasional', 'Y'),
(650, 62, 'admin', 'Roy Suryo Menpora, SBY Dipertanyakan', '', '', 'roy-suryo-menpora-sby-dipertanyakan', 'Y', 'N', 'N', '<p>\r\nPengamat politik dari Charta Politika, Yunarto Wijaya mempertanyakan dasar keputusan SBY menunjuk Roy Suryo sebagai Menpora. Apalagi, kata Yunarto, ada pernyataan SBY yang menegaskan Roy cakap untuk mengemban tugas sebagai Menpora.\r\n</p>\r\n<p>\r\nMenurut Yunarto, Roy selama ini lebih dikenal sebagai pakar foto digital dan video serta dosen di sebuah perguruan tinggi negeri. &quot;Namun, belum terdengar kiprahnya di bidang kepemudaan dan olahraga,&quot; kata Yunarto. Sementara, tugas Menpora yang berat dan masa tugasnya relatif singkat idealnya mengutamakan figur yang kompetensinya teruji di bidang kepemudaan dan olahraga.\r\n</p>\r\n<p>\r\nKarena itu, Yunarto menduga penunjukan Roy bukan karena kompetensi, melainkan representasi politik. &quot;Ditunjuknya kader Partai Demokrat Roy Suryo sebagai Menpora menunjukkan faktor politisnya sangat kuat,&quot; katanya. (sumber: republika.co.id)<br />\r\n</p>\r\n', 'Roy Suryo saat dilantik jadi Menpora', 'Jumat', '2013-01-25', '00:01:04', '60roy-suryo.jpg', 98, 'politik', 'Y'),
(651, 62, 'admin', 'Banjir Jakarta, Kerugian Ekonomi Capai Rp 1 Triliun', 'Jakarta Darurat Banjir', 'http://www.youtube.com/embed/RQMbr4DBqXk', 'banjir-jakarta-kerugian-ekonomi-capai-rp-1-triliun', 'N', 'N', 'Y', '<p>\r\nKetua Asosiasi Pengusaha Indonesia Sofjan Wanandi mengatakan, banjir yang melanda Jakarta sepekan ini telah menimbulkan kerugian ekonomi yang cukup tinggi. Biaya bencana yang ditanggung untuk sekadar menyediakan makan&nbsp; bagi para pengungsi pun mencapai Rp 1 miliar lebih. \r\n</p>\r\n<p>\r\nHal itu disampaikan Sofjan, saat ditemui di area bencana banjir di Penjaringan, Jakarta Utara, Minggu (20/1/2013).\r\n</p>\r\n<p>\r\nSofjan menegaskan, tak bergeraknya roda ekonomi di Jakarta akibat bencana banjir menyebabkan kerugian lebih dari Rp 1 triliun. Aktivitas perdagangan menjadi tidak berjalan, dan kawasan Industri Pulogadung juga ikut lumpuh karena tak memperoleh suplai listrik akibat gardu listrik terendam banjir. \r\n</p>\r\n<p>\r\nNegara importir pun, katanya, mulai mempertanyakan kapan Jakarta bisa pulih, karena ini sangat terkait dengan kegiatan ekspor komoditas keluar negeri dari seluruh daerah di Indonesia yang bertumpu di Jakarta.\r\n</p>\r\n<p>\r\n&rdquo;Importir itu mulai bertanya-tanya, kapan banjir di Jakarta bisa surut. Kendati mereka saat ini memahami Jakarta sedang dilanda bencana,&rdquo; kata Sofjan. (sumber: kompas.com)\r\n</p>\r\n', 'Banjir di daerah Pluit', 'Jumat', '2013-01-25', '00:06:15', '44banjir-lagi.jpg', 13, 'ekonomi', 'Y'),
(652, 63, 'admin', 'Hary Tanoe Mundur dari Partai Nasdem', '', '', 'hary-tanoe-mundur-dari-partai-nasdem', 'N', 'Y', 'N', '<p>\r\nKetua Dewan Pakar DPP Partai Nasional Demokrat (Nasdem) Hary Tanoesoedibjo menyatakan mundur dari keanggotaan Partai Nasdem. Hal itu disampaikannya secara resmi dalam jumpa pers, Senin (21/1/2013), di Jakarta.\r\n</p>\r\n<p>\r\n&quot;Saya menyatakan mundur dalam kapasitas saya sebagai Ketua Dewan Pakar. Mulai hari ini, saya bukan lagi anggota dari Partai Nasdem. Keputusan ini saya lakukan dengan berat hati,&quot; kata Hary.\r\n</p>\r\n<p>\r\nIa menyatakan, sejak bergabung dengan Partai Nasdem pada 9 Oktober 2011, Hary merasa telah melakukan upaya terbaik, baik energi, pikiran, dana, maupun risiko, untuk berpartisipasi membesarkan Partai Nasdem. &quot;Target utamanya lolos verifikasi dan lolos sebagai partai peserta pemilu. Saya merupakan bagian yang ikut meloloskan Nasdem,&quot; kata bos MNC Grup ini.\r\n</p>\r\n<p>\r\n&quot;Keputusan saya ini tidak mengenakkan, tapi pada satu titik saya harus memutuskan ini. Aktivitas politik harus tetap dijalankan. Destiny keterlibatan saya di politik adalah menjadi bagian dari perubahan untuk bangsa Indonesia menjadi lebih baik. Saya ingin ikut andil secara nyata, langsung. Karena bagaimanapun politik menjadi satu bagian ideologi dan bagian dari masa depan kita,&quot; papar Hary.\r\n</p>\r\n<p>\r\nPerpecahan di tubuh Nasdem mulai merebak ketika beredar kabar adanya faksi di dalam partai itu. Dikabarkan, Surya Paloh yang akan menjadi ketua umum partai itu berseberangan dengan faksi Hary Tanoe. Beberapa waktu lalu, kelompok Surya Paloh memecat Sekjen Garda Pemuda Nasional Demokrat (GPND), Saiful Haq.\r\n</p>\r\n<p>\r\nTentang alasannya mundur, Hary mengatakan karena ada perbedaan pendapat dengan Ketua Majelis Tinggi Partai Nasdem Surya Paloh (sumber: kompas.com) \r\n</p>\r\n', 'Hary Tanoe saat memberikan keterangan pers', 'Jumat', '2013-01-25', '00:58:26', '90hari-tanoesoedibjo.jpg', 15, 'politik', 'Y'),
(653, 62, 'admin', 'Ketika "Ciyus" Terucap dari Mulut Jokowi', '', '', 'ketika-ciyus-terucap-dari-mulut-jokowi', 'N', 'Y', 'N', '<p>\r\nKata <em>ciyus</em> atau serius sering terdengar diucapkan anak-anak \r\nzaman sekarang yang sering dijuluki anak baru gede (ABG). Nah, ketika \r\nbahasa gaul itu diucapkan oleh Joko Widodo, para pewarta yang bertugas \r\nmeliput kegiatan Gubernur DKI Jakarta itu tak bisa menahan tawa karena \r\nnadanya yang sedikit medok.\r\n</p>\r\n<p>\r\nTerhitung sudah dua kali Jokowi \r\nmelontarkan kata itu kepada wartawan.    Pertama, saat Jumat (18/1/2013)\r\nmalam lalu, ketika Jokowi meninjau perbaikan Tanggul Kanal Banjir Barat\r\n(KBB) di Latuharhary, Jakarta Pusat. Seharian raut muka Jokowi begitu \r\nserius dan tegang karena pengerjaan tanggul yang masih belum selesai, \r\nditambah hujan deras yang terus mengguyur Ibu Kota. Pendek kata, Jokowi \r\ntampak sangat suntuk dan senyum khasnya pun tak terpancar dari dirinya.\r\n</p>\r\n<p>\r\nSaat\r\nitu, Jokowi menghampiri wartawan yang sudah menunggunya di luar rel \r\nkereta api yang terputus. Lantas para wartawan berniat mencairkan \r\nsuasana dengan melontarkan pertanyaan-pertanyaan konyol kepada Jokowi, \r\nseperti &quot;Apabila tanggul selesai, ditandai oleh pemotongan pita di Sency\r\n(Senayan City)?&quot;. Mendengar pertanyaan itu, senyum yang hilang dari \r\nJokowi akhirnya muncul kembali.\r\n</p>\r\n<p>\r\nSeraya mengernyitkan dahinya, \r\nJokowi bertanya, &quot;Apa itu Sency?&quot;   Wartawan pun langsung menjelaskan \r\nkalau Sency itu adalah kependekan dari Senayan City. Mengetahui hal \r\ntersebut, Jokowi pun tertawa dan mengatakan kalau berbicara hendaknya \r\njangan disingkat-singkat. &quot;Oh, <em>kirain </em>saya sensitif itu maksudnya. <em>Mbok</em>, jangan disingkat-singkat, <em>tho</em>,&quot; kata Jokowi.\r\n</p>\r\n<p>\r\nPembicaraan itu pula yang membuat Jokowi melontarkan kata <em>ciyus</em> dan <em>miapah</em> kepada wartawan. &quot;Kalau <em>ciyus miapah </em>itu apa? Ha-ha-ha,&quot; kata Jokowi yang membuat suasana lokasi tersebut yang awalnya tegang menjadi ramai. \r\n</p>\r\n<p>\r\nKata <em>ciyus </em>kembali\r\ndiucapkan Jokowi, Selasa (22/1/2013) kemarin, saat berbincang dengan \r\nwartawan di Balaikota DKI. Bahasa gaul itu keluar kembali setelah ia \r\nditanya terkait kinerjanya 100 hari. \r\n</p>\r\n<p>\r\nSaat itu, Jokowi ditanya \r\nmasalah Jakarta apa yang membuat Jokowi pusing. Jokowi pun menjawab  tak\r\nada persoalan yang membuatnya pusing karena ia telah menghadapi  \r\nmasalah itu sejak ia memimpin Solo selama delapan tahun. Namun, ada satu\r\nmasa Jokowi mengaku tidak memiliki semangat. &quot;Yaitu kalau pas B sama \r\npas T. Apa  itu? Pokoknya pas B sama pas T. <em>Ciyuss</em>,&quot; canda Jokowi yang mengundang  tawa para wartawan. (sumber: kompas.com)\r\n</p>\r\n', '', 'Jumat', '2013-01-25', '01:11:01', '42jokowi.jpg', 21, 'metropolitan', 'Y'),
(654, 61, 'admin', 'Bahaya Mendiagnosis Penyakit Lewat Internet', '', '', 'bahaya-mendiagnosis-penyakit-lewat-internet', 'N', 'Y', 'N', '<p>\r\nApakah Anda mengunjungi &quot;dokter Google&quot; lebih sering dari dokter di \r\nklinik? Anda tidak sendiri. Dalam sebuah survei tahun lalu di Amerika \r\ndiketahui bahwa 35 persen responden mencocokkan gejala penyakitnya di \r\ninternet dan mendiagnosis dirinya sendiri.\r\n</p>\r\n<p>\r\nMasih menurut survei \r\nyang dilakukan The Pew Research Center&#39;s Internet &amp; American Life \r\nProject itu, sekitar 41 responden mengatakan diagnosis sendiri itu \r\nternyata dikonfirmasi kebenarannya oleh dokter. \r\n</p>\r\n<p>\r\nTetapi, sekitar \r\nsatu dari tiga responden mengaku tidak pernah pergi ke dokter untuk \r\nmencari opini kedua. Malahan, 18 persen responden mengatakan bahwa upaya\r\nmendiagnosis sendiri itu ternyata salah ketika ditanyakan ke dokter. \r\n</p>\r\n<p>\r\nMeski\r\nsurvei yang melibatkan 3.000 responden itu sebenarnya dilakukan untuk \r\nmengetahui siapa yang mencari informasi kesehatan secara <em>online</em>, tetapi para profesional medis merasa khawatir dengan tren itu.\r\n</p>\r\n<p>\r\n&quot;Rata-rata\r\ntiap orang mengunjungi empat situs lalu memutuskan ia menderita kanker \r\ndan akan segera meninggal. Padahal, di internet banyak informasi yang \r\nkeliru,&quot; kata Rahul K Khare, dokter unit gawat darurat dari Northwestern\r\nMemorial Hospital.\r\n</p>\r\n<p>\r\nMenurut Khare, ia sering menemukan pasien \r\nyang hidupnya menjadi penuh kecemasan karena mereka merasa menderita \r\npenyakit berat setelah mencocokkan gejala yang dirasakannya dengan \r\ninformasi di internet. (sumber: kompas.com)\r\n</p>\r\n', '', 'Jumat', '2013-01-25', '01:18:13', '60keluarga.jpg', 21, 'kesehatan', 'Y');
INSERT INTO `berita` (`id_berita`, `id_kategori`, `username`, `judul`, `sub_judul`, `youtube`, `judul_seo`, `headline`, `aktif`, `utama`, `isi_berita`, `keterangan_gambar`, `hari`, `tanggal`, `jam`, `gambar`, `dibaca`, `tag`, `status`) VALUES
(655, 63, 'admin', 'Microsoft Update Windows 8.2 Agustus?', '', '', 'microsoft-update-windows-82-pada-agustus', 'N', 'Y', 'Y', '<p><span>Kebocoran mengenai update OS Windows 8 yang kedua datang menghinggapi Microsoft. Windows 8.1 update 2 direncanakan diperbarui pada Agustus mendatang.</span><br /><br /><span>Melalui sebuah gambar yang diklaim otentik berasal dari Rusia, informasi dari dokumen itu hampir sama dengan rumor yang beredar selama ini.</span><br /><br /><span>Sementara itu, update untuk Threshold masih menjadi rumor dan belum diketahui kapan akan dilaksanakan. Microsoft belum mengkonfirmasi apapun terkait gambar bocornya&nbsp;</span><em>update</em><span>&nbsp;windows 8.1 update 2 tersebut seperti dilansir&nbsp;</span><em>Neowin</em><span>, Senin (21/7/2014).</span><br /><br /><span>Belum diketahui seperti apa detail fitur yang dihadirkan pada Windows 8.2. Sementara Windows 9 dikabarkan memiliki tampilan antarmuka Metro baru.</span><br /><br /><span>Selain itu, terdapat menu start baru dan aplikasi Metro dengan tampilan jendela yang disertakan dalam&nbsp;</span><em>update&nbsp;</em><span>tersebut. Konon, Microsoft sedang mempertimbangkan membuat versi gratis dari Windows 9.</span><br /><br /><span>Informasi yang beredar juga menyebutkan bahwa Microsoft sedang bekerja pada Windows Cloud. Menurut WZor, ada tim di Microsoft yang bekerja pada prototype sistem operasi, di mana pengguna bisa mengunduh gratis dan menambahkan fungsionalitas melalui sistem berlangganan.</span></p>', '', 'Senin', '2014-07-21', '21:22:52', '55Windows-8.2.png', 133, 'internasional,teknologi', 'Y'),
(657, 62, 'admin', 'Unjuk Rasa Anti-Yahudi Dikecam Eropa', '', '', 'unjuk-rasa-antiyahudi-dikecam-eropa', 'N', 'Y', 'Y', '<p><strong>PARIS&nbsp;</strong><span>- Demo anti-Yahudi yang menyeruak di dunia mendapat kecaman dari negara besar di Eropa. Kecaman tersebut datang dari Jerman, Prancis dan Italia.</span><br /><br /><span>Melalui menteri luar negerinya, masing-masing negara mengutuk aksi unjuk rasa yang sering berujung dengan kericuhan dan tindak kekerasan.</span><br /><br /><span>"Hasutan, permusuhan, serangan terhadap orang-orang Yahudi tidak memiliki tempat di masyarakat kami,"&nbsp; sebut pernyataan gabungan tiga Menlu tersebut, seperti dikutip dari&nbsp;</span><em>DNA</em><span>, Rabu (23/7/2014).</span><br /><br /><span>Tidak bisa dipungkiri sejak agresi Israel dilancarkan, protes besar terjadi di beberapa negara. Di Prancis, unjuk rasa kelompok Pro-Palestina diakhiri pembakaran di sejumlah objek di depan toko yang dimiliki warga Yahudi.</span><br /><br /><span>Bahkan di negara ini, akibat memanasnya kondisi di Gaza, ketegangan antara kelompok Pro-Palestina dan warga Yahudi di Prancis acap kali terjadi. Prancis sendiri merupakan negara dengan populasi warga Yahudi terbanyak di Eropa.</span><br /><br /><span>Tidak hanya di Prancis, kondisi di Gaza pun jauh lebih buruk. Akibat pertempuran Hamas-Israel jumlah korban, khususnya dari warga sipil Palestina mencapai hampir 600 orang.</span></p>', '', 'Rabu', '2014-07-23', '14:37:32', '32israel_murders.jpg', 32, 'internasional,israel,palestina,yahudi', 'Y'),
(658, 62, 'admin', 'Inggris Bela Serangan Roket Hamas', '', '', 'anggota-parlemen-inggris-bela-serangan-roket-hamas', 'N', 'Y', 'Y', '<p>LONDON - Seorang anggota Parlemen Inggris membela serangan roket yang dilesakkan oleh Hamas ke arah Israel. Namun pembelaannya itu diganjar dengan sanksi indisipliner terhadapnya.</p>\r\n<p>Anggota Parlemen Inggris dari Partai Liberal Demokrat, David Ward, lewat akun Twitter miliknya menulis pernyataan yang membela serangan roket dari Hamas.</p>\r\n<p>"The big question is - if I lived in #Gaza would I fire a rocket? - probably yes. ''Pertanyaan besar saat ini, apabila saya tinggal di #Gaza apakah saya akan menembakkan roket? mungkin saja iya''," tulis Ward dalam akun pribadinya, seperti dikutip The Guardian, Rabu (23/7/2014).</p>\r\n<p>Pihak Partai Liberal Demokrat pun langsung melontarkan kecaman atas tulisan dari Ward. Juru bicara partai mengatakan bahwa pihak partainya akan menerapkan sanksi terhadap Ward.</p>\r\n<p>Sementara pihak Partai Konservatif yang menguasai koalisi pemerintahan bersama Liberal Demokrat menyatakan Ward harus menarik komentarnya.</p>\r\n<p>"Tidak seharusnya seorang anggota parlemen menulis tindakan yang memicu kekerasan. Tindakannya tidak bertanggung jawab," ucap pihak Konservatif.</p>\r\n<p>Ini bukan pertama kalinya Ward mengecam tindakan Israel. Pada Juli 2013 lalu, Ward menyebut pihak Zionis diambang kekalahan dalam perang. Dirinya pun mempertanyakan sampai kapan negara apartheid seperti Israel bisa bertahan.</p>', '', 'Rabu', '2014-07-23', '14:49:50', '75tentara _hamas_palestina.jpg', 34, 'hukum,internasional,israel,palestina,yahudi', 'Y'),
(659, 63, 'admin', 'Target-Target Serangan Israel di Gaza', '', '', 'targettarget-serangan-israel-di-gaza', 'N', 'Y', 'Y', '<p><strong>GAZA</strong><span>&nbsp;- Israel makin gencar melakukan serangan ke Gaza, baik melalui udara maupun darat. Masjid menjadi salah satu target serangan dari Negara Yahudi itu.</span><br /><br /><span>Sekira 15 warga Palestina dilaporkan tewas dan 20 lainnya dalam serangan udara Isarel ke sebuah masjid di Kota Gaza pada Sabtu 19 Juli 2014 lalu. Masjid itu terletak tidak jauh dari rumah milik Komandan Polisi Gaza.</span><br /><br /><span>Rudal-rudal dari Israel menghancurkan sebagian dari bangunan masjid. Alquran yang berada di dalam masjid pun tampak rusak akibat serangan. Demikian diberitakan&nbsp;</span><em>Associated Press</em><span>, Rabu (23/7/2014).</span><br /><br /><span>Selain itu, serangan Israel juga diarahkan ke rumah sakit yang berada di Gaza. Blokade yang dilakukan oleh Israel makin membuat rumah sakit sulit untuk beroperasi.</span><br /><br /><span>Kementerian Kesehatan Gaza menjelaskan, blokade telah memperburuk kualitas hidup warga yang terluka akibat konflik ini. 136 obat yang diperlukan sudah makin menipis dan diperkirakan akan habis dalam waktu beberapa hari ke depan.</span><br /><br /><span>Kantung kekuatan Hamas menjadi target penting yang diincar oleh Israel. Namun serangan terhadap basis kekuatan Hamas tersebut justru lebih sering menimpa warga sipil.</span><br /><br /><span>Hingga saat ini lebih dari 630 warga Palestina dilaporkan tewas dalam serangan yang dilakukan Israel ke Gaza. Sementara 30 warga Israel dilakukan turut tewas dalam pertempuran yang sudah berlangsung sekira 15 hari tersebut.</span></p>', '', 'Rabu', '2014-07-23', '15:01:51', '63tentara-israel.jpg', 16, 'israel,palestina,yahudi', 'Y'),
(660, 61, 'admin', 'Hamas Sebut PM Israel Sama seperti Hitler', '', '', 'hamas-sebut-pm-israel-sama-seperti-hitler', 'N', 'Y', 'Y', '<p><strong>GAZA&nbsp;</strong><span>- Pernyataan keras disampaikan Hamas kepada Israel. Faksi garis keras Palestina ini menyamakan Perdana Menteri (PM) Israel, Benjamin Netanyahu dengan pemimpin Nazi, Adolf Hitler.</span><br /><br /><span>Cercaan Hamas ini disampaikan oleh Juru Bicaranya Osama Hamdan. Menurut Hamdan, pernyataan ini muncul akibat&nbsp; yang dilakukan Israel kepada warga Gaza, sama persis dengan pembantaian warga Yahudi oleh Hitler.</span><br /><br /><span>"PM Israel sudah kehilangan moral dia adalah cerminan dari Hitler dan tentara Nazi," sebut Hamdan, seperti dikutip dari&nbsp;</span><em>Times of Israel</em><span>, Rabu (23/7/2014).</span><br /><br /><span>"Pasukan Israel juga berlaku sama (dengan tentara Nazi) mereka disuruh membunuh warga Palestina jika, ini sama saja dengan yang dilakukan Hitler di abad lalu," tambah dia.</span><br /><br /><span>Pernyataan Hamdan disampaikannya bukan tanpa alasan. Setelah Israel melancarkan agresi ke Gaza, hampir 600 warga Palestina menjadi korban jiwa kekejaman Israel.</span><br /><br /><span>Parahnya lagi, korban jiwa dari Palestina kebanyakan adalah bocah dan perempuan. Hal tersebut bertentangan dengan pernyataan PM Israel yang mengatakan, serangan ke Gaza ditujukan untuk menghancurkan Hamas.</span></p>', '', 'Rabu', '2014-07-23', '15:12:59', '68perdana_mentri_israel_hitler.jpg', 22, 'yahudi', 'Y'),
(661, 61, 'admin', 'Gereja Tampung Pengungsi Muslim Palestina', '', '', 'gereja-tampung-pengungsi-muslim-palestina', 'N', 'Y', 'Y', '<p><strong>GAZA&nbsp;</strong><span>- Agresi Israel di Gaza meninggalkan duka mendalam bagi warga Palestina. Tidak hanya kehilangan nyawa, warga Palestina yang selamat harus tega melihat rumah mereka porak poranda dihancurkan Israel.</span><br /><br /><span>Penduduk Palestina pun saat ini&nbsp; tinggal di tempat-tempat penampungan sementara. Salah satu tempat penampungan yang ada di Gaza adalah sebuah gereja Orthodoks Yunani, Santo Porphyrius.</span><br /><br /><span>Gereja ini menampung hampir 1.000 pengungsi Palestina yang mayoritas bergama Islam. Tidak hanya menyediakan tempat tinggal, Gereja Santo Porphyrius turut memberikan makanan, minuman, selimut, tempat duduk, mainan dan bahkan halaman belakang yang biasa digunakan bocah Palestina bermain sepak bola.</span><br /><br /><span>"Kami membuka gereja untuk menolong warga, ini sudah menjadi tugas gereja dan kami akan membantu mereka sekuat tenaga," sebut salah satu pengurus gereja, Archbishop Alexios, seperti dikutip dari&nbsp;</span><em>Arab News</em><span>, Rabu (23/7/2014).</span><br /><br /><span>"Awalnya ada 600 warga dan sekarang sudah ribuan, kebanyakan dari mereka adalah peremupuan, anak-anak dan orang tua yang kondisinya lemah," tambah dia.</span><br /><br /><span>Gereja Santo Porphyrius memang bukan tempat yang paling aman bagi pengungsi Palestina. Pasalnya, tidak lama setelah para pengungsi berdatangan, roket dari Israel menerjang daerah dekat gereja tersebut.</span><br /><br /><span>Namun hal ini dapat menjadi bukti bagaimana agresi Israel tidak meruntuhkan semangat warga Palestina untuk tetap bersatu dan saling membantu tanpa memandang ras, etnis atau agama.</span><br /><br /><span>Sekedar informasi, warga Kristen Palestina merupakan penduduk minoritas. Jumlah mereka hanya sekitar 1.400 jiwa.&nbsp;</span></p>', '', 'Rabu', '2014-07-23', '15:14:48', '75penduduk_palestina_sembunyi_di_gereja.jpg', 27, 'palestina', 'Y'),
(664, 61, 'admin', 'Jokowi janji mati-matian bela Palestina', '', '', 'jokowi-janji-matimatian-bela-palestina', 'N', 'Y', 'Y', '<p><strong>Merdeka.com -&nbsp;</strong><span>Capres&nbsp;</span><strong><a href="http://profil.merdeka.com/indonesia/j/joko-widodo/">Jokowi</a></strong><span>&nbsp;kembali menegaskan dukungannya untuk kemerdekaan 100 persen bagi Palestina.&nbsp;</span><strong><a href="http://profil.merdeka.com/indonesia/j/joko-widodo/">Jokowi</a></strong><span>&nbsp;berjanji akan mati-matian membela negeri yang dijepit Israel ini.</span><br /><br /><span>"Kita lihat apa yang mereka butuhkan. Mereka butuh tandatangan untuk dukungan ya kita tanda tangan. Mereka butuh diplomasi ya diplomasi. Butuh kedutaan ya kita buka kedutaan," kata&nbsp;</span><strong><a href="http://profil.merdeka.com/indonesia/j/joko-widodo/">Jokowi</a></strong><span>&nbsp;saat bertemu relawan seluruh Jakarta di GOR Yudo, Kelapa Gading, Kamis (26/6).</span><br /><br /><span>"Ini dukungan tanpa reserve," tegas&nbsp;</span><strong><a href="http://profil.merdeka.com/indonesia/j/joko-widodo/">Jokowi</a></strong><span>.</span><br /><br /><span>Sebelumnya&nbsp;</span><strong><a href="http://profil.merdeka.com/indonesia/j/joko-widodo/">Jokowi</a></strong><span>&nbsp;sudah menyatakan dukungannya pada kemerdekaan Palestina.&nbsp;</span><strong><a href="http://profil.merdeka.com/indonesia/j/joko-widodo/">Jokowi</a></strong><span>&nbsp;juga mendukung Palestina menjadi anggota Perserikatan Bangsa-Bangsa (PBB).</span><br /><br /><span>"Saya dan&nbsp;</span><strong><a href="http://profil.merdeka.com/indonesia/m/muhammad-jusuf-kalla/">JK</a></strong><span>&nbsp;mendukung penuh Palestina menjadi negara merdeka dan mendukung penuh Palestina menjadi anggota penuh Dewan Perserikatan Bangsa-Bangsa (PBB)," kata&nbsp;</span><strong><a href="http://profil.merdeka.com/indonesia/j/joko-widodo/">Jokowi</a></strong><span>&nbsp;dalam pemaparan visi misi di debat capres di Hotel Holiday Inn, Kemayoran, Jakarta Pusat, Minggu (22/6).</span></p>\r\n<p><span>Bagaimana lontaran-lantaran Gubernur DKI Jakarta ini soal kebebasan Palestina dari tangan Israel. Tentu akan menarik jika kita menyaksikan secara langsung cara diplomasi yang dilakukan tokoh yang dikenal dengan blusukannya ini. Apakah Jokowi akan blusukan juga ke jalur Gaza? Atau hanya diplomasi wacana yang dilakukan para tokoh politik pada umumnya.</span></p>\r\n<p><span style="color: #c0c0c0;">Sumber :&nbsp;http://www.merdeka.com/peristiwa/jokowi-janji-mati-matian-bela-palestina.html</span></p>', '', 'Kamis', '2014-07-24', '19:23:27', '66menagih-janji-jokowi-soal-bela-palestina-mati-matian.jpg', 86, 'nasional', 'N'),
(665, 61, 'admin', 'Risma Akan Tolak Tawaran Jadi Menteri', '', '', 'jabatan-belum-tuntas-risma-akan-tolak-tawaran-jadi-menteri', 'N', 'Y', 'Y', '<h3>"Saya tidak ingin. Saya masih punya janji, saya di Surabaya saja."</h3>\r\n<p><span>Wali Kota Surabaya Tri Rismaharini mengaku tidak tertarik masuk ke dalam kabinet Joko Widodo-Jusuf Kalla.&nbsp;</span><br /><br /><span>Risma mengatakan masih punya janji pada warga Surabaya. Sehingga dia ingin menuntaskan janjinya memimpin Surabaya hingga berakhir.</span><br /><br /><span>"Tidak, tidak. Saya tidak ingin (masuk kabinet). Saya masih punya janji, saya di Surabaya saja," kata Risma, Kamis 24 Juli 2014.</span><br /><br /><span>Hingga saat ini pun Risma mengaku belum mendapatkan tawaran apa pun untuk masuk dalam kabinet Jokowi-JK. Menurut Risma, selama bertemu dengan pimpinan partai, tak ada perbincangan soal kabinet.</span><br /><br /><span>Namun dia menegaskan kalaupun ada tawaran, dia tetap akan menuntaskan janjinya pada masyarakat Surabaya. "Kalau nanti ada yang&nbsp;</span><em>nawari</em><span>, ya nanti saja," ujarnya.</span><br /><br /><span>Di media sosial Facebook muncul polling nama-nama untuk duduk di kabinet Jokowi-JK. Salah satunya Tri Rismaharini. Wali Kota Surabaya itu ditempatkan sebagai Menteri Pendayagunaan Aparatur Negara dan Reformasi Birokrasi.</span><br /><br /><span>Polling itu diakui Jokowi untuk meminta masukan kepada masyarakat terkait siapa-siapa saja yang tepat untuk mengisi kabinetnya lima tahun ke depan.</span></p>\r\n<p><span>Sumber :&nbsp;http://politik.news.viva.co.id/news/read/524505-jabatan-belum-tuntas--risma-akan-tolak-tawaran-jadi-menteri/</span></p>', '', 'Jumat', '2014-07-25', '13:18:31', '17wali-kota-surabaya-tri-rismaharini.jpg', 40, 'nasional', 'Y'),
(666, 61, 'admin', 'Pentax Q-S1 Kamera Mirorless Style Retro', '', '', 'pentax-qs1-kamera-mirorless-style-retro', 'N', 'Y', 'N', '<p>Q-S1 ini menawarkan ISO sampai 12,800 dengan kecepatan shutter sampai 1/2000 detik , selain itu kamera kompak ini pun menyertakan sensor gyro untuk mengurangi efek getaran atau goyangan. Kamera kompak retro ini pun mampu merekam video FULL HD dengan kecepatan 30fps dan mendukung 8 lensa yang kompatibel dengan Q-mount.</p>\r\n<p>Ada juga fungsi efek digital filter sebanyak 17 buah untuk menghasilkan efek bokeh, plus ada tambahan 21 mode adegan/scene serta mode 11 custom image. Layar LCDnya berukuran 3 inci beresolusi 460K dengan teknologi anti pantulan dan mendukung 170 derajat sudut pandang.</p>\r\n<p>Sayangnya kamera ini masih belum mendukung Wi-Fi yang mulai dibutuhkan untuk kemudahan berbagai foto.</p>\r\n<p>Q-S1 akan tersedia pada awal September 2014 dengan harga sekitar 500 USD untuk body saja dan 637 USD untuk kit dengan lensa 5-15mm.</p>', '', 'Senin', '2014-08-11', '01:01:13', '86pentax-qs1.png', 35, 'teknologi', 'Y'),
(667, 62, 'admin', 'Apple iWatch Bakal Dirilis Bulan Depan', '', '', 'apple-iwatch-bakal-dirilis-bulan-depan', 'N', 'Y', 'N', '<p>iWatch yang sudah lama dinanti-nanti oleh banyak pihak bakal secara resmi diluncurkan. Salah satu orang yang punya reputasi bagus dalam membocorkan informasi produk Apple, John Gruber, menyatakan bahwa iWatch akan direlease bulan depan.</p>\r\n<p>Peryataan seorang publisher asal Philadelphia ini memang dipercaya banyak orang sebagai kebenaran. Pasalnya, Apple akan menggelar event pada 9 September mendatang. Kemungkinan besar, iPhone 6 sekaligus iWatch bakal secara resmi direlease pada saat yang bersamaan saat itu juga. Keihatannya, Apple benar-benar sibuk untuk menyiapkan dua produk ini mengingat persaingann yang semakin berat. Dengan meluncurkan dua produk sekaligus, diharapkan bakal mendobrak pasar dan menciptakan momentum positif.</p>\r\n<p>Smartwatch ini diprediksi akan direlease dengan inovasi yang &ldquo;out of the box&rdquo; cirikhas Apple. iWatch diberitakan bakal menggunakan beberapa sensor yang dapat metrik-metrik kesehatan, seperti tingkat tekanan darah, tingkat denyut jantung atau bahkan tingkat gula darah si pengguna. Meski begitu, masih menjadi pernyataan bagaimana kualitas sistem internet yang ada pada iWatch.</p>', '', 'Senin', '2014-08-11', '01:04:24', '74apple-iwatch.jpg', 21, 'teknologi', 'Y'),
(670, 62, 'admin', '7 Efek Buruk dari Konsumsi Obat Tidur', '', '', '7-efek-buruk-dari-konsumsi-obat-tidur', 'N', 'Y', 'N', '<p>Konsumsi obat tidur kerap dipilih bagi mereka yang mengalami kesulitan tidur atau insomnia. Mereka berpikir bahwa obat tidur mampu memberikan apa yang diinginkan, yaitu tidur dengan lelap. Namun kenyataannya, obat tidur tidak dapat mengobati kondisi tersebut, bahkan hanya memperburuk masalah saja.&nbsp;<br /><br />Di bawah ini beberapa jenis masalah terkait dengan pil tidur dan penggunaan yang terlalu berlebihan, seperti dikutip&nbsp;<em>Health Me Up</em>, Senin (11/8/2014):</p>\r\n<p>1. Efek samping dari obat tidur dapat membuat orang yang meminumnya merasa lupa, merasa pusing, bingung, dan sulit untuk berpikir keesokan harinya.</p>\r\n<p>2. Berlebihan dalam mengonsumsinya, akan memaksa Anda untuk meningkatkan asupannya agar Anda benar-benar tertidur. Sudah jelas, akan menimbulkan efek samping yang lebih besar.</p>\r\n<p>3. Terlalu sering mengonsumsi obat tidur akan membuat Anda ketergantungan yang berkepanjangan. Tidur lelap secara alami, tampaknya hanya mimpi yang jauh dari angan, yang hanya akan membuat Anda mengalami sulit tidur dan kerap merasa cemas.</p>\r\n<p>4. Jika Anda berhenti mengonsumsinya, secara perlahan tubuh akan menggigil, berkeringat, dan mual.</p>\r\n<p>5. Anda harus tahu bahwa obat tidur akan memengaruhi proses dari obat jenis lainnya yang sedang Anda konsumsi. Apakah itu obat pusing, demam, dan lain-lain.</p>\r\n<p>6. Kondisi akan semakin parah, saat Anda menggabungkannya dengan obat penghilang rasa sakit atau obat penenang.</p>\r\n<p>7. Anda harus menyadari bahwa masalah tidur mungkin menjadi pemicu terjadinya beberapa penyakit kesehatan mental, yang mendasari terjadinya gangguan tidur. Dan obat tidak selalu menjadi pilihan yang tepat.</p>', '', 'Senin', '2014-08-11', '09:52:26', '71Obat_Tidur_.jpg', 23, 'kesehatan', 'Y'),
(685, 62, 'admin', 'Paket Wisata ke Seoul Rp 5,2 Juta Siap Memanjakan Liburan Anda', '', '', 'paket-wisata-ke-seoul-rp-52-juta-siap-memanjakan-liburan-anda', 'N', 'N', 'Y', '<p>Seoul, kota metropolitan yang menjadi jantung Korea Selatan telah menjadi daya tarik tersendiri bagi wisatawan mancanegara termasuk wisatawan Indonesia. Bagaimana tidak?</p>\r\n\r\n<p>Semua tren mulai dari musik, busana, hingga teknologi dimiliki negara ini. Wisatawan Indonesia pun tidak mau ketinggalan untuk sesekali berkesempatan mengunjungi kota yang super modern.</p>\r\n\r\n<p>&quot;Kalau Korea kan dibagi menjadi dua bagian kan. Sudah pastikan fokus all spotnya kita ambil di Korea Selatan mulai dari Seoul, Everland, Korean Demilitarized Zone (DMZ), sampai Busan dengan kecantikannya. Pokoknya kita semuanya lengkap,&quot; kata Dian selaku Marketing Communication Panorama JTB Tours di Plenary Hall, Jakarta Convention Center, Jumat (22/9/2017).</p>\r\n\r\n<p>Bagi Anda yang tidak ingin melewatkan liburan ke Korea, Anda dapat menghadiri rangkaian acara travel fair oleh maskapai Garuda Indonesia yang diadakan serentak di beberapa kota di Indonesia pada tanggal 22-24 September 2017.</p>\r\n\r\n<p>Garuda Indonesia Travel Fair (GTF) Fase II yang dihelat di JCC menghadirkan berbagai macam agen travel yang menawarkan ratusan varian tiket promo dan paket wisata ke seluruh penjuru dunia.<br />\r\nUntuk promo paket wisata ke Seoul, Anda dapat menemukan berbagai macam varian promo yang dapat langsung membawa Anda ke Korea.</p>\r\n\r\n<p>Dengan merogoh kocek Rp 5.290.000 Anda sudah dapat menikmati paket wisata selama 5 hari menyusuri kota Seoul hingga Gunung Sorak dan Everland.</p>\r\n\r\n<p>Fasilitas mulai dari tiket pesawat, hotel, tour guide hingga konsumsi sudah tersedia secara lengkap sehingga pengunjung dapat dimanjakan sepenuhnya dengan keindahan kota Seoul.</p>\r\n\r\n<p>Selain itu, untuk promo tiket penerbangan pesawat,&nbsp;GATF 2017&nbsp;Fase II juga menyediakan promo spesial sebesar Rp 4.661.895 untuk tiket penerbangan pulang-pergi.</p>\r\n\r\n<p>Korea menjadi destinasi wisata yang tepat untuk para pencari suasana dan tantangan baru. Maka itu, saatnya bagi Anda untuk menjadwalkan liburan Anda pergi meluncur ke negeri kimchi!</p>\r\n', '', 'Rabu', '2017-09-27', '14:58:58', 'seoul-korea2.jpg', 42, 'wisata', 'Y'),
(686, 63, 'admin', 'Dijual Mahal, Samsung Galaxy Note 8 Lebih Laku dari Galaxy S8', '', '', 'dijual-mahal-samsung-galaxy-note-8-lebih-laku-dari-galaxy-s8', 'N', 'N', 'Y', '<p>Samsung membanderol Galaxy Note 8 dengan harga lebih tinggi dari Galaxy S8. Kendati demikian, perusahaan mengklaim bahwa Galaxy Note terbaru itu justru lebih laris.</p>\r\n\r\n<p>Hal ini diungkap oleh IT &amp; Mobile VP Samsung Electronics Indonesia, So Djien Gie, saat bincang dengan media usai acara Peluncuran Samsung Galaxy Note 8 di Jakarta, Senin (25/9/2017).</p>\r\n\r\n<p>So Djien Gie enggan mengungkap dengan detail angka penjualan Samsung Galaxy Note 8. Namun dia memastikan bahwa smartphone itu merupakan yang paling laris dibandingkan berbagai jagoan Samsung lain.</p>\r\n\r\n<p>&ldquo;Galaxy Note 8 ini adalah yang paling laris. Saya tidak bisa menyebut detailnya, tapi Anda bisa bayangkan. Pemesanannya saja lebih laris dibandingkan Galaxy S8,&rdquo; katanya.</p>\r\n\r\n<p>&ldquo;Dalam waktu tiga hari kami buka pemesanan Galaxy Note 8, jumlah yang dipesan sudah sama atau melebihi Galaxy S8,&rdquo; imbuhnya.</p>\r\n\r\n<p>Harga Samsung Galaxy Note 8 di Indonesia adalah Rp 13 juta. Sementara itu Samsung Galaxy S8 dan S8 Plus dibanderol lebih murah, yakni Rp 10,5 juta dan 12 juta.</p>\r\n\r\n<p>Menurut Soo Djien Gie, Samsung Galaxy Note 8 laris karena memang banyak penggemar setia yang sudah menunggu-nunggu. Dia juga mengatakan bahwa tipe baru itu dibekali dengan banyak pembaruan dibandingkan tipe Note lain.</p>\r\n\r\n<p>Beberapa di antaranya adalah layar sinematik tanpa bezel dan memiliki lengkungan di kedua tepinya, kamera ganda dengan dual optical image stabilizer (OIS), serta S-Pen dan mendapatkan perbaikan fitur.</p>\r\n\r\n<p>Soal spesifikasi lainnya, Samsung Galaxy Note 8 dibekali dengan layar Super AMOLED berukuran 6,3 inci (2960 x 1440 piksel). Otak pemrosesannya berupa chipset Exynos 8895. Samsung memadukannya dengan RAM 6 GB serta memori internal 64 GB yang disertai slot microSD.</p>\r\n\r\n<p><br />\r\nHal menarik lainnya dari smartphone ini merupakan flagship perdananya yang menggunakan kamera ganda dan sejumlah teknologi pendukung lainnya.</p>\r\n\r\n<p>Dua kamera belakang Galaxy Note 8 menggunakan sensor 12 megapixel, dengan bukaan f/1.7 untuk kamera normal dan f/2.4 untuk kamera dengan lensa telenya. Sedangkan kamera depan 8 megapixel.</p>\r\n\r\n<p>Kemampuan baru S-Pen sendiri antara lain ujungnya yang lebih kecil dan tajam, jumlah Air Command yang bertambah dari enam aplikasi menjadi 10 aplikasi, serta fitur anti air. Adapun baterainya berkapasitas 3.300 mAh.</p>\r\n', '', 'Minggu', '2018-12-30', '16:04:44', 'samsung_note_8.jpg', 6, 'teknologi', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE IF NOT EXISTS `cache` (
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('admin@gmail.com|127.0.0.1', 'i:1;', 1725505740),
('admin@gmail.com|127.0.0.1:timer', 'i:1725505740;', 1725505740);

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE IF NOT EXISTS `cache_locks` (
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `download`
--

CREATE TABLE IF NOT EXISTS `download` (
  `id_download` int NOT NULL AUTO_INCREMENT,
  `judul` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `nama_file` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `tgl_posting` date NOT NULL,
  `hits` int NOT NULL,
  PRIMARY KEY (`id_download`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=38 ;

--
-- Dumping data for table `download`
--

INSERT INTO `download` (`id_download`, `judul`, `nama_file`, `tgl_posting`, `hits`) VALUES
(11, 'Total Biaya Pembuatan Aplikasi Simpeg', 'Contoh_File_Download_1.txt', '2014-09-23', 8),
(12, 'Type atau Jenis Join di MySQL', 'Contoh_File_Download_1.txt', '2014-09-23', 68),
(13, 'Kegiatan Monev Tgl. 14-17 Oktober 2014 (SAKPA)', 'Contoh_File_Download_1.txt', '2014-09-23', 34),
(14, 'Pembayaran Tunjangan Remunerasi', 'Contoh_File_Download_1.txt', '2014-09-23', 24),
(15, 'Target PNBP Umum & PNBP Fungsional TA.2015', 'Contoh_File_Download_1.txt', '2014-09-23', 3),
(16, 'Pelaksanaan Disiplin Pasca Idul Fitri 1435', 'Contoh_File_Download_1.txt', '2014-09-23', 90),
(17, 'Kegiatan Akurasi Data Semester I TA. 2014', 'Contoh_File_Download_1.txt', '2014-09-23', 14),
(18, 'Rapat Koordinasi dan Konsultasi', 'Contoh_File_Download_1.txt', '2014-09-23', 5),
(19, 'Lomba dan Penilaian SIMPEG dan E-DOCu', 'Contoh_File_Download_1.txt', '2014-09-23', 90),
(20, 'Pemanggilan Peserta Bimtek Hakim Tahun 2014', 'Contoh_File_Download_1.txt', '2014-09-23', 33),
(21, 'Penyusunan PAGU Indikatif Tahun Anggaran 2015', 'Contoh_File_Download_1.txt', '2014-09-23', 57),
(22, 'Revisi Tata Cara Restore Backup SAKPA13 Audited', 'Contoh_File_Download_1.txt', '2014-09-23', 44),
(23, 'Penyusunan RKAKL Alokasi Anggaran DIPA (04)', 'Contoh_File_Download_1.txt', '2014-09-23', 24),
(24, 'Tindaklanjut Temuan Pemeriksaan BPK RI', 'Contoh_File_Download_1.txt', '2014-09-23', 13),
(25, 'Verifikasi Kewajaran Nilai Tanah SIMAK-BMN', 'Contoh_File_Download_1.txt', '2014-09-23', 3),
(26, 'Instruksi Ketua Umum IPASPI Pusat (new)', 'Contoh_File_Download_1.txt', '2014-09-23', 25),
(27, 'Relaas Perkara No.0081/Pdt.G/2013/PA.Stg', 'Contoh_File_Download_1.txt', '2014-09-23', 9),
(31, 'sdfdfsdf', 'lndex.php', '2017-01-27', 8),
(32, 'xxxx', 'lndex.php', '2017-10-11', 5),
(33, 'sidreywu', 'sidreywu_u33pyo1KxlRe0zD4kjRWwn6fm.txt', '2024-08-27', 1),
(34, 'apa aja lah semoga bisa', 'apa aja lah semoga bisa_7oV81pcYO3RwoQj3MRdQtFjAK.png', '2024-08-27', 1),
(35, 'Percobaan', 'ASLIICAPTCHA.png', '2024-08-27', 1);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE IF NOT EXISTS `gallery` (
  `id_gallery` int NOT NULL AUTO_INCREMENT,
  `id_album` int NOT NULL,
  `username` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `jdl_gallery` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `gallery_seo` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `keterangan` text CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `gbr_gallery` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id_gallery`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=263 ;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id_gallery`, `id_album`, `username`, `jdl_gallery`, `gallery_seo`, `keterangan`, `gbr_gallery`) VALUES
(238, 30, 'admin', 'Lautan Penonton', 'lautan-penonton', 'Lebih kurang dari 50.000 penonton yang memadati Stadion Gelora Bung Karno menyaksikan aksi Kantata Barock.\r\n', '7kantata3.jpg'),
(237, 30, 'admin', 'Mengenang WS. Rendra', 'mengenang-ws-rendra', 'Konser didedikasikan buat salah satu anggota Kantata Takwa, WS. Rendra. Suasana kemeriahan para artis pendukung.\r\n', '44kantata4.jpg'),
(240, 31, 'admin', 'Doa Bersamaaa', 'doa-bersamaaa', '<p>Mengingat agresi yang militer yang dilancarkan Israel merupakan pelanggaran hukum humaniter internasional. Menyusul banyak warga sipil yang telah menjadi korban akibat pertempuran yang dilakukan Israel dan Hamas. Sebelumnya, Sekretaris Jendral Perserikatan Bangsa - Bangsa (PBB) Ban Ki-moon dan Menteri Luar Negeri Amerika Serikat (AS) John Kerry melakukan pertemuan di Kairo, Mesir. Pertemuan di bertujuan untuk mendesak agar konflik yang terjadi di Gaza segera dihentikan.cbcvb</p>\r\n', '38kantata1.jpg'),
(239, 30, 'admin', 'Semangat Kantata', 'semangat-kantata', 'Semangat para macan-macan tua Kantata, seolah mmemberi penyadaran baru dan bagai api yang tak pernah padam.\r\n', '7kantata2.jpg'),
(236, 30, 'admin', 'Iwan Fals', 'iwan-fals', 'Iwan Fals yang tergabung dalam Kantata Barock bersama Setiawan Djodi dan Sawong Jabo menghibur penggemarnya di GBK.\r\n', '85kantata5.jpg'),
(235, 30, 'admin', 'Iwan dan Oemar Bakrie', 'iwan-dan-oemar-bakrie', 'Aksi penonton yang mirip dengan Iwan Fals dan sang guru Oemar Bakrie\r\n', '95kantata6.jpg'),
(234, 30, 'admin', 'Bento...Bento..!!', 'bentobento', 'Bento...Bento...Bentok...!! ....Asyikkk... begitu teriak Setiawan Djody dan Sawung Jabo yang ikuti ribuan penonton.\r\n', '32kantata7.jpg'),
(232, 29, 'admin', 'Karpet Raksasa dari Bunga 008', 'karpet-raksasa-dari-bunga-008', '', '45bungaraksasa8.jpg'),
(233, 30, 'admin', 'Sujud Syukur', 'sujud-syukur', 'Seluruh awak Kantata Barock melakukan sujud syukur di penghujung acara.<br />\r\n', '32kantata8.jpg'),
(231, 29, 'admin', 'Karpet Raksasa dari Bunga 007', 'karpet-raksasa-dari-bunga-007', '', '89bungaraksasa7.jpg'),
(230, 29, 'admin', 'Karpet Raksasa dari Bunga 006', 'karpet-raksasa-dari-bunga-006', '', '17bungaraksasa6.JPG'),
(229, 29, 'admin', 'Karpet Raksasa dari Bunga 005', 'karpet-raksasa-dari-bunga-005', '', '74bungaraksasa5.JPG'),
(228, 29, 'admin', 'Karpet Raksasa dari Bunga 004', 'karpet-raksasa-dari-bunga-004', '', '22bungaraksasa4.JPG'),
(227, 29, 'admin', 'Karpet Raksasa dari Bunga 003', 'karpet-raksasa-dari-bunga-003', '', '78bungaraksasa3.JPG'),
(225, 29, 'admin', 'Karpet Raksasa dari Bunga 001', 'karpet-raksasa-dari-bunga-001', '', '17bungaraksasa1.JPG'),
(226, 29, 'admin', 'Karpet Raksasa dari Bunga 002', 'karpet-raksasa-dari-bunga-002', '', '22bungaraksasa2.JPG'),
(224, 28, 'admin', 'Favorit', 'favorit', 'Mainan adalah barang favorit yang senantiasa diburu para pembeli. Selain murah, pilihannya pun berbagai jenis.\r\n', '34asemka10.jpg'),
(223, 28, 'admin', 'Suasana Pasar Asemka', 'suasana-pasar-asemka', 'Pasar Asemka, Jakarta, merupakan pasar grosir yang banyak menyediakan berbagai aksesoris seperti kalung, cincin, Souvenir pernakahan, dan lainnya. Di Pasara Asemka anda akan dimanjakan dengan beragam barang yang dibandrol dengan harga murah meriah dan biasanya dijual grosiran.<br />\r\n', '6asemka9.jpg'),
(222, 28, 'admin', 'Petasan', 'petasan', 'Petasan aneka jenis juga dijajakan di Pasar Asemka, Jakarta.\r\n', '2asemka8.jpg'),
(221, 28, 'admin', 'Merah Marun', 'merah-marun', 'Salah satu suvenir pernikahan nan cantik yang dijual di Pasar Asemka, Jakarta.\r\n', '82asemka4.jpg'),
(220, 28, 'admin', 'Menata Cincin', 'menata-cincin', 'Seorang pedagang cincin aksesoris sedang merapihkan letak cincin agar lebih menarik di Pasar Asemka, Jakarta.\r\n', '21asemka7.jpeg'),
(219, 28, 'admin', 'Suvenir', 'suvenir', 'Aneka Souvenir Pernikahan yang dijual di Pasar Asemka, Jakarta.\r\n', '41asemka1.jpg'),
(218, 28, 'admin', 'Seorang Wanita Pedagang', 'seorang-wanita-pedagang', 'Seorang wanita sedang menunggu kios aksesorisnya.\r\n', '7asemka6.jpeg'),
(217, 28, 'admin', 'Suasana Pasar', 'suasana-pasar', 'Suasana di Pasar Asemka yang senantiasa ramai. Dan pengunjung bebas memilih berbagai jenis aksesoris.\r\n', '22asemka5.jpeg'),
(216, 28, 'admin', 'Pedagang', 'pedagang', 'Seorang pedagang sedang membungkus souvenir penikahan yang akan dijual ataupun pesanan dari pelanggangnnya.\r\n', '84asemka2.jpg'),
(254, 1, 'admin', 'Screenshot 1 ', 'screenshot-1-', 'Screenshot 1 Screenshot 1 Screenshot 1 Screenshot 1 Screenshot 1 Screenshot 1 Screenshot 1 Screenshot 1 Screenshot 1 Screenshot 1 Screenshot 1 Screenshot 1 Screenshot 1 Screenshot 1 Screenshot 1 Screenshot 1 Screenshot 1 Screenshot 1 Screenshot 1 Screenshot 1 Screenshot 1 Screenshot 1 Screenshot 1 Screenshot 1 Screenshot 1 Screenshot 1 Screenshot 1 Screenshot 1 Screenshot 1 Screenshot 1 Screenshot 1 Screenshot 1 Screenshot 1 Screenshot 1 Screenshot 1 Screenshot 1 Screenshot 1 ', '911.jpg'),
(259, 31, 'admin', 'Minecraft Survival Indonesia', 'minecraft-survival-indonesia', '<p><strong>WOI BISAAA</strong></p>', 'Minecraft Survival Indonesia_2M7E22WulLJNiVU26v7huF6OA.png'),
(261, 30, 'admin', 'galeriku', 'galeriku', '<p>bisa yu</p>', '1');

-- --------------------------------------------------------

--
-- Table structure for table `halamanstatis`
--

CREATE TABLE IF NOT EXISTS `halamanstatis` (
  `id_halaman` int NOT NULL AUTO_INCREMENT,
  `judul` varchar(100) NOT NULL,
  `judul_seo` varchar(100) NOT NULL,
  `isi_halaman` text NOT NULL,
  `tgl_posting` date NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `username` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `dibaca` int NOT NULL DEFAULT '1',
  `jam` time NOT NULL,
  `hari` varchar(20) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id_halaman`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=74 ;

--
-- Dumping data for table `halamanstatis`
--

INSERT INTO `halamanstatis` (`id_halaman`, `judul`, `judul_seo`, `isi_halaman`, `tgl_posting`, `gambar`, `username`, `dibaca`, `jam`, `hari`) VALUES
(46, 'Tentang Kami', 'tentang-kami', '<p>Swarakalibata merupakan portal online berita dan hiburan yang berfokus pada pembaca Indonesia baik yang berada di tanah air maupun yang tinggal di luar negeri. Berita Swarakalibata diupdate selama 24 jam dan mendapatkan kunjungan lebih dari 190 juta pageviews setiap bulannya (Sumber: Google Analytics).</p>\r\n\r\n<p>Swarakalibata memiliki beragam konten dari berita umum, politik, peristiwa, internasional, ekonomi, lifestyle, selebriti, sports, bola, auto, teknologi, dan lainya. Swarakalibata juga merupakan salah satu portal pertama yang memberikan inovasi konten video dan mobile (handphone). Para pembaca kami adalah profesional, karyawan kantor, pengusaha, politisi, pelajar, dan ibu rumah tangga.</p>\r\n\r\n<p>Konten berita Swarakalibata ditulis secara tajam, singkat, padat, dan dinamis sebagai respons terhadap tuntutan masyarakat yang semakin efisien dalam membaca berita. Selain itu konsep portal berita online juga semakin menjadi pilihan masyarakat karena sifatnya yang up-to-date dan melaporkan kejadian peristiwa secara instant pada saat itu juga sehingga masyarakat tidak perlu menunggu sampai esok harinya untuk membaca berita yang terjadi.</p>\r\n\r\n<p>Swarakalibata resmi diluncurkan (Commercial Launch) sebagai portal berita pada 1 Maret 2007) dan merupakan cikal-bakal bisnis online pertama milik PT Php MU Tbk, sebuah perusahan media terintegrasi yang terbesar di Indonesia dan di Asia Tenggara. PHPMU juga memiliki dan mengelola bisnis media TV (RCTI, MNC TV, Global TV), media cetak (Koran Seputar Indonesia, Tabloid Genie, Tabloid Mom &amp; Kiddie, majalah HighEnd, dan Trust), media radio (SINDO, Trijaya FM, ARH Global, Radio Dangdut Indonesia, V Radio), serta sejumlah bisnis media lainnya (mobile VAS, Manajemen artis, rumah produksi film, agen iklan, dll).</p>\r\n\r\n<p>Sampai dengan bulan Oktober 2008, Swarakalibata mendapatkan peringkat ke 24 dari Top 100 website terpopuler di Indonesia (Sumber: Alexa.com), peringkat ini terus naik yang disebabkan semakin banyak pengunjung situs yang mengakses Swarakalibata setiap harinya. Selain itu, jumlah pengguna internet yang mencapai 25 juta (Sumber: data APJII per 2005) diperkirakan untuk terus tumbuh dengan signifikan dalam beberapa tahun ke depan.</p>', '2024-08-15', '', 'admin', 61, '04:05:05', 'Thursday'),
(48, 'Alamat Perusahaan', 'alamat-perusahaan', '<p>Swarakalibata merupakan portal online berita dan hiburan yang berfokus pada pembaca Indonesia baik yang berada di tanah air maupun yang tinggal di luar negeri. Berita Swarakalibata diupdate selama 24 jam dan mendapatkan kunjungan lebih dari 190 juta pageviews setiap bulannya (Sumber: Google Analytics).</p>\r\n\r\n<p>Swarakalibata memiliki beragam konten dari berita umum, politik, peristiwa, internasional, ekonomi, lifestyle, selebriti, sports, bola, auto, teknologi, dan lainya. Swarakalibata juga merupakan salah satu portal pertama yang memberikan inovasi konten video dan mobile (handphone). Para pembaca kami adalah profesional, karyawan kantor, pengusaha, politisi, pelajar, dan ibu rumah tangga.</p>\r\n\r\n<p>Konten berita Swarakalibata ditulis secara tajam, singkat, padat, dan dinamis sebagai respons terhadap tuntutan masyarakat yang semakin efisien dalam membaca berita. Selain itu konsep portal berita online juga semakin menjadi pilihan masyarakat karena sifatnya yang up-to-date dan melaporkan kejadian peristiwa secara instant pada saat itu juga sehingga masyarakat tidak perlu menunggu sampai esok harinya untuk membaca berita yang terjadi.</p>\r\n\r\n<p>Swarakalibata resmi diluncurkan (Commercial Launch) sebagai portal berita pada 1 Maret 2007) dan merupakan cikal-bakal bisnis online pertama milik PT Php MU Tbk, sebuah perusahan media terintegrasi yang terbesar di Indonesia dan di Asia Tenggara. PHPMU juga memiliki dan mengelola bisnis media TV (RCTI, MNC TV, Global TV), media cetak (Koran Seputar Indonesia, Tabloid Genie, Tabloid Mom &amp; Kiddie, majalah HighEnd, dan Trust), media radio (SINDO, Trijaya FM, ARH Global, Radio Dangdut Indonesia, V Radio), serta sejumlah bisnis media lainnya (mobile VAS, Manajemen artis, rumah produksi film, agen iklan, dll).</p>\r\n\r\n<p>Sampai dengan bulan Oktober 2008, Swarakalibata mendapatkan peringkat ke 24 dari Top 100 website terpopuler di Indonesia (Sumber: Alexa.com), peringkat ini terus naik yang disebabkan semakin banyak pengunjung situs yang mengakses Swarakalibata setiap harinya. Selain itu, jumlah pengguna internet yang mencapai 25 juta (Sumber: data APJII per 2005) diperkirakan untuk terus tumbuh dengan signifikan dalam beberapa tahun ke depan.</p>', '2024-08-14', '', 'admin', 23, '07:46:44', 'Wednesday'),
(52, 'Struktur Organisasi', 'struktur-organisasi', '<p>STRUKTUR ORGANISASI DPPKB KARAWANG</p>\r\n\r\n<p>1. KEPALA DINAS</p>\r\n\r\n<p>2. SEKRETARIS DINAS</p>\r\n\r\n<p>3. 3 KEPALA BIDANG</p>\r\n\r\n<p>4. 1 KASUBAG TU</p>\r\n\r\n<p>5 . 1 KASUBAG KEUANGAN</p>\r\n\r\n<p>6.&nbsp; 9 Kepala Seksi</p>\r\n\r\n<p>7. 12 UPTD yang ada di Kecamatan Kota Bekasi</p>\r\n', '2019-02-11', '', 'admin', 68, '15:21:50', 'Senin'),
(53, 'Sejarah Instansi', 'sejarah-instansi', '<p style="text-align:justify">Sejarah</p>\n\n<p style="text-align:justify">Hiasan penanda hajatan pernikahan pada masyarakat wilayah Kabupaten Karawang wilayah selatan, hiasan terbuat dari batang bambu utuh yang disisakan daun bagian atasnya dilengkapi dengan topi caping yang digantung lengkap dengan tali-tali berwarna-warni dibawahnya yang menjuntai (penggunaan tali bisa disubtitusi atau digantikan dengan kertas warna-warni).</p>\n\n<p style="text-align:justify">Hiasan ini merupakan kearifan lokal masyarakat Kabupaten Karawang bagian selatan yang ditumbuhi banyak pohon bambu.<br />\nPemukiman awal<br />\nWilayah Karawang sudah sejak lama dihuni manusia. Peninggalan Situs Batujaya dan Situs Cibuaya yang luas menunjukkan pemukiman pada awal masa modern yang mungkin mendahului masa Kerajaan Tarumanagara. Penduduk Karawang semula beragama Hindu dan Budha dan wilayah ini berada di bawah kekuasaan Kerajaan Sunda.</p>\n\n<p style="text-align:justify">Penyebaran Islam<br />\nAgama Islam mulai dianut masyarakat setempat pada masa Kerajaan Sunda, setelah seorang patron bernama Syekh Hasanudin bin Yusuf Idofi, konon dari Makkah, yang terkenal dengan sebutan &quot;Syekh Quro&quot;, Syekh Quro merupakan seorang utusan Raja Campa yang mengikuti pelayaran persahabatan ke Majapahit dari Dinasti Ming yang dipimpin oleh Laksamana Cheng Ho (Kapal Laksamana Cheng Ho tercatat mendarat di Pelabuhan Muara Jati, Kerajaan Singapura (cikal bakal Kesultanan Cirebon pada tahun 1415[9].), ketika kapal sudah berada di Pura, Karawang, Syekh Quro beserta pengikutnya turun dan tinggal untuk menyebarkan agama Islam di wilayah Pura dan kemudian menikah dengan Putri Ki Gede Karawang yang bernama Ratna sondari dan meluaskan pengajarannya hingga ke wilayah Pura Dalem (Pedalaman Pura) kemudian mendirikan pesantren di Desa Pulo Kelapa (sekarang masuk kecamatan Lemah Abang, Kabupaten Karawang)</p>\n\n<p style="text-align:justify">Dari pernikahannya dengan Ratna Sondari, Syekh Quro memiliki seorang anak yang diberi nama Ahmad, Ahmad inilah yang kemudian dikenal dengan nama Syekh Ahmad (Penghulu Pertama di Karawang), Syekh Ahmad pernah diperintahkan oleh ayahnya untuk membantu Syekh Nur Jati atau Syekh Datuk Kahfi di Pesambangan (sekarang masuk wilayah kecamatan Gunung Jati, Kabupaten Cirebon).</p>\n\n<p style="text-align:justify">Hubungan penyebaran Islam di Karawang dengan Kesultanan Cirebon</p>\n\n<p style="text-align:justify">Wayang kulit Cirebon gaya Cilamaya karya Ki Ardi, disungging ulang oleh Ki Enang Sutria dan dibrom ulang oleh Arie Nugraha<br />\nPuteri Ki Gede Karawang yaitu Ratna sondari memberikan sumbangan hartanya untuk mendirikan sebuah masjid di Gunung Sembung (letaknya berdekatan dengan Gunung Jati) atau dikenal dengan sebutan (Nur Giri Cipta Rengga) yang bernama Masjid Dog Jumeneng atau Masjid Sang Saka Ratu, yang sampai sekarang masih digunakan dan terawat baik.</p>\n\n<p style="text-align:justify">Syekh Ahmad (Anak Syekh Quro dengan Ratna sondari) kemudian berkeluarga dan memiliki seorang putera bernama Musanudin, Musanudin inilah yang kemudian menjadi Lebai di Kesultanan Cirebon dan memimpim Masjid Agung Sang Cipta Rasa pada masa kepemimpinan Sunan Gunung Jati</p>\n\n<p style="text-align:justify">Pengangkatan juru kunci di situs makam Syekh Quro dikuatkan oleh pihak Keraton Kanoman, Cirebon.</p>\n\n<p style="text-align:justify">Syekh Quro memberikan ajaran yang kemudian dilanjutkan oleh murid-murid Wali Sanga. Makam Syeikh Quro terletak di Pulobata, Kecamatan Lemahabang.</p>\n\n<p style="text-align:justify">Masa Kesultanan Cirebon<br />\nSetelah Kerajaan Sunda runtuh maka wilayah antara sungai Angke dan sungai Cipunegara terbagi dua. Menurut Carita Sajarah Banten, Sunan Gunung Jati pada abad ke 15 membagi wilayah antara sungai Angke dan sungai Cipunegara menjadi dua bagian dengan sungai Citarum sebagai pembatasnya, sebelah timur sungai Citarum hingga sungai Cipunegara masuk wilayah Kesultanan Cirebon yang sekarang menjadi Kabupaten Karawang, Kabupaten Purwakarta dan Kabupaten Subang dan sebelah barat sungai Citarum hingga sungai Angke menjadi wilayah bawahan Kesultanan Banten dengan nama Jayakarta.</p>\n\n<p style="text-align:justify">Pemerintahan mandiri<br />\nSebagai suatu daerah berpemerintahan sendiri tampaknya dimulai semenjak Karawang diduduki oleh Kesultanan Mataram, di bawah pimpinan Wiraperbangsa dari Sumedang Larang tahun 1632. Kesuksesannya menempatkannya sebagai wedana pertama dengan gelar Adipati Kertabumi III. Semenjak masa ini, sistem pertanian melalui pengairan irigasi mulai dikembangkan di Karawang dan perlahan-lahan daerah ini menjadi daerah pusat penghasil beras utama di Pulau Jawa hingga akhir abad ke-20.</p>\n\n<p style="text-align:justify">Selanjutnya, Karawang menjadi kabupaten dengan bupati pertama Raden Adipati Singaperbangsa bergelar Kertabumi IV yang dilantik 14 September 1633. Tanggal ini dinobatkan menjapada hari jadi Kabupaten Karawang. Selanjutnya, bupatinya berturut-turut adalah R. Anom Wirasuta 1677-1721, R. Jayanegara (gelar R.A Panatayuda II) 1721-1731, R. Martanegara (R. Singanagara dengan gelar R. A Panatayuda III) 1731-1752, R. Mohamad Soleh (gelar R. A Panatayuda IV) 1752-1786. Pada rentang ini terjadi peralihan penguasa dari Mataram kepada VOC (Belanda).</p>\n\n<p style="text-align:justify">Menjelang Kemerdekaan Indonesia<br />\nPada masa menjelang Kemerdekaan Indonesia, Kabupaten Karawang menyimpan banyak catatan sejarah. Rengasdengklok merupakan tempat disembunyikannya Soekarno dan Hatta oleh para pemuda Indonesia untuk secepatnya merumuskan naskah Proklamasi Kemerdekaan Indonesia pada tanggal 16 Agustus 1945.</p>\n\n<p style="text-align:justify">Kabupaten Karawang juga menjadi inspirasi sastrawan Chairil Anwar menulis karya Antara Karawang-Bekasi karena peristiwa pertempuran di daerah sewaktu pasukan dari Divisi Siliwangi harus meninggalkan Bekasi menuju Karawang yang masih menjadi daerah kekuasaan Republik.</p>\n\n<p style="text-align:justify">Kecamatan Rengasdengklok adalah daerah pertama milik Republik Indonesia yang gagah berani mengibarkan bendera Merah Putih sebelum Proklamasi kemerdekaan Indonesia di Gaungkan.[butuh rujukan] Oleh karena itu selain dikenal dengan sebutan Lumbung Padi Karawang juga sering disebut sebagai Kota Pangkal Perjuangan. Di Rengasdengklok didirikan sebuah monumen yang dibangun oleh masyarakat sekitar, kemudian pada masa pemerintahan Megawati didirikan Tugu Kebulatan Tekad untuk mengenang sejarah Republik Indonesia.</p>\n\n<p style="text-align:justify">Setelah Kemerdekaan Indonesia<br />\nWilayah Karawang pada masa lalu (hasil pembagian oleh Sunan Gunung Jati pada abad ke 15) kemudian dipecah menjadi dua bagian pada masa perang kemerdekaan sekitar tahun 1948 dengan sungai Citarum dan sungai Cilamaya menjadi pembatasnya, wilayah Kabupaten Karawang Barat meliputi wilayah Kabupaten Karawang sekarang ditambah desa-desa di sebelah barat Citarum yaitu desa-desa Sukasari dan Kertamanah dengan ibukota di kecamatan Karawang, sementara Kabupaten Karawang Timur meliputi wilayah Kabupaten Purwakarta dikurangi desa-desa di kecamatan Sukasari (yang dahulu masih bagian dari Kabupaten Karawang) dan Kabupaten Subang dengan ibukota di kecamatan Subang.</p>\n\n<p style="text-align:justify">lalu kemudian pada tahun 1950 nama Kabupaten Karawang Timur diubah menjadi Kabupaten Purwakarta dengan ibukota di kecamatan Subang dan Kabupaten Karawang Barat menjadi Krawang dengan ibukota di kecamatan Karawang..</p>\n\n<p style="text-align:justify">Pada tahun 1968 terjadi pemekaran wilayah Kabupaten Purwakarta yang sebelumnya bernama Kabupaten Karawang Timur menjadi Kabupaten Subang dengan ibukota di kecamatan Subang dan Kabupaten Purwakarta dengan ibukota di kecamatan Purwakarta, karena pada tahun yang sama berlangsung proyek besar bendungan Ir. Djuanda atau yang dikenal dengan nama Bendungan Jatiluhur maka pemerintah pusat pada masa itu merasa perlu untuk menyatukan wilayah waduk Jatiluhur ke dalam satu wilayah kerja yang akhirnya diputuskan dimasukan ke dalam wilayah Kabupaten Purwakarta sehingga pada tahun 1968 wilayah Kabupaten Krawang harus melepaskan desa-desa yang berada disebelah barat sungai Citarum yang masuk dalam proyek besar bendungan Ir. Djuanda atau Bendungan Jatiluhur, desa-desa tersebut adalah desa-desa Sukasari dan Kertamanah yang sekarang masuk dalam kecamatan Sukasari, Kabupaten Purwakarta, sehingga dengan diterbitkannya Undang-Undang No. 4 Tahun 1968 maka wilayah Kabupaten Krawang menjadi berkurang dan wilayah inilah yang dikemudian hari disebut sebagai Kabupaten Karawang</p>\n', '2019-02-13', '', 'admin', 29, '14:43:03', 'Rabu'),
(54, 'Visi dan Misi yaaa', 'visi-dan-misi', '<p><strong>VISI DAN MISI<br />\r\nPEMERINTAH KABUPATEN KARAWANG<br />\r\nPERIODE 2016 - 2021</strong></p>\r\n\r\n<p><br />\r\n<strong>VISI :</strong><br />\r\nKARAWANG YANG MANDIRI MAJU ADIL DAN MAKMUR<br />\r\n<strong>MISI :</strong><br />\r\n1. Mewujudkan Aparatur Pemerintah Daerah yang Bersih dan Berwibawa.<br />\r\n2. Mewujudkan Kabupaten Karawang yang Berdaya Saing.<br />\r\n3. Mewujudkan Masyarakat Demokratis Berlandaskan Hukum.<br />\r\n4. Mewujudkan Kabupaten Karawang yang Asri dan Lestari.<br />\r\n5. Membangun Kabupaten Karawang Melalui Penguatan Desa.</p>', '2024-08-11', '1723387707_Screenshot (10).png', 'admin', 17, '16:17:33', 'Rabu'),
(68, 'Kiruma Souichi', 'kiruma-souichi', '<p><strong>Kiruma Souichi, The Perfect Leader!!</strong></p>', '2024-08-29', 'Screenshot (9).png', 'admin', 1, '08:03:32', 'Thursday'),
(73, 'adnadn', 'adnadn', '<p>sfbmfw</p>', '2024-09-01', 'Screenshot (4).png', 'admin', 1, '12:50:45', 'Sunday');

-- --------------------------------------------------------

--
-- Table structure for table `header`
--

CREATE TABLE IF NOT EXISTS `header` (
  `id_header` int NOT NULL AUTO_INCREMENT,
  `judul` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `url` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `gambar` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `tgl_posting` date NOT NULL,
  PRIMARY KEY (`id_header`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=34 ;

--
-- Dumping data for table `header`
--

INSERT INTO `header` (`id_header`, `judul`, `url`, `gambar`, `tgl_posting`) VALUES
(31, 'Header3', '', 'header3.jpg', '2011-04-06'),
(32, 'Header2', '', 'header1.jpg', '2011-04-06'),
(33, 'Header1', '', 'header2.jpg', '2011-04-06');

-- --------------------------------------------------------

--
-- Table structure for table `hubungi`
--

CREATE TABLE IF NOT EXISTS `hubungi` (
  `id_hubungi` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `email` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `subjek` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `pesan` text CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `tanggal` date NOT NULL,
  `jam` time NOT NULL,
  `dibaca` enum('Y','N') CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT 'N',
  PRIMARY KEY (`id_hubungi`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=44 ;

--
-- Dumping data for table `hubungi`
--

INSERT INTO `hubungi` (`id_hubungi`, `nama`, `email`, `subjek`, `pesan`, `tanggal`, `jam`, `dibaca`) VALUES
(39, 'Admin Lokomedia', 'dankrez48@gmail.com', '::1', 'Selamat bergabung di CMS Lokomedia. Jaminan kenyamanan dalam pengelolaan konten website menjadi hal yang kami utamakan. Aapabila anda menemukan kendala, segera hubungi kami.', '2017-01-23', '21:56:12', 'Y'),
(35, 'yusri renor', 'aciafifah@gmail.com', 'pertanyaan', 'bagaimana cara mengunduh nomor ujian fak. pertanian', '2014-01-19', '00:00:00', 'Y'),
(38, 'Udin Sedunia', 'udin.sedunia@gmail.com', 'Ip Pengirim : 120.177.28.244', 'Silahkan menghubungi kami melalui private message melalui form yang berada pada bagian kanan halaman ini. Kritik dan saran Anda sangat penting bagi kami untuk terus meningkatkan kualitas produk dan layanan yang kami berikan kepada Anda.', '2015-06-02', '00:00:00', 'Y'),
(41, 'saya siapagug', 'ihih@gmail.com', 'pertanyaan', 'iaygdyasg', '2024-09-05', '09:27:58', 'Y'),
(42, 'saya siapagug', 'ihih@gmail.com', 'pertanyaan', 'iaygdyasgd', '2024-09-05', '09:29:16', 'N'),
(43, 'raja', 'ic@gmail.com', 'dealer', 'aja', '2024-09-06', '04:27:42', 'N');

-- --------------------------------------------------------

--
-- Table structure for table `identitas`
--

CREATE TABLE IF NOT EXISTS `identitas` (
  `id_identitas` int NOT NULL AUTO_INCREMENT,
  `nama_website` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `url` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `facebook` text CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `rekening` varchar(100) NOT NULL,
  `no_telp` varchar(20) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `meta_deskripsi` varchar(250) NOT NULL,
  `meta_keyword` varchar(250) NOT NULL,
  `favicon` varchar(50) NOT NULL,
  `maps` text NOT NULL,
  PRIMARY KEY (`id_identitas`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `identitas`
--

INSERT INTO `identitas` (`id_identitas`, `nama_website`, `email`, `url`, `facebook`, `rekening`, `no_telp`, `meta_deskripsi`, `meta_keyword`, `favicon`, `maps`) VALUES
(1, 'Website DPPKB Karawang', 'dankrez48@gmail.com', 'http://localhost/lokodinas', 'https://www.facebook.com/dppkbkarawang/', '9000019999805', '1500000', 'Berita Indonesia terkini terpercaya, dan terpopuler, politik, ekonomi, tekno, otomotif, dan olahraga ditulis lengkap dan akurat.', 'berita, internasional, nasional, daerah, olahraga, otomotif, teknologi, news, hiburan, entertainment, indonesia, swarakalibata, lokomedia', 'favpertmin.png', 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15863.072845158182!2d107.2976159!3d-6.2941631!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb8980521223b1f90!2sKantor+DPPKB+Karawang!5e0!3m2!1sid!2sid!4v1546678236217');

-- --------------------------------------------------------

--
-- Table structure for table `iklanatas`
--

CREATE TABLE IF NOT EXISTS `iklanatas` (
  `id_iklanatas` int NOT NULL AUTO_INCREMENT,
  `judul` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `username` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `url` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `gambar` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `tgl_posting` date NOT NULL,
  PRIMARY KEY (`id_iklanatas`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=44 ;

--
-- Dumping data for table `iklanatas`
--

INSERT INTO `iklanatas` (`id_iklanatas`, `judul`, `username`, `url`, `gambar`, `tgl_posting`) VALUES
(1, 'Jasa Pembuatan Website murah', 'admin', 'http://www.lokomedia.web.id', 'banner_asiangames.jpg', '2018-08-31');

-- --------------------------------------------------------

--
-- Table structure for table `iklantengah`
--

CREATE TABLE IF NOT EXISTS `iklantengah` (
  `id_iklantengah` int NOT NULL AUTO_INCREMENT,
  `judul` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `username` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `url` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `gambar` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `tgl_posting` date NOT NULL,
  PRIMARY KEY (`id_iklantengah`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=45 ;

--
-- Dumping data for table `iklantengah`
--

INSERT INTO `iklantengah` (`id_iklantengah`, `judul`, `username`, `url`, `gambar`, `tgl_posting`) VALUES
(35, 'link1', 'admin', 'https://members.lokomedia.web.id', 'img1.jpg', '2019-01-12'),
(34, 'link2', 'admin', 'https://google.co.id', 'img2.jpg', '2019-02-22'),
(36, 'link3', 'admin', 'https://members.lokomedia.web.id', 'img3.jpg', '2019-01-12'),
(37, 'link4', 'admin', 'https://members.lokomedia.web.id', 'img4.jpg', '2019-01-12'),
(38, 'link5', 'admin', 'https://members.lokomedia.web.id', 'img5.jpg', '2019-01-12'),
(39, 'link6', 'admin', 'https://members.lokomedia.web.id', 'img6.jpg', '2019-01-12'),
(40, 'link7', 'admin', 'https://members.lokomedia.web.id', 'img7.jpg', '2019-01-12'),
(41, 'link8', 'admin', 'https://members.lokomedia.web.id', 'link8_1pSfL7JXHfZMINWirxkdOcrY7.png', '2024-08-16');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE IF NOT EXISTS `jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint unsigned NOT NULL,
  `reserved_at` int unsigned DEFAULT NULL,
  `available_at` int unsigned NOT NULL,
  `created_at` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE IF NOT EXISTS `job_batches` (
  `id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `katajelek`
--

CREATE TABLE IF NOT EXISTS `katajelek` (
  `id_jelek` int NOT NULL AUTO_INCREMENT,
  `kata` varchar(60) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `username` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `ganti` varchar(60) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  PRIMARY KEY (`id_jelek`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=12 ;

--
-- Dumping data for table `katajelek`
--

INSERT INTO `katajelek` (`id_jelek`, `kata`, `username`, `ganti`) VALUES
(4, 'sex', '', 's**'),
(2, 'bajingan', '', 'b*******'),
(3, 'bangsat', '', 'b******'),
(5, 'fuck', 'admin', 'f**k'),
(6, 'pantat', 'admin', 'p****t');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE IF NOT EXISTS `kategori` (
  `id_kategori` int NOT NULL AUTO_INCREMENT,
  `nama_kategori` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `username` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `kategori_seo` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `aktif` enum('Y','N') CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT 'Y',
  `sidebar` int NOT NULL,
  PRIMARY KEY (`id_kategori`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=80 ;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`, `username`, `kategori_seo`, `aktif`, `sidebar`) VALUES
(61, 'Berita Daerah', 'admin', 'berita-daerah', 'Y', 1),
(62, 'Berita OPD', 'admin', 'berita-opd', 'Y', 2),
(77, 'Bismillah bisa yukk', 'admin', 'bismillah-bisa-yukk', 'Y', 2);

-- --------------------------------------------------------

--
-- Table structure for table `kategori_program`
--

CREATE TABLE IF NOT EXISTS `kategori_program` (
  `id_kat` int NOT NULL AUTO_INCREMENT,
  `id_kategori` varchar(255) NOT NULL,
  `nama_kategori` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_kat`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb3 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `kategori_program`
--

INSERT INTO `kategori_program` (`id_kat`, `id_kategori`, `nama_kategori`) VALUES
(1, '03b194c1a2db237106509bf1a8ff51fc', 'Laravel'),
(2, 'e242e42cff2cec1d5c2d1c72c35481a7', 'React JS'),
(3, 'a883896cfd35d58444ed0d84afe787ed', 'Node JS'),
(4, 'b0b067cded7d76a22162d1f88628fa7b', 'Tailwind'),
(5, 'ef0b03bdadc04cfc97b779f646e5d3e9', 'Figma'),
(6, '7ec18e60651ca35630fa863629592759', 'Flatter'),
(7, '07fdb58433ec9999b4ecd92aa65220da', 'CodeIgniter');

--
-- Triggers `kategori_program`
--
DROP TRIGGER IF EXISTS `after_insert_kategori_program`;
DELIMITER //
CREATE TRIGGER `after_insert_kategori_program` AFTER INSERT ON `kategori_program`
 FOR EACH ROW BEGIN
        INSERT INTO kategori_program_group (id_program, id_kategori)
        SELECT id_program, NEW.id_kategori FROM Program;
        
        INSERT INTO trainer_program_group (id_trainer, id_kategori)
        SELECT id_trainer, NEW.id_kategori FROM Trainer;
    END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `kategori_program_group`
--

CREATE TABLE IF NOT EXISTS `kategori_program_group` (
  `id_kgroup` int NOT NULL AUTO_INCREMENT,
  `id_program` varchar(255) NOT NULL,
  `id_kategori` varchar(255) NOT NULL,
  PRIMARY KEY (`id_kgroup`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb3 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `kategori_program_group`
--

INSERT INTO `kategori_program_group` (`id_kgroup`, `id_program`, `id_kategori`) VALUES
(1, '2f22c05b2de0041c258ed401e593c0d8', '03b194c1a2db237106509bf1a8ff51fc'),
(2, '2f22c05b2de0041c258ed401e593c0d8', 'e242e42cff2cec1d5c2d1c72c35481a7'),
(3, '2f22c05b2de0041c258ed401e593c0d8', 'a883896cfd35d58444ed0d84afe787ed'),
(4, '2f22c05b2de0041c258ed401e593c0d8', 'b0b067cded7d76a22162d1f88628fa7b'),
(5, '2f22c05b2de0041c258ed401e593c0d8', 'ef0b03bdadc04cfc97b779f646e5d3e9'),
(6, '2f22c05b2de0041c258ed401e593c0d8', '7ec18e60651ca35630fa863629592759'),
(7, '2f22c05b2de0041c258ed401e593c0d8', '07fdb58433ec9999b4ecd92aa65220da');

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE IF NOT EXISTS `komentar` (
  `id_komentar` int NOT NULL AUTO_INCREMENT,
  `id_berita` int NOT NULL,
  `nama_komentar` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `url` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `isi_komentar` text CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `tgl` date NOT NULL,
  `jam_komentar` time NOT NULL,
  `aktif` enum('Y','N') CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT 'Y',
  `email` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id_komentar`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=164 ;

--
-- Dumping data for table `komentar`
--

INSERT INTO `komentar` (`id_komentar`, `id_berita`, `nama_komentar`, `url`, `isi_komentar`, `tgl`, `jam_komentar`, `aktif`, `email`) VALUES
(84, 650, 'Agung Wicaksana', 'dankrez48@gmail.com', 'Nice  story, Roy suryo dan Susilo bambang yudhoyono memang cucak rowo. :)', '2024-08-31', '00:26:57', 'N', 'dankrez48@gmail.com'),
(88, 650, 'Udin Sedunia', 'www.belajarkonseling.com', ' hm...  kae.x  perlu  juga  ne  bantuan  dari  para  konselor...:)		   ', '2012-01-13', '20:09:07', 'Y', 'www.belajarkonseling.com'),
(90, 650, 'Rizal Faizal', 'www.rizal-online.co.cc', ' asyik  aja  dehh...   ', '2012-02-25', '15:01:40', 'Y', 'www.rizal-online.co.cc'),
(91, 645, 'Eka Praja W', 'komputerkampus.com', ' makin  parah  aja  nih  ...\r\nmudah2n  bisa  berbenah  negeri  ku  yg  q  banggakan   ', '2012-03-08', '20:06:07', 'Y', 'komputerkampus.com'),
(137, 650, 'Lukmanul Hakim', '', ' saya  yakin  PHP  juga  bisa  bertahan  sampai  2030   ', '2013-01-19', '18:56:25', 'Y', 'lukmanul.haskim@gmai;.com'),
(146, 645, 'Tommy Utama', 'tommy.utama@gmail.com', ' Calon  hakim  agung  Muhammad  Daming  Sanusi  menyatakan,  hukuman  mati  tidak  layak  diberlakukan  bagi  pelaku  pemerkosaan.   ', '2014-07-21', '21:03:04', 'Y', 'tommy.utama@gmail.com'),
(147, 655, 'Agung Wicaksana', 'dankrez48@gmail.com', 'Mudah-mudahan  windows  8.2  tampilannya  lebih  keren  lagi  dari  windows  8.1 sebelumnya  yang  kurang  enak  di gunakan.  heheheee   ', '2014-07-22', '08:33:04', 'Y', 'dankrez48@gmail.com'),
(144, 650, 'Tommy Utama', 'tommy.utama@gmail.com', 'Pengamat  politik  dari  Charta  Politika,  Yunarto  Wijaya  mempertanyakan  dasar  keputusan  SBY  menunjuk  Roy  Suryo  sebagai  Menpora.   ', '2014-07-21', '20:59:16', 'Y', 'tommy.utama@gmail.com'),
(143, 650, 'Udin Sedunia', 'udin.sedunia@gmail.com', 'Menurut  Yunarto,  Roy  selama  ini  lebih  dikenal  sebagai  pakar  foto  digital  dan  video  serta  dosen  di  sebuah  perguruan  tinggi  negeri.   ', '2014-07-21', '20:57:52', 'Y', 'udin.sedunia@gmail.com'),
(148, 662, 'Agung Wicaksana', 'dankrez48@gmail.com', 'pantat negara yahudi yang sangat perlu untuk dihancurkan /  musnahkan  dan  bantai  seluruh  warga israel..!!!   ', '2014-07-24', '09:29:20', 'Y', 'dankrez48@gmail.com'),
(149, 662, 'Edo Ikfianda', 'edomuhammad90@gmail.com', 'Setelah membentuk Timnas, PSSI versi KLB pimpinan La Nyalla Mahmud Matalitti menunjuk Alfred Riedl sebagai pelatihnya.', '2014-08-09', '17:34:35', 'Y', 'edomuhammad90@gmail.com'),
(152, 650, 'Dewi Safitriir', 'dewi_safitri@gmail.com', 'Peremimpin  tertinggi  Iran,  Ayatollah  Ali  Khamenei  menyampaikan  pernyataan  kontroversial  terkait  ketegangan  di  Gaza.Israele.   ', '2014-08-17', '17:46:28', 'N', 'dewi_safitri@gmail.com'),
(153, 662, 'Agung Wicaksana', 'ww.phpmu.com', 'Anda penyuka Transformer? Tentu hal yang paling menarik saat menonton film Transformer salah satunya adalah saat adegan transformasi yang begitu keren dari sebuah mobil atau truk menjadi robot yang gagah.\r\n\r\nAnda penyuka Transformer? Tentu hal yang paling menarik saat menonton film Transformer salah satunya adalah saat adegan transformasi yang begitu keren dari sebuah mobil atau truk menjadi robot yang gagah.', '2015-03-25', '06:10:12', 'Y', 'dankrez48@gmail.com'),
(154, 642, 'Tommy Utama', 'tommyutama.com', ' Para  pengunjuk  rasa  membawa  bendera-bendera  Palestina  dan  foro-foto  pemimpin  tertinggi  Iran,  Ayatollah  Ali  Khamenei.   ', '2016-11-24', '10:24:15', 'Y', 'tommy.utama@gmail.com'),
(162, 687, 'mas marno', '', 'maju terus indonesia', '2017-10-04', '14:32:56', 'Y', 'marnosudrajat@gmail.com'),
(1, 1, 'aku', 'http://apalah.com', 'AKU KAYA AMMIINN', '2024-08-31', '00:36:47', 'Y', 'hal@gmail.com'),
(3, 3, 'fjalfw', 'http://dsfskfi.id', 'fkahslfawad', '2024-08-07', '11:40:00', 'Y', 'jl@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `komentarvid`
--

CREATE TABLE IF NOT EXISTS `komentarvid` (
  `id_komentar` int NOT NULL AUTO_INCREMENT,
  `id_video` int NOT NULL,
  `nama_komentar` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `url` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `isi_komentar` text CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `tgl` date NOT NULL,
  `jam_komentar` time NOT NULL,
  `aktif` enum('Y','N') CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT 'Y',
  PRIMARY KEY (`id_komentar`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=119 ;

--
-- Dumping data for table `komentarvid`
--

INSERT INTO `komentarvid` (`id_komentar`, `id_video`, `nama_komentar`, `url`, `isi_komentar`, `tgl`, `jam_komentar`, `aktif`) VALUES
(107, 160, 'Prabowo Subianto', 'Prabowo@gmail.com', ' Your  email  address  will  not  be  published.  Required  fields  are  marked', '2014-07-21', '13:29:29', 'N'),
(108, 163, 'Lukman Hakim', 'dankrez48@gmail.com', ' Kita  memang  harus  selamatkan  hutan  indonesia,  walau  apapun  yang  terjadi.   ', '2014-07-21', '13:31:10', 'Y'),
(109, 160, 'Lukman Hakim', 'dankrez48@gmail.com', ' Swarakalibata  V.3 sekarang  hadir  dengan  tampilan  baru  yang  pastinya  sudah  jauh  lebih  maju  dari  versi  sebelumnya.', '2014-07-21', '21:09:31', 'Y'),
(112, 166, 'Lukman Hakim', 'dankrez48@gmail.com', 'Exclusive Di IDAFF Acedemy - &quot;Social Blogging Mastery 2&quot; - Workshop 2 Hari Yang Akan Merubah Hidup Anda Di Tahun 2017. Di Bongkar Oleh Ahlinya Cara Paling Mudah Memiliki Penghasillan Sampingan Lewat Internet Hingga Jutaan Rupiah Setiap Bulannya.', '2017-01-25', '09:40:01', 'Y'),
(113, 166, 'Dewiit Safitri', 'dewiit.safitri@gmail.com', 'Pemimpin tertinggi Iran, Ayatollah Ali Khamenei menyampaikan pernyataan kontroversial terkait ketegangan di Gaza. Khamenei mendorong agar Palestina terus melawan Israel. &quot;Salah satu cara untuk menghentikan rezim kurang ajar ini adalah melanjutkan perlawanan dan dan perjuangan bersenjata harus diperluas ke Tepi Barat,&quot; sebut Khamenei, seperti dikutip dari IRNA.', '2017-01-25', '09:40:55', 'Y'),
(116, 162, 'bandug atmawijaya', 'bandung_api@yahoo.com', 'tidak berprikemanusiaan', '2017-10-04', '10:56:44', 'Y'),
(118, 162, 'maskomen', 'maskomen@ojolali.com', 'komentar testing', '2017-10-04', '13:13:55', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `link`
--

CREATE TABLE IF NOT EXISTS `link` (
  `id_link` int NOT NULL AUTO_INCREMENT,
  `id_parent` int NOT NULL DEFAULT '0',
  `nama_menu` varchar(30) NOT NULL,
  `link` varchar(100) DEFAULT NULL,
  `aktif` enum('Ya','Tidak') NOT NULL DEFAULT 'Ya',
  `groupname` varchar(20) DEFAULT NULL,
  `urutan` int NOT NULL,
  `deskripsi` text,
  `gambar` varchar(30) DEFAULT NULL,
  `icon` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id_link`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `link`
--

INSERT INTO `link` (`id_link`, `id_parent`, `nama_menu`, `link`, `aktif`, `groupname`, `urutan`, `deskripsi`, `gambar`, `icon`) VALUES
(1, 0, 'BISNIS KAMI', '', 'Ya', 'satu', 1, NULL, NULL, NULL),
(2, 1, 'Produk Kami', '', 'Ya', '', 1, 'Kegiatan PERTAMINI dalam menyelenggarakan usaha di bidang energi dan petrokimia, terbagi ke dalam dua sector, yaitu Hulu dan Hilir, serta ditunjang oleh kegiatan Anak-Anak Perusahaan dan Perusahaan Patungan.', 'SPBU.jpg', NULL),
(5, 1, 'Pemegang Saham', '', 'Ya', '', 3, 'Pertamini adalah perusahaan energi nasional yang sahamnya 100% dimiliki oleh Pemerintah Republik Indonesia melalui kementerian Badan usaha milik negara(BUMN) selaku pemegang saham.', 'investor_relation.jpg', ''),
(4, 1, 'Energi Terbarukan', '', 'Ya', '', 2, 'Pertamini mengembangkan energi terbarukan seperti solar photovoltaic (solar cell), mikrohidro, green diesel, bio LNG dan lainnya.', 'renew_energy_PGE.jpg', '');

-- --------------------------------------------------------

--
-- Table structure for table `logo`
--

CREATE TABLE IF NOT EXISTS `logo` (
  `id_logo` int NOT NULL AUTO_INCREMENT,
  `gambar` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id_logo`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=18 ;

--
-- Dumping data for table `logo`
--

INSERT INTO `logo` (`id_logo`, `gambar`) VALUES
(15, 'logomWxU2oLeRihEKouDvQ2UASQpg.logokabkarawang.png');

-- --------------------------------------------------------

--
-- Table structure for table `materi`
--

CREATE TABLE IF NOT EXISTS `materi` (
  `id_materi` int NOT NULL AUTO_INCREMENT,
  `judul_materi` varchar(255) NOT NULL,
  PRIMARY KEY (`id_materi`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE IF NOT EXISTS `member` (
  `id_member` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`id_member`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
  `id_menu` int NOT NULL AUTO_INCREMENT,
  `id_parent` int NOT NULL DEFAULT '0',
  `nama_menu` varchar(30) NOT NULL,
  `link` varchar(100) NOT NULL,
  `aktif` enum('Ya','Tidak') NOT NULL DEFAULT 'Ya',
  `position` enum('Top','Bottom') DEFAULT 'Bottom',
  `urutan` int NOT NULL,
  `deskripsi` text NOT NULL,
  PRIMARY KEY (`id_menu`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=154 ;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id_menu`, `id_parent`, `nama_menu`, `link`, `aktif`, `position`, `urutan`, `deskripsi`) VALUES
(129, 0, 'Profil', '#', 'Ya', 'Bottom', 1, ''),
(150, 0, 'Program', '#', 'Ya', 'Bottom', 2, ''),
(151, 153, 'Rencana Kerja', '#', 'Ya', 'Bottom', 1, ''),
(149, 134, 'Struktur Organisasi', 'struktur-organisasi', 'Ya', 'Bottom', 1, ''),
(131, 134, 'Sejarah', 'sejarah-instansi', 'Ya', 'Bottom', 2, ''),
(132, 134, 'Visi dan Misi', 'visi-dan-misi', 'Ya', 'Bottom', 3, ''),
(153, 150, 'Program Dinas', '#', 'Ya', 'Bottom', 1, ''),
(134, 129, 'Profil Dinas', '#', 'Ya', 'Bottom', 4, ''),
(138, 135, 'BBM Industri', '#', 'Ya', 'Bottom', 2, ''),
(139, 135, 'BBM Pesawat Udara', '#', 'Ya', 'Bottom', 3, ''),
(142, 0, 'MEDIA & INFORMASI', '#', 'Ya', 'Bottom', 3, ''),
(143, 142, 'Berita & Artikel', '#', 'Ya', 'Bottom', 1, ''),
(144, 142, 'AGENDA', '#', 'Ya', 'Bottom', 2, ''),
(145, 144, 'Agenda Kegiatan', 'agenda', 'Ya', 'Bottom', 1, ''),
(146, 143, 'Berita', 'berita', 'Ya', 'Bottom', 1, ''),
(147, 143, 'Galeri', 'albums', 'Ya', 'Bottom', 2, ''),
(148, 143, 'Video', 'playlist', 'Ya', 'Bottom', 3, ''),
(152, 153, 'Rencana Strategis', '#', 'Ya', 'Bottom', 2, '');

-- --------------------------------------------------------

--
-- Table structure for table `metode_pembayaran`
--

CREATE TABLE IF NOT EXISTS `metode_pembayaran` (
  `id` int NOT NULL AUTO_INCREMENT,
  `gambar` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_08_12_082052_update_nullable_columns_in_users_table', 1),
(5, '2024_08_23_022109_create_permission_tables', 2);

-- --------------------------------------------------------

--
-- Table structure for table `mitra`
--

CREATE TABLE IF NOT EXISTS `mitra` (
  `id` int NOT NULL AUTO_INCREMENT,
  `gambar` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE IF NOT EXISTS `model_has_permissions` (
  `permission_id` bigint unsigned NOT NULL,
  `model_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE IF NOT EXISTS `model_has_roles` (
  `role_id` bigint unsigned NOT NULL,
  `model_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `modul`
--

CREATE TABLE IF NOT EXISTS `modul` (
  `id_modul` int NOT NULL AUTO_INCREMENT,
  `nama_modul` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `username` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `link` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `static_content` text CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `gambar` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `publish` enum('Y','N') CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT 'Y',
  `status` enum('user','admin') CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `aktif` enum('Y','N') CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT 'Y',
  `urutan` int NOT NULL,
  `link_seo` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id_modul`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=91 ;

--
-- Dumping data for table `modul`
--

INSERT INTO `modul` (`id_modul`, `nama_modul`, `username`, `link`, `static_content`, `gambar`, `publish`, `status`, `aktif`, `urutan`, `link_seo`) VALUES
(2, 'Manajemen User', 'admin', 'manajemenuser', '', '', 'Y', 'user', 'Y', 0, ''),
(18, 'Berita', 'admin', 'listberita', '', '', 'Y', 'user', 'Y', 0, ''),
(71, 'Background Website', 'admin', 'background', '', '', 'N', 'admin', 'N', 0, ''),
(10, 'Manajemen Modul', 'admin', 'manajemenmodul', '', '', 'Y', 'user', 'Y', 0, ''),
(31, 'Kategori Berita ', 'admin', 'kategorikategori', '', '', 'Y', 'user', 'Y', 0, ''),
(33, 'Jajak Pendapat', 'admin', 'jajakpendapat', '', '', 'Y', 'user', 'Y', 0, ''),
(34, 'Tag Berita', 'admin', 'tagberita', '', '', 'Y', 'user', 'Y', 0, ''),
(35, 'Komentar Berita', 'admin', 'komentarberita', '', '', 'Y', 'user', 'Y', 0, ''),
(41, 'Agenda', 'admin', 'agenda', '', '', 'Y', 'user', 'Y', 0, ''),
(43, 'Berita Foto', 'admin', 'album', '', '', 'Y', 'admin', 'Y', 0, ''),
(44, 'Galeri Berita Foto', 'admin', 'gallery', '', '', 'Y', 'user', 'Y', 0, ''),
(45, 'Template Website', 'admin', 'templatewebsite', '', '', 'Y', 'user', 'Y', 0, ''),
(46, 'Sensor Kata', 'admin', 'sensorkomentar', '', '', 'Y', 'user', 'Y', 0, ''),
(61, 'Identitas Website', 'admin', 'identitaswebsite', '', '', 'Y', 'user', 'Y', 0, ''),
(57, 'Menu Website', 'admin', 'menuwebsite', '', '', 'Y', 'user', 'Y', 0, ''),
(59, 'Halaman Baru', 'admin', 'halamanbaru', '', '', 'Y', 'user', 'Y', 0, ''),
(62, 'Video', 'admin', 'video', '', '', 'Y', 'user', 'Y', 0, ''),
(63, 'Playlist Video', 'admin', 'playlist', '', '', 'Y', 'user', 'Y', 0, ''),
(64, 'Tag Video', 'admin', 'tagvideo', '', '', 'Y', 'user', 'Y', 0, ''),
(65, 'Komentar Video', 'admin', 'komentarvideo', '', '', 'Y', 'user', 'Y', 0, ''),
(66, 'Logo Website', 'admin', 'logowebsite', '', '', 'Y', 'user', 'Y', 0, ''),
(67, 'Iklan Sidebar', 'admin', 'iklansidebar', '', '', 'N', 'admin', 'N', 0, ''),
(68, 'Iklan Home', 'admin', 'iklanhome', '', '', 'N', 'admin', 'N', 0, ''),
(69, 'Iklan Atas', 'admin', 'iklanatas', '', '', 'N', 'admin', 'N', 0, ''),
(70, 'Pesan Masuk', 'admin', 'pesanmasuk', '', '', 'Y', 'user', 'Y', 0, ''),
(72, 'Sekilas Info', 'admin', 'sekilasinfo', '', '', 'N', 'admin', 'N', 0, ''),
(73, 'Yahoo Messanger', 'admin', 'ym', '', '', 'N', 'admin', 'N', 0, ''),
(74, 'Download Area', 'admin', 'download', '', '', 'Y', 'admin', 'Y', 0, ''),
(75, 'Alamat Kontak', 'admin', 'alamat', '', '', 'Y', 'admin', 'Y', 0, ''),
(81, 'IC', 'admin', 'https://localhost/lokodinas/APA', '', '', 'Y', 'admin', 'Y', 0, ''),
(82, 'Testimoni', 'admin', 'testimoni', '', '', 'Y', 'admin', 'Y', 0, ''),
(83, 'Trainer', 'admin', 'trainer', '', '', 'Y', 'admin', 'Y', 0, ''),
(84, 'Program', 'admin', 'program', '', '', 'Y', 'admin', 'Y', 0, ''),
(85, 'Materi', 'admin', 'materi', '', '', 'Y', 'admin', 'Y', 0, ''),
(86, 'Member', 'admin', 'member', '', '', 'Y', 'admin', 'Y', 0, ''),
(87, 'Rating', 'admin', 'rating', '', '', 'Y', 'admin', 'Y', 0, ''),
(88, 'Kategori Program', 'admin', 'kategoriprogram', '', '', 'Y', 'admin', 'Y', 0, ''),
(89, 'Mitra', 'admin', 'mitra', '', '', 'Y', 'admin', 'Y', 0, ''),
(90, 'Metode Pembayaran', 'admin', 'metodepembayaran', '', '', 'Y', 'admin', 'Y', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `mod_alamat`
--

CREATE TABLE IF NOT EXISTS `mod_alamat` (
  `id_alamat` int NOT NULL AUTO_INCREMENT,
  `alamat` text CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id_alamat`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `mod_alamat`
--

INSERT INTO `mod_alamat` (`id_alamat`, `alamat`) VALUES
(1, '<p><strong>Alamat Kantor :&nbsp;</strong>Jl. Ciremai, Karangpawitan, Karawang Bar., Kabupaten Karawang, Jawa Barat 41315</p>\r\n\r\n<p><strong>Telpon :</strong> 0857 1612 9917</p>\r\n\r\n<p><strong>Fax :</strong> 021 88339740</p>\r\n\r\n<p><strong>email : </strong>dankrez48@gmail.com</p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `mod_ym`
--

CREATE TABLE IF NOT EXISTS `mod_ym` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `username` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `ym_icon` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=13 ;

-- --------------------------------------------------------

--
-- Table structure for table `pasangiklan`
--

CREATE TABLE IF NOT EXISTS `pasangiklan` (
  `id_pasangiklan` int NOT NULL AUTO_INCREMENT,
  `judul` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `username` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `url` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `gambar` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `tgl_posting` date NOT NULL,
  PRIMARY KEY (`id_pasangiklan`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=40 ;

--
-- Dumping data for table `pasangiklan`
--

INSERT INTO `pasangiklan` (`id_pasangiklan`, `judul`, `username`, `url`, `gambar`, `tgl_posting`) VALUES
(1, 'Iklan Sidebar Kiri', 'admin', 'http://www.lokomedia.web.id', 'lokomedia.png', '2017-10-11'),
(2, 'Iklan Sidebar Kanan', 'admin', 'http://www.lokomedia.web.id', 'lawan-korupsi.png', '2018-08-31'),
(34, 'apa aja lah semoga bisa', 'admin', 'https://apa.com', 'Dashboard.png', '2024-08-27'),
(39, 'bismillah bisa', 'admin', 'https://members.lokomedia.web.id', 'Screenshot (7).png', '2024-08-31');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE IF NOT EXISTS `permissions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `playlist`
--

CREATE TABLE IF NOT EXISTS `playlist` (
  `id_playlist` int NOT NULL AUTO_INCREMENT,
  `jdl_playlist` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `username` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `playlist_seo` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `gbr_playlist` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `aktif` enum('Y','N') CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT 'Y',
  PRIMARY KEY (`id_playlist`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=76 ;

--
-- Dumping data for table `playlist`
--

INSERT INTO `playlist` (`id_playlist`, `jdl_playlist`, `username`, `playlist_seo`, `gbr_playlist`, `aktif`) VALUES
(61, 'Video Umum', 'admin', 'video-umum', 'karawangku.jpg', 'Y'),
(60, 'Kegiatan Karawang', 'admin', 'kegiatan-karawang', 'ilovekarawang.jpg', 'Y'),
(68, 'MULAIIIII', 'admin', 'minecraft', '1723209275_Screenshot (8).png', 'Y'),
(74, 'Dugong', 'admin', 'dugong', 'Dashboard.png', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `poling`
--

CREATE TABLE IF NOT EXISTS `poling` (
  `id_poling` int NOT NULL AUTO_INCREMENT,
  `pilihan` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `status` varchar(20) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `username` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `rating` int NOT NULL DEFAULT '0',
  `aktif` enum('Y','N') CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id_poling`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=40 ;

--
-- Dumping data for table `poling`
--

INSERT INTO `poling` (`id_poling`, `pilihan`, `status`, `username`, `rating`, `aktif`) VALUES
(18, 'Siapa yang layak jadi juara Liga Champions 2017-2018 ', 'Pertanyaan', 'admin', 0, 'Y'),
(25, 'Real Madrid', 'Jawaban', 'admin', 35, 'Y'),
(31, 'Juventus', 'Jawaban', 'admin', 7, 'Y'),
(32, 'Manchester City', 'Jawaban', 'admin', 9, 'Y'),
(33, 'Paris Saint Germain', 'Jawaban', 'admin', 10, 'Y'),
(35, 'Manchester United', 'Jawaban', 'admin', 10, 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `program`
--

CREATE TABLE IF NOT EXISTS `program` (
  `id_pro` int NOT NULL AUTO_INCREMENT,
  `id_program` varchar(255) NOT NULL,
  `nama_program` varchar(255) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `harga` varchar(100) DEFAULT NULL,
  `keterangan` text,
  `judul` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_pro`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb3 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `program`
--

INSERT INTO `program` (`id_pro`, `id_program`, `nama_program`, `tanggal`, `harga`, `keterangan`, `judul`) VALUES
(1, '2f22c05b2de0041c258ed401e593c0d8', 'Laravel 11 Terbaru 2024', '2024-09-08', 'Rp. 2.000.000', '<p>AYO BELAJAR LARAVEL TERBARU</p>', 'Belajar Laravel React Node js Fundamental');

--
-- Triggers `program`
--
DROP TRIGGER IF EXISTS `after_insert_program`;
DELIMITER //
CREATE TRIGGER `after_insert_program` AFTER INSERT ON `program`
 FOR EACH ROW BEGIN
        INSERT INTO kategori_program_group (id_program, id_kategori)
        SELECT NEW.id_program, id_kategori FROM kategori_program;
    END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE IF NOT EXISTS `rating` (
  `id_rating` int NOT NULL AUTO_INCREMENT,
  `rate` int NOT NULL,
  PRIMARY KEY (`id_rating`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE IF NOT EXISTS `role_has_permissions` (
  `permission_id` bigint unsigned NOT NULL,
  `role_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sekilasinfo`
--

CREATE TABLE IF NOT EXISTS `sekilasinfo` (
  `id_sekilas` int NOT NULL AUTO_INCREMENT,
  `info` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `tgl_posting` date NOT NULL,
  `gambar` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `aktif` enum('Y','N') CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT 'Y',
  PRIMARY KEY (`id_sekilas`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=15 ;

--
-- Dumping data for table `sekilasinfo`
--

INSERT INTO `sekilasinfo` (`id_sekilas`, `info`, `tgl_posting`, `gambar`, `aktif`) VALUES
(1, 'Anak yang mengalami gangguan tidur, cenderung memakai obat2an dan alkohol berlebih saat dewasa.', '2015-04-11', '', 'Y'),
(2, 'WHO merilis, 30 persen anak di dunia kecanduan komputer dan menonton televisi.', '2015-03-16', '', 'Y'),
(3, 'Menurut peneliti di Detroit, orang yang selalu tersenyum lebar cenderung hidup lama.', '2015-04-17', '', 'Y'),
(4, 'Menurut United Stated Trade Representatives, 25% obat yang beredar di adalah palsu.', '2015-04-17', '', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('ikIKjo9qvOQ2IFSkVXNVpH9fRONTf8A1he78TgyZ', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/128.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoib0N2a09WdE13U2Q5TE9mZTlmWk1KR3U4Z1R3d2xuSE90NGlJcXZQYyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjg6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9iZXJpdGEiO319', 1725806283),
('XJRTKzwqXpk3au5lKqiAq8L3C967JYAiLfVw9Ax4', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/128.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiQXBWVkJpRkZFcnl5TnB4MWlIVjVkaXpOeVNGNkVkZ2Z1bmNRaTQyNCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMCI7fX0=', 1725799543);

-- --------------------------------------------------------

--
-- Table structure for table `statistik`
--

CREATE TABLE IF NOT EXISTS `statistik` (
  `ip` varchar(20) NOT NULL DEFAULT '',
  `tanggal` date NOT NULL,
  `hits` int NOT NULL DEFAULT '1',
  `online` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `statistik`
--

INSERT INTO `statistik` (`ip`, `tanggal`, `hits`, `online`) VALUES
('223.255.231.148', '2014-05-06', 1, '1399357334'),
('223.255.231.147', '2014-05-15', 3, '1400119147'),
('223.255.224.73', '2014-05-15', 12, '1400123797'),
('223.255.224.69', '2014-05-16', 2, '1400215103'),
('118.96.51.231', '2014-05-16', 19, '1400233044'),
('223.255.231.146', '2014-05-16', 2, '1400228049'),
('::1', '2014-06-20', 2, '1403230579'),
('::1', '2014-06-22', 8, '1403436591'),
('223.255.231.154', '2014-06-26', 1, '1403739948'),
('223.255.231.148', '2014-06-26', 6, '1403745715'),
('223.255.224.74', '2014-06-26', 1, '1403748060'),
('223.255.224.69', '2014-06-26', 1, '1403753239'),
('223.255.224.77', '2014-06-29', 1, '1404039342'),
('::1', '2014-07-02', 6, '1404277263'),
('127.0.0.1', '2014-07-17', 2, '1405582494'),
('127.0.0.1', '2014-07-21', 1, '1405929828'),
('36.76.60.43', '2014-07-21', 1, '1405951864'),
('223.255.231.154', '2014-07-21', 2, '1405957200'),
('223.255.227.21', '2014-07-22', 1, '1405995171'),
('223.255.231.146', '2014-07-22', 1, '1405997152'),
('223.255.227.21', '2014-07-23', 1, '1406100212'),
('223.255.227.17', '2014-07-23', 1, '1406104552'),
('223.255.227.23', '2014-07-24', 1, '1406168095'),
('223.255.231.153', '2014-07-24', 1, '1406204439'),
('223.255.231.146', '2014-07-25', 1, '1406268985'),
('180.76.5.193', '2014-08-06', 1, '1407302738'),
('180.76.5.23', '2014-08-06', 1, '1407304739'),
('202.67.36.241', '2014-08-06', 1, '1407305643'),
('198.148.27.22', '2014-08-06', 1, '1407306703'),
('180.251.170.42', '2014-08-06', 7, '1407310167'),
('128.199.171.191', '2014-08-06', 3, '1407323435'),
('223.255.231.149', '2014-08-06', 2, '1407309879'),
('223.255.227.28', '2014-08-06', 8, '1407311801'),
('103.24.49.242', '2014-08-06', 1, '1407312326'),
('223.255.231.146', '2014-08-06', 1, '1407313297'),
('180.214.233.34', '2014-08-06', 1, '1407321063'),
('66.249.77.87', '2014-08-06', 1, '1407323509'),
('223.255.227.30', '2014-08-06', 1, '1407325862'),
('180.254.207.13', '2014-08-06', 5, '1407330687'),
('114.79.13.199', '2014-08-06', 1, '1407336900'),
('202.152.199.34', '2014-08-06', 7, '1407337100'),
('180.76.6.21', '2014-08-07', 1, '1407347753'),
('114.79.13.55', '2014-08-07', 3, '1407354277'),
('114.125.41.136', '2014-08-07', 1, '1407352625'),
('180.76.6.147', '2014-08-07', 1, '1407355344'),
('180.76.6.64', '2014-08-07', 1, '1407367237'),
('69.171.247.116', '2014-08-07', 1, '1407379834'),
('69.171.247.119', '2014-08-07', 1, '1407379834'),
('69.171.247.114', '2014-08-07', 1, '1407379834'),
('69.171.247.115', '2014-08-07', 1, '1407379834'),
('202.67.34.29', '2014-08-07', 2, '1407380415'),
('36.76.52.112', '2014-08-07', 1, '1407380496'),
('223.255.231.145', '2014-08-07', 5, '1407387045'),
('223.255.231.153', '2014-08-07', 2, '1407388883'),
('223.255.227.27', '2014-08-07', 1, '1407393087'),
('180.76.5.25', '2014-08-07', 1, '1407394749'),
('223.255.231.146', '2014-08-07', 1, '1407397183'),
('157.55.39.248', '2014-08-07', 1, '1407397231'),
('180.254.200.55', '2014-08-07', 2, '1407399466'),
('110.139.67.15', '2014-08-07', 8, '1407399221'),
('180.242.17.64', '2014-08-07', 11, '1407414373'),
('141.0.8.59', '2014-08-07', 1, '1407412384'),
('110.76.149.91', '2014-08-07', 1, '1407422367'),
('223.255.231.151', '2014-08-07', 3, '1407426943'),
('82.145.209.206', '2014-08-07', 1, '1407430369'),
('223.255.227.28', '2014-08-08', 3, '1407469589'),
('66.93.156.50', '2014-08-08', 1, '1407472340'),
('202.62.17.47', '2014-08-08', 1, '1407484393'),
('36.70.135.163', '2014-08-08', 6, '1407485987'),
('173.252.74.115', '2014-08-08', 1, '1407485153'),
('118.96.58.136', '2014-08-08', 2, '1407486347'),
('114.79.29.68', '2014-08-08', 1, '1407502537'),
('66.220.156.113', '2014-08-08', 1, '1407503375'),
('112.215.66.79', '2014-08-08', 1, '1407503381'),
('125.163.113.156', '2014-08-08', 9, '1407508824'),
('180.76.5.94', '2014-08-08', 1, '1407508624'),
('120.172.9.192', '2014-08-08', 1, '1407515634'),
('202.67.41.51', '2014-08-08', 1, '1407515702'),
('180.253.243.222', '2014-08-09', 1, '1407542724'),
('36.75.224.20', '2014-08-09', 1, '1407548005'),
('180.76.5.65', '2014-08-09', 1, '1407548865'),
('66.249.77.77', '2014-08-09', 2, '1407582711'),
('180.76.6.137', '2014-08-09', 1, '1407553037'),
('66.249.77.87', '2014-08-09', 1, '1407554836'),
('66.249.77.97', '2014-08-09', 2, '1407562640'),
('120.177.44.126', '2014-08-09', 2, '1407558625'),
('223.255.231.145', '2014-08-09', 3, '1407558663'),
('36.73.64.113', '2014-08-09', 1, '1407558640'),
('36.72.187.12', '2014-08-09', 1, '1407560351'),
('202.67.41.51', '2014-08-09', 1, '1407561096'),
('114.125.60.68', '2014-08-09', 4, '1407561514'),
('202.67.40.50', '2014-08-09', 1, '1407562007'),
('180.76.6.136', '2014-08-09', 1, '1407562581'),
('110.232.81.2', '2014-08-09', 5, '1407563275'),
('146.185.28.59', '2014-08-09', 1, '1407564768'),
('120.174.157.139', '2014-08-09', 1, '1407568139'),
('223.255.227.23', '2014-08-09', 2, '1407570163'),
('193.105.210.119', '2014-08-09', 1, '1407577518'),
('125.162.57.66', '2014-08-09', 2, '1407579822'),
('180.241.163.1', '2014-08-09', 8, '1407580493'),
('36.76.44.163', '2014-08-09', 6, '1407603574'),
('180.76.5.144', '2014-08-09', 1, '1407582757'),
('107.167.103.40', '2014-08-09', 1, '1407586189'),
('36.68.48.23', '2014-08-09', 1, '1407586974'),
('192.99.218.151', '2014-08-09', 4, '1407587574'),
('36.74.55.24', '2014-08-09', 3, '1407589161'),
('118.97.212.184', '2014-08-09', 8, '1407595169'),
('36.72.114.118', '2014-08-09', 2, '1407597684'),
('180.76.5.153', '2014-08-09', 1, '1407602870'),
('180.76.5.59', '2014-08-09', 1, '1407603153'),
('180.76.5.18', '2014-08-10', 1, '1407606581'),
('180.254.155.156', '2014-08-10', 2, '1407607003'),
('180.76.6.42', '2014-08-10', 1, '1407608363'),
('36.68.242.217', '2014-08-10', 5, '1407627100'),
('66.249.77.77', '2014-08-10', 2, '1407633623'),
('202.67.44.64', '2014-08-10', 1, '1407629598'),
('180.76.6.43', '2014-08-10', 1, '1407631270'),
('118.97.212.182', '2014-08-10', 4, '1407632228'),
('139.0.102.140', '2014-08-10', 1, '1407633944'),
('66.249.77.87', '2014-08-10', 1, '1407636902'),
('66.249.77.97', '2014-08-10', 1, '1407639983'),
('180.76.6.159', '2014-08-10', 1, '1407640798'),
('118.97.212.181', '2014-08-10', 3, '1407642556'),
('36.68.46.37', '2014-08-10', 2, '1407642940'),
('180.76.5.69', '2014-08-10', 1, '1407645158'),
('180.76.5.80', '2014-08-10', 1, '1407648268'),
('180.76.5.143', '2014-08-10', 1, '1407650068'),
('223.255.231.145', '2014-08-10', 1, '1407650216'),
('180.76.6.149', '2014-08-10', 1, '1407657020'),
('36.77.183.218', '2014-08-10', 2, '1407657119'),
('127.0.0.1', '2014-08-10', 2, '1407660057'),
('127.0.0.1', '2014-08-11', 2, '1407725194'),
('127.0.0.1', '2014-08-12', 1, '1407862185'),
('127.0.0.1', '2014-08-13', 1, '1407899819'),
('127.0.0.1', '2014-08-17', 44, '1408287630'),
('127.0.0.1', '2014-08-18', 253, '1408372590'),
('127.0.0.1', '2014-08-19', 4, '1408413702'),
('::1', '2014-08-19', 90, '1408433250'),
('::1', '2014-08-31', 1, '1409487043'),
('::1', '2015-03-11', 11, '1426061663'),
('::1', '2015-03-12', 1, '1426114982'),
('::1', '2015-03-15', 32, '1426430637'),
('::1', '2015-03-18', 137, '1426666506'),
('::1', '2015-03-19', 143, '1426751746'),
('::1', '2015-03-21', 198, '1426912294'),
('::1', '2015-03-22', 554, '1427039069'),
('127.0.0.1', '2015-03-22', 1, '1427030317'),
('::1', '2015-03-23', 275, '1427093113'),
('::1', '2015-03-24', 42, '1427179474'),
('::1', '2015-03-25', 45, '1427251499'),
('39.225.164.2', '2015-05-14', 7, '1431584409'),
('119.110.72.130', '2015-05-14', 30, '1431595368'),
('89.145.95.2', '2015-05-14', 1, '1431582645'),
('66.220.158.118', '2015-05-14', 1, '1431582842'),
('66.220.158.115', '2015-05-14', 1, '1431582852'),
('66.220.158.112', '2015-05-14', 3, '1431595371'),
('66.220.158.119', '2015-05-14', 1, '1431582942'),
('114.125.43.185', '2015-05-14', 5, '1431602132'),
('119.110.72.130', '2015-05-15', 1, '1431673658'),
('114.125.45.206', '2015-05-16', 18, '1431741581'),
('66.220.158.116', '2015-05-16', 1, '1431741049'),
('66.220.158.118', '2015-05-16', 1, '1431741224'),
('66.220.158.114', '2015-05-16', 1, '1431741233'),
('39.229.6.148', '2015-05-16', 11, '1431791037'),
('39.225.236.155', '2015-05-17', 8, '1431862096'),
('119.110.72.130', '2015-05-19', 6, '1432006569'),
('89.145.95.42', '2015-05-19', 2, '1432006661'),
('114.121.133.117', '2015-05-19', 3, '1432046663'),
('124.195.114.65', '2015-05-28', 16, '1432832381'),
('66.220.158.119', '2015-05-28', 1, '1432831000'),
('66.220.158.115', '2015-05-28', 1, '1432831013'),
('66.220.158.116', '2015-05-28', 1, '1432832385'),
('124.195.114.65', '2015-05-29', 77, '1432836214'),
('66.220.158.113', '2015-05-29', 1, '1432835961'),
('66.249.84.178', '2015-05-29', 1, '1432836220'),
('103.246.200.14', '2015-05-29', 1, '1432851867'),
('103.246.200.59', '2015-05-29', 1, '1432851916'),
('114.124.5.250', '2015-05-29', 6, '1432852876'),
('173.252.105.114', '2015-05-29', 1, '1432852770'),
('120.180.175.150', '2015-05-29', 36, '1432864082'),
('103.246.200.50', '2015-05-29', 1, '1432863615'),
('103.246.200.1', '2015-05-29', 1, '1432863650'),
('103.246.200.33', '2015-05-29', 1, '1432863711'),
('103.246.200.44', '2015-05-29', 1, '1432863795'),
('120.174.144.115', '2015-05-29', 1, '1432908445'),
('119.110.72.130', '2015-05-29', 27, '1432912022'),
('173.252.90.117', '2015-05-29', 1, '1432910852'),
('173.252.90.116', '2015-05-29', 1, '1432910873'),
('173.252.90.118', '2015-05-29', 1, '1432911344'),
('173.252.90.122', '2015-05-29', 1, '1432911470'),
('66.249.84.190', '2015-05-30', 1, '1432945579'),
('39.254.117.222', '2015-05-30', 1, '1432991226'),
('66.249.84.178', '2015-05-31', 1, '1433037242'),
('120.176.92.190', '2015-06-01', 3, '1433128955'),
('66.102.6.210', '2015-06-01', 1, '1433134430'),
('120.164.44.28', '2015-06-01', 13, '1433149419'),
('124.195.118.227', '2015-06-01', 1, '1433170960'),
('120.177.28.244', '2015-06-02', 8, '1433220043'),
('66.249.84.190', '2015-06-02', 1, '1433247837'),
('120.190.75.179', '2015-06-03', 7, '1433302768'),
('119.110.72.130', '2015-06-03', 4, '1433302761'),
('89.145.95.2', '2015-06-03', 1, '1433302690'),
('66.249.71.147', '2015-06-07', 46, '1433696370'),
('66.249.71.130', '2015-06-07', 30, '1433696150'),
('66.249.71.164', '2015-06-07', 37, '1433696154'),
('173.252.74.113', '2015-06-07', 8, '1433694061'),
('173.252.74.117', '2015-06-07', 3, '1433676319'),
('66.249.64.57', '2015-06-07', 1, '1433674283'),
('173.252.88.89', '2015-06-07', 5, '1433677999'),
('173.252.88.86', '2015-06-07', 2, '1433677597'),
('173.252.74.119', '2015-06-07', 7, '1433694862'),
('66.249.79.117', '2015-06-07', 1, '1433674983'),
('173.252.88.84', '2015-06-07', 2, '1433676738'),
('173.252.74.115', '2015-06-07', 3, '1433676460'),
('173.252.74.114', '2015-06-07', 2, '1433694204'),
('173.252.74.118', '2015-06-07', 3, '1433676180'),
('173.252.74.112', '2015-06-07', 5, '1433695314'),
('173.252.88.85', '2015-06-07', 2, '1433677804'),
('173.252.88.90', '2015-06-07', 1, '1433676251'),
('173.252.74.116', '2015-06-07', 5, '1433695249'),
('173.252.88.87', '2015-06-07', 2, '1433677488'),
('173.252.88.88', '2015-06-07', 1, '1433677370'),
('66.249.79.130', '2015-06-07', 1, '1433694848'),
('66.220.156.116', '2015-06-07', 2, '1433696197'),
('66.249.67.104', '2015-06-07', 1, '1433696147'),
('66.220.156.112', '2015-06-07', 2, '1433696173'),
('66.220.146.22', '2015-06-07', 1, '1433696162'),
('66.249.67.117', '2015-06-07', 1, '1433696288'),
('66.220.156.114', '2015-06-07', 1, '1433696309'),
('66.220.156.117', '2015-06-08', 3, '1433711204'),
('66.249.71.164', '2015-06-08', 32, '1433779112'),
('66.220.146.25', '2015-06-08', 2, '1433736854'),
('66.220.156.116', '2015-06-08', 2, '1433709422'),
('66.249.71.147', '2015-06-08', 29, '1433748751'),
('66.220.156.112', '2015-06-08', 4, '1433715007'),
('66.220.146.20', '2015-06-08', 1, '1433696744'),
('66.249.71.130', '2015-06-08', 38, '1433777391'),
('66.220.156.118', '2015-06-08', 2, '1433712628'),
('66.220.146.27', '2015-06-08', 1, '1433712556'),
('66.220.146.26', '2015-06-08', 1, '1433712746'),
('66.249.67.104', '2015-06-08', 4, '1433746797'),
('66.220.146.22', '2015-06-08', 1, '1433714244'),
('66.220.156.115', '2015-06-08', 2, '1433714821'),
('66.249.67.117', '2015-06-08', 2, '1433780504'),
('120.176.251.49', '2015-06-08', 2, '1433737104'),
('66.220.156.119', '2015-06-08', 1, '1433737457'),
('66.249.71.147', '2015-06-09', 3, '1433836081'),
('66.249.71.130', '2015-06-09', 4, '1433835126'),
('66.249.67.104', '2015-06-09', 1, '1433788622'),
('66.249.71.164', '2015-06-09', 1, '1433823064'),
('66.249.71.130', '2015-06-10', 5, '1433953790'),
('66.249.67.117', '2015-06-10', 1, '1433911605'),
('66.249.71.164', '2015-06-10', 3, '1433954890'),
('66.249.71.147', '2015-06-10', 2, '1433953573'),
('66.249.71.147', '2015-06-11', 1, '1433957808'),
('66.249.71.164', '2015-06-11', 2, '1433990805'),
('68.180.228.104', '2015-06-11', 1, '1433975257'),
('66.249.71.130', '2015-06-11', 1, '1433991891'),
('36.68.28.19', '2015-06-14', 5, '1434224041'),
('120.164.46.127', '2015-06-14', 2, '1434239557'),
('66.249.67.248', '2015-06-15', 1, '1434362861'),
('104.193.10.50', '2015-06-15', 3, '1434372762'),
('104.193.10.50', '2015-06-16', 2, '1434454308'),
('36.80.234.114', '2015-06-16', 4, '1434443273'),
('173.252.74.115', '2015-06-16', 1, '1434443264'),
('173.252.74.114', '2015-06-16', 1, '1434443279'),
('119.110.72.130', '2015-06-16', 1, '1434467216'),
('124.195.116.71', '2015-06-17', 3, '1434551738'),
('120.184.130.21', '2015-06-27', 1, '1435386862'),
('66.249.84.246', '2015-06-27', 1, '1435387150'),
('120.176.176.106', '2015-06-28', 7, '1435461088'),
('66.220.158.114', '2015-06-28', 1, '1435461007'),
('66.249.84.129', '2015-06-28', 1, '1435466083'),
('66.249.84.246', '2015-06-29', 2, '1435563211'),
('66.249.84.252', '2015-06-29', 1, '1435563206'),
('66.249.84.246', '2015-06-30', 3, '1435677685'),
('66.249.84.252', '2015-06-30', 1, '1435645799'),
('66.249.84.252', '2015-07-01', 1, '1435710707'),
('66.249.84.129', '2015-07-01', 1, '1435711780'),
('120.177.18.200', '2015-07-02', 1, '1435824891'),
('::1', '2015-11-25', 15, '1448407930'),
('::1', '2015-12-01', 12, '1448944568'),
('::1', '2015-12-03', 9, '1449138520'),
('::1', '2015-12-05', 26, '1449279360'),
('::1', '2015-12-07', 4, '1449442678'),
('::1', '2015-12-08', 8, '1449532582'),
('::1', '2015-12-13', 31, '1449974628'),
('::1', '2015-12-18', 9, '1450418535'),
('::1', '2015-12-21', 10, '1450654644'),
('::1', '2015-12-24', 3, '1450917714'),
('::1', '2015-12-25', 4, '1451037761'),
('::1', '2015-12-26', 5, '1451086546'),
('::1', '2016-01-01', 1, '1451626224'),
('::1', '2016-01-12', 2, '1452564572'),
('::1', '2016-01-16', 7, '1452913899'),
('::1', '2016-01-17', 150, '1453036730'),
('::1', '2016-07-24', 24, '1469318037'),
('::1', '2016-07-29', 1, '1469767572'),
('::1', '2016-07-31', 1, '1469936872'),
('::1', '2016-08-01', 14, '1470019073'),
('::1', '2016-08-12', 4, '1470940786'),
('::1', '2016-08-14', 3, '1471191885'),
('::1', '2016-08-22', 5, '1471851644'),
('::1', '2016-08-26', 4, '1472207940'),
('::1', '2016-08-29', 9, '1472475500'),
('::1', '2016-08-30', 1, '1472531831'),
('::1', '2016-09-13', 4, '1473760584'),
('::1', '2016-09-16', 7, '1473998550'),
('::1', '2016-09-17', 3, '1474076080'),
('::1', '2016-09-20', 4, '1474335445'),
('::1', '2016-09-21', 5, '1474470987'),
('::1', '2016-09-26', 8, '1474866854'),
('::1', '2016-11-21', 20, '1479719811'),
('::1', '2016-11-22', 26, '1479795839'),
('::1', '2016-12-24', 1, '1482592503'),
('::1', '2016-12-23', 2, '1482451494'),
('::1', '2016-12-20', 7, '1482205377'),
('::1', '2016-12-14', 4, '1481717872'),
('::1', '2016-12-13', 24, '1481593512'),
('::1', '2016-12-09', 1, '1481243159'),
('::1', '2016-12-03', 3, '1480741491'),
('::1', '2016-11-28', 32, '1480303392'),
('::1', '2016-11-27', 2, '1480224412'),
('::1', '2016-11-24', 403, '1479984680'),
('::1', '2016-11-23', 2, '1479913316'),
('::1', '2017-01-03', 9, '1483421812'),
('::1', '2017-01-04', 2, '1483534977'),
('::1', '2017-01-05', 3, '1483627230'),
('::1', '2017-01-14', 1, '1484352852'),
('::1', '2017-01-17', 3, '1484663823'),
('::1', '2017-01-25', 12, '1485359750'),
('::1', '2017-01-26', 37, '1485414680'),
('::1', '2017-01-27', 70, '1485508785'),
('::1', '2017-01-28', 1, '1485567010'),
('::1', '2017-02-04', 1, '1486213804'),
('::1', '2017-02-09', 14, '1486659480'),
('::1', '2017-02-10', 3, '1486684650'),
('::1', '2017-02-11', 11, '1486773431'),
('::1', '2017-02-12', 6, '1486869838'),
('::1', '2017-02-13', 5, '1486995163'),
('::1', '2017-02-15', 3, '1487123924'),
('::1', '2017-02-21', 1, '1487659967'),
('::1', '2017-02-23', 7, '1487832476'),
('::1', '2017-02-26', 4, '1488064851'),
('::1', '2017-03-13', 44, '1489366890'),
('::1', '2017-03-17', 24, '1489744337'),
('::1', '2017-03-20', 1, '1489988038'),
('::1', '2017-03-25', 1, '1490413626'),
('::1', '2017-03-29', 7, '1490744633'),
('::1', '2017-04-02', 1, '1491122695'),
('::1', '2017-04-06', 56, '1491462329'),
('::1', '2017-04-07', 59, '1491524075'),
('::1', '2017-04-09', 20, '1491711058'),
('::1', '2017-04-11', 9, '1491877995'),
('::1', '2017-04-12', 124, '1492006218'),
('::1', '2017-04-13', 53, '1492088580'),
('::1', '2017-05-14', 133, '1494767093'),
('::1', '2017-05-20', 167, '1495299592'),
('::1', '2017-05-21', 234, '1495359950'),
('::1', '2017-05-29', 1, '1496031966'),
('::1', '2017-08-04', 2, '1501862778'),
('::1', '2017-08-05', 3, '1501890677'),
('::1', '2017-09-13', 5, '1505272460'),
('::1', '2017-09-22', 5, '1506065936'),
('::1', '2017-09-24', 6, '1506263121'),
('::1', '2017-09-27', 1, '1506491577'),
('::1', '2017-09-28', 20, '1506614988'),
('::1', '2017-09-29', 308, '1506696202'),
('::1', '2017-09-30', 495, '1506783608'),
('::1', '2017-10-01', 77, '1506868529'),
('::1', '2017-10-02', 353, '1506962237'),
('::1', '2017-10-03', 16, '1507035971'),
('::1', '2017-10-04', 159, '1507123395'),
('::1', '2017-10-05', 38, '1507218119'),
('::1', '2017-10-06', 68, '1507275289'),
('::1', '2017-10-07', 1, '1507361033'),
('::1', '2017-10-08', 1, '1507413903'),
('::1', '2017-10-11', 4, '1507704206'),
('::1', '2017-10-31', 8, '1509435169'),
('::1', '2017-11-11', 1, '1510417532'),
('::1', '2017-11-12', 45, '1510481123'),
('::1', '2017-11-13', 38, '1510568837'),
('::1', '2018-08-25', 30, '1535191969'),
('::1', '2018-08-26', 2, '1535246562'),
('::1', '2018-08-27', 7, '1535378738'),
('::1', '2018-08-30', 1, '1535576820'),
('::1', '2018-08-31', 9, '1535732014'),
('110.138.150.110', '2018-12-03', 2, '1543855812'),
('110.138.150.110', '2018-12-04', 11, '1543857572'),
('115.178.251.153', '2018-12-08', 1, '1544231764'),
('141.8.142.101', '2018-12-13', 1, '1544651736'),
('::1', '2018-12-15', 3, '1544864222'),
('::1', '2018-12-20', 47, '1545303770'),
('202.150.144.150', '2018-12-20', 2, '1545304092'),
('125.161.84.181', '2018-12-20', 10, '1545322660'),
('66.96.228.105', '2018-12-21', 1, '1545355325'),
('125.161.84.181', '2018-12-22', 4, '1545434346'),
('182.0.180.19', '2018-12-22', 2, '1545441562'),
('182.0.204.171', '2018-12-22', 1, '1545494525'),
('118.96.92.133', '2018-12-23', 6, '1545515886'),
('114.124.174.146', '2018-12-23', 1, '1545542696'),
('125.161.84.181', '2018-12-23', 2, '1545578365'),
('66.96.228.105', '2018-12-25', 1, '1545723398'),
('66.249.71.76', '2018-12-26', 1, '1545771742'),
('66.249.71.82', '2018-12-26', 1, '1545776597'),
('103.22.251.190', '2018-12-27', 20, '1545898631'),
('180.244.165.111', '2018-12-27', 2, '1545919245'),
('110.138.150.46', '2018-12-27', 6, '1545923315'),
('54.209.60.63', '2018-12-27', 4, '1545923686'),
('54.86.66.252', '2018-12-27', 2, '1545923641'),
('54.175.74.27', '2018-12-27', 2, '1545922745'),
('103.22.251.190', '2018-12-28', 3, '1545958383'),
('103.44.37.205', '2018-12-28', 1, '1546008406'),
('114.124.200.121', '2018-12-28', 1, '1546014138'),
('66.249.71.74', '2018-12-29', 4, '1546093329'),
('95.108.181.111', '2018-12-29', 1, '1546083508'),
('66.249.71.76', '2018-12-29', 3, '1546094904'),
('66.249.71.78', '2018-12-29', 1, '1546088814'),
('66.249.71.80', '2018-12-29', 1, '1546102275'),
('66.249.71.78', '2018-12-30', 7, '1546180864'),
('66.249.71.74', '2018-12-30', 3, '1546133664'),
('66.249.71.76', '2018-12-30', 3, '1546184016'),
('66.249.71.82', '2018-12-30', 3, '1546138236'),
('66.249.71.84', '2018-12-30', 1, '1546135653'),
('180.252.123.89', '2018-12-30', 40, '1546161736'),
('54.209.60.63', '2018-12-30', 5, '1546162023'),
('120.188.83.157', '2018-12-30', 6, '1546144279'),
('54.86.66.252', '2018-12-30', 5, '1546161946'),
('184.72.115.35', '2018-12-30', 4, '1546161969'),
('66.249.71.78', '2018-12-31', 5, '1546271778'),
('103.22.251.190', '2018-12-31', 4, '1546221825'),
('180.252.123.89', '2018-12-31', 15, '1546245979'),
('54.175.74.27', '2018-12-31', 1, '1546242394'),
('66.249.71.76', '2018-12-31', 2, '1546275362'),
('66.249.71.74', '2018-12-31', 4, '1546271554'),
('66.249.71.76', '2019-01-01', 3, '1546281298'),
('66.249.71.78', '2019-01-01', 3, '1546358903'),
('66.249.71.80', '2019-01-01', 2, '1546358238'),
('141.8.142.118', '2019-01-01', 1, '1546290175'),
('37.9.113.33', '2019-01-01', 1, '1546290440'),
('66.249.71.74', '2019-01-01', 2, '1546359634'),
('66.249.71.82', '2019-01-01', 1, '1546351958'),
('66.249.71.78', '2019-01-02', 9, '1546381496'),
('66.249.79.10', '2019-01-02', 1, '1546367648'),
('66.249.71.76', '2019-01-02', 11, '1546382015'),
('66.249.71.74', '2019-01-02', 7, '1546382234'),
('141.8.142.101', '2019-01-02', 1, '1546372600'),
('103.22.251.190', '2019-01-02', 3, '1546420295'),
('202.150.144.150', '2019-01-02', 57, '1546426821'),
('54.209.60.63', '2019-01-02', 2, '1546425896'),
('178.154.171.43', '2019-01-02', 1, '1546412093'),
('54.86.66.252', '2019-01-02', 2, '1546425896'),
('52.71.155.178', '2019-01-02', 1, '1546422347'),
('180.243.245.25', '2019-01-02', 3, '1546444927'),
('180.243.245.25', '2019-01-03', 4, '1546453402'),
('115.178.212.29', '2019-01-03', 2, '1546473425'),
('87.228.16.238', '2019-01-03', 1, '1546471759'),
('103.22.251.190', '2019-01-03', 1, '1546475762'),
('66.249.71.76', '2019-01-03', 1, '1546512495'),
('120.188.81.189', '2019-01-03', 4, '1546518823'),
('66.249.71.78', '2019-01-03', 2, '1546532293'),
('95.108.181.108', '2019-01-03', 1, '1546519335'),
('66.249.71.82', '2019-01-03', 1, '1546519914'),
('66.249.71.74', '2019-01-03', 2, '1546527893'),
('66.249.71.84', '2019-01-03', 3, '1546528804'),
('66.249.71.80', '2019-01-03', 3, '1546532408'),
('66.249.71.78', '2019-01-04', 1, '1546534824'),
('104.248.145.107', '2019-01-04', 1, '1546557103'),
('178.154.171.43', '2019-01-04', 1, '1546557759'),
('66.249.71.76', '2019-01-04', 2, '1546619005'),
('103.22.251.190', '2019-01-04', 1, '1546564131'),
('202.150.144.150', '2019-01-04', 1, '1546581657'),
('37.9.113.33', '2019-01-04', 2, '1546620746'),
('66.249.71.74', '2019-01-04', 2, '1546614909'),
('141.8.142.101', '2019-01-04', 1, '1546620720'),
('180.251.137.168', '2019-01-04', 1, '1546621034'),
('180.251.137.168', '2019-01-05', 25, '1546683617'),
('115.178.216.75', '2019-01-05', 1, '1546623156'),
('66.249.71.74', '2019-01-05', 6, '1546704536'),
('66.249.71.78', '2019-01-05', 4, '1546704014'),
('66.249.71.76', '2019-01-05', 8, '1546703841'),
('66.249.71.80', '2019-01-05', 2, '1546694494'),
('104.248.145.116', '2019-01-05', 1, '1546657479'),
('114.124.182.232', '2019-01-05', 1, '1546659127'),
('5.164.160.213', '2019-01-05', 1, '1546666662'),
('188.166.231.101', '2019-01-05', 1, '1546666747'),
('110.138.149.80', '2019-01-05', 11, '1546668934'),
('52.71.155.178', '2019-01-05', 1, '1546667125'),
('184.72.115.35', '2019-01-05', 3, '1546680722'),
('54.209.60.63', '2019-01-05', 1, '1546680108'),
('128.199.120.251', '2019-01-05', 1, '1546680849'),
('46.0.128.100', '2019-01-05', 1, '1546699582'),
('66.249.71.128', '2019-01-05', 1, '1546704884'),
('66.249.71.76', '2019-01-06', 2, '1546714454'),
('66.249.71.78', '2019-01-06', 1, '1546710191'),
('66.249.71.74', '2019-01-06', 1, '1546714541'),
('180.251.137.168', '2019-01-06', 3, '1546785568'),
('141.8.142.101', '2019-01-06', 1, '1546729850'),
('120.188.80.197', '2019-01-06', 2, '1546755787'),
('66.249.71.82', '2019-01-06', 1, '1546757963'),
('52.71.155.178', '2019-01-06', 1, '1546769595'),
('23.237.4.26', '2019-01-06', 2, '1546775616'),
('37.9.113.33', '2019-01-06', 1, '1546779451'),
('141.8.142.118', '2019-01-06', 1, '1546779452'),
('103.22.251.190', '2019-01-07', 1, '1546826016'),
('202.150.144.150', '2019-01-07', 38, '1546859174'),
('54.209.60.63', '2019-01-07', 1, '1546827241'),
('83.217.214.72', '2019-01-07', 1, '1546846866'),
('52.71.155.178', '2019-01-07', 3, '1546859561'),
('54.175.74.27', '2019-01-07', 2, '1546874023'),
('54.86.66.252', '2019-01-07', 1, '1546859682'),
('180.251.137.168', '2019-01-07', 4, '1546880192'),
('64.62.232.44', '2019-01-07', 2, '1546878448'),
('184.72.115.35', '2019-01-07', 1, '1546880294'),
('180.251.137.168', '2019-01-08', 5, '1546880656'),
('184.72.115.35', '2019-01-08', 2, '1546881582'),
('54.175.74.27', '2019-01-08', 1, '1546881571'),
('52.71.155.178', '2019-01-08', 2, '1546881574'),
('95.220.210.29', '2019-01-08', 1, '1546903469'),
('37.9.113.160', '2019-01-08', 1, '1546926519'),
('180.251.137.168', '2019-01-09', 33, '1546985750'),
('54.209.60.63', '2019-01-09', 6, '1547026088'),
('52.71.155.178', '2019-01-09', 5, '1547026077'),
('54.86.66.252', '2019-01-09', 6, '1547017403'),
('141.8.142.101', '2019-01-09', 1, '1546983406'),
('89.179.106.247', '2019-01-09', 1, '1546986303'),
('66.249.71.84', '2019-01-09', 1, '1546991500'),
('202.150.144.150', '2019-01-09', 13, '1547016954'),
('184.72.115.35', '2019-01-09', 1, '1547017333'),
('103.22.251.190', '2019-01-09', 2, '1547022365'),
('54.175.74.27', '2019-01-09', 2, '1547026082'),
('37.9.113.33', '2019-01-09', 1, '1547049359'),
('37.9.113.33', '2019-01-10', 1, '1547090069'),
('141.8.142.101', '2019-01-10', 1, '1547093177'),
('37.146.193.228', '2019-01-10', 1, '1547127127'),
('141.8.142.101', '2019-01-11', 2, '1547209800'),
('202.150.144.150', '2019-01-11', 1, '1547172971'),
('52.71.155.178', '2019-01-11', 1, '1547173755'),
('23.237.4.26', '2019-01-11', 3, '1547199054'),
('109.173.101.59', '2019-01-11', 1, '1547199506'),
('128.69.144.84', '2019-01-11', 1, '1547214129'),
('110.138.148.38', '2019-01-11', 16, '1547225754'),
('54.86.66.252', '2019-01-11', 1, '1547219107'),
('110.138.148.38', '2019-01-12', 20, '1547303273'),
('52.71.155.178', '2019-01-12', 4, '1547228730'),
('54.86.66.252', '2019-01-12', 5, '1547232009'),
('184.72.115.35', '2019-01-12', 3, '1547229560'),
('89.178.225.19', '2019-01-12', 1, '1547248233'),
('182.1.119.89', '2019-01-12', 5, '1547249832'),
('37.204.142.87', '2019-01-12', 1, '1547277032'),
('176.15.231.136', '2019-01-12', 1, '1547289512'),
('128.204.21.113', '2019-01-12', 1, '1547306851'),
('87.228.16.238', '2019-01-13', 1, '1547320904'),
('37.9.113.14', '2019-01-13', 1, '1547324807'),
('178.154.171.37', '2019-01-13', 1, '1547351095'),
('128.204.35.230', '2019-01-13', 1, '1547366690'),
('87.240.53.31', '2019-01-14', 1, '1547404303'),
('37.110.50.217', '2019-01-14', 1, '1547404303'),
('46.42.160.194', '2019-01-14', 1, '1547422958'),
('202.150.144.150', '2019-01-14', 1, '1547432637'),
('104.194.2.5', '2019-01-14', 2, '1547432689'),
('54.86.66.252', '2019-01-14', 1, '1547433211'),
('110.138.149.40', '2019-01-14', 9, '1547447218'),
('54.209.60.63', '2019-01-14', 1, '1547458935'),
('110.138.148.38', '2019-01-14', 1, '1547461372'),
('141.8.142.101', '2019-01-14', 1, '1547479426'),
('128.68.218.162', '2019-01-15', 1, '1547498440'),
('37.9.113.14', '2019-01-15', 1, '1547520494'),
('222.124.217.26', '2019-01-16', 1, '1547629265'),
('46.188.24.155', '2019-01-16', 1, '1547631248'),
('141.8.142.101', '2019-01-16', 1, '1547638678'),
('37.9.113.33', '2019-01-16', 1, '1547649522'),
('141.8.142.101', '2019-01-17', 2, '1547735025'),
('37.146.193.228', '2019-01-17', 1, '1547665797'),
('36.70.60.2', '2019-01-17', 6, '1547713187'),
('202.150.144.150', '2019-01-17', 3, '1547711426'),
('110.138.148.230', '2019-01-17', 1, '1547730077'),
('5.45.207.60', '2019-01-17', 1, '1547735136'),
('110.138.148.230', '2019-01-18', 1, '1547759471'),
('128.68.218.162', '2019-01-18', 1, '1547766416'),
('202.150.144.150', '2019-01-18', 1, '1547775804'),
('180.252.140.255', '2019-01-22', 1, '1548109830'),
('54.175.74.27', '2019-01-22', 1, '1548110013'),
('87.250.224.114', '2019-01-22', 1, '1548120027'),
('141.8.142.162', '2019-01-22', 1, '1548121656'),
('141.8.142.101', '2019-01-22', 1, '1548156434'),
('87.250.224.124', '2019-01-26', 2, '1548487746'),
('141.8.142.192', '2019-01-26', 1, '1548447970'),
('141.8.142.127', '2019-01-26', 1, '1548480194'),
('213.180.203.29', '2019-01-26', 1, '1548480197'),
('5.255.253.3', '2019-01-26', 1, '1548486810'),
('178.154.244.18', '2019-01-26', 1, '1548487113'),
('66.249.71.76', '2019-01-27', 1, '1548565319'),
('66.249.71.78', '2019-01-28', 1, '1548629575'),
('141.8.142.101', '2019-01-28', 1, '1548680146'),
('115.178.209.32', '2019-01-29', 5, '1548706917'),
('114.6.76.2', '2019-01-29', 1, '1548724521'),
('125.161.106.233', '2019-01-29', 1, '1548728754'),
('103.14.44.130', '2019-01-29', 2, '1548766351'),
('103.233.154.10', '2019-01-29', 3, '1548740261'),
('36.78.75.90', '2019-01-29', 1, '1548746371'),
('163.53.186.2', '2019-01-29', 1, '1548748507'),
('125.161.169.211', '2019-01-29', 1, '1548778687'),
('5.165.47.86', '2019-01-30', 1, '1548794580'),
('37.9.113.86', '2019-01-30', 1, '1548837487'),
('37.9.113.107', '2019-01-30', 1, '1548838129'),
('37.9.113.33', '2019-01-31', 1, '1548874682'),
('95.27.251.93', '2019-01-31', 1, '1548878629'),
('66.249.71.76', '2019-02-02', 2, '1549117511'),
('37.9.113.199', '2019-02-03', 1, '1549204947'),
('141.8.142.103', '2019-02-04', 1, '1549218715'),
('141.8.142.101', '2019-02-04', 1, '1549287944'),
('37.9.113.33', '2019-02-05', 2, '1549345856'),
('66.249.71.76', '2019-02-07', 1, '1549542013'),
('66.249.71.74', '2019-02-08', 1, '1549604666'),
('95.108.181.102', '2019-02-10', 1, '1549804400'),
('37.9.113.14', '2019-02-10', 1, '1549817280'),
('202.150.144.150', '2019-02-11', 9, '1549873334'),
('141.8.142.101', '2019-02-11', 1, '1549892166'),
('202.150.144.150', '2019-02-12', 2, '1549945353'),
('66.249.71.74', '2019-02-13', 1, '1550028418'),
('202.150.144.150', '2019-02-13', 43, '1550055129'),
('141.8.142.101', '2019-02-14', 1, '1550083200'),
('110.137.195.236', '2019-02-14', 47, '1550099094'),
('66.249.71.78', '2019-02-14', 1, '1550094440'),
('141.8.142.101', '2019-02-15', 2, '1550201773'),
('37.9.113.33', '2019-02-15', 1, '1550218437'),
('66.249.71.74', '2019-02-19', 1, '1550517907'),
('141.8.142.103', '2019-02-19', 1, '1550571550'),
('66.249.71.76', '2019-02-19', 1, '1550582647'),
('110.138.148.170', '2019-02-20', 25, '1550654978'),
('202.150.144.150', '2019-02-21', 121, '1550745556'),
('37.9.113.33', '2019-02-21', 1, '1550729109'),
('178.154.244.55', '2019-02-21', 1, '1550750575'),
('37.9.113.107', '2019-02-21', 1, '1550755252'),
('180.243.245.175', '2019-02-21', 4, '1550764556'),
('180.243.245.175', '2019-02-22', 3, '1550770295'),
('202.150.144.150', '2019-02-22', 2, '1550823447'),
('114.124.202.143', '2019-02-22', 1, '1550826428'),
('95.27.184.26', '2019-02-23', 1, '1550889254'),
('110.137.209.112', '2019-02-23', 1, '1550932503'),
('110.138.150.224', '2019-02-24', 15, '1551017356'),
('104.194.2.5', '2019-02-24', 2, '1550944886'),
('66.220.149.5', '2019-02-24', 1, '1550945541'),
('66.220.149.9', '2019-02-24', 1, '1550945541'),
('36.73.145.133', '2019-02-24', 1, '1550945567'),
('125.163.229.7', '2019-02-24', 5, '1550945629'),
('178.128.50.28', '2019-02-24', 1, '1550945644'),
('118.96.153.223', '2019-02-24', 1, '1550945691'),
('36.77.128.166', '2019-02-24', 1, '1550945792'),
('115.164.93.39', '2019-02-24', 3, '1550946546'),
('95.70.207.154', '2019-02-24', 1, '1550945813'),
('36.82.102.60', '2019-02-24', 3, '1550945882'),
('112.215.173.73', '2019-02-24', 5, '1550945916'),
('114.4.216.0', '2019-02-24', 1, '1550945881'),
('223.255.230.71', '2019-02-24', 1, '1550945895'),
('36.74.181.176', '2019-02-24', 3, '1550945949'),
('46.104.40.216', '2019-02-24', 1, '1550945910'),
('223.164.5.161', '2019-02-24', 2, '1550946116'),
('116.206.9.56', '2019-02-24', 6, '1550946174'),
('36.69.139.128', '2019-02-24', 1, '1550946106'),
('182.1.10.196', '2019-02-24', 1, '1550946110'),
('1.200.221.143', '2019-02-24', 1, '1550946115'),
('140.213.4.240', '2019-02-24', 1, '1550946168'),
('180.241.202.99', '2019-02-24', 2, '1550946193'),
('182.0.146.119', '2019-02-24', 3, '1550946300'),
('36.70.185.61', '2019-02-24', 1, '1550946273'),
('182.0.215.119', '2019-02-24', 5, '1550946450'),
('182.1.201.159', '2019-02-24', 1, '1550946507'),
('114.125.11.85', '2019-02-24', 1, '1550946540'),
('139.193.10.41', '2019-02-24', 2, '1550946692'),
('182.253.48.62', '2019-02-24', 6, '1550946780'),
('182.0.242.147', '2019-02-24', 3, '1550946786'),
('182.30.199.223', '2019-02-24', 2, '1550946814'),
('114.125.230.46', '2019-02-24', 1, '1550947037'),
('180.214.232.30', '2019-02-24', 1, '1550947092'),
('180.246.151.206', '2019-02-24', 1, '1550947189'),
('203.78.118.57', '2019-02-24', 4, '1550947289'),
('114.142.172.37', '2019-02-24', 1, '1550947241'),
('114.4.82.33', '2019-02-24', 1, '1550947315'),
('202.80.217.72', '2019-02-24', 16, '1550947603'),
('216.162.47.69', '2019-02-24', 1, '1550947374'),
('139.192.106.123', '2019-02-24', 1, '1550947493'),
('103.44.37.175', '2019-02-24', 1, '1550947498'),
('114.124.235.202', '2019-02-24', 1, '1550947553'),
('202.67.37.2', '2019-02-24', 5, '1550947640'),
('223.255.230.25', '2019-02-24', 3, '1550947770'),
('36.65.226.4', '2019-02-24', 1, '1550947753'),
('120.188.93.55', '2019-02-24', 2, '1550948012'),
('114.124.228.152', '2019-02-24', 3, '1550948281'),
('202.67.35.27', '2019-02-24', 6, '1550948935'),
('36.80.223.16', '2019-02-24', 2, '1550948948'),
('125.166.117.179', '2019-02-24', 2, '1550948756'),
('182.0.173.192', '2019-02-24', 2, '1550948844'),
('180.241.170.165', '2019-02-24', 1, '1550948861'),
('180.249.181.14', '2019-02-24', 1, '1550948923'),
('36.70.245.116', '2019-02-24', 1, '1550948971'),
('54.209.60.63', '2019-02-24', 4, '1550949278'),
('54.86.66.252', '2019-02-24', 5, '1550997517'),
('54.175.74.27', '2019-02-24', 2, '1550949213'),
('36.68.16.165', '2019-02-24', 1, '1550949231'),
('52.71.155.178', '2019-02-24', 3, '1551022410'),
('180.242.22.193', '2019-02-24', 2, '1550949499'),
('116.206.30.38', '2019-02-24', 3, '1550950249'),
('72.14.199.114', '2019-02-24', 1, '1550950278'),
('180.246.134.132', '2019-02-24', 3, '1550950724'),
('36.72.168.229', '2019-02-24', 1, '1550950766'),
('116.206.14.59', '2019-02-24', 1, '1550950790'),
('182.1.202.63', '2019-02-24', 4, '1550951277'),
('111.94.43.162', '2019-02-24', 7, '1550951352'),
('182.1.219.52', '2019-02-24', 1, '1550951310'),
('182.1.216.121', '2019-02-24', 1, '1550951349'),
('103.213.128.96', '2019-02-24', 1, '1550951463'),
('139.193.100.182', '2019-02-24', 3, '1550951632'),
('36.79.101.211', '2019-02-24', 6, '1550951738'),
('114.124.214.231', '2019-02-24', 4, '1550952311'),
('36.73.168.208', '2019-02-24', 2, '1550952499'),
('120.188.37.133', '2019-02-24', 3, '1550952604'),
('36.79.221.145', '2019-02-24', 1, '1550953110'),
('36.75.156.219', '2019-02-24', 7, '1550959856'),
('114.124.241.177', '2019-02-24', 1, '1550953873'),
('114.124.204.176', '2019-02-24', 5, '1550953932'),
('182.1.108.154', '2019-02-24', 4, '1550954741'),
('120.188.74.146', '2019-02-24', 2, '1550954541'),
('180.243.173.1', '2019-02-24', 3, '1550954854'),
('114.125.86.184', '2019-02-24', 4, '1550955135'),
('114.125.86.108', '2019-02-24', 3, '1550955362'),
('114.125.86.164', '2019-02-24', 4, '1550955498'),
('36.83.100.38', '2019-02-24', 2, '1550955635'),
('36.74.38.12', '2019-02-24', 1, '1550955626'),
('182.1.166.176', '2019-02-24', 1, '1550956187'),
('140.213.1.196', '2019-02-24', 1, '1550956284'),
('114.125.26.18', '2019-02-24', 1, '1550956820'),
('180.211.93.218', '2019-02-24', 3, '1550957433'),
('36.65.227.23', '2019-02-24', 1, '1550957624'),
('139.192.201.7', '2019-02-24', 2, '1551004659'),
('182.1.76.5', '2019-02-24', 1, '1550958067'),
('114.125.29.111', '2019-02-24', 1, '1550958120'),
('111.94.201.150', '2019-02-24', 1, '1550958173'),
('114.4.83.150', '2019-02-24', 2, '1550958320'),
('36.70.10.237', '2019-02-24', 1, '1550958673'),
('182.0.151.52', '2019-02-24', 2, '1550958844'),
('114.125.167.78', '2019-02-24', 1, '1550959013'),
('114.125.170.54', '2019-02-24', 1, '1550959139'),
('180.253.150.202', '2019-02-24', 1, '1550959339'),
('182.1.197.90', '2019-02-24', 1, '1550959632'),
('180.243.250.100', '2019-02-24', 2, '1550960076'),
('112.215.219.170', '2019-02-24', 1, '1550960094'),
('203.78.121.125', '2019-02-24', 1, '1550960336'),
('114.4.217.153', '2019-02-24', 4, '1550960658'),
('116.206.8.58', '2019-02-24', 2, '1550960763'),
('61.94.246.246', '2019-02-24', 1, '1550960737'),
('36.83.131.85', '2019-02-24', 1, '1550961032'),
('66.220.149.22', '2019-02-24', 1, '1550961106'),
('114.124.132.14', '2019-02-24', 1, '1550961257'),
('110.138.151.0', '2019-02-24', 1, '1550961264'),
('114.124.200.115', '2019-02-24', 1, '1550961354'),
('36.74.153.128', '2019-02-24', 1, '1550961480'),
('180.244.235.118', '2019-02-24', 8, '1550961662'),
('114.142.172.22', '2019-02-24', 1, '1550961605'),
('115.178.254.42', '2019-02-24', 1, '1550961650'),
('114.5.144.190', '2019-02-24', 4, '1550961852'),
('116.206.42.78', '2019-02-24', 2, '1550961951'),
('114.124.176.190', '2019-02-24', 2, '1550962157'),
('36.73.142.126', '2019-02-24', 1, '1550962325'),
('114.125.39.59', '2019-02-24', 1, '1550962360'),
('182.1.8.237', '2019-02-24', 2, '1550962672'),
('182.1.94.225', '2019-02-24', 1, '1550962722'),
('115.178.223.136', '2019-02-24', 1, '1550962938'),
('180.251.133.244', '2019-02-24', 1, '1550963023'),
('120.188.65.239', '2019-02-24', 1, '1550963037'),
('180.246.150.188', '2019-02-24', 2, '1550963140'),
('182.1.92.211', '2019-02-24', 1, '1550963390'),
('36.71.232.66', '2019-02-24', 1, '1550963413'),
('202.67.45.22', '2019-02-24', 3, '1550963482'),
('116.206.9.26', '2019-02-24', 3, '1551021984'),
('36.80.107.105', '2019-02-24', 1, '1550963725'),
('120.188.66.65', '2019-02-24', 1, '1550963726'),
('36.82.235.134', '2019-02-24', 4, '1550963853'),
('182.1.32.182', '2019-02-24', 1, '1550963918'),
('114.124.177.233', '2019-02-24', 3, '1550963978'),
('116.206.14.49', '2019-02-24', 3, '1550964057'),
('112.215.244.76', '2019-02-24', 1, '1550963991'),
('114.142.168.22', '2019-02-24', 2, '1550964701'),
('114.125.58.200', '2019-02-24', 1, '1550964338'),
('180.253.183.124', '2019-02-24', 1, '1550964340'),
('114.4.213.105', '2019-02-24', 1, '1550964374'),
('182.1.179.84', '2019-02-24', 5, '1550964534'),
('114.5.212.95', '2019-02-24', 2, '1550964669'),
('112.215.239.159', '2019-02-24', 3, '1550964831'),
('202.67.46.237', '2019-02-24', 3, '1550965054'),
('114.124.247.137', '2019-02-24', 1, '1550965214'),
('116.206.29.89', '2019-02-24', 1, '1550965280'),
('112.215.242.204', '2019-02-24', 8, '1550965446'),
('114.124.174.33', '2019-02-24', 1, '1550965428'),
('180.244.235.208', '2019-02-24', 1, '1550965643'),
('125.167.173.218', '2019-02-24', 3, '1550965822'),
('182.1.25.73', '2019-02-24', 2, '1550965941'),
('180.245.113.166', '2019-02-24', 1, '1550966049'),
('120.188.32.62', '2019-02-24', 1, '1550966081'),
('115.178.236.157', '2019-02-24', 1, '1550966180'),
('182.0.139.158', '2019-02-24', 2, '1550966275'),
('114.125.120.142', '2019-02-24', 2, '1550966231'),
('114.124.206.154', '2019-02-24', 1, '1550966309'),
('36.84.227.223', '2019-02-24', 2, '1550966374'),
('173.252.87.21', '2019-02-24', 1, '1550966367'),
('141.0.8.78', '2019-02-24', 2, '1550966642'),
('36.72.251.188', '2019-02-24', 2, '1550966695'),
('114.4.216.210', '2019-02-24', 2, '1550966718'),
('115.178.252.233', '2019-02-24', 1, '1550966780'),
('114.125.54.160', '2019-02-24', 3, '1550967008'),
('114.5.209.52', '2019-02-24', 2, '1550966976'),
('114.4.219.203', '2019-02-24', 1, '1550967002'),
('114.4.212.243', '2019-02-24', 3, '1550967055'),
('182.1.39.246', '2019-02-24', 1, '1550967039'),
('36.81.5.142', '2019-02-24', 2, '1550967361'),
('114.124.177.183', '2019-02-24', 2, '1550967455'),
('140.213.31.175', '2019-02-24', 3, '1550967567'),
('182.1.39.47', '2019-02-24', 2, '1550967660'),
('180.244.88.11', '2019-02-24', 3, '1550967781'),
('36.68.6.154', '2019-02-24', 3, '1550967903'),
('202.67.43.44', '2019-02-24', 2, '1550968001'),
('125.166.177.193', '2019-02-24', 1, '1550968048'),
('114.125.108.116', '2019-02-24', 3, '1550968333'),
('141.0.8.53', '2019-02-24', 1, '1550968153'),
('36.77.84.37', '2019-02-24', 3, '1550968309'),
('114.125.59.236', '2019-02-24', 2, '1550968409'),
('36.90.44.72', '2019-02-24', 1, '1550968389'),
('114.4.221.83', '2019-02-24', 3, '1550968801'),
('114.125.168.45', '2019-02-24', 1, '1550968852'),
('112.215.220.114', '2019-02-24', 3, '1550975644'),
('203.78.119.119', '2019-02-24', 7, '1550969507'),
('180.243.231.91', '2019-02-24', 1, '1550969210'),
('114.124.150.216', '2019-02-24', 1, '1550969519'),
('114.125.100.56', '2019-02-24', 3, '1550969609'),
('36.75.187.65', '2019-02-24', 1, '1550969579'),
('103.10.67.170', '2019-02-24', 2, '1550969651'),
('202.80.216.157', '2019-02-24', 5, '1550969642'),
('36.83.62.155', '2019-02-24', 1, '1550969635'),
('116.206.40.112', '2019-02-24', 1, '1550969640'),
('125.160.79.38', '2019-02-24', 3, '1550969770'),
('180.241.131.21', '2019-02-24', 3, '1550981781'),
('203.78.121.209', '2019-02-24', 4, '1550969866'),
('120.188.37.84', '2019-02-24', 1, '1550969948'),
('114.125.188.116', '2019-02-24', 1, '1550970247'),
('202.67.34.13', '2019-02-24', 5, '1550978470'),
('182.0.142.232', '2019-02-24', 1, '1550970304'),
('114.124.181.130', '2019-02-24', 1, '1550970377'),
('180.249.88.111', '2019-02-24', 2, '1550971824'),
('222.124.59.92', '2019-02-24', 18, '1550970645'),
('111.68.25.33', '2019-02-24', 1, '1550970661'),
('182.1.41.119', '2019-02-24', 7, '1550971265'),
('182.1.42.200', '2019-02-24', 3, '1550971836'),
('182.1.111.250', '2019-02-24', 1, '1550971002'),
('64.233.173.179', '2019-02-24', 1, '1550971075'),
('114.125.215.72', '2019-02-24', 1, '1550971079'),
('64.233.173.183', '2019-02-24', 1, '1550971082'),
('182.1.61.7', '2019-02-24', 1, '1550971188'),
('182.1.47.59', '2019-02-24', 1, '1550971226'),
('125.161.71.105', '2019-02-24', 1, '1550971395'),
('182.0.137.153', '2019-02-24', 1, '1550971773'),
('182.0.146.231', '2019-02-24', 6, '1550971888'),
('115.178.206.2', '2019-02-24', 1, '1550971897'),
('182.1.55.209', '2019-02-24', 1, '1550972017'),
('180.214.232.51', '2019-02-24', 1, '1550972080'),
('114.125.38.59', '2019-02-24', 4, '1550972350'),
('114.4.215.52', '2019-02-24', 1, '1550972113'),
('115.178.205.108', '2019-02-24', 3, '1550972238'),
('180.243.149.235', '2019-02-24', 1, '1550972460'),
('223.255.227.13', '2019-02-24', 4, '1550972638'),
('114.125.189.79', '2019-02-24', 1, '1550972655'),
('115.178.196.253', '2019-02-24', 2, '1550972963'),
('223.255.231.158', '2019-02-24', 1, '1550972938'),
('140.213.0.136', '2019-02-24', 5, '1550973077'),
('180.242.81.164', '2019-02-24', 2, '1550973251'),
('115.178.250.225', '2019-02-24', 2, '1550975778'),
('36.79.10.189', '2019-02-24', 1, '1550973602'),
('182.1.162.18', '2019-02-24', 2, '1550973640'),
('182.1.21.122', '2019-02-24', 2, '1550973653'),
('182.1.24.146', '2019-02-24', 1, '1550973664'),
('103.44.39.75', '2019-02-24', 1, '1550973708'),
('120.188.65.80', '2019-02-24', 1, '1550973713'),
('103.233.145.82', '2019-02-24', 1, '1550973832'),
('36.68.118.121', '2019-02-24', 1, '1550974003'),
('120.188.92.255', '2019-02-24', 1, '1550974069'),
('114.5.213.30', '2019-02-24', 2, '1550974148'),
('115.178.255.0', '2019-02-24', 1, '1550974143'),
('114.125.42.138', '2019-02-24', 2, '1550974275'),
('180.249.202.74', '2019-02-24', 1, '1550974336'),
('125.162.166.143', '2019-02-24', 1, '1550974385'),
('115.132.137.5', '2019-02-24', 1, '1550974419'),
('120.188.67.229', '2019-02-24', 1, '1550974701'),
('116.206.14.55', '2019-02-24', 1, '1550974871'),
('36.82.103.21', '2019-02-24', 1, '1550974901'),
('36.79.248.4', '2019-02-24', 2, '1550975038'),
('36.70.120.57', '2019-02-24', 1, '1550975033'),
('110.136.164.121', '2019-02-24', 1, '1550975083'),
('36.81.62.42', '2019-02-24', 1, '1550975406'),
('36.90.153.67', '2019-02-24', 1, '1550975421'),
('180.253.222.57', '2019-02-24', 2, '1550975573'),
('114.142.172.55', '2019-02-24', 5, '1550976153'),
('36.78.52.110', '2019-02-24', 1, '1550975878'),
('36.78.201.27', '2019-02-24', 1, '1550976123'),
('36.84.240.115', '2019-02-24', 1, '1550976515'),
('180.246.89.78', '2019-02-24', 1, '1550976517'),
('223.255.228.84', '2019-02-24', 1, '1550976749'),
('61.5.120.125', '2019-02-24', 2, '1550979848'),
('101.255.86.66', '2019-02-24', 3, '1550977408'),
('114.4.213.35', '2019-02-24', 2, '1550977418'),
('140.213.18.137', '2019-02-24', 2, '1550977620'),
('182.0.139.26', '2019-02-24', 3, '1550977795'),
('115.178.195.137', '2019-02-24', 1, '1550977969'),
('180.241.191.250', '2019-02-24', 4, '1550978121'),
('125.161.139.224', '2019-02-24', 4, '1550978230'),
('115.178.254.162', '2019-02-24', 1, '1550978324'),
('116.206.8.54', '2019-02-24', 1, '1550978527'),
('182.1.33.168', '2019-02-24', 1, '1550978635'),
('203.190.113.60', '2019-02-24', 1, '1550978841'),
('182.1.85.150', '2019-02-24', 3, '1550978967'),
('36.85.50.90', '2019-02-24', 1, '1550979089'),
('115.178.252.85', '2019-02-24', 2, '1550981137'),
('112.215.173.113', '2019-02-24', 3, '1550979470'),
('140.213.44.204', '2019-02-24', 2, '1550979453'),
('182.1.0.16', '2019-02-24', 3, '1550979520'),
('140.213.7.36', '2019-02-24', 1, '1550979456'),
('36.73.32.209', '2019-02-24', 1, '1550979556'),
('180.244.8.67', '2019-02-24', 1, '1550980101'),
('120.188.83.9', '2019-02-24', 1, '1550980422'),
('114.124.170.110', '2019-02-24', 1, '1550980478'),
('36.90.13.138', '2019-02-24', 2, '1550980536'),
('114.124.230.117', '2019-02-24', 1, '1550980512'),
('110.138.73.66', '2019-02-24', 3, '1550980999'),
('125.167.248.241', '2019-02-24', 2, '1550981229'),
('115.178.218.106', '2019-02-24', 1, '1550981271'),
('114.125.171.49', '2019-02-24', 2, '1550981868'),
('125.160.93.220', '2019-02-24', 5, '1550982372'),
('64.233.173.181', '2019-02-24', 1, '1550982172'),
('125.166.126.194', '2019-02-24', 3, '1550982478'),
('192.99.100.98', '2019-02-24', 1, '1550982472'),
('223.164.5.156', '2019-02-24', 1, '1550982498'),
('36.71.224.91', '2019-02-24', 2, '1550982618'),
('182.1.188.146', '2019-02-24', 4, '1550982761'),
('180.254.122.85', '2019-02-24', 1, '1550982788'),
('182.1.28.156', '2019-02-24', 1, '1550982953'),
('36.73.27.60', '2019-02-24', 1, '1550983097'),
('110.137.116.24', '2019-02-24', 1, '1550983098'),
('180.246.205.3', '2019-02-24', 1, '1550983172'),
('112.215.230.82', '2019-02-24', 1, '1550983223'),
('182.0.211.177', '2019-02-24', 7, '1550983350'),
('125.167.125.42', '2019-02-24', 6, '1550983472'),
('120.188.36.66', '2019-02-24', 1, '1550983733'),
('125.160.196.176', '2019-02-24', 1, '1550983878'),
('36.90.18.69', '2019-02-24', 1, '1550984081'),
('36.65.32.218', '2019-02-24', 1, '1550984476'),
('36.84.62.12', '2019-02-24', 1, '1550984723'),
('180.249.201.238', '2019-02-24', 1, '1550984858'),
('125.165.188.184', '2019-02-24', 1, '1550984890'),
('125.161.136.179', '2019-02-24', 4, '1550985176'),
('36.82.97.208', '2019-02-24', 4, '1550985639'),
('120.188.4.77', '2019-02-24', 1, '1550985564'),
('180.241.228.195', '2019-02-24', 1, '1550985869'),
('223.255.230.50', '2019-02-24', 1, '1550986998'),
('125.161.138.36', '2019-02-24', 2, '1550987242'),
('139.195.13.204', '2019-02-24', 1, '1550987501'),
('110.137.74.239', '2019-02-24', 1, '1550987729'),
('112.215.219.4', '2019-02-24', 3, '1550987911'),
('182.1.19.68', '2019-02-24', 1, '1550987831'),
('114.125.175.106', '2019-02-24', 1, '1550988041'),
('116.206.30.36', '2019-02-24', 1, '1550988230'),
('158.140.187.199', '2019-02-24', 4, '1551022132'),
('182.1.113.24', '2019-02-24', 12, '1550989003'),
('125.162.35.233', '2019-02-24', 3, '1550989210'),
('66.220.149.35', '2019-02-24', 1, '1550989243'),
('66.220.149.20', '2019-02-24', 2, '1551021718'),
('31.13.115.13', '2019-02-24', 1, '1550989266'),
('182.1.54.227', '2019-02-24', 1, '1550989350'),
('180.254.89.184', '2019-02-24', 1, '1550989543'),
('36.71.234.151', '2019-02-24', 8, '1550991440'),
('36.72.28.116', '2019-02-24', 1, '1550990115'),
('36.84.225.226', '2019-02-24', 5, '1550990904'),
('112.215.151.126', '2019-02-24', 1, '1550990874'),
('36.75.223.5', '2019-02-24', 2, '1550992430'),
('36.90.71.71', '2019-02-24', 2, '1550992939'),
('180.245.190.160', '2019-02-24', 3, '1550994154'),
('140.213.13.173', '2019-02-24', 1, '1550996262'),
('114.124.139.115', '2019-02-24', 10, '1550996841'),
('114.125.6.131', '2019-02-24', 1, '1550996642'),
('115.178.198.4', '2019-02-24', 1, '1550996728'),
('114.5.209.93', '2019-02-24', 2, '1550996949'),
('182.1.79.248', '2019-02-24', 2, '1550997144'),
('140.213.47.207', '2019-02-24', 6, '1550998308'),
('112.215.174.112', '2019-02-24', 2, '1551021046'),
('140.213.58.58', '2019-02-24', 3, '1550997733'),
('111.95.224.105', '2019-02-24', 4, '1550997759'),
('180.241.203.178', '2019-02-24', 3, '1550998230'),
('36.76.173.213', '2019-02-24', 1, '1550998695'),
('116.206.14.44', '2019-02-24', 1, '1550998949'),
('114.124.168.182', '2019-02-24', 5, '1550999145'),
('182.1.106.240', '2019-02-24', 2, '1550999852'),
('140.213.3.33', '2019-02-24', 1, '1550999826'),
('182.1.40.230', '2019-02-24', 3, '1550999994'),
('182.1.174.202', '2019-02-24', 3, '1551000080'),
('223.255.230.54', '2019-02-24', 3, '1551000447'),
('114.4.212.73', '2019-02-24', 1, '1551000483'),
('114.4.222.247', '2019-02-24', 1, '1551000578'),
('36.65.217.125', '2019-02-24', 1, '1551001019'),
('36.84.228.238', '2019-02-24', 4, '1551001123'),
('182.253.150.166', '2019-02-24', 2, '1551001174'),
('36.70.228.75', '2019-02-24', 6, '1551001239'),
('180.254.91.0', '2019-02-24', 3, '1551001265'),
('110.138.148.21', '2019-02-24', 1, '1551001890'),
('114.142.169.43', '2019-02-24', 1, '1551001924'),
('114.124.244.186', '2019-02-24', 1, '1551001992'),
('114.125.68.85', '2019-02-24', 1, '1551002198'),
('182.0.196.126', '2019-02-24', 1, '1551002405'),
('182.0.231.133', '2019-02-24', 2, '1551002510'),
('36.85.235.121', '2019-02-24', 2, '1551002677'),
('140.213.13.168', '2019-02-24', 1, '1551002721'),
('182.1.76.127', '2019-02-24', 1, '1551002779'),
('114.124.136.247', '2019-02-24', 1, '1551003044'),
('36.70.17.154', '2019-02-24', 1, '1551003180'),
('114.124.173.226', '2019-02-24', 1, '1551003255'),
('182.0.205.177', '2019-02-24', 1, '1551004123'),
('203.78.119.157', '2019-02-24', 1, '1551004127'),
('203.78.117.20', '2019-02-24', 3, '1551004217'),
('120.188.34.52', '2019-02-24', 2, '1551004510'),
('36.84.228.150', '2019-02-24', 1, '1551004432'),
('66.249.71.84', '2019-02-24', 1, '1551004539'),
('36.81.190.37', '2019-02-24', 1, '1551005167'),
('36.79.248.59', '2019-02-24', 1, '1551005271'),
('182.1.33.36', '2019-02-24', 1, '1551005294'),
('180.243.230.186', '2019-02-24', 1, '1551005676'),
('114.124.213.137', '2019-02-24', 1, '1551005791'),
('115.178.237.252', '2019-02-24', 1, '1551005819'),
('140.213.46.65', '2019-02-24', 2, '1551006045'),
('61.5.94.112', '2019-02-24', 1, '1551006164'),
('182.253.62.80', '2019-02-24', 1, '1551006221'),
('114.124.145.1', '2019-02-24', 1, '1551006265'),
('140.213.58.6', '2019-02-24', 1, '1551006432'),
('180.241.35.226', '2019-02-24', 2, '1551023968'),
('140.213.17.115', '2019-02-24', 1, '1551006518'),
('182.1.37.80', '2019-02-24', 1, '1551006730'),
('173.252.87.15', '2019-02-24', 1, '1551006968'),
('36.90.41.180', '2019-02-24', 1, '1551007410'),
('158.140.187.208', '2019-02-24', 5, '1551007534'),
('36.72.255.34', '2019-02-24', 2, '1551007793'),
('182.1.74.98', '2019-02-24', 1, '1551007780'),
('36.83.75.180', '2019-02-24', 3, '1551007921'),
('120.188.33.9', '2019-02-24', 2, '1551008214'),
('114.125.7.83', '2019-02-24', 1, '1551008220'),
('115.178.253.126', '2019-02-24', 1, '1551008291'),
('116.206.29.36', '2019-02-24', 1, '1551008333'),
('36.70.106.29', '2019-02-24', 2, '1551008782'),
('36.75.52.133', '2019-02-24', 1, '1551008542'),
('111.94.216.185', '2019-02-24', 2, '1551008640'),
('125.167.43.78', '2019-02-24', 1, '1551008706'),
('36.85.28.157', '2019-02-24', 8, '1551008919'),
('118.98.121.66', '2019-02-24', 1, '1551009045'),
('36.73.118.86', '2019-02-24', 1, '1551009076'),
('114.124.136.168', '2019-02-24', 1, '1551009151'),
('182.253.163.35', '2019-02-24', 1, '1551009480');
INSERT INTO `statistik` (`ip`, `tanggal`, `hits`, `online`) VALUES
('125.161.130.120', '2019-02-24', 3, '1551009570'),
('103.114.35.2', '2019-02-24', 5, '1551010232'),
('36.68.148.151', '2019-02-24', 1, '1551010219'),
('114.124.182.58', '2019-02-24', 2, '1551010418'),
('114.125.7.23', '2019-02-24', 5, '1551011104'),
('125.161.136.35', '2019-02-24', 1, '1551010809'),
('36.69.210.179', '2019-02-24', 10, '1551012123'),
('114.125.189.67', '2019-02-24', 2, '1551011230'),
('182.1.194.142', '2019-02-24', 1, '1551011534'),
('120.188.74.179', '2019-02-24', 1, '1551011638'),
('203.78.114.250', '2019-02-24', 1, '1551011644'),
('118.136.140.206', '2019-02-24', 1, '1551011678'),
('114.125.190.187', '2019-02-24', 1, '1551011777'),
('120.188.64.18', '2019-02-24', 7, '1551011964'),
('203.78.117.59', '2019-02-24', 2, '1551012039'),
('182.0.247.92', '2019-02-24', 1, '1551012213'),
('182.1.38.231', '2019-02-24', 3, '1551012589'),
('27.54.118.178', '2019-02-24', 3, '1551012768'),
('36.74.40.116', '2019-02-24', 1, '1551012808'),
('182.1.106.93', '2019-02-24', 1, '1551012890'),
('36.82.98.83', '2019-02-24', 1, '1551012950'),
('112.215.235.194', '2019-02-24', 8, '1551013379'),
('202.80.214.192', '2019-02-24', 2, '1551013140'),
('115.178.209.179', '2019-02-24', 1, '1551013162'),
('158.140.187.210', '2019-02-24', 1, '1551013461'),
('114.125.38.91', '2019-02-24', 3, '1551013513'),
('125.167.58.134', '2019-02-24', 1, '1551013491'),
('114.125.7.227', '2019-02-24', 1, '1551013594'),
('180.253.61.164', '2019-02-24', 5, '1551014308'),
('158.140.187.213', '2019-02-24', 1, '1551013807'),
('139.193.69.81', '2019-02-24', 1, '1551013830'),
('146.185.158.24', '2019-02-24', 2, '1551013964'),
('115.178.206.171', '2019-02-24', 1, '1551013883'),
('36.76.83.199', '2019-02-24', 2, '1551014212'),
('36.85.200.125', '2019-02-24', 4, '1551017099'),
('139.0.145.29', '2019-02-24', 1, '1551014355'),
('114.125.230.250', '2019-02-24', 1, '1551014394'),
('116.206.40.49', '2019-02-24', 3, '1551014561'),
('202.80.214.204', '2019-02-24', 1, '1551014713'),
('36.79.250.87', '2019-02-24', 1, '1551015024'),
('110.137.179.232', '2019-02-24', 2, '1551015109'),
('140.213.40.101', '2019-02-24', 2, '1551015296'),
('115.178.223.6', '2019-02-24', 4, '1551015441'),
('180.245.41.208', '2019-02-24', 3, '1551015725'),
('114.125.28.94', '2019-02-24', 1, '1551015696'),
('36.79.251.86', '2019-02-24', 3, '1551015858'),
('61.5.4.43', '2019-02-24', 1, '1551016071'),
('182.1.104.220', '2019-02-24', 1, '1551016124'),
('36.71.78.238', '2019-02-24', 2, '1551016178'),
('182.1.113.175', '2019-02-24', 1, '1551016195'),
('116.206.29.31', '2019-02-24', 1, '1551016235'),
('36.73.33.158', '2019-02-24', 1, '1551016451'),
('115.178.217.150', '2019-02-24', 1, '1551016612'),
('111.95.170.48', '2019-02-24', 1, '1551016626'),
('114.124.243.218', '2019-02-24', 1, '1551016660'),
('182.1.76.163', '2019-02-24', 1, '1551016879'),
('115.178.211.227', '2019-02-24', 3, '1551017045'),
('180.254.145.112', '2019-02-24', 1, '1551016912'),
('180.252.94.91', '2019-02-24', 1, '1551017167'),
('36.72.232.98', '2019-02-24', 1, '1551017277'),
('125.162.186.62', '2019-02-24', 2, '1551017454'),
('114.125.12.57', '2019-02-24', 1, '1551017447'),
('114.142.168.10', '2019-02-24', 1, '1551017450'),
('103.213.131.236', '2019-02-24', 1, '1551017468'),
('124.158.184.2', '2019-02-24', 2, '1551017857'),
('110.138.151.243', '2019-02-24', 1, '1551017901'),
('36.79.250.36', '2019-02-24', 1, '1551018043'),
('140.213.9.239', '2019-02-24', 2, '1551018125'),
('112.215.200.110', '2019-02-24', 1, '1551018135'),
('36.82.102.188', '2019-02-24', 7, '1551018317'),
('179.236.106.120', '2019-02-24', 1, '1551018374'),
('114.142.168.36', '2019-02-24', 1, '1551018620'),
('125.162.73.231', '2019-02-24', 3, '1551019018'),
('116.206.42.69', '2019-02-24', 1, '1551019184'),
('119.82.244.114', '2019-02-24', 3, '1551019420'),
('203.78.119.181', '2019-02-24', 1, '1551019421'),
('36.75.29.29', '2019-02-24', 1, '1551019435'),
('202.80.212.152', '2019-02-24', 1, '1551019513'),
('114.5.213.90', '2019-02-24', 1, '1551019528'),
('66.220.149.11', '2019-02-24', 2, '1551021719'),
('182.0.174.77', '2019-02-24', 1, '1551019630'),
('112.215.220.64', '2019-02-24', 1, '1551019696'),
('118.96.95.122', '2019-02-24', 1, '1551019754'),
('139.193.164.74', '2019-02-24', 1, '1551019779'),
('180.252.148.219', '2019-02-24', 1, '1551019843'),
('125.165.62.146', '2019-02-24', 1, '1551019858'),
('36.65.206.97', '2019-02-24', 1, '1551019889'),
('140.213.48.85', '2019-02-24', 1, '1551020128'),
('182.0.196.94', '2019-02-24', 1, '1551020166'),
('180.241.99.17', '2019-02-24', 2, '1551022564'),
('115.178.235.87', '2019-02-24', 2, '1551020729'),
('115.178.237.240', '2019-02-24', 3, '1551020790'),
('110.138.117.205', '2019-02-24', 1, '1551020703'),
('36.84.132.10', '2019-02-24', 4, '1551020812'),
('114.124.202.169', '2019-02-24', 5, '1551021100'),
('182.1.57.24', '2019-02-24', 1, '1551020820'),
('180.244.113.13', '2019-02-24', 3, '1551020859'),
('112.215.243.142', '2019-02-24', 1, '1551020855'),
('223.255.231.136', '2019-02-24', 1, '1551020990'),
('114.124.179.177', '2019-02-24', 3, '1551021035'),
('180.248.30.124', '2019-02-24', 2, '1551021150'),
('103.112.163.23', '2019-02-24', 1, '1551021216'),
('114.124.175.213', '2019-02-24', 1, '1551021366'),
('203.78.116.20', '2019-02-24', 1, '1551021533'),
('114.125.12.78', '2019-02-24', 1, '1551021566'),
('182.1.72.94', '2019-02-24', 3, '1551021743'),
('103.44.37.95', '2019-02-24', 1, '1551021720'),
('36.77.146.214', '2019-02-24', 1, '1551021733'),
('139.192.202.135', '2019-02-24', 1, '1551021749'),
('202.80.216.240', '2019-02-24', 2, '1551021886'),
('114.5.208.14', '2019-02-24', 1, '1551021859'),
('115.178.237.204', '2019-02-24', 1, '1551021877'),
('110.137.169.231', '2019-02-24', 3, '1551022091'),
('36.75.179.139', '2019-02-24', 1, '1551022118'),
('114.5.209.26', '2019-02-24', 5, '1551022256'),
('115.178.254.218', '2019-02-24', 1, '1551022201'),
('36.65.229.244', '2019-02-24', 1, '1551022273'),
('182.1.73.49', '2019-02-24', 5, '1551022922'),
('112.215.153.202', '2019-02-24', 1, '1551023163'),
('125.164.128.145', '2019-02-24', 1, '1551023172'),
('45.115.73.12', '2019-02-24', 1, '1551023814'),
('114.124.176.87', '2019-02-24', 5, '1551023902'),
('36.65.107.189', '2019-02-24', 5, '1551024147'),
('120.188.64.202', '2019-02-24', 1, '1551024278'),
('202.67.33.10', '2019-02-24', 2, '1551024415'),
('175.106.8.243', '2019-02-24', 1, '1551024775'),
('114.5.147.179', '2019-02-24', 1, '1551024955'),
('125.167.147.147', '2019-02-24', 2, '1551025162'),
('114.124.213.94', '2019-02-24', 1, '1551025174'),
('125.165.150.190', '2019-02-24', 10, '1551025449'),
('115.178.236.154', '2019-02-24', 1, '1551025433'),
('36.37.131.41', '2019-02-24', 20, '1551026742'),
('120.188.81.71', '2019-02-24', 2, '1551025624'),
('140.213.56.92', '2019-02-24', 1, '1551025733'),
('118.136.56.208', '2019-02-24', 1, '1551025981'),
('36.76.235.192', '2019-02-24', 1, '1551026007'),
('115.178.196.153', '2019-02-24', 1, '1551026017'),
('125.165.128.64', '2019-02-24', 1, '1551026033'),
('115.178.234.109', '2019-02-24', 1, '1551026165'),
('114.125.60.25', '2019-02-24', 1, '1551026286'),
('116.206.8.60', '2019-02-24', 12, '1551026702'),
('103.3.220.36', '2019-02-24', 1, '1551026461'),
('36.77.253.4', '2019-02-24', 2, '1551026526'),
('110.138.150.81', '2019-02-24', 2, '1551026628'),
('180.252.173.178', '2019-02-24', 1, '1551026558'),
('120.188.81.199', '2019-02-24', 1, '1551026632'),
('114.124.138.73', '2019-02-25', 2, '1551028003'),
('114.125.7.23', '2019-02-25', 1, '1551027777'),
('114.124.137.181', '2019-02-25', 1, '1551027822'),
('114.4.78.184', '2019-02-25', 1, '1551028362'),
('114.125.63.166', '2019-02-25', 1, '1551028391'),
('110.137.17.19', '2019-02-25', 3, '1551028482'),
('182.1.176.61', '2019-02-25', 1, '1551028454'),
('114.125.220.214', '2019-02-25', 2, '1551028696'),
('120.188.87.250', '2019-02-25', 1, '1551028730'),
('182.1.50.16', '2019-02-25', 1, '1551028975'),
('140.213.46.135', '2019-02-25', 5, '1551029121'),
('36.78.243.88', '2019-02-25', 2, '1551029223'),
('182.1.24.214', '2019-02-25', 1, '1551029115'),
('101.255.36.46', '2019-02-25', 1, '1551029252'),
('116.93.119.178', '2019-02-25', 2, '1551029515'),
('180.254.168.198', '2019-02-25', 1, '1551029487'),
('114.5.213.104', '2019-02-25', 1, '1551029542'),
('110.138.219.49', '2019-02-25', 3, '1551029713'),
('36.90.78.80', '2019-02-25', 1, '1551029710'),
('112.215.171.79', '2019-02-25', 2, '1551029893'),
('110.137.163.15', '2019-02-25', 3, '1551030126'),
('140.213.48.12', '2019-02-25', 1, '1551030191'),
('115.178.210.222', '2019-02-25', 5, '1551030536'),
('202.67.33.46', '2019-02-25', 1, '1551030684'),
('182.0.241.45', '2019-02-25', 1, '1551030858'),
('148.64.56.66', '2019-02-25', 1, '1551031085'),
('120.188.81.220', '2019-02-25', 2, '1551031417'),
('114.125.23.45', '2019-02-25', 2, '1551031669'),
('36.82.103.75', '2019-02-25', 1, '1551032448'),
('140.213.35.197', '2019-02-25', 1, '1551033651'),
('120.188.6.165', '2019-02-25', 1, '1551033751'),
('182.1.52.1', '2019-02-25', 1, '1551033944'),
('180.253.90.222', '2019-02-25', 3, '1551054294'),
('175.158.50.96', '2019-02-25', 1, '1551034634'),
('180.247.25.41', '2019-02-25', 5, '1551060131'),
('120.188.81.63', '2019-02-25', 1, '1551036526'),
('8.37.71.47', '2019-02-25', 1, '1551038287'),
('140.213.13.217', '2019-02-25', 2, '1551039257'),
('114.124.197.183', '2019-02-25', 1, '1551039275'),
('180.248.152.26', '2019-02-25', 2, '1551039958'),
('115.178.221.221', '2019-02-25', 1, '1551041516'),
('180.249.203.204', '2019-02-25', 1, '1551041589'),
('114.124.237.102', '2019-02-25', 1, '1551041991'),
('139.193.237.229', '2019-02-25', 1, '1551042239'),
('36.90.13.153', '2019-02-25', 1, '1551043520'),
('112.215.241.47', '2019-02-25', 2, '1551043609'),
('114.124.242.130', '2019-02-25', 1, '1551044091'),
('115.178.215.91', '2019-02-25', 1, '1551044145'),
('114.124.241.138', '2019-02-25', 5, '1551044442'),
('36.74.238.75', '2019-02-25', 1, '1551044449'),
('180.251.114.75', '2019-02-25', 3, '1551045718'),
('54.86.66.252', '2019-02-25', 5, '1551053602'),
('182.1.121.204', '2019-02-25', 2, '1551047033'),
('139.193.32.210', '2019-02-25', 2, '1551047669'),
('182.1.44.165', '2019-02-25', 1, '1551047997'),
('103.44.37.159', '2019-02-25', 1, '1551048111'),
('158.140.187.221', '2019-02-25', 1, '1551048274'),
('112.215.235.8', '2019-02-25', 3, '1551048691'),
('114.4.219.248', '2019-02-25', 2, '1551048914'),
('180.251.217.78', '2019-02-25', 2, '1551048999'),
('36.68.137.207', '2019-02-25', 1, '1551049335'),
('114.125.70.177', '2019-02-25', 1, '1551049382'),
('110.138.151.40', '2019-02-25', 1, '1551049675'),
('36.76.27.221', '2019-02-25', 1, '1551049817'),
('46.101.92.175', '2019-02-25', 1, '1551051131'),
('180.214.233.125', '2019-02-25', 1, '1551051307'),
('36.75.169.36', '2019-02-25', 1, '1551051640'),
('141.0.8.141', '2019-02-25', 2, '1551051711'),
('180.254.128.174', '2019-02-25', 1, '1551051759'),
('116.206.9.53', '2019-02-25', 1, '1551051954'),
('103.24.212.93', '2019-02-25', 1, '1551052702'),
('36.76.244.175', '2019-02-25', 10, '1551052846'),
('115.178.205.165', '2019-02-25', 3, '1551053112'),
('118.97.134.134', '2019-02-25', 1, '1551053312'),
('36.73.33.217', '2019-02-25', 4, '1551053569'),
('184.72.115.35', '2019-02-25', 1, '1551053578'),
('54.175.74.27', '2019-02-25', 3, '1551078314'),
('114.4.218.213', '2019-02-25', 7, '1551054034'),
('114.124.141.139', '2019-02-25', 1, '1551053928'),
('114.125.198.40', '2019-02-25', 2, '1551055137'),
('182.1.3.226', '2019-02-25', 1, '1551056234'),
('118.96.164.136', '2019-02-25', 1, '1551056247'),
('114.124.168.147', '2019-02-25', 5, '1551056406'),
('36.78.120.136', '2019-02-25', 4, '1551056626'),
('115.178.254.157', '2019-02-25', 6, '1551056784'),
('114.6.72.90', '2019-02-25', 1, '1551057069'),
('114.125.100.172', '2019-02-25', 1, '1551057169'),
('140.213.8.169', '2019-02-25', 3, '1551057311'),
('103.18.78.98', '2019-02-25', 4, '1551057600'),
('125.163.241.117', '2019-02-25', 1, '1551057867'),
('103.215.25.50', '2019-02-25', 8, '1551057928'),
('36.85.32.47', '2019-02-25', 1, '1551057883'),
('203.24.50.142', '2019-02-25', 17, '1551058071'),
('202.65.115.90', '2019-02-25', 1, '1551057897'),
('182.1.100.190', '2019-02-25', 2, '1551058115'),
('103.95.7.9', '2019-02-25', 1, '1551058269'),
('103.31.207.25', '2019-02-25', 2, '1551058871'),
('112.215.170.158', '2019-02-25', 2, '1551058961'),
('36.84.226.2', '2019-02-25', 2, '1551059285'),
('114.125.200.39', '2019-02-25', 6, '1551061224'),
('66.96.232.222', '2019-02-25', 1, '1551059134'),
('114.124.169.217', '2019-02-25', 2, '1551059234'),
('66.220.149.13', '2019-02-25', 1, '1551059243'),
('64.233.173.181', '2019-02-25', 1, '1551059631'),
('115.178.193.240', '2019-02-25', 5, '1551060099'),
('104.143.209.100', '2019-02-25', 1, '1551060169'),
('114.125.20.70', '2019-02-25', 1, '1551060269'),
('202.182.174.138', '2019-02-25', 3, '1551060897'),
('116.206.38.50', '2019-02-25', 1, '1551060493'),
('116.206.14.30', '2019-02-25', 1, '1551060704'),
('114.125.59.25', '2019-02-25', 1, '1551061053'),
('66.220.149.19', '2019-02-25', 2, '1551061117'),
('66.220.149.10', '2019-02-25', 1, '1551061116'),
('31.13.115.12', '2019-02-25', 1, '1551061126'),
('202.150.144.150', '2019-02-25', 1, '1551061127'),
('182.1.104.154', '2019-02-25', 1, '1551061155'),
('103.18.30.52', '2019-02-25', 1, '1551061515'),
('202.146.232.118', '2019-02-25', 2, '1551061784'),
('114.124.179.17', '2019-02-25', 1, '1551061793'),
('36.85.71.180', '2019-02-25', 5, '1551062244'),
('110.76.148.86', '2019-02-25', 1, '1551062346'),
('118.136.148.201', '2019-02-25', 3, '1551062491'),
('116.206.15.16', '2019-02-25', 3, '1551062661'),
('114.5.147.179', '2019-02-25', 8, '1551063160'),
('180.252.68.183', '2019-02-25', 2, '1551063274'),
('103.111.53.52', '2019-02-25', 1, '1551063670'),
('103.17.76.51', '2019-02-25', 1, '1551064354'),
('115.178.253.98', '2019-02-25', 2, '1551065448'),
('116.206.40.56', '2019-02-25', 1, '1551065452'),
('140.213.44.164', '2019-02-25', 7, '1551065887'),
('139.228.188.147', '2019-02-25', 4, '1551065915'),
('36.72.219.126', '2019-02-25', 1, '1551065877'),
('116.206.40.89', '2019-02-25', 2, '1551065984'),
('114.125.188.88', '2019-02-25', 4, '1551066062'),
('103.73.72.74', '2019-02-25', 1, '1551066315'),
('103.105.128.99', '2019-02-25', 1, '1551066556'),
('120.188.85.236', '2019-02-25', 1, '1551066561'),
('118.96.185.21', '2019-02-25', 4, '1551066865'),
('36.77.155.110', '2019-02-25', 1, '1551066799'),
('223.255.229.16', '2019-02-25', 1, '1551066872'),
('103.5.148.4', '2019-02-25', 1, '1551067597'),
('158.140.167.199', '2019-02-25', 4, '1551068180'),
('103.10.105.229', '2019-02-25', 1, '1551068183'),
('36.82.97.103', '2019-02-25', 4, '1551068558'),
('182.0.201.105', '2019-02-25', 4, '1551068558'),
('120.188.33.248', '2019-02-25', 3, '1551074058'),
('121.101.129.18', '2019-02-25', 3, '1551069042'),
('36.72.148.139', '2019-02-25', 1, '1551069394'),
('36.82.102.82', '2019-02-25', 2, '1551069475'),
('124.81.107.194', '2019-02-25', 6, '1551069530'),
('185.26.180.169', '2019-02-25', 1, '1551069535'),
('82.145.221.156', '2019-02-25', 4, '1551069620'),
('123.231.247.42', '2019-02-25', 1, '1551070716'),
('36.70.134.72', '2019-02-25', 4, '1551071026'),
('114.125.8.164', '2019-02-25', 1, '1551071017'),
('36.84.242.199', '2019-02-25', 1, '1551071072'),
('139.194.82.90', '2019-02-25', 1, '1551071676'),
('66.249.71.82', '2019-02-25', 1, '1551071678'),
('180.241.61.11', '2019-02-25', 1, '1551071786'),
('139.255.146.48', '2019-02-25', 1, '1551071974'),
('202.67.46.27', '2019-02-25', 1, '1551072174'),
('36.71.234.47', '2019-02-25', 3, '1551072394'),
('114.125.102.110', '2019-02-25', 1, '1551072560'),
('36.72.219.154', '2019-02-25', 4, '1551072660'),
('103.76.23.243', '2019-02-25', 1, '1551072641'),
('115.178.255.209', '2019-02-25', 2, '1551073730'),
('203.142.76.250', '2019-02-25', 3, '1551074576'),
('141.0.9.30', '2019-02-25', 1, '1551074545'),
('118.99.97.242', '2019-02-25', 3, '1551075031'),
('114.124.199.183', '2019-02-25', 1, '1551075213'),
('139.192.146.91', '2019-02-25', 1, '1551075671'),
('66.220.149.25', '2019-02-25', 1, '1551075683'),
('182.253.143.7', '2019-02-25', 9, '1551076066'),
('36.90.153.123', '2019-02-25', 3, '1551076153'),
('182.1.203.124', '2019-02-25', 1, '1551076205'),
('118.97.161.114', '2019-02-25', 2, '1551076378'),
('178.62.92.29', '2019-02-25', 3, '1551078586'),
('182.0.197.189', '2019-02-25', 1, '1551079313'),
('125.165.42.109', '2019-02-25', 1, '1551079470'),
('125.165.33.199', '2019-02-25', 5, '1551080101'),
('115.178.253.163', '2019-02-25', 3, '1551081754'),
('182.253.141.155', '2019-02-25', 5, '1551082583'),
('182.0.169.7', '2019-02-25', 1, '1551082572'),
('180.249.181.41', '2019-02-25', 1, '1551082770'),
('202.162.43.21', '2019-02-25', 3, '1551083034'),
('66.220.149.1', '2019-02-25', 1, '1551083039'),
('66.220.149.30', '2019-02-25', 1, '1551083039'),
('112.215.220.34', '2019-02-25', 1, '1551083382'),
('114.4.217.170', '2019-02-25', 8, '1551100199'),
('120.188.77.120', '2019-02-25', 1, '1551086366'),
('140.213.41.155', '2019-02-25', 1, '1551087458'),
('112.215.45.84', '2019-02-25', 7, '1551087773'),
('115.124.86.58', '2019-02-25', 6, '1551087793'),
('182.1.183.130', '2019-02-25', 1, '1551087979'),
('140.213.34.247', '2019-02-25', 1, '1551089424'),
('36.84.62.54', '2019-02-25', 1, '1551089989'),
('115.178.201.117', '2019-02-25', 23, '1551090365'),
('117.102.66.73', '2019-02-25', 1, '1551090417'),
('120.188.76.177', '2019-02-25', 3, '1551093256'),
('182.0.238.68', '2019-02-25', 1, '1551093481'),
('202.67.36.2', '2019-02-25', 1, '1551097807'),
('103.208.137.246', '2019-02-25', 14, '1551104433'),
('116.206.38.40', '2019-02-25', 11, '1551101617'),
('120.188.33.183', '2019-02-25', 1, '1551099705'),
('116.206.29.52', '2019-02-25', 1, '1551101538'),
('182.0.230.109', '2019-02-25', 1, '1551102132'),
('116.206.28.53', '2019-02-25', 1, '1551102577'),
('182.1.53.2', '2019-02-25', 1, '1551102795'),
('112.215.151.213', '2019-02-25', 1, '1551103847'),
('72.14.199.114', '2019-02-25', 1, '1551104420'),
('42.108.232.72', '2019-02-25', 1, '1551106252'),
('103.10.67.173', '2019-02-25', 3, '1551111252'),
('180.241.237.171', '2019-02-25', 1, '1551107390'),
('140.213.58.88', '2019-02-25', 1, '1551107451'),
('182.1.41.95', '2019-02-25', 1, '1551108876'),
('114.125.46.203', '2019-02-25', 1, '1551110358'),
('114.125.100.70', '2019-02-25', 1, '1551111740'),
('140.213.13.208', '2019-02-25', 2, '1551112220'),
('103.78.115.54', '2019-02-25', 3, '1551113954'),
('36.77.76.90', '2019-02-26', 1, '1551114124'),
('52.71.155.178', '2019-02-26', 1, '1551114622'),
('54.175.74.27', '2019-02-26', 1, '1551114627'),
('36.81.7.116', '2019-02-26', 1, '1551116795'),
('180.249.202.149', '2019-02-26', 1, '1551116949'),
('140.213.32.186', '2019-02-26', 1, '1551117838'),
('94.180.142.152', '2019-02-26', 1, '1551119505'),
('114.124.133.47', '2019-02-26', 2, '1551120388'),
('::1', '2019-02-26', 3, '1551123551'),
('127.0.0.1', '2024-08-06', 2, '1722952944'),
('::1', '2024-08-08', 2, '1723099338'),
('::1', '2024-08-09', 56, '1723220305'),
('::1', '2024-08-10', 8, '1723280971'),
('::1', '2024-08-11', 2, '1723383018'),
('::1', '2024-08-12', 13, '1723450506'),
('::1', '2024-08-13', 1, '1723527461');

-- --------------------------------------------------------

--
-- Table structure for table `tag`
--

CREATE TABLE IF NOT EXISTS `tag` (
  `id_tag` int NOT NULL AUTO_INCREMENT,
  `nama_tag` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `username` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `tag_seo` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `count` int NOT NULL,
  PRIMARY KEY (`id_tag`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=62 ;

--
-- Dumping data for table `tag`
--

INSERT INTO `tag` (`id_tag`, `nama_tag`, `username`, `tag_seo`, `count`) VALUES
(22, 'Hiburan', '', 'hiburan', 19),
(28, 'Teknologi', '', 'teknologi', 12),
(27, 'Metropolitan', '', 'metropolitan', 32),
(26, 'Nasional', '', 'nasional', 42),
(25, 'Kesehatan', '', 'kesehatan', 16),
(24, 'Olahraga', '', 'olahraga', 11),
(34, 'Wisata', '', 'wisata', 4),
(36, 'Hukum', '', 'hukum', 16),
(37, 'Film', '', 'film', 25),
(40, 'Internasional', '', 'internasional', 28),
(41, 'Bola', '', 'bola', 21),
(43, 'Selebritis', '', 'selebritis', 9),
(49, 'Palestina', 'admin', 'palestina', 6),
(55, 'Asian Games', 'admin', 'asian-games', 0),
(56, 'IT', 'admin', 'pilar', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tagvid`
--

CREATE TABLE IF NOT EXISTS `tagvid` (
  `id_tag` int NOT NULL AUTO_INCREMENT,
  `nama_tag` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `username` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `tag_seo` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `count` int NOT NULL,
  PRIMARY KEY (`id_tag`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=45 ;

--
-- Dumping data for table `tagvid`
--

INSERT INTO `tagvid` (`id_tag`, `nama_tag`, `username`, `tag_seo`, `count`) VALUES
(34, 'perang', 'admin', 'perang', 2),
(35, 'Teknologi', 'admin', 'teknologi', 0),
(36, 'Nasional', 'admin', 'nasional', 1),
(39, 'DPPKB', 'admin', 'dppkb', 0),
(40, 'Kegiatan', 'admin', 'kegiatan', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_comment`
--

CREATE TABLE IF NOT EXISTS `tbl_comment` (
  `id_komentar` int NOT NULL AUTO_INCREMENT,
  `reply` int NOT NULL,
  `nama_lengkap` varchar(150) NOT NULL,
  `alamat_email` varchar(150) NOT NULL,
  `isi_pesan` text NOT NULL,
  `tanggal_komentar` date NOT NULL,
  `jam_komentar` time NOT NULL,
  PRIMARY KEY (`id_komentar`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `tbl_comment`
--

INSERT INTO `tbl_comment` (`id_komentar`, `reply`, `nama_lengkap`, `alamat_email`, `isi_pesan`, `tanggal_komentar`, `jam_komentar`) VALUES
(1, 0, 'Admin Lokomedia', 'dankrez48@gmail.com', 'Perubahan UUD 1945 yang membawa perubahan mendasar mengenai penyelengaraan kekuasaan kehakiman, membuat perlunya dilakukan perubahan secara komprehensif mengenai Undang-Undang Ketentuan-ketentuan Pokok Kekuasaan Kehakiman.								', '2014-11-19', '00:00:00'),
(2, 1, 'si anu', 'anu@gmail.com', 'Video bocah melakukan hubungan intim layaknya suami istri membuat geger. Guna mencegah hal-hal yang tidak diinginkan, polisi pun sudah melakukan penelusuran siapa orang di balik pembuatan video cabul tersebut.', '2014-11-19', '00:00:00'),
(3, 0, 'Rio Saputra', 'rio.saputra@gmail.com', 'Video bocah melakukan hubungan intim layaknya suami istri membuat geger. Guna mencegah hal-hal yang tidak diinginkan, polisi pun sudah melakukan penelusuran siapa orang di balik pembuatan video cabul tersebut. Perubahan UUD 1945 yang membawa perubahan mendasar mengenai penyelengaraan kekuasaan kehakiman.								', '2014-11-21', '00:00:00'),
(4, 1, 'Anggun Pratiwi', 'angun@gmail.com', 'itu benar bro, kalau ndak pacayo tanyo lah ka baruak.Video bocah melakukan hubungan intim layaknya suami istri membuat geger. Guna mencegah hal-hal yang tidak diinginkan, polisi pun sudah melakukan penelusuran siapa orang di balik pembuatan video cabul tersebut.', '2014-11-21', '00:00:00'),
(5, 3, 'Dewi Safitri', 'dewi.safitri@gmail.com', 'Oii, ang kareh bana mah, den ambuang ang ka lauik beko,.. Video bocah melakukan hubungan intim layaknya suami istri membuat geger. Guna mencegah hal-hal yang tidak diinginkan, polisi pun sudah melakukan penelusuran siapa orang di balik pembuatan video cabul tersebut.', '2014-11-21', '00:00:00'),
(6, 0, 'Ahmad Hunaldi', 'ahmad@gmail.com', 'badan-badan peradilan penyelenggara kekuasaan kehakiman, asas-asas penyelengaraan kekuasaan kehakiman Video bocah melakukan hubungan intim layaknya suami istri membuat geger. Guna mencegah hal-hal yang tidak diinginkan, polisi pun sudah melakukan penelusuran siapa orang di balik pembuatan video cabul tersebut.								', '2014-11-21', '00:00:00'),
(7, 6, 'Prasmana Enru', 'prasmana@gmail.com', 'Undang-Undang Ketentuan-ketentuan Pokok Kekuasaan	Video bocah melakukan hubungan intim layaknya suami istri membuat geger. Guna mencegah hal-hal yang tidak diinginkan, polisi pun sudah melakukan penelusuran siapa orang di balik pembuatan video cabul tersebut.', '2014-11-21', '00:00:00'),
(9, 3, 'Admin Lokomedia', 'dankrez48@gmail.com', 'Untuk itulah penulis memberikan solusi menggunakan program Dreamweaver,.. Video bocah melakukan hubungan intim layaknya suami istri membuat geger. Guna mencegah hal-hal yang tidak diinginkan, polisi pun sudah melakukan penelusuran siapa orang di balik pembuatan video cabul tersebut.', '2015-01-22', '00:00:00'),
(14, 0, 'Udin Sedunia', 'udin.sedubia@gmail.com', 'Perlahan tapi pasti, sosok TM yang merupakan artis dan berprofesi sebagai Pekerja Seks Komersial (PSK) akhirnya mulai terungkap Video bocah melakukan hubungan intim layaknya suami istri membuat geger. Guna mencegah hal-hal yang tidak diinginkan, polisi pun sudah melakukan penelusuran siapa orang di balik pembuatan video cabul tersebut.', '2015-05-29', '00:54:31'),
(15, 6, 'Admin Lokomedia', 'dankrez48@gmail.com', 'Perlahan tapi pasti, sosok TM yang merupakan artis dan berprofesi sebagai Pekerja Seks Komersial (PSK) akhirnya mulai terungkap Video bocah melakukan hubungan intim layaknya suami istri membuat geger. Guna mencegah hal-hal yang tidak diinginkan, polisi pun sudah melakukan penelusuran siapa orang di balik pembuatan video cabul tersebut.', '2015-05-29', '00:59:50'),
(17, 3, 'hari ke 2', 'hay.smart,solusindo@gmail.com', 'Tesssss', '2015-05-29', '05:41:12'),
(19, 14, 'Admin Lokomedia', 'dankrez48@gmail.com', 'Testing untuk Berikan jawaban,....', '2015-06-01', '15:44:10'),
(20, 0, 'Dewiit Safitri', 'dewiit.safitri@gmail.com', 'I absolutely love image or text sliders written using pure css code. Likewise, i always hated slow loading sliders using jquery or javascript to use in my wordpress themes or html websites. I have compiled some cool css sliders from codepen/github for use in your website or in themes, many are responsive too. A word of advise: Please make sure to test all sliders in Safari, Chrome and FF before deployment.', '2017-01-24', '16:27:59'),
(23, 20, 'Admin Lokomedia', 'dankrez48@gmail.com', 'I spent almost a day searching for this. And found &#039;CSS3 Thumbnail Slider&#039; on this site. Thanks a lot. If the slideIndex is higher than the number of elements (x.length), the slideIndex is set to zero.', '2017-01-24', '16:31:47'),
(24, 14, 'Admin Lokomedia', 'dankrez48@gmail.com', 'Guna mencegah hal-hal yang tidak diinginkan, polisi pun sudah melakukan penelusuran siapa orang di balik pembuatan video cabul tersebut', '2017-04-09', '11:07:23'),
(25, 0, 'BangToyyib', 'toyyib@gmail.com', 'saya ingin bertanya, berapa 1 + 1?', '2017-10-06', '08:19:33'),
(26, 25, 'Admin Lokomedia', 'admin@lokomedia.web.id', '1+1 adalah 2', '2017-10-06', '08:26:20');

-- --------------------------------------------------------

--
-- Table structure for table `templates`
--

CREATE TABLE IF NOT EXISTS `templates` (
  `id_templates` int NOT NULL AUTO_INCREMENT,
  `judul` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `username` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `pembuat` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `folder` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `aktif` enum('Y','N') CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT 'N',
  PRIMARY KEY (`id_templates`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=31 ;

--
-- Dumping data for table `templates`
--

INSERT INTO `templates` (`id_templates`, `judul`, `username`, `pembuat`, `folder`, `aktif`) VALUES
(27, 'dinas 1', 'admin', 'Admin Lokomedia', 'dinas-1', 'N'),
(28, 'dinas 3', 'admin', 'GMT', 'dinas-3', 'N'),
(30, 'dinas-2', 'admin', 'saya', 'dinas-2', 'Y'),
(31, 'myskill', 'admin', 'GMT', 'myskill', 'N');

-- --------------------------------------------------------

--
-- Table structure for table `testimoni`
--

CREATE TABLE IF NOT EXISTS `testimoni` (
  `id_testimoni` int NOT NULL AUTO_INCREMENT,
  `gambar` varchar(50) NOT NULL,
  `link` varchar(255) NOT NULL,
  PRIMARY KEY (`id_testimoni`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb3 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Table structure for table `trainer`
--

CREATE TABLE IF NOT EXISTS `trainer` (
  `id_tra` int NOT NULL AUTO_INCREMENT,
  `id_trainer` varchar(255) NOT NULL,
  `foto` varchar(50) DEFAULT NULL,
  `nama_trainer` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_tra`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 AUTO_INCREMENT=1 ;

--
-- Triggers `trainer`
--
DROP TRIGGER IF EXISTS `after_insert_trainer`;
DELIMITER //
CREATE TRIGGER `after_insert_trainer` AFTER INSERT ON `trainer`
 FOR EACH ROW BEGIN
        INSERT INTO trainer_program_group (id_trainer, id_kategori)
        SELECT NEW.id_trainer, id_kategori FROM kategori_program;
    END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `trainer_program_group`
--

CREATE TABLE IF NOT EXISTS `trainer_program_group` (
  `id_tgroup` int NOT NULL AUTO_INCREMENT,
  `id_trainer` varchar(255) NOT NULL,
  `id_kategori` varchar(255) NOT NULL,
  PRIMARY KEY (`id_tgroup`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `username` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nama_lengkap` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `no_telp` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `foto` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `level` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `blokir` enum('Y','N') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `id_session` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`,`email`,`no_telp`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci AUTO_INCREMENT=29 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `nama_lengkap`, `email`, `no_telp`, `foto`, `level`, `blokir`, `id_session`) VALUES
(12, 'admin', '$2y$12$pS7Qca5XkKgYQo0/GFz6RuJv5fnJYqJ.s4fztFP3HyZ1BUYPC.FL6', 'radhitya hafif', 'admin@gmail.com', '081223539286', 'Baku Madarame_VH2meuydZurT30kRBMWcpb8tE.png', 'admin', 'N', 'cc34f9d330246a14c3619c01f1d3a1b9'),
(28, 'pengguna', '$2y$12$bFtPn5Wn96VmIv3HVWjxxOXgJoitriuNKLDoi81zg2hQj7.Vc27vS', 'pengguna baru', 'pengguna@gmail.com', '081223539286', 'Screenshot (7).png', 'user', 'N', 'fcf7cf90e8d9a7eb39dc92d637ddc470');

-- --------------------------------------------------------

--
-- Table structure for table `users_modul`
--

CREATE TABLE IF NOT EXISTS `users_modul` (
  `id_umod` int NOT NULL AUTO_INCREMENT,
  `id_session` varchar(255) NOT NULL,
  `id_modul` int NOT NULL,
  PRIMARY KEY (`id_umod`),
  KEY `id_session` (`id_session`),
  KEY `id_session_2` (`id_session`),
  FULLTEXT KEY `id_session_3` (`id_session`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=138 ;

--
-- Dumping data for table `users_modul`
--

INSERT INTO `users_modul` (`id_umod`, `id_session`, `id_modul`) VALUES
(1, 'ed1d859c50262701d92e5cbf39652792-20170120090507', 70),
(2, 'ed1d859c50262701d92e5cbf39652792-20170120090507', 65),
(3, 'ed1d859c50262701d92e5cbf39652792-20170120090507', 63),
(4, 'f76ad5ee772ac196cbc09824e24859ee', 70),
(5, 'f76ad5ee772ac196cbc09824e24859ee', 65),
(6, 'f76ad5ee772ac196cbc09824e24859ee', 63),
(7, 'ed1d859c50262701d92e5cbf39652792-20170120090507', 18),
(8, 'ed1d859c50262701d92e5cbf39652792-20170120090507', 66),
(9, 'ed1d859c50262701d92e5cbf39652792-20170120090507', 33),
(10, '3460d81e02faa3559f9e02c9a766fcbd-20170124215625', 18),
(11, 'ed1d859c50262701d92e5cbf39652792-20170120090507', 41),
(12, '6bec9c852847242e384a4d5ac0962ba0-20170406140423', 18),
(13, 'fa7688658d8b38aae731826ea1daebb5-20170521103501', 18),
(14, '67cfd69a4e5fb27fc4aeb0fa8383161e-20240810155513', 18),
(15, '67cfd69a4e5fb27fc4aeb0fa8383161e-20240810155513', 70),
(16, '03607b8e274694eb7a4cf8c212002277', 2),
(17, '03607b8e274694eb7a4cf8c212002277', 18),
(18, '03607b8e274694eb7a4cf8c212002277', 71),
(19, '03607b8e274694eb7a4cf8c212002277', 10),
(20, '03607b8e274694eb7a4cf8c212002277', 31),
(21, '1e89af659f632bb77876e3b85367f9a5', 18),
(22, '1e89af659f632bb77876e3b85367f9a5', 31),
(23, '1e89af659f632bb77876e3b85367f9a5', 34),
(47, '19770e7d4a6bc33d2e4c6a413a1a8115', 68),
(45, '40a2e0bd16db8f3a81be9158b2ee4363', 35),
(43, '40a2e0bd16db8f3a81be9158b2ee4363', 18),
(27, 'dfe247b30012c47aba74022abb3b11d9', 18),
(28, 'dfe247b30012c47aba74022abb3b11d9', 31),
(29, 'dfe247b30012c47aba74022abb3b11d9', 34),
(30, 'cc34f9d330246a14c3619c01f1d3a1b9', 18),
(31, 'cc34f9d330246a14c3619c01f1d3a1b9', 31),
(32, 'cc34f9d330246a14c3619c01f1d3a1b9', 34),
(46, '19770e7d4a6bc33d2e4c6a413a1a8115', 67),
(42, '40a2e0bd16db8f3a81be9158b2ee4363', 43),
(41, '40a2e0bd16db8f3a81be9158b2ee4363', 41),
(48, '19770e7d4a6bc33d2e4c6a413a1a8115', 74),
(49, 'bc842a240c237c05e9153dd3c720072d', 18),
(50, 'bc842a240c237c05e9153dd3c720072d', 31),
(51, 'bc842a240c237c05e9153dd3c720072d', 34),
(52, 'bc842a240c237c05e9153dd3c720072d', 41),
(53, '27e2ec179e544adde36834b7098ccb3c', 18),
(54, '981cdf5a7f773f5bb7d5e417510b0107', 18),
(55, '981cdf5a7f773f5bb7d5e417510b0107', 10),
(56, '981cdf5a7f773f5bb7d5e417510b0107', 31),
(57, 'cc34f9d330246a14c3619c01f1d3a1b9', 2),
(58, 'cc34f9d330246a14c3619c01f1d3a1b9', 71),
(59, 'cc34f9d330246a14c3619c01f1d3a1b9', 10),
(60, 'cc34f9d330246a14c3619c01f1d3a1b9', 33),
(61, 'cc34f9d330246a14c3619c01f1d3a1b9', 35),
(62, 'cc34f9d330246a14c3619c01f1d3a1b9', 41),
(63, 'cc34f9d330246a14c3619c01f1d3a1b9', 43),
(64, 'cc34f9d330246a14c3619c01f1d3a1b9', 44),
(65, 'cc34f9d330246a14c3619c01f1d3a1b9', 45),
(66, 'cc34f9d330246a14c3619c01f1d3a1b9', 46),
(67, 'cc34f9d330246a14c3619c01f1d3a1b9', 61),
(68, 'cc34f9d330246a14c3619c01f1d3a1b9', 57),
(69, 'cc34f9d330246a14c3619c01f1d3a1b9', 59),
(70, 'cc34f9d330246a14c3619c01f1d3a1b9', 62),
(71, 'cc34f9d330246a14c3619c01f1d3a1b9', 63),
(72, 'cc34f9d330246a14c3619c01f1d3a1b9', 64),
(73, 'cc34f9d330246a14c3619c01f1d3a1b9', 65),
(74, 'cc34f9d330246a14c3619c01f1d3a1b9', 66),
(75, 'cc34f9d330246a14c3619c01f1d3a1b9', 67),
(76, 'cc34f9d330246a14c3619c01f1d3a1b9', 68),
(77, 'cc34f9d330246a14c3619c01f1d3a1b9', 69),
(78, 'cc34f9d330246a14c3619c01f1d3a1b9', 70),
(79, 'cc34f9d330246a14c3619c01f1d3a1b9', 72),
(80, 'cc34f9d330246a14c3619c01f1d3a1b9', 73),
(81, 'cc34f9d330246a14c3619c01f1d3a1b9', 74),
(82, 'cc34f9d330246a14c3619c01f1d3a1b9', 75),
(83, '012158343816ea9f8a48148e6b9c8285', 18),
(84, '012158343816ea9f8a48148e6b9c8285', 31),
(85, '012158343816ea9f8a48148e6b9c8285', 34),
(86, '33b156a0fc55056ddb808eee39595073', 18),
(87, '33b156a0fc55056ddb808eee39595073', 31),
(88, '33b156a0fc55056ddb808eee39595073', 34),
(89, '004e6e29d9dd89c55ef9c339880caca5', 59),
(90, '004e6e29d9dd89c55ef9c339880caca5', 62),
(91, '004e6e29d9dd89c55ef9c339880caca5', 63),
(92, '004e6e29d9dd89c55ef9c339880caca5', 64),
(93, 'ac098c7f03811f1497c1c4309f1b6b0f', 18),
(94, 'ac098c7f03811f1497c1c4309f1b6b0f', 31),
(95, 'ac098c7f03811f1497c1c4309f1b6b0f', 34),
(105, '8e9314a074551ce48601adfc7c8c748b', 33),
(104, '8e9314a074551ce48601adfc7c8c748b', 18),
(106, '8e9314a074551ce48601adfc7c8c748b', 41),
(107, 'bd0a16687f14c0c74f73483a4a271f3c', 18),
(108, 'bd0a16687f14c0c74f73483a4a271f3c', 41),
(109, 'bd0a16687f14c0c74f73483a4a271f3c', 59),
(110, 'bd0a16687f14c0c74f73483a4a271f3c', 62),
(111, '8a6559ff38148f19ad3830edfd428d70', 61),
(112, '8a6559ff38148f19ad3830edfd428d70', 57),
(113, '8a6559ff38148f19ad3830edfd428d70', 59),
(114, 'feabf2abb7ad65b7f63f315ef338d8d9', 18),
(115, 'feabf2abb7ad65b7f63f315ef338d8d9', 31),
(116, 'feabf2abb7ad65b7f63f315ef338d8d9', 34),
(117, '472456bb948c3291d3069b362ad9bcdb', 18),
(118, '472456bb948c3291d3069b362ad9bcdb', 31),
(119, '472456bb948c3291d3069b362ad9bcdb', 34),
(120, 'e9978bec4422db2686bd1de7891cd807', 18),
(121, 'e9978bec4422db2686bd1de7891cd807', 31),
(122, 'e9978bec4422db2686bd1de7891cd807', 34),
(123, '746d8263e3691aebd069e84419014d9a', 18),
(124, '746d8263e3691aebd069e84419014d9a', 31),
(125, '746d8263e3691aebd069e84419014d9a', 34),
(126, '746d8263e3691aebd069e84419014d9a', 63),
(127, 'fcf7cf90e8d9a7eb39dc92d637ddc470', 18),
(128, 'fcf7cf90e8d9a7eb39dc92d637ddc470', 31),
(129, 'fcf7cf90e8d9a7eb39dc92d637ddc470', 34),
(130, 'cc34f9d330246a14c3619c01f1d3a1b9', 82),
(131, 'cc34f9d330246a14c3619c01f1d3a1b9', 83),
(132, 'cc34f9d330246a14c3619c01f1d3a1b9', 84),
(133, 'cc34f9d330246a14c3619c01f1d3a1b9', 85),
(134, 'cc34f9d330246a14c3619c01f1d3a1b9', 86),
(135, 'cc34f9d330246a14c3619c01f1d3a1b9', 87),
(136, 'cc34f9d330246a14c3619c01f1d3a1b9', 88),
(137, 'cc34f9d330246a14c3619c01f1d3a1b9', 89);

-- --------------------------------------------------------

--
-- Table structure for table `video`
--

CREATE TABLE IF NOT EXISTS `video` (
  `id_video` int NOT NULL AUTO_INCREMENT,
  `id_playlist` int NOT NULL,
  `username` varchar(30) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `jdl_video` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `video_seo` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `keterangan` text CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `gbr_video` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `video` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `youtube` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `dilihat` int NOT NULL DEFAULT '1',
  `hari` varchar(20) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `tanggal` date NOT NULL,
  `jam` time NOT NULL,
  `tagvid` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id_video`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=185 ;

--
-- Dumping data for table `video`
--

INSERT INTO `video` (`id_video`, `id_playlist`, `username`, `jdl_video`, `video_seo`, `keterangan`, `gbr_video`, `video`, `youtube`, `dilihat`, `hari`, `tanggal`, `jam`, `tagvid`) VALUES
(176, 61, 'admin', 'Visit Karawang', 'visit-karawang', '<p>Salah satu Kabupaten yang terletak di Provinsi Jawa Barat yang terkenal sebagai Lumbung Padi Nasional. Kota Pangkal Perjuangan. Kota Industri terbesar se Asia Tenggara.</p>\r\n\r\n<p>BANGGA JADI URANG KARAWANG. Banyak sejarah, kekayaan yang KARAWANG miliki.</p>\r\n', '', '', 'https://www.youtube.com/watch?v=GYfEZwbopIQ', 11, 'Rabu', '2019-01-09', '16:06:47', 'wisata'),
(177, 61, 'admin', 'Kuliner Karawang', 'kuliner-karawang', '<p>Acara &quot;Tau Gak Sih&quot; Trans 7 meliput wisata kuliner di Karawang</p>\r\n', '', '', 'https://www.youtube.com/watch?v=y-zy7RW9P4E', 4, 'Rabu', '2019-01-09', '16:09:32', 'wisata');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
