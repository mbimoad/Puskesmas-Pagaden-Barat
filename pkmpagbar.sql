-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 09, 2022 at 12:29 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pkmpagbar`
--

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `photo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`id`, `title`, `photo`) VALUES
(5, 'Home', '3f0edd4a3de4375c41038e0ccf300b3b.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `category_name` varchar(100) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `is_active` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category_name`, `slug`, `is_active`) VALUES
(6, 'Berita Harian', 'berita-harian', 'Y'),
(7, 'Kesehatan', 'kesehatan', 'Y'),
(8, 'Vaksinasi', 'vaksinasi', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'members', 'General User');

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE `login_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `login_attempts`
--

INSERT INTO `login_attempts` (`id`, `ip_address`, `login`, `time`) VALUES
(15, '::1', 'admin.puskesmas@gmail.com', 1660135483),
(16, '::1', 'admin.puskesmas@gmail.com', 1660135676),
(17, '::1', 'admin.puskesmas@gmail.com', 1660137219),
(18, '::1', 'admin.puskesmas@gmail.com', 1660137227),
(19, '::1', 'admin.puskesmas@gmail.com', 1660137259),
(20, '::1', 'admin.puskesmas@gmail.com', 1660169735),
(21, '::1', 'admin.puskesmas@gmail.com', 1660171059);

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `url` varchar(50) NOT NULL,
  `icon` varchar(100) NOT NULL,
  `is_active` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `title`, `url`, `icon`, `is_active`) VALUES
(3, 'Manajemen Artikel', '', 'fas fa-fw fa-newspaper', 'Y'),
(4, 'Media', '', 'fas fa-fw fa-photo-video', 'Y'),
(5, 'Profile', 'home', 'fas fa-fw fa-home', 'Y'),
(6, 'Logout', 'auth2/logout', '', 'N');

-- --------------------------------------------------------

--
-- Table structure for table `posting`
--

CREATE TABLE `posting` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `seo_title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `featured` char(1) NOT NULL,
  `choice` char(1) NOT NULL,
  `thread` char(1) NOT NULL,
  `id_category` int(11) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `is_active` char(1) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posting`
--

INSERT INTO `posting` (`id`, `title`, `seo_title`, `content`, `featured`, `choice`, `thread`, `id_category`, `photo`, `is_active`, `date`) VALUES
(95, 'Kemenkes Rencanakan Vaksin COVID-19 Dosis Keempat, Kelompok Ini Jadi Prioritas  Baca artikel detikHealth, \"Kemenkes Rencanakan Vaksin COVID-19 Dosis Keempat, Kelompok Ini Jadi Prioritas\"', 'kemenkes-rencanakan-vaksin-covid-19-dosis-keempat-kelompok-ini-jadi-prioritas-baca-artikel-detikhealth-kemenkes-rencanakan-vaksin-covid-19-dosis-keempat-kelompok-ini-jadi-prioritas', 'Kementerian Kesehatan RI merencanakan pemberian vaksin COVID-19 dosis keempat atau vaksin booster kedua. Wacana tersebut muncul di tengah laju vaksinasi COVID-19 dosis ketiga belum mencapai 50 persen dari total sasaran.\r\nDikutip dari vaksin.kemkes.go.id, per Jumat (22/7) 12:00 WIB, baru ada lebih dari 53 juta orang yang menerima vaksin COVID-19 dosis ketiga. Karenanya, pemerintah kini masih fokus mengejar target tersebut.\r\n<br> <br>\r\nMenurut juru bicara Kemenkes RI Mohammad Syahril, pertimbangan pemberian vaksin COVID-19 dosis keempat dikarenakan masa antibodi pasca vaksinasi hanya bertahan selama enam bulan. Jika pandemi masih terus berlanjut,', 'Y', 'Y', 'Y', 8, 'c6b19cbe6e2cd1fc83963d9caff72227.jpeg', 'Y', '2022-08-11'),
(96, 'COVID-19 Bisa Menyebabkan Gigi Copot? Ini Faktanya!', 'covid-19-bisa-menyebabkan-gigi-copot-ini-faktanya', 'Dimuat dalam jurnal Advances in Oral and Maxillofacial Surgery pada November 2021, sebuah penelitian di Belanda mencari tahu hubungan antara keparahan COVID-19 dan kerusakan gigi. Penelitian ini melibatkan sebanyak 1.730 pasien COVID-19 pada Oktober 2020. \r\n<br>\r\nDari jumlah pasien tersebut, sebanyak 389 pasien tercatat pernah berkonsultasi dengan departemen bedah mulut dan maksilofasial (OMFS). Penelitian ini membuktikan bahwa ada hubungan antara keropos tulang alveolar dan keparahan COVID-19. Pasalnya, pasien COVID-19 dengan keropos tulang alveolar 5,6 kali lebih mungkin dirawat di ICU dan wafat.\r\n<br>\r\nSelain itu, banyaknya gigi yang tanggal juga dipengaruhi oleh keparahan COVID-19. Per satu gigi tanggal, pasien COVID-19 10,2 persen lebih berisiko terkena COVID-19 parah dibanding ringan atau sedang.\r\n<br>', 'Y', 'Y', 'Y', 7, 'bcc56e2fcce797a65dece1984449ab61.jpeg', 'Y', '2022-08-15'),
(97, 'Warga Cilegon Diduga Terjangkit Cacar Monyet, Dinkes Sebut Gejalanya Tak Spesifik', 'warga-cilegon-diduga-terjangkit-cacar-monyet-dinkes-sebut-gejalanya-tak-spesifik', 'Kepala Dinas Kesehatan Kota Cilegon<br>\r\nRatih Purnamasari menyatakan adanya dugaan warga yang terjangkit cacar monyet atau monkeypox. Dikatakan Ratih, pada 8 Agustus 2022 seorang warga itu mendatangi Puskesmas Pulomerak untuk berobat dengan gejala tidak spesifik penyakit tersebut. Dalam rangka meningkatkan kewaspadaan terhadap penyakit monkeypox, petugas Puskesmas tetap melakukan pemeriksaan penunjang laboratorium. \"Puskesmas melakukan pengambilan sampel swab orofaring, swab krustalesi dan serum darah dan dikirim ke Labkesda Kota Cilegon untuk dikirimkan ke Litbangkes Jakarta untuk mengetahui diagnosa,\" kata Ratih di kantornya, Kamis (11/8/2022).\r\n<br><br>\r\nArtikel ini telah tayang di Kompas.com dengan judul \"Warga Cilegon Diduga Terjangkit Cacar Monyet, Dinkes Sebut Gejalanya Tak Spesifik\", Klik untuk baca: https://regional.kompas.com/read/2022/08/12/143806078/warga-cilegon-diduga-terjangkit-cacar-monyet-dinkes-sebut-gejalanya-tak.\r\nPenulis : Kontributor Serang, Rasyid Ridho\r\nEditor : Teuku Muhammad Valdy Arief\r\n<br><br>\r\nDownload aplikasi Kompas.com untuk akses berita lebih mudah dan cepat:\r\nAndroid: https://bit.ly/3g85pkA\r\niOS: https://apple.co/3hXWJ0L', 'Y', 'Y', 'Y', 7, '06e648f6ace1fdc77924540063c426f3.jpg', 'Y', '2022-08-15'),
(98, 'Cara Daftar Vaksin Dosis Ke-4, Kapan untuk Masyarakat Umum?', 'cara-daftar-vaksin-dosis-ke-4-kapan-untuk-masyarakat-umum', ' Vaksinasi Covid-19 booster kedua atau vaksin dosis 4 sudah mulai diberikan kepada para nakes (tenaga kesehatan) sejak Jumat (29/7/2022). Lantas, bagaimana cara daftar vaksin dosis ke-4? Simak ulasannya berikut ini.\r\n\r\nAnjuran mengenai vaksin booster kedua atau dosis 4 ini tertuang dalam SE (surat edaran) yang dikeluarkan Direktorat Jenderal Pencegahan dan Pengendalian Penyakit (P2P) Kemenkes, pada 28 Juli 2022 dengan nomor HK.02.02/C.3615/2022.\r\n<br><br>\r\nDalam surat edaran tersebut memerintahkan agar Kepala Dinkes (Dinas Kesehatan) Provinsi maupun kabupaten/kota menggelar vaksinasi dosis 4 untuk para nakes. Ini seperti yang ditulis oleh Maxi Rein Rondonuwu selaku Dirjen P2P Kemenkes seperti di bawah ini.\r\n<br><br>\r\n\"Mulai 29 Juli 2022, pemberian vaksin Covid-19 booster ke-2 atau vaksin dosis keempat) sudah mulai dilakukan bagi bagi SDM kesehatan,\" ', 'N', 'N', 'N', 6, '1158d73af351312a217805cfe235ae7a.jpg', 'Y', '2022-08-15'),
(100, 'Update Covid-19 Minggu 14 Agustus 2022: Positif 6.282.774, Sembuh 6.072.421, Meninggal 157.226', 'update-covid-19-minggu-14-agustus-2022-positif-6-282-774-sembuh-6-072-421-meninggal-157-226', 'Kasus harian positif Covid-19 di Indonesia kembali bertambah. Jumlah pasien terpapar virus Corona pada hari ini, Minggu (14/8/2022) bertambah 4.442 orang, sehingga total kasus positif terhitung sejak Maret 2020 menjadi 6.282.774 orang.\r\n<br><br>\r\nSeiring kenaikan jumlah pasien positif, Satuan Tugas (Satgas) Penanganan Covid-19 juga mengungkap adanya penambahan pasien sembuh dan dinyatakan negatif virus Corona. \r\nKasus sembuh tersebut naik sebanyak 4.903 orang Dengan begitu, maka angka kumulatif kasus sembuh dari paparan virus Corona di Indonesia hingga saat ini telah mencapai 6.072.421 jiwa.  \r\n<br><br>\r\nSementara itu, pasien meninggal dunia akibat terpapar Covid-19 juga dilaporkan Satgas Covid-19 terus bertambah.\r\n<br><br>\r\nTercatat jumlah keseluruhan warga yang berpulang hari ini dilaporkan mencapai 157.226 kasus, setelah terjadi penambahan 18 jiwa.   \r\n<br><br>\r\nData update pasien Covid-19 ini tercatat sejak Sabtu, 13 Agustus 2022, pukul 12.00 WIB hingga hari ini, Minggu 14 Agustus pada jam yang sama. \r\n<br><br>\r\nSementara itu, Presiden Joko Widodo atau Jokowi memberikan tanda kehormatan 127 orang yang dinilai berjasa bagi Indonesia, di Istana Negara Jakarta, Jumat (12/8/2022). Dari jumlah itu, sebanyak 123 penerima tanda kehormatan merupakan tenaga medis dan kesehatan yang gugur dalam menangani Covid-19.\r\n<br><br>\r\n\"Total keseluruhan 127 penerima yang berasal dari tokoh masyarakat, ilmuwan, mantan pejabat kemiliteran, serta para tenaga medis dan kesehatan yang gugur dalam menangani Covid-19,\" kata Kepala Biro Gelar, Tanda Jasa, dan Tanda Kehormatan Brigjen TNI (Mar) Ludi Prastyono, Jumat, 12 Agustus 2022.\r\n<br><br>\r\nAda dua jenis penghargaan yang diberikan untuk tenaga medis dan kesehatan yakni, tanda kehormatan Bintang Jasa Pratama untuk 98 penerima. Kemudian, Bintang Jasa Nararya untuk 23 tenaga kesehatan.\r\n<br><br>\r\nPenghargaan ini diberikan dalam rangka HUT Kemerdekaan ke-77 RI. Tanda kehormatan tahun ini terdiri atas Bintang Mahaputera Pratama, Bintang Tanda Jasa Utama, Bintang Budaya Parama Dharma, Bintang Jasa Pratama, dan Bintang Jasa Nararya.\r\n<br><br>\r\nPemberian tanda kehormatan ini berdasarkan Keputusan Presiden (Keppres) Nomor 64, 65, dan 66/TK Tahun 2022 tentang Penganugerahan Tanda Kehormatan Bintang Mahaputera Pratama, Bintang Jasa, dan Bintang Budaya Parama Dharma.', 'N', 'N', 'N', 7, '2967c5ed707d4c0ca9115aa1c0849fd2.jpg', 'Y', '2022-08-15'),
(101, 'Bisa Turunkan Berat Badan, Berapa Sih Biaya Operasi Bariatrik?', 'bisa-turunkan-berat-badan-berapa-sih-biaya-operasi-bariatrik', 'Puskesmas Pagaden Barat, \r\n<br><br>\r\nOperasi bariatrik jadi salah satu solusi buat pasien obesitas. Namun Anda perlu mengetahui biaya operasi bariatrik, terutama biaya operasi bariatrik di Indonesia.\r\nPeter Ian Limas, dokter spesialis bedah-subspesialis bedah digestif RS Pondok Indah di Pondok Indah, mengatakan biaya operasi bariatrik tergantung dari kondisi pasien.\r\n<br><br>\r\n\"Ini juga dilihat dari tekniknya, apa perlu alat bantu lain? Dengan USG, itu juga butuh biaya lebih besar. Untuk biaya agak susah ya, bisa sekitar Rp60-200 juta bisa,\" kata Peter dalam wawancara terbatas dengan RSPI Group akhir pekan lalu.\r\n<br><br>\r\n', 'N', 'N', 'N', 6, '55846ec37a8b209c014fae9aad5b70d3.jpeg', 'Y', '2022-08-15'),
(102, '5 Kebiasaan yang Menyebabkan Darah Rendah, Hati-hati Pingsan ', '5-kebiasaan-yang-menyebabkan-darah-rendah-hati-hati-pingsan', 'Beberapa orang bisa mengalami darah rendah. Ada beberapa kebiasaan yang menyebabkan darah rendah.\r\nSaat mengalami darah rendah, seseorang akan merasa pusing, pandangan gelap, hingga kulit menjadi pucat. Ketiganya menjadi gejala darah rendah yang paling utama.\r\n<br><br>\r\nDarah rendah juga ditandai dengan tekanan darah kurang dari 90/60 mmHg. Dalam kondisi parah, darah rendah bisa membuat seseorang pingsan.\r\n<br><br>\r\nAda banyak penyebab darah rendah. Namun, beberapa kebiasaan sehari-hari tampaknya turut berkontribusi dalam menurunkan tekanan darah. Berikut diantranya.\r\n<br><br>\r\n1. Kurang minum air putih\r\nDehidrasi menjadi faktor utama penyebab darah rendah. Mengutip laman Mayo Clinic, ketika tubuh tidak memiliki cukup air, jumlah darah dalam tubuh (volume darah) akan berkurang. Hal ini dapat menyebabkan tekanan darah turun.\r\n<br><br>\r\nDemam, muntah, diare parah, penggunaan obat diuretik yang berlebihan, dan olahraga berat dapat menyebabkan dehidrasi.\r\n<br><br>\r\n2. Kekurangan nutrisi dari makanan\r\nKebiasaan yang menyebabkan darah rendah lainnya adalah jarang mengonsumsi makanan bernutrisi.\r\n<br><br>\r\nRendahnya kadar vitamin B-12, folat, dan zat besi dapat mencegah tubuh memproduksi sel darah merah yang cukup. Hal ini tentu saja dapat menyebabkan tekanan darah rendah.\r\n<br><br>\r\n3. Kurang aktif bergerak\r\nIlustrasi. Jarang bergerak jadi salah satu kebiasaan yang menyebabkan darah rendah. (iStock/Delmaine Donson)\r\nBergerak atau berolahraga menjadi landasan hidup sehat. Orang dewasa disarankan berolahraga teratur setidaknya 90-150 menit per pekan.\r\n<br><br>\r\n4. Kurang tidur\r\nTidur menjadi sarana organ tubuh beristirahat. Setidaknya Anda memerlukan tidur selama kurang lebih tujuh jam setiap malamnya. Kurang tidur atau jam tidur tidak teratur bukan hanya membuat tekanan darah rendah, tapi bisa membuat tekanan darah tinggi.\r\n<br><br>\r\n5. Konsumsi minuman beralkohol\r\nMengutip Healthline, alkohol bisa membuat Anda dehidrasi dan menyebabkan tekanan darah rendah.\r\n<br><br>\r\nDemikian beberapa kebiasaan yang menyebabkan darah rendah. Segera temui dokter jika Anda mengalami gejala darah rendah.', 'N', 'N', 'N', 6, 'fb6d5a90df043e8812e36c594e7dabae.jpeg', 'Y', '2022-08-15'),
(103, 'Makin Banyak yang Kena Flu, Ini Beda Gejala Flu Biasa dan Covid-19.', 'makin-banyak-yang-kena-flu-ini-beda-gejala-flu-biasa-dan-covid-19', 'Covid-19 makin disepelekan karena dianggap sama saja dengan flu biasa. Sebelum berakhir fatal, sebaiknya bedakan gejala Covid-19 dan flu biasa.\r\nBelakangan kasus Covid-19 di Indonesia menunjukkan tren peningkatan. Salah satu faktor yang berkontribusi adalah protokol kesehatan yang makin longgar dan gejala Covid-19 yang dianggap ringan.\r\n<br><br>\r\nKehadiran subvarian baru, subvarian Omicron BA.4, BA.5 sampai yang terkini BA.2.75 terbilang memiliki gejala mirip Omicron. Sebagian orang pun menganggap Covid-19 seolah flu biasa sebab memiliki kemiripan gejala.\r\n\r\n<br><br>\r\n<h1>Apa beda gejala Covid-19 dan flu biasa?</h1>\r\nBaik Covid-19 maupun flu biasa memiliki gejala salah satunya batuk. Namun batuk pada Covid-19 cenderung kering, sedangkan batuk pada flu biasa cenderung batuk berdahak.\r\nAkan tetapi, Fathiyah Isbaniah, dokter spesialis paru-konsultan RSUP Persahabatan, mengingatkan untuk tetap waspada meski Anda mengalami batuk berdahak.\r\n<br><br>\r\n\"Kalau batuk, harus waspada dulu. Bisa aja Covid-19, ada infeksi sekunder lalu batuk berdahak. Infeksi sekunder bisa dari kuman, dari mulut, apalagi para perokok, cepat sekali jadi infeksi,\" jelas Fathiyah pada CNNIndonesia.com beberapa waktu lalu.\r\n<br><br>\r\nCukup sulit memang membedakan Anda terkena Covid-19 atau \'hanya\' flu biasa. Dia mengakui gejalanya tidak akan jauh-jauh dari demam, batuk, pilek, dan sakit tenggorokan.\r\n<br><br>\r\nKemiripan gejala ini disebabkan Covid-19 dan flu biasa sama-sama menyerang saluran pernapasan atas.\r\n\"Ini kan, gejala infeksi saluran napas atas, sama kayak flu. Agak sulit [dibedakan] ya,\" imbuhnya.\r\nSebaiknya, Anda tidak abai dengan gejala-gejala Covid-19, apalagi varian Omicron dan turunannya menunjukkan gejala ringan. Berikut gejala Covid-19 yang tidak boleh disepelekan.', 'N', 'N', 'N', 6, '3fe8e8d7b5b52b597d01382516c4da79.jpeg', 'Y', '2022-08-15'),
(104, 'Kasus Hepatitis B di Indonesia Tertinggi di Asia Tenggara', 'kasus-hepatitis-b-di-indonesia-tertinggi-di-asia-tenggara', 'Hepatitis B masih menjadi penyakit menular yang harus diwaspadai. Penyakit yang bisa menular ke bayi ini juga belum bisa dihilangkan di Indonesia.\r\nBahkan, saat ini prevalensi penyakit hepatitis B di Indonesia masih cukup tinggi.\r\n<br><br>\r\nPelaksana Tugas (Plt) Direktur Pencegahan dan Pengendalian Penyakit Menular (P2PM) Kementerian Kesehatan (Kemenkes), Tiffany Tiara Pakasi mengatakan, berdasarkan data dari Organisasi Kesehatan Dunia (WHO), Indonesia menempati urutan pertama penyandang penyakit hepatitis B di Asia Tenggara.\r\n<br><br>\r\nHepatitis B sendiri merupakan peradangan pada organ hati yang disebabkan oleh infeksi virus. Hepatitis B bisa berubah jadi kondisi kronis dan berujung komplikasi seperti sirosis dan kanker hati.\r\n<br><br>\r\nSelain menular melalui hubungan seksual dan jarum suntik, virus ini juga bisa ditularkan dari ibu hamil ke bayi dalam kandungan.\r\n<br><br>\r\nPemerintah sendiri tengah menggalakkan program pemberian obat antivirus Tenofovir untuk ibu hamil demi mencegah penularan hepatitis B ke bayi. Pemberian dilakukan saat usia kehamilan mencapai delapan minggu', 'N', 'N', 'N', 7, '602f904297b076d08a9bf2d30e0c7ac2.jpg', 'Y', '2022-08-15'),
(105, 'DIRGAHAYU RI INDONESIA PKM PAGBAR', 'dirgahayu-ri-indonesia-pkm-pagbar', 'Kegiatan Menyambut Kemerdekaan republik indonesia yang ke 77, Puskesmas Pagaden barat Memeriahkannya dengan mengadakan sebuah lomba lomba bagi para tim kesehatan dan tenaga medis dari puskesmas pagaden barat bersama dengan mahasiswa PKL dari universitas Mandiri subang. ', 'Y', 'Y', 'Y', 6, '1f8514f5c146b8cfc4fe6877dfb0e0cd.jpeg', 'Y', '2022-08-20');

-- --------------------------------------------------------

--
-- Table structure for table `submenu`
--

CREATE TABLE `submenu` (
  `id` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `sub_title` varchar(50) NOT NULL,
  `sub_url` varchar(50) NOT NULL,
  `is_active` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `submenu`
--

INSERT INTO `submenu` (`id`, `id_menu`, `sub_title`, `sub_url`, `is_active`) VALUES
(5, 3, 'Kategori', 'admin2/category', 'Y'),
(6, 3, 'Posting', 'admin2/posting', 'Y'),
(7, 4, 'Album', 'admin2/album', 'N'),
(8, 4, 'Gallery Foto', 'admin2/gallery', 'N'),
(10, 4, 'Banner', 'admin2/banner', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bidang`
--

CREATE TABLE `tbl_bidang` (
  `id_bidang` int(3) NOT NULL,
  `nama_bidang` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_bidang`
--

INSERT INTO `tbl_bidang` (`id_bidang`, `nama_bidang`) VALUES
(1, 'Paramedis'),
(2, 'Apotek'),
(3, 'Administrasi'),
(5, 'Bendahara');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_diagnosa_penyakit`
--

CREATE TABLE `tbl_diagnosa_penyakit` (
  `kode_diagnosa` varchar(6) NOT NULL,
  `nama_penyakit` varchar(50) NOT NULL,
  `ciri_ciri_penyakit` text NOT NULL,
  `keterangan` text NOT NULL,
  `ciri_ciri_umum` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_diagnosa_penyakit`
--

INSERT INTO `tbl_diagnosa_penyakit` (`kode_diagnosa`, `nama_penyakit`, `ciri_ciri_penyakit`, `keterangan`, `ciri_ciri_umum`) VALUES
('J11.1', 'Influenza', 'Dehidrasi, demam, kehilangan selera makan, kelelahan, kulit memerah, panas dingin, badan terasa sakit, or berkeringat', 'penyumbatan, pilek, or bersin', 'kongesti kepala, mual, napas pendek, pembengkakan kelenjar getah bening, sakit kepala, sakit tenggorokan, or tekanan dada');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dokter`
--

CREATE TABLE `tbl_dokter` (
  `kode_dokter` varchar(4) NOT NULL,
  `nama_dokter` varchar(30) NOT NULL,
  `jenis_kelamin` varchar(15) NOT NULL,
  `nomor_induk_dokter` varchar(20) NOT NULL,
  `tempat_lahir` varchar(30) NOT NULL,
  `tgl_lahir` varchar(10) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `id_poli` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_dokter`
--

INSERT INTO `tbl_dokter` (`kode_dokter`, `nama_dokter`, `jenis_kelamin`, `nomor_induk_dokter`, `tempat_lahir`, `tgl_lahir`, `alamat`, `id_poli`) VALUES
('D01', 'Dr BimoAdjie', 'Laki-Laki', '321', 'Subang', '19-09-2001', 'Jakarta', '2');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_hak_akses`
--

CREATE TABLE `tbl_hak_akses` (
  `id` int(2) NOT NULL,
  `id_user_level` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_hak_akses`
--

INSERT INTO `tbl_hak_akses` (`id`, `id_user_level`, `id_menu`) VALUES
(19, 1, 3),
(30, 1, 2),
(31, 1, 10),
(32, 1, 11),
(33, 1, 12),
(34, 1, 13),
(35, 1, 14),
(36, 1, 15),
(37, 1, 16),
(38, 1, 17),
(39, 1, 18),
(40, 1, 19),
(41, 1, 20),
(42, 1, 21),
(43, 1, 1),
(44, 1, 22),
(45, 1, 23),
(46, 1, 24),
(47, 1, 9),
(48, 1, 25),
(49, 1, 26),
(50, 1, 27),
(51, 1, 28),
(52, 1, 29),
(53, 1, 30),
(54, 1, 31),
(55, 1, 32),
(56, 1, 33),
(57, 1, 34),
(58, 1, 35),
(59, 1, 36),
(60, 1, 40),
(61, 1, 37),
(62, 1, 38),
(63, 1, 39),
(64, 1, 41),
(65, 1, 42),
(66, 1, 43),
(67, 1, 44),
(68, 1, 46),
(72, 2, 21),
(74, 2, 23),
(76, 1, 47),
(77, 1, 48),
(78, 1, 49),
(81, 1, 50),
(93, 1, 1),
(94, 1, 101),
(95, 1, 102),
(96, 1, 2),
(97, 1, 201),
(98, 1, 202),
(99, 1, 203),
(100, 1, 204),
(101, 1, 3),
(102, 1, 301),
(103, 1, 302),
(104, 1, 303),
(105, 1, 4),
(106, 1, 401),
(107, 1, 402),
(108, 1, 403),
(109, 1, 5),
(110, 1, 501),
(111, 1, 502),
(112, 1, 503),
(113, 1, 6),
(114, 1, 601),
(115, 1, 602),
(116, 1, 603),
(117, 5, 4),
(118, 5, 400),
(119, 5, 401),
(120, 5, 402),
(121, 5, 403),
(122, 5, 404),
(123, 3, 400),
(124, 3, 401),
(125, 3, 402),
(126, 3, 403),
(127, 3, 501),
(128, 3, 502),
(129, 3, 503),
(130, 3, 4),
(131, 3, 5),
(132, 4, 5),
(133, 4, 501),
(134, 4, 502),
(135, 4, 503),
(136, 1, 404),
(137, 3, 404);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jabatan`
--

CREATE TABLE `tbl_jabatan` (
  `id_jabatan` int(2) NOT NULL,
  `nama_jabatan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_jabatan`
--

INSERT INTO `tbl_jabatan` (`id_jabatan`, `nama_jabatan`) VALUES
(1, 'Staff Apotek'),
(2, 'Staff Administrasi'),
(3, 'Kepala Puskesmas'),
(4, 'Staff Paramedis');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jadwal_praktek_dokter`
--

CREATE TABLE `tbl_jadwal_praktek_dokter` (
  `id_jadwal` int(2) NOT NULL,
  `kode_dokter` varchar(4) NOT NULL,
  `hari` varchar(13) NOT NULL,
  `jam_mulai` varchar(13) NOT NULL,
  `jam_selesai` varchar(13) NOT NULL,
  `id_poli` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_jadwal_praktek_dokter`
--

INSERT INTO `tbl_jadwal_praktek_dokter` (`id_jadwal`, `kode_dokter`, `hari`, `jam_mulai`, `jam_selesai`, `id_poli`) VALUES
(6, 'K-02', 'Rabu', '14.30', '16.30', 2),
(7, 'S-23', 'Senin', '07.30', '11.30', 1),
(8, 'S-24', 'Sabtu', '07.30', '11.00', 2),
(12, 'D01', 'Senin', '08.00', '11.00', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_menu`
--

CREATE TABLE `tbl_menu` (
  `id_menu` int(3) NOT NULL,
  `title` varchar(50) NOT NULL,
  `url` varchar(30) NOT NULL,
  `icon` varchar(30) NOT NULL,
  `is_main_menu` int(3) NOT NULL,
  `is_aktif` enum('y','n') NOT NULL COMMENT 'y=yes,n=no'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_menu`
--

INSERT INTO `tbl_menu` (`id_menu`, `title`, `url`, `icon`, `is_main_menu`, `is_aktif`) VALUES
(1, 'USERS ', '#', 'fa fa-users', 0, 'y'),
(2, 'KELOLA DATA NAKES', '#', 'fa fa-server', 0, 'y'),
(3, 'KELOLA DATA PEGAWAI ', '#', 'fa fa-user-o', 0, 'y'),
(4, 'KELOLA DATA PASIEN', '#', 'fa fa-wheelchair-alt', 0, 'y'),
(5, 'KELOLA DATA OBAT ', '#', 'fa fa-medkit', 0, 'y'),
(6, 'MANAJEMEN ARTIKEL', 'admin2/banner', 'fa fa-file-text-o', 0, 'y'),
(58, 'DATA DOKTER', 'kelolamenu', 'fa fa-server', 0, 'n'),
(101, 'KELOLA PENGGUNA', 'user', 'fa fa-user-md', 1, 'y'),
(102, 'level PENGGUNA', 'userlevel', 'fa fa-users', 1, 'y'),
(201, 'DATA DOKTER', 'dokter', 'fa fa-graduation-cap', 2, 'y'),
(202, 'DATA PARAMEDIS', 'paramedis', 'fa fa-graduation-cap', 2, 'y'),
(203, 'DATA POLI', 'poli', 'fa fa-bed', 2, 'y'),
(204, 'JADWAL PRAKTEK DOKTER', 'jadwalpraktek', 'fa fa-calendar', 2, 'y'),
(301, 'DATA PEGAWAI', 'pegawai', 'fa fa-user-circle', 3, 'y'),
(302, 'DATA JABATAN', 'jabatan', 'fa fa-area-chart', 3, 'y'),
(303, 'DATA BIDANG', 'bidang', 'fa fa-user-circle', 3, 'y'),
(400, 'DATA PASIEN UMUM', 'pasienumum', 'fa fa-users', 4, 'y'),
(401, 'DATA PASIEN BPJS', 'pasienbpjs', 'fa fa-user', 4, 'y'),
(402, 'DATA PENDAFTARAN BPJS', 'pendaftaranbpjs', 'fa fa-sign-in', 4, 'y'),
(403, 'DATA PENDAFTARAN UMUM', 'pendaftaranumum', 'fa fa-sign-in', 4, 'y'),
(404, 'DATA DIAGNOSA', 'diagnosa', 'fa fa-id-card', 4, 'y'),
(501, 'PENGADAAN OBAT', 'pengadaanobat', 'fa fa-bed', 5, 'y'),
(502, 'PENGELUARAN OBAT', 'pengeluaranobat', 'fa fa-calendar', 5, 'y'),
(503, 'DATA OBAT-OBATAN', 'dataobat', 'fa fa-user', 5, 'y'),
(601, 'DASHBOARD', 'admin2', 'fa fa-upload', 6, 'y');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_obat`
--

CREATE TABLE `tbl_obat` (
  `kode_obat` varchar(5) NOT NULL,
  `nama_obat` varchar(50) NOT NULL,
  `jenis_obat` varchar(50) NOT NULL,
  `dosis_aturan_obat` varchar(40) NOT NULL,
  `satuan` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_obat`
--

INSERT INTO `tbl_obat` (`kode_obat`, `nama_obat`, `jenis_obat`, `dosis_aturan_obat`, `satuan`) VALUES
('O01', 'Paracetamol', 'Panas', '3x1', 'Strip');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_paramedis`
--

CREATE TABLE `tbl_paramedis` (
  `kode_paramedis` varchar(4) NOT NULL,
  `nama_paramedis` varchar(30) NOT NULL,
  `jenis_kelamin` varchar(15) NOT NULL,
  `no_izin_paramedis` varchar(20) NOT NULL,
  `tempat_lahir` varchar(30) NOT NULL,
  `tanggal_lahir` varchar(10) NOT NULL,
  `alamat_tinggal` text NOT NULL,
  `id_poli` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_paramedis`
--

INSERT INTO `tbl_paramedis` (`kode_paramedis`, `nama_paramedis`, `jenis_kelamin`, `no_izin_paramedis`, `tempat_lahir`, `tanggal_lahir`, `alamat_tinggal`, `id_poli`) VALUES
('P01', 'Seli Silpiyanti', 'Perempuan', '12345', 'Subang', '08-12-2001', 'Kalijati', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pasienbpjs`
--

CREATE TABLE `tbl_pasienbpjs` (
  `tanggal_pendaftaran` varchar(10) NOT NULL,
  `jam_pendaftaran` varchar(20) NOT NULL,
  `status_pasien` varchar(10) NOT NULL,
  `no_rekamedis` char(6) NOT NULL,
  `ketpasien` varchar(4) NOT NULL,
  `no_ktp` varchar(16) NOT NULL,
  `no_bpjs` varchar(20) NOT NULL,
  `nama_pasien` varchar(30) NOT NULL,
  `bin_binti` varchar(255) NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `tanggal_lahir` varchar(10) NOT NULL,
  `alamat` text NOT NULL,
  `rt_rw_lengkap` varchar(255) NOT NULL,
  `id_poli` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pasienumum`
--

CREATE TABLE `tbl_pasienumum` (
  `tanggal_pendaftaran` varchar(10) NOT NULL,
  `jam_pendaftaran` varchar(20) NOT NULL,
  `status_pasien` varchar(10) NOT NULL,
  `no_rekamedis` char(6) NOT NULL,
  `ketpasien` varchar(4) NOT NULL,
  `no_ktp` varchar(16) NOT NULL,
  `nama_pasien` varchar(255) NOT NULL,
  `bin_binti` varchar(255) NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `tanggal_lahir` varchar(10) NOT NULL,
  `alamat` text NOT NULL,
  `rt_rw_lengkap` varchar(255) NOT NULL,
  `id_poli` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pegawai`
--

CREATE TABLE `tbl_pegawai` (
  `id_pegawai` varchar(20) NOT NULL,
  `nama_pegawai` varchar(50) NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `npwp` varchar(25) NOT NULL,
  `tempat_lahir` varchar(30) NOT NULL,
  `tanggal_lahir` varchar(10) NOT NULL,
  `id_jabatan` int(2) NOT NULL,
  `id_bidang` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pegawai`
--

INSERT INTO `tbl_pegawai` (`id_pegawai`, `nama_pegawai`, `jenis_kelamin`, `npwp`, `tempat_lahir`, `tanggal_lahir`, `id_jabatan`, `id_bidang`) VALUES
('3213280908950002', 'Fahrizal', 'Laki-Laki', '00012345321', 'Jawa Tengah', '20-08-2021', 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pendaftaranbpjs`
--

CREATE TABLE `tbl_pendaftaranbpjs` (
  `no_rawat` varchar(30) NOT NULL,
  `no_rekamedis` varchar(30) NOT NULL,
  `tindakan` varchar(255) NOT NULL,
  `kode_dokter` varchar(255) NOT NULL,
  `id_poli` varchar(30) NOT NULL,
  `nama_pasien` varchar(30) NOT NULL,
  `kode_diagnosa` varchar(255) NOT NULL,
  `keluhan` text NOT NULL,
  `status_pasien` varchar(10) NOT NULL,
  `no_bpjs` varchar(20) NOT NULL,
  `no_ktp` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pendaftaranumum`
--

CREATE TABLE `tbl_pendaftaranumum` (
  `no_rawat` varchar(30) NOT NULL,
  `no_rekamedis` varchar(30) NOT NULL,
  `tindakan` varchar(255) NOT NULL,
  `kode_dokter` varchar(255) NOT NULL,
  `id_poli` varchar(30) NOT NULL,
  `nama_pasien` varchar(30) NOT NULL,
  `kode_diagnosa` varchar(255) NOT NULL,
  `keluhan` text NOT NULL,
  `status_pasien` varchar(10) NOT NULL,
  `no_ktp` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pengadaan_obat`
--

CREATE TABLE `tbl_pengadaan_obat` (
  `id_pengadaan` varchar(6) NOT NULL,
  `no_trans` varchar(15) NOT NULL,
  `supplier` varchar(50) NOT NULL,
  `kode_obat` varchar(5) NOT NULL,
  `nama_obat` varchar(50) NOT NULL,
  `jenis_obat` varchar(50) NOT NULL,
  `harga_beli` int(11) NOT NULL,
  `jumlah` int(4) NOT NULL,
  `satuan` varchar(15) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `total` int(11) NOT NULL,
  `tgl_transaksi` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pengadaan_obat`
--

INSERT INTO `tbl_pengadaan_obat` (`id_pengadaan`, `no_trans`, `supplier`, `kode_obat`, `nama_obat`, `jenis_obat`, `harga_beli`, `jumlah`, `satuan`, `keterangan`, `total`, `tgl_transaksi`) VALUES
('0001', 'B-220820-0001', '', 'O01', 'Paracetamol', 'Panas', 3500, 50, 'Strip', 'Pembelian 50 Strip Obat Paracetamol', 175000, '20-08-2022'),
('0001', 'B-220820-0001', '', 'O01', 'Paracetamol', 'Panas', 3500, 50, 'Strip', 'Pembelian 50 Strip Obat Paracetamol', 175000, '20-08-2022');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pengeluaran_obat`
--

CREATE TABLE `tbl_pengeluaran_obat` (
  `id_pengeluaran` varchar(6) NOT NULL,
  `no_terima_obat` char(15) NOT NULL,
  `nama_pasien` varchar(50) NOT NULL,
  `kode_obat` varchar(5) NOT NULL,
  `nama_obat` varchar(50) NOT NULL,
  `jenis_obat` varchar(50) NOT NULL,
  `dosis_aturan_obat` varchar(50) NOT NULL,
  `jumlah` int(4) NOT NULL,
  `satuan` varchar(15) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `tgl_serah_obat` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pengeluaran_obat`
--

INSERT INTO `tbl_pengeluaran_obat` (`id_pengeluaran`, `no_terima_obat`, `nama_pasien`, `kode_obat`, `nama_obat`, `jenis_obat`, `dosis_aturan_obat`, `jumlah`, `satuan`, `keterangan`, `tgl_serah_obat`) VALUES
('0001', 'S-220820-0001', 'Sanusi', 'O01', 'Paracetamol', 'Panas', '3x1', 50, 'Strip', 'Pembelian 50 Strip Obat Paracetamol', '20-08-2022');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_poli`
--

CREATE TABLE `tbl_poli` (
  `id_poli` int(2) NOT NULL,
  `nama_poli` varchar(40) NOT NULL,
  `ruang_poli` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_poli`
--

INSERT INTO `tbl_poli` (`id_poli`, `nama_poli`, `ruang_poli`) VALUES
(1, 'POLI GIGI', 'RUANG POLI GIGI'),
(2, 'POLI UMUM', 'RUANG POLI UMUM'),
(4, 'POLI KIA/KB', 'RUANG POLI KIA/KB'),
(5, 'POLI MTBS', 'Ruang Poli MTBS');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_setting`
--

CREATE TABLE `tbl_setting` (
  `id_setting` int(11) NOT NULL,
  `nama_setting` varchar(50) NOT NULL,
  `value` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_setting`
--

INSERT INTO `tbl_setting` (`id_setting`, `nama_setting`, `value`) VALUES
(1, 'Tampil Menu', 'ya');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_users` int(2) NOT NULL,
  `full_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `images` text NOT NULL,
  `id_user_level` int(11) NOT NULL,
  `is_aktif` enum('y','n') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_users`, `full_name`, `email`, `password`, `images`, `id_user_level`, `is_aktif`) VALUES
(19, 'admin', 'admin@gmail.com', '$2y$04$bwosUfANUmZ7m64bdR6iqePuSxnUHsh5hudaRRDjjdCGaXZI9FtYa', '585e4bf3cb11b227491c339a.png', 1, 'y'),
(20, 'pkmpagbar', 'pkmpagbar@gmail.com', '$2y$04$3r3YYPxlcBUxLLMYoPgdyeRaMhldMTHkUp7fp83dI6GR9p3u3P/r6', '585e4bf3cb11b227491c339a1.png', 5, 'y'),
(21, 'dokter', 'dokter@gmail.com', '$2y$04$8ClnTclLgtNOznKYArHZoO56l4UoS.uEzSxqHPTkqe7wpaBfHeIaG', '585e4bf3cb11b227491c339a2.png', 3, 'y'),
(22, 'apotek', 'apotek@gmail.com', '$2y$04$xxJ83ovceGl1PutnwaflquGfgIBXtUX2q4sJXYOtqIVTgQQvlmQrq', '585e4bf3cb11b227491c339a3.png', 4, 'y');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_level`
--

CREATE TABLE `tbl_user_level` (
  `id_user_level` int(2) NOT NULL,
  `nama_level` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user_level`
--

INSERT INTO `tbl_user_level` (`id_user_level`, `nama_level`) VALUES
(1, 'Admin'),
(3, 'Dokter'),
(4, 'Apotek'),
(5, 'Pendaftaran');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(254) NOT NULL,
  `activation_selector` varchar(255) DEFAULT NULL,
  `activation_code` varchar(255) DEFAULT NULL,
  `forgotten_password_selector` varchar(255) DEFAULT NULL,
  `forgotten_password_code` varchar(255) DEFAULT NULL,
  `forgotten_password_time` int(11) UNSIGNED DEFAULT NULL,
  `remember_selector` varchar(255) DEFAULT NULL,
  `remember_code` varchar(255) DEFAULT NULL,
  `created_on` int(11) UNSIGNED NOT NULL,
  `last_login` int(11) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `email`, `activation_selector`, `activation_code`, `forgotten_password_selector`, `forgotten_password_code`, `forgotten_password_time`, `remember_selector`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`) VALUES
(1, '127.0.0.1', 'administrator', '$2y$12$D6hE5CDLWqwrUycGclV0N.1KMKVqqolfa2xeD3S.6h7uNDSUbaZ4O', 'admin.profile@admin.com', NULL, '', NULL, NULL, NULL, NULL, NULL, 1268889823, 1660171465, 1, 'admin', 'admin', NULL, '0123456789');

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

CREATE TABLE `users_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(40, 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posting`
--
ALTER TABLE `posting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `submenu`
--
ALTER TABLE `submenu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_bidang`
--
ALTER TABLE `tbl_bidang`
  ADD PRIMARY KEY (`id_bidang`);

--
-- Indexes for table `tbl_diagnosa_penyakit`
--
ALTER TABLE `tbl_diagnosa_penyakit`
  ADD PRIMARY KEY (`kode_diagnosa`);

--
-- Indexes for table `tbl_dokter`
--
ALTER TABLE `tbl_dokter`
  ADD PRIMARY KEY (`kode_dokter`);

--
-- Indexes for table `tbl_hak_akses`
--
ALTER TABLE `tbl_hak_akses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_jabatan`
--
ALTER TABLE `tbl_jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indexes for table `tbl_jadwal_praktek_dokter`
--
ALTER TABLE `tbl_jadwal_praktek_dokter`
  ADD PRIMARY KEY (`id_jadwal`);

--
-- Indexes for table `tbl_menu`
--
ALTER TABLE `tbl_menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indexes for table `tbl_obat`
--
ALTER TABLE `tbl_obat`
  ADD PRIMARY KEY (`kode_obat`);

--
-- Indexes for table `tbl_paramedis`
--
ALTER TABLE `tbl_paramedis`
  ADD PRIMARY KEY (`kode_paramedis`),
  ADD KEY `id_spesialis` (`id_poli`);

--
-- Indexes for table `tbl_pegawai`
--
ALTER TABLE `tbl_pegawai`
  ADD PRIMARY KEY (`id_pegawai`),
  ADD KEY `id_bidang` (`id_bidang`),
  ADD KEY `id_jabatan` (`id_jabatan`);

--
-- Indexes for table `tbl_pendaftaranbpjs`
--
ALTER TABLE `tbl_pendaftaranbpjs`
  ADD PRIMARY KEY (`no_rawat`);

--
-- Indexes for table `tbl_pendaftaranumum`
--
ALTER TABLE `tbl_pendaftaranumum`
  ADD PRIMARY KEY (`no_rawat`);

--
-- Indexes for table `tbl_pengeluaran_obat`
--
ALTER TABLE `tbl_pengeluaran_obat`
  ADD PRIMARY KEY (`no_terima_obat`);

--
-- Indexes for table `tbl_poli`
--
ALTER TABLE `tbl_poli`
  ADD PRIMARY KEY (`id_poli`);

--
-- Indexes for table `tbl_setting`
--
ALTER TABLE `tbl_setting`
  ADD PRIMARY KEY (`id_setting`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_users`);

--
-- Indexes for table `tbl_user_level`
--
ALTER TABLE `tbl_user_level`
  ADD PRIMARY KEY (`id_user_level`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_email` (`email`),
  ADD UNIQUE KEY `uc_activation_selector` (`activation_selector`),
  ADD UNIQUE KEY `uc_forgotten_password_selector` (`forgotten_password_selector`),
  ADD UNIQUE KEY `uc_remember_selector` (`remember_selector`);

--
-- Indexes for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  ADD KEY `fk_users_groups_users1_idx` (`user_id`),
  ADD KEY `fk_users_groups_groups1_idx` (`group_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `posting`
--
ALTER TABLE `posting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT for table `submenu`
--
ALTER TABLE `submenu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_bidang`
--
ALTER TABLE `tbl_bidang`
  MODIFY `id_bidang` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_hak_akses`
--
ALTER TABLE `tbl_hak_akses`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=138;

--
-- AUTO_INCREMENT for table `tbl_jabatan`
--
ALTER TABLE `tbl_jabatan`
  MODIFY `id_jabatan` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_jadwal_praktek_dokter`
--
ALTER TABLE `tbl_jadwal_praktek_dokter`
  MODIFY `id_jadwal` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_menu`
--
ALTER TABLE `tbl_menu`
  MODIFY `id_menu` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=606;

--
-- AUTO_INCREMENT for table `tbl_poli`
--
ALTER TABLE `tbl_poli`
  MODIFY `id_poli` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_setting`
--
ALTER TABLE `tbl_setting`
  MODIFY `id_setting` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_users` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tbl_user_level`
--
ALTER TABLE `tbl_user_level`
  MODIFY `id_user_level` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
