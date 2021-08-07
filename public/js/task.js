$(document).ready(function() {
    $('#CheckEdt').on("click", function () {
        if ($('#CheckEdt').is(":checked"))
        {
            $('#EDT').css("display" ,'block');
        }else{
            $('#EDT').css("display" ,'none');
        }
    });
    if ($('#CheckEdt').is(":checked"))
    {
        $('#EDT').css("display" ,'block');
    }else{
        $('#EDT').css("display" ,'none');
    }
});

