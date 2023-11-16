@php
    $parent = $parent ?? null;
    $child = $child ?? null;
@endphp

<!-- Main Sidebar Container -->
<aside class="main-sidebar elevation-4 sidebar-light-success">
    <div class="overlay"></div>
    <!-- Brand Logo -->
    <a href="{{ route('homepage') }}">
        <img src="{{ asset('dist/homepage/new/images/Logo.png') }}" alt="EEC Logo" class="text-center" width="90"
             height="50" style="margin-right: 70px; margin-left: 70px; margin-top: 7px;">
        {{-- <span class="brand-text font-weight-light" style="z-index: 10000">EEC <sub> Group</sub></span> --}}
    </a>

    <!-- Sidebar -->
    <div
        class="sidebar os-theme-light os-host-overflow-y os-host-resize-disabled os-host-scrollbar-horizontal-hidden os-host-transition">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column text-sm nav-child-indent" data-widget="treeview"
                role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                 with font-awesome or any other icon font library -->

                <li class="nav-item">
                    <a href="{{ route('homepage') }}" class="nav-link {{ $parent == 'homepage' ? 'active' : '' }}">
                        <i class="nav-icon fa fa-home"></i>
                        <p class="text-capitalize">{{ trans('site.homepage') }}</p>
                    </a>
                </li>

                @if(Gate::check('inquire_supplier_e_invoice'))
                    <li class="nav-item">
                        <a href="https://www.eta.gov.eg/ar/e-invoice-st6-enquiry" class="nav-link" target="_blank">
                            <i class="nav-icon fa fa-external-link-alt"></i>
                            <p class="text-capitalize"> @lang('site.search_supplier')</p>
                        </a>
                    </li>
                @endif


                <li class="nav-item">
                    <a href="{{ route('documents.getRecentDocumentsReceived') }}"
                       class="nav-link {{ \Route::is('documents.getRecentDocumentsReceived') ? 'active' : '' }}"
                       target="_blank">

                        <i class="nav-icon fa fa-file-download"></i>
                        <p class="text-capitalize"> @lang('site.received_documents') </p>
                    </a>
                </li>


                <li class="nav-item has-treeview {{ $parent == 'requestticket' || $parent == 'ticketsupport'? 'menu-is-opening menu-open' : '' }}">
                    <a href="#"
                       class="nav-link {{ $parent == 'requestticket' || $parent == 'ticketsupport' ? 'active': '' }} ">

                        <i class="nav-icon fa fa-question-circle"></i>
                        <p class="text-capitalize">
                            @lang('site.ticketing')
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>

                    <ul class="nav nav-treeview">
                        <li class="nav-item mr-3">
                            <a href="{{ route('requestticket.index') }}"
                               class="nav-link @if ($parent == 'ticket' && $child == 'index') {{ 'active' }} @endif">

                                <strong>-</strong>
                                <p class="text-capitalize"> @lang('site.request_ticket')
                                    <span class="badge badge-danger right">
                                            <?php if (Auth::user()->user_type_id == 1 || Auth::user()->user_type_id == 2) {
                                            $count = \App\Models\RequestTicket::where('status', 2)->count();
                                            echo $count;
                                        } else {
                                            $count = \App\Models\RequestTicket::where([
                                                ['created_by', Auth::user()->id],
                                                ['status', 0]
                                            ])->count();
                                            echo $count;
                                        }
                                        ?>
                                    </span>
                                </p>
                            </a>
                        </li>

                        @if (Auth::user()->user_type_id == 1 || Auth::user()->user_type_id == 2)
                            <li class="nav-item mr-3">
                                <a href="{{ route('ticketsupport.index') }}"
                                   class="nav-link @if ($parent == 'ticketsupport' && $child == 'index') {{ 'active' }} @endif">

                                    <strong>-</strong>
                                    <p class="text-capitalize"> @lang('site.ticket_support')</p>
                                </a>
                            </li>

                            <li class="nav-item mr-3">
                                <a href="{{ route('requests_sheet.index') }}"
                                   class="nav-link @if ($parent == 'requests_sheet' && $child == 'index') {{ 'active' }} @endif">

                                    <strong>-</strong>
                                    <p class="text-capitalize"> @lang('site.requests_sheet')</p>
                                </a>
                            </li>

                            <li class="nav-item mr-3">
                                <a href="{{ route('summary_scheduale.index') }}"
                                   class="nav-link @if($parent == 'summary_scheduale' && $child == 'index') {{ 'active' }} @endif">

                                    <strong>-</strong>
                                    <p class="text-capitalize"> @lang('site.summary_scheduale')</p>
                                </a>
                            </li>
                        @endif
                    </ul>
                </li>


                @if (Gate::check('departments') ||
                   Gate::check('list-shifts') ||
                   Gate::check('add-department') ||
                   Gate::check('show-department') ||
                   Gate::check('edit-department') ||
                   Gate::check('delete-department') ||
                   Gate::check('restore-department') ||
                   Gate::check('departments') ||
                   Gate::check('add-department') ||
                   Gate::check('show-department') ||
                   Gate::check('edit-department') ||
                   Gate::check('delete-department') ||
                   Gate::check('restore-department') ||
                   Gate::check('projects') ||
                   Gate::check('add-project') ||
                   Gate::check('show-project') ||
                   Gate::check('edit-project') ||
                   Gate::check('delete-project') ||
                   Gate::check('restore-project') ||
                   Gate::check('sites') ||
                   Gate::check('add-site') ||
                   Gate::check('show-site') ||
                   Gate::check('edit-site') ||
                   Gate::check('delete-site') ||
                   Gate::check('restore-site') ||
                   Gate::check('job-codes') ||
                   Gate::check('add-job-code') ||
                   Gate::check('show-job-code') ||
                   Gate::check('edit-job-code') ||
                   Gate::check('delete-job-code') ||
                   Gate::check('restore-job-code') ||
                   Gate::check('job-grades') ||
                   Gate::check('add-job-grade') ||
                   Gate::check('show-job-grade') ||
                   Gate::check('edit-job-grade') ||
                   Gate::check('delete-job-grade') ||
                   Gate::check('restore-job-grade') ||
                   Gate::check('job-names') ||
                   Gate::check('add-job-name') ||
                   Gate::check('show-job-name') ||
                   Gate::check('edit-job-name') ||
                   Gate::check('delete-job-name') ||
                   Gate::check('restore-job-name') ||
                   Gate::check('job-competencies')||
                   Gate::check('add-job-competencies')||
                   Gate::check('edit-job-competencies')||
                   Gate::check('restore-job-competencies')||
                   Gate::check('delete-job-competencies')||
                   Gate::check('show-job-competencies')||
                   Gate::check('countries') ||
                   Gate::check('add-country') ||
                   Gate::check('show-country') ||
                   Gate::check('edit-country') ||
                   Gate::check('delete-country') ||
                   Gate::check('restore-country') ||
                   Gate::check('governorates') ||
                   Gate::check('add-governorate') ||
                   Gate::check('show-governorate') ||
                   Gate::check('edit-governorate') ||
                   Gate::check('delete-governorate') ||
                   Gate::check('restore-governorate') ||
                   Gate::check('groups') ||
                   Gate::check('add-group') ||
                   Gate::check('show-group') ||
                   Gate::check('edit-group') ||
                   Gate::check('delete-group') ||
                   Gate::check('restore-group') ||
                   Gate::check('sub-groups') ||
                   Gate::check('add-sub-group') ||
                   Gate::check('show-sub-group') ||
                   Gate::check('edit-sub-group') ||
                   Gate::check('delete-sub-group') ||
                   Gate::check('restore-sub-group') ||
                   Gate::check('family-names') ||
                   Gate::check('add-family-name') ||
                   Gate::check('show-family-name') ||
                   Gate::check('edit-family-name') ||
                   Gate::check('delete-family-name') ||
                   Gate::check('restore-family-name') ||
                   Gate::check('suppliers') ||
                   Gate::check('add-supplier') ||
                   Gate::check('show-supplier') ||
                   Gate::check('edit-supplier') ||
                   Gate::check('delete-supplier') ||
                   Gate::check('restore-supplier') ||
                   Gate::check('notebooks') ||
                   Gate::check('add-notebook') ||
                   Gate::check('permissions') ||
                   Gate::check('supplier-search')
                  )

                    {{-- Constant --}}
                    <li class="nav-item has-treeview {{ $parent == 'supplier' ||
                            $parent == 'permissions' ||
                            $parent == 'list-shifts' ||
                            $parent == 'versions' ||
                            $parent == 'units' ||
                            $parent == 'family-name' ||
                            $parent == 'business_nature' ||
                            $parent == 'discountTypes' ||
                            $parent == 'banks' ||
                            $parent == 'nature_dealing' ||
                            $parent == 'items' ||
                            $parent == 'sub-group' ||
                            $parent == 'group' ||
                            $parent == 'governorate' ||
                            $parent == 'department' ||
                            $parent == 'functions' ||
                            $parent == 'country' ||
                            $parent == 'position' ||
                            $parent == 'job-competency' ||
                            $parent == 'job-level' ||
                            $parent == 'department' ||
                            $parent == 'job-group' ||
                            $parent == 'site' ||
                            $parent == 'project' ||
                            $parent == 'related_activity' ||
                            $parent=='kpi'||
                            $parent=='list-shifts'||
                            $parent == 'notebooks' ||
                            $parent == 'departmentS'||$parent=='urls'
                                ? 'menu-is-opening menu-open'
                                : '' }} ">
                        <a href="#" class="nav-link {{ $parent == 'supplier' ||
                                $parent == 'family-name' ||
                                $parent == 'sub-group' ||
                                $parent == 'permissions' ||
                                $parent == 'group' ||
                                $parent == 'governorate' ||
                                $parent == 'department' ||
                                $parent == 'country' ||
                                $parent == 'position' ||
                                $parent == 'job-competency' ||
                                $parent == 'job-level' ||
                                $parent == 'department' ||
                                $parent == 'job-group' ||
                                $parent == 'site' ||
                                $parent == 'project' ||
                                $parent == 'notebooks' ||
                                $parent == 'related_activity' ||
                                $parent == 'departmentS' || $parent=='urls' || $parent=='kpi' ||
                                $parent == 'list-shifts'
                                    ? 'active'
                                    : '' }} ">
                            <i class="nav-icon fa fa-folder-tree"></i>
                            <p class="text-capitalize">
                                @lang('site.master_data')
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @if(auth()->user()->user_type_id==1 || Gate::check('list-shifts'))
                                <li class="nav-item mr-3">
                                    <a href="{{ route('shifts.index') }}"
                                       class="nav-link @if ($parent == 'shifts' && $child == 'index') {{ 'active' }} @endif">
                                        {{-- <strong>-</strong> --}}

                                        <strong>-</strong>
                                        <p class="text-capitalize"> @lang('sidebar.shifts')</p>
                                    </a>
                                </li>
                            @endif
                            @if(auth()->user()->user_type_id==1 || Gate::check('kpi'))
                                <li class="nav-item mr-3">
                                    <a href="{{ route('kpi.index') }}"
                                       class="nav-link @if ($parent == 'kpi' && $child == 'index') {{ 'active' }} @endif">
                                        {{-- <strong>-</strong> --}}

                                        <strong>-</strong>
                                        <p class="text-capitalize"> @lang('sidebar.kpi')</p>
                                    </a>
                                </li>
                            @endif
                            @if (auth()->user()->user_type_id == 1 )

                                <li class="nav-item mr-3">
                                    <a href="{{ route('urls.index') }}"
                                       class="nav-link @if ($parent == 'urls' && $child == 'index') {{ 'active' }} @endif">
                                        {{-- <strong>-</strong> --}}
                                        <strong>-</strong>
                                        <p class="text-capitalize"> @lang('site.urls')</p>
                                    </a>
                                </li>

                            @endif
                            @if (auth()->user()->user_type_id == 1 || Gate::check('business_units') || Gate::check('add-business_units') ||Gate::check('show-business_units') ||Gate::check('edit-business_units') ||Gate::check('delete-business_units') )

                                <li class="nav-item mr-3">
                                    <a href="{{ route('business_units.index') }}"
                                       class="nav-link @if ($parent == 'business_units' && $child == 'index') {{ 'active' }} @endif">
                                        {{-- <strong>-</strong> --}}
                                        <strong>-</strong>
                                        <p class="text-capitalize"> @lang('site.business_units')</p>
                                    </a>
                                </li>

                            @endif

                            @if (auth()->user()->user_type_id == 1 ||Gate::check('versions') ||Gate::check('add-version') ||Gate::check('show-version') ||Gate::check('edit-version'))
                                <li class="nav-item mr-3">
                                    <a href="{{ route('upgrade.index') }}"
                                       class="nav-link @if ($parent == 'versions' && $child == 'index') {{ 'active' }} @endif">
                                        <strong>-</strong>
                                        <p class="text-capitalize">{{ trans('site.versions') }}</p>
                                    </a>
                                </li>
                            @endif

                            @if (auth()->user()->user_type_id == 1 ||Gate::check('units') ||Gate::check('add-unit') ||Gate::check('edit-unit') ||Gate::check('delete-unit') ||Gate::check('restore-unit'))
                                <li class="nav-item mr-3">
                                    <a href="{{ route('units.index') }}"
                                       class="nav-link @if ($parent == 'units' && $child == 'index') {{ 'active' }} @endif">
                                        {{-- @if ($parent == 'units' && $child == 'index') {{ 'active' }} @endif --}}
                                        {{-- <strong>-</strong> --}}
                                        <strong>-</strong>
                                        <p class="text-capitalize">@lang('site.units')</p>
                                    </a>
                                </li>
                            @endif

                            {{-- @if (Gate::check('currency') ||--}}
                            {{-- Gate::check('add-currency') ||--}}
                            {{-- Gate::check('edit-currency') ||--}}
                            {{-- Gate::check('delete-currency') ||--}}

                            @if(auth()->user()->user_type_id == 1)
                                <li class="nav-item mr-3">
                                    <a href="{{ route('currencies.index') }}"
                                       class="nav-link @if ($parent == 'currencies' && $child == 'index') {{ 'active' }} @endif">
                                        {{-- @if ($parent == 'units' && $child == 'index') {{ 'active' }} @endif --}}
                                        {{-- <strong>-</strong> --}}
                                        <strong>-</strong>
                                        <p class="text-capitalize">@lang('site.currency')</p>
                                    </a>
                                </li>
                            @endif


                            @if (auth()->user()->user_type_id == 1 ||Gate::check('items') ||Gate::check('add-item') ||Gate::check('edit-item') ||Gate::check('delete-item') || Gate::check('restore-item'))
                                <li class="nav-item mr-3">
                                    <a href="{{ route('items.index') }}"
                                       class="nav-link @if ($parent == 'items' && $child == 'index') {{ 'active' }} @endif">
                                        {{-- <strong>-</strong> --}}
                                        <strong>-</strong>
                                        <p class="text-capitalize">@lang('site.items')</p>
                                    </a>
                                </li>
                            @endif
                            @if (auth()->user()->user_type_id == 1 ||Gate::check('list-items-coding') || Gate::check('create-items-coding') ||Gate::check('show-items-coding') ||Gate::check('edit-items-coding') ||Gate::check('restore-items-coding') ||Gate::check('import-items-coding') ||Gate::check('delete-items-coding'))
                                <li class="nav-item mr-3">
                                    <a href="{{ route('itemscoding.index') }}"
                                       class="nav-link @if ($parent == 'itemscoding' && $child == 'index') {{ 'active' }} @endif">
                                        {{-- <strong>-</strong> --}}
                                        <strong>-</strong>
                                        <p class="text-capitalize">{{ trans('site.itemsCoding') }}</p>
                                    </a>
                                </li>
                            @endif
                            @if (auth()->user()->user_type_id == 1 ||Gate::check('business_natures') ||Gate::check('add-business-nature') || Gate::check('edit-business-nature') || Gate::check('delete-business-nature') ||Gate::check('restore-business-nature'))
                                <li class="nav-item mr-3">
                                    <a href="{{ route('businessNatures.index') }}"
                                       class="nav-link @if ($parent == 'business_nature' && $child == 'index') {{ 'active' }} @endif">
                                        <strong>-</strong>
                                        <p class="text-capitalize">@lang('site.business_nature')</p>
                                    </a>
                                </li>
                            @endif
                            @if (auth()->user()->user_type_id == 1 ||Gate::check('discount_types') ||Gate::check('add-discount-type') ||Gate::check('edit-discount-type') ||Gate::check('delete-discount-type') ||Gate::check('restore-discount-type'))
                                <li class="nav-item mr-3">
                                    <a href="{{ route('discountTypes.index') }}"
                                       class="nav-link @if ($parent == 'discountTypes' && $child == 'index') {{ 'active' }} @endif">
                                        <strong>-</strong>
                                        <p class="text-capitalize">@lang('site.discountTypes')</p>
                                    </a>
                                </li>
                            @endif
                            @if (auth()->user()->user_type_id == 1 || Gate::check('banks') ||Gate::check('add-bank') || Gate::check('edit-bank') ||Gate::check('delete-bank') ||Gate::check('restore-bank'))
                                <li class="nav-item mr-3">
                                    <a href="{{ route('banks.index') }}"
                                       class="nav-link @if ($parent == 'banks' && $child == 'index') {{ 'active' }} @endif">
                                        <strong>-</strong>
                                        <p class="text-capitalize">@lang('site.banks')</p>
                                    </a>
                                </li>
                            @endif

                            @if (auth()->user()->user_type_id == 1 || Gate::check('nature_dealings') ||Gate::check('add-nature-dealing') ||Gate::check('edit-nature-dealing') ||Gate::check('delete-nature-dealing') || Gate::check('restore-nature-dealing'))
                                <li class="nav-item mr-3">
                                    <a href="{{ route('natureDealing.index') }}"
                                       class="nav-link @if ($parent == 'nature_dealing' && $child == 'index') {{ 'active' }} @endif">
                                        <strong>-</strong>
                                        <p class="text-capitalize">@lang('site.nature_dealing')</p>
                                    </a>
                                </li>
                            @endif


                            @if (auth()->user()->user_type_id == 1 || Gate::check('departments') ||Gate::check('add-department') ||Gate::check('show-department') || Gate::check('edit-department') ||Gate::check('delete-department') || Gate::check('restore-department'))
                                <li class="nav-item mr-3">
                                    <a href="{{ route('department.index') }}"
                                       class="nav-link @if ($parent == 'department' && $child == 'index') {{ 'active' }} @endif">
                                        <strong>-</strong>
                                        <p class="text-capitalize">@lang('site.departments')</p>
                                    </a>
                                </li>
                            @endif

                            @if (auth()->user()->user_type_id == 1 || Gate::check('functions') )
                                <li class="nav-item mr-3">
                                    <a href="{{ route('functions.index') }}"
                                       class="nav-link @if ($parent == 'functions' && $child == 'index') {{ 'active' }} @endif">
                                        <strong>-</strong>
                                        <p class="text-capitalize">@lang('site.functions')</p>
                                    </a>
                                </li>
                            @endif


                            @if (auth()->user()->user_type_id == 1 || Gate::check('projects') || Gate::check('add-project') ||Gate::check('show-project') ||Gate::check('edit-project') || Gate::check('delete-project') || Gate::check('restore-project'))
                                <li class="nav-item mr-3">
                                    <a href="{{ route('project.index') }}" target="_blank"
                                       class="nav-link @if ($parent == 'project' && $child == 'index') {{ 'active' }} @endif">
                                        <strong>-</strong>
                                        <p class="text-capitalize">@lang('site.projects')</p>
                                    </a>
                                </li>
                            @endif


                            @if (auth()->user()->user_type_id == 1 || Gate::check('sites') || Gate::check('add-site') || Gate::check('show-site') || Gate::check('edit-site') || Gate::check('delete-site') || Gate::check('restore-site'))
                                <li class="nav-item mr-3">
                                    <a href="{{ route('site.index') }}"
                                       class="nav-link @if ($parent == 'site' && $child == 'index') {{ 'active' }} @endif">
                                        <strong>-</strong>
                                        <p class="text-capitalize">@lang('site.sites')</p>
                                    </a>
                                </li>
                            @endif

                            @if (auth()->user()->user_type_id == 1 || Gate::check('job-names') || Gate::check('add-job-name') ||Gate::check('show-job-name') || Gate::check('edit-job-name') || Gate::check('delete-job-name') ||Gate::check('restore-job-name'))
                                <li class="nav-item mr-3">
                                    <a href="{{ route('position.index') }}"
                                       class="nav-link @if ($parent == 'position' && $child == 'index') {{ 'active' }} @endif">
                                        <strong>-</strong>
                                        <p class="text-capitalize">@lang('site.positions')</p>
                                    </a>
                                </li>
                            @endif

                            @if (auth()->user()->user_type_id == 1 || Gate::check('job-codes') ||Gate::check('add-job-code') || Gate::check('show-job-code') || Gate::check('edit-job-code') ||Gate::check('delete-job-code') ||Gate::check('restore-job-code'))
                                <li class="nav-item mr-3">
                                    <a href="{{ route('job-group.index') }}" target="_blank"
                                       class="nav-link @if ($parent == 'job-group' && $child == 'index') {{ 'active' }} @endif">
                                        <strong>-</strong>
                                        <p class="text-capitalize">@lang('site.job_groups')</p>
                                    </a>
                                </li>
                            @endif
                            @if (auth()->user()->user_type_id == 1 || Gate::check('job-competencies') ||Gate::check('add-job-competencies') || Gate::check('edit-job-competencies') || Gate::check('restore-job-competencies') ||Gate::check('delete-job-competencies') ||Gate::check('show-job-competencies'))
                                <li class="nav-item mr-3">
                                    <a href="{{ route('job-competency.index') }}" target="_blank"
                                       class="nav-link @if ($parent == 'job-competency' && $child == 'index') {{ 'active' }} @endif">
                                        <strong>-</strong>
                                        <p class="text-capitalize">@lang('site.job_competencies')</p>
                                    </a>
                                </li>
                            @endif

                            @if (auth()->user()->user_type_id == 1 || Gate::check('job-grades') || Gate::check('add-job-grade') || Gate::check('show-job-grade') || Gate::check('edit-job-grade') || Gate::check('delete-job-grade') || Gate::check('restore-job-grade'))
                                <li class="nav-item mr-3">
                                    <a href="{{ route('job-level.index') }}" target="_blank"
                                       class="nav-link @if ($parent == 'job-level' && $child == 'index') {{ 'active' }} @endif">
                                        <strong>-</strong>
                                        <p class="text-capitalize">@lang('site.job_levels')</p>
                                    </a>
                                </li>
                            @endif

                            @if (auth()->user()->user_type_id == 1 || Gate::check('countries') ||
                             Gate::check('add-country') ||
                             Gate::check('show-country') ||
                             Gate::check('edit-country') ||
                             Gate::check('delete-country') ||
                             Gate::check('restore-country'))
                                <li class="nav-item mr-3">
                                    <a href="{{ route('country.index') }}"
                                       class="nav-link @if ($parent == 'country' && $child == 'index') {{ 'active' }} @endif">
                                        <strong>-</strong>
                                        <p class="text-capitalize"> @lang('site.countries')</p>
                                    </a>
                                </li>
                            @endif

                            @if (auth()->user()->user_type_id == 1 || Gate::check('governorates') ||
                             Gate::check('add-governorate') ||
                             Gate::check('show-governorate') ||
                             Gate::check('edit-governorate') ||
                             Gate::check('delete-governorate') ||
                             Gate::check('restore-governorate'))
                                <li class="nav-item mr-3">
                                    <a href="{{ route('governorate.index') }}"
                                       class="nav-link @if ($parent == 'governorate' && $child == 'index') {{ 'active' }} @endif">
                                        <strong>-</strong>
                                        <p class="text-capitalize"> @lang('site.governorates')</p>
                                    </a>
                                </li>
                            @endif

                            @if (auth()->user()->user_type_id == 1 || Gate::check('groups') ||
                             Gate::check('add-group') ||
                             Gate::check('show-group') ||
                             Gate::check('edit-group') ||
                             Gate::check('delete-group') ||
                             Gate::check('restore-group'))
                                <li class="nav-item mr-3">
                                    <a href="{{ route('group.index') }}"
                                       class="nav-link @if ($parent == 'group' && $child == 'index') {{ 'active' }} @endif">
                                        <strong>-</strong>
                                        <p class="text-capitalize"> @lang('site.groups')</p>
                                    </a>
                                </li>
                            @endif

                            @if (auth()->user()->user_type_id == 1 || Gate::check('sub-groups') ||
                             Gate::check('add-sub-group') ||
                             Gate::check('show-sub-group') ||
                             Gate::check('edit-sub-group') ||
                             Gate::check('delete-sub-group') ||
                             Gate::check('restore-sub-group'))
                                <li class="nav-item mr-3">
                                    <a href="{{ route('sub-group.index') }}"
                                       class="nav-link @if ($parent == 'sub-group' && $child == 'index') {{ 'active' }} @endif">
                                        <strong>-</strong>
                                        <p class="text-capitalize"> @lang('site.sub_groups')</p>
                                    </a>
                                </li>
                            @endif

                            @if (auth()->user()->user_type_id == 1 || Gate::check('family-names') ||
                             Gate::check('add-family-name') ||
                             Gate::check('show-family-name') ||
                             Gate::check('edit-family-name') ||
                             Gate::check('delete-family-name') ||
                             Gate::check('restore-family-name'))
                                <li class="nav-item mr-3">
                                    <a href="{{ route('family-name.index') }}"
                                       class="nav-link @if ($parent == 'family-name' && $child == 'index') {{ 'active' }} @endif">
                                        <strong>-</strong>
                                        <p class="text-capitalize"> @lang('site.family_names')</p>
                                    </a>
                                </li>
                            @endif


                            @if (auth()->user()->user_type_id == 1 || Gate::check('list-related_activity'))
                                <li class="nav-item mr-3">
                                    <a href="{{ route('related_activity.index') }}"
                                       class="nav-link @if ($parent == 'related_activity' && $child == 'index') {{ 'active' }} @endif">
                                        <strong>-</strong>
                                        <p class="text-capitalize">{{ trans("site.related_activity")}}</p>
                                    </a>
                                </li>
                            @endif

                            {{-- @if (Gate::check('suppliers') || Gate::check('add-supplier') || Gate::check('show-supplier') || Gate::check('edit-supplier') || Gate::check('delete-supplier') || Gate::check('restore-supplier'))

                                    <li class="nav-item mr-3">
                                        <a href="{{ route('supplier.index') }}" class="nav-link @if (request()->routeIs('supplier.index')) {{ 'active' }} @endif">
                             <strong>-</strong>
                             <p class="text-capitalize"> @lang('site.suppliers')</p>
                             </a>
                             </li>
                            @endif --}}
                            @if ( Gate::check('notebooks') || Gate::check('add-notebook'))
                                <li class="nav-item mr-3">
                                    <a href="{{ route('notebook.index') }}"
                                       class="nav-link @if ($parent == 'notebooks' && $child == 'index') {{ 'active' }} @endif">

                                        <strong>-</strong>
                                        <p class="text-capitalize">{{trans('site.notebooks')}}</p>
                                    </a>
                                </li>
                            @endif
                            @if (auth()->user()->user_type_id == 1 || Gate::check('supplier-search'))
                                <li class="nav-item mr-3">
                                    <a href="{{ route('supplier.search') }}"
                                       class="nav-link {{ request()->routeIs('supplier.search') ? 'active' : '' }}">
                                        <strong>-</strong>
                                        <p class="text-capitalize"> @lang('site.suppliers')</p>
                                    </a>
                                </li>
                            @endif

                            @if (auth()->user()->user_type_id == 1 || Gate::check('industries'))
                                <li class="nav-item mr-3">
                                    <a href=" {{ route('industries.index') }}" class="nav-link ">
                                        <strong>-</strong>
                                        <p class="text-capitalize">{{ trans('site.list_industries') }}</p>
                                    </a>
                                </li>
                            @endif

                            @if (auth()->user()->user_type_id == 1 || Gate::check('contact_types') ||
                            Gate::check('add-contact_types') ||
                            Gate::check('show-contact_types') ||
                            Gate::check('edit-contact_types') ||
                            Gate::check('delete-contact_types'))
                                <li class="nav-item mr-3">
                                    <a href=" {{ route('contact_types.index') }}" class="nav-link ">
                                        <strong>-</strong>
                                        <p class="text-capitalize">{{ trans('site.listcontact_types') }}</p>
                                    </a>
                                </li>
                            @endif

                            @if (auth()->user()->user_type_id == 1 || Gate::check('list-stores') )
                                <li class="nav-item mr-3">
                                    <a href=" {{ route('stores.index') }}" class="nav-link ">
                                        <strong>-</strong>
                                        <p>{{ trans('site.stores') }}</p>
                                    </a>
                                </li>
                            @endif

                        </ul>
                    </li>
                @endif

            <!---------------------------------------------- HR routes ------------------------------------------------>
                @if(str_contains(url()->current(), route('hr_dashboard')))

                    @include('dashboard-views.includes._sidebar_files.hr')
                <!------------------------------------------------ End ----------------------------------------->

                    <!---------------------------------------------- expenses routes ------------------------------------------------>
                @elseif(str_contains(url()->current(), route('expenses_dashboard')))

                    @include('dashboard-views.includes._sidebar_files.expenses')
                <!------------------------------------------------ End ----------------------------------------->

                    <!----------------------------------------- Subscriptions routes ----------------------------------------->
                @elseif(strpos($_SERVER['REQUEST_URI'], "authorizations") !== false)

                    @if (Gate::check('roles-page') || Gate::check('user-roles-page'))
                        {{-- invoices --}}
                        <li class="nav-item has-treeview menu-open">
                            <a href="#"
                               class="nav-link {{ $parent == 'user-roles' || request()->routeIs('permissions.index') ||$parent == 'user-roles' ? 'active' : '' }}">
                                <i class="nav-icon fa fa-user-plus"></i>
                                <p class="text-capitalize">
                                    {{ trans('site.authorizations') }}
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">

                                @if (auth()->user()->user_type_id == 1)
                                    <li class="nav-item mr-3">
                                        <a href="{{ route('user.index') }}"
                                           class="nav-link @if ($parent == 'user' && $child == 'index') {{ 'active' }} @endif">
                                            <strong>-</strong>
                                            <p class="text-capitalize"> @lang('site.users')</p>
                                        </a>
                                    </li>
                                @endif

                                @if (auth()->user()->user_type_id == 1|| Gate::check('list-permission-groups'))
                                    <li class="nav-item mr-3">
                                        <a href="{{ route('permission_groups.index') }}"
                                           class="nav-link @if ($parent == 'permission_groups' && $child == 'index') {{ 'active' }} @endif">
                                            {{-- <strong>-</strong> --}}
                                            <strong>-</strong>
                                            <p class="text-capitalize">{{ trans('site.permission_groups') }}</p>
                                        </a>
                                    </li>
                                @endif

                                @if (auth()->user()->user_type_id == 1)
                                    <li class="nav-item mr-3">
                                        <a href="{{ route('permissions.index') }}"
                                           class="nav-link @if (request()->routeIs('permissions.index')) {{ 'active' }} @endif">
                                            <strong>-</strong>
                                            <p class="text-capitalize"> @lang('site.permissions')</p>
                                        </a>
                                    </li>
                                @endif

                                @if (auth()->user()->user_type_id == 1 || Gate::check('roles-page'))
                                    <li class="nav-item mr-3">
                                        <a href="{{ route('roles.index') }}"
                                           class="nav-link {{ request()->routeIs('roles.index') ? 'active' : '' }}">
                                            <strong>-</strong>
                                            <p class="text-capitalize">@lang('site.roles') </p>
                                        </a>
                                    </li>
                                @endif

                                @if (auth()->user()->user_type_id == 1 || Gate::check('user-roles-page'))
                                    <li class="nav-item mr-3">
                                        <a href="{{ route('user-roles.index') }}"
                                           class="nav-link {{ request()->routeIs('user-roles.index') ? 'active' : '' }}">
                                            <strong>-</strong>
                                            <p class="text-capitalize"> @lang('site.user-roles')</p>
                                        </a>
                                    </li>
                                @endif
                            </ul>
                        </li>
                    @endif
                <!------------------------------------------------ End ----------------------------------------->


                    <!----------------------------------------- E-invoice routes --------------------------------------------------->
                @elseif(str_contains(url()->current(), route('eInvoiceDashboard')))

                    @include('dashboard-views.includes._sidebar_files.e_invoice')
                <!------------------------------------------------ End ----------------------------------------->


                    <!----------------------------------------- CRM routes --------------------------------------------------->
                @elseif(str_contains(url()->current(), route('crm_dashboard')))

                    @include('dashboard-views.includes._sidebar_files.crm')
                <!----------------------------------------------------------------------------------------->

                    <!----------------------------------------- ERP-Dashboard routes ----------------------------------------->
                @elseif(str_contains(url()->current(), route('erp_dashboard')))
                    <li class="nav-item">
                        <a href="{{ route('erp_dashboard') }}"
                           class="nav-link {{ $parent == 'erp_dashboard' ? 'active' : '' }}">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p class="text-capitalize">{{ trans('site.erp_dashboard_purchasing') }}</p>
                        </a>
                    </li>
                    <!----------------------------------------------------------------------------------------->
                @else

                <!----------------------------------------- Purchasing routes ------------------------------------------------>

                    @if(!Gate::check('custom-user'))
                        {{-- Organization chart --}}
                        <li class="nav-item">
                            <a href="{{ route('organization.chart.index') }}"
                               class="nav-link {{ $parent == 'organization' ? 'active' : '' }}">
                                <i class="nav-icon fas fa-sitemap"></i>
                                <p class="text-capitalize">@lang('site.Organization-chart')</p>
                            </a>
                        </li>
                    @endif

                    @if(!Gate::check('custom-user'))
                        {{--                        <li class="nav-header">@lang('site.Approvals')</li>--}}

                        {{-- Approval requests waiting--}}
                        <li class="nav-item">
                            <a href="{{ route('approvals.index') }}"
                               class="nav-link {{ $parent == 'approval_index' ? 'active' : '' }}">
                                <i class="nav-icon fas fa-spinner"></i>
                                {{-- <i class="nav-icon fas fa-spinner fa-pulse"></i>--}}
                                <p class="text-capitalize">@lang('site.Approval_requests')</p>
                            </a>
                        </li>
                    @endif

                    @if (Gate::check('approval_courses'))
                        {{-- Approval cycles --}}
                        <li class="nav-item">
                            <a href="{{ route('approvals.show_all_cycles') }}"
                               class="nav-link {{ $parent == 'approval_show_all_cycles' ? 'active' : '' }}">
                                <i class="nav-icon fas fa-check"></i>
                                <p class="text-capitalize">@lang('site.Approval_cycles')</p>
                            </a>
                        </li>
                    @endif

                    @if (Gate::check('inquiry_edit'))
                        {{-- inquiry-purchase-request --}}
                        <li class="nav-item">
                            <a href="{{ route('inquiry-purchase-request.index') }}"
                               class="nav-link {{ request()->routeIs('inquiry-purchase-request.index') ? 'active' : '' }}">
                                <i class="nav-icon 	fas fa-bullhorn"></i>
                                <p class="text-capitalize">@lang('site.inquiryEdit')</p>
                            </a>
                        </li>
                    @endif

                <!-- {{-- Approval requests timeline --}}
                    <li class="nav-item mr-3">
                        <a href="{{ route('approvals.show_all_approval_requests_timeline') }}"
        class="nav-link {{ $parent == 'approval_requests_timeline' ? 'active' : '' }}">
        <i class="nav-icon fas fa-stream"></i>
        <p class="text-capitalize">@lang('site.timeline')</p>
        </a>
         </li> -->

                    {{-- requests timeline --}}

                    @if (Gate::check('purchase-requests') ||
                    Gate::check('add-purchase-request') ||
                    Gate::check('show-purchase-request') ||
                    Gate::check('edit-purchase-request') ||
                    Gate::check('delete-purchase-request') ||
                    Gate::check('restore-purchase-request') ||
                    Gate::check('show-timeline-purchase-request') ||
                    Gate::check('show-acceptable-purchase-request') ||
                    Gate::check('add-expected-tiem') ||
                    Gate::check('add-inquire'))

                        {{-- Purchase request --}}
                        <li class="nav-item has-treeview  {{ $parent == 'purchase-request' || $parent == 'approval_requests_timeline' ? 'menu-open' : '' }}">
                            <a href="#"
                               class="nav-link {{ $parent == 'purchase-request' || $parent == 'approval_requests_timeline' ? 'active' : '' }}">
                                <i class="nav-icon fa fa-server"></i>
                                <p class="text-capitalize">
                                    @lang('site.Purchase_requests')
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                @if (Gate::check('purchase-requests') ||
                                Gate::check('add-purchase-request') ||
                                Gate::check('show-purchase-request') ||
                                Gate::check('edit-purchase-request') ||
                                Gate::check('delete-purchase-request') ||
                                Gate::check('restore-purchase-request'))
                                    <li class="nav-item mr-3">
                                        <a href="{{ route('purchase-request.index') }}"
                                           class="nav-link @if ($parent == 'purchase-request' && $child == 'index') {{ 'active' }} @endif">
                                            <strong>-</strong>
                                            <p class="text-capitalize"> @lang('site.purchase_requests_your')</p>
                                        </a>
                                    </li>
                                @endif

                                @if (Gate::check('show-timeline-purchase-request'))
                                    <li class="nav-item mr-3">
                                        <a href="{{ route('approvals.show_all_approval_requests_timeline') }}"
                                           class="nav-link {{ request()->routeIs('approvals.show_all_approval_requests_timeline') ? 'active' : '' }}">
                                            <strong>-</strong>
                                            <p class="text-capitalize">@lang('site.allPR') </p>
                                        </a>
                                    </li>
                                @endif

                                @if (Gate::check('show-acceptable-purchase-request') ||
                                Gate::check('add-expected-tiem') ||
                                Gate::check('add-inquire'))
                                    <li class="nav-item mr-3">
                                        <a href="{{ route('approvals.show_all_acceptable_requests_timeline') }}"
                                           class="nav-link {{ request()->routeIs('approvals.show_all_acceptable_requests_timeline') ? 'active' : '' }}">
                                            <strong>-</strong>
                                            <p class="text-capitalize">@lang('site.acceptablePR') </p>
                                        </a>
                                    </li>
                                @endif


                            </ul>
                        </li>
                    @endif


                    @if (Gate::check('purchase-orders') ||
                    Gate::check('add-purchase-order') ||
                    Gate::check('show-purchase-order') ||
                    Gate::check('edit-purchase-order') ||
                    Gate::check('delete-purchase-order') ||
                    Gate::check('restore-purchase-order') ||
                    Gate::check('show-timeline-purchase-order') ||
                    Gate::check('show-acceptable-purchase-order') ||
                    Gate::check('timeline-purchase-order') ||
                    Gate::check('create-ores') ||
                    Gate::check('acceptable-purchase-order') ||
                    Gate::check('cat_purchase_order'))


                        {{-- Purchase Order --}}
                        <li class="nav-item has-treeview  {{ $parent == 'purchase-order' || $parent == 'cat_po' || $parent == 'materials' || $parent == 'approval_orders_timeline' ? 'menu-open' : '' }}">
                            <a href="#"
                               class="nav-link   {{ $parent == 'purchase-order' || $parent == 'cat_po' || $parent == 'materials' || $parent == 'approval_orders_timeline' ? 'active' : '' }}">
                                <i class="nav-icon fas fa-border-all"></i>

                                <p class="text-capitalize">
                                    @lang('site.Purchase_orders')
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                @if (Gate::check('purchase-orders') ||
                                Gate::check('add-purchase-order') ||
                                Gate::check('show-purchase-order') ||
                                Gate::check('edit-purchase-order') ||
                                Gate::check('delete-purchase-order') ||
                                Gate::check('restore-purchase-order'))
                                    <li class="nav-item mr-3">
                                        <a href="{{ route('purchase-order.index') }}"
                                           class="nav-link {{ request()->routeIs('purchase-order.index') ? 'active' : '' }}">
                                            <strong>-</strong>
                                            <p class="text-capitalize"> @lang('site.purchase_orders_your')</p>
                                        </a>
                                    </li>
                                    <li class="nav-item mr-3">
                                        <a href="{{ route('purchase_order.index_po_fabrication') }}"
                                           class="nav-link {{ request()->routeIs('purchase_order.index_po_fabrication') ? 'active' : '' }}">
                                            <strong>-</strong>
                                            <p class="text-capitalize"> @lang('site.index_po_fabrication')</p>
                                        </a>
                                    </li>
                                @endif
                                @if (Gate::check('timeline-purchase-order'))
                                    <li class="nav-item mr-3">
                                        <a href="{{ route('approvals.show_all_approval_orders_timeline') }}"
                                           class="nav-link {{ request()->routeIs('approvals.show_all_approval_orders_timeline') ? 'active' : '' }}">
                                            <strong>-</strong>
                                            <p class="text-capitalize">@lang('site.allPO') </p>
                                        </a>
                                    </li>
                                @endif
                                @if (Gate::check('show-acceptable-purchase-order'))
                                    <li class="nav-item mr-3">
                                        <a href="{{ route('approvals.show_all_acceptable_orders_timeline') }}"
                                           class="nav-link {{ request()->routeIs('approvals.show_all_acceptable_orders_timeline') ? 'active' : '' }}">
                                            <strong>-</strong>
                                            <p class="text-capitalize">@lang('site.acceptablePO') </p>
                                        </a>
                                    </li>
                                @endif
                                @if (Gate::check('create-ores'))
                                    <li class="nav-item mr-3">
                                        <a href="{{ route('ores.create') }}"
                                           class="nav-link {{ request()->routeIs('ores.create') ? 'active' : '' }}">
                                            <strong>-</strong>
                                            <p class="text-capitalize">@lang('site.ores') </p>
                                        </a>
                                    </li>
                                @endif

                                @can('ores_status')
                                    <li class="nav-item mr-3">
                                        <a href="{{ route('purchase_order.getLastPo', 0) }}"
                                           class="nav-link {{ request()->routeIs('purchase_order.getLastPo') ? 'active' : '' }}">
                                            <strong>-</strong>
                                            <p class="text-capitalize"> {{ trans('site.ores_status') }}</p>
                                        </a>
                                    </li>
                                @endcan

                                @can('cat_purchase_order')
                                    <li class="nav-item mr-3">
                                        <a href="{{ route('purchase_order.get_po_cat') }}"
                                           class="nav-link {{ request()->routeIs('purchase_order.get_po_cat') ? 'active' : '' }}">
                                            <strong>-</strong>
                                            <p> {{ trans('site.cat_po') }}</p>
                                        </a>
                                    </li>
                                @endcan
                            </ul>
                        </li>
                    @endif


                    @if (auth()->user()->user_type_id == 1)
                        @if (Gate::check('cheques') ||
                        Gate::check('timeline-cheque-request') ||
                        Gate::check('show-acceptable-cheque-request') ||
                        Gate::check('acceptable-cheque-request'))

                            {{-- Cheque request --}}


                            <li class="nav-item has-treeview  {{ $parent == 'cheque_request' || $parent == 'approval_cheque_timeline' || $parent == 'cheques' ? 'menu-open' : ''  }}">
                                <a href="#"
                                   class="nav-link {{ $parent == 'cheque_request' || $parent == 'approval_cheque_timeline' || $parent == 'cheques' ? 'active' : ''   }}">
                                    {{--                                    <i class="nav-icon fas fa-money-check-alt "></i>--}}
                                    <i class="nav-icon">
                                        <i class="nav-icon fas fa-money-check-alt "></i>
                                    </i>
                                    <p class="text-capitalize">
                                        {{trans('site.cheques')}}
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    @if (Gate::check('cheques') ||
                                    Gate::check('add-cheque') ||
                                    Gate::check('show-cheque') ||
                                    Gate::check('edit-cheque') ||
                                    Gate::check('delete-cheque') ||
                                    Gate::check('restore-cheque') ||
                                    Gate::check('send-cheque'))
                                        <li class="nav-item mr-3">
                                            <a href="{{ route('cheques.create') }}"
                                               class="nav-link {{ request()->routeIs('cheques.create') ? 'active' : '' }}">
                                                <strong>-</strong>
                                                <p class="text-capitalize">{{trans('site.add_exchange_request')}}</p>
                                            </a>
                                        </li>
                                        <li class="nav-item mr-3">
                                            <a href="{{ route('cheques.project_request') }}"
                                               class="nav-link {{ request()->routeIs('cheques.project_request') ? 'active' : '' }}">
                                                <strong>-</strong>
                                                <p class="text-capitalize">{{trans('site.add_project_request')}}</p>
                                            </a>
                                        </li>
                                    @endif
                                    @if (Gate::check('timeline-cheque-request'))
                                        <li class="nav-item mr-3">
                                            <a href="{{ route('approvals.show_all_approval_cheque_timeline') }}"
                                               class="nav-link {{ request()->routeIs('approvals.show_all_approval_cheque_timeline') ? 'active' : '' }}">
                                                <strong>-</strong>
                                                <p class="text-capitalize">@lang('site.all_cheque_request') </p>
                                            </a>
                                        </li>
                                    @endif

                                    @if (Gate::check('show-acceptable-cheque-request') || Gate::check('acceptable-cheque-request'))
                                        <li class="nav-item mr-3">
                                            <a href="{{ route('approvals.show_all_acceptable_cheque_timeline') }}"
                                               class="nav-link {{ request()->routeIs('approvals.show_all_acceptable_cheque_timeline') ? 'active' : '' }}">
                                                <strong>-</strong>
                                                <p class="text-capitalize">@lang('site.acceptable_cheque_request') </p>
                                            </a>
                                        </li>
                                    @endif

                                    <li class="nav-item mr-3">
                                        <a href="{{ route('cheque_request.payment_dues') }}"
                                           class="nav-link {{ request()->routeIs('cheque_request.payment_dues') ? 'active' : '' }}">
                                            <strong>-</strong>
                                            <p class="text-capitalize">{{trans('site.payment_dues')}} </p>
                                        </a>
                                    </li>


                                </ul>
                            </li>
                        @endif
                    @endif

                    @can('item_require_project')
                        <li class="nav-item mr-3">
                            <a href="{{ route('get_ores') }}" class="nav-link">
                                <strong>-</strong>
                                <p class="text-capitalize">{{ trans('site.item_require_project') }}</p>
                            </a>
                        </li>
                    @endcan
                @endif
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
