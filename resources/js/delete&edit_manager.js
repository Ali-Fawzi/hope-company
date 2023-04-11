function setId(value) {
    document.getElementById('ID').value = value;
}
window.setId = setId;

/**
 * This is a function to handle in line editing for blade using jquery x-editable
 */
$(document).ready(function() {
    $.fn.editable.defaults.mode = 'inline';
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('.xedit').editable({
        title: 'Update',
        type: 'POST',
        source: [
            {value: 'manager', text: 'Manager'},
            {value: 'supervisor', text: 'Supervisor'},
            {value: 'salesPerson', text: 'Sales Person'}
        ],
        params: function(params) {
            params.pk = $(this).data('pk');
            return params;
        },
        success: function(response, newValue) {
            console.log('Updated', response)
        }
    });

});
