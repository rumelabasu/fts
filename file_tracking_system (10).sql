-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 05, 2016 at 07:19 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `file_tracking_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `action_mesage_view`
--

CREATE TABLE `action_mesage_view` (
  `action_message_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `view_status` varchar(100) NOT NULL,
  `action_id` bigint(20) NOT NULL,
  `message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `fts_actionable_letter`
--

CREATE TABLE `fts_actionable_letter` (
  `action_id` bigint(20) NOT NULL,
  `letter_id` bigint(20) NOT NULL,
  `deadline_dt` date NOT NULL,
  `action_details` varchar(255) NOT NULL,
  `trail_letter_id` bigint(20) NOT NULL,
  `action_status` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fts_actionable_letter`
--

INSERT INTO `fts_actionable_letter` (`action_id`, `letter_id`, `deadline_dt`, `action_details`, `trail_letter_id`, `action_status`) VALUES
(1, 2, '2016-12-03', 'Discuss the Matter', 1, 'P'),
(2, 4, '0000-00-00', 'Not Actionable', 2, 'P');

-- --------------------------------------------------------

--
-- Table structure for table `fts_authority`
--

CREATE TABLE `fts_authority` (
  `authority_id` bigint(20) NOT NULL,
  `authority_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fts_authority`
--

INSERT INTO `fts_authority` (`authority_id`, `authority_name`) VALUES
(1, 'Homicide Squad'),
(2, 'DRBT Section'),
(3, 'Motor Theft Squad'),
(4, 'Special Operation Group (SOG)'),
(5, 'Railway & Highway Crime Cell'),
(6, 'Special Crime Unit'),
(7, 'Cyber Crime Cell ( also covering Cyber Forensics)'),
(8, 'Narcotic Cell'),
(9, 'Economic Offence Wing (EOW)'),
(10, 'Cheating & Fraud Section'),
(11, 'Protection of Women & Children Cell (POWC)'),
(12, 'Anti Human Trafficking Unit (AHTU) '),
(13, 'Srt'),
(14, 'Mm'),
(15, 'KKKKK'),
(16, 'PWD'),
(17, 'TEST'),
(18, 'TESST'),
(19, 'VVVVVVVVVVVVVVV'),
(20, 'SP SOUTH 24 PGS');

-- --------------------------------------------------------

--
-- Table structure for table `fts_category`
--

CREATE TABLE `fts_category` (
  `cat_id` bigint(20) NOT NULL,
  `category` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fts_category`
--

INSERT INTO `fts_category` (`cat_id`, `category`) VALUES
(1, 'Modernization'),
(2, 'Account'),
(3, 'Recruitment'),
(4, 'Wer'),
(5, 'M123');

-- --------------------------------------------------------

--
-- Table structure for table `fts_designation`
--

CREATE TABLE `fts_designation` (
  `desig_id` bigint(20) NOT NULL,
  `desig_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fts_designation`
--

INSERT INTO `fts_designation` (`desig_id`, `desig_name`) VALUES
(1, 'ADGP,CID'),
(2, 'IGP,CID'),
(3, 'DIG,OPS'),
(4, 'DIG,CID'),
(5, 'IPS'),
(6, 'SS,CID'),
(7, 'SS,SPECIAL'),
(8, 'SS,HQ'),
(9, 'OS'),
(10, 'OC');

-- --------------------------------------------------------

--
-- Table structure for table `fts_employee`
--

CREATE TABLE `fts_employee` (
  `emp_id` bigint(20) NOT NULL,
  `gpf_id` varchar(200) NOT NULL,
  `emp_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fts_employee`
--

INSERT INTO `fts_employee` (`emp_id`, `gpf_id`, `emp_name`) VALUES
(1, 'SFK5L', 'ROHIT ROY'),
(2, '56T32', 'SHREE BASU'),
(3, '995K8', 'KIRON AHAMED'),
(4, '32T58', 'ANIMESH BANERJEE'),
(5, '261E9', 'PRITHA SEN'),
(7, '9999', 'SUNDAR PICHAI'),
(8, '5555', 'Larry Page'),
(9, '787878', 'Jobes Page'),
(10, '565656', 'SOUMYA ROY'),
(11, '1111', 'Rumela Basu');

-- --------------------------------------------------------

--
-- Table structure for table `fts_file_history_info`
--

CREATE TABLE `fts_file_history_info` (
  `trail_id` bigint(20) NOT NULL,
  `file_id` bigint(20) NOT NULL,
  `user_id` bigint(50) NOT NULL,
  `sender_desig_id` varchar(90) NOT NULL,
  `sender_section_id` varchar(90) NOT NULL,
  `note_id` bigint(20) NOT NULL,
  `addressing_id` varchar(20) NOT NULL,
  `addressing_desig_id` varchar(90) NOT NULL,
  `addressing_section_id` varchar(90) NOT NULL,
  `date_of_action` datetime NOT NULL,
  `action_type` enum('D','R','A') NOT NULL,
  `delete_status` enum('N','Y') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fts_file_history_info`
--

INSERT INTO `fts_file_history_info` (`trail_id`, `file_id`, `user_id`, `sender_desig_id`, `sender_section_id`, `note_id`, `addressing_id`, `addressing_desig_id`, `addressing_section_id`, `date_of_action`, `action_type`, `delete_status`) VALUES
(1, 1, 1, '9,8', '4,5', 1, '3', '6,4', '5,1', '2016-12-01 12:48:32', 'D', 'N'),
(2, 1, 3, '', '', 0, '', '', '', '2016-12-01 12:52:54', 'R', 'N'),
(3, 1, 3, '6,4', '5,1', 2, '1', '9,8', '4,5', '2016-12-01 12:54:24', 'D', 'N'),
(4, 1, 1, '', '', 0, '', '', '', '2016-12-01 12:55:06', 'R', 'N'),
(5, 1, 1, '9,8', '4,5', 3, '3', '6,4', '5,1', '2016-12-01 12:55:46', 'D', 'N'),
(6, 1, 3, '', '', 0, '', '', '', '2016-12-01 13:08:01', 'R', 'N'),
(7, 1, 3, '6,4', '5,1', 4, '1', '9,8', '4,5', '2016-12-01 13:09:00', 'D', 'N'),
(8, 1, 1, '', '', 0, '', '', '', '2016-12-01 13:09:33', 'R', 'N'),
(9, 1, 1, '9,8', '4,5', 5, '3', '6,4', '5,1', '2016-12-01 13:09:53', 'D', 'N'),
(10, 1, 3, '', '', 0, '', '', '', '2016-12-01 13:10:11', 'R', 'N'),
(11, 1, 3, '6,4', '5,1', 6, '1', '9,8', '4,5', '2016-12-01 13:10:44', 'D', 'N');

-- --------------------------------------------------------

--
-- Table structure for table `fts_file_movement`
--

CREATE TABLE `fts_file_movement` (
  `movement_id` bigint(20) NOT NULL,
  `file_id` bigint(20) NOT NULL,
  `qrcode_image` varchar(250) NOT NULL,
  `qrcode_text` varchar(250) NOT NULL,
  `received_date_time` datetime NOT NULL,
  `current_dept` varchar(100) NOT NULL,
  `sender_user_id` varchar(50) NOT NULL,
  `reciver_user_id` bigint(20) NOT NULL,
  `from_desig_id` varchar(100) NOT NULL,
  `file_receive_key` varchar(50) NOT NULL,
  `addressing_desig_id` varchar(50) NOT NULL,
  `dispatch_date_time` datetime NOT NULL,
  `dispatch_key` varchar(50) NOT NULL,
  `file_status` varchar(20) NOT NULL,
  `delete_status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fts_file_movement`
--

INSERT INTO `fts_file_movement` (`movement_id`, `file_id`, `qrcode_image`, `qrcode_text`, `received_date_time`, `current_dept`, `sender_user_id`, `reciver_user_id`, `from_desig_id`, `file_receive_key`, `addressing_desig_id`, `dispatch_date_time`, `dispatch_key`, `file_status`, `delete_status`) VALUES
(1, 1, '', '', '2016-12-01 13:10:11', '', '3', 1, '6,4', '303080', '9', '2016-12-01 13:10:44', '303080', 'D', 'N');

-- --------------------------------------------------------

--
-- Table structure for table `fts_file_note`
--

CREATE TABLE `fts_file_note` (
  `note_id` bigint(20) NOT NULL,
  `nsp_id` varchar(50) NOT NULL,
  `note_text` varchar(255) NOT NULL,
  `signature` varchar(255) NOT NULL,
  `file_ref_sl_no` varchar(100) NOT NULL,
  `file_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fts_file_note`
--

INSERT INTO `fts_file_note` (`note_id`, `nsp_id`, `note_text`, `signature`, `file_ref_sl_no`, `file_id`, `user_id`) VALUES
(1, '', 'today- \r\n\r\nso I have a page that has a fixed link bar on the side. I''d like to scroll to the different divs. Basically the page is just one long website, where I''d like to scroll to different divs using the menu box to the side. Here is the jquery I have ', 'fhftyt', 'CID/SCU/Mod/VIDEO/1/2016', 1, 1),
(2, '', '222222222222222222\r\n\r\nso I have a page that has a fixed link bar on the side. I''d like to scroll to the different divs. Basically the page is just one long website, where I''d like to scroll to different divs using the menu box to the side. Here is the jqu', 'gfg', 'CID/SCU/Mod/VIDEO/1/2016', 1, 3),
(3, '', '3333333333333333333\r\nso I have a page that has a fixed link bar on the side. I''d like to scroll to the different divs. Basically the page is just one long website, where I''d like to scroll to different divs using the menu box to the side. Here is the jque', 'dfgfhfg', 'CID/SCU/Mod/VIDEO/1/2016', 1, 1),
(4, '', 'hii\r\nThen I have some other elements, like other text inputs, textareas, etc.\r\n\r\nWhen the user clicks on that input with #subject, the page should scroll to the last element of the page with a nice animation. It should be a scroll to bottom and not to top', 'ddd', 'CID/SCU/Mod/VIDEO/1/2016', 1, 3),
(5, '', 'hello--\r\nThen I have some other elements, like other text inputs, textareas, etc.\r\n\r\nWhen the user clicks on that input with #subject, the page should scroll to the last element of the page with a nice animation. It should be a scroll to bottom and not to', 'adada', 'CID/SCU/Mod/VIDEO/1/2016', 1, 1),
(6, '', 'ok-\r\nThen I have some other elements, like other text inputs, textareas, etc.\r\n\r\nWhen the user clicks on that input with #subject, the page should scroll to the last element of the page with a nice animation. It should be a scroll to bottom and not to top', 'ssss', 'CID/SCU/Mod/VIDEO/1/2016', 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `fts_file_registration`
--

CREATE TABLE `fts_file_registration` (
  `file_id` bigint(20) NOT NULL,
  `file_ref_sl_no` varchar(100) NOT NULL,
  `file_name` varchar(100) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `desig_id` varchar(50) NOT NULL,
  `br_image_name` varchar(100) NOT NULL,
  `br_value` varchar(255) NOT NULL,
  `sec_id` bigint(20) NOT NULL,
  `file_reg_date` datetime NOT NULL,
  `description` varchar(250) NOT NULL,
  `file_priority` varchar(20) NOT NULL,
  `file_status` varchar(20) NOT NULL,
  `subject_id` bigint(100) NOT NULL,
  `type_of_paper` varchar(20) NOT NULL,
  `folder_name` varchar(200) NOT NULL,
  `file_move_status` enum('P','M','A') NOT NULL,
  `delete_status` enum('Y','N') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fts_file_registration`
--

INSERT INTO `fts_file_registration` (`file_id`, `file_ref_sl_no`, `file_name`, `user_id`, `desig_id`, `br_image_name`, `br_value`, `sec_id`, `file_reg_date`, `description`, `file_priority`, `file_status`, `subject_id`, `type_of_paper`, `folder_name`, `file_move_status`, `delete_status`) VALUES
(1, 'CID/SCU/Mod/VIDEO/1/2016', 'fghfg', 1, '9,8', '1480576545.jpg', '303080', 4, '2016-12-01 12:45:46', 'SASASADSSDSD', 'Normal', 'Normal', 1, '', 'CID_SCU_Mod_VIDEO_1_2016', 'M', 'N'),
(2, 'CID/SCU/Acc/CVCX/1/2016', 'xcvxc', 1, '9,8', '1480581485.jpg', '201127', 4, '2016-12-01 14:08:05', 'XCVXC', 'Normal', 'Normal', 2, '', 'CID_SCU_Acc_CVCX_1_2016', 'P', 'N'),
(3, 'CID/RHCC/Wer/CVCX/1/2016', 'Cyber Cell Report', 1, '9,8', '1480581510.jpg', '215767', 4, '2016-12-01 14:08:30', 'XCVXC', 'Normal', 'Normal', 2, '', 'CID_RHCC_Wer_CVCX_1_2016', 'P', 'N');

-- --------------------------------------------------------

--
-- Table structure for table `fts_letter_history_info`
--

CREATE TABLE `fts_letter_history_info` (
  `trail_letter_id` bigint(20) NOT NULL,
  `letter_id` bigint(20) NOT NULL,
  `recv_id` bigint(20) NOT NULL,
  `receiver_section_id` varchar(90) NOT NULL,
  `receiver_desig_id` varchar(90) NOT NULL,
  `sender_user_id` bigint(20) NOT NULL,
  `sender_section_id` varchar(90) NOT NULL,
  `sender_desig_id` varchar(90) NOT NULL,
  `date_of_action` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fts_letter_history_info`
--

INSERT INTO `fts_letter_history_info` (`trail_letter_id`, `letter_id`, `recv_id`, `receiver_section_id`, `receiver_desig_id`, `sender_user_id`, `sender_section_id`, `sender_desig_id`, `date_of_action`) VALUES
(1, 2, 3, '5,1', '6,4', 1, '4,5', '9,8', '2016-12-02'),
(2, 4, 3, '5,1', '6,4', 1, '4,5', '9,8', '2016-12-05');

-- --------------------------------------------------------

--
-- Table structure for table `fts_letter_movement`
--

CREATE TABLE `fts_letter_movement` (
  `move_id` bigint(20) NOT NULL,
  `letter_id` bigint(20) NOT NULL,
  `received_date_time` datetime NOT NULL,
  `receiver_id` varchar(100) NOT NULL,
  `sender_id` varchar(100) NOT NULL,
  `recv_desig_id` bigint(20) NOT NULL,
  `sender_desig_id` bigint(20) NOT NULL,
  `action_id` bigint(20) NOT NULL,
  `dispatch_dt_time` varchar(100) NOT NULL,
  `recv_status` varchar(50) NOT NULL,
  `delete_status` enum('N','Y') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fts_letter_movement`
--

INSERT INTO `fts_letter_movement` (`move_id`, `letter_id`, `received_date_time`, `receiver_id`, `sender_id`, `recv_desig_id`, `sender_desig_id`, `action_id`, `dispatch_dt_time`, `recv_status`, `delete_status`) VALUES
(1, 2, '0000-00-00 00:00:00', '3', '1', 6, 9, 1, '2016-12-02 13:15:56', '', 'N'),
(2, 4, '0000-00-00 00:00:00', '3', '1', 6, 9, 2, '2016-12-05 10:59:46', '', 'N');

-- --------------------------------------------------------

--
-- Table structure for table `fts_letter_record`
--

CREATE TABLE `fts_letter_record` (
  `letter_id` bigint(20) NOT NULL,
  `sl_no` bigint(20) NOT NULL,
  `memo_no` bigint(100) NOT NULL,
  `issue_dt` date NOT NULL,
  `cp_no` int(11) NOT NULL,
  `page_count` bigint(20) NOT NULL,
  `file_id` bigint(20) NOT NULL,
  `letter_name` varchar(100) NOT NULL,
  `user_id` bigint(11) NOT NULL,
  `content` longtext NOT NULL,
  `sending_authority` bigint(20) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `addressing_desig_id` bigint(20) NOT NULL,
  `reg_dt` date NOT NULL,
  `location_path` varchar(255) NOT NULL,
  `regis_status` enum('L','F') NOT NULL,
  `letter_move_status` enum('P','M') NOT NULL,
  `addressing_user_id` bigint(20) NOT NULL,
  `register_id` bigint(20) NOT NULL,
  `attached_by` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fts_letter_record`
--

INSERT INTO `fts_letter_record` (`letter_id`, `sl_no`, `memo_no`, `issue_dt`, `cp_no`, `page_count`, `file_id`, `letter_name`, `user_id`, `content`, `sending_authority`, `subject`, `addressing_desig_id`, `reg_dt`, `location_path`, `regis_status`, `letter_move_status`, `addressing_user_id`, `register_id`, `attached_by`) VALUES
(1, 0, 1, '2016-12-15', 0, 9, 1, '1480576655.pdf', 1, 'csir-ugc(net)examforawardofjuniorresearchfellowshipandeligibilityforlecturershipexamschemeforsinglepapercsir-ugcnetinengineeringsciencesthepatternforthesinglepapermcqtestinengineeringsciencesshallbeasgivenbelow:-themcqtestpaperinengineeringscienceshallcarryamaximumof200marks.thedurationofexamshallbethreehours.thequestionpapershallbedividedinthreepartspart‘a’.thispartshallcarry20questionsofgeneralaptitude(logicalreasoning,graphicalanalysis,analyticalandnumericalability,quantitativecomparisons,seriesformation,puzzles,etc).candidatesshallberequiredtoanswerany15questions.eachquestionshallbeof2marks.totalmarksallocatedtothissectionshallbe30outof200.----------------------------------------------------------------------------------------------------------------part‘b’:thispartshallcontain25questionsrelatedtomathematicsandengineeringaptitude.candidatesshallberequiredtoanswerany20questions.eachquestionshallbeof3.5marks.totalmarksallocatedtothissectionshallbe70outof200.----------------------------------------------------------------------------------------------------------------part‘c’shallcontainsubjectrelatedquestionsofthefollowing7subjectareas:1.computerscience&informationtechnology2electricalscience3.electronics4.materialsscience5.fluidmechanics6.solidmechanics7.thermodynamicseachsubjectareawillhave10questions.candidatesshallberequiredtoanswerany20questionsoutofatotalof70questions.eachquestionshallbeof5marks.thetotalmarksallocatedtothispartshallbe100outof200.negativemarkingforwronganswersshallbe@25%nb:theactualnumberofquestionsineachpartandsectiontobeaskedandattemptedmayvaryfromexamtoexam.syllabuspartageneralaptitudewithemphasisonlogicalreasoning,graphicalanalysis,analyticalandnumericalability,quantitativecomparisons,seriesformation,puzzles,etc.syllabuspartbmathematicsandengineeringaptitudelinearalgebracalculuscomplexvariablesvectorcalculusordinarydifferentialalgebraofmatrices,inverse,rank,systemoflinearequations,symmetric,skew-symmetricandorthogonalmatrices.hermitian,skew-hermitianandunitarymatrices.eigenvaluesandeigenvectors,diagonalisationofmatrices.functionsofsinglevariable,limit,continuityanddifferentiability,meanvaluetheorems,indeterminateformsandl''hospitalrule,maximaandminima,taylor&#39;sseries,newton’smethodforfindingrootsofpolynomials.fundamentalandmeanvalue-theoremsofintegralcalculus.numericalintegrationbytrapezoidalandsimpson’srule.evaluationofdefiniteandimproperintegrals,betaandgammafunctions,functionsoftwovariables,limit,continuity,partialderivatives,euler''stheoremforhomogeneousfunctions,totalderivatives,maximaandminima,lagrangemethodofmultipliers,doubleintegralsandtheirapplications,sequenceandseries,testsforconvergence,powerseries,fourierseries,halfrangesineandcosineseries.analyticfunctions,cauchy-riemannequations,lineintegral,cauchy''sintegraltheoremandintegralformulataylor’sandlaurent''series,residuetheoremanditsapplications.gradient,divergenceandcurl,vectoridentities,directionalderivatives,line,surfaceandvolumeintegrals,stokes,gaussandgreen''stheoremsandtheirapplications.firstorderequation(linearandnonlinear),secondorderlineardifferentialequationswithvariablecoefficients,variationofequationsprobabilityparametersmethod,higherorderlineardifferentialequationswithconstantcoefficients,cauchy-euler''sequations,powerseriessolutions,legendrepolynomialsandbessel''sfunctionsofthefirstkindandtheirproperties.numericalsolutionsoffirstorderordinarydifferentialequationsbyeuler’sandrunge-kuttamethods.definitionsofprobabilityandsimpletheorems,conditionalprobability,bayestheorem.solidbodymotionandfluidmotion:energetics:electrontransport:electromagnetics:materials:particledynamics;projectiles;rigidbodydynamics;lagrangianformulation;eularianformulation;bernoulli’sequation;continuityequation;surfacetension;viscosity;brownianmotion.lawsofthermodynamics;conceptoffreeenergy;enthalpy,andentropy;equationofstate;thermodynamicsrelations.structureofatoms,conceptofenergylevel,bondtheory;definitionofconduction,semiconductorandinsulators;diode;halfwave&fullwaverectification;amplifiers&oscillators;truthtable.theoryofelectricandmagneticpotential&field;biot&savart’slaw;theoryofdipole;theoryofoscillationofelectron;maxwell’sequations;transmissiontheory;amplitude&frequencymodulation.periodictable;propertiesofelements;reactionofmaterials;metalsandnon-metals(inorganicmaterials),elementaryknowledgeofmonomericandpolymericcompounds;organometalliccompounds;crystalstructureandsymmetry,structure-propertycorrelation-metals,ceramics,andpolymers.syllabuspartc1.computerscienceandinformationtechnologybasicdiscretemathematics:countingprinciples,linearrecurrence,mathematicalinduction,equationsets,relationsandfunction,predicateandpropositionallogic.digitallogic:logicfunctions,minimization,designandsynthesisofcombinationalandsequentialcircuits;numberrepresentationandcomputerarithmetic(fixedandfloatingpoint).computerorganizationandarchitecture:machineinstructionsandaddressingmodes,aluanddata-path,cpucontroldesign,memoryinterface,i/ointerface(interruptanddmamode),instructionpipelining,cacheandmainmemory,secondarystorage.programminganddatastructures:programminginc;functions,recursion,parameterpassing,scope,binding;abstractdatatypes,arrays,stacks,queues,linkedlists,trees,binarysearchtrees,binaryheaps.algorithms:analysis,asymptoticnotation,notionsofspaceandtimecomplexity,worstandaveragecaseanalysis;design:greedyapproach,dynamicprogramming,divide-andconquer;treeandgraphtraversals,connectedcomponents,spanningtrees,shortestpaths;hashing,sorting,searching.asymptoticanalysis(best,worst,averagecases)oftimeandspace,upperandlowerbounds,basicconceptsofcomplexityclassesp,np,np-hard,np-complete.operatingsystem:processes,threads,inter-processcommunication,concurrency,synchronization,deadlock,cpuscheduling,memorymanagementandvirtualmemory,filesystems.databases:er-model,relationalmodel(relationalalgebra,tuplecalculus),databasedesign(integrityconstraints,normalforms),querylanguages(sql),filestructures(sequentialfiles,indexing,bandb+trees),transactionsandconcurrencycontrol.informationsystemsandsoftwareengineering:informationgathering,requirementandfeasibilityanalysis,dataflowdiagrams,processspecifications,input/outputdesign,processlifecycle,planningandmanagingtheproject,design,coding,testing,implementation,maintenance.2.electricalscienceselectriccircuitsandfields:nodeandmeshanalysis,transientresponseofdcandacnetworks,sinusoidalsteady-stateanalysis,resonance,basicfilterconcepts,idealcurrentandvoltagesources,thevenin’s,norton’sandsuperpositionandmaximumpowertransfertheorems,twoportnetworks,threephasecircuits,measurementofpowerinthreephasecircuits,gausstheorem,electricfieldandpotentialduetopoint,line,planeandsphericalchargedistributions,ampere’sandbiot-savart’slaws,inductance,dielectrics,capacitance.electricalmachines:magneticcircuitsmagneticcircuits,singlephasetransformer-equivalentcircuit,phasordiagram,tests,regulationandefficiency,threephasetransformers-connections,paralleloperation,auto-transformer;energyconversionprinciples,dcmachines-types,startingandspeedcontrolofdcmotors,threephaseinductionmotors-principles,types,performancecharacteristics,startingandspeedcontrol,singlephaseinductionmotors,synchronousmachinesperformance,regulationandparalleloperationofsynchronousmachineoperatingasgenerators,startingandspeedcontrolofsynchronousmotorsanditsapplications,servoandsteppermotors.powersystems:basicpowergenerationconcepts,transmissionlinemodelsandperformance,cableperformance,insulation,coronaandradiointerference,distributionsystems,per-unitquantities,busimpedanceandadmittancematrices,loadflow,voltageandfrequencycontrol,powerfactorcorrection;unbalancedanalysis,symmetricalcomponents,basicconceptsofprotectionandstability;introductiontohvdcsystems.controlsystems:principlesoffeedbackcontrol,transferfunction,blockdiagrams,steadystateerrors,routhandnyquisttechniques,bodeplots,rootloci,lag,leadandlead-lagcompensation;proportional,pi,pidcontrollers,statespacemodel,statetransitionmatrix,controllabilityandobservability.powerelectronicsanddrives:semiconductorpowerdevices-powerdiodes,powertransistors,thyristors,triacs,gtos,mosfets,igbts–theircharacteristicsandbasictriggeringcircuits;dioderectifiers,thyristorbasedlinecommutatedactodcconverters,dctodcconverters–buck,boost,buck-boost,c`uk,flyback,forward,push-pullconverters,singlephaseandthreephasedctoacinvertersandrelatedpulsewidthmodulationtechniques,stabilityofelectricdrives;speedcontrolissuesofdcmotors,inductionmotorsandsynchronousmotors.3.electronicsanalogcircuitsandsystems:electronicdevices:characteristicsandsmall-signalequivalentcircuitsofdiodes,bjtsandmosfets.diodecircuits:clipping,clampingandrectifier.biasingandbiasstabilityofbjtandfetamplifiers.amplifiers:single-andmulti-stage,differentialandoperational,feedback,andpower.frequencyresponseofamplifiers.op-ampcircuits:voltage-to-currentandcurrent-to-voltageconverters,activefilters,sinusoidaloscillators,wave-shapingcircuits,effectofpracticalparameters(inputbiascurrent,inputoffsetvoltage,openloopgain,inputresistance,cmrr).electronicmeasurements:voltage,current,impedance,time,phase,frequencymeasurements,oscilloscope.digitalcircuitsandsystems:booleanalgebraandminimizationofbooleanfunctions.logicgates,ttlandcmosicfamilies.combinatorialcircuits:arithmeticcircuits,codeconverters,multiplexersanddecoders.sequentialcircuits:latchesandflip-flops,countersandshift-registers.sample-and-holdcircuits,adcs,dacs.microprocessorsandmicrocontrollers:numbersystems,8085and8051architecture,memory,i/ointerfacing,serialandparallelcommunication.signalsandsystems:lineartimeinvariantsystems:impulseresponse,transferfunctionandfrequencyresponseoffirst-andsecondordersystems,convolution.randomsignalsandnoise:probability,randomvariables,probabilitydensityfunction,autocorrelation,powerspectraldensity.samplingtheorem,discrete-timesystems:impulseandfrequencyresponse,iirandfirfilters.communications:amplitudeandanglemodulationanddemodulation,frequencyandtimedivisionmultiplexing.pulsecodemodulation,amplitudeshiftkeying,frequencyshiftkeyingandpulseshiftkeyingfordigitalmodulation.bandwidthandsnrcalculations.informationtheoryandchannelcapacity.4.materialssciencestructure:atomicstructureandbondinginmaterials.crystalstructureofmaterials,crystalsystems,unitcellsandspacelattices,millerindicesofplanesanddirections,packinggeometryinmetallic,ionicandcovalentsolids.conceptofamorphous,singleandpolycrystallinestructuresandtheireffectonpropertiesofmaterials.imperfectionsincrystallinesolidsandtheirroleininfluencingvariousproperties.diffusion:fick''slawsandapplicationofdiffusion.metalsandalloys:solidsolutions,solubilitylimit,phaserule,binaryphasediagrams,intermediatephases,intermetalliccompounds,iron-ironcarbidephasediagram,heattreatmentofsteels,cold,hotworkingofmetals,recovery,recrystallizationandgraingrowth.microstrcture,propertiesandapplicationsofferrousandnon-ferrousalloys.ceramics,polymers,&composites:structure,properties,processingandapplicationsofceramics.classification,polymerization,structureandproperties,processingandapplications.propertiesandapplicationsofvariouscomposites.materialscharacterizationtools:x-raydiffraction,opticalmicroscopy,scanningelectronmicroscopyandtransmissionelectronmicroscopy,differentialthermalanalysis,differentialscanningcalorimetry.materialsproperties:stress-straindiagramsofmetallic,ceramicandpolymericmaterials,modulusofelasticity,yieldstrength,tensilestrength,toughness,elongation,plasticdeformation,viscoelasticity,hardness,impactstrength,creep,fatigue,ductileandbrittlefracture.heatcapacity,thermalconductivity,thermalexpansionofmaterials.conceptofenergybanddiagramformaterials-conductors,semiconductorsandinsulators,intrinsicandextrinsicsemiconductors,dielectricproperties.originofmagnetisminmetallicandceramicmaterials,paramagnetism,diamagnetism,antiferromagnetism,ferromagnetism,ferrimagnetism,magnetichysterisis.environmentaldegradation:corrosionandoxidationofmaterials,prevention.5.fluidmechanicsfluidproperties:relationbetweenstressandstrainratefornewtonianfluids;buoyancy,manometry,forcesonsubmergedbodies.kinematicseulerianandlagrangiandescriptionoffluidmotion,strainrateandvorticity;conceptoflocalandconvectiveaccelerations,steadyandunsteadyflowscontrolvolumebasedanalysiscontrolvolumeanalysisformass,momentumandenergy.differentialequationsofmassandmomentum(eulerequation),bernoulli''sequationanditsapplications,conceptoffluidrotation.potentialflow:vorticity,streamfunctionandvelocitypotentialfunction;elementaryflowfieldsandprinciplesofsuperposition,potentialflowpastacircularcylinder.dimensionalanalysis:conceptofgeometric,kinematicanddynamicsimilarity,non-dimensionalnumbersandtheirusage.viscousflowsnavier-stokesequations;exactsolutions;couetteflow,fully-developedpipeflow,hydrodynamiclubrication,basicideasoflaminarandturbulentflows,prandtl-mixinglength,frictionfactor,darcy-weisbachrelation,simplepipenetworks.boundarylayerqualitativeideasofboundarylayer,boundarylayerequation;separation,streamlinedandbluffbodies,dragandliftforces.measurementsbasicideasofflowmeasurementusingventurimeter,pitot-statictubeandorificeplate.6.solidmechanicsequivalentforcesystems;free-bodydiagrams;equilibriumequations;analysisofdeterminatetrussesandframes;friction;simpleparticledynamics;planekinematicsandkinetics;work-energyandimpulse-momentumprinciples;stressesandstrains;principalstressesandstrains;mohr''scircle;generalizedhooke''slaw;thermalstrain.axial,shearandbendingmomentdiagrams;axial,shearandbendingstresses;deflectionofbeams(symmetricbending);torsionincircularshafts;thinwalledpressurevessels.energymethods(catigliano’stheorems)foranalysis.combinedaxial,bendingandtorsionalaction;theoriesoffailure.bucklingofcolumns.freevibrationofsingledegreeoffreedomsystems.7.thermodynamicsbasicconcepts:continuum,macroscopicapproach,thermodynamicsystem(closedandopenorcontrolvolume);thermodynamicpropertiesandequilibrium;stateofasystem,statediagram,pathandprocess;differentmodesofwork;zerothlawofthermodynamics;conceptoftemperature;heat.firstlawofthermodynamics:energy,enthalpy,specificheats,firstlawappliedtoclosedsystemsandopensystems(controlvolumes),steadyandunsteadyflowanalysis.secondlawofthermodynamics:kelvin-planckandclausiusstatements,reversibleandirreversibleprocesses,carnottheorems,thermodynamictemperaturescale,clausiusinequalityandconceptofentropy,principleofincreaseofentropy,entropybalanceforclosedandopensystems,exergy(availability)andirreversibility,non-flowandflowexergy.propertiesofpuresubstances:thermodynamicpropertiesofpuresubstancesinsolid,liquidandvaporphases,p-v-tbehaviourofsimplecompressiblesubstances,phaserule,thermodynamicpropertytablesandcharts,idealandrealgases,equationsofstate,compressibilitychart.thermodynamicrelations:t-dsrelations,maxwellequations,joule-thomsoncoefficient,coefficientofvolumeexpansion,adiabaticandisothermalcompressibilities,clapeyronequation.thermodynamiccycles:carnotvapourpowercycle;simplerankinecycle,reheatandregenerativerankinecycle;airstandardcycles:ottocycle,dieselcycle,simplebraytoncycle,braytoncyclewithregeneration,reheatandintercooling;vapour-compressionrefrigerationcycle.idealgasmixtures:dalton''sandamagat''slaws,calculationsofproperties(internalenergy,enthalpy,entropy),air-watervapourmixturesandsimplethermodynamicprocessesinvolvingthem.', 4, '576575', 6, '2016-12-01', '', 'F', 'P', 3, 0, 0);
INSERT INTO `fts_letter_record` (`letter_id`, `sl_no`, `memo_no`, `issue_dt`, `cp_no`, `page_count`, `file_id`, `letter_name`, `user_id`, `content`, `sending_authority`, `subject`, `addressing_desig_id`, `reg_dt`, `location_path`, `regis_status`, `letter_move_status`, `addressing_user_id`, `register_id`, `attached_by`) VALUES
(2, 1, 2234, '2016-12-02', 0, 9, 1, '1480664053.pdf', 1, 'anintelligentsimulatorforteleroboticstrainingkhaledbelghith,rogernkambou,frodualdkabanza,andleohartmanabstract—romantutorisatutoringsystemthatusessophisticateddomainknowledgetomonitortheprogressofstudentsandadvisethemwhiletheyarelearninghowtooperateaspaceteleroboticsystem.itisintendedtohelptrainoperatorsofthespacestationremotemanipulatorsystem(ssrms)includingastronauts,operatorsinvolvedinground-basedcontrolofssrmsandtechnicalsupportstaff.currently,thereisonlyasingletrainingfacilityforssrmsoperationsanditisheavilyscheduled.thetrainingstafftimeisinheavydemandforteachingstudents,planningtrainingtasks,developingteachingmaterial,andnewteachingtools.forexample,allssrmssimulationexercisesaredevelopedbyhandandthisprocessrequiresalotofstafftime.onceinanorbitissastronautscurrentlyhaveonlysimpleweb-basedmaterialforskilldevelopmentandmaintenance.forlongdurationspaceflights,astronautswillrequiresophisticatedsimulationtoolstomaintainskills.romantutoraddressesthesechallengesbyprovidingaportabletrainingtoolthatcanbeinstalledanywhereandanytimetoprovide“justintime”training.itincorporatesamodelofthesystemoperationscurriculum,akinematicsimulationoftheroboticsequipment,andtheiss,ahighperformancepathplannerandanautomatictaskdemonstrationgenerator.foreachelementofthecurriculumthatthestudentissupposedtomaster,romantutorgeneratesexampletasksforthestudenttoaccomplishwithinthesimulationenvironmentandthenmonitorsitsprogressiontoproviderelevantfeedbackwhenneeded.althoughmotivatedbythessrmsapplication,romantutorremainsapplicabletoanyteleroboticssystemapplication.indexterms—teleroboticstraining,intelligenttutoring,robotmanipulation,pathplanning,demonstrationgeneration.??1introductionromantutor(robotmanipulationtutor)isasimulation-basedtutoringsystemtosupportastronautsinlearninghowtooperatethespacestationremotemanipulator(ssrms),anarticulatedrobotarmmountedontheinternationalspacestation(iss).onceinorbit,issastronautscurrentlyhaveonlysimpleweb-basedmaterialforskilldevelopmentandmaintenance.forlongdurationspaceflights,astronautswillrequiresophisticatedsimula-tiontoolstomaintainskills.romantutoraddressesthesechallengesbyprovidingaportabletrainingtoolthatcanbeinstalledanywhereandanytimetoprovide“justintime”training.fig.1includesaimageofthessrmsontheiss.astronautsoperatethessrmsfromaroboticworkstationlocatedinsideoneoftheisscompartments.fig.1alsoshowstheworkstationwhichhasaninterfacewiththreemonitors,eachofwhichcanbeconnectedtoanyofthe14camerasplacedatstrategiclocationsontheexterioroftheiss.romantutor’suserinterfaceinfig.2includesthemostimportantfeaturesoftheroboticworkstation.thessrmsisakeycomponentoftheissandisusedintheassembly,maintenance,andrepairofthestation,andalsoformovingpayloadsfromvisitingshuttles.operatorsmanipulatingthessrmsonorbitreceivesupportfromgroundoperations.partofthissupportconsistsofvisualiz-ingandvalidatingmaneuversbeforetheyareactuallycarriedoutontheiss.operatorshaveinprinciplerehearsedthemaneuversmanytimesonthegroundpriortothemission,butunexpectedchangesarefrequentduringthemission.insuchcases,groundoperatorsmayhavetogenerate3danimationsforthenewmaneuversanduploadthemtotheoperatoronthestation.sofar,thegenerationofthese3danimationsaredonemanuallybycomputergraphicprogrammersandthusareverytimeconsuming.ssrmscanbeinvolvedinvarioustasksontheiss,includingmovingaloadfromoneplaceofthestationtoanother,inspectingtheissstructure(usingacameraonthearm’sendeffector)andmakingrepairs.thesetasksmustbecarriedoutverycarefullytoavoidcollisionswiththeissstructureandtomaintainsafety-operatingconstraintsonthessrms(suchasavoidingself-collisionsandsingula-rities).atdifferentphasesofagivenmanipulation,theastronautmustchooseasettingofcamerasthatprovideshimwiththebestvisibilitywhilemaintainingawarenessofhisprogressonthetask.thus,astronautsaretrainednotonlytooperatethearmitself,butalsotorecognizevisualcuesonthestationthatarecrucialinmentallyreconstruct-ingtheactualworkingenvironmentfromthepartialandrestrictedviewsprovidedbythethreemonitors,andtoselectcamerasdependingonthetaskandotherparameters.onechallengeindevelopingagoodtrainingsimulatoris,ofcourse,tobuilditsothatonecanreasonaboutit.thisisevenmoreimportantwhenthesimulatorisbuiltfortrainingpurposes[1].untilnow,simulation-basedtutoringisieeetransactionsonlearningtechnologies,vol.5,no.1,january-march201211.k.belghithandf.kabanzaarewiththedepartmentofcomputerscience,universityofsherbrooke,sherbrooke,qcj1k2r1,canada.e-mail:{khaled.belghith,kabanza}@usherbrooke.ca..r.nkambouiswiththedepartmentofcomputerscience,universityofquebecatmontreal,201,av.przsident-kennedy,montreal,qch2x3y7,canada.e-mail:nkambou.roger@uqam.ca..l.hartmaniswiththecanadianspaceagency,6767airportrd.,st-hubert,qcj3y8y9,canada.e-mail:leo.hartman@asc-csa.gc.ca.manuscriptreceived30may2010;revised16nov.2010;accepted4feb.2011;publishedonline30mar.2011.forinformationonobtainingreprintsofthisarticle,pleasesende-mailto:lt@computer.org,andreferenceieeecslognumbertlt-2010-05-0083.digitalobjectidentifierno.10.1109/tlt.2011.19.1939-1382/12/$31.002012ieeepublishedbytheieeecs&espossibleonlyifthereisanexplicitmodelorrepresentationoftheproblemspaceassociatedwithtrainingtasks.theexplicitrepresentationisrequiredinordertotrackstudentactions,toidentifyiftheseactionsarestillonapathtoasolutionandtogeneraterelevanttutoringfeedback[2],[3].knowledgeandmodeltracingareonlypossibleintheseconditions[4].itisnotalwayspossibletodevelopanexplicitcomprehensivetaskstructureincomplexdomains,espe-ciallyindomainswherespatialknowledgeisused,astherearemanypossiblewaystosolveagivenproblem.therobotmanipulationthatromantutorfocusesonisanexampleofsuchadomain.foreachrobotmanipulationtask,thereisacombinatorialexplosionofpossiblesolutionsformovingssrmsfromoneplacetoanotherintheissenvironment.suchdomainshasbeenidentifiedas“ill-structured”[5],[6].conventionaltutoringapproachessuchasmodel-tra-cing[7]orconstraint-basedmodeling[8]areverylimitedwhenappliedon“ill-structured”domains.amodel-tracingapproachconsistsofcomparingapredefinedtaskmodelwithastudent’ssolution.inthecontextofrobotmanipulations,becauseoftheinfinityofsolutionswehaveassociatedwitheachtask,designingataskmodelbyhandbecomespracticallyinfeasible.applyingaconstraint-basedmodelingapproachinthecontextofrobotmanipulationswillalsofacethesamekindoflimitations.here,identify-ingtheconstraintsassociatedwithrobotmanipulationtaskscanbedifficultandverytimeconsuming.sinceahugenumberofconstraintsisrequiredtoachieveanadequateleveloftutoringassistance[6],theapproachbecomesimpractical.toovercometheselimitations,weproposeasolutiontothisissuebyintegratingasophisticatedpathplannerfadprm[9]asadomainexpertsystemtosupportspatialreasoningwithinthesimulatorandmakemodeltracingtutoringpossiblewithoutanyexplicittaskstructure.flexibleanytimedynamicprmpathplanner(fadprm)isanextensiontotheprmplanningframework[10]tohandleregionstowhichweassignpreferenceswithincomplexworkspaces.bybeingflexibleinthisway,fadprmnotonlycomputescollisionfreepathsbutalsocapableoftakingintoaccounttheplacementofcamerasontheiss,thelightingconditionsandothersafetyconstraintsonoperatingthessrms.thisallowsthegenerationofcollision-freetrajectoriesinwhichtherobotstayswithinregionsvisiblethroughcamerasandinwhichthemanip-ulationis,therefore,saferandeasier.fadprmalsoimplementsadynamicstrategytoadaptefficientlytodynamicchangesintheenvironmentandreplanontheflybyexploitingresultsfrompreviousplanningphases.fadprmalsoimplementsananytimestrategytoprovideacorrectbutlikelysuboptimalsolutionveryquicklyandthenincrementallyimprovethequalityofthissolutionifmoreplanningtimeisallowed.romantutorusesthedifferentcapabilitiesimplementedwithinthefadprmpathplannertoprovideusefulfeedbacktoastudentoperatingthessrmssimulation.toillustrate,whenastudentislearningtomoveapayloadwiththerobot,romantutorinvokesthefadprmpath-plannerperiodicallytocheckwhetherthereisapathfromthecurrentconfigurationtothetargetandprovidesfeed-backaccordingly.byusingfadprmasarobotmanipula-tiondomainexpert,wefollowan“expertsystemapproach”tosupportthetutoringprocesswithinromantutor.thisapproachhasprovensuccessfulandhasbeenusedwithindifferentwell-knownintelligenttutoringsystemssuchassophiei[11]andguidon[12].butinourcase,weareapplyingitinthecontextofrobotmanipulations,an“ill-structured”domain.wealsodevelopedwithinromantutoranautomatictaskdemonstrationgenerator(atdg)[13],whichgener-ates3danimationsthatdemonstratehowtoperformagiventaskwiththessrms.theatdgisintegratedwiththefadprmpathplannerandcancontributetogroundsupportofssrmsoperationsbygeneratingusefultaskdemonstrationsontheflythathelpthestudentcarryouthistasks.atdgincludesacomponentbasedontlplan[14]forcameraplanninganduseslineartemporallogic(ltl)asthelanguageforspecifyingcinematographicprinciplesandfilmingpreferences.arobottrajectoryisfirstgeneratedbyfadprmandtlplanisthencalledtofindthebestsequenceofcamerashotsfollowingtherobotonitspath.inthenextsection,westartbypresentingfadprmandatdgindetail.wethendescriberomantutor’sinternalarchitectureandoutlineitsbasicfunctionalities.afterenumeratingthetasksonwhichastudentistrainedwithinromantutor,wedescribetheapproachesfollowedtoprovidethetutoringassistance.inafollowingsection,weshowhowtheuseoffadprmasadomainexpertwithinthesimulatorhelpedinprovidingveryrelevanttutoringfeedbacktothestudent.wefinallyconcludewithadiscussiononrelatedwork.12ieeetransactionsonlearningtechnologies,vol.5,no.1,january-march2012fig.1.ssrmsontheiss(left)andtheroboticworkstation(right).fig.2.romantutorinterface.2fadprmpathplannerinitstraditionalform,thepathplanningproblemistoplanapathforamovingbody(typicallyarobot)fromagivenstartconfigurationtoagivengoalconfigurationinaworkspacecontainingasetofobstacles.thebasicconstraintonsolutionpathsistoavoidcollisionwithobstacles,whichwecallherebyahardconstraint.thereexistnumerousapproachesforpathplanningunderthisconstraint[10],[15],[16],[17],[18].inordertotakeintoaccountthevisibilityconstraintswehaveinthessrmsenvironment,wedevelopedanewclassofflexiblepathplannersfadprm[9]abletoexpressandtakeintoaccountpreferencesinthenavigationoftherobotwithinverycomplexenvironments.inadditiontotheobstaclestherobotmustavoid,ourapproachtakesaccountofdesiredandundesired(ordangerous)zones.thiswillmakeitpossibletotakeintoaccounttheplacementofcamerasonthestation.thus,ourplannerwilltrytokeeptherobotinzonesofferingthebestpossiblevisibilityofprogressonthetaskwhiletryingtoavoidzoneswithreducedvisibility.therobotfreeworkspaceissegmentedintozoneswitheachzonehavinganassociateddegreeofdesirability(dd),thatis,arealnumberintheinterval[01],dependingonthetask,visualcuepositions,camerapositions,andlightingconditions.theclosertheddisto1,themorethezoneisdesired.safecorridorsarezoneswithddnearto1,whereasunsafecorridorsarethosewithddintheneighborhoodof0.azonecoveringthefieldofviewofacamerawillbeassignedahighddandwillhaveaconeshape;whereas,azonewithverylimitedlightingconditionswillbecon-sideredasannondesiredzonewithaddnear0andwilltakeanarbitrarypolygonalshape.fig.3illustratesatrajectoryofthessrmsgoingthroughthreecamerasfieldsofview(threecones)andavoidinganondesiredzone(rectangularbox).forefficientpathplanning,wepreprocesstherobotworkspaceintoaroadmapofcollision-freerobotmotionsinregionswithhighestdesirabilitydegree.moreprecisely,theroadmapisagraphsuchthateverynodeninthegraphislabeledwithitscorrespondingrobotconfigurationn.q.anditsdegreeofdesirabilityn.dd,whichistheaverageofddofzonesoverlappingwithn.q.anedge(n,n’)connectingtwonodesisalsoassignedaddequaltotheaverageofddofconfigurationsinthepathsegment(n.q,n’.q).theddofapath(i.e.,asequenceofnodes)isanaverageofddofitsedges.followingprobabilisticroadmapmethods(prm)[19],webuildtheroadmapbypickingrobotconfigurationsprobabilistically,withaprobabilitythatisbiasedbythedensityofobstacles.apathisthenasequenceofcollisionfreeedgesintheroadmap,connectingtheinitialandgoalconfiguration.followingtheanytimedynamica(ad)approach[20],togetnewpathswhentheconditionsdefiningsafezoneshavedynamicallychanged,wecanquicklyreplanbyexploitingthepreviousroadmap.ontheotherhand,pathsarecomputedthroughincrementalimprovementssotheplannercanbestoppedatanytimetoprovideacollision-freepath(i.e.,anytimeafterthefirstsuchpathhasbeenfound)andthemoretimeitisgiven,themorethepathisoptimizedtomovethroughdesirablezones.fadprmworksasfollows:theinputisaninitialconfiguration,agoalconfiguration,a3dmodelofobstaclesintheworkspace,a3dspecificationofzoneswithcorrespondingdd,anda3dmodeloftherobot.giventhisinput:.tofindapathconnectingtheinitialandgoalconfigurations,wesearchbackwardfromthegoaltowardtheinitial(current)robotconfiguration.backwardsearchinsteadofforwardsearchisdonebecausetherobotmovesand,hence,itscurrentconfigurationisnotingeneraltheinitialconfigura-tion;wewanttorecomputeapathtothesamegoalwhentheenvironmentchangesbeforethegoalisreached..aprobabilisticqueueopencontainsnodesofthefrontierofthecurrentroadmap(i.e.,nodesareexpandedbecausetheyareneworbecausetheyhavepreviouslybeenexpandedbutarenolongeruptodatew.r.t.tothedesiredpath)andalistclosedcontainsnonfrontiernodes(i.e.,nodesalreadyexpanded)..searchconsistsofrepeatedlypickinganodefromopen,generatingitspredecessorsandputtingthenewonesoroutofdateonesinopen..thedensityofanodeisthenumberofnodesintheroadmapwithconfigurationsthatareashortdistanceaway(proximitybeinganempiricallysetparameter,takingintoaccounttheobstaclesinanapplicationdomain).thedistanceestimatetothegoaltakesintoaccountthenode’sddandtheeuclideandistancetothegoal.anodeninopenisselectedforexpansionwithprobabilitypropor-tionalto??1??=density??n????goaldistanceestimate??n??with01:thisequationimplementsabalancebetweenfast-solutionsearchandbest-solutionsearchbychoosingdifferentvaluesfor.withnearto0,thechoiceofanodetobeexpandedfromopendependsonlyonthedensityaroundit.thatis,nodeswithlowerdensitywillbechosenfirst,whichistheheuristicusedintraditionalprmapproachestoguaranteethebelghithetal.:anintelligentsimulatorforteleroboticstraining13fig.3.ssrmsgoingthroughthreedifferentcamerasfieldsofview(cones)andavoidinganondesiredzone(rectangularbox).diffusionofnodesandtoacceleratethesearchforapath[19].asapproaches1,thechoiceofanodetobeexpandedfromopenwillratherdependonitsestimateddistancetothegoal.inthiscase,weareseekingoptimalityratherthanthespeedoffindingasolution..toincreasetheresolutionoftheroadmap,anewpredecessorisrandomlygeneratedwithinasmallneighborhoodradius(thatis,theradiusisfixedempiricallybasedonthedensityofobstaclesintheworkspace)andaddedtothelistofsuccessorsintheroadmapgeneratedsofar.theentirelistofpredecessorsisreturned..collisionisdelayed:detectionofcollisionsontheedgesbetweenthecurrentnodeanditspredecessorsisdelayeduntilacandidatesolutionisfound;ifthereisacollision,webacktrack.collisionsthathavealreadybeendetectedarestoredintheroad-maptoavoiddoingthemagain..therobotmaystartexecutingthefirstpathfound..concurrently,thepathcontinuesbeingimprovedbyreplanningwithanincreasedvalueof..changesintheenvironment(movingobstaclesorchangesinddforzones)causeupdatesoftheroadmapandreplanning.thecalculationofaconfigurationddandapathddisastraightforwardextensionofcollisioncheckingforconfig-urationsandpathsegments.forthis,wecustomizedtheproximityquerypackage(pqp)[21].the3dmodelsfortheiss,thessrms,andzonesareimplementedusingacustomizationofsilicongraphics’openinventor.therobotismodeledusingmotionplanningkit(mpk),thatis,animplementationofsanchezandlatombe’sprmplanner[19].3theautomatictaskdemonstrationgeneratortheautomatictaskdemonstrationgenerator[13]takesasinputastartandagoalconfigurationofthessrms.atdgwillgenerateamovie1demonstrationoftherequiredmanipulationsthatbringthessrmsfromthestartconfig-urationtothegoalconfiguration.thetopfigureinfig.4showstheinternalarchitectureoftheatdg.thebottomoneshowsthedifferentstepsthedatagothroughinordertotransformthetwogivenconfigurationsintoacompletemoviedemonstration.first,atdgcallsthefadprmpathplannertogenerateacollisionfreepathbetweenthetwogivenconfigurations.thepathisthenpassedtothetrajectoryparserwhichseparatesitintocategorizedsegments.thiswillturnthecontinuoustrajectoryintoasuccessionofscenes,whereeachscenecanbefilmedbyaspecificgroupofidioms.anidiomisasuccessionofshotsthatrepresentsastereotypicalwaytofilmascenecategory.theparserlooksforuniformityinthemovementsofthessrmstodetectandrecognizethecategoryofscenes.oncethepathisparsed,acallismadetothecameraplannertlplantofindthebestshotsthatbestconveyeachscene,whilemakingsurethewholeispleasingandcomprehensive.theuseoftlplanasacameraplannerwithinatdgprovidestwoadvantages.first,lineartemporallogic,thelanguageusedbytlplanismoreexpressive,yetwithasimplerdefinedsemantics,thanpreviouscameraplanninglanguagessuchasdccl[22].forinstance,wecanexpressarbitrarytemporalconditionsabouttheorderinwhichobjectsshouldbefilmed,whichobjectsshouldremaininthebackgrounduntilsomeconditionbecometrue,andmorecomplexconstraintsthattheltllanguagecanexpress.second,tlplanismorepowerfulthanothercameraplannerspresentedintheliteraturesuchas[22],[23],[24],[25]becausewithtlplan,ltlshotcompositionrulesprovideasearchpruningcapability.inatdg,eachshotintheidiomisdistinguishedbythreekeyattributes:shottype,cameraplacementmode,camerazoomingmode..shottypes:fiveshottypesarecurrentlydefinedintheatdgsystem:static,goby,pan,track,andpov.astaticshotisdonefromastaticcamerawhentherobotisinaconstantpositionormovingslowly.agobyshothasthecamerainastaticpositionshowingtherobotinmovement.forapanshot,thecameraisinastaticpositionbutdoingincrementalrotationsfollowingthemovementoftherobot.atrackshothasthecamerafollowingtherobotandkeepingaconstantpositionrelativetoit.finally,thepovshothasthecameraplaceddirectlyonthessrms,movingwiththerobot..cameraplacements:foreachshottype,thecameracanbeplacedinfivedifferentwaysaccordingtosomegivenlineofinterest:external,parallel,internal,apex,andexternalii.currently,wetakethetrajectoryoftherobot’scenterofgravityasthelineofinterestwhichallowsfilmingofanumberofmanytypicalmaneuvers.forlargercoverage14ieeetransactionsonlearningtechnologies,vol.5,no.1,january-march2012fig.4.atdgarchitecture.1.thispaperhasthreesupplementalmoviefiles,whichcanbefoundonthecomputersocietydigitallibraryathttp://doi.ieeecomputersociety.org/10.1109/tlt.2011.19.ofmaneuvers,additionallinesofinterestwillbeaddedlater..zoommodes:foreachshottypeandcameraplacement,thezoomofthecameracanbeinfivedifferentmodes:extremecloseup,closeup,mediumview,fullview,andlongview.fig.5showsanidiomillustratingtheanchoringofanewcomponentontheiss.itstartswithatrackshotfollowingtherobotwhilemovingonthetruss.then,anothertrackshotfollowsthatshowstherotationofonejointontherobottoalignwiththeissstructure.andfinallythereisastaticshotfocusingontheanchoringoperation.intlplan,idiomsarespecifiedintheplanningdefinitionlanguage(pddl3.0).intuitively,apddloperatorspecifiespreferencesaboutshottypesintimeandinspacedependingontherobotmaneuver.parsingthetrajectoryoftherobotwiththesuccessivescenesperformed,tlplanwilltrytofindasuccessionofshotsthatcapturesthebestpossibleidioms.tlplanalsotakesintoaccountcinematicprinciplestoensureconsistencyoftheresultingmovie.idiomsandcinematicprinciplesareinfactencodedintheformoftemporallogicformulaswithintheplanner.tlplanusesalsoanocclusiondetectortomakesurethessrmsisvisibleallthetime.oncetlplanisdone,weareleftwithalistofshotsthatispassedtotherenderingsystemtocreatetheanimation.therendererusesboththeshotsgivenbytlplanandthessrmstrajectoryinordertopositionthecamerasinrelationwiththessrms,generatingthefinaltaskdemonstration.foreachssrmsmovementtype(orscene),wehaveseveralidioms(from6to10inthecurrentimplementation)andeachidiomisdefinedbytakingintoaccountthecomplexityofthemovement,thegeometryoftheiss,thevisualcuesontheiss,andthepreferencesoftheviewer.forexample,ifthessrmsandthemobilebasearemovingalongthemaintrussoftheiss,itisimportantthatthecamerashowsnotonlytheentirearmbutalsosomevisualcuesontheisssotheoperatorcangetasenseofsituationalawarenessfortherelocationofthebaseofthearm.consequently,theidiomsforthismanipulationwillinvolveshotswithafullorlongviewzoom.incontrast,move-mentsinvolvingtheendeffectorrequireahighprecision,soanextremecloseupzoomwillbeinvolved.someoftheseparameterscanalsobesetdirectlybytheuser’spreferences.theusercanchoose,forexample,toalwayspreferaprecisesetofcamerastouseforthefilming.theusercanalsochoosesomepartsofthessrmsthefilmshouldfocusonthemorepossible.4romantutorarchitectureandbasicfunctionalities4.1architectureandmaincomponentsromantutorworkswithanyrobotmanipulatorprovideda3dmodeloftherobotanditsworkspacearespecified.romantutor’sarchitectureincludesthefollowingcompo-nents(fig.6):thegraphicuserinterface,thestatereflector,thefadprmpathplanner,theautomatictaskdemonstra-tiongenerator,thetutoringmoduleandthesimulatorcorewithseveralthird-partylibraries:proximityquerypackage[21],openinventorfromsilicongraphics,andmotionplanningkit[19].asshowninfig.2,romantutor’suserinterfacehasthreescreens(forthethreemonitors).thekeyboardisusedtooperatetherobot(thessrmsinourcase).incommandmode,onecontrolsthejointsdirectly;inautomaticmode,onemovestheendeffector,smallincrementsatatime,relyingoninversekinematicstocalculatethejointrotations.infig.2,differentcamerasareselected,displayingthesamerobotconfigurationfromdifferentviewpoints.theper-spectivecamera(ontheleft)caninspecttheentireiss3dmodel.itisusedintrainingtasksaimedathelpingastudenttodevelopamental3dmodeloftheisseventhoughthereisnosuchcameraontheiss.normaltrainingusessmallphysicalmodelsoftheissforthesamepurpose.inromantutorstudentscouldcarryoutseveralkindsoftrainingtasksthatwedescribemoreformallyinthenextsection.thestatereflectorperiodicallyupdatesthestudent’sactions(i.e.,keyboardinputs)andtheireffectsontheissenvironment(robotconfiguration,camerasmappedtothemonitors,theirviewangles,andtheoperationmode).italsomonitorslightingconditions.4.2trainingtaskstrainingtaskscanbeclassifiedasopen,recognition,localization,orrobotmanipulation.opentasksarethoseinwhichthestudentinteractswiththesimulator,withoutanyformallysetgoal,withminimalassistanceconfiguredinthesystem’spreferences(e.g.,collisionwarningandavoidance).recognitiontaskstraintorecognizethedifferentelementsintheworkspace.anexampleistoshowapictureofanelementoftheissandaskthestudenttonameitanddescribeitsfunction.localizationtaskstraintolocatevisualcuesorisselementsandtorelatethembelghithetal.:anintelligentsimulatorforteleroboticstraining15fig.5.idiomtofilmthessrmsanchoringanewcomponentontheiss.fig.6.romantutorarchitecture.spatiallytootherelements.anexampleistoshowapictureofavisualcueandaskthestudenttomakeitvisibleonthescreenusinganappropriateselectionofcameras;orwecanasktonameelementsthatareaboveanotherelementshownonthescreen.robotmanipulationtasksdealwithmovingthemanip-ulator(avoidingcollisionandsingularities,usingtheappropriatespeed,switchingcamerasasappropriate,andusingtherightoperationmodeatdifferentstages),berthing,ormating.anillustrationistomovethearmfromonepositiontoanother,withorwithoutapayload.anotherexampleistoinspectanindicatedcomponentoftheissusingacameraontheendeffector.thesetasksrequirethestudenttobeabletodefineacorridorinafreeworkspaceforasafeoperationoftherobotandfollowit.thestudentmustdothisbasedonthetask,thelocationofcamerasandvisualcues,andthecurrentlightingcondi-tions.thereforelocalizationandnavigationareimportantinrobotoperations.robotmanipulationtasksaremademoreorlessunpredictablebydynamicallychangingthelightingconditions,thusrequiringtherevalidationofsafecorridors.4.3tutoringapproachesinromantutorthefeedbackgeneratorinsidethetutoringmodule(fig.6)periodicallychecksthecurrentstatetotriggerfeedbacktothestudent,usingrulesthatareprecondi-tionedonthecurrentstateinformationandthecurrentgoal.forthecaseofopen,recognitionandlocalizationtasks,theserulesare“puredomain-dependentpedagogicalrules”relatedtotaskmodelsdesignedbyhand.forrobotmanipulationtaskswithagoal,theyaregenericpedago-gicalrules.feedbackrulestakeintoaccounthowlongthestudenthasbeentryingonasubtaskandhowgoodorbadheisprogressingonit.inthecontextofopen,recognition,andlocalizationtasks,providingtutoringassistanceseemsstraightfor-ward.thedomainknowledgeiswelldefined:whatelementorcueoftheisstorecognizeortolocalize?whatcameratochooseandwhen?,etc.here,wefollowamodel-tracingapproachanddefineforeachcategoryoftasksawellstructuredtaskmodeltosupportthetutoringprocess.taskmodelsaredesignedbyhandstartingfromrecommendationsprovidedbyhumanexpertsandarestructuredintheformofagraphencodingif-thenrules.thefeedbackgeneratorusesthepredefinedtaskgraphstovalidatestudentactions,identifygapsandprovidefeedbackaccordingly.aswestatedpreviouslyinanearlysection,thedomainofrobotmanipulationsisan“ill-structured”domainwhereclassicaltutoringapproachesstarttolooseefficiencyandshowlimitations.toovercometheselimitations,wechoosetofollowan“expertsystemapproach”andusethefadprmpathplannerasadomainexpertinoursystemtosupportthetutoringprocess.inthecontextofrobotmanipulationtasks,thefeedbackgeneratorevaluatesstudentactionsbycomparingittotheoptimalsolutionsfoundbyfadprmandprovidesusefulfeedbackaccord-ingly.thetutoringprocessthatusesfadprmasanexpertofthedomainknowledgeisdescribedinmoredetailsinthenextsection.oneoftheveryimportantearlyresultsinintelligenttutoringresearchistheimportanceofthecognitivefidelityofthedomainknowledgemodule.thatis,itisimportantforthetutortoreasonabouttheprobleminthesamewaythathumansdo[26].approachesformodelingadomainexpertwithinintelligenttutoringsystemscanbegroupedintothreemaincategories:blackboxmodels,glassboxmodels,andcognitivemodels[27].themaindifferencebetweenthesemodelsliesinthecognitivefidelitywithwhicheachmodelrepresentstheexpertdomainknowledge.ablackboxmodeldescribesproblemstatesdifferentlythanthestudent.theclassicexampleofsuchasystemissophiei[11].sophieiisatutorforelectronictrouble-shootingthatuseditsexpertsystemtoevaluatethemeasurementsstudentsweremakingintroubleshootingacircuit.theexpertsystemmadeitsdecisionsonlybysolvingsetsofequations.aglassboxmodelisanintermediatemodelthatreasonsintermsofthesamedomainconstructsasthehumanexpert.however,themodelreasonswithadifferentcontrolstructurethanthehumanexpert.aclassicexampleofsuchasystemisguidon[12],atutoringsystemformedicaldiagnosis.thissystemwasbuiltaroundmycin,anexpertsystemforthetreatmentofbacterialinfections.acognitiveapproach,ontheotherhand,aimstodevelopacognitivemodelofthedomainknowledgethatcapturesthewayknowledgeisrepresentedinthehumanmindinordertomakethetutorrespondtoproblem-solvingsituationsinawayverysimilartohumans.thisapproach,incontrasttotheotherapproaches,hasasanobjectivetosupportcognitivelyplausiblereasoning[27].agoodexampleforsuchatutoringsystemissherlock[28],anotherpracticeenvironmentforelectronicstroubleshooting.sherlockusedaproceduraldomainknowledgerepresentationbasedonacognitiveanalysisofhumanskillacquisition.atdifferentphasesofagivenmanipulationsuchasmovingapayloadusingthessrms(fig.5),theastronautmustchoosethebestsettingofcamerasthatprovideshimwiththebestvisibilitywhilekeepingagoodappreciationofhisevolutioninthetask.thus,astronautsaretrainednotonlytomanipulatethearmperse,butalsotorecognizethebestcamerassuitabletofilmagivenconfigurationofthessrmswithintheissenvironment.here,astronautsneedtomentallyreconstructtheactualworkingenvironmentfromjustthreemonitorseachgivingapartialandrestrictedview.thefadprmplannertriestokeepthessrmsinzonesofferingthebestpossiblevisibilityoftheprogressonthetaskwhiletryingtoavoidzoneswithreducedvisibility.bytakingintoaccounttheplacementofcamerasontheiss,fadprmreasonsaboutactionsinawayverysimilartostudents:foreachportionofthepath,fadprmtriestheenterthefieldofviewofthebestsuitablecameraavailable.thus,theuseoffadprmasadomainexpertinromantutorresultsinatutoringapproachthatliesinbetweenaglassboxapproachandacognitiveapproach.evenifweareapplyingitinthecontextofan“ill-structured”domain,webelievethatthiswillguaranteegoodqualityofthetutoringprovidedtothestudent,atleastatthesamelevelastheoneprovidedbyaglassboxmodellikeguidon.inthe16ieeetransactionsonlearningtechnologies,vol.5,no.1,january-march2012nextsection,wedescribeandevaluatethetutoringprovidedusingfadprmasanexpertofthedomaintoastudentworkingonrobotmanipulationtasks.5fadprmasadomainexpertinromantutorromantutorinitiatesarobotmanipulationtaskandmonitorsthestudent’sprogresstowardaccomplishingit.studentsbeginthetaskandcanaskromantutorforhelporforarecommendationaboutwhattodonext.studentscanaskromantutorabouthowtoavoidacollisionwithanearbyobstacle,howtogotoadesiredlocationintheworkspaceorhowtogothroughadesiredzone.inthissituation,thefeedbackgeneratorcallstheatdg(whichcallsthefadprmplanner)tocomputeandshowamovieillustratinghowtocompletethemanipulationtask.iftheobjectiveistogivetheoperatorasenseofthetaskashewillbeseeingitfromthecommandandcontrolworkstation,thenvirtualcamerapositionswillbeselectedfromthe14camerasontheexterioroftheiss.butiftheobjectiveistoconveysomecognitiveawarenessofthetask,thenvirtualcamerasareselectedaroundtherobotwhilemovingonitstrajectorytobesthelptheoperatorgainamaximalcognitiveawareness.theobjectiveissetmanuallybythelearnerthroughromantutor’sinterfacetooneofthefollowingvalues“usecamerasoniss”or“usevirtualcameras.”usingtherealtimedynamiccapabilityofthefadprmpathplanner,thefeedbackgeneratormonitorsthestu-dent’sactivityinthestatereflectortovalidateincremen-tallystudent’sactionorsequenceofactions,giveinformationaboutthenextrelevantactionorsequenceofactions.thefeedbackgeneratorregularlyevaluateswhetherthetaskcanbecompletedfromthecurrentconfigurationofthemanipulatorandwhetheritcanbecompletedefficiently.atthepointatwhichitdiscoversthatthestudentwouldhavetobacktrackfromthecurrentpositionorthatachievingthetasktakesmorethanthetimeplannedforit,thefeedbackgeneratorwillinterveneandbegintoshowthestudentamoreefficienttrajectory.onceabetterinitialtrajectoryhasbeendemonstrated,thestudentcantakecontrolandresumethetask.thiserror-promptedturntakingrepeatsuntilthetaskiscompleted(fig.7).weseeheretheimportanceofhavingfadprmasaplannerinoursystemtoguidetheoperationsbythestudent.bytakingintoaccounttheplacementofthecamerasonthestation,weareassuredthattheplanshowntothestudentpassesthroughzonesthatarevisiblefromcamerasplacedintheissenvironmentandcanthenbefollowedbythestudent.toevaluatethetutoringmechanicsweimplementedtosupportastudentworkingonrobotmanipulationtasks,wecomparethetypesoffeedbackweprovideinourapplica-tiontothoseprovidedbyaclassicintelligenttutoringsystemsherlock[28]thatisknowntobeefficient.sherlockisapracticeenvironmentforelectronicstroubleshootingandprovidesadviceonproblemsolvingstepsuponstudentrequest.fourtypesoffeedbackareavailable[26]:1.adviceonwhattestactiontocarryoutandhow,2.adviceonhowtoreadtheoutcomeofthetest,3.adviceonwhatconclusioncanbedrawnfromthetest,and4.adviceonwhatoptiontopursuenext.asdescribedearlier,our“fadprmasadomainexpert”tutoringapproachprovidesfeedbacknotonlyuponrequestbutalsointervenesautomaticallywhenitdetectserrorsordifficultiesexperiencedbythestudent.differenttypesoffeedbackarealsoavailable:1.adviceonwhatcurrentaction(ormanipulation)toexecuteandhowbyshowingavalidpathtothecurrentgoalorbyshowingamoviecomputedwithatdg;2.adviceonhowtoavoiderrorswhileprogressingonataskbyshowingpathsthatavoidanearbyobstacleorbyshowingmoviesrecordedfromthemostusefulcameras.3.adviceonwhatconclusioncanbedrawnfromtheerrorsmadebydetectingincorrectchoicesmadebythestudentandbyproposingtherightpathtofollow,and4.adviceonwhatfutureactionorsequenceofactionstopursuenextinordertoreachthegoal.forthefeedbackoftypes2and3,thecurrenttraceofactions(robotmanipulationsandcameraselections)madebythelearnerinordertoreachthecurrentconfigurationissaved.acallisthenmadetofadprmandatdgtoevaluatethecurrenttrace,todiagnosisandidentifyerrorsandproposeimprovements:bettermanipulationstodo,bettercamerastoselect,etc.thelistoftheseimprovementsisthendisplayedtothelearnerwithavideoillustratingthem.thecalltothisdiagnosisloopismadeifrequestedbythelearnerafteraccessingthe“askmenu”withinthesimulatorinterfaceoreverytimethesystemdetectsanearingcollisionoradangerousmanipulationwiththessrmstooclosetoanobstacleontheiss.inthecurrentimplementationofromantutor,immediatefeedbackisprovidedtothelearnereverytimeheattemptstoexecuteadangerouspath.also,thefeedbackprovidedalwaysconsistsinshowingthecorrectsolutiontothelearnerbasedonthediagnosismade.hence,thetutoringbehaviorinsideromantutorremainslimited.thisissuewillbeaddressedinfutureversionsofromantutorinordertoinvestigatetheuseofdifferentlevelsofintervention.dependingontheuser’sskills,hispreferencesandonthetaskbeingexecuted,anappropriatelevelofinterventionshouldbeapplied.belghithetal.:anintelligentsimulatorforteleroboticstraining17fig.7.romantutorshowingarobottrajectorytothestudent.insummary,thetypesoffeedbackprovidedbyromantutorarequitesimilartothoseprovidedbysherlock.themaindifferenceisinthelevelofdetailofthefeedbackprovided.sinceweareworkinginanill-defineddomain,thefeedbackprovidedbyfadprmremainslessexpressiveandnotaspreciseasthefeedbackprovidedbysherlock.thisissuecanbeaddressediftheproblemspacegeneratedbyfadprmcanbemanuallyeditedtoadd,whereneeded,moreinformationthatcanbeusedtoenhancethequalityandtheprecisionofthetutoring.conversely,oneofthemainadvantagesofromantutoristhat,itoperatesinadomainwhereacognitiveapproachliketheoneusedwithinsherlockcannotworkduetotheilldefinessofthedomain.inthisperspective,byusingfadprmasexpertofthedomain,wesucceededinachievingagoodlevelofqualityforthetutoring.6conclusioninthispaper,wepresentedareal-timeflexibleapproachforrobotpathplanningcalledfadprmandshowedhowitcanbeusedefficientlytoprovideveryhelpfulfeedbacktoastudentonarobotmanipulationtrainingsimulator.fadprmsupportsspatialreasoningandmakesmodeltracingtutoringpossiblewithoutanyexplicittaskstructure.byusingfadprmasadomainexpertwithinthesimulator,weshowedhowtoachieveahigh-qualitylevelforthetutoringassistancewithoutplanninginadvancewhatfeedbacktogivetothestudentandwithoutcreatingacomplextaskgraphtosupportthetutoringprocess.wealsodetailedthearchitectureoftheintelligenttrainingsimulatorromantutorinwhichfadprmisintegrated.amongothercomponents,romantutorcon-tainsanautomatictaskdemonstrationgeneratorusedfortheontheflygenerationofusefultaskdemonstrationsthathelpthestudentcarryonhismanipulationtasksonthesimulator.romantutor’sbenefitstofuturetrainingstrategiesare1)thesimulationofcomplextasksatalowcost(e.g.,usinginexpensivesimulationequipmentandwithnoriskofinjuriesorequipmentdamage)and2)theinstallationanywhereandanytimetoprovide“justintime”training.crewmemberswouldbeabletouseitonboardtheiss,forexample,tostudycomplexmaintenanceorrepairopera-tions.forverylongmissions,theywouldbeabletouseittotrainregularlyinordertomaintaintheirskills.inparticularromantutorisabletogenerateasmanytrainingexamplesasthestudentwants.thiscapacityprovidesimportantlearningchallengesandopportunitiesthatarenotpossiblewiththecurrentsystembasedonafixedsetofmanuallygeneratedexamples.althoughmotivatedbythessrmsapplication,romantutorwithitsinnovativecomponents(fadprmandatdg)remainsapplicabletoanyotherteleroboticssystemapplication.althoughromantutorbringssomeinterestingsolutionsfortraininginhighlycomplexenvironments,anumberofenhancementsandextensionsarestillpossible.firstofall,itspedagogicalvaluehastobeevaluated.wearenegotiat-inganevaluationofthesystemincollaborationwiththecanadianspaceagency.second,thediagnosisprocesscanbeimprovedbyexplicitlyconnecteddeclarativeknowledgeofthedomaintothepathsprovidedbyfadprm.thiswillallowadeepknowledgetracing,thusafinegrainedcognitivediagnosis.acknowledgmentstheworkpresentedhereinwassupportedbythenaturalsciencesandengineeringresearchcouncil(nserc)ofcanada.references[1]k.forbus,“articulatesoftwareforscienceandengineeringeducation,”smartmachinesineducation:thecomingrevolutionineducationaltechnology,vol.1,no.1,pp.235-267,2001.[2]r.angros,w.johnson,j.rickel,anda.scholer,“learningdomainknowledgeforteachingproceduralskills,”proc.firstint’lconf.autonomousagentsandmultiagentsystems(aamas),pp.1372-1378,2002.[3]k.vanlehn,“theadvantagesofexplicityrepresentingproblemspaces,”proc.ninthint’lconf.usermodeling(um),p.3,2003.[4]r.crowley,e.legowski,o.medvedeva,e.tseytlin,e.roh,andd.jukic,“anitsformedicalclassificationproblem-solving:effectsoftutoringandrepresentations,”proc.12thint’lconf.artificialintelligenceineducation,pp.192-199,2005.[5]h.simon,“thestructureofillstructuredproblems,”artificialintelligence,vol.4,no.3,pp.181-201,1973.[6]p.fournier-viger,r.nkambou,ande.m.nguifo,“supportingtutoringservicesinill-defineddomains,”advancesinintelligenttutoringsystems,nkambouetal.,eds.,springer,2010.[7]k.koedinger,j.anderson,w.hadley,andm.mark,“intelligenttutoringgoestoschoolinthebigcity,”int’lj.artificialintelligenceineducation,vol.8,no.9,pp.30-43,1997.[8]a.mitrovic,m.mayo,p.suraweera,andb.martin,“contraint-basedtutors:asuccessstory,”proc.14thint’lconf.industrial,eng.andotherapplicationsofappliedintelligentsystems(iea/aie),pp.931-940,2001.[9]k.belghith,f.kabanza,l.hartman,andr.nkambou,“anytimedynamicpath-planningwithflexibleprobabilisticroadmaps,”proc.ieeeint’lconf.roboticsandautomation(icra),pp.2372-2377,2006.[10]l.kavraki,p.svestka,j.c.latombe,andm.overmars,“probabilisticroadmapsforpathplanninginhighdimensionalconfigurationspaces,”ieeetrans.roboticsandautomation,vol.12,no.4,pp.566-580,aug.1996.[11]j.brown,r.burton,andf.zdybel,“amodel-drivenquestion-answeringsystemformixedinitiativecomputer-assistedinstruction,”ieeetrans.systems,manandcybernetics,vol.3,no.3,pp.248-257,may1973.[12]w.clancey,tutoringrulesforguidingacasemethoddialogue,d.sleemanandj.brown,eds.academic,1982.[13]f.kabanza,k.belghith,p.bellefeuille,b.auder,andl.hartman,“planning3dtaskdemonstrationsofateleoperatedspacerobotarm,”proc.18thint’lconf.automatedplanningandscheduling(icaps),pp.164-173,2008.[14]f.bacchusandf.kabanza,“usingtemporallogicstoexpresssearchcontrolknowledgeforplanning,”artificialintelligence,vol.116,nos.1/2,pp.123-191,2000.[15]h.choset,k.lynch,s.hutchinson,g.kantor,w.burgard,l.kavraki,ands.thrun,principlesofrobotmotion:theory,algorithms,andimplementations.mit,2005.[16]m.likhachev,d.ferguson,g.j.gordon,a.stentz,ands.thrun,“anytimesearchindynamicgraphs,”artificialintelligence,vol.172,no.14,pp.1613-1643,2008.[17]m.saha,j.latombe,y.chang,andf.prinz,“findingnarrowpassageswithprobabilisticroadmaps:thesmall-stepretractionmethod,”j.autonomousrobots,vol.19,no.3,pp.301-319,2005.[18]s.m.lavalle,planningalgorithms.cambridgeuniv.,2006.[19]g.sanchezandj.latombe,“asingle-querybi-directionalprobabilisticroadmapplannerwithlazycollisionchecking,”proc.10thint’lsymp.roboticsresearch(isrr),pp.403-417,2001.[20]m.likhachev,d.i.ferguson,g.j.gordon,a.stentz,ands.thrun,“anytimedynamica:ananytime,replanningalgorithm,”proc.15thint’lconf.automatedplanningandscheduling(icaps),pp.262-271,2005.18ieeetransactionsonlearningtechnologies,vol.5,no.1,january-march2012[21]e.larsen,s.gottshalk,m.lin,andd.manocha,“fastproximityquerieswithsweptspherevolumes,”proc.ieeeint’lconf.roboticsandautomation(icra),pp.3719-3726,2000.[22]d.christianson,s.anderson,l.he,d.salesin,d.weld,andc.m.f.,“declarativecameracontrolforautomaticcinemato-graphy,”proc.13thnat’lconf.artificialintelligence(aaai/iaai),pp.148-155,1996.[23]w.bares,l.zettlemoyer,d.rodriguez,andj.lester,“task-sensitivecinematographyinterfacesforinteractive3dlearningenvironments,”proc.thirdint’lconf.intelligentuserinterfaces(iui),pp.81-88,1998.[24]d.friedmanandy.feldman,“automatedcinematicreasoningaboutcamerabehavior,”j.expertsystemswithapplications,vol.30,no.4,pp.694-704,2006.[25]a.jhalaandr.young,“adiscourseplanningapproachtocinematiccameracontrolfornarrativesinvirtualenviron-ments,”proc.20thnat’lconf.artificialintelligence(aaai/iaai),pp.307-312,2005.[26]a.corbett,k.koedinger,andj.anderson,“intelligenttutoringsystems,”handbookofhuman-computerinteraction,m.helander,t.k.landauer,p.prabhu,eds.,elsevierscience,1997.[27]r.nkambou,“modelingthedomain:anintroductiontotheexpertmodule,”advancesinintelligenttutoringsystems,nkambouetal.,eds.,springer,2010.[28]a.lesgold,g.eggan,s.katz,andg.rao,“possibilitiesforassessmentusingcomputer-basedapprenticeshipenviron-ments,”cognitiveapproachestoautomatedinstruction,j.regianandv.shute,eds.,lawrenceeribaumassoc.,1992.khaledbelghithreceivedtheelectricalengi-neeringdiploma(d\0??plomeinge??nieur)froml’ecolenationaled’inge??nieursdemonastir,tunisia,in2002,themscdegreeincomputersciencefromtheuniversityofquebecatmontrealin2004,theexecutivembadegreefromtheuniversityofquebecatmontrealin2007,andthephddegreeincomputersciencefromtheuniversityofsherbrookeinjune2010.histhesisisaboutasimulatorprototypeforteleroboticstrainingtotrainastronautsonthemanipulationofthecanadianrobotarmwithintheinternationalspacestation.hehasworkedsince2007asanaisoftwareengineeratubisoft.hetookpartinthedevelopmentofseveralgamesproducedatubisoftmontreal’sstudio.rogernkamboureceivedthephddegreein1996incomputersciencefromtheuniversityofmontreal.heiscurrentlyafullprofessorofcomputerscienceattheuniversityofquebecatmontrealandthedirectorofthegdaclabora-tory(http://gdac.dinfo.uqam.ca).heisalsothechairofgraduatestudies(phdprogramincognitivecomputing).hisresearchinterestsincludeknowledgerepresentation,intelligenttutoringsystems,intelligentsoftwareagents,ontologyengineering,studentmodeling,andaffectivecomputing.healsoservesasamemberoftheprogramcommitteesofthemostimportantinternationalconferencesinartificialintelligenceineducation.frodualdkabanzaisaprofessorofcomputerscienceattheuniversite??desherbrooke.hisresearchconcernsartificialintelligence(ai),mainlyintheareasofautomatedplanning,aiarchitectures,intelligentdecisionsupportsys-tems,andintelligenttutoringsystems.hehasledvarioussuccessfulresearchprojectsonthesetopics.heiscurrentlydevelopingaitechniqueswithapplicationstotrainingmedicalstudentsonclinicaldiagnosis,trainingastro-nautsonrobotmanipulation,supportingtheoptimalprescriptionofantibioticsinhospitals,andcontrollingmobilerobots.hefoundedmenyasolutions,acompanythatofferssoftwaredevelopmentsandservicesinartificialintelligence(www.menyasolutions.com).leohartmanreceivedthephddegreeincomputersciencefromtheuniversityofrochesterin1990.hisdissertationinvesti-gatestheuseofdecisiontheoryforallocatingcomputationalresourcesindeductiveplanning.afterapostdocattheuniversityofwaterloo,hejoinedthecanadianspaceagencyin1993asaresearchscientist.hisworktherefocusesoncomputing,networking,andautomationforspacemissions.belghithetal.:anintelligentsimulatorforteleroboticstraining19', 7, 'FRIDAY', 6, '2016-12-02', 'CID_SCU_Mod_VIDEO_1_2016', 'L', 'M', 3, 1, 3);
INSERT INTO `fts_letter_record` (`letter_id`, `sl_no`, `memo_no`, `issue_dt`, `cp_no`, `page_count`, `file_id`, `letter_name`, `user_id`, `content`, `sending_authority`, `subject`, `addressing_desig_id`, `reg_dt`, `location_path`, `regis_status`, `letter_move_status`, `addressing_user_id`, `register_id`, `attached_by`) VALUES
(3, 2, 6677, '2016-12-05', 0, 9, 0, '1480915692.pdf', 1, 'anintelligentsimulatorforteleroboticstrainingkhaledbelghith,rogernkambou,frodualdkabanza,andleohartmanabstract—romantutorisatutoringsystemthatusessophisticateddomainknowledgetomonitortheprogressofstudentsandadvisethemwhiletheyarelearninghowtooperateaspaceteleroboticsystem.itisintendedtohelptrainoperatorsofthespacestationremotemanipulatorsystem(ssrms)includingastronauts,operatorsinvolvedinground-basedcontrolofssrmsandtechnicalsupportstaff.currently,thereisonlyasingletrainingfacilityforssrmsoperationsanditisheavilyscheduled.thetrainingstafftimeisinheavydemandforteachingstudents,planningtrainingtasks,developingteachingmaterial,andnewteachingtools.forexample,allssrmssimulationexercisesaredevelopedbyhandandthisprocessrequiresalotofstafftime.onceinanorbitissastronautscurrentlyhaveonlysimpleweb-basedmaterialforskilldevelopmentandmaintenance.forlongdurationspaceflights,astronautswillrequiresophisticatedsimulationtoolstomaintainskills.romantutoraddressesthesechallengesbyprovidingaportabletrainingtoolthatcanbeinstalledanywhereandanytimetoprovide“justintime”training.itincorporatesamodelofthesystemoperationscurriculum,akinematicsimulationoftheroboticsequipment,andtheiss,ahighperformancepathplannerandanautomatictaskdemonstrationgenerator.foreachelementofthecurriculumthatthestudentissupposedtomaster,romantutorgeneratesexampletasksforthestudenttoaccomplishwithinthesimulationenvironmentandthenmonitorsitsprogressiontoproviderelevantfeedbackwhenneeded.althoughmotivatedbythessrmsapplication,romantutorremainsapplicabletoanyteleroboticssystemapplication.indexterms—teleroboticstraining,intelligenttutoring,robotmanipulation,pathplanning,demonstrationgeneration.??1introductionromantutor(robotmanipulationtutor)isasimulation-basedtutoringsystemtosupportastronautsinlearninghowtooperatethespacestationremotemanipulator(ssrms),anarticulatedrobotarmmountedontheinternationalspacestation(iss).onceinorbit,issastronautscurrentlyhaveonlysimpleweb-basedmaterialforskilldevelopmentandmaintenance.forlongdurationspaceflights,astronautswillrequiresophisticatedsimula-tiontoolstomaintainskills.romantutoraddressesthesechallengesbyprovidingaportabletrainingtoolthatcanbeinstalledanywhereandanytimetoprovide“justintime”training.fig.1includesaimageofthessrmsontheiss.astronautsoperatethessrmsfromaroboticworkstationlocatedinsideoneoftheisscompartments.fig.1alsoshowstheworkstationwhichhasaninterfacewiththreemonitors,eachofwhichcanbeconnectedtoanyofthe14camerasplacedatstrategiclocationsontheexterioroftheiss.romantutor’suserinterfaceinfig.2includesthemostimportantfeaturesoftheroboticworkstation.thessrmsisakeycomponentoftheissandisusedintheassembly,maintenance,andrepairofthestation,andalsoformovingpayloadsfromvisitingshuttles.operatorsmanipulatingthessrmsonorbitreceivesupportfromgroundoperations.partofthissupportconsistsofvisualiz-ingandvalidatingmaneuversbeforetheyareactuallycarriedoutontheiss.operatorshaveinprinciplerehearsedthemaneuversmanytimesonthegroundpriortothemission,butunexpectedchangesarefrequentduringthemission.insuchcases,groundoperatorsmayhavetogenerate3danimationsforthenewmaneuversanduploadthemtotheoperatoronthestation.sofar,thegenerationofthese3danimationsaredonemanuallybycomputergraphicprogrammersandthusareverytimeconsuming.ssrmscanbeinvolvedinvarioustasksontheiss,includingmovingaloadfromoneplaceofthestationtoanother,inspectingtheissstructure(usingacameraonthearm’sendeffector)andmakingrepairs.thesetasksmustbecarriedoutverycarefullytoavoidcollisionswiththeissstructureandtomaintainsafety-operatingconstraintsonthessrms(suchasavoidingself-collisionsandsingula-rities).atdifferentphasesofagivenmanipulation,theastronautmustchooseasettingofcamerasthatprovideshimwiththebestvisibilitywhilemaintainingawarenessofhisprogressonthetask.thus,astronautsaretrainednotonlytooperatethearmitself,butalsotorecognizevisualcuesonthestationthatarecrucialinmentallyreconstruct-ingtheactualworkingenvironmentfromthepartialandrestrictedviewsprovidedbythethreemonitors,andtoselectcamerasdependingonthetaskandotherparameters.onechallengeindevelopingagoodtrainingsimulatoris,ofcourse,tobuilditsothatonecanreasonaboutit.thisisevenmoreimportantwhenthesimulatorisbuiltfortrainingpurposes[1].untilnow,simulation-basedtutoringisieeetransactionsonlearningtechnologies,vol.5,no.1,january-march201211.k.belghithandf.kabanzaarewiththedepartmentofcomputerscience,universityofsherbrooke,sherbrooke,qcj1k2r1,canada.e-mail:{khaled.belghith,kabanza}@usherbrooke.ca..r.nkambouiswiththedepartmentofcomputerscience,universityofquebecatmontreal,201,av.przsident-kennedy,montreal,qch2x3y7,canada.e-mail:nkambou.roger@uqam.ca..l.hartmaniswiththecanadianspaceagency,6767airportrd.,st-hubert,qcj3y8y9,canada.e-mail:leo.hartman@asc-csa.gc.ca.manuscriptreceived30may2010;revised16nov.2010;accepted4feb.2011;publishedonline30mar.2011.forinformationonobtainingreprintsofthisarticle,pleasesende-mailto:lt@computer.org,andreferenceieeecslognumbertlt-2010-05-0083.digitalobjectidentifierno.10.1109/tlt.2011.19.1939-1382/12/$31.002012ieeepublishedbytheieeecs&espossibleonlyifthereisanexplicitmodelorrepresentationoftheproblemspaceassociatedwithtrainingtasks.theexplicitrepresentationisrequiredinordertotrackstudentactions,toidentifyiftheseactionsarestillonapathtoasolutionandtogeneraterelevanttutoringfeedback[2],[3].knowledgeandmodeltracingareonlypossibleintheseconditions[4].itisnotalwayspossibletodevelopanexplicitcomprehensivetaskstructureincomplexdomains,espe-ciallyindomainswherespatialknowledgeisused,astherearemanypossiblewaystosolveagivenproblem.therobotmanipulationthatromantutorfocusesonisanexampleofsuchadomain.foreachrobotmanipulationtask,thereisacombinatorialexplosionofpossiblesolutionsformovingssrmsfromoneplacetoanotherintheissenvironment.suchdomainshasbeenidentifiedas“ill-structured”[5],[6].conventionaltutoringapproachessuchasmodel-tra-cing[7]orconstraint-basedmodeling[8]areverylimitedwhenappliedon“ill-structured”domains.amodel-tracingapproachconsistsofcomparingapredefinedtaskmodelwithastudent’ssolution.inthecontextofrobotmanipulations,becauseoftheinfinityofsolutionswehaveassociatedwitheachtask,designingataskmodelbyhandbecomespracticallyinfeasible.applyingaconstraint-basedmodelingapproachinthecontextofrobotmanipulationswillalsofacethesamekindoflimitations.here,identify-ingtheconstraintsassociatedwithrobotmanipulationtaskscanbedifficultandverytimeconsuming.sinceahugenumberofconstraintsisrequiredtoachieveanadequateleveloftutoringassistance[6],theapproachbecomesimpractical.toovercometheselimitations,weproposeasolutiontothisissuebyintegratingasophisticatedpathplannerfadprm[9]asadomainexpertsystemtosupportspatialreasoningwithinthesimulatorandmakemodeltracingtutoringpossiblewithoutanyexplicittaskstructure.flexibleanytimedynamicprmpathplanner(fadprm)isanextensiontotheprmplanningframework[10]tohandleregionstowhichweassignpreferenceswithincomplexworkspaces.bybeingflexibleinthisway,fadprmnotonlycomputescollisionfreepathsbutalsocapableoftakingintoaccounttheplacementofcamerasontheiss,thelightingconditionsandothersafetyconstraintsonoperatingthessrms.thisallowsthegenerationofcollision-freetrajectoriesinwhichtherobotstayswithinregionsvisiblethroughcamerasandinwhichthemanip-ulationis,therefore,saferandeasier.fadprmalsoimplementsadynamicstrategytoadaptefficientlytodynamicchangesintheenvironmentandreplanontheflybyexploitingresultsfrompreviousplanningphases.fadprmalsoimplementsananytimestrategytoprovideacorrectbutlikelysuboptimalsolutionveryquicklyandthenincrementallyimprovethequalityofthissolutionifmoreplanningtimeisallowed.romantutorusesthedifferentcapabilitiesimplementedwithinthefadprmpathplannertoprovideusefulfeedbacktoastudentoperatingthessrmssimulation.toillustrate,whenastudentislearningtomoveapayloadwiththerobot,romantutorinvokesthefadprmpath-plannerperiodicallytocheckwhetherthereisapathfromthecurrentconfigurationtothetargetandprovidesfeed-backaccordingly.byusingfadprmasarobotmanipula-tiondomainexpert,wefollowan“expertsystemapproach”tosupportthetutoringprocesswithinromantutor.thisapproachhasprovensuccessfulandhasbeenusedwithindifferentwell-knownintelligenttutoringsystemssuchassophiei[11]andguidon[12].butinourcase,weareapplyingitinthecontextofrobotmanipulations,an“ill-structured”domain.wealsodevelopedwithinromantutoranautomatictaskdemonstrationgenerator(atdg)[13],whichgener-ates3danimationsthatdemonstratehowtoperformagiventaskwiththessrms.theatdgisintegratedwiththefadprmpathplannerandcancontributetogroundsupportofssrmsoperationsbygeneratingusefultaskdemonstrationsontheflythathelpthestudentcarryouthistasks.atdgincludesacomponentbasedontlplan[14]forcameraplanninganduseslineartemporallogic(ltl)asthelanguageforspecifyingcinematographicprinciplesandfilmingpreferences.arobottrajectoryisfirstgeneratedbyfadprmandtlplanisthencalledtofindthebestsequenceofcamerashotsfollowingtherobotonitspath.inthenextsection,westartbypresentingfadprmandatdgindetail.wethendescriberomantutor’sinternalarchitectureandoutlineitsbasicfunctionalities.afterenumeratingthetasksonwhichastudentistrainedwithinromantutor,wedescribetheapproachesfollowedtoprovidethetutoringassistance.inafollowingsection,weshowhowtheuseoffadprmasadomainexpertwithinthesimulatorhelpedinprovidingveryrelevanttutoringfeedbacktothestudent.wefinallyconcludewithadiscussiononrelatedwork.12ieeetransactionsonlearningtechnologies,vol.5,no.1,january-march2012fig.1.ssrmsontheiss(left)andtheroboticworkstation(right).fig.2.romantutorinterface.2fadprmpathplannerinitstraditionalform,thepathplanningproblemistoplanapathforamovingbody(typicallyarobot)fromagivenstartconfigurationtoagivengoalconfigurationinaworkspacecontainingasetofobstacles.thebasicconstraintonsolutionpathsistoavoidcollisionwithobstacles,whichwecallherebyahardconstraint.thereexistnumerousapproachesforpathplanningunderthisconstraint[10],[15],[16],[17],[18].inordertotakeintoaccountthevisibilityconstraintswehaveinthessrmsenvironment,wedevelopedanewclassofflexiblepathplannersfadprm[9]abletoexpressandtakeintoaccountpreferencesinthenavigationoftherobotwithinverycomplexenvironments.inadditiontotheobstaclestherobotmustavoid,ourapproachtakesaccountofdesiredandundesired(ordangerous)zones.thiswillmakeitpossibletotakeintoaccounttheplacementofcamerasonthestation.thus,ourplannerwilltrytokeeptherobotinzonesofferingthebestpossiblevisibilityofprogressonthetaskwhiletryingtoavoidzoneswithreducedvisibility.therobotfreeworkspaceissegmentedintozoneswitheachzonehavinganassociateddegreeofdesirability(dd),thatis,arealnumberintheinterval[01],dependingonthetask,visualcuepositions,camerapositions,andlightingconditions.theclosertheddisto1,themorethezoneisdesired.safecorridorsarezoneswithddnearto1,whereasunsafecorridorsarethosewithddintheneighborhoodof0.azonecoveringthefieldofviewofacamerawillbeassignedahighddandwillhaveaconeshape;whereas,azonewithverylimitedlightingconditionswillbecon-sideredasannondesiredzonewithaddnear0andwilltakeanarbitrarypolygonalshape.fig.3illustratesatrajectoryofthessrmsgoingthroughthreecamerasfieldsofview(threecones)andavoidinganondesiredzone(rectangularbox).forefficientpathplanning,wepreprocesstherobotworkspaceintoaroadmapofcollision-freerobotmotionsinregionswithhighestdesirabilitydegree.moreprecisely,theroadmapisagraphsuchthateverynodeninthegraphislabeledwithitscorrespondingrobotconfigurationn.q.anditsdegreeofdesirabilityn.dd,whichistheaverageofddofzonesoverlappingwithn.q.anedge(n,n’)connectingtwonodesisalsoassignedaddequaltotheaverageofddofconfigurationsinthepathsegment(n.q,n’.q).theddofapath(i.e.,asequenceofnodes)isanaverageofddofitsedges.followingprobabilisticroadmapmethods(prm)[19],webuildtheroadmapbypickingrobotconfigurationsprobabilistically,withaprobabilitythatisbiasedbythedensityofobstacles.apathisthenasequenceofcollisionfreeedgesintheroadmap,connectingtheinitialandgoalconfiguration.followingtheanytimedynamica(ad)approach[20],togetnewpathswhentheconditionsdefiningsafezoneshavedynamicallychanged,wecanquicklyreplanbyexploitingthepreviousroadmap.ontheotherhand,pathsarecomputedthroughincrementalimprovementssotheplannercanbestoppedatanytimetoprovideacollision-freepath(i.e.,anytimeafterthefirstsuchpathhasbeenfound)andthemoretimeitisgiven,themorethepathisoptimizedtomovethroughdesirablezones.fadprmworksasfollows:theinputisaninitialconfiguration,agoalconfiguration,a3dmodelofobstaclesintheworkspace,a3dspecificationofzoneswithcorrespondingdd,anda3dmodeloftherobot.giventhisinput:.tofindapathconnectingtheinitialandgoalconfigurations,wesearchbackwardfromthegoaltowardtheinitial(current)robotconfiguration.backwardsearchinsteadofforwardsearchisdonebecausetherobotmovesand,hence,itscurrentconfigurationisnotingeneraltheinitialconfigura-tion;wewanttorecomputeapathtothesamegoalwhentheenvironmentchangesbeforethegoalisreached..aprobabilisticqueueopencontainsnodesofthefrontierofthecurrentroadmap(i.e.,nodesareexpandedbecausetheyareneworbecausetheyhavepreviouslybeenexpandedbutarenolongeruptodatew.r.t.tothedesiredpath)andalistclosedcontainsnonfrontiernodes(i.e.,nodesalreadyexpanded)..searchconsistsofrepeatedlypickinganodefromopen,generatingitspredecessorsandputtingthenewonesoroutofdateonesinopen..thedensityofanodeisthenumberofnodesintheroadmapwithconfigurationsthatareashortdistanceaway(proximitybeinganempiricallysetparameter,takingintoaccounttheobstaclesinanapplicationdomain).thedistanceestimatetothegoaltakesintoaccountthenode’sddandtheeuclideandistancetothegoal.anodeninopenisselectedforexpansionwithprobabilitypropor-tionalto??1??=density??n????goaldistanceestimate??n??with01:thisequationimplementsabalancebetweenfast-solutionsearchandbest-solutionsearchbychoosingdifferentvaluesfor.withnearto0,thechoiceofanodetobeexpandedfromopendependsonlyonthedensityaroundit.thatis,nodeswithlowerdensitywillbechosenfirst,whichistheheuristicusedintraditionalprmapproachestoguaranteethebelghithetal.:anintelligentsimulatorforteleroboticstraining13fig.3.ssrmsgoingthroughthreedifferentcamerasfieldsofview(cones)andavoidinganondesiredzone(rectangularbox).diffusionofnodesandtoacceleratethesearchforapath[19].asapproaches1,thechoiceofanodetobeexpandedfromopenwillratherdependonitsestimateddistancetothegoal.inthiscase,weareseekingoptimalityratherthanthespeedoffindingasolution..toincreasetheresolutionoftheroadmap,anewpredecessorisrandomlygeneratedwithinasmallneighborhoodradius(thatis,theradiusisfixedempiricallybasedonthedensityofobstaclesintheworkspace)andaddedtothelistofsuccessorsintheroadmapgeneratedsofar.theentirelistofpredecessorsisreturned..collisionisdelayed:detectionofcollisionsontheedgesbetweenthecurrentnodeanditspredecessorsisdelayeduntilacandidatesolutionisfound;ifthereisacollision,webacktrack.collisionsthathavealreadybeendetectedarestoredintheroad-maptoavoiddoingthemagain..therobotmaystartexecutingthefirstpathfound..concurrently,thepathcontinuesbeingimprovedbyreplanningwithanincreasedvalueof..changesintheenvironment(movingobstaclesorchangesinddforzones)causeupdatesoftheroadmapandreplanning.thecalculationofaconfigurationddandapathddisastraightforwardextensionofcollisioncheckingforconfig-urationsandpathsegments.forthis,wecustomizedtheproximityquerypackage(pqp)[21].the3dmodelsfortheiss,thessrms,andzonesareimplementedusingacustomizationofsilicongraphics’openinventor.therobotismodeledusingmotionplanningkit(mpk),thatis,animplementationofsanchezandlatombe’sprmplanner[19].3theautomatictaskdemonstrationgeneratortheautomatictaskdemonstrationgenerator[13]takesasinputastartandagoalconfigurationofthessrms.atdgwillgenerateamovie1demonstrationoftherequiredmanipulationsthatbringthessrmsfromthestartconfig-urationtothegoalconfiguration.thetopfigureinfig.4showstheinternalarchitectureoftheatdg.thebottomoneshowsthedifferentstepsthedatagothroughinordertotransformthetwogivenconfigurationsintoacompletemoviedemonstration.first,atdgcallsthefadprmpathplannertogenerateacollisionfreepathbetweenthetwogivenconfigurations.thepathisthenpassedtothetrajectoryparserwhichseparatesitintocategorizedsegments.thiswillturnthecontinuoustrajectoryintoasuccessionofscenes,whereeachscenecanbefilmedbyaspecificgroupofidioms.anidiomisasuccessionofshotsthatrepresentsastereotypicalwaytofilmascenecategory.theparserlooksforuniformityinthemovementsofthessrmstodetectandrecognizethecategoryofscenes.oncethepathisparsed,acallismadetothecameraplannertlplantofindthebestshotsthatbestconveyeachscene,whilemakingsurethewholeispleasingandcomprehensive.theuseoftlplanasacameraplannerwithinatdgprovidestwoadvantages.first,lineartemporallogic,thelanguageusedbytlplanismoreexpressive,yetwithasimplerdefinedsemantics,thanpreviouscameraplanninglanguagessuchasdccl[22].forinstance,wecanexpressarbitrarytemporalconditionsabouttheorderinwhichobjectsshouldbefilmed,whichobjectsshouldremaininthebackgrounduntilsomeconditionbecometrue,andmorecomplexconstraintsthattheltllanguagecanexpress.second,tlplanismorepowerfulthanothercameraplannerspresentedintheliteraturesuchas[22],[23],[24],[25]becausewithtlplan,ltlshotcompositionrulesprovideasearchpruningcapability.inatdg,eachshotintheidiomisdistinguishedbythreekeyattributes:shottype,cameraplacementmode,camerazoomingmode..shottypes:fiveshottypesarecurrentlydefinedintheatdgsystem:static,goby,pan,track,andpov.astaticshotisdonefromastaticcamerawhentherobotisinaconstantpositionormovingslowly.agobyshothasthecamerainastaticpositionshowingtherobotinmovement.forapanshot,thecameraisinastaticpositionbutdoingincrementalrotationsfollowingthemovementoftherobot.atrackshothasthecamerafollowingtherobotandkeepingaconstantpositionrelativetoit.finally,thepovshothasthecameraplaceddirectlyonthessrms,movingwiththerobot..cameraplacements:foreachshottype,thecameracanbeplacedinfivedifferentwaysaccordingtosomegivenlineofinterest:external,parallel,internal,apex,andexternalii.currently,wetakethetrajectoryoftherobot’scenterofgravityasthelineofinterestwhichallowsfilmingofanumberofmanytypicalmaneuvers.forlargercoverage14ieeetransactionsonlearningtechnologies,vol.5,no.1,january-march2012fig.4.atdgarchitecture.1.thispaperhasthreesupplementalmoviefiles,whichcanbefoundonthecomputersocietydigitallibraryathttp://doi.ieeecomputersociety.org/10.1109/tlt.2011.19.ofmaneuvers,additionallinesofinterestwillbeaddedlater..zoommodes:foreachshottypeandcameraplacement,thezoomofthecameracanbeinfivedifferentmodes:extremecloseup,closeup,mediumview,fullview,andlongview.fig.5showsanidiomillustratingtheanchoringofanewcomponentontheiss.itstartswithatrackshotfollowingtherobotwhilemovingonthetruss.then,anothertrackshotfollowsthatshowstherotationofonejointontherobottoalignwiththeissstructure.andfinallythereisastaticshotfocusingontheanchoringoperation.intlplan,idiomsarespecifiedintheplanningdefinitionlanguage(pddl3.0).intuitively,apddloperatorspecifiespreferencesaboutshottypesintimeandinspacedependingontherobotmaneuver.parsingthetrajectoryoftherobotwiththesuccessivescenesperformed,tlplanwilltrytofindasuccessionofshotsthatcapturesthebestpossibleidioms.tlplanalsotakesintoaccountcinematicprinciplestoensureconsistencyoftheresultingmovie.idiomsandcinematicprinciplesareinfactencodedintheformoftemporallogicformulaswithintheplanner.tlplanusesalsoanocclusiondetectortomakesurethessrmsisvisibleallthetime.oncetlplanisdone,weareleftwithalistofshotsthatispassedtotherenderingsystemtocreatetheanimation.therendererusesboththeshotsgivenbytlplanandthessrmstrajectoryinordertopositionthecamerasinrelationwiththessrms,generatingthefinaltaskdemonstration.foreachssrmsmovementtype(orscene),wehaveseveralidioms(from6to10inthecurrentimplementation)andeachidiomisdefinedbytakingintoaccountthecomplexityofthemovement,thegeometryoftheiss,thevisualcuesontheiss,andthepreferencesoftheviewer.forexample,ifthessrmsandthemobilebasearemovingalongthemaintrussoftheiss,itisimportantthatthecamerashowsnotonlytheentirearmbutalsosomevisualcuesontheisssotheoperatorcangetasenseofsituationalawarenessfortherelocationofthebaseofthearm.consequently,theidiomsforthismanipulationwillinvolveshotswithafullorlongviewzoom.incontrast,move-mentsinvolvingtheendeffectorrequireahighprecision,soanextremecloseupzoomwillbeinvolved.someoftheseparameterscanalsobesetdirectlybytheuser’spreferences.theusercanchoose,forexample,toalwayspreferaprecisesetofcamerastouseforthefilming.theusercanalsochoosesomepartsofthessrmsthefilmshouldfocusonthemorepossible.4romantutorarchitectureandbasicfunctionalities4.1architectureandmaincomponentsromantutorworkswithanyrobotmanipulatorprovideda3dmodeloftherobotanditsworkspacearespecified.romantutor’sarchitectureincludesthefollowingcompo-nents(fig.6):thegraphicuserinterface,thestatereflector,thefadprmpathplanner,theautomatictaskdemonstra-tiongenerator,thetutoringmoduleandthesimulatorcorewithseveralthird-partylibraries:proximityquerypackage[21],openinventorfromsilicongraphics,andmotionplanningkit[19].asshowninfig.2,romantutor’suserinterfacehasthreescreens(forthethreemonitors).thekeyboardisusedtooperatetherobot(thessrmsinourcase).incommandmode,onecontrolsthejointsdirectly;inautomaticmode,onemovestheendeffector,smallincrementsatatime,relyingoninversekinematicstocalculatethejointrotations.infig.2,differentcamerasareselected,displayingthesamerobotconfigurationfromdifferentviewpoints.theper-spectivecamera(ontheleft)caninspecttheentireiss3dmodel.itisusedintrainingtasksaimedathelpingastudenttodevelopamental3dmodeloftheisseventhoughthereisnosuchcameraontheiss.normaltrainingusessmallphysicalmodelsoftheissforthesamepurpose.inromantutorstudentscouldcarryoutseveralkindsoftrainingtasksthatwedescribemoreformallyinthenextsection.thestatereflectorperiodicallyupdatesthestudent’sactions(i.e.,keyboardinputs)andtheireffectsontheissenvironment(robotconfiguration,camerasmappedtothemonitors,theirviewangles,andtheoperationmode).italsomonitorslightingconditions.4.2trainingtaskstrainingtaskscanbeclassifiedasopen,recognition,localization,orrobotmanipulation.opentasksarethoseinwhichthestudentinteractswiththesimulator,withoutanyformallysetgoal,withminimalassistanceconfiguredinthesystem’spreferences(e.g.,collisionwarningandavoidance).recognitiontaskstraintorecognizethedifferentelementsintheworkspace.anexampleistoshowapictureofanelementoftheissandaskthestudenttonameitanddescribeitsfunction.localizationtaskstraintolocatevisualcuesorisselementsandtorelatethembelghithetal.:anintelligentsimulatorforteleroboticstraining15fig.5.idiomtofilmthessrmsanchoringanewcomponentontheiss.fig.6.romantutorarchitecture.spatiallytootherelements.anexampleistoshowapictureofavisualcueandaskthestudenttomakeitvisibleonthescreenusinganappropriateselectionofcameras;orwecanasktonameelementsthatareaboveanotherelementshownonthescreen.robotmanipulationtasksdealwithmovingthemanip-ulator(avoidingcollisionandsingularities,usingtheappropriatespeed,switchingcamerasasappropriate,andusingtherightoperationmodeatdifferentstages),berthing,ormating.anillustrationistomovethearmfromonepositiontoanother,withorwithoutapayload.anotherexampleistoinspectanindicatedcomponentoftheissusingacameraontheendeffector.thesetasksrequirethestudenttobeabletodefineacorridorinafreeworkspaceforasafeoperationoftherobotandfollowit.thestudentmustdothisbasedonthetask,thelocationofcamerasandvisualcues,andthecurrentlightingcondi-tions.thereforelocalizationandnavigationareimportantinrobotoperations.robotmanipulationtasksaremademoreorlessunpredictablebydynamicallychangingthelightingconditions,thusrequiringtherevalidationofsafecorridors.4.3tutoringapproachesinromantutorthefeedbackgeneratorinsidethetutoringmodule(fig.6)periodicallychecksthecurrentstatetotriggerfeedbacktothestudent,usingrulesthatareprecondi-tionedonthecurrentstateinformationandthecurrentgoal.forthecaseofopen,recognitionandlocalizationtasks,theserulesare“puredomain-dependentpedagogicalrules”relatedtotaskmodelsdesignedbyhand.forrobotmanipulationtaskswithagoal,theyaregenericpedago-gicalrules.feedbackrulestakeintoaccounthowlongthestudenthasbeentryingonasubtaskandhowgoodorbadheisprogressingonit.inthecontextofopen,recognition,andlocalizationtasks,providingtutoringassistanceseemsstraightfor-ward.thedomainknowledgeiswelldefined:whatelementorcueoftheisstorecognizeortolocalize?whatcameratochooseandwhen?,etc.here,wefollowamodel-tracingapproachanddefineforeachcategoryoftasksawellstructuredtaskmodeltosupportthetutoringprocess.taskmodelsaredesignedbyhandstartingfromrecommendationsprovidedbyhumanexpertsandarestructuredintheformofagraphencodingif-thenrules.thefeedbackgeneratorusesthepredefinedtaskgraphstovalidatestudentactions,identifygapsandprovidefeedbackaccordingly.aswestatedpreviouslyinanearlysection,thedomainofrobotmanipulationsisan“ill-structured”domainwhereclassicaltutoringapproachesstarttolooseefficiencyandshowlimitations.toovercometheselimitations,wechoosetofollowan“expertsystemapproach”andusethefadprmpathplannerasadomainexpertinoursystemtosupportthetutoringprocess.inthecontextofrobotmanipulationtasks,thefeedbackgeneratorevaluatesstudentactionsbycomparingittotheoptimalsolutionsfoundbyfadprmandprovidesusefulfeedbackaccord-ingly.thetutoringprocessthatusesfadprmasanexpertofthedomainknowledgeisdescribedinmoredetailsinthenextsection.oneoftheveryimportantearlyresultsinintelligenttutoringresearchistheimportanceofthecognitivefidelityofthedomainknowledgemodule.thatis,itisimportantforthetutortoreasonabouttheprobleminthesamewaythathumansdo[26].approachesformodelingadomainexpertwithinintelligenttutoringsystemscanbegroupedintothreemaincategories:blackboxmodels,glassboxmodels,andcognitivemodels[27].themaindifferencebetweenthesemodelsliesinthecognitivefidelitywithwhicheachmodelrepresentstheexpertdomainknowledge.ablackboxmodeldescribesproblemstatesdifferentlythanthestudent.theclassicexampleofsuchasystemissophiei[11].sophieiisatutorforelectronictrouble-shootingthatuseditsexpertsystemtoevaluatethemeasurementsstudentsweremakingintroubleshootingacircuit.theexpertsystemmadeitsdecisionsonlybysolvingsetsofequations.aglassboxmodelisanintermediatemodelthatreasonsintermsofthesamedomainconstructsasthehumanexpert.however,themodelreasonswithadifferentcontrolstructurethanthehumanexpert.aclassicexampleofsuchasystemisguidon[12],atutoringsystemformedicaldiagnosis.thissystemwasbuiltaroundmycin,anexpertsystemforthetreatmentofbacterialinfections.acognitiveapproach,ontheotherhand,aimstodevelopacognitivemodelofthedomainknowledgethatcapturesthewayknowledgeisrepresentedinthehumanmindinordertomakethetutorrespondtoproblem-solvingsituationsinawayverysimilartohumans.thisapproach,incontrasttotheotherapproaches,hasasanobjectivetosupportcognitivelyplausiblereasoning[27].agoodexampleforsuchatutoringsystemissherlock[28],anotherpracticeenvironmentforelectronicstroubleshooting.sherlockusedaproceduraldomainknowledgerepresentationbasedonacognitiveanalysisofhumanskillacquisition.atdifferentphasesofagivenmanipulationsuchasmovingapayloadusingthessrms(fig.5),theastronautmustchoosethebestsettingofcamerasthatprovideshimwiththebestvisibilitywhilekeepingagoodappreciationofhisevolutioninthetask.thus,astronautsaretrainednotonlytomanipulatethearmperse,butalsotorecognizethebestcamerassuitabletofilmagivenconfigurationofthessrmswithintheissenvironment.here,astronautsneedtomentallyreconstructtheactualworkingenvironmentfromjustthreemonitorseachgivingapartialandrestrictedview.thefadprmplannertriestokeepthessrmsinzonesofferingthebestpossiblevisibilityoftheprogressonthetaskwhiletryingtoavoidzoneswithreducedvisibility.bytakingintoaccounttheplacementofcamerasontheiss,fadprmreasonsaboutactionsinawayverysimilartostudents:foreachportionofthepath,fadprmtriestheenterthefieldofviewofthebestsuitablecameraavailable.thus,theuseoffadprmasadomainexpertinromantutorresultsinatutoringapproachthatliesinbetweenaglassboxapproachandacognitiveapproach.evenifweareapplyingitinthecontextofan“ill-structured”domain,webelievethatthiswillguaranteegoodqualityofthetutoringprovidedtothestudent,atleastatthesamelevelastheoneprovidedbyaglassboxmodellikeguidon.inthe16ieeetransactionsonlearningtechnologies,vol.5,no.1,january-march2012nextsection,wedescribeandevaluatethetutoringprovidedusingfadprmasanexpertofthedomaintoastudentworkingonrobotmanipulationtasks.5fadprmasadomainexpertinromantutorromantutorinitiatesarobotmanipulationtaskandmonitorsthestudent’sprogresstowardaccomplishingit.studentsbeginthetaskandcanaskromantutorforhelporforarecommendationaboutwhattodonext.studentscanaskromantutorabouthowtoavoidacollisionwithanearbyobstacle,howtogotoadesiredlocationintheworkspaceorhowtogothroughadesiredzone.inthissituation,thefeedbackgeneratorcallstheatdg(whichcallsthefadprmplanner)tocomputeandshowamovieillustratinghowtocompletethemanipulationtask.iftheobjectiveistogivetheoperatorasenseofthetaskashewillbeseeingitfromthecommandandcontrolworkstation,thenvirtualcamerapositionswillbeselectedfromthe14camerasontheexterioroftheiss.butiftheobjectiveistoconveysomecognitiveawarenessofthetask,thenvirtualcamerasareselectedaroundtherobotwhilemovingonitstrajectorytobesthelptheoperatorgainamaximalcognitiveawareness.theobjectiveissetmanuallybythelearnerthroughromantutor’sinterfacetooneofthefollowingvalues“usecamerasoniss”or“usevirtualcameras.”usingtherealtimedynamiccapabilityofthefadprmpathplanner,thefeedbackgeneratormonitorsthestu-dent’sactivityinthestatereflectortovalidateincremen-tallystudent’sactionorsequenceofactions,giveinformationaboutthenextrelevantactionorsequenceofactions.thefeedbackgeneratorregularlyevaluateswhetherthetaskcanbecompletedfromthecurrentconfigurationofthemanipulatorandwhetheritcanbecompletedefficiently.atthepointatwhichitdiscoversthatthestudentwouldhavetobacktrackfromthecurrentpositionorthatachievingthetasktakesmorethanthetimeplannedforit,thefeedbackgeneratorwillinterveneandbegintoshowthestudentamoreefficienttrajectory.onceabetterinitialtrajectoryhasbeendemonstrated,thestudentcantakecontrolandresumethetask.thiserror-promptedturntakingrepeatsuntilthetaskiscompleted(fig.7).weseeheretheimportanceofhavingfadprmasaplannerinoursystemtoguidetheoperationsbythestudent.bytakingintoaccounttheplacementofthecamerasonthestation,weareassuredthattheplanshowntothestudentpassesthroughzonesthatarevisiblefromcamerasplacedintheissenvironmentandcanthenbefollowedbythestudent.toevaluatethetutoringmechanicsweimplementedtosupportastudentworkingonrobotmanipulationtasks,wecomparethetypesoffeedbackweprovideinourapplica-tiontothoseprovidedbyaclassicintelligenttutoringsystemsherlock[28]thatisknowntobeefficient.sherlockisapracticeenvironmentforelectronicstroubleshootingandprovidesadviceonproblemsolvingstepsuponstudentrequest.fourtypesoffeedbackareavailable[26]:1.adviceonwhattestactiontocarryoutandhow,2.adviceonhowtoreadtheoutcomeofthetest,3.adviceonwhatconclusioncanbedrawnfromthetest,and4.adviceonwhatoptiontopursuenext.asdescribedearlier,our“fadprmasadomainexpert”tutoringapproachprovidesfeedbacknotonlyuponrequestbutalsointervenesautomaticallywhenitdetectserrorsordifficultiesexperiencedbythestudent.differenttypesoffeedbackarealsoavailable:1.adviceonwhatcurrentaction(ormanipulation)toexecuteandhowbyshowingavalidpathtothecurrentgoalorbyshowingamoviecomputedwithatdg;2.adviceonhowtoavoiderrorswhileprogressingonataskbyshowingpathsthatavoidanearbyobstacleorbyshowingmoviesrecordedfromthemostusefulcameras.3.adviceonwhatconclusioncanbedrawnfromtheerrorsmadebydetectingincorrectchoicesmadebythestudentandbyproposingtherightpathtofollow,and4.adviceonwhatfutureactionorsequenceofactionstopursuenextinordertoreachthegoal.forthefeedbackoftypes2and3,thecurrenttraceofactions(robotmanipulationsandcameraselections)madebythelearnerinordertoreachthecurrentconfigurationissaved.acallisthenmadetofadprmandatdgtoevaluatethecurrenttrace,todiagnosisandidentifyerrorsandproposeimprovements:bettermanipulationstodo,bettercamerastoselect,etc.thelistoftheseimprovementsisthendisplayedtothelearnerwithavideoillustratingthem.thecalltothisdiagnosisloopismadeifrequestedbythelearnerafteraccessingthe“askmenu”withinthesimulatorinterfaceoreverytimethesystemdetectsanearingcollisionoradangerousmanipulationwiththessrmstooclosetoanobstacleontheiss.inthecurrentimplementationofromantutor,immediatefeedbackisprovidedtothelearnereverytimeheattemptstoexecuteadangerouspath.also,thefeedbackprovidedalwaysconsistsinshowingthecorrectsolutiontothelearnerbasedonthediagnosismade.hence,thetutoringbehaviorinsideromantutorremainslimited.thisissuewillbeaddressedinfutureversionsofromantutorinordertoinvestigatetheuseofdifferentlevelsofintervention.dependingontheuser’sskills,hispreferencesandonthetaskbeingexecuted,anappropriatelevelofinterventionshouldbeapplied.belghithetal.:anintelligentsimulatorforteleroboticstraining17fig.7.romantutorshowingarobottrajectorytothestudent.insummary,thetypesoffeedbackprovidedbyromantutorarequitesimilartothoseprovidedbysherlock.themaindifferenceisinthelevelofdetailofthefeedbackprovided.sinceweareworkinginanill-defineddomain,thefeedbackprovidedbyfadprmremainslessexpressiveandnotaspreciseasthefeedbackprovidedbysherlock.thisissuecanbeaddressediftheproblemspacegeneratedbyfadprmcanbemanuallyeditedtoadd,whereneeded,moreinformationthatcanbeusedtoenhancethequalityandtheprecisionofthetutoring.conversely,oneofthemainadvantagesofromantutoristhat,itoperatesinadomainwhereacognitiveapproachliketheoneusedwithinsherlockcannotworkduetotheilldefinessofthedomain.inthisperspective,byusingfadprmasexpertofthedomain,wesucceededinachievingagoodlevelofqualityforthetutoring.6conclusioninthispaper,wepresentedareal-timeflexibleapproachforrobotpathplanningcalledfadprmandshowedhowitcanbeusedefficientlytoprovideveryhelpfulfeedbacktoastudentonarobotmanipulationtrainingsimulator.fadprmsupportsspatialreasoningandmakesmodeltracingtutoringpossiblewithoutanyexplicittaskstructure.byusingfadprmasadomainexpertwithinthesimulator,weshowedhowtoachieveahigh-qualitylevelforthetutoringassistancewithoutplanninginadvancewhatfeedbacktogivetothestudentandwithoutcreatingacomplextaskgraphtosupportthetutoringprocess.wealsodetailedthearchitectureoftheintelligenttrainingsimulatorromantutorinwhichfadprmisintegrated.amongothercomponents,romantutorcon-tainsanautomatictaskdemonstrationgeneratorusedfortheontheflygenerationofusefultaskdemonstrationsthathelpthestudentcarryonhismanipulationtasksonthesimulator.romantutor’sbenefitstofuturetrainingstrategiesare1)thesimulationofcomplextasksatalowcost(e.g.,usinginexpensivesimulationequipmentandwithnoriskofinjuriesorequipmentdamage)and2)theinstallationanywhereandanytimetoprovide“justintime”training.crewmemberswouldbeabletouseitonboardtheiss,forexample,tostudycomplexmaintenanceorrepairopera-tions.forverylongmissions,theywouldbeabletouseittotrainregularlyinordertomaintaintheirskills.inparticularromantutorisabletogenerateasmanytrainingexamplesasthestudentwants.thiscapacityprovidesimportantlearningchallengesandopportunitiesthatarenotpossiblewiththecurrentsystembasedonafixedsetofmanuallygeneratedexamples.althoughmotivatedbythessrmsapplication,romantutorwithitsinnovativecomponents(fadprmandatdg)remainsapplicabletoanyotherteleroboticssystemapplication.althoughromantutorbringssomeinterestingsolutionsfortraininginhighlycomplexenvironments,anumberofenhancementsandextensionsarestillpossible.firstofall,itspedagogicalvaluehastobeevaluated.wearenegotiat-inganevaluationofthesystemincollaborationwiththecanadianspaceagency.second,thediagnosisprocesscanbeimprovedbyexplicitlyconnecteddeclarativeknowledgeofthedomaintothepathsprovidedbyfadprm.thiswillallowadeepknowledgetracing,thusafinegrainedcognitivediagnosis.acknowledgmentstheworkpresentedhereinwassupportedbythenaturalsciencesandengineeringresearchcouncil(nserc)ofcanada.references[1]k.forbus,“articulatesoftwareforscienceandengineeringeducation,”smartmachinesineducation:thecomingrevolutionineducationaltechnology,vol.1,no.1,pp.235-267,2001.[2]r.angros,w.johnson,j.rickel,anda.scholer,“learningdomainknowledgeforteachingproceduralskills,”proc.firstint’lconf.autonomousagentsandmultiagentsystems(aamas),pp.1372-1378,2002.[3]k.vanlehn,“theadvantagesofexplicityrepresentingproblemspaces,”proc.ninthint’lconf.usermodeling(um),p.3,2003.[4]r.crowley,e.legowski,o.medvedeva,e.tseytlin,e.roh,andd.jukic,“anitsformedicalclassificationproblem-solving:effectsoftutoringandrepresentations,”proc.12thint’lconf.artificialintelligenceineducation,pp.192-199,2005.[5]h.simon,“thestructureofillstructuredproblems,”artificialintelligence,vol.4,no.3,pp.181-201,1973.[6]p.fournier-viger,r.nkambou,ande.m.nguifo,“supportingtutoringservicesinill-defineddomains,”advancesinintelligenttutoringsystems,nkambouetal.,eds.,springer,2010.[7]k.koedinger,j.anderson,w.hadley,andm.mark,“intelligenttutoringgoestoschoolinthebigcity,”int’lj.artificialintelligenceineducation,vol.8,no.9,pp.30-43,1997.[8]a.mitrovic,m.mayo,p.suraweera,andb.martin,“contraint-basedtutors:asuccessstory,”proc.14thint’lconf.industrial,eng.andotherapplicationsofappliedintelligentsystems(iea/aie),pp.931-940,2001.[9]k.belghith,f.kabanza,l.hartman,andr.nkambou,“anytimedynamicpath-planningwithflexibleprobabilisticroadmaps,”proc.ieeeint’lconf.roboticsandautomation(icra),pp.2372-2377,2006.[10]l.kavraki,p.svestka,j.c.latombe,andm.overmars,“probabilisticroadmapsforpathplanninginhighdimensionalconfigurationspaces,”ieeetrans.roboticsandautomation,vol.12,no.4,pp.566-580,aug.1996.[11]j.brown,r.burton,andf.zdybel,“amodel-drivenquestion-answeringsystemformixedinitiativecomputer-assistedinstruction,”ieeetrans.systems,manandcybernetics,vol.3,no.3,pp.248-257,may1973.[12]w.clancey,tutoringrulesforguidingacasemethoddialogue,d.sleemanandj.brown,eds.academic,1982.[13]f.kabanza,k.belghith,p.bellefeuille,b.auder,andl.hartman,“planning3dtaskdemonstrationsofateleoperatedspacerobotarm,”proc.18thint’lconf.automatedplanningandscheduling(icaps),pp.164-173,2008.[14]f.bacchusandf.kabanza,“usingtemporallogicstoexpresssearchcontrolknowledgeforplanning,”artificialintelligence,vol.116,nos.1/2,pp.123-191,2000.[15]h.choset,k.lynch,s.hutchinson,g.kantor,w.burgard,l.kavraki,ands.thrun,principlesofrobotmotion:theory,algorithms,andimplementations.mit,2005.[16]m.likhachev,d.ferguson,g.j.gordon,a.stentz,ands.thrun,“anytimesearchindynamicgraphs,”artificialintelligence,vol.172,no.14,pp.1613-1643,2008.[17]m.saha,j.latombe,y.chang,andf.prinz,“findingnarrowpassageswithprobabilisticroadmaps:thesmall-stepretractionmethod,”j.autonomousrobots,vol.19,no.3,pp.301-319,2005.[18]s.m.lavalle,planningalgorithms.cambridgeuniv.,2006.[19]g.sanchezandj.latombe,“asingle-querybi-directionalprobabilisticroadmapplannerwithlazycollisionchecking,”proc.10thint’lsymp.roboticsresearch(isrr),pp.403-417,2001.[20]m.likhachev,d.i.ferguson,g.j.gordon,a.stentz,ands.thrun,“anytimedynamica:ananytime,replanningalgorithm,”proc.15thint’lconf.automatedplanningandscheduling(icaps),pp.262-271,2005.18ieeetransactionsonlearningtechnologies,vol.5,no.1,january-march2012[21]e.larsen,s.gottshalk,m.lin,andd.manocha,“fastproximityquerieswithsweptspherevolumes,”proc.ieeeint’lconf.roboticsandautomation(icra),pp.3719-3726,2000.[22]d.christianson,s.anderson,l.he,d.salesin,d.weld,andc.m.f.,“declarativecameracontrolforautomaticcinemato-graphy,”proc.13thnat’lconf.artificialintelligence(aaai/iaai),pp.148-155,1996.[23]w.bares,l.zettlemoyer,d.rodriguez,andj.lester,“task-sensitivecinematographyinterfacesforinteractive3dlearningenvironments,”proc.thirdint’lconf.intelligentuserinterfaces(iui),pp.81-88,1998.[24]d.friedmanandy.feldman,“automatedcinematicreasoningaboutcamerabehavior,”j.expertsystemswithapplications,vol.30,no.4,pp.694-704,2006.[25]a.jhalaandr.young,“adiscourseplanningapproachtocinematiccameracontrolfornarrativesinvirtualenviron-ments,”proc.20thnat’lconf.artificialintelligence(aaai/iaai),pp.307-312,2005.[26]a.corbett,k.koedinger,andj.anderson,“intelligenttutoringsystems,”handbookofhuman-computerinteraction,m.helander,t.k.landauer,p.prabhu,eds.,elsevierscience,1997.[27]r.nkambou,“modelingthedomain:anintroductiontotheexpertmodule,”advancesinintelligenttutoringsystems,nkambouetal.,eds.,springer,2010.[28]a.lesgold,g.eggan,s.katz,andg.rao,“possibilitiesforassessmentusingcomputer-basedapprenticeshipenviron-ments,”cognitiveapproachestoautomatedinstruction,j.regianandv.shute,eds.,lawrenceeribaumassoc.,1992.khaledbelghithreceivedtheelectricalengi-neeringdiploma(d\0??plomeinge??nieur)froml’ecolenationaled’inge??nieursdemonastir,tunisia,in2002,themscdegreeincomputersciencefromtheuniversityofquebecatmontrealin2004,theexecutivembadegreefromtheuniversityofquebecatmontrealin2007,andthephddegreeincomputersciencefromtheuniversityofsherbrookeinjune2010.histhesisisaboutasimulatorprototypeforteleroboticstrainingtotrainastronautsonthemanipulationofthecanadianrobotarmwithintheinternationalspacestation.hehasworkedsince2007asanaisoftwareengineeratubisoft.hetookpartinthedevelopmentofseveralgamesproducedatubisoftmontreal’sstudio.rogernkamboureceivedthephddegreein1996incomputersciencefromtheuniversityofmontreal.heiscurrentlyafullprofessorofcomputerscienceattheuniversityofquebecatmontrealandthedirectorofthegdaclabora-tory(http://gdac.dinfo.uqam.ca).heisalsothechairofgraduatestudies(phdprogramincognitivecomputing).hisresearchinterestsincludeknowledgerepresentation,intelligenttutoringsystems,intelligentsoftwareagents,ontologyengineering,studentmodeling,andaffectivecomputing.healsoservesasamemberoftheprogramcommitteesofthemostimportantinternationalconferencesinartificialintelligenceineducation.frodualdkabanzaisaprofessorofcomputerscienceattheuniversite??desherbrooke.hisresearchconcernsartificialintelligence(ai),mainlyintheareasofautomatedplanning,aiarchitectures,intelligentdecisionsupportsys-tems,andintelligenttutoringsystems.hehasledvarioussuccessfulresearchprojectsonthesetopics.heiscurrentlydevelopingaitechniqueswithapplicationstotrainingmedicalstudentsonclinicaldiagnosis,trainingastro-nautsonrobotmanipulation,supportingtheoptimalprescriptionofantibioticsinhospitals,andcontrollingmobilerobots.hefoundedmenyasolutions,acompanythatofferssoftwaredevelopmentsandservicesinartificialintelligence(www.menyasolutions.com).leohartmanreceivedthephddegreeincomputersciencefromtheuniversityofrochesterin1990.hisdissertationinvesti-gatestheuseofdecisiontheoryforallocatingcomputationalresourcesindeductiveplanning.afterapostdocattheuniversityofwaterloo,hejoinedthecanadianspaceagencyin1993asaresearchscientist.hisworktherefocusesoncomputing,networking,andautomationforspacemissions.belghithetal.:anintelligentsimulatorforteleroboticstraining19', 11, 'gfhgfhg', 6, '2016-12-05', 'letter', 'L', 'P', 3, 1, 0);
INSERT INTO `fts_letter_record` (`letter_id`, `sl_no`, `memo_no`, `issue_dt`, `cp_no`, `page_count`, `file_id`, `letter_name`, `user_id`, `content`, `sending_authority`, `subject`, `addressing_desig_id`, `reg_dt`, `location_path`, `regis_status`, `letter_move_status`, `addressing_user_id`, `register_id`, `attached_by`) VALUES
(4, 1, 555, '2016-12-05', 0, 9, 0, '1480915764.pdf', 1, 'csir-ugc(net)examforawardofjuniorresearchfellowshipandeligibilityforlecturershipexamschemeforsinglepapercsir-ugcnetinengineeringsciencesthepatternforthesinglepapermcqtestinengineeringsciencesshallbeasgivenbelow:-themcqtestpaperinengineeringscienceshallcarryamaximumof200marks.thedurationofexamshallbethreehours.thequestionpapershallbedividedinthreepartspart‘a’.thispartshallcarry20questionsofgeneralaptitude(logicalreasoning,graphicalanalysis,analyticalandnumericalability,quantitativecomparisons,seriesformation,puzzles,etc).candidatesshallberequiredtoanswerany15questions.eachquestionshallbeof2marks.totalmarksallocatedtothissectionshallbe30outof200.----------------------------------------------------------------------------------------------------------------part‘b’:thispartshallcontain25questionsrelatedtomathematicsandengineeringaptitude.candidatesshallberequiredtoanswerany20questions.eachquestionshallbeof3.5marks.totalmarksallocatedtothissectionshallbe70outof200.----------------------------------------------------------------------------------------------------------------part‘c’shallcontainsubjectrelatedquestionsofthefollowing7subjectareas:1.computerscience&informationtechnology2electricalscience3.electronics4.materialsscience5.fluidmechanics6.solidmechanics7.thermodynamicseachsubjectareawillhave10questions.candidatesshallberequiredtoanswerany20questionsoutofatotalof70questions.eachquestionshallbeof5marks.thetotalmarksallocatedtothispartshallbe100outof200.negativemarkingforwronganswersshallbe@25%nb:theactualnumberofquestionsineachpartandsectiontobeaskedandattemptedmayvaryfromexamtoexam.syllabuspartageneralaptitudewithemphasisonlogicalreasoning,graphicalanalysis,analyticalandnumericalability,quantitativecomparisons,seriesformation,puzzles,etc.syllabuspartbmathematicsandengineeringaptitudelinearalgebracalculuscomplexvariablesvectorcalculusordinarydifferentialalgebraofmatrices,inverse,rank,systemoflinearequations,symmetric,skew-symmetricandorthogonalmatrices.hermitian,skew-hermitianandunitarymatrices.eigenvaluesandeigenvectors,diagonalisationofmatrices.functionsofsinglevariable,limit,continuityanddifferentiability,meanvaluetheorems,indeterminateformsandl''hospitalrule,maximaandminima,taylor&#39;sseries,newton’smethodforfindingrootsofpolynomials.fundamentalandmeanvalue-theoremsofintegralcalculus.numericalintegrationbytrapezoidalandsimpson’srule.evaluationofdefiniteandimproperintegrals,betaandgammafunctions,functionsoftwovariables,limit,continuity,partialderivatives,euler''stheoremforhomogeneousfunctions,totalderivatives,maximaandminima,lagrangemethodofmultipliers,doubleintegralsandtheirapplications,sequenceandseries,testsforconvergence,powerseries,fourierseries,halfrangesineandcosineseries.analyticfunctions,cauchy-riemannequations,lineintegral,cauchy''sintegraltheoremandintegralformulataylor’sandlaurent''series,residuetheoremanditsapplications.gradient,divergenceandcurl,vectoridentities,directionalderivatives,line,surfaceandvolumeintegrals,stokes,gaussandgreen''stheoremsandtheirapplications.firstorderequation(linearandnonlinear),secondorderlineardifferentialequationswithvariablecoefficients,variationofequationsprobabilityparametersmethod,higherorderlineardifferentialequationswithconstantcoefficients,cauchy-euler''sequations,powerseriessolutions,legendrepolynomialsandbessel''sfunctionsofthefirstkindandtheirproperties.numericalsolutionsoffirstorderordinarydifferentialequationsbyeuler’sandrunge-kuttamethods.definitionsofprobabilityandsimpletheorems,conditionalprobability,bayestheorem.solidbodymotionandfluidmotion:energetics:electrontransport:electromagnetics:materials:particledynamics;projectiles;rigidbodydynamics;lagrangianformulation;eularianformulation;bernoulli’sequation;continuityequation;surfacetension;viscosity;brownianmotion.lawsofthermodynamics;conceptoffreeenergy;enthalpy,andentropy;equationofstate;thermodynamicsrelations.structureofatoms,conceptofenergylevel,bondtheory;definitionofconduction,semiconductorandinsulators;diode;halfwave&fullwaverectification;amplifiers&oscillators;truthtable.theoryofelectricandmagneticpotential&field;biot&savart’slaw;theoryofdipole;theoryofoscillationofelectron;maxwell’sequations;transmissiontheory;amplitude&frequencymodulation.periodictable;propertiesofelements;reactionofmaterials;metalsandnon-metals(inorganicmaterials),elementaryknowledgeofmonomericandpolymericcompounds;organometalliccompounds;crystalstructureandsymmetry,structure-propertycorrelation-metals,ceramics,andpolymers.syllabuspartc1.computerscienceandinformationtechnologybasicdiscretemathematics:countingprinciples,linearrecurrence,mathematicalinduction,equationsets,relationsandfunction,predicateandpropositionallogic.digitallogic:logicfunctions,minimization,designandsynthesisofcombinationalandsequentialcircuits;numberrepresentationandcomputerarithmetic(fixedandfloatingpoint).computerorganizationandarchitecture:machineinstructionsandaddressingmodes,aluanddata-path,cpucontroldesign,memoryinterface,i/ointerface(interruptanddmamode),instructionpipelining,cacheandmainmemory,secondarystorage.programminganddatastructures:programminginc;functions,recursion,parameterpassing,scope,binding;abstractdatatypes,arrays,stacks,queues,linkedlists,trees,binarysearchtrees,binaryheaps.algorithms:analysis,asymptoticnotation,notionsofspaceandtimecomplexity,worstandaveragecaseanalysis;design:greedyapproach,dynamicprogramming,divide-andconquer;treeandgraphtraversals,connectedcomponents,spanningtrees,shortestpaths;hashing,sorting,searching.asymptoticanalysis(best,worst,averagecases)oftimeandspace,upperandlowerbounds,basicconceptsofcomplexityclassesp,np,np-hard,np-complete.operatingsystem:processes,threads,inter-processcommunication,concurrency,synchronization,deadlock,cpuscheduling,memorymanagementandvirtualmemory,filesystems.databases:er-model,relationalmodel(relationalalgebra,tuplecalculus),databasedesign(integrityconstraints,normalforms),querylanguages(sql),filestructures(sequentialfiles,indexing,bandb+trees),transactionsandconcurrencycontrol.informationsystemsandsoftwareengineering:informationgathering,requirementandfeasibilityanalysis,dataflowdiagrams,processspecifications,input/outputdesign,processlifecycle,planningandmanagingtheproject,design,coding,testing,implementation,maintenance.2.electricalscienceselectriccircuitsandfields:nodeandmeshanalysis,transientresponseofdcandacnetworks,sinusoidalsteady-stateanalysis,resonance,basicfilterconcepts,idealcurrentandvoltagesources,thevenin’s,norton’sandsuperpositionandmaximumpowertransfertheorems,twoportnetworks,threephasecircuits,measurementofpowerinthreephasecircuits,gausstheorem,electricfieldandpotentialduetopoint,line,planeandsphericalchargedistributions,ampere’sandbiot-savart’slaws,inductance,dielectrics,capacitance.electricalmachines:magneticcircuitsmagneticcircuits,singlephasetransformer-equivalentcircuit,phasordiagram,tests,regulationandefficiency,threephasetransformers-connections,paralleloperation,auto-transformer;energyconversionprinciples,dcmachines-types,startingandspeedcontrolofdcmotors,threephaseinductionmotors-principles,types,performancecharacteristics,startingandspeedcontrol,singlephaseinductionmotors,synchronousmachinesperformance,regulationandparalleloperationofsynchronousmachineoperatingasgenerators,startingandspeedcontrolofsynchronousmotorsanditsapplications,servoandsteppermotors.powersystems:basicpowergenerationconcepts,transmissionlinemodelsandperformance,cableperformance,insulation,coronaandradiointerference,distributionsystems,per-unitquantities,busimpedanceandadmittancematrices,loadflow,voltageandfrequencycontrol,powerfactorcorrection;unbalancedanalysis,symmetricalcomponents,basicconceptsofprotectionandstability;introductiontohvdcsystems.controlsystems:principlesoffeedbackcontrol,transferfunction,blockdiagrams,steadystateerrors,routhandnyquisttechniques,bodeplots,rootloci,lag,leadandlead-lagcompensation;proportional,pi,pidcontrollers,statespacemodel,statetransitionmatrix,controllabilityandobservability.powerelectronicsanddrives:semiconductorpowerdevices-powerdiodes,powertransistors,thyristors,triacs,gtos,mosfets,igbts–theircharacteristicsandbasictriggeringcircuits;dioderectifiers,thyristorbasedlinecommutatedactodcconverters,dctodcconverters–buck,boost,buck-boost,c`uk,flyback,forward,push-pullconverters,singlephaseandthreephasedctoacinvertersandrelatedpulsewidthmodulationtechniques,stabilityofelectricdrives;speedcontrolissuesofdcmotors,inductionmotorsandsynchronousmotors.3.electronicsanalogcircuitsandsystems:electronicdevices:characteristicsandsmall-signalequivalentcircuitsofdiodes,bjtsandmosfets.diodecircuits:clipping,clampingandrectifier.biasingandbiasstabilityofbjtandfetamplifiers.amplifiers:single-andmulti-stage,differentialandoperational,feedback,andpower.frequencyresponseofamplifiers.op-ampcircuits:voltage-to-currentandcurrent-to-voltageconverters,activefilters,sinusoidaloscillators,wave-shapingcircuits,effectofpracticalparameters(inputbiascurrent,inputoffsetvoltage,openloopgain,inputresistance,cmrr).electronicmeasurements:voltage,current,impedance,time,phase,frequencymeasurements,oscilloscope.digitalcircuitsandsystems:booleanalgebraandminimizationofbooleanfunctions.logicgates,ttlandcmosicfamilies.combinatorialcircuits:arithmeticcircuits,codeconverters,multiplexersanddecoders.sequentialcircuits:latchesandflip-flops,countersandshift-registers.sample-and-holdcircuits,adcs,dacs.microprocessorsandmicrocontrollers:numbersystems,8085and8051architecture,memory,i/ointerfacing,serialandparallelcommunication.signalsandsystems:lineartimeinvariantsystems:impulseresponse,transferfunctionandfrequencyresponseoffirst-andsecondordersystems,convolution.randomsignalsandnoise:probability,randomvariables,probabilitydensityfunction,autocorrelation,powerspectraldensity.samplingtheorem,discrete-timesystems:impulseandfrequencyresponse,iirandfirfilters.communications:amplitudeandanglemodulationanddemodulation,frequencyandtimedivisionmultiplexing.pulsecodemodulation,amplitudeshiftkeying,frequencyshiftkeyingandpulseshiftkeyingfordigitalmodulation.bandwidthandsnrcalculations.informationtheoryandchannelcapacity.4.materialssciencestructure:atomicstructureandbondinginmaterials.crystalstructureofmaterials,crystalsystems,unitcellsandspacelattices,millerindicesofplanesanddirections,packinggeometryinmetallic,ionicandcovalentsolids.conceptofamorphous,singleandpolycrystallinestructuresandtheireffectonpropertiesofmaterials.imperfectionsincrystallinesolidsandtheirroleininfluencingvariousproperties.diffusion:fick''slawsandapplicationofdiffusion.metalsandalloys:solidsolutions,solubilitylimit,phaserule,binaryphasediagrams,intermediatephases,intermetalliccompounds,iron-ironcarbidephasediagram,heattreatmentofsteels,cold,hotworkingofmetals,recovery,recrystallizationandgraingrowth.microstrcture,propertiesandapplicationsofferrousandnon-ferrousalloys.ceramics,polymers,&composites:structure,properties,processingandapplicationsofceramics.classification,polymerization,structureandproperties,processingandapplications.propertiesandapplicationsofvariouscomposites.materialscharacterizationtools:x-raydiffraction,opticalmicroscopy,scanningelectronmicroscopyandtransmissionelectronmicroscopy,differentialthermalanalysis,differentialscanningcalorimetry.materialsproperties:stress-straindiagramsofmetallic,ceramicandpolymericmaterials,modulusofelasticity,yieldstrength,tensilestrength,toughness,elongation,plasticdeformation,viscoelasticity,hardness,impactstrength,creep,fatigue,ductileandbrittlefracture.heatcapacity,thermalconductivity,thermalexpansionofmaterials.conceptofenergybanddiagramformaterials-conductors,semiconductorsandinsulators,intrinsicandextrinsicsemiconductors,dielectricproperties.originofmagnetisminmetallicandceramicmaterials,paramagnetism,diamagnetism,antiferromagnetism,ferromagnetism,ferrimagnetism,magnetichysterisis.environmentaldegradation:corrosionandoxidationofmaterials,prevention.5.fluidmechanicsfluidproperties:relationbetweenstressandstrainratefornewtonianfluids;buoyancy,manometry,forcesonsubmergedbodies.kinematicseulerianandlagrangiandescriptionoffluidmotion,strainrateandvorticity;conceptoflocalandconvectiveaccelerations,steadyandunsteadyflowscontrolvolumebasedanalysiscontrolvolumeanalysisformass,momentumandenergy.differentialequationsofmassandmomentum(eulerequation),bernoulli''sequationanditsapplications,conceptoffluidrotation.potentialflow:vorticity,streamfunctionandvelocitypotentialfunction;elementaryflowfieldsandprinciplesofsuperposition,potentialflowpastacircularcylinder.dimensionalanalysis:conceptofgeometric,kinematicanddynamicsimilarity,non-dimensionalnumbersandtheirusage.viscousflowsnavier-stokesequations;exactsolutions;couetteflow,fully-developedpipeflow,hydrodynamiclubrication,basicideasoflaminarandturbulentflows,prandtl-mixinglength,frictionfactor,darcy-weisbachrelation,simplepipenetworks.boundarylayerqualitativeideasofboundarylayer,boundarylayerequation;separation,streamlinedandbluffbodies,dragandliftforces.measurementsbasicideasofflowmeasurementusingventurimeter,pitot-statictubeandorificeplate.6.solidmechanicsequivalentforcesystems;free-bodydiagrams;equilibriumequations;analysisofdeterminatetrussesandframes;friction;simpleparticledynamics;planekinematicsandkinetics;work-energyandimpulse-momentumprinciples;stressesandstrains;principalstressesandstrains;mohr''scircle;generalizedhooke''slaw;thermalstrain.axial,shearandbendingmomentdiagrams;axial,shearandbendingstresses;deflectionofbeams(symmetricbending);torsionincircularshafts;thinwalledpressurevessels.energymethods(catigliano’stheorems)foranalysis.combinedaxial,bendingandtorsionalaction;theoriesoffailure.bucklingofcolumns.freevibrationofsingledegreeoffreedomsystems.7.thermodynamicsbasicconcepts:continuum,macroscopicapproach,thermodynamicsystem(closedandopenorcontrolvolume);thermodynamicpropertiesandequilibrium;stateofasystem,statediagram,pathandprocess;differentmodesofwork;zerothlawofthermodynamics;conceptoftemperature;heat.firstlawofthermodynamics:energy,enthalpy,specificheats,firstlawappliedtoclosedsystemsandopensystems(controlvolumes),steadyandunsteadyflowanalysis.secondlawofthermodynamics:kelvin-planckandclausiusstatements,reversibleandirreversibleprocesses,carnottheorems,thermodynamictemperaturescale,clausiusinequalityandconceptofentropy,principleofincreaseofentropy,entropybalanceforclosedandopensystems,exergy(availability)andirreversibility,non-flowandflowexergy.propertiesofpuresubstances:thermodynamicpropertiesofpuresubstancesinsolid,liquidandvaporphases,p-v-tbehaviourofsimplecompressiblesubstances,phaserule,thermodynamicpropertytablesandcharts,idealandrealgases,equationsofstate,compressibilitychart.thermodynamicrelations:t-dsrelations,maxwellequations,joule-thomsoncoefficient,coefficientofvolumeexpansion,adiabaticandisothermalcompressibilities,clapeyronequation.thermodynamiccycles:carnotvapourpowercycle;simplerankinecycle,reheatandregenerativerankinecycle;airstandardcycles:ottocycle,dieselcycle,simplebraytoncycle,braytoncyclewithregeneration,reheatandintercooling;vapour-compressionrefrigerationcycle.idealgasmixtures:dalton''sandamagat''slaws,calculationsofproperties(internalenergy,enthalpy,entropy),air-watervapourmixturesandsimplethermodynamicprocessesinvolvingthem.', 5, 'kkkkk', 6, '2016-12-05', 'letter', 'L', 'M', 3, 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `fts_letter_register`
--

CREATE TABLE `fts_letter_register` (
  `register_id` bigint(20) NOT NULL,
  `keyword` varchar(50) NOT NULL,
  `paper_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fts_letter_register`
--

INSERT INTO `fts_letter_register` (`register_id`, `keyword`, `paper_type`) VALUES
(1, 'PP', 'Public Petition'),
(2, 'NHRC', 'National Human Rights Commisson'),
(3, 'WBHRC', 'West Bengal State Human Right Commission'),
(4, 'COURT', 'Any Court related matter'),
(5, 'WBSWC', 'West Bengal State Women Commission'),
(6, 'NWC', 'National Women Commission'),
(7, 'PD', 'Police Directorate'),
(8, 'STATE GOVT', 'Any State Government Department (Secretaries etc.)'),
(9, 'PU', 'Any Police Unit like District Sps,DIG etc.'),
(10, 'NPU', 'Non Police Unit like DM, SDO, Engineers etc.'),
(11, 'CG', 'Central Government'),
(12, 'CBI', 'Central Bureau of Investigation'),
(13, 'OTHERS', 'Any paper other than above');

-- --------------------------------------------------------

--
-- Table structure for table `fts_login_log`
--

CREATE TABLE `fts_login_log` (
  `log_id` bigint(20) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `login_ip` varchar(200) NOT NULL,
  `login_time` datetime NOT NULL,
  `logout_time` datetime NOT NULL,
  `action` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `fts_personel_info`
--

CREATE TABLE `fts_personel_info` (
  `emp_desig_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `gpf_id` varchar(255) NOT NULL,
  `desig_id` varchar(255) NOT NULL,
  `sec_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fts_personel_info`
--

INSERT INTO `fts_personel_info` (`emp_desig_id`, `user_id`, `gpf_id`, `desig_id`, `sec_id`) VALUES
(1, 1, '56T32', '9,8', '4,5'),
(2, 2, 'SFK5L', '8', '3'),
(3, 3, '261E9', '6,4', '5,1'),
(4, 4, '995K8', '2', '1'),
(5, 5, '32T58', '2', '2'),
(7, 6, '9999', '4,5', '5'),
(8, 8, '5555', '3,5', '3,5,6'),
(13, 13, '787878', '10', '2'),
(14, 14, '565656', '2,3,4,5', '1,2'),
(15, 15, '1234', '8', '1,3');

-- --------------------------------------------------------

--
-- Table structure for table `fts_section`
--

CREATE TABLE `fts_section` (
  `sec_id` bigint(20) NOT NULL,
  `sec_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fts_section`
--

INSERT INTO `fts_section` (`sec_id`, `sec_name`) VALUES
(1, 'Cyber Crime Cell '),
(2, 'Homicide Squad'),
(3, 'DRBT Section'),
(4, 'Motor Theft Squad'),
(5, 'Special Operation Group (SOG)'),
(6, 'Railway & Highway Crime Cell');

-- --------------------------------------------------------

--
-- Table structure for table `fts_subject`
--

CREATE TABLE `fts_subject` (
  `subject_id` bigint(20) NOT NULL,
  `subject_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fts_subject`
--

INSERT INTO `fts_subject` (`subject_id`, `subject_name`) VALUES
(1, 'Allotment of Fund'),
(2, 'Ammunition'),
(3, 'Arms'),
(4, 'Assembly Questions'),
(5, 'Audit'),
(6, 'Advertisement');

-- --------------------------------------------------------

--
-- Table structure for table `fts_user`
--

CREATE TABLE `fts_user` (
  `user_id` bigint(20) NOT NULL,
  `gpf_id` varchar(100) NOT NULL,
  `emp_id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `phone` varchar(18) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `last_login` datetime NOT NULL,
  `user_type` varchar(11) NOT NULL,
  `reg_date` datetime NOT NULL,
  `is_active` enum('Y','N') NOT NULL,
  `is_deleted` enum('N','Y') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fts_user`
--

INSERT INTO `fts_user` (`user_id`, `gpf_id`, `emp_id`, `name`, `user_name`, `phone`, `email`, `password`, `last_login`, `user_type`, `reg_date`, `is_active`, `is_deleted`) VALUES
(1, '56T32', '', 'SHREE BASU  ', 'srb', '8745621355', 'sr@gmail.com', '202cb962ac59075b964b07152d234b70', '2016-12-05 10:39:36', 'priv_user', '2016-09-02 13:13:37', 'Y', 'N'),
(2, 'SFK5L', '', 'ROHIT ROY', 'SFK5L', '7854612399', 'roy.rh@yahoo.in', '202cb962ac59075b964b07152d234b70', '2016-09-15 13:42:52', 'normal_user', '2016-09-02 13:16:59', 'Y', 'N'),
(3, '261E9', '', 'pritha  sen', 'psen', '4569871230', 'psen@rediffmail.com', '202cb962ac59075b964b07152d234b70', '2016-12-05 10:50:16', 'admin', '2016-09-02 13:18:07', 'Y', 'N'),
(4, '995K8', '', 'KIRON AHAMED', '995K8', '44444444444', 'rere@fggh.com', '202cb962ac59075b964b07152d234b70', '2016-09-15 13:40:37', 'normal_user', '2016-09-03 09:57:22', 'Y', 'N'),
(6, '9999', '', 'SUNDAR PICHAI', 'pichai1', '5555555555', 'pichai@yahoo.in', '202cb962ac59075b964b07152d234b70', '0000-00-00 00:00:00', 'normal_user', '2016-09-21 08:29:07', 'Y', 'N'),
(8, '5555', '', 'Larry Page', 'page', '44444444444', 'page@gmaill.com', '202cb962ac59075b964b07152d234b70', '0000-00-00 00:00:00', 'normal_user', '2016-09-21 10:26:31', 'N', 'N'),
(13, '787878', '', 'Jobes Page', 'jj', '5555555555', 'r@gh.cn', '202cb962ac59075b964b07152d234b70', '0000-00-00 00:00:00', 'normal_user', '2016-09-22 14:04:43', 'N', 'N'),
(14, '565656', '', 'SUKANTA ROY', 'dd', '4444444444', 'rere@fggh.co', '202cb962ac59075b964b07152d234b70', '0000-00-00 00:00:00', 'normal_user', '2016-09-22 14:10:07', 'N', 'N'),
(15, '1234', '', 'KANTA ROY', '1234', '2345678923', 'srr@gmail.com', '202cb962ac59075b964b07152d234b70', '0000-00-00 00:00:00', 'normal_user', '2016-10-01 13:53:05', 'Y', 'N');

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `id` int(11) NOT NULL,
  `txt` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `fts_actionable_letter`
--
ALTER TABLE `fts_actionable_letter`
  ADD PRIMARY KEY (`action_id`);

--
-- Indexes for table `fts_authority`
--
ALTER TABLE `fts_authority`
  ADD PRIMARY KEY (`authority_id`);

--
-- Indexes for table `fts_category`
--
ALTER TABLE `fts_category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `fts_designation`
--
ALTER TABLE `fts_designation`
  ADD PRIMARY KEY (`desig_id`);

--
-- Indexes for table `fts_employee`
--
ALTER TABLE `fts_employee`
  ADD PRIMARY KEY (`emp_id`);

--
-- Indexes for table `fts_file_history_info`
--
ALTER TABLE `fts_file_history_info`
  ADD PRIMARY KEY (`trail_id`);

--
-- Indexes for table `fts_file_movement`
--
ALTER TABLE `fts_file_movement`
  ADD PRIMARY KEY (`movement_id`);

--
-- Indexes for table `fts_file_note`
--
ALTER TABLE `fts_file_note`
  ADD PRIMARY KEY (`note_id`);

--
-- Indexes for table `fts_file_registration`
--
ALTER TABLE `fts_file_registration`
  ADD PRIMARY KEY (`file_id`);

--
-- Indexes for table `fts_letter_history_info`
--
ALTER TABLE `fts_letter_history_info`
  ADD PRIMARY KEY (`trail_letter_id`);

--
-- Indexes for table `fts_letter_movement`
--
ALTER TABLE `fts_letter_movement`
  ADD PRIMARY KEY (`move_id`);

--
-- Indexes for table `fts_letter_record`
--
ALTER TABLE `fts_letter_record`
  ADD PRIMARY KEY (`letter_id`);
ALTER TABLE `fts_letter_record` ADD FULLTEXT KEY `idx_content` (`content`);

--
-- Indexes for table `fts_letter_register`
--
ALTER TABLE `fts_letter_register`
  ADD PRIMARY KEY (`register_id`);

--
-- Indexes for table `fts_login_log`
--
ALTER TABLE `fts_login_log`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `fts_personel_info`
--
ALTER TABLE `fts_personel_info`
  ADD PRIMARY KEY (`emp_desig_id`);

--
-- Indexes for table `fts_section`
--
ALTER TABLE `fts_section`
  ADD PRIMARY KEY (`sec_id`);

--
-- Indexes for table `fts_subject`
--
ALTER TABLE `fts_subject`
  ADD PRIMARY KEY (`subject_id`);

--
-- Indexes for table `fts_user`
--
ALTER TABLE `fts_user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_name` (`user_name`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `gpf` (`gpf_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `fts_actionable_letter`
--
ALTER TABLE `fts_actionable_letter`
  MODIFY `action_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `fts_authority`
--
ALTER TABLE `fts_authority`
  MODIFY `authority_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `fts_designation`
--
ALTER TABLE `fts_designation`
  MODIFY `desig_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `fts_employee`
--
ALTER TABLE `fts_employee`
  MODIFY `emp_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `fts_file_history_info`
--
ALTER TABLE `fts_file_history_info`
  MODIFY `trail_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `fts_file_movement`
--
ALTER TABLE `fts_file_movement`
  MODIFY `movement_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `fts_file_note`
--
ALTER TABLE `fts_file_note`
  MODIFY `note_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `fts_file_registration`
--
ALTER TABLE `fts_file_registration`
  MODIFY `file_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `fts_letter_history_info`
--
ALTER TABLE `fts_letter_history_info`
  MODIFY `trail_letter_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `fts_letter_movement`
--
ALTER TABLE `fts_letter_movement`
  MODIFY `move_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `fts_letter_record`
--
ALTER TABLE `fts_letter_record`
  MODIFY `letter_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `fts_letter_register`
--
ALTER TABLE `fts_letter_register`
  MODIFY `register_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `fts_login_log`
--
ALTER TABLE `fts_login_log`
  MODIFY `log_id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `fts_personel_info`
--
ALTER TABLE `fts_personel_info`
  MODIFY `emp_desig_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `fts_section`
--
ALTER TABLE `fts_section`
  MODIFY `sec_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `fts_subject`
--
ALTER TABLE `fts_subject`
  MODIFY `subject_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `fts_user`
--
ALTER TABLE `fts_user`
  MODIFY `user_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
