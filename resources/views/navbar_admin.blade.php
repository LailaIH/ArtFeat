<div id="layoutSidenav_nav">
    <nav class="sidenav shadow-right sidenav-light">
        <div class="sidenav-menu">
           {{-- @if(\Illuminate\Support\Facades\Auth::user()->is_admin == '1')--}}
                <div class="nav accordion" id="accordionSidenav">
                    <div class="sidenav-menu-heading">Control Panel Pages</div>

                    <a class="nav-link" href="/home">
                        <div class="nav-link-icon"><i class="fas fa-columns text-gray-200"></i></div>
                        Main Page
                    </a>

                    <a class="nav-link collapsed" href="/!#" data-toggle="collapse" data-target="#collapseDashboardsrr" aria-expanded="false" aria-controls="collapseDashboardsrr">
                        <div class="nav-link-icon"><i
                                class="fas fa-shopping-cart text-gray-200"></i></div>
                        Users & Artists
                        <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapseDashboardsrr" data-parent="#accordionSidenav">
                        <nav class="sidenav-menu-nested nav accordion" id="accordionSidenavPages">
                            <a class="nav-link" href="/non-artists">
                                All Users

                            </a>
                            <a class="nav-link" href="/artists">
                                All Artists

                            </a>

                            <a class="nav-link" href="{{route('users.create')}}">
                               Add A New User

                            </a>

                        </nav>
                    </div>

                    <a class="nav-link collapsed" href="/!#" data-toggle="collapse" data-target="#collapseDashboardsrrr" aria-expanded="false" aria-controls="collapseDashboardsrrr">
                        <div class="nav-link-icon"><i
                                class="fas fa-shopping-cart text-gray-200"></i></div>
                        Sections
                        <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapseDashboardsrrr" data-parent="#accordionSidenav">
                        <nav class="sidenav-menu-nested nav accordion" id="accordionSidenavPages">
                            <a class="nav-link" href="/sections">
                                All Sections

                            </a>
                            <a class="nav-link" href="/sections/create">
                                New Section

                            </a>

                        </nav>
                    </div>

                    <a class="nav-link" href="/orders">
                        <div class="nav-link-icon"><i class="fas fa-users text-gray-200"></i></div>
                        Orders
                    </a>

                    <a class="nav-link collapsed" href="/!#" data-toggle="collapse" data-target="#collapseDashboards213" aria-expanded="false" aria-controls="collapseDashboards213">
                        <div class="nav-link-icon"><i
                                class="fas fa-shopping-cart text-gray-200"></i></div>
                        Invoices
                        <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapseDashboards213" data-parent="#accordionSidenav">
                        <nav class="sidenav-menu-nested nav accordion" id="accordionSidenavPages">
                            <a class="nav-link" href="/invoices/pending">
                                Pending Invoices

                            </a>
                            <a class="nav-link" href="/invoices/completed">
                                Completed Invoices

                            </a>
                            <a class="nav-link" href="/invoices/canceled">
                                Canceled Invoices

                            </a>

                        </nav>
                    </div>



                    <a class="nav-link collapsed" href="/!#" data-toggle="collapse" data-target="#collapseDashboards500" aria-expanded="false" aria-controls="collapseDashboards500">
                        <div class="nav-link-icon"><i
                                class="fas fa-shopping-cart text-gray-200"></i></div>
                        Carts
                        <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapseDashboards500" data-parent="#accordionSidenav">
                        <nav class="sidenav-menu-nested nav accordion" id="accordionSidenavPages">
                            <a class="nav-link" href="/carts">
                                All Carts

                            </a>
                            <a class="nav-link" href="/carts/create">
                                New Cart

                            </a>

                        </nav>
                    </div>








                    <a class="nav-link collapsed" href="/!#" data-toggle="collapse" data-target="#collapseDashboards21" aria-expanded="false" aria-controls="collapseDashboards21">
                        <div class="nav-link-icon"><i
                                class="fas fa-shopping-cart text-gray-200"></i></div>
                        Podcasts
                        <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapseDashboards21" data-parent="#accordionSidenav">
                        <nav class="sidenav-menu-nested nav accordion" id="accordionSidenavPages">
                            <a class="nav-link" href="/podcasts">
                                All Podcasts

                            </a>
                            <a class="nav-link" href="/podcasts/create">
                                New Podcast

                            </a>

                        </nav>
                    </div>

                    <a class="nav-link collapsed" href="/!#" data-toggle="collapse" data-target="#collapseDashboards212" aria-expanded="false" aria-controls="collapseDashboards212">
                        <div class="nav-link-icon"><i
                                class="fas fa-shopping-cart text-gray-200"></i></div>
                        Auctions
                        <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapseDashboards212" data-parent="#accordionSidenav">
                        <nav class="sidenav-menu-nested nav accordion" id="accordionSidenavPages">
                            <a class="nav-link" href="/auctions">
                                All Auctions

                            </a>
                         



                            <a href="{{route('auctions.create')}}" class="nav-link">
                                New Auction
                            </a>

                        </nav>
                    </div>


                    <a class="nav-link" href="/tickets">
                        <div class="nav-link-icon"><i class="fas fa-users text-gray-200"></i></div>
                        Support Tickets
                    </a>

                    <a class="nav-link collapsed" href="/!#" data-toggle="collapse" data-target="#collapseDashboards2" aria-expanded="false" aria-controls="collapseDashboards2">
                        <div class="nav-link-icon"><i
                                class="fas fa-shopping-cart text-gray-200"></i></div>
                        Products
                        <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapseDashboards2" data-parent="#accordionSidenav">
                        <nav class="sidenav-menu-nested nav accordion" id="accordionSidenavPages">
                            <a class="nav-link" href="/products">
                                All Products

                            </a>
                            <a class="nav-link" href="/products/create">
                                New Product

                            </a>

                        </nav>
                    </div>



                    <a class="nav-link collapsed" href="/!#" data-toggle="collapse" data-target="#collapseDashboards" aria-expanded="false" aria-controls="collapseDashboards">
                        <div class="nav-link-icon"><i
                                class="fas fa-shopping-cart text-gray-200"></i></div>
                        Subscriptions
                        <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapseDashboards" data-parent="#accordionSidenav">
                        <nav class="sidenav-menu-nested nav accordion" id="accordionSidenavPages">
                            <a class="nav-link" href="/subscriptions">
                                All Subscriptions

                            </a>
                            <a class="nav-link" href="/subscriptions/create">
                                New Subscription

                            </a>

                        </nav>
                    </div>

                    <a class="nav-link collapsed" href="/!#" data-toggle="collapse" data-target="#collapseDashboards55" aria-expanded="false" aria-controls="collapseDashboards55">
                        <div class="nav-link-icon"><i
                                class="fas fa-shopping-cart text-gray-200"></i></div>
                        Options
                        <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapseDashboards55" data-parent="#accordionSidenav">
                        <nav class="sidenav-menu-nested nav accordion" id="accordionSidenavPages">
                            <a class="nav-link" href="{{route('options.index')}}">
                                All Options

                            </a>
                            <a class="nav-link" href="/options/create">
                                New Option

                            </a>

                        </nav>
                    </div>






                    <a class="nav-link collapsed" href="/!#" data-toggle="collapse" data-target="#collapseDashboards3" aria-expanded="false" aria-controls="collapseDashboards3">
                        <div class="nav-link-icon"><i
                                class="fas fa-shopping-cart text-gray-200"></i></div>
                        Points Level
                        <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapseDashboards3" data-parent="#accordionSidenav">
                        <nav class="sidenav-menu-nested nav accordion" id="accordionSidenavPages">
                            <a class="nav-link" href="/points">
                                All Points Levels

                            </a>
                            <a class="nav-link" href="/points/create">
                                New Point Level

                            </a>

                        </nav>
                    </div>



<!--                    <a class="nav-link collapsed" href="/!#" data-toggle="collapse" data-target="#collapseDashboards4" aria-expanded="false" aria-controls="collapseDashboards4">
                        <div class="nav-link-icon"><i
                                class="fas fa-shopping-cart text-gray-200"></i></div>
                        SubCategories
                        <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapseDashboards4" data-parent="#accordionSidenav">
                        <nav class="sidenav-menu-nested nav accordion" id="accordionSidenavPages">
                            <a class="nav-link" href="/subcategories">
                                All SubCategories

                            </a>
                            <a class="nav-link" href="/subcategories/create">
                                New SubCategory

                            </a>

                        </nav>
                    </div>-->

<!--                    <a class="nav-link collapsed" href="/!#" data-toggle="collapse" data-target="#collapseDashboards5" aria-expanded="false" aria-controls="collapseDashboards5">
                        <div class="nav-link-icon"><i
                                class="fas fa-shopping-cart text-gray-200"></i></div>
                        SubSubCategories
                        <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapseDashboards5" data-parent="#accordionSidenav">
                        <nav class="sidenav-menu-nested nav accordion" id="accordionSidenavPages">
                            <a class="nav-link" href="/subsubcategories">
                                All SubSubCategories

                            </a>
                            <a class="nav-link" href="/subsubcategories/create">
                                New SubSubCategory

                            </a>

                        </nav>
                    </div>-->

<!--                    <a class="nav-link collapsed" href="/!#" data-toggle="collapse" data-target="#collapseDashboards6" aria-expanded="false" aria-controls="collapseDashboards6">
                        <div class="nav-link-icon"><i
                                class="fas fa-shopping-cart text-gray-200"></i></div>
                        Employees
                        <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapseDashboards6" data-parent="#accordionSidenav">
                        <nav class="sidenav-menu-nested nav accordion" id="accordionSidenavPages">
                            <a class="nav-link" href="/employees">
                                All Employees

                            </a>
                            <a class="nav-link" href="/employees/create">
                                New Employee

                            </a>

                        </nav>
                    </div>-->

                    <a class="nav-link collapsed" href="/!#" data-toggle="collapse" data-target="#collapseDashboards7" aria-expanded="false" aria-controls="collapseDashboards7">
                        <div class="nav-link-icon"><i
                                class="fas fa-shopping-cart text-gray-200"></i></div>
                        Job Titles
                        <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapseDashboards7" data-parent="#accordionSidenav">
                        <nav class="sidenav-menu-nested nav accordion" id="accordionSidenavPages">
                            <a class="nav-link" href="/job_titles">
                                All Job Titles

                            </a>
                            <a class="nav-link" href="/job_titles/create">
                                New Job Title

                            </a>

                        </nav>
                    </div>

<!--                    <a class="nav-link collapsed" href="/!#" data-toggle="collapse" data-target="#collapseDashboards8" aria-expanded="false" aria-controls="collapseDashboards8">
                        <div class="nav-link-icon"><i
                                class="fas fa-shopping-cart text-gray-200"></i></div>
                        Brands
                        <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapseDashboards8" data-parent="#accordionSidenav">
                        <nav class="sidenav-menu-nested nav accordion" id="accordionSidenavPages">
                            <a class="nav-link" href="/brands">
                                All Brands
                            </a>
                            <a class="nav-link" href="/brands/create">
                                New Brand

                            </a>

                        </nav>
                    </div>-->




                    <!--                    <a class="nav-link" href="/admin/signals">
                                            <div class="nav-link-icon"><i class="fas fa-cog text-gray-200"></i></div>
                                            All Signals
                                        </a>

                                        <a class="nav-link" href="/admin/options">
                                            <div class="nav-link-icon"><i class="fas fa-cog text-gray-200"></i></div>
                                            All News
                                        </a>-->

                   {{-- <a class="nav-link" href="/admin/appusers">
                        <div class="nav-link-icon"><i class="fas fa-users text-gray-200"></i></div>
                        Categories
                    </a>--}}


                   {{-- <a class="nav-link" href="/admin/users">
                        <div class="nav-link-icon"><i class="fas fa-users text-gray-200"></i></div>
                        Sub-Categories
                    </a>--}}

                    <!--                    <a class="nav-link" href="/admin/porders">
                                            <div class="nav-link-icon"><i class="fas fa-shopping-cart text-gray-200"></i></div>
                                            Panel Orders
                                        </a>-->

                    <!--                    <a class="nav-link" href="/admin/prepaidorders">
                                            <div class="nav-link-icon"><i class="fas fa-shopping-cart text-gray-200 "></i></div>
                                            Prepaid Forge Orders
                                        </a>-->

                    <!--                    <a class="nav-link" href="/admin/tickets">
                                            <div class="nav-link-icon"><i class="fas fa-ticket-alt text-gray-200 "></i></div>
                                            Tickets
                                        </a>-->

                    <!--                    <a class="nav-link" href="/admin/payments">
                                            <div class="nav-link-icon"><i class="fas fa-file-invoice-dollar text-gray-200 mr-1"></i></div>
                                            Payments
                                        </a>-->

                    <!--                    <a class="nav-link" href="/admin/invoices">
                                            <div class="nav-link-icon"><i class="fas fa-file-invoice text-gray-200 mr-1"></i></div>
                                            Invoices
                                        </a>-->

                   {{-- <a class="nav-link" href="/admin/invoices">
                        <div class="nav-link-icon"><i class="fas fa-file-invoice text-gray-200 mr-1"></i></div>
                       Sub-Sub-Categories
                    </a>
--}}


                  {{--  <a class="nav-link" href="/admin/invoices">
                        <div class="nav-link-icon"><i class="fas fa-file-invoice text-gray-200 mr-1"></i></div>
                        Employees
                    </a>--}}

                  {{--  <a class="nav-link" href="/admin/invoices">
                        <div class="nav-link-icon"><i class="fas fa-file-invoice text-gray-200 mr-1"></i></div>
                        Job Title
                    </a>--}}

                    {{--<a class="nav-link" href="/admin/invoices">
                        <div class="nav-link-icon"><i class="fas fa-file-invoice text-gray-200 mr-1"></i></div>
                        Panel Users
                    </a>--}}





                </div>

          {{--  @endif--}}

        </div>
        <div class="sidenav-footer">
            <div class="sidenav-footer-content">
                <div class="sidenav-footer-subtitle">admin name</div>
                <div class="sidenav-footer-title">{{ Auth::user()->name }}{{--{{\Illuminate\Support\Facades\Auth::user()->name}}--}}</div>
            </div>
        </div>
    </nav>
</div>
