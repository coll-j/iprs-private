// Reset form
$("#reset").click(function () {
    $.toast({
        text: 'You have reset the form to default.',
        position: 'top-right',
        loaderBg: '#3b98b5',
        icon: 'info',
        hideAfter: 3000,
        stack: 1
    });
});