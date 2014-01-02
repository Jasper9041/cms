function typeChanged($baseURL){
    window.location.replace($baseURL + "menus/create/" + $("#typeSelect").val());
}