var ids = [];
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

    $(document).on('click', '.cates', function (e) {
        // e.preventDefault();
        ids = []; // reset 
        $('.cates').each(function () {
            if ($(this).is(":checked")) {
                ids.push($(this).attr('id'));
            }
        })
        console.log(ids);
        getMoreUsers();
    });
    $('#skills').on('change', function (e) {
        getMoreUsers();
    });

    $('input[type=radio][name=star]').on('change', function (e) {
        console.log('radio');
        getMoreUsers();
    });
});
function getMoreUsers(page) {
    var search = $('#search_by_name').val();
    // Search on based of country
    var selectedCates = ids;
    // Search on based of type
    var selectedType = $("#sort_by option:selected").val();
    // Search on based of salary
    var selectedStars = $("input[type=radio][name=star]:checked").val();
    $.ajax({
        type: "POST",
        data: {
            'search_query': search,
            'cates': selectedCates,
           
        },
        url: `post_filter?page=${page}`,
        success: function (data) {
            $('#projectlancer').html(data);
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