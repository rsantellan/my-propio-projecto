var my_url = "";
var upload_url = "";
var upload_xls = "";

function startBulk(url, up_url, up_xls)
{
    my_url = url;
    upload_url = up_url;
    upload_xls = up_xls;
    reformUrl();
}

function retrieveProfiles(url)
{
    if($('#selector_clases').val() == 0)
    {
        $('#selector_profiles').find('option').remove().end();
        return false;
    }
    $.ajax({
        url: url,
        data: {
            'object_class': $('#selector_clases').val()
        },
        type: 'post',
        dataType: 'json',
        success: function(json){
            if(json.response == "OK")
            {
                $('#selector_profiles').find('option').remove().end();
                $.each(json.options.list, function(key, value)
                {
                     $('#selector_profiles').
                          append($("<option></option>").
                          attr("value",key).
                          text(value));
                });
                reformUrl();
            }
        }
    });

    return false;
}

function reformUrl()
{
    if($('#selector_clases').val() != 0)
    {
        url = my_url + "?object_class=" + $('#selector_clases').val() +"&profile_id=" + $('#selector_profiles').val();
        up_url = upload_url + "?object_class=" + $('#selector_clases').val() +"&profile_id=" + $('#selector_profiles').val();
        up_xls = upload_xls + "?object_class=" + $('#selector_clases').val() +"&profile_id=" + $('#selector_profiles').val();
        $('#link_descarga').attr("href", url);
        $('#link_upload_xls').attr("href", up_xls);
        $('#link_upload').attr("href", up_url);
    }
    else
    {
        $('#link_descarga').attr("href", my_url);
        $('#link_upload_xls').attr("href", upload_xls);
        $('#link_upload').attr("href", upload_url);
    }

}

function startBulkExport(url)
{
    if($('#selector_clases').val() == 0)
    {
        $('#selector_profiles').find('option').remove().end();
        return false;
    }
    console.log(url);
    url = url + "?object_class=" + $('#selector_clases').val() +"&profile_id=" + $('#selector_profiles').val();
    window.location = url;
    return false;
    $.ajax({
        url: url,
        data: {
            'object_class': $('#selector_clases').val(),
            'profile_id' : $('#selector_profiles').val()
        },
        type: 'post',
        dataType: 'json',
        success: function(json){
            if(json.response == "OK")
            {

            }
        }
    });
    
    return false;
}