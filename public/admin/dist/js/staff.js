$('#lfm_staff').filemanager('image');

$(document).on('click', '#chucvu', function() {
    if ($("#chucvu").val() == 3) {
        $("#password").val('');
        $("#passwordEnter").val('');
        $("#password").prop('disabled', 'disabled');
        $("#passwordEnter").prop('disabled', 'disabled');
    } else {
        $("#password").prop('disabled', false);
        $("#passwordEnter").prop('disabled', false);
    }
});