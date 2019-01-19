<div class="col-md-2">
    <div class='span2 sidebar'>
        <h3>Patients</h3>
        <ul class="nav nav-tabs">
            <li class="{{ Request::path() == 'ipd/recent-admissions' ? 'active' : '' }}"><a href='{{ url('/ipd/recent-admissions') }}'>Recent Admissions</a></li>
            <li class="{{ Request::path() == 'ipd/recent-discharges' ? 'active' : '' }}"><a href='{{ url('/ipd/recent-discharges') }}'>Recent Discharges</a></li>
            <li class="{{ Request::path() == 'ipd/pending-discharge' ? 'active' : '' }}"><a href='{{ url('/ipd/pending-discharge') }}'>Pending Discharge</a></li>
        </ul>
    </div>
</div>