function typeChangedEdit($baseURL,$id){
    $.post($baseURL + "menus/setTypeData",$("form.rememberData").serialize()).done(function (){
        window.location.replace($baseURL + 'menus/edit/' + $id + '/' + $("#typeSelect").val());
    });
    
}
function typeChangedCreate($baseURL){
    $.post($baseURL + "menus/setTypeData",$("form.rememberData").serialize()).done(function (){
        window.location.replace($baseURL + 'menus/create/' + $("#typeSelect").val());
    });
    
}