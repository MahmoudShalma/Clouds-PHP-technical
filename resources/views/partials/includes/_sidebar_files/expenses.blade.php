@if (Gate::check('invoices') ||
Gate::check('payments') ||
Gate::check('edit-invoice') ||
Gate::check('delete-invoice') ||
Gate::check('show-invoice') ||
Gate::check('restore-invoice') ||
Gate::check('edit-payment') ||
Gate::check('delete-payment') ||
Gate::check('restore-payment') ||
Gate::check('show-payment') ||
Gate::check('account_statement'))
    {{-- invoices --}}
    <li class="nav-item has-treeview  {{ $parent == 'payment' || $parent == 'opening_balance' || $parent == 'invoices' || $parent == 'account_statement' ? 'menu-open' : '' }}">
        <a href="#"
           class="nav-link   {{ $parent == 'payment' || $parent == 'opening_balance' || $parent == 'invoices' || $parent == 'account_statement' ? 'active' : '' }}">
            <i class="nav-icon fa fa-copy"></i>
            <p class="text-capitalize">
                @lang('site.invoices')
                <i class="right fas fa-angle-left"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">
            @if (Gate::check('payment-list') || Gate::check('opening_balance_index'))
                <li class="nav-item mr-3">
                    <a href="{{ route('opening_balance.index') }}"
                       class="nav-link  {{ request()->routeIs('opening_balance.index') ? 'active' : '' }}">
                        <strong>-</strong>
                        <p class="text-capitalize"> @lang('site.opening_balance')</p>
                    </a>
                </li>
            @endif

            @if (Gate::check('payments'))
                <li class="nav-item mr-3">
                    <a href="{{ route('paymentInvoice.index') }}"
                       class="nav-link @if ($parent == 'payment' && $child == 'index') {{ 'active' }} @endif">
                        <strong>-</strong>
                        <p class="text-capitalize"> @lang('site.payment')</p>
                    </a>
                </li>
            @endif

            @if (Gate::check('invoices'))
                <li class="nav-item mr-3">
                    <a href="{{ route('invoices.index') }}"
                       class="nav-link @if ($parent == 'invoices' && $child == 'index') {{ 'active' }} @endif">
                        <strong>-</strong>
                        <p class="text-capitalize"> @lang('site.invoices')</p>
                    </a>
                </li>
            @endif

            @if (Gate::check('account_statement'))
                <li class="nav-item mr-3">
                    <a href="{{ route('report_get_supplier_statment1') }}"
                       class="nav-link {{ request()->routeIs('report_get_supplier_statment1') ? 'active' : '' }}">
                        <strong>-</strong>
                        <p class="text-capitalize">@lang('site.account_statement') </p>
                    </a>
                </li>
            @endif

        </ul>
    </li>
@endif



@if (auth()->user()->user_type_id == 1 || Gate::check('list_guarantees_contractors') || Gate::check('reportGuaranteesContractors'))
    <li class="nav-item {{ $parent == 'index_guarantees_contractors' || $parent == 'report_guarantees_contractors' || $parent == 'projects' || $parent == 'supplier' || $parent == 'discountType' || $parent == 'natureDealing' || $parent == 'bank' ? 'menu-is-opening menu-open' : '' }} ">
        <a href="#"
           class="nav-link {{ $parent == 'index_guarantees_contractors' || $parent == 'report_guarantees_contractors' || $parent == 'projects' || $parent == 'supplier' || $parent == 'discountType' || $parent == 'natureDealing' || $parent == 'bank' ? 'active' : '' }} ">
            <i class="nav-icon fa fa-file-circle-check"></i>
            <p class="text-capitalize">
                @lang('site.guarantees_contractors')
                <i class="fas fa-angle-left right"></i>
            </p>
        </a>

        <ul class="nav nav-treeview">
            @can('list_guarantees_contractors')
                <li class="nav-item mr-3">
                    <a href="{{ route('guarantees.index') }}"
                       class="nav-link  {{ $parent == 'index_guarantees_contractors' ? 'active' : '' }}">
                        <strong>-</strong>
                        <p class="text-capitalize">@lang('site.guarantees_contractors')</p>
                    </a>
                </li>
            @endcan

            @can('reportGuaranteesContractors')
                <li class="nav-item mr-3">
                    <a href="{{ route('reports.report_guarantees_contractors') }}"
                       class="nav-link  {{ request()->routeIs('reports.report_guarantees_contractors') ? 'active' : '' }}">
                        <strong>-</strong>
                        <p class="text-capitalize">@lang('site.report_guarantees_contractors')</p>
                    </a>
                </li>
            @endcan
        </ul>
    </li>
@endif

@if (auth()->user()->user_type_id == 1 || Gate::check('transaction_taxes'))
    <li class="nav-item {{ $parent == 'transaction_taxes' ||  $parent == 'dummy_invoices' ||  $parent == 'transaction_taxes_report' ? 'menu-is-opening menu-open' : '' }} ">
        <a href="#"
           class="nav-link {{ $parent == 'transaction_taxes' ||  $parent == 'dummy_invoices' ||  $parent == 'transaction_taxes_report' ? 'active' : '' }} ">
            <i class="nav-icon fa fa-file"></i>
            <p class="text-capitalize">
                @lang('site.transaction_taxes')
                <i class="fas fa-angle-left right"></i>
            </p>
        </a>

        <ul class="nav nav-treeview">
            @can('transaction_taxes')
                {{-- transaction_taxes --}}
                <li class="nav-item mr-3">
                    <a href="{{ route('transaction_taxes.index') }}"
                       class="nav-link  {{ request()->routeIs('transaction_taxes.index') ? 'active' : '' }}">
                        <strong>-</strong>
                        <p class="text-capitalize">@lang('site.transaction_taxes')</p>
                    </a>
                </li>
                {{-- dummy_invoices --}}
                <li class="nav-item mr-3">
                    <a href="{{ route('dummy_invoices.index') }}"
                       class="nav-link  {{ request()->routeIs('dummy_invoices.index') ? 'active' : '' }}">
                        <strong>-</strong>
                        <p class="text-capitalize">{{trans("site.dummy_invoices")}}</p>
                    </a>
                </li>

                {{-- Report --}}
                <li class="nav-item mr-3">
                    <a href="{{ route('transaction_taxes_report') }}"
                       class="nav-link  {{ request()->routeIs('transaction_taxes_report') ? 'active' : '' }}">
                        <strong>-</strong>
                        <p class="text-capitalize">{{trans("site.transaction_taxes_report")}}</p>
                    </a>
                </li>
            @endcan
        </ul>
    </li>
@endif

@if (auth()->user()->user_type_id == 1 || Gate::check('reportProjectBalance') ||Gate::check('reportCostBalance') ||Gate::check('report_get_cost') ||Gate::check('report_expense') ||Gate::check('reportOperatingExpensesBalance') ||Gate::check('reportsOperationExpense') ||Gate::check('reportCovenantNumber'))

    <li class="nav-item {{ $parent == 'report_operating_expenses_balance' || $parent == 'report_selling_distribution_expenses_totals' || $parent == 'report_get_cost' || $parent == 'report_project_balance' || $parent == 'report_cost_balance' || $parent == 'report_get_expense' || $parent == 'report_covenant_number' || $parent == 'report_operation_expense' ? 'menu-is-opening menu-open' : '' }} ">
        <a href="#"
           class="nav-link {{ $parent == 'report_project_balance' || $parent == 'report_selling_distribution_expenses_totals' || $parent == 'report_get_cost' || $parent == 'report_operating_expenses_balance' || $parent == 'report_cost_balance' || $parent == 'report_get_expense' || $parent == 'report_operation_expense' || $parent == 'report_covenant_number' ? 'active' : '' }} ">
            <i class="nav-icon fa fa-file"></i>
            <p class="text-capitalize">
                @lang('site.operating_expenses_reports')
                <i class="fas fa-angle-left right"></i>
            </p>
        </a>

        <ul class="nav nav-treeview " style="overflow-x: scroll !important; ">
            @can('reportSellingDistributionTotals')
                <li class="nav-item mr-3">
                    <a href="{{ route('reports.report_selling_distribution_expenses_totals') }}"
                       class="nav-link  {{ request()->routeIs('reports.report_selling_distribution_expenses_totals') ? 'active' : '' }}">
                        <strong>-</strong>
                        <p class="text-capitalize"> @lang('site.report_selling_distribution_expense')</p>
                    </a>
                </li>
            @endcan

            @can('reportProjectBalance')
                <li class="nav-item mr-3">
                    <a href="{{ route('reports.report_project_balance') }}"
                       class="nav-link  {{ request()->routeIs('reports.report_project_balance') ? 'active' : '' }}">
                        <strong>-</strong>
                        <p class="text-capitalize"> @lang('site.report_project_balance')</p>
                    </a>
                </li>
            @endcan

            @can('reportCostBalance')
                <li class="nav-item mr-3">
                    <a href="{{ route('reports.report_cost_balance') }}"
                       class="nav-link  {{ request()->routeIs('reports.report_cost_balance') ? 'active' : '' }}">
                        <strong>-</strong>
                        <p class="text-capitalize"> @lang('site.report_cost_balance')</p>
                    </a>
                </li>
            @endcan

            @can('report_get_cost')
                <li class="nav-item mr-3">
                    <a href="{{ route('reports.report_get_cost') }}"
                       class="nav-link  {{ request()->routeIs('reports.report_get_cost') ? 'active' : '' }}">
                        <strong>-</strong>
                        <p class="text-capitalize"> @lang('site.cost_report')</p>
                    </a>
                </li>
            @endcan

            @can('report_expense')
                <li class="nav-item mr-3">
                    <a href="{{ route('reports.report_get_expense') }}"
                       class="nav-link  {{ request()->routeIs('reports.report_get_expense') ? 'active' : '' }}">
                        <strong>-</strong>
                        <p class="text-capitalize"> @lang('site.expense_report')</p>
                    </a>
                </li>
            @endcan

            @can('reportOperatingExpensesBalance')
                <li class="nav-item mr-3">
                    <a href="{{ route('reports.report_operating_expenses_balance') }}"
                       class="nav-link  {{ request()->routeIs('reports.report_operating_expenses_balance') ? 'active' : '' }}">
                        <strong>-</strong>
                        <p class="text-capitalize"> @lang('site.report_operating_expenses_balance')</p>
                    </a>
                </li>
            @endcan

            @can('reportsOperationExpense')
                <li class="nav-item mr-3">
                    <a href="{{ route('reports.reports_operation_expense') }}"
                       class="nav-link  {{ request()->routeIs('reports.reports_operation_expense') ? 'active' : '' }}">
                        <strong>-</strong>
                        <p class="text-capitalize"> @lang('site.report_operation_expenses')</p>
                    </a>
                </li>
            @endcan

            @can('reportCovenantNumber')
                <li class="nav-item mr-3">
                    <a href="{{ route('reports.report_covenant_number') }}"
                       class="nav-link  {{ request()->routeIs('reports.report_covenant_number') ? 'active' : '' }}">
                        <strong>-</strong>
                        <p class="text-capitalize"> @lang('site.report_covenant_number')</p>
                    </a>
                </li>
            @endcan
        </ul>
    </li>
@endif

@if (auth()->user()->user_type_id == 1 || Gate::check('report') || Gate::check('reportsGeneralConclusions') || Gate::check('reportPublicExpenseBalance') || Gate::check('reportGeneralExpensesTotals'))
    <li class="nav-item {{ $parent == 'reports' || $parent == 'reports_general_conclusions' ? 'menu-is-opening menu-open' : '' }} ">
        <a href="#"
           class="nav-link {{ $parent == 'reports' || $parent == 'reports_general_conclusions' ? 'active' : '' }} ">
            <i class="nav-icon fa fa-file"></i>
            <p class="text-capitalize">
                @lang('site.general_reports')
                <i class="fas fa-angle-left right"></i>
            </p>
        </a>

        <ul class="nav nav-treeview">
            @can('report')
                <li class="nav-item mr-3">
                    <a href="{{ route('reports.index') }}"
                       class="nav-link  {{ request()->routeIs('reports.index') ? 'active' : '' }}">
                        <strong>-</strong>
                        <p class="text-capitalize"> @lang('site.reports_general_expenses')</p>
                    </a>
                </li>
            @endcan

            @can('reportPublicExpenseBalance')
                <li class="nav-item mr-3">
                    <a href="{{ route('reports.report_public_expense_balance') }}"
                       class="nav-link  {{ request()->routeIs('reports.report_public_expense_balance') ? 'active' : '' }}">
                        <strong>-</strong>
                        <p class="text-capitalize">{{ trans('site.public_expense_balance') }}</p>
                    </a>
                </li>
            @endcan

            @can('reportGeneralExpensesTotals')
                <li class="nav-item mr-3">
                    <a href="{{ route('reports.report_general_expenses_totals') }}"
                       class="nav-link  {{ request()->routeIs('reports.report_general_expenses_totals') ? 'active' : '' }}">
                        <strong>-</strong>
                        <p class="text-capitalize">{{ trans('site.general_expenses_totals') }}</p>
                    </a>
                </li>
            @endcan

            @can('reportsGeneralConclusions')
                <li class="nav-item mr-3">
                    <a href="{{ route('reports.reports_general_conclusions') }}"
                       class="nav-link  {{ request()->routeIs('reports.reports_general_conclusions') ? 'active' : '' }}">
                        <strong>-</strong>
                        <p class="text-capitalize"> @lang('site.reports_general_conclusions')</p>
                    </a>
                </li>
            @endcan
        </ul>
    </li>
@endif

@if (auth()->user()->user_type_id == 1 || Gate::check('ackAddedValue') || Gate::check('ackAddedValueGSH') || Gate::check('discountTaxes'))
    <li class="nav-item {{ $parent == 'reports_ack_added_value' || $parent == 'reports_ack_added_value_G_SH' || $parent == 'reports_discount_taxes' ? 'menu-is-opening menu-open' : '' }} ">
        <a href="#"
           class="nav-link {{ $parent == 'reports_ack_added_value' || $parent == 'reports_ack_added_value_G_SH' || $parent == 'reports_discount_taxes' ? 'active' : '' }} ">
            <i class="nav-icon fa fa-file"></i>
            <p class="text-capitalize">
                @lang('site.tax_returns')
                <i class="fas fa-angle-left right"></i>
            </p>
        </a>

        <ul class="nav nav-treeview">
            @can('ackAddedValue')
                <li class="nav-item mr-3">
                    <a href="{{ route('reports.ack_added_value') }}"
                       class="nav-link  {{ request()->routeIs('reports.ack_added_value') ? 'active' : '' }}">
                        <strong>-</strong>
                        <p class="text-capitalize"> @lang('site.ack_added_value')</p>
                    </a>
                </li>
            @endcan

            @can('ackAddedValueGSH')
                <li class="nav-item mr-3">
                    <a href="{{ route('reports.ack_added_value_G_SH') }}"
                       class="nav-link  {{ request()->routeIs('reports.ack_added_value_G_SH') ? 'active' : '' }}">
                        <strong>-</strong>
                        <p class="text-capitalize"> @lang('site.ack_added_value_G_SH')</p>
                    </a>
                </li>
            @endcan

            @can('discountTaxes')
                <li class="nav-item mr-3">
                    <a href="{{ route('reports.discount_taxes') }}"
                       class="nav-link  {{ request()->routeIs('reports.discount_taxes') ? 'active' : '' }}">
                        <strong>-</strong>
                        <p class="text-capitalize"> @lang('site.report_discount_taxes')</p>
                    </a>
                </li>
            @endcan
        </ul>
    </li>
@endif

@if (auth()->user()->user_type_id == 1 || Gate::check('get_supplier_statment') || Gate::check('combined_index') || Gate::check('transaction_volume_certificate'))
    <li class="nav-item {{ $parent == 'get_supplier_statment' || $parent == 'get_suppliers_statment' || $parent == 'transaction_volume_certificate' ? 'menu-is-opening menu-open' : '' }} ">
        <a href="#"
           class="nav-link {{ $parent == 'get_supplier_statment' || $parent == 'get_suppliers_statment' || $parent == 'transaction_volume_certificate' ? 'active' : '' }} ">
            <i class="nav-icon fa fa-file"></i>
            <p class="text-capitalize">
                @lang('site.supplier_account_reports')
                <i class="fas fa-angle-left right"></i>
            </p>
        </a>

        <ul class="nav nav-treeview">
            @can('get_supplier_statment')
                <li class="nav-item mr-3">
                    <a href="{{ route('report_get_supplier_statment') }}"
                       class="nav-link  {{ request()->routeIs('report_get_supplier_statment') ? 'active' : '' }}">
                        <strong>-</strong>
                        <p class="text-capitalize"> @lang('site.account_statement')</p>
                    </a>
                </li>
            @endcan

            @can('combined_index')
                <li class="nav-item mr-3">
                    <a href="{{ route('report_get_suppliers_statment') }}"
                       class="nav-link  {{ request()->routeIs('report_get_suppliers_statment') ? 'active' : '' }}">
                        <strong>-</strong>
                        <p class="text-capitalize"> @lang('site.combined_account_statement')</p>
                    </a>
                </li>
            @endcan

            @can('transaction_volume_certificate')
                <li class="nav-item mr-3">
                    <a href="{{ route('report_transaction_volume_certificate') }}"
                       class="nav-link  {{ request()->routeIs('report_transaction_volume_certificate') ? 'active' : '' }}">
                        <strong>-</strong>
                        <p class="text-capitalize"> @lang('site.transaction_volume_certificate')</p>
                    </a>
                </li>
            @endcan
        </ul>
    </li>
@endif

@if (auth()->user()->user_type_id == 1 || Gate::check('reportAccountNumber') || Gate::check('reportAccountNumberBank'))
    <li class="nav-item {{ $parent == 'report_account_number' || $parent == 'report_account_number_bank' ? 'menu-is-opening menu-open' : '' }} ">
        <a href="#"
           class="nav-link {{ $parent == 'report_account_number' || $parent == 'report_account_number_bank' ? 'active' : '' }} ">
            <i class="nav-icon fa fa-file"></i>
            <p class="text-capitalize">
                @lang('site.bank_reports')
                <i class="fas fa-angle-left right"></i>
            </p>
        </a>

        <ul class="nav nav-treeview">
            @can('reportAccountNumber')
                <li class="nav-item mr-3">
                    <a href="{{ route('reports.report_account_number') }}"
                       class="nav-link  {{ request()->routeIs('reports.report_account_number') ? 'active' : '' }}">
                        <strong>-</strong>
                        <p class="text-capitalize"> @lang('site.report_account_number')</p>
                    </a>
                </li>
            @endcan
            @can('reportAccountNumberBank')
                <li class="nav-item mr-3">
                    <a href="{{ route('reports.report_account_number_bank') }}"
                       class="nav-link  {{ request()->routeIs('reports.report_account_number_bank') ? 'active' : '' }}">
                        <strong>-</strong>
                        <p class="text-capitalize"> @lang('site.report_account_number_bank')</p>
                    </a>
                </li>
            @endcan

        </ul>
    </li>
@endif

@if (auth()->user()->user_type_id == 1 || Gate::check('report_assetAccount'))
    <li class="nav-item {{ $parent == 'report_get_assetAccount' || $parent == 'report_account_number_bank' ? 'menu-is-opening menu-open' : '' }} ">
        <a href="#"
           class="nav-link {{ $parent == 'report_get_assetAccount' ? 'active' : '' }} ">
            <i class="nav-icon fa fa-file"></i>
            <p class="text-capitalize">
                @lang('site.report_get_assetAccount')
                <i class="fas fa-angle-left right"></i>
            </p>
        </a>

        <ul class="nav nav-treeview">
            @can('report_assetAccount')
                <li class="nav-item mr-3">
                    <a href="{{ route('reports.report_get_assetAccount') }}"
                       class="nav-link  {{ request()->routeIs('reports.report_get_assetAccount') ? 'active' : '' }}">
                        <strong>-</strong>
                        <p class="text-capitalize"> @lang('site.report_get_assetAccount')</p>
                    </a>
                </li>
            @endcan
        </ul>
    </li>
@endif

@if (auth()->user()->user_type_id == 1 || Gate::check('reportFollowUp'))
    <li class="nav-item {{ $parent == 'report_Work_followUp' ? 'menu-is-opening menu-open' : '' }} ">
        <a href="#" class="nav-link {{ $parent == 'report_Work_followUp' ? 'active' : '' }} ">
            <i class="nav-icon fa fa-file"></i>
            <p class="text-capitalize">

                {{ trans("site.report_followUp")}}
                <i class="fas fa-angle-left right"></i>
            </p>
        </a>

        <ul class="nav nav-treeview">
            @can('reportFollowUp')
                <li class="nav-item mr-3">
                    <a href="{{ route('reports.report_Work_followUp') }}"
                       class="nav-link  {{ request()->routeIs('reports.report_Work_followUp') ? 'active' : '' }}">
                        <strong>-</strong>
                        <p class="text-capitalize"> {{ trans("site.work_followUp")}}</p>
                    </a>
                </li>
            @endcan


        </ul>
    </li>
@endif
