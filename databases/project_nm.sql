-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 09, 2019 at 10:07 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_nm`
--

-- --------------------------------------------------------

--
-- Table structure for table `access`
--

CREATE TABLE `access` (
  `id` int(11) NOT NULL,
  `access_control_id` int(11) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `access`
--

INSERT INTO `access` (`id`, `access_control_id`, `role_id`, `status`) VALUES
(2, 94, 17, 'active');

-- --------------------------------------------------------

--
-- Table structure for table `access_control`
--

CREATE TABLE `access_control` (
  `id` int(11) NOT NULL,
  `folder` varchar(255) DEFAULT NULL,
  `class` varchar(255) DEFAULT NULL,
  `method` varchar(255) DEFAULT NULL,
  `val` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `access_control`
--

INSERT INTO `access_control` (`id`, `folder`, `class`, `method`, `val`) VALUES
(1, '', 'Access', '__construct', 'access/__construct'),
(2, '', 'Access', 'index', 'access/index'),
(3, '', 'Access', 'json', 'access/json'),
(4, '', 'Access', 'control', 'access/control'),
(5, '', 'Access', 'store', 'access/store'),
(6, '', 'Access', 'konfig', 'access/konfig'),
(7, '', 'Access', 'upload_file', 'access/upload_file'),
(8, '', 'Access', 'get_uri', 'access/get_uri'),
(9, '', 'Access', 'log_activity', 'access/log_activity'),
(10, '', 'Access', 'get_instance', 'access/get_instance'),
(11, '', 'Crud', '__construct', 'crud/__construct'),
(12, '', 'Crud', 'index', 'crud/index'),
(13, '', 'Crud', 'viewcode', 'crud/viewcode'),
(14, '', 'Crud', 'generate', 'crud/generate'),
(15, '', 'Crud', 'get_kolom', 'crud/get_kolom'),
(16, '', 'Crud', 'save_generate', 'crud/save_generate'),
(17, '', 'Crud', 'api', 'crud/api'),
(18, '', 'Crud', 'api_generate', 'crud/api_generate'),
(19, '', 'Crud', 'services', 'crud/services'),
(20, '', 'Crud', 'konfig', 'crud/konfig'),
(21, '', 'Crud', 'upload_file', 'crud/upload_file'),
(22, '', 'Crud', 'get_uri', 'crud/get_uri'),
(23, '', 'Crud', 'log_activity', 'crud/log_activity'),
(24, '', 'Crud', 'get_instance', 'crud/get_instance'),
(25, '', 'Crud_ajax', '__construct', 'crud_ajax/__construct'),
(26, '', 'Crud_ajax', 'index', 'crud_ajax/index'),
(27, '', 'Crud_ajax', 'ajaxGetTableCustomer', 'crud_ajax/ajaxgettablecustomer'),
(28, '', 'Crud_ajax', 'validate', 'crud_ajax/validate'),
(29, '', 'Crud_ajax', 'tambah', 'crud_ajax/tambah'),
(30, '', 'Crud_ajax', 'hapus', 'crud_ajax/hapus'),
(31, '', 'Crud_ajax', 'ajaxGetModalCustomer', 'crud_ajax/ajaxgetmodalcustomer'),
(32, '', 'Crud_ajax', 'edit', 'crud_ajax/edit'),
(33, '', 'Crud_ajax', 'konfig', 'crud_ajax/konfig'),
(34, '', 'Crud_ajax', 'upload_file', 'crud_ajax/upload_file'),
(35, '', 'Crud_ajax', 'get_uri', 'crud_ajax/get_uri'),
(36, '', 'Crud_ajax', 'log_activity', 'crud_ajax/log_activity'),
(37, '', 'Crud_ajax', 'get_instance', 'crud_ajax/get_instance'),
(38, '', 'Debug', '__construct', 'debug/__construct'),
(39, '', 'Debug', 'index', 'debug/index'),
(40, '', 'Debug', 'exportexcell', 'debug/exportexcell'),
(41, '', 'Debug', 'ecryprdecrypt', 'debug/ecryprdecrypt'),
(42, '', 'Debug', 'validation_form', 'debug/validation_form'),
(43, '', 'Debug', 'konfig', 'debug/konfig'),
(44, '', 'Debug', 'upload_file', 'debug/upload_file'),
(45, '', 'Debug', 'get_uri', 'debug/get_uri'),
(46, '', 'Debug', 'log_activity', 'debug/log_activity'),
(47, '', 'Debug', 'get_instance', 'debug/get_instance'),
(48, '', 'Dropdown', '__construct', 'dropdown/__construct'),
(49, '', 'Dropdown', 'index', 'dropdown/index'),
(50, '', 'Dropdown', 'generate', 'dropdown/generate'),
(51, '', 'Dropdown', 'konfig', 'dropdown/konfig'),
(52, '', 'Dropdown', 'upload_file', 'dropdown/upload_file'),
(53, '', 'Dropdown', 'get_uri', 'dropdown/get_uri'),
(54, '', 'Dropdown', 'log_activity', 'dropdown/log_activity'),
(55, '', 'Dropdown', 'get_instance', 'dropdown/get_instance'),
(56, '', 'Fitur', '__construct', 'fitur/__construct'),
(57, '', 'Fitur', 'ekspor', 'fitur/ekspor'),
(58, '', 'Fitur', 'impor', 'fitur/impor'),
(59, '', 'Fitur', 'importdata', 'fitur/importdata'),
(60, '', 'Fitur', 'access', 'fitur/access'),
(61, '', 'Fitur', 'exportreport', 'fitur/exportreport'),
(62, '', 'Fitur', 'toPdf', 'fitur/topdf'),
(63, '', 'Fitur', 'konfig', 'fitur/konfig'),
(64, '', 'Fitur', 'upload_file', 'fitur/upload_file'),
(65, '', 'Fitur', 'get_uri', 'fitur/get_uri'),
(66, '', 'Fitur', 'log_activity', 'fitur/log_activity'),
(67, '', 'Fitur', 'get_instance', 'fitur/get_instance'),
(68, '', 'Form_input', '__construct', 'form_input/__construct'),
(69, '', 'Form_input', 'index', 'form_input/index'),
(70, '', 'Form_input', 'ajaxGetAutocompleteCustomer', 'form_input/ajaxgetautocompletecustomer'),
(71, '', 'Form_input', 'ajaxGetSelectCustomer', 'form_input/ajaxgetselectcustomer'),
(72, '', 'Form_input', 'ajaxTambahCustomer', 'form_input/ajaxtambahcustomer'),
(73, '', 'Form_input', 'konfig', 'form_input/konfig'),
(74, '', 'Form_input', 'upload_file', 'form_input/upload_file'),
(75, '', 'Form_input', 'get_uri', 'form_input/get_uri'),
(76, '', 'Form_input', 'log_activity', 'form_input/log_activity'),
(77, '', 'Form_input', 'get_instance', 'form_input/get_instance'),
(78, '', 'Home', '__construct', 'home/__construct'),
(79, '', 'Home', 'index', 'home/index'),
(80, '', 'Home', 'chart', 'home/chart'),
(81, '', 'Home', 'get_autocomplete', 'home/get_autocomplete'),
(82, '', 'Home', 'konfig', 'home/konfig'),
(83, '', 'Home', 'upload_file', 'home/upload_file'),
(84, '', 'Home', 'get_uri', 'home/get_uri'),
(85, '', 'Home', 'log_activity', 'home/log_activity'),
(86, '', 'Home', 'get_instance', 'home/get_instance'),
(87, '', 'Login', '__construct', 'login/__construct'),
(88, '', 'Login', 'index', 'login/index'),
(89, '', 'Login', 'logout', 'login/logout'),
(90, '', 'Login', 'act_login', 'login/act_login'),
(91, '', 'Login', 'lockscreen', 'login/lockscreen'),
(92, '', 'Login', 'konfig', 'login/konfig'),
(93, '', 'Login', 'upload_file', 'login/upload_file'),
(94, '', 'Login', 'get_uri', 'login/get_uri'),
(95, '', 'Login', 'log_activity', 'login/log_activity'),
(96, '', 'Login', 'get_instance', 'login/get_instance'),
(97, '', 'Page', '__construct', 'page/__construct'),
(98, '', 'Page', 'portrait', 'page/portrait'),
(99, '', 'Page', 'landscape', 'page/landscape'),
(100, '', 'Page', 'konfig', 'page/konfig'),
(101, '', 'Page', 'upload_file', 'page/upload_file'),
(102, '', 'Page', 'get_uri', 'page/get_uri'),
(103, '', 'Page', 'log_activity', 'page/log_activity'),
(104, '', 'Page', 'get_instance', 'page/get_instance'),
(105, '', 'Rest_server', 'index', 'rest_server/index'),
(106, '', 'Rest_server', '__construct', 'rest_server/__construct'),
(107, '', 'Rest_server', 'get_instance', 'rest_server/get_instance'),
(108, '', 'Tablednd', '__construct', 'tablednd/__construct'),
(109, '', 'Tablednd', 'index', 'tablednd/index'),
(110, '', 'Tablednd', 'simpan', 'tablednd/simpan'),
(111, '', 'Tablednd', 'konfig', 'tablednd/konfig'),
(112, '', 'Tablednd', 'upload_file', 'tablednd/upload_file'),
(113, '', 'Tablednd', 'get_uri', 'tablednd/get_uri'),
(114, '', 'Tablednd', 'log_activity', 'tablednd/log_activity'),
(115, '', 'Tablednd', 'get_instance', 'tablednd/get_instance'),
(116, '', 'Tinymce', '__construct', 'tinymce/__construct'),
(117, '', 'Tinymce', 'index', 'tinymce/index'),
(118, '', 'Tinymce', 'konfig', 'tinymce/konfig'),
(119, '', 'Tinymce', 'upload_file', 'tinymce/upload_file'),
(120, '', 'Tinymce', 'get_uri', 'tinymce/get_uri'),
(121, '', 'Tinymce', 'log_activity', 'tinymce/log_activity'),
(122, '', 'Tinymce', 'get_instance', 'tinymce/get_instance'),
(123, '', 'UploadImage', '__construct', 'uploadimage/__construct'),
(124, '', 'UploadImage', 'index', 'uploadimage/index'),
(125, '', 'UploadImage', 'uploadAjax', 'uploadimage/uploadajax'),
(126, '', 'UploadImage', 'ajaxImageUnlink', 'uploadimage/ajaximageunlink'),
(127, '', 'UploadImage', 'konfig', 'uploadimage/konfig'),
(128, '', 'UploadImage', 'upload_file', 'uploadimage/upload_file'),
(129, '', 'UploadImage', 'get_uri', 'uploadimage/get_uri'),
(130, '', 'UploadImage', 'log_activity', 'uploadimage/log_activity'),
(131, '', 'UploadImage', 'get_instance', 'uploadimage/get_instance'),
(132, 'master', 'Activity', '__construct', 'master/activity/__construct'),
(133, 'master', 'Activity', 'index', 'master/activity/index'),
(134, 'master', 'Activity', 'create', 'master/activity/create'),
(135, 'master', 'Activity', 'validate', 'master/activity/validate'),
(136, 'master', 'Activity', 'store', 'master/activity/store'),
(137, 'master', 'Activity', 'json', 'master/activity/json'),
(138, 'master', 'Activity', 'edit', 'master/activity/edit'),
(139, 'master', 'Activity', 'update', 'master/activity/update'),
(140, 'master', 'Activity', 'delete', 'master/activity/delete'),
(141, 'master', 'Activity', 'status', 'master/activity/status'),
(142, 'master', 'Activity', 'konfig', 'master/activity/konfig'),
(143, 'master', 'Activity', 'upload_file', 'master/activity/upload_file'),
(144, 'master', 'Activity', 'get_uri', 'master/activity/get_uri'),
(145, 'master', 'Activity', 'log_activity', 'master/activity/log_activity'),
(146, 'master', 'Activity', 'get_instance', 'master/activity/get_instance'),
(147, 'master', 'Bahan_baku', '__construct', 'master/bahan_baku/__construct'),
(148, 'master', 'Bahan_baku', 'index', 'master/bahan_baku/index'),
(149, 'master', 'Bahan_baku', 'create', 'master/bahan_baku/create'),
(150, 'master', 'Bahan_baku', 'validate', 'master/bahan_baku/validate'),
(151, 'master', 'Bahan_baku', 'store', 'master/bahan_baku/store'),
(152, 'master', 'Bahan_baku', 'json', 'master/bahan_baku/json'),
(153, 'master', 'Bahan_baku', 'edit', 'master/bahan_baku/edit'),
(154, 'master', 'Bahan_baku', 'update', 'master/bahan_baku/update'),
(155, 'master', 'Bahan_baku', 'delete', 'master/bahan_baku/delete'),
(156, 'master', 'Bahan_baku', 'status', 'master/bahan_baku/status'),
(157, 'master', 'Bahan_baku', 'konfig', 'master/bahan_baku/konfig'),
(158, 'master', 'Bahan_baku', 'upload_file', 'master/bahan_baku/upload_file'),
(159, 'master', 'Bahan_baku', 'get_uri', 'master/bahan_baku/get_uri'),
(160, 'master', 'Bahan_baku', 'log_activity', 'master/bahan_baku/log_activity'),
(161, 'master', 'Bahan_baku', 'get_instance', 'master/bahan_baku/get_instance'),
(162, 'master', 'Bahan_baku_timeline', '__construct', 'master/bahan_baku_timeline/__construct'),
(163, 'master', 'Bahan_baku_timeline', 'index', 'master/bahan_baku_timeline/index'),
(164, 'master', 'Bahan_baku_timeline', 'create', 'master/bahan_baku_timeline/create'),
(165, 'master', 'Bahan_baku_timeline', 'validate', 'master/bahan_baku_timeline/validate'),
(166, 'master', 'Bahan_baku_timeline', 'store', 'master/bahan_baku_timeline/store'),
(167, 'master', 'Bahan_baku_timeline', 'json', 'master/bahan_baku_timeline/json'),
(168, 'master', 'Bahan_baku_timeline', 'edit', 'master/bahan_baku_timeline/edit'),
(169, 'master', 'Bahan_baku_timeline', 'update', 'master/bahan_baku_timeline/update'),
(170, 'master', 'Bahan_baku_timeline', 'delete', 'master/bahan_baku_timeline/delete'),
(171, 'master', 'Bahan_baku_timeline', 'status', 'master/bahan_baku_timeline/status'),
(172, 'master', 'Bahan_baku_timeline', 'konfig', 'master/bahan_baku_timeline/konfig'),
(173, 'master', 'Bahan_baku_timeline', 'upload_file', 'master/bahan_baku_timeline/upload_file'),
(174, 'master', 'Bahan_baku_timeline', 'get_uri', 'master/bahan_baku_timeline/get_uri'),
(175, 'master', 'Bahan_baku_timeline', 'log_activity', 'master/bahan_baku_timeline/log_activity'),
(176, 'master', 'Bahan_baku_timeline', 'get_instance', 'master/bahan_baku_timeline/get_instance'),
(177, 'master', 'Barang_jadi', '__construct', 'master/barang_jadi/__construct'),
(178, 'master', 'Barang_jadi', 'index', 'master/barang_jadi/index'),
(179, 'master', 'Barang_jadi', 'create', 'master/barang_jadi/create'),
(180, 'master', 'Barang_jadi', 'validate', 'master/barang_jadi/validate'),
(181, 'master', 'Barang_jadi', 'store', 'master/barang_jadi/store'),
(182, 'master', 'Barang_jadi', 'json', 'master/barang_jadi/json'),
(183, 'master', 'Barang_jadi', 'edit', 'master/barang_jadi/edit'),
(184, 'master', 'Barang_jadi', 'update', 'master/barang_jadi/update'),
(185, 'master', 'Barang_jadi', 'delete', 'master/barang_jadi/delete'),
(186, 'master', 'Barang_jadi', 'status', 'master/barang_jadi/status'),
(187, 'master', 'Barang_jadi', 'konfig', 'master/barang_jadi/konfig'),
(188, 'master', 'Barang_jadi', 'upload_file', 'master/barang_jadi/upload_file'),
(189, 'master', 'Barang_jadi', 'get_uri', 'master/barang_jadi/get_uri'),
(190, 'master', 'Barang_jadi', 'log_activity', 'master/barang_jadi/log_activity'),
(191, 'master', 'Barang_jadi', 'get_instance', 'master/barang_jadi/get_instance'),
(192, 'master', 'Bss', 'index', 'master/bss/index'),
(193, 'master', 'Bss', '__construct', 'master/bss/__construct'),
(194, 'master', 'Bss', 'konfig', 'master/bss/konfig'),
(195, 'master', 'Bss', 'upload_file', 'master/bss/upload_file'),
(196, 'master', 'Bss', 'get_uri', 'master/bss/get_uri'),
(197, 'master', 'Bss', 'log_activity', 'master/bss/log_activity'),
(198, 'master', 'Bss', 'get_instance', 'master/bss/get_instance'),
(199, 'master', 'Condition', '__construct', 'master/condition/__construct'),
(200, 'master', 'Condition', 'index', 'master/condition/index'),
(201, 'master', 'Condition', 'create', 'master/condition/create'),
(202, 'master', 'Condition', 'validate', 'master/condition/validate'),
(203, 'master', 'Condition', 'store', 'master/condition/store'),
(204, 'master', 'Condition', 'json', 'master/condition/json'),
(205, 'master', 'Condition', 'edit', 'master/condition/edit'),
(206, 'master', 'Condition', 'update', 'master/condition/update'),
(207, 'master', 'Condition', 'delete', 'master/condition/delete'),
(208, 'master', 'Condition', 'status', 'master/condition/status'),
(209, 'master', 'Condition', 'konfig', 'master/condition/konfig'),
(210, 'master', 'Condition', 'upload_file', 'master/condition/upload_file'),
(211, 'master', 'Condition', 'get_uri', 'master/condition/get_uri'),
(212, 'master', 'Condition', 'log_activity', 'master/condition/log_activity'),
(213, 'master', 'Condition', 'get_instance', 'master/condition/get_instance'),
(214, 'master', 'Currency', '__construct', 'master/currency/__construct'),
(215, 'master', 'Currency', 'index', 'master/currency/index'),
(216, 'master', 'Currency', 'create', 'master/currency/create'),
(217, 'master', 'Currency', 'validate', 'master/currency/validate'),
(218, 'master', 'Currency', 'store', 'master/currency/store'),
(219, 'master', 'Currency', 'json', 'master/currency/json'),
(220, 'master', 'Currency', 'edit', 'master/currency/edit'),
(221, 'master', 'Currency', 'update', 'master/currency/update'),
(222, 'master', 'Currency', 'delete', 'master/currency/delete'),
(223, 'master', 'Currency', 'status', 'master/currency/status'),
(224, 'master', 'Currency', 'konfig', 'master/currency/konfig'),
(225, 'master', 'Currency', 'upload_file', 'master/currency/upload_file'),
(226, 'master', 'Currency', 'get_uri', 'master/currency/get_uri'),
(227, 'master', 'Currency', 'log_activity', 'master/currency/log_activity'),
(228, 'master', 'Currency', 'get_instance', 'master/currency/get_instance'),
(229, 'master', 'Customer', '__construct', 'master/customer/__construct'),
(230, 'master', 'Customer', 'index', 'master/customer/index'),
(231, 'master', 'Customer', 'create', 'master/customer/create'),
(232, 'master', 'Customer', 'validate', 'master/customer/validate'),
(233, 'master', 'Customer', 'store', 'master/customer/store'),
(234, 'master', 'Customer', 'json', 'master/customer/json'),
(235, 'master', 'Customer', 'edit', 'master/customer/edit'),
(236, 'master', 'Customer', 'update', 'master/customer/update'),
(237, 'master', 'Customer', 'delete', 'master/customer/delete'),
(238, 'master', 'Customer', 'status', 'master/customer/status'),
(239, 'master', 'Customer', 'konfig', 'master/customer/konfig'),
(240, 'master', 'Customer', 'upload_file', 'master/customer/upload_file'),
(241, 'master', 'Customer', 'get_uri', 'master/customer/get_uri'),
(242, 'master', 'Customer', 'log_activity', 'master/customer/log_activity'),
(243, 'master', 'Customer', 'get_instance', 'master/customer/get_instance'),
(244, 'master', 'Grafik', '__construct', 'master/grafik/__construct'),
(245, 'master', 'Grafik', 'index', 'master/grafik/index'),
(246, 'master', 'Grafik', 'create', 'master/grafik/create'),
(247, 'master', 'Grafik', 'validate', 'master/grafik/validate'),
(248, 'master', 'Grafik', 'store', 'master/grafik/store'),
(249, 'master', 'Grafik', 'json', 'master/grafik/json'),
(250, 'master', 'Grafik', 'edit', 'master/grafik/edit'),
(251, 'master', 'Grafik', 'update', 'master/grafik/update'),
(252, 'master', 'Grafik', 'delete', 'master/grafik/delete'),
(253, 'master', 'Grafik', 'status', 'master/grafik/status'),
(254, 'master', 'Grafik', 'konfig', 'master/grafik/konfig'),
(255, 'master', 'Grafik', 'upload_file', 'master/grafik/upload_file'),
(256, 'master', 'Grafik', 'get_uri', 'master/grafik/get_uri'),
(257, 'master', 'Grafik', 'log_activity', 'master/grafik/log_activity'),
(258, 'master', 'Grafik', 'get_instance', 'master/grafik/get_instance'),
(259, 'master', 'Image', '__construct', 'master/image/__construct'),
(260, 'master', 'Image', 'index', 'master/image/index'),
(261, 'master', 'Image', 'create', 'master/image/create'),
(262, 'master', 'Image', 'validate', 'master/image/validate'),
(263, 'master', 'Image', 'store', 'master/image/store'),
(264, 'master', 'Image', 'json', 'master/image/json'),
(265, 'master', 'Image', 'edit', 'master/image/edit'),
(266, 'master', 'Image', 'update', 'master/image/update'),
(267, 'master', 'Image', 'delete', 'master/image/delete'),
(268, 'master', 'Image', 'status', 'master/image/status'),
(269, 'master', 'Image', 'konfig', 'master/image/konfig'),
(270, 'master', 'Image', 'upload_file', 'master/image/upload_file'),
(271, 'master', 'Image', 'get_uri', 'master/image/get_uri'),
(272, 'master', 'Image', 'log_activity', 'master/image/log_activity'),
(273, 'master', 'Image', 'get_instance', 'master/image/get_instance'),
(274, 'master', 'Jadwal', '__construct', 'master/jadwal/__construct'),
(275, 'master', 'Jadwal', 'index', 'master/jadwal/index'),
(276, 'master', 'Jadwal', 'create', 'master/jadwal/create'),
(277, 'master', 'Jadwal', 'validate', 'master/jadwal/validate'),
(278, 'master', 'Jadwal', 'store', 'master/jadwal/store'),
(279, 'master', 'Jadwal', 'json', 'master/jadwal/json'),
(280, 'master', 'Jadwal', 'edit', 'master/jadwal/edit'),
(281, 'master', 'Jadwal', 'update', 'master/jadwal/update'),
(282, 'master', 'Jadwal', 'delete', 'master/jadwal/delete'),
(283, 'master', 'Jadwal', 'status', 'master/jadwal/status'),
(284, 'master', 'Jadwal', 'konfig', 'master/jadwal/konfig'),
(285, 'master', 'Jadwal', 'upload_file', 'master/jadwal/upload_file'),
(286, 'master', 'Jadwal', 'get_uri', 'master/jadwal/get_uri'),
(287, 'master', 'Jadwal', 'log_activity', 'master/jadwal/log_activity'),
(288, 'master', 'Jadwal', 'get_instance', 'master/jadwal/get_instance'),
(289, 'master', 'Jenis_pekerjaan', '__construct', 'master/jenis_pekerjaan/__construct'),
(290, 'master', 'Jenis_pekerjaan', 'index', 'master/jenis_pekerjaan/index'),
(291, 'master', 'Jenis_pekerjaan', 'create', 'master/jenis_pekerjaan/create'),
(292, 'master', 'Jenis_pekerjaan', 'validate', 'master/jenis_pekerjaan/validate'),
(293, 'master', 'Jenis_pekerjaan', 'store', 'master/jenis_pekerjaan/store'),
(294, 'master', 'Jenis_pekerjaan', 'json', 'master/jenis_pekerjaan/json'),
(295, 'master', 'Jenis_pekerjaan', 'edit', 'master/jenis_pekerjaan/edit'),
(296, 'master', 'Jenis_pekerjaan', 'update', 'master/jenis_pekerjaan/update'),
(297, 'master', 'Jenis_pekerjaan', 'delete', 'master/jenis_pekerjaan/delete'),
(298, 'master', 'Jenis_pekerjaan', 'status', 'master/jenis_pekerjaan/status'),
(299, 'master', 'Jenis_pekerjaan', 'konfig', 'master/jenis_pekerjaan/konfig'),
(300, 'master', 'Jenis_pekerjaan', 'upload_file', 'master/jenis_pekerjaan/upload_file'),
(301, 'master', 'Jenis_pekerjaan', 'get_uri', 'master/jenis_pekerjaan/get_uri'),
(302, 'master', 'Jenis_pekerjaan', 'log_activity', 'master/jenis_pekerjaan/log_activity'),
(303, 'master', 'Jenis_pekerjaan', 'get_instance', 'master/jenis_pekerjaan/get_instance'),
(304, 'master', 'Keys', '__construct', 'master/keys/__construct'),
(305, 'master', 'Keys', 'index', 'master/keys/index'),
(306, 'master', 'Keys', 'create', 'master/keys/create'),
(307, 'master', 'Keys', 'validate', 'master/keys/validate'),
(308, 'master', 'Keys', 'store', 'master/keys/store'),
(309, 'master', 'Keys', 'json', 'master/keys/json'),
(310, 'master', 'Keys', 'edit', 'master/keys/edit'),
(311, 'master', 'Keys', 'update', 'master/keys/update'),
(312, 'master', 'Keys', 'delete', 'master/keys/delete'),
(313, 'master', 'Keys', 'status', 'master/keys/status'),
(314, 'master', 'Keys', 'konfig', 'master/keys/konfig'),
(315, 'master', 'Keys', 'upload_file', 'master/keys/upload_file'),
(316, 'master', 'Keys', 'get_uri', 'master/keys/get_uri'),
(317, 'master', 'Keys', 'log_activity', 'master/keys/log_activity'),
(318, 'master', 'Keys', 'get_instance', 'master/keys/get_instance'),
(319, 'master', 'Konfig', '__construct', 'master/konfig/__construct'),
(320, 'master', 'Konfig', 'index', 'master/konfig/index'),
(321, 'master', 'Konfig', 'create', 'master/konfig/create'),
(322, 'master', 'Konfig', 'validate', 'master/konfig/validate'),
(323, 'master', 'Konfig', 'store', 'master/konfig/store'),
(324, 'master', 'Konfig', 'json', 'master/konfig/json'),
(325, 'master', 'Konfig', 'edit', 'master/konfig/edit'),
(326, 'master', 'Konfig', 'update', 'master/konfig/update'),
(327, 'master', 'Konfig', 'delete', 'master/konfig/delete'),
(328, 'master', 'Konfig', 'status', 'master/konfig/status'),
(329, 'master', 'Konfig', 'konfig', 'master/konfig/konfig'),
(330, 'master', 'Konfig', 'upload_file', 'master/konfig/upload_file'),
(331, 'master', 'Konfig', 'get_uri', 'master/konfig/get_uri'),
(332, 'master', 'Konfig', 'log_activity', 'master/konfig/log_activity'),
(333, 'master', 'Konfig', 'get_instance', 'master/konfig/get_instance'),
(334, 'master', 'Master_sub_izin_usaha', '__construct', 'master/master_sub_izin_usaha/__construct'),
(335, 'master', 'Master_sub_izin_usaha', 'index', 'master/master_sub_izin_usaha/index'),
(336, 'master', 'Master_sub_izin_usaha', 'create', 'master/master_sub_izin_usaha/create'),
(337, 'master', 'Master_sub_izin_usaha', 'validate', 'master/master_sub_izin_usaha/validate'),
(338, 'master', 'Master_sub_izin_usaha', 'store', 'master/master_sub_izin_usaha/store'),
(339, 'master', 'Master_sub_izin_usaha', 'json', 'master/master_sub_izin_usaha/json'),
(340, 'master', 'Master_sub_izin_usaha', 'edit', 'master/master_sub_izin_usaha/edit'),
(341, 'master', 'Master_sub_izin_usaha', 'update', 'master/master_sub_izin_usaha/update'),
(342, 'master', 'Master_sub_izin_usaha', 'delete', 'master/master_sub_izin_usaha/delete'),
(343, 'master', 'Master_sub_izin_usaha', 'status', 'master/master_sub_izin_usaha/status'),
(344, 'master', 'Master_sub_izin_usaha', 'konfig', 'master/master_sub_izin_usaha/konfig'),
(345, 'master', 'Master_sub_izin_usaha', 'upload_file', 'master/master_sub_izin_usaha/upload_file'),
(346, 'master', 'Master_sub_izin_usaha', 'get_uri', 'master/master_sub_izin_usaha/get_uri'),
(347, 'master', 'Master_sub_izin_usaha', 'log_activity', 'master/master_sub_izin_usaha/log_activity'),
(348, 'master', 'Master_sub_izin_usaha', 'get_instance', 'master/master_sub_izin_usaha/get_instance'),
(349, 'master', 'Menu_master', '__construct', 'master/menu_master/__construct'),
(350, 'master', 'Menu_master', 'index', 'master/menu_master/index'),
(351, 'master', 'Menu_master', 'create', 'master/menu_master/create'),
(352, 'master', 'Menu_master', 'validate', 'master/menu_master/validate'),
(353, 'master', 'Menu_master', 'store', 'master/menu_master/store'),
(354, 'master', 'Menu_master', 'json', 'master/menu_master/json'),
(355, 'master', 'Menu_master', 'edit', 'master/menu_master/edit'),
(356, 'master', 'Menu_master', 'update', 'master/menu_master/update'),
(357, 'master', 'Menu_master', 'delete', 'master/menu_master/delete'),
(358, 'master', 'Menu_master', 'status', 'master/menu_master/status'),
(359, 'master', 'Menu_master', 'konfig', 'master/menu_master/konfig'),
(360, 'master', 'Menu_master', 'upload_file', 'master/menu_master/upload_file'),
(361, 'master', 'Menu_master', 'get_uri', 'master/menu_master/get_uri'),
(362, 'master', 'Menu_master', 'log_activity', 'master/menu_master/log_activity'),
(363, 'master', 'Menu_master', 'get_instance', 'master/menu_master/get_instance'),
(364, 'master', 'Produk', '__construct', 'master/produk/__construct'),
(365, 'master', 'Produk', 'index', 'master/produk/index'),
(366, 'master', 'Produk', 'create', 'master/produk/create'),
(367, 'master', 'Produk', 'validate', 'master/produk/validate'),
(368, 'master', 'Produk', 'store', 'master/produk/store'),
(369, 'master', 'Produk', 'json', 'master/produk/json'),
(370, 'master', 'Produk', 'edit', 'master/produk/edit'),
(371, 'master', 'Produk', 'update', 'master/produk/update'),
(372, 'master', 'Produk', 'delete', 'master/produk/delete'),
(373, 'master', 'Produk', 'status', 'master/produk/status'),
(374, 'master', 'Produk', 'konfig', 'master/produk/konfig'),
(375, 'master', 'Produk', 'upload_file', 'master/produk/upload_file'),
(376, 'master', 'Produk', 'get_uri', 'master/produk/get_uri'),
(377, 'master', 'Produk', 'log_activity', 'master/produk/log_activity'),
(378, 'master', 'Produk', 'get_instance', 'master/produk/get_instance'),
(379, 'master', 'Report', '__construct', 'master/report/__construct'),
(380, 'master', 'Report', 'index', 'master/report/index'),
(381, 'master', 'Report', 'create', 'master/report/create'),
(382, 'master', 'Report', 'validate', 'master/report/validate'),
(383, 'master', 'Report', 'store', 'master/report/store'),
(384, 'master', 'Report', 'json', 'master/report/json'),
(385, 'master', 'Report', 'edit', 'master/report/edit'),
(386, 'master', 'Report', 'update', 'master/report/update'),
(387, 'master', 'Report', 'delete', 'master/report/delete'),
(388, 'master', 'Report', 'status', 'master/report/status'),
(389, 'master', 'Report', 'generate', 'master/report/generate'),
(390, 'master', 'Report', 'konfig', 'master/report/konfig'),
(391, 'master', 'Report', 'upload_file', 'master/report/upload_file'),
(392, 'master', 'Report', 'get_uri', 'master/report/get_uri'),
(393, 'master', 'Report', 'log_activity', 'master/report/log_activity'),
(394, 'master', 'Report', 'get_instance', 'master/report/get_instance'),
(395, 'master', 'Role', '__construct', 'master/role/__construct'),
(396, 'master', 'Role', 'index', 'master/role/index'),
(397, 'master', 'Role', 'create', 'master/role/create'),
(398, 'master', 'Role', 'validate', 'master/role/validate'),
(399, 'master', 'Role', 'store', 'master/role/store'),
(400, 'master', 'Role', 'json', 'master/role/json'),
(401, 'master', 'Role', 'edit', 'master/role/edit'),
(402, 'master', 'Role', 'update', 'master/role/update'),
(403, 'master', 'Role', 'delete', 'master/role/delete'),
(404, 'master', 'Role', 'status', 'master/role/status'),
(405, 'master', 'Role', 'konfig', 'master/role/konfig'),
(406, 'master', 'Role', 'upload_file', 'master/role/upload_file'),
(407, 'master', 'Role', 'get_uri', 'master/role/get_uri'),
(408, 'master', 'Role', 'log_activity', 'master/role/log_activity'),
(409, 'master', 'Role', 'get_instance', 'master/role/get_instance'),
(410, 'master', 'Service', '__construct', 'master/service/__construct'),
(411, 'master', 'Service', 'index', 'master/service/index'),
(412, 'master', 'Service', 'create', 'master/service/create'),
(413, 'master', 'Service', 'validate', 'master/service/validate'),
(414, 'master', 'Service', 'store', 'master/service/store'),
(415, 'master', 'Service', 'json', 'master/service/json'),
(416, 'master', 'Service', 'edit', 'master/service/edit'),
(417, 'master', 'Service', 'update', 'master/service/update'),
(418, 'master', 'Service', 'delete', 'master/service/delete'),
(419, 'master', 'Service', 'status', 'master/service/status'),
(420, 'master', 'Service', 'konfig', 'master/service/konfig'),
(421, 'master', 'Service', 'upload_file', 'master/service/upload_file'),
(422, 'master', 'Service', 'get_uri', 'master/service/get_uri'),
(423, 'master', 'Service', 'log_activity', 'master/service/log_activity'),
(424, 'master', 'Service', 'get_instance', 'master/service/get_instance'),
(425, 'master', 'Site', '__construct', 'master/site/__construct'),
(426, 'master', 'Site', 'index', 'master/site/index'),
(427, 'master', 'Site', 'site_json', 'master/site/site_json'),
(428, 'master', 'Site', 'site_default', 'master/site/site_default'),
(429, 'master', 'Site', 'site_custom', 'master/site/site_custom'),
(430, 'master', 'Site', 'site_data', 'master/site/site_data'),
(431, 'master', 'Site', 'site_store', 'master/site/site_store'),
(432, 'master', 'Site', 'site_edit', 'master/site/site_edit'),
(433, 'master', 'Site', 'site_update', 'master/site/site_update'),
(434, 'master', 'Site', 'site_hidden', 'master/site/site_hidden'),
(435, 'master', 'Site', 'konfig', 'master/site/konfig'),
(436, 'master', 'Site', 'upload_file', 'master/site/upload_file'),
(437, 'master', 'Site', 'get_uri', 'master/site/get_uri'),
(438, 'master', 'Site', 'log_activity', 'master/site/log_activity'),
(439, 'master', 'Site', 'get_instance', 'master/site/get_instance'),
(440, 'master', 'Titleku', '__construct', 'master/titleku/__construct'),
(441, 'master', 'Titleku', 'index', 'master/titleku/index'),
(442, 'master', 'Titleku', 'create', 'master/titleku/create'),
(443, 'master', 'Titleku', 'validate', 'master/titleku/validate'),
(444, 'master', 'Titleku', 'store', 'master/titleku/store'),
(445, 'master', 'Titleku', 'json', 'master/titleku/json'),
(446, 'master', 'Titleku', 'edit', 'master/titleku/edit'),
(447, 'master', 'Titleku', 'update', 'master/titleku/update'),
(448, 'master', 'Titleku', 'delete', 'master/titleku/delete'),
(449, 'master', 'Titleku', 'status', 'master/titleku/status'),
(450, 'master', 'Titleku', 'konfig', 'master/titleku/konfig'),
(451, 'master', 'Titleku', 'upload_file', 'master/titleku/upload_file'),
(452, 'master', 'Titleku', 'get_uri', 'master/titleku/get_uri'),
(453, 'master', 'Titleku', 'log_activity', 'master/titleku/log_activity'),
(454, 'master', 'Titleku', 'get_instance', 'master/titleku/get_instance'),
(455, 'master', 'User', 'index', 'master/user/index'),
(456, 'master', 'User', 'json', 'master/user/json'),
(457, 'master', 'User', 'json_activity', 'master/user/json_activity'),
(458, 'master', 'User', 'store', 'master/user/store'),
(459, 'master', 'User', 'edit', 'master/user/edit'),
(460, 'master', 'User', 'editUser', 'master/user/edituser'),
(461, 'master', 'User', 'updateUser', 'master/user/updateuser'),
(462, 'master', 'User', 'update', 'master/user/update'),
(463, 'master', 'User', 'delete', 'master/user/delete'),
(464, 'master', 'User', 'password_check', 'master/user/password_check'),
(465, 'master', 'User', 'editUser_redirect', 'master/user/edituser_redirect'),
(466, 'master', 'User', '__construct', 'master/user/__construct'),
(467, 'master', 'User', 'konfig', 'master/user/konfig'),
(468, 'master', 'User', 'upload_file', 'master/user/upload_file'),
(469, 'master', 'User', 'get_uri', 'master/user/get_uri'),
(470, 'master', 'User', 'log_activity', 'master/user/log_activity'),
(471, 'master', 'User', 'get_instance', 'master/user/get_instance'),
(472, 'master', 'Usulan', '__construct', 'master/usulan/__construct'),
(473, 'master', 'Usulan', 'index', 'master/usulan/index'),
(474, 'master', 'Usulan', 'create', 'master/usulan/create'),
(475, 'master', 'Usulan', 'validate', 'master/usulan/validate'),
(476, 'master', 'Usulan', 'store', 'master/usulan/store'),
(477, 'master', 'Usulan', 'json', 'master/usulan/json'),
(478, 'master', 'Usulan', 'edit', 'master/usulan/edit'),
(479, 'master', 'Usulan', 'update', 'master/usulan/update'),
(480, 'master', 'Usulan', 'delete', 'master/usulan/delete'),
(481, 'master', 'Usulan', 'status', 'master/usulan/status'),
(482, 'master', 'Usulan', 'konfig', 'master/usulan/konfig'),
(483, 'master', 'Usulan', 'upload_file', 'master/usulan/upload_file'),
(484, 'master', 'Usulan', 'get_uri', 'master/usulan/get_uri'),
(485, 'master', 'Usulan', 'log_activity', 'master/usulan/log_activity'),
(486, 'master', 'Usulan', 'get_instance', 'master/usulan/get_instance'),
(487, 'master', 'Usulan_detail', '__construct', 'master/usulan_detail/__construct'),
(488, 'master', 'Usulan_detail', 'index', 'master/usulan_detail/index'),
(489, 'master', 'Usulan_detail', 'create', 'master/usulan_detail/create'),
(490, 'master', 'Usulan_detail', 'validate', 'master/usulan_detail/validate'),
(491, 'master', 'Usulan_detail', 'store', 'master/usulan_detail/store'),
(492, 'master', 'Usulan_detail', 'json', 'master/usulan_detail/json'),
(493, 'master', 'Usulan_detail', 'edit', 'master/usulan_detail/edit'),
(494, 'master', 'Usulan_detail', 'update', 'master/usulan_detail/update'),
(495, 'master', 'Usulan_detail', 'delete', 'master/usulan_detail/delete'),
(496, 'master', 'Usulan_detail', 'status', 'master/usulan_detail/status'),
(497, 'master', 'Usulan_detail', 'konfig', 'master/usulan_detail/konfig'),
(498, 'master', 'Usulan_detail', 'upload_file', 'master/usulan_detail/upload_file'),
(499, 'master', 'Usulan_detail', 'get_uri', 'master/usulan_detail/get_uri'),
(500, 'master', 'Usulan_detail', 'log_activity', 'master/usulan_detail/log_activity'),
(501, 'master', 'Usulan_detail', 'get_instance', 'master/usulan_detail/get_instance');

-- --------------------------------------------------------

--
-- Table structure for table `activity`
--

CREATE TABLE `activity` (
  `ip` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `get` longtext DEFAULT NULL,
  `post` longtext DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `activity`
--

INSERT INTO `activity` (`ip`, `link`, `get`, `post`, `user_id`, `created_at`) VALUES
('118.136.148.201', 'http://gatoko1.com/sop/master/user/editUser/6XmR9kAQpXD-j2AwEhMiO54SOxC8fXgNJVwrdGbiesI~', '[]', '[]', 1, '2019-02-19 10:59:26'),
('182.0.231.50', 'http://gatoko1.com/sop/', '[]', '[]', 1, '2019-03-25 11:32:10'),
('182.0.231.50', 'http://gatoko1.com/sop/report/users', '[]', '[]', 1, '2019-03-25 11:32:12'),
('182.0.231.50', 'http://gatoko1.com/sop/report/Users/ajaxall/', '[]', '{\"draw\":\"1\",\"columns\":[{\"data\":\"0\",\"name\":\"\",\"searchable\":\"true\",\"orderable\":\"true\",\"search\":{\"value\":\"\",\"regex\":\"false\"}},{\"data\":\"1\",\"name\":\"\",\"searchable\":\"true\",\"orderable\":\"true\",\"search\":{\"value\":\"\",\"regex\":\"false\"}},{\"data\":\"2\",\"name\":\"\",\"searchable\":\"true\",\"orderable\":\"true\",\"search\":{\"value\":\"\",\"regex\":\"false\"}},{\"data\":\"3\",\"name\":\"\",\"searchable\":\"true\",\"orderable\":\"true\",\"search\":{\"value\":\"\",\"regex\":\"false\"}},{\"data\":\"4\",\"name\":\"\",\"searchable\":\"true\",\"orderable\":\"true\",\"search\":{\"value\":\"\",\"regex\":\"false\"}},{\"data\":\"5\",\"name\":\"\",\"searchable\":\"true\",\"orderable\":\"true\",\"search\":{\"value\":\"\",\"regex\":\"false\"}},{\"data\":\"6\",\"name\":\"\",\"searchable\":\"true\",\"orderable\":\"true\",\"search\":{\"value\":\"\",\"regex\":\"false\"}},{\"data\":\"7\",\"name\":\"\",\"searchable\":\"true\",\"orderable\":\"true\",\"search\":{\"value\":\"\",\"regex\":\"false\"}},{\"data\":\"8\",\"name\":\"\",\"searchable\":\"true\",\"orderable\":\"true\",\"search\":{\"value\":\"\",\"regex\":\"false\"}},{\"data\":\"9\",\"name\":\"\",\"searchable\":\"true\",\"orderable\":\"true\",\"search\":{\"value\":\"\",\"regex\":\"false\"}},{\"data\":\"10\",\"name\":\"\",\"searchable\":\"true\",\"orderable\":\"true\",\"search\":{\"value\":\"\",\"regex\":\"false\"}}],\"start\":\"0\",\"length\":\"10\",\"search\":{\"value\":\"\",\"regex\":\"false\"}}', 1, '2019-03-25 11:32:13'),
('182.0.231.50', 'http://gatoko1.com/sop/index.php/master/user/editUser/rRntbEh0leW4k9gNhEWWCbHwo2zGf472OKDemzWpDYM~', '[]', '[]', 1, '2019-03-25 11:31:57'),
('182.0.231.50', 'http://gatoko1.com/sop/master/user/json_activity/9', '[]', '{\"draw\":\"1\",\"columns\":[{\"data\":\"ip\",\"name\":\"\",\"searchable\":\"true\",\"orderable\":\"false\",\"search\":{\"value\":\"\",\"regex\":\"false\"}},{\"data\":\"created_at\",\"name\":\"\",\"searchable\":\"true\",\"orderable\":\"true\",\"search\":{\"value\":\"\",\"regex\":\"false\"}},{\"data\":\"ip\",\"name\":\"\",\"searchable\":\"true\",\"orderable\":\"true\",\"search\":{\"value\":\"\",\"regex\":\"false\"}},{\"data\":\"link\",\"name\":\"\",\"searchable\":\"true\",\"orderable\":\"true\",\"search\":{\"value\":\"\",\"regex\":\"false\"}},{\"data\":\"post\",\"name\":\"\",\"searchable\":\"true\",\"orderable\":\"true\",\"search\":{\"value\":\"\",\"regex\":\"false\"}},{\"data\":\"get\",\"name\":\"\",\"searchable\":\"true\",\"orderable\":\"true\",\"search\":{\"value\":\"\",\"regex\":\"false\"}}],\"order\":[{\"column\":\"1\",\"dir\":\"asc\"}],\"start\":\"0\",\"length\":\"10\",\"search\":{\"value\":\"\",\"regex\":\"false\"}}', 1, '2019-03-25 11:31:57'),
('182.0.231.50', 'http://gatoko1.com/sop/index.php/master/user/editUser/rRntbEh0leW4k9gNhEWWCbHwo2zGf472OKDemzWpDYM~', '[]', '[]', 1, '2019-03-25 11:31:58'),
('182.0.231.50', 'http://gatoko1.com/sop/master/user/json_activity/9', '[]', '{\"draw\":\"1\",\"columns\":[{\"data\":\"ip\",\"name\":\"\",\"searchable\":\"true\",\"orderable\":\"false\",\"search\":{\"value\":\"\",\"regex\":\"false\"}},{\"data\":\"created_at\",\"name\":\"\",\"searchable\":\"true\",\"orderable\":\"true\",\"search\":{\"value\":\"\",\"regex\":\"false\"}},{\"data\":\"ip\",\"name\":\"\",\"searchable\":\"true\",\"orderable\":\"true\",\"search\":{\"value\":\"\",\"regex\":\"false\"}},{\"data\":\"link\",\"name\":\"\",\"searchable\":\"true\",\"orderable\":\"true\",\"search\":{\"value\":\"\",\"regex\":\"false\"}},{\"data\":\"post\",\"name\":\"\",\"searchable\":\"true\",\"orderable\":\"true\",\"search\":{\"value\":\"\",\"regex\":\"false\"}},{\"data\":\"get\",\"name\":\"\",\"searchable\":\"true\",\"orderable\":\"true\",\"search\":{\"value\":\"\",\"regex\":\"false\"}}],\"order\":[{\"column\":\"1\",\"dir\":\"asc\"}],\"start\":\"0\",\"length\":\"10\",\"search\":{\"value\":\"\",\"regex\":\"false\"}}', 1, '2019-03-25 11:31:59'),
('118.136.148.201', 'http://gatoko1.com/sop/master/user/editUser/6XmR9kAQpXD-j2AwEhMiO54SOxC8fXgNJVwrdGbiesI~', '[]', '[]', 1, '2019-02-19 11:03:04'),
('118.136.148.201', 'http://gatoko1.com/sop/master/user/updateUser', '[]', '{\"ids\":\"1\",\"name\":\"Smartsoft Studio\",\"email\":\"smartsoftstudio1@mail.com\",\"desc\":\"asda\"}', 1, '2019-02-19 11:02:53'),
('182.0.231.50', 'http://gatoko1.com/sop/index.php/master/user/editUser/rRntbEh0leW4k9gNhEWWCbHwo2zGf472OKDemzWpDYM~', '[]', '[]', 1, '2019-03-25 11:32:00'),
('182.0.231.50', 'http://gatoko1.com/sop/master/user/json_activity/9', '[]', '{\"draw\":\"1\",\"columns\":[{\"data\":\"ip\",\"name\":\"\",\"searchable\":\"true\",\"orderable\":\"false\",\"search\":{\"value\":\"\",\"regex\":\"false\"}},{\"data\":\"created_at\",\"name\":\"\",\"searchable\":\"true\",\"orderable\":\"true\",\"search\":{\"value\":\"\",\"regex\":\"false\"}},{\"data\":\"ip\",\"name\":\"\",\"searchable\":\"true\",\"orderable\":\"true\",\"search\":{\"value\":\"\",\"regex\":\"false\"}},{\"data\":\"link\",\"name\":\"\",\"searchable\":\"true\",\"orderable\":\"true\",\"search\":{\"value\":\"\",\"regex\":\"false\"}},{\"data\":\"post\",\"name\":\"\",\"searchable\":\"true\",\"orderable\":\"true\",\"search\":{\"value\":\"\",\"regex\":\"false\"}},{\"data\":\"get\",\"name\":\"\",\"searchable\":\"true\",\"orderable\":\"true\",\"search\":{\"value\":\"\",\"regex\":\"false\"}}],\"order\":[{\"column\":\"1\",\"dir\":\"asc\"}],\"start\":\"0\",\"length\":\"10\",\"search\":{\"value\":\"\",\"regex\":\"false\"}}', 1, '2019-03-25 11:32:01'),
('182.0.231.173', 'http://gatoko1.com/sop/index.php/home/get_autocomplete?term=ke', '{\"term\":\"ke\"}', '[]', 1, '2019-03-25 11:32:21'),
('182.0.231.173', 'http://gatoko1.com/sop/index.php/home/get_autocomplete?term=kementr', '{\"term\":\"kementr\"}', '[]', 1, '2019-03-25 11:32:22'),
('182.0.231.173', 'http://gatoko1.com/sop/index.php/home/get_autocomplete?term=kementr', '{\"term\":\"kementr\"}', '[]', 1, '2019-03-25 11:32:23'),
('182.0.197.180', 'http://gatoko1.com/sop/index.php/home/get_autocomplete?term=kementr', '{\"term\":\"kementr\"}', '[]', 1, '2019-03-25 11:32:24'),
('182.0.197.180', 'http://gatoko1.com/sop/login/logout', '[]', '[]', 1, '2019-03-25 11:32:31'),
('182.0.197.180', 'http://gatoko1.com/sop/index.php/login', '[]', '[]', NULL, '2019-03-25 11:32:31'),
('182.0.231.125', 'http://gatoko1.com/sop/login/lockscreen?user=smartsoft', '{\"user\":\"smartsoft\"}', '[]', NULL, '2019-03-25 11:32:38'),
('182.0.231.125', 'http://gatoko1.com/sop/login/act_login', '[]', '{\"username\":\"smartsoft\",\"password\":\"admin\"}', NULL, '2019-03-25 11:32:41'),
('182.0.231.125', 'http://gatoko1.com/sop/', '[]', '[]', 1, '2019-03-25 11:32:41'),
('182.0.231.125', 'http://gatoko1.com/sop/master/user/editUser/6XmR9kAQpXD-j2AwEhMiO54SOxC8fXgNJVwrdGbiesI~', '[]', '[]', 1, '2019-03-25 11:32:45'),
('182.0.231.125', 'http://gatoko1.com/sop/master/user/json_activity/1', '[]', '{\"draw\":\"1\",\"columns\":[{\"data\":\"ip\",\"name\":\"\",\"searchable\":\"true\",\"orderable\":\"false\",\"search\":{\"value\":\"\",\"regex\":\"false\"}},{\"data\":\"created_at\",\"name\":\"\",\"searchable\":\"true\",\"orderable\":\"true\",\"search\":{\"value\":\"\",\"regex\":\"false\"}},{\"data\":\"ip\",\"name\":\"\",\"searchable\":\"true\",\"orderable\":\"true\",\"search\":{\"value\":\"\",\"regex\":\"false\"}},{\"data\":\"link\",\"name\":\"\",\"searchable\":\"true\",\"orderable\":\"true\",\"search\":{\"value\":\"\",\"regex\":\"false\"}},{\"data\":\"post\",\"name\":\"\",\"searchable\":\"true\",\"orderable\":\"true\",\"search\":{\"value\":\"\",\"regex\":\"false\"}},{\"data\":\"get\",\"name\":\"\",\"searchable\":\"true\",\"orderable\":\"true\",\"search\":{\"value\":\"\",\"regex\":\"false\"}}],\"order\":[{\"column\":\"1\",\"dir\":\"asc\"}],\"start\":\"0\",\"length\":\"10\",\"search\":{\"value\":\"\",\"regex\":\"false\"}}', 1, '2019-03-25 11:32:46'),
('118.136.148.201', 'http://gatoko1.com/sop/master/user/editUser/6XmR9kAQpXD-j2AwEhMiO54SOxC8fXgNJVwrdGbiesI~', '[]', '[]', 1, '2019-02-19 10:59:26'),
('118.136.148.201', 'http://gatoko1.com/sop/master/user/editUser/6XmR9kAQpXD-j2AwEhMiO54SOxC8fXgNJVwrdGbiesI~', '[]', '[]', 1, '2019-02-19 11:03:04'),
('118.136.148.201', 'http://gatoko1.com/sop/master/user/updateUser', '[]', '{\"ids\":\"1\",\"name\":\"Smartsoft Studio\",\"email\":\"smartsoftstudio1@mail.com\",\"desc\":\"asda\"}', 1, '2019-02-19 11:02:53');

-- --------------------------------------------------------

--
-- Table structure for table `file`
--

CREATE TABLE `file` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `mime` varchar(255) DEFAULT NULL,
  `dir` varchar(255) DEFAULT NULL,
  `table` varchar(255) DEFAULT NULL,
  `table_id` int(11) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `file`
--

INSERT INTO `file` (`id`, `name`, `mime`, `dir`, `table`, `table_id`, `status`, `created_at`, `updated_at`) VALUES
(179, '6950c16c9bcc6995f376b297f163175963555.png', 'image/png', 'webfile/users/6950c16c9bcc6995f376b297f163175963555.png', 'tbl_investor', 2, 'ENABLE', '2019-09-04 15:08:01', '2019-09-09 14:19:32'),
(180, '6950c16c9bcc6995f376b297f163175998660.jpg', 'image/jpeg', 'webfile/users/6950c16c9bcc6995f376b297f163175998660.jpg', 'user', 13, 'ENABLE', '2019-09-04 15:08:01', '2019-09-05 09:18:14'),
(182, 'default.png', 'image/png', 'webfile/users/default.png', 'tbl_investor', 6, 'ENABLE', '2019-09-05 12:19:49', '2019-09-05 12:19:49'),
(183, 'default.png', 'image/png', 'webfile/users/default.png', 'tbl_investor', 7, 'ENABLE', '2019-09-05 12:23:01', '2019-09-05 12:23:01'),
(184, '6950c16c9bcc6995f376b297f163175929730.png', 'image/png', 'webfile/users/6950c16c9bcc6995f376b297f163175929730.png', 'user', 14, 'ENABLE', '2019-09-05 12:56:42', NULL),
(185, '6950c16c9bcc6995f376b297f163175952937.jpeg', 'image/jpeg', 'webfile/users/6950c16c9bcc6995f376b297f163175952937.jpeg', 'user', 15, 'ENABLE', '2019-09-05 12:57:38', NULL),
(186, 'default.png', 'image/png', 'webfile/users/default.png', 'tbl_investor', 8, 'ENABLE', '2019-09-06 10:13:58', '2019-09-06 10:13:58'),
(207, '6950c16c9bcc6995f376b297f163175935337.jpg', 'image/png', 'webfile/project/project-ke-1/6950c16c9bcc6995f376b297f163175935337.jpg', 'tbl_project', 1, 'ENABLE', '2019-09-08 13:00:54', NULL),
(208, '6950c16c9bcc6995f376b297f163175935337.PNG', 'image/png', 'webfile/project/project-ke-1/6950c16c9bcc6995f376b297f163175935337.PNG', 'tbl_project_gambar', 1, 'ENABLE', '2019-09-08 13:00:54', NULL),
(209, '6950c16c9bcc6995f376b297f16317594340.jpeg', 'image/png', 'webfile/project/project-ke-2-dengan-mutli-imput-baru/6950c16c9bcc6995f376b297f16317594340.jpeg', 'tbl_project', 2, 'ENABLE', '2019-09-09 09:26:03', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `grafik`
--

CREATE TABLE `grafik` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `grafik`
--

INSERT INTO `grafik` (`id`, `name`, `value`) VALUES
(1, 'Testing', '-30'),
(2, 'Testing 2', '20'),
(3, 'Testing 2', '30'),
(4, 'testing2', '40'),
(5, 'testing 2', '50'),
(6, 'testing 2', '20'),
(7, 'testing 2', '10'),
(8, 'testing 2', '15'),
(9, 'testing 2', '20'),
(10, 'testing 2', '25'),
(11, 'testing 2', '35'),
(12, 'testing 2', '45');

-- --------------------------------------------------------

--
-- Table structure for table `keys`
--

CREATE TABLE `keys` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `key` varchar(255) DEFAULT NULL,
  `level` varchar(255) DEFAULT NULL,
  `ignore_limits` varchar(255) DEFAULT NULL,
  `is_private_key` varchar(255) DEFAULT NULL,
  `ip_addresses` varchar(255) DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  `status` enum('ENABLE','DISABLE') DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `keys`
--

INSERT INTO `keys` (`id`, `user_id`, `key`, `level`, `ignore_limits`, `is_private_key`, `ip_addresses`, `date_created`, `status`, `created_at`, `updated_at`) VALUES
(1, 0, '35d3d08c3d7b7f445ceb8e726a87b26c', '0', '0', '0', '123', '2017-10-12 13:34:33', 'ENABLE', NULL, '2019-02-18 17:04:00');

-- --------------------------------------------------------

--
-- Table structure for table `konfig`
--

CREATE TABLE `konfig` (
  `id` int(11) NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `value` text DEFAULT NULL,
  `status` enum('ENABLE','DISABLE') DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `konfig`
--

INSERT INTO `konfig` (`id`, `slug`, `value`, `status`, `created_at`, `updated_at`) VALUES
(6, 'APPLICATION', 'SMARTSOFT SOP', 'ENABLE', '2019-02-18 15:28:44', '2019-06-26 13:56:36'),
(7, 'LOGO', 'http://www.pertanian.go.id/img/logo.png', 'ENABLE', '2019-02-18 15:29:32', '2019-04-29 10:56:09'),
(8, 'LOGIN_BACKGROUND', 'background-image: url(\'https://coloredbrain.com/wp-content/uploads/2016/07/login-background.jpg\');background-size: cover;background-position: center;', 'ENABLE', '2019-02-18 15:29:52', '2019-04-29 10:57:19'),
(9, 'COLOR_HEADER', 'background: linear-gradient(to right,#0052D4,#65C7F7);', 'DISABLE', '2019-02-18 15:30:24', '2019-02-18 15:31:08'),
(10, 'VERSION', '1.0.0', 'ENABLE', '2019-02-18 15:30:39', NULL),
(11, 'COPYRIGHT', '© 2019 <a href=\"http://smartsoftstudio.com/\" target=\"_blank\">SmartSoft Studio</a>.</strong> All rights     reserved.', 'ENABLE', '2019-02-18 15:32:01', '2019-02-19 10:27:32'),
(12, 'SKIN', 'skin-purple-light', 'ENABLE', '2019-02-18 15:34:01', '2019-09-05 13:03:19'),
(13, 'TITLE_APPLICATION', 'Smartsoft | Standard operation system', 'ENABLE', '2019-02-18 15:39:54', NULL),
(14, 'APPLICATION_SMALL', 'SM', 'ENABLE', '2019-02-18 15:42:41', '2019-02-18 15:43:24'),
(15, 'LOGIN_BOX', 'background : #fff !important ; ', 'ENABLE', '2019-02-18 15:45:53', '2019-02-18 15:58:53'),
(16, 'TITLE_LOGIN_APPLICATION', 'Smartsoft | Login', 'ENABLE', '2019-02-18 15:47:41', NULL),
(17, 'LOGIN_TITLE', 'LOGIN ADMIN', 'ENABLE', '2019-02-18 15:48:55', NULL),
(24, 'LOGIN', '1', 'ENABLE', '2019-02-21 14:12:14', '2019-02-21 16:33:07'),
(25, 'email-template', '<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Strict//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd\">\r\n<html xmlns=\"http://www.w3.org/1999/xhtml\">\r\n\r\n<head>\r\n    <meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />\r\n    <meta name=\"viewport\" content=\"width=device-width\" />\r\n\r\n\r\n    <style type=\"text/css\">\r\n        /* Your custom styles go here */\r\n        * {\r\n            margin: 0;\r\n            padding: 0;\r\n            font-size: 100%;\r\n            font-family: \'Avenir Next\', \"Helvetica Neue\", \"Helvetica\", Helvetica, Arial, sans-serif;\r\n            line-height: 1.65;\r\n        }\r\n\r\n        img {\r\n            max-width: 100%;\r\n            margin: 0 auto;\r\n            display: block;\r\n        }\r\n\r\n        body,\r\n        .body-wrap {\r\n            width: 100% !important;\r\n            height: 100%;\r\n            background: #f8f8f8;\r\n        }\r\n\r\n        a {\r\n            color: #71bc37;\r\n            text-decoration: none;\r\n        }\r\n\r\n        a:hover {\r\n            text-decoration: underline;\r\n        }\r\n\r\n        .text-center {\r\n            text-align: center;\r\n        }\r\n\r\n        .text-right {\r\n            text-align: right;\r\n        }\r\n\r\n        .text-left {\r\n            text-align: left;\r\n        }\r\n\r\n        .button {\r\n            display: inline-block;\r\n            color: white;\r\n            background: #71bc37;\r\n            border: solid #71bc37;\r\n            border-width: 10px 20px 8px;\r\n            font-weight: bold;\r\n            border-radius: 4px;\r\n        }\r\n\r\n        .button:hover {\r\n            text-decoration: none;\r\n        }\r\n\r\n        h1,\r\n        h2,\r\n        h3,\r\n        h4,\r\n        h5,\r\n        h6 {\r\n            margin-bottom: 20px;\r\n            line-height: 1.25;\r\n        }\r\n\r\n        h1 {\r\n            font-size: 32px;\r\n        }\r\n\r\n        h2 {\r\n            font-size: 28px;\r\n        }\r\n\r\n        h3 {\r\n            font-size: 24px;\r\n        }\r\n\r\n        h4 {\r\n            font-size: 20px;\r\n        }\r\n\r\n        h5 {\r\n            font-size: 16px;\r\n        }\r\n\r\n        p,\r\n        ul,\r\n        ol {\r\n            font-size: 16px;\r\n            font-weight: normal;\r\n            margin-bottom: 20px;\r\n        }\r\n\r\n        .container {\r\n            display: block !important;\r\n            clear: both !important;\r\n            margin: 0 auto !important;\r\n            max-width: 580px !important;\r\n        }\r\n\r\n        .container table {\r\n            width: 100% !important;\r\n            border-collapse: collapse;\r\n        }\r\n\r\n        .container .masthead {\r\n            padding: 80px 0;\r\n            background: #71bc37;\r\n            color: white;\r\n        }\r\n\r\n        .container .masthead h1 {\r\n            margin: 0 auto !important;\r\n            max-width: 90%;\r\n            text-transform: uppercase;\r\n        }\r\n\r\n        .container .content {\r\n            background: white;\r\n            padding: 30px 35px;\r\n        }\r\n\r\n        .container .content.footer {\r\n            background: none;\r\n        }\r\n\r\n        .container .content.footer p {\r\n            margin-bottom: 0;\r\n            color: #888;\r\n            text-align: center;\r\n            font-size: 14px;\r\n        }\r\n\r\n        .container .content.footer a {\r\n            color: #888;\r\n            text-decoration: none;\r\n            font-weight: bold;\r\n        }\r\n\r\n        .container .content.footer a:hover {\r\n            text-decoration: underline;\r\n        }\r\n\r\n    </style>\r\n</head>\r\n\r\n<body>\r\n    <table class=\"body-wrap\">\r\n        <tr>\r\n            <td class=\"container\">\r\n\r\n                <!-- Message start -->\r\n                <table>\r\n                    <tr>\r\n                        <td align=\"center\" class=\"masthead\">\r\n\r\n                            <h1>Something Big...</h1>\r\n\r\n                        </td>\r\n                    </tr>\r\n                    <tr>\r\n                        <td class=\"content\">\r\n\r\n                            <h2>Hi Stranger,</h2>\r\n\r\n                            <p>Kielbasa venison ball tip shankle. Boudin prosciutto landjaeger, pancetta jowl turkey tri-tip porchetta beef pork loin drumstick. Frankfurter short ribs kevin pig ribeye drumstick bacon kielbasa. Pork loin brisket biltong, pork belly filet mignon ribeye pig ground round porchetta turducken turkey. Pork belly beef ribs sausage ham hock, ham doner frankfurter pork chop tail meatball beef pig meatloaf short ribs shoulder. Filet mignon ham hock kielbasa beef ribs shank. Venison swine beef ribs sausage pastrami shoulder.</p>\r\n\r\n                            <table>\r\n                                <tr>\r\n                                    <td align=\"center\">\r\n                                        <p>\r\n                                            <a href=\"#\" class=\"button\">Share the Awesomeness</a>\r\n                                        </p>\r\n                                    </td>\r\n                                </tr>\r\n                            </table>\r\n\r\n                            <p>By the way, if you\'re wondering where you can find more of this fine meaty filler, visit <a href=\"http://baconipsum.com\">Bacon Ipsum</a>.</p>\r\n\r\n                            <p><em>– Mr. Pen</em></p>\r\n\r\n                        </td>\r\n                    </tr>\r\n                </table>\r\n\r\n            </td>\r\n        </tr>\r\n        <tr>\r\n            <td class=\"container\">\r\n\r\n                <!-- Message start -->\r\n                <table>\r\n                    <tr>\r\n                        <td class=\"content footer\" align=\"center\">\r\n                            <p>Sent by <a href=\"#\">Company Name</a>, 1234 Yellow Brick Road, OZ, 99999</p>\r\n                            <p><a href=\"mailto:\">hello@company.com</a> | <a href=\"#\">Unsubscribe</a></p>\r\n                        </td>\r\n                    </tr>\r\n                </table>\r\n\r\n            </td>\r\n        </tr>\r\n    </table>\r\n</body>\r\n\r\n</html>\r\n', 'ENABLE', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `id` int(11) NOT NULL,
  `uri` varchar(255) NOT NULL,
  `method` varchar(6) NOT NULL,
  `params` text DEFAULT NULL,
  `api_key` varchar(40) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `time` int(11) NOT NULL,
  `rtime` float DEFAULT NULL,
  `authorized` varchar(1) NOT NULL,
  `response_code` smallint(3) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `menu_master`
--

CREATE TABLE `menu_master` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `urutan` varchar(255) DEFAULT NULL,
  `parent` varchar(255) DEFAULT NULL,
  `notif` varchar(255) DEFAULT NULL,
  `status` enum('ENABLE','DISABLE') DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu_master`
--

INSERT INTO `menu_master` (`id`, `name`, `icon`, `link`, `urutan`, `parent`, `notif`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Dashboard', 'fa fa-dashboard', '/admin', '0', '0', '', 'ENABLE', '2019-01-17 14:33:33', '2019-09-05 09:24:25'),
(20, 'Investor', 'fa fa-users', 'admin/investor', '3', '0', '', 'ENABLE', '2019-09-04 21:58:18', '2019-09-05 13:01:40'),
(21, 'Master', 'fa fa-database', '#', '4', '0', '', 'ENABLE', '2019-09-05 08:50:16', '2019-09-05 13:01:47'),
(22, 'User', 'fa fa-user', 'admin/master/user', '0', '21', '', 'ENABLE', '2019-09-05 08:51:03', '2019-09-05 08:58:57'),
(23, 'Project', 'fa fa-archive', 'admin/project', '1', '0', '', 'ENABLE', '2019-09-05 12:59:18', '2019-09-05 13:00:23'),
(24, 'Blog', 'fa fa-newspaper-o', 'admin/blog', '2', '0', '', 'ENABLE', '2019-09-05 13:01:21', '2019-09-05 13:02:30'),
(25, 'Pengaturan', 'fa fa-cog', '#', '5', '0', '', 'ENABLE', '2019-09-05 13:06:20', '2019-09-05 13:08:32'),
(26, 'Halaman', 'fa fa-link', 'master/page', '0', '25', '', 'ENABLE', '2019-09-05 13:07:23', NULL),
(27, 'Cara Kerja', 'fa fa-gear', 'admin/howswork', '1', '25', '', 'ENABLE', '2019-09-05 14:09:47', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `query` longtext DEFAULT NULL,
  `header` varchar(255) DEFAULT NULL,
  `status` enum('ENABLE','DISABLE') DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `role` varchar(255) DEFAULT NULL,
  `status` enum('DISABLE','ENABLE') DEFAULT NULL,
  `menu` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `role`, `status`, `menu`, `created_at`, `updated_at`) VALUES
(17, 'Super Admin', 'ENABLE', '[\"1\",\"23\",\"24\",\"20\",\"21\",\"22\",\"25\",\"26\",\"27\"]', '2018-10-12 17:03:59', '2019-09-05 14:10:27'),
(18, 'Admin', 'ENABLE', '[\"1\",\"23\",\"24\"]', '2019-09-05 12:28:50', '2019-09-05 13:14:47');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_hows_work`
--

CREATE TABLE `tbl_hows_work` (
  `id` int(11) NOT NULL,
  `title` varchar(225) DEFAULT NULL,
  `value` text DEFAULT NULL,
  `status` enum('ENABLE','DISABLE') DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_hows_work`
--

INSERT INTO `tbl_hows_work` (`id`, `title`, `value`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Cara Pertama', '<p><b>Lorem Ipsum dan Kawan Kawan</b><br></p>', 'ENABLE', '2019-09-05 14:38:35', '2019-09-05 14:44:45');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_investor`
--

CREATE TABLE `tbl_investor` (
  `id` int(11) NOT NULL,
  `name` varchar(225) DEFAULT NULL,
  `email` varchar(225) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `phone` varchar(225) DEFAULT NULL,
  `status` enum('ENABLE','DISABLE') DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_investor`
--

INSERT INTO `tbl_investor` (`id`, `name`, `email`, `address`, `phone`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Bagus', 'procw57@gmail.com', 'Disini aja', '0821723124', 'ENABLE', '2019-09-04 00:00:00', '2019-09-09 14:19:32'),
(6, 'User Ke 2', 'user@gmail.com', NULL, NULL, 'ENABLE', '2019-09-05 12:19:49', '2019-09-05 12:19:49'),
(7, 'User Ke 3', 'userke3@gmail.com', NULL, NULL, 'ENABLE', '2019-09-05 12:23:01', '2019-09-05 12:23:01'),
(8, 'Aang Muammar Zein', 'amuammarzein@gmail.com', NULL, NULL, 'ENABLE', '2019-09-06 10:13:58', '2019-09-06 10:13:58');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_project`
--

CREATE TABLE `tbl_project` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(225) DEFAULT NULL,
  `slug` varchar(225) NOT NULL,
  `harga` int(125) DEFAULT NULL,
  `unit` int(125) DEFAULT NULL,
  `total_harga` int(125) DEFAULT NULL,
  `periode` int(125) DEFAULT NULL,
  `return` int(125) DEFAULT NULL,
  `bagi_hasil` int(125) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `url_map` text DEFAULT NULL,
  `public` enum('ENABLE','DISABLE') NOT NULL,
  `status` enum('ENABLE','DISABLE') DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_project`
--

INSERT INTO `tbl_project` (`id`, `user_id`, `title`, `slug`, `harga`, `unit`, `total_harga`, `periode`, `return`, `bagi_hasil`, `deskripsi`, `url_map`, `public`, `status`, `created_at`, `updated_at`) VALUES
(1, 13, 'Project Ke 1', 'project-ke-1', 2000000, 338, 676000000, 1, 15, 3, '<p>Mencoba Membuat <b>Project </b>Baru</p>', '', 'ENABLE', 'ENABLE', '2019-09-07 17:06:31', '2019-09-08 13:00:54'),
(2, 13, 'Project Ke 2 dengan mutli imput baru', 'project-ke-2-dengan-mutli-imput-baru', 2000000, 200, 400000000, 1, 12, 3, '<p>Multi <b>input</b> Baru</p>', '', 'ENABLE', 'ENABLE', '2019-09-09 09:26:03', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_project_invest`
--

CREATE TABLE `tbl_project_invest` (
  `id` int(11) NOT NULL,
  `project_id` int(11) DEFAULT NULL,
  `investor_id` int(11) DEFAULT NULL,
  `unit` int(11) DEFAULT NULL,
  `total_harga` int(11) DEFAULT NULL,
  `status` enum('ENABLE','DISABLE') DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_project_invest`
--

INSERT INTO `tbl_project_invest` (`id`, `project_id`, `investor_id`, `unit`, `total_harga`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 2, 4000000, 'ENABLE', '2019-09-08 00:00:00', '2019-09-08 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nip` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role_id` int(255) DEFAULT NULL,
  `desc` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `telepon` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nip`, `name`, `email`, `password`, `role_id`, `desc`, `status`, `created_at`, `updated_at`, `telepon`) VALUES
(13, 'bagus', 'Bagus', 'bagus@gmail.com', '17b38fc02fd7e92f3edeb6318e3066d8', 17, 'gkdshagdsj', '0', '2019-07-02 09:55:20', '2019-09-05 09:18:15', '085'),
(14, 'Admin', 'Super Admin', 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 17, 'Super Admin', '0', '2019-09-05 12:56:42', NULL, ''),
(15, 'Mitra', 'Mitra', 'mitra@gmail.com', '92706ba4fd3022cede6d1610b17a0d2d', 18, 'Mitra', '0', '2019-09-05 12:57:38', '2019-09-05 13:11:56', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `access`
--
ALTER TABLE `access`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `access_control`
--
ALTER TABLE `access_control`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `file`
--
ALTER TABLE `file`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `grafik`
--
ALTER TABLE `grafik`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `keys`
--
ALTER TABLE `keys`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `konfig`
--
ALTER TABLE `konfig`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu_master`
--
ALTER TABLE `menu_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_hows_work`
--
ALTER TABLE `tbl_hows_work`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_investor`
--
ALTER TABLE `tbl_investor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_project`
--
ALTER TABLE `tbl_project`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_project_invest`
--
ALTER TABLE `tbl_project_invest`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `access`
--
ALTER TABLE `access`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `access_control`
--
ALTER TABLE `access_control`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=502;

--
-- AUTO_INCREMENT for table `file`
--
ALTER TABLE `file`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=218;

--
-- AUTO_INCREMENT for table `grafik`
--
ALTER TABLE `grafik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `keys`
--
ALTER TABLE `keys`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `konfig`
--
ALTER TABLE `konfig`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `menu_master`
--
ALTER TABLE `menu_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tbl_hows_work`
--
ALTER TABLE `tbl_hows_work`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_investor`
--
ALTER TABLE `tbl_investor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_project`
--
ALTER TABLE `tbl_project`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_project_invest`
--
ALTER TABLE `tbl_project_invest`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
