//获得location的json数据
function GetLocationJSON(ajaxUrl, parentid, level)
{
    var locationJSON;
        $.ajax({
            url: ajaxUrl,
            dataType: 'json',
            type:"POST",
            async: true,
            data: { "parentid": parentid,"level": level },
            success: function (results) {
                alert(1);
                locationJSON = results;                                            
            },
            error: function (result) {
                alert("查询失败1");
            }
        });  
        
        return locationJSON;
}