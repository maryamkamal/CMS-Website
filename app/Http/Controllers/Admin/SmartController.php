<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class SmartController extends Controller
{
    public function support() {
     
      return view('admin.smart.support');
    }
	public function marketing() {
     
      return view('admin.smart.marketing');
    }
	public function problem() {
     
      return view('admin.smart.problem');
    }
	public function explain() {
     
      return view('admin.smart.explain');
    }
}