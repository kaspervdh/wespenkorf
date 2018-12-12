$( document ).ready(function() {
    setInterval(getComments, 5000);

});



function getComments() {
    var videoId = getQueryVariable("videoId");

    $.ajax({
        type: "GET",
        url: "./inc/getComments.php",
        data: {
            videoId: videoId
        },
        dataType: 'json',
        success: function(data){
            $.each(data, function(index, element) {
                if (data[index].id != lastId) {

                    console.log(data[index].text && data[index].date_posted);

                $('<div class="card-comment" id="comment">' +
                    '<p class="left" id="comment-username">' + data[index].userId + '</p><i href="#video-dropdown-notlogged" data-target="video-dropdown-notlogged" class="dropdown-trigger material-icons pointer right">more_vert</i><br/>' +
                    '<a id="comment-content">' + data[index].text + '</a>' +
                    '</div>').insertBefore('#comment-container');
                }
                lastId = data[index].id;

            });
        }
    });



}


function getQueryVariable(variable)
{
    var query = window.location.search.substring(1);
    var vars = query.split("&");
    for (var i=0;i<vars.length;i++) {
        var pair = vars[i].split("=");
        if(pair[0] == variable){return pair[1];}
    }
    return(false);
}