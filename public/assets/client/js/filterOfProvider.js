console.log('text');
$(document).ready(function (e) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).on('click', '.pagination a', function (event) {
        event.preventDefault();
        var page = $(this).attr('href').split('page=')[1];
        getMoreUsers(page);
    });
    $('#search_by_name').on('keyup', function () {
        $value = $(this).val();
        getMoreUsers(1);
    });
    $('#country').on('change', function () {
        getMoreUsers();
    });
    $('#sort_by').on('change', function (e) {
        getMoreUsers();
    });

    $('#salary_range').on('change', function (e) {
        getMoreUsers();
    });
});
function getMoreUsers(page) {
    var search = $('#search_by_name').val();
    // Search on based of country
    var selectedCountry = $("#country option:selected").val();
    // Search on based of type
    var selectedType = $("#sort_by option:selected").val();
    // Search on based of salary
    var selectedRange = $("#salary_range option:selected").val();
    $.ajax({
        type: "GET",
        data: {
            'search_query': search,
            'country': selectedCountry,
            'sort_by': selectedType,
            'range': selectedRange
        },
        url: `freelancers_filter?page=${page}`,
        success: function (data) {
            $('#freelancers').html(data);
        }
    });
}
// $('#search_by_name').change(function () {
//     $value = $(this).val();
//     console.log($value);
//     $.ajax({
//         type: 'get',
//         url: `{{URL::to('search')}}`,
//         data: { 'search': $value },
//         success: function (data) {
//             $('tbody').html(data);
//         }
//     });
// })