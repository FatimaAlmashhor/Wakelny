@extends('client.master_layout')
@section('content')
<style>




.pager-nav {
    margin: 16px 0;
}
.pager-nav span {
    display: inline-block;
    padding: 4px 8px;
    margin: 1px;
    cursor: pointer;
    font-size: 14px;
    background-color: #FFFFFF;
    border: 1px solid #e1e1e1;
    border-radius: 3px;
    box-shadow: 0 1px 1px rgba(0,0,0,.04);
}
.pager-nav span:hover,
.pager-nav .pg-selected {
    background-color: #f9f9f9;
    border: 1px solid #CCCCCC;
}
</style>
    @livewireStyles
    <div class="d-flex justify-content-between align-item-center pt-20">
        <h3 class="mt-5 mb-2 font-xl font-bold px-4"> المشاريع المتاحه </h3>
        <div id="filter_toggle" class="mx-4 mt-5">
            <button class="mo-btn btn-blue-rounderd " id='filter_toggle' onclick="openNav()">☰ Filter</button>
        </div>
    </div>
    <div class=" d-flex my-5">
        @livewire('post')
    </div>
@endsection
<script>
    const toggle = document.getElementById("filter_toggle");
    function openNav() {
        document.getElementById("filter").style.width = "350px";
        toggle.style.display = "none";
    }
    function closeNav() {
        document.getElementById("filter").style.width = "0";
        document.getElementById("freelancers").style.marginLeft = "0";
        toggle.style.display = "block";
    }
    // for solving the filter closing in the phone stats and then back to desckop
    function Media(x) {
        if (x.matches) { // If media query matches
            document.getElementById("filter").style.width = "350px";
        }
    }
    var x = window.matchMedia("(min-width: 980px)")
    Media(x) // Call listener function at run time
    x.addListener(Media) // Attach listener function on state changes
</script>
@livewireScripts
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script>
    $(document).ready(function() {
        $('.combobox').combobox()
    });
</script>
<script async type="text/javascript" src="//cdn.carbonads.com/carbon.js?serve=CESDK2J7&placement=getbutterflycom" id="_carbonads_js"></script>
