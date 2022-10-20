@extends('admin.layouts.master')


@section('dashboard')
<div class="content">
    <div class="row">

        <div class="grid grid-cols-1 md:grid-cols-3 gap-3 w-full">
            
            <div class="dash-widget">
                <span class="dash-widget-bg1"><i class="fa fa-stethoscope" aria-hidden="true"></i></span>
                <div class="dash-widget-info text-right">
                    <h3></h3>
                    <span class="widget-title1">Users <i class="fa fa-check" aria-hidden="true"></i></span>
                </div>
            </div>
            <div class="dash-widget">
                <span class="dash-widget-bg1"><i class="fa fa-stethoscope" aria-hidden="true"></i></span>
                <div class="dash-widget-info text-right">
                    <h3></h3>
                    <span class="widget-title1">Student <i class="fa fa-check" aria-hidden="true"></i></span>
                </div>
            </div>
            <div class="dash-widget">
                <span class="dash-widget-bg1"><i class="fa fa-stethoscope" aria-hidden="true"></i></span>
                <div class="dash-widget-info text-right">
                    <h3></h3>
                    <span class="widget-title1">Teacher <i class="fa fa-check" aria-hidden="true"></i></span>
                </div>
            </div>
        </div>
        
        
        
        
    </div>
</div>


@endsection

