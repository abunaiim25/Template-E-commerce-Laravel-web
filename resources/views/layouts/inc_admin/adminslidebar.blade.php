 <!-- ########## START: LEFT PANEL ########## -->
 <div class="sl-logo"><a href=""><i class="icon ion-android-star-outline"></i> starlight</a></div>
 <div class="sl-sideleft">

     <div class="input-group input-group-search">
         <input type="search" name="search" class="form-control" placeholder="Search">
         <span class="input-group-btn">
             <button class="btn"><i class="fa fa-search"></i></button>
         </span><!-- input-group-btn -->
     </div><!-- input-group -->


     <div class="sl-sideleft-menu">
         <a href="{{ url('dashboard') }}" class="sl-menu-link @yield('dashboard')">{{-- for active--@yield('dashboard') --}}
             <div class="sl-menu-item">
                 <i class="fas fa-home"></i>
                 <span class="menu-item-label">Dashboard</span>
             </div><!-- menu-item -->
         </a><!-- sl-menu-link -->

         <a href="{{ url('/') }}" target="_blank" class="sl-menu-link ">
             <div class="sl-menu-item">
                <i class="fas fa-eye"></i>
                 <span class="menu-item-label">Visit Site</span>
             </div><!-- menu-item -->
         </a><!-- sl-menu-link -->

         <a href="{{ url('admin/main') }}" class="sl-menu-link @yield('main')">
            <div class="sl-menu-item">
                <i class="menu-item-icon icon ion-ios-home-outline tx-22"></i>
                <span class="menu-item-label">Main</span>
            </div><!-- menu-item -->
        </a><!-- sl-menu-link -->

         <a href="{{ url('admin/category') }}" class="sl-menu-link @yield('category')">
             <div class="sl-menu-item">
                 <i class="menu-item-icon icon ion-ios-home-outline tx-22"></i>
                 <span class="menu-item-label">Category</span>
             </div><!-- menu-item -->
         </a><!-- sl-menu-link -->

         <a href="{{ url('admin/brand') }}" class="sl-menu-link @yield('brand')">
             <div class="sl-menu-item">
                 <i class="menu-item-icon icon ion-ios-home-outline tx-22"></i>
                 <span class="menu-item-label">Brand</span>
             </div><!-- menu-item -->
         </a><!-- sl-menu-link -->


         <a href="#" class="sl-menu-link @yield('products')">
             <div class="sl-menu-item">
                 <i class="menu-item-icon ion-ios-pie-outline tx-20"></i>
                 <span class="menu-item-label">Products</span>
                 <i class="menu-item-arrow fa fa-angle-down"></i>
             </div><!-- menu-item -->
         </a><!-- sl-menu-link -->
         <ul class="sl-menu-sub nav flex-column">
             <li class="nav-item"><a href="{{ url('admin/products/add') }}"
                     class="nav-link @yield('add-products')">Add Products</a></li>
             <li class="nav-item"><a href="{{ url('admin/products/manage') }}"
                     class="nav-link @yield('manage-products')">Manage Product</a></li>
         </ul>

         <a href="{{ url('admin/coupon') }}" class="sl-menu-link @yield('coupon')">
             <div class="sl-menu-item">
                 <i class="menu-item-icon icon ion-ios-home-outline tx-22"></i>
                 <span class="menu-item-label">Coupon</span>
             </div><!-- menu-item -->
         </a><!-- sl-menu-link -->

         <a href="{{ url('admin/orders') }}" class="sl-menu-link @yield('orders')">
             <div class="sl-menu-item">
                 <i class="menu-item-icon icon ion-ios-home-outline tx-22"></i>
                 <span class="menu-item-label">Orders</span>
             </div><!-- menu-item -->
         </a><!-- sl-menu-link -->


         </ul>
     </div><!-- sl-sideleft-menu -->

     <br>
 </div><!-- sl-sideleft -->
