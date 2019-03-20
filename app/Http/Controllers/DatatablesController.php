<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use App\Sale;
use Yajra\Datatables\Datatables;
use App\Search\Filters;

class DatatablesController extends Controller
{
    /**
     * Displays datatables front end view
     *
     * @return \Illuminate\View\View
     */
    public function getIndex()
    {
        return view('index');
    }

    /**
     * Process datatables ajax request.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getData(Request $request)
    {
        $query = Sale::with('package', 'customer');

        $query = Filters::apply($query, $request);

        return Datatables::of($query)->make(true);
    }

    /**
     * Process ajax request for highchart data
     *
     * @return json data
     */
    public function getChart(Request $request)
    {
        $query = Sale::with('package', 'customer');
        $query = $query->select(DB::raw('SUM(packages.price) as `total`'), DB::raw("DATE_FORMAT(sales.created_at, '%m-%Y') month_year"),  DB::raw('YEAR(sales.created_at) year, MONTH(sales.created_at) month'));
        $query = $query->join('packages', 'sales.package_id', '=', 'packages.id');
        $query = Filters::apply($query, $request);
        $query = $query->groupby('year','month');

        $data = $query->get();

        return json_encode($data);
    }

    /**
     * Process ajax request for stats
     *
     * @return json data
     */
    public function getStats(Request $request)
    {
        // Total Sales
        $query = (new Sale)->newQuery();
        $query = Filters::apply($query, $request);
        $total_sales = $query->count();

        // // Total Earnings
        $query = Sale::with('package');
        $query = $query->select(DB::raw('SUM(packages.price) as `total`'));
        $query = $query->join('packages', 'sales.package_id', '=', 'packages.id');
        $query = Filters::apply($query, $request);
        $total_earnings = $query->value('total');

        // New Customers
        $query = (new Sale)->newQuery();
        $query = $query->select('customer_id');
        $query = Filters::apply($query, $request);
        $query = $query->groupby('customer_id');
        $total_customers = $query->get()->count();

        // Recurring Customers
        $query = (new Sale)->newQuery();
        $query = $query->select('customer_id');
        $query = Filters::apply($query, $request);
        $query = $query->groupby(DB::raw('customer_id HAVING COUNT(id) > 1'));
        $recurring_customers = $query->get()->count();
        
        $array = ['total_sales' => $total_sales, 'total_earnings' => $total_earnings, 'total_customers' => $total_customers, 'recurring_customers' => $recurring_customers];

        return json_encode($array);
    }

    /**
     * Process ajax request to download data in csv
     *
     * @return csv
     */
    public function downloadCSV(Request $request)
    {
        $headers = [
                'Cache-Control'       => 'must-revalidate, post-check=0, pre-check=0'
            ,   'Content-type'        => 'text/csv'
            ,   'Content-Disposition' => 'attachment; filename=galleries.csv'
            ,   'Expires'             => '0'
            ,   'Pragma'              => 'public'
        ];

        $query = Sale::with('package', 'customer');

        $query = Filters::apply($query, $request);

        $users = $query->get();

        $csvExporter = new \Laracsv\Export();
        $csvExporter->build($users, ['package.name', 'package.price', 'customer.name', 'customer.email', 'customer.address', 'customer.phone', 'sale.created_at'])->download();
    }
}
