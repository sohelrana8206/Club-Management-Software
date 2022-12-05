<!-- Left Sidebar -->
<aside id="leftsidebar" class="sidebar">
    <div class="menu">
        <ul class="list">
            <li>
                <div class="user-info">
                    <div class="image"><a href="profile.html"><img src="{{url('public/assets/images/profile_av.jpg')}}" alt="User"></a></div>
                    <div class="detail">
                        <h4>{{session('name')}}</h4>
                        <small>{{session('email')}}</small>
                    </div>
                    <a href="events.html" title="Events"><i class="zmdi zmdi-calendar"></i></a>
                    <a href="mail-inbox.html" title="Inbox"><i class="zmdi zmdi-email"></i></a>
                    <a href="contact.html" title="Contact List"><i class="zmdi zmdi-account-box-phone"></i></a>
                    <a href="chat.html" title="Chat App"><i class="zmdi zmdi-comments"></i></a>
                    <a href="sign-in.html" title="Sign out"><i class="zmdi zmdi-power"></i></a>
                </div>
            </li>
            <li class="active"> <a href="{{url('dashboard')}}"><i class="zmdi zmdi-home"></i><span>Dashboard</span></a></li>
            <li> <a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-apps"></i><span>App</span> </a>
                <ul class="ml-menu">
                    <li><a href="{{route('accounts_head.index')}}">Accounts Head</a></li>
                    <li><a href="{{route('club_assets.index')}}">Club Assets</a></li>
                    <li><a href="{{route('student.index')}}">Student List</a></li>
                    <li><a href="{{route('employee.index')}}">Employee List</a></li>
                    <li><a href="{{route('club_members.index')}}">Club Members</a></li>
                    <li><a href="{{route('ec_members.index')}}">EC Members List</a></li>
                    <li><a href="{{route('transactions.index')}}">Transactions List</a></li>
                    <li><a href="{{route('notice.index')}}">Notice List</a></li>
                    <li><a href="{{route('activity.index')}}">Activity List</a></li>
                    <li><a href="{{route('gallery.index')}}">Gallery List</a></li>
                </ul>
            </li>
            <li> <a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-apps"></i><span>Reports</span> </a>
                <ul class="ml-menu">
                    <li><a href="{{url('cashBank_transactions')}}">Cash & Bank Account</a></li>
                    <li><a href="{{url('ledgerBalance')}}">Ledger Accounts</a></li>
                    <li><a href="{{url('incomeExpenditure')}}">Income & Expenditure Account</a></li>
                    <li><a href="{{url('all_members_total_due')}}">All Members Total Due</a></li>
                    <li><a href="{{url('all_students_total_due')}}">All Students Total Due</a></li>
                </ul>
            </li>
        </ul>
    </div>
</aside>