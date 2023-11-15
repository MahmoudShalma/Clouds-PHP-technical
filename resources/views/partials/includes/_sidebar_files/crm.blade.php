<li class="nav-item has-treeview menu-open">
    <a href="#" class="nav-link">
        <i class="nav-icon fab fa-critical-role	"></i>
        <p class="text-capitalize">
            {{ trans('sidebar.registration') }}
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>

    @if (auth()->user()->user_type_id == 1 || Gate::check('crm-list-registration'))
        <ul class="nav nav-treeview">
            <li class="nav-item mr-3">
                <a href="{{ route('registeration.index') }}" class="nav-link">
                    <strong>-</strong>
                    <p class="text-capitalize">{{ trans('sidebar.registrations') }}</p>
                </a>
            </li>
        </ul>
    @endif

    @if (auth()->user()->user_type_id == 1 || Gate::check('crm-list-registration-contact'))
        <ul class="nav nav-treeview">
            <li class="nav-item mr-3">
                <a href="{{ route('listRegisterContact') }}" class="nav-link">
                    <strong>-</strong>
                    <p class="text-capitalize">{{ trans('sidebar.registration_contact') }}</p>
                </a>
            </li>
        </ul>
    @endif

    @if (auth()->user()->user_type_id == 1 || Gate::check('crm-list-registration-opportunity'))
        <ul class="nav nav-treeview">
            <li class="nav-item mr-3">
                <a href="{{ route('listRegisterOpportunity') }}" class="nav-link">
                    <strong>-</strong>
                    <p class="text-capitalize">{{ trans('sidebar.registration_opportunity') }}</p>
                </a>
            </li>
        </ul>
    @endif

    @if (auth()->user()->user_type_id == 1 || Gate::check('list-registration-approach'))
        <ul class="nav nav-treeview">
            <li class="nav-item mr-3">
                <a href="{{ route('register_approach.index') }}" class="nav-link">
                    <strong>-</strong>
                    <p class="text-capitalize">{{ trans('sidebar.registration_approach') }}</p>
                </a>
            </li>
        </ul>
    @endif
</li>

<li class="nav-item has-treeview menu-open">
    <a href="#" class="nav-link">
        <i class="nav-icon fab fa-critical-role	"></i>
        <p class="text-capitalize">
            {{ trans('sidebar.quotation') }}
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>

    @if (auth()->user()->user_type_id == 1 || Gate::check('list-issuing-quotation'))
        <ul class="nav nav-treeview">
            <li class="nav-item mr-3">
                <a href="{{ route('issuing_quotation.index') }}" class="nav-link">
                    <strong>-</strong>
                    <p class="text-capitalize">{{ trans('sidebar.issuing_quotation') }}</p>
                </a>
            </li>
        </ul>
    @endif
</li>

<li class="nav-item has-treeview menu-open">
    <a href="#" class="nav-link">
        <i class="nav-icon fab fa-critical-role	"></i>
        <p class="text-capitalize">
            {{ trans('sidebar.contract') }}
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>

    {{-- @if (Gate::check('add-contract') ||--}}
    @if (auth()->user()->user_type_id == 1 || Gate::check('crm-list-contract'))
        <ul class="nav nav-treeview">
            <li class="nav-item mr-3">
                <a href="{{ route('contract.index') }}" class="nav-link">
                    <strong>-</strong>
                    <p class="text-capitalize">{{ trans('sidebar.contract') }}</p>
                </a>
            </li>
        </ul>
    @endif
</li>
