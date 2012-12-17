<!--<div id="style-switcher">
    <i class="icon-arrow-left icon-white"></i>
    <span>Style:</span>
    <a href="#grey" style="background-color: #555555;border-color: #aaaaaa;"></a>
    <a href="#blue" style="background-color: #2D2F57;"></a>
    <a href="#red" style="background-color: #673232;"></a>
</div> -->

<div id="content">
    <div id="content-header">
        <h1>Settings</h1>
        <!--<div class="btn-group">
            <a class="btn btn-large tip-bottom" title="Manage Files"><i class="icon-file"></i></a>
            <a class="btn btn-large tip-bottom" title="Manage Users"><i class="icon-user"></i></a>
            <a class="btn btn-large tip-bottom" title="Manage Comments"><i class="icon-comment"></i><span class="label label-important">5</span></a>
            <a class="btn btn-large tip-bottom" title="Manage Orders"><i class="icon-shopping-cart"></i></a>
        </div> -->
    </div>
    <div id="breadcrumb">
        <a href="index.html" title="Go to Dashboard" class="tip-bottom"><i class="icon-home"></i>Home</a>
        <a href="#" class="tip-bottom"><?php if($this->uri->segment(1) != 'home' ) {  echo  $title;} ?></a>
    </div>
