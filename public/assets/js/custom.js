$(document).on('click','.del-ac', function(e){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var id = $(this).attr('data-id');
    var url = $(this).attr('data-href');
    //var url = e.target;
    var csrf_token=$('meta[name="csrf_token"]').attr('content');
    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: 'btn btn-info',
            cancelButton: 'btn btn-danger'
        },
        buttonsStyling: false
    })

    swalWithBootstrapButtons.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, delete it!',
        cancelButtonText: 'No, cancel!',
        reverseButtons: true
    }).then((result) => {
        if (result.value) {
        swalWithBootstrapButtons.fire(
            'Deleted!',
            'Your file has been deleted.',
            'success',
            $.ajax({
                url: url,
                type: 'DELETE',
                method: 'DELETE',
                data: {
                    "id": id,
                    "_token": csrf_token,
                },
                success:function(data)
                {
                    location.reload();
                }
            })
        )
    } else if (
        /* Read more about handling dismissals below */
    result.dismiss === Swal.DismissReason.cancel
    ) {
        swalWithBootstrapButtons.fire(
            'Cancelled',
            'Your imaginary file is safe :)',
            'error'
        )
    }
    })
});

$(document).on('click','.del-head', function(e){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var id = $(this).attr('data-id');
    var url = $(this).attr('data-href');
    //var url = e.target;
    var csrf_token=$('meta[name="csrf_token"]').attr('content');
    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: 'btn btn-info',
            cancelButton: 'btn btn-danger'
        },
        buttonsStyling: false
    })

    swalWithBootstrapButtons.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, delete it!',
        cancelButtonText: 'No, cancel!',
        reverseButtons: true
    }).then((result) => {
        if (result.value) {
        swalWithBootstrapButtons.fire(
            'Deleted!',
            'Your file has been deleted.',
            'success',
            $.ajax({
                url: url,
                type: 'DELETE',
                method: 'DELETE',
                data: {
                    "id": id,
                    "_token": csrf_token,
                },
                success:function(data)
                {
                    location.reload();
                }
            })
        )
    } else if (
        /* Read more about handling dismissals below */
    result.dismiss === Swal.DismissReason.cancel
    ) {
        swalWithBootstrapButtons.fire(
            'Cancelled',
            'Your imaginary file is safe :)',
            'error'
        )
    }
    })
});

$(document).on('click','.del-club-assets', function(e){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var id = $(this).attr('data-id');
    var url = $(this).attr('data-href');
    //var url = e.target;
    var csrf_token=$('meta[name="csrf_token"]').attr('content');
    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: 'btn btn-info',
            cancelButton: 'btn btn-danger'
        },
        buttonsStyling: false
    })

    swalWithBootstrapButtons.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, delete it!',
        cancelButtonText: 'No, cancel!',
        reverseButtons: true
    }).then((result) => {
        if (result.value) {
        swalWithBootstrapButtons.fire(
            'Deleted!',
            'Your file has been deleted.',
            'success',
            $.ajax({
                url: url,
                type: 'DELETE',
                method: 'DELETE',
                data: {
                    "id": id,
                    "_token": csrf_token,
                },
                success:function(data)
                {
                    location.reload();
                }
            })
        )
    } else if (
        /* Read more about handling dismissals below */
    result.dismiss === Swal.DismissReason.cancel
    ) {
        swalWithBootstrapButtons.fire(
            'Cancelled',
            'Your imaginary file is safe :)',
            'error'
        )
    }
    })
});

$(document).on('click','.del-member', function(e){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var id = $(this).attr('data-id');
    var url = $(this).attr('data-href');
    //var url = e.target;
    var csrf_token=$('meta[name="csrf_token"]').attr('content');
    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: 'btn btn-info',
            cancelButton: 'btn btn-danger'
        },
        buttonsStyling: false
    })

    swalWithBootstrapButtons.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, delete it!',
        cancelButtonText: 'No, cancel!',
        reverseButtons: true
    }).then((result) => {
        if (result.value) {
        swalWithBootstrapButtons.fire(
            'Deleted!',
            'Your file has been deleted.',
            'success',
            $.ajax({
                url: url,
                type: 'DELETE',
                method: 'DELETE',
                data: {
                    "id": id,
                    "_token": csrf_token,
                },
                success:function(data)
                {
                    location.reload();
                }
            })
        )
    } else if (
        /* Read more about handling dismissals below */
    result.dismiss === Swal.DismissReason.cancel
    ) {
        swalWithBootstrapButtons.fire(
            'Cancelled',
            'Your imaginary file is safe :)',
            'error'
        )
    }
    })
});

$(document).on('click','.del-employee', function(e){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var id = $(this).attr('data-id');
    var url = $(this).attr('data-href');
    //var url = e.target;
    var csrf_token=$('meta[name="csrf_token"]').attr('content');
    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: 'btn btn-info',
            cancelButton: 'btn btn-danger'
        },
        buttonsStyling: false
    })

    swalWithBootstrapButtons.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, delete it!',
        cancelButtonText: 'No, cancel!',
        reverseButtons: true
    }).then((result) => {
        if (result.value) {
        swalWithBootstrapButtons.fire(
            'Deleted!',
            'Your file has been deleted.',
            'success',
            $.ajax({
                url: url,
                type: 'DELETE',
                method: 'DELETE',
                data: {
                    "id": id,
                    "_token": csrf_token,
                },
                success:function(data)
                {
                    location.reload();
                }
            })
        )
    } else if (
        /* Read more about handling dismissals below */
    result.dismiss === Swal.DismissReason.cancel
    ) {
        swalWithBootstrapButtons.fire(
            'Cancelled',
            'Your imaginary file is safe :)',
            'error'
        )
    }
    })
});

/*ONCLICK VIEW PAYMENT HISTORY*/
$(document).on('click','.payment_history', function(e){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var id = $(this).attr('data-id');
    var url = $(this).attr('data-href');
    //var url = e.target;
    var csrf_token=$('meta[name="csrf_token"]').attr('content');
    $.ajax({
        url: url,
        type: 'GET',
        method: 'GET',
        data: {
            "id": id,
            "_token": csrf_token,
        },
        success:function(data)
        {
            $('.payment_history_data').html(data);
            $("#defaultModal").modal('show');
        }
    })
});

/*ON SUBMIT SEARCH RESULT IN CASH AND BANK ACCOUNT*/
$(document).on('submit','#search_form', function(e){
    e.preventDefault();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var tra_type = $('#tran_type_id').val();
    var tra_for = $('#re_pay').val();
    var from_month = $('#month_form').val();
    var to_month = $('#month_to').val();
    var url = $(this).attr('data-href');

    //var url = e.target;
    var csrf_token=$('meta[name="csrf_token"]').attr('content');
    $.ajax({
        url: url,
        type: 'GET',
        method: 'GET',
        data: {
            "tra_type": tra_type,
            "tra_for": tra_for,
            "from_month": from_month,
            "to_month": to_month,
            "_token": csrf_token,
        },
        success:function(data)
        {
            $('.search_result').html(data);
        }
    })
});

/*ON SUBMIT SEARCH RESULT IN LEDGER ACCOUNT*/
$(document).on('submit','#ledger_form', function(e){
    e.preventDefault();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var acc_head = $('#acc_head').val();
    var from_month = $('#month_form').val();
    var to_month = $('#month_to').val();
    var url = $(this).attr('data-href');

    //var url = e.target;
    var csrf_token=$('meta[name="csrf_token"]').attr('content');
    $.ajax({
        url: url,
        type: 'GET',
        method: 'GET',
        data: {
            "acc_head": acc_head,
            "from_month": from_month,
            "to_month": to_month,
            "_token": csrf_token,
        },
        success:function(data)
        {
            $('.search_result').html(data);
        }
    })
});

/*ON SUBMIT SEARCH RESULT IN INCOME EXPENDITURE ACCOUNT*/
$(document).on('submit','#incomeExpense_form', function(e){
    e.preventDefault();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var from_month = $('#month_form').val();
    var to_month = $('#month_to').val();
    var url = $(this).attr('data-href');

    //var url = e.target;
    var csrf_token=$('meta[name="csrf_token"]').attr('content');
    $.ajax({
        url: url,
        type: 'GET',
        method: 'GET',
        data: {
            "from_month": from_month,
            "to_month": to_month,
            "_token": csrf_token,
        },
        success:function(data)
        {
            $('.search_result').html(data);
        }
    })
});

/*ONCLICK POPUP NOTICE DETAILS*/
$(document).on('click','.show_notice', function(e){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var id = $(this).attr('data-id');
    var url = $(this).attr('data-href');
    //var url = e.target;
    var csrf_token=$('meta[name="csrf_token"]').attr('content');
    $.ajax({
        url: url,
        type: 'GET',
        method: 'GET',
        data: {
            "id": id,
            "_token": csrf_token,
        },
        success:function(data)
        {
            $('.notice_details').html(data);
            $("#defaultModal").modal('show');
        }
    })
});

/*ONCHANGE IN TRANSACTION VIEW FILE*/
$(document).on('change','.acc_head', function(e){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var acc_head_id = $(this).val();
    var url = $(this).attr('data-href');
    //var url = e.target;
    var csrf_token=$('meta[name="csrf_token"]').attr('content');
    $.ajax({
        url: url,
        type: 'POST',
        method: 'POST',
        data: {
            "acc_head_id": acc_head_id,
            "_token": csrf_token,
        },
        success:function(data)
        {
            $('.transaction_for').html(data);
        }
    })
});

/*ONCHANGE IN TRANSACTION VIEW FILE GET LAST PAYMENT*/
$(document).on('change','.last_payment', function(e){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var data_id = $(this).val();
    var url = $(this).attr('data-href');
    //var url = e.target;
    var csrf_token=$('meta[name="csrf_token"]').attr('content');
    $.ajax({
        url: url,
        type: 'POST',
        method: 'POST',
        data: {
            "data_id": data_id,
            "_token": csrf_token,
        },
        success:function(data)
        {
            $('.last_payment_data').html(data);
        }
    })
});

/*ONCLICK CHECK MONTH TO IN NOT SMALLER THAN MONTH FROM*/
$(document).on('change','.month_to', function(e){
    var month_to = $(this).val();
    var month_from = $('.month_form').val();
    var to_month = new Date(month_to);
    var from_month = new Date(month_from);
    if(month_from == ''){
        alert('From month must be set before to month set');
        $('.month_to').val("");
    }
    if(to_month < from_month){
        alert('To month is smaller than from month.');
        $('.month_to').val("");
    }
});
