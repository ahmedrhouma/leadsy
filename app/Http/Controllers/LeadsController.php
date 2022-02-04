<?php

namespace App\Http\Controllers;

use App\Helper\Countries;
use App\Models\Leads;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class LeadsController extends Controller
{
    public function index()
    {
        return view('administration.leads');
    }
    public function indexList(Request $request){
        return Datatables::of(Leads::with(['campaigns','campaigns.advertisers','publisher']))
            ->addColumn('action', function($row){
                $actionBtn = '<a href="#" class="btn btn-sm btn-light btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                                <span class="svg-icon svg-icon-5 m-0">
														<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
															<path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="black"/>
														</svg>
													</span>
                                </a>
                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4" data-kt-menu="true">
                                <div class="menu-item px-3">
                                    <a href="../../demo9/dist/apps/customers/view.html" class="menu-link px-3">View</a>
                                </div>
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3" data-kt-customer-table-filter="delete_row">Qualify</a>
                                </div>
                            </div>';
                return $actionBtn;
            })
            ->addColumn('web_page_name', function($row){
                return '';
            })->addColumn('country', function($row){
                return Countries::getCountry($row->country);
            })->addColumn('web_page_url', function($row){
                return '';
            })->addColumn('sale_status_comment', function($row){
                return '';
            })
            ->rawColumns(['action','advertisers','publisher'])
            ->make(true);
    }
}
