-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 08 Mei 2016 pada 15.48
-- Versi Server: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `rpl2share`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `akun`
--

CREATE TABLE IF NOT EXISTS `akun` (
`id` int(5) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `username` varchar(40) DEFAULT NULL,
  `password` varchar(40) DEFAULT NULL,
  `img` varchar(60) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data untuk tabel `akun`
--

INSERT INTO `akun` (`id`, `nama`, `username`, `password`, `img`) VALUES
(2, 'admin Z', 'zaidan21', 'naruto', '1.png'),
(3, 'eko doang', 'eko123', 'kocak', '6.png'),
(8, 'Muhammad Alfiansyah', 'AlBeans123', 'Agustus200', '8.png'),
(9, 'zaidan riski', 'zdnrsk21', 'naruto789', '5.png'),
(10, 'esya mulyana', 'esyamt10', 'tytyd6969', '10.png'),
(11, 'Muhammad Izar', 'wpizar', 'koplak123', '9.png'),
(12, 'dadang kocak', 'dadang21', 'sedotwcumum', '4.png'),
(13, 'izar .', 'wpizar', 'koplak123', 'avatarpng');

-- --------------------------------------------------------

--
-- Struktur dari tabel `komentar`
--

CREATE TABLE IF NOT EXISTS `komentar` (
`no` int(15) NOT NULL,
  `id` int(10) NOT NULL,
  `komentar` text NOT NULL,
  `nama` varchar(65) NOT NULL,
  `tanggal` date NOT NULL,
  `jam` time NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data untuk tabel `komentar`
--

INSERT INTO `komentar` (`no`, `id`, `komentar`, `nama`, `tanggal`, `jam`) VALUES
(1, 2, 'bagus ', 'zaidan', '2016-10-21', '00:00:00'),
(2, 0, 'mantap bos', 'zaidan riski', '2016-04-12', '00:00:00'),
(3, 0, 'mantap bos', 'zaidan riski', '2016-04-12', '00:00:00'),
(4, 2, 'keren om', 'zaidan riski', '2016-04-12', '00:00:00'),
(5, 2, 'mantap', 'zaidan riski', '2016-04-12', '00:00:00'),
(6, 2, 'SSS', 'zaidan riski', '2016-04-12', '00:00:00'),
(7, 6, 'keren om\r\njangan lupa kunball nya', 'zaidan riski', '2016-04-12', '00:00:00'),
(8, 5, 'mantap<br />\r\nmakasih ya', 'zaidan riski', '2016-04-12', '00:00:00'),
(9, 0, 'keren', 'admin Z', '2016-04-14', '00:00:00'),
(10, 0, 'komen ya yang sopan<br />\r\nterimakasih', 'admin Z', '2016-04-14', '00:00:00'),
(11, 0, 'coeg', 'eko doang', '2016-04-17', '00:00:00'),
(12, 0, 'ntap\r\n', 'zaidan riski', '2016-05-02', '19:22:16');

-- --------------------------------------------------------

--
-- Struktur dari tabel `postingan`
--

CREATE TABLE IF NOT EXISTS `postingan` (
`id` int(5) NOT NULL,
  `judul` text,
  `isi` text,
  `tanggal` date DEFAULT NULL,
  `nama` varchar(40) DEFAULT NULL,
  `Kategori` varchar(50) NOT NULL,
  `jenis` varchar(60) NOT NULL,
  `mapel` varchar(60) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data untuk tabel `postingan`
--

INSERT INTO `postingan` (`id`, `judul`, `isi`, `tanggal`, `nama`, `Kategori`, `jenis`, `mapel`) VALUES
(2, 'tutorial membuat long shadow di photoshop', '<img src="/rpl2share/img/ZDNLS.png" width="70"><br>\r\n<p>pada kesempatan kali ini saya ingin memberi tutorial tentang cara membuat long shadow di photoshop.</p><br>\r\n<ul>\r\n<li>buat halaman baru di photoshop dengan ukuran sesuai dengan kebutuhan anda</li>\r\n<li>setelah itu warnai background layar dengan warna sesuai keinginan anda</li>\r\n<li>kemudian buat nama kamu dengan font tool</li>\r\n<li>setelah selesai klik pada layer font dan tekan <i>ctrl + j</i></li>\r\n<li>taruh duplicate layer tadi antara layer fonts dan background</li>\r\n<li>kemudian klik kanan dan pilih option dan pada overlay ganti warna menjadi hitam</li>\r\n<li>pada layer duplicate tadi tekan <i> ctrl + t</i> lalu tekan tombol kanan sekali dan bawah sekali kemudian tekan <i>enter</i></li>\r\n<li>tekan bersamaan <i>alt+ctrl+shift+T</i> berkali-kali hingga layer duplicate hingga 150</li>\r\n<li>jika sudah tekan <i>shift</i> duplicate tadi dan klik kanan lalu pilih rasterize layer dan merge layer</li>\r\n<li>layer yg di gabungkan tadi anda klik kanan dan pilih option pada.......</li>\r\n</ul>\r\nitulah tutorial cara membuat long shadow di photoshop ,semoga tutorial ini bermanfaat bagi anda\r\n  \r\n   ', '2016-03-15', 'zaidan riski', 'design', 'tutorial', 'design'),
(3, 'Pengertian HTML', 'Apa itu HTML\r\n<p>HTML(Hyper Text Markup Language) adalah sekumpulan simbol-simbol atau tag-tag yang \r\ndituliskan dalam sebuah file yang dimaksudkan untuk menampilkanhalaman pada web \r\nbrowser. Tag-tag tadi memberitahu browser bagaimana menampilkan halaman web dengan \r\nlengkap kepada pengguna. \r\nTag-tag HTML selalu diawali dengan <x> dan diakhiri dengan </x> dimana x tag HTML seperti \r\nb, i, u dan sebagainya.</p> ', '2016-03-30', 'eko doang', 'html', 'artikel', 'pemrograman web'),
(4, 'Pengenalan Action Script', '  Adobe ActionScript merupakan bahasa pemrograman yang bekerja di dalam platform Adobe Flash. <br /><br />\r\nAdobe ActionScript memang dibangun sebagai cara untuk mengembangkan pemrograman interaktif <br /><br />\r\nsecara efisien menggunakan platform aplikasi adobe Flash ActionScript mulai dari animasi yang <br /><br />\r\nsederhana sampai dengan yang kompleks sekalipun, penggunaan data, dan aplikasi interface yang <br /><br />\r\ninteraktif. Pertama kali diperkenalkan dalam Flash Player 9, ActionScript merupakan bahasa <br /><br />\r\npemrograman berorientasi objek didasarkan pada ECMAScript&#8208;standar yang sama yang menjadi dasar <br /><br />\r\nJavaScript&#8208;dan memberikan hasil yang luar biasa dalam kinerja dan produktifitas pengembang. ActionScript 2, <br /><br />\r\nversi ActionScript yang telah digunakan dalam Flash Player 8 dan sebelumnya, tetap didukung dalam Flash <br /><br />\r\nPlayer 9 dan Flash Player 10. (http://www.adobe.com/devnet/actionscript/) <br /><br />\r\nUntuk membangun aplikasi dengan menggunakan kode ActionScript 3.0, anda membutuhkan salah satu <br /><br />\r\ndari berikut ini. <br /><br />\r\n&#8208;  Adobe Flex 2 (atau yang lebih baru) Software Development Kit (SDK) beserta dengan teks editornya. <br /><br />\r\n&#8208;  Adobe Flash CS3 (atau release yang lebih baru)  <br /><br />\r\n&#8208;  Adobe Flex Builder 2 (atau release yang lebih baru) <br /><br />\r\nAdobe Flex Builder dan Adobe Flash CS3 merupakan integrated development environment (IDE) yang didesain <br /><br />\r\nuntuk membantu anda membangun aplikasi Flex secara cepat dan mudah. Flex Builder dan Flash CS3 tidak <br /><br />\r\ngratis, artiny a anda harus membayar lisensi dari Adobe. Saat penulisan buku ini, Anda bisa mencoba <br /><br />\r\nmendownload versi mencoba 30&#8208;hari. Flex builder dan Flash CS3 juga menyediakan visual interface yang <br /><br />\r\nmempermudah dalam membuat aplikasi Flex atau Flash.  <br /><br />\r\nFlex 2 SDK (atau release yang lebih baru) bersifat gratis untuk komersil maupun non komersil dan bisa <br /><br />\r\ndidownload dari website Adobe. Setelah anda menginstall Flex SDK, anda masih memerlukan sebuah teks <br /><br />\r\neditor untuk memasukkan program ActionScript anda. Selain Flex Builder yang berlisensi terdapat editor yang <br /><br />\r\nbersifat open source yang sangat baik, yaitu: FlashDevelop yang bekerja dalam sistem operasi Windows. <br /><br />\r\nFlashDevelop didesain secara khusus untuk bekerja dengan Flash maupun Flex.  FlashDevelop menjadi pilihan <br /><br />\r\npenulis untuk membuat aplikasi Flash animasi dalam buku ini karena gratis, relatif mudah, dan sangat <br /><br />\r\nmenolong dalam menuntun pemrograman, sehingga cocok untuk orang yang sedang belajar pemrograman <br /><br />\r\nataupun yang sudah mahir sekalipun. <br /><br />\r\n ', '2016-03-31', 'eko doang', 'lain', 'artikel', 'lainnya'),
(5, 'Sejarah PHP', 'PHP Pertama kali ditemukan pada 1995 oleh seorang Software Developer bernama <br />\r\nRasmus  Lerdrof.  Ide  awal  PHP  adalah  ketika  itu  Radmus  ingin  mengetahui  jumlah <br />\r\npengunjung  yang  membaca    resume  onlinenya.  script  yang  dikembangkan  baru  dapat <br />\r\nmelakukan  dua  pekerjaan,  yakni  merekam  informasi  visitor,  dan  menampilkan  jumlah <br />\r\npengunjung  dari  suatu  website.  Dan  sampai  sekarang  kedua  tugas  tersebut  masih  tetap <br />\r\npopuler  digunakan  oleh  dunia  web  saat  ini.  Kemudian,  dari  situ  banyak  orang  di  milis <br />\r\nmendiskusikan  script  buatan  Rasmus  Lerdrof,  hingga  akhirnya  rasmus  mulai  membuat <br />\r\nsebuah tool/script, bernama Personal Home Page (PHP).<br />\r\nKebutuhan PHP sebagai tool yang serba guna membuat Lerdorf melanjutkan untuk <br />\r\nmengembangkan  PHP  hingga  menjadi  suatu  bahasa  tersendiri  yang  mungkin  dapat <br />\r\nmengkonversikan  data  yang  di  inputkan  melalui  Form  HTML  menjadi  suatu  variable, <br />\r\nyang dapat dimanfaatkan oleh sistem lainnya. Untuk merealisasikannya, akhirnya Lerdrof <br />\r\nmencoba  mengembangkan  PHP  menggunakan  bahasa  C  ketimbang  menggunakan  Perl. <br />\r\nTahun 1997, PHP versi 2.0 di rilis, dengan nama Personal Home Page Form Interpreter <br />\r\n(PHP-FI). PHP Semakin popular, dan semakin diminati oleh programmer web dunia.<br />\r\nRasmus  Lerdrof  benar-benar  menjadikan  PHP  sangat  populer,  dan  banyak  sekali<br />\r\nTeam  Developer  yang  ikut  bergabung  dengan  Lerdrof  untuk  mengembangkan  PHP <br />\r\nhingga menjadi seperti sekarang, Hingga akhirnya dirilis versi ke 3-nya, pada Juni 1998, <br />\r\ndan  tercatat  lebih  dari  50.000  programmer  menggunakan  PHP  dalam  membuat  website <br />\r\ndinamis.<br />\r\nPengembangan  demi  pengembangan  terus  berlanjut,  ratusan  fungsi  ditambahkan <br />\r\nsebagai  fitur  dari  bahasa  PHP,  dan  di  awaal  tahun  1999,  netcraft  mencatat,  ditemukan <br />\r\n1.000.000  situs  di  dunia  telah  menggunakan  PHP.  Ini  membuktikan  bahwa  PHP <br />\r\nmerupakan bahasa yang paling populer digunakan oleh dunia web development. Hal ini <br />\r\nmengagetkan  para  developernya  termasuk  Rasmus  sendiri,  dan  tentunya  sangat  diluar <br />\r\ndugaan  sang  pembuatnya.  Kemudian  Zeev  Suraski  dan  Andi  Gutsman  selaku  core <br />\r\ndeveloper  (programmer  inti)  mencoba  untuk  menulis  ulang  PHP  Parser,  dan <br />\r\ndiintegrasikan   dengan  menggunakan  Zend  scripting  engine,  dan  mengubah  jalan  alur <br />\r\noperasi PHP. Dan semua fitur baru tersebut di rilis dalam PHP 4. <br />\r\n13 Juli 2004, evolusi PHP, PHP telah mengalami banyak sekali perbaikan disegala <br />\r\nsisi,  dan  wajar  jika  netcraft  mengumumkan  PHP  sebagai  bahasa  web  populer  didunia, <br />\r\nkarena tercatat 19 juta  domain telah menggunakan PHP sebagai server side scriptingnya. <br />\r\nPHP  saat  ini  telah  Mendukung  XML  dan  Web  Services,  Mendukung  SQLite.  Tercatat <br />\r\nlebih  dari  19  juta  domain  telah  menggunakan  PHP  sebagai  server  scriptingnya.  Benarbenar PHP sangat mengejutkan.<br />\r\nYang menjadikan PHP berbeda dengan HTML adalah proses dari PHP itu sendiri. <br />\r\nHTML  merupakan  bahasa  statis  yang  apabila  kita  ingin  merubah  konten/isinya  maka <br />\r\nyang  harus  dilakukan  pertama  kali  nya  adalah,  membuka  file-nya  terlebih  dahulu, <br />\r\nkemudian menambahkanisi  kedalam file tersebut. Beda hal nya dengan PHP. Bagi anda <br />\r\nyang  pernah  menggunakan  CMS  seperti  wordpress  atau  joomla  yang  dibangun  dengan <br />\r\nPHP tentunya, ketika akan  menambahkan konten kedalam website, anda tinggal  masuk <br />\r\nkedalam  halaman  admin,  kemudian  pilih  new  artikel  untuk  membuat  halaman/content <br />\r\nbaru.  Artinya  hal  ini,  seorang  user  tidak  berhubungan  langsung  dengan  scriptnya. <br />\r\nSehingga seorang pemula sekalipun dapat menggunakan aplikasi seperti itu.', '2016-03-31', 'Muhammad Alfiansyah', 'php', 'artikel', 'pemrograman web'),
(6, 'Pengertian Mysql dan Apache', '<b>MySQL adalah Database</b><br />\r\n  Database sendiri merupakan suatu jalan untuk dapat menyimpan berbagai informasi <br />\r\ndengan membaginya  berdasarkan kategori-kategori tertentu. Dimana informasi-infor masi <br />\r\ntersebut saling berkaitan, satu dengan yang lainnya.<br />\r\n<br />\r\n<b>MySQL bersifat RDBMS (Relational Database Management System)</b><br />\r\n  RDBMS  memungkinkan  seorang  admin  dapat  menyimpan  banyak  informasi  ke <br />\r\ndalam  table-table,  dimana  table-table  tersebut  saling  berkaitan  satu  sama  lain. <br />\r\nKeuntungan  RDBMS  sendiri  adalah  kita  dapat  memecah  database  kedalam  table-table <br />\r\nyang berbeda. setiap table memiliki informasi yang berkaitan dengan table yang lainnya.<br />\r\n<br />\r\n<b>Apa itu Apache?</b><br />\r\n1.<b>Merupakan webserver.</b> <br />\r\n   Tempat php engine/processor berada.  Tempat meletakkan file-file php  dan database.<br />\r\n  Ketika  user  melakukan  request  http://  membuka  suatu  halaman,  disinilah  apache <br />\r\n  bekerja. Menjawab request tersebut dengan menampilkan halaman yang diminta.<br />\r\n2.<b>Apache sama seperti PHP dan MySQL, Gratis.</b> <br />\r\n3.<b>Cross Platform</b><br />\r\n   Perbedaan  fungsi  antara  PHP,  MySQL  dan  Apache  adalah,  PHP  merupakan <br />\r\n  bahasanya,  MySQL  adalah  databasenya,  dan  Apache  merupakan  webserver  yang <br />\r\n  dapat mengeksekusi script php dan menampilkannya kepada user, dan melalui apache <br />\r\n  lah php dapat mengolah  data dan menyimpan data tersebut ke dalam database.', '2016-03-31', 'Muhammad Alfiansyah', 'php', 'artikel', 'pemrograman web');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `komentar`
--
ALTER TABLE `komentar`
 ADD PRIMARY KEY (`no`);

--
-- Indexes for table `postingan`
--
ALTER TABLE `postingan`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akun`
--
ALTER TABLE `akun`
MODIFY `id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `komentar`
--
ALTER TABLE `komentar`
MODIFY `no` int(15) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `postingan`
--
ALTER TABLE `postingan`
MODIFY `id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
