<?php

namespace App\Http\Controllers;

use App\Models\BatchNumber;
use App\Models\CncProduction;
use App\Models\DispatchAdvice;
use App\Models\EmployeeBioData;
use App\Models\GradeSortingReport;
use App\Models\InsertConsumptionEntry;
use App\Models\Location;
use App\Models\MachineEntry;
use App\Models\MPIProduction;
use App\Models\RejectionDisposition;
use App\Models\Setup;
use App\Models\ShiftEntry;
use App\Models\VisualPacking;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use PDF;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $batch_no = isset($_REQUEST['batch_no']) ? $_REQUEST['batch_no'] : '';
        $total_production = isset($_REQUEST['total_production']) ? $_REQUEST['total_production'] : '';
        $mc_no = isset($_REQUEST['mc_no']) ? $_REQUEST['mc_no'] : '';
        $shift = isset($_REQUEST['shift']) ? $_REQUEST['shift'] : '';
        $setup = isset($_REQUEST['setup']) ? $_REQUEST['setup'] : '';
        $part_name = isset($_REQUEST['part_name']) ? $_REQUEST['part_name'] : '';
        $customer = isset($_REQUEST['customer']) ? $_REQUEST['customer'] : '';
        $cycle_time = isset($_REQUEST['cycle_time']) ? $_REQUEST['cycle_time'] : '';
        $total_rejection = isset($_REQUEST['total_rejection']) ? $_REQUEST['total_rejection'] : '';
        $no_opration = isset($_REQUEST['no_opration']) ? $_REQUEST['no_opration'] : '';
        $no_power = isset($_REQUEST['no_power']) ? $_REQUEST['no_power'] : '';
        $job_setting = isset($_REQUEST['job_setting']) ? $_REQUEST['job_setting'] : '';
        $idle_time = isset($_REQUEST['idle_time']) ? $_REQUEST['idle_time'] : '';
        $lunch = isset($_REQUEST['lunch']) ? $_REQUEST['lunch'] : '';
        $operation_effi = isset($_REQUEST['operation_effi']) ? $_REQUEST['operation_effi'] : '';
        $shift_duration = isset($_REQUEST['shift_duration']) ? $_REQUEST['shift_duration'] : '';
        $total_loss = isset($_REQUEST['total_loss']) ? $_REQUEST['total_loss'] : '';
        $target_production = isset($_REQUEST['target_production']) ? $_REQUEST['target_production'] : '';
        $job_fault = isset($_REQUEST['job_fault']) ? $_REQUEST['job_fault'] : '';
        $no_load = isset($_REQUEST['no_load']) ? $_REQUEST['no_load'] : '';
        $operator_name = isset($_REQUEST['operator_name']) ? $_REQUEST['operator_name'] : '';
        $start_date = isset($_REQUEST['start_date']) ? $_REQUEST['start_date'] : '';
        $end_date = isset($_REQUEST['end_date']) ? $_REQUEST['end_date'] : '';
        $ok_qty = isset($_REQUEST['ok_qty']) ? $_REQUEST['ok_qty'] : '';
        $dispatch_advice_no = isset($_REQUEST['dispatch_advice_no']) ? $_REQUEST['dispatch_advice_no'] : '';
        $sr_no = isset($_REQUEST['sr_no']) ? $_REQUEST['sr_no'] : '';
        $dispatch_qty = isset($_REQUEST['dispatch_qty']) ? $_REQUEST['dispatch_qty'] : '';
        $box_quantity = isset($_REQUEST['box_quantity']) ? $_REQUEST['box_quantity'] : '';
        $fr = isset($_REQUEST['fr']) ? $_REQUEST['fr'] : '';
        $fr_am = isset($_REQUEST['fr_am']) ? $_REQUEST['fr_am'] : '';
        $pmr = isset($_REQUEST['pmr']) ? $_REQUEST['pmr'] : '';
        $total = isset($_REQUEST['total']) ? $_REQUEST['total'] : '';
        $mpi_operator_name = isset($_REQUEST['mpi_operator_name']) ? $_REQUEST['mpi_operator_name'] : '';
        $mpi_mc_no = isset($_REQUEST['mpi_mc_no']) ? $_REQUEST['mpi_mc_no'] : '';
        $insert_name = isset($_REQUEST['insert_name']) ? $_REQUEST['insert_name'] : '';
        $insert_rate_rs = isset($_REQUEST['insert_rate_rs']) ? $_REQUEST['insert_rate_rs'] : '';
        $insert_use_qty = isset($_REQUEST['insert_use_qty']) ? $_REQUEST['insert_use_qty'] : '';
        $insert_cost_nos = isset($_REQUEST['insert_cost_nos']) ? $_REQUEST['insert_cost_nos'] : '';
        $total_prod_qty = isset($_REQUEST['total_prod_qty']) ? $_REQUEST['total_prod_qty'] : '';
        $location = isset($_REQUEST['location']) ? $_REQUEST['location'] : '';
        $visual_inspected_qty = isset($_REQUEST['visual_inspected_qty']) ? $_REQUEST['visual_inspected_qty'] : '';
        $inspected_qty = isset($_REQUEST['inspected_qty']) ? $_REQUEST['inspected_qty'] : '';
        $packed_qty = isset($_REQUEST['packed_qty']) ? $_REQUEST['packed_qty'] : '';
        $incharge_name = isset($_REQUEST['incharge_name']) ? $_REQUEST['incharge_name'] : '';
        $box_qty = isset($_REQUEST['box_qty']) ? $_REQUEST['box_qty'] : '';
        $grade_mc_no = isset($_REQUEST['grade_mc_no']) ? $_REQUEST['grade_mc_no'] : '';
        $inspectors = isset($_REQUEST['inspectors']) ? $_REQUEST['inspectors'] : '';
        $checked_qty = isset($_REQUEST['checked_qty']) ? $_REQUEST['checked_qty'] : '';



        $data['batch_no'] = $batch_no;
        $data['total_production'] = $total_production;
        $data['mc_no'] = $mc_no;
        $data['shift'] = $shift;
        $data['setup'] = $setup;
        $data['part_name'] = $part_name;
        $data['customer'] = $customer;
        $data['cycle_time'] = $cycle_time;
        $data['total_rejection'] = $total_rejection;
        $data['no_opration'] = $no_opration;
        $data['no_power'] = $no_power;
        $data['job_setting'] = $job_setting;
        $data['lunch'] = $lunch;
        $data['idle_time'] = $idle_time;
        $data['target_production'] = $target_production;
        $data['operation_effi'] = $operation_effi;
        $data['shift_duration'] = $shift_duration;
        $data['total_loss'] = $total_loss;
        $data['job_fault'] = $job_fault;
        $data['no_load'] = $no_load;
        $data['operator_name'] = $operator_name;
        $data['start_date'] = $start_date;
        $data['end_date'] = $end_date;
        $data['ok_qty'] = $ok_qty;
        $data['dispatch_advice_no'] = $dispatch_advice_no;
        $data['sr_no'] = $sr_no;
        $data['dispatch_qty'] = $dispatch_qty;
        $data['box_quantity'] = $box_quantity;
        $data['fr'] = $fr;
        $data['fr_am'] = $fr_am;
        $data['pmr'] = $pmr;
        $data['total'] = $total;
        $data['mpi_operator_name'] = $mpi_operator_name;
        $data['mpi_mc_no'] = $mpi_mc_no;
        $data['insert_name'] = $insert_name;
        $data['insert_rate_rs'] = $insert_rate_rs;
        $data['insert_use_qty'] = $insert_use_qty;
        $data['insert_cost_nos'] = $insert_cost_nos;
        $data['total_prod_qty'] = $total_prod_qty;
        $data['grade_mc_no'] = $grade_mc_no;
        $data['inspectors'] = $inspectors;
        $data['checked_qty'] = $checked_qty;
        $data['location'] = $location;
        $data['visual_inspected_qty'] = $visual_inspected_qty;
        $data['inspected_qty'] = $inspected_qty;
        $data['packed_qty'] = $packed_qty;
        $data['incharge_name'] = $incharge_name;
        $data['box_qty'] = $box_qty;

        $mc_no = MachineEntry::where('machine_department', 'like', '%Machining%')->orWhere('machine_department', 'like', '%CNC%')->get();
        $mpi_mc_no =  MachineEntry::where('machine_department', 'LIKE', '%MPI%')->get();
        $shift = ShiftEntry::all();
        $location = Location::all();
        $setup = Setup::all();
        $operator_name = EmployeeBioData::where('Oemcname', 'CNC OPERATOR')->get();
        $mpi_operator_name = EmployeeBioData::where('Oemcname', 'MPI OPERATOR')->get();
        $inspectors = EmployeeBioData::where('Oemcname', 'LIKE', '%GRADE SORTING%')->get();
        $grade_mc_no = MachineEntry::where('machine_department', 'like', '%Grade Sorting%')->get();
        $insert_name = InsertConsumptionEntry::get();
        return view('adminHome', compact('data', 'mc_no', 'shift', 'setup', 'operator_name', 'mpi_operator_name', 'mpi_mc_no', 'location', 'inspectors', 'grade_mc_no', 'insert_name'));

        // return view('adminHome');
    }
    public function getDataFilter(Request $request)
    {
        $return_data = [];

        $transaction = isset($_REQUEST['transaction']) ? $_REQUEST['transaction'] : [];

        $checked_value = isset($_REQUEST['checked_value']) ? $_REQUEST['checked_value'] : [];
        $batch_no = isset($_REQUEST['batch_no']) ? $_REQUEST['batch_no'] : '';
        $total_production = isset($_REQUEST['total_production']) ? $_REQUEST['total_production'] : '';
        $mc_no = isset($_REQUEST['mc_no']) ? $_REQUEST['mc_no'] : '';
        $shift = isset($_REQUEST['shift']) ? $_REQUEST['shift'] : '';
        $setup = isset($_REQUEST['setup']) ? $_REQUEST['setup'] : '';
        $part_name = isset($_REQUEST['part_name']) ? $_REQUEST['part_name'] : '';
        $customer = isset($_REQUEST['customer']) ? $_REQUEST['customer'] : '';
        $cycle_time = isset($_REQUEST['cycle_time']) ? $_REQUEST['cycle_time'] : '';
        $total_rejection = isset($_REQUEST['total_rejection']) ? $_REQUEST['total_rejection'] : '';
        $no_opration = isset($_REQUEST['no_opration']) ? $_REQUEST['no_opration'] : '';
        $no_power = isset($_REQUEST['no_power']) ? $_REQUEST['no_power'] : '';
        $job_setting = isset($_REQUEST['job_setting']) ? $_REQUEST['job_setting'] : '';
        $idle_time = isset($_REQUEST['idle_time']) ? $_REQUEST['idle_time'] : '';
        $lunch = isset($_REQUEST['lunch']) ? $_REQUEST['lunch'] : '';
        $operation_effi = isset($_REQUEST['operation_effi']) ? $_REQUEST['operation_effi'] : '';
        $shift_duration = isset($_REQUEST['shift_duration']) ? $_REQUEST['shift_duration'] : '';
        $total_loss = isset($_REQUEST['total_loss']) ? $_REQUEST['total_loss'] : '';
        $target_production = isset($_REQUEST['target_production']) ? $_REQUEST['target_production'] : '';
        $job_fault = isset($_REQUEST['job_fault']) ? $_REQUEST['job_fault'] : '';
        $no_load = isset($_REQUEST['no_load']) ? $_REQUEST['no_load'] : '';
        $operator_name = isset($_REQUEST['operator_name']) ? $_REQUEST['operator_name'] : '';
        $start_date = isset($_REQUEST['start_date']) ? $_REQUEST['start_date'] : '';
        $end_date = isset($_REQUEST['end_date']) ? $_REQUEST['end_date'] : '';
        $mpi_operator_name = isset($_REQUEST['mpi_operator_name']) ? $_REQUEST['mpi_operator_name'] : '';
        $mpi_mc_no = isset($_REQUEST['mpi_mc_no']) ? $_REQUEST['mpi_mc_no'] : '';
        $ok_qty = isset($_REQUEST['ok_qty']) ? $_REQUEST['ok_qty'] : '';
        $dispatch_advice_no = isset($_REQUEST['dispatch_advice_no']) ? $_REQUEST['dispatch_advice_no'] : '';
        $sr_no = isset($_REQUEST['sr_no']) ? $_REQUEST['sr_no'] : '';
        $dispatch_qty = isset($_REQUEST['dispatch_qty']) ? $_REQUEST['dispatch_qty'] : '';
        $box_quantity = isset($_REQUEST['box_quantity']) ? $_REQUEST['box_quantity'] : '';
        $fr = isset($_REQUEST['fr']) ? $_REQUEST['fr'] : '';
        $fr_am = isset($_REQUEST['fr_am']) ? $_REQUEST['fr_am'] : '';
        $pmr = isset($_REQUEST['pmr']) ? $_REQUEST['pmr'] : '';
        $total = isset($_REQUEST['total']) ? $_REQUEST['total'] : '';        $insert_name = isset($_REQUEST['insert_name']) ? $_REQUEST['insert_name'] : '';
        $insert_rate_rs = isset($_REQUEST['insert_rate_rs']) ? $_REQUEST['insert_rate_rs'] : '';
        $insert_use_qty = isset($_REQUEST['insert_use_qty']) ? $_REQUEST['insert_use_qty'] : '';
        $insert_cost_nos = isset($_REQUEST['insert_cost_nos']) ? $_REQUEST['insert_cost_nos'] : '';
        $total_prod_qty = isset($_REQUEST['total_prod_qty']) ? $_REQUEST['total_prod_qty'] : '';
        $location = isset($_REQUEST['location']) ? $_REQUEST['location'] : '';
        $visual_inspected_qty = isset($_REQUEST['visual_inspected_qty']) ? $_REQUEST['visual_inspected_qty'] : '';
        $inspected_qty = isset($_REQUEST['inspected_qty']) ? $_REQUEST['inspected_qty'] : '';
        $packed_qty = isset($_REQUEST['packed_qty']) ? $_REQUEST['packed_qty'] : '';
        $incharge_name = isset($_REQUEST['incharge_name']) ? $_REQUEST['incharge_name'] : '';
        $box_qty = isset($_REQUEST['box_qty']) ? $_REQUEST['box_qty'] : '';
        $grade_mc_no = isset($_REQUEST['grade_mc_no']) ? $_REQUEST['grade_mc_no'] : '';
        $inspectors = isset($_REQUEST['inspectors']) ? $_REQUEST['inspectors'] : '';
        $checked_qty = isset($_REQUEST['checked_qty']) ? $_REQUEST['checked_qty'] : '';

        if ($transaction == 'CNC Production') {

            $cnc_production = CncProduction::orderBy('id', 'desc');
            if (!empty($batch_no) && in_array('batch_no', $checked_value)) {
                $cnc_production->where('batch_no', 'like', '%' . $batch_no . '%');
            }
            if (!empty($mc_no) && in_array('mc_no', $checked_value)) {
                $cnc_production->where('mc_no', 'like', '%' . $mc_no . '%');
            }
            if (!empty($shift) && in_array('shift', $checked_value)) {
                $cnc_production->where('shift', 'like', '%' . $shift . '%');
            }
            if (!empty($setup) && in_array('setup', $checked_value)) {
                $cnc_production->where('setup', 'like', '%' . $setup . '%');
            }
            if (!empty($part_name) && in_array('part_name', $checked_value)) {
                $cnc_production->where('part_name', 'like', '%' . $part_name . '%');
            }
            if (!empty($customer) && in_array('customer', $checked_value)) {
                $cnc_production->where('customer', 'like', '%' . $customer . '%');
            }
            if (!empty($cycle_time) && in_array('cycle_time', $checked_value)) {
                $cnc_production->where('cycle_time', 'like', '%' . $cycle_time . '%');
            }
            if (!empty($total_rejection) && in_array('total_rejection', $checked_value)) {
                $cnc_production->where('total_rejection', 'like', '%' . $total_rejection . '%');
            }
            if (!empty($no_opration) && in_array('no_opration', $checked_value)) {
                $cnc_production->where('no_opration', 'like', '%' . $no_opration . '%');
            }
            if (!empty($no_power) && in_array('no_power', $checked_value)) {
                $cnc_production->where('no_power', 'like', '%' . $no_power . '%');
            }
            if (!empty($job_setting) && in_array('job_setting', $checked_value)) {
                $cnc_production->where('job_setting', 'like', '%' . $job_setting . '%');
            }
            if (!empty($idle_time) && in_array('idle_time', $checked_value)) {
                $cnc_production->where('idle_time', 'like', '%' . $idle_time . '%');
            }
            if (!empty($lunch) && in_array('lunch', $checked_value)) {
                $cnc_production->where('lunch', 'like', '%' . $lunch . '%');
            }
            if (!empty($shift_duration) && in_array('shift_duration', $checked_value)) {
                $cnc_production->where('shift_duration', 'like', '%' . $shift_duration . '%');
            }
            if (!empty($total_loss) && in_array('total_loss', $checked_value)) {
                $cnc_production->where('total_loss', 'like', '%' . $total_loss . '%');
            }
            // if (!empty($target_production) && in_array('target_production', $checked_value)) {
            //     $cnc_production->where('target_production', 'like', '%' . $target_production . '%');
            // }
            // if (!empty($operation_effi) && in_array('operation_effi', $checked_value)) {
            //     $cnc_production->where('operation_effi', 'like', '%' . $operation_effi . '%');
            // }
            if (!empty($job_fault) && in_array('job_fault', $checked_value)) {
                $cnc_production->where('job_fault', 'like', '%' . $job_fault . '%');
            }
            if (!empty($no_load) && in_array('no_load', $checked_value)) {
                $cnc_production->where('no_load', 'like', '%' . $no_load . '%');
            }
            if (!empty($total_production) && in_array('total_production', $checked_value)) {
                $cnc_production->where('total_production', 'like', '%' . $total_production . '%');
            }
            if (!empty($operator_name) && in_array('operator_name', $checked_value)) {
                $cnc_production->where('operator_name', 'like', '%' . $operator_name . '%');
            }
            if (!empty($start_date && $end_date)) {
                $cnc_production->whereBetween('date', [date('m/d/Y', strtotime($start_date)), date('m/d/Y', strtotime($end_date))]);
            }
            // dd($cnc_production->get(),$cnc_production->toSql(),date('m/d/Y', strtotime($start_date)),date('m/d/Y', strtotime($end_date)));
        }
        if ($transaction == 'Dispatch Advice') {

            $dispatch_advice = DispatchAdvice::orderBy('id', 'desc');
            if (!empty($dispatch_advice_no)) {
                $dispatch_advice->where('dispatch_advice_no', 'like', '%' . $dispatch_advice_no . '%');
            }
            if (!empty($sr_no)) {
                $dispatch_advice->where('sr_no', 'like', '%' . $sr_no . '%');
            }
            if (!empty($batch_no)) {
                $dispatch_advice->where('batch_no', 'like', '%' . $batch_no . '%');
            }
            if (!empty($part_name)) {
                $dispatch_advice->where('part_name', 'like', '%' . $part_name . '%');
            }
            if (!empty($customer)) {
                $dispatch_advice->where('customer', 'like', '%' . $customer . '%');
            }
            if (!empty($dispatch_qty)) {
                $dispatch_advice->where('ok_qty', 'like', '%' . $ok_qty . '%');
            }
            if (!empty($box_quantity)) {
                $dispatch_advice->where('box_quantity', 'like', '%' . $box_quantity . '%');
            }
            
            if (!empty($start_date && $end_date)) {
                $dispatch_advice->whereBetween('date', [date('m/d/Y', strtotime($start_date)), date('m/d/Y', strtotime($end_date))]);
            }
        }
        if ($transaction == 'MPI Production') {

            $mpi_production = MPIProduction::orderBy('id', 'desc');
            if (!empty($batch_no)) {
                $mpi_production->where('batch_number_id', 'like', '%' . $batch_no . '%');
            }
            if (!empty($part_name)) {
                $mpi_production->where('part_name', 'like', '%' . $part_name . '%');
            }
            if (!empty($customer)) {
                $mpi_production->where('customer', 'like', '%' . $customer . '%');
            }
            if (!empty($mpi_mc_no)) {
                $mpi_production->where('mc_no', 'like', '%' . $mpi_mc_no . '%');
            }
            if (!empty($shift)) {
                $mpi_production->where('shift', 'like', '%' . $shift . '%');
            }
            if (!empty($inspected_qty)) {
                $mpi_production->where('inspected_qty', 'like', '%' . $inspected_qty . '%');
            }
            if (!empty($rejected_qty)) {
                $mpi_production->where('rejected_qty', 'like', '%' . $rejected_qty . '%');
            }
            if (!empty($mpi_operator_name)) {
                $mpi_production->where('operator_name', 'like', '%' . $mpi_operator_name . '%');
            }
            if (!empty($ok_qty)) {
                $mpi_production->where('ok_qty', 'like', '%' . $ok_qty . '%');
            }
            if (!empty($start_date && $end_date)) {
                $mpi_production->whereBetween('date', [date('m/d/Y', strtotime($start_date)), date('m/d/Y', strtotime($end_date))]);
            }
        }
        if ($transaction == 'Insert Counsuption Entry') {

            $insert_consumption_entry = InsertConsumptionEntry::orderBy('id', 'desc');
            if (!empty($batch_no)) {
                $insert_consumption_entry->where('batch_no', 'like', '%' . $batch_no . '%');
            }
            if (!empty($part_name)) {

                $insert_consumption_entry->where('part_name', 'like', '%' . $part_name . '%');
            }
            if (!empty($customer)) {
                $insert_consumption_entry->where('customer_name', 'like', '%' . $customer . '%');
            }
            if (!empty($mc_no)) {
                $insert_consumption_entry->where('mc_no', 'like', '%' . $mc_no . '%');
            }
            if (!empty($insert_name)) {
                $insert_consumption_entry->where('insert_name', 'like', '%' . $insert_name . '%');
            }
            if (!empty($insert_rate_rs)) {
                $insert_consumption_entry->where('insert_rate_rs', 'like', '%' . $insert_rate_rs . '%');
            }
            if (!empty($insert_use_qty)) {
                $insert_consumption_entry->where('insert_use_qty', 'like', '%' . $insert_use_qty . '%');
            }
            if (!empty($insert_cost_nos)) {
                $insert_consumption_entry->where('insert_cost_nos', 'like', '%' . $insert_cost_nos . '%');
            }
            if (!empty($total_prod_qty)) {
                $insert_consumption_entry->where('total_prod_qty', 'like', '%' . $total_prod_qty . '%');
            }
            if (!empty($start_date && $end_date)) {
                $insert_consumption_entry->whereBetween('date', [date('m/d/Y', strtotime($start_date)), date('m/d/Y', strtotime($end_date))]);
            }
        }
        if ($transaction == 'Rejection Disposition') {

            $rejection_disposition = RejectionDisposition::orderBy('id', 'desc');
            if (!empty($batch_no)) {
                $rejection_disposition->where('batch_number_id', 'like', '%' . $batch_no . '%');
            }
            if (!empty($part_name)) {
                $rejection_disposition->where('part_name', 'like', '%' . $part_name . '%');
            }
            if (!empty($customer)) {
                $rejection_disposition->where('customer', 'like', '%' . $customer . '%');
            }
            if (!empty($fr)) {
                $dispatch_advice->where('fr', 'like', '%' . $fr . '%');
            }
            if (!empty($fr_am)) {
                $dispatch_advice->where('fr_am', 'like', '%' . $fr_am . '%');
            }
            if (!empty($pmr)) {
                $dispatch_advice->where('pmr', 'like', '%' . $pmr . '%');
            }
            if (!empty($total)) {
                $dispatch_advice->where('total', 'like', '%' . $total . '%');
            }
            if (!empty($start_date && $end_date)) {
                $rejection_disposition->whereBetween('date', [date('m/d/Y', strtotime($start_date)), date('m/d/Y', strtotime($end_date))]);
            }
        }
        if ($transaction == 'Visual & Packing') {

            $visual_packing = VisualPacking::orderBy('id', 'desc');
            if (!empty($batch_no)) {
                $visual_packing->where('batch_no', 'like', '%' . $batch_no . '%');
            }
            if (!empty($shift)) {
                $visual_packing->where('shift', 'like', '%' . $shift . '%');
            }
            if (!empty($part_name)) {
                $visual_packing->where('part_name', 'like', '%' . $part_name . '%');
            }
            if (!empty($customer)) {
                $visual_packing->where('customer', 'like', '%' . $customer . '%');
            }
            if (!empty($location)) {
                $visual_packing->where('location', 'like', '%' . $location . '%');
            }
            if (!empty($packed_qty)) {
                $visual_packing->where('packed_qty', 'like', '%' . $packed_qty . '%');
            }
            if (!empty($incharge_name)) {
                $visual_packing->where('incharge_name', 'like', '%' . $incharge_name . '%');
            }
            if (!empty($box_qty)) {
                $visual_packing->where('box_qty', 'like', '%' . $box_qty . '%');
            }
            if (!empty($visual_inspected_qty)) {
                $visual_packing->where('visual_inspected_qty', 'like', '%' . $visual_inspected_qty . '%');
            }
            if (!empty($total_rejection)) {
                $visual_packing->where('total_rejection', 'like', '%' . $total_rejection . '%');
            }
            if (!empty($start_date && $end_date)) {
                $visual_packing->whereBetween('date', [date('m/d/Y', strtotime($start_date)), date('m/d/Y', strtotime($end_date))]);
            }
        }

        if ($transaction == 'Grade Sorting Report') {

            $grade_sorting_report = GradeSortingReport::orderBy('id', 'desc');
            if (!empty($batch_no)) {
                $grade_sorting_report->where('batch_no', 'like', '%' . $batch_no . '%');
            }
            if (!empty($part_no_and_name)) {
                $grade_sorting_report->where('part_no_and_name', 'like', '%' . $part_no_and_name . '%');
            }
            if (!empty($customer)) {
                $grade_sorting_report->where('customer', 'like', '%' . $customer . '%');
            }
            if (!empty($grade_mc_no)) {
                $grade_sorting_report->where('mc_no', 'like', '%' . $grade_mc_no . '%');
            }
            if (!empty($shift)) {
                $grade_sorting_report->where('shift', 'like', '%' . $shift . '%');
            }
            if (!empty($checked_qty)) {
                $grade_sorting_report->where('checked_qty', 'like', '%' . $checked_qty . '%');
            }
            if (!empty($suspected_rej_qty)) {
                $grade_sorting_report->where('suspected_rej_qty', 'like', '%' . $suspected_rej_qty . '%');
            }
            if (!empty($inspectors)) {
                $grade_sorting_report->where('inspectors', 'like', '%' . $inspectors . '%');
            }
            if (!empty($ok_qty)) {
                $grade_sorting_report->where('ok_qty', 'like', '%' . $ok_qty . '%');
            }
            if (!empty($start_date && $end_date)) {
                $grade_sorting_report->whereBetween('date', [date('m/d/Y', strtotime($start_date)), date('m/d/Y', strtotime($end_date))]);
            }
        }
        $data['batch_no'] = $batch_no;
        $data['mc_no'] = $mc_no;
        $data['shift'] = $shift;
        $data['setup'] = $setup;
        $data['part_name'] = $part_name;
        $data['customer'] = $customer;
        $data['cycle_time'] = $cycle_time;
        $data['total_rejection'] = $total_rejection;
        $data['no_opration'] = $no_opration;
        $data['no_power'] = $no_power;
        $data['job_setting'] = $job_setting;
        $data['idle_time'] = $idle_time;
        $data['lunch'] = $lunch;
        $data['shift_duration'] = $shift_duration;
        $data['target_production'] = $target_production;
        $data['operation_effi'] = $operation_effi;
        $data['total_loss'] = $total_loss;
        $data['job_fault'] = $job_fault;
        $data['no_load'] = $no_load;
        $data['total_production'] = $total_production;
        $data['operator_name'] = $operator_name;
        $data['start_date'] = $start_date;
        $data['end_date'] = $end_date;
        $data['ok_qty'] = $ok_qty;
        $data['dispatch_advice_no'] = $dispatch_advice_no;
        $data['sr_no'] = $sr_no;
        $data['dispatch_qty'] = $dispatch_qty;
        $data['box_quantity'] = $box_quantity;
        $data['fr'] = $fr;
        $data['fr_am'] = $fr_am;
        $data['pmr'] = $pmr;
        $data['total'] = $total;
        $data['mpi_operator_name'] = $mpi_operator_name;
        $data['mpi_mc_no'] = $mpi_mc_no;
        $data['insert_name'] = $insert_name;
        $data['insert_rate_rs'] = $insert_rate_rs;
        $data['insert_use_qty'] = $insert_use_qty;
        $data['insert_cost_nos'] = $insert_cost_nos;
        $data['total_prod_qty'] = $total_prod_qty;
        $data['grade_mc_no'] = $grade_mc_no;
        $data['inspectors'] = $inspectors;
        $data['checked_qty'] = $checked_qty;
        $data['location'] = $location;
        $data['visual_inspected_qty'] = $visual_inspected_qty;
        $data['inspected_qty'] = $inspected_qty;
        $data['packed_qty'] = $packed_qty;
        $data['incharge_name'] = $incharge_name;
        $data['box_qty'] = $box_qty;

        if ($transaction == 'CNC Production') {
            $cnc_production = $cnc_production->get();
            // dd($cnc_production);
        }
        if ($transaction == 'Dispatch Advice') {
            $dispatch_advice = $dispatch_advice->get();
        }
        if ($transaction == 'MPI Production') {
            $mpi_production = $mpi_production->get();
        }
        if ($transaction == 'Insert Counsuption Entry') {
            $insert_consumption_entry = $insert_consumption_entry->get();
        }
        if ($transaction == 'Rejection Disposition') {
            $rejection_disposition = $rejection_disposition->get();
        }
        if ($transaction == 'Visual & Packing') {
            $visual_packing = $visual_packing->get();
        }
        if ($transaction == 'Grade Sorting Report') {
            $grade_sorting_report = $grade_sorting_report->get();
        }
        $html = '<style>
        .dt-buttons{
            margin-left: 800px;
            margin-top: -65px;
        }
        .buttons-print{
            background-color: #6290bf !important;
            color: white !important;
        }
        .buttons-pdf{
            background: #e31313 !important;
            color: white !important;
        }
        .buttons-excel{
            background: #108545 !important;
            color: white !important;
        }
        
       </style>';
        $html .= '<b class="mb-2">Report Date: '.$start_date.' to ' .$end_date.'</b>';
        $html .= '<table class="table table-bordered display" id="cnc">';

        if ($transaction == 'CNC Production') {
            
            $html .= '<thead><tr class="center_cell">';
            if (in_array('start_date', $checked_value)) {
                $html .= '<th style="text-align: center">Date</th>';
            }
            
            if (in_array('mc_no', $checked_value)) {
                $html .= '<th style="text-align: center">MC No</th>';
            }
            if (in_array('shift', $checked_value)) {
                $html .= '<th style="text-align: center">Shift</th>';
            }
            
            if (in_array('batch_no', $checked_value)) {
                $html .= '<th style="text-align: center">Batch No</th>';
            }
            if (in_array('part_name', $checked_value)) {
                $html .= '<th style="text-align: center">Part Name</th>';
            }
            if (in_array('customer', $checked_value)) {
                $html .= '<th style="text-align: center">Customer</th>';
            }
            if (in_array('setup', $checked_value)) {
                $html .= '<th style="text-align: center">Setup</th>';
            }
            if (in_array('cycle_time', $checked_value)) {
                $html .= '<th style="text-align: center">C.T</th>';
            }
            if (in_array('total_rejection', $checked_value)) {
                $html .= '<th style="text-align: center">T.Rej</th>';
            }
            if (in_array('no_opration', $checked_value)) {
                $html .= '<th style="text-align: center">No Oper</th>';
            }
            if (in_array('no_power', $checked_value)) {
                $html .= '<th style="text-align: center">No Pow</th>';
            }
            if (in_array('job_setting', $checked_value)) {
                $html .= '<th style="text-align: center">Job Set</th>';
            }
            if (in_array('idle_time', $checked_value)) {
                $html .= '<th style="text-align: center">Idle Time</th>';
            }
            if (in_array('lunch', $checked_value)) {
                $html .= '<th style="text-align: center">Lunch</th>';
            }
            if (in_array('shift_duration', $checked_value)) {
                $html .= '<th style="text-align: center">Shift Dura</th>';
            }
            
            if (in_array('job_fault', $checked_value)) {
                $html .= '<th style="text-align: center">Job Fault</th>';
            }
            if (in_array('no_load', $checked_value)) {
                $html .= '<th style="text-align: center">No Load</th>';
            }
            if (in_array('total_production', $checked_value)) {
                $html .= '<th style="text-align: center">T.Prod</th>';
            }
            if (in_array('operator_name', $checked_value)) {
                $html .= '<th style="text-align: center">Operator Name</th>';
            }
            if (in_array('target_production', $checked_value)) {
                $html .= '<th style="text-align: center">Target Prod</th>';
            }
            if (in_array('operation_effi', $checked_value)) {
                $html .= '<th style="text-align: center">Ope Effi</th>';
            }
            if (in_array('total_loss', $checked_value)) {
                $html .= '<th style="text-align: center">T.Los</th>';
            }
            
            $html .= '</tr></thead>';
            $html .= '<tbody>';
            $total_pro = 0;
            $total_rej = 0;
            if (!empty($cnc_production)) {
                
                foreach ($cnc_production as $val) {
                    $shift_duration = intVal($val->shift_duration) * 60;
                    $cycle_time = $val->cycle_time;
                    
                    $a = $val->time;
                    $b = $val->lunch;
                    $c = $val->no_opration;
                    $d = $val->no_power;
                    $e = $val->job_setting;
                    $f = $val->job_fault;
                    $g = $val->no_load;
                    
                    $time_loses = $a + $b + $c + $d + $e + $f + $g;
                    $total_run_time = $shift_duration - $time_loses;
                    $insert_change = (5.83333333333333 * $total_run_time) / 60;
                    $net_run_time = $total_run_time - $insert_change;

                    $target_production = 0;
                    $operation_effi = 0;
                    if($cycle_time !=0){

                        $target_production = ( $net_run_time * 60 ) / $cycle_time;
                        $operation_effi = ( $val->total_production / $target_production ) * 100;
                    }
                    


                    $total_pro += $val->total_production;
                    $total_rej += $val->total_rejection;
                    $html .= '<tr>';
                    if (in_array('start_date', $checked_value)) {
                        $html .= '<td>' . date('d/m/Y',strtotime($val->date)) . '</td>';
                    }
                    
                    if (in_array('mc_no', $checked_value)) {
                        $html .= '<td>' . $val->mc_no . '</td>';
                    }
                    if (in_array('shift', $checked_value)) {
                        $html .= ' <td style="text-align: center">' . $val->shift . '</td>';
                    }
                    
                    if (in_array('batch_no', $checked_value)) {
                        $html .= '<td>' . $val->batch_no . '</td>';
                    }
                    if (in_array('part_name', $checked_value)) {
                        $html .= '<td>' . $val->part_name . '</td>';
                    }
                    if (in_array('customer', $checked_value)) {
                        $html .= '<td>' . $val->customer . '</td>';
                    }
                    if (in_array('setup', $checked_value)) {
                        $html .= '<td style="text-align: center">' . $val->setup . '</td>';
                    }
                    if (in_array('cycle_time', $checked_value)) {
                        $html .= '<td style="text-align: center">' . $val->cycle_time . '</td>';
                    }
                    if (in_array('total_rejection', $checked_value)) {
                        $html .= '<td  style="text-align: right">' . $val->total_rejection . '</td>';
                    }
                    if (in_array('no_opration', $checked_value)) {
                        $html .= '<td style="text-align: center">' . $val->no_opration . '</td>';
                    }
                    if (in_array('no_power', $checked_value)) {
                        $html .= ' <td style="text-align: center">' . $val->no_power . '</td>';
                    }
                    if (in_array('job_setting', $checked_value)) {
                        $html .= '<td style="text-align: center">' . $val->job_setting . '</td>';
                    }
                    if (in_array('idle_time', $checked_value)) {
                        $html .= '<td style="text-align: center">' . $val->idle_time . '</td>';
                    }
                    if (in_array('lunch', $checked_value)) {
                        $html .= '<td style="text-align: center">' . $val->lunch . '</td>';
                    }
                    if (in_array('shift_duration', $checked_value)) {
                        $html .= '<td style="text-align: center">' . $val->shift_duration . '</td>';
                    }
                    
                    if (in_array('job_fault', $checked_value)) {
                        $html .= '<td style="text-align: center">' . $val->job_fault . '</td>';
                    }
                    if (in_array('no_load', $checked_value)) {
                        $html .= '<td style="text-align: center">' . $val->no_load . '</td>';
                    }
                    if (in_array('total_production', $checked_value)) {
                        $html .= '<td  style="text-align: right">' . $val->total_production . '</td>';
                    }
                    if (in_array('operator_name', $checked_value)) {
                        $html .= '<td>' . $val->operator_name . '</td>';
                    }
                    if (in_array('target_production', $checked_value)) {
                        $html .= '<td style="text-align: center">' . round($target_production,2) . '</td>';
                    }
                    if (in_array('operation_effi', $checked_value)) {
                        $html .= '<td style="text-align: center">' .round($operation_effi,2). '</td>';
                    }
                    if (in_array('total_loss', $checked_value)) {
                        $html .= '<td style="text-align: center">' .$val->total_loss. '</td>';
                    }
                    
                    // if (in_array('end_date', $checked_value)) {
                    //     $html .= '<td>' . $val->end_date . '</td>';
                    // }
                    $html .= '</tr>';
                }
            }
            $html .= '</tbody>';
            $html .= '<tfoot>';
            $html .= '<tr>';
            if (in_array('start_date', $checked_value)) {
                $html .= '<td></td>';
            }
            
            if (in_array('mc_no', $checked_value)) {
                $html .= '<td></td>';
            }
            if (in_array('shift', $checked_value)) {
                $html .= ' <td></td>';
            }
            
            if (in_array('batch_no', $checked_value)) {
                $html .= '<td></td>';
            }
            if (in_array('part_name', $checked_value)) {
                $html .= '<td></td>';
            }
            if (in_array('customer', $checked_value)) {
                $html .= '<td></td>';
            }
            if (in_array('setup', $checked_value)) {
                $html .= '<td></td>';
            }
            if (in_array('cycle_time', $checked_value)) {
                $html .= '<td></td>';
            }
            if (in_array('total_rejection', $checked_value)) {
                $html .= '<td style="text-align: right"> <b> Total: ' . $total_rej . '</b></td>';
            }
            if (in_array('no_opration', $checked_value)) {
                $html .= '<td></td>';
            }
            if (in_array('no_power', $checked_value)) {
                $html .= ' <td></td>';
            }
            if (in_array('job_setting', $checked_value)) {
                $html .= '<td></td>';
            }
            if (in_array('idle_time', $checked_value)) {
                $html .= '<td></td>';
            }
            if (in_array('lunch', $checked_value)) {
                $html .= '<td></td>';
            }
            if (in_array('shift_duration', $checked_value)) {
                $html .= '<td></td>';
            }
            if (in_array('job_fault', $checked_value)) {
                $html .= '<td></td>';
            }
            if (in_array('no_load', $checked_value)) {
                $html .= '<td></td>';
            }
            if (in_array('total_production', $checked_value)) {
                $html .= '<td style="text-align: right"> <b> Total: ' . $total_pro . '</b></td>';
            }
            if (in_array('operator_name', $checked_value)) {
                $html .= '<td></td>';
            }
            if (in_array('target_production', $checked_value)) {
                $html .= '<td></td>';
            }
            if (in_array('operation_effi', $checked_value)) {
                $html .= '<td></td>';
            }
            if (in_array('total_loss', $checked_value)) {
                $html .= '<td></td>';
            }
            
            $html .= '</tr>';

            $html .= '</tfoot>';
        }

        if ($transaction == 'Dispatch Advice') {
            $html .= '<thead><tr class="center_cell">';
             if (in_array('start_date', $checked_value)) {
                $html .= '<th style="text-align: center">Date</th>';
            }
            if (in_array('dispatch_advice_no', $checked_value)) {
                $html .= '<th style="text-align: center">Dispatch Advice No</th>';
            }
            if (in_array('sr_no', $checked_value)) {
                $html .= '<th style="text-align: center">Sr No</th>';
            }
           
            if (in_array('batch_no', $checked_value)) {
                $html .= '<th style="text-align: center">Batch No</th>';
            }
            if (in_array('part_name', $checked_value)) {
                $html .= '<th style="text-align: center">Part Name</th>';
            }
            if (in_array('customer', $checked_value)) {
                $html .= '<th style="text-align: center">Customer</th>';
            }
            if (in_array('dispatch_qty', $checked_value)) {
                $html .= '<th style="text-align: center">Dispatch Qty</th>';
            }
            if (in_array('box_quantity', $checked_value)) {
                $html .= '<th style="text-align: center">Box Qty</th>';
            }
            
            
            $html .= '</tr></thead>';
            $html .= '<tbody>';
            $ok_tot = 0;
            $box_tot = 0;
           
            if (!empty($dispatch_advice)) {
                foreach ($dispatch_advice as $val) {
                    foreach(json_decode($val->nos_per_box) as $key=>$nos){
                    $ok_tot += $nos;
                    }
                    $sr_no = json_decode($val->sr_no);
                    foreach(json_decode($val->box_quantity) as $key=>$box){
                        $box_tot += $box;
                    $html .= '<tr>';
                    if (in_array('start_date', $checked_value)) {
                        $html .= '<td>' . date('d/m/Y',strtotime($val->date)) . '</td>';
                    }
                    if (in_array('dispatch_advice_no', $checked_value)) {
                        $html .= '<td  style="text-align: center">' . $val->dispatch_advice_no . '</td>';
                    }
                    if (in_array('sr_no', $checked_value)) {
                        $html .= '<td  style="text-align: center">' .($key+1) . '</td>';
                    }
                    
                    if (in_array('batch_no', $checked_value)) {
                        $html .= '<td>' . $val->batch_no . '</td>';
                    }
                    if (in_array('part_name', $checked_value)) {
                        $html .= '<td>' . $val->part_name . '</td>';
                    }
                    if (in_array('customer', $checked_value)) {
                        $html .= '<td>' . $val->customer . '</td>';
                    }
                    if (in_array('dispatch_qty', $checked_value)) {
                        $html .= '<td  style="text-align: right">' . json_decode($val->nos_per_box)[$key] . '</td>';
                    }
                    if (in_array('box_quantity', $checked_value)) {
                        $html .= '<td  style="text-align: right">' .$box. '</td>';
                    }
                    

                    $html .= '</tr>';
                    }
                }
            }
            $html .= '</tbody>';
            $html .= '<tfoot>';
            $html .= '<tr>';
            if (in_array('start_date', $checked_value)) {
                $html .= '<td></td>';
            }
            if (in_array('dispatch_advice_no', $checked_value)) {
                        $html .= '<td  style="text-align: right"></td>';
            }
            if (in_array('sr_no', $checked_value)) {
                        $html .= '<td  style="text-align: right"></td>';
            }
            
            if (in_array('batch_no', $checked_value)) {
                $html .= '<td></td>';
            }
            
            if (in_array('part_name', $checked_value)) {
                $html .= '<td></td>';
            }
            if (in_array('customer', $checked_value)) {
                $html .= '<td></td>';
            }
            if (in_array('dispatch_qty', $checked_value)) {
                $html .= '<td style="text-align: right"> <b>Total: ' . $ok_tot . '</b></td>';
            }
            if (in_array('box_quantity', $checked_value)) {
                $html .= '<td style="text-align: right"><b>Total: ' .$box_tot. '</b></td>';
            }
            

            $html .= '</tr>';
            $html .= '</tfoot>';
        }
        if ($transaction == 'MPI Production') {
            $html .= '<thead><tr class="center_cell">';
            if (in_array('start_date', $checked_value)) {
                $html .= '<th style="text-align: center">Date</th>';
            }
            if (in_array('mpi_mc_no', $checked_value)) {
                $html .= '<th style="text-align: center">Mpi Mc No</th>';
            }
            if (in_array('batch_no', $checked_value)) {
                $html .= '<th style="text-align: center">Batch No</th>';
            }
            if (in_array('part_name', $checked_value)) {
                $html .= '<th style="text-align: center">Part Name</th>';
            }
            if (in_array('customer', $checked_value)) {
                $html .= '<th style="text-align: center">Customer</th>';
            }
            if (in_array('inspected_qty', $checked_value)) {
                $html .= '<th style="text-align: center">Inspected Qty</th>';
            }
            if (in_array('ok_qty', $checked_value)) {
                $html .= '<th style="text-align: center">Ok Qty</th>';
            }
            if (in_array('rejected_qty', $checked_value)) {
                $html .= '<th style="text-align: center">Rejection Qty</th>';
            }
            if (in_array('shift', $checked_value)) {
                $html .= '<th style="text-align: center">Shift</th>';
            }
            if (in_array('mpi_operator_name', $checked_value)) {
                $html .= '<th style="text-align: center">Mpi Operator Name</th>';
            }
            $html .= '</tr></thead>';
            $html .= '<tbody>';
            $ok_tot = 0;
            $inspected_tot = 0;
            $rejected_tot = 0;
            if (!empty($mpi_production)) {
                foreach ($mpi_production as $val) {
                    $ok_tot += $val->ok_qty;
                    $inspected_tot += $val->inspected_qty;
                    $rejected_tot += $val->rejected_qty;
                    $html .= '<tr>';
                    if (in_array('start_date', $checked_value)) {
                        $html .= '<td>' . date('d/m/Y',strtotime($val->date)) . '</td>';
                    }
                    if (in_array('mpi_mc_no', $checked_value)) {
                        $html .= '<td style="text-align: center">' . $val->mc_no . '</td>';
                    }
                    if (in_array('batch_no', $checked_value)) {
                        $html .= '<td>' . $val->batch_number_id . '</td>';
                    }
                    if (in_array('part_name', $checked_value)) {
                        $html .= '<td>' . $val->part_name . '</td>';
                    }
                    if (in_array('customer', $checked_value)) {
                        $html .= '<td>' . $val->customer . '</td>';
                    }
                    if (in_array('inspected_qty', $checked_value)) {
                        $html .= ' <td  style="text-align: right">' . $val->inspected_qty . '</td>';
                    }
                    if (in_array('ok_qty', $checked_value)) {
                        $html .= ' <td  style="text-align: right">' . $val->ok_qty . '</td>';
                    }
                    if (in_array('rejected_qty', $checked_value)) {
                        $html .= ' <td  style="text-align: right">' . $val->rejected_qty . '</td>';
                    }
                    if (in_array('shift', $checked_value)) {
                        $html .= ' <td style="text-align: center">' . $val->shift . '</td>';
                    }
                    if (in_array('mpi_operator_name', $checked_value)) {
                        $html .= ' <td>' . $val->operator_name . '</td>';
                    }
                    $html .= '</tr>';
                }
            }
            $html .= '</tbody>';
            $html .= '<tfoot>';
            $html .= '<tr>';
             if (in_array('start_date', $checked_value)) {
                $html .= '<td></td>';
            }
            if (in_array('mpi_mc_no', $checked_value)) {
                $html .= '<td></td>';
            }
            if (in_array('batch_no', $checked_value)) {
                $html .= '<td></td>';
            }
            if (in_array('part_name', $checked_value)) {
                $html .= '<td></td>';
            }
            if (in_array('customer', $checked_value)) {
                $html .= '<td></td>';
            }
            if (in_array('inspected_qty', $checked_value)) {
                $html .= ' <td style="text-align: right"> <b>Total: ' . $inspected_tot . '</b></td>';
            }
            if (in_array('ok_qty', $checked_value)) {
                $html .= ' <td style="text-align: right"> <b>Total: ' . $ok_tot . '</b></td>';
            }
            if (in_array('rejected_qty', $checked_value)) {
                $html .= ' <td style="text-align: right"> <b>Total: ' . $rejected_tot . '</b></td>';
            }
            if (in_array('shift', $checked_value)) {
                $html .= ' <td></td>';
            }
            if (in_array('mpi_operator_name', $checked_value)) {
                $html .= ' <td></td>';
            }
            $html .= '</tr>';
            $html .= '</tfoot>';
        }
        if ($transaction == 'Insert Counsuption Entry') {
            $html .= '<thead><tr class="center_cell">';
            if (in_array('start_date', $checked_value)) {
                $html .= '<th style="text-align: center">Date</th>';
            }
            if (in_array('batch_no', $checked_value)) {
                $html .= '<th style="text-align: center">Batch No</th>';
            }
            if (in_array('part_name', $checked_value)) {
                $html .= '<th style="text-align: center">Part Name</th>';
            }
            if (in_array('customer', $checked_value)) {
                $html .= '<th style="text-align: center">Customer</th>';
            }
            if (in_array('insert_name', $checked_value)) {
                $html .= '<th style="text-align: center">Insert Name</th>';
            }
            if (in_array('mc_no', $checked_value)) {
                $html .= '<th style="text-align: center">MC No</th>';
            }
            
            if (in_array('insert_rate_rs', $checked_value)) {
                $html .= '<th style="text-align: center">Insert Rate Rs</th>';
            }
            if (in_array('total_prod_qty', $checked_value)) {
                $html .= '<th style="text-align: center">Production Qty</th>';
            }
            if (in_array('insert_use_qty', $checked_value)) {
                $html .= '<th style="text-align: center">Insert Use Qty</th>';
            }
            if (in_array('insert_cost_nos', $checked_value)) {
                $html .= '<th style="text-align: center">Insert Cost Nos</th>';
            }
            $html .= '</tr></thead>';
            $html .= '<tbody>';
            $insert_rate_tot = 0;
            $insert_cost_nos_tot = 0;
            $insert_use_qty_tot = 0;
            $total_prod_qty_tot = 0;
            if (!empty($insert_consumption_entry)) {
                foreach ($insert_consumption_entry as $val) {
                    $insert_rate_tot += $val->insert_rate_rs;
                    $insert_use_qty_tot += $val->insert_use_qty;
                    $insert_cost_nos_tot += $val->insert_cost_nos;
                    $total_prod_qty_tot += $val->total_prod_qty;
                    $html .= '<tr>';
                    if (in_array('start_date', $checked_value)) {
                        $html .= '<td>' . date('d/m/Y',strtotime($val->date)) . '</td>';
                    }
                    if (in_array('batch_no', $checked_value)) {
                        $html .= '<td>' . $val->batch_no . '</td>';
                    }
                    if (in_array('part_name', $checked_value)) {
                        $html .= '<td>' . $val->part_name . '</td>';
                    }
                    if (in_array('customer', $checked_value)) {
                        $html .= '<td>' . $val->customer_name . '</td>';
                    }
                    if (in_array('insert_name', $checked_value)) {
                        $html .= '<td>' . $val->insert_name . '</td>';
                    }
                    if (in_array('mc_no', $checked_value)) {
                        $html .= '<td style="text-align: center">' . $val->mc_no . '</td>';
                    }
                    if (in_array('insert_rate_rs', $checked_value)) {
                        $html .= '<td style="text-align: right">' . $val->insert_rate_rs . '</td>';
                    }
                    if (in_array('total_prod_qty', $checked_value)) {
                        $html .= '<td style="text-align: right">' . $val->total_prod_qty . '</td>';
                    }
                    if (in_array('insert_use_qty', $checked_value)) {
                        $html .= '<td style="text-align: right">' . $val->insert_use_qty . '</td>';
                    }
                    if (in_array('insert_cost_nos', $checked_value)) {
                        $html .= '<td style="text-align: right">' . $val->insert_cost_nos . '</td>';
                    }
                    $html .= '</tr>';
                }
            }
            $html .= '</tbody>';
            $html .= '<tfoot>';
            $html .= '<tr>';
            if (in_array('start_date', $checked_value)) {
                $html .= '<td></td>';
            }
            if (in_array('batch_no', $checked_value)) {
                $html .= '<td></td>';
            }
            if (in_array('part_name', $checked_value)) {
                $html .= '<td></td>';
            }
            if (in_array('customer', $checked_value)) {
                $html .= '<td></td>';
            }
            if (in_array('insert_name', $checked_value)) {
                $html .= '<td></td>';
            }
            if (in_array('mc_no', $checked_value)) {
                $html .= '<td></td>';
            }
            if (in_array('insert_rate_rs', $checked_value)) {
                $html .= '<td style="text-align: right"> <b>Total: ' . $insert_rate_tot . '</b></td>';
            }
            if (in_array('total_prod_qty', $checked_value)) {
                $html .= '<td style="text-align: right"> <b>Total: ' . $total_prod_qty_tot . '</b></td>';
            }
            if (in_array('insert_use_qty', $checked_value)) {
                $html .= '<td style="text-align: right"> <b>Total: ' . $insert_use_qty_tot . '</b></td>';
            }
            if (in_array('insert_cost_nos', $checked_value)) {
                $html .= '<td style="text-align: right"> <b>Total: ' . $insert_cost_nos_tot . '</b></td>';
            }
            $html .= '</tr>';
            $html .= '</tfoot>';
        }
        if ($transaction == 'Rejection Disposition') {
            $html .= '<thead><tr class="center_cell">';
             if (in_array('start_date', $checked_value)) {
                $html .= '<th style="text-align: center">Date</th>';
            }
            if (in_array('batch_no', $checked_value)) {
                $html .= '<th style="text-align: center">Batch No</th>';
            }
            if (in_array('part_name', $checked_value)) {
                $html .= '<th style="text-align: center">Part Name</th>';
            }
            if (in_array('customer', $checked_value)) {
                $html .= '<th style="text-align: center">Customer</th>';
            }
            if (in_array('fr', $checked_value)) {
                $html .= '<th style="text-align: center">FR</th>';
            }
            if (in_array('fr_am', $checked_value)) {
                $html .= '<th style="text-align: center">FR AM</th>';
            }
            if (in_array('pmr', $checked_value)) {
                $html .= '<th style="text-align: center">PMR</th>';
            }
            if (in_array('total', $checked_value)) {
                $html .= '<th style="text-align: center">Total</th>';
            }
            $html .= '</tr></thead>';
            $html .= '<tbody>';
            $fr_tot=0;
            $fr_am_tot=0;
            $pmr_tot=0;
            $total_tot=0;
            if (!empty($rejection_disposition)) {
                foreach ($rejection_disposition as $val) {
                    $fr_tot+=$val->fr;
                    $fr_am_tot+=$val->fr_am;
                    $pmr_tot+=$val->pmr;
                    $total_tot+=$val->total;
                    $html .= '<tr>';
                    if (in_array('start_date', $checked_value)) {
                        $html .= '<td>' . date('d/m/Y',strtotime($val->date)) . '</td>';
                    }
                    if (in_array('batch_no', $checked_value)) {
                        $html .= '<td>' . $val->batch_number_id . '</td>';
                    }
                    if (in_array('part_name', $checked_value)) {
                        $html .= '<td>' . $val->part_name . '</td>';
                    }
                    if (in_array('customer', $checked_value)) {
                        $html .= '<td>' . $val->customer . '</td>';
                    }
                    if (in_array('fr', $checked_value)) {
                        $html .= '<td style="text-align: right">' . $val->fr . '</td>';
                    }
                    if (in_array('fr_am', $checked_value)) {
                        $html .= '<td style="text-align: right">' . $val->fr_am . '</td>';
                    }
                    if (in_array('pmr', $checked_value)) {
                        $html .= '<td style="text-align: right">' . $val->pmr . '</td>';
                    }
                    if (in_array('total', $checked_value)) {
                        $html .= '<td style="text-align: right">' . $val->total . '</td>';
                    }
                    $html .= '</tr>';
                }
            }
            $html .= '</tbody>';
            $html .= '<tfoot>';
            $html .= '<tr>';
                    if (in_array('start_date', $checked_value)) {
                        $html .= '<td></td>';
                    }
                    if (in_array('batch_no', $checked_value)) {
                        $html .= '<td></td>';
                    }
                    if (in_array('part_name', $checked_value)) {
                        $html .= '<td></td>';
                    }
                    if (in_array('customer', $checked_value)) {
                        $html .= '<td></td>';
                    }
                    if (in_array('fr', $checked_value)) {
                        $html .= '<td style="text-align: right"> <b>Total:' . $fr_tot . '</b></td>';
                    }
                    if (in_array('fr_am', $checked_value)) {
                        $html .= '<td style="text-align: right"> <b>Total:' . $fr_am_tot . '</b></td>';
                    }
                    if (in_array('pmr', $checked_value)) {
                        $html .= '<td style="text-align: right"> <b>Total:' . $pmr_tot . '</b></td>';
                    }
                    if (in_array('total', $checked_value)) {
                        $html .= '<td style="text-align: right"> <b>Total:' . $total_tot . '</b></td>';
                    }
                    

                    $html .= '</tr>';
            $html .= '</tfoot>';
        }
        if ($transaction == 'Visual & Packing') {
            $html .= '<thead><tr class="center_cell">';
            if (in_array('start_date', $checked_value)) {
                $html .= '<th style="text-align: center">Date</th>';
            }
            if (in_array('batch_no', $checked_value)) {
                $html .= '<th style="text-align: center">Batch No</th>';
            }
            if (in_array('part_name', $checked_value)) {
                $html .= '<th style="text-align: center">Part Name</th>';
            }
            if (in_array('customer', $checked_value)) {
                $html .= '<th style="text-align: center">Customer</th>';
            }
            if (in_array('location', $checked_value)) {
                $html .= '<th style="text-align: center">Location</th>';
            }
            if (in_array('packed_qty', $checked_value)) {
                $html .= '<th style="text-align: center">Packed Qty</th>';
            }
            if (in_array('box_qty', $checked_value)) {
                $html .= '<th style="text-align: center">Box Qty</th>';
            }
            if (in_array('visual_inspected_qty', $checked_value)) {
                $html .= '<th style="text-align: center">Visual Inspected Qty</th>';
            }
            if (in_array('total_rejection', $checked_value)) {
                $html .= '<th style="text-align: center">Total Rejection</th>';
            }
            if (in_array('incharge_name', $checked_value)) {
                $html .= '<th style="text-align: center">Incharge Name</th>';
            }
            $html .= '</tr></thead>';
            $html .= '<tbody>';
            $packed_tot = 0;
            $box_tot = 0;
            $visual_inspected_tot = 0;
            $total_rejection_tot = 0;
            if (!empty($visual_packing)) {
                foreach ($visual_packing as $val) {
                    $packed_tot += $val->packed_qty;
                    $visual_inspected_tot += $val->visual_inspected_qty;
                    $box_tot += $val->box_qty;
                    $total_rejection_tot += $val->total_rejection;
                    $html .= '<tr>';
                    if (in_array('start_date', $checked_value)) {
                        $html .= '<td>' . date('d/m/Y',strtotime($val->date)) . '</td>';
                    }
                    if (in_array('batch_no', $checked_value)) {
                        $html .= '<td>' . $val->batch_no . '</td>';
                    }
                    if (in_array('part_name', $checked_value)) {
                        $html .= '<td>' . $val->part_name . '</td>';
                    }
                    if (in_array('customer', $checked_value)) {
                        $html .= '<td>' . $val->customer . '</td>';
                    }
                    
                    if (in_array('location', $checked_value)) {
                        $html .= '<td style="text-align: center">' . $val->location . '</td>';
                    }
                    if (in_array('packed_qty', $checked_value)) {
                        $html .= '<td style="text-align: right">' . $val->packed_qty . '</td>';
                    }
                    if (in_array('box_qty', $checked_value)) {
                        $html .= '<td style="text-align: right">' . $val->box_qty . '</td>';
                    }
                    if (in_array('visual_inspected_qty', $checked_value)) {
                        $html .= '<td style="text-align: right">' . $val->visual_inspected_qty . '</td>';
                    }
                    if (in_array('total_rejection', $checked_value)) {
                        $html .= '<td style="text-align: right">' . $val->total_rejection . '</td>';
                    }
                    if (in_array('incharge_name', $checked_value)) {
                        $html .= '<td>' . $val->incharge_name . '</td>';
                    }
                    $html .= '</tr>';
                }
            }
            $html .= '</tbody>';
            $html .= '<tfoot>';
            $html .= '<tr>';
            if (in_array('start_date', $checked_value)) {
                $html .= '<td></td>';
            }
            if (in_array('batch_no', $checked_value)) {
                $html .= '<td></td>';
            }
            if (in_array('part_name', $checked_value)) {
                $html .= '<td></td>';
            }
            if (in_array('customer', $checked_value)) {
                $html .= '<td></td>';
            }
            
            if (in_array('location', $checked_value)) {
                $html .= '<td></td>';
            }
            if (in_array('packed_qty', $checked_value)) {
                $html .= '<td style="text-align: right"> <b>Total: ' . $packed_tot . '</b></td>';
            }
            if (in_array('box_qty', $checked_value)) {
                $html .= '<td style="text-align: right"> <b>Total: ' . $box_tot . '</b></td>';
            }
            if (in_array('visual_inspected_qty', $checked_value)) {
                $html .= '<td style="text-align: right"> <b>Total: ' . $visual_inspected_tot . '</b></td>';
            }
            if (in_array('total_rejection', $checked_value)) {
                $html .= '<td style="text-align: right"> <b>Total: ' . $total_rejection_tot . '</b></td>';
            }
            if (in_array('incharge_name', $checked_value)) {
                $html .= '<td></td>';
            }
            $html .= '</tr>';
            $html .= '</tfoot>';
        }




        if ($transaction == 'Grade Sorting Report') {
            $html .= '<thead><tr class="center_cell">';
            if (in_array('start_date', $checked_value)) {
                $html .= '<th style="text-align: center">Date</th>';
            }
            if (in_array('grade_mc_no', $checked_value)) {
                $html .= '<th style="text-align: center">Grade Mc No</th>';
            }
            if (in_array('batch_no', $checked_value)) {
                $html .= '<th style="text-align: center">Batch No</th>';
            }
            if (in_array('part_name', $checked_value)) {
                $html .= '<th style="text-align: center">Part Name</th>';
            }
            if (in_array('customer', $checked_value)) {
                $html .= '<th style="text-align: center">Customer</th>';
            }
            
            if (in_array('shift', $checked_value)) {
                $html .= '<th style="text-align: center">Shift</th>';
            }
            if (in_array('checked_qty', $checked_value)) {
                $html .= '<th style="text-align: center">Checked Qty</th>';
            }
            if (in_array('rejected_qty', $checked_value)) {
                $html .= '<th style="text-align: center">Rejected Qty</th>';
            }
            if (in_array('ok_qty', $checked_value)) {
                $html .= '<th style="text-align: center">OK Qty</th>';
            }
            
             if (in_array('inspectors', $checked_value)) {
                $html .= '<th style="text-align: center">Inspectors</th>';
            }
            $html .= '</tr></thead>';
            $html .= '<tbody>';
            // dd($grade_sorting_report);
            $checked_tot = 0;
            $suspected_rej_tot = 0;
            $ok_tot = 0;
            // dd($grade_sorting_report$grade_sorting_report);
            if (!empty($grade_sorting_report)) {

                foreach ($grade_sorting_report as $val) {
                    $checked_tot += $val->checked_qty;
                    $suspected_rej_tot += $val->suspected_rej_qty;
                    $ok_tot += $val->ok_qty;
                    $html .= '<tr>';
                    if (in_array('start_date', $checked_value)) {
                        $html .= '<td>' .date('d/m/Y',strtotime($val->date))  . '</td>';
                    }
                    if (in_array('grade_mc_no', $checked_value)) {
                        $html .= '<td style="text-align: center">' . $val->mc_no . '</td>';
                    }
                    if (in_array('batch_no', $checked_value)) {
                        $html .= '<td>' . $val->batch_no . '</td>';
                    }
                    if (in_array('part_name', $checked_value)) {
                        $html .= '<td>' . $val->part_no_and_name . '</td>';
                    }
                    if (in_array('customer', $checked_value)) {
                        $html .= '<td>' . $val->customer . '</td>';
                    }
                    
                    if (in_array('shift', $checked_value)) {
                        $html .= '<td style="text-align: center">' . $val->shift . '</td>';
                    }
                    if (in_array('checked_qty', $checked_value)) {
                        $html .= '<td  style="text-align: right">' . $val->checked_qty . '</td>';
                    }
                     if (in_array('rejected_qty', $checked_value)) {
                        $html .= '<td  style="text-align: right">' . $val->suspected_rej_qty . '</td>';
                    }
                    if (in_array('ok_qty', $checked_value)) {
                        $html .= '<td  style="text-align: right">' . $val->ok_qty . '</td>';
                    }
                   
                     if (in_array('inspectors', $checked_value)) {
                        $html .= '<td>' . $val->inspectors . '</td>';
                    }
                    $html .= '</tr>';
                }
            }
            $html .= '</tbody>';
            $html .= '<tfoot>';
            $html .= '<tr>';
            if (in_array('start_date', $checked_value)) {
                $html .= '<td></td>';
            }
            if (in_array('grade_mc_no', $checked_value)) {
                $html .= '<td></td>';
            }
            if (in_array('batch_no', $checked_value)) {
                $html .= '<td></td>';
            }
            if (in_array('part_name', $checked_value)) {
                $html .= '<td></td>';
            }
            if (in_array('customer', $checked_value)) {
                $html .= '<td></td>';
            }
            
            if (in_array('shift', $checked_value)) {
                $html .= '<td></td>';
            }
            if (in_array('checked_qty', $checked_value)) {
                $html .= '<td style="text-align: right"> <b>Total: ' . $checked_tot . '</b></td>';
            }
            if (in_array('rejected_qty', $checked_value)) {
                $html .= '<td style="text-align: right"> <b>Total: ' . $suspected_rej_tot . '</b></td>';
            }
            if (in_array('ok_qty', $checked_value)) {
                $html .= '<td style="text-align: right"> <b>Total: ' . $ok_tot . '</b></td>';
            }
            
            if (in_array('inspectors', $checked_value)) {
                $html .= '<td></td>';
            }
            $html .= '</tr>';
            $html .= '</tfoot>';
        }
        $html .= '</table>';
        $a = [];
        for ($i = 0; $i < count($checked_value); $i++) {
            $a[] = '*';
        }
        
        if(count($checked_value) > 7){
            $size = 'doc.styles["td:nth-child(2)"] = { 
                           width: "100px",
                           "max-width": "100px",
                        }';
        } else {
            $size = 'doc.content[2].table.widths =' . json_encode($a);
        }
        $s1 = "<xf numFmtId='300' fontId='0' fillId='0' borderId='0' applyFont='1' applyFill='1' applyBorder='1' xfId='0' applyNumberFormat='1'/>";
        $s2 = "<xf numFmtId='0' fontId='2' fillId='0' borderId='0' applyFont='1' applyFill='1' applyBorder='1' xfId='0' applyAlignment='1'><alignment horizontal='center'/></xf>";
        $s3 = "<xf numFmtId='4' fontId='2' fillId='0' borderId='0' applyFont='1' applyFill='1' applyBorder='1' xfId='0' applyNumberFormat='1'/>";
        $s4 = "<xf numFmtId='0' fontId='2' fillId='0' borderId='0' applyFont='1' applyFill='1' applyBorder='1' xfId='0' applyAlignment='1'><alignment horizontal='center' wrapText='1'/></xf>";
        
        $lastTotal = '';
        if(!empty($total_rej) || !empty($total_pro)){
            $lastTotal = '$("row:last c", sheet).attr( "s", BoldCentered );';
        }
        
        $js = ' <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
        <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js"></script>
        <script src="https://cdn.datatables.net/responsive/2.1.0/js/dataTables.responsive.js"></script>
        <script>
        $(document).ready(function() {
        
            $("#cnc").DataTable( {
                dom: "Brtip",
                "iDisplayLength": 20,
                responsive: true,
                
                buttons: [{
                    extend: "pdfHtml5",
                    footer: true,
                    title: "'.$transaction.' Report",
                    messageTop: "[Report Date From ' .$start_date . ' To  ' . $end_date . '] ",
                    tableWidth:100,
                    customize: function ( doc ) {
                        doc.styles.tableHeader.alignment = "left";
                        doc.defaultStyle.fontSize = 10;
                        doc.styles.title = {
                            fontSize: "25",
                            alignment: "center"
                        }
                        doc.styles.tableHeader = {
                             bold: true,
                            fontSize: 13,
                            color: "white",
                            fillColor: "#818181",
                            alignment: "center"
                        }
                        doc.styles.tableFooter = {
                             bold: true,
                            fontSize: 13,
                            color: "white",
                            fillColor: "#818181",
                            alignment: "center"
                        }
                        '.$size.'
                    },
                    orientation: "landscape",
                    pageSize: "LEGAL",
        },
        { 
            extend: "excelHtml5",
            customize: function (xlsx) {
                var sheet = xlsx.xl.worksheets["sheet1.xml"];
                
                // BoldCentered
                var sSh = xlsx.xl["styles.xml"];
                var lastXfIndex = $("cellXfs xf", sSh).length - 1;
                var BoldCentered = lastXfIndex + 2;
                sSh.childNodes[0].childNodes[5].innerHTML += "'.$s1.' + '.$s2.' + '.$s3.' + '.$s4.'";
               
                $("row:eq(0) c", sheet).attr( "s", BoldCentered );
                $("row:eq(1) c", sheet).attr( "s", BoldCentered );
                $("row:eq(2) c", sheet).attr( "s", BoldCentered );
                
                '.$lastTotal.'
            },
            footer: true,
            title: "'.$transaction.' Report",
            messageTop: "[Report Date From ' . $start_date . ' To  ' .$end_date . ']",
            text: "Export to Excel",
            
             
         },
        { 
            extend: "print",
            footer: true,
            title: "RAVI TECHNOFORGE PVT.LTD.",
            
         }
         
        ],
        
    });
    });
    </script>';
        $html .= $js;
        // dd($request->pdf);
        $return_data['html'] = $html;
        echo json_encode($return_data);
    }
    public function adminLogout()
    {
        Auth::logout();
        Session::flush();
        return redirect()->route('login');
    }
    // public function session_date(Request $request)
    // {
    //     dd($request);
    //     $date = Session::put('default_login_date', $request->date);
    //     return Response::json($date);
    // }
    function refrence_blno_id_from_bl_no_select2_source(Request $request)
    {
        $select2_data = array();
        $search = isset($request->q) ? trim($request->q) : '';
        $page = isset($request->page) ? trim($request->page) : 1;
        $clerance_id = (isset($request->clerance_id) && !empty($request->clerance_id)) ? trim($request->clerance_id) : '';
        if ($clerance_id == 'null') {
            $clerance_id = '';
        }
        $resultCount = 10;
        $offset = ($page - 1) * $resultCount;
        $query = BatchNumber::select('*');
        if (!empty($clerance_id)) {
            $query->where('id', $clerance_id)->where('batch_name', 'LIKE', "%$search%");
        } else {
            $query->where('batch_name', 'LIKE', "%$search%");
        }
        $get_data = $query->skip($offset)->take($resultCount)->get();
        if (!empty($get_data)) {
            foreach ($get_data as $row) {
                $text = $row->batch_name;
                $select2_data[] = array(
                    'id' => $row->batch_name,
                    'text' => $text,
                    'attr1' => $row->part_name,
                    'attr2' => $row->customer_name,
                    'attr3' => $row->part_type_category,
                    'attr4' => $row->batch_qty,
                );
            }
        }
        $results = array(
            "results" => $select2_data,
            "total_count" => count($get_data),
        );
        echo json_encode($results);
        exit();
    }
    function refrence_Part_n_select2_source(Request $request)
    {
        $select2_data = array();
        $search = isset($request->q) ? trim($request->q) : '';
        $page = isset($request->page) ? trim($request->page) : 1;
        $clerance_id = (isset($request->clerance_id) && !empty($request->clerance_id)) ? trim($request->clerance_id) : '';
        if ($clerance_id == 'null') {
            $clerance_id = '';
        }
        $resultCount = 10;
        $offset = ($page - 1) * $resultCount;
        $query = BatchNumber::select('*');
        if (!empty($clerance_id)) {
            $query->where('id', $clerance_id)->where('part_name', 'LIKE', "%$search%");
        } else {
            $query->where('part_name', 'LIKE', "%$search%");
        }
        $get_data = $query->skip($offset)->take($resultCount)->get();
        if (!empty($get_data)) {
            foreach ($get_data as $row) {
                $text = $row->part_name;
                $select2_data[] = array(
                    'id' => $row->part_name,
                    'text' => $text,
                    'attr1' => $row->batch_name,
                    'attr2' => $row->customer_name,
                    'attr3' => $row->part_type_category,
                    'attr4' => $row->batch_qty,
                );
            }
        }
        $results = array(
            "results" => $select2_data,
            "total_count" => count($get_data),
        );
        echo json_encode($results);
        exit();
    }
    function refrence_customer_n_select2_source(Request $request)
    {
        $select2_data = array();
        $search = isset($request->q) ? trim($request->q) : '';
        $page = isset($request->page) ? trim($request->page) : 1;
        $clerance_id = (isset($request->clerance_id) && !empty($request->clerance_id)) ? trim($request->clerance_id) : '';
        if ($clerance_id == 'null') {
            $clerance_id = '';
        }
        $resultCount = 10;
        $offset = ($page - 1) * $resultCount;
        $query = BatchNumber::select('*');
        if (!empty($clerance_id)) {
            $query->where('id', $clerance_id)->where('customer_name', 'LIKE', "%$search%");
        } else {
            $query->where('customer_name', 'LIKE', "%$search%");
        }
        $get_data = $query->skip($offset)->take($resultCount)->get();
        if (!empty($get_data)) {
            foreach ($get_data as $row) {
                $text = $row->customer_name;
                $select2_data[] = array(
                    'id' => $row->customer_name,
                    'text' => $text,
                    'attr1' => $row->part_name,
                    'attr2' => $row->batch_name,
                    'attr3' => $row->part_type_category,
                    'attr4' => $row->batch_qty,
                );
            }
        }
        $results = array(
            "results" => $select2_data,
            "total_count" => count($get_data),
        );
        echo json_encode($results);
        exit();
    }
}
