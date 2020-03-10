@extends('layouts.layout')
@section('breadcrumb')
<section class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb">
                        <ul>
                            <li>
                                <a href="index.html">Home</a>
                            </li>
                            <li>
                                <a href="dashboard.html">Dashboard</a>
                            </li>
                            <li class="active">
                                <a href="#">Upload Item</a>
                            </li>
                        </ul>
                    </div>
                    <h1 class="page-title">Upload Item</h1>
                </div>
                <!-- end /.col-md-12 -->
            </div>
            <!-- end /.row -->
        </div>
        <!-- end /.container -->
    </section>
@endsection
@section('content')

  <!--================================
            START DASHBOARD AREA
    =================================-->
    <section class="dashboard-area">
        <div class="dashboard_menu_area">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <ul class="dashboard_menu">
                            <li>
                                <a href="dashboard.html">
                                    <span class="lnr lnr-home"></span>Dashboard</a>
                            </li>
                            <li>
                                <a href="dashboard-setting.html">
                                    <span class="lnr lnr-cog"></span>Setting</a>
                            </li>
                            <li>
                                <a href="dashboard-purchase.html">
                                    <span class="lnr lnr-cart"></span>Purchase</a>
                            </li>
                            <li>
                                <a href="dashboard-add-credit.html">
                                    <span class="lnr lnr-dice"></span>Add Credits</a>
                            </li>
                            <li>
                                <a href="dashboard-statement.html">
                                    <span class="lnr lnr-chart-bars"></span>Statements</a>
                            </li>
                            <li class="active">
                                <a href="dashboard-upload.html">
                                    <span class="lnr lnr-upload"></span>Upload Items</a>
                            </li>
                            <li>
                                <a href="dashboard-manage-item.html">
                                    <span class="lnr lnr-briefcase"></span>Manage Items</a>
                            </li>
                            <li>
                                <a href="dashboard-withdrawal.html">
                                    <span class="lnr lnr-briefcase"></span>Withdrawals</a>
                            </li>
                        </ul>
                        <!-- end /.dashboard_menu -->
                    </div>
                    <!-- end /.col-md-12 -->
                </div>
                <!-- end /.row -->
            </div>
            <!-- end /.container -->
        </div>
        <!-- end /.dashboard_menu_area -->

        <div class="dashboard_contents">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="dashboard_title_area">
                            <div class="pull-left">
                                <div class="dashboard__title">
                                    <h3>Upload Your Item</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end /.col-md-12 -->
                </div>
                <!-- end /.row -->
                
                <div class="row">
                    <div class="col-lg-8 col-md-7">
                        <create-product :categories="{{$categories}}" :tags="{{ $tags }}" inline-template>
                            
                                <form action="{{ route('products.store')}}" method="POST">
                                @csrf
                                    <div class="upload_modules">
                                        <div class="modules__title">
                                            <h3>Item Name & Description</h3>
                                        </div>
                                        <!-- end /.module_title -->

                                        <div class="modules__content">
                                        

                                            <div class="form-group">
                                                <label for="product_name">Product Name
                                                    <span>(Max 100 characters)</span>
                                                </label>
                                                <input type="text" id="product_name" name="name" class="text_field" placeholder="Enter your product name here...">
                                            </div>

                                            <div class="form-group no-margin">
                                                <p class="label">Product Description</p>
                                                <textarea class="form-control" id="summary-ckeditor" name="description"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="category">Select Category</label>
                                               
                                                    <multiselect
                                                        v-model="selectedCategory"
                                                        :multiple="true"
                                                        :options="Category"
                                                       
                                                        placeholder="Please select the Categories">
                                                      </multiselect>
                                                     <input type="hidden" :value="selectedCategory"  name="categories">
                                                
                                            </div>
                                        </div>
                                        <!-- end /.modules__content -->
                                    
                                    
                                    </div>
                                    <!-- end /.upload_modules -->

                                    <div class="upload_modules module--upload">
                                        <div class="modules__title">
                                            <h3>Upload Files</h3>
                                        </div>
                                        <!-- end /.module_title -->

                                        <div class="modules__content">
                                            <div class="form-group">
                                                <div class="upload_wrapper">
                                                    <p>Upload Thumbnail
                                                        <span>(JPEG or PNG 100x100px)</span>
                                                    </p>

                                                
                                                
                                                    <div class="input-group" id="app">

                                                            <span class="btn btn--round btn--sm">
                                                                <a id="limage1" data-input="image1" data-preview="holder" class="btn btn-primary">
                                                                <i class="fa fa-picture-o"></i> Choose
                                                                </a>
                                                            </span>
                                                            <input id="image1" class="form-control" type="text" name="image" >
                                                            </div>
                                                            <img id="holder" style="margin-top:15px;max-height:100px;">

                                                    <!-- end /.progress_wrapper -->

                                                
                                                </div>
                                                <!-- end /.upload_wrapper -->
                                            </div>
                                            <!-- end /.form-group -->

                                            <div class="form-group">
                                                <div class="upload_wrapper">
                                                    <p>Upload Images
                                                        <span>(JPEG or PNG 100x100px)</span>
                                                    </p>

                                                
                                                
                                                    <div class="input-group" id="app">

                                                            <span class="btn btn--round btn--sm">
                                                                <a id="limage2" data-input="image2" data-preview="holder" class="btn btn-primary">
                                                                <i class="fa fa-picture-o"></i> Choose
                                                                </a>
                                                            </span>
                                                            <input id="image2" class="form-control" type="text" name="images">
                                                            </div>
                                                            <img id="holder" style="margin-top:15px;max-height:100px;">

                                                    <!-- end /.progress_wrapper -->

                                                
                                                </div>
                                                <!-- end /.upload_wrapper -->
                                            </div>

                                            <div class="form-group">
                                                <div class="upload_wrapper">
                                                    <p>Upload Main File
                                                        <span>(ZIP - All files)</span>
                                                    </p>

                                                    <div class="input-group" id="app">

                                                            <span class="btn btn--round btn--sm">
                                                                <a id="lfile1" data-input="fileinput1" data-preview="holder" class="btn btn-primary">
                                                                <i class="fa fa-picture-o"></i> Choose
                                                                </a>
                                                            </span>
                                                            <input id="fileinput1" class="form-control" type="text" name="files">
                                                            </div>
                                                    <!-- end /.custom_upload -->
                                                </div>
                                                
                                            </div>
                                            <!-- end /.form-group -->

                                        
                                        
                                        </div>
                                    </div>
                                    <!-- end /.upload_modules --> 

                                    <div class="upload_modules">
                                        <div class="modules__title">
                                            <h3>Others Information</h3>
                                        </div>
                                        <!-- end /.module_title -->

                                        <div class="modules__content">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="selected">Files Included</label>
                                                       <multiselect
                                                        v-model="selectedFiles"
                                                        :multiple="true"
                                                        :options="files"
                                                        placeholder="Please select the Files Included">
                                                      </multiselect>
                                                      <input type="hidden" :value="selectedFiles" name="files_included">
                                                    </div>
                                                    <!-- end /.form-group -->
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="browsers">Compatible Browsers</label>
                                                       <multiselect
                                                        v-model="selectedbrowser"
                                                        :multiple="true"
                                                        :options="browser"
                                                        
                                                        placeholder="Please select the Browsers">
                                                      </multiselect>
                                                        <input type="hidden" :value="selectedbrowser" name="browsers">
                                                    </div>
                                                    <!-- end /.form-group -->
                                                </div>
                                                <!-- end /.col-md-6 -->
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="columns">Tags</label>
                                                       <multiselect
                                                        v-model="selectedTags"
                                                        :multiple="true"
                                                        trackBy="name"
                                                        :options="optionTags"
                                                       
                                                        name="tags"
                                                        placeholder="Please select the Tags">
                                                      </multiselect>
                                                       <input type="hidden" :value="selectedTags"  name="tags">
                                                     
                                                    </div>
                                                </div>
                                                <!-- end /.col-md-6 -->

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="dimension">Item Dimensions</label>
                                                        <input type="text" id="dimension" class="text_field" placeholder="Ex: 1920x6000." name="dimension">
                                                    </div>
                                                </div>
                                                <!-- end /.col-md-6 -->
                                            </div>
                                            <!-- end /.row -->


                                            <div class="form-group">
                                                <label for="soft">Minimum Software Version</label>
                                                <div class="select-wrap select-wrap2">
                                                    <select name="version" id="soft" class="text_field">
                                                        <option value="">Choose version</option>
                                                        <option value="4">WordPress 4</option>
                                                        <option value="4.1">WordPress 4.1.*</option>
                                                        <option value="4.2">WordPress 4.2.*</option>
                                                        <option value="4.3">WordPress 4.3.*</option>
                                                        <option value="4.4">WordPress 4.4.*</option>
                                                    </select>
                                                    <span class="lnr lnr-chevron-down"></span>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group radio-group">
                                                        <p class="label">High Resolution</p>
                                                        <div class="custom-radio">
                                                            <input type="radio" id="yes" class="" name="high_res">
                                                            <label for="yes">
                                                                <span class="circle"></span>Yes</label>
                                                        </div>

                                                        <div class="custom-radio">
                                                            <input type="radio" id="no" class="" name="high_res">
                                                            <label for="no">
                                                                <span class="circle"></span>no</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- end /.col-md-6 -->

                                                <div class="col-md-6">
                                                    <div class="form-group radio-group">
                                                        <p class="label">Retina Ready</p>
                                                        <div class="custom-radio">
                                                            <input type="radio" id="ryes" class="" name="retina" value="yes">
                                                            <label for="ryes">
                                                                <span class="circle"></span>Yes</label>
                                                        </div>

                                                        <div class="custom-radio">
                                                            <input type="radio" id="rno" class="" name="no">
                                                            <label for="rno">
                                                                <span class="circle"></span>no</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- end /.col-md-6 -->
                                            </div>
                                            <!-- end /.row -->

                                          
                                        </div>
                                        <!-- end /.upload_modules -->
                                    </div>
                                    <!-- end /.upload_modules -->

                                    <div class="upload_modules with--addons">
                                        <div class="modules__title">
                                            <h3>Others Information</h3>
                                        </div>
                                        <!-- end /.module_title -->

                                        <div class="modules__content">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="rlicense">Regular License</label>
                                                        <div class="input-group">
                                                            <span class="input-group-addon">$</span>
                                                            <input type="text" id="rlicense" class="text_field" placeholder="00.00" name="regularlicense" v-model="rlicense" @blur="checkanddisableUserLicense($event)">
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- end /.col-md-6 -->

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="exlicense">Extended License</label>
                                                        <div class="input-group">
                                                            <span class="input-group-addon">$</span>
                                                            <input type="text" id="exlicense" class="text_field" placeholder="00.00" name="extendlicense" v-model="elicense" @blur="checkanddisableUserLicense($event)">
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- end /.col-md-6 -->

                                            </div>
                                            <!-- end /.row -->
                                            
                                            <div class="row" v-if="enabledUserLicense">
                                                <div class="or" class="col-md-12"></div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="single_use">Single User License</label>
                                                        <div class="input-group">
                                                            <span class="input-group-addon">$</span>
                                                            <input type="text" id="single_use" class="text_field" placeholder="00.00" name="SingleSiteLicense">

                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="double_use">2 User License</label>
                                                        <div class="input-group">
                                                            <span class="input-group-addon">$</span>
                                                            <input type="text" id="double_use" class="text_field" placeholder="00.00" name="2SiteLicense">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="multi_user">Multi User License</label>
                                                        <div class="input-group">
                                                            <span class="input-group-addon">$</span>
                                                            <input type="text" id="multi_user" class="text_field" placeholder="00.00" name="MultipleLicense">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- end /.row -->
                                        </div>
                                        <!-- end /.modules__content -->
                                    </div>
                                    <!-- end /.upload_modules -->

                                    <!-- submit button -->
                                    <button type="submit" class="btn btn--round btn--fullwidth btn--lg">Submit Your Item for Review</button>
                                </form>
                            
                            </create-product>
                    </div>
                    <!-- end /.col-md-8 -->

                    <div class="col-lg-4 col-md-5">
                        <aside class="sidebar upload_sidebar">
                            <div class="sidebar-card">
                                <div class="card-title">
                                    <h3>Quick Upload Rules</h3>
                                </div>

                                <div class="card_content">
                                    <div class="card_info">
                                        <h4>Image Upload</h4>
                                        <p>Nunc placerat mi id nisi interdum mollis. Praesent there pharetra, justo ut sceleris
                                            que the mattis interdum.</p>
                                    </div>

                                    <div class="card_info">
                                        <h4>File Upload</h4>
                                        <p>Nunc placerat mi id nisi interdum mollis. Praesent there pharetra, justo ut sceleris
                                            que the mattis interdum.</p>
                                    </div>

                                    <div class="card_info">
                                        <h4>Vector Upload</h4>
                                        <p>Nunc placerat mi id nisi interdum mollis. Praesent there pharetra, justo ut sceleris
                                            que the mattis interdum.</p>
                                    </div>
                                </div>
                            </div>
                            <!-- end /.sidebar-card -->

                            <div class="sidebar-card">
                                <div class="card-title">
                                    <h3>Trouble Uploading?</h3>
                                </div>

                                <div class="card_content">
                                    <p>Nunc placerat mi id nisi interdum mollis. Praesent pharetra, justo ut sceler isque the
                                        mattis, leo quam aliquet congue.</p>
                                    <ul>
                                        <li>Consectetur elit, sed do eiusmod the labore et dolore magna.</li>
                                        <li>Consectetur elit, sed do eiusmod the labore et dolore magna.</li>
                                        <li>Consectetur elit, sed do eiusmod the labore et dolore magna.</li>
                                        <li>Consectetur elit, sed do eiusmod the</li>
                                    </ul>
                                </div>
                            </div>
                            <!-- end /.sidebar-card -->

                            <div class="sidebar-card">
                                <div class="card-title">
                                    <h3>More Upload Info</h3>
                                </div>

                                <div class="card_content">
                                    <p>Nunc placerat mi id nisi interdum mollis. Praesent pharetra, justo ut sceler isque the
                                        mattis, leo quam aliquet congue.</p>
                                    <ul>
                                        <li>Consectetur elit, sed do eiusmod the labore et dolore magna.</li>
                                        <li>Consectetur elit, sed do eiusmod the labore et dolore magna.</li>
                                        <li>Consectetur elit, sed do eiusmod the labore et dolore magna.</li>
                                        <li>Consectetur elit, sed do eiusmod the</li>
                                    </ul>
                                </div>
                            </div>
                            <!-- end /.sidebar-card -->
                        </aside>
                        <!-- end /.sidebar -->
                    </div>
                    <!-- end /.col-md-4 -->
                </div>
                <!-- end /.row -->
            </div>
            <!-- end /.container -->
        </div>
        <!-- end /.dashboard_menu_area -->
    </section>
    <!--================================
            END DASHBOARD AREA
    =================================-->

@endsection

@section('extrajs')
<script src="{{ asset('/js/app.js')}}"></script>

  <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
  <script src="{{ asset('vendor/laravel-filemanager/js/stand-alone-button.js') }}"></script>
      
  <script>
  var options = {
    filebrowserImageBrowseUrl: '/filemanager?type=Images',
    filebrowserImageUploadUrl: '/filemanager/upload?type=Images&_token=',
    filebrowserBrowseUrl: '/filemanager?type=Files',
    filebrowserUploadUrl: '/filemanager/upload?type=Files&_token='
  };

    CKEDITOR.replace( 'summary-ckeditor', options );

    //file manager
     var route_prefix = "filemanager";
     $('#limage1').filemanager('image');
      $('#limage2').filemanager('image');
    // fileinput1
     $('#lfile1').filemanager('Files');
    // CKEDITOR.config.height = 300;
    // CKEDITOR.config.width = 600;
    // CKEDITOR.config.extraPlugins = "Youtube";
</script>
@endsection