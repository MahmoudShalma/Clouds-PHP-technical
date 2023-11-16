<li class="nav-item has-treeview">
    <a href="#" class="nav-link">
        <i class="nav-icon fa fa-chart-bar"></i>
        <p class="text-capitalize">
            {{ trans('sidebar.organization_structure') }}
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>

    <ul class="nav nav-treeview">
        <li class="nav-item mr-3">
            <a href="{{ route('organization.chart.index') }}" class="nav-link" target="_blank">
                <strong>-</strong>
                <p class="text-capitalize">{{ trans('sidebar.organization_hierarchy') }}</p>
            </a>
        </li>
    </ul>
</li>
<li class="nav-item has-treeview">
    <a href="#" class="nav-link">
        <i class="nav-icon fa fa-briefcase"></i>
        <p class="text-capitalize">
            {{-- {{ trans('sidebar.employee_evaluation') }} --}}
            Employee Evaluation
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>

    <ul class="nav nav-treeview">
        <li class="nav-item mr-3">
            <a href="{{ route('performance.index') }}" class="nav-link">
                <strong>-</strong>
                <p class="text-capitalize">
                    {{-- {{ trans('sidebar.performance_evaluation') }} --}}
                    Performance Evaluation
                </p></a>
        </li>
        <li class="nav-item mr-3">
            <a href="{{ route('performance.chart') }}" class="nav-link">
                <strong>-</strong>
                <p class="text-capitalize">
                    {{-- {{ trans('sidebar.evaluation_chart') }} --}}
                    Evaluation Chart
                </p></a>
        </li>
    </ul>
</li>
<li class="nav-item has-treeview">
    <a href="#" class="nav-link">
        <i class="nav-icon fa fa-briefcase"></i>
        <p class="text-capitalize">
            {{ trans('sidebar.personnel') }}
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>

    <ul class="nav nav-treeview">
        <li class="nav-item mr-3">
            <a href="#" class="nav-link">
                <strong>-</strong>
                <p class="text-capitalize">{{ trans('sidebar.position_hierarchy') }}</p>
            </a>
        </li>

        <li class="nav-item mr-3">
            <a href="{{ route('listEmployee') }}" class="nav-link">
                <strong>-</strong>
                <p class="text-capitalize">{{ trans('sidebar.employees') }}</p>
            </a>
        </li>
        <li class="nav-item mr-3">
            <a href="{{ route('listEmployeeProfiles') }}" class="nav-link">
                <strong>-</strong>
                <p class="text-capitalize">{{ trans('sidebar.employee_profile_report') }}</p>
            </a>
        </li>
        
    </ul>
</li>

<li class="nav-item has-treeview">
    <a href="#" class="nav-link">
        <i class="nav-icon fa fa-clock"></i>
        <p class="text-capitalize">
            {{ trans('sidebar.attendance') }}
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>

    <ul class="nav nav-treeview">
        <li class="nav-item mr-3">
            <a href="{{ route('listPublicHoliday') }}" class="nav-link">
                <strong>-</strong>
                <p class="text-capitalize">{{ trans('sidebar.public_holiday') }}</p>
            </a>
        </li>

        <li class="nav-item mr-3">
            <a href="{{ route('listCheckinout') }}" class="nav-link">
                <strong>-</strong>
                <p class="text-capitalize">{{ trans('sidebar.check_in_out') }}</p>
            </a>
        </li>

        <li class="nav-item mr-3">
            <a href="{{ route('listVacationType') }}" class="nav-link">
                <strong>-</strong>
                <p class="text-capitalize">{{ trans('sidebar.vacation_types') }}</p>
            </a>
        </li>

        <li class="nav-item mr-3">
            <a href="{{ route('listEmployeeVacation') }}" class="nav-link">
                <strong>-</strong>
                <p class="text-capitalize">{{ trans('sidebar.employee_leave') }}</p>
            </a>
        </li>

        <li class="nav-item mr-3">
            <a href="{{ route('listLeavePermission') }}" class="nav-link">
                <strong>-</strong>
                <p class="text-capitalize">{{ trans('sidebar.leave_permissions') }}</p>
            </a>
        </li>

        <li class="nav-item mr-3">
            <a href="{{ route('listEmployeeVacationBalance') }}" class="nav-link">
                <strong>-</strong>
                <p class="text-capitalize">{{ trans('sidebar.employee_vacation_balance') }}</p>
            </a>
        </li>
    </ul>
</li>

<li class="nav-item has-treeview">
    <a href="#" class="nav-link">
        <i class="nav-icon fa fa-user-plus"></i>
        <p class="text-capitalize">
            {{ trans('sidebar.recruitment') }}
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>

    <ul class="nav nav-treeview">
        <li class="nav-item mr-3">
            <a href="{{ route('applied_cv.index') }}" class="nav-link">
                <strong>-</strong>
                <p class="text-capitalize">{{ trans('sidebar.applied_cvs') }}</p>
            </a>
        </li>
    </ul>

    <ul class="nav nav-treeview">
        <li class="nav-item mr-3">
            <a href="{{ route('listApplicant') }}" class="nav-link">
                <strong>-</strong>
                <p class="text-capitalize">{{ trans('sidebar.applicants') }}</p>
            </a>
        </li>
    </ul>

    <ul class="nav nav-treeview">
        <li class="nav-item mr-3">
            <a href="{{ route('listInterview') }}" class="nav-link">
                <strong>-</strong>
                <p class="text-capitalize">{{ trans('sidebar.interviews') }}</p>
            </a>
        </li>
    </ul>

    <ul class="nav nav-treeview">
        <li class="nav-item mr-3">
            <a href="{{ route('listHiring') }}" class="nav-link">
                <strong>-</strong>
                <p class="text-capitalize">{{ trans('sidebar.hiring_request_form') }}</p>
            </a>
        </li>
    </ul>

    {{--                        <ul class="nav nav-treeview">--}}
    {{--                            <li class="nav-item mr-3">--}}
    {{--                                <a href="{{ route('listPromotion') }}" class="nav-link">--}}
    {{--                                    <strong>-</strong>--}}
    {{--                                    <p class="text-capitalize">{{ trans('sidebar.employee_promotions') }}</p>--}}
    {{--                                </a>--}}
    {{--                            </li>--}}
    {{--                        </ul>--}}
</li>

<li class="nav-item has-treeview">
    <a href="#" class="nav-link">
        <i class="nav-icon fa fa-calendar-alt"></i>
        <p class="text-capitalize">
            {{ trans('sidebar.calendar') }}
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>

    <ul class="nav nav-treeview">
        <li class="nav-item mr-3">
            <a href="{{ route('listCalendar') }}" class="nav-link">
                <strong>-</strong>
                <p class="text-capitalize">{{ trans('sidebar.calendar') }}</p>
            </a>
        </li>
    </ul>

    <ul class="nav nav-treeview">
        <li class="nav-item mr-3">
            <a href="{{ route('listCustomCalendar') }}" class="nav-link">
                <strong>-</strong>
                <p class="text-capitalize">{{ trans('sidebar.custom_calendar') }}</p>
            </a>
        </li>
    </ul>

    <ul class="nav nav-treeview">
        <li class="nav-item mr-3">
            <a href="{{ route('listCalender') }}" class="nav-link">
                <strong>-</strong>
                <p class="text-capitalize">{{ trans('sidebar.public_holiday_calendar') }}</p>
            </a>
        </li>
    </ul>
</li>

<li class="nav-item has-treeview">
    <a href="#" class="nav-link">
        <i class="nav-icon fa fa-gift"></i>

        <p class="text-capitalize">
            {{ trans('sidebar.Compensation_and_Benefits') }}
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>

    <ul class="nav nav-treeview">
        <li class="nav-item mr-3">
            <a href="{{ route('listPayslipObjection') }}" class="nav-link">
                <strong>-</strong>
                <p class="text-capitalize">{{ trans('sidebar.payslip_claim') }}</p>

                <span class="badge badge-info right">{{ $unread_objections }}</span>
            </a>
        </li>
    </ul>
</li>

<li class="nav-item">
    <a href="{{ route('listHrRequest') }}" class="nav-link">
        <i class="nav-icon fa fa-flag-checkered"></i>
        <p class="text-capitalize">{{ trans('sidebar.hr_request') }}</p>
    </a>
</li>

{{-- Announcement Permisson By Laila ---> Gave to announcement group including super_admin Role --> userType=1 --}}
@if (Gate::check('announcement-list')|| Auth()->user()->user_type_id ==1 )
    <li class="nav-item">
        <a href="{{ route('listAnnouncement') }}" class="nav-link">
            <i class="nav-icon fa fa-bullhorn"></i>
            <p class="text-capitalize">{{ trans('sidebar.announcement') }}</p>
            <span class="badge badge-danger right">4</span>
        </a>
    </li>
@endif
{{-- end permission  --}}
{{-- welcome message permisson by Laila ---> Gave to welcomemessage group including super_admin Role --> userType=1 --}}
@if (Gate::check('welcomemessage-list') || Auth()->user()->user_type_id ==1)
    <li class="nav-item">
        <a href="{{ route('listWelcomeMessage') }}" class="nav-link">
            <i class="nav-icon fa fa-envelope-open"></i>
            <p class="text-capitalize">{{ trans('sidebar.welcome_message') }}</p>
        </a>
    </li>
@endif
{{-- end permission --}}
<li class="nav-item">
    <a href="{{ route('employeeDirectory') }}" class="nav-link">
        <i class="nav-icon fa fa-folder"></i>
        <p class="text-capitalize">{{ trans('sidebar.employee_directory') }}</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('listFileRepository') }}" class="nav-link">
        <i class="nav-icon fa fa-archive"></i>
        <p class="text-capitalize">{{ trans('sidebar.file_repository') }}</p>
    </a>
</li>
