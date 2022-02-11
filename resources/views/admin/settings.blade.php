@extends('admin.layout')
@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-edit"></i> Налаштування сайту</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item"><a href="#">Налаштування сайту</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="tile">
                <h3 class="tile-title">Animated Toggle Button</h3>
                <div class="row">
                    <div class="col-md-6">
                        <p><b>Toggle Button</b></p>
                        <div class="toggle">
                            <label>
                                <input type="checkbox"><span class="button-indecator"></span>
                            </label>
                        </div>
                        <div class="toggle lg">
                            <label>
                                <input type="checkbox"><span class="button-indecator"></span>
                            </label>
                        </div>
                        <h5>Disabled state</h5>
                        <div class="toggle">
                            <label>
                                <input type="checkbox" disabled=""><span class="button-indecator"></span>
                            </label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <p><b>Fliping Toggle Button</b></p>
                        <div class="toggle-flip">
                            <label>
                                <input type="checkbox"><span class="flip-indecator" data-toggle-on="ON" data-toggle-off="OFF"></span>
                            </label>
                        </div>
                        <h5>Disabled state</h5>
                        <div class="toggle-flip">
                            <label>
                                <input type="checkbox" disabled=""><span class="flip-indecator" data-toggle-on="ON" data-toggle-off="OFF"></span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="col-md-6">
            <div class="tile">
                <div class="tile-title-w-btn">
                    <h3 class="title">Select2</h3>
                    <p><a class="btn btn-primary icon-btn" href="https://select2.github.io/examples.html" target="_blank"><i class="fa fa-file"></i>Docs</a></p>
                </div>
                <div class="tile-body">
                    <p>This plugin can be used to convert select element into advanced componant.</p>
                    <h4>Demo</h4>
                    <select class="form-control" id="demoSelect" multiple="">
                        <optgroup label="Select Cities">
                            <option>Ahmedabad</option>
                            <option>Surat</option>
                            <option>Vadodara</option>
                            <option>Rajkot</option>
                            <option>Bhavnagar</option>
                            <option>Jamnagar</option>
                            <option>Gandhinagar</option>
                            <option>Nadiad</option>
                            <option>Morvi</option>
                            <option>Surendranagar</option>
                            <option>Junagadh</option>
                            <option>Gandhidham</option>
                            <option>Veraval</option>
                            <option>Ghatlodiya</option>
                            <option>Bharuch</option>
                            <option>Anand</option>
                            <option>Porbandar</option>
                            <option>Godhra</option>
                            <option>Navsari</option>
                            <option>Dahod</option>
                            <option>Botad</option>
                            <option>Kapadwanj</option>
                        </optgroup>
                    </select>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="tile">
                <div class="tile-title-w-btn">
                    <h3 class="title">Date Picker</h3>
                    <p><a class="btn btn-primary icon-btn" href="http://bootstrap-datepicker.readthedocs.org/en/stable/options.html" target="_blank"><i class="fa fa-file"></i>Docs</a></p>
                </div>
                <div class="tile-body">
                    <p>This plugin can be used to let the user select the date in a convinient way.</p>
                    <h4>Demo</h4>
                    <input class="form-control" id="demoDate" type="text" placeholder="Select Date">
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="tile">
                <div class="tile-title-w-btn">
                    <h3 class="title">Dropzone</h3>
                    <p><a class="btn btn-primary icon-btn" href="https://gitlab.com/meno/dropzone" target="_blank"><i class="fa fa-file"></i>Docs</a></p>
                </div>
                <div class="tile-body">
                    <p>This plugin can be used to let the user Drag and Drop files for upload in a easy way.</p>
                    <h4>Demo</h4>
                    <form class="text-center dropzone" method="POST" enctype="multipart/form-data" action="/file-upload">
                        <div class="dz-message">Drop files here or click to upload<br><small class="text-info">(This is just a dropzone demo. Selected files are not actually uploaded.)</small></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
