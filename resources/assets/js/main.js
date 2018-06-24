$(function(){
    $('#search-form').submit( function(){
        
        console.log('searching');
        
        //clear error message
        $('.error').empty();

        //clear search data
        $('.name').empty();
        $('.avatar').remove();
        $('.follower-count').empty();
        
        var $user = $('#user').val();
        var $page = 1;

        //validate the form
        if( $user == "" ){
            $('.error').html('You must enter a username.');
            return false;
        }

        
        //make request
        $.ajax({
            type:"GET",
            dataType:"json",
            url: "/search/"+$user
            }).done(function(data) {
                //handle response

                if(data.status == "error"){
                    $('.error').html(data.message);
                }

                if(data.login){
                    $('.name').html(data.login);
                }

                if(data.avatar_url){
                    $('<img/>').attr('src', data.avatar_url ).hide().addClass('avatar').on('load',function(){
                        $(this).appendTo('.avatar-div').fadeIn();;
                    })
                }
                if(data.followers){

                    $('.follower-count').html(data.followers + ' Followers');
                    
                    //set current page
                    var page = 1;

                    //how many pages?
                    var pages = parseInt(data.followers) > 10 ? parseInt(data.followers / 10) : 1;
                    console.log(pages);

                    //store paging data in the load button.
                    $('#load-followers').data({'pages': pages, 'page':page, 'user': $user});

                    //show the load button if there are hidden pages
                    if( pages > page ){
                        $('#load-followers').show();
                    }else{
                        $('#load-followers').hide();
                    }

                    //get first page of followers
                    get_followers($user, page);
                    
                }
        });

        return false;
    });

    $('#load-followers').click(function(){
        page = $(this).data('page');
        pages = $(this).data('pages');
        user = $(this).data('user');
        if(page < pages){
            page++;
            get_followers(user, page);
            $(this).data('page', page);
        }else{
           //hide the button;
           $(this).hide();
        }

        return false;
    });

    function get_followers(user, page){
        $.ajax({
        type:"GET",
        dataType:"json",
        url: "/search/"+user+"/followers/"+page,
        }).done(function(data) {
            console.log(data);
            $('#followers').show();

            $.each(data, function(index, value){
                append_follower(value);
            });
        });
    }

    function append_follower(follower){
        console.log("appending follower...");
        console.log(follower);
        if(follower.avatar_url){
            $('<img/>').attr('src', follower.avatar_url ).hide().addClass('avatar').on('load',function(){
                    $(this).appendTo('#followers').fadeIn();
             })
        }
    }
});