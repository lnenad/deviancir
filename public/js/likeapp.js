$( document ).ready(function(){
	$('#likethis').click(function(){
		var new_likes = parseInt($( '#no_likes' ).html())+1;
		console.log(new_likes);
		var id = $( '#graphid' ).html();
		var datastring = "id="+id+"&new_likes=" + new_likes;
		console.log(datastring);
		$.ajax({
                    type: "GET",
                    url : "/graphic/like",
                    data : datastring,
                    success : function(data){
                        $( '#no_likes' ).html(new_likes);
                        $( '#likeresult' ).fadeIn().html(data.msg);
                        $( '#likethis' ).fadeOut();
                    }
                },"json");

	});
});