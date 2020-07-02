$(document).ready(function () {
    showTable();

    //add
    $('#add').click(function () {
        $('#addnew').modal('show');
        $('#addForm')[0].reset();
    });

    $('#addbutton').click(function () {
        var first = $('#firstname').val();
        var last = $('#lastname').val();
        var last = $('#phone').val();
        if (first != '' && last !== '') {
            var addForm = $('#addForm').serialize();
            $.ajax({
                type: 'POST',
                url: 'addmember.php',
                data: addForm,
                success: function () {
                    $('#addnew').modal('hide');
                    $('#addForm')[0].reset();
                    showTable();
                    $('#alert').slideDown();
                    $('#alerttext').text('Member Added Successfully');
                }
            });
        }
        else {
            alert('Please input all Fields')
        }

    });
    //
    //edit
    $(document).on('click', '.edit', function () {
        var memid = $(this).data('id');
        var first = $('#first' + memid).text();
        var last = $('#last' + memid).text();
        var phone = $('#phone' + memid).text();
        $('#editmem').modal('show');
        $('#efirstname').val(first);
        $('#elastname').val(last);
        $('#ephone').val(phone);
        $('#editbutton').val(memid);
    });

    $('#editbutton').click(function () {
        var memid = $(this).val();
        var editForm = $('#editForm').serialize();
        $.ajax({
            type: 'POST',
            url: 'editmember.php',
            data: editForm + "&memid=" + memid,
            success: function () {
                $('#editmem').modal('hide');
                $('#editForm')[0].reset();
                showTable();
                $('#alert').slideDown();
                $('#alerttext').text('Member Updated Successfully');
            }
        });
    });
    //
    //delete
    $(document).on('click', '.delete', function () {
        var memid = $(this).data('id');
        var first = $('#first' + memid).text();
        $('#delmem').modal('show');
        $('#dfirstname').text(first);
        $('#delbutton').val(memid);
    });

    $('#delbutton').click(function () {
        var memid = $(this).val();
        $.ajax({
            type: 'POST',
            url: 'delete.php',
            data: {
                memid: memid,
            },
            success: function () {
                $('#delmem').modal('hide');
                showTable();
                $('#alert').slideDown();
                $('#alerttext').text('Member Deleted Successfully');
            }
        });
    });

});

function showTable() {
    $.ajax({
        type: 'POST',
        url: 'fetch.php',
        data: {
            fetch: 1
        },
        success: function (data) {
            $('#table').html(data);
        }
    });
}