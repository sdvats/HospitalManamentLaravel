<div class="col-md-2">
    <div class='span2 sidebar'>
        <h3>Patients</h3>
        <ul class="nav nav-tabs">
            <li class="{{ Request::path() == 'opd/upcoming-appointments' ? 'active' : '' }}"><a href='{{ url('/opd/upcoming-appointments') }}'>Appointments</a></li>
            <li class="{{ Request::path() == 'opd/recently-added' ? 'active' : '' }}"><a href='{{ url('/opd/recently-added') }}'>Recently Added</a></li>
            <li class="{{ Request::path() == 'opd/recently-visited' ? 'active' : '' }}"><a href='{{ url('/opd/recently-visited') }}'>Recently Visited</a></li>
            <li class="{{ Request::path() == 'opd/patient-arrivals' ? 'active' : '' }}"><a href='{{ url('/opd/patient-arrivals') }}'>Patient Arrivals</a></li>
            <li>By Gender
                <ul class="dropdown-submenu">
                    <li class="{{ Request::path() == 'opd/filter-patient-male' ? 'active' : '' }}"><a href="{{ url('/opd/filter-patient-male') }}">Male</a></li>
                    <li class="{{ Request::path() == 'opd/filter-patient-female' ? 'active' : '' }}"><a href="{{ url('/opd/filter-patient-female') }}">Female</a></li>
                    <li class="{{ Request::path() == 'opd/filter-patient-male-to-female' ? 'active' : '' }}"><a href="{{ url('/opd/filter-patient-male-to-female') }}">Male to Female</a></li>
                    <li class="{{ Request::path() == 'opd/filter-patient-female-to-male' ? 'active' : '' }}"><a href="{{ url('/opd/filter-patient-female-to-male') }}">Female to Male</a></li>
                </ul>
            </li>
            <li>By Region
                <ul class="dropdown-submenu">
                    <li class="{{ Request::path() == 'opd/filter-patient-international' ? 'active' : '' }}"><a href="{{ url('/opd/filter-patient-international') }}">International</a></li>
                </ul>
            </li>

        </ul>
    </div>
</div>