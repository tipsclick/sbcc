<?php

namespace App\Http\Controllers\Admin;

use App\Models\Client;
use App\Models\Vendor;
use App\Models\Company;
use App\Models\Project;
use App\Models\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Invoice;
use App\Models\InvoiceService;
use App\Models\ProjectService;

class VueController extends Controller
{
    // View Controllers
    public function getAll()
    {
        $vendors = Vendor::orderBy('id', 'desc')->get();
        $companies = Company::orderBy('id', 'desc')->get();
        $clients = Client::orderBy('id', 'desc')->get();
        $services = Service::orderBy('id', 'desc')->get();
        return response()->json([
            'vendors' => $vendors,
            'companies' => $companies,
            'clients' => $clients,
            'services' => $services
        ], 200); // Status code here
    }

    public function getClient($id)
    {
        $client = Client::where('id', $id)->orderBy('id', 'desc')->first();
        return response()->json(['client' => $client], 200); // Status code here
    }

    public function getCompany($id)
    {
        $company = Company::where('id', $id)->orderBy('id', 'desc')->first();
        return response()->json(['company' => $company], 200);
    }

    public function getService($id)
    {
        $service = Service::where('id', $id)->orderBy('id', 'desc')->first();
        return response()->json(['service' => $service], 200);
    }

    public function getInvoice($id)
    {
        $invoice = Invoice::where('id', $id)->with(['client', 'company', 'services'])->orderBy('id', 'desc')->first();
        return response()->json(['invoice' => $invoice], 200);
    }

    public function postInvoice(Request $request)
    {
        $invoice             = new Invoice;
        $invoice->vendor_id  = $request->vendor;
        $invoice->period     = $request->period;
        $invoice->refer_id   = $request->refer;
        $invoice->company_id = $request->company;
        $invoice->client_id  = $request->client;
        $invoice->discount   = $request->discount;
        $invoice->total      = $request->total;
        $invoice->user_id    = auth()->user()->id;
        $invoice->detail     = nl2br($request->detail);
        $invoice->is_active  = 1;
        if ($invoice->save()) {
            $services = $request->services;
            foreach ($services as $serv) {
                $service                = new InvoiceService;
                $service->invoice_id    = $invoice->id;
                $service->service_id    = $serv['id'];
                $service->name          = $serv['name'];
                $service->price         = $serv['price'];
                $service->detail        = $serv['detail'];
                $service->save();
            }
        }

        return response()->json(['message' => 'Record Added Successfully'], 200);
    }

    public function updateInvoice(Request $request)
    {
        $invoice             = Invoice::find($request->invoice_id);
        $invoice->vendor_id  = $request->vendor;
        $invoice->period     = $request->period;
        $invoice->refer_id   = $request->refer;
        $invoice->company_id = $request->company;
        $invoice->client_id  = $request->client;
        $invoice->discount   = $request->discount;
        $invoice->total      = $request->total;
        $invoice->user_id    = auth()->user()->id;
        $invoice->detail     = nl2br($request->detail);
        $invoice->is_active  = 1;
        $invoice->save();

        $currentInvoiceServices = InvoiceService::where('invoice_id', $invoice->id)->delete();
        if ($currentInvoiceServices) {
            $services = $request->services;
            foreach ($services as $serv) {
                $service                = new InvoiceService;
                $service->invoice_id    = $invoice->id;
                $service->service_id    = $serv['id'];
                $service->name          = $serv['name'];
                $service->price         = $serv['price'];
                $service->detail        = $serv['detail'];
                $service->save();
            }
        }

        return response()->json(['message' => 'Record Updated Successfully'], 200);
    }
}
