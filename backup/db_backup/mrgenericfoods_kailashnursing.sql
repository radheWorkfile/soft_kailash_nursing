-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 17, 2023 at 10:39 AM
-- Server version: 5.7.43
-- PHP Version: 8.1.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mrgenericfoods_kailashnursing`
--

-- --------------------------------------------------------

--
-- Table structure for table `agent_category`
--

CREATE TABLE `agent_category` (
  `id` int(11) NOT NULL,
  `category_name` varchar(30) NOT NULL,
  `commission` int(10) NOT NULL,
  `description` varchar(50) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `agent_category`
--

INSERT INTO `agent_category` (`id`, `category_name`, `commission`, `description`, `date`) VALUES
(1, 'LOCAL CLINIC', 20, 'DCFGVDFGBD', '2023-08-08'),
(2, 'AMBULANCE', 20, 'VXDFGBXF', '2023-08-08'),
(3, 'AASA', 18, 'DFGSDGD', '2023-08-08'),
(4, 'AGENT BINOD', 20, 'VJHGBJK', '2023-08-10');

-- --------------------------------------------------------

--
-- Table structure for table `agent_details`
--

CREATE TABLE `agent_details` (
  `id` int(11) NOT NULL,
  `agent_id` int(20) NOT NULL,
  `password` varchar(200) NOT NULL,
  `name` varchar(50) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(20) NOT NULL,
  `guardian_name` varchar(20) NOT NULL,
  `blood_group` varchar(10) NOT NULL,
  `marital_status` varchar(15) NOT NULL,
  `date_of_joining` date NOT NULL,
  `contact_no` int(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `qualification` varchar(20) NOT NULL,
  `addhar` int(15) NOT NULL,
  `pan` varchar(15) NOT NULL,
  `agent_cat` varchar(20) NOT NULL,
  `current_address` varchar(50) NOT NULL,
  `permanent_address` varchar(50) NOT NULL,
  `bank_name` varchar(150) NOT NULL,
  `branch_name` varchar(200) NOT NULL,
  `account_holder_name` varchar(100) NOT NULL,
  `account_no` varchar(200) NOT NULL,
  `ifsc_code` varchar(50) NOT NULL,
  `image` varchar(50) NOT NULL,
  `is_active` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `agent_details`
--

INSERT INTO `agent_details` (`id`, `agent_id`, `password`, `name`, `dob`, `gender`, `guardian_name`, `blood_group`, `marital_status`, `date_of_joining`, `contact_no`, `email`, `qualification`, `addhar`, `pan`, `agent_cat`, `current_address`, `permanent_address`, `bank_name`, `branch_name`, `account_holder_name`, `account_no`, `ifsc_code`, `image`, `is_active`) VALUES
(1, 505564, '123456', 'AMIT KUMAR', '2023-08-11', 'Male', '', 'AB+', 'Married', '0000-00-00', 2147483647, 'AMIT@GMAIL.COM', '', 2147483647, 'FGHDFG6785534', '1', 'DFGDF', 'PATNA', 'SBI', 'PATNA', 'AMIT KUMAR', '9451213541354684', 'SBIN0005646', '505564.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `agent_payment`
--

CREATE TABLE `agent_payment` (
  `id` int(11) NOT NULL,
  `agent_cat` int(11) NOT NULL,
  `agent_id` int(20) NOT NULL,
  `patient_id` int(20) NOT NULL,
  `amount` float(20,2) NOT NULL,
  `section` varchar(50) NOT NULL,
  `mode` int(5) NOT NULL COMMENT '1-online,2-cash',
  `transaction` varchar(200) NOT NULL,
  `month` varchar(200) NOT NULL,
  `year` varchar(200) NOT NULL,
  `create_date` date NOT NULL,
  `payment_date` date NOT NULL,
  `status` int(5) NOT NULL COMMENT '1-generated,2-paid'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `agent_payment`
--

INSERT INTO `agent_payment` (`id`, `agent_cat`, `agent_id`, `patient_id`, `amount`, `section`, `mode`, `transaction`, `month`, `year`, `create_date`, `payment_date`, `status`) VALUES
(1, 1, 505564, 1002, 44.80, 'Pharmacy', 0, '', 'August', '2023', '2023-08-11', '0000-00-00', 1),
(2, 1, 505564, 1002, 0.00, 'IPD', 0, '', 'August', '2023', '2023-08-12', '0000-00-00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ambulance_call`
--

CREATE TABLE `ambulance_call` (
  `id` int(11) NOT NULL,
  `bill_no` varchar(200) NOT NULL,
  `patient_name` varchar(50) DEFAULT NULL,
  `contact_no` varchar(30) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `vehicle_no` varchar(20) DEFAULT NULL,
  `vehicle_model` varchar(20) DEFAULT NULL,
  `driver` varchar(100) NOT NULL,
  `amount` decimal(15,2) DEFAULT NULL,
  `date` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `generated_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `appointment_no` varchar(100) NOT NULL,
  `date` datetime DEFAULT NULL,
  `patient_name` varchar(50) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `mobileno` varchar(50) DEFAULT NULL,
  `doctor` varchar(50) DEFAULT NULL,
  `amount` varchar(200) NOT NULL,
  `message` varchar(255) DEFAULT NULL,
  `appointment_status` varchar(11) DEFAULT NULL,
  `agent_details` varchar(20) NOT NULL,
  `source` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_opd` varchar(200) NOT NULL,
  `is_ipd` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`id`, `patient_id`, `appointment_no`, `date`, `patient_name`, `gender`, `email`, `mobileno`, `doctor`, `amount`, `message`, `appointment_status`, `agent_details`, `source`, `created_at`, `updated_at`, `is_opd`, `is_ipd`) VALUES
(1, 0, '', '2023-08-11 17:53:00', 'anil', 'Male', '', '8976875654', '2', '', 'fever', 'approve', '', 'Offline', '2023-08-11 12:24:11', '2023-08-11 12:24:11', '', 'yes'),
(2, 0, '', '2023-08-11 17:54:00', 'Demo', 'Male', '', '9572482147', '2', '', 'grtyhdrty', 'approve', '', 'Offline', '2023-08-11 12:24:45', '2023-08-11 12:24:45', '', ''),
(3, 1, 'APPNO3', '2023-08-16 18:00:00', 'Dwemo', 'Male', '', '8574215874', '2', '', 'dfhghfg', 'approved', '', 'Offline', '2023-08-11 12:30:33', '2023-08-11 12:30:33', '', 'yes'),
(4, 0, '', '2023-08-11 18:01:00', 'dsgdfg', '', '', '7485214785', '2', '', 'yjghjghj', 'approve', '', 'Offline', '2023-08-11 12:31:27', '2023-08-11 12:31:27', '', ''),
(5, 2, 'APPNO5', '2023-08-11 18:13:00', 'radhe radhe', 'Male', '', '96775462345', '2', '', 'jjhdfydfdg', 'approved', '', 'Offline', '2023-08-11 12:44:13', '2023-08-11 12:44:13', '', ''),
(6, 3, 'APPNO6', '2023-08-12 01:05:00', 'Deepak kumar', 'Male', '', '7260093936', '2', '', 'A Mole on right chick', 'approved', '', 'Offline', '2023-08-12 08:05:48', '2023-08-12 08:05:48', '', 'yes'),
(7, 4, 'APPNO7', '2023-08-12 01:16:00', 'SOHAN', 'Male', '', '98746544646', '2', '', 'FEVER', 'approved', '', 'Offline', '2023-08-12 08:18:16', '2023-08-12 08:18:16', '', ''),
(8, 10, 'APPNO8', '2023-08-16 13:00:00', 'dev raj', 'Male', '', '7987896456', '2', '', 'regular check up', 'approved', '', 'Offline', '2023-08-16 07:32:15', '2023-08-16 07:32:15', '', ''),
(9, 11, 'APPNO9', '2023-08-16 17:00:00', 'RAJU KUMAR', 'Male', '', '95646564656', '2', '', 'FEVER', 'approved', '', 'Offline', '2023-08-16 07:46:02', '2023-08-16 07:46:02', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `bed`
--

CREATE TABLE `bed` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `bed_type_id` int(11) NOT NULL,
  `bed_group_id` int(100) NOT NULL,
  `is_active` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bed`
--

INSERT INTO `bed` (`id`, `name`, `bed_type_id`, `bed_group_id`, `is_active`) VALUES
(1, '100', 1, 1, 'no'),
(2, '101', 1, 1, 'yes'),
(3, '102', 1, 1, 'yes'),
(4, '200', 2, 2, 'yes'),
(5, '201', 2, 2, 'yes'),
(6, '500', 3, 3, 'no');

-- --------------------------------------------------------

--
-- Table structure for table `bed_group`
--

CREATE TABLE `bed_group` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `description` varchar(200) NOT NULL,
  `floor` varchar(100) NOT NULL,
  `is_active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bed_group`
--

INSERT INTO `bed_group` (`id`, `name`, `description`, `floor`, `is_active`) VALUES
(1, 'general bed', '', '1', 0),
(2, 'floral bed', '', '2', 0),
(3, 'movaable bed', '', '3', 0);

-- --------------------------------------------------------

--
-- Table structure for table `bed_type`
--

CREATE TABLE `bed_type` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bed_type`
--

INSERT INTO `bed_type` (`id`, `name`) VALUES
(1, 'general'),
(2, 'floral'),
(3, 'vip');

-- --------------------------------------------------------

--
-- Table structure for table `birth_report`
--

CREATE TABLE `birth_report` (
  `id` int(11) NOT NULL,
  `ref_no` varchar(200) NOT NULL,
  `opd_ipd_no` varchar(200) NOT NULL,
  `child_name` varchar(200) NOT NULL,
  `child_pic` varchar(200) NOT NULL,
  `gender` varchar(200) NOT NULL,
  `birth_date` datetime NOT NULL,
  `weight` varchar(200) NOT NULL,
  `mother_name` varchar(200) NOT NULL,
  `contact` varchar(200) NOT NULL,
  `mother_pic` varchar(200) NOT NULL,
  `father_name` varchar(200) NOT NULL,
  `father_pic` varchar(200) NOT NULL,
  `birth_report` mediumtext NOT NULL,
  `document` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `is_active` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `blood_bank_status`
--

CREATE TABLE `blood_bank_status` (
  `id` int(11) NOT NULL,
  `blood_group` varchar(3) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `ceated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `blood_donor`
--

CREATE TABLE `blood_donor` (
  `id` int(11) NOT NULL,
  `donor_name` varchar(100) DEFAULT NULL,
  `age` varchar(11) DEFAULT NULL,
  `month` varchar(20) DEFAULT NULL,
  `blood_group` varchar(11) DEFAULT NULL,
  `gender` varchar(11) DEFAULT NULL,
  `father_name` varchar(100) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `contact_no` varchar(20) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `blood_donor_cycle`
--

CREATE TABLE `blood_donor_cycle` (
  `id` int(11) NOT NULL,
  `blood_donor_id` int(11) NOT NULL,
  `institution` varchar(100) DEFAULT NULL,
  `lot` varchar(11) DEFAULT NULL,
  `bag_no` varchar(11) DEFAULT NULL,
  `quantity` varchar(11) DEFAULT NULL,
  `donate_date` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `blood_issue`
--

CREATE TABLE `blood_issue` (
  `id` int(11) NOT NULL,
  `bill_no` varchar(200) NOT NULL,
  `date_of_issue` datetime DEFAULT NULL,
  `recieve_to` varchar(50) DEFAULT NULL,
  `blood_group` varchar(50) DEFAULT NULL,
  `gender` varchar(50) DEFAULT NULL,
  `doctor` varchar(200) DEFAULT NULL,
  `institution` varchar(100) DEFAULT NULL,
  `technician` varchar(50) DEFAULT NULL,
  `amount` decimal(15,2) DEFAULT NULL,
  `donor_name` varchar(50) DEFAULT NULL,
  `lot` varchar(20) DEFAULT NULL,
  `bag_no` varchar(20) DEFAULT NULL,
  `remark` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `generated_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `charges`
--

CREATE TABLE `charges` (
  `id` int(11) NOT NULL,
  `charge_type` varchar(200) NOT NULL,
  `charge_category` varchar(200) NOT NULL,
  `description` varchar(200) NOT NULL,
  `code` varchar(100) NOT NULL,
  `standard_charge` varchar(200) NOT NULL,
  `date` date NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `charges`
--

INSERT INTO `charges` (`id`, `charge_type`, `charge_category`, `description`, `code`, `standard_charge`, `date`, `status`) VALUES
(1, 'Procedures', 'OPD CHARGE', '', 'OPD01', '500', '0000-00-00', ''),
(2, 'Procedures', 'IPD CHARGE', '', 'IPD01', '600', '0000-00-00', ''),
(3, 'Investigations', 'DOC ROUND UP CHARGE', '', 'DOC01', '800', '0000-00-00', ''),
(4, 'Investigations', 'NURSE CHARGE', '', 'NUR01', '600', '0000-00-00', ''),
(5, 'Operation Theatre', 'OT CHARGE', '', 'OT01', '5000', '0000-00-00', ''),
(6, 'Others', 'OTHER CHHARGES', '', 'OTH', '1000', '0000-00-00', ''),
(7, 'Others', 'Bed charge', '', 'BED', '400', '0000-00-00', ''),
(8, 'Procedures', 'APPOINTMENT CHARGE', '', 'APPOINT', '600', '0000-00-00', '');

-- --------------------------------------------------------

--
-- Table structure for table `charge_categories`
--

CREATE TABLE `charge_categories` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `description` varchar(200) NOT NULL,
  `charge_type` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `charge_categories`
--

INSERT INTO `charge_categories` (`id`, `name`, `description`, `charge_type`) VALUES
(1, 'DOC ROUND UP CHARGE', 'DOCTOR ROUND UP CHARGE', 'Investigations'),
(2, 'OPD CHARGE', 'OPD CHARGE', 'Procedures'),
(3, 'IPD CHARGE', 'IPD CHARGE', 'Procedures'),
(4, 'NURSE CHARGE', 'NURSE CHARGE', 'Investigations'),
(5, 'OT CHARGE', 'OPERATION CHARGE', 'Operation Theatre'),
(6, 'APPOINTMENT CHARGE', 'APPOINTMENT CHARGE', 'Procedures'),
(7, 'OTHER CHHARGES', 'OTHER CHHARGES', 'Others'),
(8, 'Bed charge', 'general bed charge', 'Others');

-- --------------------------------------------------------

--
-- Table structure for table `complaint`
--

CREATE TABLE `complaint` (
  `id` int(11) NOT NULL,
  `complaint_type` varchar(100) NOT NULL,
  `source` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `contact` varchar(15) NOT NULL,
  `email` varchar(200) NOT NULL,
  `date` date NOT NULL,
  `description` text NOT NULL,
  `action_taken` varchar(200) NOT NULL,
  `assigned` varchar(50) NOT NULL,
  `note` text NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `complaint_type`
--

CREATE TABLE `complaint_type` (
  `id` int(11) NOT NULL,
  `complaint_type` varchar(100) NOT NULL,
  `description` mediumtext NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `complaint_type`
--

INSERT INTO `complaint_type` (`id`, `complaint_type`, `description`, `created_at`) VALUES
(1, 'CURE RELATED', '', '2023-08-11 11:49:43'),
(2, 'FEE RELATED', '', '2023-08-11 11:49:52'),
(3, 'MISBEHAVE ', '', '2023-08-11 11:50:16'),
(4, 'CHECK UP', '', '2023-08-11 11:50:44');

-- --------------------------------------------------------

--
-- Table structure for table `consultant_register`
--

CREATE TABLE `consultant_register` (
  `id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `ipd_id` int(11) NOT NULL,
  `date` varchar(100) DEFAULT NULL,
  `ins_date` varchar(50) DEFAULT NULL,
  `instruction` varchar(200) NOT NULL,
  `cons_doctor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `consultant_register`
--

INSERT INTO `consultant_register` (`id`, `patient_id`, `ipd_id`, `date`, `ins_date`, `instruction`, `cons_doctor`) VALUES
(1, 2, 0, '2023-08-11 00:00:00', '2023-08-11', 'icu', 2),
(2, 2, 0, '2023-08-11 00:00:00', '2023-08-11', 'glucose', 2);

-- --------------------------------------------------------

--
-- Table structure for table `consult_charges`
--

CREATE TABLE `consult_charges` (
  `id` int(11) NOT NULL,
  `doctor` int(11) NOT NULL,
  `standard_charge` varchar(200) NOT NULL,
  `date` date NOT NULL,
  `status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `consult_charges`
--

INSERT INTO `consult_charges` (`id`, `doctor`, `standard_charge`, `date`, `status`) VALUES
(1, 2, '1000', '0000-00-00', '');

-- --------------------------------------------------------

--
-- Table structure for table `contents`
--

CREATE TABLE `contents` (
  `id` int(11) NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `is_public` varchar(10) DEFAULT 'No',
  `class_id` int(11) DEFAULT NULL,
  `cls_sec_id` int(10) NOT NULL,
  `file` varchar(250) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `note` text,
  `is_active` varchar(255) DEFAULT 'no',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `content_for`
--

CREATE TABLE `content_for` (
  `id` int(11) NOT NULL,
  `role` varchar(50) DEFAULT NULL,
  `content_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `custom_fields`
--

CREATE TABLE `custom_fields` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `belong_to` varchar(100) DEFAULT NULL,
  `type` varchar(100) DEFAULT NULL,
  `bs_column` int(10) DEFAULT NULL,
  `validation` int(11) DEFAULT '0',
  `field_values` mediumtext,
  `show_table` varchar(100) DEFAULT NULL,
  `visible_on_table` int(11) NOT NULL,
  `weight` int(11) DEFAULT NULL,
  `is_active` int(11) DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `custom_fields`
--

INSERT INTO `custom_fields` (`id`, `name`, `belong_to`, `type`, `bs_column`, `validation`, `field_values`, `show_table`, `visible_on_table`, `weight`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'BIRTH CERTIFICATE', 'birth_report', 'input', NULL, 0, NULL, NULL, 1, NULL, 0, '2023-08-11 12:01:54', '0000-00-00 00:00:00'),
(2, 'DEATH CERTIFICATE', 'death_report', 'input', NULL, 0, NULL, NULL, 1, NULL, 0, '2023-08-11 12:02:11', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `custom_field_values`
--

CREATE TABLE `custom_field_values` (
  `id` int(11) NOT NULL,
  `belong_table_id` int(11) DEFAULT NULL,
  `custom_field_id` int(11) DEFAULT NULL,
  `field_value` varchar(200) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `death_report`
--

CREATE TABLE `death_report` (
  `id` int(11) NOT NULL,
  `opdipd_no` varchar(200) NOT NULL,
  `patient` varchar(200) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `image` varchar(200) NOT NULL,
  `death_date` datetime NOT NULL,
  `guardian_name` varchar(200) NOT NULL,
  `contact` varchar(15) NOT NULL,
  `address` varchar(200) NOT NULL,
  `death_report` text NOT NULL,
  `is_active` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(11) NOT NULL,
  `department_name` varchar(200) NOT NULL,
  `is_active` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `department_name`, `is_active`) VALUES
(1, 'PHARMACY', 'yes'),
(2, 'DOCTOR', 'yes'),
(3, 'NURSING', 'yes'),
(4, 'HOUSE KEEPING', 'yes'),
(5, 'GUARD', 'yes'),
(6, 'ADMIN', 'yes'),
(7, 'RECEPTION', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `diagnosis`
--

CREATE TABLE `diagnosis` (
  `id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `diagnosis_center_name` varchar(100) NOT NULL,
  `report_type` varchar(200) NOT NULL,
  `document` varchar(200) NOT NULL,
  `description` varchar(400) NOT NULL,
  `report_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `dispatch_receive`
--

CREATE TABLE `dispatch_receive` (
  `id` int(11) NOT NULL,
  `reference_no` varchar(50) NOT NULL,
  `to_title` varchar(100) NOT NULL,
  `address` varchar(500) NOT NULL,
  `note` varchar(500) NOT NULL,
  `from_title` varchar(200) NOT NULL,
  `date` varchar(20) NOT NULL,
  `image` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `type` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `email_config`
--

CREATE TABLE `email_config` (
  `id` int(11) UNSIGNED NOT NULL,
  `email_type` varchar(100) DEFAULT NULL,
  `smtp_server` varchar(100) DEFAULT NULL,
  `smtp_port` varchar(100) DEFAULT NULL,
  `smtp_username` varchar(100) DEFAULT NULL,
  `smtp_password` varchar(100) DEFAULT NULL,
  `ssl_tls` varchar(100) DEFAULT NULL,
  `is_active` varchar(10) NOT NULL DEFAULT 'no',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `email_config`
--

INSERT INTO `email_config` (`id`, `email_type`, `smtp_server`, `smtp_port`, `smtp_username`, `smtp_password`, `ssl_tls`, `is_active`, `created_at`) VALUES
(1, 'sendmail', '', '', '', '', '', 'yes', '2021-09-22 12:11:41');

-- --------------------------------------------------------

--
-- Table structure for table `enquiry`
--

CREATE TABLE `enquiry` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `address` mediumtext NOT NULL,
  `reference` varchar(20) NOT NULL,
  `date` date NOT NULL,
  `description` varchar(500) NOT NULL,
  `follow_up_date` date NOT NULL,
  `note` mediumtext NOT NULL,
  `source` varchar(50) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `assigned` varchar(100) NOT NULL,
  `class` int(11) NOT NULL,
  `no_of_child` varchar(11) DEFAULT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `enquiry_type`
--

CREATE TABLE `enquiry_type` (
  `id` int(11) NOT NULL,
  `enquiry_type` varchar(100) NOT NULL,
  `description` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `event_title` varchar(200) NOT NULL,
  `event_description` varchar(300) NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `event_type` varchar(100) NOT NULL,
  `event_color` varchar(200) NOT NULL,
  `event_for` varchar(100) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `id` int(11) NOT NULL,
  `exp_head_id` int(11) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `invoice_no` varchar(200) NOT NULL,
  `date` date DEFAULT NULL,
  `amount` decimal(15,2) DEFAULT NULL,
  `documents` varchar(255) DEFAULT NULL,
  `note` text,
  `is_active` varchar(255) DEFAULT 'yes',
  `is_deleted` varchar(255) DEFAULT 'no',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `expense_head`
--

CREATE TABLE `expense_head` (
  `id` int(11) NOT NULL,
  `exp_category` varchar(50) DEFAULT NULL,
  `description` text,
  `is_active` varchar(255) DEFAULT 'yes',
  `is_deleted` varchar(255) DEFAULT 'no',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `expense_head`
--

INSERT INTO `expense_head` (`id`, `exp_category`, `description`, `is_active`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 'BIJLI BILL', '', 'yes', 'no', '2023-08-11 11:56:47', '0000-00-00 00:00:00'),
(2, 'WATER BILL', '', 'yes', 'no', '2023-08-11 11:56:57', '0000-00-00 00:00:00'),
(3, 'TELEPHONE BILL', '', 'yes', 'no', '2023-08-11 11:57:12', '0000-00-00 00:00:00'),
(4, 'HOUSE KEEPING', '', 'yes', 'no', '2023-08-11 11:57:22', '0000-00-00 00:00:00'),
(5, 'INTERNET BILL', '', 'yes', 'no', '2023-08-11 11:57:32', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `floor`
--

CREATE TABLE `floor` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `floor`
--

INSERT INTO `floor` (`id`, `name`, `description`) VALUES
(1, '1st floor', ''),
(2, '2nd floor', ''),
(3, '3rd floor', '');

-- --------------------------------------------------------

--
-- Table structure for table `follow_up`
--

CREATE TABLE `follow_up` (
  `id` int(11) NOT NULL,
  `enquiry_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `next_date` date NOT NULL,
  `response` text NOT NULL,
  `note` text NOT NULL,
  `followup_by` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `front_cms_media_gallery`
--

CREATE TABLE `front_cms_media_gallery` (
  `id` int(11) NOT NULL,
  `image` varchar(300) DEFAULT NULL,
  `thumb_path` varchar(300) DEFAULT NULL,
  `dir_path` varchar(300) DEFAULT NULL,
  `img_name` varchar(300) DEFAULT NULL,
  `thumb_name` varchar(300) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `file_type` varchar(100) NOT NULL,
  `file_size` varchar(100) NOT NULL,
  `vid_url` mediumtext NOT NULL,
  `vid_title` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `front_cms_menus`
--

CREATE TABLE `front_cms_menus` (
  `id` int(11) NOT NULL,
  `menu` varchar(100) DEFAULT NULL,
  `slug` varchar(200) DEFAULT NULL,
  `description` mediumtext,
  `open_new_tab` int(10) NOT NULL DEFAULT '0',
  `ext_url` mediumtext NOT NULL,
  `ext_url_link` mediumtext NOT NULL,
  `publish` int(11) NOT NULL DEFAULT '0',
  `content_type` varchar(10) NOT NULL DEFAULT 'manual',
  `is_active` varchar(10) DEFAULT 'no',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `front_cms_menu_items`
--

CREATE TABLE `front_cms_menu_items` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `menu` varchar(100) DEFAULT NULL,
  `page_id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `ext_url` mediumtext,
  `open_new_tab` int(11) DEFAULT '0',
  `ext_url_link` mediumtext,
  `slug` varchar(200) DEFAULT NULL,
  `weight` int(11) DEFAULT NULL,
  `publish` int(11) NOT NULL DEFAULT '0',
  `description` mediumtext,
  `is_active` varchar(10) DEFAULT 'no',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `front_cms_pages`
--

CREATE TABLE `front_cms_pages` (
  `id` int(11) NOT NULL,
  `page_type` varchar(10) NOT NULL DEFAULT 'manual',
  `is_homepage` int(1) DEFAULT '0',
  `title` varchar(250) DEFAULT NULL,
  `url` varchar(250) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `slug` varchar(200) DEFAULT NULL,
  `meta_title` mediumtext,
  `meta_description` mediumtext,
  `meta_keyword` mediumtext,
  `feature_image` varchar(200) NOT NULL,
  `description` longtext,
  `publish_date` date NOT NULL,
  `publish` int(10) DEFAULT '0',
  `sidebar` int(10) DEFAULT '0',
  `is_active` varchar(10) DEFAULT 'no',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `front_cms_page_contents`
--

CREATE TABLE `front_cms_page_contents` (
  `id` int(11) NOT NULL,
  `page_id` int(11) DEFAULT NULL,
  `content_type` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `front_cms_programs`
--

CREATE TABLE `front_cms_programs` (
  `id` int(11) NOT NULL,
  `type` varchar(50) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `url` mediumtext,
  `title` varchar(200) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `event_start` date DEFAULT NULL,
  `event_end` date DEFAULT NULL,
  `event_venue` mediumtext,
  `description` mediumtext,
  `is_active` varchar(10) DEFAULT 'no',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `meta_title` mediumtext NOT NULL,
  `meta_description` mediumtext NOT NULL,
  `meta_keyword` mediumtext NOT NULL,
  `feature_image` mediumtext NOT NULL,
  `publish_date` date NOT NULL,
  `publish` varchar(10) DEFAULT '0',
  `sidebar` int(10) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `front_cms_program_photos`
--

CREATE TABLE `front_cms_program_photos` (
  `id` int(11) NOT NULL,
  `program_id` int(11) DEFAULT NULL,
  `media_gallery_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `front_cms_settings`
--

CREATE TABLE `front_cms_settings` (
  `id` int(11) NOT NULL,
  `theme` varchar(50) DEFAULT NULL,
  `is_active_rtl` int(10) DEFAULT '0',
  `is_active_front_cms` int(11) DEFAULT '0',
  `is_active_sidebar` int(1) DEFAULT '0',
  `logo` varchar(200) DEFAULT NULL,
  `contact_us_email` varchar(100) DEFAULT NULL,
  `complain_form_email` varchar(100) DEFAULT NULL,
  `sidebar_options` mediumtext NOT NULL,
  `fb_url` varchar(200) NOT NULL,
  `twitter_url` varchar(200) NOT NULL,
  `youtube_url` varchar(200) NOT NULL,
  `google_plus` varchar(200) NOT NULL,
  `instagram_url` varchar(200) NOT NULL,
  `pinterest_url` varchar(200) NOT NULL,
  `linkedin_url` varchar(200) NOT NULL,
  `google_analytics` mediumtext,
  `footer_text` varchar(500) DEFAULT NULL,
  `fav_icon` varchar(250) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `front_cms_settings`
--

INSERT INTO `front_cms_settings` (`id`, `theme`, `is_active_rtl`, `is_active_front_cms`, `is_active_sidebar`, `logo`, `contact_us_email`, `complain_form_email`, `sidebar_options`, `fb_url`, `twitter_url`, `youtube_url`, `google_plus`, `instagram_url`, `pinterest_url`, `linkedin_url`, `google_analytics`, `footer_text`, `fav_icon`, `created_at`) VALUES
(1, 'standard', NULL, 1, NULL, NULL, '', '', '[]', '', '', '', '', '', '', '', '', '', NULL, '2023-08-11 10:59:17');

-- --------------------------------------------------------

--
-- Table structure for table `general_calls`
--

CREATE TABLE `general_calls` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `contact` varchar(12) NOT NULL,
  `date` date NOT NULL,
  `description` varchar(500) NOT NULL,
  `follow_up_date` date NOT NULL,
  `call_dureation` varchar(50) NOT NULL,
  `note` mediumtext NOT NULL,
  `call_type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `income`
--

CREATE TABLE `income` (
  `id` int(11) NOT NULL,
  `inc_head_id` varchar(11) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `invoice_no` varchar(200) NOT NULL,
  `date` date DEFAULT NULL,
  `amount` decimal(15,2) DEFAULT NULL,
  `note` text,
  `is_active` varchar(255) DEFAULT 'yes',
  `is_deleted` varchar(255) DEFAULT 'no',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `documents` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `income_head`
--

CREATE TABLE `income_head` (
  `id` int(255) NOT NULL,
  `income_category` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `is_active` varchar(255) NOT NULL DEFAULT 'yes',
  `is_deleted` varchar(255) NOT NULL DEFAULT 'no',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `income_head`
--

INSERT INTO `income_head` (`id`, `income_category`, `description`, `is_active`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 'NURSING HOME INCOME', '', 'yes', 'no', '2023-08-11 11:55:14', '0000-00-00 00:00:00'),
(2, 'RENT', '', 'yes', 'no', '2023-08-11 11:55:27', '0000-00-00 00:00:00'),
(3, 'DONATION', '', 'yes', 'no', '2023-08-11 11:55:40', '0000-00-00 00:00:00'),
(4, 'APPOINTMENT', '', 'yes', 'no', '2023-08-11 11:55:50', '0000-00-00 00:00:00'),
(5, 'OPD INCOME', '', 'yes', 'no', '2023-08-11 11:56:01', '0000-00-00 00:00:00'),
(6, 'IPD INCOME', '', 'yes', 'no', '2023-08-11 11:56:10', '0000-00-00 00:00:00'),
(7, 'OPERATION INCOME', '', 'yes', 'no', '2023-08-11 11:56:34', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `ipd_billing`
--

CREATE TABLE `ipd_billing` (
  `id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `ipd_id` int(11) NOT NULL,
  `discount` int(11) NOT NULL,
  `other_charge` varchar(200) NOT NULL,
  `date` date NOT NULL,
  `tax` decimal(15,2) NOT NULL,
  `gross_total` decimal(15,2) NOT NULL,
  `net_amount` decimal(15,2) NOT NULL,
  `total_amount` decimal(15,2) NOT NULL,
  `generated_by` int(11) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ipd_billing`
--

INSERT INTO `ipd_billing` (`id`, `patient_id`, `ipd_id`, `discount`, `other_charge`, `date`, `tax`, `gross_total`, `net_amount`, `total_amount`, `generated_by`, `status`) VALUES
(2, 1, 3, 0, '0', '2023-08-12', 0.00, 0.00, 0.00, 0.00, 1, 'paid'),
(3, 10, 5, 0, '0', '2023-08-16', 0.00, 4400.00, 4400.00, 4400.00, 1, 'paid');

-- --------------------------------------------------------

--
-- Table structure for table `ipd_details`
--

CREATE TABLE `ipd_details` (
  `id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `height` varchar(5) DEFAULT NULL,
  `weight` varchar(5) DEFAULT NULL,
  `bp` varchar(20) DEFAULT NULL,
  `ipd_no` varchar(200) NOT NULL,
  `room` varchar(100) NOT NULL,
  `bed` varchar(100) NOT NULL,
  `bed_group_id` varchar(10) DEFAULT NULL,
  `case_type` varchar(100) NOT NULL,
  `casualty` varchar(100) NOT NULL,
  `symptoms` varchar(200) NOT NULL,
  `known_allergies` varchar(200) NOT NULL,
  `note` text NOT NULL,
  `refference` varchar(200) NOT NULL,
  `cons_doctor` int(11) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `credit_limit` varchar(100) NOT NULL,
  `tax` varchar(100) NOT NULL,
  `payment_mode` varchar(100) NOT NULL,
  `date` datetime NOT NULL,
  `discharged` varchar(200) NOT NULL DEFAULT 'no',
  `discharged_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ipd_details`
--

INSERT INTO `ipd_details` (`id`, `patient_id`, `height`, `weight`, `bp`, `ipd_no`, `room`, `bed`, `bed_group_id`, `case_type`, `casualty`, `symptoms`, `known_allergies`, `note`, `refference`, `cons_doctor`, `amount`, `credit_limit`, `tax`, `payment_mode`, `date`, `discharged`, `discharged_date`) VALUES
(1, 2, '', '', '', 'IPDN1', '', '1', '1', '', 'No', '', '', '', '', 2, '', '', '', '', '2023-08-11 18:15:00', 'yes', '2023-08-12'),
(2, 0, NULL, NULL, NULL, '', '', '', NULL, '', '', '', '', '', '', 0, '', '', '', '', '0000-00-00 00:00:00', 'no', '0000-00-00'),
(3, 1, '', '', '', 'IPDN3', '', '4', '2', '', 'No', '', '', '', '', 2, '', '', '', '', '2023-08-12 10:19:00', 'yes', '2023-08-12'),
(4, 3, '', '', '', 'IPDN4', '', '6', '3', '', 'No', '', '', '', '', 2, '', '', '', '', '2023-08-12 01:06:00', 'no', '0000-00-00'),
(5, 10, '', '', '', 'IPDN5', '', '4', '2', '', 'No', '', '', '', '', 2, '', '', '', '', '2023-08-16 13:08:00', 'yes', '2023-08-16');

-- --------------------------------------------------------

--
-- Table structure for table `ipd_prescription_basic`
--

CREATE TABLE `ipd_prescription_basic` (
  `id` int(11) NOT NULL,
  `ipd_id` int(11) NOT NULL,
  `header_note` varchar(100) NOT NULL,
  `footer_note` varchar(100) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ipd_prescription_basic`
--

INSERT INTO `ipd_prescription_basic` (`id`, `ipd_id`, `header_note`, `footer_note`, `date`) VALUES
(1, 4, '', '', '2023-08-12');

-- --------------------------------------------------------

--
-- Table structure for table `ipd_prescription_details`
--

CREATE TABLE `ipd_prescription_details` (
  `id` int(11) NOT NULL,
  `basic_id` int(11) NOT NULL,
  `ipd_id` int(11) NOT NULL,
  `medicine_category_id` int(11) NOT NULL,
  `medicine` varchar(200) NOT NULL,
  `dosage` varchar(200) NOT NULL,
  `instruction` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ipd_prescription_details`
--

INSERT INTO `ipd_prescription_details` (`id`, `basic_id`, `ipd_id`, `medicine_category_id`, `medicine`, `dosage`, `instruction`) VALUES
(1, 1, 4, 2, 'injection', '3', 'FGHFDHFGD');

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `id` int(11) NOT NULL,
  `item_category_id` int(11) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `unit` varchar(200) NOT NULL,
  `item_photo` varchar(225) DEFAULT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `item_store_id` int(11) DEFAULT NULL,
  `item_supplier_id` int(11) DEFAULT NULL,
  `quantity` int(100) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `item_category`
--

CREATE TABLE `item_category` (
  `id` int(255) NOT NULL,
  `item_category` varchar(255) NOT NULL,
  `is_active` varchar(255) NOT NULL DEFAULT 'yes',
  `description` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `item_issue`
--

CREATE TABLE `item_issue` (
  `id` int(11) NOT NULL,
  `issue_type` varchar(15) DEFAULT NULL,
  `issue_to` varchar(100) DEFAULT NULL,
  `issue_by` varchar(100) DEFAULT NULL,
  `issue_date` date DEFAULT NULL,
  `return_date` date DEFAULT NULL,
  `item_category_id` int(11) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL,
  `quantity` int(10) NOT NULL,
  `note` text NOT NULL,
  `is_returned` int(2) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `is_active` varchar(10) DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `item_stock`
--

CREATE TABLE `item_stock` (
  `id` int(11) NOT NULL,
  `item_id` int(11) DEFAULT NULL,
  `supplier_id` int(11) DEFAULT NULL,
  `symbol` varchar(10) NOT NULL DEFAULT '+',
  `store_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `purchase_price` varchar(200) NOT NULL,
  `date` date NOT NULL,
  `attachment` varchar(250) DEFAULT NULL,
  `description` text NOT NULL,
  `is_active` varchar(10) DEFAULT 'yes',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `item_store`
--

CREATE TABLE `item_store` (
  `id` int(255) NOT NULL,
  `item_store` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `item_supplier`
--

CREATE TABLE `item_supplier` (
  `id` int(255) NOT NULL,
  `item_supplier` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `contact_person_name` varchar(255) NOT NULL,
  `contact_person_phone` varchar(255) NOT NULL,
  `contact_person_email` varchar(255) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `lab`
--

CREATE TABLE `lab` (
  `id` int(11) NOT NULL,
  `lab_name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` int(11) NOT NULL,
  `language` varchar(50) DEFAULT NULL,
  `short_code` varchar(100) NOT NULL,
  `is_deleted` varchar(10) NOT NULL DEFAULT 'yes',
  `is_active` varchar(255) DEFAULT 'no',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `language`, `short_code`, `is_deleted`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Azerbaijan', '', 'no', 'no', '2017-04-06 05:08:33', '0000-00-00 00:00:00'),
(2, 'Albanian', '', 'no', 'no', '2017-04-06 05:08:33', '0000-00-00 00:00:00'),
(4, 'English', 'en', 'no', 'no', '2018-12-01 10:08:15', '0000-00-00 00:00:00'),
(5, 'Arabic', '', 'no', 'no', '2017-04-06 05:08:33', '0000-00-00 00:00:00'),
(7, 'Afrikaans', '', 'no', 'no', '2017-04-06 05:08:33', '0000-00-00 00:00:00'),
(8, 'Basque', '', 'no', 'no', '2017-04-06 05:08:33', '0000-00-00 00:00:00'),
(11, 'Bengali', '', 'no', 'no', '2017-04-06 05:08:33', '0000-00-00 00:00:00'),
(13, 'Bosnian', '', 'no', 'no', '2017-04-06 05:08:33', '0000-00-00 00:00:00'),
(14, 'Welsh', '', 'no', 'no', '2017-04-06 05:08:33', '0000-00-00 00:00:00'),
(15, 'Hungarian', '', 'no', 'no', '2017-04-06 05:08:33', '0000-00-00 00:00:00'),
(16, 'Vietnamese', '', 'no', 'no', '2017-04-06 05:08:33', '0000-00-00 00:00:00'),
(17, 'Haitian (Creole)', '', 'no', 'no', '2017-04-06 05:08:33', '0000-00-00 00:00:00'),
(18, 'Galician', '', 'no', 'no', '2017-04-06 05:08:33', '0000-00-00 00:00:00'),
(19, 'Dutch', '', 'no', 'no', '2017-04-06 05:08:33', '0000-00-00 00:00:00'),
(21, 'Greek', '', 'no', 'no', '2017-04-06 05:08:33', '0000-00-00 00:00:00'),
(22, 'Georgian', '', 'no', 'no', '2017-04-06 05:08:33', '0000-00-00 00:00:00'),
(23, 'Gujarati', '', 'no', 'no', '2017-04-06 05:08:33', '0000-00-00 00:00:00'),
(24, 'Danish', '', 'no', 'no', '2017-04-06 05:08:33', '0000-00-00 00:00:00'),
(25, 'Hebrew', '', 'no', 'no', '2017-04-06 05:08:33', '0000-00-00 00:00:00'),
(26, 'Yiddish', '', 'no', 'no', '2017-04-06 05:08:33', '0000-00-00 00:00:00'),
(27, 'Indonesian', '', 'no', 'no', '2017-04-06 05:08:33', '0000-00-00 00:00:00'),
(28, 'Irish', '', 'no', 'no', '2017-04-06 05:08:33', '0000-00-00 00:00:00'),
(29, 'Italian', 'it', 'no', 'no', '2018-12-01 10:07:03', '0000-00-00 00:00:00'),
(30, 'Icelandic', '', 'no', 'no', '2017-04-06 05:08:33', '0000-00-00 00:00:00'),
(31, 'Spanish', 'es', 'no', 'no', '2018-12-01 10:09:37', '0000-00-00 00:00:00'),
(33, 'Kannada', '', 'no', 'no', '2017-04-06 05:08:33', '0000-00-00 00:00:00'),
(34, 'Catalan', '', 'no', 'no', '2017-04-06 05:08:33', '0000-00-00 00:00:00'),
(36, 'Chinese', '', 'no', 'no', '2017-04-06 05:08:33', '0000-00-00 00:00:00'),
(37, 'Korean', '', 'no', 'no', '2017-04-06 05:08:33', '0000-00-00 00:00:00'),
(38, 'Xhosa', '', 'no', 'no', '2017-04-06 05:08:33', '0000-00-00 00:00:00'),
(39, 'Latin', '', 'no', 'no', '2017-04-06 05:08:33', '0000-00-00 00:00:00'),
(40, 'Latvian', '', 'no', 'no', '2017-04-06 05:08:33', '0000-00-00 00:00:00'),
(41, 'Lithuanian', '', 'no', 'no', '2017-04-06 05:08:33', '0000-00-00 00:00:00'),
(43, 'Malagasy', '', 'no', 'no', '2017-04-06 05:08:33', '0000-00-00 00:00:00'),
(44, 'Malay', '', 'no', 'no', '2017-04-06 05:08:33', '0000-00-00 00:00:00'),
(45, 'Malayalam', '', 'no', 'no', '2017-04-06 05:08:33', '0000-00-00 00:00:00'),
(46, 'Maltese', '', 'no', 'no', '2017-04-06 05:08:33', '0000-00-00 00:00:00'),
(47, 'Macedonian', '', 'no', 'no', '2017-04-06 05:08:33', '0000-00-00 00:00:00'),
(48, 'Maori', '', 'no', 'no', '2017-04-06 05:08:33', '0000-00-00 00:00:00'),
(49, 'Marathi', '', 'no', 'no', '2017-04-06 05:08:33', '0000-00-00 00:00:00'),
(51, 'Mongolian', '', 'no', 'no', '2017-04-06 05:08:33', '0000-00-00 00:00:00'),
(52, 'German', '', 'no', 'no', '2017-04-06 05:08:33', '0000-00-00 00:00:00'),
(53, 'Nepali', '', 'no', 'no', '2017-04-06 05:08:33', '0000-00-00 00:00:00'),
(54, 'Norwegian', '', 'no', 'no', '2017-04-06 05:08:33', '0000-00-00 00:00:00'),
(55, 'Punjabi', '', 'no', 'no', '2017-04-06 05:08:33', '0000-00-00 00:00:00'),
(57, 'Persian', '', 'no', 'no', '2017-04-06 05:08:33', '0000-00-00 00:00:00'),
(59, 'Portuguese', '', 'no', 'no', '2017-04-06 05:08:33', '0000-00-00 00:00:00'),
(60, 'Romanian', '', 'no', 'no', '2017-04-06 05:08:33', '0000-00-00 00:00:00'),
(61, 'Russian', '', 'no', 'no', '2017-04-06 05:08:33', '0000-00-00 00:00:00'),
(62, 'Cebuano', '', 'no', 'no', '2017-04-06 05:08:33', '0000-00-00 00:00:00'),
(64, 'Sinhala', '', 'no', 'no', '2017-04-06 05:08:33', '0000-00-00 00:00:00'),
(65, 'Slovakian', '', 'no', 'no', '2017-04-06 05:08:33', '0000-00-00 00:00:00'),
(66, 'Slovenian', '', 'no', 'no', '2017-04-06 05:08:33', '0000-00-00 00:00:00'),
(67, 'Swahili', '', 'no', 'no', '2017-04-06 05:08:33', '0000-00-00 00:00:00'),
(68, 'Sundanese', '', 'no', 'no', '2017-04-06 05:08:33', '0000-00-00 00:00:00'),
(70, 'Thai', '', 'no', 'no', '2017-04-06 05:08:33', '0000-00-00 00:00:00'),
(71, 'Tagalog', '', 'no', 'no', '2017-04-06 05:08:33', '0000-00-00 00:00:00'),
(72, 'Tamil', '', 'no', 'no', '2017-04-06 05:08:33', '0000-00-00 00:00:00'),
(74, 'Telugu', '', 'no', 'no', '2017-04-06 05:08:33', '0000-00-00 00:00:00'),
(75, 'Turkish', '', 'no', 'no', '2017-04-06 05:08:33', '0000-00-00 00:00:00'),
(77, 'Uzbek', '', 'no', 'no', '2017-04-06 05:08:33', '0000-00-00 00:00:00'),
(79, 'Urdu', '', 'no', 'no', '2017-04-06 05:08:33', '0000-00-00 00:00:00'),
(80, 'Finnish', '', 'no', 'no', '2017-04-06 05:08:33', '0000-00-00 00:00:00'),
(81, 'French', 'fr', 'no', 'no', '2018-12-01 10:08:47', '0000-00-00 00:00:00'),
(82, 'Hindi', '', 'no', 'no', '2017-04-06 05:08:33', '0000-00-00 00:00:00'),
(84, 'Czech', '', 'no', 'no', '2017-04-06 05:08:33', '0000-00-00 00:00:00'),
(85, 'Swedish', '', 'no', 'no', '2017-04-06 05:08:33', '0000-00-00 00:00:00'),
(86, 'Scottish', '', 'no', 'no', '2017-04-06 05:08:33', '0000-00-00 00:00:00'),
(87, 'Estonian', '', 'no', 'no', '2017-04-06 05:08:33', '0000-00-00 00:00:00'),
(88, 'Esperanto', '', 'no', 'no', '2017-04-06 05:08:33', '0000-00-00 00:00:00'),
(89, 'Javanese', '', 'no', 'no', '2017-04-06 05:08:33', '0000-00-00 00:00:00'),
(90, 'Japanese', '', 'no', 'no', '2017-04-06 05:08:33', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `leave_types`
--

CREATE TABLE `leave_types` (
  `id` int(11) NOT NULL,
  `type` varchar(200) NOT NULL,
  `is_active` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `leave_types`
--

INSERT INTO `leave_types` (`id`, `type`, `is_active`) VALUES
(1, 'CL', 'yes'),
(2, 'ML', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `medicine_bad_stock`
--

CREATE TABLE `medicine_bad_stock` (
  `id` int(11) NOT NULL,
  `pharmacy_id` int(11) NOT NULL,
  `outward_date` date NOT NULL,
  `expiry_date` varchar(200) NOT NULL,
  `batch_no` varchar(200) NOT NULL,
  `quantity` varchar(200) NOT NULL,
  `note` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `medicine_batch_details`
--

CREATE TABLE `medicine_batch_details` (
  `id` int(11) NOT NULL,
  `supplier_bill_basic_id` varchar(100) NOT NULL,
  `medicine_category_id` varchar(200) NOT NULL,
  `pharmacy_id` int(100) NOT NULL,
  `inward_date` datetime DEFAULT NULL,
  `expiry_date` varchar(100) DEFAULT NULL,
  `expiry_date_format` date NOT NULL,
  `batch_no` varchar(100) NOT NULL,
  `packing_qty` varchar(100) NOT NULL,
  `purchase_rate_packing` varchar(100) NOT NULL,
  `quantity` varchar(200) NOT NULL,
  `mrp` varchar(11) DEFAULT NULL,
  `purchase_price` varchar(200) NOT NULL,
  `sale_rate` varchar(11) DEFAULT NULL,
  `batch_amount` decimal(10,2) NOT NULL,
  `amount` varchar(100) DEFAULT NULL,
  `available_quantity` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `medicine_batch_details`
--

INSERT INTO `medicine_batch_details` (`id`, `supplier_bill_basic_id`, `medicine_category_id`, `pharmacy_id`, `inward_date`, `expiry_date`, `expiry_date_format`, `batch_no`, `packing_qty`, `purchase_rate_packing`, `quantity`, `mrp`, `purchase_price`, `sale_rate`, `batch_amount`, `amount`, `available_quantity`, `created_at`, `updated_at`) VALUES
(1, '', '', 2, '2023-08-01 00:00:00', 'Dec/2023', '2023-12-01', '562345', '12312', '122', '1233', '111', '', '100', 0.00, '546456', '1227', '2023-08-11 12:50:50', '2023-08-11 12:50:50'),
(2, '', '', 1, '2023-08-11 00:00:00', 'Dec/2023', '2023-12-01', '56542345', '341234', '1231', '121', '123', '', '12', 0.00, '3425345', '103', '2023-08-11 12:51:40', '2023-08-11 12:51:40');

-- --------------------------------------------------------

--
-- Table structure for table `medicine_category`
--

CREATE TABLE `medicine_category` (
  `id` int(11) NOT NULL,
  `medicine_category` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `medicine_category`
--

INSERT INTO `medicine_category` (`id`, `medicine_category`) VALUES
(1, 'TABLET'),
(2, 'INJECTION'),
(3, 'SYRUP'),
(4, 'GLUCOSE'),
(5, 'DISPOSAL'),
(6, 'DROPS'),
(7, 'LIQUID'),
(8, 'SPRAY'),
(9, 'CREAM');

-- --------------------------------------------------------

--
-- Table structure for table `medicine_dosage`
--

CREATE TABLE `medicine_dosage` (
  `id` int(11) NOT NULL,
  `medicine_category_id` int(11) NOT NULL,
  `dosage_form` varchar(100) NOT NULL,
  `dosage` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `medicine_dosage`
--

INSERT INTO `medicine_dosage` (`id`, `medicine_category_id`, `dosage_form`, `dosage`) VALUES
(1, 1, '', '2 TIMES'),
(2, 1, '', '3 TIMES'),
(3, 2, '', '2 TIMES'),
(4, 3, '', '3  TIMES');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `title` varchar(200) DEFAULT NULL,
  `message` text,
  `send_mail` varchar(10) DEFAULT '0',
  `send_sms` varchar(10) DEFAULT '0',
  `is_group` varchar(10) DEFAULT '0',
  `is_individual` varchar(10) DEFAULT '0',
  `is_class` int(10) NOT NULL DEFAULT '0',
  `group_list` text,
  `user_list` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `version` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `notification_roles`
--

CREATE TABLE `notification_roles` (
  `id` int(11) NOT NULL,
  `send_notification_id` int(11) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  `is_active` int(11) DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `notification_setting`
--

CREATE TABLE `notification_setting` (
  `id` int(11) NOT NULL,
  `type` varchar(100) DEFAULT NULL,
  `is_mail` varchar(10) DEFAULT '0',
  `is_sms` varchar(10) DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `opd_billing`
--

CREATE TABLE `opd_billing` (
  `id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `opd_id` int(11) NOT NULL,
  `discount` int(11) NOT NULL,
  `other_charge` varchar(200) NOT NULL,
  `date` date NOT NULL,
  `tax` decimal(15,2) NOT NULL,
  `gross_total` decimal(15,2) NOT NULL,
  `net_amount` decimal(15,2) NOT NULL,
  `total_amount` decimal(15,2) NOT NULL,
  `generated_by` int(11) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `opd_details`
--

CREATE TABLE `opd_details` (
  `id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `opd_no` varchar(100) NOT NULL,
  `appointment_date` datetime NOT NULL,
  `case_type` varchar(200) NOT NULL,
  `casualty` varchar(200) NOT NULL,
  `symptoms` varchar(200) NOT NULL,
  `bp` varchar(200) NOT NULL,
  `height` varchar(100) NOT NULL,
  `weight` varchar(100) NOT NULL,
  `known_allergies` varchar(200) NOT NULL,
  `note_remark` varchar(225) DEFAULT NULL,
  `refference` varchar(100) NOT NULL,
  `cons_doctor` int(11) NOT NULL,
  `amount` decimal(15,2) NOT NULL,
  `tax` decimal(15,2) NOT NULL,
  `payment_mode` varchar(200) NOT NULL,
  `header_note` varchar(200) NOT NULL,
  `footer_note` varchar(200) NOT NULL,
  `generated_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `opd_details`
--

INSERT INTO `opd_details` (`id`, `patient_id`, `opd_no`, `appointment_date`, `case_type`, `casualty`, `symptoms`, `bp`, `height`, `weight`, `known_allergies`, `note_remark`, `refference`, `cons_doctor`, `amount`, `tax`, `payment_mode`, `header_note`, `footer_note`, `generated_by`) VALUES
(1, 1, 'OPDN1', '2023-08-11 18:04:00', '', 'No', '', '', '', '', '', '', '', 2, 2000.00, 0.00, 'Cash', '', '', 1),
(2, 4, 'OPDN2', '2023-08-12 15:21:00', '', 'No', '', '', '', '', '', '', '', 2, 1000.00, 0.00, 'Cash', '', '<p>FGDFDG</p>', 1),
(3, 11, 'OPDN3', '2023-08-16 17:21:00', 'FEVER', 'No', '', '', '', '', '', '', '', 2, 1000.00, 0.00, 'Cash', '', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `opd_patient_charges`
--

CREATE TABLE `opd_patient_charges` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `patient_id` int(11) NOT NULL,
  `opd_id` int(11) NOT NULL,
  `charge_id` int(11) NOT NULL,
  `org_charge_id` int(11) NOT NULL,
  `apply_charge` decimal(15,2) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `opd_patient_charges`
--

INSERT INTO `opd_patient_charges` (`id`, `date`, `patient_id`, `opd_id`, `charge_id`, `org_charge_id`, `apply_charge`, `created_at`) VALUES
(1, '2023-08-09', 1, 1, 1, 0, 500.00, '2023-08-11 00:00:00'),
(2, '2023-08-12', 1, 1, 3, 0, 800.00, '2023-08-11 00:00:00'),
(3, '2023-08-12', 4, 2, 1, 0, 500.00, '2023-08-12 00:00:00'),
(4, '2023-08-12', 4, 2, 6, 0, 1000.00, '2023-08-12 00:00:00'),
(5, '2023-08-16', 11, 3, 8, 0, 600.00, '2023-08-16 00:00:00'),
(6, '2023-08-16', 11, 3, 1, 0, 500.00, '2023-08-16 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `opd_payment`
--

CREATE TABLE `opd_payment` (
  `id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `opd_id` int(11) NOT NULL,
  `paid_amount` decimal(15,2) NOT NULL,
  `balance_amount` decimal(15,2) NOT NULL,
  `total_amount` decimal(15,2) NOT NULL,
  `payment_mode` varchar(100) NOT NULL,
  `note` varchar(200) NOT NULL,
  `date` date NOT NULL,
  `document` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `opd_payment`
--

INSERT INTO `opd_payment` (`id`, `patient_id`, `opd_id`, `paid_amount`, `balance_amount`, `total_amount`, `payment_mode`, `note`, `date`, `document`) VALUES
(1, 4, 2, 2500.00, -1000.00, 1500.00, 'Cash', '', '2023-08-12', ''),
(2, 11, 3, 1100.00, 0.00, 1100.00, 'Cash', '', '2023-08-16', '');

-- --------------------------------------------------------

--
-- Table structure for table `operation_theatre`
--

CREATE TABLE `operation_theatre` (
  `id` int(11) NOT NULL,
  `bill_no` varchar(200) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `customer_type` varchar(50) DEFAULT NULL,
  `charge_id` varchar(11) DEFAULT NULL,
  `operation_name` varchar(100) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `operation_type` varchar(100) DEFAULT NULL,
  `consultant_doctor` varchar(100) DEFAULT NULL,
  `ass_consultant_1` varchar(50) DEFAULT NULL,
  `ass_consultant_2` varchar(50) DEFAULT NULL,
  `anesthetist` varchar(50) DEFAULT NULL,
  `anaethesia_type` varchar(50) DEFAULT NULL,
  `ot_technician` varchar(100) DEFAULT NULL,
  `ot_assistant` varchar(100) DEFAULT NULL,
  `result` varchar(50) DEFAULT NULL,
  `remark` varchar(255) DEFAULT NULL,
  `apply_charge` decimal(15,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `generated_by` int(11) NOT NULL,
  `height` varchar(255) DEFAULT NULL,
  `weight` varchar(255) DEFAULT NULL,
  `bp` varchar(255) DEFAULT NULL,
  `symptoms` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `organisation`
--

CREATE TABLE `organisation` (
  `id` int(11) NOT NULL,
  `organisation_name` varchar(200) NOT NULL,
  `code` varchar(50) NOT NULL,
  `contact_no` varchar(200) NOT NULL,
  `address` varchar(300) NOT NULL,
  `contact_person_name` varchar(200) NOT NULL,
  `contact_person_phone` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `organisations_charges`
--

CREATE TABLE `organisations_charges` (
  `id` int(11) NOT NULL,
  `org_id` int(11) NOT NULL,
  `charge_type` varchar(50) NOT NULL,
  `charge_id` int(11) NOT NULL,
  `org_charge` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ot_consultant_register`
--

CREATE TABLE `ot_consultant_register` (
  `id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `date` varchar(50) NOT NULL,
  `ins_date` date NOT NULL,
  `ins_time` time NOT NULL,
  `instruction` varchar(200) NOT NULL,
  `cons_doctor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `pathology`
--

CREATE TABLE `pathology` (
  `id` int(11) NOT NULL,
  `test_center_name` varchar(100) NOT NULL,
  `test_name` varchar(100) DEFAULT NULL,
  `short_name` varchar(100) DEFAULT NULL,
  `test_type` varchar(100) DEFAULT NULL,
  `pathology_category_id` varchar(11) NOT NULL,
  `unit` varchar(50) NOT NULL,
  `sub_category` varchar(50) NOT NULL,
  `report_days` varchar(50) NOT NULL,
  `method` varchar(50) NOT NULL,
  `charge_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `pathology_category`
--

CREATE TABLE `pathology_category` (
  `id` int(11) NOT NULL,
  `category_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `pathology_report`
--

CREATE TABLE `pathology_report` (
  `id` int(11) NOT NULL,
  `bill_no` varchar(200) NOT NULL,
  `pathology_id` int(11) NOT NULL,
  `patient_id` varchar(30) DEFAULT NULL,
  `customer_type` varchar(50) DEFAULT NULL,
  `patient_name` varchar(100) DEFAULT NULL,
  `consultant_doctor` varchar(10) NOT NULL,
  `reporting_date` date DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `pathology_report` varchar(255) DEFAULT NULL,
  `apply_charge` decimal(15,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `generated_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `id` int(11) NOT NULL,
  `patient_unique_id` int(11) NOT NULL,
  `admission_date` varchar(100) DEFAULT NULL,
  `patient_name` varchar(100) DEFAULT NULL,
  `age` varchar(10) NOT NULL,
  `month` varchar(200) NOT NULL,
  `image` varchar(100) DEFAULT NULL,
  `mobileno` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `gender` varchar(100) DEFAULT NULL,
  `marital_status` varchar(100) NOT NULL,
  `agent_details` varchar(50) NOT NULL,
  `blood_group` varchar(200) NOT NULL,
  `address` text NOT NULL,
  `guardian_name` varchar(100) DEFAULT NULL,
  `guardian_phone` varchar(100) DEFAULT NULL,
  `guardian_address` text,
  `guardian_email` varchar(100) NOT NULL,
  `is_active` varchar(255) DEFAULT 'no',
  `discharged` varchar(100) NOT NULL,
  `patient_type` varchar(200) NOT NULL,
  `credit_limit` varchar(50) DEFAULT NULL,
  `organisation` varchar(100) NOT NULL,
  `known_allergies` varchar(200) NOT NULL,
  `old_patient` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `disable_at` date NOT NULL,
  `note` varchar(200) NOT NULL,
  `is_ipd` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`id`, `patient_unique_id`, `admission_date`, `patient_name`, `age`, `month`, `image`, `mobileno`, `email`, `dob`, `gender`, `marital_status`, `agent_details`, `blood_group`, `address`, `guardian_name`, `guardian_phone`, `guardian_address`, `guardian_email`, `is_active`, `discharged`, `patient_type`, `credit_limit`, `organisation`, `known_allergies`, `old_patient`, `created_at`, `updated_at`, `disable_at`, `note`, `is_ipd`) VALUES
(1, 1001, NULL, 'Dwemo', '', '', 'uploads/patient_images/no_image.png', '8574215874', '', '0000-00-00', 'Male', '', '', '', '', '', NULL, NULL, '', 'yes', 'yes', '', NULL, '', '', '', '2023-08-12 06:08:30', '0000-00-00 00:00:00', '0000-00-00', '', 'yes'),
(2, 1002, NULL, 'radhe radhe', '23', '0', 'uploads/patient_images/no_image.png', '96775462345', '', '2000-08-09', 'Male', 'Married', '1', 'O-', 'fgyhdf', '', NULL, NULL, '', 'yes', 'no', '', NULL, '', 'hhhhfg', '', '2023-08-12 04:45:05', '0000-00-00 00:00:00', '0000-00-00', 'dfhdf', 'yes'),
(3, 1003, NULL, 'Deepak kumar', '28', '4', 'uploads/patient_images/3.jpg', '7260093936', '', '1994-12-12', 'Male', 'Married', '', 'B+', 'Patna azad path saristabad, Gardanibagh', 'Nandu raut', NULL, NULL, '', 'yes', 'no', '', NULL, '', '', '', '2023-08-12 08:07:05', '0000-00-00 00:00:00', '0000-00-00', 'A Mole on right chick', 'yes'),
(4, 1004, NULL, 'SOHAN', '22', '0', 'uploads/patient_images/no_image.png', '98746544646', '', '2000-08-16', 'Male', '', '', '', '', '', NULL, NULL, '', 'yes', 'no', '', NULL, '', 'FEVER', '', '2023-08-12 08:19:14', '0000-00-00 00:00:00', '0000-00-00', 'SFDGDFHG', ''),
(5, 1005, NULL, 'ashok kumar', '22', '0', 'uploads/patient_images/no_image.png', '545948+48', '', '2001-08-02', 'Male', '', '', '', '', 'golu', NULL, NULL, '', 'yes', 'no', '', NULL, '', '', '', '2023-08-12 08:47:49', '0000-00-00 00:00:00', '0000-00-00', '', ''),
(6, 1006, NULL, 'ashoke kumar', '', '', 'uploads/patient_images/no_image.png', '', '', '0000-00-00', '', '', '', '', '', '', NULL, NULL, '', 'yes', 'no', '', NULL, '', '', '', '2023-08-16 06:21:28', '0000-00-00 00:00:00', '0000-00-00', '', ''),
(7, 1007, NULL, 'ASHOK KUMAR', '', '', 'uploads/patient_images/no_image.png', '', '', '0000-00-00', '', '', '', '', '', 'RUDRA PRASAD', NULL, NULL, '', 'yes', 'no', '', NULL, '', '', '', '2023-08-16 06:22:17', '0000-00-00 00:00:00', '0000-00-00', '', ''),
(8, 1008, NULL, 'ASHOK KUMAR', '19', '04', 'uploads/patient_images/no_image.png', '914246489', '', '2004-08-10', 'Male', 'Married', '', 'A+', '', 'PRATAP KUMAR', NULL, NULL, '', 'yes', 'no', '', NULL, '', '', '', '2023-08-16 06:34:20', '0000-00-00 00:00:00', '0000-00-00', '', ''),
(9, 1009, NULL, 'rahul kumar', '', '', 'uploads/patient_images/no_image.png', '78964532431', '', '0000-00-00', 'Male', '', '', '', '', 'demo', NULL, NULL, '', 'yes', 'no', '', NULL, '', '', '', '2023-08-16 07:26:18', '0000-00-00 00:00:00', '0000-00-00', '', ''),
(10, 1010, NULL, 'dev raj', '', '', 'uploads/patient_images/no_image.png', '7987896456', '', '0000-00-00', 'Male', '', '', '', '', '', NULL, NULL, '', 'yes', 'yes', '', NULL, '', '', '', '2023-08-16 07:41:46', '0000-00-00 00:00:00', '0000-00-00', '', 'yes'),
(11, 1011, NULL, 'RAJU KUMAR', '', '', 'uploads/patient_images/no_image.png', '95646564656', '', '0000-00-00', 'Male', '', '', '', '', '', NULL, NULL, '', 'yes', 'no', '', NULL, '', '', '', '2023-08-16 07:47:17', '0000-00-00 00:00:00', '0000-00-00', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `patient_charges`
--

CREATE TABLE `patient_charges` (
  `id` int(11) NOT NULL,
  `date` varchar(50) DEFAULT NULL,
  `patient_id` int(11) DEFAULT NULL,
  `ipd_id` int(11) NOT NULL,
  `charge_id` int(11) DEFAULT NULL,
  `org_charge_id` int(11) DEFAULT NULL,
  `unit` varchar(11) NOT NULL DEFAULT '1',
  `apply_charge` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `patient_charges`
--

INSERT INTO `patient_charges` (`id`, `date`, `patient_id`, `ipd_id`, `charge_id`, `org_charge_id`, `unit`, `apply_charge`, `created_at`, `updated_at`) VALUES
(1, '2023-08-12', 2, 1, 2, 0, '5', '600', '2023-08-11 18:30:00', '2023-08-12 04:44:26'),
(2, '2023-08-12', 2, 1, 4, 0, '5', '600', '2023-08-11 18:30:00', '2023-08-12 04:44:26'),
(3, '2023-08-12', 2, 1, 6, 0, '5', '1000', '2023-08-11 18:30:00', '2023-08-12 04:44:26'),
(4, '2023-08-12', 1, 3, 3, 0, '4', '800', '2023-08-11 18:30:00', '2023-08-12 04:57:09'),
(5, '2023-08-12', 3, 4, 6, 0, '1', '1000', '2023-08-11 18:30:00', '2023-08-12 08:32:40'),
(6, '2023-08-12', 3, 4, 1, 0, '5', '500', '2023-08-11 18:30:00', '2023-08-12 08:33:12'),
(7, '2023-08-16', 10, 5, 3, 0, '5', '800', '2023-08-15 18:30:00', '2023-08-16 07:40:39'),
(8, '2023-08-16', 10, 5, 7, 0, '1', '400', '2023-08-15 18:30:00', '2023-08-16 07:40:39');

-- --------------------------------------------------------

--
-- Table structure for table `patient_timeline`
--

CREATE TABLE `patient_timeline` (
  `id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `timeline_date` date NOT NULL,
  `description` varchar(200) NOT NULL,
  `document` varchar(200) NOT NULL,
  `status` varchar(100) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `ipd_id` int(11) NOT NULL,
  `paid_amount` decimal(15,2) NOT NULL,
  `balance_amount` decimal(15,2) NOT NULL,
  `total_amount` decimal(15,2) NOT NULL,
  `payment_mode` varchar(100) NOT NULL,
  `note` varchar(200) NOT NULL,
  `date` date NOT NULL,
  `document` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `patient_id`, `ipd_id`, `paid_amount`, `balance_amount`, `total_amount`, `payment_mode`, `note`, `date`, `document`) VALUES
(1, 1, 3, 1000.00, -1000.00, 0.00, 'Cash', '', '2023-08-03', ''),
(2, 1, 3, 2200.00, 0.00, 3200.00, 'Cash', '', '2023-08-12', ''),
(3, 3, 4, 3500.00, 0.00, 3500.00, 'Cash', '', '2023-08-12', '');

-- --------------------------------------------------------

--
-- Table structure for table `payment_settings`
--

CREATE TABLE `payment_settings` (
  `id` int(11) NOT NULL,
  `payment_type` varchar(200) NOT NULL,
  `api_username` varchar(200) DEFAULT NULL,
  `api_secret_key` varchar(200) NOT NULL,
  `salt` varchar(200) NOT NULL,
  `api_publishable_key` varchar(200) NOT NULL,
  `api_password` varchar(200) DEFAULT NULL,
  `api_signature` varchar(200) DEFAULT NULL,
  `api_email` varchar(200) DEFAULT NULL,
  `paypal_demo` varchar(100) NOT NULL,
  `account_no` varchar(200) NOT NULL,
  `is_active` varchar(255) DEFAULT 'no',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `payslip_allowance`
--

CREATE TABLE `payslip_allowance` (
  `id` int(11) NOT NULL,
  `payslip_id` int(11) NOT NULL,
  `allowance_type` varchar(200) NOT NULL,
  `amount` int(11) NOT NULL,
  `staff_id` int(11) NOT NULL,
  `cal_type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `permission_category`
--

CREATE TABLE `permission_category` (
  `id` int(11) NOT NULL,
  `perm_group_id` int(11) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `short_code` varchar(100) DEFAULT NULL,
  `enable_view` int(11) DEFAULT '0',
  `enable_add` int(11) DEFAULT '0',
  `enable_edit` int(11) DEFAULT '0',
  `enable_delete` int(11) DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `permission_category`
--

INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES
(1, 1, 'Income', 'income', 1, 1, 1, 1, '0000-00-00 00:00:00'),
(2, 1, 'Income Head', 'income_head', 1, 1, 1, 1, '0000-00-00 00:00:00'),
(3, 2, 'Expense', 'expense', 1, 1, 1, 1, '0000-00-00 00:00:00'),
(4, 2, 'Expense Head', 'expense_head', 1, 1, 1, 1, '0000-00-00 00:00:00'),
(5, 2, 'Search Expense', 'search_expense', 1, 0, 0, 0, '0000-00-00 00:00:00'),
(6, 3, 'Upload Content', 'upload_content', 1, 1, 0, 1, '0000-00-00 00:00:00'),
(7, 4, 'Issue Item', 'issue_item', 1, 1, 0, 1, '0000-00-00 00:00:00'),
(8, 4, 'Item Stock', 'item_stock', 1, 1, 1, 1, '0000-00-00 00:00:00'),
(9, 4, 'Item', 'item', 1, 1, 1, 1, '0000-00-00 00:00:00'),
(10, 4, 'Store', 'store', 1, 1, 1, 1, '0000-00-00 00:00:00'),
(11, 4, 'Supplier', 'supplier', 1, 1, 1, 1, '0000-00-00 00:00:00'),
(12, 5, 'Notice Board', 'notice_board', 1, 1, 1, 1, '0000-00-00 00:00:00'),
(13, 5, 'Email / SMS', 'email_sms', 1, 0, 0, 0, '0000-00-00 00:00:00'),
(14, 5, 'Email / SMS Log', 'email_sms_log', 1, 0, 0, 0, '0000-00-00 00:00:00'),
(15, 6, 'OPD Report', 'opd_report', 1, 0, 0, 0, '0000-00-00 00:00:00'),
(16, 7, 'Languages', 'languages', 0, 1, 0, 0, '0000-00-00 00:00:00'),
(17, 7, 'General Setting', 'general_setting', 1, 0, 1, 0, '0000-00-00 00:00:00'),
(18, 7, 'Notification Setting', 'notification_setting', 1, 0, 1, 0, '0000-00-00 00:00:00'),
(19, 7, 'SMS Setting', 'sms_setting', 1, 0, 1, 0, '0000-00-00 00:00:00'),
(20, 7, 'Email Setting', 'email_setting', 1, 0, 1, 0, '0000-00-00 00:00:00'),
(21, 7, 'Front CMS Setting', 'front_cms_setting', 1, 0, 1, 0, '0000-00-00 00:00:00'),
(22, 7, 'Payment Methods', 'payment_methods', 1, 0, 1, 0, '0000-00-00 00:00:00'),
(23, 8, 'Menus', 'menus', 1, 1, 0, 1, '0000-00-00 00:00:00'),
(24, 8, 'Media Manager', 'media_manager', 1, 1, 0, 1, '0000-00-00 00:00:00'),
(25, 8, 'Banner Images', 'banner_images', 1, 1, 0, 1, '0000-00-00 00:00:00'),
(26, 8, 'Pages', 'pages', 1, 1, 1, 1, '0000-00-00 00:00:00'),
(27, 8, 'Gallery', 'gallery', 1, 1, 1, 1, '0000-00-00 00:00:00'),
(28, 8, 'Event', 'event', 1, 1, 1, 1, '0000-00-00 00:00:00'),
(29, 8, 'News', 'notice', 1, 1, 1, 1, '0000-00-00 00:00:00'),
(30, 9, 'Visitor Book', 'visitor_book', 1, 1, 1, 1, '0000-00-00 00:00:00'),
(31, 9, 'Phone Call Log', 'phone_call_log', 1, 1, 1, 1, '0000-00-00 00:00:00'),
(32, 9, 'Postal Dispatch', 'postal_dispatch', 1, 1, 1, 1, '0000-00-00 00:00:00'),
(33, 9, 'Postal Receive', 'postal_receive', 1, 1, 1, 1, '0000-00-00 00:00:00'),
(34, 9, 'Complain', 'complain', 1, 1, 1, 1, '0000-00-00 00:00:00'),
(35, 9, 'Setup Front Office', 'setup_front_office', 1, 1, 1, 1, '0000-00-00 00:00:00'),
(36, 10, 'Staff', 'staff', 1, 1, 1, 1, '0000-00-00 00:00:00'),
(37, 10, 'Disable Staff', 'disable_staff', 1, 0, 0, 0, '0000-00-00 00:00:00'),
(38, 10, 'Staff Attendance', 'staff_attendance', 1, 1, 1, 0, '0000-00-00 00:00:00'),
(39, 10, 'Staff Attendance Report', 'staff_attendance_report', 1, 0, 0, 0, '0000-00-00 00:00:00'),
(40, 10, 'Staff Payroll', 'staff_payroll', 1, 1, 0, 1, '0000-00-00 00:00:00'),
(41, 10, 'Payroll Report', 'payroll_report', 1, 0, 0, 0, '0000-00-00 00:00:00'),
(42, 11, 'Calendar To Do List', 'calendar_to_do_list', 1, 1, 1, 1, '0000-00-00 00:00:00'),
(43, 4, 'Item Category', 'item_category', 1, 1, 1, 1, '0000-00-00 00:00:00'),
(44, 10, ' Approve Leave Request', 'approve_leave_request', 1, 1, 1, 1, '0000-00-00 00:00:00'),
(45, 10, 'Apply Leave', 'apply_leave', 1, 1, 1, 1, '0000-00-00 00:00:00'),
(46, 10, 'Leave Types ', 'leave_types', 1, 1, 1, 1, '0000-00-00 00:00:00'),
(47, 10, 'Department', 'department', 1, 1, 1, 1, '0000-00-00 00:00:00'),
(48, 10, 'Designation', 'designation', 1, 1, 1, 1, '0000-00-00 00:00:00'),
(49, 12, 'Staff Role Count Widget', 'staff_role_count_widget', 1, 0, 0, 0, '0000-00-00 00:00:00'),
(50, 7, 'User Status', 'user_status', 1, 0, 0, 0, '0000-00-00 00:00:00'),
(51, 10, 'Can See Other Users Profile', 'can_see_other_users_profile', 1, 0, 0, 0, '0000-00-00 00:00:00'),
(52, 10, 'Staff Timeline', 'staff_timeline', 0, 1, 0, 1, '0000-00-00 00:00:00'),
(53, 7, 'Backup', 'backup', 1, 1, 0, 1, '0000-00-00 00:00:00'),
(54, 7, 'Restore', 'restore', 1, 0, 0, 0, '0000-00-00 00:00:00'),
(55, 13, 'OPD Patient', 'opd_patient', 1, 1, 1, 1, '0000-00-00 00:00:00'),
(56, 13, 'Prescription', 'prescription', 1, 1, 1, 1, '0000-00-00 00:00:00'),
(57, 13, 'Revisit', 'revisit', 1, 1, 1, 1, '0000-00-00 00:00:00'),
(58, 13, 'OPD Diagnosis', 'opd diagnosis', 1, 1, 1, 1, '0000-00-00 00:00:00'),
(59, 13, 'OPD Timeline', 'opd timeline', 1, 1, 1, 1, '0000-00-00 00:00:00'),
(60, 14, 'IPD Patients', 'ipd_patient', 1, 1, 1, 1, '0000-00-00 00:00:00'),
(61, 14, 'Discharged Patients', 'discharged patients', 1, 1, 1, 1, '0000-00-00 00:00:00'),
(62, 14, 'Consultant Register', 'consultant register', 1, 1, 1, 1, '0000-00-00 00:00:00'),
(63, 14, 'IPD Diagnosis', 'ipd diagnosis', 1, 1, 1, 1, '0000-00-00 00:00:00'),
(64, 14, 'IPD Timeline', 'ipd timeline', 1, 1, 1, 1, '0000-00-00 00:00:00'),
(65, 14, 'Charges', 'charges', 1, 1, 1, 1, '0000-00-00 00:00:00'),
(66, 14, 'Payment', 'payment', 1, 1, 1, 1, '0000-00-00 00:00:00'),
(67, 14, 'Bill', 'bill', 1, 1, 1, 1, '0000-00-00 00:00:00'),
(68, 15, 'Medicine', 'medicine', 1, 1, 1, 1, '0000-00-00 00:00:00'),
(69, 15, 'Add Medicine Stock', 'add_medicine_stock', 1, 1, 1, 1, '0000-00-00 00:00:00'),
(70, 15, 'Pharmacy Bill', 'pharmacy bill', 1, 1, 1, 1, '0000-00-00 00:00:00'),
(71, 16, 'Pathology Test', 'pathology test', 1, 1, 1, 1, '0000-00-00 00:00:00'),
(72, 16, 'Add Patient & Test Report', 'add_patho_patient_test_report', 1, 1, 1, 1, '0000-00-00 00:00:00'),
(73, 17, 'Radiology Test', 'radiology test', 1, 1, 1, 1, '0000-00-00 00:00:00'),
(74, 17, 'Add Patient & Test Report', 'add_radio_patient_test_reprt', 1, 1, 1, 1, '0000-00-00 00:00:00'),
(75, 12, 'IPD Income Widget', 'ipd_income_widget', 1, 0, 0, 0, '0000-00-00 00:00:00'),
(76, 12, 'OPD Income Widget', 'opd_income_widget', 1, 0, 0, 0, '0000-00-00 00:00:00'),
(77, 12, 'Pharmacy Income Widget', 'pharmacy_income_widget', 1, 0, 0, 0, '0000-00-00 00:00:00'),
(78, 12, 'Pathology Income Widget', 'pathology_income_widget', 1, 0, 0, 0, '0000-00-00 00:00:00'),
(79, 12, 'Radiology Income Widget', 'radiology_income_widget', 1, 0, 0, 0, '0000-00-00 00:00:00'),
(80, 12, 'OT Income Widget', 'ot_income_widget', 1, 0, 0, 0, '0000-00-00 00:00:00'),
(81, 12, 'Blood Bank Income Widget', 'blood_bank_income_widget', 1, 0, 0, 0, '0000-00-00 00:00:00'),
(82, 12, 'Ambulance Income Widget', 'ambulance_income_widget', 1, 0, 0, 0, '0000-00-00 00:00:00'),
(83, 18, 'OT Patient', 'ot_patient', 1, 1, 1, 1, '0000-00-00 00:00:00'),
(84, 18, 'OT Consultant Instruction', 'ot_consultant_instruction', 1, 1, 1, 1, '0000-00-00 00:00:00'),
(85, 19, 'Ambulance Call', 'ambulance_call', 1, 1, 1, 1, '0000-00-00 00:00:00'),
(86, 19, 'Ambulance', 'ambulance', 1, 1, 1, 1, '0000-00-00 00:00:00'),
(87, 20, 'Blood Bank Status', 'blood_bank_status', 1, 1, 1, 1, '0000-00-00 00:00:00'),
(88, 20, 'Blood Issue', 'blood_issue', 1, 1, 1, 1, '0000-00-00 00:00:00'),
(89, 20, 'Blood Donor', 'blood_donor', 1, 1, 1, 1, '0000-00-00 00:00:00'),
(90, 15, 'Medicine Category', 'medicine_category', 1, 1, 1, 1, '0000-00-00 00:00:00'),
(91, 17, 'Radiology Category', 'radiology category', 1, 1, 1, 1, '0000-00-00 00:00:00'),
(92, 21, 'Organisation', 'organisation', 1, 1, 1, 1, '0000-00-00 00:00:00'),
(93, 21, 'Charges', 'tpa_charges', 1, 1, 1, 1, '0000-00-00 00:00:00'),
(94, 16, 'Pathology Category', 'pathology_category', 1, 1, 1, 1, '0000-00-00 00:00:00'),
(95, 22, 'Charges', 'hospital_charges', 1, 1, 1, 1, '0000-00-00 00:00:00'),
(96, 6, 'IPD Report', 'ipd_report', 1, 0, 0, 0, '0000-00-00 00:00:00'),
(97, 6, 'Pharmacy Bill Report', 'pharmacy_bill_report', 1, 0, 0, 0, '0000-00-00 00:00:00'),
(98, 6, 'Pathology Patient Report', 'pathology_patient_report', 1, 0, 0, 0, '0000-00-00 00:00:00'),
(99, 6, 'Radiology Patient Report', 'radiology_patient_report', 1, 0, 0, 0, '0000-00-00 00:00:00'),
(100, 6, 'OT Report', 'ot_report', 1, 0, 0, 0, '0000-00-00 00:00:00'),
(101, 6, 'Blood Donor Report', 'blood_donor_report', 1, 0, 0, 0, '0000-00-00 00:00:00'),
(102, 6, 'Payroll Month Report', 'payroll_month_report', 1, 0, 0, 0, '0000-00-00 00:00:00'),
(103, 6, 'Payroll Report', 'payroll_report', 1, 0, 0, 0, '0000-00-00 00:00:00'),
(104, 6, 'Staff Attendance Report', 'staff_attendance_report', 1, 0, 0, 0, '0000-00-00 00:00:00'),
(105, 6, 'User Log', 'user_log', 1, 0, 0, 0, '0000-00-00 00:00:00'),
(106, 6, 'Patient Login Credential', 'patient_login_credential', 1, 0, 0, 0, '0000-00-00 00:00:00'),
(107, 6, 'Email / SMS Log', 'email_sms_log', 1, 0, 0, 0, '0000-00-00 00:00:00'),
(108, 12, 'Yearly Income & Expense Chart', 'yearly_income_expense_chart', 1, 0, 0, 0, '0000-00-00 00:00:00'),
(109, 12, 'Monthly Income & Expense Chart', 'monthly_income_expense_chart', 1, 0, 0, 0, '0000-00-00 00:00:00'),
(110, 13, 'OPD Prescription Print Header Footer ', 'opd_prescription_print_header_footer', 1, 1, 1, 1, '0000-00-00 00:00:00'),
(111, 14, 'Revert Generated Bill', 'revert_generated_bill', 1, 0, 0, 0, '0000-00-00 00:00:00'),
(112, 14, 'Calculate Bill', 'calculate_bill', 1, 0, 0, 0, '0000-00-00 00:00:00'),
(113, 14, 'Generate Bill & Discharge Patient', 'generate_bill_discharge_patient', 1, 0, 0, 0, '0000-00-00 00:00:00'),
(114, 14, 'Bed', 'bed', 1, 1, 1, 1, '0000-00-00 00:00:00'),
(115, 14, 'IPD Prescription Print Header Footer', 'ipd_prescription_print_header_footer', 1, 1, 1, 1, '0000-00-00 00:00:00'),
(116, 14, 'Bed Status', 'bed_status', 1, 0, 0, 0, '0000-00-00 00:00:00'),
(117, 15, 'Medicine Bad Stock', 'medicine_bad_stock', 1, 1, 0, 1, '0000-00-00 00:00:00'),
(118, 15, 'Pharmacy Bill print Header Footer', 'pharmacy_bill_print_header_footer', 1, 1, 1, 1, '0000-00-00 00:00:00'),
(119, 20, 'Donate Blood', 'donate_blood', 1, 1, 0, 1, '0000-00-00 00:00:00'),
(120, 22, 'Charge Category', 'charge_category', 1, 1, 1, 1, '0000-00-00 00:00:00'),
(121, 9, 'Appointment', 'appointment', 1, 1, 1, 1, '0000-00-00 00:00:00'),
(122, 9, 'Appointment Approve', 'appointment_approve', 1, 0, 0, 0, '0000-00-00 00:00:00'),
(123, 6, 'TPA Report', 'tpa_report', 1, 0, 0, 0, '0000-00-00 00:00:00'),
(124, 6, 'Ambulance Report', 'ambulance_report', 1, 0, 0, 0, '0000-00-00 00:00:00'),
(125, 6, 'Discharge Patient Report', 'discharge_patient_report', 1, 0, 0, 0, '0000-00-00 00:00:00'),
(126, 6, 'Appointment Report', 'appointment_report', 1, 0, 0, 0, '0000-00-00 00:00:00'),
(127, 6, 'Transaction Report', 'transaction_report', 1, 0, 0, 0, '0000-00-00 00:00:00'),
(128, 6, 'Blood Issue Report', 'blood_issue_report', 1, 0, 0, 0, '0000-00-00 00:00:00'),
(129, 6, 'Income Report', 'income_report', 1, 0, 0, 0, '0000-00-00 00:00:00'),
(130, 6, 'Expense Report', 'expense_report', 1, 0, 0, 0, '0000-00-00 00:00:00'),
(131, 23, 'Birth Record', 'birth_record', 1, 1, 1, 1, '0000-00-00 00:00:00'),
(132, 23, 'Death Record', 'death_record', 1, 1, 1, 1, '0000-00-00 00:00:00'),
(133, 9, 'Move Patient in OPD', 'move_patient_in_opd', 1, 0, 0, 0, '0000-00-00 00:00:00'),
(134, 9, 'Move Patient in IPD', 'move_patient_in_ipd', 1, 0, 0, 0, '0000-00-00 00:00:00'),
(135, 13, 'Move Patient in IPD', 'opd_move _patient_in_ipd', 1, 0, 0, 0, '0000-00-00 00:00:00'),
(136, 13, 'Manual Prescription', 'manual_prescription', 1, 0, 0, 0, '0000-00-00 00:00:00'),
(137, 14, 'Prescription ', 'ipd_prescription', 1, 1, 1, 1, '0000-00-00 00:00:00'),
(138, 13, 'Charges', 'opd_charges', 1, 1, 1, 1, '0000-00-00 00:00:00'),
(139, 13, 'Payment', 'opd_payment', 1, 1, 1, 1, '0000-00-00 00:00:00'),
(140, 13, 'Bill', 'opd_bill', 1, 1, 1, 1, '0000-00-00 00:00:00'),
(141, 15, 'Import Medicine', 'import_medicine', 1, 0, 0, 0, '0000-00-00 00:00:00'),
(142, 15, 'Medicine Purchase', 'medicine_purchase', 1, 1, 1, 1, '0000-00-00 00:00:00'),
(143, 15, 'Medicine Supplier', 'medicine_supplier', 1, 1, 1, 1, '0000-00-00 00:00:00'),
(144, 15, 'Medicine Dosage', 'medicine_dosage', 1, 1, 1, 1, '0000-00-00 00:00:00'),
(145, 22, 'Doctor OPD Charges', 'doctor_opd_charges', 1, 1, 1, 1, '0000-00-00 00:00:00'),
(146, 10, 'Staff Import', 'staff_import', 1, 0, 0, 0, '0000-00-00 00:00:00'),
(147, 24, 'Patient', 'patient', 1, 1, 1, 1, '0000-00-00 00:00:00'),
(148, 24, 'Enabled/Disabled', 'enabled_disabled', 1, 0, 0, 0, '0000-00-00 00:00:00'),
(149, 12, 'Notification Center', 'notification_center', 1, 0, 0, 0, '0000-00-00 00:00:00'),
(150, 24, 'Import', 'patient_import', 1, 0, 0, 0, '0000-00-00 00:00:00'),
(151, 23, 'Birth Print Header Footer', 'birth_print_header_footer', 1, 1, 1, 1, '0000-00-00 00:00:00'),
(152, 23, 'Custom Fields', 'birth_death_customfields', 1, 1, 1, 1, '0000-00-00 00:00:00'),
(153, 23, 'Death Print Header Footer', 'death_print_header_footer', 1, 1, 1, 1, '0000-00-00 00:00:00'),
(154, 16, 'Print Header Footer', 'pathology_print_header_footer', 1, 1, 1, 1, '0000-00-00 00:00:00'),
(155, 17, 'Print Header Footer', 'radiology_print_header_footer', 1, 1, 1, 1, '0000-00-00 00:00:00'),
(156, 18, 'Print Header Footer', 'ot_print_header_footer', 1, 1, 1, 1, '0000-00-00 00:00:00'),
(157, 20, 'Print Header Footer', 'bloodbank_print_header_footer', 1, 1, 1, 1, '0000-00-00 00:00:00'),
(158, 19, 'Print Header Footer', 'ambulance_print_header_footer', 1, 1, 1, 1, '0000-00-00 00:00:00'),
(159, 14, 'IPD Bill Print Header Footer', 'ipd_bill_print_header_footer', 1, 1, 1, 1, '0000-00-00 00:00:00'),
(160, 10, 'Print Payslip Header Footer', 'print_payslip_header_footer', 1, 1, 1, 1, '0000-00-00 00:00:00'),
(161, 6, 'Income Group Report', 'income_group_report\r\n', 1, 0, 0, 0, '0000-00-00 00:00:00'),
(162, 6, 'Expense Group Report', 'expense_group_report', 1, 0, 0, 0, '0000-00-00 00:00:00'),
(163, 1, 'Search Income', 'search_income', 1, 0, 0, 0, '0000-00-00 00:00:00'),
(164, 6, 'Inventory Stock Report', 'inventory_stock_report', 1, 0, 0, 0, '0000-00-00 00:00:00'),
(165, 6, 'Inventory Item Report', 'add_item_report', 1, 0, 0, 0, '0000-00-00 00:00:00'),
(166, 6, 'Inventory Issue Report', 'issue_inventory_report', 1, 0, 0, 0, '0000-00-00 00:00:00'),
(167, 6, 'Expiry Medicine Report', 'expiry_medicine_report', 1, 0, 0, 0, '0000-00-00 00:00:00'),
(168, 16, 'Pathology Bill', 'pathology bill', 1, 1, 1, 1, '0000-00-00 00:00:00'),
(169, 6, 'Birth Report', 'birth_report', 1, 0, 0, 0, '0000-00-00 00:00:00'),
(170, 6, 'Death Report', 'death_report', 1, 0, 0, 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `permission_group`
--

CREATE TABLE `permission_group` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `short_code` varchar(100) NOT NULL,
  `is_active` int(11) DEFAULT '0',
  `system` int(11) NOT NULL,
  `sort_order` decimal(10,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `permission_group`
--

INSERT INTO `permission_group` (`id`, `name`, `short_code`, `is_active`, `system`, `sort_order`, `created_at`) VALUES
(1, 'Income', 'income', 1, 0, 9.00, '2021-09-23 06:10:04'),
(2, 'Expense', 'expense', 1, 0, 10.00, '2021-09-23 06:10:48'),
(3, 'Download Center', 'download_center', 1, 0, 15.00, '2021-09-23 06:11:16'),
(4, 'Inventory', 'inventory', 1, 0, 16.00, '2021-09-23 06:11:56'),
(5, 'Messaging', 'communicate', 1, 0, 14.00, '2021-09-23 06:12:34'),
(6, 'Reports', 'reports', 1, 1, 19.00, '2021-09-23 06:12:59'),
(7, 'System Settings', 'system_settings', 1, 1, 18.00, '2021-09-23 06:15:33'),
(8, 'Front CMS', 'front_cms', 1, 0, 17.00, '2021-09-23 06:16:43'),
(9, 'Front Office', 'front_office', 1, 0, 12.00, '2021-09-23 06:17:24'),
(10, 'Human Resource', 'human_resource', 1, 1, 13.00, '2021-09-23 06:18:11'),
(11, 'Calendar To Do List', 'calendar_to_do_list', 1, 0, 22.00, '2021-09-23 06:19:59'),
(12, 'Dashboard and Widgets', 'dashboard_and_widgets', 1, 1, 20.00, '2021-09-23 06:20:19'),
(13, 'OPD', 'OPD', 1, 0, 1.00, '2021-09-23 06:23:26'),
(14, 'IPD', 'IPD', 1, 0, 2.00, '2021-09-23 06:24:36'),
(15, 'Pharmacy', 'pharmacy', 1, 0, 3.00, '2021-09-23 06:26:15'),
(16, 'Pathology', 'pathology', 1, 0, 4.00, '2021-09-23 06:27:22'),
(17, 'Radiology', 'radiology', 1, 0, 5.00, '2021-09-23 06:28:11'),
(18, 'Operation Theatre', 'operation_theatre', 1, 0, 6.00, '2021-09-23 06:29:41'),
(19, 'Ambulance', 'ambulance', 1, 0, 11.00, '2021-09-23 06:30:13'),
(20, 'Blood Bank', 'blood_bank', 1, 0, 7.00, '2021-09-23 06:30:39'),
(21, 'TPA Management', 'tpa_management', 1, 0, 8.00, '2021-09-23 06:31:10'),
(22, 'Hospital Charges', 'hospital_charges', 1, 1, 10.10, '2021-09-23 06:31:30'),
(23, 'Birth Death Record', 'birth_death_report', 1, 0, 12.00, '2021-09-23 06:31:54'),
(24, 'Patient', 'patient', 1, 0, 21.00, '2021-09-23 06:32:27');

-- --------------------------------------------------------

--
-- Table structure for table `pharmacy`
--

CREATE TABLE `pharmacy` (
  `id` int(11) NOT NULL,
  `medicine_name` varchar(200) DEFAULT NULL,
  `medicine_category_id` varchar(50) NOT NULL,
  `medicine_image` varchar(200) NOT NULL,
  `medicine_company` varchar(100) DEFAULT NULL,
  `medicine_composition` varchar(100) DEFAULT NULL,
  `medicine_group` varchar(100) DEFAULT NULL,
  `unit` varchar(50) DEFAULT NULL,
  `min_level` varchar(50) DEFAULT NULL,
  `reorder_level` varchar(50) DEFAULT NULL,
  `vat` varchar(50) DEFAULT NULL,
  `unit_packing` varchar(50) DEFAULT NULL,
  `supplier` varchar(50) DEFAULT NULL,
  `vat_ac` varchar(50) DEFAULT NULL,
  `note` varchar(200) NOT NULL,
  `is_active` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pharmacy`
--

INSERT INTO `pharmacy` (`id`, `medicine_name`, `medicine_category_id`, `medicine_image`, `medicine_company`, `medicine_composition`, `medicine_group`, `unit`, `min_level`, `reorder_level`, `vat`, `unit_packing`, `supplier`, `vat_ac`, `note`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'paracetamol', '1', '', 'cp pharma', '56546', 'tab', '111', '', '', '', '11111', NULL, '', '', '', '2023-08-11 12:49:07', '2023-08-11 12:49:07'),
(2, 'injection', '2', '', 'ca', '565333', 'rftyw', '3412', '', '', '', '1123', NULL, '', '', '', '2023-08-11 12:49:44', '2023-08-11 12:49:44');

-- --------------------------------------------------------

--
-- Table structure for table `pharmacy_bill_basic`
--

CREATE TABLE `pharmacy_bill_basic` (
  `id` int(11) NOT NULL,
  `bill_no` varchar(50) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `patient_id` varchar(200) NOT NULL,
  `customer_name` varchar(50) DEFAULT NULL,
  `customer_type` varchar(50) DEFAULT NULL,
  `doctor_name` varchar(50) DEFAULT NULL,
  `file` varchar(200) NOT NULL,
  `opd_ipd_no` varchar(50) DEFAULT NULL,
  `total` decimal(15,2) DEFAULT NULL,
  `discount` decimal(15,2) NOT NULL,
  `tax` decimal(15,2) NOT NULL,
  `net_amount` decimal(15,2) NOT NULL,
  `paid_amt` decimal(15,2) NOT NULL,
  `due_amt` decimal(15,2) NOT NULL,
  `note` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `generated_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pharmacy_bill_basic`
--

INSERT INTO `pharmacy_bill_basic` (`id`, `bill_no`, `date`, `patient_id`, `customer_name`, `customer_type`, `doctor_name`, `file`, `opd_ipd_no`, `total`, `discount`, `tax`, `net_amount`, `paid_amt`, `due_amt`, `note`, `created_at`, `updated_at`, `generated_by`) VALUES
(1, '1', '2023-08-16 12:05:00', '2', NULL, NULL, 'AJAY KUMAR', '', NULL, 272.00, 0.00, 0.00, 272.00, 224.00, 0.00, '', '2023-08-11 12:58:50', '2023-08-11 12:58:50', 1),
(2, '2', '2023-08-12 05:44:00', '3', 'Deepak kumar', NULL, 'Ajay Kumar', '', NULL, 120.00, 3.60, 5.82, 122.22, 122.22, 0.00, '', '2023-08-12 00:16:44', '2023-08-12 00:16:44', 1),
(3, '3', '2023-08-16 12:56:00', '9', 'rahul kumar', NULL, '', '', NULL, 224.00, 0.00, 0.00, 224.00, 224.00, 0.00, '', '2023-08-16 07:27:29', '2023-08-16 07:27:29', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pharmacy_bill_detail`
--

CREATE TABLE `pharmacy_bill_detail` (
  `id` int(11) NOT NULL,
  `pharmacy_bill_basic_id` varchar(50) NOT NULL,
  `medicine_category_id` int(11) NOT NULL,
  `medicine_name` varchar(200) NOT NULL,
  `expire_date` varchar(100) NOT NULL,
  `batch_no` varchar(200) NOT NULL,
  `quantity` varchar(100) NOT NULL,
  `sale_price` decimal(15,2) NOT NULL,
  `amount` decimal(15,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pharmacy_bill_detail`
--

INSERT INTO `pharmacy_bill_detail` (`id`, `pharmacy_bill_basic_id`, `medicine_category_id`, `medicine_name`, `expire_date`, `batch_no`, `quantity`, `sale_price`, `amount`) VALUES
(1, '1', 1, '1', 'Dec/2023', '56542345', '2', 12.00, 24.00),
(2, '1', 2, '2', 'Dec/2023', '562345', '2', 100.00, 200.00),
(3, '2', 1, '1', 'Dec/2023', '56542345', '10', 12.00, 120.00),
(4, '1', 1, '1', 'Dec/2023', '56542345', '4', 12.00, 48.00),
(5, '3', 2, '2', 'Dec/2023', '562345', '2', 100.00, 200.00),
(6, '3', 1, '1', 'Dec/2023', '56542345', '2', 12.00, 24.00);

-- --------------------------------------------------------

--
-- Table structure for table `prescription`
--

CREATE TABLE `prescription` (
  `id` int(11) NOT NULL,
  `opd_id` int(11) NOT NULL,
  `visit_id` int(11) NOT NULL,
  `medicine_category_id` int(11) NOT NULL,
  `medicine` varchar(200) NOT NULL,
  `dosage` varchar(200) NOT NULL,
  `instruction` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `prescription`
--

INSERT INTO `prescription` (`id`, `opd_id`, `visit_id`, `medicine_category_id`, `medicine`, `dosage`, `instruction`) VALUES
(1, 2, 0, 1, 'paracetamol', '2 TIMES', 'FGDDGDF');

-- --------------------------------------------------------

--
-- Table structure for table `print_setting`
--

CREATE TABLE `print_setting` (
  `id` int(11) NOT NULL,
  `print_header` varchar(300) NOT NULL,
  `print_footer` varchar(200) NOT NULL,
  `setting_for` varchar(200) NOT NULL,
  `is_active` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `print_setting`
--

INSERT INTO `print_setting` (`id`, `print_header`, `print_footer`, `setting_for`, `is_active`) VALUES
(4, 'uploads/printing/4.JPG', '', 'pharmacy', 'yes'),
(26, 'uploads/printing/26.JPG', '', 'ipdpres', 'yes'),
(27, 'uploads/printing/27.JPG', '', 'ipd', 'yes'),
(28, 'uploads/printing/28.JPG', '', 'opd', 'yes'),
(29, 'uploads/printing/29.JPG', '', 'payslip', 'yes'),
(30, 'uploads/printing/30.JPG', '', 'birth', 'yes'),
(31, 'uploads/printing/31.JPG', '', 'death', 'yes'),
(32, 'uploads/printing/32.JPG', '', 'pathology', 'yes'),
(33, 'uploads/printing/33.JPG', '', 'radiology', 'yes'),
(34, 'uploads/printing/34.JPG', '', 'ot', 'yes'),
(35, 'uploads/printing/35.JPG', '', 'bloodbank', 'yes'),
(36, 'uploads/printing/36.JPG', '', 'ambulance', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `radio`
--

CREATE TABLE `radio` (
  `id` int(11) NOT NULL,
  `test_name` varchar(100) DEFAULT NULL,
  `short_name` varchar(100) DEFAULT NULL,
  `test_type` varchar(100) DEFAULT NULL,
  `radiology_category_id` varchar(11) NOT NULL,
  `sub_category` varchar(50) NOT NULL,
  `report_days` varchar(50) NOT NULL,
  `charge_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `radiology_report`
--

CREATE TABLE `radiology_report` (
  `id` int(11) NOT NULL,
  `bill_no` varchar(200) NOT NULL,
  `radiology_id` int(11) NOT NULL,
  `patient_id` varchar(11) DEFAULT NULL,
  `customer_type` varchar(50) DEFAULT NULL,
  `patient_name` varchar(100) DEFAULT NULL,
  `consultant_doctor` varchar(10) NOT NULL,
  `reporting_date` date DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `radiology_report` varchar(255) DEFAULT NULL,
  `apply_charge` decimal(15,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `generated_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `read_notification`
--

CREATE TABLE `read_notification` (
  `id` int(11) NOT NULL,
  `student_id` int(11) DEFAULT NULL,
  `parent_id` int(10) DEFAULT NULL,
  `staff_id` int(11) DEFAULT NULL,
  `notification_id` int(11) DEFAULT NULL,
  `is_active` varchar(255) DEFAULT 'no',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `read_systemnotification`
--

CREATE TABLE `read_systemnotification` (
  `id` int(11) NOT NULL,
  `notification_id` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `is_active` varchar(200) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `slug` varchar(150) DEFAULT NULL,
  `is_active` int(11) DEFAULT '0',
  `is_system` int(1) NOT NULL DEFAULT '0',
  `is_superadmin` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `slug`, `is_active`, `is_system`, `is_superadmin`, `created_at`, `updated_at`) VALUES
(1, 'Admin', NULL, 0, 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'Nurses', NULL, 0, 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'Doctors', NULL, 0, 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'Pharmacy', NULL, 0, 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'Pathologist', NULL, 0, 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 'Radiologist', NULL, 0, 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 'Super Admin', NULL, 0, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 'Receptionist', NULL, 0, 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `roles_permissions`
--

CREATE TABLE `roles_permissions` (
  `id` int(11) NOT NULL,
  `role_id` int(11) DEFAULT NULL,
  `perm_cat_id` int(11) DEFAULT NULL,
  `can_view` int(11) DEFAULT NULL,
  `can_add` int(11) DEFAULT NULL,
  `can_edit` int(11) DEFAULT NULL,
  `can_delete` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sch_settings`
--

CREATE TABLE `sch_settings` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `address` text,
  `lang_id` int(11) DEFAULT NULL,
  `dise_code` varchar(50) DEFAULT NULL,
  `date_format` varchar(50) NOT NULL,
  `time_format` varchar(20) DEFAULT '24-hour',
  `currency` varchar(50) NOT NULL,
  `currency_symbol` varchar(50) NOT NULL,
  `is_rtl` varchar(10) DEFAULT 'disabled',
  `timezone` varchar(30) DEFAULT 'UTC',
  `session_id` int(11) DEFAULT NULL,
  `start_month` varchar(40) NOT NULL,
  `image` varchar(100) DEFAULT NULL,
  `mini_logo` varchar(200) NOT NULL,
  `theme` varchar(200) NOT NULL DEFAULT 'default.jpg',
  `credit_limit` varchar(255) DEFAULT NULL,
  `opd_record_month` varchar(50) DEFAULT NULL,
  `is_active` varchar(255) DEFAULT 'no',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `cron_secret_key` varchar(100) NOT NULL,
  `fee_due_days` int(3) DEFAULT '0',
  `doctor_restriction` varchar(100) NOT NULL,
  `superadmin_restriction` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sch_settings`
--

INSERT INTO `sch_settings` (`id`, `name`, `email`, `phone`, `address`, `lang_id`, `dise_code`, `date_format`, `time_format`, `currency`, `currency_symbol`, `is_rtl`, `timezone`, `session_id`, `start_month`, `image`, `mini_logo`, `theme`, `credit_limit`, `opd_record_month`, `is_active`, `created_at`, `updated_at`, `cron_secret_key`, `fee_due_days`, `doctor_restriction`, `superadmin_restriction`) VALUES
(0, 'KAILASH NURSING HOME', 'kailashnursinghome@gmail.com', '87891 94603', 'Ram Lakhan Mahto Road Old Jakkanpur  PATNA-800001', 4, 'CH102', 'd/m/Y', '12-hour', 'INR', '₹', 'disabled', 'Asia/Kolkata', NULL, '', '0.jpeg', '0mini_logo.jpeg', 'blue.jpg', '5000000', '1', 'no', '2023-08-12 05:52:40', '0000-00-00 00:00:00', 'amtB7G8rdMF9KftgQW50HTFe4', 60, 'disabled', 'enabled');

-- --------------------------------------------------------

--
-- Table structure for table `send_notification`
--

CREATE TABLE `send_notification` (
  `id` int(11) NOT NULL,
  `title` varchar(50) DEFAULT NULL,
  `publish_date` date DEFAULT NULL,
  `date` date DEFAULT NULL,
  `message` text,
  `visible_student` varchar(10) NOT NULL DEFAULT 'no',
  `visible_staff` varchar(10) NOT NULL DEFAULT 'no',
  `visible_parent` varchar(10) NOT NULL DEFAULT 'no',
  `created_by` varchar(60) DEFAULT NULL,
  `created_id` int(11) DEFAULT NULL,
  `is_active` varchar(255) DEFAULT 'no',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sms_config`
--

CREATE TABLE `sms_config` (
  `id` int(11) NOT NULL,
  `type` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `api_id` varchar(100) NOT NULL,
  `authkey` varchar(100) NOT NULL,
  `senderid` varchar(100) NOT NULL,
  `contact` text,
  `username` varchar(150) DEFAULT NULL,
  `url` varchar(150) DEFAULT NULL,
  `password` varchar(150) DEFAULT NULL,
  `is_active` varchar(255) DEFAULT 'disabled',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `source`
--

CREATE TABLE `source` (
  `id` int(11) NOT NULL,
  `source` varchar(100) NOT NULL,
  `description` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `source`
--

INSERT INTO `source` (`id`, `source`, `description`) VALUES
(1, 'PATIENT', ''),
(2, 'STAFF', ''),
(3, 'AGENT', ''),
(4, 'UNKNOWN', ''),
(5, 'NURSE', ''),
(6, 'STAFF', '');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id` int(11) NOT NULL,
  `employee_id` varchar(200) NOT NULL,
  `department` varchar(100) NOT NULL,
  `designation` varchar(100) NOT NULL,
  `qualification` varchar(200) NOT NULL,
  `work_exp` varchar(200) NOT NULL,
  `specialization` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `surname` varchar(200) NOT NULL,
  `father_name` varchar(200) NOT NULL,
  `mother_name` varchar(200) NOT NULL,
  `contact_no` varchar(200) NOT NULL,
  `emergency_contact_no` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `dob` date NOT NULL,
  `marital_status` varchar(100) NOT NULL,
  `date_of_joining` date NOT NULL,
  `date_of_leaving` date NOT NULL,
  `local_address` varchar(300) NOT NULL,
  `permanent_address` varchar(200) NOT NULL,
  `note` varchar(200) NOT NULL,
  `image` varchar(200) NOT NULL,
  `password` varchar(250) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `blood_group` varchar(100) NOT NULL,
  `account_title` varchar(200) NOT NULL,
  `bank_account_no` varchar(200) NOT NULL,
  `bank_name` varchar(200) NOT NULL,
  `ifsc_code` varchar(200) NOT NULL,
  `bank_branch` varchar(100) NOT NULL,
  `payscale` varchar(200) NOT NULL,
  `basic_salary` varchar(200) NOT NULL,
  `epf_no` varchar(200) NOT NULL,
  `contract_type` varchar(100) NOT NULL,
  `shift` varchar(100) NOT NULL,
  `location` varchar(100) NOT NULL,
  `facebook` varchar(200) NOT NULL,
  `twitter` varchar(200) NOT NULL,
  `linkedin` varchar(200) NOT NULL,
  `instagram` varchar(200) NOT NULL,
  `resume` varchar(200) NOT NULL,
  `joining_letter` varchar(200) NOT NULL,
  `resignation_letter` varchar(200) NOT NULL,
  `other_document_name` varchar(200) NOT NULL,
  `other_document_file` varchar(200) NOT NULL,
  `user_id` int(11) NOT NULL,
  `is_active` int(11) NOT NULL,
  `verification_code` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `employee_id`, `department`, `designation`, `qualification`, `work_exp`, `specialization`, `name`, `surname`, `father_name`, `mother_name`, `contact_no`, `emergency_contact_no`, `email`, `dob`, `marital_status`, `date_of_joining`, `date_of_leaving`, `local_address`, `permanent_address`, `note`, `image`, `password`, `gender`, `blood_group`, `account_title`, `bank_account_no`, `bank_name`, `ifsc_code`, `bank_branch`, `payscale`, `basic_salary`, `epf_no`, `contract_type`, `shift`, `location`, `facebook`, `twitter`, `linkedin`, `instagram`, `resume`, `joining_letter`, `resignation_letter`, `other_document_name`, `other_document_file`, `user_id`, `is_active`, `verification_code`) VALUES
(1, '10001', 'select', '7', '', '', '', 'KAILASH NURSING HOME', '', '', '', '', '', 'admin@gmail.com', '1970-01-01', 'Single', '1970-01-01', '0000-00-00', '', '', '', '1.jpeg', '$2y$10$8TcYWUkFvlpxg2q/bbajiuB.mHSll7HWjx0fN85Nb2DjvGLz5./7m', 'Male', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Other Document', '', 0, 1, ''),
(2, 'DOC01', '2', '1', '', '', '', 'AJAY', 'KUMAR', 'ARVIND PRASAD', '', '9867865443', '9867865443', 'ajay@gmail.com', '2000-08-09', 'Married', '0000-00-00', '0000-00-00', 'dfgdf', 'gdfgdfg', '', '2.jpg', '$2y$10$YkSKg4NizyzNN/Wa1iRBweBmG53MImesCFpYT4/Zp6wlfRnf4RQIa', 'Male', 'A+', 'ajay', '7856757456', 'sbi', 'SBIN0006575', 'PATNA', '', '50000', '', 'permanent', 'all', 'patna', '', '', '', '', '', '', '', '', '', 0, 1, ''),
(3, 'REC01', '7', '3', '', '', '', 'VARSA', 'MISHRA', 'DEMO', 'DEMMO', '89754634543', '89754634543', 'FGDSFGSDF@GMAIL.COM', '2000-08-23', 'Single', '0000-00-00', '0000-00-00', 'JHJHJHJHJHJHJH', 'JHFJHHHHHDF', '', '3.jpg', '$2y$10$S5MYgzJHHtF.J.mhKpPo8OWL1hOVDRz8tk/Fbx8fz.56yqAbosKcK', 'Female', 'B+', '', '', '', '', '', '', '20000', '', 'permanent', 'ALL', 'PATNA', '', '', '', '', '', '', '', '', '', 0, 1, ''),
(4, 'NUR01', '3', '2', '', '', '', 'RIYA', 'SHARMA', 'DEMO', 'DEMMMO', '7895034534', '7895034534', 'riya@gmail.com', '2000-08-23', 'Single', '0000-00-00', '0000-00-00', 'nfgh', 'fgsdfgdf', '', '4.jpg', '$2y$10$gIsTCAZxyKX2XaKEGj/rLuI.jxOIf1FtvzdZLjGNterzbj5TT82Lm', 'Female', 'O-', '', '', '', '', '', '', '25000', '', 'permanent', 'all', 'pp', '', '', '', '', '', '', '', '', '', 0, 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `staff_attendance`
--

CREATE TABLE `staff_attendance` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `staff_id` int(11) NOT NULL,
  `staff_attendance_type_id` int(11) NOT NULL,
  `remark` varchar(200) NOT NULL,
  `is_active` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `staff_attendance_type`
--

CREATE TABLE `staff_attendance_type` (
  `id` int(11) NOT NULL,
  `type` varchar(200) NOT NULL,
  `key_value` varchar(200) NOT NULL,
  `is_active` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `staff_attendance_type`
--

INSERT INTO `staff_attendance_type` (`id`, `type`, `key_value`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Present', '<b class=\"text text-success\">P</b>', 'yes', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'Late', '<b class=\"text text-warning\">L</b>', 'yes', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'Absent', '<b class=\"text text-danger\">A</b>', 'yes', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'Half Day', '<b class=\"text text-warning\">F</b>', 'yes', '2018-05-07 01:56:16', '0000-00-00 00:00:00'),
(5, 'Holiday', 'H', 'yes', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `staff_designation`
--

CREATE TABLE `staff_designation` (
  `id` int(11) NOT NULL,
  `designation` varchar(200) NOT NULL,
  `is_active` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `staff_designation`
--

INSERT INTO `staff_designation` (`id`, `designation`, `is_active`) VALUES
(1, 'DOCTOR', 'yes'),
(2, 'NURSE', 'yes'),
(3, 'RECEPTIONIST', 'yes'),
(4, 'GUARD', 'yes'),
(5, 'ACCOUNTANT', 'yes'),
(6, 'PHARMASIST', 'yes'),
(7, 'ADMIN', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `staff_leave_details`
--

CREATE TABLE `staff_leave_details` (
  `id` int(11) NOT NULL,
  `staff_id` int(11) NOT NULL,
  `leave_type_id` int(11) NOT NULL,
  `alloted_leave` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `staff_leave_details`
--

INSERT INTO `staff_leave_details` (`id`, `staff_id`, `leave_type_id`, `alloted_leave`) VALUES
(1, 2, 1, '12'),
(2, 2, 2, '12'),
(3, 3, 1, '12'),
(4, 3, 2, '12'),
(5, 4, 1, '12'),
(6, 4, 2, '12'),
(7, 1, 1, ''),
(8, 1, 2, '');

-- --------------------------------------------------------

--
-- Table structure for table `staff_leave_request`
--

CREATE TABLE `staff_leave_request` (
  `id` int(11) NOT NULL,
  `staff_id` int(11) NOT NULL,
  `leave_type_id` int(11) NOT NULL,
  `leave_from` date NOT NULL,
  `leave_to` date NOT NULL,
  `leave_days` int(11) NOT NULL,
  `employee_remark` varchar(200) NOT NULL,
  `admin_remark` varchar(200) NOT NULL,
  `status` varchar(100) NOT NULL,
  `applied_by` varchar(200) NOT NULL,
  `document_file` varchar(200) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `staff_payroll`
--

CREATE TABLE `staff_payroll` (
  `id` int(11) NOT NULL,
  `basic_salary` int(11) NOT NULL,
  `pay_scale` varchar(200) NOT NULL,
  `grade` varchar(50) NOT NULL,
  `is_active` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `staff_payslip`
--

CREATE TABLE `staff_payslip` (
  `id` int(11) NOT NULL,
  `staff_id` int(11) NOT NULL,
  `basic` int(11) NOT NULL,
  `total_allowance` int(11) NOT NULL,
  `total_deduction` int(11) NOT NULL,
  `leave_deduction` int(11) NOT NULL,
  `tax` decimal(15,2) NOT NULL,
  `net_salary` decimal(15,2) NOT NULL,
  `status` varchar(100) NOT NULL,
  `month` varchar(200) NOT NULL,
  `year` varchar(200) NOT NULL,
  `payment_mode` varchar(200) NOT NULL,
  `payment_date` date NOT NULL,
  `remark` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `staff_roles`
--

CREATE TABLE `staff_roles` (
  `id` int(11) NOT NULL,
  `role_id` int(11) DEFAULT NULL,
  `staff_id` int(11) DEFAULT NULL,
  `is_active` int(11) DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `staff_roles`
--

INSERT INTO `staff_roles` (`id`, `role_id`, `staff_id`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, '2022-06-13 07:05:15', '0000-00-00 00:00:00'),
(2, 3, 2, 0, '2023-08-11 12:06:20', '0000-00-00 00:00:00'),
(3, 8, 3, 0, '2023-08-11 12:10:00', '0000-00-00 00:00:00'),
(4, 2, 4, 0, '2023-08-11 12:12:15', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `staff_timeline`
--

CREATE TABLE `staff_timeline` (
  `id` int(11) NOT NULL,
  `staff_id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `timeline_date` date NOT NULL,
  `description` varchar(300) NOT NULL,
  `document` varchar(200) NOT NULL,
  `status` varchar(200) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `supplier_bill_basic`
--

CREATE TABLE `supplier_bill_basic` (
  `id` int(11) NOT NULL,
  `purchase_no` varchar(200) NOT NULL,
  `date` varchar(200) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `supplier_name` varchar(200) NOT NULL,
  `file` varchar(200) NOT NULL,
  `total` varchar(200) NOT NULL,
  `tax` varchar(200) NOT NULL,
  `discount` varchar(200) NOT NULL,
  `net_amount` varchar(200) NOT NULL,
  `note` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `supplier_bill_detail`
--

CREATE TABLE `supplier_bill_detail` (
  `id` int(11) NOT NULL,
  `supplier_bill_basic_id` varchar(200) NOT NULL,
  `medicine_category_id` varchar(200) NOT NULL,
  `medicine_name` varchar(200) NOT NULL,
  `expire_date` varchar(100) NOT NULL,
  `batch_no` varchar(200) NOT NULL,
  `quantity` varchar(100) NOT NULL,
  `purchase_price` varchar(200) NOT NULL,
  `mrp` varchar(200) NOT NULL,
  `sale_price` varchar(200) NOT NULL,
  `amount` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `supplier_category`
--

CREATE TABLE `supplier_category` (
  `id` int(11) NOT NULL,
  `supplier_category` varchar(200) NOT NULL,
  `contact` varchar(200) NOT NULL,
  `supplier_person` varchar(200) NOT NULL,
  `supplier_person_contact` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `supplier_category`
--

INSERT INTO `supplier_category` (`id`, `supplier_category`, `contact`, `supplier_person`, `supplier_person_contact`, `address`) VALUES
(1, 'C PHARMA', '8765465435', 'AKSHAY AANAND', 'DFSGSDFG', 'PATNA');

-- --------------------------------------------------------

--
-- Table structure for table `system_notification`
--

CREATE TABLE `system_notification` (
  `id` int(11) NOT NULL,
  `notification_title` varchar(200) NOT NULL,
  `notification_type` varchar(200) NOT NULL,
  `notification_desc` varchar(200) NOT NULL,
  `notification_for` varchar(200) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `is_active` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `system_notification`
--

INSERT INTO `system_notification` (`id`, `notification_title`, `notification_type`, `notification_desc`, `notification_for`, `receiver_id`, `date`, `is_active`) VALUES
(1, 'Appointment Created', 'appointment', 'Appointment has been created for <a href=\'http://kailashnursing.com/patient/dashboard/appointment\'>anil</a>', 'Patient', 0, '2023-08-11 17:54:11', 'yes'),
(2, 'Appointment Created', 'appointment', 'Appointment has been created for <a href=\'http://kailashnursing.com/admin/systemnotification/moveappointment/1\'>anil</a>', 'Super Admin', 0, '2023-08-11 17:54:11', 'yes'),
(3, 'Appointment Created', 'appointment', 'Appointment has been created for <a href=\'http://kailashnursing.com/patient/dashboard/appointment\'>alok</a>', 'Patient', 0, '2023-08-11 17:54:45', 'yes'),
(4, 'Appointment Created', 'appointment', 'Appointment has been created for <a href=\'http://kailashnursing.com/admin/systemnotification/moveappointment/2\'>alok</a>', 'Super Admin', 0, '2023-08-11 17:54:45', 'yes'),
(5, 'Appointment Created', 'appointment', 'Appointment has been created for <a href=\'https://kailashnursing.com/patient/dashboard/appointment\'>Dwemo</a>', 'Patient', 0, '2023-08-11 18:00:33', 'yes'),
(6, 'Appointment Created', 'appointment', 'Appointment has been created for <a href=\'https://kailashnursing.com/admin/systemnotification/moveappointment/3\'>Dwemo</a>', 'Super Admin', 0, '2023-08-11 18:00:33', 'yes'),
(7, 'Appointment Approved', 'appointment', 'Appointment has been approved for <a href=\'https://kailashnursing.com/patient/dashboard/appointment\'>Dwemo</a>', 'Patient', 0, '2023-08-11 18:00:44', 'yes'),
(8, 'Appointment Approved', 'appointment', 'Appointment has been approved for <a href=\'https://kailashnursing.com/admin/systemnotification/moveappointment/3\'>Dwemo</a>', 'Super Admin', 0, '2023-08-11 18:00:44', 'yes'),
(9, 'Appointment Approved', 'appointment', 'Appointment has been approved for <a href=\'https://kailashnursing.com/admin/systemnotification/moveappointment/3\'>Dwemo</a>', 'Doctor', 2, '2023-08-11 18:00:44', 'yes'),
(10, 'Appointment Created', 'appointment', 'Appointment has been created for <a href=\'https://kailashnursing.com/patient/dashboard/appointment\'>dsgdfg</a>', 'Patient', 0, '2023-08-11 18:01:27', 'yes'),
(11, 'Appointment Created', 'appointment', 'Appointment has been created for <a href=\'https://kailashnursing.com/admin/systemnotification/moveappointment/4\'>dsgdfg</a>', 'Super Admin', 0, '2023-08-11 18:01:27', 'yes'),
(12, 'OPD Visit Created', 'opd', 'OPD has been created with <a href=\'https://kailashnursing.com/patient/dashboard/profile\'>OPDN1</a>', 'Patient', 1, '2023-08-11 18:05:19', 'yes'),
(13, 'OPD Visit Created', 'opd', 'OPD has been created with <a href=\'https://kailashnursing.com/admin/systemnotification/moveopdnotification/1/1\'>OPDN1</a>', 'Super Admin', 0, '2023-08-11 18:05:19', 'yes'),
(14, 'OPD Visit Created', 'opd', 'OPD has been created with <a href=\'https://kailashnursing.com/admin/systemnotification/moveopdnotification/1/1\'>OPDN1</a>', 'Doctor', 2, '2023-08-11 18:05:19', 'yes'),
(15, 'Appointment Created', 'appointment', 'Appointment has been created for <a href=\'http://kailashnursing.com/patient/dashboard/appointment\'>radhe radhe</a>', 'Patient', 0, '2023-08-11 18:14:13', 'yes'),
(16, 'Appointment Created', 'appointment', 'Appointment has been created for <a href=\'http://kailashnursing.com/admin/systemnotification/moveappointment/5\'>radhe radhe</a>', 'Super Admin', 0, '2023-08-11 18:14:13', 'yes'),
(17, 'Appointment Approved', 'appointment', 'Appointment has been approved for <a href=\'http://kailashnursing.com/patient/dashboard/appointment\'>radhe radhe</a>', 'Patient', 0, '2023-08-11 18:14:22', 'yes'),
(18, 'Appointment Approved', 'appointment', 'Appointment has been approved for <a href=\'http://kailashnursing.com/admin/systemnotification/moveappointment/5\'>radhe radhe</a>', 'Super Admin', 0, '2023-08-11 18:14:22', 'yes'),
(19, 'Appointment Approved', 'appointment', 'Appointment has been approved for <a href=\'http://kailashnursing.com/admin/systemnotification/moveappointment/5\'>radhe radhe</a>', 'Doctor', 2, '2023-08-11 18:14:22', 'yes'),
(20, 'IPD Visit Created', 'ipd', 'IPD has been created with <a href=\'http://kailashnursing.com/patient/dashboard/ipdprofile\'>IPDN1</a>', 'Patient', 2, '2023-08-11 18:16:14', 'yes'),
(21, 'IPD Visit Created', 'ipd', 'IPD has been created with <a href=\'http://kailashnursing.com/admin/systemnotification/moveipdnotification/2/1\'>IPDN1</a>', 'Super Admin', 0, '2023-08-11 18:16:14', 'yes'),
(22, 'IPD Visit Created', 'ipd', 'IPD has been created with <a href=\'http://kailashnursing.com/admin/systemnotification/moveipdnotification/2/1\'>IPDN1</a>', 'Doctor', 2, '2023-08-11 18:16:14', 'yes'),
(23, 'IPD Visit Created', 'ipd', 'IPD has been created with <a href=\'http://kailashnursing.com/patient/dashboard/ipdprofile\'>IPDN3</a>', 'Patient', 1, '2023-08-12 10:19:50', 'yes'),
(24, 'IPD Visit Created', 'ipd', 'IPD has been created with <a href=\'http://kailashnursing.com/admin/systemnotification/moveipdnotification/1/3\'>IPDN3</a>', 'Super Admin', 0, '2023-08-12 10:19:50', 'yes'),
(25, 'IPD Visit Created', 'ipd', 'IPD has been created with <a href=\'http://kailashnursing.com/admin/systemnotification/moveipdnotification/1/3\'>IPDN3</a>', 'Doctor', 2, '2023-08-12 10:19:50', 'yes'),
(26, 'Appointment Created', 'appointment', 'Appointment has been created for <a href=\'https://kailashnursing.com/patient/dashboard/appointment\'>Deepak kumar</a>', 'Patient', 3, '2023-08-12 13:35:48', 'yes'),
(27, 'Appointment Created', 'appointment', 'Appointment has been created for <a href=\'https://kailashnursing.com/admin/systemnotification/moveappointment/6\'>Deepak kumar</a>', 'Super Admin', 0, '2023-08-12 13:35:48', 'yes'),
(28, 'Appointment Approved', 'appointment', 'Appointment has been approved for <a href=\'https://kailashnursing.com/patient/dashboard/appointment\'>Deepak kumar</a>', 'Patient', 3, '2023-08-12 13:36:07', 'yes'),
(29, 'Appointment Approved', 'appointment', 'Appointment has been approved for <a href=\'https://kailashnursing.com/admin/systemnotification/moveappointment/6\'>Deepak kumar</a>', 'Super Admin', 0, '2023-08-12 13:36:07', 'yes'),
(30, 'Appointment Approved', 'appointment', 'Appointment has been approved for <a href=\'https://kailashnursing.com/admin/systemnotification/moveappointment/6\'>Deepak kumar</a>', 'Doctor', 2, '2023-08-12 13:36:07', 'yes'),
(31, 'IPD Visit Created', 'ipd', 'IPD has been created with <a href=\'https://kailashnursing.com/patient/dashboard/ipdprofile\'>IPDN4</a>', 'Patient', 3, '2023-08-12 13:37:05', 'yes'),
(32, 'IPD Visit Created', 'ipd', 'IPD has been created with <a href=\'https://kailashnursing.com/admin/systemnotification/moveipdnotification/3/4\'>IPDN4</a>', 'Super Admin', 0, '2023-08-12 13:37:05', 'yes'),
(33, 'IPD Visit Created', 'ipd', 'IPD has been created with <a href=\'https://kailashnursing.com/admin/systemnotification/moveipdnotification/3/4\'>IPDN4</a>', 'Doctor', 2, '2023-08-12 13:37:05', 'yes'),
(34, 'Appointment Created', 'appointment', 'Appointment has been created for <a href=\'https://kailashnursing.com/patient/dashboard/appointment\'>SOHAN</a>', 'Patient', 0, '2023-08-12 13:48:16', 'yes'),
(35, 'Appointment Created', 'appointment', 'Appointment has been created for <a href=\'https://kailashnursing.com/admin/systemnotification/moveappointment/7\'>SOHAN</a>', 'Super Admin', 0, '2023-08-12 13:48:16', 'yes'),
(36, 'Appointment Approved', 'appointment', 'Appointment has been approved for <a href=\'https://kailashnursing.com/patient/dashboard/appointment\'>SOHAN</a>', 'Patient', 0, '2023-08-12 13:48:28', 'yes'),
(37, 'Appointment Approved', 'appointment', 'Appointment has been approved for <a href=\'https://kailashnursing.com/admin/systemnotification/moveappointment/7\'>SOHAN</a>', 'Super Admin', 0, '2023-08-12 13:48:28', 'yes'),
(38, 'Appointment Approved', 'appointment', 'Appointment has been approved for <a href=\'https://kailashnursing.com/admin/systemnotification/moveappointment/7\'>SOHAN</a>', 'Doctor', 2, '2023-08-12 13:48:28', 'yes'),
(39, 'OPD Visit Created', 'opd', 'OPD has been created with <a href=\'https://kailashnursing.com/patient/dashboard/profile\'>OPDN2</a>', 'Patient', 4, '2023-08-12 13:50:05', 'yes'),
(40, 'OPD Visit Created', 'opd', 'OPD has been created with <a href=\'https://kailashnursing.com/admin/systemnotification/moveopdnotification/4/2\'>OPDN2</a>', 'Super Admin', 0, '2023-08-12 13:50:05', 'yes'),
(41, 'OPD Visit Created', 'opd', 'OPD has been created with <a href=\'https://kailashnursing.com/admin/systemnotification/moveopdnotification/4/2\'>OPDN2</a>', 'Doctor', 2, '2023-08-12 13:50:05', 'yes'),
(42, 'Appointment Created', 'appointment', 'Appointment has been created for <a href=\'https://kailashnursing.com/patient/dashboard/appointment\'>dev raj</a>', 'Patient', 0, '2023-08-16 13:02:15', 'yes'),
(43, 'Appointment Created', 'appointment', 'Appointment has been created for <a href=\'https://kailashnursing.com/admin/systemnotification/moveappointment/8\'>dev raj</a>', 'Super Admin', 0, '2023-08-16 13:02:15', 'yes'),
(44, 'Appointment Approved', 'appointment', 'Appointment has been approved for <a href=\'https://kailashnursing.com/patient/dashboard/appointment\'>dev raj</a>', 'Patient', 0, '2023-08-16 13:02:29', 'yes'),
(45, 'Appointment Approved', 'appointment', 'Appointment has been approved for <a href=\'https://kailashnursing.com/admin/systemnotification/moveappointment/8\'>dev raj</a>', 'Super Admin', 0, '2023-08-16 13:02:29', 'yes'),
(46, 'Appointment Approved', 'appointment', 'Appointment has been approved for <a href=\'https://kailashnursing.com/admin/systemnotification/moveappointment/8\'>dev raj</a>', 'Doctor', 2, '2023-08-16 13:02:29', 'yes'),
(47, 'IPD Visit Created', 'ipd', 'IPD has been created with <a href=\'https://kailashnursing.com/patient/dashboard/ipdprofile\'>IPDN5</a>', 'Patient', 10, '2023-08-16 13:09:06', 'yes'),
(48, 'IPD Visit Created', 'ipd', 'IPD has been created with <a href=\'https://kailashnursing.com/admin/systemnotification/moveipdnotification/10/5\'>IPDN5</a>', 'Super Admin', 0, '2023-08-16 13:09:06', 'yes'),
(49, 'IPD Visit Created', 'ipd', 'IPD has been created with <a href=\'https://kailashnursing.com/admin/systemnotification/moveipdnotification/10/5\'>IPDN5</a>', 'Doctor', 2, '2023-08-16 13:09:06', 'yes'),
(50, 'Appointment Created', 'appointment', 'Appointment has been created for <a href=\'https://kailashnursing.com/patient/dashboard/appointment\'>RAJU KUMAR</a>', 'Patient', 0, '2023-08-16 13:16:02', 'yes'),
(51, 'Appointment Created', 'appointment', 'Appointment has been created for <a href=\'https://kailashnursing.com/admin/systemnotification/moveappointment/9\'>RAJU KUMAR</a>', 'Super Admin', 0, '2023-08-16 13:16:02', 'yes'),
(52, 'Appointment Approved', 'appointment', 'Appointment has been approved for <a href=\'https://kailashnursing.com/patient/dashboard/appointment\'>RAJU KUMAR</a>', 'Patient', 0, '2023-08-16 13:16:22', 'yes'),
(53, 'Appointment Approved', 'appointment', 'Appointment has been approved for <a href=\'https://kailashnursing.com/admin/systemnotification/moveappointment/9\'>RAJU KUMAR</a>', 'Super Admin', 0, '2023-08-16 13:16:22', 'yes'),
(54, 'Appointment Approved', 'appointment', 'Appointment has been approved for <a href=\'https://kailashnursing.com/admin/systemnotification/moveappointment/9\'>RAJU KUMAR</a>', 'Doctor', 2, '2023-08-16 13:16:22', 'yes'),
(55, 'OPD Visit Created', 'opd', 'OPD has been created with <a href=\'https://kailashnursing.com/patient/dashboard/profile\'>OPDN3</a>', 'Patient', 11, '2023-08-16 13:18:15', 'yes'),
(56, 'OPD Visit Created', 'opd', 'OPD has been created with <a href=\'https://kailashnursing.com/admin/systemnotification/moveopdnotification/11/3\'>OPDN3</a>', 'Super Admin', 0, '2023-08-16 13:18:15', 'yes'),
(57, 'OPD Visit Created', 'opd', 'OPD has been created with <a href=\'https://kailashnursing.com/admin/systemnotification/moveopdnotification/11/3\'>OPDN3</a>', 'Doctor', 2, '2023-08-16 13:18:15', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `test_type_report`
--

CREATE TABLE `test_type_report` (
  `id` int(11) NOT NULL,
  `radiology_id` int(11) NOT NULL,
  `type` varchar(100) DEFAULT NULL,
  `test_name` varchar(100) DEFAULT NULL,
  `reporting_date` date DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `test_report` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tpa_doctorcharges`
--

CREATE TABLE `tpa_doctorcharges` (
  `id` int(11) NOT NULL,
  `org_id` int(11) NOT NULL,
  `charge_id` int(11) NOT NULL,
  `org_charge` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tpa_master`
--

CREATE TABLE `tpa_master` (
  `id` int(11) NOT NULL,
  `organisation` varchar(200) NOT NULL,
  `charge_id` int(11) NOT NULL,
  `organisation_charge` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `userlog`
--

CREATE TABLE `userlog` (
  `id` int(11) NOT NULL,
  `user` varchar(100) DEFAULT NULL,
  `role` varchar(100) DEFAULT NULL,
  `ipaddress` varchar(100) DEFAULT NULL,
  `user_agent` varchar(500) DEFAULT NULL,
  `login_datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `userlog`
--

INSERT INTO `userlog` (`id`, `user`, `role`, `ipaddress`, `user_agent`, `login_datetime`) VALUES
(1, 'admin@gmail.com', 'Admin', '103.104.183.2', 'Chrome 115.0.0.0, Windows 10', '2023-08-11 10:58:23'),
(2, 'admin@gmail.com', 'Admin', '157.35.8.117', 'Chrome 103.0.0.0, Android', '2023-08-11 12:23:00'),
(3, 'admin@gmail.com', 'Admin', '103.104.183.2', 'Chrome 115.0.0.0, Windows 10', '2023-08-11 12:23:38'),
(4, 'admin@gmail.com', 'Admin', '157.35.8.117', 'Chrome 103.0.0.0, Android', '2023-08-11 12:27:11'),
(5, 'admin@gmail.com', 'Admin', '103.104.183.2', 'Chrome 115.0.0.0, Windows 10', '2023-08-11 12:27:42'),
(6, 'pat1', 'patient', '157.35.8.117', 'Chrome 103.0.0.0, Android', '2023-08-11 12:42:22'),
(7, 'admin@gmail.com', 'Admin', '103.104.183.2', 'Chrome 115.0.0.0, Windows 10', '2023-08-11 12:54:16'),
(8, 'admin@gmail.com', 'Admin', '157.35.8.117', 'Chrome 103.0.0.0, Android', '2023-08-11 12:59:43'),
(9, 'pat1', 'patient', '157.35.8.117', 'Chrome 103.0.0.0, Android', '2023-08-11 13:05:24'),
(10, 'Admin@gmail.com', 'Admin', '152.58.188.75', 'Chrome 115.0.0.0, Android', '2023-08-11 13:07:16'),
(11, 'admin@gmail.com', 'Admin', '152.58.191.7', 'Chrome 115.0.0.0, Android', '2023-08-11 14:09:09'),
(12, 'admin@gmail.com', 'Admin', '152.58.132.3', 'Chrome 115.0.0.0, Android', '2023-08-11 14:09:20'),
(13, 'admin@gmail.com', 'Admin', '49.37.66.186', 'Chrome 115.0.0.0, Windows 10', '2023-08-11 14:10:30'),
(14, 'admin@gmail.com', 'Admin', '106.207.77.88', 'Chrome 103.0.0.0, Android', '2023-08-12 00:03:17'),
(15, 'admin@gmail.com', 'Admin', '103.104.183.2', 'Chrome 115.0.0.0, Windows 10', '2023-08-12 04:35:24'),
(16, 'admin@gmail.com', 'Admin', '103.104.183.2', 'Chrome 115.0.0.0, Windows 10', '2023-08-12 04:55:20'),
(17, 'admin@gmail.com', 'Admin', '103.104.183.2', 'Chrome 115.0.0.0, Windows 10', '2023-08-12 06:04:14'),
(18, 'admin@gmail.com', 'Admin', '49.37.66.186', 'Chrome 115.0.0.0, Windows 10', '2023-08-12 07:54:24'),
(19, 'pat1', 'patient', '49.37.66.186', 'Chrome 115.0.0.0, Windows 10', '2023-08-12 08:35:23'),
(20, 'admin@gmail.com', 'Admin', '49.37.66.186', 'Chrome 115.0.0.0, Windows 10', '2023-08-12 08:36:34'),
(21, 'admin@gmail.com', 'Admin', '49.37.66.186', 'Chrome 115.0.0.0, Windows 10', '2023-08-12 12:25:28'),
(22, 'admin@gmail.com', 'Admin', '49.37.66.186', 'Chrome 115.0.0.0, Windows 10', '2023-08-14 04:54:01'),
(23, 'admin@gmail.com', 'Admin', '223.228.250.214', 'Chrome 103.0.0.0, Android', '2023-08-14 06:54:57'),
(24, 'admin@gmail.com', 'Admin', '49.37.66.186', 'Chrome 115.0.0.0, Windows 10', '2023-08-16 06:19:42');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_id` int(10) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `childs` text NOT NULL,
  `role` varchar(30) NOT NULL,
  `verification_code` varchar(200) NOT NULL,
  `is_active` varchar(255) DEFAULT 'yes',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 1, 'pat1', '50928t', '', 'patient', '', 'yes', '2023-08-11 12:34:22', '0000-00-00 00:00:00'),
(2, 2, 'pat2', 'ap1bfk', '', 'patient', '', 'yes', '2023-08-11 12:45:13', '0000-00-00 00:00:00'),
(3, 3, 'pat3', 'nm5isb', '', 'patient', '', 'yes', '2023-08-12 00:09:40', '0000-00-00 00:00:00'),
(4, 4, 'pat4', 'qe1hih', '', 'patient', '', 'yes', '2023-08-12 08:19:14', '0000-00-00 00:00:00'),
(5, 5, 'pat5', 'w0ccq4', '', 'patient', '', 'yes', '2023-08-12 08:47:49', '0000-00-00 00:00:00'),
(6, 6, 'pat6', '4ip1mj', '', 'patient', '', 'yes', '2023-08-16 06:21:28', '0000-00-00 00:00:00'),
(7, 7, 'pat7', 'vfx0d6', '', 'patient', '', 'yes', '2023-08-16 06:22:17', '0000-00-00 00:00:00'),
(8, 8, 'pat8', 'ddq31d', '', 'patient', '', 'yes', '2023-08-16 06:34:20', '0000-00-00 00:00:00'),
(9, 9, 'pat9', 'vb49ly', '', 'patient', '', 'yes', '2023-08-16 07:26:18', '0000-00-00 00:00:00'),
(10, 10, 'pat10', '8qkxdf', '', 'patient', '', 'yes', '2023-08-16 07:38:00', '0000-00-00 00:00:00'),
(11, 11, 'pat11', 'fctlt2', '', 'patient', '', 'yes', '2023-08-16 07:47:17', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `vehicles`
--

CREATE TABLE `vehicles` (
  `id` int(10) UNSIGNED NOT NULL,
  `vehicle_no` varchar(20) DEFAULT NULL,
  `vehicle_model` varchar(100) NOT NULL DEFAULT 'None',
  `manufacture_year` varchar(4) DEFAULT NULL,
  `vehicle_type` varchar(100) NOT NULL,
  `driver_name` varchar(50) DEFAULT NULL,
  `driver_licence` varchar(50) NOT NULL DEFAULT 'None',
  `driver_contact` varchar(20) DEFAULT NULL,
  `note` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `visitors_book`
--

CREATE TABLE `visitors_book` (
  `id` int(11) NOT NULL,
  `source` varchar(100) DEFAULT NULL,
  `purpose` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `contact` varchar(12) NOT NULL,
  `id_proof` varchar(50) NOT NULL,
  `no_of_pepple` int(11) NOT NULL,
  `date` date NOT NULL,
  `in_time` varchar(20) NOT NULL,
  `out_time` varchar(20) NOT NULL,
  `note` mediumtext NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `visitors_purpose`
--

CREATE TABLE `visitors_purpose` (
  `id` int(11) NOT NULL,
  `visitors_purpose` varchar(100) NOT NULL,
  `description` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `visitors_purpose`
--

INSERT INTO `visitors_purpose` (`id`, `visitors_purpose`, `description`) VALUES
(1, 'VISIT', 'VISIT'),
(2, 'APPOINTMENT', ''),
(3, 'CHECK UP', ''),
(4, 'TREATMENT', ''),
(5, 'MEETING', '');

-- --------------------------------------------------------

--
-- Table structure for table `visit_details`
--

CREATE TABLE `visit_details` (
  `id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `opd_id` int(11) NOT NULL,
  `opd_no` varchar(100) NOT NULL,
  `cons_doctor` int(11) NOT NULL,
  `case_type` varchar(200) NOT NULL,
  `appointment_date` datetime NOT NULL,
  `symptoms` varchar(200) NOT NULL,
  `bp` varchar(100) NOT NULL,
  `height` varchar(100) NOT NULL,
  `weight` varchar(100) NOT NULL,
  `known_allergies` varchar(100) NOT NULL,
  `casualty` varchar(200) NOT NULL,
  `refference` varchar(200) NOT NULL,
  `date` date NOT NULL,
  `note` varchar(100) NOT NULL,
  `amount` decimal(15,2) NOT NULL,
  `tax` decimal(15,2) NOT NULL,
  `note_remark` mediumtext NOT NULL,
  `payment_mode` varchar(100) NOT NULL,
  `generated_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agent_category`
--
ALTER TABLE `agent_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `agent_details`
--
ALTER TABLE `agent_details`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `agent_id` (`agent_id`);

--
-- Indexes for table `agent_payment`
--
ALTER TABLE `agent_payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ambulance_call`
--
ALTER TABLE `ambulance_call`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bed`
--
ALTER TABLE `bed`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bed_group`
--
ALTER TABLE `bed_group`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bed_type`
--
ALTER TABLE `bed_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `birth_report`
--
ALTER TABLE `birth_report`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blood_bank_status`
--
ALTER TABLE `blood_bank_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blood_donor`
--
ALTER TABLE `blood_donor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blood_donor_cycle`
--
ALTER TABLE `blood_donor_cycle`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blood_issue`
--
ALTER TABLE `blood_issue`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `charges`
--
ALTER TABLE `charges`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `charge_categories`
--
ALTER TABLE `charge_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `complaint`
--
ALTER TABLE `complaint`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `complaint_type`
--
ALTER TABLE `complaint_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `consultant_register`
--
ALTER TABLE `consultant_register`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `consult_charges`
--
ALTER TABLE `consult_charges`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contents`
--
ALTER TABLE `contents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `content_for`
--
ALTER TABLE `content_for`
  ADD PRIMARY KEY (`id`),
  ADD KEY `content_id` (`content_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `custom_fields`
--
ALTER TABLE `custom_fields`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `custom_field_values`
--
ALTER TABLE `custom_field_values`
  ADD PRIMARY KEY (`id`),
  ADD KEY `custom_field_id` (`custom_field_id`);

--
-- Indexes for table `death_report`
--
ALTER TABLE `death_report`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `diagnosis`
--
ALTER TABLE `diagnosis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dispatch_receive`
--
ALTER TABLE `dispatch_receive`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email_config`
--
ALTER TABLE `email_config`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `enquiry`
--
ALTER TABLE `enquiry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `enquiry_type`
--
ALTER TABLE `enquiry_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expense_head`
--
ALTER TABLE `expense_head`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `floor`
--
ALTER TABLE `floor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `follow_up`
--
ALTER TABLE `follow_up`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `front_cms_media_gallery`
--
ALTER TABLE `front_cms_media_gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `front_cms_menus`
--
ALTER TABLE `front_cms_menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `front_cms_menu_items`
--
ALTER TABLE `front_cms_menu_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `front_cms_pages`
--
ALTER TABLE `front_cms_pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `front_cms_page_contents`
--
ALTER TABLE `front_cms_page_contents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `page_id` (`page_id`);

--
-- Indexes for table `front_cms_programs`
--
ALTER TABLE `front_cms_programs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `front_cms_program_photos`
--
ALTER TABLE `front_cms_program_photos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `program_id` (`program_id`);

--
-- Indexes for table `front_cms_settings`
--
ALTER TABLE `front_cms_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `general_calls`
--
ALTER TABLE `general_calls`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `income`
--
ALTER TABLE `income`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `income_head`
--
ALTER TABLE `income_head`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ipd_billing`
--
ALTER TABLE `ipd_billing`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ipd_details`
--
ALTER TABLE `ipd_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ipd_prescription_basic`
--
ALTER TABLE `ipd_prescription_basic`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ipd_prescription_details`
--
ALTER TABLE `ipd_prescription_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item_category`
--
ALTER TABLE `item_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item_issue`
--
ALTER TABLE `item_issue`
  ADD PRIMARY KEY (`id`),
  ADD KEY `item_id` (`item_id`),
  ADD KEY `item_category_id` (`item_category_id`);

--
-- Indexes for table `item_stock`
--
ALTER TABLE `item_stock`
  ADD PRIMARY KEY (`id`),
  ADD KEY `item_id` (`item_id`),
  ADD KEY `supplier_id` (`supplier_id`),
  ADD KEY `store_id` (`store_id`);

--
-- Indexes for table `item_store`
--
ALTER TABLE `item_store`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item_supplier`
--
ALTER TABLE `item_supplier`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lab`
--
ALTER TABLE `lab`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leave_types`
--
ALTER TABLE `leave_types`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `type` (`type`);

--
-- Indexes for table `medicine_bad_stock`
--
ALTER TABLE `medicine_bad_stock`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medicine_batch_details`
--
ALTER TABLE `medicine_batch_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medicine_category`
--
ALTER TABLE `medicine_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medicine_dosage`
--
ALTER TABLE `medicine_dosage`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notification_roles`
--
ALTER TABLE `notification_roles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `send_notification_id` (`send_notification_id`),
  ADD KEY `role_id` (`role_id`);

--
-- Indexes for table `notification_setting`
--
ALTER TABLE `notification_setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `opd_billing`
--
ALTER TABLE `opd_billing`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `opd_details`
--
ALTER TABLE `opd_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `opd_patient_charges`
--
ALTER TABLE `opd_patient_charges`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `opd_payment`
--
ALTER TABLE `opd_payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `operation_theatre`
--
ALTER TABLE `operation_theatre`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `organisation`
--
ALTER TABLE `organisation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `organisations_charges`
--
ALTER TABLE `organisations_charges`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `org_id` (`org_id`) USING BTREE,
  ADD KEY `charge_id` (`charge_id`) USING BTREE;

--
-- Indexes for table `ot_consultant_register`
--
ALTER TABLE `ot_consultant_register`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pathology`
--
ALTER TABLE `pathology`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pathology_category`
--
ALTER TABLE `pathology_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pathology_report`
--
ALTER TABLE `pathology_report`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patient_charges`
--
ALTER TABLE `patient_charges`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patient_timeline`
--
ALTER TABLE `patient_timeline`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_settings`
--
ALTER TABLE `payment_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payslip_allowance`
--
ALTER TABLE `payslip_allowance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permission_category`
--
ALTER TABLE `permission_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permission_group`
--
ALTER TABLE `permission_group`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pharmacy`
--
ALTER TABLE `pharmacy`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pharmacy_bill_basic`
--
ALTER TABLE `pharmacy_bill_basic`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pharmacy_bill_detail`
--
ALTER TABLE `pharmacy_bill_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prescription`
--
ALTER TABLE `prescription`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `print_setting`
--
ALTER TABLE `print_setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `radio`
--
ALTER TABLE `radio`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `radiology_report`
--
ALTER TABLE `radiology_report`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `read_notification`
--
ALTER TABLE `read_notification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `read_systemnotification`
--
ALTER TABLE `read_systemnotification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles_permissions`
--
ALTER TABLE `roles_permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sch_settings`
--
ALTER TABLE `sch_settings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lang_id` (`lang_id`),
  ADD KEY `session_id` (`session_id`);

--
-- Indexes for table `send_notification`
--
ALTER TABLE `send_notification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sms_config`
--
ALTER TABLE `sms_config`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `source`
--
ALTER TABLE `source`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `employee_id` (`employee_id`);

--
-- Indexes for table `staff_attendance`
--
ALTER TABLE `staff_attendance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff_attendance_type`
--
ALTER TABLE `staff_attendance_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff_designation`
--
ALTER TABLE `staff_designation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff_leave_details`
--
ALTER TABLE `staff_leave_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff_leave_request`
--
ALTER TABLE `staff_leave_request`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff_payroll`
--
ALTER TABLE `staff_payroll`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff_payslip`
--
ALTER TABLE `staff_payslip`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff_roles`
--
ALTER TABLE `staff_roles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id` (`role_id`),
  ADD KEY `staff_id` (`staff_id`);

--
-- Indexes for table `staff_timeline`
--
ALTER TABLE `staff_timeline`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplier_bill_basic`
--
ALTER TABLE `supplier_bill_basic`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplier_bill_detail`
--
ALTER TABLE `supplier_bill_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplier_category`
--
ALTER TABLE `supplier_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `system_notification`
--
ALTER TABLE `system_notification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `test_type_report`
--
ALTER TABLE `test_type_report`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tpa_doctorcharges`
--
ALTER TABLE `tpa_doctorcharges`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `org_id` (`org_id`) USING BTREE,
  ADD KEY `charge_id` (`charge_id`) USING BTREE;

--
-- Indexes for table `tpa_master`
--
ALTER TABLE `tpa_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userlog`
--
ALTER TABLE `userlog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vehicles`
--
ALTER TABLE `vehicles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `visitors_book`
--
ALTER TABLE `visitors_book`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `visitors_purpose`
--
ALTER TABLE `visitors_purpose`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `visit_details`
--
ALTER TABLE `visit_details`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agent_category`
--
ALTER TABLE `agent_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `agent_details`
--
ALTER TABLE `agent_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `agent_payment`
--
ALTER TABLE `agent_payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ambulance_call`
--
ALTER TABLE `ambulance_call`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `bed`
--
ALTER TABLE `bed`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `bed_group`
--
ALTER TABLE `bed_group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `bed_type`
--
ALTER TABLE `bed_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `birth_report`
--
ALTER TABLE `birth_report`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blood_bank_status`
--
ALTER TABLE `blood_bank_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blood_donor`
--
ALTER TABLE `blood_donor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blood_donor_cycle`
--
ALTER TABLE `blood_donor_cycle`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blood_issue`
--
ALTER TABLE `blood_issue`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `charges`
--
ALTER TABLE `charges`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `charge_categories`
--
ALTER TABLE `charge_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `complaint`
--
ALTER TABLE `complaint`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `complaint_type`
--
ALTER TABLE `complaint_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `consultant_register`
--
ALTER TABLE `consultant_register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `consult_charges`
--
ALTER TABLE `consult_charges`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contents`
--
ALTER TABLE `contents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `content_for`
--
ALTER TABLE `content_for`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `custom_fields`
--
ALTER TABLE `custom_fields`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `custom_field_values`
--
ALTER TABLE `custom_field_values`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `death_report`
--
ALTER TABLE `death_report`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `diagnosis`
--
ALTER TABLE `diagnosis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dispatch_receive`
--
ALTER TABLE `dispatch_receive`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `email_config`
--
ALTER TABLE `email_config`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `enquiry`
--
ALTER TABLE `enquiry`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `enquiry_type`
--
ALTER TABLE `enquiry_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `expense_head`
--
ALTER TABLE `expense_head`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `floor`
--
ALTER TABLE `floor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `follow_up`
--
ALTER TABLE `follow_up`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `front_cms_media_gallery`
--
ALTER TABLE `front_cms_media_gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `front_cms_menus`
--
ALTER TABLE `front_cms_menus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `front_cms_menu_items`
--
ALTER TABLE `front_cms_menu_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `front_cms_pages`
--
ALTER TABLE `front_cms_pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `front_cms_page_contents`
--
ALTER TABLE `front_cms_page_contents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `front_cms_programs`
--
ALTER TABLE `front_cms_programs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `front_cms_program_photos`
--
ALTER TABLE `front_cms_program_photos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `front_cms_settings`
--
ALTER TABLE `front_cms_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `general_calls`
--
ALTER TABLE `general_calls`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `income`
--
ALTER TABLE `income`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `income_head`
--
ALTER TABLE `income_head`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `ipd_billing`
--
ALTER TABLE `ipd_billing`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ipd_details`
--
ALTER TABLE `ipd_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `ipd_prescription_basic`
--
ALTER TABLE `ipd_prescription_basic`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ipd_prescription_details`
--
ALTER TABLE `ipd_prescription_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `item_category`
--
ALTER TABLE `item_category`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `item_issue`
--
ALTER TABLE `item_issue`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `item_stock`
--
ALTER TABLE `item_stock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `item_store`
--
ALTER TABLE `item_store`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `item_supplier`
--
ALTER TABLE `item_supplier`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lab`
--
ALTER TABLE `lab`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `leave_types`
--
ALTER TABLE `leave_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `medicine_bad_stock`
--
ALTER TABLE `medicine_bad_stock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `medicine_batch_details`
--
ALTER TABLE `medicine_batch_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `medicine_category`
--
ALTER TABLE `medicine_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `medicine_dosage`
--
ALTER TABLE `medicine_dosage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notification_roles`
--
ALTER TABLE `notification_roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notification_setting`
--
ALTER TABLE `notification_setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `opd_billing`
--
ALTER TABLE `opd_billing`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `opd_details`
--
ALTER TABLE `opd_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `opd_patient_charges`
--
ALTER TABLE `opd_patient_charges`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `opd_payment`
--
ALTER TABLE `opd_payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `operation_theatre`
--
ALTER TABLE `operation_theatre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `organisation`
--
ALTER TABLE `organisation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `organisations_charges`
--
ALTER TABLE `organisations_charges`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ot_consultant_register`
--
ALTER TABLE `ot_consultant_register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pathology`
--
ALTER TABLE `pathology`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pathology_category`
--
ALTER TABLE `pathology_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pathology_report`
--
ALTER TABLE `pathology_report`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `patient_charges`
--
ALTER TABLE `patient_charges`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `patient_timeline`
--
ALTER TABLE `patient_timeline`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `payment_settings`
--
ALTER TABLE `payment_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payslip_allowance`
--
ALTER TABLE `payslip_allowance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permission_category`
--
ALTER TABLE `permission_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=171;

--
-- AUTO_INCREMENT for table `permission_group`
--
ALTER TABLE `permission_group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `pharmacy`
--
ALTER TABLE `pharmacy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pharmacy_bill_basic`
--
ALTER TABLE `pharmacy_bill_basic`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pharmacy_bill_detail`
--
ALTER TABLE `pharmacy_bill_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `prescription`
--
ALTER TABLE `prescription`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `print_setting`
--
ALTER TABLE `print_setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `radio`
--
ALTER TABLE `radio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `radiology_report`
--
ALTER TABLE `radiology_report`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `read_notification`
--
ALTER TABLE `read_notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `read_systemnotification`
--
ALTER TABLE `read_systemnotification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `roles_permissions`
--
ALTER TABLE `roles_permissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `send_notification`
--
ALTER TABLE `send_notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sms_config`
--
ALTER TABLE `sms_config`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `source`
--
ALTER TABLE `source`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `staff_attendance`
--
ALTER TABLE `staff_attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `staff_attendance_type`
--
ALTER TABLE `staff_attendance_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `staff_designation`
--
ALTER TABLE `staff_designation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `staff_leave_details`
--
ALTER TABLE `staff_leave_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `staff_leave_request`
--
ALTER TABLE `staff_leave_request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `staff_payroll`
--
ALTER TABLE `staff_payroll`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `staff_payslip`
--
ALTER TABLE `staff_payslip`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `staff_roles`
--
ALTER TABLE `staff_roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `staff_timeline`
--
ALTER TABLE `staff_timeline`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `supplier_bill_basic`
--
ALTER TABLE `supplier_bill_basic`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `supplier_bill_detail`
--
ALTER TABLE `supplier_bill_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `supplier_category`
--
ALTER TABLE `supplier_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `system_notification`
--
ALTER TABLE `system_notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `test_type_report`
--
ALTER TABLE `test_type_report`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tpa_doctorcharges`
--
ALTER TABLE `tpa_doctorcharges`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tpa_master`
--
ALTER TABLE `tpa_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `userlog`
--
ALTER TABLE `userlog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `vehicles`
--
ALTER TABLE `vehicles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `visitors_book`
--
ALTER TABLE `visitors_book`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `visitors_purpose`
--
ALTER TABLE `visitors_purpose`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `visit_details`
--
ALTER TABLE `visit_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `content_for`
--
ALTER TABLE `content_for`
  ADD CONSTRAINT `content_for_ibfk_1` FOREIGN KEY (`content_id`) REFERENCES `contents` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `content_for_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `front_cms_page_contents`
--
ALTER TABLE `front_cms_page_contents`
  ADD CONSTRAINT `front_cms_page_contents_ibfk_1` FOREIGN KEY (`page_id`) REFERENCES `front_cms_pages` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `front_cms_program_photos`
--
ALTER TABLE `front_cms_program_photos`
  ADD CONSTRAINT `front_cms_program_photos_ibfk_1` FOREIGN KEY (`program_id`) REFERENCES `front_cms_programs` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `item_issue`
--
ALTER TABLE `item_issue`
  ADD CONSTRAINT `item_issue_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `item` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `item_issue_ibfk_2` FOREIGN KEY (`item_category_id`) REFERENCES `item_category` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `item_stock`
--
ALTER TABLE `item_stock`
  ADD CONSTRAINT `item_stock_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `item` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `item_stock_ibfk_2` FOREIGN KEY (`supplier_id`) REFERENCES `item_supplier` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `item_stock_ibfk_3` FOREIGN KEY (`store_id`) REFERENCES `item_store` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `notification_roles`
--
ALTER TABLE `notification_roles`
  ADD CONSTRAINT `notification_roles_ibfk_1` FOREIGN KEY (`send_notification_id`) REFERENCES `send_notification` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `notification_roles_ibfk_2` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
