<?php
use App\Models\Company;
use App\Models\User;

$userId = auth()->user()->id;
$ownedcompanies = Company::where('created_by', $userId)->get();

$user = User::find($userId);
$joinedcompanies = Company::whereHas('employees', function ($query) use ($user) {
    $query->where('user_id', $user->id);
})
    ->where('created_by', '!=', $user->id)
    ->get();

?>

@if (isset($ownedcompanies) && !$ownedcompanies->isEmpty())
    <li class="menu-title"><span data-key="t-owned">Owned</span></li>
    @foreach ($ownedcompanies as $company)
        <li class="nav-item">
            <a href="#sidebarcompany{{ str_replace(' ', '_', $company->name) }}" class="nav-link" data-bs-toggle="collapse"
                role="button" aria-expanded="false"
                aria-controls="sidebarcompany{{ str_replace(' ', '_', $company->name) }}" data-key="t-company">
                {{ str_replace(' ', '_', $company->name) }}
            </a>
            <div class="collapse menu-dropdown {{ request()->is('companies/manage/' . $company->id, 'companies/manage/' . $company->id . '/*') ? 'show' : '' }}"
                id="sidebarcompany{{ str_replace(' ', '_', $company->name) }}">
                <ul class="nav nav-sm flex-column">
                    <li class="nav-item">
                        <a href="{{ route('company.dashboard', $company->id) }}"
                            class="nav-link {{ request()->is('companies/manage/' . $company->id . '/dashboard') ? 'active' : '' }}"
                            data-key="t-dashboard">
                            Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('company.profile', $company->id) }}"
                            class="nav-link {{ request()->is('companies/manage/' . $company->id . '/profile') ? 'active' : '' }}"
                            data-key="t-profile">
                            Profile
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('company.employees', $company->id) }}"
                            class="nav-link {{ request()->is('companies/manage/' . $company->id . '/employees', 'companies/manage/' . $company->id . '/employees/*') ? 'active' : '' }}"
                            data-key="t-employees">
                            Employees
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#sidebarentities{{ str_replace(' ', '_', $company->name) }}" class="nav-link"
                            data-bs-toggle="collapse" role="button" aria-expanded="false"
                            aria-controls="sidebarentities{{ str_replace(' ', '_', $company->name) }}"
                            data-key="t-entities">
                            Entities
                        </a>
                        <div class="collapse menu-dropdown {{ request()->is('companies/manage/' . $company->id . '/entities', 'companies/manage/' . $company->id . '/entities/*') ? 'show' : '' }}"
                            id="sidebarentities{{ str_replace(' ', '_', $company->name) }}">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="{{ route('entity.create', $company->id) }}"
                                        class="nav-link {{ request()->is('companies/manage/' . $company->id . '/entities/create') ? 'active' : '' }}"
                                        data-key="t-level-3.1">Create Entity</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('company.entities', $company->id) }}"
                                        class="nav-link {{ request()->is('companies/manage/' . $company->id . '/entities') ? 'active' : '' }}"
                                        data-key="t-level-3.1">View Entities
                                    </a>
                                </li>
                                @if (isset($company->entities) && !$company->entities->isEmpty())
                                    <li class="menu-title"><span data-key="t-owned">Entites</span></li>
                                    @foreach ($company->entities as $entity)
                                        <li class="nav-item">
                                            <a href="#sidebarentities{{ str_replace(' ', '_', $entity->name) }}"
                                                class="nav-link" data-bs-toggle="collapse" role="button"
                                                aria-expanded="false"
                                                aria-controls="sidebarentities{{ str_replace(' ', '_', $entity->name) }}"
                                                data-key="t-entities">
                                                {{ $entity->name }}
                                            </a>
                                            <div class="collapse menu-dropdown {{ request()->is('companies/manage/' . $company->id . '/entities/' . $entity->id . '/*') ? 'show' : '' }}"
                                                id="sidebarentities{{ str_replace(' ', '_', $entity->name) }}">
                                                <ul class="nav nav-sm flex-column">
                                                    <li class="nav-item">
                                                        <a href="{{ route('entity.dashboard', ['cid' => $company->id, 'eid' => $entity->id]) }}"
                                                            class="nav-link {{ request()->is('companies/manage/' . $company->id . '/entities/' . $entity->id . '/dashboard') ? 'active' : '' }}"
                                                            data-key="t-level-3.1">Dashboard</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a href="{{ route('entity.creditControl', ['cid' => $company->id, 'eid' => $entity->id]) }}"
                                                            class="nav-link {{ request()->is('companies/manage/' . $company->id . '/entities/' . $entity->id . '/credit-control') ? 'active' : '' }}"
                                                            data-key="t-level-3.1">Credit Control Dashboard</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a href="{{ route('entity.view', ['cid' => $company->id, 'eid' => $entity->id]) }}"
                                                            class="nav-link {{ request()->is('companies/manage/' . $company->id . '/entities/' . $entity->id . '/view') ? 'active' : '' }}"
                                                            data-key="t-level-3.1">Entity Profile</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a href="{{ route('entity.invoice.create', ['cid' => $company->id, 'eid' => $entity->id]) }}"
                                                            class="nav-link {{ request()->is('companies/manage/' . $company->id . '/entities/' . $entity->id . '/invoices/create') ? 'active' : '' }}"
                                                            data-key="t-level-3.1">Create Invoice</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a href="{{ route('entity.pending.invoices', ['cid' => $company->id, 'eid' => $entity->id]) }}"
                                                            class="nav-link {{ request()->is('companies/manage/' . $company->id . '/entities/' . $entity->id . '/pending-invoices') ? 'active' : '' }}"
                                                            data-key="t-level-3.1">Pending Invoices</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a href="{{ route('entity.approved.invoices', ['cid' => $company->id, 'eid' => $entity->id]) }}"
                                                            class="nav-link {{ request()->is('companies/manage/' . $company->id . '/entities/' . $entity->id . '/approved-invoices') ? 'active' : '' }}"
                                                            data-key="t-level-3.1">Approved Invoices</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a href="{{ route('entity.rejected.invoices', ['cid' => $company->id, 'eid' => $entity->id]) }}"
                                                            class="nav-link {{ request()->is('companies/manage/' . $company->id . '/entities/' . $entity->id . '/rejected-invoices') ? 'active' : '' }}"
                                                            data-key="t-level-3.1">Rejected Invoices</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a href="{{ route('entity.paid.invoices', ['cid' => $company->id, 'eid' => $entity->id]) }}"
                                                            class="nav-link {{ request()->is('companies/manage/' . $company->id . '/entities/' . $entity->id . '/paid-invoices') ? 'active' : '' }}"
                                                            data-key="t-level-3.1">Paid Invoices</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                    @endforeach
                                @endif
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('company.roles', $company->id) }}"
                            class="nav-link {{ request()->is('companies/manage/' . $company->id . '/roles', 'companies/manage/' . $company->id . '/roles/*') ? 'active' : '' }}"
                            data-key="t-entities">
                            Roles & Permissions
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#sidebarcustomer{{ str_replace(' ', '_', $company->name) }}" class="nav-link"
                            data-bs-toggle="collapse" role="button" aria-expanded="false"
                            aria-controls="sidebarcustomer{{ str_replace(' ', '_', $company->name) }}"
                            data-key="t-invoice">
                            Customers
                        </a>
                        <div class="collapse menu-dropdown {{ request()->is('companies/manage/' . $company->id . '/customers', 'companies/manage/' . $company->id . '/customers/*') ? 'show' : '' }}"
                            id="sidebarcustomer{{ str_replace(' ', '_', $company->name) }}">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="{{ route('company.customers.create', $company->id) }}"
                                        class="nav-link {{ request()->is('companies/manage/' . $company->id . '/customers/create') ? 'active' : '' }}"
                                        data-key="t-level-3.1">Create Customer</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('company.customers', $company->id) }}"
                                        class="nav-link {{ request()->is('companies/manage/' . $company->id . '/customers') ? 'active' : '' }}"
                                        data-key="t-level-3.1">View Customers</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    @if (isset($company->entities) && !$company->entities->isEmpty())
                        @foreach ($company->entities as $entity)
                            @if (auth()->user()->can("manage-entity-invoice-$company->id-$entity->id"))
                                <li class="nav-item">
                                    <a href="#sidebarinvoice{{ str_replace(' ', '_', $company->name) }}"
                                        class="nav-link" data-bs-toggle="collapse" role="button"
                                        aria-expanded="false"
                                        aria-controls="sidebarinvoice{{ str_replace(' ', '_', $company->name) }}"
                                        data-key="t-invoice">
                                        Invoices
                                    </a>
                                    <div class="collapse menu-dropdown {{ request()->is('companies/manage/' . $company->id . '/invoices', 'companies/manage/' . $company->id . '/invoices/*') ? 'show' : '' }}"
                                        id="sidebarinvoice{{ str_replace(' ', '_', $company->name) }}">
                                        <ul class="nav nav-sm flex-column">
                                            <li class="nav-item">
                                                <a href="{{ route('company.invoices.create', $company->id) }}"
                                                    class="nav-link {{ request()->is('companies/manage/' . $company->id . '/invoices/create') ? 'active' : '' }}"
                                                    data-key="t-level-3.1">Create Invoice</a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="{{ route('company.pending.invoices', $company->id) }}"
                                                    class="nav-link {{ request()->is('companies/manage/' . $company->id . '/invoices/pending-invoices') ? 'active' : '' }}"
                                                    data-key="t-level-3.1">Pending Invoices
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="{{ route('company.approved.invoices', $company->id) }}"
                                                    class="nav-link {{ request()->is('companies/manage/' . $company->id . '/invoices/approved-invoices') ? 'active' : '' }}"
                                                    data-key="t-level-3.1">Approved Invoices</a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="{{ route('company.rejected.invoices', $company->id) }}"
                                                    class="nav-link {{ request()->is('companies/manage/' . $company->id . '/invoices/rejected-invoices') ? 'active' : '' }}"
                                                    data-key="t-level-3.1">Rejected Invoices</a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="{{ route('company.paid.invoices', $company->id) }}"
                                                    class="nav-link {{ request()->is('companies/manage/' . $company->id . '/invoices/paid-invoices') ? 'active' : '' }}"
                                                    data-key="t-level-3.1">Paid Invoices</a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                            @break
                        @endif
                    @endforeach
                @endif
            </ul>
        </div>
    </li>
@endforeach
@endif

@if (isset($joinedcompanies) && !$joinedcompanies->isEmpty())
<li class="menu-title"><span data-key="t-working-at">Working At</span></li>
@foreach ($joinedcompanies as $company)
    <li class="nav-item">
        <a href="#sidebarcompany{{ str_replace(' ', '_', $company->name) }}" class="nav-link"
            data-bs-toggle="collapse" role="button" aria-expanded="false"
            aria-controls="sidebarcompany{{ str_replace(' ', '_', $company->name) }}" data-key="t-company">
            {{ str_replace(' ', '_', $company->name) }}
        </a>
        <div class="collapse menu-dropdown {{ request()->is('companies/manage/' . $company->id, 'companies/manage/' . $company->id . '/*') ? 'show' : '' }}"
            id="sidebarcompany{{ str_replace(' ', '_', $company->name) }}">
            <ul class="nav nav-sm flex-column">
                @can("view-company-$company->id")
                    <li class="nav-item">
                        <a href="{{ route('company.profile', $company->id) }}"
                            class="nav-link {{ request()->is('companies/manage/' . $company->id . '/profile') ? 'active' : '' }}"
                            data-key="t-profile">
                            Profile
                        </a>
                    </li>
                @endcan
                <li class="nav-item">

                    <a href="{{ route('company.employees', $company->id) }}"
                        class="nav-link {{ request()->is('companies/manage/' . $company->id . '/employees', 'companies/manage/' . $company->id . '/employees/*') ? 'active' : '' }}"
                        data-key="t-employees">
                        Employees
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#sidebarentities{{ str_replace(' ', '_', $company->name) }}" class="nav-link"
                        data-bs-toggle="collapse" role="button" aria-expanded="false"
                        aria-controls="sidebarentities{{ str_replace(' ', '_', $company->name) }}"
                        data-key="t-entities">
                        Entities
                    </a>
                    <div class="collapse menu-dropdown {{ request()->is('companies/manage/' . $company->id . '/entities', 'companies/manage/' . $company->id . '/entities/*') ? 'show' : '' }}"
                        id="sidebarentities{{ str_replace(' ', '_', $company->name) }}">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ route('company.entities', $company->id) }}"
                                    class="nav-link {{ request()->is('companies/manage/' . $company->id . '/entities') ? 'active' : '' }}"
                                    data-key="t-level-3.1">View Entities
                                </a>
                            </li>
                            @if (isset($company->entities) && !$company->entities->isEmpty())
                                @foreach ($company->entities as $entity)
                                    @can("view-entity-dashboard-$company->id-$entity->id")
                                        @if ($loop->iteration == 1)
                                            <li class="menu-title"><span data-key="t-owned">Entites</span></li>
                                        @endif
                                        <li class="nav-item">
                                            <a href="#sidebarentities{{ str_replace(' ', '_', $entity->name) }}"
                                                class="nav-link" data-bs-toggle="collapse" role="button"
                                                aria-expanded="false"
                                                aria-controls="sidebarentities{{ str_replace(' ', '_', $entity->name) }}"
                                                data-key="t-entities">
                                                {{ $entity->name }}
                                            </a>
                                            <div class="collapse menu-dropdown {{ request()->is('companies/manage/' . $company->id . '/entities/' . $entity->id . '/*') ? 'show' : '' }}"
                                                id="sidebarentities{{ str_replace(' ', '_', $entity->name) }}">
                                                <ul class="nav nav-sm flex-column">
                                                    @can("view-entity-dashboard-$company->id-$entity->id")
                                                        <li class="nav-item">
                                                            <a href="{{ route('entity.dashboard', ['cid' => $company->id, 'eid' => $entity->id]) }}"
                                                                class="nav-link {{ request()->is('companies/manage/' . $company->id . '/entities/' . $entity->id . '/dashboard') ? 'active' : '' }}"
                                                                data-key="t-level-3.1">Dashboard</a>
                                                        </li>
                                                    @endcan
                                                    @can("view-entity-creditControl-$company->id-$entity->id")
                                                        <li class="nav-item">
                                                            <a href="{{ route('entity.creditControl', ['cid' => $company->id, 'eid' => $entity->id]) }}"
                                                                class="nav-link {{ request()->is('companies/manage/' . $company->id . '/entities/' . $entity->id . '/credit-control') ? 'active' : '' }}"
                                                                data-key="t-level-3.1">Credit Control Dashboard</a>
                                                        </li>
                                                    @endcan
                                                    <li class="nav-item">
                                                        <a href="{{ route('entity.view', ['cid' => $company->id, 'eid' => $entity->id]) }}"
                                                            class="nav-link {{ request()->is('companies/manage/' . $company->id . '/entities/' . $entity->id . '/view') ? 'active' : '' }}"
                                                            data-key="t-level-3.1">Entity Profile</a>
                                                    </li>
                                                    @can("manage-entity-invoice-$company->id-$entity->id")
                                                        <li class="nav-item">
                                                            <a href="{{ route('entity.invoice.create', ['cid' => $company->id, 'eid' => $entity->id]) }}"
                                                                class="nav-link {{ request()->is('companies/manage/' . $company->id . '/entities/' . $entity->id . '/invoices/create') ? 'active' : '' }}"
                                                                data-key="t-level-3.1">Create Invoice</a>
                                                        </li>
                                                    @endcan
                                                    <li class="nav-item">
                                                        <a href="{{ route('entity.pending.invoices', ['cid' => $company->id, 'eid' => $entity->id]) }}"
                                                            class="nav-link {{ request()->is('companies/manage/' . $company->id . '/entities/' . $entity->id . '/pending-invoices') ? 'active' : '' }}"
                                                            data-key="t-level-3.1">Pending Invoices</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a href="{{ route('entity.approved.invoices', ['cid' => $company->id, 'eid' => $entity->id]) }}"
                                                            class="nav-link {{ request()->is('companies/manage/' . $company->id . '/entities/' . $entity->id . '/approved-invoices') ? 'active' : '' }}"
                                                            data-key="t-level-3.1">Approved Invoices</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a href="{{ route('entity.rejected.invoices', ['cid' => $company->id, 'eid' => $entity->id]) }}"
                                                            class="nav-link {{ request()->is('companies/manage/' . $company->id . '/entities/' . $entity->id . '/rejected-invoices') ? 'active' : '' }}"
                                                            data-key="t-level-3.1">Rejected Invoices</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a href="{{ route('entity.paid.invoices', ['cid' => $company->id, 'eid' => $entity->id]) }}"
                                                            class="nav-link {{ request()->is('companies/manage/' . $company->id . '/entities/' . $entity->id . '/paid-invoices') ? 'active' : '' }}"
                                                            data-key="t-level-3.1">Paid Invoices</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                    @endcan
                                @endforeach
                            @endif
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    @can("create-role-$company->id")
                        <a href="{{ route('company.roles', $company->id) }}"
                            class="nav-link {{ request()->is('companies/manage/' . $company->id . '/roles', 'companies/manage/' . $company->id . '/roles/*') ? 'active' : '' }}"
                            data-key="t-entities">
                            Roles & Permissions
                        </a>
                    @endcan
                </li>
                <li class="nav-item">
                    <a href="#sidebarcustomer{{ str_replace(' ', '_', $company->name) }}" class="nav-link"
                        data-bs-toggle="collapse" role="button" aria-expanded="false"
                        aria-controls="sidebarcustomer{{ str_replace(' ', '_', $company->name) }}"
                        data-key="t-invoice">
                        Customers
                    </a>
                    <div class="collapse menu-dropdown {{ request()->is('companies/manage/' . $company->id . '/customers', 'companies/manage/' . $company->id . '/customers/*') ? 'show' : '' }}"
                        id="sidebarcustomer{{ str_replace(' ', '_', $company->name) }}">
                        <ul class="nav nav-sm flex-column">
                            @can("create-customer-$company->id")
                                <li class="nav-item">
                                    <a href="{{ route('company.customers.create', $company->id) }}"
                                        class="nav-link {{ request()->is('companies/manage/' . $company->id . '/customers/create') ? 'active' : '' }}"
                                        data-key="t-level-3.1">Create Customer</a>
                                </li>
                            @endcan
                            <li class="nav-item">
                                <a href="{{ route('company.customers', $company->id) }}"
                                    class="nav-link {{ request()->is('companies/manage/' . $company->id . '/customers') ? 'active' : '' }}"
                                    data-key="t-level-3.1">View Customers</a>
                            </li>
                        </ul>
                    </div>
                </li>
                @if (isset($company->entities) && !$company->entities->isEmpty())
                    @foreach ($company->entities as $entity)
                        @if (auth()->user()->can("manage-entity-invoice-$company->id-$entity->id"))
                            <li class="nav-item">
                                <a href="#sidebarinvoice{{ str_replace(' ', '_', $company->name) }}"
                                    class="nav-link" data-bs-toggle="collapse" role="button"
                                    aria-expanded="false"
                                    aria-controls="sidebarinvoice{{ str_replace(' ', '_', $company->name) }}"
                                    data-key="t-invoice">
                                    Invoices
                                </a>
                                <div class="collapse menu-dropdown {{ request()->is('companies/manage/' . $company->id . '/invoices', 'companies/manage/' . $company->id . '/invoices/*') ? 'show' : '' }}"
                                    id="sidebarinvoice{{ str_replace(' ', '_', $company->name) }}">
                                    <ul class="nav nav-sm flex-column">
                                        {{-- @can("manage-entity-invoice-$company->id-$entity->id") --}}
                                        <li class="nav-item">
                                            <a href="{{ route('company.invoices.create', $company->id) }}"
                                                class="nav-link {{ request()->is('companies/manage/' . $company->id . '/invoices/create') ? 'active' : '' }}"
                                                data-key="t-level-3.1">Create Invoice</a>
                                        </li>
                                        {{-- @endcan --}}
                                        <li class="nav-item">
                                            <a href="{{ route('company.pending.invoices', $company->id) }}"
                                                class="nav-link {{ request()->is('companies/manage/' . $company->id . '/invoices/pending-invoices') ? 'active' : '' }}"
                                                data-key="t-level-3.1">Pending Invoices
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ route('company.approved.invoices', $company->id) }}"
                                                class="nav-link {{ request()->is('companies/manage/' . $company->id . '/invoices/approved-invoices') ? 'active' : '' }}"
                                                data-key="t-level-3.1">Approved Invoices</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ route('company.rejected.invoices', $company->id) }}"
                                                class="nav-link {{ request()->is('companies/manage/' . $company->id . '/invoices/rejected-invoices') ? 'active' : '' }}"
                                                data-key="t-level-3.1">Rejected Invoices</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ route('company.paid.invoices', $company->id) }}"
                                                class="nav-link {{ request()->is('companies/manage/' . $company->id . '/invoices/paid-invoices') ? 'active' : '' }}"
                                                data-key="t-level-3.1">Paid Invoices</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        @break
                    @endif
                @endforeach
            @endif
        </ul>
    </div>
</li>
@endforeach
@endif
